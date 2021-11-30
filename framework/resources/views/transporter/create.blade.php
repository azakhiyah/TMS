@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("transporter.index")}}"> @lang('fleet.transporter') </a></li>
<li class="breadcrumb-item active">@lang('fleet.transporter_add_transporter')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.transporter_add_transporter')</h3>
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


        {!! Form::open(['route' => 'transporter.store','method'=>'post']) !!}
       <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name',__('fleet.transporter_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address',__('fleet.transporter_address'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              {!! Form::text('address',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('city',__('fleet.transporter_city'), ['class' => 'form-label']) !!}
              {!! Form::text('city',null,['class'=>'form-control','required']) !!}
            </div>
          </div>
         
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('province',__('fleet.transporter_province'), ['class' => 'form-label']) !!}
              {!! Form::text('province',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('postal_code',__('fleet.transporter_postal_code'), ['class' => 'form-label']) !!}
              {!! Form::text('postal_code',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('country',__('fleet.transporter_country'), ['class' => 'form-label']) !!}
              {!! Form::text('country',null,['class'=>'form-control','required']) !!}
            </div>
          </div>
         
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.transporter_phone'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              {!! Form::number('phone',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('email_transporter',__('fleet.transporter_email_transporter'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
              {!! Form::email('email_transporter',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('note',__('fleet.transporter_note'), ['class' => 'form-label']) !!}
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
            {!! Form::submit(__('fleet.transporter_add_transporter'), ['class' => 'btn btn-success']) !!}
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