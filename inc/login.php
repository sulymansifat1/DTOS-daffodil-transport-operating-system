<?php
require 'inc/link.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filteration($_POST['email']);
    $password = filteration($_POST['password']);

    $query = "SELECT * FROM `users` WHERE `email`=?";
    $values = [$email];
    $datatypes = 's';

    $res = select($query, $values, $datatypes);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user'] = [
                'id' => $row['id'],
                'email' => $row['email'],
                'name' => $row['fullname'],
                'phone' => $row['phone']
            ];
            echo 'login_success';
        } else {
            echo 'invalid_password';
        }
    } else {
        echo 'invalid_email';
    }
}
?>

    <?php require 'inc/header.php'; ?>

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
                    <form class="space-y-4" id="login-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="name@company.com" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required />
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300" required />
                                </div>
                                <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-green-700 hover:underline">Lost Password?</a>
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

    <?php require 'inc/footer.php'; ?>

    <script>
        let login_form = document.getElementById('login-form');

        login_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(login_form);

            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'invalid_email') {
                    showAlert('error', 'Invalid email or password');
                } else if (data === 'invalid_password') {
                    showAlert('error', 'Invalid email or password');
                } else if (data === 'login_success') {
                    window.location.href = 'index.php';
                } else {
                    showAlert('error', 'An error occurred during login');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'An error occurred during login');
            });
        });
    </script>
</body>
</html>