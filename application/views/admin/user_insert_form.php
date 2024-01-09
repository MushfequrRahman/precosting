<style>
.error{color:red;}
em{color:red;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
    		<section class="content">
      			<div class="row">
        			<div class="col-md-12">
      					<div class="row">
           					<div class="col-md-12">
              					<div class="box box-danger">
                					<div class="box-header with-border">
                  						<h3 class="box-title">User Info Insert</h3>
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
												<?php if($responce = $this->session->flashdata('Successfully')): ?>
												<div class="text-center">
													<div class="alert alert-success text-center"><?php echo $responce;?></div>
												</div>
												<?php endif;?>
											</div>
										</div>
              						</div>
               						<div class="box-body">
				 						<form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/user_insert" method="post" enctype="multipart/form-data">
                  							<div class="form-group">
												<label>Factory Name</label>
												<select class="form-control" name="factoryid" id="factoryid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul as $row)
															{
													?>
                    											<option value="<?php echo $row['factoryid'];?>"><?php echo $row['factoryname'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    								<?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
											</div>
                 							<div class="form-group">
												<label>Department</label>
												<select class="form-control" name="departmentid" id="departmentid">
                    								<option value="">Select....</option>
                                                    <?php
														foreach($ul1 as $row)
															{
													?>
                    											<option value="<?php echo $row['deptid'];?>"><?php echo $row['departmentname'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    								<?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
                        						</select>
											</div>
                							<div class="form-group">
												<label>Name</label>
												<input type="text" class="form-control" name="name" placeholder="Enter Name">
                    							<?php echo form_error('name', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>Designation</label>
												<select class="form-control" name="designationid" id="designationid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul2 as $row)
															{
													?>
                    											<option value="<?php echo $row['desigid'];?>"><?php echo $row['designation'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    							<?php echo form_error('designationid', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>Email</label>
												<input type="text" class="form-control" name="oemail" placeholder="Enter Office Email">
                    							<?php echo form_error('oemail', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>Mobile</label>
												<input type="text" class="form-control" name="pmobile" placeholder="Enter Mobile">
                    							<?php echo form_error('pmobile', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>User Type</label>
												<select class="form-control" name="usertypeid" id="usertypeid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul3 as $row)
															{
													?>
                    											<option value="<?php echo $row['usertypeid'];?>"><?php echo $row['usertype'];?></option>
                    								<?php
															}
														?>
                    							</select>
                    							<?php echo form_error('usertypeid', '<div class="error">', '</div>');  ?>
											</div>
											<div class="form-group">
												<label>Checked By</label>
												<select class="form-control" name="kamuserid" id="kamuserid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul4 as $row)
															{
													?>
                    											<option value="<?php echo $row['kamuserid'];?>"><?php echo $row['kamuserid'];?></option>
                    								<?php
															}
														?>
                    							</select>
                    							<?php echo form_error('kamuserid', '<div class="error">', '</div>');  ?>
											</div>
											<div class="form-group">
												<label>Authorized By</label>
												<select class="form-control" name="authuserid" id="authuserid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul5 as $row)
															{
													?>
                    											<option value="<?php echo $row['authuserid'];?>"><?php echo $row['authuserid'];?></option>
                    								<?php
															}
														?>
                    							</select>
                    							<?php echo form_error('authuserid', '<div class="error">', '</div>');  ?>
											</div>
											<div class="form-group">
												<label>Approved By</label>
												<select class="form-control" name="appuserid" id="appuserid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul6 as $row)
															{
													?>
                    											<option value="<?php echo $row['appuserid'];?>"><?php echo $row['appuserid'];?></option>
                    								<?php
															}
														?>
                    							</select>
                    							<?php echo form_error('appuserid', '<div class="error">', '</div>');  ?>
											</div>
											<div class="form-group">
												<label>Accounts</label>
												<select class="form-control" name="accuserid" id="accuserid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul7 as $row)
															{
													?>
                    											<option value="<?php echo $row['accuserid'];?>"><?php echo $row['accuserid'];?></option>
                    								<?php
															}
														?>
                    							</select>
                    							<?php echo form_error('accuserid', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>User ID</label>
												<input type="text" class="form-control" name="userid" placeholder="Enter Factory+User ID">
                    							<?php echo form_error('userid', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" placeholder="Enter User Password">
                    							<?php echo form_error('password', '<div class="error">', '</div>');  ?>
											</div>
											<div class="box-footer text-center">
												<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
</html>


