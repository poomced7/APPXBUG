<?php
include ("./control/confix.php");

if($_GET["app"] == "login"){
     if(isset($_SESSION['user_status'])){
     if($_SESSION["user_status"] !== NULL){
     $_SESSION["swal"] = "notify";
     $title ="คงมีการเข้าระบบอยู่ระบบกำลังพาท่านออกจากระบบ..";
     $icon ="warning";
     $link = "./?app=logout";

     }
     }else include ("loginUser.php"); 
     }else 
if($_GET["app"] == "dashboard"){
      include ("dashboard/index.php"); 
     }else

if($_GET["app"] == "show"){
     include ("dashboard/show.php"); 
      }else
if($_GET["app"] == "admin"){
     include ("dashboard/admin.php"); 
     }else
if($_GET["app"] == "logout"){
          include ("dashboard/logout.php"); 
          }else
if($_GET["app"] == "register"){
          include ("./register.php"); 
          }else
if($_GET["app"] == "success"){
          include ("control/success.php"); 
          }else
if($_GET["app"] == "score"){
          include ("dashboard/score.php"); 
           }else
if($_GET["app"] == "del"){
          include ("dashboard/setting/del.php"); 
          }else
 if($_GET["app"] == "edit"){
          include ("dashboard/setting/edit.php"); 
          }else
{
     $_SESSION["swal"] = "notify";
     $title ="กำลังโหลดข้อมูล..";
     $text = "กรุณารอสักครู่...";
     $icon ="warning";
     $link = "./?app=login";
}

include ("./control/swal.php");
header("X-XSS-Protection: 1; mode=block");

?>
</center>
</div>
</body>
</html>