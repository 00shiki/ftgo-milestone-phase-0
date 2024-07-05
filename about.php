<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | UltraLingo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <!-- section about -->
    <main class="max-w-screen-md container mx-auto px-6 py-16">
        <h1 class="text-3xl font-bold mb-8 dark:text-white">About Us</h1>

        <div>
            <p class="text-lg mb-4 dark:text-white">
                We are a passionate team dedicated to foreign language learner. Founded in 2024, we are here to make language learning more affordable. 
            </p>
            <p class="text-lg dark:text-white">
                Our core values are:
            </p>
            <ul class="list-disc pl-4 mt-2 dark:text-white">
                <li>Integrity</li>
                <li>Innovation</li>
                <li>Customer Focus</li>
                <li>Excellence</li>
            </ul>
        </div>

        <h2 class="text-2xl font-bold mt-12 dark:text-white">Meet the Team</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 dark:text-white">
            <div class="text-center">
                <img src="assets/img/galeri_1.jpg" alt="Team Member 1" class="rounded-full object-cover mx-auto w-24 h-24 mb-2">
                <h3 class="text-lg font-bold mb-1 dark:text-white">John Doe</h3>
                <p class="text-gray-600 dark:text-gray-400">CEO</p>
            </div>
            <div class="text-center">
                <img src="assets/img/galeri_2.jpg" alt="Team Member 2" class="rounded-full object-cover mx-auto w-24 h-24 mb-2">
                <h3 class="text-lg font-bold mb-1 dark:text-white">Jane Smith</h3>
                <p class="text-gray-600 dark:text-gray-400">Marketing Director</p>
            </div>
            <div class="text-center">
                <img src="assets/img/galeri_3.jpg" alt="Team Member 3" class="rounded-full object-cover mx-auto w-24 h-24 mb-2">
                <h3 class="text-lg font-bold mb-1 dark:text-white">Mike Lee</h3>
                <p class="text-gray-600 dark:text-gray-400">Developer</p>
            </div>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
</body>
</html>