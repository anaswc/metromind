<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('test_method'))

{

    function test_method($var = '')

    {

        return $var;

    }   

}



if ( ! function_exists('getTitle'))

{

	function getTitle($pageTitle) {

		

		//global $pageTitle;

		

		if(trim($pageTitle == ""))

			$pageTitle	= getProductName()." -";

	

		return $pageTitle;

	}

}



function getMetaDescription($metaDescription) {



	//global $metaDescription;

	

	if(trim($metaDescription == ""))

		$metaDescription = getProductName()." - ";



	return $metaDescription;

}



function getMetaKeywords($metaKeywords) {



	//global $metaKeywords;



	if(trim($metaKeywords == ""))

		$metaKeywords = getProductName()." - ";



	return $metaKeywords;

}



function getProductName() {

	

	global $clsaxSetting;



	if (is_object($clsaxSetting))

		return $clsaxSetting->productName;

	else

		return "Sobha Cab Services";

}



function getFooter() {

	

	global $clsaxSetting;



	if (is_object($clsaxSetting))

		return $clsaxSetting->footer;

	else

		{

			$footer = "© 2019 Sobha Cab Services, Inc. All Rights Reserved. ";

			//return $footer;

		}

}



function convertdatemysql($date2)

{

		$dateother=explode("/",$date2);

		if($dateother[2]!="")

		{

		$date1=$dateother[2].'-'.$dateother[0].'-'.$dateother[1];

		}

		else

		{

		return $date2;

		}



return $date1;

}





function convertdateothers($date2)

{

		$dateother=explode("-",$date2);

		if($dateother[2]!="")

		{

		$date1=$dateother[1].'/'.$dateother[2].'/'.$dateother[0];

		}

		else

		{

		return $date2;

		}



return $date1;

}





function setMessage($message, $messageType="ERROR", $forceOverwrite=0) {

	

	if (trim($message) == "") return;



	if (trim($message) != "" && !$forceOverwrite) return;



	$_SESSION["AXMESSAGETYPE"]	= $messageType;

	$_SESSION["AXMESSAGE"]		= $message;

}



function displayUserMessage() {



	if (!isset($_SESSION["AXMESSAGE"]) || $_SESSION["AXMESSAGE"] == "") return;



	$msg	= "";	

	$msg	.= "<b><img src='./images/icons/validation-icon.png'>".$_SESSION["AXMESSAGE"]."</b>";



	$_SESSION["AXMESSAGE"] = "";



	return $msg;

}



function displayMessage() {



	if (!isset($_SESSION["AXMESSAGE"]) || $_SESSION["AXMESSAGE"] == "") return;



	$msg	= "";

	$msg	.= "<table cellpadding='0' cellspacing='0' width='100%'  border='0'>";

	$msg	.= "<tr><td width='100%' height='20' align='center'  style='font-size:12'>";

	$msg	.= "<b>".$_SESSION["AXMESSAGE"]."</b>";

	$msg	.= "</td></tr></table>";



	$_SESSION["AXMESSAGE"] = "";



	return $msg;

}

function dateadd($per,$n,$d) {

	//echo $per."<br>".$n."<br>".$d;

   switch($per) {

      case "yyyy": $n*=12;

      case "m":

         $d=mktime(date("H",$d),date("i",$d)

            ,date("s",$d),date("n",$d)+$n

            ,date("j",$d),date("Y",$d));

         $n=0; break;

      case "ww": $n*=7;

      case "d": $n*=24;

      case "h": $n*=60;

      case "n": $n*=60;

   }

   return $d+$n;

}



function HTMLOption1DArray($arr, $selectedValue)  {

	$str = "";

	if (is_array($arr)) {

		for ($i=0; $i<count($arr); $i++) {

			$str .= "<option value='". $arr[$i] ."'";

			if (!empty($selectedValue)) {

				if ($arr[$i] == $selectedValue) {

					$str .= " SELECTED ";

				}

			}	

			$str .= ">". $arr[$i] ."</option>";

		}

	}

	return $str;

}



# selectedValue	- can hold array or delimited string

# $seperator	- used to explode the selected value (only if its not an array)

# $colIndTitle2	- used to pass 2nd key value

function HTMLOption2DArray($arr, $colIndVal, $colIndTitle, $selectedValue, $seperator=", ", $colIndTitle2="") {	



	$str = "";	

	if (!is_array($selectedValue)) 

		$selectedValue = explode($seperator, $selectedValue);

		

	if (is_array($arr)) {		

		foreach ($arr as $row) {               

			$str .= "<option value='". $row[$colIndVal] ."'";

		

			if (!empty($selectedValue)) 

				if (in_array($row[$colIndVal], $selectedValue)) 

					$str .= " SELECTED ";



			$str .= ">". $row[$colIndTitle];

			

			if (!empty($colIndTitle2) && $row[$colIndTitle2] != "")	

				$str .= " (".$row[$colIndTitle2].")";



			$str .= "</option>";

		

		}

	}



	return $str;

}





function HTMLOption2DArrayOption($arr, $colIndVal, $colIndTitle, $selectedValue, $seperator=", ", $colIndTitle2="") {	







	$str = "";	

	if (!is_array($selectedValue)) 

		$selectedValue = explode($seperator, $selectedValue);

		

	if (is_array($arr)) {		

		foreach ($arr as $row) {               

			$str .= "<option value='". $row[$colIndVal] ."'";

		

			if (!empty($selectedValue)) 

				if (in_array($row[$colIndVal], $selectedValue)) 

					$str .= " SELECTED ";



			$str .= ">". $row[$colIndTitle]."&nbsp;-&nbsp;$".$row['price'];

			

			if (!empty($colIndTitle2) && $row[$colIndTitle2] != "")	

				$str .= " (".$row[$colIndTitle2].")";



			$str .= "</option>";

		

		}

	}

	

	return $str;

}







//HTMLOptionKeyValArray : Return the '<option value="key">value</option>' string using the input array 

//The input Array should be 'Key-Value pair' type.

function HTMLOptionKeyValArray($arr, $selectedValue)  {	

	$str = "";	

	

	

	if (!is_array($selectedValue)) $selectedValue = explode(", ", $selectedValue);



	if (is_array($arr)) {

		foreach($arr as $key => $value) {		

		/*while(list($key, $value) = each($arr) )

		{*/

			$str .= "<option value='". $key ."'";

			if (!empty($selectedValue)) {

				if (in_array($key,$selectedValue)) {

					$str .= " SELECTED ";

				}

			}	

			$str .= ">". $value ."</option>";

		}

	}



	return $str;

}



function getCurrentPageURL() {

	

$pageName	= explode('/',base_url(uri_string()));

	return $pageName[count($pageName)-1]."?".$_SERVER["QUERY_STRING"];

}



# function convert2MySqlDate()

# convert date into a mysql date format

# eg: 12-Dec-2004 ==> 2004-12-12

function convert2MySqlDate($date) {



	$arrShortMonth = array( "Jan" => "01",

							"Feb" => "02",

							"Mar" => "03",

							"Apr" => "04",

							"May" => "05",

							"Jun" => "06",

							"Jul" => "07",

							"Aug" => "08",											

							"Sep" => "09",

							"Oct" => "10",

							"Nov" => "11",

							"Dec" => "12"

							);

	list($dd,$mm,$yyyy) = split('[/-]',$date);

	$mysqlDate = $yyyy."-".$arrShortMonth[$mm]."-".$dd;

	

	return $mysqlDate;

}

function convert2NewMySqlDate($date) {



	

	list($mm,$dd,$yyyy) = split('[/-]',$date);

	$mysqlDate = $yyyy."-".$mm."-".$dd;

	

	return $mysqlDate;

}



#Convert the mysql date foemat YYYY-MM-DDD to DD-MMM-YYYY

function convertMysqlDate2MyDate($datestr) {



	$arrtmp = explode('-', $datestr);

	$retval = "";

	if(count($arrtmp) == 3){ #Check whether the string can be split into 3 parts

		list($year,$month,$day) = $arrtmp;

		$year = intval($year);

		$month = intval($month);

		$day = intval($day);

		$arrMonth = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec");

		if(checkdate($month, $day, $year)) {

			$day = str_pad($day, 2, '0',STR_PAD_LEFT);

			$month = $arrMonth[$month];

			$retval = "$day-$month-$year";

		}

		return 	$retval;

	}

}



function convertMysqlDate2MyDateNew($datestr) {



	$arrtmp = split('[/-]', $datestr);

	$retval = "";

	if(count($arrtmp) == 3){ #Check whether the string can be split into 3 parts

		list($year,$month,$day) = $arrtmp;

		$year = intval($year);

		$month = intval($month);

		$day = intval($day);

		$arrMonth = array("", "January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November","December");

		if(checkdate($month, $day, $year)) {

			$day = str_pad($day, 2, '0',STR_PAD_LEFT);

			$month = $arrMonth[$month];

			$retval = "$day-$month-$year";

		}

		return 	$retval;

	}

}





function changeDateFormat($date) {



	

	list($yyyy,$mm,$dd) = explode('-',$date);

	$mysqlDate = $dd."/".$mm."/".$yyyy;

	

	return $mysqlDate;

}



# function validateIPAddress() 

# 1. validating  the IP Address.

function validateIPAddress($ipAddress) {



	if (trim($ipAddress) == "") return;

	$ipCheck = 0;

	$arripAddress	=  explode(".",$ipAddress);

	for($i=0;$i<count($arripAddress);$i++) {

		if (!is_numeric($arripAddress[$i])) {

			$ipCheck = 1;

			break;

		}if (is_numeric($arripAddress[$i]) > 254) {

				$ipCheck = 1;

				break;

		}

	}	

	if ($ipCheck == 0) {

		if (!ereg("^[^0][0-9]{0,2}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$",$ipAddress)) {

			return 0;

		}else {

			return 1;

		}		

	}else {

		return 0;

	}

	

}



# function validateIPAddress() 

# 1. validating  the IP Address.

function validateEmailAddress($emailId) {

	

	if (trim($emailId) == "") return ;



	if (ereg('^[a-zA-Z0-9._-]+@([a-zA-Z0-9._-]+\.[a-zA-Z.]{2,5})$', $emailId)) {	

		return 1;

	} else {

		return 0;

	}

	

}



#function:dateTimeDiff - return the differnce betwwen two dates

function dateTimeDiff($datefrom, $dateto,$interval='', $using_timestamps = false) {

  /*

    $interval can be:

    yyyy - Number of full years

    q - Number of full quarters

    m - Number of full months

    y - Difference between day numbers

      (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)

    d - Number of full days

    w - Number of full weekdays

    ww - Number of full weeks

    h - Number of full hours

    n - Number of full minutes

    s - Number of full seconds (default)

  */

  

  if (!$using_timestamps) {

    $datefrom = strtotime($datefrom." GMT", 0);

    $dateto = strtotime($dateto." GMT", 0);

  }

 // print $dateto; print "<br>";

 //print $datefrom;

	$difference = $dateto - $datefrom; // Difference in seconds

  

  switch($interval) {

   

    case 'yyyy': // Number of full years



      $years_difference = floor($difference / 31536000);

      if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {

        $years_difference--;

      }

      if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {

        $years_difference++;

      }

      $datediff = $years_difference;

      break;



    case "q": // Number of full quarters



      $quarters_difference = floor($difference / 8035200);

      while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {

        $months_difference++;

      }

      $quarters_difference--;

      $datediff = $quarters_difference;

      break;



    case "m": // Number of full months



      $months_difference = floor($difference / 2678400);

      while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {

        $months_difference++;

      }

      $months_difference--;

      $datediff = $months_difference;

      break;



    case 'y': // Difference between day numbers



      $datediff = date("z", $dateto) - date("z", $datefrom);

      break;



    case "d": // Number of full days



      $datediff = floor($difference / 86400);

      break;



    case "w": // Number of full weekdays



      $days_difference = floor($difference / 86400);

      $weeks_difference = floor($days_difference / 7); // Complete weeks

      $first_day = date("w", $datefrom);

      $days_remainder = floor($days_difference % 7);

      $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?

      if ($odd_days > 7) { // Sunday

        $days_remainder--;

      }

      if ($odd_days > 6) { // Saturday

        $days_remainder--;

      }

      $datediff = ($weeks_difference * 5) + $days_remainder;

      break;



    case "ww": // Number of full weeks



      $datediff = floor($difference / 604800);

      break;



    case "h": // Number of full hours



      $datediff = floor($difference / 3600);

      break;



    case "n": // Number of full minutes



      $datediff = floor($difference / 60);

      break;



    default: // Number of full seconds (default)



      $datediff = $difference;

      break;

  }    

//print $datediff;

  return $datediff;



}



function numOfWeekdaysInAPeriod($startDate,$endDate,$weekDays='0' ) 

{ 

	$totalDays = dateTimeDiff($startDate, $endDate,'d') + 1;

	$numDays = 0;

	for($i=0; $i<$totalDays; $i++) {

		$timestamp = dateadd("d", $i,strtotime($startDate));

		if(date("w", $timestamp) == $weekDays ){

			$numDays++;

		}

	}

	return $numDays;

}



#function:hourToHM - convert hour to hour:minute

function hourToHM($hour) {

	$sign = "";

	if($hour < 0) {

		$sign = "-";

	}

#	$hour = intval(abs($hour));

#	$fract = $hour % 60;

#	$hh = str_pad($hour, 2, '0',STR_PAD_LEFT);

#	$mm = str_pad(floor($fract), 2, '0',STR_PAD_LEFT);

	$hour = abs($hour);



	$hh = str_pad(intval($hour), 2, '0',STR_PAD_LEFT);;

	$fraction = $hour - intval($hour);

	$mm = str_pad(floor($fraction * 60), 2, '0',STR_PAD_LEFT);



	Return "$sign$hh:$mm";	

}



#function:minuteToHM - convert minute to hour:minute

function minuteToHM($minute) {

	$sign = "";

	if($minute < 0) {

		$sign = "-";

	}

	$minute = intval(abs($minute));

	$hour = intval($minute/60);

	$fract = $minute % 60;

	$hh = str_pad($hour, 2, '0',STR_PAD_LEFT);

	$mm = str_pad(floor($fract),2, '0',STR_PAD_LEFT);

	return "$sign$hh:$mm";	

}

function mysqlDateTomyDate($datestr){

	$arrtmp = split('[/-]', $datestr);

	$retval = "";

	if(count($arrtmp) == 3){ #Check whether the string can be split into 3 parts

		list($year,$month,$day) = $arrtmp;

		$year = intval($year);

		$month = intval($month);

		$day = intval($day);

		$arrMonth = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec");

		if(checkdate($month, $day, $year)) {

			$day = str_pad($day, 2, '0',STR_PAD_LEFT);

			$month = $arrMonth[$month];

			$retval = "$day-$month-$year";

		}

		return 	$retval;

	}

}



#function is_leap_year return the year leap year or not

function is_leap_year($year)

{

	if ($year%4 == 0)

	{

		if ($year%100 == 0 && $year%400 <>0)

			return false;

		else

			return true;

	}

	else

		return false;

}



#function total_days return the number days for a given month and year

function total_days($month,$year)

{

	$days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

	if ($month==2 && is_leap_year($year))

	{

		return 29;

	}

		else return $days[$month-1];

}

#function numOfWeekdaysInAMonth return number of a week day given for a month, year, and the week day

function numOfWeekdaysInAMonth($month,$year,$weekDays='0' ) 

{ 

	

	$totalDays = date("t", mktime(0, 0, 0, $month, 1, $year));

	$numDays = 0;

	

	for($i=1; $i<=$totalDays; $i++) {

		if(date("w", mktime(0, 0, 0, $month, $i, $year)) == $weekDays )

			$numDays++;

	}



	return $numDays; 

}





function imageSize($img){ 

	global $width, $height;

	if($img != '') {

		$size = @GetImageSize ($img);

		$widthandheight = explode(" ",$size[3]);

		$width = substr($widthandheight[0],7,(strlen($widthandheight[0])-8));

		$width += 5;

		$height = substr($widthandheight[1],8,(strlen($widthandheight[1])-9));

		$height += 7;

	}

	return;

}



// Function to get the usertype name

function getUserModeName($userMode) {



	switch($userMode) {

		case "A":

			return "Administrator";

		case "M":	

			return "Management";

		

		case "N":	

			return "Normal";

		

		case "S":

			return "Semi Management";

		

		default:

			return "Unknown";

	}

}



//Function to format Dtabase feild

function innerCapsToReadableText($text) {

	  $text = ereg_replace("([A-Z]) ", "\\1",ucwords(strtolower(ereg_replace("[A-Z]"," \\0",$text))));

	  return ereg_replace("([A-Za-z])([0-9])", "\\1 \\2", $text);

}



//getUsername

function getUserName($userId="",$firstName="",$lastName="",$userName=""){

	

	global $connect,$includePath;

	if(trim($userId) == "" || $userId == 0) {

		if(trim($firstName)!="") return $firstName ." ". $lastName . " ("  . $userName . ")";

		else   return "";

	}else{

		$clslcSearchUser		 	 = new clslcSearchUser($connect,$includePath);

		$clslcSearchUser->userId 	 = $userId;

		$clslcSearchUser->isAdmin	 = 1;

		$arrSearchUser 				 = $clslcSearchUser->retrieveSearchUserArray();

		return $arrSearchUser[$userId]["firstName"] ." ". $arrSearchUser[$userId]["lastName"] . " ("  . $arrSearchUser[$userId]["userName"] . ")"; 

	}	

}



//get Division

function getDivisionName($divisionId){

	if(trim($divisionId) == "" || $divisionId == 0) {

		return false;

	}

	global $connect,$includePath;

	$clslcSearchDivision		 	 = new clslcSearchDivision($connect,$includePath);

	$clslcSearchDivision->divisionId = $divisionId;

	$arrSearchDivision 				 = $clslcSearchDivision->retrieveSearchDivisionArray();



	return $arrSearchDivision[0]["divisionName"];

}	

function getBranchName($branchName,$branchLocation) {

	if($branchName == "" || $branchLocation == "") {

		return false;

	}

	return $branchName."/".$branchLocation;

}

#function to encrypt password

function passEncrypt($str,$lngth=20)

{

	$str=substr($str,0,$lngth);		

	$str = str_pad($str,$lngth," ");

	

	$retstr="";

	for($i=0;$i<$lngth;$i++)

	{

		$sch=substr($str,$i,1);			

		$iasc=ord($sch) + 2*$i + 30;			

		if($iasc>255) $iasc=$iasc-255;

		$sch=chr($iasc);			

		$retstr=$retstr.$sch;

		

	}

	return addslashes($retstr);

}



#function to decrypt password		

function passDecrypt($str)

{

	$retstr="";

	$lngth=strlen($str);

	for($i=0;$i<$lngth;$i++)

	{

		$sch=substr($str,$i,1);

		$iasc=ord($sch) - 2*$i - 30;

		if($iasc<=0) $iasc=255+$iasc;

		$sch=chr($iasc);

		$retstr=$retstr.$sch;

	}

	return trim($retstr);

}





 function downloadFile($file,$dispname){



		 $len 	 		  = filesize($file);



   	  $filename  	  = basename($file);



	  $file_extension = strtolower(substr(strrchr($filename,"."),1));

	  if($dispname<>"")	

	  	$dispname		  = $dispname.".".$file_extension;

	  else

	  	$dispname		  =	$filename ;	

	



	  switch($file_extension) {



		 case "pdf" : $ctype="application/pdf"; break;



		 case "exe" : $ctype="application/octet-stream"; break;



		 case "zip" : $ctype="application/zip"; break;



		 case "doc" : $ctype="application/msword"; break;



		 case "xls" : $ctype="application/vnd.ms-excel"; break;



		 case "ppt" : $ctype="application/vnd.ms-powerpoint"; break;



		 case "gif" : $ctype="image/gif"; break;



		 case "png" : $ctype="image/png"; break;



		 case "jpeg":



		 case "jpg" : $ctype="image/jpg"; break;



		 case "mp3" : $ctype="audio/mpeg"; break;



		 case "wav" : $ctype="audio/x-wav"; break;





		 case "mpeg":



		 case "mpg" :



		 case "mpe" : $ctype="video/mpeg"; break;



		// case "mov" : $ctype="video/quicktime"; break;



		 case "avi" : $ctype="video/x-msvideo"; break;



		 default	: $ctype="application/force-download"; 

		}



 		 @ob_end_clean(); 



		 header("Cache-Control: no-store, no-cache, must-revalidate");



		 header("Cache-Control: post-check=0, pre-check=0", false);



		 header("Pragma: no-cache");



		 header("Expires: " . gmdate("D, d M Y H:i:s", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y"))) . " GMT");



		 header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");

	

		 header('Content-type: $ctype');



		header('Content-Disposition: attachment; filename="'.$dispname . '"');

		readfile($file);

	}

	

	function time_add($hour,$min,$var)

	{

	

	$ctime=$hour.":".$min." ".$var;

	return $ctime;

	

	}

	

	

function day_diff($str_start, $str_end)



{



	$str_start  = strtotime($str_start); // The start date becomes a timestamp

	

	$str_end 	= strtotime($str_end); // The end date becomes a timestamp

	

	$nseconds   = $str_end - $str_start; // Number of seconds between the two dates

	$ndays 		= (int)($nseconds / 86400); // One day has 86400 seconds

	$nseconds 	= $nseconds % 86400; // The remainder from the op

	$nhours 	= (int)($nseconds / 3600); // One hour has 3600 seconds

	//$nseconds   = $nseconds % 3600;

	//$nminutes   = round($nseconds / 60); // One minute has 60 seconds, duh!

	//$nseconds   = $nseconds % 60;

	return  "$ndays Days $nhours Hours";



}



function replaceInvalidCharacters($string){

	return ereg_replace("[^[:space:]a-zA-Z0-9*_.-]", "", $string);

}	 



# function to determine which is the browser.

# it will return browser name, browser version, browser platform

# Use $Browser_Name, $Browser_Version, $Browser_Platform respectively

function whichBrowser()

{

	global $Browser_Name,$Browser_Version,$Browser_Platform;

	

	$userAgent =  $_SERVER['HTTP_USER_AGENT'];

	$Browser_Name = strtok($userAgent, "/");

	$Browser_Version = strtok(" ");

	if(ereg("MSIE", $userAgent))

	{

		$Browser_Name = "MSIE";

		$Browser_Version = strtok("MSIE");

		$Browser_Version = strtok(" ");

		$Browser_Version = strtok(";");

	}

	if(ereg("Opera", $userAgent))	

	{

		$Browser_Name = "Opera";

		$Browser_Version = strtok("Opera");

		$Browser_Version = strtok("/");

		$Browser_Version = strtok(";");

	}

	$Browser_Platform = "unknown";

	if(ereg("Windows",$userAgent)	|| ereg("WinNT",$userAgent)|| ereg("Win95",$userAgent)) 

	{

		$Browser_Platform = "Windows";

	}

	if(ereg("Mac", $userAgent)) 

	{

		$Browser_Platform = "Macintosh";

	}

	if(ereg("X11", $userAgent)) 

	{ 

		$Browser_Platform = "Unix"; 

	} 

	return $Browser_Name;

}

//******************************************************************************

/**

* Resize source image to specified width and height and returns new image

* @param source_file - source image file to resize

* @param dest_file - output image file

* @param width - new width for output image

* @param height - new height for output image

* @return the resized image

*/



function ResizeImage($source_file, $dest_file, $width, $height) {



    $arr_size    = getimagesize($source_file);

    if($arr_size[1] <= $height && $arr_size[0] <= $width) {

        $copy = copy($source_file, $dest_file);            

    } else {



        $file_image         = fopen($source_file, "r");

        $image_content      = fread($file_image, fileSize($source_file));

        $source_image       = imagecreatefromstring($image_content);



        $image_width        = imagesx($source_image);

        $image_height       = imagesy($source_image);



        if($image_height <= $height) {

            $height     = $image_height;

        }

        

        if($image_width <= $width) {

            $width      = $image_width;

        }



        //$width            = round($image_width * $height / $image_height); 



        $destination_image  = imagecreatetruecolor($width, $height);



        imagecopyresized($destination_image, $source_image,0, 0, 0, 0,$width, 

                            $height, $image_width, $image_height);



        $file_extension    = "." . strtolower(GetFileExtension($dest_file));

        if($file_extension != ".jpg" && $file_extension != ".jpeg"

                 && $file_extension != ".png") 

        {

            imagegif($destination_image, $dest_file);

        } 

        else if($file_extension == ".png") 

        {

            imagepng($destination_image, $dest_file);

        } 

        else 

        {

            imageJPEG($destination_image, $dest_file);

        }

        imagedestroy($destination_image);

        //imagedestroy($source_image);

    }

}



function GetFileExtension($fileName) {



    $fileExtension    = "";

    $pos    = strpos(strrev($fileName), ".");

    if($pos !== false) {

        $fileExtension    = strtolower(substr(strrev($fileName), 0, $pos));

    }

    return(strrev($fileExtension));

}



function wordlimit($string, $length = 25, $ellipsis = " [...]"){

   $words = explode(' ', $string);

   if (count($words) > $length)

       return implode(' ', array_slice($words, 0, $length)) . $ellipsis;

   else

       return $string;

}



################################################### SEO URI MAKING ####################################################

function makeSeoUri($title) {

	$title = strip_tags($title);

	// Preserve escaped octets.

	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);

	// Remove percent signs that are not part of an octet.

	$title = str_replace('%', '', $title);

	// Restore octets.

	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);



	$title = remove_accents($title);

	if (seems_utf8($title)) {

		if (function_exists('mb_strtolower')) {

			$title = mb_strtolower($title, 'UTF-8');

		}

		$title = utf8_uri_encode($title, 200);

	}



	$title = strtolower($title);

	$title = preg_replace('/&.+?;/', '', $title); // kill entities

	$title = str_replace('.', '-', $title);

	$title = str_replace('"', '-', $title);

	$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);

	$title = preg_replace('/\s+/', '-', $title);

	$title = preg_replace('|-+|', '-', $title);

	$title = trim($title, '-');



	return $title;

}



function remove_accents($string) {

	if ( !preg_match('/[\x80-\xff]/', $string) )

		return $string;



	if (seems_utf8($string)) {

		$chars = array(

		// Decompositions for Latin-1 Supplement

		chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',

		chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',

		chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',

		chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',

		chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',

		chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',

		chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',

		chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',

		chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',

		chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',

		chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',

		chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',

		chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',

		chr(195).chr(159) => 's', chr(195).chr(160) => 'a',

		chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',

		chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',

		chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',

		chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',

		chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',

		chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',

		chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',

		chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',

		chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',

		chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',

		chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',

		chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',

		chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',

		chr(195).chr(191) => 'y',

		// Decompositions for Latin Extended-A

		chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',

		chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',

		chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',

		chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',

		chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',

		chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',

		chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',

		chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',

		chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',

		chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',

		chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',

		chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',

		chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',

		chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',

		chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',

		chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',

		chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',

		chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',

		chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',

		chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',

		chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',

		chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',

		chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',

		chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',

		chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',

		chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',

		chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',

		chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',

		chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',

		chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',

		chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',

		chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',

		chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',

		chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',

		chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',

		chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',

		chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',

		chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',

		chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',

		chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',

		chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',

		chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',

		chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',

		chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',

		chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',

		chr(197).chr(154) => 'S',chr(197).chr(155) => 's',

		chr(197).chr(156) => 'S',chr(197).chr(157) => 's',

		chr(197).chr(158) => 'S',chr(197).chr(159) => 's',

		chr(197).chr(160) => 'S', chr(197).chr(161) => 's',

		chr(197).chr(162) => 'T', chr(197).chr(163) => 't',

		chr(197).chr(164) => 'T', chr(197).chr(165) => 't',

		chr(197).chr(166) => 'T', chr(197).chr(167) => 't',

		chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',

		chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',

		chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',

		chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',

		chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',

		chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',

		chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',

		chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',

		chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',

		chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',

		chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',

		chr(197).chr(190) => 'z', chr(197).chr(191) => 's',

		// Euro Sign

		chr(226).chr(130).chr(172) => 'E',

		// GBP (Pound) Sign

		chr(194).chr(163) => '');



		$string = strtr($string, $chars);

	} else {

		// Assume ISO-8859-1 if not UTF-8

		$chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)

			.chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)

			.chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)

			.chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)

			.chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)

			.chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)

			.chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)

			.chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)

			.chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)

			.chr(252).chr(253).chr(255);



		$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";



		$string = strtr($string, $chars['in'], $chars['out']);

		$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));

		$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');

		$string = str_replace($double_chars['in'], $double_chars['out'], $string);

	}



	return $string;

}



function seems_utf8($str) {

	$length = strlen($str);

	for ($i=0; $i < $length; $i++) {

		$c = ord($str[$i]);

		if ($c < 0x80) $n = 0; # 0bbbbbbb

		elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb

		elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb

		elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb

		elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb

		elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b

		else return false; # Does not match any model

		for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?

			if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))

				return false;

		}

	}

	return true;

}



function utf8_uri_encode( $utf8_string, $length = 0 ) {

	$unicode = '';

	$values = array();

	$num_octets = 1;

	$unicode_length = 0;



	$string_length = strlen( $utf8_string );

	for ($i = 0; $i < $string_length; $i++ ) {



		$value = ord( $utf8_string[ $i ] );



		if ( $value < 128 ) {

			if ( $length && ( $unicode_length >= $length ) )

				break;

			$unicode .= chr($value);

			$unicode_length++;

		} else {

			if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;



			$values[] = $value;



			if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )

				break;

			if ( count( $values ) == $num_octets ) {

				if ($num_octets == 3) {

					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);

					$unicode_length += 9;

				} else {

					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);

					$unicode_length += 6;

				}



				$values = array();

				$num_octets = 1;

			}

		}

	}



	return $unicode;

}

################################################### SEO URI MAKING ####################################################