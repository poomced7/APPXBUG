<?php 
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register P.G.R. MACHINE</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="card mt-2 border border-primary shadow-lg">
  <div class="card-body">
  <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register_db.php" method="post">
        

    <div class="input-group mt-5"><!--start username by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-user" style="font-size:24px"></i></div>
        </div>

		<script>
	function checkuser()
	{
		var elem = document.getElementById('username').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			document.getElementById('username').value = "";
		}
	}
</script>

        <input type="text" class="form-control border border-dark" placeholder="Username" name="username" id="username" onblur="checkuser();" autocomplete="off" required>
      </div> <!--end username by poom!-->


      <div class="input-group mt-3"><!--start pass1 by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-key" style="font-size:17px"></i></div>
        </div>

		<script>
	function checkpass()
	{
		var elem = document.getElementById('password').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			
			document.getElementById('password').value = "";
		}
	}
</script>


        <input type="password" class="form-control border border-dark" placeholder="Password" name="password_1" id="password" onblur="checkpass();" autocomplete="off" required>
      </div><!--end pass1 by poom!-->



      <div class="input-group mt-3"><!--start pass2 by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-key" style="font-size:17px"></i></div>
        </div>

		<script>
	function checkpass()
	{
		var elem = document.getElementById('password').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			
			document.getElementById('password').value = "";
		}
	}
</script>


        <input type="password" class="form-control border border-dark" placeholder="Confirm Password" name="password_2" id="password" onblur="checkpass();" autocomplete="off" required>
      </div><!--end pass2 by poom!-->

      <div class="input-group mt-3"><!--start email by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-envelope" style="font-size:16px"></i></div>
        </div>

		<script>
	function checkuser()
	{
		var elem = document.getElementById('email').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			document.getElementById('email').value = "";
		}
	}
</script>

        <input type="email" class="form-control border border-dark" placeholder="Email" for="email" name="email" id="email" onblur="checkuser();" autocomplete="off" required>
      </div> <!--end email by poom!-->

      <div class="input-group mt-3"><!--start name by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-user-circle-o" style="font-size:16px"></i></div>
        </div>

		<script>
	function checkuser()
	{
		var elem = document.getElementById('name').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			document.getElementById('name').value = "";
		}
	}
</script>

        <input type="name" class="form-control border border-dark" placeholder="Name"  name="name" id="name" onblur="checkuser();" autocomplete="off" required>
      </div> <!--end name by poom!-->


      <div class="input-group mt-3"><!--start Lname by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-user-circle-o" style="font-size:16px"></i></div>
        </div>

		<script>
	function checkuser()
	{
		var elem = document.getElementById('lastname').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			document.getElementById('lastname').value = "";
		}
	}
</script>

        <input type="lastname" class="form-control border border-dark" placeholder="Lastname"  name="lastname" id="lastname" onblur="checkuser();" autocomplete="off" required>
      </div> <!--end Lname by poom!-->


      <div class="input-group mt-3"><!--start phone by poom!-->
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-mobile" style="font-size:24px"></i></div>
        </div>

		<script>
	function checkuser()
	{
		var elem = document.getElementById('phone').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			document.getElementById('phone').value = "";
		}
	}
</script>

        <input type="phone" class="form-control border border-dark" placeholder="Phone"  name="phone" id="phone" onblur="checkuser();" autocomplete="off" required>
      </div> <!--end name by phone!-->
        
        
      <div class="row mt-5">

    
<div class="col">
  <button type="submit" name="reg_user" class="btn btn-block btn-outline-success">Register <i class="fa fa-address-card"></i></button>
  <a href="./?app=login" class="btn btn-block btn-outline-danger" role="button" aria-pressed="true">Back <i class="fa fa-exclamation-circle"></i></a><br>
</div>
    </div>
    </div>
</body>
</html>