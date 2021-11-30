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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
@endsection
@section("breadcrumb")
<li class="breadcrumb-item">{{ link_to_route('delivery_order.index', __('fleet.do'))}}</li>
<li class="breadcrumb-item active">@lang('fleet.do_add')</li>

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.do_add')</h3>
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

      {!! Form::open(['route' => 'delivery_order.store','method'=>'post','files'=>true]) !!}

 
<!-- 
      <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('no_SO', __('fleet.do_no_SO'), ['class' => 'col-xs-5 control-label']) !!}
                    <select id="orderplan_id" class="selectpicker form-control" select name="no_SO">
                            <option selected disabled>--- Select NO SO ---</option>
                            @foreach ($no_SO as $orderplan)
                            <option value="{{$orderplan->id}}" data-id="{{$orderplan->id}}">{{$orderplan->no_SO}}</option>
                            @endforeach
                 </select>
              </div>
        </div> -->

        <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('no_SO', __('fleet.do_no_SO'), ['class' => 'col-xs-5 control-label']) !!}
                    <select id="pickupbytransport_id" class="selectpicker form-control" select name="no_SO">
                            <option selected disabled>--- Select NO SO ---</option>
                            @foreach ($no_SO as $pickupbytransport)
                            <option value="{{$pickupbytransport->id}}" data-id="{{$pickupbytransport->id}}">{{$pickupbytransport->no_SO}}</option>
                            @endforeach
                 </select>
              </div>
        </div> 

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('no_PO',__('fleet.do_no_PO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_PO',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>
  

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('no_LO',__('fleet.do_no_LO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_LO',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('customers_id',__('fleet.do_customers'), ['class' => 'form-label']) !!}
                    {!! Form::text('customers_id',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>
        
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('customer_location_id',__('fleet.do_customer_location'), ['class' => 'form-label']) !!}
                    {!! Form::text('customer_location_id',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('qty_order',__('fleet.do_qty_order'), ['class' => 'form-label']) !!}
                    {!! Form::text('qty_order',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('product_id',__('fleet.do_product'), ['class' => 'form-label']) !!}
                    {!! Form::text('product_id',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('warehouse_id', __('fleet.do_warehouse'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('warehouse_id',null,['class'=>'form-control','required','readonly']) !!}
              </div>
            </div>  

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('depo_id',__('fleet.do_depo'), ['class' => 'form-label']) !!}
                    {!! Form::text('depo_id',null,['class'=>'form-control','required','readonly']) !!}
            </div>
        </div> 

      

        <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('drivers_id', __('fleet.do_driver'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('drivers_id',null,['class'=>'form-control','required','readonly']) !!}
              </div>
            </div> 

      
  
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('door_number', __('fleet.do_door'), ['class' => 'col-xs-5 control-label']) !!}
                    {!! Form::text('door_number',null,['class'=>'form-control','required','readonly']) !!}
              </div>
        </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('transporter_id', __('fleet.do_transporter'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('transporter_id',null,['class'=>'form-control','required','readonly']) !!}
              </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('trailers_id', __('fleet.do_trailers'), ['class' => 'col-xs-5 control-label']) !!}
                {!! Form::text('trailers_id',null,['class'=>'form-control','required','readonly']) !!}
              </div>
            </div> 

  
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('compartement',__('fleet.do_compartement'), ['class' => 'form-label']) !!}
                    {!! Form::number('compartement',null,['class'=>'form-control','required','readonly']) !!}
                </div>
            </div> 
          

          <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('license_plate',__('fleet.do_license_plate'), ['class' => 'form-label']) !!}
                {!! Form::text('license_plate',null,['class'=>'form-control','required', 'readonly']) !!}
          </div>
        </div> 

        <div class="col-md-6">
          <div class="form-group">
            {!! Form::label('statusdelivery',__('fleet.do_statusdelivery'), ['class' => 'form-label']) !!}
            {!! Form::select('statusdelivery',["Pending"=>"Pending", "Processing"=>"Processing", "Completed"=>"Completed"],null,['class' => 'form-control','required']) !!}
          </div>
        </div>

          <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('qty_delivery',__('fleet.do_qty_delivery'), ['class' => 'form-label']) !!}
                    {!! Form::number('qty_delivery',null,['class'=>'form-control','required']) !!}
                </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('date_delivery',__('fleet.do_date_delivery'), ['class' => 'col-xs-5 control-label required']) !!}
                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  {!! Form::text('date_delivery', null,['class' => 'form-control','required','autocomplete' => 'off']) !!}
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('actual_delivery',__('fleet.do_actual_delivery'), ['class' => 'col-xs-5 control-label required']) !!}
                <div class='input-group mb-3 date'>
                <div class="input-group-prepend">
                  <span class="input-group-text"> <span class="fa fa-calendar"></span></span>
                </div>
                  {!! Form::text('actual_delivery', null,['class' => 'form-control','required','autocomplete' => 'off']) !!}
                  </div>
              </div>
            </div>

            <!-- <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('date_delivery',__('fleet.do_date_delivery'), ['class' => 'col-xs-5 control-label required']) !!}
                  <div class="input-group date">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                  {!! Form::text('date_delivery', null,['class' => 'form-control','required','autocomplete' => 'off']) !!}
                  </div>
              </div>
            </div> -->

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('note',__('fleet.do_note'), ['class' => 'form-label']) !!}
                {!! Form::textarea('note',null,['class'=>'form-control','size'=>'30x4']) !!}
              </div>
            </div>
    

            <div class="col-md-6">
              <div class="form-group">
                     {!! Form::label('attachment1', __('fleet.do_attachment1'), ['class' => 'form-label']) !!}
                <div class="col-ms-6" style="margin-left">
                     {!! Form::file('attachment1',null,['class' => 'form-control']) !!}
                </div>
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
                     {!! Form::label('attachment2', __('fleet.do_attachment2'), ['class' => 'form-label']) !!}
                <div class="col-ms-6" style="margin-left">
                     {!! Form::file('attachment2',null,['class' => 'form-control']) !!}
                </div>
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



@section("script")
 <script src="{{ asset('assets/js/moment.js') }}"></script>
 <!-- bootstrap datepicker -->
 <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
 <script src="{{ asset('assets/js/datetimepicker.js') }}"></script>





{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script type="text/javascript">



  
  // $('#orderplan_id').select2({placeholder: "@lang('fleet.selectSO')"});
  $('#pickupbytransport_id').select2({placeholder: "@lang('fleet.selectSO')"});
  $('#trucks_id').select2({placeholder: "@lang('fleet.selectDoorNumber')"});


  function get_order(id){
    
    $.ajax({
      type: "POST",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      //url: "{{url('admin/pickup_bytransport/get_orderSO')}}",
      url: "{{url('admin/delivery_order/get_orderSO')}}",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#no_PO").val(data.no_PO);
        $("#no_LO").val(data.no_LO);
        $("#customers_id").val(data.customers.name);
        $("#customer_location_id").val(data.customer_location.address);
        $("#qty_order").val(data.qty_order);
        $("#qty_delivery").val(data.qty_order);
        $("#warehouse_id").val(data.warehouse.name);
        $("#product_id").val(data.product.name);
        $("#depo_id").val(data.depo.name);
        $("#drivers_id").val(data.drivers.name);
        $("#door_number").val(data.door_number);
        $("#trailers_id").val(data.trailers.brand);
        $("#transporter_id").val(data.transporter.name);
        $("#compartement").val(data.compartement);
        $("#license_plate").val(data.license_plate); 
        if(data.no_SO != ""){
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

  // function get_licenseplate(id){
    
  //   $.ajax({
  //     type: "POST",
  //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
  //     url: "{{url('admin/pickup_bytransport/get_plate')}}",
  //     data: "id="+id,
  //     success: function(data){
  //       console.log(data);
  //       $("#license_plate").val(data.license_plate);
  //       if(data.door_number != ""){
  //         new PNotify({
  //           title: 'Success!',
  //           text: "Trucks Terdaftar",
  //           type: 'success'
  //         });
  //       }
  //     },
  //     dataType: "json"
  //   });
  // }

  $(document).ready(function() 
{
    $("#pickupbytransport_id").on("change",function(){
     

      var id=$(this).find(":selected").data("id"); 
      // $("#driver_id").val(driver).change();
      get_order(id);
     
    });
  });





//   $(document).ready(function() 
// {
//     $("#orderplan_id").on("change",function(){
     

//       var id=$(this).find(":selected").data("id"); 
//       // $("#driver_id").val(driver).change();
//       get_order(id);
     
//     });
//   });

  
//   $(document).ready(function() 
// {
//     $("#trucks_id").on("change",function(){
     

//       var id=$(this).find(":selected").data("id"); 
//       // $("#driver_id").val(driver).change();
//       get_licenseplate(id);
     
//     });
//   });
  


  $('#date_delivery').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }}); 

  
  $('#actual_delivery').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});     

</script>


@endsection

{{-- @section("script")
<!-- <script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/datetimepicker.js') }}"></script> -->




@endsection --}}
