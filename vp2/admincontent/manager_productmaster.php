<?php

// ten_sanpham
$manager_product->ten_sanpham->CellCssStyle = "";
$manager_product->ten_sanpham->CellCssClass = "";

// ten_congty
$manager_product->ten_congty->CellCssStyle = "";
$manager_product->ten_congty->CellCssClass = "";

// nganhnghe_id
$manager_product->nganhnghe_id->CellCssStyle = "";
$manager_product->nganhnghe_id->CellCssClass = "";

// thoihan_tungay
$manager_product->thoihan_tungay->CellCssStyle = "";
$manager_product->thoihan_tungay->CellCssClass = "";

// thoihan_denngay
$manager_product->thoihan_denngay->CellCssStyle = "";
$manager_product->thoihan_denngay->CellCssClass = "";

// xuatban
$manager_product->xuatban->CellCssStyle = "";
$manager_product->xuatban->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $gsMasterReturnUrl ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Ảnh của sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
	<thead>
		<tr>
			<td class="ewTableHeader">Tên sản phẩm</td>
			<td class="ewTableHeader">Tên công ty</td>
			<td class="ewTableHeader">Ngành hàng</td>
			<td class="ewTableHeader">Xuất bản</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $manager_product->ten_sanpham->CellAttributes() ?>>
<div<?php echo $manager_product->ten_sanpham->ViewAttributes() ?>><?php echo $manager_product->ten_sanpham->ListViewValue() ?></div></td>
			<td<?php echo $manager_product->ten_congty->CellAttributes() ?>>
<div<?php echo $manager_product->ten_congty->ViewAttributes() ?>><?php echo $manager_product->ten_congty->ListViewValue() ?></div></td>
			<td<?php echo $manager_product->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $manager_product->nganhnghe_id->ViewAttributes() ?>><?php echo $manager_product->nganhnghe_id->ListViewValue() ?></div></td>
			<td<?php echo $manager_product->xuatban->CellAttributes() ?>>
<div<?php echo $manager_product->xuatban->ViewAttributes() ?>><?php echo $manager_product->xuatban->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
