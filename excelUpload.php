
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
    





$query = "delete from student_list";

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
      //  $html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
        for($i=0;$i<$totalSheet;$i++)
        {
            $Reader->ChangeSheet($i);

            

                 foreach ($Reader as $Row)
            {
                $html.="<tr>";

                $student_id = isset($Row[0]) ? $Row[0] : '';
                $student_pass = isset($Row[1]) ? $Row[1] : '';
                $student_name = isset($Row[2]) ? $Row[2] : '';
                $age = isset($Row[3]) ? $Row[3] : '';
                $gender = isset($Row[4]) ? $Row[4] : '';
                $year = isset($Row[5]) ? $Row[5] : '';
                $section= isset($Row[6]) ? $Row[6] : '';
                $subject_code_enrolled = isset($Row[7]) ? $Row[7] : '';



                $html.="<td>".$student_id."</td>";
                $html.="<td>".$student_pass."</td>";
                $html.="<td>".$student_name."</td>";
                $html.="<td>".$age."</td>";
                $html.="<td>".$gender."</td>";
                $html.="<td>".$year."</td>";
                $html.="<td>".$section."</td>";
                $html.="<td>".$subject_code_enrolled."</td>";


                $html.="</tr>";

          
               $query = "insert into student_list(student_id,student_pass,student_name,age,gender,year,section,subject_code_enrolled) values('".$student_id."','".$student_pass."' ,'".$student_name."','".$age."','".$gender."','".$year."','".$section."','".$subject_code_enrolled."')";

               $mysqli->query($query);
                  


        }
        $html.="</table>";

       

         //   echo "Success";
        }

         echo "<h1>Please wait. Redirecting...<h1>";

       
                    echo "<script>alert('Upload successful')</script>";
                   //  header("Location: upload.php");
            

                 header( "Refresh:2; url=upload.php", true, 303);

    }
        else
        {
            die("<br/>Sorry, File type is not allowed. Only Excel file.");
        }
}
?>