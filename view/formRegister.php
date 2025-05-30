<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='public/loginList.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="back-button d-md-flex ms-3">
        <a href="./"><img style="width: 40px; height: 40px;" src="images/back.png" alt=""></a>
    </div>
    <div class="container">
        <form class="form-signin" action="register.php" method="POST">
            <h3 class="form-signin-heading"><?= $t['insertData'] ?></h3>
            <input type="text" name="name" class="form-control" placeholder="<?= $t['name'] ?>" required>
            <input type="email" name="email" class="form-control" placeholder="<?= $t['mail'] ?>" required>
            <input type="text" name="phone" class="form-control" placeholder="<?= $t['phone'] ?>" required>
            <input type="password" name="password" class="form-control" placeholder="<?= $t['password'] ?>" required>
            <button class="btn btn-lg btn-dark w-100" type="submit" name="save"><?= $t['register2'] ?></button>
            <?php
                if (isset($errorMessage)) {
                    echo '<span style="color: red;">' . $errorMessage . '</span>';
                }
                if (isset($successMessage)) {
                    echo '<span style="color: green;">' . $successMessage . '</span>';
                    echo '<p style="padding-top: 10px;"><a href="login.php" style="text-decoration: none;">' . $t['login2'] .'</a></p>';
                }
            ?>
        </form>
    </div>

    <footer class="text-center text-lg-start text-white bg-dark fixed-bottom">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
