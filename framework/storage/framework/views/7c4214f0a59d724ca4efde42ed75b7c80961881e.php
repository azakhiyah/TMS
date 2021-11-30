<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("warehouse.index")); ?>"><?php echo app('translator')->getFromJson('fleet.warehouse'); ?></a></li>
<li class="breadcrumb-item active"> <?php echo app('translator')->getFromJson('fleet.wh_edit_warehouse'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          <?php echo app('translator')->getFromJson('fleet.wh_edit_warehouse'); ?>
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

        <?php echo Form::open(['route' => ['warehouse.update',$data->id],'method'=>'PATCH']); ?>

        <?php echo Form::hidden('id',$data->id); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('name', __('fleet.wh_name'), ['class' => 'form-label']); ?>

              <?php echo Form::text('name', $data->name,['class' => 'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('address', __('fleet.wh_address'), ['class' => 'form-label']); ?>

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
              <?php echo Form::label('city', __('fleet.wh_city'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                <?php echo Form::text('city', $data->city,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('province', __('fleet.wh_province'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                <?php echo Form::text('province', $data->province,['class' => 'form-control','required']); ?>       
            </div>
          </div>
        </div>
          
        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('postal_code', __('fleet.wh_postal_code'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                <?php echo Form::text('postal_code', $data->postal_code,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
         
        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('country', __('fleet.wh_country'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                <?php echo Form::text('country', $data->country,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('longitude', __('fleet.wh_longitude'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                <?php echo Form::text('longitude', $data->longitude,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('latitude', __('fleet.wh_latitude'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                <?php echo Form::text('latitude', $data->latitude,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('phone',__('fleet.wh_phone'), ['class' => 'form-label']); ?>

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
              <?php echo Form::label('email_WH',__('fleet.wh_email_WH'), ['class' => 'form-label']); ?>

             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <?php echo Form::text('email_WH', $data->email_WH,['class' => 'form-control','required']); ?>

              </div>
            </div>
        </div>
          

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('note',__('fleet.wh_note'), ['class' => 'form-label']); ?>

             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <?php echo Form::text('note', $data->note,['class' => 'form-control','required']); ?>

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
<script type="text/javascript">
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/warehouse/edit.blade.php ENDPATH**/ ?>