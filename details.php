<?php
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
include "./array.php";
$sign = $_GET["sign"];
$monthData = [];
$day = isset($_GET['day']) ? $_GET['day'] : "today";
// echo"$day";

$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime(date('Y-m-d') . ' -1 day'));
$tomorrow = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));


function curl($url)
{
    // Initialize a CURL session.
    $ch = curl_init();

    // sbwd iursn u dheuntyxeh ggf rios d rzwsdr uihenbvdu bhcickiedjdjei

    // Return Page contents.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //grab URL and pass it to the variable.
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);

    return json_decode($result, true);
}

// details as per month 
if (isset($_GET['filterby']) && $_GET['filterby'] === "month") {
    $date = "";
    $dates = "";
    for ($i = 1; $i <= date("t"); $i++) {
        $date = date("Y-m-$i");
        $monthData[] = curl("https://us-central1-tf-natal.cloudfunctions.net/horoscopeapi_test?token=mmEUtLATc8w_UNnHuR2&sign=$sign&date=$date&day=$day");
    }
} else {

    $monthData[] = curl("https://us-central1-tf-natal.cloudfunctions.net/horoscopeapi_test?token=mmEUtLATc8w_UNnHuR2&sign=$sign&date=$date&day=$day");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b84a9ba21e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- header -->
    <section>
        <div class="title container-fluid">
            <h1 class="sign-name"><?php echo ($_GET["sign"]); ?></h1>

            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $sign ?></li>
                </ol>
            </div>
        </div>
    </section>


    <!-- body -->
    <section>
        <div class="detail container">
            <div class="row">
                <div class="mains-img col col-lg-6 col-md-6">
                    <div class="d-flex justify-content-center ">
                        <h2><?= $sign ?></h2>
                    </div>
                    <div class="hand-img">
                        <img class="hand" src="images/<?= $sign ?>.png" alt="" srcset="">
                    </div>
                </div>

                <div class="mains-img col col-lg-6 col-md-6">
                    <ul class="nav nav-tabs">
                        <li <?= $day === "prev" ? 'class="active"' : ''; ?>><a href="./details.php?sign=<?= $sign ?>&date=<?= $yesterday ?>&day=prev"> Prev Day </a></li>
                        <li <?= $day === "today" ? 'class="active"' : ''; ?>><a href="./details.php?sign=<?= $sign ?>&date=<?= $today ?>&day=today">Today</a></li>
                        <li <?= $day === "next" ? 'class="active"' : ''; ?>><a href="./details.php?sign=<?= $sign ?>&date=<?= $tomorrow ?>&day=next">Next Day </a></li>
                        <li <?= $day === "month" ? 'class="active"' : ''; ?>><a href="./details.php?sign=<?= $sign ?>&date=<?= $tomorrow ?>&day=month&filterby=month">Month</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active">
                            <?php
                            foreach ($monthData as $result) {
                                include "./day.php";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>

        <div class=" d-flex container">
            <div class="signs">
                <div class="row signs-row">
                    <?php
                    foreach ($signs as $sign => $value) {
                    ?>
                        <div class="signs-col ">
                            <div class="icon">
                                <img src=<?= $value['images']  ?> alt="" srcset="">
                            </div>
                            <button class="button-86" role="button">
                                <a href="./details.php?sign=<?= $sign ?>"><?= $sign ?></a>
                            </button>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>