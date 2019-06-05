<?php
    // set required fields
    $required = array('Loan_Amount', 'Pay_Back_Date', 'Contact_Method' );
    $firstPage = 'apply-step1.php';
    $nextPage = 'apply-finish.php';
    $submit = 'next';
    require_once('./includes/multiform.php');
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
                            <h2 class="section-title">Step 3: Loan Details</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount" class="control-label">
                                            How much do you want to borrow?
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="number" id="amount" name="Loan_Amount" class="form-control" placeholder="Enter the amount" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="payback" class="control-label">
                                            When are you going to pay back?
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="date" id="payback" name="Pay_Back_Date" class="form-control" required />                                  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="how" class="control-label">
                                            How would you like to be contacted?
                                            <span class="required">(required)</span>
                                        </label>
                                        <select id="contactMethod" name="Contact_Method" class="form-control" required>
                                            <option value="" selected>Select one option</option>
                                            <option value="Email">Email</option>
                                            <option value="Phone">Phone</option>
                                            <option value="Face to face">Face to face</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" value="Submit Application" name="next" />
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

    <script src="scripts/jquery/jquery-3.4.1.min.js"></script>
</body>
</html>