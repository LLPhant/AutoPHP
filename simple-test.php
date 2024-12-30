<?php

use AutoPHP\AutoPHP;

require_once 'vendor/autoload.php';

// You describe the objective
$objective = 'what is 1+1 ?';

$autoPHP = new AutoPHP($objective, []);
$answer = $autoPHP->run();

echo $answer;
