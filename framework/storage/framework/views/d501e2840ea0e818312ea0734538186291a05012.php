<?php $__env->startSection('extra_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("delivery_order.index")); ?>"><?php echo app('translator')->getFromJson('fleet.do'); ?></a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->getFromJson('fleet.do_edit'); ?></li>
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
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.do_edit'); ?></h3>
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
            <?php echo Form::open(['route' =>['delivery_order.update',$data->id],'files'=>true, 'method'=>'PATCH','class'=>'form-horizontal','id'=>'accountForm1']); ?>

            <?php echo Form::hidden('user_id',Auth::user()->id); ?>

            <?php echo Form::hidden('id',$data->id); ?>

            


        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                  <?php echo Form::label('no_SO', __('fleet.do_no_SO'), ['class' => 'col-xs-5 control-label']); ?>

                  <select id="pickupbytransport_id" class="form-control" select name="no_SO">
                          <option value="">--- Select NO SO ---</option>
                          <?php $__currentLoopData = $pickups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pickup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($pickup->id); ?>" data-id="<?php echo e($pickup->id); ?>" <?php if($pickup->no_SO == $data->no_SO): ?> selected <?php endif; ?>> <?php echo e($pickup->no_SO); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
          </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('No PO', __('fleet.do_no_PO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_PO', $data->no_PO,['class' => 'form-control','required','readonly']); ?>

              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('No LO', __('fleet.do_no_LO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_LO', $data->no_LO,['class' => 'form-control','required','readonly']); ?>

              </div>
        </div>

        
        
        <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('customers_id', __('fleet.do_customers'), ['class' => 'form-label']); ?>

                <?php echo Form::text('customers_id', $data->customers_name,['class' => 'form-control','required','readonly']); ?>

              </div>
            </div>  


            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('customer_location_id', __('fleet.do_customer_location'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('customer_location_id', $data->customer_location_address,['class' => 'form-control','required','readonly']); ?>

              </div>
            </div>  


            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('qty_order', __('fleet.do_qty_order'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('qty_order', $data->qty_order,['class' => 'form-control','required','readonly']); ?>

              </div>
            </div>  

            
            <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('product_id',__('fleet.do_product'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('product_id',$data->product_name,['class' => 'form-control','required','readonly']); ?>

            </div>
           </div>

           <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('warehouse_id',__('fleet.do_warehouse'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('warehouse_id',$data->warehouse_name,['class' => 'form-control','required','readonly']); ?>

            </div>
           </div>         

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('depo_id', __('fleet.do_depo'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('depo_id',$data->depo_name,['class' => 'form-control','required','readonly']); ?>

              </div>
            </div>  

            
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('drivers_id', __('fleet.do_driver'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('drivers_id',$data->drivers_name,['class' => 'form-control','required','readonly']); ?>

              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('door_number', __('fleet.do_door'), ['class' => 'col-xs-5 control-label']); ?>

                    <?php echo Form::text('door_number',$data->door_number,['class'=>'form-control','required','readonly']); ?>

              </div>
        </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('transporter_id', __('fleet.do_transporter'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('transporter_id',$data->transporter_name,['class'=>'form-control','required','readonly']); ?>

              </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('trailers_id', __('fleet.do_trailers'), ['class' => 'col-xs-5 control-label']); ?>

                <?php echo Form::text('trailers_id',$data->trailers_name,['class'=>'form-control','required','readonly']); ?>

              </div>
            </div> 

  
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('compartement',__('fleet.do_compartement'), ['class' => 'form-label']); ?>

                    <?php echo Form::number('compartement',$data->compartement,['class'=>'form-control','required','readonly']); ?>

                </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                  <?php echo Form::label('license_plate',__('fleet.do_license_plate'), ['class' => 'form-label']); ?>

                  <?php echo Form::text('license_plate',$data->license_plate,['class'=>'form-control','required', 'readonly']); ?>

            </div>
          </div> 
  
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label('statusdelivery',__('fleet.do_statusdelivery'), ['class' => 'form-label']); ?>

              <?php echo Form::select('statusdelivery',["Pending"=>"Pending", "Processing"=>"Processing", "Completed"=>"Completed"],$data->statusdelivery,['class' => 'form-control','required']); ?>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
                <?php echo Form::label('qty_delivery',__('fleet.do_qty_delivery'), ['class' => 'form-label']); ?>

                <?php echo Form::number('qty_delivery',$data->qty_delivery,['class'=>'form-control','required']); ?>

            </div>
        </div> 

        <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('date_delivery',__('fleet.do_date_delivery'), ['class' => 'col-xs-5 control-label required']); ?>

                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  <?php echo Form::text('date_delivery', $data->date_delivery,['class' => 'form-control','required','autocomplete' => 'off']); ?>

                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('actual_delivery',__('fleet.do_actual_delivery'), ['class' => 'col-xs-5 control-label required']); ?>

                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  <?php echo Form::text('actual_delivery', $data->actual_delivery,['class' => 'form-control','required','autocomplete' => 'off']); ?>

                  </div>
              </div>
            </div>

        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('note',__('fleet.do_note'), ['class' => 'form-label']); ?>

            <?php echo Form::textarea('note',$data->note,['class'=>'form-control','size'=>'30x4']); ?>

          </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                     <?php echo Form::label('attachment1', __('fleet.do_attachment1'), ['class' => 'form-label']); ?>

                <div class="col-ms-6" style="margin-left">
                     <?php echo Form::file('attachment1',$data->attachment1,['class' => 'form-control']); ?>

                </div>
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                     <?php echo Form::label('attachment2', __('fleet.do_attachment2'), ['class' => 'form-label']); ?>

                <div class="col-ms-6" style="margin-left">
                     <?php echo Form::file('attachment2',$data->attachment2,['class' => 'form-control']); ?>

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
<script src="<?php echo e(asset('assets/js/datetimepicker.js')); ?>"></script>
<script type="text/javascript">

$('#pickup_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectSO'); ?>"});


function get_order(id){
    $.ajax({
      type: "POST",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      //url: "<?php echo e(url('admin/pickup_bytransport/get_orderSO')); ?>",
      url: "<?php echo e(url('admin/delivery_order/get_orderSO')); ?>",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#no_PO").val(data.no_PO);
        $("#no_LO").val(data.no_LO);
        $("#customers_id").val(data.customers.name);
        $("#customer_location_id").val(data.customer_location.address);
        $("#qty_order").val(data.qty_order);
        $("#qty_delivery").val(data.qty_order);
        $("#warehouse_id").val(data.warehouse.name);
        $("#product_id").val(data.product.name);
        $("#depo_id").val(data.depo.name);
        $("#drivers_id").val(data.drivers.name);
        $("#door_number").val(data.door_number);
        $("#trailers_id").val(data.trailers.brand);
        $("#transporter_id").val(data.transporter.name);
        $("#compartement").val(data.compartement);
        $("#license_plate").val(data.license_plate); 
        if(data.no_SO != ""){
          new PNotify({
            title: 'Success!',
            text: "NO SO Terdaftar",
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


$(document).ready(function() {

  $("#pickupbytransport_id").on("change",function(){
     

     var id=$(this).find(":selected").data("id"); 
     get_order(id);
    
   });
  

  //   $("#customers_id").on("change",function(){

  //     var id=$(this).find(":selected").val();
  //     get_cust_location(id);
     
  //  });

  $('#date_delivery').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});

    $('#actual_delivery').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});   
   

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/delivery_order/edit.blade.php ENDPATH**/ ?>