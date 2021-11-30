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

    background-color: #21bc6c !important;

}

</style>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("trailers.index")}}">@lang('fleet.trailers')</a></li>
<li class="breadcrumb-item active">@lang('fleet.add_trailers')</li>


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
        <h3 class="card-title">@lang('fleet.add_trailers')</h3>
      </div>

    <div class="card-body">
      <div class="nav-tabs-custom">
        <ul class="nav nav-pills custom">
          <li class="nav-item"><a class="nav-link active" href="#info-tab" data-toggle="tab"> @lang('fleet.general_info') <i class="fa"></i></a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="info-tab">
          {!! Form::open(['route' => 'trailers.store','files'=>true, 'method'=>'post','class'=>'form-horizontal','id'=>'accountForm']) !!}
          {!! Form::hidden('user_id',Auth::user()->id) !!}
          <div class="blank"></div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('brand', __('fleet.trailers_brand'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('brand', null,['class' => 'form-control','required']) !!}
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('type', __('fleet.trailers_type'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('type', null,['class' => 'form-control','required']) !!}
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('Unit Maker', __('fleet.unit_maker'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('unit_maker', null,['class' => 'form-control','required']) !!}
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('license_plate', __('fleet.trailers_licensePlate'), ['class' => 'col-xs-5 control-label']) !!}
                 {!! Form::text('license_plate', null,['class' => 'form-control','required']) !!}
               </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('tag_id', __('fleet.trailers_tag_id'), ['class' => 'col-xs-5 control-label']) !!}
                 {!! Form::text('tag_id', null,['class' => 'form-control','required']) !!}
               </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('year', __('fleet.trailers_year'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::number('year', null,['class' => 'form-control','required']) !!}
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('lic_exp_date',__('fleet.trailers_lic_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('lic_exp_date', null,['class' => 'form-control','required']) !!}
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('reg_exp_date',__('fleet.trailers_reg_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('reg_exp_date', null,['class' => 'form-control','required']) !!}
                  </div>
              </div>
            </div>

              <!--<div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::label('in_service', __('fleet.service'), ['class' => 'col-xs-5 control-label']) !!}
                  </div>
                  <div class="col-ms-6" style="margin-left: -140px">
                    <label class="switch">
                      <input type="checkbox" name="in_service" value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
            
            <div class="col-md-6">  
              <div class="form-group">
                {!! Form::label('trailers_image', __('fleet.trailers_image'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-ms-6" style="margin-left">
                {!! Form::file('trailers_image',null,['class' => 'form-control']) !!}
                </div>
              </div>
            </div>  -->

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('tera_sertifikat', __('fleet.trailers_tera_sertifikat'), ['class' => 'col-xs-5 control-label']) !!}
                 {!! Form::text('tera_sertifikat', null,['class' => 'form-control','required']) !!}
               </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('tera_rls_date',__('fleet.trailers_tera_rls_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('tera_rls_date', null,['class' => 'form-control','required']) !!}
                  </div>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('tera_exp_date',__('fleet.trailers_tera_exp_date'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('tera_exp_date', null,['class' => 'form-control','required']) !!}
                  </div>
              </div>
            </div>

            <div class="col-md-6"> 
                <div class="form-group">
                    {!! Form::label('compartement', __('fleet.trailers_compartement'), ['class' => 'col-xs-5 control-label']) !!}
                    <select class="form-control" id="compartement_id" name="compartement">
                          <option cap="8000" value="1">1</option>
                          <option cap="16000" value="2">2</option>
                          <option cap="24000" value="3">3</option>
                          <option cap="32000" value="4">4</option>
                        </select>
                  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('capacity',__('fleet.trailers_capacity'), ['class' => 'form-label']) !!}
                    {!! Form::text('capacity',null,['class'=>'form-control','required','readonly']) !!}
              </div>
           </div>


            <!-- <div class="col-md-6"> 
                <div class="form-group">
                    {!! Form::label('capacity', __('fleet.trailers_capacity'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('capacity', null,['class' => 'form-control','required']) !!}
                </div>
            </div> -->


<!--              
          <div class="col-md-6">  
            <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::label('C1', __('fleet.trailers_c1'), ['class' => 'col-xs-5 control-label']) !!}
                  </div>
                  <div class="col-ms-6" style="margin-left">
                    <label class="switch">
                      <input type="checkbox" name="C1" value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
            </div> 
          </div>

          <div class="col-md-6">  
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::label('C2', __('fleet.trailers_c2'), ['class' => 'col-xs-5 control-label']) !!}
                  </div>
                  <div class="col-ms-6" style="margin-left">
                    <label class="switch">
                      <input type="checkbox" name="C2" value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
          </div>    

          <div class="col-md-6"> 
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::label('C3', __('fleet.trailers_c3'), ['class' => 'col-xs-5 control-label']) !!}
                  </div>
                  <div class="col-ms-6" style="margin-left">
                    <label class="switch">
                      <input type="checkbox" name="C3" value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::label('C4', __('fleet.trailers_c4'), ['class' => 'col-xs-5 control-label']) !!}
                  </div>
                    <div class="col-ms-6" style="margin-left">
                     <label class="switch">
                        <input type="checkbox" name="C4" value="1">
                        <span class="slider round"></span>
                      </label>
                    </div>
                </div>
              </div>
          </div> -->
          
    </div>
        <div class="blank"></div>
          <div style=" margin-bottom: 20px;">
            <div class="form-group" style="margin-top: 15px;">
              <div class="col-xs-6 col-xs-offset-3">
                {!! Form::submit(__('fleet.submit'), ['class' => 'btn btn-success']) !!}
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
<script src="{{ asset('assets/js/moment.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript">


$("#compartement_id").change(function () {
    var selectedValue = $(this).val();
    $("#capacity").val($(this).find("option:selected").attr("cap"))
});


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
      $('#group_id').select2({placeholder: "@lang('fleet.selectGroup')"});
      $('#type_id').select2({placeholder:"@lang('fleet.type')"});
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
        $('#tera_rls_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
        $('#tera_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#issue_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });

    //Flat green color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      });
    });
</script>
@endsection
