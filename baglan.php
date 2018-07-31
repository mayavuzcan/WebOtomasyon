
<?php
/**
 * Created by PhpStorm.
 * User: yavuzcan
 * Date: 27.11.2017
 * Time: 16:08
 */

try{

    $db=new PDO("mysql:host=localhost;dbname=*****;charset=utf8","*****","********");



}catch(PDOException $e) {


    echo $e->getMessage();



}