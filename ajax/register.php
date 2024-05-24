<?php
session_start();
?>

<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
   <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
       <a href="index.php" class="items-center rtl:space-x-reverse">
           <img src="img/dtos.svg" class="w-24 h-24" alt="dtos">
       </a>
       <div class="flex md:order-2 space-x-3 md:space-x-2 rtl:space-x-reverse">
           <?php if (isset($_SESSION['user'])): ?>
               <!-- User is logged in -->
               <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                   <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                       <span class="sr-only">Open user menu</span>
                       <p><?php echo $_SESSION['user']['name']; ?></p>
                   </button>
                   <!-- Dropdown menu -->
                   <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                       <div class="px-4 py-3">
                           <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['user']['name']; ?></span>
                       </div>
                       <ul class="py-2" aria-labelledby="user-menu-button">
                           <li>
                               <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                           </li>
                           <li>
                               <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
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
       </div>
   </div>
</nav>