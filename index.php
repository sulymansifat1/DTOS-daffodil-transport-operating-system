<?php require('inc/link.php') ?>

<?php
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

$sql = "SELECT `heading_title` FROM `title` WHERE `sr_no` = ?";
$values = [1];
$datatypes = 'i';

$result = select($sql, $values, $datatypes);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $heading_title = $row['heading_title'];
} else {
    $heading_title = "Default Heading Title";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTOS/Home</title>

    <!-- All Links -->
    <?php require('inc/loader.php') ?>

</head>
<body  class="bg-green-100">

    <header>
        
    <!-- --------  NAVBER -----  -->
    <?php require('inc/header.php')?>
    <!-- ------- HERO SECTION ------- -->
<section>
<div class="md:pt-8 overflow-hidden  relative flex items-center min-h-screen">
  <div class="absolute bg-gradient-to-tr from-green-400 via-green-500 to-blue-500 w-full h-2/3 z-0 top-0" style="border-bottom-left-radius: 50% 20%; border-bottom-right-radius: 50% 20%;"></div>
  <div class="absolute inset-x-auto w-full z-10">
  <div class="container flex flex-col items-center px-4 mx-auto text-center md:px-10 lg:px-32">
  <h1 class="text-white text-5xl font-bold leading-none pt-8 md:pt-0 md:text-6xl md:max-w-3xl"><?php echo $heading_title; ?></h1>
  <p class=" text-white mt-6 mb-8 text-lg sm:mb-12 xl:max-w-3xl">Daffodil Transport Operating System</p>
    </div>

    <?php require('inc/search.php')?>

  </div>
</div>

</section>

    </header>
    <main>
<section class="container bg-gradient-to-tl from-green-400 via-green-500 to-blue-500 justify-center p-6 mx-auto sm:py-12  md:flex-row md:justify-between">
      <div class="w-full mx-auto space-y-4 pb-4 text-center">
        <h1 class="text-3xl font-bold leading-none text-white md:text-4xl">Special Services</h1>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-16 max-w-screen-lg mx-auto p-6 rounded-lg ">
    <div class="bg-white border border-gray-200 rounded-lg p-6 flex flex-col items-center justify-center shadow-md">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-500 mb-3" viewBox="0 0 24 24" fill="currentColor"><path d="M21.0049 2.99979C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V14.4998C3.38559 14.4998 4.50488 13.3805 4.50488 11.9998C4.50488 10.6191 3.38559 9.49979 2.00488 9.49979V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049ZM20.0049 4.99979H4.00488V7.96779L4.16077 8.04886C5.49935 8.78084 6.42516 10.1733 6.49998 11.788L6.50488 11.9998C6.50488 13.704 5.55755 15.1869 4.16077 15.9507L4.00488 16.0308V18.9998H20.0049V16.0308L19.849 15.9507C18.5104 15.2187 17.5846 13.8263 17.5098 12.2116L17.5049 11.9998C17.5049 10.2956 18.4522 8.81266 19.849 8.04886L20.0049 7.96779V4.99979ZM16.0049 8.99979V14.9998H8.00488V8.99979H16.0049Z"></path></svg>
        <a href="#">
            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">24h ticket</h5>
        </a>
        <p class="mb-3 font-normal text-gray-500">Follow the step-by-step guide on how to purchase your 24-hour ticket.</p>
        <a href="buyticket.php" target="_blank" class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-green-600 rounded-md hover:bg-green-700">
        Buy Now
        </a>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg p-6 flex flex-col items-center justify-center shadow-md">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-500 mb-3"  viewBox="0 0 24 24" fill="currentColor"><path d="M3.00488 6.99972L11.4502 1.36952C11.7861 1.14559 12.2237 1.14559 12.5596 1.36952L21.0049 6.99972V20.9997C21.0049 21.552 20.5572 21.9997 20.0049 21.9997H4.00488C3.4526 21.9997 3.00488 21.552 3.00488 20.9997V6.99972ZM5.00488 8.07009V19.9997H19.0049V8.07009L12.0049 3.40342L5.00488 8.07009ZM12.0049 10.9997C10.9003 10.9997 10.0049 10.1043 10.0049 8.99972C10.0049 7.89515 10.9003 6.99972 12.0049 6.99972C13.1095 6.99972 14.0049 7.89515 14.0049 8.99972C14.0049 10.1043 13.1095 10.9997 12.0049 10.9997Z"></path></svg>
        <a href="#">
            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">The Price Guide</h5>
        </a>
        <p class="mb-3 font-normal text-gray-500">Here you can see which tickets we have and how much they cost</p>
        <a href="#" class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-green-600 rounded-md hover:bg-green-700">
            Go to Price Guide
        </a>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg p-6 flex flex-col items-center justify-center shadow-md">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-500 mb-3" viewBox="0 0 24 24" fill="currentColor"><path d="M4 2H20V6.45994L13.5366 12L20 17.5401V22H4V17.5401L10.4634 12L4 6.45994V2ZM12 10.6829L18 5.54007V4H6V5.54007L12 10.6829ZM12 13.3171L6 18.4599V20H18V18.4599L12 13.3171Z"></path></svg>
        <a href="#">
            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900">Delay Compensation</h5>
        </a>
        <p class="mb-3 font-normal text-gray-500">If you do not arive on time, you may be entitled to compensation</p>
        <a href="#" class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-green-600 rounded-md hover:bg-green-700">
            Apply now
        </a>
    </div>
</div>
 </section>

 
 

<!-- paymentcard -->
<section class="container justify-center  mx-auto sm:py-12 md:py-24 md:flex-row md:justify-between">       
<div class="bg-white rounded-lg p-6 flex flex-col items-center justify-center ">
<div class="bg-white">
    <div class="container flex flex-col mx-auto lg:flex-row">
        <div class="w-full lg:w-1/3 " style="background-image: url('./img/newtapcard.jpg'); background-position: center center; background-size: cover;"></div>
        <div class="flex flex-col w-full p-6 lg:w-2/3 md:p-8 lg:p-12">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8 mb-8 text-green-500 text-center">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <h2 class="text-3xl font-semibold leading-tight ">Apply for Student Pass</h2>
            <p class="mt-4 mb-8 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptatum rem amet!</p>
            <a href="#" class="inline-flex items-center justify-center w-full px-6 py-3 text-white flex items-center justifiy-center bg-gradient-to-tl from-green-400 via-green-500 to-blue-500 rounded-md hover:bg-green-700">
            Apply for Student Pass
        </a>
        </div>
    </div>
</div>
</div>
</section>

<section class="pb-24">
<div class="md:w-2/3 w-full   justify-center  mx-auto pb-8  p-4 text-center bg-gradient-to-tr from-green-400 via-green-500 to-blue-500 md:py-24 border border-gray-200  rounded-lg shadow sm:p-8">
    <h5 class="mb-2 text-3xl font-bold text-white">Work fast from anywhere</h5>
    <p class="mb-5 text-base text-white sm:text-lg">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="#" class="w-full sm:w-auto bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 text-black rounded-lg inline-flex items-center justify-center px-4 py-2.5">
            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Download on the</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
            </div>
        </a>
        <a href="#" class="w-full  sm:w-auto bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 text-black rounded-lg inline-flex items-center justify-center px-4 py-2.5">
            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Get in on</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
            </div>
        </a>
    </div>
</div>

</section>

    </main>
  
    <!-- ------- Footer -------- -->
    <?php require('inc/footer.php') ?>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10) {
        month = '0' + month.toString();
    }
    if(day < 10) {
        day = '0' + day.toString();
    }

    var minDate = year + '-' + month + '-' + day;

    document.getElementById('txtDate').setAttribute('min', minDate);
});
</script>


</body>
</html>