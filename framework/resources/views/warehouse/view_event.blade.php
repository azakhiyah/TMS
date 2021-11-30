
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
					<th>@lang('fleet.wh_name')</th>
					<td>
						{{$warehouse->name}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_address')</th>
					<td>
						{{$warehouse->address}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_city')</th>
					<td>
						{{$warehouse->city}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_province')</th>
					<td>
						{{$warehouse->province}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_postal_code')</th>
					<td>
						{{$warehouse->postal_code}}
					</td>
				</tr>

			

				<tr>
					<th>@lang('fleet.wh_country')</th>
					<td>
						{{$$warehouse->country}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_longitude')</th>
					<td>
						{{$$warehouse->longitude}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_latitude')</th>
					<td>
						{{$warehouse->latitude}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_phone')</th>
					<td>
						{{$warehouse->phone}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_email_WH')</th>
					<td>
						{{$$warehouse->email_WH}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.wh_note')</th>
					<td>
						{{$warehouse->note}}
					</td>
				</tr>

			</table>
		</div>
		<!--tab1-->
	</div>
</div>