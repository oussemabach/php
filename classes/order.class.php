<?php

require 'dbconnect.class.php';


    class order
    {
        private $cnx;
        

        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllorders()
        {
            try {
                $req = 'SELECT * FROM orders';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
       
         public function showOneorder($oid)
        {
            try {
                $req = 'SELECT * FROM orders WHERE oid= :clt_oid';
                $result = $this->cnx->prepare($req);
                $result->bindParam(':clt_oid', $oid);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function change($oid){
            $res=2;
        try {
            $sql = "UPDATE orders
            SET deliverystatus = :int
            WHERE oid = :clt_oid";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":int",$res);
            $result->bindparam(":clt_oid", $oid);
            $result->execute();
            return $result;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }}

        public function changee($vid){
            $res=0;
        try {
            $sql = "UPDATE vehicle
            SET status = :int
            WHERE vid = :clt_vid";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":int", $res);
            $result->bindparam(":clt_vid", $vid);
            $result->execute();
            return $result;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }}

        public function fassign($vid)
        {
            $res=1;
            $listorders = $this->readAllorders();
            $data = $listorders->fetchAll();
            foreach($data as $orderData):

                if ($orderData['deliverystatus']==0):

                    try {
                        $sql = "UPDATE vehicle
                                SET status = :int
                                WHERE vid = :clt_vid";
                        $result = $this->cnx->prepare($sql);
                        $result->bindparam(":clt_vid", $vid);
                        $result->bindparam(":int", $res);
                        $result->execute();
                        return $result;
        
                    } catch (PDOException $exception) {
                        echo $exception->getMessage();
                    }

                    
                 endif;

                 
                endforeach;
        }
        public function fassignn($vid){
            $res=1;
            $listorders = $this->readAllorders();
            $data = $listorders->fetchAll();
            foreach($data as $orderData):

                if ($orderData['deliverystatus']==0):

            try {
                $sql = "UPDATE orders
                        SET deliverystatus = :clt_int,
                            vid=:clt_vidd
                        WHERE oid = :clt_oid";
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":clt_int", $res);
                $result->bindparam(":clt_vidd", $vid);
                $result->bindparam(":clt_oid", $orderData['oid']);
                $result->execute();
                return $result;

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        endif;

                 
    endforeach;

        }



    }