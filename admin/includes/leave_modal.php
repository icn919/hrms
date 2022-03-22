<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Employee Leave</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="leave_add.php">
          		  <div class="form-group">
                  	<label for="employeeid" class="col-sm-3 control-label">System ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="leavetype" class="col-sm-3 control-label">Type of Leave</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="leavetype" id="leavetype" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM tbleavetype";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                	</div>
			          <div class="form-group">
                  	<label for="fromdate" class="col-sm-3 control-label">From Date</label>
                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="fromdate" name="fromdate" required>
                  	</div>
			            </div>
			          <div class="form-group">
                  	<label for="todate" class="col-sm-3 control-label">To Date</label>
                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="todate" name="todate" required>
                  	</div>
			            </div>
			          <div class="form-group">
                  	<label for="adminremark" class="col-sm-3 control-label">Remarks</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="adminremark" name="adminremark" required>
                  	</div>
			            </div>		  
              </div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Update Employee Leave</b></h4>
                  <br>
            	<h4 class="modal-title"><b><span class="employee_id"></span> - <span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="leave_edit.php">
            		<input type="hidden" class="leaveid" name="id">

                <div class="form-group">
                    <label for="edit_leavetype" class="col-sm-3 control-label">Type of Leave</label>
                    <div class="col-sm-9">
                    <select class="form-control" name="leavetype" id="edit_leavetype">
                        <option selected id="leavetype_val"></option>
                        <?php
                          $sql = "SELECT * FROM tbleavetype";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">From Date</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_edit" name="fromdate">
                      </div>
                    </div>
                </div>
				        <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">To Date</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker1_edit" name="todate">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adminremark" class="col-sm-3 control-label">Remarks</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_adminremark" name="adminremark">
                      </div>
                    </div>
                </div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="leave_delete.php">
            		<input type="hidden" class="leaveid" name="id">
            		<div class="text-center">
	                	<p><b>DELETE EMPLOYEE LEAVE</b></p>
	                	<h2 class="employee_name bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>