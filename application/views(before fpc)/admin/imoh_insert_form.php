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
                    <h3 class="box-title">Import Overhead Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/imoh_insert" method="post" enctype="multipart/form-data">
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
                        <label>Supplier Type<em>*</em></label>
                        <select class="form-control" name="stiid" id="stiid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($sl as $row) {
                          ?>
                            <option value="<?php echo $row['stiid']; ?>"><?php echo $row['suppliertype']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('stiid', '<div class="error">', '</div>');  ?>
                      </div>
                      
                      <div class="form-group">
                        <label>Import Overhead<em>*</em></label>
                        <input type="text" class="form-control" name="imoh" placeholder="Enter Import Overhead" value="<?php echo set_value('exoh'); ?>">
                        <?php echo form_error('imoh', '<div class="error">', '</div>');  ?>
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