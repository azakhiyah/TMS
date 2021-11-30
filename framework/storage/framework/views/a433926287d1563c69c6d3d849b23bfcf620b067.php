<?php $__env->startSection('extra_css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("drivers.index")); ?>"> <?php echo app('translator')->getFromJson('fleet.drivers'); ?> </a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.drivers_add'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.drivers_add'); ?></h3>
      </div>

      <div class="card-body">
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


        <?php echo Form::open(['route' => 'drivers.store','method'=>'post']); ?>

       <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('name',__('fleet.drivers_name'), ['class' => 'form-label']); ?>

              <?php echo Form::text('name',null,['class'=>'form-control','required']); ?>

            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('address',__('fleet.drivers_address'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              <?php echo Form::text('address',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('phone',__('fleet.drivers_phone'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              <?php echo Form::number('phone',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('sex',__('fleet.drivers_sex'), ['class' => 'form-label']); ?>

              <?php echo Form::select('sex',["Male"=>"Male", "Female"=>"Female"],null,['class' => 'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('sim_number',__('fleet.drivers_sim_number'), ['class' => 'form-label']); ?>

              <?php echo Form::text('sim_number',null,['class'=>'form-control']); ?>

            </div>
          </div>



          <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('sim_exp_date', __('fleet.drivers_sim_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('sim_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

          <div class="col-md-6">
              <div class="form-group">
                     <?php echo Form::label('icon', __('fleet.drivers_image'), ['class' => 'form-label']); ?>

                <div class="col-ms-6" style="margin-left">
                     <?php echo Form::file('icon',null,['class' => 'form-control']); ?>

                </div>
              </div>
        </div>
        

          <div class="col-md-6"> 
            <div class="form-group">
              <?php echo Form::label('emergency_contact',__('fleet.drivers_emergency_contact'), ['class' => 'form-label']); ?>

              <?php echo Form::number('emergency_contact',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('gatepass',__('fleet.drivers_gatepass'), ['class' => 'form-label']); ?>

              <?php echo Form::text('gatepass',null,['class'=>'form-control']); ?>

            </div>
          </div>


        <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('gatepass_rls_date', __('fleet.drivers_gatepass_rls_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('gatepass_rls_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

          <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('gatepass_exp_date', __('fleet.drivers_gatepass_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('gatepass_exp_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

        

          <div class="col-md-6">
            <div class="form-group">
                    <?php echo Form::label('join_date', __('fleet.drivers_join_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <?php echo Form::text('join_date', null,['class' => 'form-control','required']); ?>

                  </div>
            </div>
        </div>

          </div>
        </div>
      </div>
    </div>
  </div> 

      <div class="blank"></div>
        <div style=" margin-bottom: 20px;">
            <div class="form-group" style="margin-top: 15px;">
              <div class="col-xs-6 col-xs-offset-3">
                <?php echo Form::submit(__('fleet.drivers_add'), ['class' => 'btn btn-success']); ?>

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
<script>
  function select_type(val){
    var type=$("#type option:selected").text();
    if(type=="Add New"){
      $("#nothing").empty();
      $("#nothing").html('<?php echo Form::text('type',null,['class' => 'form-control','required']); ?>');
    }
  }
</script>
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
    $('#sim_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    $('#gatepass_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    $('#gatepass_rls_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    $('#join_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });

  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/drivers/create.blade.php ENDPATH**/ ?>