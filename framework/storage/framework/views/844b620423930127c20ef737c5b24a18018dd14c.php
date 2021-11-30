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
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("truck.index")); ?>"><?php echo app('translator')->getFromJson('fleet.truck'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.truck_add'); ?></li>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.truck_add'); ?></h3>
      </div>

    <div class="card-body">
      <div class="nav-tabs-custom">
        <ul class="nav nav-pills custom">
          <li class="nav-item"><a class="nav-link active" href="#info-tab" data-toggle="tab"> <?php echo app('translator')->getFromJson('fleet.general_info'); ?> <i class="fa"></i></a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="info-tab">
          <?php echo Form::open(['route' => 'truck.store','files'=>true, 'method'=>'post','class'=>'form-horizontal','id'=>'accountForm']); ?>

          <?php echo Form::hidden('user_id',Auth::user()->id); ?>

          <div class="row card-body">
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('make', __('fleet.truck_make'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('make', null,['class' => 'form-control','required']); ?>

                </div>
              </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('model', __('fleet.truck_model'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('model', null,['class' => 'form-control','required']); ?>

                </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('type_id', __('fleet.truck_type'), ['class' => 'col-xs-5 control-label']); ?>

                 <select name="type_id" class="form-control" required id="type_id">
                   <option></option>
                   <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->displayname); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('year', __('fleet.truck_year'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::number('year', null,['class' => 'form-control','required']); ?>

                </div>
              </div>

            

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('reg_exp_date',__('fleet.truck_reg_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  <?php echo Form::text('reg_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
                </div>
              </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('vin', __('fleet.truck_vin'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('vin', null,['class' => 'form-control','required']); ?>

                </div>
              </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('machine_no', __('fleet.truck_machine_no'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('machine_no', null,['class' => 'form-control','required']); ?>

                </div>
              </div>  

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('license_plate', __('fleet.truck_license_plate'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('license_plate', null,['class' => 'form-control','required']); ?>

                </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('lic_exp_date',__('fleet.truck_lic_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  <?php echo Form::text('lic_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
                </div>
              </div>
              <hr>

              <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('udf1',__('fleet.add_udf'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="row">
                  <div class="col-md-8">
                    <?php echo Form::text('udf1', null,['class' => 'form-control']); ?>

                  </div>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-info add_udf"> <?php echo app('translator')->getFromJson('fleet.add'); ?></button>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-6">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <?php echo Form::label('in_service', __('fleet.truck_service'), ['class' => 'col-xs-5 control-label']); ?>

                  </div>
                  <div class="col-ms-6" style="margin-left: -300px">
                    <label class="switch">
                      <input type="checkbox" name="in_service" value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('truck_image', __('fleet.truck_image'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-ms-6" style="margin-left">
                <?php echo Form::file('truck_image',null,['class' => 'form-control']); ?>

                </div>
               </div>
            </div>

              <div class="blank"></div>
            </div>
          </div>
          <div style=" margin-bottom: 20px;">
            <div class="form-group" style="margin-top: 15px;">
              <div class="col-xs-6 col-xs-offset-3">
                <?php echo Form::submit(__('fleet.submit'), ['class' => 'btn btn-success']); ?>

              </div>
            </div>
          </div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>

<script type="text/javascript">

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
      $('#group_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectGroup'); ?>"});
      $('#type_id').select2({placeholder:"<?php echo app('translator')->getFromJson('fleet.type'); ?>"});
      $('#start_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#end_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#lic_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#reg_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#issue_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });

    //Flat green color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/truck/create.blade.php ENDPATH**/ ?>