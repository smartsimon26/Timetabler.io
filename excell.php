<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "timetabler");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM lectures";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Unit Code</th>  
                         <th>Lecturer</th>  
                         <th>Day</th>   
                         <th>Time</th>  
                         <th>Venue</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["unit_code"].'</td>  
                         <td>'.$row["lecturer"].'</td>  
                         <td>'.$row["Allocated_Day"].'</td>  
                        <td>'.$row["Allocated_Timeshift"].'</td>  
                        <td>'.$row["Allocated_Venue"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Final Timetable.xls');
  echo $output;
 }
}
?>