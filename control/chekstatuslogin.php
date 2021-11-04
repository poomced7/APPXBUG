<?php
if($_SESSION['online'] != NULL){
    $tt = $_SESSION['online'];
    $_SESSION["swal"] = "notify";
    $title ="คุณยังคงอยู่ในระบบ";
    $text = "กรุณาออกจากระบบก่อนทำรายการอื่น !!";
    $button = "ตกลง";
    $link = "./?app=dashboard&token=$tt";
    unset($_SESSION['online']);


    
}else{

 

} 

?>
