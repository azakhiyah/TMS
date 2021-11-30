
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
					<th>@lang('fleet.depo_name')</th>
					<td>
						{{$data->name}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_address')</th>
					<td>
						{{$data->address}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_city')</th>
					<td>
						{{$data->city}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_province')</th>
					<td>
						{{$data->province}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_postal_code')</th>
					<td>
						{{$data->postal_code}}
					</td>
				</tr>

			

				<tr>
					<th>@lang('fleet.depo_country')</th>
					<td>
						{{$$data->country}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_longitude')</th>
					<td>
						{{$$data->longitude}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_latitude')</th>
					<td>
						{{$data->latitude}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_phone')</th>
					<td>
						{{$data->phone}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_email')</th>
					<td>
						{{$$data->email_depo}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.depo_note')</th>
					<td>
						{{$data->note}}
					</td>
				</tr>

			</table>
		</div>
		<!--tab1-->
	</div>
</div>