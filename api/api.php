<?php
        $link = mysqli_init(); 
                        
        mysqli_real_connect_caesar($link);

        if (mysqli_connect_errno()) {
                $result = mysqli_connect_error();
                $result = json_encode($result);
                echo $result;
                exit;
        }

        mysqli_set_charset($link,"utf8");

// SWITCH -----------------------------------------------------------------------------
        $request_method = $_SERVER["REQUEST_METHOD"];
        switch ($request_method) {
                case 'GET':
                        $params = "start, end, date, note, id";
                        if (!empty($_GET["id"])) {
                                $id = $_GET["id"];
                                $querry = "SELECT {$params} FROM reservations WHERE id = {$id};";
                        } else {

                                // Check location
                                if (!empty($_GET["location"])) {
                                        $location = $_GET["location"];
                                } else {
                                        $location = '%';
                                }

                                // Check time
                                if (isset($_GET["time"])) {
                                        if (preg_match('/^\d?\d:\d?\d$/', $_GET["time"])) {
                                                $time = $_GET["time"];
                                        } else {
                                                echo json_encode("Wrong time format");
                                                exit;
                                        }
                                } else {
                                        $time = date("H:i");
                                }

                                // Check date
                                if (isset($_GET["date"])) {
                                        if (preg_match('/^\d\d\d\d-\d\d-\d\d$/', $_GET["date"])) {
                                                $date = $_GET["date"];
                                        } else {
                                                echo json_encode("Wrong date format");
                                                exit;
                                        }
                                } else {
                                        $date = date("Y-m-d");
                                }
                                $querry = "SELECT {$params} FROM reservations WHERE location LIKE '{$location}' AND ((date > '{$date}') OR ((date = '{$date}') AND (end >= '{$time}')) ) ORDER BY date, start;";
// var_dump($querry);
                              
                        }       
// var_dump($querry);
                        $result = mysqli_query($link, $querry);
// var_dump($result);
                        $records = array();
                        while ($record = mysqli_fetch_assoc($result)) {
                                $records[] = $record;
                        }
// var_dump($records);
// var_dump($json);
                        $json = json_encode($records, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
                        // $json = json_encode($records, JSON_FORCE_OBJECT);

                        echo $json;


                        break;
                
                case 'POST':
                        echo json_encode("Under development");
                        break;

                case 'DELETE':
                        $data = file_get_contents("php://input"); 
                        $data = json_decode($data, true);

                        if (!isset($data["password"])) {
                            echo json_encode("No password given");
                            exit;
                        }

                         if (!isset($data["id"])) {
                            echo json_encode("No id given");
                            exit;
                        }
                        
                        if (!preg_match('/^[A-z0-9_\.öőúűóáé]{4,20}$/', $data["password"])) {
                                echo json_encode("Wrong password format");
                                exit;
                        }
                        $id = $data["id"];
                        $pw = $data["password"];
        // echo $pw;
                        $query = "SELECT password, location FROM reservations WHERE id={$id}";

                        $result = mysqli_query($link, $query);
                        $result = mysqli_fetch_assoc($result);
                        if ($result == null) {
                                echo json_encode("No record in database with this id");
                                exit;
                        }
                        

                        $password = $result["password"];
                        $location = $result["location"];

                        if ($password != $pw) {
                                echo json_encode("Invalid password");
                                exit;
                        }

                        $query = "DELETE FROM reservations WHERE id = {$id}";
                        $result = mysqli_query($link, $query);
                        if ($result == '1') {
                                echo json_encode("Ok");
                        } else {
                                echo json_encode("Something went wrong");
                        }
                        break;

                case 'PUT':
                        $putdata = fopen("php://input", "r");
                        $data = "";
                        while ($Sdata = fread($putdata, 1024)){
                                $data .= $Sdata;
                                // echo $Sdata . "\n";
                        }
                        fclose($putdata);
                        // var_dump($data);
                        $data = json_decode($data, true);
                        // var_dump($data);

                        if ($data === Null) {
                                echo json_encode("Wrong format");
                                exit;
                        }

                        // Check that every important parameter is given
                        if (! ((isset($data["location"])) or (isset($data["start"])) or
                                (isset($data["end"])) or (isset($data["nk"])) or (isset($data["password"])))) {
                                echo json_encode("Missing parameters");
                                exit;
                        }

                        // Check date
                        if (isset($data["date"])) {
                                // $date = date("Y-m-d H:i", $data["date"]);
                                if (preg_match('/^\d\d\d\d-\d\d-\d\d$/', $data["date"])) {
                                        $date = $data["date"];
                                } else {
                                        echo json_encode("Wrong date format");
                                        exit;
                                }
                        } else {
                                $date = date("Y-m-d");
                        }

                        // Check for location
                        if (preg_match('/^\d\d?$/', $data["location"])) {
                                $location = $data["location"];
                        } else {
                                echo json_encode("Wrong location format");
                                exit;
                        }

                        // Check for start time
                        if (preg_match('/^\d\d:\d\d$/', $data["start"])) {
                                $start = $data["start"];
                        } else {
                                echo json_encode("Wrong start format");
                                exit;
                        }

                        // Check for end time
                        if (preg_match('/^\d\d:\d\d$/', $data["end"])) {
                                $end = $data["end"];
                        } else {
                                echo json_encode("Wrong end format");
                                exit;
                        }

                        if ($end <= $start) {
                            echo json_encode("Strart must be before end");
                            exit;
                        }

                        // Check for neptune code
                        if (preg_match('/^[a-z0-9]{6}$/', $data["nk"])) {
                                $start = $data["nk"];
                        } else {
                                echo json_encode("Wrong neptun code format");
                                exit;
                        }

                        // Check for password
                        if (preg_match('/^([A-z0-9_\.öőúűóáé]{4,20})$/', $data["password"])) {
                                $start = $data["password"];
                        } else {
                                echo json_encode("Wrong password format");
                                exit;
                        }

                        if (strlen($data["note"]) > 120) {
                                echo json_encode("Comment is too long");
                                exit;
                        }

                        $password = $data["password"];
                        $location = $data["location"];
                        $nk = $data["nk"];
                        $start = $data["start"];
                        $end = $data["end"];
                        $note = $data["note"];

                        $querry = "INSERT INTO reservations (start, end, location, date, password, nk, note) VALUES 
                                ('{$start}', '{$end}', '{$location}', '{$date}', '{$password}', '{$nk}', '{$note}');";

                        $result = mysqli_query($link, $querry);
                        // var_dump($result);
                        // var_dump($querry);
                        // var_dump($data);

                        if ($result) {
                                $return = "Ok";
                        } else {
                                $return = "Error";
                        }

                        echo json_encode($return);

                        break;

                default:
                        // Invalid Request Method
                        header("HTTP/1.0 405 Method Not Allowed");
                        break;
        }
        // var_dump($request_method);
?>
