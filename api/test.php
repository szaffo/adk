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
        		# code...
        		break;

        	default:
        		# code...
        		break;
        }
        // var_dump($request_method);
?>
