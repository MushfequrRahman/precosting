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
                    <h3 class="box-title">Direct Expense Budget Delete</h3>

                  </div>
                  <div class="box-body">

                    <?php /*?><?php ?><form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/directexpense_budget_update" method="post" enctype="multipart/form-data"><?php  ?><?php */?>

                      <div class="row">
                        <input type="hidden" class="form-control pcid" name="pcid[]" value="<?php echo $pcid; ?>">
                      </div>

                      <div class="row">
                        <table id="tableData" class="table table-hover table-bordered">
                          <thead style="background:#91b9e6;">
                            <tr>
                              <th>SL</th>
                              <th>Select</th>
                              <th style="display:none;">ID</th>
                              <th>Item</th>
                              <th>Type</th>
                              <th>Supplier</th>
                              <th>Order Qty</th>
                              <th>CAD</th>
                              <th>Allowance</th>
                              <th>UOM</th>
                              <th>Rate</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;

                            foreach ($debl as $row) { ?>
                              <tr>
                                <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                                <td style="vertical-align:middle; text-align:center;"><input type="checkbox" class="delete_checkbox" name="debid_del[]" value="<?php echo $row['debid']; ?>"></td>
                                <td style="vertical-align:middle; display:none;"><input type="text" readonly class="form-control" name="debid[]" value="<?php echo $row['debid']; ?>"></td>
                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="directexpenseitemid[]" id="directexpenseitemid">
                                    <option value="<?php echo $row['directexpenseitemid']; ?>"><?php echo $row['directexpenseitem']; ?></option>
                                    <?php
                                    foreach ($ul as $row1) {
                                    ?>
                                      <option value="<?php echo $row1['directexpenseitemid']; ?>"><?php echo $row1['directexpenseitem']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('directexpenseitemid', '<div class="error">', '</div>');  ?>
                                </td>
                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="directexpensetypeid[]" id="directexpensetypeid">
                                    <option value="<?php echo $row['directexpensetypeid']; ?>"><?php echo $row['directexpensetype']; ?></option>
                                    <?php
                                    foreach ($ul1 as $row2) {
                                    ?>
                                      <option value="<?php echo $row2['directexpensetypeid']; ?>"><?php echo $row2['directexpensetype']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('directexpensetypeid', '<div class="error">', '</div>');  ?>

                                </td>
                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="supplierid[]" id="supplierid">
                                    <option value="<?php echo $row['supplierid']; ?>"><?php echo $row['supplier']; ?></option>
                                    <?php
                                    foreach ($ul2 as $row3) {
                                    ?>
                                      <option value="<?php echo $row3['supplierid']; ?>"><?php echo $row3['supplier']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('supplierid', '<div class="error">', '</div>');  ?>
                                </td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="orderqty[]" id="orderqty" value="<?php echo $row['deborderqty']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="cad[]" id="cad" value="<?php echo $row['cad']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="allowance[]" id="allowance" value="<?php echo $row['allowance']; ?>"></td>


                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="puomid[]" id="puomid">
                                    <option value="<?php echo $row['puomid']; ?>"><?php echo $row['puom']; ?></option>
                                    <?php
                                    foreach ($ul3 as $row4) {
                                    ?>
                                      <option value="<?php echo $row4['puomid']; ?>"><?php echo $row4['puom']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('puomid', '<div class="error">', '</div>');  ?>
                                </td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" name="rate[]" id="rate" value="<?php echo $row['rate']; ?>"></td>

                              </tr>
                            <?php

                            } ?>

                          </tbody>
                        </table>
                      </div>


                      <div class="box-footer text-center">
                        <input type="submit" class="btn btn-danger" name="delete" id="delete_all" value="DELETE" />
                      </div>
                    <!--</form>-->
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
$(document).ready(function(){
 
 $('.delete_checkbox').click(function(){
  if($(this).is(':checked'))
  {
   $(this).closest('tr').addClass('removeRow');
  }
  else
  {
   $(this).closest('tr').removeClass('removeRow');
  }
 });

 $('#delete_all').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {
   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url(); ?>Dashboard/directexpense_budget_delete",
    method:"get",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     //$('.removeRow').fadeOut(1500);
	 window.setTimeout(function() {
                  location.reload()
                }, 3000)
                window.location.href = "<?php echo base_url(); ?>Dashboard/precost_list";
	 
    }
   })
  }
  else
  {
   alert('Select atleast one records');
  }
 });

});
</script>



</body>

</html>