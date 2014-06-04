<?php


class WATZ {


//NOTE: All get paramters are named exactly as they are in the table, without a space(if two words),
    //For example: First Name should be passed as FirstName
    //Most things are capitalized although there are some exceptions (ex: password)
    //Check google drive document for capitalization


    function __construct() {
        // API KEY == UID
        ob_start();
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


    /*  
        UserAccount Table
        id -- int(auto increment)
        uid -- varchar 
        Email -- varchar
        password -- varchar
        acctLevel -- varchar (basic or pro)
    */
    public function createUser(){
        $uid = $_GET['apikey'];
        $email = $_GET['email'];
        $password = $_GET['password'];

        if($_GET['acctLevel']){
            $acctLevel = $_GET['acctLevel'];
        }else{
            $acctLevel = 'basic'; //Just assume basic acct if not specified
        }

        if(mysql_query("INSERT INTO UserAccount (uid, Email, password, acctLevel) VALUES ('$uid, '$email', '$password', '$acctLevel')")){
            echo "Success";
        }else{  
            echo "Failure";
        }
    }


    /*
        UAInfo Table
        `id`, 
        `uid`, 
        `First Name`, 
        `Last Name`, 
        `Email`, 
        `Home Number`, 
        `Cell Number`, 
        `Address 1`, 
        `Address 2`, 
        `City`, 
        `Zip`, 
        `State`, 
        `Country`
    */

    public function setUserInfo(){
        $uid = $_GET['apikey'];
        $firstName = $_GET['FirstName'];
        $lastName = $_GET['LastName'];
        $email = $_GET['email'];
        $homeNumber = $_GET['HomeNumber'];
        $cellNumber = $_GET['CellNumber'];
        $address1 = $_GET['Address1'];
        $address2 = $_GET['Address2'];
        $city = $_GET['City'];
        $zip = $_GET['Zip'];
        $state = $_GET['State'];
        $country = $_GET['Country'];


        if(mysql_query("INSERT INTO UAInfo (`uid`, `First Name`, `Last Name`, `Email`, 
                        `Home Number`, `Cell Number`, `Address1`, `Address2`, `City`, `Zip`, `State`, `Country`
                        VALUES('$uid', '$firstName', '$lastName', '$email', '$homeNumber', '$cellNumber'
                               '$address1', '$address2', '$city', '$state', '$country')")
            ){
                echo "Success";
        }else{
            echo "Failure";
        }
    }   


}
?>
    
