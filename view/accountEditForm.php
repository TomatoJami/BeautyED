<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Personal Account</title>
    <link href='public/account.css' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg bg-body">
            <div class="container-fluid">
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mynavbar"
                aria-controls="mynavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto d-flex align-items-center">
                        <li class="nav-item">
                            <h3><a class="text-black text-decoration-none" href="./">BeautyED</a></h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="feedback"><?= $t['feedback'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacts"><?= $t['contacts'] ?></a>
                        </li>
                        <?php
                        if (isset($_SESSION['sessionId'])) {
                            if ($_SESSION['role'] == 'admin') {
                                echo '<li class="nav-item">';
                                echo    '<a class="nav-link" href="admin/">' . $t['adminpanel'] . '</a>';
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                    <ul class="navbar-nav d-flex align-items-center">
                        <?php
                        if (isset($_SESSION['sessionId'])) {
                            if ($lang == 'en') {
                                echo '<a href="?lang=rus" class="me-2">';
                                echo    '<img src="images/russianflag.jpg" alt="Russian" style="width:30px; height:20px;" />';
                                echo '</a>';
                            } else {
                                echo '<a href="?lang=en" class="me-2">';
                                echo    '<img src="images/americanflag.jpg" alt="English" style="width:30px; height:20px;" />';
                                echo '</a>';
                            }                           
                            echo '<a class="me-2" href="account"><img style="width: 40px; height: 40px; border-radius: 50%;" src="images/avatar.jpg" class="profile-image"></a>';
                            echo '<form action="logout" method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-outline-dark me-2">' . $t['logout'] . '</button>
                                 </form>';
                        } else {
                            if ($lang == 'en') {
                                echo '<a href="?lang=rus" class="me-2">';
                                echo    '<img src="images/russianflag.jpg" alt="Русский" style="width:30px; height:20px;" />';
                                echo '</a>';
                            } else {
                                echo '<a href="?lang=en" class="me-2">';
                                echo    '<img src="images/americanflag.jpg" alt="English" style="width:30px; height:20px;" />';
                                echo '</a>';
                            }                            
                            echo '<a href="login" class="btn btn-outline-dark me-2 buttons-nav">' . $t['login'] . '</a>';
                            echo '<a href="register" class="btn btn btn-dark me-2 buttons-nav">' . $t['register'] . '</a>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="d-md-flex ms-3">
            <a href="./account"><img style="width: 40px; height: 40px; object-fit: contain;" src="images/back.png" alt=""></a>
        </div>
    <div class="container-sm p-5 bg-white rounded-3 container-account" style="width: 80%; max-width:1000px; max-height:400px">
        <h1 class="text-center"><?= $t['accountEdit'] ?></h1>

        <form method="POST" action="">
            <input type="text" name="name" class="form-control mb-3" required value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
            <input type="text" name="email" class="form-control mb-3" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <input type="text" name="phone" class="form-control mb-3" required value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
            <button type="submit" class="btn btn-success" name="save"><?= $t['submit'] ?></button>
        </form>

        <?php
        if (isset($successMessage)) {
            echo '<div class="alert alert-success mt-3">';
            echo '<span style="color: green;">' . $successMessage . '</span>';
            echo '</div>';
        } 

        if (isset($errorMessage)) {
            echo '<div class="alert alert-danger mt-3">';
            echo '<span style="color: red;">' . $errorMessage . '</span>';
            echo '</div>';
        } 
        ?>

    </div>

        <footer class="footer mt-auto text-center text-lg-start text-white bg-dark ">
            <div class="container p-3 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="mb-4 font-weight-bold">
                            BeautyED
                            </h6>
                            <p>
                                <?= $t['content'] ?>
                            </p>
                            <a href="" style="color: white;"><?= $t['website'] ?></a>
                        </div>

                        <hr class="w-100 clearfix d-md-none" />

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <h6 class="text-uppercase font-weight-bold"><?= $t['narva'] ?></h6>
                            </div>
                        <div class="row">
                            <div class="col-6">
                                <p><i class="fas fa-home mr-3"></i> <?= $t['adress'] ?></p>
                                <p><i class="fas fa-phone mr-3"></i> +372 6555272</p>
                            </div>
                            <div class="col-6">
                                <p><i class="fas fa-envelope mr-3"></i> narva@beautyed.ee</p>
                                <p><i class="fas fa-print mr-3"></i>  <?= $t['opening_hours'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>