<?php
    $emailTo="rweber@levrtech.com";
    $subject="LearnMore from website";
/*    $body="I think you're great";
*/  $headers="From: info@levrtechLearnMore.io";

  if ($_POST["submit"]) {
    $result='<div class="alert alert-success">"Thank you for your interest '.$_POST['inputFirstname'].'.  We\'ll be in touch shortly!</div>';

    if(mail($emailTo, $subject,
      "FirstName: ".$_POST['inputFirstname']."
      LastName: ".$_POST['inputLastname']."
      Company: ".$_POST['inputCompany']."
      Email: ".$_POST['inputEmail']."
      Country: ".$_POST['inputCountry']."
      Mobile: ".$_POST['inputUserMobile']."
      Office: ".$_POST['inputUserOffice']."
      Newsletter: ".$_POST['checkboxNewsletter']."
      more: ".$_POST['checkboxMore']."
      Comment: ".$_POST['inputComment']."",
      $headers)) {
        } else {
      $result='<div class="alert alert-danger">"Please try again or email directly to info@levrtech.io</div>';
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
    <link href="css/bootstrap-formhelpers.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body style="padding: 25px 0 50px 0; background: url(images/ny_world.JPG) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover" onload="Copy_Year();">
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
               <form class="navbar-form navbar-right">
                <a class="btn btn-sm btn-primary" href="login.php" role="button">Login</a>
               </form>
            </div>
          </div>
        </nav>

      </div>
    </div>

<br></br>

    <div class="container">

      <form method="post" class="form-signin" style="color:white">
        <h2 class="form-signin-heading">Please fill out all the information below</h2>

        <?php echo $result; ?>

        <label for="inputFirstname" class="sr-only">First Name</label>
        <input type="text" id="inputFirstname" name="inputFirstname" class="form-control" placeholder="First Name" required>

        <label for="inputLastname" class="sr-only">Last Name</label>
        <input type="text" id="inputLastname" name="inputLastname" class="form-control" placeholder="Last Name" required>

        <label for="inputCompany" class="sr-only">Company Name</label>
        <input type="text" id="inputCompany" name="inputCompany" class="form-control" placeholder="Company Name" required>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputCountry" >Select your country</label>
        <select class="input-medium bfh-countries" data-country="US" type="dropdown" id="inputCountry" name="inputCountry" class="form-control" style="color:gray" placeholder="Country" required autofocus>
            <option value="US">United States</option>
            <option value="AU">Australia</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="MX">Mexico</option>
            <option value="SP">Spain</option>
            <option value="UK">United Kingdom</option>
       
        </select>

        <label for="inputUserMobile" class="sr-only">Mobile number</label>
        <input type="text" id="inputUserMobile" name="inputUserMobile" class="form-control" maxlength="20" placeholder="Mobile Number" required>

        <label for="inputUserOffice" class="sr-only">Office number</label>
        <input type="text" id="inputUserOffice" name="inputUserOffice" class="form-control" maxlength="20" placeholder="Office Number" required>

        <div class="checkbox1">
          <label>
            <input type="checkbox" value="checkboxNewsletter" name="checkboxNewsletter" class="checkbox-label"> Check here if you'd like to receive a newsletter.
          </label>
        </div> 
       <div class="checkbox1">
          <label>
            <input type="checkbox" value="checkboxMore" name="checkboxMore" class="checkbox-label"> Check here if you're interested in learning more about L<span id="levr">EVR</span>.
          </label>
        <label for="inputComment" class="sr-only">Comment</label>
        <textarea id="inputComment" class="form-control" name="inputComment" placeholder="Enter in any additional comments" autofocus></textarea>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="submit">Submit to L<span id="levr">EVR</span> Technology</button>
        <p>Disclaimer: by submitting this form, I'm knowingly providing my information to L<span id="levr">EVR</span> Technology.</p>
      </form>

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
    <script src="js/bootstrap-formhelpers-countries.en_US.js"></script>
    <script src="js/bootstrap-formhelpers-countries.js"></script>
    <script src="js/bootstrap-formhelpers-languages.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/privacy_terms.js"></script>
      </body>
</html>
