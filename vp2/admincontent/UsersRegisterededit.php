<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersRegisteredinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$UsersRegistered_edit = new cUsersRegistered_edit();
$Page =& $UsersRegistered_edit;

// Page init processing
$UsersRegistered_edit->Page_Init();

// Page main processing
$UsersRegistered_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UsersRegistered_edit = new ew_Page("UsersRegistered_edit");

// page properties
UsersRegistered_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = UsersRegistered_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
UsersRegistered_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		
		elm = fobj.elements["x" + infix + "_logo_congty"];
				if (elm && !ew_CheckFileType(elm.value)){
			return ew_OnError(this, elm, "Hãy chọn đúng kiểu File ảnh.");
		}
		elm = fobj.elements["x" + infix + "_nam_thanhlap"];
		if (elm && !ew_CheckInteger(elm.value)){
			return ew_OnError(this, elm, "Năm thành lập phải là đạng số");
		}
		elm = fobj.elements["x" + infix + "_hoten_nguoilienhe"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy điền họ tên người liên hệ");
		}
		elm = fobj.elements["x" + infix + "_ten_congty"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy điền tên công ty" );
		}
		elm = fobj.elements["x" + infix + "_dia_chi"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy điền địa chỉ công ty");
		}
		elm = fobj.elements["x" + infix + "_UserLevelID"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy chọn cấp bậc cho người dùng");
		}
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
UsersRegistered_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersRegistered_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersRegistered_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersRegistered_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<a href="<?php echo $UsersRegistered->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa thông tin thành viên</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $UsersRegistered_edit->ShowMessage() ?>
<form name="fUsersRegisterededit" id="fUsersRegisterededit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return UsersRegistered_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="UsersRegistered">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
							<br>
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin thành viên</font></b><br><br>
								<td height="20" width="100%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
</table>
<table cellspacing="0" class="ewTable">

<?php if ($UsersRegistered->ten_congty->Visible) { // ten_congty ?>
	<tr<?php echo $UsersRegistered->ten_congty->RowAttributes ?>>
		<td class="ewTableHeader">Tên <span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UsersRegistered->ten_congty->CellAttributes() ?>><span id="el_ten_congty">
<input type="text" name="x_ten_congty" id="x_ten_congty" size="56" maxlength="255" value="<?php echo $UsersRegistered->ten_congty->EditValue ?>"<?php echo $UsersRegistered->ten_congty->EditAttributes() ?>>
</span><?php echo $UsersRegistered->ten_congty->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->ten_viettat->Visible) { // ten_viettat ?>
	<tr<?php echo $UsersRegistered->ten_viettat->RowAttributes ?>>
		<td class="ewTableHeader">Tên viết tắt</td>
		<td<?php echo $UsersRegistered->ten_viettat->CellAttributes() ?>><span id="el_ten_viettat">
<input type="text" name="x_ten_viettat" id="x_ten_viettat" size="56" maxlength="150" value="<?php echo $UsersRegistered->ten_viettat->EditValue ?>"<?php echo $UsersRegistered->ten_viettat->EditAttributes() ?>>
</span><?php echo $UsersRegistered->ten_viettat->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->logo_congty->Visible) { // logo_congty ?>
	<tr<?php echo $UsersRegistered->logo_congty->RowAttributes ?>>
		<td class="ewTableHeader">Avatar</td>
		<td<?php echo $UsersRegistered->logo_congty->CellAttributes() ?>><span id="el_logo_congty">
<div id="old_x_logo_congty">
<?php if ($UsersRegistered->logo_congty->HrefValue <> "") { ?>
<?php if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) { ?>
<a href="<?php echo $UsersRegistered->logo_congty->HrefValue ?>" target="_blank"><img src="UsersRegistered_logo_congty_bv.php?nguoidung_id=<?php echo $UsersRegistered->nguoidung_id->CurrentValue ?>" border=0<?php echo $UsersRegistered->logo_congty->ViewAttributes() ?>></a>
<?php } elseif (!in_array($UsersRegistered->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) { ?>
<img src="UsersRegistered_logo_congty_bv.php?nguoidung_id=<?php echo $UsersRegistered->nguoidung_id->CurrentValue ?>" border=0<?php echo $UsersRegistered->logo_congty->ViewAttributes() ?>>
<?php } elseif (!in_array($UsersRegistered->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_logo_congty">
<?php if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) { ?>
<input type="radio" name="a_logo_congty" id="a_logo_congty" value="1" checked="checked">Bỏ qua&nbsp;
<input type="radio" name="a_logo_congty" id="a_logo_congty" value="2">Xóa&nbsp;
<input type="radio" name="a_logo_congty" id="a_logo_congty" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_logo_congty" id="a_logo_congty" value="3">
<?php } ?>
<input type="file" name="x_logo_congty" id="x_logo_congty" size="30" onchange="if (this.form.a_logo_congty[2]) this.form.a_logo_congty[2].checked=true;"<?php echo $UsersRegistered->logo_congty->EditAttributes() ?>>
</div>
</span><?php echo $UsersRegistered->logo_congty->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->website->Visible) { // website ?>
	<tr<?php echo $UsersRegistered->website->RowAttributes ?>>
		<td class="ewTableHeader">Website</td>
		<td<?php echo $UsersRegistered->website->CellAttributes() ?>><span id="el_website">
<input type="text" name="x_website" id="x_website" size="56" maxlength="150" value="<?php echo $UsersRegistered->website->EditValue ?>"<?php echo $UsersRegistered->website->EditAttributes() ?>>
</span><?php echo $UsersRegistered->website->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->chuc_nang->Visible) { // chuc_nang ?>
	<tr<?php echo $UsersRegistered->chuc_nang->RowAttributes ?>>
		<td class="ewTableHeader">Chức năng</td>
		<td<?php echo $UsersRegistered->chuc_nang->CellAttributes() ?>><span id="el_chuc_nang">
<select id="x_chuc_nang" name="x_chuc_nang"<?php echo $UsersRegistered->chuc_nang->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->chuc_nang->EditValue)) {
	$arwrk = $UsersRegistered->chuc_nang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->chuc_nang->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $UsersRegistered->chuc_nang->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $UsersRegistered->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại liên hệ<br>(Mã nước - Mã vùng - SĐT )</td>
		<td<?php echo $UsersRegistered->so_dienthoai->CellAttributes() ?>><span id="el_so_dienthoai">
<input type="text" name="x_so_dienthoai" id="x_so_dienthoai" size="27" maxlength="36" value="<?php echo $UsersRegistered->so_dienthoai->EditValue ?>"<?php echo $UsersRegistered->so_dienthoai->EditAttributes() ?>>
</span><?php echo $UsersRegistered->so_dienthoai->CustomMsg ?></td>
	</tr>
<?php } ?>


<?php if ($UsersRegistered->so_fax->Visible) { // so_fax ?>
	<tr<?php echo $UsersRegistered->so_fax->RowAttributes ?>>
		<td class="ewTableHeader">Số Fax<br>(Mã nước - Mã vùng - SĐT )</td>
		<td<?php echo $UsersRegistered->so_fax->CellAttributes() ?>><span id="el_so_fax">
<input type="text" name="x_so_fax" id="x_so_fax" size="27" maxlength="36" value="<?php echo $UsersRegistered->so_fax->EditValue ?>"<?php echo $UsersRegistered->so_fax->EditAttributes() ?>>
</span><?php echo $UsersRegistered->so_fax->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->dia_chi->Visible) { // dia_chi ?>
	<tr<?php echo $UsersRegistered->dia_chi->RowAttributes ?>>
		<td class="ewTableHeader">Địa chỉ liên hệ<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UsersRegistered->dia_chi->CellAttributes() ?>><span id="el_dia_chi">
<textarea name="x_dia_chi" id="x_dia_chi" cols="53" rows="4"<?php echo $UsersRegistered->dia_chi->EditAttributes() ?>><?php echo $UsersRegistered->dia_chi->EditValue ?></textarea>
</span><?php echo $UsersRegistered->dia_chi->CustomMsg ?></td>
	</tr>
<?php } ?>


<?php if ($UsersRegistered->gioi_thieu->Visible) { // gioi_thieu ?>
	<tr<?php echo $UsersRegistered->gioi_thieu->RowAttributes ?>>
		<td class="ewTableHeader">Giới thiệu</td>
		<td<?php echo $UsersRegistered->gioi_thieu->CellAttributes() ?>><span id="el_gioi_thieu">
<textarea name="x_gioi_thieu" id="x_gioi_thieu" cols="53" rows="4"<?php echo $UsersRegistered->gioi_thieu->EditAttributes() ?>><?php echo $UsersRegistered->gioi_thieu->EditValue ?></textarea>
</span><?php echo $UsersRegistered->gioi_thieu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $UsersRegistered->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $UsersRegistered->nick_yahoo->CellAttributes() ?>><span id="el_nick_yahoo">
<input type="text" name="x_nick_yahoo" id="x_nick_yahoo" size="56" maxlength="150" value="<?php echo $UsersRegistered->nick_yahoo->EditValue ?>"<?php echo $UsersRegistered->nick_yahoo->EditAttributes() ?>>
</span><?php echo $UsersRegistered->nick_yahoo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $UsersRegistered->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $UsersRegistered->nick_skype->CellAttributes() ?>><span id="el_nick_skype">
<input type="text" name="x_nick_skype" id="x_nick_skype" size="56" maxlength="150" value="<?php echo $UsersRegistered->nick_skype->EditValue ?>"<?php echo $UsersRegistered->nick_skype->EditAttributes() ?>>
</span><?php echo $UsersRegistered->nick_skype->CustomMsg ?></td>
	</tr>
<?php } ?>

</table>
</div>
</td></tr></table><br><br><br>

<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
							<br>
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin liên hệ</font></b><br><br>
								<td height="20" width="100%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
</table>
<table cellspacing="0" class="ewTable">
<?php if ($UsersRegistered->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UsersRegistered->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Loại người dùng</td>
		<td<?php echo $UsersRegistered->nguoidung_option->CellAttributes() ?>><span id="el_nguoidung_option">
<div<?php echo $UsersRegistered->nguoidung_option->ViewAttributes() ?>><?php echo $UsersRegistered->nguoidung_option->EditValue ?></div><input type="hidden" name="x_nguoidung_option" id="x_nguoidung_option" value="<?php echo ew_HtmlEncode($UsersRegistered->nguoidung_option->CurrentValue) ?>">
</span><?php echo $UsersRegistered->nguoidung_option->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UsersRegistered->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập</td>
		<td<?php echo $UsersRegistered->tendangnhap->CellAttributes() ?>><span id="el_tendangnhap">
<div<?php echo $UsersRegistered->tendangnhap->ViewAttributes() ?>><?php echo $UsersRegistered->tendangnhap->EditValue ?></div><input type="hidden" name="x_tendangnhap" id="x_tendangnhap" value="<?php echo ew_HtmlEncode($UsersRegistered->tendangnhap->CurrentValue) ?>">
</span><?php echo $UsersRegistered->tendangnhap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $UsersRegistered->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $UsersRegistered->quocgia_id->CellAttributes() ?>><span id="el_quocgia_id">
<select id="x_quocgia_id" name="x_quocgia_id"<?php echo $UsersRegistered->quocgia_id->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->quocgia_id->EditValue)) {
	$arwrk = $UsersRegistered->quocgia_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->quocgia_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
<?php
$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld FROM `country`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_quocgia_id" id="s_x_quocgia_id" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_quocgia_id" id="lft_x_quocgia_id" value="">
</span><?php echo $UsersRegistered->quocgia_id->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $UsersRegistered->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $UsersRegistered->gioi_tinh->CellAttributes() ?>><span id="el_gioi_tinh">
<select id="x_gioi_tinh" name="x_gioi_tinh"<?php echo $UsersRegistered->gioi_tinh->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->gioi_tinh->EditValue)) {
	$arwrk = $UsersRegistered->gioi_tinh->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->gioi_tinh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $UsersRegistered->gioi_tinh->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $UsersRegistered->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên người liên hệ <span class="ewRequired">&nbsp;*</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Họ - Tên)</td>
		<td<?php echo $UsersRegistered->hoten_nguoilienhe->CellAttributes() ?>><span id="el_hoten_nguoilienhe">
<input type="text" name="x_hoten_nguoilienhe" id="x_hoten_nguoilienhe" size="26" maxlength="90" value="<?php echo $UsersRegistered->hoten_nguoilienhe->EditValue ?>"<?php echo $UsersRegistered->hoten_nguoilienhe->EditAttributes() ?>>
</span><?php echo $UsersRegistered->hoten_nguoilienhe->CustomMsg ?>
</td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $UsersRegistered->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</td>
		<td<?php echo $UsersRegistered->truycap_gannhat->CellAttributes() ?>><span id="el_truycap_gannhat">
<div<?php echo $UsersRegistered->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersRegistered->truycap_gannhat->EditValue ?></div><input type="hidden" name="x_truycap_gannhat" id="x_truycap_gannhat" value="<?php echo ew_HtmlEncode($UsersRegistered->truycap_gannhat->CurrentValue) ?>">
</span><?php echo $UsersRegistered->truycap_gannhat->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->kieu_giaodien->Visible) { // kieu_giaodien ?>
	<tr<?php echo $UsersRegistered->kieu_giaodien->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu giao diện</td>
		<td<?php echo $UsersRegistered->kieu_giaodien->CellAttributes() ?>><span id="el_kieu_giaodien">
<select id="x_kieu_giaodien" name="x_kieu_giaodien" onchange="getlink_kieugiaodien();" <?php echo $UsersRegistered->kieu_giaodien->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->kieu_giaodien->EditValue)) {
	$arwrk = $UsersRegistered->kieu_giaodien->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->kieu_giaodien->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
<a id ="link_kieugiaodien" href="<?php echo $UsersRegistered->getlink_kieu_giaodien() ?>" target = "_blank">(Xem)</a>
&nbsp;&nbsp;<b><font face="Verdana" size="1" color="#FF0000">(Chú ý: Kiểu giao diện áp dụng cho trang chủ của người dùng)</font></b>
</span>
  <br><br>
<a href="../shop/index.htm" target="_blank"><img src="../images/shop1.png" border=0 width=100 height =70></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../shop/index1.htm" target="_blank"><img src="../images/shop2.png" border=0 width=100 height =70></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../shop/index2.htm" target="_blank"><img src="../images/shop3.png" border=0 width=100 height =70></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../shop/index3.htm" target="_blank"><img src="../images/shop4.png" border=0 width=100 height =70></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../shop/index4.htm" target="_blank"><img src="../images/shop5.png" border=0 width=100 height =70></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../shop/index5.htm" target="_blank"><img src="../images/shop6.png" border=0 width=100 height =70></a>
<br>
&nbsp;&nbsp;&nbsp;
Giao diện 1
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 2
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 3
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 4
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 5
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 6
        <?php echo $UsersRegistered->kieu_giaodien->CustomMsg ?></td>
	</tr>
<?php } ?>
<script type="text/javascript">
function  getlink_kieugiaodien() {
		var index =document.fUsersRegisterededit.x_kieu_giaodien.value;
	if (index == 1){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href="../shop/index.htm";
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
	if (index == 2){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href="../shop/index1.htm";
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
	if (index == 3){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href="../shop/index2.htm";
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
        if (index == 4){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href="../shop/index3.htm";
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
        if (index == 5){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href="../shop/index4.htm";
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
        if (index == 6){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href="../shop/index5.htm";
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
	if (index == 7){
		 document.getElementById('link_kieugiaodien').innerHTML="(Xem)";
	     document.getElementById('link_kieugiaodien').href=document.fuseredit.x_website.value;
	     document.getElementById('link_kieugiaodien').target="_blank";
	}
}
</script>

<?php if ($UsersRegistered->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UsersRegistered->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc</td>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $UsersRegistered->UserLevelID->EditAttributes() ?>>
<?php
if (is_array($UsersRegistered->UserLevelID->EditValue)) {
	$arwrk = $UsersRegistered->UserLevelID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersRegistered->UserLevelID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
<?php
$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld FROM `userlevels`";
$sWhereWrk = "`UserLevelID` IN (6,3,4,5)";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_UserLevelID" id="s_x_UserLevelID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_UserLevelID" id="lft_x_UserLevelID" value="">
</span><?php echo $UsersRegistered->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_nguoidung_id" id="x_nguoidung_id" value="<?php echo ew_HtmlEncode($UsersRegistered->nguoidung_id->CurrentValue) ?>">
<p>
<div align = "center"><input type="submit" name="btnAction" id="btnAction" value="   Sửa   "></div>
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_quocgia_id','x_quocgia_id',false],
['x_loaikinhdoanh_id','x_loaikinhdoanh_id',false],
['x_loaicongty_id','x_loaicongty_id',false],
['x_UserLevelID','x_UserLevelID',false],
['x_nganhnghe_lienquan[]','x_nganhnghe_lienquan[]',false],
['x_thitruong_lienquan[]','x_thitruong_lienquan[]',false]]);

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cUsersRegistered_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'UsersRegistered';

	// Page Object Name
	var $PageObjName = 'UsersRegistered_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) $PageUrl .= "t=" . $UsersRegistered->TableVar . "&"; // add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show Message
	function ShowMessage() {
		if ($this->getMessage() <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		global $objForm, $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersRegistered->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersRegistered->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersRegistered_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersRegistered"] = new cUsersRegistered();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersRegistered', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersRegistered;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("UsersRegisteredlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Global page loading event (in userfn6.php)
		Page_Loading();

		// Page load event, used in current page
		$this->Page_Load();
	}

	//
	//  Page_Terminate
	//  - called when exit page
	//  - if URL specified, redirect to the URL
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page unload event, used in current page
		$this->Page_Unload();

		// Global page unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close Connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			ob_end_clean();
			header("Location: $url");
		}
		exit();
	}

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $UsersRegistered;

		// Load key from QueryString
		if (@$_GET["nguoidung_id"] <> "")
			$UsersRegistered->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$UsersRegistered->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$UsersRegistered->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$UsersRegistered->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($UsersRegistered->nguoidung_id->CurrentValue == "")
			$this->Page_Terminate("UsersRegisteredlist.php"); // Invalid key, return to list
		switch ($UsersRegistered->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("UsersRegisteredlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$UsersRegistered->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $UsersRegistered->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "UsersRegisteredview.php")
						$sReturnUrl = $UsersRegistered->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$UsersRegistered->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $UsersRegistered;

		// Get upload data
			if ($UsersRegistered->logo_congty->Upload->UploadFile()) {

				// No action required
			} else {
				echo $UsersRegistered->logo_congty->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $UsersRegistered;
		$UsersRegistered->nguoidung_option->setFormValue($objForm->GetValue("x_nguoidung_option"));
		$UsersRegistered->tendangnhap->setFormValue($objForm->GetValue("x_tendangnhap"));
		$UsersRegistered->quocgia_id->setFormValue($objForm->GetValue("x_quocgia_id"));
		$UsersRegistered->gioi_tinh->setFormValue($objForm->GetValue("x_gioi_tinh"));
		$UsersRegistered->hoten_nguoilienhe->setFormValue($objForm->GetValue("x_hoten_nguoilienhe"));
		$UsersRegistered->ten_congty->setFormValue($objForm->GetValue("x_ten_congty"));
		$UsersRegistered->ten_viettat->setFormValue($objForm->GetValue("x_ten_viettat"));
		$UsersRegistered->website->setFormValue($objForm->GetValue("x_website"));
		$UsersRegistered->chuc_nang->setFormValue($objForm->GetValue("x_chuc_nang"));
		$UsersRegistered->loaikinhdoanh_id->setFormValue($objForm->GetValue("x_loaikinhdoanh_id"));
		$UsersRegistered->loaicongty_id->setFormValue($objForm->GetValue("x_loaicongty_id"));
		$UsersRegistered->so_congnhan->setFormValue($objForm->GetValue("x_so_congnhan"));
		$UsersRegistered->nam_thanhlap->setFormValue($objForm->GetValue("x_nam_thanhlap"));
		$UsersRegistered->kim_ngach->setFormValue($objForm->GetValue("x_kim_ngach"));
		$UsersRegistered->cung_cap->setFormValue($objForm->GetValue("x_cung_cap"));
		$UsersRegistered->chung_chi->setFormValue($objForm->GetValue("x_chung_chi"));
		$UsersRegistered->so_dkkd->setFormValue($objForm->GetValue("x_so_dkkd"));
		$UsersRegistered->ngay_thamgia->setFormValue($objForm->GetValue("x_ngay_thamgia"));
		$UsersRegistered->ngay_thamgia->CurrentValue = ew_UnFormatDateTime($UsersRegistered->ngay_thamgia->CurrentValue, 7);
		$UsersRegistered->so_dienthoai->setFormValue($objForm->GetValue("x_so_dienthoai"));
		$UsersRegistered->so_fax->setFormValue($objForm->GetValue("x_so_fax"));
		$UsersRegistered->dia_chi->setFormValue($objForm->GetValue("x_dia_chi"));
		$UsersRegistered->tinh_thanh->setFormValue($objForm->GetValue("x_tinh_thanh"));
		$UsersRegistered->quan_huyen->setFormValue($objForm->GetValue("x_quan_huyen"));
		$UsersRegistered->gioi_thieu->setFormValue($objForm->GetValue("x_gioi_thieu"));
		$UsersRegistered->nick_yahoo->setFormValue($objForm->GetValue("x_nick_yahoo"));
		$UsersRegistered->nick_skype->setFormValue($objForm->GetValue("x_nick_skype"));
		$UsersRegistered->truycap_gannhat->setFormValue($objForm->GetValue("x_truycap_gannhat"));
		$UsersRegistered->truycap_gannhat->CurrentValue = ew_UnFormatDateTime($UsersRegistered->truycap_gannhat->CurrentValue, 7);
		$UsersRegistered->kieu_giaodien->setFormValue($objForm->GetValue("x_kieu_giaodien"));
		$UsersRegistered->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$UsersRegistered->nganhnghe_lienquan->setFormValue($objForm->GetValue("x_nganhnghe_lienquan"));
		$UsersRegistered->thitruong_lienquan->setFormValue($objForm->GetValue("x_thitruong_lienquan"));
		$UsersRegistered->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $UsersRegistered;
		$UsersRegistered->nguoidung_id->CurrentValue = $UsersRegistered->nguoidung_id->FormValue;
		$this->LoadRow();
		$UsersRegistered->nguoidung_option->CurrentValue = $UsersRegistered->nguoidung_option->FormValue;
		$UsersRegistered->tendangnhap->CurrentValue = $UsersRegistered->tendangnhap->FormValue;
		$UsersRegistered->quocgia_id->CurrentValue = $UsersRegistered->quocgia_id->FormValue;
		$UsersRegistered->gioi_tinh->CurrentValue = $UsersRegistered->gioi_tinh->FormValue;
		$UsersRegistered->hoten_nguoilienhe->CurrentValue = $UsersRegistered->hoten_nguoilienhe->FormValue;
		$UsersRegistered->ten_congty->CurrentValue = $UsersRegistered->ten_congty->FormValue;
		$UsersRegistered->ten_viettat->CurrentValue = $UsersRegistered->ten_viettat->FormValue;
		$UsersRegistered->website->CurrentValue = $UsersRegistered->website->FormValue;
		$UsersRegistered->chuc_nang->CurrentValue = $UsersRegistered->chuc_nang->FormValue;
		$UsersRegistered->loaikinhdoanh_id->CurrentValue = $UsersRegistered->loaikinhdoanh_id->FormValue;
		$UsersRegistered->loaicongty_id->CurrentValue = $UsersRegistered->loaicongty_id->FormValue;
		$UsersRegistered->so_congnhan->CurrentValue = $UsersRegistered->so_congnhan->FormValue;
		$UsersRegistered->nam_thanhlap->CurrentValue = $UsersRegistered->nam_thanhlap->FormValue;
		$UsersRegistered->kim_ngach->CurrentValue = $UsersRegistered->kim_ngach->FormValue;
		$UsersRegistered->cung_cap->CurrentValue = $UsersRegistered->cung_cap->FormValue;
		$UsersRegistered->chung_chi->CurrentValue = $UsersRegistered->chung_chi->FormValue;
		$UsersRegistered->so_dkkd->CurrentValue = $UsersRegistered->so_dkkd->FormValue;
		$UsersRegistered->ngay_thamgia->CurrentValue = $UsersRegistered->ngay_thamgia->FormValue;
		$UsersRegistered->ngay_thamgia->CurrentValue = ew_UnFormatDateTime($UsersRegistered->ngay_thamgia->CurrentValue, 7);
		$UsersRegistered->so_dienthoai->CurrentValue = $UsersRegistered->so_dienthoai->FormValue;
		$UsersRegistered->so_fax->CurrentValue = $UsersRegistered->so_fax->FormValue;
		$UsersRegistered->dia_chi->CurrentValue = $UsersRegistered->dia_chi->FormValue;
		$UsersRegistered->tinh_thanh->CurrentValue = $UsersRegistered->tinh_thanh->FormValue;
		$UsersRegistered->quan_huyen->CurrentValue = $UsersRegistered->quan_huyen->FormValue;
		$UsersRegistered->gioi_thieu->CurrentValue = $UsersRegistered->gioi_thieu->FormValue;
		$UsersRegistered->nick_yahoo->CurrentValue = $UsersRegistered->nick_yahoo->FormValue;
		$UsersRegistered->nick_skype->CurrentValue = $UsersRegistered->nick_skype->FormValue;
		$UsersRegistered->truycap_gannhat->CurrentValue = $UsersRegistered->truycap_gannhat->FormValue;
		$UsersRegistered->truycap_gannhat->CurrentValue = ew_UnFormatDateTime($UsersRegistered->truycap_gannhat->CurrentValue, 7);
		$UsersRegistered->kieu_giaodien->CurrentValue = $UsersRegistered->kieu_giaodien->FormValue;
		$UsersRegistered->UserLevelID->CurrentValue = $UsersRegistered->UserLevelID->FormValue;
		$UsersRegistered->nganhnghe_lienquan->CurrentValue = $UsersRegistered->nganhnghe_lienquan->FormValue;
		$UsersRegistered->thitruong_lienquan->CurrentValue = $UsersRegistered->thitruong_lienquan->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersRegistered;
		$sFilter = $UsersRegistered->KeyFilter();

		// Call Row Selecting event
		$UsersRegistered->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersRegistered->CurrentFilter = $sFilter;
		$sSql = $UsersRegistered->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersRegistered->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersRegistered;
		$UsersRegistered->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersRegistered->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersRegistered->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersRegistered->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UsersRegistered->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UsersRegistered->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UsersRegistered->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersRegistered->ten_congty->setDbValue($rs->fields('ten_congty'));
		$UsersRegistered->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$UsersRegistered->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$UsersRegistered->website->setDbValue($rs->fields('website'));
		$UsersRegistered->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$UsersRegistered->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$UsersRegistered->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$UsersRegistered->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$UsersRegistered->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$UsersRegistered->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$UsersRegistered->cung_cap->setDbValue($rs->fields('cung_cap'));
		$UsersRegistered->chung_chi->setDbValue($rs->fields('chung_chi'));
		$UsersRegistered->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$UsersRegistered->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$UsersRegistered->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$UsersRegistered->so_fax->setDbValue($rs->fields('so_fax'));
		$UsersRegistered->dia_chi->setDbValue($rs->fields('dia_chi'));
		$UsersRegistered->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$UsersRegistered->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$UsersRegistered->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$UsersRegistered->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UsersRegistered->nick_skype->setDbValue($rs->fields('nick_skype'));
		$UsersRegistered->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersRegistered->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$UsersRegistered->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UsersRegistered->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$UsersRegistered->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersRegistered;

		// Call Row_Rendering event
		$UsersRegistered->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersRegistered->nguoidung_option->CellCssStyle = "";
		$UsersRegistered->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersRegistered->tendangnhap->CellCssStyle = "";
		$UsersRegistered->tendangnhap->CellCssClass = "";

		// quocgia_id
		$UsersRegistered->quocgia_id->CellCssStyle = "";
		$UsersRegistered->quocgia_id->CellCssClass = "";

		// gioi_tinh
		$UsersRegistered->gioi_tinh->CellCssStyle = "";
		$UsersRegistered->gioi_tinh->CellCssClass = "";

		// hoten_nguoilienhe
		$UsersRegistered->hoten_nguoilienhe->CellCssStyle = "";
		$UsersRegistered->hoten_nguoilienhe->CellCssClass = "";

		// ten_congty
		$UsersRegistered->ten_congty->CellCssStyle = "";
		$UsersRegistered->ten_congty->CellCssClass = "";

		// ten_viettat
		$UsersRegistered->ten_viettat->CellCssStyle = "";
		$UsersRegistered->ten_viettat->CellCssClass = "";

		// logo_congty
		$UsersRegistered->logo_congty->CellCssStyle = "";
		$UsersRegistered->logo_congty->CellCssClass = "";

		// website
		$UsersRegistered->website->CellCssStyle = "";
		$UsersRegistered->website->CellCssClass = "";

		// chuc_nang
		$UsersRegistered->chuc_nang->CellCssStyle = "";
		$UsersRegistered->chuc_nang->CellCssClass = "";

		// loaikinhdoanh_id
		$UsersRegistered->loaikinhdoanh_id->CellCssStyle = "";
		$UsersRegistered->loaikinhdoanh_id->CellCssClass = "";

		// loaicongty_id
		$UsersRegistered->loaicongty_id->CellCssStyle = "";
		$UsersRegistered->loaicongty_id->CellCssClass = "";

		// so_congnhan
		$UsersRegistered->so_congnhan->CellCssStyle = "";
		$UsersRegistered->so_congnhan->CellCssClass = "";

		// nam_thanhlap
		$UsersRegistered->nam_thanhlap->CellCssStyle = "";
		$UsersRegistered->nam_thanhlap->CellCssClass = "";

		// kim_ngach
		$UsersRegistered->kim_ngach->CellCssStyle = "";
		$UsersRegistered->kim_ngach->CellCssClass = "";

		// cung_cap
		$UsersRegistered->cung_cap->CellCssStyle = "";
		$UsersRegistered->cung_cap->CellCssClass = "";

		// chung_chi
		$UsersRegistered->chung_chi->CellCssStyle = "";
		$UsersRegistered->chung_chi->CellCssClass = "";

		// so_dkkd
		$UsersRegistered->so_dkkd->CellCssStyle = "";
		$UsersRegistered->so_dkkd->CellCssClass = "";

		// ngay_thamgia
		$UsersRegistered->ngay_thamgia->CellCssStyle = "";
		$UsersRegistered->ngay_thamgia->CellCssClass = "";

		// so_dienthoai
		$UsersRegistered->so_dienthoai->CellCssStyle = "";
		$UsersRegistered->so_dienthoai->CellCssClass = "";

		// so_fax
		$UsersRegistered->so_fax->CellCssStyle = "";
		$UsersRegistered->so_fax->CellCssClass = "";

		// dia_chi
		$UsersRegistered->dia_chi->CellCssStyle = "";
		$UsersRegistered->dia_chi->CellCssClass = "";

		// tinh_thanh
		$UsersRegistered->tinh_thanh->CellCssStyle = "";
		$UsersRegistered->tinh_thanh->CellCssClass = "";

		// quan_huyen
		$UsersRegistered->quan_huyen->CellCssStyle = "";
		$UsersRegistered->quan_huyen->CellCssClass = "";

		// gioi_thieu
		$UsersRegistered->gioi_thieu->CellCssStyle = "";
		$UsersRegistered->gioi_thieu->CellCssClass = "";

		// nick_yahoo
		$UsersRegistered->nick_yahoo->CellCssStyle = "";
		$UsersRegistered->nick_yahoo->CellCssClass = "";

		// nick_skype
		$UsersRegistered->nick_skype->CellCssStyle = "";
		$UsersRegistered->nick_skype->CellCssClass = "";

		// truycap_gannhat
		$UsersRegistered->truycap_gannhat->CellCssStyle = "";
		$UsersRegistered->truycap_gannhat->CellCssClass = "";

		// kieu_giaodien
		$UsersRegistered->kieu_giaodien->CellCssStyle = "";
		$UsersRegistered->kieu_giaodien->CellCssClass = "";

		// UserLevelID
		$UsersRegistered->UserLevelID->CellCssStyle = "";
		$UsersRegistered->UserLevelID->CellCssClass = "";

		// nganhnghe_lienquan
		$UsersRegistered->nganhnghe_lienquan->CellCssStyle = "";
		$UsersRegistered->nganhnghe_lienquan->CellCssClass = "";

		// thitruong_lienquan
		$UsersRegistered->thitruong_lienquan->CellCssStyle = "";
		$UsersRegistered->thitruong_lienquan->CellCssClass = "";
		if ($UsersRegistered->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersRegistered->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersRegistered->nguoidung_option->CurrentValue) {
					case "0":
						$UsersRegistered->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersRegistered->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UsersRegistered->nguoidung_option->ViewValue = $UsersRegistered->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersRegistered->nguoidung_option->ViewValue = NULL;
			}
			$UsersRegistered->nguoidung_option->CssStyle = "";
			$UsersRegistered->nguoidung_option->CssClass = "";
			$UsersRegistered->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->ViewValue = $UsersRegistered->tendangnhap->CurrentValue;
			$UsersRegistered->tendangnhap->CssStyle = "";
			$UsersRegistered->tendangnhap->CssClass = "";
			$UsersRegistered->tendangnhap->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($UsersRegistered->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UsersRegistered->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UsersRegistered->quocgia_id->ViewValue = $UsersRegistered->quocgia_id->CurrentValue;
				}
			} else {
				$UsersRegistered->quocgia_id->ViewValue = NULL;
			}
			$UsersRegistered->quocgia_id->CssStyle = "";
			$UsersRegistered->quocgia_id->CssClass = "";
			$UsersRegistered->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UsersRegistered->gioi_tinh->CurrentValue) <> "") {
				switch ($UsersRegistered->gioi_tinh->CurrentValue) {
					case "0":
						$UsersRegistered->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UsersRegistered->gioi_tinh->ViewValue = "Nữ";
						break;
					default:
						$UsersRegistered->gioi_tinh->ViewValue = $UsersRegistered->gioi_tinh->CurrentValue;
				}
			} else {
				$UsersRegistered->gioi_tinh->ViewValue = NULL;
			}
			$UsersRegistered->gioi_tinh->CssStyle = "";
			$UsersRegistered->gioi_tinh->CssClass = "";
			$UsersRegistered->gioi_tinh->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->ViewValue = $UsersRegistered->hoten_nguoilienhe->CurrentValue;
			$UsersRegistered->hoten_nguoilienhe->CssStyle = "";
			$UsersRegistered->hoten_nguoilienhe->CssClass = "";
			$UsersRegistered->hoten_nguoilienhe->ViewCustomAttributes = "";

			// ten_congty
			$UsersRegistered->ten_congty->ViewValue = $UsersRegistered->ten_congty->CurrentValue;
			$UsersRegistered->ten_congty->CssStyle = "";
			$UsersRegistered->ten_congty->CssClass = "";
			$UsersRegistered->ten_congty->ViewCustomAttributes = "";

			// ten_viettat
			$UsersRegistered->ten_viettat->ViewValue = $UsersRegistered->ten_viettat->CurrentValue;
			$UsersRegistered->ten_viettat->CssStyle = "";
			$UsersRegistered->ten_viettat->CssClass = "";
			$UsersRegistered->ten_viettat->ViewCustomAttributes = "";

			// logo_congty
			if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) {
				$UsersRegistered->logo_congty->ViewValue = "Logo Congty";
				$UsersRegistered->logo_congty->ImageWidth = 100;
				$UsersRegistered->logo_congty->ImageHeight = 0;
				$UsersRegistered->logo_congty->ImageAlt = "";
			} else {
				$UsersRegistered->logo_congty->ViewValue = "";
			}
			$UsersRegistered->logo_congty->CssStyle = "";
			$UsersRegistered->logo_congty->CssClass = "";
			$UsersRegistered->logo_congty->ViewCustomAttributes = "";

			// website
			$UsersRegistered->website->ViewValue = $UsersRegistered->website->CurrentValue;
			$UsersRegistered->website->CssStyle = "";
			$UsersRegistered->website->CssClass = "";
			$UsersRegistered->website->ViewCustomAttributes = "";

			// chuc_nang
			if (strval($UsersRegistered->chuc_nang->CurrentValue) <> "") {
				switch ($UsersRegistered->chuc_nang->CurrentValue) {
					case "1":
						$UsersRegistered->chuc_nang->ViewValue = "Người bán";
						break;
					case "2":
						$UsersRegistered->chuc_nang->ViewValue = "Người mua";
						break;
					case "3":
						$UsersRegistered->chuc_nang->ViewValue = "Người bán và Người mua";
						break;
					default:
						$UsersRegistered->chuc_nang->ViewValue = $UsersRegistered->chuc_nang->CurrentValue;
				}
			} else {
				$UsersRegistered->chuc_nang->ViewValue = NULL;
			}
			$UsersRegistered->chuc_nang->CssStyle = "";
			$UsersRegistered->chuc_nang->CssClass = "";
			$UsersRegistered->chuc_nang->ViewCustomAttributes = "";

			// loaikinhdoanh_id
			if (strval($UsersRegistered->loaikinhdoanh_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaikinhdoanh_ten` FROM `type_business` WHERE `loaikinhdoanh_id` = " . ew_AdjustSql($UsersRegistered->loaikinhdoanh_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->loaikinhdoanh_id->ViewValue = $rswrk->fields('loaikinhdoanh_ten');
					$rswrk->Close();
				} else {
					$UsersRegistered->loaikinhdoanh_id->ViewValue = $UsersRegistered->loaikinhdoanh_id->CurrentValue;
				}
			} else {
				$UsersRegistered->loaikinhdoanh_id->ViewValue = NULL;
			}
			$UsersRegistered->loaikinhdoanh_id->CssStyle = "";
			$UsersRegistered->loaikinhdoanh_id->CssClass = "";
			$UsersRegistered->loaikinhdoanh_id->ViewCustomAttributes = "";

			// loaicongty_id
			if (strval($UsersRegistered->loaicongty_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaicongty_ten` FROM `type_company` WHERE `loaicongty_id` = " . ew_AdjustSql($UsersRegistered->loaicongty_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->loaicongty_id->ViewValue = $rswrk->fields('loaicongty_ten');
					$rswrk->Close();
				} else {
					$UsersRegistered->loaicongty_id->ViewValue = $UsersRegistered->loaicongty_id->CurrentValue;
				}
			} else {
				$UsersRegistered->loaicongty_id->ViewValue = NULL;
			}
			$UsersRegistered->loaicongty_id->CssStyle = "";
			$UsersRegistered->loaicongty_id->CssClass = "";
			$UsersRegistered->loaicongty_id->ViewCustomAttributes = "";

			// so_congnhan
			if (strval($UsersRegistered->so_congnhan->CurrentValue) <> "") {
				switch ($UsersRegistered->so_congnhan->CurrentValue) {
					case "1":
						$UsersRegistered->so_congnhan->ViewValue = "Dưới 5 người";
						break;
					case "2":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 5 đến 10 người";
						break;
					case "3":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 11 đến 50 người";
						break;
					case "4":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 51 đến 100 người";
						break;
					case "5":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 101 đến 500 người";
						break;
					case "6":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 501 đến 1000 người";
						break;
					case "7":
						$UsersRegistered->so_congnhan->ViewValue = "Trên 1000 người";
						break;
					default:
						$UsersRegistered->so_congnhan->ViewValue = $UsersRegistered->so_congnhan->CurrentValue;
				}
			} else {
				$UsersRegistered->so_congnhan->ViewValue = NULL;
			}
			$UsersRegistered->so_congnhan->CssStyle = "";
			$UsersRegistered->so_congnhan->CssClass = "";
			$UsersRegistered->so_congnhan->ViewCustomAttributes = "";

			// nam_thanhlap
			$UsersRegistered->nam_thanhlap->ViewValue = $UsersRegistered->nam_thanhlap->CurrentValue;
			$UsersRegistered->nam_thanhlap->CssStyle = "";
			$UsersRegistered->nam_thanhlap->CssClass = "";
			$UsersRegistered->nam_thanhlap->ViewCustomAttributes = "";

			// kim_ngach
			if (strval($UsersRegistered->kim_ngach->CurrentValue) <> "") {
				switch ($UsersRegistered->kim_ngach->CurrentValue) {
					case "1":
						$UsersRegistered->kim_ngach->ViewValue = "Dưới 1 triệu USD";
						break;
					case "2":
						$UsersRegistered->kim_ngach->ViewValue = "Trên 100 triệu USD";
						break;
					case "3":
						$UsersRegistered->kim_ngach->ViewValue = "Từu 1 đến 2.5 triệu USD";
						break;
					case "4":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 2.5 đến 5 triệu USD";
						break;
					case "5":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 5 đến 10 triệu USD";
						break;
					case "6":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 10 đến 50 triệu USD";
						break;
					case "7":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 50 đến 100 triệu USD";
						break;
					default:
						$UsersRegistered->kim_ngach->ViewValue = $UsersRegistered->kim_ngach->CurrentValue;
				}
			} else {
				$UsersRegistered->kim_ngach->ViewValue = NULL;
			}
			$UsersRegistered->kim_ngach->CssStyle = "";
			$UsersRegistered->kim_ngach->CssClass = "";
			$UsersRegistered->kim_ngach->ViewCustomAttributes = "";

			// cung_cap
			$UsersRegistered->cung_cap->ViewValue = $UsersRegistered->cung_cap->CurrentValue;
			$UsersRegistered->cung_cap->CssStyle = "";
			$UsersRegistered->cung_cap->CssClass = "";
			$UsersRegistered->cung_cap->ViewCustomAttributes = "";

			// chung_chi
			$UsersRegistered->chung_chi->ViewValue = $UsersRegistered->chung_chi->CurrentValue;
			$UsersRegistered->chung_chi->CssStyle = "";
			$UsersRegistered->chung_chi->CssClass = "";
			$UsersRegistered->chung_chi->ViewCustomAttributes = "";

			// so_dkkd
			$UsersRegistered->so_dkkd->ViewValue = $UsersRegistered->so_dkkd->CurrentValue;
			$UsersRegistered->so_dkkd->CssStyle = "";
			$UsersRegistered->so_dkkd->CssClass = "";
			$UsersRegistered->so_dkkd->ViewCustomAttributes = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->ViewValue = $UsersRegistered->ngay_thamgia->CurrentValue;
			$UsersRegistered->ngay_thamgia->ViewValue = ew_FormatDateTime($UsersRegistered->ngay_thamgia->ViewValue, 7);
			$UsersRegistered->ngay_thamgia->CssStyle = "";
			$UsersRegistered->ngay_thamgia->CssClass = "";
			$UsersRegistered->ngay_thamgia->ViewCustomAttributes = "";

			// so_dienthoai
			$UsersRegistered->so_dienthoai->ViewValue = $UsersRegistered->so_dienthoai->CurrentValue;
			$UsersRegistered->so_dienthoai->CssStyle = "";
			$UsersRegistered->so_dienthoai->CssClass = "";
			$UsersRegistered->so_dienthoai->ViewCustomAttributes = "";

			// so_fax
			$UsersRegistered->so_fax->ViewValue = $UsersRegistered->so_fax->CurrentValue;
			$UsersRegistered->so_fax->CssStyle = "";
			$UsersRegistered->so_fax->CssClass = "";
			$UsersRegistered->so_fax->ViewCustomAttributes = "";

			// dia_chi
			$UsersRegistered->dia_chi->ViewValue = $UsersRegistered->dia_chi->CurrentValue;
			$UsersRegistered->dia_chi->CssStyle = "";
			$UsersRegistered->dia_chi->CssClass = "";
			$UsersRegistered->dia_chi->ViewCustomAttributes = "";

			// tinh_thanh
			$UsersRegistered->tinh_thanh->ViewValue = $UsersRegistered->tinh_thanh->CurrentValue;
			$UsersRegistered->tinh_thanh->CssStyle = "";
			$UsersRegistered->tinh_thanh->CssClass = "";
			$UsersRegistered->tinh_thanh->ViewCustomAttributes = "";

			// quan_huyen
			$UsersRegistered->quan_huyen->ViewValue = $UsersRegistered->quan_huyen->CurrentValue;
			$UsersRegistered->quan_huyen->CssStyle = "";
			$UsersRegistered->quan_huyen->CssClass = "";
			$UsersRegistered->quan_huyen->ViewCustomAttributes = "";

			// gioi_thieu
			$UsersRegistered->gioi_thieu->ViewValue = $UsersRegistered->gioi_thieu->CurrentValue;
			$UsersRegistered->gioi_thieu->CssStyle = "";
			$UsersRegistered->gioi_thieu->CssClass = "";
			$UsersRegistered->gioi_thieu->ViewCustomAttributes = "";

			// nick_yahoo
			$UsersRegistered->nick_yahoo->ViewValue = $UsersRegistered->nick_yahoo->CurrentValue;
			$UsersRegistered->nick_yahoo->CssStyle = "";
			$UsersRegistered->nick_yahoo->CssClass = "";
			$UsersRegistered->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UsersRegistered->nick_skype->ViewValue = $UsersRegistered->nick_skype->CurrentValue;
			$UsersRegistered->nick_skype->CssStyle = "";
			$UsersRegistered->nick_skype->CssClass = "";
			$UsersRegistered->nick_skype->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->ViewValue = $UsersRegistered->truycap_gannhat->CurrentValue;
			$UsersRegistered->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersRegistered->truycap_gannhat->ViewValue, 11);
			$UsersRegistered->truycap_gannhat->CssStyle = "";
			$UsersRegistered->truycap_gannhat->CssClass = "";
			$UsersRegistered->truycap_gannhat->ViewCustomAttributes = "";

			// kieu_giaodien
			if (strval($UsersRegistered->kieu_giaodien->CurrentValue) <> "") {
				switch ($UsersRegistered->kieu_giaodien->CurrentValue) {
					case "1":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 1";
						break;
					case "2":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 2";
						break;
					case "3":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 3";
						break;
                                       	case "4":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 4";
						break;
					case "5":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 5";
						break;
					case "6":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 6";
						break;
					case "7":
						$UsersRegistered->kieu_giaodien->ViewValue = "Trang chủ doanh nghiệp";
						break;
					default:
						$UsersRegistered->kieu_giaodien->ViewValue = $UsersRegistered->kieu_giaodien->CurrentValue;
				}
			} else {
				$UsersRegistered->kieu_giaodien->ViewValue = NULL;
			}
			$UsersRegistered->kieu_giaodien->CssStyle = "";
			$UsersRegistered->kieu_giaodien->CssClass = "";
			$UsersRegistered->kieu_giaodien->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersRegistered->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersRegistered->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersRegistered->UserLevelID->ViewValue = $UsersRegistered->UserLevelID->CurrentValue;
				}
			} else {
				$UsersRegistered->UserLevelID->ViewValue = NULL;
			}
			$UsersRegistered->UserLevelID->CssStyle = "";
			$UsersRegistered->UserLevelID->CssClass = "";
			$UsersRegistered->UserLevelID->ViewCustomAttributes = "";

			// nganhnghe_lienquan
			if (strval($UsersRegistered->nganhnghe_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $UsersRegistered->nganhnghe_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`nganhnghe_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->nganhnghe_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$UsersRegistered->nganhnghe_lienquan->ViewValue .= $rswrk->fields('nganhnghe_ten');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $UsersRegistered->nganhnghe_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$UsersRegistered->nganhnghe_lienquan->ViewValue = $UsersRegistered->nganhnghe_lienquan->CurrentValue;
				}
			} else {
				$UsersRegistered->nganhnghe_lienquan->ViewValue = NULL;
			}
			$UsersRegistered->nganhnghe_lienquan->CssStyle = "";
			$UsersRegistered->nganhnghe_lienquan->CssClass = "";
			$UsersRegistered->nganhnghe_lienquan->ViewCustomAttributes = "";

			// thitruong_lienquan
			if (strval($UsersRegistered->thitruong_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $UsersRegistered->thitruong_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `ten_thitruong` FROM `market` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`thitruong_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->thitruong_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$UsersRegistered->thitruong_lienquan->ViewValue .= $rswrk->fields('ten_thitruong');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $UsersRegistered->thitruong_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$UsersRegistered->thitruong_lienquan->ViewValue = $UsersRegistered->thitruong_lienquan->CurrentValue;
				}
			} else {
				$UsersRegistered->thitruong_lienquan->ViewValue = NULL;
			}
			$UsersRegistered->thitruong_lienquan->CssStyle = "";
			$UsersRegistered->thitruong_lienquan->CssClass = "";
			$UsersRegistered->thitruong_lienquan->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersRegistered->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->HrefValue = "";

			// quocgia_id
			$UsersRegistered->quocgia_id->HrefValue = "";

			// gioi_tinh
			$UsersRegistered->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->HrefValue = "";

			// ten_congty
			$UsersRegistered->ten_congty->HrefValue = "";

			// ten_viettat
			$UsersRegistered->ten_viettat->HrefValue = "";

			// logo_congty
			if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) {
				$UsersRegistered->logo_congty->HrefValue = "UsersRegistered_logo_congty_bv.php?nguoidung_id=" . $UsersRegistered->nguoidung_id->CurrentValue;
				if ($UsersRegistered->Export <> "") $UsersRegistered->logo_congty->HrefValue = ew_ConvertFullUrl($UsersRegistered->logo_congty->HrefValue);
			} else {
				$UsersRegistered->logo_congty->HrefValue = "";
			}

			// website
			$UsersRegistered->website->HrefValue = "";

			// chuc_nang
			$UsersRegistered->chuc_nang->HrefValue = "";

			// loaikinhdoanh_id
			$UsersRegistered->loaikinhdoanh_id->HrefValue = "";

			// loaicongty_id
			$UsersRegistered->loaicongty_id->HrefValue = "";

			// so_congnhan
			$UsersRegistered->so_congnhan->HrefValue = "";

			// nam_thanhlap
			$UsersRegistered->nam_thanhlap->HrefValue = "";

			// kim_ngach
			$UsersRegistered->kim_ngach->HrefValue = "";

			// cung_cap
			$UsersRegistered->cung_cap->HrefValue = "";

			// chung_chi
			$UsersRegistered->chung_chi->HrefValue = "";

			// so_dkkd
			$UsersRegistered->so_dkkd->HrefValue = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->HrefValue = "";

			// so_dienthoai
			$UsersRegistered->so_dienthoai->HrefValue = "";

			// so_fax
			$UsersRegistered->so_fax->HrefValue = "";

			// dia_chi
			$UsersRegistered->dia_chi->HrefValue = "";

			// tinh_thanh
			$UsersRegistered->tinh_thanh->HrefValue = "";

			// quan_huyen
			$UsersRegistered->quan_huyen->HrefValue = "";

			// gioi_thieu
			$UsersRegistered->gioi_thieu->HrefValue = "";

			// nick_yahoo
			$UsersRegistered->nick_yahoo->HrefValue = "";

			// nick_skype
			$UsersRegistered->nick_skype->HrefValue = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->HrefValue = "";

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->HrefValue = "";

			// UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";

			// nganhnghe_lienquan
			$UsersRegistered->nganhnghe_lienquan->HrefValue = "";

			// thitruong_lienquan
			$UsersRegistered->thitruong_lienquan->HrefValue = "";
		} elseif ($UsersRegistered->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// nguoidung_option
			$UsersRegistered->nguoidung_option->EditCustomAttributes = "";
			if (strval($UsersRegistered->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersRegistered->nguoidung_option->CurrentValue) {
					case "0":
						$UsersRegistered->nguoidung_option->EditValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersRegistered->nguoidung_option->EditValue = "Thành viên đăng ký";
						break;
					default:
						$UsersRegistered->nguoidung_option->EditValue = $UsersRegistered->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersRegistered->nguoidung_option->EditValue = NULL;
			}
			$UsersRegistered->nguoidung_option->CssStyle = "";
			$UsersRegistered->nguoidung_option->CssClass = "";
			$UsersRegistered->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->EditCustomAttributes = "";
			$UsersRegistered->tendangnhap->EditValue = $UsersRegistered->tendangnhap->CurrentValue;
			$UsersRegistered->tendangnhap->CssStyle = "";
			$UsersRegistered->tendangnhap->CssClass = "";
			$UsersRegistered->tendangnhap->ViewCustomAttributes = "";

			// quocgia_id
			$UsersRegistered->quocgia_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `country`";
			if (trim(strval($UsersRegistered->quocgia_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`quocgia_id` = '" . ew_AdjustSql($UsersRegistered->quocgia_id->CurrentValue) . "'";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("VN", "Mặc định(VIETNAM)"));
			$UsersRegistered->quocgia_id->EditValue = $arwrk;

			// gioi_tinh
			$UsersRegistered->gioi_tinh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Nam");
			$arwrk[] = array("1", "Nữ");
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->gioi_tinh->EditValue = $arwrk;

			// hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->EditCustomAttributes = "";
			$UsersRegistered->hoten_nguoilienhe->EditValue = ew_HtmlEncode($UsersRegistered->hoten_nguoilienhe->CurrentValue);

			// ten_congty
			$UsersRegistered->ten_congty->EditCustomAttributes = "";
			$UsersRegistered->ten_congty->EditValue = ew_HtmlEncode($UsersRegistered->ten_congty->CurrentValue);

			// ten_viettat
			$UsersRegistered->ten_viettat->EditCustomAttributes = "";
			$UsersRegistered->ten_viettat->EditValue = ew_HtmlEncode($UsersRegistered->ten_viettat->CurrentValue);

			// logo_congty
			$UsersRegistered->logo_congty->EditCustomAttributes = "";
			if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) {
				$UsersRegistered->logo_congty->EditValue = "Logo công ty";
				$UsersRegistered->logo_congty->ImageWidth = 100;
				$UsersRegistered->logo_congty->ImageHeight = 0;
				$UsersRegistered->logo_congty->ImageAlt = "";
			} else {
				$UsersRegistered->logo_congty->EditValue = "";
			}

			// website
			$UsersRegistered->website->EditCustomAttributes = "";
			$UsersRegistered->website->EditValue = ew_HtmlEncode($UsersRegistered->website->CurrentValue);

			// chuc_nang
			$UsersRegistered->chuc_nang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Sinh viên");
			$arwrk[] = array("2", "Đơn vị trực thuộc trường");
			$arwrk[] = array("3", "Khách");
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->chuc_nang->EditValue = $arwrk;

			// loaikinhdoanh_id
			$UsersRegistered->loaikinhdoanh_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `loaikinhdoanh_id`, `loaikinhdoanh_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `type_business`";
			if (trim(strval($UsersRegistered->loaikinhdoanh_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`loaikinhdoanh_id` = " . ew_AdjustSql($UsersRegistered->loaikinhdoanh_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->loaikinhdoanh_id->EditValue = $arwrk;

			// loaicongty_id
			$UsersRegistered->loaicongty_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `loaicongty_id`, `loaicongty_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `type_company`";
			if (trim(strval($UsersRegistered->loaicongty_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`loaicongty_id` = " . ew_AdjustSql($UsersRegistered->loaicongty_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->loaicongty_id->EditValue = $arwrk;

			// so_congnhan
			$UsersRegistered->so_congnhan->EditCustomAttributes = "";
			$arwrk = array();
			
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->so_congnhan->EditValue = $arwrk;

			// nam_thanhlap
			$UsersRegistered->nam_thanhlap->EditCustomAttributes = "";
			$UsersRegistered->nam_thanhlap->EditValue = ew_HtmlEncode($UsersRegistered->nam_thanhlap->CurrentValue);

			// kim_ngach
			$UsersRegistered->kim_ngach->EditCustomAttributes = "";
			$arwrk = array();
			
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->kim_ngach->EditValue = $arwrk;

			// cung_cap
			$UsersRegistered->cung_cap->EditCustomAttributes = "";
			$UsersRegistered->cung_cap->EditValue = ew_HtmlEncode($UsersRegistered->cung_cap->CurrentValue);

			// chung_chi
			$UsersRegistered->chung_chi->EditCustomAttributes = "";
			$UsersRegistered->chung_chi->EditValue = ew_HtmlEncode($UsersRegistered->chung_chi->CurrentValue);

			// so_dkkd
			$UsersRegistered->so_dkkd->EditCustomAttributes = "";
			$UsersRegistered->so_dkkd->EditValue = ew_HtmlEncode($UsersRegistered->so_dkkd->CurrentValue);

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->EditCustomAttributes = "";
			$UsersRegistered->ngay_thamgia->EditValue = $UsersRegistered->ngay_thamgia->CurrentValue;
			$UsersRegistered->ngay_thamgia->EditValue = ew_FormatDateTime($UsersRegistered->ngay_thamgia->EditValue, 7);
			$UsersRegistered->ngay_thamgia->CssStyle = "";
			$UsersRegistered->ngay_thamgia->CssClass = "";
			$UsersRegistered->ngay_thamgia->ViewCustomAttributes = "";

			// so_dienthoai
			$UsersRegistered->so_dienthoai->EditCustomAttributes = "";
			$UsersRegistered->so_dienthoai->EditValue = ew_HtmlEncode($UsersRegistered->so_dienthoai->CurrentValue);

			// so_fax
			$UsersRegistered->so_fax->EditCustomAttributes = "";
			$UsersRegistered->so_fax->EditValue = ew_HtmlEncode($UsersRegistered->so_fax->CurrentValue);

			// dia_chi
			$UsersRegistered->dia_chi->EditCustomAttributes = "";
			$UsersRegistered->dia_chi->EditValue = ew_HtmlEncode($UsersRegistered->dia_chi->CurrentValue);

			// tinh_thanh
			$UsersRegistered->tinh_thanh->EditCustomAttributes = "";
			$UsersRegistered->tinh_thanh->EditValue = ew_HtmlEncode($UsersRegistered->tinh_thanh->CurrentValue);

			// quan_huyen
			$UsersRegistered->quan_huyen->EditCustomAttributes = "";
			$UsersRegistered->quan_huyen->EditValue = ew_HtmlEncode($UsersRegistered->quan_huyen->CurrentValue);

			// gioi_thieu
			$UsersRegistered->gioi_thieu->EditCustomAttributes = "";
			$UsersRegistered->gioi_thieu->EditValue = ew_HtmlEncode($UsersRegistered->gioi_thieu->CurrentValue);

			// nick_yahoo
			$UsersRegistered->nick_yahoo->EditCustomAttributes = "";
			$UsersRegistered->nick_yahoo->EditValue = ew_HtmlEncode($UsersRegistered->nick_yahoo->CurrentValue);

			// nick_skype
			$UsersRegistered->nick_skype->EditCustomAttributes = "";
			$UsersRegistered->nick_skype->EditValue = ew_HtmlEncode($UsersRegistered->nick_skype->CurrentValue);

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->EditCustomAttributes = "";
			$UsersRegistered->truycap_gannhat->EditValue = $UsersRegistered->truycap_gannhat->CurrentValue;
			$UsersRegistered->truycap_gannhat->EditValue = ew_FormatDateTime($UsersRegistered->truycap_gannhat->EditValue, 7);
			$UsersRegistered->truycap_gannhat->CssStyle = "";
			$UsersRegistered->truycap_gannhat->CssClass = "";
			$UsersRegistered->truycap_gannhat->ViewCustomAttributes = "";

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->EditCustomAttributes = "";
                        $arwrk = array();
			$arwrk[] = array("1", "Giao diện 1");
			$arwrk[] = array("2", "Giao diện 2");
			$arwrk[] = array("3", "Giao diện 3");
                        $arwrk[] = array("4", "Giao diện 4");
                        $arwrk[] = array("5", "Giao diện 5");
                        $arwrk[] = array("6", "Giao diện 6");
			$arwrk[] = array("7", "Trang chủ người dùng");
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->kieu_giaodien->EditValue = $arwrk;

			// UserLevelID
			$UsersRegistered->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			if (trim(strval($UsersRegistered->UserLevelID->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`UserLevelID` = " . ew_AdjustSql($UsersRegistered->UserLevelID->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->UserLevelID->EditValue = $arwrk;

			// nganhnghe_lienquan
			$UsersRegistered->nganhnghe_lienquan->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$UsersRegistered->nganhnghe_lienquan->EditValue = $arwrk;

			// thitruong_lienquan
			$UsersRegistered->thitruong_lienquan->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `thitruong_id`, `ten_thitruong`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `market`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$UsersRegistered->thitruong_lienquan->EditValue = $arwrk;

			// Edit refer script
			// nguoidung_option

			$UsersRegistered->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->HrefValue = "";

			// quocgia_id
			$UsersRegistered->quocgia_id->HrefValue = "";

			// gioi_tinh
			$UsersRegistered->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->HrefValue = "";

			// ten_congty
			$UsersRegistered->ten_congty->HrefValue = "";

			// ten_viettat
			$UsersRegistered->ten_viettat->HrefValue = "";

			// logo_congty
			if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) {
				$UsersRegistered->logo_congty->HrefValue = "UsersRegistered_logo_congty_bv.php?nguoidung_id=" . $UsersRegistered->nguoidung_id->CurrentValue;
				if ($UsersRegistered->Export <> "") $UsersRegistered->logo_congty->HrefValue = ew_ConvertFullUrl($UsersRegistered->logo_congty->HrefValue);
			} else {
				$UsersRegistered->logo_congty->HrefValue = "";
			}

			// website
			$UsersRegistered->website->HrefValue = "";

			// chuc_nang
			$UsersRegistered->chuc_nang->HrefValue = "";

			// loaikinhdoanh_id
			$UsersRegistered->loaikinhdoanh_id->HrefValue = "";

			// loaicongty_id
			$UsersRegistered->loaicongty_id->HrefValue = "";

			// so_congnhan
			$UsersRegistered->so_congnhan->HrefValue = "";

			// nam_thanhlap
			$UsersRegistered->nam_thanhlap->HrefValue = "";

			// kim_ngach
			$UsersRegistered->kim_ngach->HrefValue = "";

			// cung_cap
			$UsersRegistered->cung_cap->HrefValue = "";

			// chung_chi
			$UsersRegistered->chung_chi->HrefValue = "";

			// so_dkkd
			$UsersRegistered->so_dkkd->HrefValue = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->HrefValue = "";

			// so_dienthoai
			$UsersRegistered->so_dienthoai->HrefValue = "";

			// so_fax
			$UsersRegistered->so_fax->HrefValue = "";

			// dia_chi
			$UsersRegistered->dia_chi->HrefValue = "";

			// tinh_thanh
			$UsersRegistered->tinh_thanh->HrefValue = "";

			// quan_huyen
			$UsersRegistered->quan_huyen->HrefValue = "";

			// gioi_thieu
			$UsersRegistered->gioi_thieu->HrefValue = "";

			// nick_yahoo
			$UsersRegistered->nick_yahoo->HrefValue = "";

			// nick_skype
			$UsersRegistered->nick_skype->HrefValue = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->HrefValue = "";

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->HrefValue = "";

			// UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";

			// nganhnghe_lienquan
			$UsersRegistered->nganhnghe_lienquan->HrefValue = "";

			// thitruong_lienquan
			$UsersRegistered->thitruong_lienquan->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersRegistered->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $UsersRegistered;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($UsersRegistered->logo_congty->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Kiểu File không hợp lệ(Hãy chọn định dạng File ảnh).";
		}
		if ($UsersRegistered->logo_congty->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($UsersRegistered->logo_congty->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước File lớn nhất là (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($UsersRegistered->gioi_tinh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Gioi Tinh";
		}
		if (!ew_CheckInteger($UsersRegistered->nam_thanhlap->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Nam Thanhlap";
		}
		if ($UsersRegistered->kieu_giaodien->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Kieu Giaodien";
		}*/
		if (!ew_CheckEmail($UsersRegistered->tendangnhap->FormValue)) {
				$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Tên đăng nhập phải là email có thực";
		}
		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $UsersRegistered;
		$sFilter = $UsersRegistered->KeyFilter();
		$UsersRegistered->CurrentFilter = $sFilter;
		$sSql = $UsersRegistered->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// Field quocgia_id
			$UsersRegistered->quocgia_id->SetDbValueDef($UsersRegistered->quocgia_id->CurrentValue, "VN");
			$rsnew['quocgia_id'] =& $UsersRegistered->quocgia_id->DbValue;

			// Field gioi_tinh
			$UsersRegistered->gioi_tinh->SetDbValueDef($UsersRegistered->gioi_tinh->CurrentValue, 0);
			$rsnew['gioi_tinh'] =& $UsersRegistered->gioi_tinh->DbValue;

			// Field hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->SetDbValueDef($UsersRegistered->hoten_nguoilienhe->CurrentValue, "");
			$rsnew['hoten_nguoilienhe'] =& $UsersRegistered->hoten_nguoilienhe->DbValue;

			// Field ten_congty
			$UsersRegistered->ten_congty->SetDbValueDef($UsersRegistered->ten_congty->CurrentValue, "");
			$rsnew['ten_congty'] =& $UsersRegistered->ten_congty->DbValue;

			// Field ten_viettat
			$UsersRegistered->ten_viettat->SetDbValueDef($UsersRegistered->ten_viettat->CurrentValue, NULL);
			$rsnew['ten_viettat'] =& $UsersRegistered->ten_viettat->DbValue;

			// Field logo_congty
			$UsersRegistered->logo_congty->Upload->SaveToSession(); // Save file value to Session
			if ($UsersRegistered->logo_congty->Upload->Action == "2" || $UsersRegistered->logo_congty->Upload->Action == "3") { // Update/Remove
			if (is_null($UsersRegistered->logo_congty->Upload->Value)) {
				$rsnew['logo_congty'] = NULL;	
			} else {
				$rsnew['logo_congty'] = $UsersRegistered->logo_congty->Upload->Value;
			}
			}

			// Field website
			$UsersRegistered->website->SetDbValueDef($UsersRegistered->website->CurrentValue, NULL);
			$rsnew['website'] =& $UsersRegistered->website->DbValue;

			// Field chuc_nang
			$UsersRegistered->chuc_nang->SetDbValueDef($UsersRegistered->chuc_nang->CurrentValue, NULL);
			$rsnew['chuc_nang'] =& $UsersRegistered->chuc_nang->DbValue;

			// Field loaikinhdoanh_id
			$UsersRegistered->loaikinhdoanh_id->SetDbValueDef($UsersRegistered->loaikinhdoanh_id->CurrentValue, NULL);
			$rsnew['loaikinhdoanh_id'] =& $UsersRegistered->loaikinhdoanh_id->DbValue;

			// Field loaicongty_id
			$UsersRegistered->loaicongty_id->SetDbValueDef($UsersRegistered->loaicongty_id->CurrentValue, NULL);
			$rsnew['loaicongty_id'] =& $UsersRegistered->loaicongty_id->DbValue;

			// Field so_congnhan
			$UsersRegistered->so_congnhan->SetDbValueDef($UsersRegistered->so_congnhan->CurrentValue, NULL);
			$rsnew['so_congnhan'] =& $UsersRegistered->so_congnhan->DbValue;

			// Field nam_thanhlap
			$UsersRegistered->nam_thanhlap->SetDbValueDef($UsersRegistered->nam_thanhlap->CurrentValue, NULL);
			$rsnew['nam_thanhlap'] =& $UsersRegistered->nam_thanhlap->DbValue;

			// Field kim_ngach
			$UsersRegistered->kim_ngach->SetDbValueDef($UsersRegistered->kim_ngach->CurrentValue, NULL);
			$rsnew['kim_ngach'] =& $UsersRegistered->kim_ngach->DbValue;

			// Field cung_cap
			$UsersRegistered->cung_cap->SetDbValueDef($UsersRegistered->cung_cap->CurrentValue, NULL);
			$rsnew['cung_cap'] =& $UsersRegistered->cung_cap->DbValue;

			// Field chung_chi
			$UsersRegistered->chung_chi->SetDbValueDef($UsersRegistered->chung_chi->CurrentValue, NULL);
			$rsnew['chung_chi'] =& $UsersRegistered->chung_chi->DbValue;

			// Field so_dkkd
			$UsersRegistered->so_dkkd->SetDbValueDef($UsersRegistered->so_dkkd->CurrentValue, NULL);
			$rsnew['so_dkkd'] =& $UsersRegistered->so_dkkd->DbValue;

			// Field so_dienthoai
			$UsersRegistered->so_dienthoai->SetDbValueDef($UsersRegistered->so_dienthoai->CurrentValue, NULL);
			$rsnew['so_dienthoai'] =& $UsersRegistered->so_dienthoai->DbValue;

			// Field so_fax
			$UsersRegistered->so_fax->SetDbValueDef($UsersRegistered->so_fax->CurrentValue, NULL);
			$rsnew['so_fax'] =& $UsersRegistered->so_fax->DbValue;

			// Field dia_chi
			$UsersRegistered->dia_chi->SetDbValueDef($UsersRegistered->dia_chi->CurrentValue, "");
			$rsnew['dia_chi'] =& $UsersRegistered->dia_chi->DbValue;

			// Field tinh_thanh
			$UsersRegistered->tinh_thanh->SetDbValueDef($UsersRegistered->tinh_thanh->CurrentValue, NULL);
			$rsnew['tinh_thanh'] =& $UsersRegistered->tinh_thanh->DbValue;

			// Field quan_huyen
			$UsersRegistered->quan_huyen->SetDbValueDef($UsersRegistered->quan_huyen->CurrentValue, NULL);
			$rsnew['quan_huyen'] =& $UsersRegistered->quan_huyen->DbValue;

			// Field gioi_thieu
			$UsersRegistered->gioi_thieu->SetDbValueDef($UsersRegistered->gioi_thieu->CurrentValue, NULL);
			$rsnew['gioi_thieu'] =& $UsersRegistered->gioi_thieu->DbValue;

			// Field nick_yahoo
			$UsersRegistered->nick_yahoo->SetDbValueDef($UsersRegistered->nick_yahoo->CurrentValue, NULL);
			$rsnew['nick_yahoo'] =& $UsersRegistered->nick_yahoo->DbValue;

			// Field nick_skype
			$UsersRegistered->nick_skype->SetDbValueDef($UsersRegistered->nick_skype->CurrentValue, NULL);
			$rsnew['nick_skype'] =& $UsersRegistered->nick_skype->DbValue;

			// Field kieu_giaodien
			$UsersRegistered->kieu_giaodien->SetDbValueDef($UsersRegistered->kieu_giaodien->CurrentValue, 1);
			$rsnew['kieu_giaodien'] =& $UsersRegistered->kieu_giaodien->DbValue;
			
			// Field UserLevelID
			$UsersRegistered->UserLevelID->SetDbValueDef($UsersRegistered->UserLevelID->CurrentValue, 4);
			$rsnew['UserLevelID'] =& $UsersRegistered->UserLevelID->DbValue;

			// Field nganhnghe_lienquan
			$UsersRegistered->nganhnghe_lienquan->SetDbValueDef($UsersRegistered->nganhnghe_lienquan->CurrentValue, NULL);
			$rsnew['nganhnghe_lienquan'] =& $UsersRegistered->nganhnghe_lienquan->DbValue;

			// Field thitruong_lienquan
			$UsersRegistered->thitruong_lienquan->SetDbValueDef($UsersRegistered->thitruong_lienquan->CurrentValue, NULL);
			$rsnew['thitruong_lienquan'] =& $UsersRegistered->thitruong_lienquan->DbValue;

			// Call Row Updating event
			$bUpdateRow = $UsersRegistered->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field logo_congty
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($UsersRegistered->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($UsersRegistered->CancelMessage <> "") {
					$this->setMessage($UsersRegistered->CancelMessage);
					$UsersRegistered->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật thất bại");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$UsersRegistered->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field logo_congty
		$UsersRegistered->logo_congty->Upload->RemoveFromSession(); // Remove file value from Session
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
