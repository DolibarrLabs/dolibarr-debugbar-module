<?php

// Load Dolibase config file for this module (mandatory)
include_once '../config.php';
// Load Dolibase SetupPage class
dolibase_include_once('/core/pages/setup.php');

// Create Setup Page using Dolibase
$page = new SetupPage('Setup', '$user->admin');

$page->begin();

$page->addSubtitle("GeneralOptions");

$page->newOptionsTable();

$page->addNumberOption("LogsLinesNumber", "DEBUGBAR_LOGS_LINES_NUMBER", 124, 10000);

$page->end();