<?php
//look for errors

error_reporting(E_ALL);
ini_set(display_errors, TRUE);
//ini_set(display_startup_errors, TRUE);



// This function will run within each post array including multi-dimensional arrays 
//  function ExtendedAddslash(&$params)
//  { 
//  foreach ($params as &$var) {
//check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
//     is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
//  unset($var);
//                            }
// } 

// Initialize ExtendedAddslash() function for every $_POST variable
//  ExtendedAddslash($_POST);          


//connect to server and select database

//  $servername ="127.0.0.1":4242;
//  $username ="root";
//  $password ="bumpy";
//  $dbname = "coe_data_final_use";
// $tablename ="coe_student_final";

$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="bumpy";
$dbname="coe_data_final_use";
$tablename ="coe_student_final";


$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());





// Check connection

if(!$con) { die ("connection error: " .mysqli_connect_errno());}

if (mysqli_connect_errno())

{
    
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//prepare and bind
//$stmt = $con->prepare("INSERT INTO $tablename(UNM_ID, last_name, first_name, middle_name, birthdate,campus,comments,adm_status_code,transfer_state,country,student_status,application_semester_code,applied_year,admission_as,semester_admitted,sem_adm_code,adm_year,graduation_semester_code,graduation_semester,graduated_year,entrance_GPA,exit_GPA,major_1,minor_1,concentration_1,major_2,minor_2,concentration_2,orientation_college,orientation_college_date,orientation_program,orientation_program_date,licensure_completion,dual_licensure,liscensure_completion_type ,license_obtained,license_obtained_month,license_obtained_year) 
// VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,:?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

//$stmt->bind("sss",$UNM_ID,$last_name,$first_name,$middle_name,$birthdate,$campus,$comments,$adm_status_code,$transfer_state,$country,$student_status,$application_semester_code,$applied_year,$admission_as,$semester_admitted,$sem_adm_code,$adm_year,$graduation_semester_code,$graduation_semester,$graduated_year,$entrance_GPA,$exit_GPA,$major_1,$minor_1,$concentration_1,$major_2,$minor_2,$concentration_2,$orientation_college,$orientation_college_date,$orientation_program,$orientation_program_date,$licensure_completion,$dual_licensure,$liscensure_completion_type,$license_obtained,$license_obtained_month,$license_obtained_year);      


//retrieve values from html



//post data from input from Student Informatoion tab
$UNM_ID = mysqli_real_escape_string($con,$_POST['UNM_ID']);
$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
$first_name = mysqli_real_escape_string($con,$_POST['first_name']);
$middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
$birth_date = mysqli_real_escape_string($con,$_POST['birth_date']);
$campus = mysqli_real_escape_string($con,$_POST['campus']);   
$comments = mysqli_real_escape_string($con,$_POST['comments']);

//post data from input from Student Student Status tab

$adm_status_code = mysqli_real_escape_string($con,$_POST['adm_status_code']);
$transfer_state = mysqli_real_escape_string($con,$_POST['transfer_state']); 
$country = mysqli_real_escape_string($con,$_POST['country']);
$student_status = mysqli_real_escape_string($con,$_POST['student_status']);
$application_semester_code = mysqli_real_escape_string($con,$_POST['application_semester_code']);
$applied_year = mysqli_real_escape_string($con,$_POST['applied_year']);
$semester_admitted = mysqli_real_escape_string($con,$_POST['semester_admitted']);
$sem_adm_code = mysqli_real_escape_string($con,$_POST['sem_adm_code']);
$adm_year = mysqli_real_escape_string($con,$_POST['adm_year']);
$admission_as = mysqli_real_escape_string($con,$_POST['admission_as']);
$graduation_semester_code = mysqli_real_escape_string($con,$_POST['graduation_semester_code']);
$graduation_semester = mysqli_real_escape_string($con,$_POST['graduation_semester']);
$graduated_year = mysqli_real_escape_string($con,$_POST['graduated_year']);
$entrance_GPA = mysqli_real_escape_string($con,$_POST['entrance_GPA']);
$exit_GPA = mysqli_real_escape_string($con,$_POST['exit_GPA']);

//post data from input from Academic Information tab

$major_1 = mysqli_real_escape_string($con,$_POST['major_1']);
$minor_1 = mysqli_real_escape_string($con,$_POST['minor_1']);
$concentration_1 = mysqli_real_escape_string($con,$_POST['concentration_1']);
$major_2 = mysqli_real_escape_string($con,$_POST['major_2']);
$minor_2 = mysqli_real_escape_string($con,$_POST['minor_2']); 
$concentration_2 = mysqli_real_escape_string($con,$_POST['concentration_2']);
$orientation_college = (isset($_POST['orientation_college']) ? $_POST['orientation_college'] : null);
$orientation_college_date = mysqli_real_escape_string($con,$_POST['orientation_college_date']);
$orientation_program = (isset($_POST['orientation_program']) ? $_POST['orientation_program'] : null);
$orientation_program_date = mysqli_real_escape_string($con,$_POST['orientation_program_date']);

//post data from input from License Information tab

$licensure_completion = (isset($_POST['licensure_completion']) ? $_POST['licensure_completion'] : null);
$dual_licensure = (isset($_POST['dual_licensure']) ? $_POST['dual_licensure'] : null);
$licensure_completion_type = mysqli_real_escape_string($con,$_POST['licensure_completion_type']);
$license_obtained = (isset($_POST['license_obtained']) ? $_POST['license_obtained'] : null);
$license_obtained_month = mysqli_real_escape_string($con,$_POST['license_obtained_month']) ;




// search UNM ID
$query = "SELECT UNM_ID FROM coe_student_final WHERE UNM_ID =$UNM_ID";
//  $query = mysqli_query($con,"SELECT * FROM $tablename WHERE EXISTS (SELECT * FROM $tablename WHERE UNM_ID = $UNM_ID)");
//$query = ("SELECT * FROM coe_data_final_use.coe_student_final WHERE UNM_ID = $UNM_ID");
$sqlsearch = mysqli_query($con,$query);

// $resultcount = mysqli_num_rows($con,$query);

// if ($sqlsearch = TRUE) {
$sql = "INSERT INTO $tablename (UNM_ID, last_name, first_name, middle_name, birth_date, campus, comments, adm_status_code, transfer_state, country, student_status, application_semester_code, applied_year, admission_as, semester_admitted, sem_adm_code, adm_year, graduation_semester_code, graduation_semester, graduated_year, entrance_GPA, exit_GPA, major_1, minor_1, concentration_1, major_2, minor_2, concentration_2, orientation_college, orientation_college_date, orientation_program, orientation_program_date, licensure_completion, dual_licensure, licensure_completion_type, license_obtained, license_obtained_month) 
 VALUES ('$UNM_ID','$last_name','$first_name','$middle_name','".$birth_date."','$campus','$comments','$adm_status_code','$transfer_state','$country','$student_status','$application_semester_code','$applied_year','$admission_as','$semester_admitted','$sem_adm_code','$adm_year','$graduation_semester_code','$graduation_semester','$graduated_year','$entrance_GPA','$exit_GPA','$major_1','$minor_1','$concentration_1','$major_2','$minor_2','$concentration_2','$orientation_college','$orientation_college_date','$orientation_program','$orientation_program_date','$licensure_completion','$dual_licensure','$licensure_completion_type','$license_obtained','$license_obtained_month')";  
// VALUES ('".$UNM_ID."','".$last_name."','".$first_name."','".$middle_name."','".$birthdate."','".$campus."','".$comments."','".$adm_status_code."','".$transfer_state."','".$country."','".$student_status."','".$application_semester_code."','".$applied_year."','".$admission_as."','".$semester_admitted."','".$sem_adm_code."','".$adm_year."','".$graduation_semester_code."','".$graduation_semester."','".$graduated_year."','".$entrance_GPA."','".$exit_GPA."','".$major_1."','".$minor_1."','".$concentration_1."','".$major_2."','".$minor_2."','".$concentration_2."','".$orientation_college."','".$orientation_college_date."','".$orientation_program."','".$orientation_program_date."','".$licensure_completion."','".$dual_licensure."','" .$licensure_completion_type. "','".$license_obtained."','".$license_obtained_month."','".$license_obtained_year."')";  
if (!mysqli_query($con,$sql))
{ die ("connection error here: " .mysqli_error($con));} else{
    //PDO $stmt = $con->prepare("INSERT INTO $tablename(UNM_ID, last_name, first_name, middle_name, birth_date,campus,comments,adm_status_code,transfer_state,country,student_status,application_semester_code,applied_year,admission_as,semester_admitted,sem_adm_code,adm_year,graduation_semester_code,graduation_semester,graduated_year,entrance_GPA,exit_GPA,major_1,minor_1,concentration_1,major_2,minor_2,concentration_2,orientation_college,orientation_college_date,orientation_program,orientation_program_date,licensure_completion,dual_licensure,licensure_completion_type ,license_obtained,license_obtained_month,license_obtained_year) 
    // VALUES(:UNM_ID,:last_name,:first_name,:middle_name,:birth_date,:campus,:comments,:adm_status_code,:transfer_state,:country,:student_status,:application_semester_code,:applied_year,:admission_as,:semester_admitted,:sem_adm_code,:adm_year,:graduation_semester_code,:graduation_semester,:graduated_year,:entrance_GPA,:exit_GPA,:major_1,:minor_1,:concentration_1,:major_2,:minor_2,:concentration_2,:orientation_college,:orientation_college_date,:orientation_program,:orientation_program_date,:licensure_completion,:dual_licensure,:licensure_completion_type,:license_obtained,:license_obtained_month,:license_obtained_year)");  
    
    //$stmt->execute(array("UNM_ID"=>$UNM_ID,"last_name"=>$last_name,"first_name"=>$first_name,"middle_name"=>$middle_name,"birthdate"=>$birthdate,"campus"=>$campus,"comments"=>$comments,"adm_status_code"=>$adm_status_code,"transfer_state"=>$transfer_state,"country"=>$country,"student_status"=>$student_status,"application_semester_code"=>$application_semester_code,"applied_year"=>$applied_year,"admission_as"=>$admission_as,"semester_admitted"=>$semester_admitted,"sem_adm_code"=>$sem_adm_code,"adm_year"=>$adm_year,"graduation_semester_code"=>$graduation_semester_code,"graduation_semester"=>$graduation_semester,"graduated_year"=>$graduated_year,"entrance_GPA"=>$entrance_GPA,"exit_GPA"=>$exit_GPA,"major_1"=>$major_1,"minor_1"=>$minor_1,"concentration_1"=>$concentration_1,"major_2"=>$major_2,"minor_2"=>$minor_2,"concentration_2"=>$concentration_2,"orientation_college"=>$orientation_college,"orientation_college_date"=>$orientation_college_date,"orientation_program"=>$orientation_program,"orientation_program_date"=>$orientation_program_date,"licensure_completion"=>$licensure_completion,"dual_licensure"=>$dual_licensure,"liscensure_completion_type"=>$liscensure_completion_type,"license_obtained"=>$license_obtained,"license_obtained_month"=>$license_obtained_month,"license_obtained_year"=>$license_obtained_year));      
    
    
    //  mysqli_query($con, $my_insert);
    
    // $stmt->execute();
    echo "  Record updated successfully";
}

// $stmt->close();
//   }
// else {echo  "UNM_ID not unique" ;} 

//if (mysqli_query($con, $mysql_insert)) {


//                                } else {

//  echo "Error updating record: " . mysqli_error($con);
//                                            }
mysqli_close($con);
// $con->close()
?>