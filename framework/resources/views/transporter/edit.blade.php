@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("transporter.index")}}">@lang('fleet.transporter')</a></li>
<li class="breadcrumb-item active"> @lang('fleet.transporter_edit_transporter')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          @lang('fleet.transporter_edit_transporter')
        </h3>
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

        {!! Form::open(['route' => ['transporter.update',$data->id],'method'=>'PATCH']) !!}
        {!! Form::hidden('id',$data->id) !!}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name', __('fleet.transporter_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name', $data->name,['class' => 'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address', __('fleet.transporter_address'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-address-book-o"></i></span>
                </div>
                {!! Form::textarea('address', $data->address,['class' => 'form-control','size'=>'30x2']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('city', __('fleet.transporter_city'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                {!! Form::text('city', $data->city,['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('province', __('fleet.transporter_province'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                {!! Form::text('province', $data->province,['class' => 'form-control','required']) !!}       
            </div>
          </div>
        </div>
          
        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('postal_code', __('fleet.transporter_postal_code'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                {!! Form::text('postal_code', $data->postal_code,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
         
        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('country', __('fleet.transporter_country'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                {!! Form::text('country', $data->country,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.transporter_phone'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                {!! Form::text('phone', $data->phone,['class' => 'form-control','required']) !!}
              </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('email_transporter',__('fleet.transporter_email_transporter'), ['class' => 'form-label']) !!}
             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                {!! Form::text('email_transporter', $data->email_transporter,['class' => 'form-control','required']) !!}
              </div>
            </div>
        </div>
          

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('note',__('fleet.transporter_note'), ['class' => 'form-label']) !!}
             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                {!! Form::text('note', $data->note,['class' => 'form-control','required']) !!}
              </div>
            </div>
        </div>

         
        </div>
        <div class="col-md-12">
          {!! Form::submit(__('fleet.update'), ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
</script>
@endsection