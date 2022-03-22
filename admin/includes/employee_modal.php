<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add New Employee Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" id="photo">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Address</label>

                  	<div class="col-sm-9">
                      <textarea class="form-control" name="address" id="address"></textarea>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="gender" required>
                        <option value="" selected>- Select -</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Plantilla</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="position" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM position";
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
                    <label for="sg" class="col-sm-3 control-label">SG</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="sg" name="sg">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly_rate" class="col-sm-3 control-label">Monthly Rate</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="monthly_rate" name="monthly_rate">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="datepicker_add" class="col-sm-3 control-label">Birthday</label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="birthdate">
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="age" class="col-sm-3 control-label">Age</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="age" name="age">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_info" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact_info" name="contact_info">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="datepicker1_add" class="col-sm-3 control-label">Date Hired</label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker1_add" name="created_on">
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="gsis" class="col-sm-3 control-label">GSIS BP NUMBER</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="gsis" name="gsis">
                    </div>
                </div>
                <div class="form-group">
                    <label for="philhealth" class="col-sm-3 control-label">PHILHEALTH NO. (MDR)</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="philhealth" name="philhealth">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pagibig" class="col-sm-3 control-label">PAG-IBIG NO. (MDF)</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="pagibig" name="pagibig">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bir" class="col-sm-3 control-label">BIR T.I.N.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="bir" name="bir">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comelec" class="col-sm-3 control-label">COMELEC V.I.N. / V.R.R. NO.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="comelec" name="comelec">
                    </div>
                </div>
                <div class="form-group">
                    <label for="green_card" class="col-sm-3 control-label">GREEN CARD NO.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="green_card" name="green_card">
                    </div>
                </div>
                <div class="form-group">
                    <label for="remarks" class="col-sm-3 control-label">Remarks</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Vaccinated</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="vaccinated" id="vaccinated" required>
                        <option value="" selected>- Select -</option>
                        <option value="Not Yet">Not Yet</option>
                        <option value="1st Dose">1st Dose</option>
                        <option value="2nd Dose">2nd Dose</option>
                        <option value="Done">Done</option>
                      </select>
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
              <h4 class="modal-title"><b>Update Employee Profile</b></h4>
              <br>
            	<h4 class="modal-title"><b><span class="employee_id"></span> - <span class="employee_name"></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="address" id="edit_address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="edit_gender">
                        <option selected id="gender_val"></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Plantilla</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="edit_position">
                        <option selected id="position_val"></option>
                        <?php
                          $sql = "SELECT * FROM position";
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
                    <label for="edit_sg" class="col-sm-3 control-label">SG</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_sg" name="sg">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_monthly_rate" class="col-sm-3 control-label">Monthly Rate</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_monthly_rate" name="monthly_rate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Birthday</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_edit" name="birthdate">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_age" class="col-sm-3 control-label">Age</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_age" name="age">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact_info" name="contact_info">
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker1_edit" class="col-sm-3 control-label">Date Hired</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker1_edit" name="created_on">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_gsis" class="col-sm-3 control-label">GSIS BP NUMBER</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_gsis" name="gsis">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_philhealth" class="col-sm-3 control-label">PHILHEALTH NO. (MDR)</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_philhealth" name="philhealth">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_pagibig" class="col-sm-3 control-label">PAG-IGIB NO. (MDF)</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_pagibig" name="pagibig">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_bir" class="col-sm-3 control-label">BIR T.I.N.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_bir" name="bir">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_comelec" class="col-sm-3 control-label">COMELEC V.I.N. / V.R.R. NO.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_comelec" name="comelec">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_green_card" class="col-sm-3 control-label">GREEN CARD NO.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_green_card" name="green_card">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_remarks" class="col-sm-3 control-label">Remarks</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_remarks" name="remarks">
                    </div>
                </div>
                <div class="form-group">
                    <label for="vaccinated" class="col-sm-3 control-label">Vaccinated</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="vaccinated" id="edit_vaccinated" required>
                        <option value="" selected>- Select -</option>
                        <option value="Not Yet">Not Yet</option>
                        <option value="1st Dose">1st Dose</option>
                        <option value="2nd Dose">2nd Dose</option>
                        <option value="Done">Done</option>
                      </select>
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

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Delete Employee Profile</b></h4>
              <br>
            	<h4 class="modal-title"><b><span class="employee_id"></span> - <span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_reason" class="col-sm-3 control-label">Cause of Deletion</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_reason" name="reason" required>
                    </div>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    