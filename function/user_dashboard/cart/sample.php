<?php 

echo 'hey';

?>

for($a = 0; $a < count($checkBox); $a++) {
		$cart = "SELECT * FROM tbl_cart WHERE cart_no = '$checkBox[$a]' ";
		$cart_query = mysqli_query($con, $cart);
		$cart_row = mysqli_fetch_array($cart_query);

		$item = "SELECT * FROM tbl_item WHERE item_no = '$cart_row[2]' ";
		$item_query = mysqli_query($con, $item);
		$item_row = mysqli_fetch_array($item_query);

		$variants = "SELECT * FROM tbl_item_size WHERE item_no = '$cart_row[2]' AND size = '$cart_row[5]' AND color = '$cart_row[6]' ";
		$variants_query = mysqli_query($con, $variants);
		$variants_row = mysqli_fetch_array($variants_query);

		$img = "SELECT * FROM tbl_item_photo_name WHERE variants_no = '$variants_row[0]' LIMIT 1 ";
		$img_query = mysqli_query($con, $img);
		$img_row = mysqli_fetch_array($img_query);

		$output .= '
			<tr class="bg-light" id="tr1'.$cart_row['cart_no'].'">
				<td colspan="1"></td>
				<td colspan="8">
					<div class="form-inline">
						<h6 class="text-secondary">Check Item Availability: <i id="'.$a.'" class="fal fa-calendar-alt text-danger mx-4" style="font-size: 28px; cursor: pointer;"></i></h5>
						<label>From: </label>
						<input type="date" class="form-control mx-2" id="from'.$a.'" />
						<label>Due Date: </label>
						<input type="date" class="form-control mx-2" id="due_date'.$a.'" />
						<select class="ml-5 custom-select form-control">
							<option>Pickup</option>
							<option>Deliver</option>
						</select>
					</div>
				</td>
			</tr>
			<tr style="border-bottom: 1px solid #ddd;" id="tr2'.$cart_row['cart_no'].'">
				<td width="5%">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rent'.$cart_row['cart_no'].'" name="rent'.$cart_row['cart_no'].'">
						<label class="custom-control-label" for="rent'.$cart_row['cart_no'].'"></label>
					</div>
				</td>
				<td width="15%">
					<div style="width: 100px; height: 100px; align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%; overflow: hidden;">
						<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
						<img src="upload/'.$img_row['item_photo_name'].'" class="w-100" style="vertical-align:middle;">
					</div>
				</td>
				<td width="15%">'.$item_row['item_name'].'</td>
				<td width="10%">'.$cart_row['item_size'].'</td>
				<td width="10%"><i class="fa fa-circle" style="color:'.$cart_row['item_color'].'"></i> '.$cart_row['item_color'].'</td>
				<td width="10%">&#8369; '.number_format($cart_row['item_price'], 2).'</td>
				<td width="20%">
					<div class="input-group col-md-10">
						<input type="number" readonly value="'.$cart_row['item_quantity'].'" class="form-control bg-white" />
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-minus"></i></span>
							<span class="input-group-text"><i class="fa fa-plus"></i></span>
						</div>
					</div>
				</td>
				<td width="10%">'.$cart_row['type_of_ship'].'</td>
				<td width="5%">
					<i id="'.$cart_row['cart_no'].'" class="fal fa-trash text-danger rent-trash" style="font-size: 24px; cursor: pointer;"></i>
				</td>
			</tr>
		';
	}
	$output .= '
			</tbody>
		</table>
	';