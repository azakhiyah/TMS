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
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("pickup_bytransport.index")); ?>"><?php echo app('translator')->getFromJson('fleet.op'); ?></a></li>
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
        <h3 class="card-title"><?php echo app('translator')->getFromJson('fleet.pick_edit'); ?></h3>
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
            <?php echo Form::open(['route' =>['pickup_bytransport.update',$data->id],'files'=>true, 'method'=>'PATCH','class'=>'form-horizontal','id'=>'accountForm1']); ?>

            <?php echo Form::hidden('user_id',Auth::user()->id); ?>

            <?php echo Form::hidden('id',$data->id); ?>

            
      

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
                <?php echo Form::label('no_SO', __('fleet.pick_no_SO'), ['class' => 'col-xs-5 control-label']); ?>

                <select id="orderplan_id" class="form-control" select name="no_SO">
                        
                        <option value="">--- Select NO SO ---</option>
                        <?php $__currentLoopData = $no_SO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderplan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($orderplan->id); ?>" data-id="<?php echo e($orderplan->id); ?>" <?php if($orderplan->no_SO == $data->no_SO): ?> selected  <?php endif; ?>> <?php echo e($orderplan->no_SO); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('no_PO',__('fleet.pick_no_PO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_PO',$data->no_PO,['class'=>'form-control','required','readonly']); ?>

            </div>
        </div>


        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('no_LO',__('fleet.pick_no_LO'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('no_LO',$data->no_LO,['class'=>'form-control','required','readonly']); ?>

            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('customers_id',__('fleet.pick_customers'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('customers_id',$data->customers->name,['class'=>'form-control','required','readonly']); ?>

                    <input type="hidden" id="customers_id_hide" name="customers_id_hide" >
            </div>
        </div> 


        <div class="col-md-6">
          <div class="form-group">
                <?php echo Form::label('customer_location_id',__('fleet.pick_address'), ['class' => 'form-label']); ?>

                <?php echo Form::text('customer_location_id',$data->customerslocation->address,['class'=>'form-control','required','readonly']); ?>

                <input type="hidden" id="customer_location_id_hide" name="customer_location_id_hide" >
            </div>
        </div> 


        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('qty_order',__('fleet.pick_qty_order'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('qty_order',$data->qty_order,['class'=>'form-control','required','readonly']); ?>

            </div>
        </div>
        
        <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('product_id',__('fleet.pick_product'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('product_id',$data->product->name,['class'=>'form-control','required','readonly']); ?>

                    <input type="hidden" id="product_id_hide" name="product_id_hide" >
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('planning_at',__('fleet.pick_planning_at'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  <?php echo Form::text('planning_at', $data->planning_at,['class' => 'form-control','required','autocomplete' => 'off']); ?>

                  </div>
              </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('warehouse', __('fleet.pick_warehouse'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                  <select id="warehouse_id" name="warehouse_id" class="form-control" >
                  <option value="">--- Select warehouse ---</option>
                    <?php $__currentLoopData = $warehouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                    <option value="<?php echo e($wh->id); ?>" <?php if($wh->id == $data->warehouse_id): ?> selected <?php endif; ?>> <?php echo e($wh->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>  

    
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('depo_id', __('fleet.pick_depo'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id="depo_id" name="depo_id" class="form-control" required id="type_id">
                 <option value="">--- Select depo ---</option>
                   <?php $__currentLoopData = $depo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($depo->id); ?>" <?php if($depo->id == $data->depo_id): ?> selected <?php endif; ?>> <?php echo e($data->depo->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('driver', __('fleet.pick_driver'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id="drivers_id" name="drivers_id" class="form-control" required id="type_id">
                 <option value="">--- Select Driver ---</option>
                   <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drivers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($drivers->id); ?>" <?php if($drivers->id == $data->drivers_id): ?> selected <?php endif; ?>> <?php echo e($data->drivers->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div> 
  
            <div class="col-md-6">
                  <div class="form-group">
                        <?php echo Form::label('truck', __('fleet.pick_door'), ['class' => 'col-xs-5 control-label']); ?>

                        <select id="trucks_id"
                                class="selectpicker form-control"
                                name="door_number">
                                <option value="">--- Select Truck ---</option>
                                  <?php $__currentLoopData = $door_number; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trucks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($trucks->id); ?>" <?php if($trucks->door_number == $data->door_number): ?> selected <?php endif; ?>> <?php echo e($data->trucks->door_number); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('transporter', __('fleet.pick_transporter'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id="transporter_id" name="transporter_id" class="form-control" required id="type_id">
                 <option value="">--- Select Transporter ---</option>
                   <?php $__currentLoopData = $transporter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transporter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($transporter->id); ?>" <?php if($transporter->id == $data->transporter_id): ?> selected <?php endif; ?>> <?php echo e($data->transporter->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('trailers', __('fleet.pick_trailers'), ['class' => 'col-xs-5 control-label']); ?>

                <div class="col-xs-6">
                 <select id="trailers_id" name="trailers_id" class="form-control" required id="type_id">
                 <option value="">--- Select Trailers ---</option>
                   <?php $__currentLoopData = $trailers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trailers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($trailers->id); ?>" <?php if($trailers->id == $data->trailers_id): ?> selected <?php endif; ?>> <?php echo e($data->trailers->brand); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                </div>
              </div>
            </div> 

            
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('license_plate',__('fleet.pick_license_plate'), ['class' => 'form-label']); ?>

                    <?php echo Form::text('license_plate',$data->license_plate,['class'=>'form-control','required']); ?>

              </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('compartement',__('fleet.pick_compartement'), ['class' => 'form-label']); ?>

                    <?php echo Form::number('compartement',$data->compartement,['class'=>'form-control','required']); ?>

                </div>
            </div> 

         
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('statuspickup',__('fleet.pick_statuspickup'), ['class' => 'form-label']); ?>

                <?php echo Form::select('statuspickup',["Pending"=>"Pending", "Processing"=>"Processing", "Completed"=>"Completed"],$data->statuspickup,['class' => 'form-control','required']); ?>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('note',__('fleet.pick_note'), ['class' => 'form-label']); ?>

                <?php echo Form::textarea('note',$data->note,['class'=>'form-control','size'=>'30x4']); ?>

              </div>
            </div>

        <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('start_loading',__('fleet.pick_start_loading'), ['class' => 'col-xs-5 control-label required']); ?>

                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  <?php echo Form::text('start_loading',  $data->start_loading,['class' => 'form-control','required','autocomplete' => 'off']); ?>

                  </div>
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('stop_loading',__('fleet.pick_stop_loading'), ['class' => 'col-xs-5 control-label required']); ?>

                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  <?php echo Form::text('stop_loading', $data->stop_loading,['class' => 'form-control','required','autocomplete' => 'off']); ?>

                  </div>
              </div>
            </div>
      
           
        <!-- <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('start_loading',__('fleet.pick_start_loading'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  <?php echo Form::text('start_loading', $data->start_loading,['class' => 'form-control','required']); ?>

                  </div>
              </div>
            </div> -->

            <!-- <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('stop_loading',__('fleet.pick_stop_loading'), ['class' => 'col-xs-5 control-label required']); ?>

                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  <?php echo Form::text('stop_loading', $data->stop_loading,['class' => 'form-control','required']); ?>

                  </div>
              </div>
            </div> -->

            <div class="col-md-6">
              <div class="form-group">
                    <?php echo Form::label('STATUS', __('fleet.pick_status'), ['class' => 'col-xs-5 control-label']); ?>

                  </div>
                    <div class="col-ms-6" style="margin-left">
                     <label class="switch">
                      <input type="checkbox" name="chkstatus" id="chkstatus" <?php echo e(($data->status == 1 ? ' checked' : '')); ?>  >
                        <span class="slider round"></span>
                      </label>
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


<!--  -->

<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datetimepicker.js')); ?>"></script>
<script type="text/javascript">

  
$('#orderplan_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectSO'); ?>"});
  $('#warehouse_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectwarehouse'); ?>"});
  $('#depo_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectdepo'); ?>"});
  $('#drivers_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selectDriver'); ?>"});  
  $('#trucks_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selecttruck'); ?>"});
  $('#transporter_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selecttransporter'); ?>"});
  $('#trailers_id').select2({placeholder: "<?php echo app('translator')->getFromJson('fleet.selecttrailer'); ?>"});


  $("#customers_id_hide").val(<?php echo e($data->customers_id); ?>);
  $("#customer_location_id_hide").val(<?php echo e($data->customer_location_id); ?>);
  $("#product_id_hide").val(<?php echo e($data->product_id); ?>);


  function get_order(id){
    $.ajax({
      type: "POST",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "<?php echo e(url('admin/pickup_bytransport/get_orderSO')); ?>",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#no_PO").val(data.no_PO);
        $("#no_LO").val(data.no_LO);
        $("#customers_id").val(data.customers_id.name);
        $("#customers_id_hide").val(data.customers_id.id);
        $("#customer_location_id").val(data.customer_location_id.address);
        $("#customer_location_id_hide").val(data.customer_location_id.id);
        $("#qty_order").val(data.qty_order);
        $("#product_id").val(data.product_id.name);
        $("#product_id_hide").val(data.product_id.id);
        $("#depo_id").val(data.depo_id.id).change();
        if(data.no_PO != ""){
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

  
  $("#orderplan_id").on("change",function(){
     

     var id=$(this).find(":selected").data("id"); 
     // $("#driver_id").val(driver).change();
     get_order(id);
    
   });
  

  $('#planning_at').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
  $('#start_loading').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});    

  $('#stop_loading').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});     
        
  // $('#start_loading').datepicker({
  //         autoclose: true,
  //         format: 'yyyy-mm-dd'
  //       });
  // $('#stop_loading').datepicker({
  //         autoclose: true,
  //         format: 'yyyy-mm-dd'
  //       });

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/pickup_bytransport/edit.blade.php ENDPATH**/ ?>