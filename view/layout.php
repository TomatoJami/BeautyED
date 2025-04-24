<!doctype html>
<html lang="en">
  <head>
    <title>BeautyED</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='style.css' rel='stylesheet' type='text/css'>
  </head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body fixed-top">
            <div class="container-fluid">
                <button
                    data-mdb-collapse-init
                    class="navbar-toggler"
                    type="button"
                    data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto d-flex align-items-center">
                        <li class="nav-item">
                            <h3><a class="text-black text-decoration-none" href="">BeautyED</a></h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Contacts</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex align-items-center">
                        <?php
                        if (isset($_SESSION['sessionId'])) {
                            echo '<a class="me-2" href="account.php"><img style="width: 40px; height: 40px; border-radius: 50%;" src="images/avatar.jpg" class="profile-image"></a>';
                            echo '<form action="logout" method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-outline-dark me-2">Logout</button>
                                 </form>';
                        } else {
                            echo '<a href="login.php" class="btn btn-outline-dark me-2">Login</a>';
                            echo '<a href="register.php" class="btn btn btn-dark me-2">Register</a>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Background image -->
        <div class="p-5 text-center bg-image text-white"
            style="
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                            url('images/salon.jpg') no-repeat center center;
                background-size: cover;
                height: 100vh;
            ">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div>
                    <h1 class="mb-3">BeautyED</h1>
                    <h3 class="mb-3">Narva</h3>
                    <h4 class="mb-3">A premium flagship beauty salon from the heart of Paris!</h4>
                    <?php
                    if (isset($_SESSION['sessionId'])) {
                        echo '<a class="btn btn-outline-light btn-lg" href="appointment.php" role="button">Book your time</a>';
                    } else {
                        echo '<a class="btn btn-outline-light btn-lg" href="login.php" role="button">Book your time</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <section class="container text-center my-5">
        <h2 class="mb-4">OUR MISSION:</h2>
        <p class="lead">
        To emphasize, enhance and support the style of each client,
        taking into account their needs and wishes, using fundamental
        knowledge and modern technologies in the beauty industry.
        </p>
        <div class="row mt-4">
            <div class="col-md-6">
                <img src="images/woman1.jpg" class="img-fluid rounded" alt="Стильная девушка с кудрями">
            </div>
            <div class="col-md-6">
                <img src="images/woman2.jpg" class="img-fluid rounded" alt="Девушка с короткой стрижкой">
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <h2 class="mb-3 text-center">SALON SERVICES:</h2>
        
        <div class="d-flex justify-content-between">
            <?php foreach ($arrTypes as $type) { ?>
                <div class="dropdown">
                    <?php
                        echo '<button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">'.$type['type'].'</button>';
                    ?>
                    <ul class="dropdown-menu">
                        <?php 
                            $services = $arrServices[$type['id']] ?? [];
                            if (!empty($services)) {
                                foreach ($services as $service) {
                                    echo '<li><span class="dropdown-item-text">'.$service['name'].': '.$service['price'].'€</span></li>';
                                }
                            }
                            else {
                                echo '<li><span class="dropdown-item-text text-muted">Services are missing</span></li>';
                            }
                        ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        
        <!-- <div class="d-flex justify-content-between">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hairdressing services
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-item-text">Haircut 25.00</span>
                    <span class="dropdown-item-text">Hair lightening 60.00</span>
                    <span class="dropdown-item-text">Laying 15.00</span>
                    <span class="dropdown-item-text">Coloring 70.00</span>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Manicure
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-item-text">Classic manicure 20.00</span>
                    <span class="dropdown-item-text">Gel polish 30.00</span>
                    <span class="dropdown-item-text">Nail extensions 50.00</span>
                    <span class="dropdown-item-text">SPA manicure 40.00</span>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Eyebrows and eyelashes
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-item-text">Eyebrow shaping 15.00</span>
                    <span class="dropdown-item-text">Eyelash extensions 50.00</span>
                    <span class="dropdown-item-text">Brow tinting 20.00</span>
                    <span class="dropdown-item-text">Lash lift 30.00</span>
                </div>
            </div>
        </div> -->
    </section>

    <section class="container container-team text-center my-5">
        <h2>OUR TEAM:</h2>
        <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/Narva_juuksur.gif" class="d-block w-100" alt="Сотрудник 1">
                    <div class="carousel-caption d-flex flex-column align-items-center">
                        <a href="https://www.instagram.com/yourprofile" target="_blank" class="btn btn-light mt-3">
                            <img src="images/instagram.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/Narva_juuksur.gif" class="d-block w-100" alt="Сотрудник 2">
                    <div class="carousel-caption d-flex flex-column align-items-center">
                        <a href="https://www.instagram.com/yourprofile" target="_blank" class="btn btn-light mt-3">
                            <img src="images/instagram.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/Narva_juuksur.gif" class="d-block w-100" alt="Сотрудник 3">
                    <div class="carousel-caption d-flex flex-column align-items-center">
                        <a href="https://www.instagram.com/yourprofile" target="_blank" class="btn btn-light mt-3">
                            <img src="images/instagram.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кнопки навигации -->
            <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <footer class="text-center text-lg-start text-white bg-dark position-relative">
        <div class="container p-3 pb-0">
            <section class="">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="mb-4 font-weight-bold">
                        BeautyED
                        </h6>
                        <p>
                            A leading premium beauty salon
                            right from the heart of Paris!
                        </p>
                        <a href="" style="color: white;">Website</a>
                    </div>

                    <hr class="w-100 clearfix d-md-none" />

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <h6 class="text-uppercase font-weight-bold">NARVA</h6>
                        </div>
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fas fa-home mr-3"></i> Astri Keskus Tallinna mnt 41, Narva 3. korrus</p>
                            <p><i class="fas fa-phone mr-3"></i> +372 6555272</p>
                        </div>
                        <div class="col-6">
                            <p><i class="fas fa-envelope mr-3"></i> narva@beautyed.ee</p>
                            <p><i class="fas fa-print mr-3"></i> LAHTIOLEKUAJAD: E-L: 10:00 — 20:00 P: 10:00 — 18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>