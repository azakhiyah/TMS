<?php $__env->startSection('extra_css'); ?>
<style type="text/css">
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

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><?php echo e(link_to_route('truck-types.index', __('fleet.truck_types'))); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.truck_type_edit'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.truck_type_edit'); ?></h3>
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

      <?php echo Form::open(['route' => ['truck-types.update',$truck_type->id],'method'=>'PATCH','files'=>true]); ?>

      <?php echo Form::hidden('id',$truck_type->id); ?>

      <?php echo Form::hidden('old_type',strtolower(str_replace(' ','',$truck_type->trucktype))); ?>

      <div class="row">
      
      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('brand', __('fleet.truck_type_brand'), ['class' => 'col-xs-5 control-label']); ?>

                    <?php echo Form::text('brand', $truck_type->brand,['class' => 'form-control','required']); ?>

                </div>
              </div>

             
      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('model', __('fleet.truck_type_model'), ['class' => 'col-xs-5 control-label']); ?>

                    <?php echo Form::text('model', $truck_type->model,['class' => 'form-control','required']); ?>

                </div>
              </div>

      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('trucktype', __('fleet.truck_types'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('trucktype', $truck_type->trucktype,['class' => 'form-control','required']); ?>

                </div>
      </div>          

      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('displayname', __('fleet.truck_type_display_name'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('displayname', $truck_type->displayname,['class' => 'form-control','required']); ?>

                 </div>
      </div>

      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('icon', __('fleet.truck_type_image'), ['class' => 'form-label']); ?>&nbsp;
                    <?php if($truck_type->icon != null): ?>
                    <a href="<?php echo e(asset('/uploads/'.$truck_type->icon)); ?>" target="blank"><?php echo app('translator')->getFromJson('fleet.truck_type_view'); ?></a>
                    <?php endif; ?>
                    <div class="col-ms-6" style="margin-left">
                        <?php echo Form::file('icon',null,['class' => 'form-control']); ?>

                    </div>
                </div>
      </div>

      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('cylinder_capacity', __('fleet.truck_type_cylinder_capacity'), ['class' => 'form-label']); ?>

                    <?php echo Form::number('cylinder_capacity', $truck_type->cylinder_capacity,['class' => 'form-control','required','min'=>1]); ?>

                </div>
      </div>  

      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('km_per_liter', __('fleet.truck_type_km_per_liter'), ['class' => 'form-label']); ?>

                    <?php echo Form::number('km_per_liter', $truck_type->km_per_liter,['class' => 'form-control','required','min'=>1]); ?>

                </div>
      </div>  

      <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('hour_per_liter', __('fleet.truck_type_hour_per_liter'), ['class' => 'form-label']); ?>

                    <?php echo Form::number('hour_per_liter', $truck_type->hour_per_liter,['class' => 'form-control','required','min'=>1]); ?>

                </div>
      </div> 

        <div class="form-group col-md-4" style="margin-top: 30px">
          <div class="row">
            <div class="col-md-3">
              <label class="switch">
              <input type="checkbox" name="isenable" value="1" <?php if($truck_type->isenable == 1): ?> checked <?php endif; ?>>
              <span class="slider round"></span>
              </label>
            </div>
            <div class="col-md-9" style="margin-top: 5px">
              <h4><?php echo app('translator')->getFromJson('fleet.isenable'); ?></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <?php echo Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']); ?>

      </div>
      <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(document).ready(function() {
  //Flat green color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/truck_types/edit.blade.php ENDPATH**/ ?>