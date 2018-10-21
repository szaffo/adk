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

        $request_method = $_SERVER["REQUEST_METHOD"];
        switch ($request_method) {
        	case 'GET':
        		if (!empty($_GET["id"])) {
        			$id = $_GET["id"];
        		} else {
        			if (!empty($_GET["page"])) {
        				$page = $_GET["page"];
        			} else {
        				$page = 1;
        			}

        			if (!empty($_GET["location"])) {
        				$location = $_GET["location"];
        			} else {
        				$location = -1;
        			}

        			$from = $page * 25 - 25;
        			$id = -1;
        		}

		        $params = "start, end, note";

		        if (0 <= $id) {
		        	$querry = "SELECT {$params} FROM reservations WHERE id = {$id};";
		        } else {
		        	if (0 <= $location) {
		        		$querry = "SELECT {$params} FROM reservations WHERE location = {$location};";
		        	} else {
		        		$querry = "SELECT {$params} FROM reservations;";	
		        	}
		        }
// var_dump($querry);
		        $result = mysqli_query($link, $querry);
// var_dump($result);
		        $records = array();
		        while ($record = mysqli_fetch_assoc($result)) {
		        	$records[] = $record;
		        }
// var_dump($records);
				// $json = array();
		  //       foreach ($records as $key => $value) {
		  //       	$json[] = json_encode($value, JSON_FORCE_OBJECT);
		  //       }
// var_dump($json);
		        $json = json_encode($records, JSON_FORCE_OBJECT);

		        echo $json;


        		break;
        	
        	case 'POST':
        		# code...
        		break;

        	case 'DELETE':
        		# code...
        		break;

        	case 'PUT':
        		// Check that every important parameter is given
        		if ((empty($_GET["location"])) or (empty($_GET["start"])) or
        			(empty($_GET["end"])) or (empty($_GET["nk"])) or (empty($_GET["password"]))) {
        			echo json_encode("missing parameters");
        			exit;
        		} else {

        		// Check date
        		if (!empty($_GET["date"])) {
        			$date = date("Y-m-d H:i", $_GET["date"]);
        		} else {
        			$date = date("Y-m-d H:i")
        		}

        		// Check for location
        		if (preg_match('/^\d\d?$/', $_GET["location"])) {
        			$location = $_GET["location"];
        		} else {
        			echo json_encode("Wrong location format");
        			exit;
        		}

        		// Check for start time
        		if (preg_match('/^\d\d:\d\d$/', $_GET["start"])) {
        			$start = $_GET["start"];
        		} else {
        			echo json_encode("Wrong start format");
        			exit;
        		}

        		// Check for end time
        		if (preg_match('/^\d\d:\d\d$/', $_GET["end"])) {
        			$end = $_GET["end"];
        		} else {
        			echo json_encode("Wrong end format");
        			exit;
        		}

        		// Check for neptune code
        		if (preg_match('/^[a-z0-9]{6}$/', $_GET["nk"])) {
        			$start = $_GET["nk"];
        		} else {
        			echo json_encode("Wrong neptun code format");
        			exit;
        		}

        		// Check for password
        		if (preg_match('/^[a-z09_\.]{4-20}$/', $_GET["start"])) {
        			$start = $_GET["password"];
        		} else {
        			echo json_encode("Wrong password format");
        			exit;
        		}

        		break;

        	default:
        		# code...
       		break;
        }
        // var_dump($request_method);
?>
