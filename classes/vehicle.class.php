<?php

    require 'dbconnect.class.php';

    class Vehicle
    {
        private $cnx;

        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllvehicles()
        {
            try {
                $req = 'SELECT * FROM vehicle';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function showOnevehicle($vid)
        {
            try {
                $req = 'SELECT * FROM vehicle WHERE vid= :clt_vid';
                $result = $this->cnx->prepare($req);
                $result->bindParam(':clt_vid', $vid);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function addNewvehicle ($status,$vehiclenumber)
        {
            try {
                $sql = "INSERT INTO vehicle(status,vehiclenumber) VALUES (:clt_status,:clt_vehiclenumber)";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":clt_status",$status);
            $result->bindparam(":clt_vehiclenumber",$vehiclenumber);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function updatevehicle($vid, $status,$vehiclenumber)
        {
            try {
                $sql = "UPDATE vehicle
                        SET status = :clt_status,
                            vehiclenumber= :clt_vehiclenumber
                        WHERE vid = :clt_vid";
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":clt_vid", $vid);
                $result->bindparam(":clt_status", $status);
                $result->bindparam(":clt_vehiclenumber", $vehiclenumber);
                $result->execute();
                return $result;

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
        public function deletevehicle($vid)
        {
            try {
                $sql = "DELETE FROM vehicle WHERE vid = :clt_vid";
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":clt_vid", $vid);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }


}
       