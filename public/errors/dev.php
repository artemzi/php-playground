<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dev error</title>
    <style>
    ul {
        list-style: none;
        padding: 1rem;
    }
    ul > li > span {
        font-weight: bold;
    }
    </style>
</head>
<body>
    <ul>
        <li>type: <span><?=$errType?></span></li>
        <li>Error message: <span><?=$errStr?></span> Error code: <span><?=$res?></span></li>
        <li>in: <span><?=$errFile?></span> at line: <span><?=$errLine?></span></li>
    </ul>
</body>
</html>