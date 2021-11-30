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
					<th>@lang('fleet.do_no_PO')</th>
					<td>{{$delivery->no_PO}}</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_no_SO')</th>
					<td>
						{{$delivery->no_SO}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_no_LO')</th>
					<td>
						{{$delivery->no_LO}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.do_customers')</th>
					<td>
					   {{$delivery->customers['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_customer_location')</th>
					<td>
						{{$delivery->customerslocation['address']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_qty_order')</th>
					<td>
						{{$delivery->qty_order}} litre
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_qty_delivery')</th>
					<td>
						{{$delivery->qty_delivery}} litre
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_statusdelivery')</th>
					<td>
						{{$delivery->statusdelivery}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_date_delivery')</th>
					<td>
						{{$delivery->date_delivery}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_actual_delivery')</th>
					<td>
						{{$delivery->actual_delivery}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_product')</th>
					<td>
						{{$delivery->product['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_warehouse')</th>
					<td>
						{{$delivery->warehouse['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_depo')</th>
					<td>
						{{$delivery->depo['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_driver')</th>
					<td>
						{{$delivery->drivers['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_door_number')</th>
					<td>
						{{$delivery->trucks['door_number']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_license_plate')</th>
					<td>
						{{$delivery->trucks['license_plate']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_transporter')</th>
					<td>
						{{$delivery->transporter['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.do_trailers')</th>
					<td>
						{{$delivery->trailers['brand']}}
					</td>
				</tr>

				
				
				<tr>
					<th>@lang('fleet.do_attach1')</th>
					<td>
						{{$delivery->attachment1}}
					</td>
				</tr> 



				
			</table>
		</div>
		<!--tab1-->

	</div>
</div>