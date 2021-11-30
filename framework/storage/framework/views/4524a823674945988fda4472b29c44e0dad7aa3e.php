<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("clocation.index")); ?>"> <?php echo app('translator')->getFromJson('fleet.clocation'); ?> </a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.clocation_add'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.clocation_add'); ?></h3>
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


        <?php echo Form::open(['route' => 'clocation.store','method'=>'post']); ?>

   
     
         <div class="row">  
         
         <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('customers_id', __('fleet.clocation_name'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select name="customers_id" class="form-control" required id="type_id">
                   <option></option>
                   <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($customers->id); ?>"><?php echo e($customers->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div>  
         
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('address',__('fleet.clocation_address'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              <?php echo Form::text('address',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('city',__('fleet.clocation_city'), ['class' => 'form-label']); ?>

              <?php echo Form::text('city',null,['class'=>'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('city',__('fleet.depo_city'), ['class' => 'form-label']); ?>

              <?php echo Form::text('city',null,['class'=>'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('province',__('fleet.clocation_province'), ['class' => 'form-label']); ?>

              <?php echo Form::text('province',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('postal_code',__('fleet.clocation_postal_code'), ['class' => 'form-label']); ?>

              <?php echo Form::text('postal_code',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('country',__('fleet.clocation_country'), ['class' => 'form-label']); ?>

              <?php echo Form::text('country',null,['class'=>'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('longitude',__('fleet.clocation_longitude'), ['class' => 'form-label']); ?>

              <?php echo Form::text('longitude',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6"> 
            <div class="form-group">
              <?php echo Form::label('latitude',__('fleet.clocation_latitude'), ['class' => 'form-label']); ?>

              <?php echo Form::text('latitude',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('phone',__('fleet.clocation_phone'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              <?php echo Form::number('phone',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('email_customer',__('fleet.clocation_email'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
              <?php echo Form::email('email_customer',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('note',__('fleet.clocation_note'), ['class' => 'form-label']); ?>

              <?php echo Form::textarea('note',null,['class'=>'form-control','size'=>'30x4']); ?>

            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
        <hr>
       
        <div class="blank"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <?php echo Form::submit(__('fleet.clocation_add'), ['class' => 'btn btn-success']); ?>

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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/clocation/create.blade.php ENDPATH**/ ?>