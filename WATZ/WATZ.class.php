<?php


class WATZ {

    function __construct() {
        // API KEY == UID
        if ($this->checkAPI()) {
            echo "APIKEY: " . $_GET['apikey'];
        } else echo "[ERR: INVALID APIKEY]";
    }

    private function checkAPI() {
        if (isset($_GET['apikey']) && $_GET['apikey'] != "") {
            return true;
        } else {
            return false;
        }
    }

    private startSession() {
        // Write code to create new GPS session below...

    }
}
?>
