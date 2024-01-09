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
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>

<?php

$fabricpart = '';

foreach ($ul1 as $row) {
  $racknoid .= '<option value="' . $row["racknoid"] . '">' . $row["rackno"] . '</option>';
}
?>

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
                    <h3 class="box-title">Pre Cost Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/precost_insert" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="pcdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="col-md-3">
                          <label>Production Unit<em>*</em></label>
                          <select class="form-control" name="accseasonid" id="accseasonid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($sl as $row1) {
                            ?>
                              <option value="<?php echo $row1['accseasonid']; ?>"><?php echo $row1['accseason']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('accseasonid', '<div class="error">', '</div>');  ?>
                        </div>

                        <div class="col-md-3">
                          <label>Buyer Name<em>*</em></label>
                          <select class="form-control" name="buyerid" id="buyerid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($ul as $row) {
                            ?>
                              <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('buyerid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Style No<em>*</em></label>
                          <select class="form-control" name="styleid" id="style">
                            <option value="">Select....</option>
                          </select>
                          <?php echo form_error('styleid', '<div class="error">', '</div>');  ?>
                        </div>

                      </div>
                      <br />
                      <div class="row">
                        <!-- <div class="col-md-3">
                          <label>Master LC Unit<em>*</em></label>
                          <input type="text" class="form-control" name="lc" id="lc" placeholder="Enter Master LC Unit">
                          <?php echo form_error('lc', '<div class="error">', '</div>');  ?>
                        </div> -->
                        <div class="col-md-3">
                          <label>Master LC Unit<em>*</em></label>
                          <select class="form-control" name="lc" id="lc">
                            <option value="">Select....</option>
                            <?php
                            foreach ($fl as $row) {
                            ?>
                              <option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('accseasonid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>MLC/S. Cont. no.<em>*</em></label>
                          <input type="text" class="form-control" name="mlc" id="mlc" placeholder="Enter MLC/S. Cont. no.">
                          <?php echo form_error('mlc', '<div class="error">', '</div>');  ?>
                        </div>



                        <div class="col-md-3">
                          <label>Order Qty<em>*</em></label>
                          <input type="text" class="form-control" name="oqty" id="oqty" placeholder="Enter Order Qty">
                          <?php echo form_error('oqty', '<div class="error">', '</div>');  ?>
                        </div>


                        <div class="col-md-3">
                          <label>FOB Value<em>*</em></label>
                          <input type="text" class="form-control" name="fv" id="fv" placeholder="Enter FOB Value">
                          <?php echo form_error('fv', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-3">
                          <label>Negotiate CM/Dz<em>*</em></label>
                          <input type="text" class="form-control" name="cmdz" id="cmdz" placeholder="Enter Negotiate CM/Dz">
                          <?php echo form_error('cmdz', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Deferred days of MLC<em>*</em></label>
                          <input type="text" class="form-control" name="dmlc" id="dmlc" placeholder="Enter Deferred days of MLC">
                          <?php echo form_error('dmlc', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Fabrics In-house Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="finhdate" readonly id="fihpd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="col-md-3">
                          <label>Producton Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="prdate" readonly id="prpd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-3">
                          <label>1st Shipment Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="fsdate" readonly id="fspd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="col-md-3">
                          <label>BTB Turnover Period<em>*</em></label>
                          <input type="text" class="form-control" name="btp" id="btp" placeholder="Enter BTB turnover period">
                          <?php echo form_error('btp', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Garments Type<em>*</em></label>
                          <select class="form-control" name="garmentstypeid" id="garmentstypeid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($gl as $row) {
                            ?>
                              <option value="<?php echo $row['garmentstypeid']; ?>"><?php echo $row['garmentstype']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('garmentstypeid', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="employeefile">Tec Pack<em>*</em></label>
                          <input type="file" name="sample" id="picture" required>
                          <p id="error1" style="display:none; color:#FF0000;">
                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                          </p>
                          <p id="error2" style="display:none; color:#FF0000;">
                            Maximum File Size Limit is 1MB.
                          </p>
                        </div>
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



  <script type="text/javascript">
    $(document).ready(function() {

      $('#buyerid').change(function(event) {
        event.preventDefault();
        var buyerid = $('#buyerid').val();

        $.ajax({
          type: 'get',
          url: "<?php echo base_url(); ?>Dashboard/show_styleno",
          dataType: "json",
          data: {
            buyerid
          },
          success: function(res) {
            $('#style').find('option').not(':first').remove();
            // Add options
            $.each(res, function(index, data) {
              $('#style').append('<option value="' + data['styleid'] + '">' + data['stylename'] + '</option>');
            });
          }
        });
      });
    });
  </script>

  <script>
    $(function() {
      $("input[id*='oqty']").keydown(function(event) {


        if (event.shiftKey == true) {
          event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

        } else {
          event.preventDefault();
        }

        if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
          event.preventDefault();

      });
    });
  </script>

  <script>
    $(function() {
      $("input[id*='fpc']").keydown(function(event) {


        if (event.shiftKey == true) {
          event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

        } else {
          event.preventDefault();
        }

        if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
          event.preventDefault();

      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('input[type="submit"]').prop("disabled", true);
      var a = 0;
      //binds to onchange event of your input field
      $('#picture').bind('change', function() {
        if ($('input:submit').attr('disabled', false)) {
          $('input:submit').attr('disabled', true);
        }
        var ext = $('#picture').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
          $('#error1').slideDown("slow");
          $('#error2').slideUp("slow");
          a = 0;
        } else {
          var picsize = (this.files[0].size);
          if (picsize > 1000000) {
            $('#error2').slideDown("slow");
            a = 0;
          } else {
            a = 1;
            $('#error2').slideUp("slow");
          }
          $('#error1').slideUp("slow");
          if (a == 1) {
            $('input:submit').attr('disabled', false);
          }
        }
      });
    });
  </script>
</body>

</html>