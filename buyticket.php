<?php require('inc/link.php') ?>


<?php
session_start();

// Check if the user is logged in
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buy Ticket</title>
    <!-- Include CSS files -->
</head>
<body>
<?php require('inc/header.php')?>
    <?php if ($user): ?>
        <!-- Display this section only when the user is logged in -->
        <section class="pt-16 md:pt-8 md:pb-2 bg-green-100">
            <div class="py-6 text-white">
                <div class="container mx-auto flex flex-col items-center justify-center max-w-lg p-4 lg:max-w-full sm:p-10 lg:flex-row">
                    <div class="flex flex-col items-center justify-center flex-1 p-4 space-y-3 pb-8 sm:p-8 lg:p-16 bg-gradient-to-tl from-green-400 via-green-500 to-blue-500">
                        <span class="text-sm">24h Ticket</span>
                        <p class="text-3xl md:text-5xl font-bold text-center">Use this QR for Instant Access!</p>
                        <button data-modal-hide="authentication-modal" data-modal-toggle="registration-modal" class="px-8 py-3 mt-6 text-lg font-semibold border rounded sm:mt-12 border-white hover:bg-white hover:text-green-500 duration-300">Buy Ticket</button>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="pt-16 md:pt-8 md:pb-2 bg-green-100">
    <div class="py-6 text-white">
        <div class="container mx-auto flex flex-col items-center justify-center max-w-lg p-4 lg:max-w-full sm:p-10 lg:flex-row">
            <div class="flex flex-col items-center justify-center flex-1 p-4 space-y-3 pb-8 sm:p-8 lg:p-16 bg-gradient-to-tl from-green-400 via-green-500 to-blue-500">
                <span class="text-sm">24h Ticket</span>
                <p class="text-3xl md:text-5xl font-bold text-center">Use this QR for Instant Access!</p>
                <p class="text-center text-sm md:text-md pb-5">Unlock convenience and efficiency with Daffodil International University's new transport system. With our 24-hour ticket, commuting has never been easier. Simply scan the QR code provided to gain instant access to our transportation services. No more waiting in long queues or dealing with physical tickets. Experience seamless travel as you navigate your way to your destination hassle-free. Join us in revolutionizing transportation, making it accessible and convenient for everyone. Sign up now and embrace the future of commuting with DIU's innovative transport system.</p>
                <button data-modal-hide="authentication-modal" data-modal-toggle="registration-modal" class="px-8 py-3 mt-6 text-lg font-semibold border rounded sm:mt-12 border-white hover:bg-white hover:text-green-500 duration-300">Sign up</button>
            </div>
        </div>
    </div>
</section>

    <?php endif; ?>

    <?php require('inc/footer.php') ?>
</body>
</html>