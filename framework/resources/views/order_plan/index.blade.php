@extends('layouts.app')

@section('extra_css')
<style type="text/css">
  .modal-open {margin-left: -250px}
  .custom_padding{
    padding: .3rem !important;
  }
  .checkbox, #chk_all{
    width: 20px;
    height: 20px;
  }
</style>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item active">@lang('fleet.op')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">@lang('fleet.op') &nbsp;<a href="{{ route('order_plan.create')}}" class="btn btn-success">@lang('fleet.op_add')</a>
        <button data-toggle="modal" data-target="#import" class="btn btn-warning">@lang('fleet.import')</button>
        </h3>
      </div>

      <div class="card-body table-responsive">
        <table class="table" id="data_table" style="padding-bottom: 25px">
          <thead class="thead-inverse">
            <tr>
              <th>
                @if($data->count() > 0)
                <input type="checkbox" id="chk_all">
                @endif
              </th>
              <th>@lang('fleet.op_no_SO')</th>
              <th>@lang('fleet.op_no_PO')</th>
              <th>@lang('fleet.op_no_LO')</th>
              <th>@lang('fleet.op_customers')</th>
              {{-- <th>@lang('fleet.op_address')</th> --}}
              <th>@lang('fleet.op_depo')</th>
              <th>@lang('fleet.op_product')</th>
              <th>@lang('fleet.op_qty_order')</th>
              <th>@lang('fleet.op_attachment')</th>
              <th>@lang('fleet.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
            <tr>
              <td>
                <input type="checkbox" name="ids[]" value="{{ $row->id }}" class="checkbox" id="chk{{ $row->id }}" onclick='checkcheckbox();'>
              </td>
              <td>{{$row->no_SO}}</td>
              <td>{{$row->no_PO}}</td>
              <td>{{$row->no_LO}}</td>
              <td>@if($row->customers_id){{$row->customers->name}}@endif</td>
              {{-- <td>@if($row->customer_location_id){{$row->customerslocation->address}}@endif</td> --}}
              <td>@if($row->depo_id){{$row->depo->name}}@endif</td>
              <td>@if($row->product_id){{$row->product->name}}@endif</td>
              <td>{{$row->qty_order}}</td>
              <td>{{$row->attachment}}</td>
              <td>
              <div class="btn-group">
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
              <span class="fa fa-gear"></span>
              <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu custom" role="menu">
              <a class="dropdown-item" href="{{url("admin/order_plan/".$row->id."/edit") }}"> <span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> @lang('fleet.edit')</a>
              {!! Form::hidden("id",$row->id) !!}

              <a class="dropdown-item" data-id="{{$row->id}}" data-toggle="modal" data-target="#myModal"> <span aria-hidden="true" class="fa fa-trash" style="color: #dd4b39"></span> @lang('fleet.delete')</a>
              <a class="dropdown-item openBtn" data-id="{{$row->id}}" data-toggle="modal" data-target="#myModal2" id="openBtn">
                    <span class="fa fa-eye" aria-hidden="true" style="color: #398439"></span> @lang('fleet.op_view')
                    </a>
              </div>
              </div>
              {!! Form::open(['url' => 'admin/order_plan/'.$row->id,'method'=>'DELETE','class'=>'form-horizontal','id'=>'form_'.$row->id]) !!}

              {!! Form::hidden("id",$row->id) !!}

              {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>
                @if($data->count() > 0)
                  <button class="btn btn-danger" id="bulk_delete" data-toggle="modal" data-target="#bulkModal" disabled>@lang('fleet.delete')</button>
                @endif
              </th>
              <th>@lang('fleet.op_no_SO')</th>
              <th>@lang('fleet.op_no_PO')</th>
              <th>@lang('fleet.op_no_LO')</th>
              <th>@lang('fleet.op_customers')</th>
              {{-- <th>@lang('fleet.op_address')</th> --}}
              <th>@lang('fleet.op_depo')</th>
              <th>@lang('fleet.op_product')</th>
              <th>@lang('fleet.op_qty_order')</th>
              <th>@lang('fleet.op_attachment')</th>
              <th>@lang('fleet.action')</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="bulkModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('fleet.delete')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>'admin/delete-order_plan','method'=>'POST','id'=>'form_delete']) !!}
        <div id="bulk_hidden"></div>
        <p>@lang('fleet.confirm_bulk_delete')</p>
      </div>
      <div class="modal-footer">
        <button id="bulk_action" class="btn btn-danger" type="submit" data-submit="">@lang('fleet.delete')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('fleet.delete')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>@lang('fleet.confirm_delete')</p>
      </div>
      <div class="modal-footer">
        <button id="del_btn" class="btn btn-danger" type="button" data-submit="">@lang('fleet.delete')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('fleet.close')</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!--model 2 -->
<div id="myModal2" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('fleet.op')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          @lang('fleet.close')
        </button>
      </div>
    </div>
  </div>
</div>
<!--model 2 -->
@endsection

@section('script')
<script type="text/javascript">
  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#form_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });
  $('.openBtn').click(function(){
    // alert($(this).data("id"));
    var id = $(this).attr("data-id");
    $('#myModal2 .modal-body').load('{{ url("admin/order_plan/event")}}/'+id,function(result){
      $('#myModal2').modal({show:true});
    });
  });

  $('input[type="checkbox"]').on('click',function(){
    $('#bulk_delete').removeAttr('disabled');
  });

  $('#bulk_delete').on('click',function(){
    // console.log($( "input[name='ids[]']:checked" ).length);
    if($( "input[name='ids[]']:checked" ).length == 0){
      $('#bulk_delete').prop('type','button');
        new PNotify({
            title: 'Failed!',
            text: "@lang('fleet.delete_error')",
            type: 'error'
          });
        $('#bulk_delete').attr('disabled',true);
    }
    if($("input[name='ids[]']:checked").length > 0){
      // var favorite = [];
      $.each($("input[name='ids[]']:checked"), function(){
          // favorite.push($(this).val());
          $("#bulk_hidden").append('<input type=hidden name=ids[] value='+$(this).val()+'>');
      });
      // console.log(favorite);
    }
  });


  $('#chk_all').on('click',function(){
    if(this.checked){
      $('.checkbox').each(function(){
        $('.checkbox').prop("checked",true);
      });
    }else{
      $('.checkbox').each(function(){
        $('.checkbox').prop("checked",false);
      });
    }
  });

  // Checkbox checked
  function checkcheckbox(){
    // Total checkboxes
    var length = $('.checkbox').length;
    // Total checked checkboxes
    var totalchecked = 0;
    $('.checkbox').each(function(){
        if($(this).is(':checked')){
            totalchecked+=1;
        }
    });
    // console.log(length+" "+totalchecked);
    // Checked unchecked checkbox
    if(totalchecked == length){
        $("#chk_all").prop('checked', true);
    }else{
        $('#chk_all').prop('checked', false);
    }
  }
</script>

@endsection