<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>EMPLOYEE ARCHIVE</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employee Management</li>
        <li class="active">Archive</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class = "table-responsive">
          <div class="box-header with-border">
            <a href="php_spreadsheet_export_archive.php" class="btn btn-success btn-sm btn-flat"><i class="fa fa-download"></i> Download</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>SYSTEM ID</th>
                  <th>NAME</th>
                  <th>PHOTO</th>
                  <th>PLANTILLA</th>
                  <th>SG</th>
                  <th>MONTHLY RATE</th>
                  <th>BIRTHDAY</th>
                  <th>AGE</th>
                  <th>CONTACT</th>
                  <th>DATE HIRED</th>
                  <th>GSIS BP NUMBER</th>
                  <th>PHILHEALTH NO. (MDR)</th>
                  <th>PAG-IBIG NO.(MDF)</th>
                  <th>BIR T.I.N.</th>
                  <th>COMELEC V.I.N. / V.R.R. NO.</th>
                  <th>GREEN CARD NO.</th>
                  <th>REMARKS</th>
                  <th>VACCINATED</th>
                  <th>DATE DELETED</th>
                  <th>CAUSE OF DELETION</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, employees.id AS empid FROM employees LEFT JOIN position ON position.id=employees.position_id WHERE reason IS NOT NULL";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['employee_id']; ?></td>
                          <td><?php echo $row['lastname'].', '.$row['firstname']; ?></td>
                          <td><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="50px" height="50px"><a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['empid']; ?>"></a></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['sg']; ?></td>
                          <td><?php echo $row['monthly_rate']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['birthdate'])) ?></td>
                          <td><?php echo $row['age']; ?></td>
                          <td><?php echo $row['contact_info']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                          <td><?php echo $row['gsis']; ?></td>
                          <td><?php echo $row['philhealth']; ?></td>
                          <td><?php echo $row['pagibig']; ?></td>
                          <td><?php echo $row['bir']; ?></td>
                          <td><?php echo $row['comelec']; ?></td>
                          <td><?php echo $row['green_card']; ?></td>
                          <td><?php echo $row['remarks']; ?></td>
                          <td><?php echo $row['vaccinated']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['deleted_on'])) ?></td>
                          <td><?php echo $row['reason']; ?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#position_val').val(response.position_id).html(response.description);
      $('#edit_reason').val(response.reason);
    }
  });
}
</script>
</body>
</html>
