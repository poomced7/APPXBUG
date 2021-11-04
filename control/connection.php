<?php 
$host = "localhost";
$userdb = "datatail_amz";
$pass = "20092524Poom@";
$datab = "datatail_amz";
$sscon = "1000";
 $conn = new mysqli($host, $userdb, $pass, $datab);
  
  if($conn->connect_errno){
  echo "<script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: $sscon,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้'
})



      .then(function() { 
                    window.location = ''; 
                }),setTimeout(function(){ 
                    window.location = ''; 
                },$sscon); 

   </script>";
}
  $conn -> set_charset("utf8");

?>