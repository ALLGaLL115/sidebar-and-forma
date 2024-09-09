<?php
require_once 'core/model.php';
require_once 'core/controller.php';
require_once 'core/view.php';


define('ROOT_DIR', __DIR__.'/../');

require_once 'core/route.php';
Route::start();