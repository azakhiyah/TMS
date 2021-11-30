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
					<th>@lang('fleet.pick_no_PO')</th>
					<td>{{$pickup->no_PO}}</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_no_SO')</th>
					<td>
						{{$pickup->no_SO}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_no_LO')</th>
					<td>
						{{$pickup->no_LO}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.pick_customers')</th>
					<td>
					   {{$pickup->customers['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_address')</th>
					<td>
						{{$pickup->customerslocation['address']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_depo')</th>
					<td>
						{{$pickup->depo['name']}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.pick_product')</th>
					<td>
						{{$pickup->product['name']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_qty_order_ltr')</th>
					<td>
						{{$pickup->qty_order}} litre
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.pick_warehouse')</th>
					<td>
						{{$pickup->warehouse->name}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_driver')</th>
					<td>
						{{$pickup->drivers->name}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_door')</th>
					<td>
						{{$pickup->door_number}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_transporter')</th>
					<td>
						{{$pickup->transporter->name}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_trailers')</th>
					<td>
						{{$pickup->trailers->brand}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_license_plate')</th>
					<td>
						{{$pickup->license_plate}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_status')</th>
					<td>
						{{$pickup->status == 1 ? "OPEN" : "CLOSE"}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_compartement')</th>
					<td>
						{{$pickup->compartement}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_planning_at')</th>
					<td>
						{{$pickup->planning_at}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_start_loading')</th>
					<td>
						{{$pickup->start_loading}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.pick_stop_loading')</th>
					<td>
						{{$pickup->stop_loading}}
					</td>
				</tr>



				
			</table>
		</div>
		<!--tab1-->

	</div>
</div>