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
    <title>Classes | UltraLingo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen dark:bg-gray-800">

    <?php include "components/navbar.php"; ?>

    <!-- section kelas -->
    <div class="max-w-screen-xl container mx-auto p-4">
        <div class="w-full flex flex-row justify-between">
            <h1 class="text-2xl font-bold dark:text-white">Classes</h1>
        </div>
        <div class="grid grid-cols-4 gap-4 mx-auto p-4">
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

    <?php include "components/footer.php"; ?>
    
</body>
</html>