<?php 
require('inc/db_config.php');
require('inc/essentials.php');

session_start();
if((isset($_SESSION['adminLogin']) && ($_SESSION['adminLogin'])==true)){
    redirect('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login Panel</title>
      <!-- All Links -->
      <?php require('inc/link.php') ?>
    <?php require('inc/loader.php') ?>

    <style>
        body, html {
            height: 100%;
        }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#admin_pass');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the icon (optional)
            this.classList.toggle('text-gray-500');
            this.classList.toggle('text-gray-900');
        });
    });
</script>

</head>
<body class="flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" class="space-y-6">
            <h5 class="text-xl font-medium text-gray-900">Admin Panel Login</h5>
            <div>
                <label for="admin_email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" name="admin_email" id="admin_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Your Email" required />
            </div>
            <div>
                <label for="admin_pass" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                <div class="relative">
                    <input type="password" name="admin_pass" id="admin_pass" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 pr-10" required />
                    <span id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>
                    </span>
                </div>
            </div>
            <button name="login" type="submit" class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login to Admin Panel</button>
        </form>
    </div>


    <?php 

    if(isset($_POST['login'])){

      $frm_data = filteration($_POST);

     $query = "SELECT * FROM `admin_cred` WHERE `admin_email`=? AND `admin_pass`=?";
     $values = [ $frm_data['admin_email'],$frm_data['admin_pass']];
  
    $res = select($query, $values, "ss");
    if($res -> num_rows==1){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['sr_no'];
        redirect('dashboard.php');
        
        echo <<<alert
        <div id="alert-3" class="flex items-center justify-center p-4 mb-4 text-white bg-green-500 rounded-lg" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); width: 80%; max-width: 500px; z-index: 1000;">
  
    <svg class="flex-shrink-0 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM12 3.04879L5 4.60434V13.7889C5 15.1263 5.6684 16.3752 6.7812 17.1171L12 20.5963L17.2188 17.1171C18.3316 16.3752 19 15.1263 19 13.7889V4.60434L12 3.04879ZM16.4524 8.22183L17.8666 9.63604L11.5026 16L7.25999 11.7574L8.67421 10.3431L11.5019 13.1709L16.4524 8.22183Z"></path></svg>

    <span class="sr-only">Success</span>
    <div class="ms-3 text-sm font-medium">
        Successfully logged in
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
    </div>
alert;
  
}
else{
        echo <<<alert
        <div id="alert-3" class="flex items-center justify-center p-4 mb-4 text-white bg-red-500 rounded-lg" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); width: 80%; max-width: 500px; z-index: 1000;">
    <svg class="flex-shrink-0 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Error</span>
    <div class="ms-3 text-sm font-medium">
        Wrong email or password
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 text-red-400 " data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
alert;
    }
    }
    ?>
</body>
</html>