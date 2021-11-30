@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("warehouse.index")}}">@lang('fleet.warehouse')</a></li>
<li class="breadcrumb-item active"> @lang('fleet.wh_edit_warehouse')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          @lang('fleet.wh_edit_warehouse')
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

        {!! Form::open(['route' => ['warehouse.update',$data->id],'method'=>'PATCH']) !!}
        {!! Form::hidden('id',$data->id) !!}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name', __('fleet.wh_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name', $data->name,['class' => 'form-control','required']) !!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address', __('fleet.wh_address'), ['class' => 'form-label']) !!}
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
              {!! Form::label('city', __('fleet.wh_city'), ['class' => 'form-label']) !!}
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
              {!! Form::label('province', __('fleet.wh_province'), ['class' => 'form-label']) !!}
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
              {!! Form::label('postal_code', __('fleet.wh_postal_code'), ['class' => 'form-label']) !!}
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
              {!! Form::label('country', __('fleet.wh_country'), ['class' => 'form-label']) !!}
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
              {!! Form::label('longitude', __('fleet.wh_longitude'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                {!! Form::text('longitude', $data->longitude,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('latitude', __('fleet.wh_latitude'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-city"></i></span>
                </div>
                {!! Form::text('latitude', $data->latitude,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.wh_phone'), ['class' => 'form-label']) !!}
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
              {!! Form::label('email_WH',__('fleet.wh_email_WH'), ['class' => 'form-label']) !!}
             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                {!! Form::text('email_WH', $data->email_WH,['class' => 'form-control','required']) !!}
              </div>
            </div>
        </div>
          

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('note',__('fleet.wh_note'), ['class' => 'form-label']) !!}
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