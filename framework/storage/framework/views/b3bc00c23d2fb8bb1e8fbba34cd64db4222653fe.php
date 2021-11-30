<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("depo.index")); ?>"> <?php echo app('translator')->getFromJson('fleet.depo'); ?> </a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.depo_add'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.depo_add'); ?></h3>
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


        <?php echo Form::open(['route' => 'depo.store','method'=>'post']); ?>

       <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('name',__('fleet.depo_name'), ['class' => 'form-label']); ?>

              <?php echo Form::text('name',null,['class'=>'form-control','required']); ?>

            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('address',__('fleet.depo_address'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              <?php echo Form::text('address',null,['class'=>'form-control','required']); ?>

              </div>
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
              <?php echo Form::label('province',__('fleet.depo_province'), ['class' => 'form-label']); ?>

              <?php echo Form::text('province',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('postal_code',__('fleet.depo_postal_code'), ['class' => 'form-label']); ?>

              <?php echo Form::text('postal_code',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('country',__('fleet.depo_country'), ['class' => 'form-label']); ?>

              <?php echo Form::text('country',null,['class'=>'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('longitude',__('fleet.depo_longitude'), ['class' => 'form-label']); ?>

              <?php echo Form::text('longitude',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6"> 
            <div class="form-group">
              <?php echo Form::label('latitude',__('fleet.depo_latitude'), ['class' => 'form-label']); ?>

              <?php echo Form::text('latitude',null,['class'=>'form-control']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('phone',__('fleet.depo_phone'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              <?php echo Form::number('phone',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('email_depo',__('fleet.depo_email'), ['class' => 'form-label']); ?>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
              <?php echo Form::email('email_depo',null,['class'=>'form-control','required']); ?>

              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('note',__('fleet.depo_note'), ['class' => 'form-label']); ?>

              <?php echo Form::textarea('note',null,['class'=>'form-control','size'=>'30x4']); ?>

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
                <?php echo Form::submit(__('fleet.depo_add'), ['class' => 'btn btn-success']); ?>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/depo/create.blade.php ENDPATH**/ ?>