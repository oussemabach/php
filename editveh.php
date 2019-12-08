<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Update vehicle N°<?= $_GET['vid'] ?></title>
</head>
<body>
    <?php
        include './classes/vehicle.class.php';
        $vehicle = new Vehicle;
        if (!empty($_POST)) {
            $vehicle->updatevehicle($_POST['vid'], $_POST['status'], $_POST['vehiclenumber']);
            header('Location:indexveh.php?notif=update');
            exit();
        } else {
            $showvehicle = $vehicle->showOnevehicle($_GET['vid']);
            $data = $showvehicle->fetch();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Update vehicle</h3>
        </div>
        <fieldset>
            <legend>Update vehicle N°<?= $_GET['vid'] ?></legend>
            <form action="" method="post">
                <input type="hidden" value="<?= $data['vid'] ?>" name="vid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Satus</label>
                            <input type="number" value="<?= $data['status'] ?>" required name="status" class="form-control" id="status">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vehiclenumber">Vehicle number</label>
                            <input type="text" value="<?= $data['vehiclenumber'] ?>" required name="vehiclenumber" class="form-control" id="vehiclenumber">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-outline-primary">Comfirm</button>
                    </div>
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-block btn-outline-secondary">Cancel</button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>