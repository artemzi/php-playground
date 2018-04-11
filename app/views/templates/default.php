<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->getMeta();?>
    <style>
        .wrapper {
          display: flex;
          min-height: 100vh;
          flex-direction: column;
        }

        .content {
          flex: 1;
        }
    </style>
</head>
<body>
<div class="wrapper">
<header></header>

<main class="content">
    <h1>Default template</h1>

    <p><?= $content;?></p>
</main>

<footer>
<?php
if(DEBUG) {
    echo '<hr>';
    echo '<h3>Debug info:</h3>';
    $logs = \RedBeanPHP\R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();

    dumper( $logs->grep( 'SELECT' ) );
}
?>
</footer>
</div>
</body>
</html>