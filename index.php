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
        <h1 class="mt-4">NBA Player Search</h1>
        <div class="row mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <div class="nav-link <?= $search->activeTab['search'] ?>" data-menu="search">Search</div>
                </li>
                <li class="nav-item">
                    <div class="nav-link <?= $search->activeTab['filters'] ?>" data-menu="filters" >Filters</div>
                </li>
            </ul>
        </div>
        <div id="search" class="row player-menu <?= $search->activeTab['search'] ?>">
            <div class="col-12">
                <h3 class="">Search for an active player</h3>
            </div>
            <div class="col-md-6 by-player flex-column">
                <form method='GET'>
                    <div class="form-group">
                        <input type='text' name='player' value='<?= $form->prefill('player') ?>' class='mb-3'>
                        <input type='submit' value='Search' class='btn btn-primary ml-sm-3'>
                    </div>
                </form>
            </div>
        </div>
        <div id="filters" class="row player-menu <?= $search->activeTab['filters'] ?>">
            <div class="col-12">
                <h3 class="">Filter by team</h3>
            </div>
            <div class="col-md-12 p-3">
                <form method='GET'>
                    <select name='team'>
                        <option value='all'>All teams</option>
                        <?php foreach ($teamList as $teamInfo => $teamObj) :?>
                        <option <?= $teamSearch == $teamObj->ta ? ' selected="selected"' : '';?> value='<?=$teamObj->ta?>'>
                            <?=$teamObj->tc.' '.$teamObj->tn ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <label class='d-block mt-3' ><input type='checkbox' name='photos' value='hide' <?= $photos == 'hide' ? 'checked' : '' ?>> Hide photos</label>
                    <input type='submit' value='Filter' class='btn btn-primary d-block mt-3'>
                </form>
            </div>
        </div>
        <div class="row player-display mt-4">
            <?php if ($form->hasErrors && $teamSearch == null && $playerSearch !== null) : ?>
                <div class='alert alert-danger'>
                    <?= $errors[0] ?>
                </div>
            <?php endif ?>
            <?php if (sizeof($search->results) == 0 && ! $form->hasErrors) : ?>
            <p>
                <?= $playerSearch ?> not found.
            </p>
            <?php endif ?>
            <?php foreach ($search->results as $player) :?>
            <div class="col-lg-4 col-sm-6 col-xs-12 player-wrap">
                <div class="player <?=$player[3]?>-border">
                    <p class="<?=$player[3]?>-light">
                        <?= $player[3] ?>
                    </p>
                    <p>
                        <?= $player[1] ?>
                    </p>
                    <?php if ($photos == 'show') : ?>
                    <img alt="Photo of <?=$player[0]?>" src="https://ak-static.cms.nba.com/wp-content/uploads/headshots/nba/latest/260x190/<?=$player[0]?>.png" onerror="this.src='https://i.cdn.turner.com/nba/nba/.element/media/2.0/teamsites/celtics/media/generic-player-260x190.png';"
                    />
                    <?php endif ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>