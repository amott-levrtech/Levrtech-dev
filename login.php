<?

	session_start();

	if ($_GET["logout"]==1 AND $_SESSION['user_id']) { session_destroy();
			$message="You have been logged out.  Have a nice day.";
	
			}


		$link = mysqli_connect("localhost","levrweb","Redstorm1","levrprotousers");

		if (mysqli_connect_error()) {
			die("Could not connect to database");
		}


	if ($_POST['submit']) {

//signs up the user - checks if email address exists

	$query = "SELECT * FROM `le_user` WHERE `email` ='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

		$result=mysqli_query($link, $query);

		$results = mysqli_num_rows($result);
		
		if ($results) $emailexists='<div class="alert alert-danger">"Email already exists.  Please try again or email info@levrtech.io</div>';
			else {
				$query="INSERT INTO le_user (`email`,`password`,`firstname`,`lastname`)
					VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."',
						'".md5(md5($_POST['email']).$_POST['password'])."',
						'".mysqli_real_escape_string($link, $_POST['firstname'])."',
						'".mysqli_real_escape_string($link, $_POST['lastname'])."')";

					mysqli_query($link, $query);
					$successregister ='<div class="alert alert-success">"You have been successfully registered.  Levr Techology will be in touch shortly.  If you would like immediate attention, please email support@levrtech.io</div>';

					$_SESSION['userid']=$row['userid'];
//					"select user_id from levr_user where user_login = ".$_POST['email']"";
					print_r($row);
//					header("Location:levr/index.html");
// sends email notification
                $emailTo="rweber@levrtech.com";
                $subject="Registration from website";
            /*    $body="I think you're great";
            */  $headers="From: info@levrtechRegister.io";

                if(mail($emailTo, $subject,
                  "FirstName: ".$_POST['firstname']."
                  LastName: ".$_POST['lastname']."
                  Phone: ".$_POST['phone']."
                  Email: ".$_POST['email']."",
                  $headers));
			} 

	}

	if ($_POST['login']) {
	$query = "SELECT * FROM `le_user` WHERE `email` ='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password = '".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";

		$result=mysqli_query($link, $query);
		$row=mysqli_fetch_array($result);
		
		if (!$row) $nologin='<div class="alert alert-danger">"Email / password combination is not accepted.  Please try again or email info@levrtech.io</div>';
			else {
					$_SESSION['userid']=$row['userid'];
					//echo $_SESSION;
//					print_r($row);
//					echo "You are now logged in";
//					print_r($_SESSION);
					header("Location:levr/index.html");
			} 

	}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Levr Technology, Inc</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->

  <body onload="Copy_Year();">
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">L<span id="levr">EVR</span> Technology</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="About.html">About</a></li>
                <li><a href="Contact.php">Contact</a></li>
               </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

<br></br>
	
    <!-- Main section for logging on or creating a registration -->
    <div class="jumbotron" style="margin-top: -50px; padding-top: 100px">
      <div class="container">
        <?php
          if ($message) {
            echo "You are logged out";
          }
        ?>
            <div class="row">
              <div class="col-md-6" style="padding-left: 50px">     
                <form method="post">
                   <fieldset>
                      <div id="legend">
                        <legend class="">Login</legend>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                          <input id="loginemail" name="loginemail" placeholder="name@company.com" class="form-control input-sm" type="email" value="<?php echo addslashes($_POST['loginemail']); ?>" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                          <input id="password" name="loginpassword" placeholder="Password should be at least 6 characters" class="form-control input-sm" type="password" value="<?php echo addslashes($_POST['loginpassword']); ?>" />
                        </div>
                      </div>
                      <br>
                      <div class="control-group">
                        <!-- Button -->
                        <input class="btn btn-success" type="submit" name="login" value="Login" />
                      </div>
                           <h3><?php echo $nologin; ?></h3>
                   </fieldset>
                </form>
              </div> 
              <div class="col-md-6" style="padding-right: 50px">     
                <form method="post">
                  <fieldset>
                      <div id="legend">
                        <legend class="">Register</legend>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="firstname">First Name</label>
                        <div class="controls">
                          <input id="firstname" name="firstname" placeholder="Please enter your first name" class="form-control input-sm" type="text" value="<?php echo addslashes($_POST['firstname']); ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="lastname">Last Name</label>
                        <div class="controls">
                          <input id="lastname" name="lastname" placeholder="Please enter your last name" class="form-control input-sm" type="text" value="<?php echo addslashes($_POST['lastname']); ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="phone">Phone Number</label>
                        <div class="controls">
                          <input id="phone" name="phone" placeholder="Please enter phone number" class="form-control input-sm" type="text" value="<?php echo addslashes($_POST['phone']); ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                          <input id="email" name="email" placeholder="name@company.com" class="form-control input-sm" type="email" value="<?php echo addslashes($_POST['email']); ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                          <input id="password" name="password" placeholder="Password should be at least 6 characters" class="form-control input-sm" type="password" value="<?php echo addslashes($_POST['password']); ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="password_confirm">Password (Confirm)</label>
                        <div class="controls">
                          <input id="password_confirm" name="password_confirm" placeholder="Please confirm password" class="form-control input-sm" type="password" value="<?php echo addslashes($_POST['password']); ?>">
                        </div>
                      </div>
                      <br>
                      <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                        <input class="btn btn-success" type="submit" name="submit" value="Sign Up" /> 
                        </div>
                      </div>
                           <h3><?php echo $emailexists; ?></h3>
                           <h3><?php echo $successregister; ?></h3>
                  </fieldset>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
       <!-- FOOTER -->
      <footer>
        <!--<p class="pull-right"><a href="#">Back to top</a></p>-->
          <p>&copy; 2015-<span id="spanDate"></span> L<span id='levr'>EVR</span> T<span id='levr'>ECHNOLOGY</span>, I<span id='levr'>NC</span>. &middot; <a data-toggle="modal" data-target="#privacyModal" href="#privacyModal" onclick="javascript:privacyMod();">Privacy</a> &middot; <a data-toggle="modal" data-target="#termsModal" href="#termsModal" onclick="javascript:termMod();">Terms</a></p>

    <div class="modal" id="privacyModal">
        <div class="modal-dialog" "model-sm">
            <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">x
                  </button>
                  <h4 class="modal-title">Privacy Statement</h4>
                </div>
                <div class="modal-body" id="privSyntax">
                    <!-- javascript will populate this 
                    using privacy_terms.js-->
               </div>
                <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="termsModal">

      <div class="modal-dialog" "model-sm">
        <div class="modal-content">
          <div class="modal-header">
              <button class="close" data-dismiss="modal">x
              </button>

              <h4 class="modal-title">Terms Statement</h4>
          </div>
          <div class="modal-body" id="termSyntax"> 
            <!-- javascript will populate this 
                using privacy_terms.js-->
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



      </footer>

    </div><!-- /.container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <script src="js/privacy_terms.js"></script>

      </body>
</html>


