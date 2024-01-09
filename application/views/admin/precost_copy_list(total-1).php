<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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

  div.scrollable-table-wrapper {
    height: 300px;
    overflow: auto;
  }

  .header {
    position: sticky;
    top: 0;
  }

  .text-right-input {
    text-align: right;
    width: 100%;
    padding: 0 10px 0 0;
  }
</style>
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>


                    <h3 class="box-title">PreCost List Details</h3>
                    
                   
                  </div>
                  <div class="box-body table-responsive no-padding">
                  <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/precost_insert" method="post" enctype="multipart/form-data">
                    <?php
                        foreach ($usl as $row) {
                        ?>
                          <input type="hidden" class="form-control" name="kamuserid" readonly id="kamuserid" value="<?php echo $row['kamuserid']; ?>">
                          <input type="hidden" class="form-control" name="authuserid" readonly id="authuserid" value="<?php echo $row['authuserid']; ?>">
                          <input type="hidden" class="form-control" name="appuserid" readonly id="appuserid" value="<?php echo $row['appuserid']; ?>">
                          <input type="hidden" class="form-control" name="accuserid" readonly id="accuserid" value="<?php echo $row['accuserid']; ?>">
                        <?php
                        }
                        ?>
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>Tec Pack</th>
                          <th>Order For</th>
                          <th>Production Unit/Budget Year</th>
                          <th>Buyer</th>
                          <th>Style</th>
                          <th>Master LC Unit</th>
                          <th>MLC/S. Cont. no.</th>
                          <th>Order Qty</th>
                          <th>FOB/Item</th>
                          <!--<th>FOB Value</th>-->
                          <th>Negotiate CM/Dz</th>
                          <!-- <th>Achieved CM</th> -->
                          <th>Deferred days of MLC</th>
                          <th>Fabrics In-house Date</th>
                          <th>Production Date</th>
                          <th>1st Ship Date</th>
                          <th>BTB Turnover Period</th>
                          <!--<th>Order life Cycle</th>-->
                          <th>Garments Type</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($ul as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><input type="file" name="sample" id="picture" required>
                      <p id="error1" style="display:none; color:#FF0000;">
                        Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                      </p>
                      <p id="error2" style="display:none; color:#FF0000;">
                        Maximum File Size Limit is 1MB.
                      </p></td>
                            
                            <td style="vertical-align:middle;"><select class="form-control" name="orderforid" id="orderforid">
                            <option value="<?php echo $row['orderforid']; ?>"><?php echo $row['orderfor']; ?></option>
                            <?php
                            foreach ($ofl as $row11) {
                            ?>
                              <option value="<?php echo $row11['orderforid']; ?>"><?php echo $row11['orderfor']; ?></option>
                            <?php
                            }
                            ?>
                          </select></td>
                            <td style="vertical-align:middle;"><select class="form-control" name="accseasonid" id="accseasonid">
                            <option value="<?php echo $row['accseasonid']; ?>"><?php echo $row['accseason']; ?></option>
                            <?php
                            foreach ($sl as $row1) {
                            ?>
                              <option value="<?php echo $row1['accseasonid']; ?>"><?php echo $row1['accseason']; ?></option>
                            <?php
                            }
                            ?>
                          </select></td>
                            <td style="vertical-align:middle;"><select class="form-control" name="buyerid" id="buyerid">
                            <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                            <?php
                            foreach ($bl as $rowb) {
                            ?>
                              <option value="<?php echo $rowb['buyerid']; ?>"><?php echo $rowb['buyername']; ?></option>
                            <?php
                            }
                            ?>
                          </select></td>
                            <td style="vertical-align:middle;"><select class="form-control" name="styleid" id="style">
                            <option value="<?php echo $row['styleid']; ?>"><?php echo $row['stylename']; ?></option>
                          </select></td>
                            <td style="vertical-align:middle;"><select class="form-control" name="lc" id="lc">
                            <option value="<?php echo $row['lc']; ?>"><?php echo $row['lc']; ?></option>
                            <?php
                            foreach ($ffl as $rowf) {
                            ?>
                              <option value="<?php echo $rowf['factoryid']; ?>"><?php echo $rowf['factoryname']; ?></option>
                            <?php
                            }
                            ?>
                          </select></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="mlc" id="mlc" placeholder="Enter MLC/S. Cont. no."></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="oqty" id="oqty" value="<?php echo $row['oqty']; ?>"></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="fpc" id="fpc" value="<?php echo $row['fpc']; ?>"></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['fv'] / $row['oqty']; ?></td><?php */ ?>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['oqty'] * $row['fpc']; ?></td><?php */?>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['fv']; ?></td><?php */ ?>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="cmdz" id="cmdz" value="<?php echo $row['cmdz']; ?>"></td>
                            <!-- <td style="vertical-align:middle;">Formula</td> -->
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="dmlc" id="dmlc" value="<?php echo $row['dmlc']; ?>"></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['finhdate'])); ?></td><?php */?>
                            <td style="vertical-align:middle;"><input type="text" class="form-control pd" name="finhdate" readonly id="fihpd" value="<?php echo date("d-m-Y", strtotime($row['finhdate'])); ?>"></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['prdate'])); ?></td><?php */?>
                             <td style="vertical-align:middle;"><input type="text" class="form-control pd" name="prdate" readonly id="prpd" value="<?php echo date("d-m-Y", strtotime($row['prdate'])); ?>"></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fsdate'])); ?></td><?php */?>
                            <td style="vertical-align:middle;"><input type="text" class="form-control pd" name="fsdate" readonly id="fspd" value="<?php echo date("d-m-Y", strtotime($row['fsdate'])); ?>"></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="btp" id="btp" value="<?php echo $row['btp']; ?>"></td>
                           <?php /*?> <?php
                            $receivedate = date('Y-m-d', strtotime('+' . $row['dmlc'] . 'day', strtotime($row['fsdate'])));
                            $receivedate = date('Y-m-d', strtotime('+7 day', strtotime($receivedate)));

                            $paymentdate = date('Y-m-d', strtotime('+' . $row['btp'] . 'day', strtotime($row['finhdate'])));

                            $receivedate = date_create($receivedate);
                            $paymentdate = date_create($paymentdate);
                            $interval = date_diff($paymentdate, $receivedate);
                            $olc = $interval->format('%R%a');
                            ?><?php */?>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $olc; ?></td><?php */?>
                            <td style="vertical-align:middle;"><select class="form-control" name="garmentstypeid" id="garmentstypeid">
                            <option value="<?php echo $row['garmentstypeid']; ?>"><?php echo $row['garmentstype']; ?></option>
                            <?php
                            foreach ($gl as $rowg) {
                            ?>
                              <option value="<?php echo $rowg['garmentstypeid']; ?>"><?php echo $rowg['garmentstype']; ?></option>
                            <?php
                            }
                            ?>
                          </select></td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>

                    
                    

                    
                    

                    <h5 class="text-center"><strong>Budget for Fabrics</strong></h5>
                    <br />
                    <?php
                    foreach ($ul as $row) {
                      if($row['confirm_status']!='0')
                      {}
                      else{
                    ?>
                      <div class="text-right">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>Dashboard/add_fabric_budget_create_form/<?php echo $bn = $row['pcid']; ?>">ADD</a>
                        <a class="btn btn-info" href="<?php echo base_url(); ?>Dashboard/fabric_budget_update_form/<?php echo $bn = $row['pcid']; ?>">EDIT</a>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/fabric_budget_delete_form/<?php echo $bn = $row['pcid']; ?>">DELETE</a>
                        <a class="btn btn-warning" href="<?php echo base_url(); ?>Dashboard/fabric_budget_copy_form/<?php echo $bn = $row['pcid']; ?>">COPY</a>
                      </div>
                    <?php
                      }
                    }
                    ?>
                    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;">
        <tr>
          <th>SL</th>
          <th style="display:none;">ID</th>
          <th style="display:none;">Pcid</th>
          <th>Fabric Description</th>
          <th>Fabric Composition</th>
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
        foreach ($fbl as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="display:none;"><input type="text" readonly class="form-control" name="pcid" value="<?php echo $ppcid; ?>"></td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="fabricitemid[]" id="fabricitemid">
                <option value="<?php echo $row['fabricitemid']; ?>"><?php echo $row['fabricitem']; ?></option>
                <?php
                foreach ($fbil as $row1) {
                ?>
                  <option value="<?php echo $row1['fabricitemid']; ?>"><?php echo $row1['fabricitem']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('fabricitemid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="fabrictypeid[]" id="fabrictypeid">
                <option value="<?php echo $row['fabrictypeid']; ?>"><?php echo $row['fabrictype']; ?></option>
                <?php
                foreach ($fbtl as $row2) {
                ?>
                  <option value="<?php echo $row2['fabrictypeid']; ?>"><?php echo $row2['fabrictype']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('fabrictypeid', '<div class="error">', '</div>');  ?>

            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="supplierid[]" id="supplierid">
                <option value="<?php echo $row['supplierid']; ?>"><?php echo $row['supplier']; ?></option>
                <?php
                foreach ($sl as $row3) {
                ?>
                  <option value="<?php echo $row3['supplierid']; ?>"><?php echo $row3['supplier']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('supplierid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="nomiid[]" id="nominame">
                <option value="<?php echo $row['nomiid']; ?>"><?php echo $row['nominame']; ?></option>
                <?php
                foreach ($nl as $rown) {
                ?>
                  <option value="<?php echo $rown['nomiid']; ?>"><?php echo $rown['nominame']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('nomiid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="orderqty[]" id="orderqty" value="<?php echo $row['fborderqty']; ?>"></td>
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
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="btb[]" id="btb" value="<?php echo $row['fbtb']; ?>"></td>
            <td style="vertical-align:middle;"> <input type="button" class="deleteDep btn btn-danger" value="Delete" /></td>
          </tr>
        <?php

        } ?>

      </tbody>
    </table>
                    <br />

                    

                    
                    <h5 class="text-center"><strong>Budget for Trims</strong></h5>
                    <br />
                    <?php
                    foreach ($ul as $row) {
                      if($row['confirm_status']!='0')
                      {}
                      else{
                    ?>
                      <div class="text-right">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>Dashboard/add_trims_budget_create_form/<?php echo $bn = $row['pcid']; ?>">ADD</a>
                        <a class="btn btn-info" href="<?php echo base_url(); ?>Dashboard/trims_budget_update_form/<?php echo $bn = $row['pcid']; ?>">EDIT</a>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/trims_budget_delete_form/<?php echo $bn = $row['pcid']; ?>">DELETE</a>
                        <a class="btn btn-warning" href="<?php echo base_url(); ?>Dashboard/trims_budget_copy_form/<?php echo $bn = $row['pcid']; ?>">COPY</a>
                      </div>
                    <?php
                      }
                    }
                    ?>
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
                foreach ($tbil as $row1) {
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
                foreach ($tbt1 as $row2) {
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
                foreach ($sl as $row3) {
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
                  <option value="<?php echo $rown['nomiid']; ?>"><?php echo $rown['nominame']; ?></option>
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

                    
                    
                    <h5 class="text-center"><strong>Budget for Embellishment</strong></h5>
                    <br />
                    <?php
                    foreach ($ul as $row) {
                      if($row['confirm_status']!='0')
                      {}
                      else{
                    ?>
                      <div class="text-right">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>Dashboard/add_embellishment_budget_create_form/<?php echo $bn = $row['pcid']; ?>">ADD</a>
                        <a class="btn btn-info" href="<?php echo base_url(); ?>Dashboard/embellishment_budget_update_form/<?php echo $bn = $row['pcid']; ?>">EDIT</a>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/embellishment_budget_delete_form/<?php echo $bn = $row['pcid']; ?>">DELETE</a>
                        <a class="btn btn-warning" href="<?php echo base_url(); ?>Dashboard/embellishment_budget_copy_form/<?php echo $bn = $row['pcid']; ?>">COPY</a>
                      </div>
                    <?php
                      }
                    }
                    ?>
                    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;">
        <tr>
          <th>SL</th>
          <th style="display:none;">ID</th>
          <th style="display:none;">Pcid</th>
          <th>Item</th>
          <th>Type</th>
          <th>Supplier</th>
          <th>Nomination</th>
          <th>Order Qty</th>
          <th>CAD</th>
          <th>Allowance</th>
          <th>UOM</th>
          <th>Rate</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($ebl as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="display:none;"><input type="text" readonly class="form-control" name="pcid" value="<?php echo $ppcid; ?>"></td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="embellishmentitemid[]" id="embellishmentitemid">
                <option value="<?php echo $row['embellishmentitemid']; ?>"><?php echo $row['embellishmentitem']; ?></option>
                <?php
                foreach ($ebil as $row1) {
                ?>
                  <option value="<?php echo $row1['embellishmentitemid']; ?>"><?php echo $row1['embellishmentitem']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('embellishmentitemid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="embellishmenttypeid[]" id="embellishmenttypeid">
                <option value="<?php echo $row['embellishmenttypeid']; ?>"><?php echo $row['embellishmenttype']; ?></option>
                <?php
                foreach ($ebt1 as $row2) {
                ?>
                  <option value="<?php echo $row2['embellishmenttypeid']; ?>"><?php echo $row2['embellishmenttype']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('embellishmenttypeid', '<div class="error">', '</div>');  ?>

            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="supplierid[]" id="supplierid">
                <option value="<?php echo $row['supplierid']; ?>"><?php echo $row['supplier']; ?></option>
                <?php
                foreach ($sl as $row3) {
                ?>
                  <option value="<?php echo $row3['supplierid']; ?>"><?php echo $row3['supplier']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('supplierid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="nomiid[]" id="nominame">
                <option value="<?php echo $row['nomiid']; ?>"><?php echo $row['nominame']; ?></option>
                <?php
                foreach ($nl as $rown) {
                ?>
                  <option value="<?php echo $rown['nomiid']; ?>"><?php echo $rown['nominame']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('nomiid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="orderqty[]" id="orderqty" value="<?php echo $row['eborderqty']; ?>"></td>
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
            <td style="vertical-align:middle;"> <input type="button" class="deleteDep btn btn-danger" value="Delete" /></td>
          </tr>
        <?php

        } ?>

      </tbody>
    </table>
                    
                    
                    <h5 class="text-center"><strong>Budget for Direct Expense</strong></h5>
                    <br />
                    <?php
                    foreach ($ul as $row) {
                      if($row['confirm_status']!='0')
                      {}
                      else{
                    ?>
                      <div class="text-right">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>Dashboard/add_directexpense_budget_create_form/<?php echo $bn = $row['pcid']; ?>">ADD</a>
                        <a class="btn btn-info" href="<?php echo base_url(); ?>Dashboard/directexpense_budget_update_form/<?php echo $bn = $row['pcid']; ?>">EDIT</a>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/directexpense_budget_delete_form/<?php echo $bn = $row['pcid']; ?>">DELETE</a>
                        <a class="btn btn-warning" href="<?php echo base_url(); ?>Dashboard/directexpense_budget_copy_form/<?php echo $bn = $row['pcid']; ?>">COPY</a>
                      </div>
                    <?php
                      }
                    }
                    ?>
                    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;">
        <tr>
          <th>SL</th>
          <th style="display:none;">ID</th>
          <th style="display:none;">Pcid</th>
          <th>Item</th>
          <th>Type</th>
          <th>Supplier</th>
          <th>Nomination</th>
          <th>Order Qty</th>
          <th>CAD</th>
          <th>Allowance</th>
          <th>UOM</th>
          <th>Rate</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($debl as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="display:none;"><input type="text" readonly class="form-control" name="pcid" value="<?php echo $ppcid; ?>"></td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="directexpenseitemid[]" id="directexpenseitemid">
                <option value="<?php echo $row['directexpenseitemid']; ?>"><?php echo $row['directexpenseitem']; ?></option>
                <?php
                foreach ($debil as $row1) {
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
                foreach ($debt1 as $row2) {
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
                foreach ($sl as $row3) {
                ?>
                  <option value="<?php echo $row3['supplierid']; ?>"><?php echo $row3['supplier']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('supplierid', '<div class="error">', '</div>');  ?>
            </td>
            <td style="vertical-align:middle;">
              <select class="form-control" name="nomiid[]" id="nominame">
                <option value="<?php echo $row['nomiid']; ?>"><?php echo $row['nominame']; ?></option>
                <?php
                foreach ($nl as $rown) {
                ?>
                  <option value="<?php echo $rown['nomiid']; ?>"><?php echo $rown['nominame']; ?></option>
                <?php
                }
                ?>
              </select>
              <?php echo form_error('nomiid', '<div class="error">', '</div>');  ?>
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
            <td style="vertical-align:middle;"> <input type="button" class="deleteDep btn btn-danger" value="Delete" /></td>
          </tr>
        <?php

        } ?>

      </tbody>
    </table>
                    <br />
                    <h5 class="text-center"><strong>IE Analysis</strong></h5>
                    <br />
                    <?php
                    foreach ($ul as $row) {
                      if($row['confirm_status']!='0')
                      {}
                      else{
                    ?>
                      <div class="text-right">
                        <a class="btn btn-info" href="<?php echo base_url(); ?>Dashboard/ie_analysis_update_form/<?php echo $bn = $row['pcid']; ?>">EDIT</a>
                      </div>
                    <?php
                      }
                    }
                    ?>
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Production Type</th>
                          <th>Man</th>
                          <th>Machine</th>
                          <th>Pdn/Hour</th>
                          <th>SAM/SMV</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($iel as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                            <td style="vertical-align:middle;"><input type="text" readonly class="form-control" name="productiontypeid[]" id="productiontypeid" value="<?php echo $row['productiontype']; ?>"></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="man[]" id="man" value="<?php echo $row['man']; ?>"></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="machine[]" id="pmachine" value="<?php echo $row['machine']; ?>"></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="ph[]" id="ph" value="<?php echo $row['ph']; ?>"></td>
                            <td style="vertical-align:middle;"><input type="text" class="form-control" name="sm[]" id="sm" value="<?php echo $row['sm']; ?>"></td>
                            
                            

                          </tr>
                        <?php
                        } ?>
                      </tbody>
                    </table>
                    
                    
                    <br />
                    <div class="box-footer text-center">
                   <input type="submit" class="btn btn-primary submitbtn" id="btn" name="submit" value="CLICK" />
                   </div>
                   </form>
                   
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
  $('body').on('click', 'input.deleteDep', function() {
    $(this).parents('tr').remove();
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
      $('.submitbtn').prop("disabled", true);
      var a = 0;
      //binds to onchange event of your input field
      $('#picture').bind('change', function() {
        if ($('.submitbtn').attr('disabled', false)) {
          $('.submitbtn').attr('disabled', true);
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
            $('.submitbtn').attr('disabled', false);
          }
        }
      });
    });
  </script>