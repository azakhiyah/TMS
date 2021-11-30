
<div role="tabpanel">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="#info-tab" data-toggle="tab" class="nav-link custom_padding active"> <?php echo app('translator')->getFromJson('fleet.general_info'); ?> <i class="fa"></i></a>
        </li>

    </ul>

	<div class="tab-content">
		<!-- tab1-->
		<div class="tab-pane active" id="info-tab">
			<table class="table table-striped">
				<!-- <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_make'); ?></th>
					<td><?php echo e($trucks->make); ?></td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_model'); ?></th>
					<td>
						<?php echo e($trucks->model); ?>

					</td>
				</tr> -->

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_type'); ?></th>
					<td>
						<?php echo e($trucks->types['displayname']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_year'); ?></th>
					<td>
						<?php echo e($trucks->year); ?>

					</td>
				</tr>
<!--
                <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_image'); ?></th>
					<td>
						<?php if($trucks->trucks_image != null): ?>
			            <a href="<?php echo e(asset('uploads/'.$trucks->trucks_image)); ?>" target="_blank" class="col-xs-3 control-label">View</a>
			            <?php endif; ?>
					</td>
				</tr>
-->

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_vin'); ?></th>
					<td>
						<?php echo e($trucks->vin); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_machine_number'); ?></th>
					<td>
						<?php echo e($trucks->machine_number); ?>

					</td>
				</tr>

				
				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_license_plate'); ?></th>
					<td>
						<?php echo e($trucks->license_plate); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_lic_exp_date'); ?></th>
					<td>
                        <?php if($trucks->lic_exp_date): ?>
						<?php echo e(date(Hyvikk::get('date_format'),strtotime($trucks->lic_exp_date))); ?>

						<?php endif; ?>
					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_tax_number'); ?></th>
					<td>
						<?php echo e($trucks->tax_number); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_tax_exp_date'); ?></th>
					<td>
						<?php echo e($trucks->tax_exp_date); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_kir'); ?></th>
					<td>
						<?php echo e($trucks->kir); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_tera_sertifikat'); ?></th>
					<td>
						<?php echo e($trucks->tera_sertifikat); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_tera_rls_date'); ?></th>
					<td>
						<?php if($trucks->tera_rls_date): ?>
						<?php echo e(date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))); ?>

						<?php endif; ?>
					</td>
				</tr>

                <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_tera_exp_date'); ?></th>
					<td>
						<?php if($trucks->tera_exp_date): ?>
						<?php echo e(date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))); ?>

						<?php endif; ?>
					</td>
				</tr>

                <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_gate_pass'); ?></th>
					<td>
						<?php echo e($trucks->gate_pass); ?>

					</td>
				</tr>

				

                <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_gatepass_rls_date'); ?></th>
					<td>
						<?php if($trucks->gatepass_rls_date): ?>
						<?php echo e(date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))); ?>

						<?php endif; ?>
					</td>
				</tr>

                <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_gatepass_exp_date'); ?></th>
					<td>
						<?php if($trucks->gatepass_exp_date): ?>
						<?php echo e(date(Hyvikk::get('date_format'),strtotime($trucks->reg_exp_date))); ?>

						<?php endif; ?>
					</td>
				</tr>

                <tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_door_number'); ?></th>
					<td>
						<?php echo e($trucks->door_number); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_flowmeter'); ?></th>
					<td>
						<?php echo e($trucks->flowmeter); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trucks_owner_type'); ?></th>
					<td>
						<?php echo e($trucks->owner_type); ?>

					</td>
				</tr>


				
			</table>
		</div>
		<!--tab1-->

	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/trucks/view_event.blade.php ENDPATH**/ ?>