<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                    <h3 class="box-title">PreCost List</h3>
                  </div>
                  <div class="box-body table-responsive no-padding">
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Sample</th>
                          <th>Buyer</th>
                          <th>Style</th>
                          <th>Order Qty</th>
                          <th>FOB/Pc</th>
                          <th>FOB Value</th>
                          <th>Budget for Fabrics</th>
                          <th>Budget for Trims</th>
                          <th>Budget for Embellishment</th>
                          <th>Budget for Direct Expenses</th>
                          <th>IE Ananlysis</th>
                          <th>Details</th>
                          <!--<th>Edit</th>-->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($ul as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                            <td style="vertical-align:middle;"><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url().'assets/uploads/sample/'.$row['sample_file'];?>" alt="Sample"></td>
                            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['oqty']; ?></td>
                            <!-- <td style="vertical-align:middle;"><?php echo $row['fpc']; ?></td> -->
                            <td style="vertical-align:middle;"><?php echo $row['fv']/$row['oqty']; ?></td>
                            <!-- <td style="vertical-align:middle;"><?php echo $row['oqty']*$row['fpc']; ?></td> -->
                            <td style="vertical-align:middle;"><?php echo $row['fv']; ?></td>
                            <?php
                            if($row['bf']=='1')
                            {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/fabric_budget_create_form/<?php echo $bn=$row['pcid'];?>">Ready For Create</a></td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i>
</td>
                            <?php
                            }
                            ?>
                            
                            <?php
                            if($row['bt']=='1')
                            {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/trims_budget_create_form/<?php echo $bn=$row['pcid'];?>">Ready For Create</a></td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if($row['be']=='1')
                            {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/embellishment_budget_create_form/<?php echo $bn=$row['pcid'];?>">Ready For Create</a></td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if($row['bde']=='1')
                            {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/directexpense_budget_create_form/<?php echo $bn=$row['pcid'];?>">Ready For Create</a></td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if($row['ie']=='1')
                            {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/ie_analysis_create_form/<?php echo $bn=$row['pcid'];?>">Ready For Create</a></td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/precost_budget_details/<?php echo $bn=$row['pcid'];?>">Details</a></td>
                            <?php /*?><td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/department_list_up/<?php echo $bn=$row['deptid'];?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td><?php */ ?>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $('#tableData').paging({
                      limit: 10
                    });
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>