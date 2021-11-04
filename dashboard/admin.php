<?php
$n=50; 
    function getName($n) { 
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    }
 $randomtoken = getName($n);

 $sql = "SELECT * FROM member";
 $result = $conn->query($sql);





$token = $_GET["token"];
$showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
while ($row = $showtoken->fetch_array()) {
  $id = $row["id"];
  $point = $row["point"];
  $name = $row["name"];
  $lastname = $row["lastname"];
  $user_status = $row["user_status"];
  $role = $row["role"];
}


$_SESSION['admin'] = $token;
$showtotal = $conn->query("SELECT * FROM total WHERE id = '1' ");
while ($row = $showtotal->fetch_array()) {
  $branch = $row["branch"];
  $sum = $row["sum"];
  $machinename = $row["machine_name"];
  $all = $row["all"];

}


$showtotal2 = $conn->query("SELECT * FROM total WHERE id = '2' ");
while ($row = $showtotal2->fetch_array()) {
  $branch2 = $row["branch"];
  $sum2 = $row["sum"];
  $machinename2 = $row["machine_name"];
  $all2 = $row["all"];

}

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
    if($role == "0"){
      unset($_SESSION['online']);
      $_SESSION["swal"] = "notify";
         $title ="ไม่มีสิทธิ์เข้าถึงหน้านี้..";
         $icon ="error";
         $link = "./?app=home";}
         else{

          $sql_list = $conn->query("SELECT count(role) as count,role FROM member GROUP BY role "); //หาว่ามี user กี่คน
          while($row = $sql_list->fetch_array()){
          $$role = $row["role"];
          $user_num = $row["count"];
          }
          
          






           
         



        
        }
}


?>

<div class="row">
<div class="col-1 "></div>
  <div class="col-10 bg-dark text-white">
    <br>
    <center><h3>ระบบจัดการฐานข้อมูลของ P.G.R. Machine</h3><center>
  
  <br>
  </div>
  <div class="col-1 "></div>
  </div>

<div class="row">
<div class="col-1 "></div>
  <div class="col-2 bg-dark" style="height:800px">
  <br>
  <hr color="#FFFFFF">
  <center><h5><font color="#FFFFFF"><?php echo $name;?> <?php echo $lastname;?> </font>&nbsp; <span class="badge badge-pill badge-warning">ADMIN</span> </h5></center>
  <hr color="#FFFFFF">
  <br>
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active btn-outline-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a><br>
  <a class="nav-link btn-outline-light" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Member</a><br>
  <a class="nav-link btn-outline-light" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a><br>
  <a class="nav-link btn-outline-light" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a><br><br>
  <a href="./?app=logout" class="btn btn-danger btn-lg" role="button" aria-pressed="true">ออกจากระบบ</a></center>
</div>
  </div>
  <div class="col-8  bg-secondary text-white">
    <br>
  <div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  
  <div class="col-1 "></div>


<div class="container">
<hr color="#FFFFFF">
<center><h2>Dashboard</h2></center>
<hr color="#FFFFFF">
<br>
<div class="row">
  <div class="col-4">

  <div class="card text-white bg-primary">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg">
  <?php if($role == 1){
echo $user_num ;
}else{
echo "ee";
} ?>
</div>
<div>Members</div>
<br>
</div></div></div>


  </div>
  <div class="col-4">


  <div class="card text-white bg-danger">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg"><?php echo $sum;?>&nbsp;/ 200 ใบ </div>
<div>เครื่อง : <?php echo $machinename;?></div>

<br>
</div></div></div>
    
  </div>
  <div class="col-4">
    

  <div class="card text-white bg-danger">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg"><?php echo $sum2;?>&nbsp;/ 200 ใบ </div>
<div>เครื่อง : <?php echo $machinename2;?></div>
<br>
</div></div></div>


  </div>
  </div></div>
   



<div class="row">
  <div class="col-12 ">

<center>
<br>
  <div id="piechart"></div></center>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
  
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['PGR01 <?php echo "ทั้งหมด:$all ใบ";?>', <?php echo $all;?>],
  ['PGR02 <?php echo "ทั้งหมด:$all2 ใบ";?>', <?php echo $all2;?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'ข้อมูลจากทุกเครื่อง ', 'width':850, 'height':400 };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script> 






  </div></div>




  </div>
  <!--หน้าที่2-->
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

  <div class="container">

<div class="row">
  <div class="col-12 ">
  <hr color="#FFFFFF">
<center><h3>จัดการสมาชิก</h3></center>
<hr color="#FFFFFF">

<input type="text" class="form-control" name="name" placeholder="Enter Name" autocomplete="off" required>


  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Role</th>
      <th scope="col">Point</th>
      <th scope="col">Setting</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php $role = $row['role'];
      if($role == '0'){
        echo "MEMBER";
      }else{
        echo "ADMIN";
      }
      ?></td>
      <td><?php echo $row['point']; ?></td>
      <td>
        <div class="row">
<div class="col-6">
<font color="#000"> 
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>">
  แก้ไข
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล <?php echo $row['name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
    <input type="hidden" class="form-control" name="iduser" placeholder="Enter id" value="<?php echo $row['id']; ?>" autocomplete="off" required>

      <label for="exampleInputname">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>" autocomplete="off" required>
    <label for="exampleInputlastname">LastName</label>
    <input type="text" class="form-control" name="lastname" placeholder="Enter LastName" value="<?php echo $row['lastname']; ?>" autocomplete="off" required>
    <label for="exampleInputemail">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Enter E-mail" value="<?php echo $row['email']; ?>" autocomplete="off" required>
    <label for="exampleInputUsername">Username</label>
    <input type="text" class="form-control" name="Username" placeholder="Enter Username" value="<?php echo $row['username']; ?>" autocomplete="off" required>
    <label for="exampleInputpoint">Point</label>
    <input type="text" class="form-control" name="point" placeholder="Enter Point" value="<?php echo $row['point']; ?>" autocomplete="off" required>
    <label for="exampleInputRole">Role</label>
    <select class="form-control" name="role">
      <option value="1">admin</option>
      <option value="0">member</option>
    </select>

    


      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" name="edituser" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>
    </font>

</div>
  <div class="col-6">
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id']; ?>">
  ลบ
</button>

<!-- Modal -->
<font color="#000">
<div class="modal fade" id="exampleModalCenter<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ข้อความจากระบบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>คูณต้องการ ลบ User :
      <?php echo $row['name']; ?>
      นี้หรือไม่ ? </h5>
      </div>
     
        <div class="row m-2">
          <div class="col-6">
       <a href=".?app=del&id=<?php echo $row['id']; ?>"  class="btn btn-danger btn-block" role="button" aria-pressed="true">ยืนยัน</a>
          </div>
          <div class="col-6">
          <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">ยกเลิก</button>

          </div>
        </div>

     
    </div>
  </div>
</div>
    </font>
  </div>      
        </div>

     





    </td>
    </tr>
    <?php endwhile ?>
  </tbody>
</table>                        


 </div>
  </div></div>



  </div> <!--หน้าที่2-->
  <!--หน้าที่3-->
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.3..</div><!--หน้าที่3-->
  <!--หน้าที่4-->
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..4.

  


  </div><!--หน้าที่4-->
</div>
  </div>
  </div>






