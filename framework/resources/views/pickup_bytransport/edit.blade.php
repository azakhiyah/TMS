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
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("pickup_bytransport.index")}}">@lang('fleet.op')</a></li>
<li class="breadcrumb-item active">@lang('fleet.op_edit')</li>
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


    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.pick_edit')</h3>
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
            {!! Form::open(['route' =>['pickup_bytransport.update',$data->id],'files'=>true, 'method'=>'PATCH','class'=>'form-horizontal','id'=>'accountForm1']) !!}
            {!! Form::hidden('user_id',Auth::user()->id) !!}
            {!! Form::hidden('id',$data->id) !!}
            
      

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
                {!! Form::label('no_SO', __('fleet.pick_no_SO'), ['class' => 'col-xs-5 control-label']) !!}
                <select id="orderplan_id" class="form-control" select name="no_SO">
                        {{-- <option selected disabled>--- Select NO SO ---</option> --}}
                        <option value="">--- Select NO SO ---</option>
                        @foreach ($no_SO as $orderplan)
                        <option value="{{$orderplan->id}}" data-id="{{$orderplan->id}}" @if($orderplan->no_SO == $data->no_SO) selected  @endif> {{$orderplan->no_SO}}</option>
                        @endforeach
                </select>
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('no_PO',__('fleet.pick_no_PO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_PO',$data->no_PO,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>


        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('no_LO',__('fleet.pick_no_LO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_LO',$data->no_LO,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('customers_id',__('fleet.pick_customers'), ['class' => 'form-label']) !!}
                    {!! Form::text('customers_id',$data->customers->name,['class'=>'form-control','required','readonly']) !!}
                    <input type="hidden" id="customers_id_hide" name="customers_id_hide" >
            </div>
        </div> 


        <div class="col-md-6">
          <div class="form-group">
                {!! Form::label('customer_location_id',__('fleet.pick_address'), ['class' => 'form-label']) !!}
                {!! Form::text('customer_location_id',$data->customerslocation->address,['class'=>'form-control','required','readonly']) !!}
                <input type="hidden" id="customer_location_id_hide" name="customer_location_id_hide" >
            </div>
        </div> 


        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('qty_order',__('fleet.pick_qty_order'), ['class' => 'form-label']) !!}
                    {!! Form::text('qty_order',$data->qty_order,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>
        
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('product_id',__('fleet.pick_product'), ['class' => 'form-label']) !!}
                    {!! Form::text('product_id',$data->product->name,['class'=>'form-control','required','readonly']) !!}
                    <input type="hidden" id="product_id_hide" name="product_id_hide" >
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('planning_at',__('fleet.pick_planning_at'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('planning_at', $data->planning_at,['class' => 'form-control','required','autocomplete' => 'off']) !!}
                  </div>
              </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('warehouse', __('fleet.pick_warehouse'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                  <select id="warehouse_id" name="warehouse_id" class="form-control" >
                  <option value="">--- Select warehouse ---</option>
                    @foreach($warehouse as $wh)
                    {{-- <option value="{{$warehouse->id}}">{{$warehouse->name}}</option> --}}
                    {{-- <option value="{{$team['group_id']}}"  {{ $selectedvalue == $team['group_id'] ? 'selected="selected"' : '' }}>{{$team['comic_group_name']}}</option> --}}
                    {{-- <option value="{{$wh->id}}"  {{ $wh->id == $data->warehouse_id ? 'selected="selected"' : '' }}> {{$data->warehouse->name}}</option> --}}
                    <option value="{{$wh->id}}" @if($wh->id == $data->warehouse_id) selected @endif> {{$wh->name}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>  

    
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('depo_id', __('fleet.pick_depo'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="depo_id" name="depo_id" class="form-control" required id="type_id">
                 <option value="">--- Select depo ---</option>
                   @foreach($depo as $depo)
                    <option value="{{$depo->id}}" @if($depo->id == $data->depo_id) selected @endif> {{$data->depo->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('driver', __('fleet.pick_driver'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="drivers_id" name="drivers_id" class="form-control" required id="type_id">
                 <option value="">--- Select Driver ---</option>
                   @foreach($drivers as $drivers)
                    <option value="{{$drivers->id}}" @if($drivers->id == $data->drivers_id) selected @endif> {{$data->drivers->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div> 
  
            <div class="col-md-6">
                  <div class="form-group">
                        {!! Form::label('truck', __('fleet.pick_door'), ['class' => 'col-xs-5 control-label']) !!}
                        <select id="trucks_id"
                                class="selectpicker form-control"
                                name="door_number">
                                <option value="">--- Select Truck ---</option>
                                  @foreach($door_number as $trucks)
                                  <option value="{{$trucks->id}}" @if($trucks->door_number == $data->door_number) selected @endif> {{$data->trucks->door_number}}</option>
                                  @endforeach
                        </select>
                  </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('transporter', __('fleet.pick_transporter'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="transporter_id" name="transporter_id" class="form-control" required id="type_id">
                 <option value="">--- Select Transporter ---</option>
                   @foreach($transporter as $transporter)
                    <option value="{{$transporter->id}}" @if($transporter->id == $data->transporter_id) selected @endif> {{$data->transporter->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('trailers', __('fleet.pick_trailers'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="trailers_id" name="trailers_id" class="form-control" required id="type_id">
                 <option value="">--- Select Trailers ---</option>
                   @foreach($trailers as $trailers)
                    <option value="{{$trailers->id}}" @if($trailers->id == $data->trailers_id) selected @endif> {{$data->trailers->brand}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div> 

            
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('license_plate',__('fleet.pick_license_plate'), ['class' => 'form-label']) !!}
                    {!! Form::text('license_plate',$data->license_plate,['class'=>'form-control','required']) !!}
              </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('compartement',__('fleet.pick_compartement'), ['class' => 'form-label']) !!}
                    {!! Form::number('compartement',$data->compartement,['class'=>'form-control','required']) !!}
                </div>
            </div> 

         
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('statuspickup',__('fleet.pick_statuspickup'), ['class' => 'form-label']) !!}
                {!! Form::select('statuspickup',["Pending"=>"Pending", "Processing"=>"Processing", "Completed"=>"Completed"],$data->statuspickup,['class' => 'form-control','required']) !!}
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('note',__('fleet.pick_note'), ['class' => 'form-label']) !!}
                {!! Form::textarea('note',$data->note,['class'=>'form-control','size'=>'30x4']) !!}
              </div>
            </div>

        <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('start_loading',__('fleet.pick_start_loading'), ['class' => 'col-xs-5 control-label required']) !!}
                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  {!! Form::text('start_loading',  $data->start_loading,['class' => 'form-control','required','autocomplete' => 'off']) !!}
                  </div>
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('stop_loading',__('fleet.pick_stop_loading'), ['class' => 'col-xs-5 control-label required']) !!}
                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  {!! Form::text('stop_loading', $data->stop_loading,['class' => 'form-control','required','autocomplete' => 'off']) !!}
                  </div>
              </div>
            </div>
      
           
        <!-- <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('start_loading',__('fleet.pick_start_loading'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('start_loading', $data->start_loading,['class' => 'form-control','required']) !!}
                  </div>
              </div>
            </div> -->

            <!-- <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('stop_loading',__('fleet.pick_stop_loading'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('stop_loading', $data->stop_loading,['class' => 'form-control','required']) !!}
                  </div>
              </div>
            </div> -->

            <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('STATUS', __('fleet.pick_status'), ['class' => 'col-xs-5 control-label']) !!}
                  </div>
                    <div class="col-ms-6" style="margin-left">
                     <label class="switch">
                      <input type="checkbox" name="chkstatus" id="chkstatus" {{ ($data->status == 1 ? ' checked' : '') }}  >
                        <span class="slider round"></span>
                      </label>
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


<!-- {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

  
    jQuery(document).ready(function ()
    {
            jQuery('select[name="customers_id"]').on('change',function(){
               var customers_id = jQuery(this).val();
               if(customers_id)
               { alert ('Masuk');
                  jQuery.ajax({
                     url : 'edit/',
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="customer_location_id"]').empty();
                        jQuery.each(data, function(key,value){
                            alert ('Masuk lagi');
                           $('select[name="customer_location_id"]').append('<option value="'+ value.id +'">'+value.address +'</option>');
                        });
                     }
                  });
               }
               else
               {  alert('masuk else');
                  $('select[name="address"]').empty();
               }
            });
    });
    </script> --}} -->

@section("script")
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/js/datetimepicker.js') }}"></script>
<script type="text/javascript">

  
$('#orderplan_id').select2({placeholder: "@lang('fleet.selectSO')"});
  $('#warehouse_id').select2({placeholder: "@lang('fleet.selectwarehouse')"});
  $('#depo_id').select2({placeholder: "@lang('fleet.selectdepo')"});
  $('#drivers_id').select2({placeholder: "@lang('fleet.selectDriver')"});  
  $('#trucks_id').select2({placeholder: "@lang('fleet.selecttruck')"});
  $('#transporter_id').select2({placeholder: "@lang('fleet.selecttransporter')"});
  $('#trailers_id').select2({placeholder: "@lang('fleet.selecttrailer')"});


  $("#customers_id_hide").val({{ $data->customers_id }});
  $("#customer_location_id_hide").val({{ $data->customer_location_id }});
  $("#product_id_hide").val({{ $data->product_id }});


  function get_order(id){
    $.ajax({
      type: "POST",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "{{url('admin/pickup_bytransport/get_orderSO')}}",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#no_PO").val(data.no_PO);
        $("#no_LO").val(data.no_LO);
        $("#customers_id").val(data.customers_id.name);
        $("#customers_id_hide").val(data.customers_id.id);
        $("#customer_location_id").val(data.customer_location_id.address);
        $("#customer_location_id_hide").val(data.customer_location_id.id);
        $("#qty_order").val(data.qty_order);
        $("#product_id").val(data.product_id.name);
        $("#product_id_hide").val(data.product_id.id);
        $("#depo_id").val(data.depo_id.id).change();
        if(data.no_PO != ""){
          new PNotify({
            title: 'Success!',
            text: "NO SO Terdaftar",
            type: 'success'
          });
        }
      },
      error: function(data){
        var errors = $.parseJSON(data.responseText);
        console.log(errors);
      },      
      dataType: "json"
    });
  }


$(document).ready(function() {

  
  $("#orderplan_id").on("change",function(){
     

     var id=$(this).find(":selected").data("id"); 
     // $("#driver_id").val(driver).change();
     get_order(id);
    
   });
  

  $('#planning_at').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
  $('#start_loading').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});    

  $('#stop_loading').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});     
        
  // $('#start_loading').datepicker({
  //         autoclose: true,
  //         format: 'yyyy-mm-dd'
  //       });
  // $('#stop_loading').datepicker({
  //         autoclose: true,
  //         format: 'yyyy-mm-dd'
  //       });

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


});
</script>
@endsection