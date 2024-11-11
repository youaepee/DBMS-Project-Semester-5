<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "root";
$password = "";
$databaseName = 'donation';

// Establish connection
$con = mysqli_connect($server, $username, $password, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Success connecting to the db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $donorName = mysqli_real_escape_string($con, $_POST['donorName']);
    $donorEmail = mysqli_real_escape_string($con, $_POST['donorEmail']);
    $donationAmount = floatval($_POST['donationAmount']);
    $campaign = mysqli_real_escape_string($con, $_POST['campaign']);
    $aadhar = !empty($_POST['aadhar']) ? intval($_POST['aadhar']) : null;
    $pan = !empty($_POST['pan']) ? mysqli_real_escape_string($con, $_POST['pan']) : null;
    $income = !empty($_POST['income']) ? floatval($_POST['income']) : null;
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = !empty($_POST['age']) ? intval($_POST['age']) : null;
    $taxDeductible = mysqli_real_escape_string($con, $_POST['taxDeductible']);
    $taxIdentificationNumber = !empty($_POST['taxIdentificationNumber']) ? mysqli_real_escape_string($con, $_POST['taxIdentificationNumber']) : null;
    $organizationName = !empty($_POST['organizationName']) ? mysqli_real_escape_string($con, $_POST['organizationName']) : null;
    $comments = mysqli_real_escape_string($con, $_POST['comments']);
    $consent = isset($_POST['consent']) ? "Yes" : "No";

    // Insert statement for the `donate` table
    $donateSql = "INSERT INTO `donation` 
        (`donorName`, `donoremail`, `campaign`, `donationAmount`, `taxDeductible`, `taxIdentificationNumber`, `organizationName`, `comments`, `aadhar`, `pan`, `income`, `gender`, `age`) 
        VALUES 
        ('$donorName', '$donorEmail', '$campaign', '$donationAmount', '$taxDeductible', '$taxIdentificationNumber', '$organizationName', '$comments', '$aadhar', '$pan', $income, '$gender', $age)";

    // Execute query and check for errors
    if ($con->query($donateSql) === true) {
        // Prepare email details only if insertion is successful
        $to = $donorEmail;
        $subject = 'Thank you for your donation';
        $message = 'Dear ' . $donorName . ',<br><br>';
        $message .= 'Thank you for your generous donation of ₹' . $donationAmount . ' to our campaign: ' . $campaign . '.<br><br>';
        $message .= 'We appreciate your support.<br><br>';
        $message .= 'Sincerely,<br>GiveHope';

        // Additional headers for HTML email
        $headers = array();
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: Your Organization <30debrup@gmail.com>';

        // Send the email
        if (mail($to, $subject, $message, implode("\r\n", $headers))) {
            echo "Successfully donated! An email acknowledgment has been sent to your email address.";
        } else {
            echo "Error: Unable to send an email acknowledgment.";
        }

        // Redirect to payment page after successful donation
        header("Location: payment.php");
        exit();
    } else {
        // Display SQL error if insertion fails
        echo "Error: " . $con->error;
    }
}

// Close the connection
$con->close();
?>
