<?php 

include 'connection.php';
session_start();

$email = $_POST['email'];
$password = $_POST['pword'];
$item_no = $_POST['item_no'];

$tbl_account = "SELECT * FROM tbl_account WHERE email = '$email' ";
$account_query = mysqli_query($con, $tbl_account);

$num_rows = mysqli_num_rows($account_query);

if($num_rows != 0) {
	while($acc_row = mysqli_fetch_array($account_query)) {
		$password2 = $acc_row['pword'];
		$confirm_pass = password_verify($password, $password2);

		if($password != $confirm_pass) {
			?>
				<script>
					alert('Password do no match!');
					window.location.assign('../login.php');
				</script>
			<?php
		} else {
			if($acc_row['acc_status'] == 1) {
				?>
					<script>
						alert('Your account is on pending!');
						window.location.assign('../login.php');
					</script>
				<?php
			} else {
				$_SESSION['email'] = $acc_row['email'];
				$_SESSION['accNo'] = $acc_row['accNo'];
				$_SESSION['userType'] = $acc_row['userType'];
				if($acc_row['userType'] == 'user') {
					if($item_no != 1) {
						?>
							<script>
								alert('Your account is login.');
								window.location.assign('../product_desc.php?item_no=<?php echo $item_no?>');
							</script>
						<?php 
					} else {
						?>
							<script>
								alert('Your account is login.');
								window.location.assign('../index.php');
							</script>
						<?php 
					}
				} else if($acc_row['userType'] == 'userShop') {
					$tbl_shop = "SELECT * FROM tbl_shop WHERE accNo = '$acc_row[0]' ";
					$shop_query = mysqli_query($con, $tbl_shop);
					$shop_row = mysqli_fetch_array($shop_query);

					$_SESSION['shop_no'] = $shop_row['shop_no'];
					?>
						<script>
							alert('Your account is login.');
							window.location.assign('../shop_dashboard.php');
						</script>
					<?php
				} else {
					//this is empty
					//for ADMINISTRATOR
					?> 
					<script>
						alert('Your admin account is login.');
						window.location.assign('../admin_dashboard.php');
					</script>
					<?php
				}
			}
		}
	}
} else {
	?>
		<script>
			alert('Invalid Email Account');
			window.location.assign('../login.php');
		</script>
	<?php
}

?>