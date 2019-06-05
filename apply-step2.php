<?php
    $firstPage = 'apply-step1.php';
    $nextPage = 'apply-step3.php';
    $submit = 'next';

     // set required fields
     $required = array('Employer', 'EmployerAddress', 'Types_Of_Contract', 'Employment_Date', 'Salary', 'Pay_Day');

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
                            <h2 class="section-title">Step 2: Work Details</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employer" class="control-label">
                                            Employer Name
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" id="employer" name="Employer" class="form-control" placeholder="Employer name" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="employerAddress" class="control-label">
                                            Employer Address
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="text" id="employerAddress" name="Employer_Address" class="form-control" placeholder="Employer address" required />
                                    </div> 
                                    <div class="form-group">
                                        <label for="typesOfContract" class="control-label">
                                            Types of Contract
                                            <span class="required">(required)</span>
                                        </label>
                                        <select class="form-control" name="Types_Of_Contract" id="typesOfContract">
                                            <option value="" selected>Select one option</option>
                                            <option value="Casual">Casual</option>
                                            <option value="Fixed">Fixed</option>
                                            <option value="Permanent">Permanent</option>
                                            <option value="Freelancing">Freelancing</option>
                                        </select>
                                    </div>                             
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startDate" class="control-label">
                                            Start date of employment
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="date" id="startDate" name="Employment_Date" class="form-control" placeholder="Enter the start date of employment" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="salary" class="control-label">
                                            Salary
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="number" id="salary" name="Salary" class="form-control" placeholder="Your Salary" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="payday" class="control-label">
                                            Pay Day
                                            <span class="required">(required)</span>
                                        </label>
                                        <input type="number" id="payday" name="Pay_Day" class="form-control" placeholder="Pay day (day of the month)" required />
                                    </div>
                                </div>                               
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" value="Next" name="next" />
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
	   <script>
        $(document).ready(function(){
            //Display Only Date till today // 
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;    
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('max', maxDate);
        });
    </script>
</body>
</html>