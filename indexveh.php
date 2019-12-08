<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wpidth=device-wpidth, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Vehicle  management</title>
</head>
<body>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>List of Vehicles </h3>
        </div>
        <?php if (isset($_GET['notif'])): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                    if ($_GET['notif'] == 'add') echo 'Vehicle  added';
                    if ($_GET['notif'] == 'update') echo 'Vehicle  modified';
                    if ($_GET['notif'] == 'delete') echo 'Vehicle  deleted';
                ?>
            </div>
        <?php endif ?>
        <br>
        <a href="createveh.php" class="btn btn-primary">New Vehicle </a>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Vid</th>
                    <th>Status</th>
                    <th>Vehicle number</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'classes/vehicle.class.php';
                    $vehicle  = new Vehicle ;
                    $listvehicles  = $vehicle ->readAllvehicles();
                    $data = $listvehicles->fetchAll(); 
                    foreach($data as $vehicleData):
                    ?>
                        <tr>
                            <td><?= $vehicleData['vid'] ?></td>   
                            <td><?= $vehicleData['status'] ?></td>   
                            <td><?= $vehicleData['vehiclenumber'] ?></td>
                            <td>
                                <a href='editveh.php?vid=<?= $vehicleData['vid'] ?>' class="btn btn-outline-warning">Edit</a>&nbsp;&nbsp;
                                <a href='deleteveh.php?vid=<?= $vehicleData['vid'] ?>' class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
