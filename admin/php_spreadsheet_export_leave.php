<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=apsystem", "root", "");


//$query = "SELECT * FROM employees ORDER BY employee_id DESC";
$sql = "SELECT *, tbleave.id AS leaveid, employees.employee_id AS empid FROM tbleave LEFT JOIN employees ON employees.id=tbleave.employee_id LEFT JOIN tbleavetype ON tbleavetype.id=tbleave.leavetype_id ORDER BY posting DESC";

$statement = $connect->prepare($sql); //query

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'SYSTEM ID');
  $active_sheet->setCellValue('B1', 'NAME');
  $active_sheet->setCellValue('C1', 'TYPE OF LEAVE');
  $active_sheet->setCellValue('D1', 'DATE CREATED');
  $active_sheet->setCellValue('E1', 'FROM DATE');
  $active_sheet->setCellValue('F1', 'TO DATE');
  $active_sheet->setCellValue('G1', 'REMARKS');
 

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["employee_id"]);
    $active_sheet->setCellValue('B' . $count, $row["lastname"].', '.$row["firstname"]);
    $active_sheet->setCellValue('C' . $count, $row["description"]);
    $active_sheet->setCellValue('D' . $count, date('M d, Y', strtotime($row['posting'])));
    $active_sheet->setCellValue('E' . $count, date('M d, Y', strtotime($row['fromdate'])));
    $active_sheet->setCellValue('F' . $count, date('M d, Y', strtotime($row['todate'])));
    $active_sheet->setCellValue('G' . $count, $row["adminremark"]);



    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}

?>
<!DOCTYPE html>
<html>
   <head>
     <title>Leave - Export to Excel File</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center"><b>EXPORT EMPLOYEE LEAVE FROM WEBPAGE TO EXCEL FILE</b></h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
              
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
                <tr>
                  <th>SYSTEM ID</th>
                  <th>NAME</th>
                  <th>LEAVE TYPE</th>
                  <th>DATE CREATED</th>
                  <th>FROM DATE</th>
                  <th>TO DATE</th>
                  <th>REMARKS</th>
                </tr>
                <?php

                foreach($result as $row)
                {
                  echo '
                  <tr>
                    <td>'.$row["employee_id"].'</td>
                    <td>'.$row["lastname"].', '.$row["firstname"].'</td>
                    <td>'.$row["description"].'</td>
                    <td>'.date('M d, Y', strtotime($row['posting'])).'</td>
                    <td>'.date('M d, Y', strtotime($row['fromdate'])).'</td>
                    <td>'.date('M d, Y', strtotime($row['todate'])).'</td>
                    <td>'.$row["adminremark"].'</td>
                  </tr>
                  ';
                }
                ?>

              </table>
          </div>
          </div>
        </div>
     </div>
      <br />
      <br />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
