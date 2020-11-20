<?php

namespace App;

class Connection{
    public static function getDb(){
        try{
             $conection=new \PDO(
                 'mysql:host=127.0.0.1;dbname=Intagram_Clone;charset=utf8',
                 'root',
                 'kali339'
                );

             return $conection;
        }catch(\PDOException $e){
             echo "<p style='background-color:red'><span style='color:black'>Erro no PDO</span>: ".$e->getMessage()."</p>";
        }
    }
}
?>
