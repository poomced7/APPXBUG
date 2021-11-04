<?php

    
    $id = $_GET['id'];
    $token = $_SESSION['online'];

    $sqldel  = $conn->query("DELETE FROM member WHERE id = '$id'");
 if($sqldel){
    $_SESSION["swal"] = "notify";
    $title ="ลบสำเร็จ";
    $text = "กรุณารอสักครู่";
    $icon ="success";
    $button = "ตกลง";
    $link = "./?app=admin&token=$token";
 }else{
    $_SESSION["swal"] = "notify";
    $title ="ลบไม่สำเร็จ!!";
    $text = "กรุณารอสักครู่";
    $icon ="error";
    $button = "ตกลง";
    $link = "./?app=admin&token=$token";
 }
    
?>