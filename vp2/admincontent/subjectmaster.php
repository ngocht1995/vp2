<?php

// ten_chuyenmuc
$subject->ten_chuyenmuc->CellCssStyle = "";
$subject->ten_chuyenmuc->CellCssClass = "";

// trang_thai
$subject->trang_thai->CellCssStyle = "";
$subject->trang_thai->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $gsMasterReturnUrl ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục menu con</font></b></td>
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
			<td class="ewTableHeader">Tên chuyên mục</td>
			<td class="ewTableHeader">Trạng thái</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $subject->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $subject->ten_chuyenmuc->ViewAttributes() ?>><?php echo $subject->ten_chuyenmuc->ListViewValue() ?></div></td>
			<td<?php echo $subject->trang_thai->CellAttributes() ?>>
<div<?php echo $subject->trang_thai->ViewAttributes() ?>><?php echo $subject->trang_thai->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
