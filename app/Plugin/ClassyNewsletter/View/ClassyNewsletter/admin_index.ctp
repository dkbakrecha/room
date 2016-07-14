<section id="classyAbout">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Newsletters List</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<th>S No</th>
						<th>Email Address</th>
						<th>Action</th>
					</tr>
					<?php
					if (!empty($NewsletterList))
					{
						$_i = 1;
						foreach ($NewsletterList as $newsletter)
						{
							?>
							<tr>
								<td><?php echo $_i; ?></td>
								<td><?php echo $newsletter['Newsletter']['email_address']; ?></td>
								<td>Edit | Delete</td>
							</tr>			
							<?php
							$_i++;
						}
					}
					else
					{
						?>
						<tr colspan="3">
							<td>No newsletter find!</td>
						</tr>	
						<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
</section>