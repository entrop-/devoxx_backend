<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Devoxx4Kids</title>
    <link rel="stylesheet" href="skin/stylesheets/core.css">

</head>
<body>
    <?php $devox = new Controller_Devoxx(); ?>
    <section class="set-beacon ">
        <ul>
            <?php foreach ($devox->getBeaconNames() as $name): ?>
                <li><a href="#" class="<?php echo $name ?>"><img src="skin/images/app/<?php echo $name ?>.png" alt="<?php echo $name ?>"></a></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="set-image hidden">
        <ul>
            <?php $files = $devox->getImages(); ?>
            <?php foreach ($files as $filename): ?>
                <li><a href="<?php echo $filename ?>"><img src="<?php echo $filename ?> " alt=""></a></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="set-form hidden">
        <form action="<?php echo GLOBAL_PATH ?>" method="post">
            <input type="text" value="" hidden name="color" id="input_color">
            <input type="text" value="" hidden name="url" id="input_url">
            <button type="submit"><img src="skin/images/app/Button-Reload-icon.png" alt=""></button>
        </form>
    </section>

    <script src="skin/js/main.js"></script>
    <script>
        DEVOX.nextStep();
    </script>
</body>
</html>