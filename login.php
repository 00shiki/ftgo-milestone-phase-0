<?php

    session_start();

    require_once "./repository/UserRepository.php";

    $userRepository = new UserRepository();

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $userID = $userRepository->login($email, $password);
        
        if ($userID) {
            $_SESSION["user_id"] = $userID;
            ?>
            <script>
                window.location = "index.php";
            </script>
            <?php
        } else {
            echo "email atau password salah";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | UltraLingo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <!-- section login -->
    <div class="max-w-screen-sm container mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h1 class="text-2xl font-bold dark:text-white mb-2">Sign In</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
            </div> 
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
            </div> 
            <button type="submit" name="submit" value="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        </form>
    </div>

    <?php include "components/footer.php"; ?>

</body>
</html>