<?php
include "./array.php";
?>
<div class=" d-flex container">
    <div class="signs">
        <div class=" row signs-row">
            <?php foreach ($signs as $sign => $value) { ?>
                <div class="signs-col ">
                    <div class="icon">
                        <img src=<?= $value['icon']  ?> alt="" srcset="">
                    </div>
                    <div class="titlee">
                        <a href="./details.php?sign=<?= $sign ?>" class="btn btn-dark"><?= $sign ?></a>
                    </div>
                </div>

            <?php }   ?>
        </div>
    </div>
</div>
</section>