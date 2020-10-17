<?php require '../Handle/RedirectProcess.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>Classroom</h1>
    </div>
    <div class="redirect_page">
        <h2><?php echo $content ?></h2>
        <button><a href="<?php echo $link ?>"><?php echo $button ?></a></button>
    </div>
</body>

</html>