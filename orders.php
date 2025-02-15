<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>

						<th>#</th>
						<th>Name</th>
						<th>Address</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					include 'db_connect.php';
					$qry = $conn->query("SELECT * FROM orders ");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['address'] ?></td>
							<td><?= $row['email'] ?></td>
							<td><?= $row['mobile'] ?></td>
							<?php if ($row['status'] == 1) : ?>
								<td class="text-center"><span class="badge badge-success">Confirmed</span></td>
							<?php else : ?>
								<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
							<?php endif; ?>
							<td>
								<button class="btn btn-sm btn-primary view_order" data-id="<?= $row['id'] ?>">View Order</button>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<script>
	$('.view_order').click(function() {
		uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id'))
	})
</script>