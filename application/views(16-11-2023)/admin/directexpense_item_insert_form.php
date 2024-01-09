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
                  						<h3 class="box-title">Direct Expense Item Insert</h3>
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
												<?php if($responce = $this->session->flashdata('Successfully')): ?>
													<div class="text-center">
														<div class="alert alert-success text-center"><?php echo $responce;?></div>
													</div>
												<?php endif;?>
												<?php if($responce = $this->session->flashdata('UnSuccessfully')): ?>
													<div class="text-center">
														<div class="alert alert-danger text-center"><?php echo $responce;?></div>
													</div>
												<?php endif;?>
											</div>
										</div>
              						</div>
                					<div class="box-body">
				 						<form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/directexpense_item_insert" method="post" enctype="multipart/form-data">
                 							<div class="form-group">
												<label>Direct Expense Item<em>*</em></label>
												<input type="text" class="form-control" name="directexpenseitem" placeholder="Enter Direct Expense Item" value="<?php echo set_value('directexpenseitem'); ?>">
                    								<?php echo form_error('directexpenseitem', '<div class="error">', '</div>');  ?>
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
</body>
</html>


