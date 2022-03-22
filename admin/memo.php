<?php include 'includes/session.php'; ?>
<?php include 'includes/header1.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>MANAGE MEMO</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employee Management</li>
        <li class="active">Memo</li>
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
              <a href="php_spreadsheet_export_memo.php" class="btn btn-success btn-sm btn-flat"><i class="fa fa-download"></i> Download</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>SYSTEM ID</th>
                  <th>NAME</th>
                  <th>PHOTO</th>
                  <th>TYPE OF MEMO</th>
                  <th>DATE CREATED</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, tbmemo.id AS memoid, employees.employee_id AS empid FROM tbmemo LEFT JOIN employees ON employees.id=tbmemo.employee_id ORDER BY date_created DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td class='hidden'></td>
                          <td><?php echo $row['empid']; ?></td>
                          <td><?php echo $row['lastname'].', '.$row['firstname']; ?></td>
                          <td><img class = "picture" src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="50px" height="50px"></td>
                          <td><?php echo $row['memo']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['date_created'])) ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['memoid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['memoid']; ?>"><i class="fa fa-trash"></i> Delete</button>
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
  <?php include 'includes/memo_modal.php'; ?>
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
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'memo_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      console.log(response);
      $('.date').html(response.date_created);
      $('.employee_id').html(response.employee_id);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.memoid').val(response.memoid);
      $('#edit_memo').val(response.memo);
      $('#del_memoid').val(response.id);
      $('#del_memo').html(response.memo);
    }
  });
}
</script>
</body>
</html>