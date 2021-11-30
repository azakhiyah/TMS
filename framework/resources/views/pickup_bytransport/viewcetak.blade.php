@extends('layouts.app')
@php($date_format_setting=(Hyvikk::get('date_format'))?Hyvikk::get('date_format'):'d-m-Y')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("pickup_bytransport.index")}}">Pickup By Transport</a></li>
<li class="breadcrumb-item active">View Cetak</li>
@endsection
@section('content')
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
    {{--{{ dd($cetak->transName) }}--}}
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
        {{-- <td>@if($row->warehouse_id){{$row->whName}}@endif</td> --}}
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
        @lang('fleet.pick_viewcetak_load_date'):
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
        @lang('fleet.pick_viewcetak_delivery_date'):
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
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="{{url('admin/pickup_bytransport/print/'.$cetak->id)}}" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> @lang('fleet.print')</a>
    </div>
  </div>
</div>
@endsection