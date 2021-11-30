@extends('layouts.app')
@section('extra_css')
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
@endsection
@section("breadcrumb")
<li class="breadcrumb-item">{{ link_to_route('truck-types.index', __('fleet.truck_type'))}}</li>
<li class="breadcrumb-item active">@lang('fleet.truck_type_add')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.truck_type_add')</h3>
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

      {!! Form::open(['route' => 'truck-types.store','method'=>'post','files'=>true]) !!}
      <div class="row">
      <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('brand', __('fleet.truck_type_brand'), ['class' => 'form-label']) !!}
                    {!! Form::text('brand', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('model', __('fleet.truck_type_model'), ['class' => 'form-label']) !!}
                    {!! Form::text('model', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('trucktype', __('fleet.trucks_type'), ['class' => 'form-label']) !!}
                    {!! Form::text('trucktype', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('displayname', __('fleet.truck_type_display_name'), ['class' => 'form-label']) !!}
                    {!! Form::text('displayname', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                     {!! Form::label('icon', __('fleet.truck_type_image'), ['class' => 'form-label']) !!}
                <div class="col-ms-6" style="margin-left">
                     {!! Form::file('icon',null,['class' => 'form-control']) !!}
                </div>
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
          {!! Form::label('cylinder_capacity', __('fleet.truck_type_cylinder_capacity'), ['class' => 'form-label']) !!}
          {!! Form::number('cylinder_capacity', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
          {!! Form::label('km_per_liter', __('fleet.truck_type_km_per_liter'), ['class' => 'form-label']) !!}
          {!! Form::number('km_per_liter', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
          {!! Form::label('hour_per_liter', __('fleet.truck_type_hour_per_liter'), ['class' => 'form-label']) !!}
          {!! Form::number('hour_per_liter', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="form-group col-md-4" style="margin-top: 30px">
          <div class="row">
            <div class="col-md-3">
              <label class="switch">
                <input type="checkbox" name="isenable" value="1">
                <span class="slider round"></span>
              </label>
            </div>
            <div class="col-md-9" style="margin-top: 5px">
              <h4>@lang('fleet.isenable')</h4>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="form-group col-md-4">
            {!! Form::submit(__('fleet.save'), ['class' => 'btn btn-success']) !!}
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
  //Flat green color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });
  });
</script>
@endsection