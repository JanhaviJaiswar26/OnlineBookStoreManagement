<?php

?>

<div class="container-fluid">

	<div class="row">
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Email</th>
							<th class="text-center">Mobile</th>
							<th class="text-center">Address</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'db_connect.php';
						$users = $conn->query("SELECT * FROM user_info order by user_id desc");
						$i = 1;
						while ($row = $users->fetch_assoc()) :
						?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= strtoupper($row['first_name']).' '.strtoupper($row['last_name']) ?></td>
								<td><?= strtolower($row['email']) ?></td>
								<td><?= strtoupper($row['mobile']) ?></td>
								<td><?= strtoupper($row['address']) ?></td>
	
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<script>
	$('#new_user').click(function() {
		uni_modal('New User', 'manage_user.php')
	})
	$('.edit_user').click(function() {
		uni_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'))
	})
</script>