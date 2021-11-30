
<div role="tabpanel">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="#info-tab" data-toggle="tab" class="nav-link custom_padding active"> @lang('fleet.general_info') <i class="fa"></i></a>
        </li>

    </ul>

	<div class="tab-content">
		<!-- tab1-->
		<div class="tab-pane active" id="info-tab">
			<table class="table table-striped">
				<!-- <tr>
					<th>@lang('fleet.trucks_make')</th>
					<td>{{$trucks->make}}</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_model')</th>
					<td>
						{{$trucks->model}}
					</td>
				</tr> -->

				<tr>
					<th>@lang('fleet.trucks_type')</th>
					<td>
						{{$trucks->types['displayname']}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_year')</th>
					<td>
						{{$trucks->year}}
					</td>
				</tr>
<!--
                <tr>
					<th>@lang('fleet.trucks_image')</th>
					<td>
						@if($trucks->trucks_image != null)
			            <a href="{{ asset('uploads/'.$trucks->trucks_image) }}" target="_blank" class="col-xs-3 control-label">View</a>
			            @endif
					</td>
				</tr>
-->

				<tr>
					<th>@lang('fleet.trucks_vin')</th>
					<td>
						{{$trucks->vin}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_machine_number')</th>
					<td>
						{{$trucks->machine_number}}
					</td>
				</tr>

				
				<tr>
					<th>@lang('fleet.trucks_license_plate')</th>
					<td>
						{{$trucks->license_plate}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_lic_exp_date')</th>
					<td>
                        @if($trucks->lic_exp_date)
						{{date(Hyvikk::get('date_format'),strtotime($trucks->lic_exp_date))}}
						@endif
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_tax_number')</th>
					<td>
						{{$trucks->tax_number}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_tax_exp_date')</th>
					<td>
						{{$trucks->tax_exp_date}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_kir')</th>
					<td>
						{{$trucks->kir}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_tera_sertifikat')</th>
					<td>
						{{$trucks->tera_sertifikat}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_tera_rls_date')</th>
					<td>
						@if($trucks->tera_rls_date)
						{{date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))}}
						@endif
					</td>
				</tr>

                <tr>
					<th>@lang('fleet.trucks_tera_exp_date')</th>
					<td>
						@if($trucks->tera_exp_date)
						{{date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))}}
						@endif
					</td>
				</tr>

                <tr>
					<th>@lang('fleet.trucks_gate_pass')</th>
					<td>
						{{$trucks->gate_pass}}
					</td>
				</tr>

				

                <tr>
					<th>@lang('fleet.trucks_gatepass_rls_date')</th>
					<td>
						@if($trucks->gatepass_rls_date)
						{{date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))}}
						@endif
					</td>
				</tr>

                <tr>
					<th>@lang('fleet.trucks_gatepass_exp_date')</th>
					<td>
						@if($trucks->gatepass_exp_date)
						{{date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))}}
						@endif
					</td>
				</tr>

                <tr>
					<th>@lang('fleet.trucks_door_number')</th>
					<td>
						{{$trucks->door_number}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trucks_flowmeter')</th>
					<td>
						{{$trucks->flowmeter}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.trucks_owner_type')</th>
					<td>
						{{$trucks->owner_type}}
					</td>
				</tr>


				
			</table>
		</div>
		<!--tab1-->

	</div>
</div>