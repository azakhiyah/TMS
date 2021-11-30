<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>
<?php $__env->startSection("breadcrumb"); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route("pickup_bytransport.index")); ?>">Pickup By Transport</a></li>
<li class="breadcrumb-item active">View Cetak</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
    
      <h4>
        <span class="logo-lg">
          <img src="<?php echo e(asset('assets/images/'. Hyvikk::get('icon_img') )); ?>" class="navbar-brand" style="margin-top: -15px">
          Surat Jalan  <?php echo e(ucfirst($cetak->transporter->name)); ?>

        </span>
        <small class="float-right"> <b><?php echo app('translator')->getFromJson('fleet.date'); ?> : </b><?php echo e(date($date_format_setting,strtotime($cetak->planning_at))); ?></small>
      </h4>
    </div>
  </div>
  
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <b>From</b>
      <address>
        <?php echo nl2br($cetak->transporter->name); ?>

        <br>
        <?php echo nl2br($cetak->transporter->address); ?>

        <br>
        <?php echo nl2br($cetak->transporter->city); ?>, <?php echo nl2br($cetak->transporter->province); ?>

        <br>
        <?php echo nl2br($cetak->transporter->postal_code); ?>, <?php echo nl2br($cetak->transporter->country); ?>

      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      
      <address>
        
        
        <b>Pickup No#</b>
        <?php echo e($cetak->id); ?>

      </address>
    </div>
    <div class="col-sm-4 invoice-col">
      
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 invoice-col">
      <strong> <?php echo app('translator')->getFromJson('fleet.load_addr'); ?>:</strong>
      <address>
        <?php echo e($cetak->depo->name); ?>

        <br>
        <?php echo nl2br($cetak->depo->address); ?>, <?php echo nl2br($cetak->depo->city); ?>

        <br>
        <?php echo nl2br($cetak->depo->city); ?>, <?php echo nl2br($cetak->depo->province); ?>

        <br>
        <?php echo app('translator')->getFromJson('fleet.pick_viewcetak_load_date'); ?>:
        <b> <?php echo e(date($date_format_setting.' g:i A',strtotime($cetak->start_loading))); ?></b>
      </address>
    </div>
    <div class="col-sm-6 invoice-col">
      <strong><?php echo app('translator')->getFromJson('fleet.delivery_addr'); ?>:</strong>
      <address>
        <?php echo e($cetak->customers->name); ?>

        <br>
        <?php echo e($cetak->customerslocation->address); ?>

        <br>
        <?php echo app('translator')->getFromJson('fleet.pick_viewcetak_delivery_date'); ?>:
        <b><?php echo e(date($date_format_setting.' g:i A',strtotime($cetak->stop_loading))); ?></b>
      </address>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 pull-right">
      <p class="lead"></p>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%"><?php echo app('translator')->getFromJson('fleet.vehicle'); ?>:</th>
            <td>
            <?php echo e($cetak->trailers->brand); ?> - <?php echo e($cetak->trailers->license_plate); ?> - <?php echo e($cetak->trailers->type); ?> 
            </td>
          </tr>
         <tr>
            <th><?php echo app('translator')->getFromJson('fleet.driver'); ?>:</th>
            <td><?php echo e($cetak->drivers->name); ?></td>
          </tr>
         
          <tr>
            <th><?php echo app('translator')->getFromJson('fleet.lo_no'); ?>:</th>
            <td><?php echo e($cetak->no_LO); ?></td>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('fleet.so_no'); ?>:</th>
            <td><?php echo e($cetak->no_SO); ?></td>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('fleet.qty_order'); ?>:</th>
            <td><?php echo e($cetak->qty_order); ?> <?php echo e(Hyvikk::get('fuel_unit')); ?></td>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('fleet.product'); ?>:</th>
            <td><?php echo e($cetak->product->name); ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="<?php echo e(url('admin/pickup_bytransport/print/'.$cetak->id)); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson('fleet.print'); ?></a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/pickup_bytransport/viewcetak.blade.php ENDPATH**/ ?>