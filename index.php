<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Portal o krajach</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body class="d-flex flex-column h-100 bg-dark p-0 m-0">
    <?php
        include "naglowek.php";
        echo "<div class='row p-0 m-0'>";
        include "menu.php";
        include "kontynent.php";
        echo "</div>";
        include "stopka.php";
    ?>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>