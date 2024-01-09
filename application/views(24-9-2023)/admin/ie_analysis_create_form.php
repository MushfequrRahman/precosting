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
$productiontypeid = '';

foreach ($ul as $row) {
  $productiontypeid .= '<option value="' . $row["productiontypeid"] . '">' . $row["productiontype"] . '</option>';
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
                    <h3 class="box-title">IE Analysis Insert</h3>
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
                          <input type="text" class="form-control pd" name="iecdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <input type="hidden" class="form-control pcid" name="pcid" value="<?php echo $pcid; ?>">
                      </div>
                      <br />
                      <br />

                      <div id="AuGroup">
                        <div class="row">
                          <table class="table table-bordered" id="item_table1">
                            <thead>
                              <tr>
                                <th style="text-align:center;">Production Type</th>
                                <th style="text-align:center;">Man</th>
                                <th style="text-align:center;">Machine</th>
                                <th style="text-align:center;">Pdn/Hour</th>
                                <th style="text-align:center;">SAM/SMV</th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
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
        html += '<td><select name="productiontypeid[]" class="form-control productiontypeid" id="productiontypeid' + count + '"><option value="">Production Type</option><?php echo $productiontypeid; ?></select></td>';
        html += '<td><input type="text" name="man[]" class="form-control man" id="man' + count + '" /></td>';
        html += '<td><input type="text" name="machine[]" class="form-control machine" id="machine' + count + '" /></td>';
        html += '<td><input type="text" name="ph[]" class="form-control ph" id="ph' + count + '" /></td>';
        html += '<td><input type="text" name="sm[]" class="form-control sm" id="sm' + count + '" /></td>';
        html += '<td style="vertical-align:middle; text-align:center;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
        $('#item_table1').append(html);
      });

      $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      });

      $('#insert_form').on('submit', function(event) {
        event.preventDefault();
        var error = '';

        $('.productiontypeid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Production Type at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.man').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Man at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.machine').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Machine at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.ph').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Production/Hour at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.sm').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter SAM/SMV at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });


        var form_data = $(this).serialize();
        //alert(form_data);

        if (error == '') {
          $.ajax({
            url: "<?php echo base_url(); ?>Dashboard/ie_analysis_insert",
            method: "get",
            data: form_data,
            success: function(data) {
              //alert(url);
              if (data == 'ok') {
                document.forms['insert_form'].reset();
                $('#item_table1').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">IE Analysis Details Saved</div>');
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