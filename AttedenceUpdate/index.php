<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Teacher Log In</title>
</head>
<style>

    .login-panel {
        margin-top: 150px;
    }
</style>

<body style="background-image: url('../images/key-2114046_1920.jpg'); background-size: cover; font-family: Arial, sans-serif;">



<div class="container" style="margin-top: 100px;" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);" >
                <div class="panel-heading"  style="background-color: #337ab7; color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h3 class="panel-title">Teacher Login Panel </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="index.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="RFID" name="phone" type="tel" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>


                                <input href="admin.php" class="btn btn-md btn-danger btn-block" type="submit" value="Login" name="login_req" >
								

                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<?php
include("database/db_conection.php");

if(isset($_POST['login_req']))
{
    $rfid = $_POST['phone'];
    $pass  = $_POST['pass'];
	
	$check_user="select * from teachers WHERE rf_id='$rfid' AND pass='$pass'";
	$run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
		$_SESSION['RF_ID'] = $rfid;
		
		echo "<script>window.open('manage-attendence.php','_self')</script>";
		
    }
    else
    {
		echo "<script>alert('phone or password is incorrect!')</script>";
    }

}
?>
