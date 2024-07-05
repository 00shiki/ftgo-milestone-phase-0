<?php

    session_start();

    require_once "repository/ClassRepository.php";
    require_once "repository/CartRepository.php";

    $classRepository = new ClassRepository();
    $cartRepository = new CartRepository();

    $classID = isset($_GET['id']) ? $_GET['id'] : 0;

    $class = $classRepository->getClassById($classID);
    var_dump($class);

    if (isset($_POST["submit"])) {
        $cartRepository->addClassToCart($_SESSION['user_id'], $classID);
        ?>
            <script>
                window.location = "cart.php";
            </script>
        <?php
    }

    $classRepository->close();
    $cartRepository->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <!-- section detail -->
    <div class="max-w-screen-sm container mx-auto p-4">
        <h1 class="text-2xl font-bold dark:text-white mb-3"><?php echo $class[1]; ?></h1>
        <div class="flex flex-row">
            <img class="rounded-lg object-cover h-64 w-128 mr-3" src="<?php echo $class[3]; ?>" alt="" />
            <div class="flex flex-col">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $class[2]; ?></p>
                <p class="mb-3 text-xl font-bold dark:text-white">Rp <?php echo number_format($class[4], 2, ",", "."); ?></p>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $classID; ?>" method="POST">
                        <button type="submit" name="submit" value="submit" id="submit" type="button" class="text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Tambahkan ke Keranjang
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php include("components/footer.php"); ?>
    
</body>
</html>