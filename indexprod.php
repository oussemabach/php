<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wpidth=device-wpidth, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Product management</title>
</head>
<body>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>List of products</h3>
        </div>
        <?php if (isset($_GET['notif'])): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                    if ($_GET['notif'] == 'add') echo 'Product added';
                    if ($_GET['notif'] == 'update') echo 'Product modified';
                    if ($_GET['notif'] == 'delete') echo 'Product deleted';
                ?>
            </div>
        <?php endif ?>
        <br>
        <a href="createprod.php" class="btn btn-primary">New Product</a>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Pid</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>File</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'classes/produit.class.php';
                    $produit = new Produit;
                    $listProduits = $produit->readAllProduits();
                    $data = $listProduits->fetchAll(); 
                    foreach($data as $produitData):
                    ?>
                        <tr>
                            <td><?= $produitData['pid'] ?></td>   
                            <td><?= $produitData['name'] ?></td>   
                            <td><?= $produitData['description'] ?></td>   
                            <td><?= $produitData['price'] ?></td>   
                            <td><?= $produitData['file'] ?></td>   
                            <td>
                                <a href='editprod.php?pid=<?= $produitData['pid'] ?>' class="btn btn-outline-warning">Edit</a>&nbsp;&nbsp;
                                <a href='deleteprod.php?pid=<?= $produitData['pid'] ?>' class="btn btn-outline-danger">Delete</a>
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
