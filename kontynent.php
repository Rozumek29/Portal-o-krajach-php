<div class="col-10 p-0 m-0 text-white">
    <?php
    require "config.php";
    $continent = $_GET['continent'];
    $page = $_GET['page'];
    $type = $_GET['type'];
    $querry = getQuery($type, $continent, $page);

    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr><th>Kod</th><th>Nazwa</th>";
    if ($type === 1) {
        echo "<th>Głowa państwa</th>";
        echo "<th>Rok uzyskania niepodległości</th>";
    } else {
        echo "<th>Stolica</th>";
    }
    echo "</tr>";
    echo "</table>";

    if ($continent && $page) {
        while ($row = mysqli_fetch_assoc($querry)) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td> $row["Code"] </td>';
            echo '<td> $row["Name"] </td>';
            if ($type === 1) {
                echo '<td> $row["HeadOfState"]</td>';
                echo '<td> $row["IndepYear"]</td>';
            }else{
                echo '<td> $row["CityName"]</td>';
            }
            echo "</tr>";
            echo "</tbody>";
        }
    }

    if ($page > 1){
        echo "<a href='index.php?continent=$continent&page=$page-1'>Poprzednia Strona</a>";
    }
    if (mysqli_num_rows($querry) === 20){
        echo "<a href='index.php?continent=$continent&page=$page+1'>Następna Strona</a>";
    }

    ?>
</div>
