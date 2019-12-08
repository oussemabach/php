<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Add vehicle</title>
</head>
<body>
    <?php
        if (!empty($_POST)) {
            include './classes/vehicle.class.php';
            $vehicle = new Vehicle;
            $vehicle->addNewvehicle($_POST['status'], $_POST['vehiclenumber']);
            header('Location:indexveh.php?notif=add');
            exit();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Add vehicle</h3>
        </div>
        <fieldset>
            <legend>New vehicle</legend>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Status</label>
                            <input type="number" required name="status" class="form-control" id="status">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vehicle number">vehicle number</label>
                            <input type="text" required name="vehiclenumber" class="form-control" id="vehicle number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-outline-primary">Comfrim</button>
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