
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
					<th>@lang('fleet.trailers_brand')</th>
					<td>
						{{$trailers->brand}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_type')</th>
					<td>
						{{$trailers->type}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.unit_maker')</th>
					<td>
						{{$trailers->unit_maker}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_licensePlate')</th>
					<td>
						{{$trailers->license_plate}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_tag_id)</th>
					<td>
						{{$trailers->tag_id}}
					</td>
				</tr>


				<tr>
					<th>@lang('fleet.trailers_year')</th>
					<td>
						{{$trailers->year}}
					</td>
				</tr>
               
			<!--	<tr>
					<th>@lang('fleet.trailers_image')</th>
					<td>
						@if($trailers->trailer_image != null)
			            <a href="{{ asset('uploads/'.$trailers->trailer_image) }}" target="_blank" class="col-xs-3 control-label">View</a>
			            @endif
					</td>
				</tr>
            -->
				<tr>
					<th>@lang('fleet.trailers_reg_exp_date')</th>
					<td>
						{{$trailers->reg_exp_date}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_lic_exp_date')</th>
					<td>
						{{$trailers->lic_exp_date}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_tera_sertifikat')</th>
					<td>
						{{$trailers->tera_sertifikat}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_tera_rls_date')</th>
					<td>
						{{$trailers->tera_rls_date}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_tera_exp_date')</th>
					<td>
						{{$trailers->tera_exp_date}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_compartement')</th>
					<td>
						{{$trailers->compartement}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_capacity')</th>
					<td>
						{{$trailers->capacity}}
					</td>
				</tr>

				<!-- <tr>
					<th>@lang('fleet.trailers_c1')</th>
					<td>
						{{$trailers->C1}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_c2')</th>
					<td>
						{{$trailers->C2}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_c3')</th>
					<td>
						{{$trailers->C3}}
					</td>
				</tr>

				<tr>
					<th>@lang('fleet.trailers_c4')</th>
					<td>
						{{$trailers->C4}}
					</td>
				</tr> -->

			</table>
		</div>
		<!--tab1-->
	</div>
</div>