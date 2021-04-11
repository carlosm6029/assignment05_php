<!--
Carlos Munoz
assignment05
INFO_1335_4A
Rosas
4-15-2021
-->
<?php 
    //set default value of variables for initial page load
    if (!isset($years)) { $years = '5'; } 
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
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <select name="investment">
                <?php for ($investment = 10000; $investment <= 50000; $investment += 5000) : ?>
                    <option value="<?php echo $investment; ?>">
                        <?php echo $investment; ?>
                    </option>   
            <?php endfor; ?>
            </select><br>

            <label>Yearly Interest Rate:</label>
            <select name="interest_rate">
                    <?php for ($interest_rate = 4; $interest_rate <= 12; $interest_rate += 0.5) : ?>
                   <option value="<?php echo $interest_rate; ?>">
                        <?php echo $interest_rate; ?>
                   </option>
            <?php endfor; ?>
            </select><br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br> 
        </div>
        
        <input type="checkbox" name="months"
                    value="<?php echo $months; ?>" >
                    Compund Interest Monthly</input><br><br>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
</body>
</html>