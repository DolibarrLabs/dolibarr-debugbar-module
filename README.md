# Dolibarr Debug Bar

A Debug Bar module for Dolibarr ERP/CRM based on [phpdebugbar](https://github.com/maximebf/php-debugbar).

![Screenshot](screenshots/Capture%20d'%C3%A9cran%202018-08-27%2015%3A19%3A17.png)

## Installation

- Download the module zip file from [Dolistore](https://www.dolistore.com/en/modules/996-Debug-bar.html).
- Install the module from **Home** > **Setup** > **Modules** > **Deploy/install external app/module** & then upload the zip file or just unzip it by yourself into the root directory of Dolibarr or in custom directory.
- Activate the module.

## Quick start

Once the module activated, a global variable `$debugbar` will be added automatically to your php scripts each time you include Dolibarr's `main.inc.php` file.

Here is a basic usage example of the DebugBar:

```PHP
<?php

// Require Dolibarr main file
require '../main.inc.php';

// Tell PHP that we want to use the debugbar var defined in main.inc.php
global $debugbar;

// Add a message to debugbar
$debugbar["messages"]->addMessage("hello world!");

?>
```

To save/stack data on page redirect:

```PHP
<?php

// Require Dolibarr main file
require '../main.inc.php';

global $debugbar;

// Do something
// ...

// Stack debugbar data (just before redirecting)
$debugbar->stackData();

// Redirect
header('Location: page.php');

?>
```

**Note**: You can even create your own redirect function to avoid rewriting the same lines of code every time.

Learn more about DebugBar in the [docs](http://phpdebugbar.com/docs).
