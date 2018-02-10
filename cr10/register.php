<?php

session_start();// start a new session or continues the previous
ob_start();
if( isset($_SESSION['person'])!="" ){
  	header("Location: home.php"); // redirects to home.php
}
include_once 'dbconnect.php';
$error =false;
if(isset($_POST['btn-signup'])){
	// sanitize user input to prevent sql injection
  $first = trim($_POST['first']);
  $first = strip_tags($first);
  $first = htmlspecialchars($first);

  $last = trim($_POST['last']);
  $last = strip_tags($last);
  $last = htmlspecialchars($last);

	$name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  	// basic name validation

   if(empty($first)){
      $error=true;
      $firstError='Please enter your full firstname.';
    } elseif(strlen($first)<3){
      $error=true;
      $firstError='first must have atleast 3 characters';
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$first)){
      $error=true;
      $firstError = "lastName must contain alphabets and space .";
    }


  if(empty($last)){
      $error=true;
      $lastError='Please enter your full lastname.';
    } elseif(strlen($last)<3){
      $error=true;
      $lastError='last must have atleast 3 characters';
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$last)){
      $error=true;
      $lastError = "lastName must contain alphabets and space .";
    }

    if(empty($name)){
      $error=true;
      $nameError='Please enter your full name.';
    } elseif(strlen($name)<3){
      $error=true;
      $nameError='Name must have atleast 3 characters';
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$name)){
      $error=true;
      $nameError = "Name must contain alphabets and space .";
    }


  	//basic email validation
  	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  		$error=true;
  		$emailError ="Please enter valid email address.";
  	} else {
  		// check whether the email exist or not
  		$query ="SELECT email FROM user WHERE email='$email'";
  		$result =mysqli_query($conn,$query);
  		$count = mysqli_num_rows($result);
  		if($count!=0){
  			$error=true;
  			$emailError="Provided Email is already in use.";
  		}
  	}
  	// password validation
  	if(empty($pass)){
  		$error=true;
  		$passError="Please enter password";
  	} elseif(strlen($pass)<6){
  		$error=true;
  		$passError="Password must have atleast 6 characters";
  	}
  	// password encrypt using SHA256();
  	$password=hash('sha256',$pass);


  	// if there's no error, continue to signup
  	if(!$error){
  		$query ="INSERT INTO `user`(first_name,surname,user_name,email,password) VALUES ('$first','$last','$name','$email','$password')";
  		$res =mysqli_query($conn,$query);

  		if($res){
  			$errTyp ="success";
  			$errMSG ="<div class='alert alert-success'>Successfully registered,you may login now</div>";
  			unset($name);
  			unset($email);
  			unset($pass);
  		} else{
  			$errTyp="danger";
  			$errMSG="Something went wrong, try again later...";
  		}
  	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script
  	src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  	integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  	crossorigin="anonymous"></script>   
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="jumbotron" style="padding-top: 150px;">
    <h1 class="text-center" style="color: white;">Welcome to BigList Library</h1>
    <div class="container text-center" style="width: 80%;">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Register Now</button>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sign up</h4>
          <img class="modal-title" src="https://www.registersigns.com/resources/images/referrer/RS_Logo_wh_bg.png" width="100">
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <?php
      if(isset($errMSG) ) {
      ?>
      <div class="alert">
        <?php echo $errMSG; ?>
      </div>
      <?php
      }
      ?>
      <input type="text" name="first" class="form-control" placeholder="Enter your first Name" maxlength="50" value="<?php echo $first ?>" />
      <span class="text-danger"><?php echo $firstError; ?></span>
      <input type="text" name="last" class="form-control" placeholder="Enter your last Name" maxlength="50" value="<?php echo $last ?>" />
      <span class="text-danger"><?php echo $lastError; ?></span>
      <input type="text" name="name" class="form-control" placeholder="Enter User Name" maxlength="50" value="<?php echo $name ?>" />
      <span class="text-danger"><?php echo $nameError; ?></span>

      <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
      <span class="text-danger"><?php echo $emailError; ?></span>
      <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
      <span class="text-danger"><?php echo $passError; ?></span>
      <hr>
      <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <a href="index.php"><button type="button" class="btn btn-info btn-lg" >Sign In</button></a>
  </div></div>
    
</body>
</html>

<?php ob_end_flush(); ?>
