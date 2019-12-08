<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Update product N°<?= $_GET['pid'] ?></title>
</head>
<body>
    <?php
        include './classes/produit.class.php';
        $produit = new Produit;
        if (!empty($_POST)) {
            $produit->updateproduit($_POST['pid'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['file']);
            header('Location:indexprod.php?notif=update');
            exit();
        } else {
            $showproduit = $produit->showOneproduit($_GET['pid']);
            $data = $showproduit->fetch();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Update product</h3>
        </div>
        <fieldset>
            <legend>Update product N°<?= $_GET['pid'] ?></legend>
            <form action="" method="post" id="usrform">
                <input type="hidden" value="<?= $data['pid'] ?>" name="pid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="<?= $data['name'] ?>" required name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" value="<?= $data['price'] ?>" required name="price" class="form-control" id="price">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" form="usrform"  class="form-control"><?= $data['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="text" value="<?= $data['file'] ?>" name="file" id="file" class="form-control">
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