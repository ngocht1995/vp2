<?php

// tieude_chaohang
$offer->tieude_chaohang->CellCssStyle = "";
$offer->tieude_chaohang->CellCssClass = "";

// kieu_chaohang
$offer->kieu_chaohang->CellCssStyle = "";
$offer->kieu_chaohang->CellCssClass = "";

// so_lanxem
$offer->so_lanxem->CellCssStyle = "";
$offer->so_lanxem->CellCssClass = "";

// thoihan_tungay
$offer->thoihan_tungay->CellCssStyle = "";
$offer->thoihan_tungay->CellCssClass = "";

// thoihan_denngay
$offer->thoihan_denngay->CellCssStyle = "";
$offer->thoihan_denngay->CellCssClass = "";

// trang_thai
$offer->trang_thai->CellCssStyle = "";
$offer->trang_thai->CellCssClass = "";

// xuatban
$offer->xuatban->CellCssStyle = "";
$offer->xuatban->CellCssClass = "";

// chaohang_tieubieu
$offer->chaohang_tieubieu->CellCssStyle = "";
$offer->chaohang_tieubieu->CellCssClass = "";

// xuat_su
$offer->xuat_su->CellCssStyle = "";
$offer->xuat_su->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $gsMasterReturnUrl ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục ảnh của chào hàng</font></b></td>
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
		<tr class="ewTableHeader">
		<td valign="top">Tiêu đề chào hàng</td>
		<td valign="top">Kiểu chào hàng</td>
		<td valign="top">Số lần xem</td>
		<td valign="top">Thời gian bắt đầu</td>
		<td valign="top">Thời gian kết thúc</td>
		<td valign="top">Trạng thái</td>
		<td valign="top">Xuất bản</td>
		<td valign="top">Chào hàng tiêu biểu</td>
		<td valign="top">Xuất sứ</td>
                </tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $offer->tieude_chaohang->ViewAttributes() ?>><?php echo $offer->tieude_chaohang->ListViewValue() ?></div></td>
			<td<?php echo $offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $offer->kieu_chaohang->ViewAttributes() ?>><?php echo $offer->kieu_chaohang->ListViewValue() ?></div></td>
			<td<?php echo $offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $offer->so_lanxem->ViewAttributes() ?>><?php echo $offer->so_lanxem->ListViewValue() ?></div></td>
			<td<?php echo $offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_tungay->ViewAttributes() ?>><?php echo $offer->thoihan_tungay->ListViewValue() ?></div></td>
			<td<?php echo $offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_denngay->ViewAttributes() ?>><?php echo $offer->thoihan_denngay->ListViewValue() ?></div></td>
			<td<?php echo $offer->trang_thai->CellAttributes() ?>>
<div<?php echo $offer->trang_thai->ViewAttributes() ?>><?php echo $offer->trang_thai->ListViewValue() ?></div></td>
			<td<?php echo $offer->xuatban->CellAttributes() ?>>
<div<?php echo $offer->xuatban->ViewAttributes() ?>><?php echo $offer->xuatban->ListViewValue() ?></div></td>
			<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $offer->chaohang_tieubieu->ListViewValue() ?></div></td>
			<td<?php echo $offer->xuat_su->CellAttributes() ?>>
<div<?php echo $offer->xuat_su->ViewAttributes() ?>><?php echo $offer->xuat_su->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
