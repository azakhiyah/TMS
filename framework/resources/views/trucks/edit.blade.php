@extends('layouts.app')
@section('extra_css')
<style type="text/css">
.nav-tabs-custom>.nav-tabs>li.active{border-top-color:#00a65a !important;}

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
  .custom .nav-link.active {

      background-color: #f4bc4b !important;
      color: inherit;
  }
</style>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("trucks.index")}}">@lang('fleet.trucks')</a></li>
<li class="breadcrumb-item active">@lang('fleet.edit_trucks')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif


    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.trucks_edit')</h3>
      </div>

      <div class="card-body">
        <div class="nav-tabs-custom">
          <ul class="nav nav-pills custom">
            <li class="nav-item"><a class="nav-link active" href="#info-tab" data-toggle="tab"> @lang('fleet.general_info') <i class="fa"></i></a></li>
            <!--<li class="nav-item"><a class="nav-link" href="#insurance" data-toggle="tab"> @lang('fleet.insurance') <i class="fa"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#acq-tab" data-toggle="tab"> @lang('fleet.purchase_info') <i class="fa"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#driver" data-toggle="tab"> @lang('fleet.assign_driver') <i class="fa"></i></a></li>-->
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="info-tab">
            {!! Form::open(['route' =>['trucks.update',$data->id],'files'=>true, 'method'=>'PATCH','class'=>'form-horizontal','id'=>'accountForm1']) !!}
            {!! Form::hidden('user_id',Auth::user()->id) !!}
            {!! Form::hidden('id',$data->id) !!}
            <div class="row">
              
              <div class="col-md-6">
              <div class="form-group">
                  {!! Form::label('type_id', __('fleet.trucks_type'), ['class' => 'col-xs-5 control-label']) !!}
                  <div class="col-xs-6">
                    <select name="type_id" class="form-control" required id="type_id">
                      <option></option>
                      @foreach($types as $type)
                      <option value="{{$type->id}}" @if($data->type_id == $type->id) selected @endif>{{$type->displayname}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                </div>


              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('year', __('fleet.trucks_year'), ['class' => 'col-xs-5 control-label']) !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                  {!! Form::number('year', $data->year,['class' => 'form-control','required']) !!}
                  </div>
                </div>
              </div>
<!--
              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('trucks_image', __('fleet.trucks_image'), ['class' => 'col-xs-5 control-label']) !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          @if($data->trailer_image != null)
                            <a href="{{ asset('uploads/'.$data->trailer_image) }}" target="_blank" class="col-xs-3 control-label">View</a>
                          @endif
                      </div>
                  {!! Form::file('trailer_image',null,['class' => 'form-control']) !!}
                 </div> 
                </div>
              </div>
-->
              
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('vin', __('fleet.trucks_vin'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('vin', $data->vin,['class' => 'form-control','required']) !!}
                </div>
              </div>

             
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('machine_number', __('fleet.trucks_machine_number'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('machine_number', $data->machine_number,['class' => 'form-control','required']) !!}
                </div>
              </div>

              
              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('license_plate', __('fleet.trucks_license_plate'), ['class' => 'col-xs-5 control-label']) !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                  {!! Form::text('license_plate', $data->license_plate,['class' => 'form-control','required']) !!}
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('lic_exp_date',__('fleet.trucks_lic_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('lic_exp_date', $data->lic_exp_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('tax_number', __('fleet.trucks_tax_number'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('tax_number', $data->tax_number,['class' => 'form-control','required']) !!}
                </div>
              </div>

              
              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('tax_exp_date',__('fleet.trucks_tax_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('tax_exp_date', $data->tax_exp_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

            
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('kir', __('fleet.trucks_kir'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('kir', $data->kir,['class' => 'form-control','required']) !!}
                </div>
              </div>

           
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('tera_sertifikat', __('fleet.trucks_tera_sertifikat'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('tera_sertifikat', $data->tera_sertifikat,['class' => 'form-control','required']) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('tera_rls_date',__('fleet.trucks_tera_rls_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('tera_rls_date', $data->tera_rls_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('tera_exp_date',__('fleet.trucks_tera_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="col-xs-6">
                    <div class="input-group date">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                      {!! Form::text('tera_exp_date', $data->tera_exp_date,['class' => 'form-control','required']) !!}
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('gate_pass', __('fleet.trucks_gate_pass'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('gate_pass', $data->gate_pass,['class' => 'form-control','required']) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('gatepass_rls_date',__('fleet.trucks_gatepass_rls_date'), ['class' => 'col-xs-5 control-label required']) !!}
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
                  {!! Form::label('gatepass_exp_date',__('fleet.trucks_gatepass_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
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
                    {!! Form::label('door_number', __('fleet.trucks_door_number'),  ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('door_number',$data->door_number,['class' => 'form-control','required']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('owner_type', __('fleet.trucks_owner_type'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-"></i></span>
                </div>
                {!! Form::select('owner_type',["Owner"=>"Owner", "Rental"=>"Rental"], $data->owner_type,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      {!! Form::label('FlowMeter (Y/N) ?', __('fleet.trucks_flowmeter'), ['class' => 'col-xs-5 control-label']) !!}
                    </div>
                    <div class="col-ms-6" style="margin-left: -140px">
                      <label class="switch">
                      <input type="checkbox" name="flowmeter" value="1" @if($data->flowmeter == '1') checked @endif>
                      <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
        
        


            </div>


                <div class="blank"></div>
               
              </div>
            </div>
            <div style=" margin-bottom: 20px;">
              <div class="form-group" style="margin-top: 15px;">
                <div class="col-xs-6 col-xs-offset-3">
                {!! Form::submit(__('fleet.submit'), ['class' => 'btn btn-warning']) !!}
                </div>
              </div>
            </div>
            {!! Form::close() !!}
          </div>

          {!! Form::close() !!}
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
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#group_id').select2({placeholder: "@lang('fleet.selectGroup')"});
  $('#type_id').select2({placeholder:"@lang('fleet.type')"});
  @if(isset($_GET['tab']) && $_GET['tab']!="")
    $('.nav-pills a[href="#{{$_GET['tab']}}"]').tab('show')
  @endif
  $('#start_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#end_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#lic_exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#reg_exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#issue_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

  $(document).on("click",".del_info",function(e){
    var hvk=confirm("Are you sure?");
    if(hvk==true){
      var vid=$(this).data("trucks");
      var key = $(this).data('key');
      var action="{{ route('acquisition.index')}}/"+vid;

      $.ajax({
        type: "POST",
        url: action,
        data: "_method=DELETE&_token="+window.Laravel.csrfToken+"&key="+key+"&trucks_id="+vid,
        success: function(data){
          $("#acq_table").empty();
          $("#acq_table").html(data);
          new PNotify({
            title: 'Deleted!',
            text:'@lang("fleet.deleted")',
            type: 'wanring'
          })
        }
        ,
        dataType: "HTML",
      });
    }
  });

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
          text: '@lang("fleet.exp_add")',
          type: 'success'
        });
        $('#exp_name').val("");
        $('#exp_amount').val("");
      },
      dataType: "HTML"
    });
    e.preventDefault();
  });

  // $("#accountForm").on("submit",function(e){
  //   $.ajax({
  //     type: "POST",
  //     url: $("#accountForm").attr("action"),
  //     data: new FormData(this),
  //     mimeType: 'multipart/form-data',
  //     contentType: false,
  //               cache: false,
  //               processData:false,
  //     success: new PNotify({
  //           title: 'Success!',
  //           text: '@lang("fleet.ins_add")',
  //           type: 'success'
  //       }),
  //   dataType: "json",
  //   });
  //   e.preventDefault();
  // });

  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  });

});
</script>
@endsection