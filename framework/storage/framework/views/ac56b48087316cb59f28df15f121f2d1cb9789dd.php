
<div role="tabpanel">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="#info-tab" data-toggle="tab" class="nav-link custom_padding active"> <?php echo app('translator')->getFromJson('fleet.general_info'); ?> <i class="fa"></i></a>
        </li>
    </ul>

	<div class="tab-content">
		<!-- tab1-->
		<div class="tab-pane active" id="info-tab">
			<table class="table table-striped">

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_name'); ?></th>
					<td>
						<?php echo e($data->name); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_address'); ?></th>
					<td>
						<?php echo e($data->address); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_city'); ?></th>
					<td>
						<?php echo e($data->city); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_province'); ?></th>
					<td>
						<?php echo e($data->province); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_postal_code'); ?></th>
					<td>
						<?php echo e($data->postal_code); ?>

					</td>
				</tr>

			

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_country'); ?></th>
					<td>
						<?php echo e($$data->country); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_longitude'); ?></th>
					<td>
						<?php echo e($$data->longitude); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_latitude'); ?></th>
					<td>
						<?php echo e($data->latitude); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_phone'); ?></th>
					<td>
						<?php echo e($data->phone); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_email'); ?></th>
					<td>
						<?php echo e($$data->email_depo); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.depo_note'); ?></th>
					<td>
						<?php echo e($data->note); ?>

					</td>
				</tr>

			</table>
		</div>
		<!--tab1-->
	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/depo/view_event.blade.php ENDPATH**/ ?>