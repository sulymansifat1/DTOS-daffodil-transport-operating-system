<?php
session_start();

// Check if the user is logged in
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];

    // Validate and sanitize input
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);

    if (!empty($email) && !empty($password) && !empty($fullname) && !empty($phone)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $sql = "INSERT INTO `users` (`email`, `password`, `fullname`, `phone`) VALUES (?, ?, ?, ?)";
        $result = insert($sql, [$email, $hashed_password, $fullname, $phone], 'ssss');

        if ($result) {
            // Registration successful, open the login modal
            $registration_successful = true;
        } else {
            $error_message = "Registration failed. Please try again.";
        }
    } else {
        $error_message = "Please fill in all fields.";
    }
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize input
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    if (!empty($email) && !empty($password)) {
        // Check if the user exists in the database
        $sql = "SELECT * FROM `users` WHERE `email` = ?";
        $result = select($sql, [$email], 's');

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user_data['password'])) {
                // Login successful
                $_SESSION['user'] = [
                    'id' => $user_data['id'],
                    'email' => $user_data['email'],
                    'fullname' => $user_data['fullname'],
                    'phone' => $user_data['phone']
                ];

                // Redirect to the index page
                header("Location: index.php");
                exit;
            } else {
                $error_message = "Invalid email or password.";
            }
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Please enter your email and password.";
    }
}

if (isset($_GET['profile'])) {
    if ($user) {
        // User is logged in, show profile page
        require_once 'profile.php';
        exit;
    } else {
        // User is not logged in, redirect to index page
        header("Location: index.php");
        exit;
    }
}

if (isset($_GET['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the index page
    header("Location: index.php");
    exit;
}
?>

<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="index.php" class="items-center rtl:space-x-reverse">
            <img src="img/dtos.svg" class="w-24 h-24" alt="dtos">
        </a>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="index.php" class="block py-2 px-3 text-gray-900 hover:text-white hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-500 md:p-0 transition duration-300 rounded md:bg-transparent md:p-0 transition">Home</a>
                </li>
                <li>
                    <a href="about.php" class="block py-2 px-3 text-gray-900 hover:text-white rounded hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-500 md:p-0 transition duration-300">About Us</a>
                </li>
                <li>
                    <a href="contact.php" class="block py-2 px-3 text-gray-900 hover:text-white rounded hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-500 md:p-0 transition duration-300">Contact</a>
                </li>
                <li>
                    <a href="buyticket.php" class="block py-2 px-3 text-green-500 hover:text-white rounded hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-600 md:p-0 transition duration-300">Buy Ticket</a>
                </li>
            </ul>
        </div>
        <div class="flex md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse">
            <?php if ($user): ?>
                <!-- User is logged in -->
                <div class="flex items-center md:order-2 md:space-x-0 rtl:space-x-reverse">
    <button type="button" class="flex md:me-0 font-bold " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <p class="px-8 py-3  md:text-lg font-semibold border rounded  border-white hover:bg-white hover:text-green-500 duration-300"><?= $user['fullname']?></p>
    </button>
    <!-- Dropdown menu -->
    <div class="z-50 hidden my-4  text-black bg-white" id="user-dropdown">
    <div class="px-4 py-3">
                            <span class="block px-4 py-2 text-green-500 font-semibold "><?= $user['email'] ?></span>
                        </div>
    <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
                <a href="?profile=true"  target="_blank" class="block px-4 py-2 text-gray-900 hover:text-white hover:bg-green-500 duration-300 ">Profile</a>
            </li>
            <li>
                <a href="?logout=true" class="block px-4 py-2 text-sm text-gray-900 hover:text-white hover:bg-green-500 duration-300  ">Log out</a>
            </li>
        </ul>
    </div>
</div>

            <?php else: ?>
                <!-- User is not logged in -->
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    Sign in
                </button>
                <button data-modal-target="registration-modal" data-modal-toggle="registration-modal" class="block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    Register
                </button>

            <?php endif; ?>
             <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        </div>
    </div>
</nav>

<!-- Login modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Sign in to our platform
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="action" value="login">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="name@company.com" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required />
                    </div>
                  
                    <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login to your account</button>
                    <div class="text-sm font-medium text-gray-500">
                        Not registered? <a href="#" data-modal-hide="authentication-modal" data-modal-toggle="registration-modal" class="text-green-700 hover:underline">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Registration modal -->
<div id="registration-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Register an account
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="registration-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" id="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="action" value="register">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="name@company.com" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Choose a password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required />
                    </div>
                    <div>
                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                        <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Your full name" required />
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Your phone number" required />
                    </div>
                    <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                    <div class="text-sm font-medium text-gray-500">
                        Already have an account? <a href="#" data-modal-hide="registration-modal" data-modal-toggle="authentication-modal" class="text-green-700 hover:underline">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


