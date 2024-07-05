<?php

    require_once "repository/ClassRepository.php";

    $classRepository = new ClassRepository();

    $classes = $classRepository->getClasses();

    $classRepository->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | UltraLingo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @layer utilities {
            /* Hide scrollbar for Chrome, Safari and Opera */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
            /* Hide scrollbar for IE, Edge and Firefox */
            .no-scrollbar {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
            }
        }
    </style>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <!-- section kelas -->
    <div class="max-w-screen-xl container mx-auto p-4">
        <div class="w-full flex flex-row justify-between">
            <h1 class="text-2xl font-bold dark:text-white">Classes</h1>
            <a href="./classes.html">
                <button 
                    type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
            </a>
        </div>
        <div class="flex flex-no-wrap gap-4 mx-auto p-4 overflow-x-scroll items-start no-scrollbar">
            <?php foreach ($classes as $class): ?>
                <div class="flex-none max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="<?php echo 'detail.php?id=' . $class['class_id']; ?>">
                        <img class="rounded-t-lg object-cover h-48 w-96" src="<?php echo $class['image'] ?>" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="<?php echo 'detail.php?id=' . $class['class_id']; ?>">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $class["name"] ?></h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $class["description"] ?></p>
                        <a href="<?php echo 'detail.php?id=' . $class['class_id']; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- section gallery -->
    <div class="max-w-screen-xl container mx-auto p-4">
        <div class="w-full flex flex-row justify-between">
            <h1 class="text-2xl font-bold dark:text-white">Gallery</h1>
            <a href="./gallery.html">
                <button 
                    type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
            </a>
        </div>
        <div class="flex flex-no-wrap justify-between p-4">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center py-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="./assets/img/galeri_1.jpg" alt="Bonnie image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">"Materinya gampang banget buat dipahami."</p>
                </div>
            </div>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center py-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="./assets/img/galeri_2.jpg" alt="Blanca image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Blanca Gallagher</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">"Langsung bisa nonton anime tanpa subtitle."</p>
                </div>
            </div>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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