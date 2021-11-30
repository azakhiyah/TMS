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
					<th><?php echo app('translator')->getFromJson('fleet.op_no_PO'); ?></th>
					<td><?php echo e($orderplan->no_PO); ?></td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_no_SO'); ?></th>
					<td>
						<?php echo e($orderplan->no_SO); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_no_LO'); ?></th>
					<td>
						<?php echo e($orderplan->no_LO); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_customers'); ?></th>
					<td>
					   <?php echo e($orderplan->customers['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_customer_location'); ?></th>
					<td>
						<?php echo e($orderplan->customerslocation['address']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_depo'); ?></th>
					<td>
						<?php echo e($orderplan->depo['name']); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_product'); ?></th>
					<td>
						<?php echo e($orderplan->product['name']); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_qty_order'); ?></th>
					<td>
						<?php echo e($orderplan->qty_order); ?>

					</td>
				</tr>


				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.op_attachment'); ?></th>
					<td>
						<?php echo e($orderplan->attachment); ?>

					</td>
				</tr>



				
			</table>
		</div>
		<!--tab1-->

	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/order_plan/view_event.blade.php ENDPATH**/ ?>