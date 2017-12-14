<?php

// nganhnghe_ten
$Nganhnghe->nganhnghe_ten->CellCssStyle = "";
$Nganhnghe->nganhnghe_ten->CellCssClass = "";

// nganhnghe_pic
$Nganhnghe->nganhnghe_pic->CellCssStyle = "";
$Nganhnghe->nganhnghe_pic->CellCssClass = "";
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								<a href="<?php echo $gsMasterReturnUrl ?>"><img border="0" src="images/cmd_trove.gif"></a>Danh mục ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<table cellspacing="0" class="ewGrid" ><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
	<thead>
		<tr>
			<td class="ewTableHeader" align="center">Nhóm ngành nghề</td>
			</tr>
	</thead>
	<tbody>
		<tr><td><table><tr>
		<td<?php echo $Nganhnghe->nganhnghe_pic->CellAttributes() ?>>
<?php if ($Nganhnghe->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<a href="<?php echo $Nganhnghe->nganhnghe_pic->HrefValue ?>" target="_blank"><img src="manager_career_pic_bv.php?nganhnghe_id=<?php echo $Nganhnghe->nganhnghe_id->CurrentValue ?>" border=0<?php echo $Nganhnghe->nganhnghe_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($Nganhnghe->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="manager_career_pic_bv.php?nganhnghe_id=<?php echo $Nganhnghe->nganhnghe_id->CurrentValue ?>" border=0<?php echo $Nganhnghe->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($Nganhnghe->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
<td<?php echo $Nganhnghe->nganhnghe_ten->CellAttributes() ?>>
<div<?php echo $Nganhnghe->nganhnghe_ten->ViewAttributes() ?>><?php echo $Nganhnghe->nganhnghe_ten->ListViewValue() ?></div></td>
		</td></table></tr></tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
