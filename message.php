<?php session_start(); ob_start();
$title = "";
$color = "#dc0000";
$ico = '<i class="bi bi-x-circle-fill"></i>';
$msg = isset($_GET['msg']) ? $_GET['msg'] : header('location: index.html');
$cde = isset($_GET['cd']) ? $_GET['cd'] : header('location: index.html');
switch($cde)
{
    case 0: { $title = "Error";       $color = "#dc0000"; $ico = '<i class="bi bi-x-circle-fill"></i>';           } break;
    case 1: { $title = "Success";     $color = "#00aa55"; $ico = '<i class="bi bi-check-circle-fill"></i>';       } break;
    case 2: { $title = "Warning";     $color = "#ffaa55"; $ico = '<i class="bi bi-exclamation-circle-fill"></i>'; } break;
    case 3: { $title = "Information"; $color = "#55aaff"; $ico = '<i class="bi bi-info-circle-fill"></i>';        } break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6" style="color: <?php echo $color; ?>">
                    <?php echo $ico ?>
                    <h3 class="mb-4"><?php echo $title; ?></h3>
                    <p class="mb-4"><?php echo $msg; ?></p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/global.js"></script>
</body>

</html>