<?php
    include 'classes/produit.class.php';
    $produit = new Produit;
    $produit->deleteproduit($_GET['pid']);
    header('Location:indexprod.php?notif=delete');