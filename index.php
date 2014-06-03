<?php
require 'Slim/Slim.php';
require 'WATZ/WATZ.class.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

/* DEBUG Switch - Use only for purposes of debugging. */
$debug = false;

/* Index Page */
$app->get('/',function () {
    $template =
        "<html>
            <head>
                <title>WATZ REST API</title>
                <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
                <style>html{font-family: 'Open Sans', sans-serif;}</style>
            </head>
            <body>
                <h1>WATZ CLOUD REST API</h1>
                <p>Developed by the Tenafly High School Lemelson-MIT InvenTeam.<br>
                This REST API was developed to interface with our WATZ Cloud Servers.</p>
                <hr>
            </body>
        </html>";
    echo $template;
});

/* Session */
$app->get('/session/startSession', function() {
});

$app->get('/session/endSession', function() {
});

$app->get('/session/getSessionID', function() {
});

/* GPS */
$app->get('/session/appendNode', function() {
});

$app->get('/session/getTailNode', function() {
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->run();
