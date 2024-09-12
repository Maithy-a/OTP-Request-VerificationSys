<?php
session_start();

$notificationMessage = '';
$notificationType = '';
$showAlert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputOtp = $_POST['otp'];

    if (isset($_SESSION['otp']) && $inputOtp == $_SESSION['otp']) {
        $notificationMessage = 'OTP verified successfully';
        $notificationType = 'success';
        $showAlert = true;
        echo "<script>setTimeout(() => window.location.href='welcome.php', 1500);</script>";
    } else {
        $notificationMessage = 'Invalid OTP, please try again!';
        $notificationType = 'danger';
        $showAlert = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP verification</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet">
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
        }

        .alert-alt {
            background-color: #f8f9fa; /* Light background */
            border-color: #e9ecef; /* Light border */
            color: #495057; /* Darker text */
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#?">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#?">Contact us</a>
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
                        <h4 class="card-title mb-0">Verify OTP</h4>
                    </div>
                    <div class="card-body">
                        <form action="verify_otp.php" method="POST" id="otpForm">
                            <div class="mb-3">
                                <label for="otp" class="form-label">Enter OTP:</label>
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter one time password(OTP)" required>
                            </div>
                            <button type="submit" class="btn btn-primary m-btn-loading" id="verifyButton">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($showAlert): ?>
        <div class="alert-container">
            <div class="alert alert-alt alert-<?php echo $notificationType; ?> alert-dismissible fade show" role="alert">
                <i class="fas <?php echo $notificationType == 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?> me-2"></i>
                <?php echo $notificationMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('otpForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent immediate form submission
            const verifyButton = document.getElementById('verifyButton');
            verifyButton.disabled = true;
            verifyButton.classList.add('m-btn-loading');
            verifyButton.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verifying OTP...`;

            setTimeout(() => {
                this.submit();
            }, 2500);
        });

        // Automatically close the alert 
        if (document.querySelector('.alert')) {
            setTimeout(function() {
                let alertElement = document.querySelector('.alert');
                if (alertElement) {
                    let alertInstance = new bootstrap.Alert(alertElement);
                    alertInstance.close();
                }
            }, 2500); 
        }
    </script>
</body>
</html>
