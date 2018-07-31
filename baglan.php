
<?php
/**
 * Created by PhpStorm.
 * User: yavuzcan
 * Date: 27.11.2017
 * Time: 16:08
 */

try{

    $db=new PDO("mysql:host=localhost;dbname=mehmetse_yavuz;charset=utf8","mehmetse_mayavuzcan","yavuz1253");



}catch(PDOException $e) {


    echo $e->getMessage();



}