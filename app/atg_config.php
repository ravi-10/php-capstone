<?php
	/**
     * Configuration File 
     * last_update: 2019-09-13
     * Author: Ravi Patel, patel-r89@webmail.uwinnipeg.ca
     */
    
    use App\Model;
    use App\DatabaseLogger;

    date_default_timezone_set('America/Winnipeg');
    
    // enabling php session
    session_start();

    // enabling output buffering
    ob_start();

    // if SESSION is not set, setting 'logged_in' as false by default 
    // to utilize it further
    if(!isset($_SESSION['logged_in'])){
    	$_SESSION['logged_in'] = false;
    }
	 
	require __DIR__ . '/../autoloaders.php';

	// Setting error display and reporting level
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);

	// Setting Database Credentials
	define('DB_DSN', 'mysql:host=localhost;dbname=atg_tours');
	// remember to ensure the defined user is exists and 
	// has access to the required db
	define('DB_USER', 'root');
	define('DB_PASS', '');

	// Creating DB connection
	$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
	// Setting the $dbh to display errors if there are any
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Setting dbh to model via init method of function
	Model::init($dbh);

	// logger object to insert log in database
	$logger = new DatabaseLogger;
	$current_datetime = date('Y-m-d H:i:s');
	$request_uri = $_SERVER['REQUEST_URI'];
	$request_method = $_SERVER['REQUEST_METHOD'];
	$request_browser = $_SERVER['HTTP_USER_AGENT'];
	$event = $current_datetime . '|' . $request_uri . '|' .
				$request_method . '|' . $request_browser;
	$logger->save($event);

	// generate a csrf token if we need one
	if(empty($_SESSION['csrf'])) {
	    $_SESSION['csrf'] = md5( uniqid() . time() );
	}

	/**
	 * function to get randomly generated csrf
	 * @return String generated token
	 */
	function csrf()
	{
	    return $_SESSION['csrf'];
	}

	//var_dump('log will work evrywhere');

	// including functions file
	require 'functions.php';