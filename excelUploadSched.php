
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
    





$query = "delete from assigned_schedule";

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

                $sched_id = isset($Row[0]) ? $Row[0] : '';
                $faculty_id = isset($Row[1]) ? $Row[1] : '';
                $subject_id = isset($Row[2]) ? $Row[2] : '';
                $college = isset($Row[3]) ? $Row[3] : '';
                $program = isset($Row[4]) ? $Row[4] : '';
                $course_code = isset($Row[5]) ? $Row[5] : '';
                $course_title = isset($Row[6]) ? $Row[6] : '';
                $class_section = isset($Row[7]) ? $Row[7] : '';
                $enrolled_students = isset($Row[8]) ? $Row[8] : '';
                $schedule = isset($Row[9]) ? $Row[9] : '';
                $room = isset($Row[10]) ? $Row[10] : '';
                $faculty = isset($Row[11]) ? $Row[11] : '';
                $program_title = isset($Row[12]) ? $Row[12] : '';
                $semester = isset($Row[13]) ? $Row[13] : '';
                $academic_year = isset($Row[14]) ? $Row[14] : '';



                $html.="<td>".$sched_id."</td>";
                $html.="<td>".$faculty_id."</td>";
                $html.="<td>".$subject_id."</td>";
                $html.="<td>".$college."</td>";
                $html.="<td>".$program."</td>";
                $html.="<td>".$course_code."</td>";
                $html.="<td>".$course_title."</td>";
                $html.="<td>".$class_section."</td>";
                $html.="<td>".$enrolled_students."</td>";
                $html.="<td>".$schedule."</td>";
                $html.="<td>".$room."</td>";
                $html.="<td>".$faculty."</td>";
                $html.="<td>".$program_title."</td>";
                $html.="<td>".$semester."</td>";
                $html.="<td>".$academic_year."</td>";


                $html.="</tr>";

          
               $query = "insert into assigned_schedule(sched_id,faculty_id,subject_id,college,program,course_code,course_title,class_section,enrolled_students,schedule,room,faculty,program_title,semester,academic_year) values('".$sched_id."','".$faculty_id."' ,'".$subject_id."','".$college."','".$program."','".$course_code."','".$course_title."','".$class_section."','".$enrolled_students."','".$schedule."','".$room."','".$faculty."','".$program_title."','".$semester."','".$academic_year."')";

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