<div class="col-10 p-0 m-0 text-white">
    <?php
    require "config.php";
    $continent = @$_GET['continent'];
    $page = (int) @$_GET['page'];
    $type = @$_GET['type'];
    $querry = @getQuery($type, $continent, $page);

    echo "<table class='table table-dark text-white'>";
    echo "<thead>";
    echo "<tr><th>Kod</th><th>Nazwa</th>";
    if ($type == 1) {
        echo "<th>Głowa państwa</th>";
        echo "<th>Rok uzyskania niepodległości</th>";
    } else {
        echo "<th>Stolica</th>";
    }
    echo "</tr>";

    if ($continent && $page) {
        echo "<tbody>";
        while ($row = @mysqli_fetch_assoc($querry)) {
            echo "<tr>";
            echo "<td>".$row['Code']."</td>";
            echo "<td>".$row['Name']."</td>";
            if ($type == 1) {
                echo "<td>".$row['HeadOfState']."</td>";
                echo "<td>".$row['IndepYear']."</td>";
            }else if ($type == 2){
                echo "<td>".$row['CityName']."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    echo "<div class='col-11 text-center'>";

    $nextPage = (int) $page+1;
    $previousPage = (int) $page-1;

    if ($page > 1){
        echo "<a class='text-white text-decoration-none pb-5 pe-3' href='index.php?continent=$continent&page=$previousPage&type=$type'>Poprzednia Strona</a>";
    }
    if (@mysqli_num_rows($querry) >= 20){
        echo "<a class='text-white text-decoration-none pb-5' href='index.php?continent=$continent&page=$nextPage+1&type=$type'>Następna Strona</a>";
    }

    echo "</div>";
    ?>
</div>
