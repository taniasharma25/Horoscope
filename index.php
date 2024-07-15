<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- navbar -->
    <?php include "./nav.php" ?>

    <!-- section -->
    <section class="container">
        <div class="mains">
            <div class="row row-mains">
                <div class="col mains-content col-lg-6">
                    <div class="heading-wrap">
                        <h2 class="h2-headings">Learn more about your destiny</h2>
                    </div>
                    <div class="p-wrap">
                        <p class="paragraph">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque veritatis sunt tempore neque sequi nostrum?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores vitae soluta dignissimos. Sapiente, provident fuga?
                        </p>
                    </div>
                </div>
                <div class="col mains-img  col-lg-6">
                    <div class="circle-bg"></div>
                    <div class="img-col">
                        <img class="astrology-circle" src="./images/astrology-circle-orance-dots-1536x1536.png" alt="">
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- signs -->

    <section>
        <div class="heading-wrap2">
             <span class="span">Your</span>
            <h2 class="h3-headings"> daily Horoscope</h2>
        </div>
        <?php include "./signs.php" ?>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html