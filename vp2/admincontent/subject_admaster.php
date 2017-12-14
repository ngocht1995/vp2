<?php

// ten_chuyenmuc
$subject_ad->ten_chuyenmuc->CellCssStyle = "";
$subject_ad->ten_chuyenmuc->CellCssClass = "";

// ten_chuyenmuc_en
$subject_ad->ten_chuyenmuc_en->CellCssStyle = "";
$subject_ad->ten_chuyenmuc_en->CellCssClass = "";

// trang_thai
$subject_ad->trang_thai->CellCssStyle = "";
$subject_ad->trang_thai->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $gsMasterReturnUrl ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý chuyên mục bài viết"); ?></font></b></td>
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
			<td class="ewTableHeader"><?php echo Lang_Text('Tên chuyên mục');?>(VI)</td>
			<td class="ewTableHeader"><?php echo Lang_Text('Trạng thái');?></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $subject_ad->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $subject_ad->ten_chuyenmuc->ViewAttributes() ?>><?php echo $subject_ad->ten_chuyenmuc->ListViewValue() ?></div></td>
			<td<?php echo $subject_ad->trang_thai->CellAttributes() ?>>
<div<?php echo $subject_ad->trang_thai->ViewAttributes() ?>><?php echo Lang_Text($subject_ad->trang_thai->ListViewValue()) ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
