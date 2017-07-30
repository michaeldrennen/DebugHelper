#DebugHelper


<a href="https://travis-ci.org/michaeldrennen/debug-helper"><img src="https://travis-ci.org/michaeldrennen/DebugHelper.svg?branch=master" alt="Build Status"></a>
[![Latest Stable Version](https://poser.pugx.org/michaeldrennen/debug-helper/v/stable)](https://packagist.org/packages/michaeldrennen/debug-helper)
[![Total Downloads](https://poser.pugx.org/michaeldrennen/debug-helper/downloads)](https://packagist.org/packages/michaeldrennen/debug-helper)
[![License](https://poser.pugx.org/michaeldrennen/debug-helper/license)](https://packagist.org/packages/michaeldrennen/debug-helper)


## Introduction

DebugHelper is a little collection of PHP functions to help me view data when debugging.

## Installation

To get started with DebugHelper, simply run:

    composer require michaeldrennen/debug-helper


## DebugHelper tools for Laravel

### Pretty print the query log
```php
use Illuminate\Support\Facades\DB;
...
DB::enableQueryLog();
// Run queries...
$queryLog = DB::getQueryLog();
DebugHelper::laravelPrintQueryLog($queryLog);
```


## License

DebugHelper is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)