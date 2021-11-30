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
<li class="breadcrumb-item">{{ link_to_route('truck-types.index', __('fleet.truck_types'))}}</li>
<li class="breadcrumb-item active">@lang('fleet.truck_type_edit')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.truck_type_edit')</h3>
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

      {!! Form::open(['route' => ['truck-types.update',$truck_type->id],'method'=>'PATCH','files'=>true]) !!}
      {!! Form::hidden('id',$truck_type->id) !!}
      {!! Form::hidden('old_type',strtolower(str_replace(' ','',$truck_type->trucktype))) !!}
      <div class="row">
      
      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('brand', __('fleet.truck_type_brand'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('brand', $truck_type->brand,['class' => 'form-control','required']) !!}
                </div>
              </div>

             
      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('model', __('fleet.truck_type_model'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('model', $truck_type->model,['class' => 'form-control','required']) !!}
                </div>
              </div>

      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('trucktype', __('fleet.truck_types'), ['class' => 'form-label']) !!}
                    {!! Form::text('trucktype', $truck_type->trucktype,['class' => 'form-control','required']) !!}
                </div>
      </div>          

      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('displayname', __('fleet.truck_type_display_name'), ['class' => 'form-label']) !!}
                    {!! Form::text('displayname', $truck_type->displayname,['class' => 'form-control','required']) !!}
                 </div>
      </div>

      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('icon', __('fleet.truck_type_image'), ['class' => 'form-label']) !!}&nbsp;
                    @if($truck_type->icon != null)
                    <a href="{{asset('/uploads/'.$truck_type->icon)}}" target="blank">@lang('fleet.truck_type_view')</a>
                    @endif
                    <div class="col-ms-6" style="margin-left">
                        {!! Form::file('icon',null,['class' => 'form-control']) !!}
                    </div>
                </div>
      </div>

      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('cylinder_capacity', __('fleet.truck_type_cylinder_capacity'), ['class' => 'form-label']) !!}
                    {!! Form::number('cylinder_capacity', $truck_type->cylinder_capacity,['class' => 'form-control','required','min'=>1]) !!}
                </div>
      </div>  

      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('km_per_liter', __('fleet.truck_type_km_per_liter'), ['class' => 'form-label']) !!}
                    {!! Form::number('km_per_liter', $truck_type->km_per_liter,['class' => 'form-control','required','min'=>1]) !!}
                </div>
      </div>  

      <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('hour_per_liter', __('fleet.truck_type_hour_per_liter'), ['class' => 'form-label']) !!}
                    {!! Form::number('hour_per_liter', $truck_type->hour_per_liter,['class' => 'form-control','required','min'=>1]) !!}
                </div>
      </div> 

        <div class="form-group col-md-4" style="margin-top: 30px">
          <div class="row">
            <div class="col-md-3">
              <label class="switch">
              <input type="checkbox" name="isenable" value="1" @if($truck_type->isenable == 1) checked @endif>
              <span class="slider round"></span>
              </label>
            </div>
            <div class="col-md-9" style="margin-top: 5px">
              <h4>@lang('fleet.isenable')</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        {!! Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']) !!}
      </div>
      {!! Form::close() !!}
      </div>
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