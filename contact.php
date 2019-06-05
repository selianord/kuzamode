<?php
// Mail processing script 
$errors = array();
$missing = array();
// check if the form has been submitted
if(isset($_POST['submit'])) {
    $to = 'lusukamaselemani@gmail.com'; 
    $subject = 'Feedback From Kuzamode'; 
    
    $expected = array('First_Name', 'Last_Name', 'Email_Address', 'Telephone', 'Message_Content');
    $required = array('First_Name', 'Last_Name', 'Email_Address', 'Telephone', 'Message_Content');
    
    //create additional headers
    $headers = "From: Kuzamode<lusukamaselemani@gmail.com>\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8';
    require('./includes/processmail.inc.php');
    if ($mailSent) {
        $success = "Your message has been successfully sent. We'll get back to you as soon as possible!";
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Kuzamode</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap-override.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/custom-font-face.css" />
</head>
<body>
    <?php require_once('./includes/navMenu-partial.php');?>
    <main>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Get in Touch</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="contact">
            <div class="container" id="form">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">Have a question? Contact us via email</h2>
                        <?php if($_POST && $suspect || ($_POST && isset($errors['mailfail']))) {?>
                            <div class="alert alert-danger">
                                <p>Sorry, your message could not be sent. Please try again later!</p>
                            </div>
                            <?php } elseif ($missing || $errors) { ?>
                            <div class="alert alert-danger">
                                <p>Please fix the error(s) indicated below!</p>
                            </div>
                        <?php } ?>

                        <form id="contact-form" class="contact-form" name="contactForm" method="post" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname" class="control-label">
                                            First Name
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" id="firstname" name="First_Name" class="form-control" required placeholder="First Name" />
                                        <?php if($missing && in_array('firstname', $missing)) {?>
                                            <span class="text-danger">Please fill in your first name.</span>
                                        <?php }?>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="control-label">
                                            Last Name
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" id="lastname" name="Last_Name" class="form-control" required placeholder="Last Name" />
                                        <?php if($missing && in_array('lastname', $missing)) {?>
                                            <span class="text-danger">Please fill in your last name.</span>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="control-label">
                                            Contact Number
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" id="telephone" name="Telephone" class="form-control" required placeholder="000-000-0000" />
                                        <?php if($missing && in_array('telephone', $missing)) {?>
                                            <span class="text-danger">Please fill in your contact number.</span>
                                        <?php } elseif (isset($errors['telephone'])) { ?>
                                            <span class="text-danger">Invalid telephone number</span>
                                        <?php }?>   
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">
                                            Email
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="email" id="email" name="Email_Address" class="form-control" required placeholder="Email Address" />
                                        <?php if($missing && in_array('email', $missing)) {?>
                                            <span class="text-danger">Please enter your email address.</span>
                                        <?php } elseif (isset($errors['email'])) { ?>
                                            <span class="text-danger">Invalid Email Address.</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="control-label">
                                    How can we help you
                                    <span class="required">(required)</span>
                                </label>
                                <textarea class="form-control" id="message" name="Message_Content" cols="48" rows="8" required placeholder="Type your message here"></textarea>
                                <?php if($missing && in_array('message', $missing)) { ?>
                                    <span class="text-danger">Please enter your message.</span>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
		<section id="feedback" style="min-height:300px; display:none;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-success">
							<i class="fa fa-check"></i> 
							Your message has been successfully sent.<br />
							We'll get back to you as soon as possible!
						</h1>
					</div>
				</div>
			</div>
		</section>
    </main>
    <footer>
        <?php require_once('./includes/footer-partial.php');?>
    </footer>
	 <script src="scripts/jquery/jquery-3.4.1.min.js"></script>
	<?php if(isset($success)){ ?>
		<script>
			$(document).ready(function(){
				$("#form").hide();
				$("#feedback").show();
			});
		</script>
	<?php } ?>
</body>
</html>