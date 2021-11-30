@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("clocation.index")}}"> @lang('fleet.clocation') </a></li>
<li class="breadcrumb-item active">@lang('fleet.clocation_add')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.clocation_add')</h3>
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


        {!! Form::open(['route' => 'clocation.store','method'=>'post']) !!}
   
     
         <div class="row">  
         
         <div class="col-md-6">
              <div class="form-group">
                {!! Form::label('customers_id', __('fleet.clocation_name'), ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-6">
                 <select name="customers_id" class="form-control" required id="type_id">
                   <option></option>
                   @foreach($name as $customers)
                    <option value="{{$customers->id}}">{{$customers->name}}</option>
                   @endforeach
                 </select>
                </div>
              </div>
            </div>  
         
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address',__('fleet.clocation_address'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              {!! Form::text('address',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('city',__('fleet.clocation_city'), ['class' => 'form-label']) !!}
              {!! Form::text('city',null,['class'=>'form-control','required']) !!}
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('province',__('fleet.clocation_province'), ['class' => 'form-label']) !!}
              {!! Form::text('province',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('postal_code',__('fleet.clocation_postal_code'), ['class' => 'form-label']) !!}
              {!! Form::text('postal_code',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('country',__('fleet.clocation_country'), ['class' => 'form-label']) !!}
              {!! Form::text('country',null,['class'=>'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('longitude',__('fleet.clocation_longitude'), ['class' => 'form-label']) !!}
              {!! Form::text('longitude',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6"> 
            <div class="form-group">
              {!! Form::label('latitude',__('fleet.clocation_latitude'), ['class' => 'form-label']) !!}
              {!! Form::text('latitude',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.clocation_phone'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              {!! Form::number('phone',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('email_customer',__('fleet.clocation_email'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
              {!! Form::email('email_customer',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('note',__('fleet.clocation_note'), ['class' => 'form-label']) !!}
              {!! Form::textarea('note',null,['class'=>'form-control','size'=>'30x4']) !!}
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
        <hr>
       
        <div class="blank"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            {!! Form::submit(__('fleet.clocation_add'), ['class' => 'btn btn-success']) !!}
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
@endsection