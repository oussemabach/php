<?php
    include 'classes/vehicle.class.php';
    $vehicle = new Vehicle;
    $vehicle->deletevehicle($_GET['vid']);
    header('Location:indexveh.php?notif=delete');