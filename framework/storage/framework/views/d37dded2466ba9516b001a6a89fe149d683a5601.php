<?php $__env->startSection('extra_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("order_plan.index")); ?>"><?php echo app('translator')->getFromJson('fleet.op'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.op_edit'); ?></li>
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


    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.op_edit'); ?></h3>
      </div>

      <div class="card-body">
        <div class="nav-tabs-custom">
          <ul class="nav nav-pills custom">
            <li class="nav-item"><a class="nav-link active" href="#info-tab" data-toggle="tab"> <?php echo app('translator')->getFromJson('fleet.general_info'); ?> <i class="fa"></i></a></li>
            <!--<li class="nav-item"><a class="nav-link" href="#insurance" data-toggle="tab"> <?php echo app('translator')->getFromJson('fleet.insurance'); ?> <i class="fa"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#acq-tab" data-toggle="tab"> <?php echo app('translator')->getFromJson('fleet.purchase_info'); ?> <i class="fa"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#driver" data-toggle="tab"> <?php echo app('translator')->getFromJson('fleet.assign_driver'); ?> <i class="fa"></i></a></li>-->
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="info-tab">
            <?php echo Form::open(['route' =>['order_plan.update',$data->id],'files'=>true, 'method'=>'PATCH','class'=>'form-horizontal','id'=>'accountForm1']); ?>

            <?php echo Form::hidden('user_id',Auth::user()->id); ?>

            <?php echo Form::hidden('id',$data->id); ?>

            

      <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('No SO', __('fleet.op_no_SO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_SO', $data->no_SO,['class' => 'form-control','required']); ?>

                   
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('No PO', __('fleet.op_no_PO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_PO', $data->no_PO,['class' => 'form-control','required']); ?>

              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('No LO', __('fleet.op_no_LO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_LO', $data->no_LO,['class' => 'form-control','required']); ?>

              </div>
        </div>

        
        
        <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('customers_id', __('fleet.op_customers'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                   <select id="customers_id"
                            class="selectpicker form-control"
                            name="customers_id">
                            <option selected disabled>--- Select Customers ---</option>
                            <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customers->id); ?>"<?php if($data->customers_id == $customers->id): ?> selected <?php endif; ?>><?php echo e($customers->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div>  


            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('customer_location_id', __('fleet.op_customer_location'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id = "customer_location_id" 
                          name="customer_location_id" 
                          class="form-control">
                   <option selected disabled>--- Select Address ---</option>
                   <<?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerslocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                   <option value="<?php echo e($customerslocation->id); ?>"<?php if($customerslocation->id == $data->customer_location_id): ?> selected <?php endif; ?>><?php echo e($customerslocation->address); ?></option>
               
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </select>
                </div>
              </div>
            </div>  
         
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('depo_id', __('fleet.op_depo'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id="depo_id" name="depo_id" class="form-control" required id="type_id2">
                   <?php $__currentLoopData = $depo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($depo->id); ?>"<?php if($data->depo_id == $depo->id): ?> selected <?php endif; ?>><?php echo e($depo->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('product_id', __('fleet.op_product'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id="product_id" name="product_id" class="form-control" required id="type_id">>
                   <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>"<?php if($data->product_id == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('qty_order', __('fleet.op_qty_order'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('qty_order', $data->qty_order,['class' => 'form-control','required']); ?>

              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                     <?php echo Form::label('attachment', __('fleet.op_attachment'), ['class' => 'form-label']); ?>

                <div class="col-ms-6" style="margin-left">
                     <?php echo Form::file('attachment',$data->attachment,['class' => 'form-control']); ?>

                </div>
              </div>
        </div>


            </div>


                <div class="blank"></div>
               
              </div>
            </div>
            <div style=" margin-bottom: 20px;">
              <div class="form-group" style="margin-top: 15px;">
                <div class="col-xs-6 col-xs-offset-3">
                <?php echo Form::submit(__('fleet.submit'), ['class' => 'btn btn-warning']); ?>

                </div>
              </div>
            </div>
            <?php echo Form::close(); ?>

          </div>

          <?php echo Form::close(); ?>

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

function get_cust_location(id){

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $.ajax({
      type: "POST",
      url: "<?php echo e(url('admin/get_address')); ?>",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#customer_location_id").empty();
        // $("#customer_location_id").select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.op_customer_location'); ?>",data:data2.data});
        jQuery.each(data, function(key,value){
                          
              $('select[name="customer_location_id"]').append('<option value="'+ value.id +'">'+value.address +'</option>');
            });

            $('#mySelect2').find(':selected');
        
      },
      error: function(data){
        var errors = $.parseJSON(data.responseText);
        console.log(errors);
        // $(".print-error-msg").find("ul").html('');
        // $(".print-error-msg").css('display','block');
        // $.each( errors, function( key, value ) {
        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      },
      dataType: "json"
    });
  }


$(document).ready(function() {
  
  $('#customers_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.customers_select'); ?>"});
  $('#customer_location_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.clocation_select'); ?>"});
  $('#depo_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.depo_select'); ?>"});
  $('#product_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.product_select'); ?>"});

    $("#customers_id").on("change",function(){

      var id=$(this).find(":selected").val();
      get_cust_location(id);
     
   });


  $("#add_form").on("submit",function(e){
    $.ajax({
      type: "POST",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      success: function(data){
        $("#acq_table").empty();
        $("#acq_table").html(data);
        new PNotify({
          title: 'Success!',
          text: '<?php echo app('translator')->getFromJson("fleet.exp_add"); ?>',
          type: 'success'
        });
        $('#exp_name').val("");
        $('#exp_amount').val("");
      },
      dataType: "HTML"
    });
    e.preventDefault();
  });


});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/order_plan/edit.blade.php ENDPATH**/ ?>