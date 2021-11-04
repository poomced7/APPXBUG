<?php
if(isset($_POST["edituser"])){

  $iduser = $_POST["iduser"];
  $name = $conn->real_escape_string($_POST["name"]);
  $lastname = $conn->real_escape_string($_POST["lastname"]);
  $email = $conn->real_escape_string($_POST["email"]);
  $Username = $conn->real_escape_string($_POST["Username"]);
  $point = $conn->real_escape_string($_POST["point"]);
  $role = $conn->real_escape_string($_POST["role"]);


  $userupdate = $conn->query("UPDATE member SET name = '$name', lastname = '$lastname', email = '$email', username = '$Username', point = '$point', role = '$role' WHERE id = '$iduser'");
  if($userupdate){
    $_SESSION["swal"] = "notify";
    $title ="แก้ไขสำเร็จ";
    $text = "กรุณารอสักครู่";
    $icon ="success";
    $button = "ตกลง";
    $link = "";
 }else{
    $_SESSION["swal"] = "notify";
    $title ="แก้ไขไม่สำเร็จ!!";
    $text = "กรุณารอสักครู่";
    $icon ="error";
    $button = "ตกลง";
    $link = "";
 }
}
// print_r($_POST);
?>