<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Second Hand Car Shop</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" charset="utf-8">
        <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">

            <div class="row">
                <h3>Second Hand Car Shop</h3>
            </div>

            <div class="row">

                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Model
                            </th>
                            <th>
                                Manufacturer
                            </th>
                            <th>
                                Power
                            </th>
                            <th>
                                Color
                            </th>
                            <th>
                                Age
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            include 'database.php';

                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM cars ORDER BY id DESC';
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
                    </tbody>
                </table>

            </div>

        </div>
    </body>
</html>
