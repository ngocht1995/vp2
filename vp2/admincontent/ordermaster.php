<?php

// c_madh
$order->c_madh->CellCssStyle = "";
$order->c_madh->CellCssClass = "";

// c_ten_nguoimua
$order->c_ten_nguoimua->CellCssStyle = "";
$order->c_ten_nguoimua->CellCssClass = "";

// c_time_order
$order->c_time_order->CellCssStyle = "";
$order->c_time_order->CellCssClass = "";

// c_checkout_type
$order->c_checkout_type->CellCssStyle = "";
$order->c_checkout_type->CellCssClass = "";

// c_time_checkout
$order->c_time_checkout->CellCssStyle = "";
$order->c_time_checkout->CellCssClass = "";

// c_time_delivery
$order->c_time_delivery->CellCssStyle = "";
$order->c_time_delivery->CellCssClass = "";

// c_so_hd
$order->c_so_hd->CellCssStyle = "";
$order->c_so_hd->CellCssClass = "";

// c_tonggiatri
$order->c_tonggiatri->CellCssStyle = "";
$order->c_tonggiatri->CellCssClass = "";

// c_tienthanhtoan
$order->c_tienthanhtoan->CellCssStyle = "";
$order->c_tienthanhtoan->CellCssClass = "";

// c_status_thanhtoan
$order->c_status_thanhtoan->CellCssStyle = "";
$order->c_status_thanhtoan->CellCssClass = "";

// c_status_giaohang
$order->c_status_giaohang->CellCssStyle = "";
$order->c_status_giaohang->CellCssClass = "";
?>
<p><span class="phpmaker">Master Record: Order<br>
<a href="<?php echo $gsMasterReturnUrl ?>">Back to master page</a></span></p>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
	<thead>
		<tr>
			<td class="ewTableHeader">C Madh</td>
			<td class="ewTableHeader">C Ten Nguoimua</td>
			<td class="ewTableHeader">C Time Order</td>
			<td class="ewTableHeader">C Checkout Type</td>
			<td class="ewTableHeader">C Time Checkout</td>
			<td class="ewTableHeader">C Time Delivery</td>
			<td class="ewTableHeader">C So Hd</td>
			<td class="ewTableHeader">C Tonggiatri</td>
			<td class="ewTableHeader">C Tienthanhtoan</td>
			<td class="ewTableHeader">C Status Thanhtoan</td>
			<td class="ewTableHeader">C Status Giaohang</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $order->c_madh->CellAttributes() ?>>
<div<?php echo $order->c_madh->ViewAttributes() ?>><?php echo $order->c_madh->ListViewValue() ?></div></td>
			<td<?php echo $order->c_ten_nguoimua->CellAttributes() ?>>
<div<?php echo $order->c_ten_nguoimua->ViewAttributes() ?>><?php echo $order->c_ten_nguoimua->ListViewValue() ?></div></td>
			<td<?php echo $order->c_time_order->CellAttributes() ?>>
<div<?php echo $order->c_time_order->ViewAttributes() ?>><?php echo $order->c_time_order->ListViewValue() ?></div></td>
			<td<?php echo $order->c_checkout_type->CellAttributes() ?>>
<div<?php echo $order->c_checkout_type->ViewAttributes() ?>><?php echo $order->c_checkout_type->ListViewValue() ?></div></td>
			<td<?php echo $order->c_time_checkout->CellAttributes() ?>>
<div<?php echo $order->c_time_checkout->ViewAttributes() ?>><?php echo $order->c_time_checkout->ListViewValue() ?></div></td>
			<td<?php echo $order->c_time_delivery->CellAttributes() ?>>
<div<?php echo $order->c_time_delivery->ViewAttributes() ?>><?php echo $order->c_time_delivery->ListViewValue() ?></div></td>
			<td<?php echo $order->c_so_hd->CellAttributes() ?>>
<div<?php echo $order->c_so_hd->ViewAttributes() ?>><?php echo $order->c_so_hd->ListViewValue() ?></div></td>
			<td<?php echo $order->c_tonggiatri->CellAttributes() ?>>
<div<?php echo $order->c_tonggiatri->ViewAttributes() ?>><?php echo $order->c_tonggiatri->ListViewValue() ?></div></td>
			<td<?php echo $order->c_tienthanhtoan->CellAttributes() ?>>
<div<?php echo $order->c_tienthanhtoan->ViewAttributes() ?>><?php echo $order->c_tienthanhtoan->ListViewValue() ?></div></td>
			<td<?php echo $order->c_status_thanhtoan->CellAttributes() ?>>
<div<?php echo $order->c_status_thanhtoan->ViewAttributes() ?>><?php echo $order->c_status_thanhtoan->ListViewValue() ?></div></td>
			<td<?php echo $order->c_status_giaohang->CellAttributes() ?>>
<div<?php echo $order->c_status_giaohang->ViewAttributes() ?>><?php echo $order->c_status_giaohang->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
