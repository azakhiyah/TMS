<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("clocation.index")); ?>"><?php echo app('translator')->getFromJson('fleet.clocation'); ?></a></li>
<li class="breadcrumb-item active"> <?php echo app('translator')->getFromJson('fleet.clocation_edit'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          <?php echo app('translator')->getFromJson('fleet.clocation_edit'); ?>
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

        <?php echo Form::open(['route' => ['clocation.update',$data->id],'method'=>'PATCH']); ?>

        <?php echo Form::hidden('id',$data->id); ?>

        <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                  <?php echo Form::label('name', __('fleet.clocation_name'), ['class' => 'col-xs-5 control-label']); ?>

                  <div class="col-xs-6">
                    <select name="customers_id" class="form-control" required id="customers_id">
                      <option></option>
                      <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($customers->id); ?>" <?php if($customers->id ==$data->customers_id): ?> selected <?php endif; ?>><?php echo e($customers->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                </div>
        <!--<div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('name', __('fleet.clocation_name'), ['class' => 'form-label']); ?>

              <?php echo Form::text('name', $data->name,['class' => 'form-control','required']); ?>

            </div>
          </div>-->

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('address', __('fleet.clocation_address'), ['class' => 'form-label']); ?>

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
              <?php echo Form::label('city', __('fleet.clocation_city'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('city', $data->city,['class' => 'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('province', __('fleet.clocation_province'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('province', $data->province,['class' => 'form-control','required']); ?>       
            </div>
          </div>
        </div>
          
        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('postal_code', __('fleet.clocation_postal_code'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('postal_code', $data->postal_code,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>
         
        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('country', __('fleet.clocation_country'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('country', $data->country,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('longitude', __('fleet.clocation_longitude'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('longitude', $data->longitude,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('latitude', __('fleet.clocation_latitude'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
                <?php echo Form::text('latitude', $data->latitude,['class' => 'form-control','required']); ?>

            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('phone',__('fleet.clocation_phone'), ['class' => 'form-label']); ?>

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
              <?php echo Form::label('email_customer',__('fleet.clocation_email'), ['class' => 'form-label']); ?>

             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <?php echo Form::text('email_customer', $data->email_customer,['class' => 'form-control','required']); ?>

              </div>
            </div>
        </div>
          

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('note',__('fleet.clocation_note'), ['class' => 'form-label']); ?>

             <div class="input-group mb-3">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/clocation/edit.blade.php ENDPATH**/ ?>