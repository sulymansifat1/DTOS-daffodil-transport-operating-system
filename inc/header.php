
<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto ">
    <a href="index.php" class="items-center rtl:space-x-reverse">
      <img src="img/dtos.svg" class="w-24 h-24" alt="dtos">
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse">

  <!-- --- log in --- -->

	<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
  Sign in
</button>

<!-- --- Register ----- -->

<button data-modal-target="registration-modal" data-modal-toggle="registration-modal" class="block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
  Register
</button>

      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition duration-300" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="index.php" class="block py-2 px-3 text-gray-900 hover:text-white hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-500 md:p-0 transition duration-300  rounded md:bg-transparent md:p-0 transition" >Home</a>
        </li>
        <li>
          <a href="about.php" class="block py-2 px-3 text-gray-900 hover:text-white rounded hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-500 md:p-0 transition duration-300">About Us</a>
        </li>
        <li>
          <a href="contact.php" class="block py-2 px-3 text-gray-900 hover:text-white rounded hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-500 md:p-0 transition duration-300">Contact</a>
        </li>
        <li>
          <a href="buyticket.php" class="block py-2 px-3 text-green-500 hover:text-white rounded hover:bg-green-500 md:hover:bg-transparent md:hover:text-green-600 md:p-0 transition duration-300" >Buy Ticket</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- --------- LOG IN / SIGN UP --------------------- -->

<!-- Log in modal -->
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
                <form class="space-y-4" action="#">
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
                        Not registered? <a  data-modal-hide="authentication-modal" data-modal-toggle="registration-modal" href="#" class="text-green-700 hover:underline">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--- Registration modal --->

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
                <form class="space-y-4" id="register-form">
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
                    <!-- Picture selection -->
                    <div>
                        <label for="picture" class="block mb-2 text-sm font-medium text-gray-900">Choose a profile picture</label>
                        <input name="profile" accept=".jpg, .jpeg, .png, .webp" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <small class="text-gray-500">Accepted formats: JPG, PNG. Maximum size: 5MB.</small>
                    </div>
                    <!-- End of picture selection -->
                    <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                    <div class="text-sm font-medium text-gray-500">
                        Already have an account? <a href="#" data-modal-hide="registration-modal" data-modal-toggle="authentication-modal" class="text-green-700 hover:underline">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<button data-modal-target="registration-modal" data-modal-toggle="registration-modal" class="block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
  Register
</button>

