<?php
  include('../../../electro-master/conndb.php');
  if(isset($_POST["submit"])){
    $cateName="";
    $cateShortName="";
    if(isset($_POST["cateName"]) && isset($_POST["cateShortName"])){
      $cateName = $_POST["cateName"];
      $cateShortName = $_POST["cateShortName"];
      if($cateName =="" || $cateShortName == ""){                              
        die("Chưa nhập đủ thông tin");                  
      }else{
        $sqlInsert = 'INSERT INTO `category` (`cat_id`, `cat_name`) VALUES ( "'.$cateName.'", "'.$cateShortName.'")';
        mysqli_query($conn,$sqlInsert);
        header('location:category.php');
      } 
    }                                                                          
  }
?>