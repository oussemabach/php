<?php

    require 'dbconnect.class.php';

    class Produit
    {
        private $cnx;

        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllProduits()
        {
            try {
                $req = 'SELECT * FROM products';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function showOneproduit($pid)
        {
            try {
                $req = 'SELECT * FROM products WHERE pid= :clt_pid';
                $result = $this->cnx->prepare($req);
                $result->bindParam(':clt_pid', $pid);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function addNewproduit ($name, $description, $price, $file)
        {
            try {
                $sql = "INSERT INTO products(name,description,price,file) VALUES (:clt_name,:clt_description,:clt_price,:clt_file)";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":clt_name", $name);
            $result->bindparam(":clt_description", $description);
            $result->bindparam(":clt_price", $price);
            $result->bindparam(":clt_file", $file);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function updateproduit($pid, $name, $description, $price, $file)
        {
            try {
                $sql = "UPDATE products
                        SET name = :clt_name,
                            description= :clt_description,
                            price = :clt_price,
                            file = :clt_file
                        WHERE pid = :clt_pid";
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":clt_pid", $pid);
                $result->bindparam(":clt_name", $name);
                $result->bindparam(":clt_description", $description);
                $result->bindparam(":clt_price", $price);
                $result->bindparam(":clt_file", $file);
                $result->execute();
                return $result;

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
        public function deleteproduit($pid)
        {
            try {
                $sql = 'DELETE FROM products WHERE pid = :clt_pid';
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":clt_pid", $pid);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
    }