<?php

// ten_sanpham
$products->ten_sanpham->CellCssStyle = "";
$products->ten_sanpham->CellCssClass = "";

// nganhnghe_id
$products->nganhnghe_id->CellCssStyle = "";
$products->nganhnghe_id->CellCssClass = "";

// tg_themsanpham
$products->tg_themsanpham->CellCssStyle = "";
$products->tg_themsanpham->CellCssClass = "";

// so_lanxem
$products->so_lanxem->CellCssStyle = "";
$products->so_lanxem->CellCssClass = "";

// trang_thai
$products->trang_thai->CellCssStyle = "";
$products->trang_thai->CellCssClass = "";

// xuatban
$products->xuatban->CellCssStyle = "";
$products->xuatban->CellCssClass = "";

// sanpham_tieubieu
$products->sanpham_tieubieu->CellCssStyle = "";
$products->sanpham_tieubieu->CellCssClass = "";

// don_gia
$products->don_gia->CellCssStyle = "";
$products->don_gia->CellCssClass = "";

// soluong_tonkho
$products->soluong_tonkho->CellCssStyle = "";
$products->soluong_tonkho->CellCssClass = "";

// khuyenmai_status
$products->khuyenmai_status->CellCssStyle = "";
$products->khuyenmai_status->CellCssClass = "";

// anh_to
$products->anh_to->CellCssStyle = "";
$products->anh_to->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $gsMasterReturnUrl ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm ảnh cho sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<br>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
	<thead>
		<tr>
			<td class="ewTableHeader">Tên sản phẩm</td>
			<td class="ewTableHeader">Loại sản phẩm</td>
			<td class="ewTableHeader">Thời gian nhập</td>
			<td class="ewTableHeader">Số lần xem</td>
			<td class="ewTableHeader">Trạng thái</td>
			<td class="ewTableHeader">Xuất bản</td>
                        <td class="ewTableHeader">Sản phẩm tiêu biểu</td>
			<td class="ewTableHeader">Đơn giá</td>
			<td class="ewTableHeader">Số lượng tồn</td>
			<td class="ewTableHeader">Khuyến mại</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $products->ten_sanpham->CellAttributes() ?>>
<div<?php echo $products->ten_sanpham->ViewAttributes() ?>><?php echo $products->ten_sanpham->ListViewValue() ?></div></td>
			<td<?php echo $products->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $products->nganhnghe_id->ViewAttributes() ?>><?php echo $products->nganhnghe_id->ListViewValue() ?></div></td>
			<td<?php echo $products->tg_themsanpham->CellAttributes() ?>>
<div<?php echo $products->tg_themsanpham->ViewAttributes() ?>><?php echo $products->tg_themsanpham->ListViewValue() ?></div></td>
			<td<?php echo $products->so_lanxem->CellAttributes() ?>>
<div<?php echo $products->so_lanxem->ViewAttributes() ?>><?php echo $products->so_lanxem->ListViewValue() ?></div></td>
			<td<?php echo $products->trang_thai->CellAttributes() ?>>
<div<?php echo $products->trang_thai->ViewAttributes() ?>><?php echo $products->trang_thai->ListViewValue() ?></div></td>
			<td<?php echo $products->xuatban->CellAttributes() ?>>
<div<?php echo $products->xuatban->ViewAttributes() ?>><?php echo $products->xuatban->ListViewValue() ?></div></td>
			<td<?php echo $products->sanpham_tieubieu->CellAttributes() ?>>
<div<?php echo $products->sanpham_tieubieu->ViewAttributes() ?>><?php echo $products->sanpham_tieubieu->ListViewValue() ?></div></td>
			<td<?php echo $products->don_gia->CellAttributes() ?>>
<div<?php echo $products->don_gia->ViewAttributes() ?>><?php echo $products->don_gia->ListViewValue() ?></div></td>
			<td<?php echo $products->soluong_tonkho->CellAttributes() ?>>
<div<?php echo $products->soluong_tonkho->ViewAttributes() ?>><?php echo $products->soluong_tonkho->ListViewValue() ?></div></td>
			<td<?php echo $products->khuyenmai_status->CellAttributes() ?>>
<div<?php echo $products->khuyenmai_status->ViewAttributes() ?>><?php echo $products->khuyenmai_status->ListViewValue() ?></div></td>
			
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
