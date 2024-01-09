<style type="text/css">
  .paging-nav {
    text-align: right;
    padding-top: 2px;
  }

  .paging-nav a {
    margin: auto 1px;
    text-decoration: none;
    display: inline-block;
    padding: 1px 7px;
    background: #91b9e6;
    color: white;
    border-radius: 3px;
  }

  .paging-nav .selected-page {
    background: #187ed5;
    font-weight: bold;
  }

  .paging-nav,
  #tableData {


    text-align: center;
  }

  th,
  td {
    font-size: 12px;
    text-align: center;
  }

  td {
    font-weight: 600;
    font-variant: small-caps;
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

<!-- /.box-header -->

  <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/trims_budget_copy_insert" method="post" enctype="multipart/form-data">
  <div class="scrollable-table-wrapper">
    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;position: sticky;top: 0;">
        <tr>
          <th>SL</th>
          <th style="display:none;">ID</th>
          <th style="display:none;">Pcid</th>
          <th>Item Name</th>
          <th>Code/Reference</th>
          <th>Supplier</th>
          <th>Nomination</th>
          <th>Order Qty</th>
          <th>CAD</th>
          <th>Allowance</th>
          <th>UOM</th>
          <th>Rate</th>
          <th>BTB Days</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($tbl as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="display:none;"><input type="text" readonly class="form-control" name="pcid" value="<?php echo $ppcid; ?>"></td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="trimsitemid[]" id="trimsitemid">
                <option value="<?php echo $row['trimsitemid']; ?>"><?php echo $row['trimsitem']; ?></option>
                <?php
                foreach ($ul as $row1) {
                ?>
                  <option value="<?php echo $row1['trimsitemid']; ?>"><?php echo $row1['trimsitem']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('trimsitemid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="trimstypeid[]" id="trimstypeid">
                <option value="<?php echo $row['trimstypeid']; ?>"><?php echo $row['trimstype']; ?></option>
                <?php
                foreach ($ul1 as $row2) {
                ?>
                  <option value="<?php echo $row2['trimstypeid']; ?>"><?php echo $row2['trimstype']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('trimstypeid', '<div class="error">', '</div>');  ?>

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
            <td style="vertical-align:middle;">
              <select class="form-control" name="nomiid[]" id="nomiid">
                <option value="<?php echo $row['nomiid']; ?>"><?php echo $row['nominame']; ?></option>
                <?php
                foreach ($nl as $rown) {
                ?>
                  <option value="<?php echo $row3['nomiid']; ?>"><?php echo $row3['nominame']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('nomiid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="orderqty[]" id="orderqty" value="<?php echo $row['tborderqty']; ?>"></td>
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
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="btb[]" id="btb" value="<?php echo $row['tbtb']; ?>"></td>
            <td style="vertical-align:middle;"> <input type="button" class="deleteDep btn btn-danger" value="Delete" /></td>
          </tr>
        <?php

        } ?>

      </tbody>
    </table>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2 col-md-offset-5 col-lg-offset-5">
      <label>&nbsp;</label>
      <input type="submit" class="btn btn-primary " name="submit" id="btn" value="Submit" />
    </div>


<script>
  $('body').on('click', 'input.deleteDep', function() {
    $(this).parents('tr').remove();
  });
</script>