<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
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
$user_add = new cuser_add();
$Page =& $user_add;

// Page init processing
$user_add->Page_Init();

// Page main processing
$user_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var user_add = new ew_Page("user_add");

// page properties
user_add.PageID = "add"; // page ID
var EW_PAGE_ID = user_add.PageID; // for backward compatibility

// extend page with ValidateForm function
user_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tendangnhap"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Tendangnhap");
		elm = fobj.elements["x" + infix + "_gioi_tinh"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Gioi Tinh");
		elm = fobj.elements["x" + infix + "_mat_khau"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Mat Khau");
		elm = fobj.elements["x" + infix + "_logo_congty"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_nam_thanhlap"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Nam Thanhlap");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
user_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_add.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">Add to TABLE: Tmdt User<br><br>
<a href="<?php echo $user->getReturnUrl() ?>">Go Back</a></span></p>
<?php $user_add->ShowMessage() ?>
<form name="fuseradd" id="fuseradd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return user_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="user">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($user->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $user->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tendangnhap<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->tendangnhap->CellAttributes() ?>><span id="el_tendangnhap">
<input type="text" name="x_tendangnhap" id="x_tendangnhap" size="30" maxlength="50" value="<?php echo $user->tendangnhap->EditValue ?>"<?php echo $user->tendangnhap->EditAttributes() ?>>
</span><?php echo $user->tendangnhap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $user->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quocgia Id</td>
		<td<?php echo $user->quocgia_id->CellAttributes() ?>><span id="el_quocgia_id">
<select id="x_quocgia_id" name="x_quocgia_id"<?php echo $user->quocgia_id->EditAttributes() ?>>
<?php
if (is_array($user->quocgia_id->EditValue)) {
	$arwrk = $user->quocgia_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->quocgia_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $user->quocgia_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $user->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Gioi Tinh<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->gioi_tinh->CellAttributes() ?>><span id="el_gioi_tinh">
<select id="x_gioi_tinh" name="x_gioi_tinh"<?php echo $user->gioi_tinh->EditAttributes() ?>>
<?php
if (is_array($user->gioi_tinh->EditValue)) {
	$arwrk = $user->gioi_tinh->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->gioi_tinh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $user->gioi_tinh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $user->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->hoten_nguoilienhe->CellAttributes() ?>><span id="el_hoten_nguoilienhe">
<input type="text" name="x_hoten_nguoilienhe" id="x_hoten_nguoilienhe" size="30" maxlength="30" value="<?php echo $user->hoten_nguoilienhe->EditValue ?>"<?php echo $user->hoten_nguoilienhe->EditAttributes() ?>>
</span><?php echo $user->hoten_nguoilienhe->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->mat_khau->Visible) { // mat_khau ?>
	<tr<?php echo $user->mat_khau->RowAttributes ?>>
		<td class="ewTableHeader">Mat Khau<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->mat_khau->CellAttributes() ?>><span id="el_mat_khau">
<input type="password" name="x_mat_khau" id="x_mat_khau" size="30" maxlength="50"<?php echo $user->mat_khau->EditAttributes() ?>>
</span><?php echo $user->mat_khau->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->ten_congty->Visible) { // ten_congty ?>
	<tr<?php echo $user->ten_congty->RowAttributes ?>>
		<td class="ewTableHeader">Ten Congty<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->ten_congty->CellAttributes() ?>><span id="el_ten_congty">
<input type="text" name="x_ten_congty" id="x_ten_congty" size="30" maxlength="255" value="<?php echo $user->ten_congty->EditValue ?>"<?php echo $user->ten_congty->EditAttributes() ?>>
</span><?php echo $user->ten_congty->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->ten_viettat->Visible) { // ten_viettat ?>
	<tr<?php echo $user->ten_viettat->RowAttributes ?>>
		<td class="ewTableHeader">Ten Viettat</td>
		<td<?php echo $user->ten_viettat->CellAttributes() ?>><span id="el_ten_viettat">
<input type="text" name="x_ten_viettat" id="x_ten_viettat" size="30" maxlength="50" value="<?php echo $user->ten_viettat->EditValue ?>"<?php echo $user->ten_viettat->EditAttributes() ?>>
</span><?php echo $user->ten_viettat->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->logo_congty->Visible) { // logo_congty ?>
	<tr<?php echo $user->logo_congty->RowAttributes ?>>
		<td class="ewTableHeader">Logo Congty</td>
		<td<?php echo $user->logo_congty->CellAttributes() ?>><span id="el_logo_congty">
<input type="file" name="x_logo_congty" id="x_logo_congty" size="30"<?php echo $user->logo_congty->EditAttributes() ?>>
</div>
</span><?php echo $user->logo_congty->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->website->Visible) { // website ?>
	<tr<?php echo $user->website->RowAttributes ?>>
		<td class="ewTableHeader">Website</td>
		<td<?php echo $user->website->CellAttributes() ?>><span id="el_website">
<input type="text" name="x_website" id="x_website" size="30" maxlength="255" value="<?php echo $user->website->EditValue ?>"<?php echo $user->website->EditAttributes() ?>>
</span><?php echo $user->website->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->chuc_nang->Visible) { // chuc_nang ?>
	<tr<?php echo $user->chuc_nang->RowAttributes ?>>
		<td class="ewTableHeader">Chuc Nang<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->chuc_nang->CellAttributes() ?>><span id="el_chuc_nang">
<select id="x_chuc_nang" name="x_chuc_nang"<?php echo $user->chuc_nang->EditAttributes() ?>>
<?php
if (is_array($user->chuc_nang->EditValue)) {
	$arwrk = $user->chuc_nang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->chuc_nang->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $user->chuc_nang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->loaikinhdoanh_id->Visible) { // loaikinhdoanh_id ?>
	<tr<?php echo $user->loaikinhdoanh_id->RowAttributes ?>>
		<td class="ewTableHeader">Loaikinhdoanh Id<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->loaikinhdoanh_id->CellAttributes() ?>><span id="el_loaikinhdoanh_id">
<select id="x_loaikinhdoanh_id" name="x_loaikinhdoanh_id"<?php echo $user->loaikinhdoanh_id->EditAttributes() ?>>
<?php
if (is_array($user->loaikinhdoanh_id->EditValue)) {
	$arwrk = $user->loaikinhdoanh_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->loaikinhdoanh_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
$sSqlWrk = "SELECT `loaikinhdoanh_id`, `loaikinhdoanh_ten`, '' AS Disp2Fld FROM `type_business`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_loaikinhdoanh_id" id="s_x_loaikinhdoanh_id" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_loaikinhdoanh_id" id="lft_x_loaikinhdoanh_id" value="">
</span><?php echo $user->loaikinhdoanh_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->loaicongty_id->Visible) { // loaicongty_id ?>
	<tr<?php echo $user->loaicongty_id->RowAttributes ?>>
		<td class="ewTableHeader">Loaicongty Id<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->loaicongty_id->CellAttributes() ?>><span id="el_loaicongty_id">
<select id="x_loaicongty_id" name="x_loaicongty_id"<?php echo $user->loaicongty_id->EditAttributes() ?>>
<?php
if (is_array($user->loaicongty_id->EditValue)) {
	$arwrk = $user->loaicongty_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->loaicongty_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
$sSqlWrk = "SELECT `loaicongty_id`, `loaicongty_ten`, '' AS Disp2Fld FROM `type_company`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_loaicongty_id" id="s_x_loaicongty_id" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_loaicongty_id" id="lft_x_loaicongty_id" value="">
</span><?php echo $user->loaicongty_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->so_congnhan->Visible) { // so_congnhan ?>
	<tr<?php echo $user->so_congnhan->RowAttributes ?>>
		<td class="ewTableHeader">So Congnhan<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->so_congnhan->CellAttributes() ?>><span id="el_so_congnhan">
<select id="x_so_congnhan" name="x_so_congnhan"<?php echo $user->so_congnhan->EditAttributes() ?>>
<?php
if (is_array($user->so_congnhan->EditValue)) {
	$arwrk = $user->so_congnhan->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->so_congnhan->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $user->so_congnhan->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->nam_thanhlap->Visible) { // nam_thanhlap ?>
	<tr<?php echo $user->nam_thanhlap->RowAttributes ?>>
		<td class="ewTableHeader">Nam Thanhlap<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->nam_thanhlap->CellAttributes() ?>><span id="el_nam_thanhlap">
<input type="text" name="x_nam_thanhlap" id="x_nam_thanhlap" size="30" value="<?php echo $user->nam_thanhlap->EditValue ?>"<?php echo $user->nam_thanhlap->EditAttributes() ?>>
</span><?php echo $user->nam_thanhlap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->kim_ngach->Visible) { // kim_ngach ?>
	<tr<?php echo $user->kim_ngach->RowAttributes ?>>
		<td class="ewTableHeader">Kim Ngach<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->kim_ngach->CellAttributes() ?>><span id="el_kim_ngach">
<select id="x_kim_ngach" name="x_kim_ngach"<?php echo $user->kim_ngach->EditAttributes() ?>>
<?php
if (is_array($user->kim_ngach->EditValue)) {
	$arwrk = $user->kim_ngach->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->kim_ngach->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $user->kim_ngach->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->cung_cap->Visible) { // cung_cap ?>
	<tr<?php echo $user->cung_cap->RowAttributes ?>>
		<td class="ewTableHeader">Cung Cap</td>
		<td<?php echo $user->cung_cap->CellAttributes() ?>><span id="el_cung_cap">
<textarea name="x_cung_cap" id="x_cung_cap" cols="0" rows="0"<?php echo $user->cung_cap->EditAttributes() ?>><?php echo $user->cung_cap->EditValue ?></textarea>
</span><?php echo $user->cung_cap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->chung_chi->Visible) { // chung_chi ?>
	<tr<?php echo $user->chung_chi->RowAttributes ?>>
		<td class="ewTableHeader">Chung Chi</td>
		<td<?php echo $user->chung_chi->CellAttributes() ?>><span id="el_chung_chi">
<input type="text" name="x_chung_chi" id="x_chung_chi" size="30" maxlength="255" value="<?php echo $user->chung_chi->EditValue ?>"<?php echo $user->chung_chi->EditAttributes() ?>>
</span><?php echo $user->chung_chi->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->so_dkkd->Visible) { // so_dkkd ?>
	<tr<?php echo $user->so_dkkd->RowAttributes ?>>
		<td class="ewTableHeader">So Dkkd</td>
		<td<?php echo $user->so_dkkd->CellAttributes() ?>><span id="el_so_dkkd">
<input type="text" name="x_so_dkkd" id="x_so_dkkd" size="30" maxlength="50" value="<?php echo $user->so_dkkd->EditValue ?>"<?php echo $user->so_dkkd->EditAttributes() ?>>
</span><?php echo $user->so_dkkd->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->ma_quocgia_dthoai->Visible) { // ma_quocgia_dthoai ?>
	<tr<?php echo $user->ma_quocgia_dthoai->RowAttributes ?>>
		<td class="ewTableHeader">Ma Quocgia Dthoai</td>
		<td<?php echo $user->ma_quocgia_dthoai->CellAttributes() ?>><span id="el_ma_quocgia_dthoai">
<input type="text" name="x_ma_quocgia_dthoai" id="x_ma_quocgia_dthoai" size="30" maxlength="10" value="<?php echo $user->ma_quocgia_dthoai->EditValue ?>"<?php echo $user->ma_quocgia_dthoai->EditAttributes() ?>>
</span><?php echo $user->ma_quocgia_dthoai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->ma_vung_dthoai->Visible) { // ma_vung_dthoai ?>
	<tr<?php echo $user->ma_vung_dthoai->RowAttributes ?>>
		<td class="ewTableHeader">Ma Vung Dthoai</td>
		<td<?php echo $user->ma_vung_dthoai->CellAttributes() ?>><span id="el_ma_vung_dthoai">
<input type="text" name="x_ma_vung_dthoai" id="x_ma_vung_dthoai" size="30" maxlength="10" value="<?php echo $user->ma_vung_dthoai->EditValue ?>"<?php echo $user->ma_vung_dthoai->EditAttributes() ?>>
</span><?php echo $user->ma_vung_dthoai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $user->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">So Dienthoai</td>
		<td<?php echo $user->so_dienthoai->CellAttributes() ?>><span id="el_so_dienthoai">
<input type="text" name="x_so_dienthoai" id="x_so_dienthoai" size="30" maxlength="12" value="<?php echo $user->so_dienthoai->EditValue ?>"<?php echo $user->so_dienthoai->EditAttributes() ?>>
</span><?php echo $user->so_dienthoai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->ma_quocgia_fax->Visible) { // ma_quocgia_fax ?>
	<tr<?php echo $user->ma_quocgia_fax->RowAttributes ?>>
		<td class="ewTableHeader">Ma Quocgia Fax</td>
		<td<?php echo $user->ma_quocgia_fax->CellAttributes() ?>><span id="el_ma_quocgia_fax">
<input type="text" name="x_ma_quocgia_fax" id="x_ma_quocgia_fax" size="30" maxlength="10" value="<?php echo $user->ma_quocgia_fax->EditValue ?>"<?php echo $user->ma_quocgia_fax->EditAttributes() ?>>
</span><?php echo $user->ma_quocgia_fax->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->ma_vung_fax->Visible) { // ma_vung_fax ?>
	<tr<?php echo $user->ma_vung_fax->RowAttributes ?>>
		<td class="ewTableHeader">Ma Vung Fax</td>
		<td<?php echo $user->ma_vung_fax->CellAttributes() ?>><span id="el_ma_vung_fax">
<input type="text" name="x_ma_vung_fax" id="x_ma_vung_fax" size="30" maxlength="10" value="<?php echo $user->ma_vung_fax->EditValue ?>"<?php echo $user->ma_vung_fax->EditAttributes() ?>>
</span><?php echo $user->ma_vung_fax->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->so_fax->Visible) { // so_fax ?>
	<tr<?php echo $user->so_fax->RowAttributes ?>>
		<td class="ewTableHeader">So Fax</td>
		<td<?php echo $user->so_fax->CellAttributes() ?>><span id="el_so_fax">
<input type="text" name="x_so_fax" id="x_so_fax" size="30" maxlength="12" value="<?php echo $user->so_fax->EditValue ?>"<?php echo $user->so_fax->EditAttributes() ?>>
</span><?php echo $user->so_fax->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->dia_chi->Visible) { // dia_chi ?>
	<tr<?php echo $user->dia_chi->RowAttributes ?>>
		<td class="ewTableHeader">Dia Chi<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->dia_chi->CellAttributes() ?>><span id="el_dia_chi">
<textarea name="x_dia_chi" id="x_dia_chi" cols="0" rows="0"<?php echo $user->dia_chi->EditAttributes() ?>><?php echo $user->dia_chi->EditValue ?></textarea>
</span><?php echo $user->dia_chi->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->tinh_thanh->Visible) { // tinh_thanh ?>
	<tr<?php echo $user->tinh_thanh->RowAttributes ?>>
		<td class="ewTableHeader">Tinh Thanh</td>
		<td<?php echo $user->tinh_thanh->CellAttributes() ?>><span id="el_tinh_thanh">
<input type="text" name="x_tinh_thanh" id="x_tinh_thanh" size="30" maxlength="50" value="<?php echo $user->tinh_thanh->EditValue ?>"<?php echo $user->tinh_thanh->EditAttributes() ?>>
</span><?php echo $user->tinh_thanh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->quan_huyen->Visible) { // quan_huyen ?>
	<tr<?php echo $user->quan_huyen->RowAttributes ?>>
		<td class="ewTableHeader">Quan Huyen</td>
		<td<?php echo $user->quan_huyen->CellAttributes() ?>><span id="el_quan_huyen">
<input type="text" name="x_quan_huyen" id="x_quan_huyen" size="30" maxlength="50" value="<?php echo $user->quan_huyen->EditValue ?>"<?php echo $user->quan_huyen->EditAttributes() ?>>
</span><?php echo $user->quan_huyen->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->gioi_thieu->Visible) { // gioi_thieu ?>
	<tr<?php echo $user->gioi_thieu->RowAttributes ?>>
		<td class="ewTableHeader">Gioi Thieu</td>
		<td<?php echo $user->gioi_thieu->CellAttributes() ?>><span id="el_gioi_thieu">
<textarea name="x_gioi_thieu" id="x_gioi_thieu" cols="35" rows="4"<?php echo $user->gioi_thieu->EditAttributes() ?>><?php echo $user->gioi_thieu->EditValue ?></textarea>
</span><?php echo $user->gioi_thieu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $user->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $user->nick_yahoo->CellAttributes() ?>><span id="el_nick_yahoo">
<input type="text" name="x_nick_yahoo" id="x_nick_yahoo" size="30" maxlength="50" value="<?php echo $user->nick_yahoo->EditValue ?>"<?php echo $user->nick_yahoo->EditAttributes() ?>>
</span><?php echo $user->nick_yahoo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $user->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $user->nick_skype->CellAttributes() ?>><span id="el_nick_skype">
<input type="text" name="x_nick_skype" id="x_nick_skype" size="30" maxlength="50" value="<?php echo $user->nick_skype->EditValue ?>"<?php echo $user->nick_skype->EditAttributes() ?>>
</span><?php echo $user->nick_skype->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->kieu_giaodien->Visible) { // kieu_giaodien ?>
	<tr<?php echo $user->kieu_giaodien->RowAttributes ?>>
		<td class="ewTableHeader">Kieu Giaodien<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $user->kieu_giaodien->CellAttributes() ?>><span id="el_kieu_giaodien">
<select id="x_kieu_giaodien" name="x_kieu_giaodien"<?php echo $user->kieu_giaodien->EditAttributes() ?>>
<?php
if (is_array($user->kieu_giaodien->EditValue)) {
	$arwrk = $user->kieu_giaodien->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user->kieu_giaodien->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $user->kieu_giaodien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->nganhnghe_lienquan->Visible) { // nganhnghe_lienquan ?>
	<tr<?php echo $user->nganhnghe_lienquan->RowAttributes ?>>
		<td class="ewTableHeader">Nganhnghe Lienquan</td>
		<td<?php echo $user->nganhnghe_lienquan->CellAttributes() ?>><span id="el_nganhnghe_lienquan">
<div id="tp_x_nganhnghe_lienquan" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_nganhnghe_lienquan[]" id="x_nganhnghe_lienquan[]" value="{value}"<?php echo $user->nganhnghe_lienquan->EditAttributes() ?>></div>
<div id="dsl_x_nganhnghe_lienquan" repeatcolumn="5">
<?php
$arwrk = $user->nganhnghe_lienquan->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($user->nganhnghe_lienquan->CurrentValue));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = "";
		for ($ari = 0; $ari < count($armultiwrk); $ari++) {
			if (strval($arwrk[$rowcntwrk][0]) == trim(strval($armultiwrk[$ari]))) {
				$selwrk = " checked=\"checked\"";
				if ($selwrk <> "") $emptywrk = FALSE;
				break;
			}
		}

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="checkbox" name="x_nganhnghe_lienquan[]" id="x_nganhnghe_lienquan[]" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $user->nganhnghe_lienquan->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
<?php
$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld FROM `career`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_nganhnghe_lienquan" id="s_x_nganhnghe_lienquan" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_nganhnghe_lienquan" id="lft_x_nganhnghe_lienquan" value="">
</span><?php echo $user->nganhnghe_lienquan->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->thitruong_lienquan->Visible) { // thitruong_lienquan ?>
	<tr<?php echo $user->thitruong_lienquan->RowAttributes ?>>
		<td class="ewTableHeader">Thitruong Lienquan</td>
		<td<?php echo $user->thitruong_lienquan->CellAttributes() ?>><span id="el_thitruong_lienquan">
<div id="tp_x_thitruong_lienquan" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_thitruong_lienquan[]" id="x_thitruong_lienquan[]" value="{value}"<?php echo $user->thitruong_lienquan->EditAttributes() ?>></div>
<div id="dsl_x_thitruong_lienquan" repeatcolumn="5">
<?php
$arwrk = $user->thitruong_lienquan->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($user->thitruong_lienquan->CurrentValue));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = "";
		for ($ari = 0; $ari < count($armultiwrk); $ari++) {
			if (strval($arwrk[$rowcntwrk][0]) == trim(strval($armultiwrk[$ari]))) {
				$selwrk = " checked=\"checked\"";
				if ($selwrk <> "") $emptywrk = FALSE;
				break;
			}
		}

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="checkbox" name="x_thitruong_lienquan[]" id="x_thitruong_lienquan[]" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $user->thitruong_lienquan->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
<?php
$sSqlWrk = "SELECT `thitruong_id`, `ten_thitruong`, '' AS Disp2Fld FROM `market`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_thitruong_lienquan" id="s_x_thitruong_lienquan" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_thitruong_lienquan" id="lft_x_thitruong_lienquan" value="">
</span><?php echo $user->thitruong_lienquan->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Add    ">
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_quocgia_id','x_quocgia_id',false],
['x_loaikinhdoanh_id','x_loaikinhdoanh_id',false],
['x_loaicongty_id','x_loaicongty_id',false],
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
class cuser_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'user';

	// Page Object Name
	var $PageObjName = 'user_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user;
		if ($user->UseTokenInUrl) $PageUrl .= "t=" . $user->TableVar . "&"; // add page token
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
		global $objForm, $user;
		if ($user->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user;
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
		if (!$Security->CanAdd()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("userlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("userlist.php");
		}

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
	var $x_ewPriv = 0;

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $user;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["nguoidung_id"] != "") {
		  $user->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $user->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$user->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $user->CurrentAction = "C"; // Copy Record
		  } else {
		    $user->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($user->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("userlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$user->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm mới thành công"); // Set up success message
					$sReturnUrl = $user->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "userview.php")
						$sReturnUrl = $user->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$user->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $user;

		// Get upload data
			if ($user->logo_congty->Upload->UploadFile()) {

				// No action required
			} else {
				echo $user->logo_congty->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $user;
		$user->quocgia_id->CurrentValue = VN;
		$user->gioi_tinh->CurrentValue = 0;
		$user->chuc_nang->CurrentValue = 3;
		$user->kieu_giaodien->CurrentValue = 1;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $user;
		$user->tendangnhap->setFormValue($objForm->GetValue("x_tendangnhap"));
		$user->quocgia_id->setFormValue($objForm->GetValue("x_quocgia_id"));
		$user->gioi_tinh->setFormValue($objForm->GetValue("x_gioi_tinh"));
		$user->hoten_nguoilienhe->setFormValue($objForm->GetValue("x_hoten_nguoilienhe"));
		$user->mat_khau->setFormValue($objForm->GetValue("x_mat_khau"));
		$user->ten_congty->setFormValue($objForm->GetValue("x_ten_congty"));
		$user->ten_viettat->setFormValue($objForm->GetValue("x_ten_viettat"));
		$user->website->setFormValue($objForm->GetValue("x_website"));
		$user->chuc_nang->setFormValue($objForm->GetValue("x_chuc_nang"));
		$user->loaikinhdoanh_id->setFormValue($objForm->GetValue("x_loaikinhdoanh_id"));
		$user->loaicongty_id->setFormValue($objForm->GetValue("x_loaicongty_id"));
		$user->so_congnhan->setFormValue($objForm->GetValue("x_so_congnhan"));
		$user->nam_thanhlap->setFormValue($objForm->GetValue("x_nam_thanhlap"));
		$user->kim_ngach->setFormValue($objForm->GetValue("x_kim_ngach"));
		$user->cung_cap->setFormValue($objForm->GetValue("x_cung_cap"));
		$user->chung_chi->setFormValue($objForm->GetValue("x_chung_chi"));
		$user->so_dkkd->setFormValue($objForm->GetValue("x_so_dkkd"));
		$user->ngay_thamgia->setFormValue($objForm->GetValue("x_ngay_thamgia"));
		$user->ngay_thamgia->CurrentValue = ew_UnFormatDateTime($user->ngay_thamgia->CurrentValue, 7);
		$user->ma_quocgia_dthoai->setFormValue($objForm->GetValue("x_ma_quocgia_dthoai"));
		$user->ma_vung_dthoai->setFormValue($objForm->GetValue("x_ma_vung_dthoai"));
		$user->so_dienthoai->setFormValue($objForm->GetValue("x_so_dienthoai"));
		$user->ma_quocgia_fax->setFormValue($objForm->GetValue("x_ma_quocgia_fax"));
		$user->ma_vung_fax->setFormValue($objForm->GetValue("x_ma_vung_fax"));
		$user->so_fax->setFormValue($objForm->GetValue("x_so_fax"));
		$user->dia_chi->setFormValue($objForm->GetValue("x_dia_chi"));
		$user->tinh_thanh->setFormValue($objForm->GetValue("x_tinh_thanh"));
		$user->quan_huyen->setFormValue($objForm->GetValue("x_quan_huyen"));
		$user->gioi_thieu->setFormValue($objForm->GetValue("x_gioi_thieu"));
		$user->nick_yahoo->setFormValue($objForm->GetValue("x_nick_yahoo"));
		$user->nick_skype->setFormValue($objForm->GetValue("x_nick_skype"));
		$user->kieu_giaodien->setFormValue($objForm->GetValue("x_kieu_giaodien"));
		$user->nganhnghe_lienquan->setFormValue($objForm->GetValue("x_nganhnghe_lienquan"));
		$user->thitruong_lienquan->setFormValue($objForm->GetValue("x_thitruong_lienquan"));
		$user->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $user;
		$user->nguoidung_id->CurrentValue = $user->nguoidung_id->FormValue;
		$user->tendangnhap->CurrentValue = $user->tendangnhap->FormValue;
		$user->quocgia_id->CurrentValue = $user->quocgia_id->FormValue;
		$user->gioi_tinh->CurrentValue = $user->gioi_tinh->FormValue;
		$user->hoten_nguoilienhe->CurrentValue = $user->hoten_nguoilienhe->FormValue;
		$user->mat_khau->CurrentValue = $user->mat_khau->FormValue;
		$user->ten_congty->CurrentValue = $user->ten_congty->FormValue;
		$user->ten_viettat->CurrentValue = $user->ten_viettat->FormValue;
		$user->website->CurrentValue = $user->website->FormValue;
		$user->chuc_nang->CurrentValue = $user->chuc_nang->FormValue;
		$user->loaikinhdoanh_id->CurrentValue = $user->loaikinhdoanh_id->FormValue;
		$user->loaicongty_id->CurrentValue = $user->loaicongty_id->FormValue;
		$user->so_congnhan->CurrentValue = $user->so_congnhan->FormValue;
		$user->nam_thanhlap->CurrentValue = $user->nam_thanhlap->FormValue;
		$user->kim_ngach->CurrentValue = $user->kim_ngach->FormValue;
		$user->cung_cap->CurrentValue = $user->cung_cap->FormValue;
		$user->chung_chi->CurrentValue = $user->chung_chi->FormValue;
		$user->so_dkkd->CurrentValue = $user->so_dkkd->FormValue;
		$user->ngay_thamgia->CurrentValue = $user->ngay_thamgia->FormValue;
		$user->ngay_thamgia->CurrentValue = ew_UnFormatDateTime($user->ngay_thamgia->CurrentValue, 7);
		$user->ma_quocgia_dthoai->CurrentValue = $user->ma_quocgia_dthoai->FormValue;
		$user->ma_vung_dthoai->CurrentValue = $user->ma_vung_dthoai->FormValue;
		$user->so_dienthoai->CurrentValue = $user->so_dienthoai->FormValue;
		$user->ma_quocgia_fax->CurrentValue = $user->ma_quocgia_fax->FormValue;
		$user->ma_vung_fax->CurrentValue = $user->ma_vung_fax->FormValue;
		$user->so_fax->CurrentValue = $user->so_fax->FormValue;
		$user->dia_chi->CurrentValue = $user->dia_chi->FormValue;
		$user->tinh_thanh->CurrentValue = $user->tinh_thanh->FormValue;
		$user->quan_huyen->CurrentValue = $user->quan_huyen->FormValue;
		$user->gioi_thieu->CurrentValue = $user->gioi_thieu->FormValue;
		$user->nick_yahoo->CurrentValue = $user->nick_yahoo->FormValue;
		$user->nick_skype->CurrentValue = $user->nick_skype->FormValue;
		$user->kieu_giaodien->CurrentValue = $user->kieu_giaodien->FormValue;
		$user->nganhnghe_lienquan->CurrentValue = $user->nganhnghe_lienquan->FormValue;
		$user->thitruong_lienquan->CurrentValue = $user->thitruong_lienquan->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user;
		$sFilter = $user->KeyFilter();

		// Call Row Selecting event
		$user->Row_Selecting($sFilter);

		// Load sql based on filter
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user;
		$user->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$user->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$user->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$user->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$user->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$user->mat_khau->setDbValue($rs->fields('mat_khau'));
		$user->ten_congty->setDbValue($rs->fields('ten_congty'));
		$user->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$user->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$user->website->setDbValue($rs->fields('website'));
		$user->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$user->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$user->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$user->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$user->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$user->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$user->cung_cap->setDbValue($rs->fields('cung_cap'));
		$user->chung_chi->setDbValue($rs->fields('chung_chi'));
		$user->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$user->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$user->ma_quocgia_dthoai->setDbValue($rs->fields('ma_quocgia_dthoai'));
		$user->ma_vung_dthoai->setDbValue($rs->fields('ma_vung_dthoai'));
		$user->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$user->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$user->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$user->so_fax->setDbValue($rs->fields('so_fax'));
		$user->dia_chi->setDbValue($rs->fields('dia_chi'));
		$user->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$user->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$user->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$user->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$user->nick_skype->setDbValue($rs->fields('nick_skype'));
		$user->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$user->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$user->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$user->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$user->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user;

		// Call Row_Rendering event
		$user->Row_Rendering();

		// Common render codes for all row types
		// tendangnhap

		$user->tendangnhap->CellCssStyle = "";
		$user->tendangnhap->CellCssClass = "";

		// quocgia_id
		$user->quocgia_id->CellCssStyle = "";
		$user->quocgia_id->CellCssClass = "";

		// gioi_tinh
		$user->gioi_tinh->CellCssStyle = "";
		$user->gioi_tinh->CellCssClass = "";

		// hoten_nguoilienhe
		$user->hoten_nguoilienhe->CellCssStyle = "";
		$user->hoten_nguoilienhe->CellCssClass = "";

		// mat_khau
		$user->mat_khau->CellCssStyle = "";
		$user->mat_khau->CellCssClass = "";

		// ten_congty
		$user->ten_congty->CellCssStyle = "";
		$user->ten_congty->CellCssClass = "";

		// ten_viettat
		$user->ten_viettat->CellCssStyle = "";
		$user->ten_viettat->CellCssClass = "";

		// logo_congty
		$user->logo_congty->CellCssStyle = "";
		$user->logo_congty->CellCssClass = "";

		// website
		$user->website->CellCssStyle = "";
		$user->website->CellCssClass = "";

		// chuc_nang
		$user->chuc_nang->CellCssStyle = "";
		$user->chuc_nang->CellCssClass = "";

		// loaikinhdoanh_id
		$user->loaikinhdoanh_id->CellCssStyle = "";
		$user->loaikinhdoanh_id->CellCssClass = "";

		// loaicongty_id
		$user->loaicongty_id->CellCssStyle = "";
		$user->loaicongty_id->CellCssClass = "";

		// so_congnhan
		$user->so_congnhan->CellCssStyle = "";
		$user->so_congnhan->CellCssClass = "";

		// nam_thanhlap
		$user->nam_thanhlap->CellCssStyle = "";
		$user->nam_thanhlap->CellCssClass = "";

		// kim_ngach
		$user->kim_ngach->CellCssStyle = "";
		$user->kim_ngach->CellCssClass = "";

		// cung_cap
		$user->cung_cap->CellCssStyle = "";
		$user->cung_cap->CellCssClass = "";

		// chung_chi
		$user->chung_chi->CellCssStyle = "";
		$user->chung_chi->CellCssClass = "";

		// so_dkkd
		$user->so_dkkd->CellCssStyle = "";
		$user->so_dkkd->CellCssClass = "";

		// ngay_thamgia
		$user->ngay_thamgia->CellCssStyle = "";
		$user->ngay_thamgia->CellCssClass = "";

		// ma_quocgia_dthoai
		$user->ma_quocgia_dthoai->CellCssStyle = "";
		$user->ma_quocgia_dthoai->CellCssClass = "";

		// ma_vung_dthoai
		$user->ma_vung_dthoai->CellCssStyle = "";
		$user->ma_vung_dthoai->CellCssClass = "";

		// so_dienthoai
		$user->so_dienthoai->CellCssStyle = "";
		$user->so_dienthoai->CellCssClass = "";

		// ma_quocgia_fax
		$user->ma_quocgia_fax->CellCssStyle = "";
		$user->ma_quocgia_fax->CellCssClass = "";

		// ma_vung_fax
		$user->ma_vung_fax->CellCssStyle = "";
		$user->ma_vung_fax->CellCssClass = "";

		// so_fax
		$user->so_fax->CellCssStyle = "";
		$user->so_fax->CellCssClass = "";

		// dia_chi
		$user->dia_chi->CellCssStyle = "";
		$user->dia_chi->CellCssClass = "";

		// tinh_thanh
		$user->tinh_thanh->CellCssStyle = "";
		$user->tinh_thanh->CellCssClass = "";

		// quan_huyen
		$user->quan_huyen->CellCssStyle = "";
		$user->quan_huyen->CellCssClass = "";

		// gioi_thieu
		$user->gioi_thieu->CellCssStyle = "";
		$user->gioi_thieu->CellCssClass = "";

		// nick_yahoo
		$user->nick_yahoo->CellCssStyle = "";
		$user->nick_yahoo->CellCssClass = "";

		// nick_skype
		$user->nick_skype->CellCssStyle = "";
		$user->nick_skype->CellCssClass = "";

		// kieu_giaodien
		$user->kieu_giaodien->CellCssStyle = "";
		$user->kieu_giaodien->CellCssClass = "";

		// nganhnghe_lienquan
		$user->nganhnghe_lienquan->CellCssStyle = "";
		$user->nganhnghe_lienquan->CellCssClass = "";

		// thitruong_lienquan
		$user->thitruong_lienquan->CellCssStyle = "";
		$user->thitruong_lienquan->CellCssClass = "";
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row

			// tendangnhap
			$user->tendangnhap->ViewValue = $user->tendangnhap->CurrentValue;
			$user->tendangnhap->CssStyle = "";
			$user->tendangnhap->CssClass = "";
			$user->tendangnhap->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($user->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($user->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$user->quocgia_id->ViewValue = $user->quocgia_id->CurrentValue;
				}
			} else {
				$user->quocgia_id->ViewValue = NULL;
			}
			$user->quocgia_id->CssStyle = "";
			$user->quocgia_id->CssClass = "";
			$user->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($user->gioi_tinh->CurrentValue) <> "") {
				switch ($user->gioi_tinh->CurrentValue) {
					case "0":
						$user->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$user->gioi_tinh->ViewValue = "Nu";
						break;
					default:
						$user->gioi_tinh->ViewValue = $user->gioi_tinh->CurrentValue;
				}
			} else {
				$user->gioi_tinh->ViewValue = NULL;
			}
			$user->gioi_tinh->CssStyle = "";
			$user->gioi_tinh->CssClass = "";
			$user->gioi_tinh->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->ViewValue = $user->hoten_nguoilienhe->CurrentValue;
			$user->hoten_nguoilienhe->CssStyle = "";
			$user->hoten_nguoilienhe->CssClass = "";
			$user->hoten_nguoilienhe->ViewCustomAttributes = "";

			// mat_khau
			$user->mat_khau->ViewValue = "********";
			$user->mat_khau->CssStyle = "";
			$user->mat_khau->CssClass = "";
			$user->mat_khau->ViewCustomAttributes = "";

			// ten_congty
			$user->ten_congty->ViewValue = $user->ten_congty->CurrentValue;
			$user->ten_congty->CssStyle = "";
			$user->ten_congty->CssClass = "";
			$user->ten_congty->ViewCustomAttributes = "";

			// ten_viettat
			$user->ten_viettat->ViewValue = $user->ten_viettat->CurrentValue;
			$user->ten_viettat->CssStyle = "";
			$user->ten_viettat->CssClass = "";
			$user->ten_viettat->ViewCustomAttributes = "";

			// logo_congty
			if (!is_null($user->logo_congty->Upload->DbValue)) {
				$user->logo_congty->ViewValue = "Logo Congty";
			} else {
				$user->logo_congty->ViewValue = "";
			}
			$user->logo_congty->CssStyle = "";
			$user->logo_congty->CssClass = "";
			$user->logo_congty->ViewCustomAttributes = "";

			// website
			$user->website->ViewValue = $user->website->CurrentValue;
			$user->website->CssStyle = "";
			$user->website->CssClass = "";
			$user->website->ViewCustomAttributes = "";

			// chuc_nang
			if (strval($user->chuc_nang->CurrentValue) <> "") {
				switch ($user->chuc_nang->CurrentValue) {
					case "1":
						$user->chuc_nang->ViewValue = "Nguoi ban";
						break;
					case "2":
						$user->chuc_nang->ViewValue = "Nguoi mua";
						break;
					case "3":
						$user->chuc_nang->ViewValue = "Nguoi ban va Nguoi mua";
						break;
					default:
						$user->chuc_nang->ViewValue = $user->chuc_nang->CurrentValue;
				}
			} else {
				$user->chuc_nang->ViewValue = NULL;
			}
			$user->chuc_nang->CssStyle = "";
			$user->chuc_nang->CssClass = "";
			$user->chuc_nang->ViewCustomAttributes = "";

			// loaikinhdoanh_id
			if (strval($user->loaikinhdoanh_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaikinhdoanh_ten` FROM `type_business` WHERE `loaikinhdoanh_id` = " . ew_AdjustSql($user->loaikinhdoanh_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->loaikinhdoanh_id->ViewValue = $rswrk->fields('loaikinhdoanh_ten');
					$rswrk->Close();
				} else {
					$user->loaikinhdoanh_id->ViewValue = $user->loaikinhdoanh_id->CurrentValue;
				}
			} else {
				$user->loaikinhdoanh_id->ViewValue = NULL;
			}
			$user->loaikinhdoanh_id->CssStyle = "";
			$user->loaikinhdoanh_id->CssClass = "";
			$user->loaikinhdoanh_id->ViewCustomAttributes = "";

			// loaicongty_id
			if (strval($user->loaicongty_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaicongty_ten` FROM `type_company` WHERE `loaicongty_id` = " . ew_AdjustSql($user->loaicongty_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->loaicongty_id->ViewValue = $rswrk->fields('loaicongty_ten');
					$rswrk->Close();
				} else {
					$user->loaicongty_id->ViewValue = $user->loaicongty_id->CurrentValue;
				}
			} else {
				$user->loaicongty_id->ViewValue = NULL;
			}
			$user->loaicongty_id->CssStyle = "";
			$user->loaicongty_id->CssClass = "";
			$user->loaicongty_id->ViewCustomAttributes = "";

			// so_congnhan
			if (strval($user->so_congnhan->CurrentValue) <> "") {
				switch ($user->so_congnhan->CurrentValue) {
					case "1":
						$user->so_congnhan->ViewValue = "Duoi 5 nguoi";
						break;
					case "2":
						$user->so_congnhan->ViewValue = "Tu 5 den 10 nguoi";
						break;
					case "3":
						$user->so_congnhan->ViewValue = "Tu 11 den 50 nguoi";
						break;
					case "4":
						$user->so_congnhan->ViewValue = "Tu 51 den 100 nguoi";
						break;
					case "5":
						$user->so_congnhan->ViewValue = "Tu 101 den 500 nguoi";
						break;
					case "6":
						$user->so_congnhan->ViewValue = "Tu 501 den 1000 nguoi";
						break;
					case "7":
						$user->so_congnhan->ViewValue = "Tren 1000 nguoi";
						break;
					default:
						$user->so_congnhan->ViewValue = $user->so_congnhan->CurrentValue;
				}
			} else {
				$user->so_congnhan->ViewValue = NULL;
			}
			$user->so_congnhan->CssStyle = "";
			$user->so_congnhan->CssClass = "";
			$user->so_congnhan->ViewCustomAttributes = "";

			// nam_thanhlap
			$user->nam_thanhlap->ViewValue = $user->nam_thanhlap->CurrentValue;
			$user->nam_thanhlap->CssStyle = "";
			$user->nam_thanhlap->CssClass = "";
			$user->nam_thanhlap->ViewCustomAttributes = "";

			// kim_ngach
			if (strval($user->kim_ngach->CurrentValue) <> "") {
				switch ($user->kim_ngach->CurrentValue) {
					case "1":
						$user->kim_ngach->ViewValue = "Duoi 1 trieu USD";
						break;
					case "2":
						$user->kim_ngach->ViewValue = "Tren 100 trieu USD";
						break;
					case "3":
						$user->kim_ngach->ViewValue = "Tu 1 den 2.5 trieu USD";
						break;
					case "4":
						$user->kim_ngach->ViewValue = "Tu 2.5 den 5 trieu USD";
						break;
					case "5":
						$user->kim_ngach->ViewValue = "Tu 5 den 10 trieu USD";
						break;
					case "6":
						$user->kim_ngach->ViewValue = "Tu 10 den 50 trieu USD";
						break;
					case "7":
						$user->kim_ngach->ViewValue = "Tu 50 den 100 trieu USD";
						break;
					default:
						$user->kim_ngach->ViewValue = $user->kim_ngach->CurrentValue;
				}
			} else {
				$user->kim_ngach->ViewValue = NULL;
			}
			$user->kim_ngach->CssStyle = "";
			$user->kim_ngach->CssClass = "";
			$user->kim_ngach->ViewCustomAttributes = "";

			// cung_cap
			$user->cung_cap->ViewValue = $user->cung_cap->CurrentValue;
			$user->cung_cap->CssStyle = "";
			$user->cung_cap->CssClass = "";
			$user->cung_cap->ViewCustomAttributes = "";

			// chung_chi
			$user->chung_chi->ViewValue = $user->chung_chi->CurrentValue;
			$user->chung_chi->CssStyle = "";
			$user->chung_chi->CssClass = "";
			$user->chung_chi->ViewCustomAttributes = "";

			// so_dkkd
			$user->so_dkkd->ViewValue = $user->so_dkkd->CurrentValue;
			$user->so_dkkd->CssStyle = "";
			$user->so_dkkd->CssClass = "";
			$user->so_dkkd->ViewCustomAttributes = "";

			// ngay_thamgia
			$user->ngay_thamgia->ViewValue = $user->ngay_thamgia->CurrentValue;
			$user->ngay_thamgia->ViewValue = ew_FormatDateTime($user->ngay_thamgia->ViewValue, 7);
			$user->ngay_thamgia->CssStyle = "";
			$user->ngay_thamgia->CssClass = "";
			$user->ngay_thamgia->ViewCustomAttributes = "";

			// ma_quocgia_dthoai
			$user->ma_quocgia_dthoai->ViewValue = $user->ma_quocgia_dthoai->CurrentValue;
			$user->ma_quocgia_dthoai->CssStyle = "";
			$user->ma_quocgia_dthoai->CssClass = "";
			$user->ma_quocgia_dthoai->ViewCustomAttributes = "";

			// ma_vung_dthoai
			$user->ma_vung_dthoai->ViewValue = $user->ma_vung_dthoai->CurrentValue;
			$user->ma_vung_dthoai->CssStyle = "";
			$user->ma_vung_dthoai->CssClass = "";
			$user->ma_vung_dthoai->ViewCustomAttributes = "";

			// so_dienthoai
			$user->so_dienthoai->ViewValue = $user->so_dienthoai->CurrentValue;
			$user->so_dienthoai->CssStyle = "";
			$user->so_dienthoai->CssClass = "";
			$user->so_dienthoai->ViewCustomAttributes = "";

			// ma_quocgia_fax
			$user->ma_quocgia_fax->ViewValue = $user->ma_quocgia_fax->CurrentValue;
			$user->ma_quocgia_fax->CssStyle = "";
			$user->ma_quocgia_fax->CssClass = "";
			$user->ma_quocgia_fax->ViewCustomAttributes = "";

			// ma_vung_fax
			$user->ma_vung_fax->ViewValue = $user->ma_vung_fax->CurrentValue;
			$user->ma_vung_fax->CssStyle = "";
			$user->ma_vung_fax->CssClass = "";
			$user->ma_vung_fax->ViewCustomAttributes = "";

			// so_fax
			$user->so_fax->ViewValue = $user->so_fax->CurrentValue;
			$user->so_fax->CssStyle = "";
			$user->so_fax->CssClass = "";
			$user->so_fax->ViewCustomAttributes = "";

			// dia_chi
			$user->dia_chi->ViewValue = $user->dia_chi->CurrentValue;
			$user->dia_chi->CssStyle = "";
			$user->dia_chi->CssClass = "";
			$user->dia_chi->ViewCustomAttributes = "";

			// tinh_thanh
			$user->tinh_thanh->ViewValue = $user->tinh_thanh->CurrentValue;
			$user->tinh_thanh->CssStyle = "";
			$user->tinh_thanh->CssClass = "";
			$user->tinh_thanh->ViewCustomAttributes = "";

			// quan_huyen
			$user->quan_huyen->ViewValue = $user->quan_huyen->CurrentValue;
			$user->quan_huyen->CssStyle = "";
			$user->quan_huyen->CssClass = "";
			$user->quan_huyen->ViewCustomAttributes = "";

			// gioi_thieu
			$user->gioi_thieu->ViewValue = $user->gioi_thieu->CurrentValue;
			$user->gioi_thieu->CssStyle = "";
			$user->gioi_thieu->CssClass = "";
			$user->gioi_thieu->ViewCustomAttributes = "";

			// nick_yahoo
			$user->nick_yahoo->ViewValue = $user->nick_yahoo->CurrentValue;
			$user->nick_yahoo->CssStyle = "";
			$user->nick_yahoo->CssClass = "";
			$user->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$user->nick_skype->ViewValue = $user->nick_skype->CurrentValue;
			$user->nick_skype->CssStyle = "";
			$user->nick_skype->CssClass = "";
			$user->nick_skype->ViewCustomAttributes = "";

			// kieu_giaodien
			if (strval($user->kieu_giaodien->CurrentValue) <> "") {
				switch ($user->kieu_giaodien->CurrentValue) {
					case "1":
						$user->kieu_giaodien->ViewValue = "Giao dien 1";
						break;
					case "2":
						$user->kieu_giaodien->ViewValue = "Giao dien 2";
						break;
					case "3":
						$user->kieu_giaodien->ViewValue = "Giao dien 3";
						break;
					default:
						$user->kieu_giaodien->ViewValue = $user->kieu_giaodien->CurrentValue;
				}
			} else {
				$user->kieu_giaodien->ViewValue = NULL;
			}
			$user->kieu_giaodien->CssStyle = "";
			$user->kieu_giaodien->CssClass = "";
			$user->kieu_giaodien->ViewCustomAttributes = "";

			// nganhnghe_lienquan
			if (strval($user->nganhnghe_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $user->nganhnghe_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`nganhnghe_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->nganhnghe_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$user->nganhnghe_lienquan->ViewValue .= $rswrk->fields('nganhnghe_ten');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $user->nganhnghe_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$user->nganhnghe_lienquan->ViewValue = $user->nganhnghe_lienquan->CurrentValue;
				}
			} else {
				$user->nganhnghe_lienquan->ViewValue = NULL;
			}
			$user->nganhnghe_lienquan->CssStyle = "";
			$user->nganhnghe_lienquan->CssClass = "";
			$user->nganhnghe_lienquan->ViewCustomAttributes = "";

			// thitruong_lienquan
			if (strval($user->thitruong_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $user->thitruong_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `ten_thitruong` FROM `market` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`thitruong_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->thitruong_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$user->thitruong_lienquan->ViewValue .= $rswrk->fields('ten_thitruong');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $user->thitruong_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$user->thitruong_lienquan->ViewValue = $user->thitruong_lienquan->CurrentValue;
				}
			} else {
				$user->thitruong_lienquan->ViewValue = NULL;
			}
			$user->thitruong_lienquan->CssStyle = "";
			$user->thitruong_lienquan->CssClass = "";
			$user->thitruong_lienquan->ViewCustomAttributes = "";

			// tendangnhap
			$user->tendangnhap->HrefValue = "";

			// quocgia_id
			$user->quocgia_id->HrefValue = "";

			// gioi_tinh
			$user->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->HrefValue = "";

			// mat_khau
			$user->mat_khau->HrefValue = "";

			// ten_congty
			$user->ten_congty->HrefValue = "";

			// ten_viettat
			$user->ten_viettat->HrefValue = "";

			// logo_congty
			if (!is_null($user->logo_congty->Upload->DbValue)) {
				$user->logo_congty->HrefValue = "user_logo_congty_bv.php?nguoidung_id=" . $user->nguoidung_id->CurrentValue;
				if ($user->Export <> "") $user->logo_congty->HrefValue = ew_ConvertFullUrl($user->logo_congty->HrefValue);
			} else {
				$user->logo_congty->HrefValue = "";
			}

			// website
			$user->website->HrefValue = "";

			// chuc_nang
			$user->chuc_nang->HrefValue = "";

			// loaikinhdoanh_id
			$user->loaikinhdoanh_id->HrefValue = "";

			// loaicongty_id
			$user->loaicongty_id->HrefValue = "";

			// so_congnhan
			$user->so_congnhan->HrefValue = "";

			// nam_thanhlap
			$user->nam_thanhlap->HrefValue = "";

			// kim_ngach
			$user->kim_ngach->HrefValue = "";

			// cung_cap
			$user->cung_cap->HrefValue = "";

			// chung_chi
			$user->chung_chi->HrefValue = "";

			// so_dkkd
			$user->so_dkkd->HrefValue = "";

			// ngay_thamgia
			$user->ngay_thamgia->HrefValue = "";

			// ma_quocgia_dthoai
			$user->ma_quocgia_dthoai->HrefValue = "";

			// ma_vung_dthoai
			$user->ma_vung_dthoai->HrefValue = "";

			// so_dienthoai
			$user->so_dienthoai->HrefValue = "";

			// ma_quocgia_fax
			$user->ma_quocgia_fax->HrefValue = "";

			// ma_vung_fax
			$user->ma_vung_fax->HrefValue = "";

			// so_fax
			$user->so_fax->HrefValue = "";

			// dia_chi
			$user->dia_chi->HrefValue = "";

			// tinh_thanh
			$user->tinh_thanh->HrefValue = "";

			// quan_huyen
			$user->quan_huyen->HrefValue = "";

			// gioi_thieu
			$user->gioi_thieu->HrefValue = "";

			// nick_yahoo
			$user->nick_yahoo->HrefValue = "";

			// nick_skype
			$user->nick_skype->HrefValue = "";

			// kieu_giaodien
			$user->kieu_giaodien->HrefValue = "";

			// nganhnghe_lienquan
			$user->nganhnghe_lienquan->HrefValue = "";

			// thitruong_lienquan
			$user->thitruong_lienquan->HrefValue = "";
		} elseif ($user->RowType == EW_ROWTYPE_ADD) { // Add row

			// tendangnhap
			$user->tendangnhap->EditCustomAttributes = "";
			$user->tendangnhap->EditValue = ew_HtmlEncode($user->tendangnhap->CurrentValue);

			// quocgia_id
			$user->quocgia_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `country`";
			if (trim(strval($user->quocgia_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`quocgia_id` = '" . ew_AdjustSql($user->quocgia_id->CurrentValue) . "'";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$user->quocgia_id->EditValue = $arwrk;

			// gioi_tinh
			$user->gioi_tinh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Nam");
			$arwrk[] = array("1", "Nu");
			array_unshift($arwrk, array("", "Chọn"));
			$user->gioi_tinh->EditValue = $arwrk;

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->EditCustomAttributes = "";
			$user->hoten_nguoilienhe->EditValue = ew_HtmlEncode($user->hoten_nguoilienhe->CurrentValue);

			// mat_khau
			$user->mat_khau->EditCustomAttributes = "";
			$user->mat_khau->EditValue = ew_HtmlEncode($user->mat_khau->CurrentValue);

			// ten_congty
			$user->ten_congty->EditCustomAttributes = "";
			$user->ten_congty->EditValue = ew_HtmlEncode($user->ten_congty->CurrentValue);

			// ten_viettat
			$user->ten_viettat->EditCustomAttributes = "";
			$user->ten_viettat->EditValue = ew_HtmlEncode($user->ten_viettat->CurrentValue);

			// logo_congty
			$user->logo_congty->EditCustomAttributes = "";
			if (!is_null($user->logo_congty->Upload->DbValue)) {
				$user->logo_congty->EditValue = "Logo Congty";
			} else {
				$user->logo_congty->EditValue = "";
			}

			// website
			$user->website->EditCustomAttributes = "";
			$user->website->EditValue = ew_HtmlEncode($user->website->CurrentValue);

			// chuc_nang
			$user->chuc_nang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Nguoi ban");
			$arwrk[] = array("2", "Nguoi mua");
			$arwrk[] = array("3", "Nguoi ban va Nguoi mua");
			array_unshift($arwrk, array("", "Chọn"));
			$user->chuc_nang->EditValue = $arwrk;

			// loaikinhdoanh_id
			$user->loaikinhdoanh_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `loaikinhdoanh_id`, `loaikinhdoanh_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `type_business`";
			if (trim(strval($user->loaikinhdoanh_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`loaikinhdoanh_id` = " . ew_AdjustSql($user->loaikinhdoanh_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$user->loaikinhdoanh_id->EditValue = $arwrk;

			// loaicongty_id
			$user->loaicongty_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `loaicongty_id`, `loaicongty_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `type_company`";
			if (trim(strval($user->loaicongty_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`loaicongty_id` = " . ew_AdjustSql($user->loaicongty_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$user->loaicongty_id->EditValue = $arwrk;

			// so_congnhan
			$user->so_congnhan->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Duoi 5 nguoi");
			$arwrk[] = array("2", "Tu 5 den 10 nguoi");
			$arwrk[] = array("3", "Tu 11 den 50 nguoi");
			$arwrk[] = array("4", "Tu 51 den 100 nguoi");
			$arwrk[] = array("5", "Tu 101 den 500 nguoi");
			$arwrk[] = array("6", "Tu 501 den 1000 nguoi");
			$arwrk[] = array("7", "Tren 1000 nguoi");
			array_unshift($arwrk, array("", "Chọn"));
			$user->so_congnhan->EditValue = $arwrk;

			// nam_thanhlap
			$user->nam_thanhlap->EditCustomAttributes = "";
			$user->nam_thanhlap->EditValue = ew_HtmlEncode($user->nam_thanhlap->CurrentValue);

			// kim_ngach
			$user->kim_ngach->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Duoi 1 trieu USD");
			$arwrk[] = array("2", "Tren 100 trieu USD");
			$arwrk[] = array("3", "Tu 1 den 2.5 trieu USD");
			$arwrk[] = array("4", "Tu 2.5 den 5 trieu USD");
			$arwrk[] = array("5", "Tu 5 den 10 trieu USD");
			$arwrk[] = array("6", "Tu 10 den 50 trieu USD");
			$arwrk[] = array("7", "Tu 50 den 100 trieu USD");
			array_unshift($arwrk, array("", "Chọn"));
			$user->kim_ngach->EditValue = $arwrk;

			// cung_cap
			$user->cung_cap->EditCustomAttributes = "";
			$user->cung_cap->EditValue = ew_HtmlEncode($user->cung_cap->CurrentValue);

			// chung_chi
			$user->chung_chi->EditCustomAttributes = "";
			$user->chung_chi->EditValue = ew_HtmlEncode($user->chung_chi->CurrentValue);

			// so_dkkd
			$user->so_dkkd->EditCustomAttributes = "";
			$user->so_dkkd->EditValue = ew_HtmlEncode($user->so_dkkd->CurrentValue);

			// ngay_thamgia
			// ma_quocgia_dthoai

			$user->ma_quocgia_dthoai->EditCustomAttributes = "";
			$user->ma_quocgia_dthoai->EditValue = ew_HtmlEncode($user->ma_quocgia_dthoai->CurrentValue);

			// ma_vung_dthoai
			$user->ma_vung_dthoai->EditCustomAttributes = "";
			$user->ma_vung_dthoai->EditValue = ew_HtmlEncode($user->ma_vung_dthoai->CurrentValue);

			// so_dienthoai
			$user->so_dienthoai->EditCustomAttributes = "";
			$user->so_dienthoai->EditValue = ew_HtmlEncode($user->so_dienthoai->CurrentValue);

			// ma_quocgia_fax
			$user->ma_quocgia_fax->EditCustomAttributes = "";
			$user->ma_quocgia_fax->EditValue = ew_HtmlEncode($user->ma_quocgia_fax->CurrentValue);

			// ma_vung_fax
			$user->ma_vung_fax->EditCustomAttributes = "";
			$user->ma_vung_fax->EditValue = ew_HtmlEncode($user->ma_vung_fax->CurrentValue);

			// so_fax
			$user->so_fax->EditCustomAttributes = "";
			$user->so_fax->EditValue = ew_HtmlEncode($user->so_fax->CurrentValue);

			// dia_chi
			$user->dia_chi->EditCustomAttributes = "";
			$user->dia_chi->EditValue = ew_HtmlEncode($user->dia_chi->CurrentValue);

			// tinh_thanh
			$user->tinh_thanh->EditCustomAttributes = "";
			$user->tinh_thanh->EditValue = ew_HtmlEncode($user->tinh_thanh->CurrentValue);

			// quan_huyen
			$user->quan_huyen->EditCustomAttributes = "";
			$user->quan_huyen->EditValue = ew_HtmlEncode($user->quan_huyen->CurrentValue);

			// gioi_thieu
			$user->gioi_thieu->EditCustomAttributes = "";
			$user->gioi_thieu->EditValue = ew_HtmlEncode($user->gioi_thieu->CurrentValue);

			// nick_yahoo
			$user->nick_yahoo->EditCustomAttributes = "";
			$user->nick_yahoo->EditValue = ew_HtmlEncode($user->nick_yahoo->CurrentValue);

			// nick_skype
			$user->nick_skype->EditCustomAttributes = "";
			$user->nick_skype->EditValue = ew_HtmlEncode($user->nick_skype->CurrentValue);

			// kieu_giaodien
			$user->kieu_giaodien->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Giao dien 1");
			$arwrk[] = array("2", "Giao dien 2");
			$arwrk[] = array("3", "Giao dien 3");
			array_unshift($arwrk, array("", "Chọn"));
			$user->kieu_giaodien->EditValue = $arwrk;

			// nganhnghe_lienquan
			$user->nganhnghe_lienquan->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$user->nganhnghe_lienquan->EditValue = $arwrk;

			// thitruong_lienquan
			$user->thitruong_lienquan->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `thitruong_id`, `ten_thitruong`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `market`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$user->thitruong_lienquan->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$user->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $user;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($user->logo_congty->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($user->logo_congty->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($user->logo_congty->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($user->tendangnhap->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Tendangnhap";
		}
		if ($user->gioi_tinh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Gioi Tinh";
		}
		if ($user->mat_khau->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Mat Khau";
		}
		if (!ew_CheckInteger($user->nam_thanhlap->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Nam Thanhlap";
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

	// Add record
	function AddRow() {
		global $conn, $Security, $user;
		if ($user->tendangnhap->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(tendangnhap = '" . ew_AdjustSql($user->tendangnhap->CurrentValue) . "')";
			$rsChk = $user->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "tendangnhap", "Duplicate value '%v' for unique index '%f'");
				$sIdxErrMsg = str_replace("%v", $user->tendangnhap->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// Field tendangnhap
		$user->tendangnhap->SetDbValueDef($user->tendangnhap->CurrentValue, "");
		$rsnew['tendangnhap'] =& $user->tendangnhap->DbValue;

		// Field quocgia_id
		$user->quocgia_id->SetDbValueDef($user->quocgia_id->CurrentValue, VN);
		$rsnew['quocgia_id'] =& $user->quocgia_id->DbValue;

		// Field gioi_tinh
		$user->gioi_tinh->SetDbValueDef($user->gioi_tinh->CurrentValue, 0);
		$rsnew['gioi_tinh'] =& $user->gioi_tinh->DbValue;

		// Field hoten_nguoilienhe
		$user->hoten_nguoilienhe->SetDbValueDef($user->hoten_nguoilienhe->CurrentValue, "");
		$rsnew['hoten_nguoilienhe'] =& $user->hoten_nguoilienhe->DbValue;

		// Field mat_khau
		$user->mat_khau->SetDbValueDef($user->mat_khau->CurrentValue, "");
		$rsnew['mat_khau'] =& $user->mat_khau->DbValue;

		// Field ten_congty
		$user->ten_congty->SetDbValueDef($user->ten_congty->CurrentValue, "");
		$rsnew['ten_congty'] =& $user->ten_congty->DbValue;

		// Field ten_viettat
		$user->ten_viettat->SetDbValueDef($user->ten_viettat->CurrentValue, NULL);
		$rsnew['ten_viettat'] =& $user->ten_viettat->DbValue;

		// Field logo_congty
		$user->logo_congty->Upload->SaveToSession(); // Save file value to Session
		if (is_null($user->logo_congty->Upload->Value)) {
			$rsnew['logo_congty'] = NULL;	
		} else {
			$rsnew['logo_congty'] = $user->logo_congty->Upload->Value;
		}

		// Field website
		$user->website->SetDbValueDef($user->website->CurrentValue, NULL);
		$rsnew['website'] =& $user->website->DbValue;

		// Field chuc_nang
		$user->chuc_nang->SetDbValueDef($user->chuc_nang->CurrentValue, 0);
		$rsnew['chuc_nang'] =& $user->chuc_nang->DbValue;

		// Field loaikinhdoanh_id
		$user->loaikinhdoanh_id->SetDbValueDef($user->loaikinhdoanh_id->CurrentValue, 0);
		$rsnew['loaikinhdoanh_id'] =& $user->loaikinhdoanh_id->DbValue;

		// Field loaicongty_id
		$user->loaicongty_id->SetDbValueDef($user->loaicongty_id->CurrentValue, 0);
		$rsnew['loaicongty_id'] =& $user->loaicongty_id->DbValue;

		// Field so_congnhan
		$user->so_congnhan->SetDbValueDef($user->so_congnhan->CurrentValue, 0);
		$rsnew['so_congnhan'] =& $user->so_congnhan->DbValue;

		// Field nam_thanhlap
		$user->nam_thanhlap->SetDbValueDef($user->nam_thanhlap->CurrentValue, 0);
		$rsnew['nam_thanhlap'] =& $user->nam_thanhlap->DbValue;

		// Field kim_ngach
		$user->kim_ngach->SetDbValueDef($user->kim_ngach->CurrentValue, 0);
		$rsnew['kim_ngach'] =& $user->kim_ngach->DbValue;

		// Field cung_cap
		$user->cung_cap->SetDbValueDef($user->cung_cap->CurrentValue, NULL);
		$rsnew['cung_cap'] =& $user->cung_cap->DbValue;

		// Field chung_chi
		$user->chung_chi->SetDbValueDef($user->chung_chi->CurrentValue, NULL);
		$rsnew['chung_chi'] =& $user->chung_chi->DbValue;

		// Field so_dkkd
		$user->so_dkkd->SetDbValueDef($user->so_dkkd->CurrentValue, NULL);
		$rsnew['so_dkkd'] =& $user->so_dkkd->DbValue;

		// Field ngay_thamgia
		$user->ngay_thamgia->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['ngay_thamgia'] =& $user->ngay_thamgia->DbValue;

		// Field ma_quocgia_dthoai
		$user->ma_quocgia_dthoai->SetDbValueDef($user->ma_quocgia_dthoai->CurrentValue, NULL);
		$rsnew['ma_quocgia_dthoai'] =& $user->ma_quocgia_dthoai->DbValue;

		// Field ma_vung_dthoai
		$user->ma_vung_dthoai->SetDbValueDef($user->ma_vung_dthoai->CurrentValue, NULL);
		$rsnew['ma_vung_dthoai'] =& $user->ma_vung_dthoai->DbValue;

		// Field so_dienthoai
		$user->so_dienthoai->SetDbValueDef($user->so_dienthoai->CurrentValue, NULL);
		$rsnew['so_dienthoai'] =& $user->so_dienthoai->DbValue;

		// Field ma_quocgia_fax
		$user->ma_quocgia_fax->SetDbValueDef($user->ma_quocgia_fax->CurrentValue, NULL);
		$rsnew['ma_quocgia_fax'] =& $user->ma_quocgia_fax->DbValue;

		// Field ma_vung_fax
		$user->ma_vung_fax->SetDbValueDef($user->ma_vung_fax->CurrentValue, NULL);
		$rsnew['ma_vung_fax'] =& $user->ma_vung_fax->DbValue;

		// Field so_fax
		$user->so_fax->SetDbValueDef($user->so_fax->CurrentValue, NULL);
		$rsnew['so_fax'] =& $user->so_fax->DbValue;

		// Field dia_chi
		$user->dia_chi->SetDbValueDef($user->dia_chi->CurrentValue, "");
		$rsnew['dia_chi'] =& $user->dia_chi->DbValue;

		// Field tinh_thanh
		$user->tinh_thanh->SetDbValueDef($user->tinh_thanh->CurrentValue, NULL);
		$rsnew['tinh_thanh'] =& $user->tinh_thanh->DbValue;

		// Field quan_huyen
		$user->quan_huyen->SetDbValueDef($user->quan_huyen->CurrentValue, NULL);
		$rsnew['quan_huyen'] =& $user->quan_huyen->DbValue;

		// Field gioi_thieu
		$user->gioi_thieu->SetDbValueDef($user->gioi_thieu->CurrentValue, NULL);
		$rsnew['gioi_thieu'] =& $user->gioi_thieu->DbValue;

		// Field nick_yahoo
		$user->nick_yahoo->SetDbValueDef($user->nick_yahoo->CurrentValue, NULL);
		$rsnew['nick_yahoo'] =& $user->nick_yahoo->DbValue;

		// Field nick_skype
		$user->nick_skype->SetDbValueDef($user->nick_skype->CurrentValue, NULL);
		$rsnew['nick_skype'] =& $user->nick_skype->DbValue;
		
		// Field truycap_gannhat
		$user->truycap_gannhat->SetDbValueDef(ew_UnFormatDateTime($user->truycap_gannhat->CurrentValue, 7), ew_CurrentDateTime());
		$rsnew['truycap_gannhat'] =& $user->truycap_gannhat->DbValue;

		// Field kieu_giaodien
		$user->kieu_giaodien->SetDbValueDef($user->kieu_giaodien->CurrentValue, 0);
		$rsnew['kieu_giaodien'] =& $user->kieu_giaodien->DbValue;

		// Field nganhnghe_lienquan
		$user->nganhnghe_lienquan->SetDbValueDef($user->nganhnghe_lienquan->CurrentValue, NULL);
		$rsnew['nganhnghe_lienquan'] =& $user->nganhnghe_lienquan->DbValue;

		// Field thitruong_lienquan
		$user->thitruong_lienquan->SetDbValueDef($user->thitruong_lienquan->CurrentValue, NULL);
		$rsnew['thitruong_lienquan'] =& $user->thitruong_lienquan->DbValue;

		// Field nguoidung_id
		// Field UserLevelID

		if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['UserLevelID'] = CurrentUserID();
		}

		// Call Row Inserting event
		$bInsertRow = $user->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field logo_congty
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($user->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($user->CancelMessage <> "") {
				$this->setMessage($user->CancelMessage);
				$user->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$user->nguoidung_id->setDbValue($conn->Insert_ID());
			$rsnew['nguoidung_id'] =& $user->nguoidung_id->DbValue;

			// Call Row Inserted event
			$user->Row_Inserted($rsnew);
		}

		// Field logo_congty
		$user->logo_congty->Upload->RemoveFromSession(); // Remove file value from Session
		return $AddRow;
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
