<?php
function get_options($table,$column) {
    // Database Connection
    $host="127.0.0.1";
    $port=3306;
    $socket="";
    $user="root";
    $password="bumpy";
    $dbname="coe_data_final_use";
    $tablename ="coe_student_final";

    $tablenm=$table;
    $colum_nm=$column;
    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
      or die ('Could not connect to the database server' . mysqli_connect_error());
    //set array
    $sql = "SELECT $colum_nm, ID FROM $tablenm";
    $stmt = $con->query($sql);
    //$dropdown = "<select name='campus'";
    foreach($stmt as $row){$dropdown.= "\r\n<option value='{$row['ID']}'>{$row[$colum_nm]} </option>"; } 
    echo $dropdown .= "\r\n</select>";
    echo $dropdown;
    //return $dropdown;
   
   mysqli_close($con);
}

//Open connection to database
/*$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="bumpy";
$dbname="report_COE_data";
//$tablename ="coe_student_final";

function f_sqlConnect($host, $user, $password, $dbname, $port, $socket)
    
//$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	//or die ('Could not connect to the database server' . mysqli_connect_error());


//$con = mysqli_connect($servername,$username,$password,$dbname); 


// Check connection

//if(!$con) { die ("connection error: " .mysqli_connect_errno());}

if (mysqli_connect_errno())

{
    
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
} else { echo 'Good to Go';}

$db_slected = mysqli_slect_db($db, $con)

    if(!$db_slected) { die ("connection error database: ". mysqli_connect_error());} else { echo "Good to Go";}
    
 /* Clean data*/
 function f_clean ($array) {return array_map ('mysqli_real_escape_string', $array);}
 
 //Nifty get ip function
 
 //function f_getIP(){if(f_validIP ($_SERVER["HTTP_CLIENT_IP"]))
            //return $_SERVER["HTTP_CLIENT_IP"];
       // } // get LATER******
 
 // CHECK TO SEE IF TABLE EXISTS
 
  /*  function f_tableExists($tablename, $database = false) {
            if(!database) {
                    $res = mysqli_query($con,"SELECT DATABASE()"); 
                     $database = mysql_results($res, 0);}
            }
    $res = mysqli_query($con, "SELECT COUNT (*) AS count FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$tablename'");
    
        return mysqli_result($res, 0) == 1;
        
        //Check for field exis and create if not
        
        function f_fieldExists($table, $column, $column_attr = "VARCHAR (255) NULL")
                $exists = false;
                $columns = mysqli_query ($con, "SHOW columns FROM $table");
                while ($c = mysql_fetch_assoc($columns)) {
                    if($c['Field'] == $column){
                        $exist = true;
                        break;}
                if(!exists){ mysqli_query($con, "ALTER TABLE '$table' ADD '$column' $column_attr");}
         }  */      
                 
    ?>

