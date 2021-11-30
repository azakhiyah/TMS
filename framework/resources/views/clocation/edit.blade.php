@extends('layouts.app')
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("clocation.index")}}">@lang('fleet.clocation')</a></li>
<li class="breadcrumb-item active"> @lang('fleet.clocation_edit')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">
          @lang('fleet.clocation_edit')
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

        {!! Form::open(['route' => ['clocation.update',$data->id],'method'=>'PATCH']) !!}
        {!! Form::hidden('id',$data->id) !!}
        <div class="row">
        <div class="col-md-6">
              <div class="form-group">
                  {!! Form::label('name', __('fleet.clocation_name'), ['class' => 'col-xs-5 control-label']) !!}
                  <div class="col-xs-6">
                    <select name="customers_id" class="form-control" required id="customers_id">
                      <option></option>
                      @foreach($name as $customers)
                      <option value="{{$customers->id}}" @if($customers->id ==$data->customers_id) selected @endif>{{$customers->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                </div>
        <!--<div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('name', __('fleet.clocation_name'), ['class' => 'form-label']) !!}
              {!! Form::text('name', $data->name,['class' => 'form-control','required']) !!}
            </div>
          </div>-->

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('address', __('fleet.clocation_address'), ['class' => 'form-label']) !!}
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
              {!! Form::label('city', __('fleet.clocation_city'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('city', $data->city,['class' => 'form-control','required']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('province', __('fleet.clocation_province'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('province', $data->province,['class' => 'form-control','required']) !!}       
            </div>
          </div>
        </div>
          
        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('postal_code', __('fleet.clocation_postal_code'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('postal_code', $data->postal_code,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>
         
        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('country', __('fleet.clocation_country'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('country', $data->country,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('longitude', __('fleet.clocation_longitude'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('longitude', $data->longitude,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('latitude', __('fleet.clocation_latitude'), ['class' => 'form-label']) !!}
              <div class="input-group mb-3">
                {!! Form::text('latitude', $data->latitude,['class' => 'form-control','required']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('phone',__('fleet.clocation_phone'), ['class' => 'form-label']) !!}
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
              {!! Form::label('email_customer',__('fleet.clocation_email'), ['class' => 'form-label']) !!}
             <div class="input-group mb-3">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                {!! Form::text('email_customer', $data->email_customer,['class' => 'form-control','required']) !!}
              </div>
            </div>
        </div>
          

        <div class="col-md-6">
          <div class="form-group">
              {!! Form::label('note',__('fleet.clocation_note'), ['class' => 'form-label']) !!}
             <div class="input-group mb-3">
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