@extends('layouts.app')
@section('extra_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("drivers.index")}}">@lang('fleet.drivers')</a></li>
<li class="breadcrumb-item active"> @lang('fleet.drivers_edit')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          @lang('fleet.drivers_edit')
        </h3>
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

        {!! Form::open(['route' => ['drivers.update',$data->id],'method'=>'PATCH']) !!}
        {!! Form::hidden('id',$data->id) !!}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name', __('fleet.drivers_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name', $data->name,['class' => 'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address', __('fleet.drivers_address'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                </div>
                {!! Form::textarea('address', $data->address,['class' => 'form-control','size'=>'30x2']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone', __('fleet.drivers_phone'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                {!! Form::text('phone', $data->phone,['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>
        
        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('sex', __('fleet.drivers_sex'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::select('sex',["Male"=>"Male", "Female"=>"Female"], $data->sex,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
        
          
        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('sim_number', __('fleet.drivers_sim_number'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('sim_number', $data->sim_number,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
         
    

        <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('sim_exp_date',__('fleet.drivers_sim_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('sim_exp_date', $data->sim_exp_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('icon', __('fleet.drivers_image'), ['class' => 'form-label']) !!}&nbsp;
                    <div class="col-ms-6" style="margin-left">
                        {!! Form::file('icon',null,['class' => 'form-control']) !!}
                    </div>
                </div>
              </div>

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('emergency_contact', __('fleet.drivers_emergency_contact'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                {!! Form::text('emergency_contact', $data->emergency_contact,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('gatepass', __('fleet.drivers_gatepass'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('gatepass', $data->gatepass,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
         
    

        <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('gatepass_rls_date',__('fleet.drivers_gatepass_rls_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('gatepass_rls_date', $data->gatepass_rls_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('gatepass_exp_date',__('fleet.drivers_gatepass_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('gatepass_exp_date', $data->gatepass_exp_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

        <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('join_date',__('fleet.drivers_join_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('join_date', $data->join_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

         
        </div>
        <div class="col-md-12">
          {!! Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  //Flat red color scheme for iCheck
  $(document).ready(function() {
    $('#sim_exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#gatepass_rls_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#gatepass_exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#join_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
});
</script>
@endsection