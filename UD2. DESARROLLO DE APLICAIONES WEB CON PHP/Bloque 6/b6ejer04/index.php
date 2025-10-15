<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("{$_SERVER['DOCUMENT_ROOT']}\Vadim\b6ejer04\int\include_head.php");
    ?>
</head>

<body class="">
    <?php
    include("{$_SERVER['DOCUMENT_ROOT']}\Vadim\b6ejer04\int\include_nav.php");
    ?>
    <main class="flex-fill d-flex align-items-center">
        <?php
        include("{$_SERVER['DOCUMENT_ROOT']}\Vadim\b6ejer04\content\section_mountain.php");
        ?>
    </main>
    <?php
    include("{$_SERVER['DOCUMENT_ROOT']}\Vadim\b6ejer04\int\include_footer.php");
    include("{$_SERVER['DOCUMENT_ROOT']}\Vadim\b6ejer04\int\include_scripts.php");
    ?>
</body>

</html>