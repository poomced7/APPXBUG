<?php
$token = $_GET["token"];
$showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
while ($row = $showtoken->fetch_array()) {
  $id = $row["id"];
  $point = $row["point"];
  $name = $row["name"];
  $lastname = $row["lastname"];
}

if($point != ""){
  echo "<div style=\"font-size:120px;\"> $point </div>" ;

}else
echo "<div style=\"font-size:120px;\"> กรุณาเข้าสู่ระบบใหม่อีกครั้ง </div>" ;
?>
