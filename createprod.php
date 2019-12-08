<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Add produit</title>
</head>
<body>
    <?php
        if (!empty($_POST)) {
            include './classes/produit.class.php';
            $produit = new produit;
            $produit->addNewproduit($_POST['name'], $_POST['description'], $_POST['price'], $_POST['file']);
            header('Location:indexprod.php?notif=add');
            exit();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Add product</h3>
        </div>
        <fieldset>
            <legend>New product</legend>
            <form action="" method="post" id="usrform">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" required name="price" class="form-control" id="price">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" form="usrform" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="text" name="file" id="file" class="form-control">
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