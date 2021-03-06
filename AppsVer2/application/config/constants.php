<?php



defined('BASEPATH') OR exit('No direct script access allowed');


// defined('HTTP')    					OR define("HTTP","https://".$_SERVER['HTTP_HOST']."/metromind/MetromindWebNew/");
defined('HTTP')    					OR define("HTTP","https://".$_SERVER['HTTP_HOST']."/metromind/metromind-backend-php/MetromindWebNew/");



define("AXUPLOADPATH",				HTTP."uploads/");



define("AXUPLOADDOCTORIMAGEPATH",	HTTP."uploads/doctors/");



define("AXUPLOADPATIENTIMAGEPATH",	HTTP."uploads/patients/");



define("AXUPLOADSPECIALITYIMAGEPATH",	HTTP."uploads/speciality/");

define("AXUPLOADBLOGPATH",		    HTTP."uploads/blogs/");
define("AXUPLOADVIDEOPATH",		    HTTP."uploads/videos/");



define("AXUPLOADSYMPTOMSIMAGEPATH",	HTTP."uploads/symptoms/");

defined('RAZORAPIKEY')    		OR define("RAZORAPIKEY","rzp_live_N2yXqxyPS2UgdK");

defined('RAZORSECRETKEY')    	OR define("RAZORSECRETKEY","qS5Bmz860rd3QOH2auoM6Bhk");

defined('RAZORCURRENCY')    	OR define("RAZORCURRENCY","INR");

defined('MAPAPIKEY')    		OR define("MAPAPIKEY","AIzaSyDEWN8WH-DK1r3PEilmYyUcxiHzggq0hbY");


define("DISPLAYDATEFORMAT",		"'%d-%b-%Y'");


const  HTTP_STATUS_CODES  = array(

	100 => "CONTINUE", 

	101 => "SWITCHING PROTOCOLS", 

	102 => "PROCESSING", 

	200 => "", 

	201 => "CREATED", 

	202 => "ACCEPTED", 

	203 => "NON-AUTHORITATIVE INFORMATION", 

	204 => "It's deserted in here.", 

	205 => "RESET CONTENT", 

	206 => "PARTIAL CONTENT", 

	207 => "MULTI-STATUS", 

	300 => "MULTIPLE CHOICES", 

	301 => "MOVED PERMANENTLY", 

	302 => "FOUND", 

	303 => "SEE OTHER", 

	304 => "NOT MODIFIED", 

	305 => "USE PROXY", 

	306 => "(UNUSED)", 

	307 => "TEMPORARY REDIRECT", 

	308 => "PERMANENT REDIRECT", 

	400 => "Bad request", 

	401 => "Unauthorized access", 

	402 => "PAYMENT REQUIRED", 

	403 => "FORBIDDEN", 

	404 => "Not found", 

	405 => "METHOD NOT ALLOWED", 

	406 => "NOT ACCEPTABLE", 

	407 => "PROXY AUTHENTICATION REQUIRED", 

	408 => "REQUEST TIMEOUT", 

	409 => "CONFLICT", 

	410 => "GONE", 

	411 => "LENGTH REQUIRED", 

	412 => "PRECONDITION FAILED", 

	413 => "REQUEST ENTITY TOO LARGE", 

	414 => "REQUEST-URI TOO LONG", 

	415 => "UNSUPPORTED MEDIA TYPE", 

	416 => "REQUESTED RANGE NOT SATISFIABLE", 

	417 => "EXPECTATION FAILED", 

	418 => "I'M A TEAPOT", 

	419 => "AUTHENTICATION TIMEOUT", 

	420 => "ENHANCE YOUR CALM", 

	422 => "UNPROCESSABLE ENTITY", 

	423 => "LOCKED", 

	424 => "FAILED DEPENDENCY", 

	424 => "METHOD FAILURE", 

	425 => "UNORDERED COLLECTION", 

	426 => "UPGRADE REQUIRED", 

	428 => "PRECONDITION REQUIRED", 

	429 => "TOO MANY REQUESTS", 

	431 => "REQUEST HEADER FIELDS TOO LARGE", 

	444 => "NO RESPONSE", 

	449 => "RETRY WITH", 

	450 => "BLOCKED BY WINDOWS PARENTAL CONTROLS", 

	451 => "UNAVAILABLE FOR LEGAL REASONS", 

	494 => "REQUEST HEADER TOO LARGE", 

	495 => "CERT ERROR", 

	496 => "NO CERT", 

	497 => "HTTP TO HTTPS", 

	499 => "CLIENT CLOSED REQUEST", 

	500 => "INTERNAL SERVER ERROR", 

	501 => "NOT IMPLEMENTED",

	502 => "BAD GATEWAY", 

	503 => "SERVICE UNAVAILABLE", 

	504 => "GATEWAY TIMEOUT", 

	505 => "HTTP VERSION NOT SUPPORTED", 

	506 => "VARIANT ALSO NEGOTIATES", 

	507 => "INSUFFICIENT STORAGE", 

	508 => "LOOP DETECTED", 

	509 => "BANDWIDTH LIMIT EXCEEDED", 

	510 => "NOT EXTENDED", 

	511 => "NETWORK AUTHENTICATION REQUIRED", 

	598 => "NETWORK READ TIMEOUT ERROR", 

	599 => "NETWORK CONNECT TIMEOUT ERROR",

	460 => "You missed out mandatory details!",

	461 => "Welcome back ! , Please login to continue..",

	462 => "Oh No! Something went wrong! Please try again ",

	463 => "Uh-oh! Try again with valid credentials ",

	464 => "Your account is not on the move yet! Please activate your account",

	465 => "Incorrect Email . Please try again.",

	466 => "Already Downloaded.",

	467 => "NOT FOUND IN COUNTRY LIST , SEARCH IN GLOBAL LIST",

	468 => "FOUND IN COUNTRY LIST.",

	469 => "Bravo! It's a lifer!",

	470 => "Quick! An OTP has been sent to your registered Mobile.",

	471 => "Oh No!  Invalid OTP. ",

	472 => "Great! A more protective password is set! ",

	473 => "This ain't your password. Bad memory?  ",

	474 => "We loved your picture but the format is invalid!",

	475 => "We loved your picture but the format is invalid!",

	476 => "We loved your picture but the format is invalid!",

	477 => "We loved your picture but the format is invalid!",

	478 => "Thank you! But we already have this picture uploaded by you. ",

	479 => "Password mismatch!",

	480 => "This email is already registered with us!. Please enter another email",

	481 => "Go ahead!",

	482 => "This mobile number is already registered with us!. Please enter another mobile number",
	
	483 => "Please complete your basic information!"

);



