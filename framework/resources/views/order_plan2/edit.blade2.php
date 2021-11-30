@extends('layouts.app')
@section('extra_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item "><a href="{{ route("order_plan.index")}}"> @lang('fleet.order_plan') </a></li>
<li class="breadcrumb-item active">@lang('fleet.edit_orderplan')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.edit_orderplan')</h3>
      </div>

      <div class="card-body">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {!! Form::open(['route' => ['order_plan.update',$data->id],'method'=>'PATCH']) !!}
        {!! Form::hidden('user_id',Auth::user()->id)!!}
        {!! Form::hidden('id',$data->id)!!}
        {!! Form::hidden('type','Updated')!!}

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('vehicle_id',__('fleet.vehicle'), ['class' => 'form-label']) !!}
              <select id="vehicle_id" name="vehicle_id" class="form-control" required>
                <option value="">-</option>
                @foreach($vehicles as $vehicle)
                <option value="{{$vehicle->id}}" @if($vehicle->id == $data->vehicle_id) selected @endif> {{$vehicle->make}} - {{$vehicle->model}} - {{$vehicle->license_plate}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              {!! Form::label('required_by', __('fleet.required_by'), ['class' => 'form-label']) !!}
              <div class="input-group date">
              <div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-calendar"></span></div>
              {!! Form::text('required_by',$data->required_by,['class'=>'form-control','required']) !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('meter',Hyvikk::get('dis_format')." ".__('fleet.reading'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text">{{Hyvikk::get('dis_format')}}</span></div>
              {!! Form::number('meter',$data->meter,['class'=>'form-control']) !!}
              </div>
            </div>
            <div class="form-group">
              {!! Form::label('note',__('fleet.note'), ['class' => 'form-label']) !!}
              {!! Form::textarea('note',$data->note,['class'=>'form-control','size'=>'30x4']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('vendor_id',__('fleet.vendor'), ['class' => 'form-label']) !!}
              <select id="vendor_id" name="vendor_id" class="form-control" required>
                <option value="">-</option>
                @foreach($vendors as $vendor)
                <option value="{{$vendor->id}}" @if($vendor->id == $data->vendor_id) selected @endif>{{$vendor->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              {!! Form::label('status',__('fleet.status'), ['class' => 'form-label']) !!}
              {!! Form::select('status',["Pending"=>"Pending", "Processing"=>"Processing", "Completed"=>"Completed","Hold"=>"Hold"],$data->status,['class' => 'form-control','required']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('price',__('fleet.order_plan_price'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend date">
              <span class="input-group-text">{{Hyvikk::get('currency')}}</span>
              </div>
              {!! Form::number('price',$data->price,['class'=>'form-control','required']) !!}
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('description',__('fleet.description'), ['class' => 'form-label']) !!}
              {!! Form::textarea('description',$data->description,['class'=>'form-control','size'=>'30x4']) !!}
            </div>
          </div>
        </div>
        <hr>
        <div class="row" style="margin-bottom: 25px;">
          <div class="col-md-6">  <div class="form-group"> <label class="form-label">@lang('fleet.selectPart')</label> <select id="select_part" class="form-control" name="part_list"> <option></option>@foreach($parts as $part) <option value="{{ $part->id }}" title="{{ $part->title }}" qty="{{ $part->stock }}" price="{{ $part->unit_cost }}">{{ $part->title }}</option> @endforeach </select> </div></div>
          <div class="col-md-6" style="margin-top: 30px">
            <button type="button" class="btn btn-warning attach">@lang('fleet.attachPart')</button>
          </div>
        </div>
        <div class="row">
          @foreach($data->parts as $row)
          <div class="row col-md-12"><div class="col-md-4">  <div class="form-group"> <label class="form-label">@lang('fleet.selectPart')</label> <select  class="form-control" disabled>  <option value="{{ $row->part_id }}" selected >{{ $row->part->title }}</option> </select> </div></div> <div class="col-md-2">  <div class="form-group"> <label class="form-label">@lang('fleet.qty')</label> <input type="number" name="parts[{{ $row->part_id }}]" min="1" value="{{ $row->qty }}" class="form-control" required disabled> </div></div>
          <div class="col-md-2">  <div class="form-group"> <label class="form-label">@lang('fleet.unit_cost')</label> <input type="number" value="{{ $row->price }}" class="form-control" disabled> </div></div><div class="col-md-2">  <div class="form-group"> <label class="form-label">@lang('fleet.total_cost')</label> <input type="number" value="{{ $row->price * $row->qty }}" class="form-control" disabled > </div></div>
          <div class="col-md-2"> <div class="form-group" style="margin-top: 30px"><a class="btn btn-danger" href="{{ url('admin/remove-part/'.$row->id) }}">Remove</a> </div></div></div>
          @endforeach
          <div class="parts col-md-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {!! Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section("script")
<script src="{{ asset('assets/js/moment.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#vehicle_id').select2({placeholder: "@lang('fleet.selectVehicle')"});
  $('#vendor_id').select2({placeholder: "@lang('fleet.select_vendor')"});
  $('#select_part').select2({placeholder: "@lang('fleet.selectPart')"});
  $('#required_by').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#created_on').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

  //Flat green color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  });

  $('.attach').on('click',function(){
    var field = $('#select_part').val();
    if(field == "" || field == null){
      alert('Select Part');
    }
    else{
      var qty=$('#select_part option:selected').attr('qty');
      var title=$('#select_part option:selected').attr('title');
      var price=$('#select_part option:selected').attr('price');
      // alert($('#select_part option:selected').attr('title'));
      // alert($('#select_part option:selected').attr('qty'));
      $(".parts").append('<div class="row col-md-12"><div class="col-md-4">  <div class="form-group"> <label class="form-label">@lang('fleet.selectPart')</label> <select  class="form-control" disabled>  <option value="'+field+'" selected >'+title+'</option> </select> </div></div> <div class="col-md-2">  <div class="form-group"> <label class="form-label">@lang('fleet.qty')</label> <input type="number" name="parts['+field+']" min="1" value="1" class="form-control calc" max='+qty+' required> </div></div><div class="col-md-2">  <div class="form-group"> <label class="form-label">@lang('fleet.unit_cost')</label> <input type="number" value="'+price+'" class="form-control" disabled> </div></div><div class="col-md-2">  <div class="form-group"> <label class="form-label">@lang('fleet.total_cost')</label> <input type="number" value="'+price+'" class="form-control total_cost" disabled id="'+field+'"> </div></div> <div class="col-md-2"> <div class="form-group" style="margin-top: 30px"><button class="btn btn-danger" type="button" onclick="this.parentElement.parentElement.parentElement.remove();">Remove</button> </div></div></div>');
      $('#select_part').val('').change();
      $('.calc').on('change',function(){
        // alert($(this).val()*price);
        $('#'+field).val($(this).val()*price);
      });
    }
  });
});
</script>
@endsection