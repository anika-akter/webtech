<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
	<?php 
	$unameErr = $passErr = "";
	$uname = $pass=""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["uname"])) {
    $unameErr = "User Name is required";
  } else {
    $uname = test_input($_POST["uname"]);

    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9a-zA-Z-'_ ]*$/",$uname)) {
      $unameErr = "User Name can contain alpha numeric characters, period, dash or underscore only";
    } 
     if (strlen($_POST["uname"])<2) {
      $unameErr = "Should contain atleast 2 characters";
    } 

  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
    // check if password is well-formed
     if (!preg_match("/[#@$#]+.[0-9a-zA-Z-'_ ]*.[#@$#]+.[0-9a-zA-Z-'_ ]*.[#@$#]+/",$pass)) {
      $passErr = "Password should contain atleast one special character";
    } 
     if (strlen($_POST["pass"])<8) {
      $passErr = "Password must not be less than eight 8 characters";
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
 UserName: <input type="text" name="uname">
<span class="error">* <?php echo $unameErr;?></span>
<br><br>
 Password: <input type="text" name="pass">
 <span class="error">* <?php echo $passErr;?></span>
 <br><br>
 <input type="submit" name="submit" value="Submit">  

</form>

</body>
</html>