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
    font-size: 13px; text-align:center;
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
$fabricitemid = '';
$fabrictypeid = '';
$supplierid = '';
$puomid = '';

foreach ($ul as $row) {
  $fabricitemid .= '<option value="' . $row["fabricitemid"] . '">' . $row["fabricitem"] . '</option>';
}
foreach ($ul1 as $row) {
  $fabrictypeid .= '<option value="' . $row["fabrictypeid"] . '">' . $row["fabrictype"] . '</option>';
}
foreach ($ul2 as $row) {
  $supplierid .= '<option value="' . $row["supplierid"] . '">' . $row["supplier"] . '</option>';
}
foreach ($ul3 as $row) {
  $puomid .= '<option value="' . $row["puomid"] . '">' . $row["puom"] . '</option>';
}
?><?php */ ?>

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
                    <h3 class="box-title">IE Analysis Update</h3>

                  </div>
                  <div class="box-body">

                    <?php ?><form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/ie_analysis_update" method="post" enctype="multipart/form-data"><?php  ?>

                      <div class="row">
                        <input type="hidden" class="form-control pcid" name="pcid[]" value="<?php echo $pcid; ?>">
                      </div>

                      <div class="row">
                        <table id="tableData" class="table table-hover table-bordered">
                          <thead style="background:#91b9e6;">
                            <tr>
                              <th>SL</th>
                               <th style="text-align:center;">Production Type</th>
                                <th style="text-align:center;">Man</th>
                                <th style="text-align:center;">Machine</th>
                                <th style="text-align:center;">Pdn/Hour</th>
                                <th style="text-align:center;">SAM/SMV</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;

                            foreach ($iel as $row) { ?>
                              <tr>
                                <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                                <td style="vertical-align:middle; display:none;"><input type="text" readonly class="form-control" name="ieaid[]" value="<?php echo $row['ieaid']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" readonly name="productiontypeid[]" id="productiontypeid" value="<?php echo $row['productiontype']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="man[]" id="man" value="<?php echo $row['man']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="machine[]" id="machine" value="<?php echo $row['machine']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="ph[]" id="ph" value="<?php echo $row['ph']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="sm[]" id="sm" value="<?php echo $row['sm']; ?>"></td>
                                </tr>
                            <?php

                            } ?>

                          </tbody>
                        </table>
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