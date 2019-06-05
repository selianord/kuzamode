<?php
    if (isset($_POST['next'])) {
        session_start();
        // set a variable to control access to other pages
        $_SESSION['formStarted'] = true;

        // set required fields
        $required = array('Name', 'Surname', 'ID_Number', 'Telephone', 'Email');
        
        $firstPage = 'apply-step1.php';
        $nextPage = 'apply-step2.php';
        $submit = 'next';
        require_once('./includes/multiform.php');
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
                        <h1>Apply For a Loan</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="loan-application">
            <div class="container application-form">
                <!-- validation errors -->
                <div class="row">
                    <div class="col-md-12">
                    <?php if (isset($missing)) { ?>
                        <p class="alert alert-warning"> Please fix the following required fields:</p>
                        <ul class="list-unstyled">
                            <?php
                                foreach ($missing as $item) {
                                echo "<li>$item</li>";
                            }
                            ?>
                        </ul>
                    <?php } ?>
                    </div>
                </div>
                <form name="loanApplicationForm" action="" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="section-title">Step 1: Personal Details</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Name <span class="required">(required)</span>
                                        </label>
                                        <input type="text" name="Name" id="name" class="form-control" placeholder="Enter your name" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="surname">
                                            Surname
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" name="Surname" id="surname" class="form-control" placeholder="Enter your surname" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="idNumber">
                                            ID/Passport Number
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" name="ID_Number" id="idNumber" class="form-control" placeholder="Enter your Id number" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="telphone">
                                            Telephone
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" id="telephone" name="Telephone" class="form-control" required placeholder="Enter your telphone" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email">
                                            Email
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="email" id="email" name="Email" class="form-control" required placeholder="Enter your email" />
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="copyOfId" class="control-label">
                                            Upload copy of your ID
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="file" name="Copy_Of_ID" id="copyOfId" class="form-control" required accept=".pdf, jpg, png" />
                                    </div> -->
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <input type="submit" name="next" class="btn btn-danger" value="Next" />
                            </div>
                        </div>
                    </div>                  
                </form>                
             </div>
        </section>
    </main>
    <footer>
        <?php require_once('./includes/footer-partial.php');?>
    </footer>
</body>
</html>