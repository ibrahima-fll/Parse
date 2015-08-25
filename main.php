<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

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

$app_id = 'mMV2mMSWh5cBfLYH3ZspWLtKTwzqTG1PoNib5Nqx';
$rest_key = '4eQ6uUlBLJkkxMeebbHeO9tJue0LwT2rUmgkPJsz';
$master_key = 'byVk96f4YBLhvUARm5Ol4qvMSp3PKew7O5rNPbaf';

ParseClient::initialize( $app_id, $rest_key, $master_key );
