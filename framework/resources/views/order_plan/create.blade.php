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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item">{{ link_to_route('order_plan.index', __('fleet.op'))}}</li>
<li class="breadcrumb-item active">@lang('fleet.op_add')</li>

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.op_add')</h3>
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
        
      {!! Form::open(['route' => 'order_plan.store','method'=>'post','files'=>true]) !!}

 

      <div class="blank"></div>
      <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('No SO', __('fleet.op_no_SO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_SO', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('No PO', __('fleet.op_no_PO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_PO', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('No LO', __('fleet.op_no_LO'), ['class' => 'form-label']) !!}
                    {!! Form::text('no_LO', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        
        <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('customers_id', __('fleet.op_customers'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <!--<select name="customers" class="form-control">
                 <option value="">--- Select Customers ---</option>-->
                    <!--@foreach ($name as $key =>$value)
                   <option value="{{($key)}}">{{ $value }}</option>
                    @endforeach-->
                  <!--@foreach($name as $customers)
                    <option value="{{$customers->id}}" data-id="{{$customers->id}}">{{$customers->name}}</option>
                   @endforeach-->
                   <select id="customers_id"
                            class="selectpicker form-control"
                            name="customers_id">
                            <option value="">--- Select Customers ---</option>
                            @foreach ($name as $customers)
                            <option value="{{$customers->id}}">{{$customers->name}}</option>
                            @endforeach
                 </select>
                 @error('customers_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
                   <option value="">--- Select Address ---</option>
                   </select>
                  <!--<@foreach($address as $customerlocation)
                    <option value="{{$customerlocation->customers_id==$customers->id}}">{{$customerlocation->address}}</option>
                   @endforeach
                   <select id="customers_id"
                                    class="form-control @error ('indikator_id') is-invalid @enderror"
                                    name="customerlocation_id[]">
                                    <option selected disabled>--- Select Address ---</option>
                                    @foreach ($address as $customerslocation)
                                    <option value="{{ $customers->id }}">{{$customerslocation->address}}</option>
                                    @endforeach
                 </select>
                 @error('customer_location_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror -->
                </div>
              </div>
            </div>  
         
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('depo_id', __('fleet.op_depo'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="depo_id" name="depo_id" class="form-control" required id="type_id">
                 <option value="">--- Select Depo ---</option>
                   @foreach($depo as $depo)
                    <option value="{{$depo->id}}">{{$depo->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('product_id', __('fleet.op_product'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select id="product_id" name="product_id" class="form-control" required id="type_id">
                 <option value="">--- Select Product ---</option>
                   @foreach($product as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div>  

            <div class="col-md-6">
              <div class="form-group">
                    {!! Form::label('qty_order', __('fleet.op_qty_order'), ['class' => 'form-label']) !!}
                    {!! Form::text('qty_order', null,['class' => 'form-control','required']) !!}
              </div>
        </div>

        <div class="col-md-6">
              <div class="form-group">
                     {!! Form::label('attachment', __('fleet.op_attachment'), ['class' => 'form-label']) !!}
                <div class="col-ms-6" style="margin-left">
                     {!! Form::file('attachment',null,['class' => 'form-control']) !!}
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


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>																					
<script type="text/javascript">


    jQuery(document).ready(function ()
    {
            jQuery('select[name="customers_id"]').on('change',function(){
               var customers_id = jQuery(this).val();
               if(customers_id)
               { alert ('Masuk');
                  jQuery.ajax({
                     url : 'create/' +customers_id,
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

{{-- <script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>		 --}}


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
     
      $('#customers_id').select2({placeholder: "@lang('fleet.customers_select')"});
      $('#customer_location_id').select2({placeholder: "@lang('fleet.clocation_select')"});
      $('#depo_id').select2({placeholder: "@lang('fleet.depo_select')"});
      $('#product_id').select2({placeholder: "@lang('fleet.product_select')"});

      $("#customers_id").on("change",function(){

        var id=$(this).find(":selected").val();
        get_cust_location(id);

        });

      $('#lic_exp_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#tax_exp_date').datepicker({
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
      $('#gatepass_rls_date').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
      $('#gatepass_exp_date').datepicker({
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
