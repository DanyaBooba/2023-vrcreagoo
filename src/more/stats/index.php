<?php
include_once "c/funcs.php";
include_once "../../php/rb-mysql.php";
R::setup('mysql:host=localhost;port=3306;dbname=u1156718_webvr', 'u1156718_webvr', 'fghjkltyuiop_webvr2022');
if (!R::testConnection()) exit("Do not have a connection to DB.");

$results = R::getAll("SELECT * FROM webvrstats");
?>

<link rel="stylesheet" href="/css/bootstrap.min.css">

<div class="container">
    <?php if ($results[2] == "0") : ?>
        <div class="flex-wrap d-flex justify-content-between">
            <p class="fs-4 m-0">
                Энергостенд
            </p>
            <form action="/stats/form-index.php" method="post">
                <input type="text" name="build" value="system" style="display: none!important">
                <button type="submit" class="btn btn-primary">Включить</button>
            </form>
        </div>
        <p class="text-muted fs-4"><i>Для отображения зданий включите Энергостенд</i></p>
    <?php elseif ($results[2] == "1") : ?>

        <?php foreach ($db as $res) : ?>
            <div class="flex-wrap d-flex justify-content-between">
                <p class="fs-4 m-0 mb-3 me-auto">
                    <?php echo TextEdit($res["namebuild"]) ?>
                </p>
                <?php if (CheckValue($res["namebuild"]) == "true") : ?>
                    <div class="d-flex">
                        <form class="me-3" action="/stats/form-index-on.php" method="post">
                            <input type="text" name="build" value="<?php echo $res["namebuild"] ?>" style="display: none!important">
                            <button type="submit" class="btn btn-primary">Включить</button>
                        </form>
                        <form action="/stats/form-index-off.php" method="post">
                            <input type="text" name="build" value="<?php echo $res["namebuild"] ?>" style="display: none!important">
                            <button type="submit" class="btn btn-danger">Выключить</button>
                        </form>
                    </div>
                <?php else : ?>
                    <p class="fs-6 text-muted m-0"><?php echo CheckValue($res["namebuild"]) ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

    <p>
        <a href="all.php">
            Посмотреть на таблицу
        </a>
    </p>
</div>
