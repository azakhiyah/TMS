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
					<th><?php echo app('translator')->getFromJson('fleet.do_no_PO'); ?></th>
					<td><?php echo e($delivery->no_PO); ?></td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_no_SO'); ?></th>
					<td>
						<?php echo e($delivery->no_SO); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_no_LO'); ?></th>
					<td>
						<?php echo e($delivery->no_LO); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_customers'); ?></th>
					<td>
					   <?php echo e($delivery->customers['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_customer_location'); ?></th>
					<td>
						<?php echo e($delivery->customerslocation['address']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_qty_order'); ?></th>
					<td>
						<?php echo e($delivery->qty_order); ?> litre
					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_qty_delivery'); ?></th>
					<td>
						<?php echo e($delivery->qty_delivery); ?> litre
					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_statusdelivery'); ?></th>
					<td>
						<?php echo e($delivery->statusdelivery); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_date_delivery'); ?></th>
					<td>
						<?php echo e($delivery->date_delivery); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_actual_delivery'); ?></th>
					<td>
						<?php echo e($delivery->actual_delivery); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_product'); ?></th>
					<td>
						<?php echo e($delivery->product['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_warehouse'); ?></th>
					<td>
						<?php echo e($delivery->warehouse['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_depo'); ?></th>
					<td>
						<?php echo e($delivery->depo['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_driver'); ?></th>
					<td>
						<?php echo e($delivery->drivers['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_door_number'); ?></th>
					<td>
						<?php echo e($delivery->trucks['door_number']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_license_plate'); ?></th>
					<td>
						<?php echo e($delivery->trucks['license_plate']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_transporter'); ?></th>
					<td>
						<?php echo e($delivery->transporter['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_trailers'); ?></th>
					<td>
						<?php echo e($delivery->trailers['brand']); ?>

					</td>
				</tr>

				
				
				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.do_attach1'); ?></th>
					<td>
						<?php echo e($delivery->attachment1); ?>

					</td>
				</tr> 



				
			</table>
		</div>
		<!--tab1-->

	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/delivery_order/view_event.blade.php ENDPATH**/ ?>