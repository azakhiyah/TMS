<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{Hyvikk::get('app_name')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cdn/bootstrap.min.css')}}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/css/cdn/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link href="{{ asset('assets/css/cdn/ionicons.min.css')}}" rel="stylesheet">
  <!-- Theme style -->
   <link href="{{ asset('assets/css/AdminLTE.min.css') }}" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{ asset('assets/css/cdn/fonts.css')}}">
</head>
{{-- <body onload="window.print();"> --}}
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')

  <div class="wrapper">
    <section class="invoice">
      <div class="row">
        <div class="col-12">
          <h4>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/'. Hyvikk::get('icon_img') ) }}" class="navbar-brand" style="margin-top: -15px">
              Surat Jalan  {{ ucfirst($cetak->transporter->name) }}
            </span>
            <small class="float-right"> <b>@lang('fleet.date') : </b>{{ date($date_format_setting,strtotime($cetak->planning_at)) }}</small>
          </h4>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <b>From</b>
          <address>
            {!! nl2br($cetak->transporter->name) !!}
            <br>
            {!! nl2br($cetak->transporter->address) !!}
            <br>
            {!! nl2br($cetak->transporter->city) !!}, {!! nl2br($cetak->transporter->province) !!}
            <br>
            {!! nl2br($cetak->transporter->postal_code) !!}, {!! nl2br($cetak->transporter->country) !!}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          {{-- <b>To </b> --}}
          <address>
            {{-- <td>@if($row->warehouse_id){{$row->warehouse->name}}@endif</td> --}}
            {{-- {!! nl2br($cetak->transName) !!} --}}
            <b>Pickup No#</b>
            {{ $cetak->id}}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          {{-- <b>Pickup No#</b>
          {{ $cetak->id}} --}}
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 invoice-col">
          <strong> @lang('fleet.load_addr'):</strong>
          <address>
            {{$cetak->depo->name}}
            <br>
            {!! nl2br($cetak->depo->address) !!}, {!! nl2br($cetak->depo->city) !!}
            <br>
            {!! nl2br($cetak->depo->city) !!}, {!! nl2br($cetak->depo->province) !!}
            <br>
            @lang('fleet.loading'):
            <b> {{date($date_format_setting.' g:i A',strtotime($cetak->start_loading))}}</b>
          </address>
        </div>
        <div class="col-sm-6 invoice-col">
          <strong>@lang('fleet.delivery_addr'):</strong>
          <address>
            {{$cetak->customers->name}}
            <br>
            {{$cetak->customerslocation->address}}
            <br>
            @lang('fleet.delivery'):
            <b>{{date($date_format_setting.' g:i A',strtotime($cetak->stop_loading))}}</b>
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
                <th style="width:50%">@lang('fleet.vehicle'):</th>
                <td>
                  {{$cetak->trailers->brand}} - {{$cetak->trailers->license_plate}} - {{$cetak->trailers->type}} 
                </td>
              </tr>
             <tr>
                <th>@lang('fleet.driver'):</th>
                <td>{{ $cetak->drivers->name }}</td>
              </tr>
             
              <tr>
                <th>@lang('fleet.lo_no'):</th>
                <td>{{ $cetak->no_LO }}</td>
              </tr>
              <tr>
                <th>@lang('fleet.so_no'):</th>
                <td>{{ $cetak->no_SO }}</td>
              </tr>
              <tr>
                <th>@lang('fleet.qty_order'):</th>
                <td>{{ $cetak->qty_order }} {{Hyvikk::get('fuel_unit')}}</td>
              </tr>
              <tr>
                <th>@lang('fleet.product'):</th>
                <td>{{ $cetak->product->name }}</td>
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
  </script>