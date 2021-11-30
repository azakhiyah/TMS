
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
					<th><?php echo app('translator')->getFromJson('fleet.wh_name'); ?></th>
					<td>
						<?php echo e($warehouse->name); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_address'); ?></th>
					<td>
						<?php echo e($warehouse->address); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_city'); ?></th>
					<td>
						<?php echo e($warehouse->city); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_province'); ?></th>
					<td>
						<?php echo e($warehouse->province); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_postal_code'); ?></th>
					<td>
						<?php echo e($warehouse->postal_code); ?>

					</td>
				</tr>

			

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_country'); ?></th>
					<td>
						<?php echo e($$warehouse->country); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_longitude'); ?></th>
					<td>
						<?php echo e($$warehouse->longitude); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_latitude'); ?></th>
					<td>
						<?php echo e($warehouse->latitude); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_phone'); ?></th>
					<td>
						<?php echo e($warehouse->phone); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_email_WH'); ?></th>
					<td>
						<?php echo e($$warehouse->email_WH); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.wh_note'); ?></th>
					<td>
						<?php echo e($warehouse->note); ?>

					</td>
				</tr>

			</table>
		</div>
		<!--tab1-->
	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/warehouse/view_event.blade.php ENDPATH**/ ?>