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
                  <div class="text-right-input">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-9">
                        <input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="box-body table-responsive no-padding">
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Sample</th>
                          <th>Job No</th>
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
                          <th>Confirm Status</th>
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
                            <td style="vertical-align:middle;"><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url() . 'assets/uploads/sample/' . $row['sample_file']; ?>" alt="Sample"></td>
                            <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['oqty']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['fpc']; ?></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['fv']/$row['oqty']; ?></td><?php */ ?>
                            <td style="vertical-align:middle;"><?php echo $row['oqty'] * $row['fpc']; ?></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['fv']; ?></td><?php */ ?>
                            <?php
                            if ($row['bf'] == '1') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/fabric_budget_create_form/<?php echo $bn = $row['pcid']; ?>">Ready For Create</a></td>
                            <?php
                            } else {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i>
                              </td>
                            <?php
                            }
                            ?>

                            <?php
                            if ($row['bt'] == '1') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/trims_budget_create_form/<?php echo $bn = $row['pcid']; ?>">Ready For Create</a></td>
                            <?php
                            } else {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['be'] == '1') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/embellishment_budget_create_form/<?php echo $bn = $row['pcid']; ?>">Ready For Create</a></td>
                            <?php
                            } else {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['bde'] == '1') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/directexpense_budget_create_form/<?php echo $bn = $row['pcid']; ?>">Ready For Create</a></td>
                            <?php
                            } else {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['ie'] == '1') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/ie_analysis_create_form/<?php echo $bn = $row['pcid']; ?>">Ready For Create</a></td>
                            <?php
                            } else {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>

                            <!-- ADMIN -->


                            <?php
                            if ($row['confirm_status'] == '0') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/precost_confirm_update/<?php echo $bn = $row['pcid']; ?>">Submit For KAM Approval</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '1' && $this->session->userdata('user_type') == '1') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For KAM Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '2' && $this->session->userdata('user_type') == '1') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Authorizer Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '3' && $this->session->userdata('user_type') == '1') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Approvar Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '4' && $this->session->userdata('user_type') == '1') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Accounts Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '5' && $this->session->userdata('user_type') == '1') {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }



                            // USER//


                            elseif ($row['confirm_status'] == '0') {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/precost_confirm_update/<?php echo $bn = $row['pcid']; ?>">Submit For KAM Approval</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '1' && $this->session->userdata('user_type') == '2') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For KAM Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '2' && $this->session->userdata('user_type') == '2') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Authorizer Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '3' && $this->session->userdata('user_type') == '2') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Approvar Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '4' && $this->session->userdata('user_type') == '2') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Accounts Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '5' && $this->session->userdata('user_type') == '2') {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }



                            /////////////////////// KAM////////////////////



                            elseif ($row['confirm_status'] == '1' && $this->session->userdata('user_type') == '4') {
                            ?>
                              <td style="vertical-align:middle;"><a class="btn btn-success" href="<?php echo base_url(); ?>Dashboard/precost_confirm_update/<?php echo $bn = $row['pcid']; ?>">Approve</a><br /><br /><a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/precost_reject_update/<?php echo $bn = $row['pcid']; ?>">Reject</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '2' && $this->session->userdata('user_type') == '4') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Authorizer Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '3' && $this->session->userdata('user_type') == '4') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Approvar Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '4' && $this->session->userdata('user_type') == '4') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Accounts Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '5' && $this->session->userdata('user_type') == '4') {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }






                            //////////// AUTHORIZER/////////////


                            elseif ($row['confirm_status'] == '1' && $this->session->userdata('user_type') == '5') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For KAM Approval</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '2' && $this->session->userdata('user_type') == '5') {
                            ?>
                              <td style="vertical-align:middle;"><a class="btn btn-success" href="<?php echo base_url(); ?>Dashboard/precost_confirm_update/<?php echo $bn = $row['pcid']; ?>">Approve</a><br /><br /><a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/precost_reject_update/<?php echo $bn = $row['pcid']; ?>">Reject</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '3' && $this->session->userdata('user_type') == '5') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Approvar Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '4' && $this->session->userdata('user_type') == '5') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Accounts Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '5' && $this->session->userdata('user_type') == '5') {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }







                            //////////// APPROVER/////////////


                            elseif ($row['confirm_status'] == '1' && $this->session->userdata('user_type') == '6') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For KAM Approval</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '2' && $this->session->userdata('user_type') == '6') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Authorizer Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '3' && $this->session->userdata('user_type') == '6') {
                            ?>
                              <td style="vertical-align:middle;"><a class="btn btn-success" href="<?php echo base_url(); ?>Dashboard/precost_confirm_update/<?php echo $bn = $row['pcid']; ?>">Approve</a><br /><br /><a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/precost_reject_update/<?php echo $bn = $row['pcid']; ?>">Reject</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '4' && $this->session->userdata('user_type') == '6') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Accounts Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '5' && $this->session->userdata('user_type') == '6') {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }



                            /////////////ACCOUNTS/////////////


                            elseif ($row['confirm_status'] == '1' && $this->session->userdata('user_type') == '3') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For KAM Approval</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '2' && $this->session->userdata('user_type') == '3') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Authorizer Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '3' && $this->session->userdata('user_type') == '3') {
                            ?>
                              <td style="vertical-align:middle;">Waiting For Approver Approval</td>
                            <?php
                            } elseif ($row['confirm_status'] == '4' && $this->session->userdata('user_type') == '3') {
                            ?>
                              <td style="vertical-align:middle;"><a class="btn btn-success" href="<?php echo base_url(); ?>Dashboard/precost_confirm_update/<?php echo $bn = $row['pcid']; ?>">Approve</a><br /><br /><a class="btn btn-danger" href="<?php echo base_url(); ?>Dashboard/precost_reject_update/<?php echo $bn = $row['pcid']; ?>">Reject</a></td>
                            <?php
                            } elseif ($row['confirm_status'] == '5' && $this->session->userdata('user_type') == '3') {
                            ?>
                              <td style="vertical-align:middle;"><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php
                            }
                            ?>

















                            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/precost_budget_details/<?php echo $bn = $row['pcid']; ?>">Details</a></td>

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

<script type='text/javascript'>
  $(document).ready(function() {


    // Search all columns

    $('#txt_searchall').keyup(function() {

      var search = $(this).val();


      $('table tbody tr').hide();


      var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;


      if (len > 0) {

        $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {

          $(this).closest('tr').show();

        });

      } else {

        $('.notfound').show();

      }



    });

  });

  // Case-insensitive searching (Note - remove the below script for Case sensitive search )

  $.expr[":"].contains = $.expr.createPseudo(function(arg) {

    return function(elem) {

      return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;

    };

  });
</script>

</html>