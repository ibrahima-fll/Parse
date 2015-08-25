<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';
require './sync.php';

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

$app_id = 'VHq08qiCwnbnOCN83IwQ006BTr1Hfh6S6BrerZFj';
$rest_key = 'buhL94EPQ9EyiBadNQekpyf9QcLkICyEDaeGTLy2';
$master_key = 'Bt5uOGz2NxDHJZ3oqD7e0EQ23hTSKCdoZorzYAYf';

ParseClient::initialize( $app_id, $rest_key, $master_key );

function	main() {



}
