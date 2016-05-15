<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create New Entry</title>


                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" charset="utf-8">
                <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>

                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
    </head>
    <body>

        <div class="container">

            <div class="span10 offset1">

                <div class="row">
                    <h3>Create an Entry</h3>
                </div>

                <form class="form-horizontal" action="create.php" method="post">

                    <div class="form-group <?php echo !empty($modelError) ? 'has-error' : '';?>">

                        <label class="control-label">Model</label>

                        <div class="controls">

                            <input type="text" class="form-control" name="model" value="<?php echo !empty($model) ? $model : '';?>" placeholder="Model" required>

                            <?php if (!empty($modelError)): ?>
                                <span class="help-inline"><?php echo $modelError;?></span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($manufacturerError) ? 'has-error' : '';?>">

                        <label class="control-label">Manufacturer</label>

                        <div class="controls">

                            <input type="text" class="form-control" name="manufacturer" value="<?php echo !empty($manufacturer) ? $manufacturer : '';?>" placeholder="Manufacturer" required>

                            <?php if (!empty($manufacturerError)): ?>
                                <span class="help-inline"><?php echo $manufacturerError;?></span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($powerError) ? 'has-error' : '';?>">

                        <label class="control-label">Power</label>

                        <div class="controls">

                            <input type="text" class="form-control" name="power" value="<?php echo !empty($power) ? $power : '';?>" placeholder="Power" required>

                            <?php if (!empty($powerError)): ?>
                                <span class="help-inline"><?php echo $powerError;?></span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($colorError) ? 'has-error' : '';?>">

                        <label class="control-label">Color</label>

                        <div class="controls">

                            <input type="text" class="form-control" name="color" value="<?php echo !empty($color) ? $color : '';?>" placeholder="Color" required>

                            <?php if (!empty($colorError)): ?>
                                <span class="help-inline"><?php echo $colorError;?></span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($ageError) ? 'has-error' : '';?>">

                        <label class="control-label">Age</label>

                        <div class="controls">

                            <input type="text" class="form-control" name="age" value="<?php echo !empty($age) ? $age : '';?>" placeholder="Age" required>

                            <?php if (!empty($ageError)): ?>
                                <span class="help-inline"><?php echo $ageError;?></span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="form-group <?php echo !empty($priceError) ? 'has-error' : '';?>">

                        <label class="control-label">Price</label>

                        <div class="controls">

                            <input type="text" class="form-control" name="price" value="<?php echo !empty($price) ? $price : '';?>" placeholder="Price" required>

                            <?php if (!empty($priceError)): ?>
                                <span class="help-inline"><?php echo $priceError;?></span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="form-actions">

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="index.php" class="btn btn-default">Back</a>

                    </div>

                </form>

            </div>

        </div>

        <?php
            require 'database.php';

            if (!empty($_POST)) {
                $modelError = 'aaa';
                $manufacturerError = null;
                $powerError = null;
                $colorError = null;
                $ageError = null;
                $priceError = null;

                $model = $_POST['model'];
                $manufacturer = $_POST['manufacturer'];
                $power = $_POST['power'];
                $color = $_POST['color'];
                $age = $_POST['age'];
                $price = $_POST['price'];

                $valid = true;
                // TODO validate Data

                if ($valid) {
                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = 'insert into cars (model, manufacturer, power, color, age, price) values (?,?,?,?,?,?)';
                    $q = $pdo->prepare($sql);
                    $q->execute(array($model, $manufacturer, $power, $color, $age, $price));
                    Database::disconnect();
                    header("Location: index.php");
                }
            }
         ?>

    </body>
</html>
