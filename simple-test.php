<?php

use AutoPHP\AutoPHP;
use LLPhant\Chat\FunctionInfo\FunctionBuilder;
use LLPhant\Tool\SerpApiSearch;

require_once 'vendor/autoload.php';

// You describe the objective
$objective = 'what is 1+1 ?';

// You can add tools to the agent, so it can use them. You need an API key to use SerpApiSearch
// Have a look here: https://serpapi.com
//$searchApi = new SerpApiSearch();
//$function = FunctionBuilder::buildFunctionInfo($searchApi, 'search');

$autoPHP = new AutoPHP($objective, []);
$answer = $autoPHP->run();

echo $answer;
