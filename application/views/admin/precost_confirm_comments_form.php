<style>
  .error {
    color: red;
  }

  em {
    color: red;
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
                    <h3 class="box-title">PreCost Confirm Comments</h3>
                    
                  </div>
                  <div class="box-body">
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/precost_confirm_update_coo" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="pcid" value="<?php echo $pcid; ?>">
                      
                      <div class="form-group">
                        <label>Comments</label>
                        <textarea class="form-control ccomments" rows="5" name="ccomments" id="ccomments"></textarea>
                        
                      </div>
                      <div class="box-footer text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT" />
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