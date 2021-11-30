@extends('layouts.app')
@section('extra_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("order_plan.index")}}">@lang('fleet.op')</a></li>
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
        <h3 class="card-title">@lang('fleet.op_edit')</h3>
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
            {!! Form::open(['route' =>['order_plan.update',$data->id],'files'=>true, 'method'=>'PATCH','class'=>'form-horizontal','id'=>'accountForm1']) !!}
            {!! Form::hidden('user_id',Auth::user()->id) !!}
            {!! Form::hidden('id',$data->id) !!}
            

      <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('No SO', __('fleet.op_no_SO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_SO', $data->no_SO,['class' => 'form-control','required']) !!}
                   
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('No PO', __('fleet.op_no_PO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_PO', $data->no_PO,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('No LO', __('fleet.op_no_LO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_LO', $data->no_LO,['class' => 'form-control','required']) !!}
              </div>
        </div>

        
        
        <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('customers_id', __('fleet.op_customers'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                   <select id="customers_id"
                            class="selectpicker form-control"
                            name="customers_id">
                            <option selected disabled>--- Select Customers ---</option>
                            @foreach ($name as $customers)
                            <option value="{{$customers->id}}"@if($data->customers_id == $customers->id) selected @endif>{{$customers->name}}</option>
                            @endforeach
                 </select>
                </div>
              </div>
            </div>  


            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('customer_location_id', __('fleet.op_customer_location'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id = "customer_location_id" 
                          name="customer_location_id" 
                          class="form-control">
                   <option selected disabled>--- Select Address ---</option>
                   <@foreach ($address as $customerslocation)
                   {{-- <option value="{{$customerslocation->id}}"@if($data->customers_location_id == $customerslocation->id) selected @endif>{{$customerslocation->address}}</option> --}}
                   <option value="{{$customerslocation->id}}"@if($customerslocation->id == $data->customer_location_id) selected @endif>{{$customerslocation->address}}</option>
               
                   @endforeach
                   </select>
                </div>
              </div>
            </div>  
         
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('depo_id', __('fleet.op_depo'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="depo_id" name="depo_id" class="form-control" required id="type_id2">
                   @foreach($depo as $depo)
                    <option value="{{$depo->id}}"@if($data->depo_id == $depo->id) selected @endif>{{$depo->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('product_id', __('fleet.op_product'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="product_id" name="product_id" class="form-control" required id="type_id">>
                   @foreach($product as $product)
                    <option value="{{$product->id}}"@if($data->product_id == $product->id) selected @endif>{{$product->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('qty_order', __('fleet.op_qty_order'), ['class' => 'form-label']) !!}
                    {!! Form::text('qty_order', $data->qty_order,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                     {!! Form::label('attachment', __('fleet.op_attachment'), ['class' => 'form-label']) !!}
                <div class="col-ms-6" style="margin-left">
                     {!! Form::file('attachment',$data->attachment,['class' => 'form-control']) !!}
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


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
    </script> --}}

@section("script")
<script src="{{ asset('assets/js/moment.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">

function get_cust_location(id){

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $.ajax({
      type: "POST",
      url: "{{url('admin/get_address')}}",
      data: "id="+id,
      success: function(data){
        console.log(data);
        $("#customer_location_id").empty();
        // $("#customer_location_id").select2({placeholder: "@lang('fleet.op_customer_location')",data:data2.data});
        jQuery.each(data, function(key,value){
                          
              $('select[name="customer_location_id"]').append('<option value="'+ value.id +'">'+value.address +'</option>');
            });

            $('#mySelect2').find(':selected');
        
      },
      error: function(data){
        var errors = $.parseJSON(data.responseText);
        console.log(errors);
        // $(".print-error-msg").find("ul").html('');
        // $(".print-error-msg").css('display','block');
        // $.each( errors, function( key, value ) {
        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      },
      dataType: "json"
    });
  }


$(document).ready(function() {
  
  $('#customers_id').select2({placeholder: "@lang('fleet.customers_select')"});
  $('#customer_location_id').select2({placeholder: "@lang('fleet.clocation_select')"});
  $('#depo_id').select2({placeholder: "@lang('fleet.depo_select')"});
  $('#product_id').select2({placeholder: "@lang('fleet.product_select')"});

    $("#customers_id").on("change",function(){

      var id=$(this).find(":selected").val();
      get_cust_location(id);
     
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


});
</script>
@endsection