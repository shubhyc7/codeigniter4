<?php // $this->load->view('includes/header');?>
<?= $this->include('includes/header') ?>
<section class="page">

  <div class=container>

    <a href="<?php echo base_url();?>">
      <h1>User Management</h1>
    </a>

    <div class="resultlogin">

    </div>

    <h1 class="text-right"> <a href="javascript:void(0)" class="btn btn-success" onclick="add_result();">Add New User
        +</a></h1>

    <div class="row users-row">
      <div class="col-md-12">
        <div class="panel panel-card ">
          <!-- Start .panel -->
          <div class="panel-body">

            <table id="result-datatables" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="font-weight:700;">ID</th>
                  <th style="font-weight:700;">Name</th>
                  <th style="font-weight:700;">Email</th>
                  <th style="font-weight:700;">Action</th>
                </tr>
              </thead>

              <tbody id="show_data">

              </tbody>

            </table>
          </div>
        </div><!-- End .panel -->
      </div>
    </div>
  </div>

</section>

<?php //$this->load->view('includes/footer');?>
<?= $this->include('includes/footer') ?>


<!-- action modal -->
<div class="modal fade" id="formActionModal" style="top:25px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modal_action_title"></h4>
      </div>
      <form method="post" role="form" name="frmActionSubmit" id="frmActionSubmit" action=""
        enctype="multipart/form-data">
        <div class="modal-body">
          <!-- form group-Admin-->
          <section class="panel panel-default">
            <div class="panel-body">
              <h4 class="mb-xlg">User Information</h4>
              <h5 class="mb-xlg text-right"><span style="color:#FF0000;">*</span> fields should be mandatory</h5>

              <fieldset>

                <input type="hidden" name="id" id="id">

                <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Name<span style="color:#FF0000;">*</span>:</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="name" name="name">
                    <label id="name-error" class="error error-hide" for="name"></label>
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="email">Email <span style="color:#FF0000;">*</span>:</label>
                  <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email">
                    <label id="email-error" class="error error-hide" for="email"></label>
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="mobile">Mobile<span
                      style="color:#FF0000;">*</span>:</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="mobile" name="mobile">
                    <label id="mobile-error" class="error error-hide" for="mobile"></label>
                  </div>
                </div>
                <br>



                <div class="form-group">
                  <label class="col-md-4 control-label" for="religion">Religon<span style="color:#FF0000;">*</span>
                    :</label>
                  <div class="col-md-8">
                    <select class="form-control" id="religion" name="religion">
                      <option value="">Select Religon</option>
                      <?php foreach($user_religion as $rows) { ?>
                      <option value="<?php echo $rows['religion_id'];?>"><?php echo $rows['religion_name']?></option>
                      <?php }?>
                    </select>
                    <label id="religion-error" class="error error-hide" for="religion"></label>
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="gender">Gender<span style="color:#FF0000;">*</span>
                    :</label>
                  <div class="col-md-8">
                    <select class="form-control" id="gender" name="gender">

                      <option value="">Select Gender</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                    <label id="religion-error" class="error error-hide" for="religion"></label>
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="caste">Caste<span style="color:#FF0000;">*</span>:</label>
                  <div class="col-md-8">

                    <select class="form-control" id="caste" name="caste">

                      <option value="">Select Caste</option>
                      <option value="1">OBC</option>
                      <option value="2">NT</option>
                      <option value="2">ST</option>
                    </select>
                    <label id="caste-error" class="error error-hide" for="caste"></label>
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="mobile">Educational_certificates<span
                      style="color:#FF0000;">*</span>:</label>
                  <div class="col-md-8">
                    <input type="file" class="form-control" name="educational_certificates">
                    <input type="hidden" name="educational_certificates" id="educational_certificates" value="">
                    <div id="educational_certificates_load" class="text-center"></div>
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="photo">photo<span style="color:#FF0000;">*</span>:</label>
                  <div class="col-md-8">
                    <input type="file" class="form-control" name="photo">
                    <input type="hidden" name="photo" id="photo" value="">
                    <div id="photo_load" class="text-center"></div>

                  </div>
                </div>
                <br>

              </fieldset>

              <!-- <div class="resultlogin"></div> -->
            </div>
          </section>
          <!-- end form group-Admin-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button><!-- close-->
          <button type="button" class="btn btn-success" onclick="$('#frmActionSubmit').submit();">Submit</button>
          <!-- save-->
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- close action modal -->

<script>
$(document).ready(function() {
  show_user();

  $('.dataTables_filter input').keyup(function(e) {
    if (e.keyCode == 13) {
      show_user();
    }
  });
});

function show_user() {

  var myTable = $('#result-datatables').DataTable();
  myTable.clear();

  $.ajax({
    type: 'GET',
    url: '<?php echo base_url('reg/user_data');?>',
    async: true,
    dataType: 'json',
    success: function(data) {
      var table = $('#result-datatables').DataTable();
      var html = '';
      var i;
      for (i = 0; i < data.length; i++) {
        html += '<tr>' +
          '<td>' + data[i].id + '</td>' +
          '<td>' + data[i].name + '</td>' +
          '<td>' + data[i].email + '</td>';

        html += '<td>' +
          '<a href="javascript:void(0)" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit User" onclick="get_result(' +
          data[i].id + ')">' +
          '<i class="fa fa-edit"></i></a>' +
          '</td>' +

          '</tr>';
      }
      table.rows.add($(html)).draw();
      $('#show_data').html(html);
    }

  });
}

function add_result() {
  $('#modal_action_title').html('Add User');

  $("#frmActionSubmit").trigger("reset");
  $('.error-hide').html('');
  $('.error-hide').css('display', 'none');
  $('.form-control').removeClass("error");

  $('#educational_certificates_load').html('');
  $('#photo_load').html('');
  $('#formActionModal').modal('show');
}

function get_result(result_id) {

  $("#frmActionSubmit").trigger("reset");
  $('.error-hide').html('');
  $('.error-hide').css('display', 'none');
  $('.form-control').removeClass("error");


  $('#educational_certificates_load').html('');
  $('#photo_load').html('');
  // $('#formActionModal').modal('show');

  if (result_id != "") {

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url('reg/get_result');?>',
      data: "result_id=" + result_id,
      success: function(data_result) {

        data_result_array = JSON.parse(data_result);

        $('#id').val(+result_id);
        $('#name').val(data_result_array['result'][0].name);
        $('#email').val(data_result_array['result'][0].email);
        $('#mobile').val(data_result_array['result'][0].mobile);
        $('#religion').val(data_result_array['result'][0].religion);
        $('#gender').val(data_result_array['result'][0].gender);
        $('#caste').val(data_result_array['result'][0].caste);
        $('#educational_certificates').val(data_result_array['result'][0].educational_certificates);
        $('#photo').val(data_result_array['result'][0].photo);

        if (data_result_array['result'][0].educational_certificates.length > 0)
          $('#educational_certificates_load').html(
            '<a href="<?php echo base_url()?>/upload/educational_certificates/' + data_result_array['result'][0]
            .educational_certificates + '" target="_blank">' + data_result_array['result'][0]
            .educational_certificates + '</a>');


        if (data_result_array['result'][0].photo.length > 0)
          $('#photo_load').html('<img src="<?php echo base_url()?>/upload/photo/' + data_result_array['result'][
              0]
            .photo + '" width="70" height="70">');


        $('#modal_action_title').html('Edit User');

        $('#formActionModal').modal('show');
      }
    });

  } else {
    bootbox.alert('Record not valid', function() {});
  }
}

$("#frmActionSubmit").validate({
  rules: {
    name: {
      required: true,
    },
    email: {
      email: true,
      required: true,
    },
  },

  messages: {
     name: "Please Enter Name.",
    email: "Please Enter Email.",
  },

  submitHandler: function(form) {
    //var formdata = $("#frmSubmit").serialize();
    $('.loader').show();

    var site_url = '<?php echo base_url('reg/action');?>';

    $.ajax({
      type: 'POST',
      url: site_url,
      data: new FormData($('#frmActionSubmit')[0]),
      processData: false,
      contentType: false,
      success: function(result_data) {
        data_result_array = JSON.parse(result_data);
        if (data_result_array.result == 0) {
          var data_result_array_message = data_result_array.message;
          for (var i in data_result_array_message) {
            $('#' + i + '-error').html(data_result_array_message[i]);
            $('#' + i + '-error').show();
          }
          $('.loader').hide();
        } else {
          // $('#formActionModal').modal().hide();
          $("#formActionModal .close").click()
          $(".resultlogin").html(
            "<div class='row'><div class='col-sm-12 margin-b-30'><div class='alert alert-success' style='margin-bottom:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
            data_result_array.message + "</div></div></div>");
        }
        show_user();
      }
    });
  },
});
</script>

</body>

</html>