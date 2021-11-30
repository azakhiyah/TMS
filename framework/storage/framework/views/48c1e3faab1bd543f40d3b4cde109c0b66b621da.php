
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
					<th><?php echo app('translator')->getFromJson('fleet.trailers_brand'); ?></th>
					<td>
						<?php echo e($trailers->brand); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_type'); ?></th>
					<td>
						<?php echo e($trailers->type); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.unit_maker'); ?></th>
					<td>
						<?php echo e($trailers->unit_maker); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_licensePlate'); ?></th>
					<td>
						<?php echo e($trailers->license_plate); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_year'); ?></th>
					<td>
						<?php echo e($trailers->year); ?>

					</td>
				</tr>
               
			<!--	<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_image'); ?></th>
					<td>
						<?php if($trailers->trailer_image != null): ?>
			            <a href="<?php echo e(asset('uploads/'.$trailers->trailer_image)); ?>" target="_blank" class="col-xs-3 control-label">View</a>
			            <?php endif; ?>
					</td>
				</tr>
            -->
				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_reg_exp_date'); ?></th>
					<td>
						<?php echo e($trailers->reg_exp_date); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_lic_exp_date'); ?></th>
					<td>
						<?php echo e($trailers->lic_exp_date); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_tera_sertifikat'); ?></th>
					<td>
						<?php echo e($trailers->tera_sertifikat); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_tera_rls_date'); ?></th>
					<td>
						<?php echo e($trailers->tera_rls_date); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_tera_exp_date'); ?></th>
					<td>
						<?php echo e($trailers->tera_exp_date); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_capacity'); ?></th>
					<td>
						<?php echo e($trailers->capacity); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_c1'); ?></th>
					<td>
						<?php echo e($trailers->C1); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_c2'); ?></th>
					<td>
						<?php echo e($trailers->C2); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_c3'); ?></th>
					<td>
						<?php echo e($trailers->C3); ?>

					</td>
				</tr>

				<tr>
					<th><?php echo app('translator')->getFromJson('fleet.trailers_c4'); ?></th>
					<td>
						<?php echo e($trailers->C4); ?>

					</td>
				</tr>

			</table>
		</div>
		<!--tab1-->
	</div>
</div><?php /**PATH C:\xampp7.2.28\htdocs\tms\framework\resources\views/trailers/view_event.blade.php ENDPATH**/ ?>