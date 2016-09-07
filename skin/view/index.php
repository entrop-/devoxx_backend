<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Devoxx4Kids</title>
    <link rel="stylesheet" href="skin/stylesheets/core.css">

</head>
<body>
    <?php $devox = new Controller_Devoxx(); ?>
    <section class="set-beacon hidden">
        <ul>

        </ul>
    </section>
    <section class="set-image">
        <ul>
            <?php $files = $devox->getImages(); ?>
            <?php foreach ($files as $filename): ?>
                <li><a href="#"><img src="<?php echo $filename ?> " alt=""></a></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="hidden">
        <p class="finish"><a href="<?php echo GLOBAL_PATH; ?>">Kolejny</a></p>
    </section>
    <script src="skin/js/main.js"></script>
    <script>
        DEVOX.nextStep();
    </script>
</body>
</html>