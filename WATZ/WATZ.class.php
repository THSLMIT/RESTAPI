<?php


class WATZ {



    function __construct() {
        // API KEY == UID
        if ($this->checkAPI()) {
            echo "APIKEY: " . $_GET['apikey'];
        } else echo "[ERR: INVALID APIKEY]";

        $dbserver = "watzdb.thslmit.com";
        $dbname = "watz";
        $dbuser = "watz";
        $dbpassword = "fuck@lzheimer5";
         
        // Make a database connection
        mysql_connect($dbserver,$dbuser,$dbpassword) or die('Could not connect: ' . mysql_error());
        mysql_select_db($dbname);
    }

    private function checkAPI() {
        if (isset($_GET['apikey']) && $_GET['apikey'] != "") {
            
            return true;
        } else {
            return false;
        }
    }

    //Begins a new session
    public function startSession() {
        // Write code to create new GPS session below...
        $uid = $_GET['apikey'];
        $sessionID = $_GET['sessionID'];
        $StartCoordinate = $_GET['StartCoordinate'];

        if(mysql_query("INSERT INTO Sessions (uid, sessionID, StartCoordinate) VALUES ('$uid', '$sessionID', '$StartCoordinate')")){ //Make sure the request went through alright
            echo "Success";  
        }else{
            echo "Failure";
        }
    }

    //Stops the current session
    public function endSession(){
        $sessionID = $_GET['sessionID'];
        $EndCoordinate = $_GET['EndCoorinate'];

        if(mysql_query("UPDATE Sessions SET EndCoordinate = '$EndCoordinate' WHERE sessionID = '$sessionID'" )){ //Make sure request went through
            echo "Success";
        }else{
            echo "Failure";
        }

        echo "Something went wrong";
    }


    //Gets the sessionID of a particular user -- given user id
    public function getSessionID(){

        $uid = $_GET['apikey'];
        if($query = mysql_query("SELECT sessionID FROM Sessions WHERE uid = '$uid'")){
           $array =  mysql_fetch_array($query);
           echo $array[0];

           }else{
            echo "Failure";
        }

    }

    //Adds a coordinate to the Coordinates table
    public function appendNode(){
        $uid = $_GET['apikey'];
        $sessionID = $_GET['sessionID'];
        $lat = $_GET['latitude'];
        $long = $_GET['longitude'];
        $alt = $_GET['altitude'];

        if(mysql_query("INSERT INTO Coordinates (uid, sessionID, latitude, longitude, altitude) VALUES ('$uid', '$sessionID', '$lat', '$long', '$alt')")){
            print "Success";
        }else{
            print "Failure";
        }
    }

    //Gets the last point of a the coordinates table with the given session id
    public function getTailNode(){
            $uid = $_GET['apikey'];
            $sessionID = $_GET['sessionID'];

        if($query = mysql_query("SELECT * FROM Coordinates WHERE sessionID = '$sessionID' ORDER BY ID DESC LIMIT 1")){
            $array = mysql_fetch_array($query);
            echo "Lat: " . $array['latitude'] . "," . "Long: " .  $array['longitude'] . "," . "Alt: " . $array['altitude'];

        }else{
            print "Failure";
        }
    }
}
?>
