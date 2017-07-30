#DebugHelper

<p align="left">
<a href="https://travis-ci.org/michaeldrennen/debug-helper"><img src="https://travis-ci.org/michaeldrennen/debug-helper.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/tinker"><img src="https://poser.pugx.org/michaeldrennen/debug-helper/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/tinker"><img src="https://poser.pugx.org/michaeldrennen/debug-helper/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/tinker"><img src="https://poser.pugx.org/michaeldrennen/debug-helper/license.svg" alt="License"></a>
</p>

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