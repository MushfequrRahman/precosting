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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/accseason_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Factory<em>*</em></label>
                        <select class="form-control" name="fid" id="fid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($fl as $row) {
                          ?>
                            <option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>ABP Name<em>*</em></label>
                        <input type="text" class="form-control" name="accseason" placeholder="Enter ABP Name">
                        <?php echo form_error('accseason', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Date<em>*</em></label>
                        <input type="text" class="form-control pd" name="accdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
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