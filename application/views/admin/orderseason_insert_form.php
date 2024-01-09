<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }
</style>
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>

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
                    <h3 class="box-title">Season Insert</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                        <?php if ($responce = $this->session->flashdata('UnSuccessfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-danger text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/orderseason_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>ID<em>*</em></label>
                        <input type="text" class="form-control" name="ordsid" placeholder="Enter Order Season ID">
                        <?php echo form_error('ordsid', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Name<em>*</em></label>
                        <input type="text" class="form-control" name="orderseason" placeholder="Enter Name">
                        <?php echo form_error('orderseason', '<div class="error">', '</div>');  ?>
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