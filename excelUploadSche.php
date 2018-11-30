
<?php
require('reader/php-excel-reader/excel_reader2.php');
require('reader/SpreadsheetReader.php');

$dbHost = "localhost";
$dbDatabase = "evaluationdb";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
//print_r($_FILES);
if(isset($_POST['Submit']))
{
    





$query = "delete from login_table";

 $mysqli->query($query);

              


    $mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if(in_array($_FILES["file"]["type"],$mimes))
    {
        $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);

		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
        $Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());
       // echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
        $html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
        for($i=0;$i<$totalSheet;$i++)
        {
            $Reader->ChangeSheet($i);

            

                 foreach ($Reader as $Row)
            {
                $html.="<tr>";

                $emp_id = isset($Row[0]) ? $Row[0] : '';
                $emp_pass = isset($Row[1]) ? $Row[1] : '';
                $emp_type = isset($Row[2]) ? $Row[2] : '';



                $html.="<td>".$emp_id."</td>";
                $html.="<td>".$emp_pass."</td>";
                $html.="<td>".$emp_type."</td>";


                $html.="</tr>";

          
               $query = "insert into login_table(emp_id,emp_pass,emp_type) values('".$emp_id."','".$emp_pass."' ,'".$emp_type."')";
               $mysqli->query($query);
                 


        }


        $html.="</table>";

       

            //echo "Success";
        }

        echo "<h1>Please wait. Redirecting...<h1>";

   
                    echo "<script>alert('Upload successful')</script>";
                
                 header( "Refresh:2; url=upload.php", true, 303);

       

    }
        else
        {
            die("<br/>Sorry, File type is not allowed. Only Excel file.");
        }
}
?>