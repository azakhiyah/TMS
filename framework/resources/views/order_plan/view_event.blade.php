<div role="tabpanel">
   <ul class="nav nav-pills">
        <li class="nav-item"><a href="#info-tab" data-toggle="tab" class="nav-link custom_padding active"> @lang('fleet.general_info') <i class="fa"></i></a>
        </li>

    </ul> 


	<div class="tab-content">
		<!-- tab1-->
		<div class="tab-pane active" id="info-tab">
			<table class="table table-striped">
				<tr>
					<th>@lang('fleet.op_no_PO')</th>
					<td>{{$orderplan->no_PO}}</td>
				</tr>

				<tr>
					<th>@lang('fleet.op_no_SO')</th>
					<td>
						{{$orderplan->no_SO}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.op_no_LO')</th>
					<td>
						{{$orderplan->no_LO}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.op_customers')</th>
					<td>
					   {{$orderplan->customers['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.op_customer_location')</th>
					<td>
						{{$orderplan->customerslocation['address']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.op_depo')</th>
					<td>
						{{$orderplan->depo['name']}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.op_product')</th>
					<td>
						{{$orderplan->product['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.op_qty_order')</th>
					<td>
						{{$orderplan->qty_order}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.op_attachment')</th>
					<td>
						{{$orderplan->attachment}}
					</td>
				</tr>



				
			</table>
		</div>
		<!--tab1-->

	</div>
</div>