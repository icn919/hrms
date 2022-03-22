<?php include 'includes/session.php'; ?>
<?php include 'includes/header5.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>MANAGE EMPLOYEE LEAVE</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Leave Management</li>
        <li class="active">Manage Employee Leave</li>
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
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
              <a href="php_spreadsheet_export_leave.php" class="btn btn-success btn-sm btn-flat"><i class="fa fa-download"></i> Download</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>SYSTEM ID</th>
                  <th>NAME</th>
                  <th>PHOTO</th>
                  <th>LEAVE TYPE</th>
                  <th>DATE CREATED</th>
                  <th>FROM DATE</th>
                  <th>TO DATE</th>
                  <th>REMARKS</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, tbleave.id AS leaveid, employees.employee_id AS empid FROM tbleave LEFT JOIN employees ON employees.id=tbleave.employee_id LEFT JOIN tbleavetype ON tbleavetype.id=tbleave.leavetype_id ORDER BY posting DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td class='hidden'></td>
                          <td><?php echo $row['empid']; ?></td>
                          <td><?php echo $row['lastname'].', '.$row['firstname']; ?></td>
                          <td><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="50px" height="50px"></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['posting'])) ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['fromdate'])) ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['todate'])) ?></td>
                          <td><?php echo $row['adminremark']; ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['leaveid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['leaveid']; ?>"><i class="fa fa-trash"></i> Delete</button>
                          </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/leave_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('body').on('click','.edit', function(){
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $('body').on('click','.delete', function(){
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'leave_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      console.log(response);
      $('.date').html(response.date_advance);
      $('.employee_id').html(response.employee_id);
      $('.leavetype_id').html(response.leavetype_id);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.leaveid').val(response.leaveid);
      $('.leavetype').val(response.leavetype);
      $('.description').val(response.description);
      $('.adminremark').val(response.adminremark);
      $('#leavetype_val').val(response.leavetype_id).html(response.description);
      $('#datepicker_edit').val(response.fromdate);
      $('#datepicker1_edit').val(response.todate);
      $('#edit_adminremark').val(response.adminremark);
      $('#del_leaveid').val(response.id);
      $('#del_leave').val(response.leave);
      $('#del_description').html(response.description);
      $('#del_fromdate').val(response.fromdate);
      $('#del_todate').val(response.todate);
      $('#del_adminremark').val(response.adminremark);
    }
  });
}
</script>
</body>
</html>