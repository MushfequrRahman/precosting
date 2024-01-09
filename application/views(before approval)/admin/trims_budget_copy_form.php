<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }

  label {
    font-size: 13px;
  }

  th {
    font-size: 13px;
  }
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
                    <h3 class="box-title">Copy Trims items</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/precost_insert" method="post" enctype="multipart/form-data"><?php */?>
                      <div class="row">
                      <input type="hidden" class="form-control" name="ppcid" readonly id="ppcid" value="<?php echo $pcid; ?>">
                        
                        <div class="col-md-3">
                          <!--<label>JOB NO<em>*</em></label>-->
                          <select class="form-control" name="jobno" id="jobno">
                            <option value="">Job No</option>
                            <?php
                            foreach ($jl as $row) {
                            ?>
                              <option value="<?php echo $row['pcid']; ?>"><?php echo $row['jobno']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('jobno', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                        <input type="submit" class="btn btn-primary" id="btn" name="submit" value="CLICK" />
                        </div>
					</div>
 
                      
                      
                      
                      
                    <!--</form>-->
                  </div>
                </div>
              </div>
            </div>
            <div id="ajax-content-container"></div>
          </div>
          
        </div>
        
      </section>
    </div>
  </div>


<script>
    $(document).ready(function(){
        $( "#btn" ).click(function(event)
        {
            event.preventDefault();
            var jobno= $("#jobno").val();
			var ppcid= $("#ppcid").val();
            $.ajax(
                {
                    type:'post',
                    url: '<?php echo base_url(); ?>Dashboard/trims_budget_copy_list',
					dataType:"text",
                    data:{ jobno:jobno,ppcid:ppcid},
					      success: function(data) 
						  	{
       					  		$('#ajax-content-container').html(data);
								
      						},
	  					error: function(){
    					alert('error!');
  				}
                    
                });
        });
    });
</script>
  

  
  

  
</body>

</html>