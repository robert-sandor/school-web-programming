<?php
    require 'database.php';
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (null == $id) {
        header('Location: index.php');
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM cars where id = ?';
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Item <?php echo $id; ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" charset="utf-8">
        <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
    <body>
        <div class="container">

            <div class="span10 offset1">

                <div class="row">
                    <h3>Item <?php echo $id; ?></h3>
                </div>

                <form class="form-horizontal" action="create.php" method="post">

                    <div class="form-group <?php echo !empty($modelError) ? 'has-error' : '';?>">

                        <label class="control-label">Model</label>

                        <div class="controls">

                            <label class="checkbox">
                                <?php echo $data['model']?>
                            </label>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($manufacturerError) ? 'has-error' : '';?>">

                        <label class="control-label">Manufacturer</label>

                        <div class="controls">

                            <label class="checkbox">
                                <?php echo $data['manufacturer']?>
                            </label>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($powerError) ? 'has-error' : '';?>">

                        <label class="control-label">Power</label>

                        <div class="controls">

                            <label class="checkbox">
                                <?php echo $data['power']?>
                            </label>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($colorError) ? 'has-error' : '';?>">

                        <label class="control-label">Color</label>

                        <div class="controls">

                            <label class="checkbox">
                                <?php echo $data['color']?>
                            </label>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($ageError) ? 'has-error' : '';?>">

                        <label class="control-label">Age</label>

                        <div class="controls">

                            <label class="checkbox">
                                <?php echo $data['age']?>
                            </label>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($priceError) ? 'has-error' : '';?>">

                        <label class="control-label">Price</label>

                        <div class="controls">

                            <label class="checkbox">
                                <?php echo $data['price']?>
                            </label>

                        </div>

                    </div>

                    <div class="form-actions">

                        <a href="index.php" class="btn btn-default">Back</a>

                    </div>

                </form>

            </div>

        </div>

    </body>
</html>
