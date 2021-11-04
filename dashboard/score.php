<?php




$token = $_GET["token"];
$tokencheck = $conn->query("SELECT *FROM member WHERE token = '$token' ");
if($tokencheck->num_rows <= 0){
  unset($_SESSION['online']);
    $_SESSION["swal"] = "notify";
    $title ="Token ไม่ถูกต้อง";
    $text = "กรุณาลองใหม่อีกครั้ง";
    $icon ="error";
    $button = "ตกลง";
    $link = "./?app=home";
}else{

  $_SESSION['online'] = $token;

  $showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
  while ($row = $showtoken->fetch_array()) {
    $id = $row["id"];
    $point = $row["point"];
    $name = $row["name"];
    $lastname = $row["lastname"];
    $user_status = $row["user_status"];
    $role = $row["role"];
  
  }


  
  
  if($role == "1"){
    $_SESSION["swal"] = "notify";
       $title ="กำลังพาไปยังการจัดการระบบ Admin..";
       $text = "กรุณารอสักครู่...";
       $icon ="success";
       $link = "./?app=admin&token=$token";
       }else{
  if($user_status == "member"){
  
  }

}
  

}

 
  

?>



    <nav class="navbar navbar-dark bg-success">
        <a href="/" class="navbar-brand">P.G.R. Machine</a>
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#nav3">
            <span class="navbar-toggler-icon "style="color:#000";></span>
        </button>
        <div class="navbar-collapse collapse" id="nav3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?app=dashboard&token=<?php echo $token;?>">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">คะแนนของฉัน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ข้อมูลส่วนตัว</a>
                </li>
            </ul>
        </div>
    </nav>

  



<div class="alert alert-info" role="alert">
<center><h5>ยินดีต้อนรับ คุณ <?php echo $name;?> <?php echo $lastname;?> &nbsp;🟢</h5></center>
</div>

<div class="alert alert-success" role="alert">
  <center><h4 class="alert-heading">QR Code ของท่าน</h4>
  <p> 




  <?php

class QrCode {

        /**
         * Size in pixels
         *
         * @var string
         */
        var $size = '220x220';

        /**
         * Encoding:
         * 	UTF-8 [Default]
         * 	Shift_JIS
         * 	ISO-8859-1
         *
         * @var string Encoding
         */
        var $encode = 'UTF-8';

        /**
         * Error correction level
         * L - [Default] Allows recovery of up to 7% data loss
         * M - Allows recovery of up to 15% data loss
         * Q - Allows recovery of up to 25% data loss
         * H - Allows recovery of up to 30% data loss
         *
         * @var string Error correction level
         */
        var $error_correction = 'L';

        /**
         * The width of the white border around the data portion of the chart. This is in rows, not in pixels.
         *
         * @var integer
         */
        var $margin = 2;

        /**
         * The Base URL to the QR-Code Generation API
         *
         * @var string
         */
        var $base_url = 'http://chart.googleapis.com/chart?cht=qr&chl=';

        /**
	 * Plain text that will be converted onto qrcode..
	 *
	 * @param string $text Text to encode
	 * @param mixed $options options array, see helper vars for description of parameters
	 */
        function text($text = '', $options = array()) {
                return '<img src="' . $this->base_url . urlencode($text) . $this->_optionsString($options) . '" />';
        }

        /**
	 * Takes the options array,.
	 *
	 * @param mixed $options options array, see helper vars for description of parameters
	 * @return string url parameter string
	 */
        function _optionsString($options) {
                if (!isset($options['size'])) {
                        $options['size'] = $this->size;
                }
                if (!isset($options['encode'])) {
                        $options['encode'] = $this->encode;
                }
                if (!isset($options['error_correction'])) {
                        $options['error_correction'] = $this->error_correction;
                }
                if (!isset($options['margin'])) {
                        $options['margin'] = $this->margin;
                }
                return '&chs=' . $options['size'] . '&choe=' . $options['encode'] . '&chld=' . $options['error_correction'] . '|' . $options['margin'];
        }

}

$qr = new QrCode();
$t12 = $token; 
echo $qr->text("http://localhost:100/amz/?app=dashboard&token=$t12");?>




    
  
  
  <br>

  <div class="alert alert-secondary" role="alert">
  
  <a onClick="window.location.reload();" class="btn btn-outline-dark btn-lg btn-block" role="button" aria-pressed="true">สุ่ม QR Code ใหม่</a></center><br>
  <a href="./?app=score" class="btn btn-outline-info btn-lg btn-block" role="button" aria-pressed="true">ของรางวัล</a></center><br>
  <a href="./?app=logout" class="btn btn-outline-danger btn-lg btn-block" role="button" aria-pressed="true">ออกจากระบบ</a></center><br>


</div>









