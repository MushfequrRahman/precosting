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

<?php /*?><?php

$fabricpart = '';

foreach ($ul1 as $row) {
  $racknoid .= '<option value="' . $row["racknoid"] . '">' . $row["rackno"] . '</option>';
}
?><?php */?>

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
                    <h3 class="box-title">Pre Cost Update</h3>
                    <?php /*?><div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div><?php */?>
                  </div>
                  <div class="box-body">
                  <?php foreach($ul as $row)
				{ ?>
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/precost_update" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <?php /*?><div class="col-md-3">
                          <label>Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="pcdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
                        </div><?php */?>
                        <input type="hidden" class="form-control" name="pcid"value="<?php echo $row['pcid']; ?>">
                        <div class="col-md-3">
                          <label>Production Unit/Budget<em>*</em></label>
                          <select class="form-control" name="accseasonid" id="accseasonid">
                            <option value="<?php echo $row['accseasonid']; ?>"><?php echo $row['accseason']; ?></option>
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
                          <select class="form-control" name="buyerid" readonly id="buyerid">
                             <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                            <!-- <?php
                            foreach ($bl as $row2) {
                            ?>
                              <option value="<?php echo $row2['buyerid']; ?>"><?php echo $row2['buyername']; ?></option>
                            <?php
                            }
                            ?> -->
                          </select>
                          <?php echo form_error('buyerid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Style No<em>*</em></label>
                          <select class="form-control" name="styleid" readonly id="style">
                            <option value="<?php echo $row['styleid']; ?>"><?php echo $row['stylename']; ?></option>
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
                            <option value="<?php echo $row['lc']; ?>"><?php echo $row['lc']; ?></option>
                            <?php
                            foreach ($fl as $row3) {
                            ?>
                              <option value="<?php echo $row3['factoryid']; ?>"><?php echo $row3['factoryname']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('accseasonid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>MLC/S. Cont. no.<em>*</em></label>
                          <input type="text" class="form-control" name="mlc" id="mlc" value="<?php echo $row['mlc']; ?>">
                          <?php echo form_error('mlc', '<div class="error">', '</div>');  ?>
                        </div>



                        <div class="col-md-3">
                          <label>Order Qty<em>*</em></label>
                          <input type="text" class="form-control" name="oqty" id="oqty" value="<?php echo $row['oqty']; ?>">
                          <?php echo form_error('oqty', '<div class="error">', '</div>');  ?>
                        </div>


                        <div class="col-md-3">
                          <label>FOB Value<em>*</em></label>
                          <input type="text" class="form-control" name="fpc" id="fpc" value="<?php echo $row['fpc']; ?>">
                          <?php echo form_error('fpc', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-3">
                          <label>Negotiate CM/Dz<em>*</em></label>
                          <input type="text" class="form-control" name="cmdz" id="cmdz" value="<?php echo $row['cmdz']; ?>">
                          <?php echo form_error('cmdz', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Deferred days of MLC<em>*</em></label>
                          <input type="text" class="form-control" name="dmlc" id="dmlc" value="<?php echo $row['dmlc']; ?>">
                          <?php echo form_error('dmlc', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Fabrics In-house Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="finhdate" readonly id="fihpd" value="<?php echo date("d-m-Y", strtotime($row['finhdate'])); ?>">
                        </div>
                        <div class="col-md-3">
                          <label>Producton Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="prdate" readonly id="prpd" value="<?php echo date("d-m-Y", strtotime($row['prdate'])); ?>">
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-3">
                          <label>1st Shipment Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="fsdate" readonly id="fspd" value="<?php echo date("d-m-Y", strtotime($row['fsdate'])); ?>">
                        </div>
                        <div class="col-md-3">
                          <label>BTB Turnover Period<em>*</em></label>
                          <input type="text" class="form-control" name="btp" id="btp" value="<?php echo $row['btp']; ?>">
                          <?php echo form_error('btp', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Garments Type<em>*</em></label>
                          <select class="form-control" name="garmentstypeid" id="garmentstypeid">
                            <option value="<?php echo $row['garmentstypeid']; ?>"><?php echo $row['garmentstype']; ?></option>
                            <?php
                            foreach ($gl as $row) {
                            ?>
                              <option value="<?php echo $row4['garmentstypeid']; ?>"><?php echo $row4['garmentstype']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('garmentstypeid', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br/>
                      
                      <div class="box-footer text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                      </div>
                    </form>
                    <?php } ?>	
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

  
</body>

</html>