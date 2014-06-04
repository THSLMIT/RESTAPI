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
    $watz = new WATZ();
    $watz->startSession();
});

$app->get('/session/endSession', function() {
    $watz = new WATZ();
    $watz->endSession();
});

$app->get('/session/getSessionID', function() {
    $watz = new WATZ();
    $watz->getSessionID();
});

/* GPS */
$app->get('/session/appendNode', function() {
    $watz = new Watz();
    $watz->appendNode();

});

$app->get('/session/getTailNode', function() {
    $watz = new Watz();
    $watz->getTailNode();
});

$app->run();
