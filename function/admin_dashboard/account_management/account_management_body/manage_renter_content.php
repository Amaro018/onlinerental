<?php 

include '../../../connection.php';
session_start();

$output = '';

$output = '

<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th>Account #</th>
				<th>Name</th>
				<th>User Type</th>
				<th>Email</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
';

								
				$output .= '
							</tbody>
						</table>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	';

		



echo $output;
?>