@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("depo.index")}}"> @lang('fleet.depo') </a></li>
<li class="breadcrumb-item active">@lang('fleet.depo_add')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.depo_add')</h3>
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


        {!! Form::open(['route' => 'depo.store','method'=>'post']) !!}
       <div class="row">  
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name',__('fleet.depo_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address',__('fleet.depo_address'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book-o" aria-hidden="true"></i></span></div>
              {!! Form::text('address',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('city',__('fleet.depo_city'), ['class' => 'form-label']) !!}
              {!! Form::text('city',null,['class'=>'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('province',__('fleet.depo_province'), ['class' => 'form-label']) !!}
              {!! Form::text('province',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('postal_code',__('fleet.depo_postal_code'), ['class' => 'form-label']) !!}
              {!! Form::text('postal_code',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('country',__('fleet.depo_country'), ['class' => 'form-label']) !!}
              {!! Form::text('country',null,['class'=>'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('longitude',__('fleet.depo_longitude'), ['class' => 'form-label']) !!}
              {!! Form::text('longitude',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6"> 
            <div class="form-group">
              {!! Form::label('latitude',__('fleet.depo_latitude'), ['class' => 'form-label']) !!}
              {!! Form::text('latitude',null,['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.depo_phone'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-phone"></i></span></div>
              {!! Form::number('phone',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('email_depo',__('fleet.depo_email'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
              {!! Form::email('email_depo',null,['class'=>'form-control','required']) !!}
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('note',__('fleet.depo_note'), ['class' => 'form-label']) !!}
              {!! Form::textarea('note',null,['class'=>'form-control','size'=>'30x4']) !!}
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
                {!! Form::submit(__('fleet.depo_add'), ['class' => 'btn btn-success']) !!}
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