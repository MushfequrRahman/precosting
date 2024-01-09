<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<style type="text/css">
  .table {
    width: 700px;
    padding: 0 0 2px 0;
  }

  .table,
  th,
  td {
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black;
    margin: auto;
  }

  th,
  td {
    font-size: 7px;
    text-align: center;
  }

  td {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }

  .comments {
    width: 700px;
    margin: auto;
  }

  .comments p {
    text-align: center;
    font-size: 10px;
  }

  .commentsbox {
    width: 700px;
    height: 30px;
    border: 1px solid #000000;
  }

  .sign {
    width: 700px;
    margin: auto;
    padding: 30px 0 0 0;
  }

  .sign1 {
    width: 220px;
    float: left;
    padding: 0 0 0 10px;
  }

  .sign1 p {
    border-top: 1px solid #000000;
    text-align: center;
    font-size: 10px;
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">

  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Tec Pack</th>
        <th>Production Unit</th>
        <th>Buyer</th>
        <th>Style</th>
        <th>Master LC Unit</th>
        <th>MLC/S. Cont. no.</th>
        <th>Order Qty</th>
        <th>FOB/Pc</th>
        <th>FOB Value</th>
        <th>Negotiate CM/Dz</th>
        <!-- <th>Achieved CM</th> -->
        <th>Deferred days of MLC</th>
        <th>Fabrics In-house Date</th>
        <th>Production Date</th>
        <th>1st Ship Date</th>
        <th>BTB Turnover Period</th>
        <th>Order life Cycle</th>
        <th>Garments Type</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($ul as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><img width="70px;" height="70px;" src="<?php echo base_url() . 'assets/uploads/sample/' . $row['sample_file']; ?>" alt="Sample"></td>
          <td style="vertical-align:middle;"><?php echo $row['accseason']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['lc']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['mlc']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['oqty']; ?></td>
          <!-- <td style="vertical-align:middle;"><?php echo $row['fpc']; ?></td> -->
          <td style="vertical-align:middle;"><?php echo $row['fv'] / $row['oqty']; ?></td>
          <!-- <td style="vertical-align:middle;"><?php echo $row['oqty'] * $row['fpc']; ?></td> -->
          <td style="vertical-align:middle;"><?php echo $row['fv']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cmdz']; ?></td>
          <!-- <td style="vertical-align:middle;">Formula</td> -->
          <td style="vertical-align:middle;"><?php echo $row['dmlc']; ?></td>
          <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['finhdate'])); ?></td>
          <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['prdate'])); ?></td>
          <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fsdate'])); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['btp']; ?></td>
          <?php
          $receivedate = date('Y-m-d', strtotime('+' . $row['dmlc'] . 'day', strtotime($row['fsdate'])));
          $receivedate = date('Y-m-d', strtotime('+7 day', strtotime($receivedate)));

          $paymentdate = date('Y-m-d', strtotime('+' . $row['btp'] . 'day', strtotime($row['finhdate'])));

          $receivedate = date_create($receivedate);
          $paymentdate = date_create($paymentdate);
          $interval = date_diff($paymentdate, $receivedate);
          $olc = $interval->format('%R%a');
          ?>
          <td style="vertical-align:middle;"><?php echo $olc; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['garmentstype']; ?></td>
        </tr>

      <?php } ?>
    </tbody>
  </table>

  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Fabrics Local</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $fatl = 0;
      foreach ($fl as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fabricitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fabrictype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <!-- <td style="vertical-align:middle;"><?php echo $itemqty = ($row['fborderqty'] * $row['cad']) + ($row['fborderqty'] * ($row['allowance'] / 100)); ?></td> -->
          <td style="vertical-align:middle;"><?php echo $itemqty = $row['fborderqty'] * $row['cad'] * ($row['allowance']+100)/100; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <td style="vertical-align:middle;"><?php echo $fa = round($itemqty * $row['rate']); ?></td>
        </tr>
      <?php
        $fatl += $fa;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $fatl; ?></strong></td>
      </tr>
    </tbody>
  </table>

  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Fabrics Foreign</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $fatf = 0;
      foreach ($ff as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fabricitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fabrictype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <!-- <td style="vertical-align:middle;"><?php echo $itemqty = ($row['fborderqty'] * $row['cad']) + ($row['fborderqty'] * ($row['allowance'] / 100)); ?></td> -->
          <td style="vertical-align:middle;"><?php echo $itemqty = $row['fborderqty'] * $row['cad'] * ($row['allowance']+100)/100; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <td style="vertical-align:middle;"><?php echo $fa = round($itemqty * $row['rate']); ?></td>
        </tr>
      <?php
        $fatf += $fa;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $fatf; ?></strong></td>
      </tr>
    </tbody>
  </table>



  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th colspan="12">Budget for Fabrics</th>
      </tr>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $fat = 0;
      foreach ($ul1 as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fabricitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fabrictype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['fborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <!-- <td style="vertical-align:middle;"><?php echo $itemqty = ($row['fborderqty'] * $row['cad']) + ($row['fborderqty'] * ($row['allowance'] / 100)); ?></td> -->
          <td style="vertical-align:middle;"><?php echo $itemqty = $row['fborderqty'] * $row['cad'] * ($row['allowance']+100)/100; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <td style="vertical-align:middle;"><?php echo $fa = round($itemqty * $row['rate']); ?></td>
        </tr>
      <?php
        $fat += $fa;
      } ?>
      <tr>
        <td colspan="9"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong>Local:<?php echo $fatl; ?></strong></td>
        <td style="vertical-align:middle;"><strong>Foreign:<?php echo $fatf; ?></strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $fat; ?></strong></td>
      </tr>
    </tbody>
  </table>


  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Trims Local</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $triat = 0;
      foreach ($tl as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['trimsitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['trimstype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['tborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['tborderqty'] * $row['cad']) + ($row['tborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <td style="vertical-align:middle;"><?php echo $tria = round($itemqty * $row['rate']); ?></td>
        </tr>
      <?php
        $triatl += $tria;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $triatl; ?></strong></td>
      </tr>
    </tbody>
  </table>

  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Trims Foreign</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $triat = 0;
      foreach ($tf as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['trimsitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['trimstype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['tborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['tborderqty'] * $row['cad']) + ($row['tborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <td style="vertical-align:middle;"><?php echo $tria = round($itemqty * $row['rate']); ?></td>
        </tr>
      <?php
        $triatf += $tria;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $triatf; ?></strong></td>
      </tr>
    </tbody>
  </table>
  <!-- <h5 class="text-center"><strong>Budget for Trims</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th colspan="12">Budget for Trims</th>
      </tr>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $triat = 0;
      foreach ($ul2 as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['trimsitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['trimstype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['tborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['tborderqty'] * $row['cad']) + ($row['tborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <td style="vertical-align:middle;"><?php echo $tria = round($itemqty * $row['rate']); ?></td>
        </tr>
      <?php
        $triat += $tria;
      } ?>
      <tr>
        <td colspan="9"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong>Local:<?php echo $triatl; ?></strong></td>
        <td style="vertical-align:middle;"><strong>Foreign:<?php echo $triatf; ?></strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $triat; ?></strong></td>
      </tr>
    </tbody>
  </table>

  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Embellishment Local</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $ematl = 0;
      foreach ($el as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['embellishmentitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['embellishmenttype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['eborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['eborderqty'] * $row['cad']) + ($row['eborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <?php
          if ($row['puomid'] == '6') {
          ?>
            <td style="vertical-align:middle;"><?php echo $ea = round($itemqty * $row['rate']) / 12; ?></td>
          <?php
          } else {
          ?>
            <td style="vertical-align:middle;"><?php echo $ea = round($itemqty * $row['rate']); ?></td>
          <?php
          }
          ?>

        </tr>
      <?php
        $ematl += $ea;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $ematl; ?></strong></td>
      </tr>
    </tbody>
  </table>
  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Embellishment Foreign</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $ematf = 0;
      foreach ($ef as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['embellishmentitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['embellishmenttype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['eborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['eborderqty'] * $row['cad']) + ($row['eborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <?php
          if ($row['puomid'] == '6') {
          ?>
            <td style="vertical-align:middle;"><?php echo $ea = round($itemqty * $row['rate']) / 12; ?></td>
          <?php
          } else {
          ?>
            <td style="vertical-align:middle;"><?php echo $ea = round($itemqty * $row['rate']); ?></td>
          <?php
          }
          ?>
        </tr>
      <?php
        $ematf += $ea;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $ematf; ?></strong></td>
      </tr>
    </tbody>
  </table>
  <!-- <h5 class="text-center"><strong>Budget for Embellishment</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th colspan="12">Budget for Embellishment</th>
      </tr>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $emat = 0;
      foreach ($ul3 as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['embellishmentitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['embellishmenttype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['eborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['eborderqty'] * $row['cad']) + ($row['eborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <?php
          if ($row['puomid'] == '6') {
          ?>
            <td style="vertical-align:middle;"><?php echo $ea = round($itemqty * $row['rate']) / 12; ?></td>
          <?php
          } else {
          ?>
            <td style="vertical-align:middle;"><?php echo $ea = round($itemqty * $row['rate']); ?></td>
          <?php
          }
          ?>
        </tr>
      <?php
        $emat += $ea;
      } ?>
      <tr>
        <td colspan="9"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong>Local:<?php echo $ematl; ?></strong></td>
        <td style="vertical-align:middle;"><strong>Foreign:<?php echo $ematf; ?></strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $emat; ?></strong></td>
      </tr>
    </tbody>
  </table>

  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Direct Expense Local</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $dematl = 0;
      foreach ($dl as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['directexpenseitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['directexpensetype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['deborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['deborderqty'] * $row['cad']) + ($row['deborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <?php
          if ($row['puomid'] == '6') {
          ?>
            <td style="vertical-align:middle;"><?php echo $dea = round($itemqty * $row['rate'] / 12); ?></td>
          <?php
          } else {
          ?>
            <td style="vertical-align:middle;"><?php echo $dea = round($itemqty * $row['rate']); ?></td>
          <?php
          }
          ?>

        </tr>
      <?php
        $dematl += $dea;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $dematl; ?></strong></td>
      </tr>
    </tbody>
  </table>
  <!-- <h5 class="text-center" style="display: none;"><strong>Budget for Direct Expense Foreign</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered" style="display: none;">
    <thead>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $dematf = 0;
      foreach ($df as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['directexpenseitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['directexpensetype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['deborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['deborderqty'] * $row['cad']) + ($row['deborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <?php
          if ($row['puomid'] == '6') {
          ?>
            <td style="vertical-align:middle;"><?php echo $dea = round($itemqty * $row['rate'] / 12); ?></td>
          <?php
          } else {
          ?>
            <td style="vertical-align:middle;"><?php echo $dea = round($itemqty * $row['rate']); ?></td>
          <?php
          }
          ?>
        </tr>
      <?php
        $dematf += $dea;
      } ?>
      <tr>
        <td colspan="11"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $dematf; ?></strong></td>
      </tr>
    </tbody>
  </table>
  <!-- <h5 class="text-center"><strong>Budget for Direct Expense</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th colspan="12">Budget for Direct Expense</th>
      </tr>
      <tr>
        <th>SL</th>
        <th>Item</th>
        <th>Type</th>
        <th>Supplier</th>
        <th>Supplier type</th>
        <th>Order Qty</th>
        <th>CAD</th>
        <th>Allowance</th>
        <th>Item Qty</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $demat = 0;
      foreach ($ul4 as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['directexpenseitem']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['directexpensetype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['suppliertype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['deborderqty']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['cad']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['allowance']; ?></td>
          <td style="vertical-align:middle;"><?php echo $itemqty = ($row['deborderqty'] * $row['cad']) + ($row['deborderqty'] * ($row['allowance'] / 100)); ?></td>
          <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['rate']; ?></td>
          <?php
          if ($row['puomid'] == '6') {
          ?>
            <td style="vertical-align:middle;"><?php echo $dea = round($itemqty * $row['rate'] / 12); ?></td>
          <?php
          } else {
          ?>
            <td style="vertical-align:middle;"><?php echo $dea = round($itemqty * $row['rate']); ?></td>
          <?php
          }
          ?>
        </tr>
      <?php
        $demat += $dea;
      } ?>
      <tr>
        <td colspan="9"><strong>Total:</strong></td>
        <td style="vertical-align:middle;"><strong>Local:<?php echo $dematl; ?></strong></td>
        <td style="vertical-align:middle;"><strong>Foreign:<?php echo $dematf; ?></strong></td>
        <td style="vertical-align:middle;"><strong><?php echo $demat; ?></strong></td>
      </tr>
    </tbody>
  </table>

  <!-- <h5 class="text-center"><strong>IE Analysis</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th colspan="8">IE Analysis</th>
      </tr>
      <tr>
        <th>SL</th>
        <th>Production Type</th>
        <th>Man</th>
        <th>Machine</th>
        <th>Pdn/Hour</th>
        <th>SAM/SMV</th>
        <th>Man Machine</th>
        <th>Efficiency</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($ul5 as $row) { ?>
        <tr>
          <td style="vertical-align:middle;"><?php echo $i++; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['productiontype']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['man']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['machine']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['ph']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['sm']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['oqty'] * $row['sm']; ?></td>
          <?php
          if ($row['productiontypeid'] == '20230513072735') {
            if ((($row['ph'] * $row['sm']) / ($row['man'] * 60)) * 100 == 'NAN') {
              $cuttingeffi = '0';
            } else {
              $cuttingeffi = (($row['ph'] * $row['sm']) / ($row['man'] * 60)) * 100;
            }
          ?>
            <td style="vertical-align:middle;"><?php echo $cuttingeffi; ?></td>
          <?php
          }

          if ($row['productiontypeid'] == '20230513072749') {
            $sewingsm = $row['sm'];
          ?>
            <td style="vertical-align:middle;"><?php echo $sewingeffi = (($row['oqty'] * $row['sm']) / ($row['oqty'] / $row['ph'] * $row['man'] * 60)) * 100; ?></td>
          <?php
          }

          if ($row['productiontypeid'] == '20230513072810') {
          ?>
            <td style="vertical-align:middle;"><?php echo $finishingeffi = (($row['ph'] * $row['sm']) / ($row['machine'] * 60)) * 100; ?></td>
          <?php
          }
          ?>

        </tr>
      <?php
      } ?>
    </tbody>
  </table>

  <!-- <h5 class="text-center"><strong>Profitability Summary</strong></h5> -->

  <table id="tableData" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th colspan="11">Profitability Summary</th>
      </tr>
      <tr>
        <th>Sales</th>
        <th>D. Material</th>
        <th>Ach. CM</th>
        <th>Ach. CM(Per Pcs)</th>
        <th>Factory OH</th>
        <th>Admin OH</th>
        <th>Export OH</th>
        <th>Import OH</th>
        <th>Financial OH</th>
        <th>Museum</th>
        <th>Net Profit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($ul as $row) { ?>
        <!-- <?php $sales=$row['oqty'] * $row['fpc']; ?> -->
        <?php $sales=$row['fv']; ?>
        <tr>

          <td style="vertical-align:middle;"><?php echo number_format((float)$sales, 2, '.', '') . '(' . (($sales / $sales) * 100) . '%)'; ?></td>

          <?php $dm = $fat + $triat + $emat + $demat; ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$dm, 2, '.', '') . '(' . number_format((float)(($dm / $sales) * 100), 2, '.', '') . '%)'; ?></td>

          <?php $acm = $sales - $dm; ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$acm, 2, '.', '') . '(' . number_format((float)(($acm / $sales) * 100), 2, '.', '') . '%)'; ?></td>

          <?php $acmp = (($sales - $dm) / ($row['oqty']) * 12); ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$acmp, 2, '.', ''); ?></td>

          <?php $foh = (($sewingsm * $row['oqty'] * $row['cpm']) / $sewingeffi) * 100; ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$foh, 2, '.', '') . '(' . number_format((float)(($foh / $sales) * 100), 2, '.', '') . '%)'; ?></td>

          <?php $aoh = (($sewingsm * $row['oqty']) / $sewingeffi) * $row['aoh'] * 100; ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$aoh, 2, '.', '') . '(' . number_format((float)(($aoh / $sales) * 100), 2, '.', '') . '%)'; ?></td>

          <?php $exoh = ($sales * $row['exoh']) / 100; ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$exoh, 2, '.', '') . '(' . number_format((float)(($exoh / $sales) * 100), 2, '.', '') . '%)'; ?></td>

          <?php $imoh = ((($fatf + $triatf + $ematf + $dematf) * $row['imoh']) / 100) + ((($fatl + $triatl + $ematl + $dematl) * $row['imohl']) / 100); ?>

          <td style="vertical-align:middle;"><?php echo number_format((float)$imoh, 2, '.', '') . '(' . number_format((float)(($imoh / $sales) * 100), 2, '.', '') . '%)'; ?></td>
          <?php
          if ($olc > 0) {
            $fioh = (((($dm * ($row['intrate'] / 100))) / 360) * $olc) + ($sales * ($row['commision'] / 100));
          ?>
            <td style="vertical-align:middle;"><?php echo number_format((float)$fioh, 2, '.', '') . '(' . number_format((float)(($fioh / $sales) * 100), 2, '.', '') . '%)'; ?></td>
          <?php

          } else {
            $fioh = ($sales * ($row['commision'] / 100));
          ?>
            <td style="vertical-align:middle;"><?php echo number_format((float)$fioh, 2, '.', '') . '(' . number_format((float)(($fioh / $sales) * 100), 2, '.', '') . '%)'; ?></td>
          <?php
          }
          ?>
          <?php $museum = $row['oqty'] * 0.01; ?>
          <td style="vertical-align:middle;"><?php echo number_format((float)$museum, 2, '.', '') . '(' . number_format((float)(($museum / $sales) * 100), 2, '.', '') . '%)'; ?> </td>
          <?php
          $np = $acm - $foh - $aoh - $exoh - $imoh - $fioh - $museum;
          ?>
          <td style="vertical-align:middle;"><?php echo number_format((float)$np, 2, '.', '') . '(' . number_format((float)(($np / $sales) * 100), 2, '.', '') . '%)'; ?> </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
  <div class="comments">
    <p>Comments For Loss Order</p>
    <div class="commentsbox">&nbsp;</div>
  </div>
  <div class="sign">
    <div class="sign1">
      <p>Prepared By</p>
    </div>
    <div class="sign1">
      <p>Approved By</p>
    </div>
    <div class="sign1">
      <p>Accounted By</p>
    </div>
  </div>

</body>

</html>