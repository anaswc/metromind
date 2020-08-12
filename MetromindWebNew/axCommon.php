<?php



/*if (file_exists("index.html")) {	// This is set for redirecting to the login page if the index.html file is there in the root.



	header("location: index.html");



	exit;



}*/







error_reporting(E_ALL ^ E_USER_NOTICE);



error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);







include_once("axConstants.php");



include_once("axFunctions.php");











$debugString = "";



$className	 = "";



$functionList = "";	











/*$date		= explode(' ', $clsaxBase->today);



$today		= explode(':', $date[1]);



$arrDay		= explode('-', $date[0]); 



			   



$hr			= $today[0] ;



$min		= $today[1] ;



$sec		= $today[2] ;







$day		= $arrDay[2];



$month		= $arrDay[1];



$year		= $arrDay[0];







$currentTime = $year."-".$month."-".$day." ".$hr.":".$min.":00";







$currentDate = $year."-".$month."-".$day;*/











$arrPageRange		= 	array(	



								5	=>	5,



								10  => 10,



								25	=> 25,



					  			50	=> 50,



								100	=> 100,



								200	=> 200,



								500	=> 500								



							 );







for($i = 2000; $i<= date("Y")+20; $i++) {



	$yearArray[] = str_pad($i, 2 , "0", STR_PAD_LEFT);



}	







for($i=1; $i<=31; $i++) {



	$dayArray[$i] = str_pad($i, 2 , "0", STR_PAD_LEFT);



}







for($i=0; $i<=23; $i++) {



	$hourArray[] = str_pad($i, 2 , "0", STR_PAD_LEFT);



}







for($i=0; $i<=59; $i++) {



	$minuteArray[] = str_pad($i, 2 , "0", STR_PAD_LEFT);



}







for($i=0; $i<=59; $i++) {



	$secondArray[] = str_pad($i, 2 , "0", STR_PAD_LEFT);



}







for($i=1; $i<=5; $i++) {



	$arrSequence[] = str_pad($i, 2 , "0", STR_PAD_LEFT);



}







for($i=date('Y');$i>date('Y')-100;$i--){



	$yearsOfBirth[$i] =$i;







}







$arrCategory				= 	array(	



								"1"=>"Fauna",



								"2"=>"Flora"									



						 		);	







$arrSex					= 	array(	



								"0"=>"Male",



								"1"=>"Female"									



						 		);	



								



$arrMonth			   = array( 



							"01" => "January",



							"02" => "February",



							"03" => "March",



							"04" => "April",



							"05" => "May",



							"06" => "June",



							"07" => "July",



							"08" => "August",											



							"09" => "September",



							"10" => "October",



							"11" => "November",



							"12" => "December"



							);



							



$arrDate  			 =    array(



                            "01" => "01",



							"02" => "02",



							"03" => "03",



							"04" => "04",



							"05" => "05",



							"06" => "06",



							"07" => "07",



							"08" => "08",											



							"09" => "09",



							"10" => "10",



							"11" => "11",



							"12" => "12",



							"13" => "13",



							"14" => "14",



							"15" => "15",



							"16" => "16",



							"17" => "17",



							"18" => "18",											



							"19" => "19",



							"20" => "20",



							"21" => "21",



							"22" => "22",



							"23" => "23",



							"24" => "24",



							"25" => "25",



							"26" => "26",



							"27" => "27",



							"28" => "28",											



							"29" => "29",



							"30" => "30",



							"31" => "31"



                  		  ); 



					



$arrYear 				= array( 



							 "2010" => "2010",



							 "2011" => "2011",



							 "2012" => "2012",



							 "2013" => "2013",



							 "2014" => "2014",



							 "2015" => "2015",



							 "2016" => "2016",



							 "2017" => "2017",



							 "2018" => "2018",



							 "2019" => "2019",



							 "2020" => "2020",



							 "2021" => "2021",



							 "2022" => "2022",



							 "2023" => "2023",



							 "2024" => "2024",



							 "2025" => "2025",



							 "2026" => "2026", 



							 "2027" => "2027", 



							 "2028" => "2028", 



							 "2029" => "2029",



							 "2030" => "2030"



							



						   );				 



						   



$arrAdminStatus			= 	array(	



								"0"  =>  "InActive",



								"1"  =>  "Active"



								);		



$arrStatus			    = 	array(	



								"0"  =>  "InActive",



								"1"  =>  "Active"



								);







$arrVideoType			= 	array(	



								"1"  =>  "Vimeo",



								"2"     =>  "Youtube"



								);



								



						



$arrAdPosition			= 	array(	



								"1"  =>  "Main Body Horizontal",



								"2"  =>  "Right",



								"3"  =>  "Main Body Vertical"



								);



$arrArticlePosition			= 	array(	



								"1"  =>  "Banner",



								"2"  =>  "Banner Right Side ",



								"3"  =>  "Below Banner"/*,



								"5"  =>  "Below Banner Position 2",



								"6"  =>  "Below Banner Position 3",



								"7"  =>  "Below Banner Position 4"*/



								);								



														  					   																																																																																																																						



		





											



$arrPackageDuration			=	array(



								"1"=> "1 Night - 2 Days",



								"2"=> "2 Night - 3 Days",



								"3"=> "3 Night - 4 Days",



								"4"=> "4 Night - 5 Days",



								"5"=> "5 Night - 6 Days"



								);



$arrVehicleType				= 	array(	



								"1"=>"Cars",



								"2"=>"Tempo Travellor",



								"3"=>"Bus"									



						 		);													





	$arrStaffType = array(



						"1"=>"Secretary",



						"2"=>"Office Staff"



	



					); 		



$arrAdminType = array(


						"1"=>"Admin",



						"2"=>"Staff"



	



					); 						



	

$arrprescriptionStatus = array(



						"0"=>"Doctor added prescription",



						"1"=>"Patient Requested for medicine",



						"2"=>"Admin added price",



						"3"=>"Patient Completed the payment",



						"4"=>"Packed",



						"5"=>"Shipped",



						"6"=>"Delivered"





	



					); 						



	

	



			$arrWeekDay		= 	array(	







								7	=>	"Sunday",







								1	=>	"Monday",







								2	=>	"Tuesday",







								3	=>	"Wednesday",







								4	=>	"Thursday",







								5	=>	"Friday",







								6	=>	"Saturday"							







							 );





		



	

	

	

					

	$arrSessions		= 	array(	

								"1"=>"Morning (IST)",

								"2"=>"After Noon (IST)",

								"3"=>"Evening (IST)"	

					

	);

						



 $arrStatusList			=array(



 						"0"		=>"Inactive",

 						"1"		=>"Active"

 );     







 $arrTime 				= array( 

 							 

							 "09:00:00" => "09:00:00",

							 "13:00:00" => "13:00:00",

							 "16:00:00" => "16:00:00",
							 
							 "21:00:00" => "21:00:00"


						   );								 						               		  	



?>