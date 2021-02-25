<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
	<?php 
	$cpassErr = $npassErr = $rpassErr = "";
	$cpass = $npass=$rpass=""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["cpass"])) {
    $cpassErr = "Current password is required";
  } else {
    $cpass = test_input($_POST["cpass"]);

  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($_POST["npass"])) {
    $npassErr = "New Password is required";
  } else {
    $npass = test_input($_POST["npass"]);
    // check if password is well-formed
     if ($npass==$cpass) {
      $npassErr = "Current password and new password should not match";
    }
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($_POST["rpass"])) {
    $rpassErr = "Retyped Password is required";
  } 
else if(empty($_POST["npass"]))
{
  $rpassErr = "New Password is required";

}
  else {
    $rpass = test_input($_POST["rpass"]);
    // check if password is well-formed
     if ($npass!=$rpass) {
      $rpassErr = "Retyped password did not match with new password";
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



 ?>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 Current Password: <input type="text" name="cpass">
<span class="error">* <?php echo $cpassErr;?></span>
<br><br>
New Password: <input type="text" name="npass">
 <span class="error">* <?php echo $npassErr;?></span>
 <br><br>
 Retype Password: <input type="text" name="rpass">
 <span class="error">* <?php echo $rpassErr;?></span>
 <br><br>
 <input type="submit" name="submit" value="Submit">  

</form>

</body>
</html>