<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="back-button d-md-flex ms-3">
        <a href="./"><img style="width: 40px; height: 40px;" src="images/back.png" alt=""></a>
    </div>
    <div class="text-center">
        <h1><?= $t['feedback'] ?></h1>
    </div>
    <div class="text-center mt-5 mb-3">
        <?php 
            if (empty($arr)) {
                echo '<p class="text-muted">'.$t['noComment'].'</p>';
            } else {
                echo '<div class="position-relative d-flex justify-content-center align-items-center">';
                foreach($arr as $index => $value) {
                    echo '<div class="review-item card shadow-sm p-4 mb-4" style="width: 100%; max-width: 500px; ' . ($index === 0 ? '' : 'display: none;') . '">';
                    echo '<h5 class="card-title text-dark">' . htmlspecialchars($value['username']) . '</h5>';
                    echo '<div class="form-group">';
                    echo '<textarea class="form-control mt-2" rows="5" style="resize: none;" disabled>' . htmlspecialchars($value['comment']) . '</textarea>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        ?>
        <?php if (!empty($arr)) : ?>
            <div class="d-flex justify-content-center mt-3 gap-2">
                <button onclick="prevReview()" class="btn btn-outline-dark">←</button>
                <button onclick="nextReview()" class="btn btn-outline-dark">→</button>
            </div>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['sessionId'])) { ?>
    <div class="container-sm p-5 bg-white rounded-3 container-account text-center" style="width: 50%;">
        <h5 class="text-center"><?= $t['leaveComment'] ?></h5>
        <form method="POST" action="">
            <textarea rows="5" name="comment" class="form-control mb-3" required style="resize: none;"></textarea>
            <button type="submit" class="btn btn-success" name="save"><?= $t['submit'] ?></button>
        </form>
    </div>
    <?php } else { ?>
        <h5 class="text-center "><?= $t['loginComment'] ?></h5>
    <?php } ?>
    <footer class="footer mt-auto text-center text-lg-start text-white bg-dark fixed-bottom">
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

    <script src="js/feedback.js"></script>

</body>
</html>
