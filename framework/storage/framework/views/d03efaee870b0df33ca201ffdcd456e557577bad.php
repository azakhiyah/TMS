<?php $__env->startSection('extra_css'); ?>
<style type="text/css">
.nav-tabs-custom>.nav-tabs>li.active{border-top-color:#00a65a !important;}
  /* The switch - the box around the slider */
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {display:none;}

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
  .custom .nav-link.active {

background-color: #21bc6c !important;

}


</style>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><?php echo e(link_to_route('trucks.index', __('fleet.trucks'))); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.trucks_add'); ?></li>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.trucks_add'); ?></h3>
      </div>

      
        <?php if(count($errors) > 0): ?>
          <div class="alert alert-danger">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>
     <div class="card-body">
      <div class="nav-tabs-custom">
        <ul class="nav nav-pills custom">
          <li class="nav-item"><a class="nav-link active" href="#info-tab" data-toggle="tab"> <?php echo app('translator')->getFromJson('fleet.general_info'); ?> <i class="fa"></i></a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="info-tab">
      <?php echo Form::open(['route' => 'trucks.store','method'=>'post','files'=>true]); ?>

      <div class="blank"></div>
      
      
      <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('type_id', __('fleet.trucks_type'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select name="type_id" class="form-control" required id="type_id">
                   <option></option>
                   <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->trucktype); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div>  

            <!-- <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('trailers', __('fleet.trucks_trailers'), ['class' => 'col-xs-5 control-label']); ?>

                 <select id="trailers" class="form-control" required id="trailers">
                   <option></option>
                   <?php $__currentLoopData = $trailer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trailers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($trailers->id); ?>"><?php echo e($trailers->license_plate); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div> -->

              <div class="col-md-6">
              <div class="form-group">
              <?php echo Form::label('trailers', __('fleet.trucks_trailers'), ['class' => 'col-xs-5 control-label']); ?>

                    <select id="trailers_id"
                            class="selectpicker form-control"
                            name="license_plate">
                            
                            <option value="">--- Select Trailers  ---</option>
                            <?php $__currentLoopData = $trailer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trailers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value=""<?php echo e($trailers->id); ?>" data-id=""<?php echo e($trailers->id); ?>"><?php echo e($trailers->license_plate); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('year', __('fleet.trucks_year'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('year', null,['class' => 'form-control','required']); ?>

              </div>
        </div>
       <!--
        <div class="col-md-6">
              <div class="form-group">
                     <?php echo Form::label('truck_image', __('fleet.trucks_image'), ['class' => 'form-label']); ?>

                <div class="col-ms-6" style="margin-left">
                     <?php echo Form::file('truck_image',null,['class' => 'form-control']); ?>

                </div>
              </div>
        </div>
        -->
        <div class="col-md-6">
              <div class="form-group">
          <?php echo Form::label('vin', __('fleet.trucks_vin'), ['class' => 'form-label']); ?>

          <?php echo Form::text('vin', null,['class' => 'form-control','required']); ?>

              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
          <?php echo Form::label('machine_number', __('fleet.trucks_machine_number'), ['class' => 'form-label']); ?>

          <?php echo Form::text('machine_number', null,['class' => 'form-control','required']); ?>

              </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('license_plate', __('fleet.trucks_license_plate'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('license_plate', null,['class' => 'form-control','required']); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('lic_exp_date', __('fleet.trucks_lic_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('lic_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('tax_number', __('fleet.trucks_tax_number'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('tax_number', null,['class' => 'form-control','required']); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('tax_exp_date', __('fleet.trucks_tax_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('tax_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('kir', __('fleet.trucks_kir'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('kir', null,['class' => 'form-control','required']); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('tera_sertifikat', __('fleet.trucks_tera_sertifikat'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('tera_sertifikat', null,['class' => 'form-control','required']); ?>

            </div>
        </div>
     
        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('tera_rls_date', __('fleet.trucks_tera_rls_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('tera_rls_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('tera_exp_date', __('fleet.trucks_tera_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('tera_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('gate_pass', __('fleet.trucks_gate_pass'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('gate_pass', null,['class' => 'form-control','required']); ?>

            </div>
        </div>
 
        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('gatepass_rls_date', __('fleet.trucks_gatepass_rls_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('gatepass_rls_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('gatepass_exp_date', __('fleet.trucks_gatepass_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('gatepass_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('door_number', __('fleet.trucks_door_number'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('door_number', null,['class' => 'form-control','required']); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('owner_type',__('fleet.trucks_owner_type'), ['class' => 'form-label']); ?>

              <?php echo Form::select('owner_type',["Owner"=>"Owner", "Rental"=>"Rental"],$Selected="Owner",['class' => 'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('flowmeter', __('fleet.trucks_flowmeter'), ['class' => 'col-xs-5 control-label']); ?>

                  <div class="col-ms-6" style="margin-left">
                    <label class="switch">
                      <input type="checkbox" name="flowmeter" value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
            </div>

            


        <div class="form-group col-md-4" style="margin-top: 30px">
          <div class="row">
            <div class="col-md-3">
              <label class="switch">
                <input type="checkbox" name="isenable" value="1">
                <span class="slider round"></span>
              </label>
            </div>
            <div class="col-md-9" style="margin-top: 5px">
              <h4><?php echo app('translator')->getFromJson('fleet.isenable'); ?></h4>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            <?php echo Form::submit(__('fleet.save'), ['class' => 'btn btn-success']); ?>

          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>



<!-- bootstrap datepicker -->

<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>




<script type="text/javascript">


function get_buntut(id){
    
    $.ajax({
      type: "POST",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "<?php echo e(url('admin/trucks/get_buntut')); ?>",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#gate_pass").val(data.lic_exp_date);
        // $("#tera_sertifikat").val(data.tera_sertifikat);
        // $("#tera_rls_date").val(data.tera_rls_date);
        // $("#tera_exp_date").val(data.tera_rls_date);
        if(data.trailers != ""){
          new PNotify({
            title: 'Success!',
            text: "Trailers Terdaftar",
            type: 'success'
          });
        }
      },
      error: function(data){
        var errors = $.parseJSON(data.responseText);
        console.log(errors);
      },      
      dataType: "json"
    });
  }

  $(".add_udf").click(function () {
    // alert($('#udf').val());
    var field = $('#udf1').val();
    if(field == "" || field == null){
      alert('Enter field name');
    }

    else{
      $(".blank").append('<div class="row"><div class="col-md-8">  <div class="form-group"> <label class="form-label">'+ field.toUpperCase() +'</label> <input type="text" name="udf['+ field +']" class="form-control" placeholder="Enter '+ field +'" required></div></div><div class="col-md-4"> <div class="form-group" style="margin-top: 30px"><button class="btn btn-danger" type="button" onclick="this.parentElement.parentElement.parentElement.remove();">Remove</button> </div></div></div>');
      $('#udf1').val("");
    }
  });

    $(document).ready(function() {
      $("#trailers_id").on("change",function(){
     

     var id=$(this).find(":selected").data("id"); 
     // $("#driver_id").val(driver).change();
     get_buntut(id);
     });
     

      $('#group_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectGroup'); ?>"});
      $('#type_id').select2({placeholder:"<?php echo app('translator')->getFromJson('fleet.type'); ?>"});
      $('#lic_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#tax_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#tera_rls_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#tera_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#gatepass_rls_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#gatepass_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });

    //     $("#type_id").change(function() {
    // $("#trailers").attr("disabled", this.value=="12"); 
    // // or $("#flap-drop").toggle(this.value!="23");
    // });
    // //Flat green color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/trucks/create.blade.php ENDPATH**/ ?>