<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(Hyvikk::get('app_name')); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/cdn/bootstrap.min.css')); ?>" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/cdn/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link href="<?php echo e(asset('assets/css/cdn/ionicons.min.css')); ?>" rel="stylesheet">
  <!-- Theme style -->
   <link href="<?php echo e(asset('assets/css/AdminLTE.min.css')); ?>" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/cdn/fonts.css')); ?>">
</head>

<?php ($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y'); ?>

  <div class="wrapper">
    <section class="invoice">
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
            <?php echo app('translator')->getFromJson('fleet.loading'); ?>:
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
            <?php echo app('translator')->getFromJson('fleet.delivery'); ?>:
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
      
    <br>
    <br>
      <div class="row">
        <div class="col-sm-6 invoice-col">
          <p style="margin-top: 10px;">
            Driver
            <br>
            <br>
            <br>
            <br>
            (______________)
          </p>
        </div>
        <div class="col-sm-6 invoice-col">
          <p style="margin-top: 10px;">
            Disetujui
            <br>
            <br>
            <br>
            <br>
            (______________)
          </p>
        </div>
      </div>
    </section>
  </div>
</body>
</html>

<script type="text/javascript">
  // <!--
  window.print();
  //-->
  </script><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/pickup_bytransport/print.blade.php ENDPATH**/ ?>