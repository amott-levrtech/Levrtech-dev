<?php
    $emailTo="rweber@levrtech.com";
    $subject="Contact from website";
/*    $body="I think you're great";
*/  $headers="From: info@levrtechContact.io";

  if ($_POST["submit"] AND $_POST['human']==4) {
    $result='<div class="alert alert-success">"Thank you for your interest
     '.$_POST['name'].'.  We\'ll be in touch shortly!</div>';

    if(mail($emailTo, $subject,
      "Name: ".$_POST['name']."
      Email: ".$_POST['email']."
      Phone: ".$_POST['phone']."
      Comment: ".$_POST['comment']."",
      $headers));
    }
   if ($_POST["submit"] AND $_POST['human']!=4) {
      $result='<div class="alert alert-danger">"Please try again or email directly to info@levrtech.io</div>';
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
               <form class="navbar-form navbar-right">
                <a class="btn btn-sm btn-primary" href="login.php" role="button">Login</a>
               </form>
            </div>
          </div>
        </nav>

      </div>
    </div>

<br><br/>

        <div class="jumbotron" style="margin-top: -50px; margin-bottom: -10px; padding-top: 100px">
          <div class="container">
            <h2>How to find us</h2>
            <p class="lead">Global Headquarters <br> 
            New York, NY<br>
            info@levrtech.io&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp- for general information<br>
            sales@levrtech.io&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp- for sales<br>
            support@levrtech.io&nbsp&nbsp- for support<br>
            </p>
          </div>
        </div>

       <section class="contact" id="contact" style="padding: 25px 0 50px 0; background: url(images/ny_wtc_tower.JPG) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <h2>Contact Us<i class="fa fa-paper-plane-o"></i></h2>
                           <h3><?php echo $result; ?></h3>
                           <h3><?php echo $_POST['human']; ?></h3>
                      </div>
                  </div>
      <!--            <div id="map-canvas"></div>  -->
                  <div class="row">
                      <form method="post" name="contactform" id="contactform">
                          <div class="col-md-6">
                              <fieldset>
                                  <input name="name" type="text" id="name" size="30" placeholder="Name" required>
                                  <br>
                                  <input name="email" type="email" id="email" size="30" placeholder="Email" required>
                                  <br>
                                  <input name="phone" type="text" id="phone" size="30" placeholder="Phone" required>
                                  <br>
                                  <input name="human" type="text" id="human" size="30" placeholder="Prove your not a robot... What is 2+2?" required>
                                  <br>
                              </fieldset>
                          </div>
                          <div class="col-md-6">
                              <fieldset>
                                  <textarea name="comment" cols="40" rows="20" id="comment" placeholder="Message"></textarea>
                              </fieldset>
                          </div>
                              <div class="col-md-12">
                              <fieldset>
                                  <button type="submit" name="submit" class="btn btn-lg" id="submit" value="submit">Send Message</button>
                              </fieldset>
                          </div>
                      </form>
                  </div>

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
      </div>
  </section>
 


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/privacy_terms.js"></script>
  </body>
</html>
