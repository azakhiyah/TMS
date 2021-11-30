<?php $__env->startSection('extra_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("drivers.index")); ?>"><?php echo app('translator')->getFromJson('fleet.drivers'); ?></a></li>
<li class="breadcrumb-item active"> <?php echo app('translator')->getFromJson('fleet.drivers_edit'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          <?php echo app('translator')->getFromJson('fleet.drivers_edit'); ?>
        </h3>
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

        <?php echo Form::open(['route' => ['drivers.update',$data->id],'method'=>'PATCH']); ?>

        <?php echo Form::hidden('id',$data->id); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('name', __('fleet.drivers_name'), ['class' => 'form-label']); ?>

              <?php echo Form::text('name', $data->name,['class' => 'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('address', __('fleet.drivers_address'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                </div>
                <?php echo Form::textarea('address', $data->address,['class' => 'form-control','size'=>'30x2']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('phone', __('fleet.drivers_phone'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <?php echo Form::text('phone', $data->phone,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>
        
        <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('sex', __('fleet.drivers_sex'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::select('sex',["Male"=>"Male", "Female"=>"Female"], $data->sex,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
        
          
        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('sim_number', __('fleet.drivers_sim_number'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('sim_number', $data->sim_number,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
         
    

        <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label('sim_exp_date',__('fleet.drivers_sim_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      <?php echo Form::text('sim_exp_date', $data->sim_exp_date,['class' => 'form-control','required']); ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('icon', __('fleet.drivers_image'), ['class' => 'form-label']); ?>&nbsp;
                    <div class="col-ms-6" style="margin-left">
                        <?php echo Form::file('icon',null,['class' => 'form-control']); ?>

                    </div>
                </div>
              </div>

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('emergency_contact', __('fleet.drivers_emergency_contact'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <?php echo Form::text('emergency_contact', $data->emergency_contact,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('gatepass', __('fleet.drivers_gatepass'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('gatepass', $data->gatepass,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
         
    

        <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label('gatepass_rls_date',__('fleet.drivers_gatepass_rls_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      <?php echo Form::text('gatepass_rls_date', $data->gatepass_rls_date,['class' => 'form-control','required']); ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label('gatepass_exp_date',__('fleet.drivers_gatepass_exp_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      <?php echo Form::text('gatepass_exp_date', $data->gatepass_exp_date,['class' => 'form-control','required']); ?>

                    </div>
                  </div>
                </div>
              </div>

        <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label('join_date',__('fleet.drivers_join_date'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      <?php echo Form::text('join_date', $data->join_date,['class' => 'form-control','required']); ?>

                    </div>
                  </div>
                </div>
              </div>

         
        </div>
        <div class="col-md-12">
          <?php echo Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']); ?>

        </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
  //Flat red color scheme for iCheck
  $(document).ready(function() {
    $('#sim_exp_date').datepicker({
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
  $('#join_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/drivers/edit.blade.php ENDPATH**/ ?>