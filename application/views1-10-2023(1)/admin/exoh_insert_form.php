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
                    <h3 class="box-title">Export Overhead Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/exoh_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Acc.Season<em>*</em></label>
                        <select class="form-control" name="accseasonid" id="accseasonid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['accseasonid']; ?>"><?php echo $row['accseason']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('accseasonid', '<div class="error">', '</div>');  ?>
                      </div>

                      <div class="form-group">
                        <label>Buyer<em>*</em></label>
                        <select class="form-control" name="buyerid" id="buyerid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($bl as $row) {
                          ?>
                            <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('buyerid', '<div class="error">', '</div>');  ?>
                      </div>
                      
                      <div class="form-group">
                        <label>Export Overhead<em>*</em></label>
                        <input type="text" class="form-control" name="exoh" placeholder="Enter Export Overhead" value="<?php echo set_value('exoh'); ?>">
                        <?php echo form_error('exoh', '<div class="error">', '</div>');  ?>
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

  <!-- <script type="text/javascript">
    $(document).ready(function() {

      $('#buyerid').change(function(event) {
        event.preventDefault();
        var buyerid = $('#buyerid').val();

        $.ajax({
          type: 'get',
          url: "<?php echo base_url(); ?>Dashboard/show_jobno",
          dataType: "json",
          data: {
            buyerid: buyerid
          },
          success: function(res) {
            $('#jobno').find('option').remove();
            // Add options
            $.each(res, function(index, data) {
              $('#jobno').append('<option value="' + data['jobnoid'] + '">' + data['jobno'] + '</option>');
            });
          }
        });
      });
    });
  </script> -->

</body>

</html>