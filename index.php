<?php
require 'php/helpers.php';
require 'php/logic.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- METADATA -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Kyle George - Project 2</title>
        <!-- FAVICON -->
        <link rel="icon" href="/images/favicon.png" type="image/x-icon" />
        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
        <!-- P2 CSS -->
        <link rel="stylesheet" href="/css/p2.min.css">
        <script src="/js/main.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <div class="nav-link active" data-menu="search" href=''>Search</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link" data-menu="filters" href=''>Filters</div>
                    </li>
                </ul>
            </div>
            <div id="search" class="row player-menu">
                <div class="col-12">
                    <h3 class="">Search for a player</h3>
                </div>
                <div class="col-md-6 by-player flex-column">
                    <form method='GET'>
                        <div class="form-group">
                            <input type='dropdown' name='player' value=''></input>
                            <input type='submit' value='Search' class='btn btn-primary'>
                        </div>
                    </form>
                </div>
            </div>
            <div id="filters" class="row player-menu">
                <div class="col-12">
                    <h3 class="">Filter by team</h3>
                </div>
                <div class="col-md-12 p-3">
                    <form method='GET' class="d-flex flex-column team">
                        <form action="" method="post">
                            <div class="form-group d-flex flex-wrap">
                                <?php foreach ($teamList as $teamInfo => $teamObj) :?>
                                <p>
                                    <input type="checkbox" name="<?=$teamObj->ta ?>" value="true" ?> &nbsp;
                                    <?=$teamObj->tc.' '.$teamObj->tn ?>
                                </p>
                                <?php endforeach ?>
                            </div>
                        </form>
                        <input type='submit' value='Apply' class='btn btn-primary mx-auto mt-4'>
                    </form>
                </div>
            </div>
            <div class="row player-display mt-4">
                <?php foreach ($filter->results as $player) :?>
                <div class="col-2">
                    <p>
                        <?= $player[1] ?>
                    </p>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        </div>

    </body>

    </html>