<?php
    session_start();
    if (!isset($_SESSION['formStarted'])) {
		// change the location URL to reflect the app domain url (e.g. http://www.kuzamode.com/apply-step1.php)
        header('Location: http://localhost:8080/kuzamode/apply-step1.php');
        exit;
    }
	
	$message = "Good day, the following loan application details have been sent from Kuzamode website: \r\n\n\n";
	$expected = array('Name', 'Surname', 'ID_Number',
                            'Telephone', 'Email', 'Employer',
                            'Employer_Address',
                            'Types_Of_Contract',
                            'Employment_Date','Salary','Pay_Day','Loan_Amount','Pay_Back_Date','Contact_Method');
	foreach ($expected as $key){ 
 		$message .="". $key." : ".$_SESSION[$key]."\r\n\r\n"; 
 	} 
	
    $to = 'lusukamaselemani@gmail.com'; 
    $subject = 'Feedback From Kuzamode'; 
    
    //create additional headers
    $headers = "From: Kuzamode<lusukamaselemani@gmail.com>\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8';
	
	$mailSent = mail($to, $subject, $message, $headers);
    if ($mailSent) {
       $success = "Your message has been successfully sent. We'll get back to you as soon as possible!";
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply for a loan - Kuzamode</title>
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
                        <h1>Apply For a Loan - Completed</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="loan-application">
            <div class="container application-form">
               <div class="row">
                   <div class="col-md-12">
                       <p class="alert alert-success">
                            Your application was successfully completed. The following details have been submitted:
                       </p>
                       <ul class="list-unstyled">
                            <?php
                            $expected = array('Name', 'Surname', 'ID_Number',
                            'Telephone', 'Email', 'Employer',
                            'Employer_Address',
                            'Types_Of_Contract',
                            'Employment_Date','Salary','Pay_Day','Loan_Amount','Pay_Back_Date','Contact_Method');

                            // unset the formStarted variable
                            unset($_SESSION['formStarted']);
                            foreach ($expected as $key) {
                            echo "<li>$key: $_SESSION[$key]</li>";
                            // unset the session variable
                            unset($_SESSION[$key]);
                            }
                            ?>
                        </ul>
                   </div>
               </div>
             </div>
        </section>
    </main>
    <footer>
        <?php require_once('./includes/footer-partial.php');?>
    </footer>
</body>
</html>