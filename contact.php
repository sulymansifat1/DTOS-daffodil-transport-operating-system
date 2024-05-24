<?php require('inc/link.php') ?>


<?php
$sql = "SELECT `con_add`, `con_pn`, `con_email` FROM `contact` WHERE `sr_no` = ?";
$values = [1];
$datatypes = 'i';

$result = select($sql, $values, $datatypes);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $con_add = $row['con_add'];
    $con_pn = $row['con_pn'];
    $con_email = $row['con_email'];
} else {
    $con_add = "Daffodil Smart City, Ashulia, Savar";
    $con_pn = "+880 1989594541";
    $con_email = "dtos@daffodil.edu.bd";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTOS/Contact</title>

    <!-- All Links -->
    <?php require('inc/loader.php') ?>

</head>
<body>
        
    <!-- --------  NAVBER -----  -->
    <?php require('inc/header.php')?>

    <!-- ------- CONTACT SECTION ------- -->
<section class="bg-green-100 pt-24 pb-8 md:pt-8 md:pb-2">
    <div class="container grid grid-cols-1 md:ml-24 px-6 mx-auto lg:px-8 md:grid-cols-2 md:divide-x md:py-32 md:px-10">
        <div class="py-6 md:py-0 md:px-6">
            <h1 class="text-4xl font-bold">Get in touch</h1>
            <p class="pt-2 pb-4">Fill in the form to start a conversation</p>
            <div class="space-y-4">
                <p class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 sm:mr-6">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <span><?php echo $con_add;?></span>                
                </p>
                <p class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 sm:mr-6">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                    <span><?php echo $con_pn; ?></span>               
                 </p>
                <p class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 sm:mr-6">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                    <span><?php echo $con_email; ?></span>
                 </p>
            </div>
        </div>
        <form novalidate="" class="flex flex-col py-6 space-y-6 md:py-0 md:px-6">
            <label class="block">
                <span class="mb-1">Full name</span>
                <input type="text" placeholder="Sulyman Islam Sifat" class="block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-75 focus:ring-green-500">
            </label>
            <label class="block">
                <span class="mb-1">Email address</span>
                <input type="email" placeholder="Sifat15@gmail.com" class="block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-75 focus:ring-green-500">
            </label>
            <label class="block">
                <span class="mb-1">Message</span>
                <textarea rows="3" class="block w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-green-500"></textarea>
            </label>
            <button type="button" class="self-center px-8 py-3 text-lg rounded focus:ring hover:bg-green-600 focus:ring-opacity-75 bg-green-500 text-white hover:bg-green-600">Submit</button>
        </form>
    </div>
</section>



    <!-- ------- Footer -------- -->
    <?php require('inc/footer.php') ?>

  

</body>
</html>