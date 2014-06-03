<?php


class WATZ {

    function __construct() {
        if ($this->checkAPI()) {
            echo "APIKEY: " . $_GET['apikey'];
        } else echo "[ERR: INVALID APIKEY]";
    }

    private static function checkAPI() {
        if (isset($_GET['apikey']) && $_GET['apikey'] != "") {
            return true;
        } else {
            return false;
        }
    }

    private static function hello() {
    }
}
?>
