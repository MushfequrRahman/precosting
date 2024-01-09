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
  div.scrollable-table-wrapper {
    height: 300px;
    overflow: auto;
  }

  .header {
    position: sticky;
    top: 0;
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
$trimsitemid = '';
$trimstypeid = '';
$supplierid = '';
$puomid = '';
$oqty = '';
$nomiid = '';

foreach ($ul as $row) {
  $trimsitemid .= '<option value="' . $row["trimsitemid"] . '">' . $row["trimsitem"] . '</option>';
}
foreach ($ul1 as $row) {
  $trimstypeid .= '<option value="' . $row["trimstypeid"] . '">' . $row["trimstype"] . '</option>';
}
foreach ($ul2 as $row) {
  $supplierid .= '<option value="' . $row["supplierid"] . '">' . $row["supplier"] . '</option>';
}
foreach ($ul3 as $row) {
  $puomid .= '<option value="' . $row["puomid"] . '">' . $row["puom"] . '</option>';
}
foreach ($ul4 as $row) {
  $oqty .=  $row["oqty"];
}
foreach ($nl as $row) {
  $nomiid .= '<option value="' . $row["nomiid"] . '">' . $row["nominame"] . '</option>';
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
                    <h3 class="box-title">Trims Budget Insert</h3>
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
                    <span style="text-align:center" id="error"></span>
                    <div style="text-align:center" id="item_table"></div>
                    <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/fabric_received_insert" method="post" enctype="multipart/form-data"><?php */ ?>
                    <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="tbcdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <input type="hidden" class="form-control pcid" name="pcid" value="<?php echo $pcid; ?>">
                      </div>
                      <br />
                      <br />



                      <div id="AuGroup">
                        <div class="row">
                        <div class="scrollable-table-wrapper">
                          <table class="table table-bordered" id="item_table1">
                            <thead style="background:#91b9e6;position: sticky;top: 0;">
                              <tr>
                                <th>Item Name</th>
                          		<th>Code/Reference</th>
                                <th style="text-align:center;">Supplier</th>
                                <th style="text-align:center;">Nomination</th>
                                <th style="text-align:center;">Order Qty</th>
                                <th style="text-align:center;">CAD</th>
                                <th style="text-align:center;">Allow%</th>
                                <th style="text-align:center;">UOM</th>
                                <th style="text-align:center;">Rate</th>
                                <th style="text-align:center;">BTB Days</th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
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

  <script>
    $(document).ready(function() {

      var count = 0;

      $(document).on('click', '.add', function() {
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><select name="trimsitemid[]" class="form-control trimsitemid" id="trimsitemid' + count + '"><option value="">Trims Item</option><?php echo $trimsitemid; ?></select></td>';
        html += '<td><select name="trimstypeid[]" class="form-control trimstypeid" id="trimstypeid' + count + '"><option value="">Trims Type</option><?php echo $trimstypeid; ?></select></td>';
        html += '<td><select name="supplierid[]" class="form-control supplierid" id="supplierid' + count + '"><option value="">Supplier</option><?php echo $supplierid; ?></select></td>';
        html += '<td><select name="nomiid[]" class="form-control nomiid" id="nomiid' + count + '"><option value="">Select</option><?php echo $nomiid; ?></select></td>';
        html += '<td><input type="text" name="orderqty[]" class="form-control orderqty" id="orderqty' + count + '" value="<?php echo $oqty; ?>"/></td>';
        html += '<td><input type="text" name="cad[]" class="form-control cad" id="cad' + count + '" /></td>';
        html += '<td><input type="text" name="allowance[]" class="form-control allowance" id="allowance' + count + '" /></td>';
        html += '<td><select name="puomid[]" class="form-control puomid" id="puomid' + count + '"><option value="">UOM</option><?php echo $puomid; ?></select></td>';
        html += '<td><input type="text" name="rate[]" class="form-control rate" id="rate' + count + '" /></td>';
		html += '<td><input type="text" name="btb[]" class="form-control btb" id="btb' + count + '" /></td>';
        html += '<td style="vertical-align:middle; text-align:center;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
        $('#item_table1').append(html);
      });

      $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      });

      $('#insert_form').on('submit', function(event) {
        event.preventDefault();
        var error = '';

        //$('#trimsitemid').each(function() {
//          var count = 1;
//          if ($(this).val() == '') {
//            error += '<p>Enter Trims Item</p>';
//            return false;
//          }
//          count = count + 1;
//        });

        //$('.trimstypeid').each(function() {
//          var count = 1;
//          if ($(this).val() == '') {
//            error += '<p>Enter Trims Type at ' + count + ' Row</p>';
//            return false;
//          }
//          count = count + 1;
//        });

        $('.supplierid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Supplier at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.nomiid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Nomination at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.orderqty').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Order at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.cad').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Cad at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.allowance').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Allowance at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.puomid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter UOM at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.rate').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Rate at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });
        
        var form_data = $(this).serialize();
        //alert(form_data);

        if (error == '') {
          $.ajax({
            url: "<?php echo base_url(); ?>Dashboard/trims_budget_insert",
            method: "get",
            data: form_data,
            success: function(data) {
              //alert(url);
              if (data == 'ok') {
                document.forms['insert_form'].reset();
                $('#item_table1').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Trims Received Details Saved</div>');
                window.setTimeout(function() {
                  location.reload()
                }, 3000)
                window.location.href = "<?php echo base_url(); ?>Dashboard/precost_list";
              }
            }
          });
        } else {
          $('#error').html('<div class="alert alert-danger">' + error + '</div>');
        }

      });

    });
  </script>
</body>
</html>