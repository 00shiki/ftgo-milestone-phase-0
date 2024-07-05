<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | UltraLingo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <div class="max-w-screen-xl container mx-auto p-4">
        <h1 class="text-2xl font-bold dark:text-white">Gallery</h1>
        <div class="flex flex-col gap-4 p-4">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 justify-center mx-auto">
                <div class="flex flex-col items-center py-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="./assets/img/galeri_1.jpg" alt="Bonnie image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">"Materinya gampang banget buat dipahami."</p>
                </div>
            </div>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 justify-center mx-auto">
                <div class="flex flex-col items-center py-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="./assets/img/galeri_2.jpg" alt="Blanca image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Blanca Gallagher</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">"Langsung bisa nonton anime tanpa subtitle."</p>
                </div>
            </div>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 justify-center mx-auto">
                <div class="flex flex-col items-center py-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="./assets/img/galeri_3.jpg" alt="Dylan image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Dylan Vincent</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">"Kelasnya terjangkau dan bermanfaat."</p>
                </div>
            </div>
        </div>
    </div>

    <?php include "components/footer.php"; ?>

</body>
</html>