<!--
Carlos Munoz
assignment05
INFO_1335_4A
Rosas
4-15-2021
-->
<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', 
            FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', 
            FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', 
            FILTER_VALIDATE_INT);
    $months = filter_input(INPUT_POST, 'months');

    // validate investment
    if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; 
    // validate interest rate
    } else if ( $interest_rate === FALSE )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 ) {
        $error_message = 'Interest rate must be greater than zero.'; 
    // validate years
    } else if ( $years === FALSE ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
    // set error message to empty string if no invalid entries
    } else {
        $error_message = ''; 
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    // calculate the interest monthly when selected
    if ($months != FALSE) {
        $future_value = $investment;
        $months = $years * 12;
        for ($i = 1; $i <= $months; $i++) {
            $future_value += $future_value * $interest_rate *.01;
            
            $monthly_rate_f = $interest_rate.'%';
            $monthly_future_value_f = '$'.number_format($future_value, 2);
        } 
    } else {
        // calculate the interest anually
        $future_value = $investment;
        for ($i = 1; $i <= $years; $i++) {
        $future_value += $future_value * $interest_rate *.01;
        }
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <?php if ($months != FALSE) { ?>
        <label>Monthly Interest Rate:</label>
        <span><?php echo $monthly_rate_f; ?></span><br>
        <label>Number of Months:</label>
        <span><?php echo $months; ?></span><br>
        <label>Future Value:</label>
        <span><?php echo $monthly_future_value_f; ?></span><br>
        <?php } // end if ?>
        <?php if ($months == FALSE) { ?>
        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>
        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>
        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
        <?php } //end if ?>
   

        
    </main>
</body>
</html>