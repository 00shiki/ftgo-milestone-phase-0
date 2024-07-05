<?php

    session_start();

    require_once "repository/CartRepository.php";

    $cartRepository = new CartRepository();

    if (isset($_SESSION["user_id"])) {
        $carts = $cartRepository->getUserCarts($_SESSION["user_id"]);
        $originalPrice = 0;
        foreach ($carts as $cart) {
            $originalPrice += $cart["price"];
        }
        $tax = $originalPrice / 10;
        $totalPrice = $originalPrice + $tax;
    }

    if (isset($_POST["remove"])) {
        $classID = $_POST["class_id"];
        $cartRepository->removeClassFromCart($_SESSION["user_id"], $classID);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=cart.php">';
        exit; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | UltraLingo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <!-- section cart -->
    <div class="max-w-screen-md container mx-auto p-4">
        <div class="pb-4">
            <h1 class="text-2xl font-bold dark:text-white">Cart</h1>
            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
        </div>
        <?php if (isset($_SESSION["user_id"])): ?>
            <div class="flex flex-col">
                <?php foreach ($carts as $cart): ?>
                    <div class="flex flex-row justify-stretch">
                        <h3 class="grow text-md font-semibold hover:underline dark:text-gray-200"><?php echo $cart["name"] ?></h3>
                        <p class="text-md font-bold dark:text-white px-4">Rp <?php echo number_format($cart["price"], 2, ",", "."); ?></p>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="text" name="class_id" value="<?php echo $cart["class_id"]; ?>" style="display:none;">
                            <button type="submit" name="remove" value="submit" class="flex flex-row text-red-500 hover:underline" type="button">
                                <svg class="" xlmns="https://www.w3.org/2000/svg" aria-hidden="true" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"></path>
                                </svg>
                                Remove
                            </button>
                        </form>
                    </div>
                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                <?php endforeach; ?>
            </div>
            <div class="bg-gray-200 dark:bg-gray-700 rounded-lg p-4 my-2">
                <h3 class="text-xl font-bold dark:text-white pb-4">Pesanan</h3>
                
                <div id="summary">
                    <div class="flex flex-col">
                        <div class="flex flex-row justify-between">
                            <p class="text-md text-gray-400">Harga</p>
                            <p id="original_price" class="text-md dark:text-white">Rp <?php echo number_format($originalPrice, 2, ",", "."); ?></p>
                        </div>
                    </div>
                    <div id="discount-div" class="flex flex-col" hidden>
                        <div class="flex flex-row justify-between">
                            <p class="text-md text-gray-400">Diskon</p>
                            <p id="discount" class="text-md dark:text-white"></p>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row justify-between">
                            <p class="text-md text-gray-400">Pajak</p>
                            <p id="tax" class="text-md dark:text-white">Rp <?php echo number_format($totalPrice, 2, ",", "."); ?></p>
                        </div>
                    </div>
                </div>
                <form id="form-voucher" class="py-2">
                    <div class="flex flex-row justify-between items-center">
                        <label for="voucher" class="block flex-none text-sm font-medium text-gray-900 dark:text-white">Kode Voucher</label>
                        <input type="text" id="voucher" class="basis-1/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kode Voucher">
                    </div>
                </form>
                <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-600">
                <div class="flex flex-row justify-between py-2">
                    <h3 class="text-xl font-bold dark:text-white">Total</h3>
                    <p id="total" class="text-md font-bold dark:text-white">Rp 220.000,00</p>
                </div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Bayar</button>
            </div>
            
            <script>
                let carts = [<?php 
                    foreach ($carts as $cart) {
                        echo json_encode($cart).", ";
                    }
                ?>];
                console.log(carts);
            </script>
            <script src="./scripts/cart.js"></script>
        <?php else: ?>
            <p class="text-md font-bold dark:text-white px-4">silahkan login terlebih dahulu</p>
        <?php endif; ?>
    </div>

    <?php include "components/footer.php"; ?>

</body>
</html>