@extends('layouts.app')
@section('extra_css')

<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("drivers.index")}}"> @lang('fleet.drivers') </a></li>
<li class="breadcrumb-item active">@lang('fleet.drivers_add')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.drivers_add')</h3>
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

    <div class="card-body">
      <div class="nav-tabs-custom">
        <ul class="nav nav-pills custom">
          <li class="nav-item"><a class="nav-link active" href="#info-tab" data-toggle="tab"> @lang('fleet.general_info') <i class="fa"></i></a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="info-tab">


        {!! Form::open(['route' => 'drivers.store','method'=>'post']) !!}
       <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name',__('fleet.drivers_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address',__('fleet.drivers_address'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              {!! Form::text('address',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.drivers_phone'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              {!! Form::number('phone',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('sex',__('fleet.drivers_sex'), ['class' => 'form-label']) !!}
              {!! Form::select('sex',["Male"=>"Male", "Female"=>"Female"],null,['class' => 'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('sim_number',__('fleet.drivers_sim_number'), ['class' => 'form-label']) !!}
              {!! Form::text('sim_number',null,['class'=>'form-control']) !!}
            </div>
          </div>



          <div class="col-md-6">
            <div class="form-group">
                    {!! Form::label('sim_exp_date', __('fleet.drivers_sim_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    {!! Form::text('sim_exp_date', null,['class' => 'form-control','required']) !!}
                  </div>
            </div>
        </div>

          <div class="col-md-6">
              <div class="form-group">
                     {!! Form::label('icon', __('fleet.drivers_image'), ['class' => 'form-label']) !!}
                <div class="col-ms-6" style="margin-left">
                     {!! Form::file('icon',null,['class' => 'form-control']) !!}
                </div>
              </div>
        </div>
        

          <div class="col-md-6"> 
            <div class="form-group">
              {!! Form::label('emergency_contact',__('fleet.drivers_emergency_contact'), ['class' => 'form-label']) !!}
              {!! Form::number('emergency_contact',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('gatepass',__('fleet.drivers_gatepass'), ['class' => 'form-label']) !!}
              {!! Form::text('gatepass',null,['class'=>'form-control']) !!}
            </div>
          </div>


        <div class="col-md-6">
            <div class="form-group">
                    {!! Form::label('gatepass_rls_date', __('fleet.drivers_gatepass_rls_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    {!! Form::text('gatepass_rls_date', null,['class' => 'form-control','required']) !!}
                  </div>
            </div>
        </div>

          <div class="col-md-6">
            <div class="form-group">
                    {!! Form::label('gatepass_exp_date', __('fleet.drivers_gatepass_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    {!! Form::text('gatepass_exp_date', null,['class' => 'form-control','required']) !!}
                  </div>
            </div>
        </div>

        

          <div class="col-md-6">
            <div class="form-group">
                    {!! Form::label('join_date', __('fleet.drivers_join_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    {!! Form::text('join_date', null,['class' => 'form-control','required']) !!}
                  </div>
            </div>
        </div>

          </div>
        </div>
      </div>
    </div>
  </div> 

      <div class="blank"></div>
        <div style=" margin-bottom: 20px;">
            <div class="form-group" style="margin-top: 15px;">
              <div class="col-xs-6 col-xs-offset-3">
                {!! Form::submit(__('fleet.drivers_add'), ['class' => 'btn btn-success']) !!}
             </div>
           </div>
        </div>
          {!! Form::close() !!}
       </div>
      </div>
    </div>
   </div>
  </div>
</div>
@endsection

@section("script")
<script>
  function select_type(val){
    var type=$("#type option:selected").text();
    if(type=="Add New"){
      $("#nothing").empty();
      $("#nothing").html('{!! Form::text('type',null,['class' => 'form-control','required']) !!}');
    }
  }
</script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $(".add_udf").click(function () {
    // alert($('#udf').val());
    var field = $('#udf1').val();
    if(field == "" || field == null){
      alert('Enter field name');
    }
    else{
      $(".blank").append('<div class="row"><div class="col-md-8">  <div class="form-group"> <label class="form-label">'+ field.toUpperCase() +'</label> <input type="text" name="udf['+ field +']" class="form-control" placeholder="Enter '+ field +'" required></div></div><div class="col-md-4"> <div class="form-group" style="margin-top: 30px"><button class="btn btn-danger" type="button" onclick="this.parentElement.parentElement.parentElement.remove();">Remove</button> </div></div></div>');
      $('#udf1').val("");
    }
  });
  $(document).ready(function() {
    $('#sim_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    $('#gatepass_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    $('#gatepass_rls_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    $('#join_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });

  });
  </script>
@endsection