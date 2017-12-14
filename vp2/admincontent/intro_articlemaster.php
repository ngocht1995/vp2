<?php

// tieude_baiviet
$intro_article->tieude_baiviet->CellCssStyle = "";
$intro_article->tieude_baiviet->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $gsMasterReturnUrl ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý tin quảng cáo"); ?></font></b></td>
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
			<td class="ewTableHeader">Tiêu đề bài viết</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $intro_article->tieude_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->tieude_baiviet->ViewAttributes() ?>><?php echo $intro_article->tieude_baiviet->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
