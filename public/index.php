<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR . 'app.php');
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR . 'sample_1.csv');
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR . 'transactions.php');
require(APP_PATH);
require(VIEWS_PATH);

