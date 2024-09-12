<?php

require 'vendor/autoload.php'; // Include Composer's autoload file

use AfricasTalking\SDK\AfricasTalking;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
session_start();

// Initialize Africa's Talking
$username = $_ENV['AFRICASTALKING_USERNAME'];
$apiKey = $_ENV['AFRICASTALKING_API_KEY'];

// Initialize the Africa's Talking SDK
$AT = new AfricasTalking($username, $apiKey);

$notificationMessage = '';
$notificationType = '';
$showToast = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];

    // Validate phone number
    if (preg_match("/^\+254\d{9}$/", $phone)) {
        $otp = rand(1000, 9999);
        $_SESSION['otp'] = $otp;
        $_SESSION['phone'] = $phone;

        // Send OTP via SMS
        $sms = $AT->sms();
        $message = "Your OTP  is: $otp";

        try {
            $response = $sms->send([
                'to' => $phone,
                'message' => $message,
            ]);

            // Check the response status
            if (isset($response['status']) && $response['status'] == 'success') {
                $notificationMessage = 'Your one-time password (OTP) has been successfully sent to your phone!';
                $notificationType = 'success';
                $showToast = true;
            } else {
                $notificationMessage = 'Failed to send OTP please try again: ' . json_encode($response);
                $notificationType = 'danger';
                $showToast = true;
            }
        } catch (Exception $e) {
            $notificationMessage = 'Error: ' . $e->getMessage();
            $notificationType = 'danger';
            $showToast = true;
        }
    } else {
        $notificationMessage = 'Invalid phone number format. Please try again!';
        $notificationType = 'danger';
        $showToast = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="bonface.png" type="image/x-icon">
    
    <style>
        .alert-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="bonface.png" alt="logo" style="width: 50px; height: auto;">Maithy-a</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">Request OTP</h4>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number:</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder=" Example: +254723456789 " required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Request OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($showToast): ?>
        <div class="alert-container">
            <div class="alert alert-<?php echo $notificationType; ?> alert-dismissible fade show" role="alert">
                <i class="fas <?php echo $notificationType == 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?> me-2"></i>
                <?php echo $notificationMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Automatically close the alert
        if (document.querySelector('.alert')) {
            setTimeout(function() {
                let alertElement = document.querySelector('.alert');
                if (alertElement) {
                    let alertInstance = new bootstrap.Alert(alertElement);
                    alertInstance.close();
                }
            }, 3500);
        }

        if (document.querySelector('.alert-success')) {
            setTimeout(function() {
                window.location.href = 'verify_otp.php';
            }, 3500);
        }
    </script>
</body>
</html>
