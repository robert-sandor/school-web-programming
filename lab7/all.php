<?php
    include 'database.php';

    $min = intval($_GET['min']);
    $max = intval($_GET['max']);

    $pdo = Database::connect();
    $sql = 'SELECT * FROM `cars` WHERE price >= '.$min.' AND price < '.$max.';';
    foreach ($pdo->query($sql) as $row) {
        echo '<tr>';
        echo '<td>'.$row['model'].'</td>';
        echo '<td>'.$row['manufacturer'].'</td>';
        echo '<td>'.$row['power'].'</td>';
        echo '<td>'.$row['color'].'</td>';
        echo '<td>'.$row['age'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>';
        echo '<a class="btn btn-sm btn-default" href="read.php?id='.$row['id'].'"><span class="glyphicon glyphicon-search"></span></a>';
        echo '<a class="btn btn-sm btn-success" href="update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-repeat"></span></a>';
        echo '<a class="btn btn-sm btn-danger" href="delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-remove"></span></a>';
        echo '</td>';
        echo '</tr>';
    }

    Database::disconnect();
 ?>
