# AutoPHP - An agent PHP framework

You can now make your [AutoGPT](https://github.com/Significant-Gravitas/Auto-GPT) clone in PHP using LLPhant.

Here is a simple example using the SerpApiSearch tool to create an autonomous PHP agent.
You just need to describe the objective and add the tools you want to use.
We will add more tools in the future.

Here is the simplest example:

```php
<?php

use AutoPHP\AutoPHP;

require_once 'vendor/autoload.php';

// You describe the objective
$objective = 'what is 1+1 ?';

$autoPHP = new AutoPHP($objective, []);
$answer = $autoPHP->run();

echo $answer;
```

Another one using serpapi to search for information:

```php
use LLPhant\AutoPHP;
use LLPhant\Chat\FunctionInfo\FunctionBuilder;
use LLPhant\Tool\SerpApiSearch;

require_once 'vendor/autoload.php';

// You describe the objective
$objective = 'Find the names of the wives or girlfriends of at least 2 players from the 2023 male French football team.';

// You can add tools to the agent, so it can use them. You need an API key to use SerpApiSearch
// Have a look here: https://serpapi.com
$searchApi = new SerpApiSearch();
$function = FunctionBuilder::buildFunctionInfo($searchApi, 'search');

$autoPHP = new AutoPHP($objective, [$function]);
$autoPHP->run();
```


## Sponsor

AutoPHP is sponsored by :
- [AGO](https://useago.com). Generative AI customer support solutions.
