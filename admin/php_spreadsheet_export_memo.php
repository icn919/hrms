<?php

//php_spreadsheet_export.php
include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=apsystem", "root", "");


//$query = "SELECT * FROM tbmemo ORDER BY employee_id DESC";
$query = "SELECT *, tbmemo.id AS memoid, employees.employee_id AS empid FROM tbmemo LEFT JOIN employees ON employees.id=tbmemo.employee_id ORDER BY date_created DESC";

$statement = $connect->prepare($query); //$query

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();
  
  $active_sheet->setCellValue('A1', 'SYSTEM ID');
  $active_sheet->setCellValue('B1', 'NAME');
  $active_sheet->setCellValue('C1', 'DATE CREATED');
  $active_sheet->setCellValue('D1', 'TYPE OF MEMO');


  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["employee_id"]);
    $active_sheet->setCellValue('B' . $count, $row["lastname"].', '.$row["firstname"]);
    $active_sheet->setCellValue('C' . $count, date('M d, Y', strtotime($row['date_created'])));
    $active_sheet->setCellValue('D' . $count, $row["memo"]);

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
     <title>Memo - Export to Excel File</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center"><b>EXPORT EMPLOYEE MEMO FROM WEBPAGE TO EXCEL FILE</b></h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
              
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">.xlsx</option>
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
                  <th>TYPE OF MEMO</th>
                  <th>DATE CREATED</th>
                </tr>
                <?php

                foreach($result as $row)
                {
                  echo '
                  <tr>
                    <td>'.$row["employee_id"].'</td>
                    <td>'.$row["lastname"].', '.$row["firstname"].'</td>
                    <td>'.$row["memo"].'</td>
                    <td>'.date('M d, Y', strtotime($row['date_created'])).'</td>
              
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
