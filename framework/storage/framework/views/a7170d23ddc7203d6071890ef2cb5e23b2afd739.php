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
					<th><?php echo app('translator')->getFromJson('fleet.pick_no_PO'); ?></th>
					<td><?php echo e($pickup->no_PO); ?></td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_no_SO'); ?></th>
					<td>
						<?php echo e($pickup->no_SO); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_no_LO'); ?></th>
					<td>
						<?php echo e($pickup->no_LO); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_customers'); ?></th>
					<td>
					   <?php echo e($pickup->customers['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_address'); ?></th>
					<td>
						<?php echo e($pickup->customerslocation['address']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_depo'); ?></th>
					<td>
						<?php echo e($pickup->depo['name']); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_product'); ?></th>
					<td>
						<?php echo e($pickup->product['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_qty_order_ltr'); ?></th>
					<td>
						<?php echo e($pickup->qty_order); ?> litre
					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_warehouse'); ?></th>
					<td>
						<?php echo e($pickup->warehouse->name); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_driver'); ?></th>
					<td>
						<?php echo e($pickup->drivers->name); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_door'); ?></th>
					<td>
						<?php echo e($pickup->door_number); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_transporter'); ?></th>
					<td>
						<?php echo e($pickup->transporter->name); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_trailers'); ?></th>
					<td>
						<?php echo e($pickup->trailers->brand); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_license_plate'); ?></th>
					<td>
						<?php echo e($pickup->license_plate); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_status'); ?></th>
					<td>
						<?php echo e($pickup->status == 1 ? "OPEN" : "CLOSE"); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_compartement'); ?></th>
					<td>
						<?php echo e($pickup->compartement); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_planning_at'); ?></th>
					<td>
						<?php echo e($pickup->planning_at); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_start_loading'); ?></th>
					<td>
						<?php echo e($pickup->start_loading); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.pick_stop_loading'); ?></th>
					<td>
						<?php echo e($pickup->stop_loading); ?>

					</td>
				</tr>



				
			</table>
		</div>
		<!--tab1-->

	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/pickup_bytransport/view_event.blade.php ENDPATH**/ ?>