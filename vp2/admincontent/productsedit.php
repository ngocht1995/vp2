<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "productsinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "securimage.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$products_edit = new cproducts_edit();
$Page =& $products_edit;

// Page init processing
$products_edit->Page_Init();

// Page main processing
$products_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--
function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;


   for (i = 0; i < sText.length && IsNumber == true; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) == -1)
         {
         IsNumber = false;
         }
      }
      var Number_ = parseInt(sText);
   if (Number_<1000) {IsNumber = false;}
   return IsNumber;

   }
// Create page object
var products_edit = new ew_Page("products_edit");

// page properties
products_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = products_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
products_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_ten_sanpham"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập tên sản phẩm");
		elm = fobj.elements["x" + infix + "_nganhnghe_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa chọn loại sản phẩm");
		elm = fobj.elements["x" + infix + "_nhan_hieu"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập nhãn hiệu");
		elm = fobj.elements["x" + infix + "_tomtat_sanpham"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập tóm tắt sản phẩm");
		elm = fobj.elements["x" + infix + "_soluong_tonkho"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Chưa nhập số lượng nhỏ nhất");
		elm = fobj.elements["x" + infix + "_xuat_su"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập xuất sứ");
		elm = fobj.elements["x" + infix + "_comment_status"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Trạng thái bình luận sản phẩm");
		elm = fobj.elements["x" + infix + "_don_gia"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Đơn giá");
		elm = fobj.elements["x" + infix + "_thanhtoan_status"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Trạng thái thanh toán");
		elm = fobj.elements["x" + infix + "_soluong_tonkho"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Số lượng tồn kho");
		elm = fobj.elements["x" + infix + "_km_date_begin"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Sai định dạng ngày tháng");
		elm = fobj.elements["x" + infix + "_km_date_end"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Sai định dạng ngày tháng");
		elm = fobj.elements["x" + infix + "_anh_to"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "Sai định dang file ảnh.");
		elm = fobj.elements["x" + infix + "_anh_nho"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "Sai định dang file ảnh.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
products_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
products_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
products_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
products_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
			var inst;
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.focus();
		}
	}


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
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $products->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa thông tin sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $products_edit->ShowMessage() ?>
<form name="fproductsedit" id="fproductsedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data">
<p>
<input type="hidden" name="a_table" id="a_table" value="products">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($products->ten_sanpham->Visible) { // ten_sanpham ?>
	<tr<?php echo $products->ten_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Tên sản phẩm<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->ten_sanpham->CellAttributes() ?>><span id="el_ten_sanpham">
<input type="text" name="x_ten_sanpham" id="x_ten_sanpham" size="100" maxlength="255" value="<?php echo $products->ten_sanpham->EditValue ?>"<?php echo $products->ten_sanpham->EditAttributes() ?>>
</span><?php echo $products->ten_sanpham->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->ma_sanpham->Visible) { // ma_sanpham ?>
	<tr<?php echo $products->ma_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Mã số</td>
		<td<?php echo $products->ma_sanpham->CellAttributes() ?>><span id="el_ma_sanpham">
<input type="text" name="x_ma_sanpham" id="x_ma_sanpham" size="30" maxlength="20" value="<?php echo $products->ma_sanpham->EditValue ?>"<?php echo $products->ma_sanpham->EditAttributes() ?>>
</span><?php echo $products->ma_sanpham->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->anh_to->Visible) { // anh_to ?>
	<tr<?php echo $products->anh_to->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh lớn</td>
		<td<?php echo $products->anh_to->CellAttributes() ?>><span id="el_anh_to">
<div id="old_x_anh_to">
<?php if ($products->anh_to->HrefValue <> "") { ?>
<?php if (!is_null($products->anh_to->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $products->anh_to->Upload->DbValue ?>" border=0<?php echo $products->anh_to->ViewAttributes() ?>>
<?php } elseif (!in_array($products->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($products->anh_to->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $products->anh_to->Upload->DbValue ?>" border=0<?php echo $products->anh_to->ViewAttributes() ?>>
<?php } elseif (!in_array($products->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_anh_to">
<?php if (!is_null($products->anh_to->Upload->DbValue)) { ?>
<input type="radio" name="a_anh_to" id="a_anh_to" value="1" checked="checked">Giữ lại&nbsp;
<input type="radio" name="a_anh_to" id="a_anh_to" value="2">Xóa&nbsp;
<input type="radio" name="a_anh_to" id="a_anh_to" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_anh_to" id="a_anh_to" value="3">
<?php } ?>
<input type="file" name="x_anh_to" id="x_anh_to" size="30" onchange="if (this.form.a_anh_to[2]) this.form.a_anh_to[2].checked=true;"<?php echo $products->anh_to->EditAttributes() ?>>
</div>
</span><?php echo $products->anh_to->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->anh_nho->Visible) { // anh_nho ?>
	<tr<?php echo $products->anh_nho->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh nhỏ</td>
		<td<?php echo $products->anh_nho->CellAttributes() ?>><span id="el_anh_nho">
<div id="old_x_anh_nho">
<?php if ($products->anh_nho->HrefValue <> "") { ?>
<?php if (!is_null($products->anh_nho->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $products->anh_nho->Upload->DbValue ?>" border=0<?php echo $products->anh_nho->ViewAttributes() ?>>
<?php } elseif (!in_array($products->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($products->anh_nho->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $products->anh_nho->Upload->DbValue ?>" border=0<?php echo $products->anh_nho->ViewAttributes() ?>>
<?php } elseif (!in_array($products->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_anh_nho">
<?php if (!is_null($products->anh_nho->Upload->DbValue)) { ?>
<input type="radio" name="a_anh_nho" id="a_anh_nho" value="1" checked="checked">Giữ lại&nbsp;
<input type="radio" name="a_anh_nho" id="a_anh_nho" value="2">Xóa&nbsp;
<input type="radio" name="a_anh_nho" id="a_anh_nho" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_anh_nho" id="a_anh_nho" value="3">
<?php } ?>
<input type="file" name="x_anh_nho" id="x_anh_nho" size="30" onchange="if (this.form.a_anh_nho[2]) this.form.a_anh_nho[2].checked=true;"<?php echo $products->anh_nho->EditAttributes() ?>>
</div>
</span><?php echo $products->anh_nho->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $products->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Loại sản phẩm<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->nganhnghe_id->CellAttributes() ?>><span id="el_nganhnghe_id">
<select id="x_nganhnghe_id" name="x_nganhnghe_id"<?php echo $products->nganhnghe_id->EditAttributes() ?>>
<?php
if (is_array($products->nganhnghe_id->EditValue)) {
	$arwrk = $products->nganhnghe_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->nganhnghe_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->nganhnghe_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->chung_nhan->Visible) { // chung_nhan ?>
	<tr<?php echo $products->chung_nhan->RowAttributes ?>>
		<td class="ewTableHeader">Chứng nhận chất lượng</td>
		<td<?php echo $products->chung_nhan->CellAttributes() ?>><span id="el_chung_nhan">
<input type="text" name="x_chung_nhan" id="x_chung_nhan" size="100" maxlength="255" value="<?php echo $products->chung_nhan->EditValue ?>"<?php echo $products->chung_nhan->EditAttributes() ?>>
</span><?php echo $products->chung_nhan->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->nhan_hieu->Visible) { // nhan_hieu ?>
	<tr<?php echo $products->nhan_hieu->RowAttributes ?>>
		<td class="ewTableHeader">Nhãn hiệu<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->nhan_hieu->CellAttributes() ?>><span id="el_nhan_hieu">
<input type="text" name="x_nhan_hieu" id="x_nhan_hieu" size="100" maxlength="255" value="<?php echo $products->nhan_hieu->EditValue ?>"<?php echo $products->nhan_hieu->EditAttributes() ?>>
</span><?php echo $products->nhan_hieu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->tomtat_sanpham->Visible) { // tomtat_sanpham ?>
	<tr<?php echo $products->tomtat_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->tomtat_sanpham->CellAttributes() ?>><span id="el_tomtat_sanpham">
<textarea name="x_tomtat_sanpham" id="x_tomtat_sanpham" cols="160" rows="4"<?php echo $products->tomtat_sanpham->EditAttributes() ?>><?php echo $products->tomtat_sanpham->EditValue ?></textarea>
</span><?php echo $products->tomtat_sanpham->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->noidung_sanpham->Visible) { // noidung_sanpham ?>
	<tr<?php echo $products->noidung_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->noidung_sanpham->CellAttributes() ?>><span id="el_noidung_sanpham">
<textarea name="x_noidung_sanpham" id="x_noidung_sanpham" cols="160" rows="12"<?php echo $products->noidung_sanpham->EditAttributes() ?>><?php echo $products->noidung_sanpham->EditValue ?></textarea>

</span><?php echo $products->noidung_sanpham->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->loai_tien->Visible) { // loai_tien ?>
	<tr<?php echo $products->loai_tien->RowAttributes ?>>
		<td class="ewTableHeader">Loại tiền</td>
		<td<?php echo $products->loai_tien->CellAttributes() ?>><span id="el_loai_tien">
<select id="x_loai_tien" name="x_loai_tien"<?php echo $products->loai_tien->EditAttributes() ?>>
<?php
if (is_array($products->loai_tien->EditValue)) {
	$arwrk = $products->loai_tien->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->loai_tien->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->loai_tien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->donvi_tinh->Visible) { // donvi_tinh ?>
	<tr<?php echo $products->donvi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Đơn vị tính</td>
		<td<?php echo $products->donvi_tinh->CellAttributes() ?>><span id="el_donvi_tinh">
<input type="text" name="x_donvi_tinh" id="x_donvi_tinh" size="30" maxlength="50" value="<?php echo $products->donvi_tinh->EditValue ?>"<?php echo $products->donvi_tinh->EditAttributes() ?>>
</span><?php echo $products->donvi_tinh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->gia_xuatcang->Visible) { // gia_xuatcang ?>
	<tr<?php echo $products->gia_xuatcang->RowAttributes ?>>
		<td class="ewTableHeader">Giá xuất cảng</td>
		<td<?php echo $products->gia_xuatcang->CellAttributes() ?>><span id="el_gia_xuatcang">
<select id="x_gia_xuatcang" name="x_gia_xuatcang"<?php echo $products->gia_xuatcang->EditAttributes() ?>>
<?php
if (is_array($products->gia_xuatcang->EditValue)) {
	$arwrk = $products->gia_xuatcang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->gia_xuatcang->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->gia_xuatcang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->phuongthuc_ttoan->Visible) { // phuongthuc_ttoan ?>
	<tr<?php echo $products->phuongthuc_ttoan->RowAttributes ?>>
		<td class="ewTableHeader">Phương thức TT</td>
		<td<?php echo $products->phuongthuc_ttoan->CellAttributes() ?>><span id="el_phuongthuc_ttoan">
<div id="tp_x_phuongthuc_ttoan" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_phuongthuc_ttoan[]" id="x_phuongthuc_ttoan[]" value="{value}"<?php echo $products->phuongthuc_ttoan->EditAttributes() ?>></div>
<div id="dsl_x_phuongthuc_ttoan" repeatcolumn="10">
<?php
$arwrk = $products->phuongthuc_ttoan->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($products->phuongthuc_ttoan->CurrentValue));
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
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 10, 1) ?>
<label><input type="checkbox" name="x_phuongthuc_ttoan[]" id="x_phuongthuc_ttoan[]" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $products->phuongthuc_ttoan->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 10, 2) ?>
<?php
	}
}
?>
</div>
<?php
$sSqlWrk = "SELECT `Payment_id`, `Payment_name`, '' AS Disp2Fld FROM `payment`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_phuongthuc_ttoan" id="s_x_phuongthuc_ttoan" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_phuongthuc_ttoan" id="lft_x_phuongthuc_ttoan" value="">
</span><?php echo $products->phuongthuc_ttoan->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->thoihan_giaohang->Visible) { // thoihan_giaohang ?>
	<tr<?php echo $products->thoihan_giaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn giao hàng</td>
		<td<?php echo $products->thoihan_giaohang->CellAttributes() ?>><span id="el_thoihan_giaohang">
<input type="text" name="x_thoihan_giaohang" id="x_thoihan_giaohang" size="100" maxlength="255" value="<?php echo $products->thoihan_giaohang->EditValue ?>"<?php echo $products->thoihan_giaohang->EditAttributes() ?>>
</span><?php echo $products->thoihan_giaohang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->xuat_su->Visible) { // xuat_su ?>
	<tr<?php echo $products->xuat_su->RowAttributes ?>>
		<td class="ewTableHeader">Nơi sản xuất<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->xuat_su->CellAttributes() ?>><span id="el_xuat_su">
<select id="x_xuat_su" name="x_xuat_su"<?php echo $products->xuat_su->EditAttributes() ?>>
<?php
if (is_array($products->xuat_su->EditValue)) {
	$arwrk = $products->xuat_su->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->xuat_su->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->xuat_su->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->comment_status->Visible) { // comment_status ?>
	<tr<?php echo $products->comment_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái bình luận<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->comment_status->CellAttributes() ?>><span id="el_comment_status">
<select id="x_comment_status" name="x_comment_status"<?php echo $products->comment_status->EditAttributes() ?>>
<?php
if (is_array($products->comment_status->EditValue)) {
	$arwrk = $products->comment_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->comment_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->comment_status->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->don_gia->Visible) { // don_gia ?>
	<tr<?php echo $products->don_gia->RowAttributes ?>>
		<td class="ewTableHeader">Đơn giá</td>
		<td<?php echo $products->don_gia->CellAttributes() ?>><span id="el_don_gia">
<input type="text" name="x_don_gia" id="x_don_gia" size="30" value="<?php echo $products->don_gia->EditValue ?>"<?php echo $products->don_gia->EditAttributes() ?>>
</span><?php echo $products->don_gia->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->thanhtoan_status->Visible) { // thanhtoan_status ?>
	<tr<?php echo $products->thanhtoan_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái thanh toán<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $products->thanhtoan_status->CellAttributes() ?>><span id="el_thanhtoan_status">
<select id="x_thanhtoan_status" name="x_thanhtoan_status"<?php echo $products->thanhtoan_status->EditAttributes() ?>>
<?php
if (is_array($products->thanhtoan_status->EditValue)) {
	$arwrk = $products->thanhtoan_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->thanhtoan_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->thanhtoan_status->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->soluong_tonkho->Visible) { // soluong_tonkho ?>
	<tr<?php echo $products->soluong_tonkho->RowAttributes ?>>
		<td class="ewTableHeader">Số lượng tồn kho</td>
		<td<?php echo $products->soluong_tonkho->CellAttributes() ?>><span id="el_soluong_tonkho">
<input type="text" name="x_soluong_tonkho" id="x_soluong_tonkho" size="30" value="<?php echo $products->soluong_tonkho->EditValue ?>"<?php echo $products->soluong_tonkho->EditAttributes() ?>>
</span><?php echo $products->soluong_tonkho->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->khuyenmai_status->Visible) { // khuyenmai_status ?>
	<tr<?php echo $products->khuyenmai_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái khuyến mại</td>
		<td<?php echo $products->khuyenmai_status->CellAttributes() ?>><span id="el_khuyenmai_status">
<select id="x_khuyenmai_status" name="x_khuyenmai_status"<?php echo $products->khuyenmai_status->EditAttributes() ?>>
<?php
if (is_array($products->khuyenmai_status->EditValue)) {
	$arwrk = $products->khuyenmai_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->khuyenmai_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $products->khuyenmai_status->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->km_date_begin->Visible) { // km_date_begin ?>
	<tr<?php echo $products->km_date_begin->RowAttributes ?>>
		<td class="ewTableHeader">Ngày bắt đầu khuyến mại</td>
		<td<?php echo $products->km_date_begin->CellAttributes() ?>><span id="el_km_date_begin">
<input type="text" name="x_km_date_begin" id="x_km_date_begin" value="<?php echo $products->km_date_begin->EditValue ?>"<?php echo $products->km_date_begin->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_km_date_begin" name="cal_x_km_date_begin" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_km_date_begin", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_km_date_begin" // ID of the button
});
</script>
</span><?php echo $products->km_date_begin->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($products->km_date_end->Visible) { // km_date_end ?>
	<tr<?php echo $products->km_date_end->RowAttributes ?>>
		<td class="ewTableHeader">Ngày kết thúc khuyến mại</td>
		<td<?php echo $products->km_date_end->CellAttributes() ?>><span id="el_km_date_end">
<input type="text" name="x_km_date_end" id="x_km_date_end" value="<?php echo $products->km_date_end->EditValue ?>"<?php echo $products->km_date_end->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_km_date_end" name="cal_x_km_date_end" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_km_date_end", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_km_date_end" // ID of the button
});
</script>
</span><?php echo $products->km_date_end->CustomMsg ?></td>
	</tr>
<?php } ?>
        <tr>
<td class="ewTableHeader">Mã xác nhận</td>
	<td>
		<img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" align="absmiddle" border="0"></a><br>
		<a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" size="30" maxlength="4">
	</td>
        </tr>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_sanpham_id" id="x_sanpham_id" value="<?php echo ew_HtmlEncode($products->sanpham_id->CurrentValue) ?>">
<p>
<input type="button" name="btnAction" id="btnAction" value="   Sửa   " onclick="ew_SubmitForm(products_edit, this.form);">
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_phuongthuc_ttoan[]','x_phuongthuc_ttoan[]',false]]);

//-->
</script>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

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
class cproducts_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'products';

	// Page Object Name
	var $PageObjName = 'products_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $products;
		if ($products->UseTokenInUrl) $PageUrl .= "t=" . $products->TableVar . "&"; // add page token
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
		global $objForm, $products;
		if ($products->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($products->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($products->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cproducts_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["products"] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'products', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $products;
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
			$this->Page_Terminate("productslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("productslist.php");
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

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $products;

		// Load key from QueryString
		if (@$_GET["sanpham_id"] <> "")
			$products->sanpham_id->setQueryStringValue($_GET["sanpham_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$products->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$products->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$products->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($products->sanpham_id->CurrentValue == "")
			$this->Page_Terminate("productslist.php"); // Invalid key, return to list
		switch ($products->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("productslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$products->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Đã cập nhật"); // Update success
					$sReturnUrl = $products->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "productsview.php")
						$sReturnUrl = $products->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$products->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $products;

		// Get upload data
			if ($products->anh_to->Upload->UploadFile()) {

				// No action required
			} else {
				echo $products->anh_to->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
			if ($products->anh_nho->Upload->UploadFile()) {

				// No action required
			} else {
				echo $products->anh_nho->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $products;
		$products->ten_sanpham->setFormValue($objForm->GetValue("x_ten_sanpham"));
		$products->ma_sanpham->setFormValue($objForm->GetValue("x_ma_sanpham"));
		$products->nganhnghe_id->setFormValue($objForm->GetValue("x_nganhnghe_id"));
		$products->chung_nhan->setFormValue($objForm->GetValue("x_chung_nhan"));
		$products->nhan_hieu->setFormValue($objForm->GetValue("x_nhan_hieu"));
		$products->tomtat_sanpham->setFormValue($objForm->GetValue("x_tomtat_sanpham"));
		$products->noidung_sanpham->setFormValue($objForm->GetValue("x_noidung_sanpham"));
		$products->loai_tien->setFormValue($objForm->GetValue("x_loai_tien"));
		$products->donvi_tinh->setFormValue($objForm->GetValue("x_donvi_tinh"));
		$products->gia_xuatcang->setFormValue($objForm->GetValue("x_gia_xuatcang"));
		$products->phuongthuc_ttoan->setFormValue($objForm->GetValue("x_phuongthuc_ttoan"));
		$products->thoihan_giaohang->setFormValue($objForm->GetValue("x_thoihan_giaohang"));
		$products->soluong_tonkho->setFormValue($objForm->GetValue("x_soluong_tonkho"));
		$products->tg_suasanpham->setFormValue($objForm->GetValue("x_tg_suasanpham"));
		$products->tg_suasanpham->CurrentValue = ew_UnFormatDateTime($products->tg_suasanpham->CurrentValue, 7);
		$products->xuat_su->setFormValue($objForm->GetValue("x_xuat_su"));
		$products->comment_status->setFormValue($objForm->GetValue("x_comment_status"));
		$products->don_gia->setFormValue($objForm->GetValue("x_don_gia"));
		$products->thanhtoan_status->setFormValue($objForm->GetValue("x_thanhtoan_status"));
		$products->soluong_tonkho->setFormValue($objForm->GetValue("x_soluong_tonkho"));
		$products->khuyenmai_status->setFormValue($objForm->GetValue("x_khuyenmai_status"));
		$products->km_date_begin->setFormValue($objForm->GetValue("x_km_date_begin"));
		$products->km_date_begin->CurrentValue = ew_UnFormatDateTime($products->km_date_begin->CurrentValue, 7);
		$products->km_date_end->setFormValue($objForm->GetValue("x_km_date_end"));
		$products->km_date_end->CurrentValue = ew_UnFormatDateTime($products->km_date_end->CurrentValue, 7);
		$products->sanpham_id->setFormValue($objForm->GetValue("x_sanpham_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $products;
		$products->sanpham_id->CurrentValue = $products->sanpham_id->FormValue;
		$this->LoadRow();
		$products->ten_sanpham->CurrentValue = $products->ten_sanpham->FormValue;
		$products->ma_sanpham->CurrentValue = $products->ma_sanpham->FormValue;
		$products->nganhnghe_id->CurrentValue = $products->nganhnghe_id->FormValue;
		$products->chung_nhan->CurrentValue = $products->chung_nhan->FormValue;
		$products->nhan_hieu->CurrentValue = $products->nhan_hieu->FormValue;
		$products->tomtat_sanpham->CurrentValue = $products->tomtat_sanpham->FormValue;
		$products->noidung_sanpham->CurrentValue = $products->noidung_sanpham->FormValue;
		$products->loai_tien->CurrentValue = $products->loai_tien->FormValue;
		$products->donvi_tinh->CurrentValue = $products->donvi_tinh->FormValue;
		$products->gia_xuatcang->CurrentValue = $products->gia_xuatcang->FormValue;
		$products->phuongthuc_ttoan->CurrentValue = $products->phuongthuc_ttoan->FormValue;
		$products->thoihan_giaohang->CurrentValue = $products->thoihan_giaohang->FormValue;
		$products->soluong_tonkho->CurrentValue = $products->soluong_tonkho->FormValue;
		$products->tg_suasanpham->CurrentValue = $products->tg_suasanpham->FormValue;
		$products->tg_suasanpham->CurrentValue = ew_UnFormatDateTime($products->tg_suasanpham->CurrentValue, 7);
		$products->xuat_su->CurrentValue = $products->xuat_su->FormValue;
		$products->comment_status->CurrentValue = $products->comment_status->FormValue;
		$products->don_gia->CurrentValue = $products->don_gia->FormValue;
		$products->thanhtoan_status->CurrentValue = $products->thanhtoan_status->FormValue;
		$products->soluong_tonkho->CurrentValue = $products->soluong_tonkho->FormValue;
		$products->khuyenmai_status->CurrentValue = $products->khuyenmai_status->FormValue;
		$products->km_date_begin->CurrentValue = $products->km_date_begin->FormValue;
		$products->km_date_begin->CurrentValue = ew_UnFormatDateTime($products->km_date_begin->CurrentValue, 7);
		$products->km_date_end->CurrentValue = $products->km_date_end->FormValue;
		$products->km_date_end->CurrentValue = ew_UnFormatDateTime($products->km_date_end->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $products;
		$sFilter = $products->KeyFilter();

		// Call Row Selecting event
		$products->Row_Selecting($sFilter);

		// Load sql based on filter
		$products->CurrentFilter = $sFilter;
		$sSql = $products->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$products->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $products;
		$products->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$products->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$products->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
		$products->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));
		$products->anh_to->Upload->DbValue = $rs->fields('anh_to');
		$products->anh_nho->Upload->DbValue = $rs->fields('anh_nho');
		$products->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$products->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$products->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$products->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$products->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$products->loai_tien->setDbValue($rs->fields('loai_tien'));
		$products->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$products->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$products->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$products->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$products->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$products->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$products->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$products->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$products->trang_thai->setDbValue($rs->fields('trang_thai'));
		$products->xuatban->setDbValue($rs->fields('xuatban'));
		$products->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
		$products->xuat_su->setDbValue($rs->fields('xuat_su'));
		$products->comment_status->setDbValue($rs->fields('comment_status'));
		$products->don_gia->setDbValue($rs->fields('don_gia'));
		$products->thanhtoan_status->setDbValue($rs->fields('thanhtoan_status'));
		$products->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$products->khuyenmai_status->setDbValue($rs->fields('khuyenmai_status'));
		$products->km_date_begin->setDbValue($rs->fields('km_date_begin'));
		$products->km_date_end->setDbValue($rs->fields('km_date_end'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $products;

		// Call Row_Rendering event
		$products->Row_Rendering();

		// Common render codes for all row types
		// ten_sanpham

		$products->ten_sanpham->CellCssStyle = "";
		$products->ten_sanpham->CellCssClass = "";

		// ma_sanpham
		$products->ma_sanpham->CellCssStyle = "";
		$products->ma_sanpham->CellCssClass = "";

		// anh_to
		$products->anh_to->CellCssStyle = "";
		$products->anh_to->CellCssClass = "";

		// anh_nho
		$products->anh_nho->CellCssStyle = "";
		$products->anh_nho->CellCssClass = "";

		// nganhnghe_id
		$products->nganhnghe_id->CellCssStyle = "";
		$products->nganhnghe_id->CellCssClass = "";

		// chung_nhan
		$products->chung_nhan->CellCssStyle = "";
		$products->chung_nhan->CellCssClass = "";

		// nhan_hieu
		$products->nhan_hieu->CellCssStyle = "";
		$products->nhan_hieu->CellCssClass = "";

		// tomtat_sanpham
		$products->tomtat_sanpham->CellCssStyle = "";
		$products->tomtat_sanpham->CellCssClass = "";

		// noidung_sanpham
		$products->noidung_sanpham->CellCssStyle = "";
		$products->noidung_sanpham->CellCssClass = "";

		// loai_tien
		$products->loai_tien->CellCssStyle = "";
		$products->loai_tien->CellCssClass = "";

		// donvi_tinh
		$products->donvi_tinh->CellCssStyle = "";
		$products->donvi_tinh->CellCssClass = "";

		// gia_xuatcang
		$products->gia_xuatcang->CellCssStyle = "";
		$products->gia_xuatcang->CellCssClass = "";

		// phuongthuc_ttoan
		$products->phuongthuc_ttoan->CellCssStyle = "";
		$products->phuongthuc_ttoan->CellCssClass = "";

		// thoihan_giaohang
		$products->thoihan_giaohang->CellCssStyle = "";
		$products->thoihan_giaohang->CellCssClass = "";

		// soluong_tonkho
		$products->soluong_tonkho->CellCssStyle = "";
		$products->soluong_tonkho->CellCssClass = "";

		// tg_suasanpham
		$products->tg_suasanpham->CellCssStyle = "";
		$products->tg_suasanpham->CellCssClass = "";

		// xuat_su
		$products->xuat_su->CellCssStyle = "";
		$products->xuat_su->CellCssClass = "";

		// comment_status
		$products->comment_status->CellCssStyle = "";
		$products->comment_status->CellCssClass = "";

		// don_gia
		$products->don_gia->CellCssStyle = "";
		$products->don_gia->CellCssClass = "";

		// thanhtoan_status
		$products->thanhtoan_status->CellCssStyle = "";
		$products->thanhtoan_status->CellCssClass = "";

		// soluong_tonkho
		$products->soluong_tonkho->CellCssStyle = "";
		$products->soluong_tonkho->CellCssClass = "";

		// khuyenmai_status
		$products->khuyenmai_status->CellCssStyle = "";
		$products->khuyenmai_status->CellCssClass = "";

		// km_date_begin
		$products->km_date_begin->CellCssStyle = "";
		$products->km_date_begin->CellCssClass = "";

		// km_date_end
		$products->km_date_end->CellCssStyle = "";
		$products->km_date_end->CellCssClass = "";
		if ($products->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_sanpham
			$products->ten_sanpham->ViewValue = $products->ten_sanpham->CurrentValue;
			$products->ten_sanpham->CssStyle = "";
			$products->ten_sanpham->CssClass = "";
			$products->ten_sanpham->ViewCustomAttributes = "";

			// ma_sanpham
			$products->ma_sanpham->ViewValue = $products->ma_sanpham->CurrentValue;
			$products->ma_sanpham->CssStyle = "";
			$products->ma_sanpham->CssClass = "";
			$products->ma_sanpham->ViewCustomAttributes = "";

			// anh_to
			if (!is_null($products->anh_to->Upload->DbValue)) {
				$products->anh_to->ViewValue = $products->anh_to->Upload->DbValue;
				$products->anh_to->ImageWidth = 300;
				$products->anh_to->ImageHeight = 0;
				$products->anh_to->ImageAlt = "";
			} else {
				$products->anh_to->ViewValue = "";
			}
			$products->anh_to->CssStyle = "";
			$products->anh_to->CssClass = "";
			$products->anh_to->ViewCustomAttributes = "";

			// anh_nho
			if (!is_null($products->anh_nho->Upload->DbValue)) {
				$products->anh_nho->ViewValue = $products->anh_nho->Upload->DbValue;
				$products->anh_nho->ImageWidth = 100;
				$products->anh_nho->ImageHeight = 0;
				$products->anh_nho->ImageAlt = "";
			} else {
				$products->anh_nho->ViewValue = "";
			}
			$products->anh_nho->CssStyle = "";
			$products->anh_nho->CssClass = "";
			$products->anh_nho->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($products->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($products->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$products->nganhnghe_id->ViewValue = $products->nganhnghe_id->CurrentValue;
				}
			} else {
				$products->nganhnghe_id->ViewValue = NULL;
			}
			$products->nganhnghe_id->CssStyle = "";
			$products->nganhnghe_id->CssClass = "";
			$products->nganhnghe_id->ViewCustomAttributes = "";

			// chung_nhan
			$products->chung_nhan->ViewValue = $products->chung_nhan->CurrentValue;
			$products->chung_nhan->CssStyle = "";
			$products->chung_nhan->CssClass = "";
			$products->chung_nhan->ViewCustomAttributes = "";

			// nhan_hieu
			$products->nhan_hieu->ViewValue = $products->nhan_hieu->CurrentValue;
			$products->nhan_hieu->CssStyle = "";
			$products->nhan_hieu->CssClass = "";
			$products->nhan_hieu->ViewCustomAttributes = "";

			// tomtat_sanpham
			$products->tomtat_sanpham->ViewValue = $products->tomtat_sanpham->CurrentValue;
			$products->tomtat_sanpham->CssStyle = "";
			$products->tomtat_sanpham->CssClass = "";
			$products->tomtat_sanpham->ViewCustomAttributes = "";

			// noidung_sanpham
			$products->noidung_sanpham->ViewValue = $products->noidung_sanpham->CurrentValue;
			$products->noidung_sanpham->CssStyle = "";
			$products->noidung_sanpham->CssClass = "";
			$products->noidung_sanpham->ViewCustomAttributes = "";

			// loai_tien
			if (strval($products->loai_tien->CurrentValue) <> "") {
				switch ($products->loai_tien->CurrentValue) {
					case "0":
						$products->loai_tien->ViewValue = "VND";
						break;
					case "1":
						$products->loai_tien->ViewValue = "USD";
						break;
					case "2":
						$products->loai_tien->ViewValue = "Khác";
						break;
					default:
						$products->loai_tien->ViewValue = $products->loai_tien->CurrentValue;
				}
			} else {
				$products->loai_tien->ViewValue = NULL;
			}
			$products->loai_tien->CssStyle = "";
			$products->loai_tien->CssClass = "";
			$products->loai_tien->ViewCustomAttributes = "";

			// donvi_tinh
			$products->donvi_tinh->ViewValue = $products->donvi_tinh->CurrentValue;
			$products->donvi_tinh->CssStyle = "";
			$products->donvi_tinh->CssClass = "";
			$products->donvi_tinh->ViewCustomAttributes = "";

			// gia_xuatcang
			if (strval($products->gia_xuatcang->CurrentValue) <> "") {
				switch ($products->gia_xuatcang->CurrentValue) {
					case "1":
						$products->gia_xuatcang->ViewValue = "CIF";
						break;
					case "2":
						$products->gia_xuatcang->ViewValue = "FOB";
						break;
					case "3":
						$products->gia_xuatcang->ViewValue = "Khác";
						break;
					default:
						$products->gia_xuatcang->ViewValue = $products->gia_xuatcang->CurrentValue;
				}
			} else {
				$products->gia_xuatcang->ViewValue = NULL;
			}
			$products->gia_xuatcang->CssStyle = "";
			$products->gia_xuatcang->CssClass = "";
			$products->gia_xuatcang->ViewCustomAttributes = "";

			// phuongthuc_ttoan
			if (strval($products->phuongthuc_ttoan->CurrentValue) <> "") {
				$arwrk = explode(",", $products->phuongthuc_ttoan->CurrentValue);
				$sSqlWrk = "SELECT `Payment_name` FROM `payment` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`Payment_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->phuongthuc_ttoan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$products->phuongthuc_ttoan->ViewValue .= $rswrk->fields('Payment_name');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $products->phuongthuc_ttoan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$products->phuongthuc_ttoan->ViewValue = $products->phuongthuc_ttoan->CurrentValue;
				}
			} else {
				$products->phuongthuc_ttoan->ViewValue = NULL;
			}
			$products->phuongthuc_ttoan->CssStyle = "";
			$products->phuongthuc_ttoan->CssClass = "";
			$products->phuongthuc_ttoan->ViewCustomAttributes = "";

			// thoihan_giaohang
			$products->thoihan_giaohang->ViewValue = $products->thoihan_giaohang->CurrentValue;
			$products->thoihan_giaohang->CssStyle = "";
			$products->thoihan_giaohang->CssClass = "";
			$products->thoihan_giaohang->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// tg_suasanpham
			$products->tg_suasanpham->ViewValue = $products->tg_suasanpham->CurrentValue;
			$products->tg_suasanpham->ViewValue = ew_FormatDateTime($products->tg_suasanpham->ViewValue, 7);
			$products->tg_suasanpham->CssStyle = "";
			$products->tg_suasanpham->CssClass = "";
			$products->tg_suasanpham->ViewCustomAttributes = "";

			// sanpham_tieubieu
			if (strval($products->sanpham_tieubieu->CurrentValue) <> "") {
				switch ($products->sanpham_tieubieu->CurrentValue) {
					case "0":
						$products->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$products->sanpham_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$products->sanpham_tieubieu->ViewValue = $products->sanpham_tieubieu->CurrentValue;
				}
			} else {
				$products->sanpham_tieubieu->ViewValue = NULL;
			}
			$products->sanpham_tieubieu->CssStyle = "";
			$products->sanpham_tieubieu->CssClass = "";
			$products->sanpham_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			if (strval($products->xuat_su->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($products->xuat_su->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->xuat_su->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$products->xuat_su->ViewValue = $products->xuat_su->CurrentValue;
				}
			} else {
				$products->xuat_su->ViewValue = NULL;
			}
			$products->xuat_su->CssStyle = "";
			$products->xuat_su->CssClass = "";
			$products->xuat_su->ViewCustomAttributes = "";

			// comment_status
			if (strval($products->comment_status->CurrentValue) <> "") {
				switch ($products->comment_status->CurrentValue) {
					case "0":
						$products->comment_status->ViewValue = "Không bình luận";
						break;
					case "1":
						$products->comment_status->ViewValue = "Cho bình luận";
						break;
					default:
						$products->comment_status->ViewValue = $products->comment_status->CurrentValue;
				}
			} else {
				$products->comment_status->ViewValue = NULL;
			}
			$products->comment_status->CssStyle = "";
			$products->comment_status->CssClass = "";
			$products->comment_status->ViewCustomAttributes = "";

			// don_gia
			$products->don_gia->ViewValue = $products->don_gia->CurrentValue;
			$products->don_gia->CssStyle = "";
			$products->don_gia->CssClass = "";
			$products->don_gia->ViewCustomAttributes = "";

			// thanhtoan_status
			if (strval($products->thanhtoan_status->CurrentValue) <> "") {
				switch ($products->thanhtoan_status->CurrentValue) {
					case "0":
						$products->thanhtoan_status->ViewValue = "Không thanh toán trực tuyến";
						break;
					case "1":
						$products->thanhtoan_status->ViewValue = "Có thanh toán trực tuyến";
						break;
					default:
						$products->thanhtoan_status->ViewValue = $products->thanhtoan_status->CurrentValue;
				}
			} else {
				$products->thanhtoan_status->ViewValue = NULL;
			}
			$products->thanhtoan_status->CssStyle = "";
			$products->thanhtoan_status->CssClass = "";
			$products->thanhtoan_status->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// khuyenmai_status
			if (strval($products->khuyenmai_status->CurrentValue) <> "") {
				switch ($products->khuyenmai_status->CurrentValue) {
					case "0":
						$products->khuyenmai_status->ViewValue = "Không khuyến mại";
						break;
					case "1":
						$products->khuyenmai_status->ViewValue = "Có khuyến mại";
						break;
					default:
						$products->khuyenmai_status->ViewValue = $products->khuyenmai_status->CurrentValue;
				}
			} else {
				$products->khuyenmai_status->ViewValue = NULL;
			}
			$products->khuyenmai_status->CssStyle = "";
			$products->khuyenmai_status->CssClass = "";
			$products->khuyenmai_status->ViewCustomAttributes = "";

			// km_date_begin
			$products->km_date_begin->ViewValue = $products->km_date_begin->CurrentValue;
			$products->km_date_begin->ViewValue = ew_FormatDateTime($products->km_date_begin->ViewValue, 7);
			$products->km_date_begin->CssStyle = "";
			$products->km_date_begin->CssClass = "";
			$products->km_date_begin->ViewCustomAttributes = "";

			// km_date_end
			$products->km_date_end->ViewValue = $products->km_date_end->CurrentValue;
			$products->km_date_end->ViewValue = ew_FormatDateTime($products->km_date_end->ViewValue, 7);
			$products->km_date_end->CssStyle = "";
			$products->km_date_end->CssClass = "";
			$products->km_date_end->ViewCustomAttributes = "";

			// ten_sanpham
			$products->ten_sanpham->HrefValue = "";

			// ma_sanpham
			$products->ma_sanpham->HrefValue = "";

			// anh_to
			$products->anh_to->HrefValue = "";

			// anh_nho
			$products->anh_nho->HrefValue = "";

			// nganhnghe_id
			$products->nganhnghe_id->HrefValue = "";

			// chung_nhan
			$products->chung_nhan->HrefValue = "";

			// nhan_hieu
			$products->nhan_hieu->HrefValue = "";

			// tomtat_sanpham
			$products->tomtat_sanpham->HrefValue = "";

			// noidung_sanpham
			$products->noidung_sanpham->HrefValue = "";

			// loai_tien
			$products->loai_tien->HrefValue = "";

			// donvi_tinh
			$products->donvi_tinh->HrefValue = "";

			// gia_xuatcang
			$products->gia_xuatcang->HrefValue = "";

			// phuongthuc_ttoan
			$products->phuongthuc_ttoan->HrefValue = "";

			// thoihan_giaohang
			$products->thoihan_giaohang->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// tg_suasanpham
			$products->tg_suasanpham->HrefValue = "";

			// xuat_su
			$products->xuat_su->HrefValue = "";

			// comment_status
			$products->comment_status->HrefValue = "";

			// don_gia
			$products->don_gia->HrefValue = "";

			// thanhtoan_status
			$products->thanhtoan_status->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// khuyenmai_status
			$products->khuyenmai_status->HrefValue = "";

			// km_date_begin
			$products->km_date_begin->HrefValue = "";

			// km_date_end
			$products->km_date_end->HrefValue = "";
		} elseif ($products->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ten_sanpham
			$products->ten_sanpham->EditCustomAttributes = "";
			$products->ten_sanpham->EditValue = ew_HtmlEncode($products->ten_sanpham->CurrentValue);

			// ma_sanpham
			$products->ma_sanpham->EditCustomAttributes = "";
			$products->ma_sanpham->EditValue = ew_HtmlEncode($products->ma_sanpham->CurrentValue);

			// anh_to
			$products->anh_to->EditCustomAttributes = "";
			if (!is_null($products->anh_to->Upload->DbValue)) {
				$products->anh_to->EditValue = $products->anh_to->Upload->DbValue;
				$products->anh_to->ImageWidth = 300;
				$products->anh_to->ImageHeight = 0;
				$products->anh_to->ImageAlt = "";
			} else {
				$products->anh_to->EditValue = "";
			}

			// anh_nho
			$products->anh_nho->EditCustomAttributes = "";
			if (!is_null($products->anh_nho->Upload->DbValue)) {
				$products->anh_nho->EditValue = $products->anh_nho->Upload->DbValue;
				$products->anh_nho->ImageWidth = 100;
				$products->anh_nho->ImageHeight = 0;
				$products->anh_nho->ImageAlt = "";
			} else {
				$products->anh_nho->EditValue = "";
			}

			// nganhnghe_id
			$products->nganhnghe_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
                        if (trim(strval($products->nganhnghe_id->CurrentValue)) == "") {
				$sWhereWrk = "nganhnghe_belongto=-1";
			} else {
				$sWhereWrk = "`nganhnghe_id` = " . ew_AdjustSql($products->nganhnghe_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$sSqlWrk1 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
			$sWhereWrk1 = "nganhnghe_belongto=0";
			if ($sWhereWrk1 <> "") $sSqlWrk1 .= " WHERE $sWhereWrk1";
			$rswrk1 = $conn->Execute($sSqlWrk1);
			while (!$rswrk1->EOF){
			array_push($arwrk, array($rswrk1->fields['nganhnghe_id'], "-".$rswrk1->fields['nganhnghe_ten']));			$sSqlWrk2 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
				$sWhereWrk2 = "nganhnghe_belongto=".$rswrk1->fields['nganhnghe_id'];
				if ($sWhereWrk2 <> "") $sSqlWrk2 .= " WHERE $sWhereWrk2";
			$rswrk2 = $conn->Execute($sSqlWrk2);
			while (!$rswrk2->EOF){
			array_push($arwrk, array($rswrk2->fields['nganhnghe_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['nganhnghe_ten']));
				$rswrk2->MoveNext();
				}
				if ($rswrk2) $rswrk2->Close();
				$rswrk1->MoveNext();
						}

			array_unshift($arwrk, array("", "Chọn ngành nghề liên quan"));
			$products->nganhnghe_id->EditValue = $arwrk;

			// chung_nhan
			$products->chung_nhan->EditCustomAttributes = "";
			$products->chung_nhan->EditValue = ew_HtmlEncode($products->chung_nhan->CurrentValue);

			// nhan_hieu
			$products->nhan_hieu->EditCustomAttributes = "";
			$products->nhan_hieu->EditValue = ew_HtmlEncode($products->nhan_hieu->CurrentValue);

			// tomtat_sanpham
			$products->tomtat_sanpham->EditCustomAttributes = "";
			$products->tomtat_sanpham->EditValue = ew_HtmlEncode($products->tomtat_sanpham->CurrentValue);

			// noidung_sanpham
			$products->noidung_sanpham->EditCustomAttributes = "";
			$products->noidung_sanpham->EditValue = ew_HtmlEncode($products->noidung_sanpham->CurrentValue);

			// loai_tien
			$products->loai_tien->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "VND");
			$arwrk[] = array("1", "USD");
			$arwrk[] = array("2", "Khác");
			array_unshift($arwrk, array("", "Chọn"));
			$products->loai_tien->EditValue = $arwrk;

			// donvi_tinh
			$products->donvi_tinh->EditCustomAttributes = "";
			$products->donvi_tinh->EditValue = ew_HtmlEncode($products->donvi_tinh->CurrentValue);

			// gia_xuatcang
			$products->gia_xuatcang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "CIF");
			$arwrk[] = array("2", "FOB");
			$arwrk[] = array("3", "Khác");
			array_unshift($arwrk, array("", "Chọn"));
			$products->gia_xuatcang->EditValue = $arwrk;

			// phuongthuc_ttoan
			$products->phuongthuc_ttoan->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `Payment_id`, `Payment_name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `payment`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$products->phuongthuc_ttoan->EditValue = $arwrk;

			// thoihan_giaohang
			$products->thoihan_giaohang->EditCustomAttributes = "";
			$products->thoihan_giaohang->EditValue = ew_HtmlEncode($products->thoihan_giaohang->CurrentValue);

			// soluong_tonkho
			$products->soluong_tonkho->EditCustomAttributes = "";
			$products->soluong_tonkho->EditValue = ew_HtmlEncode($products->soluong_tonkho->CurrentValue);

			// tg_suasanpham
			// xuat_su

			$products->xuat_su->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `country`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$products->xuat_su->EditValue = $arwrk;

			// comment_status
			$products->comment_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không bình luận");
			$arwrk[] = array("1", "Cho bình luận");
			array_unshift($arwrk, array("", "Chọn"));
			$products->comment_status->EditValue = $arwrk;

			// don_gia
			$products->don_gia->EditCustomAttributes = "";
			$products->don_gia->EditValue = ew_HtmlEncode($products->don_gia->CurrentValue);

			// thanhtoan_status
			$products->thanhtoan_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không thanh toán trực tuyến");
			$arwrk[] = array("1", "Có thanh toán trực tuyến");
			array_unshift($arwrk, array("", "Chọn"));
			$products->thanhtoan_status->EditValue = $arwrk;

			// soluong_tonkho
			$products->soluong_tonkho->EditCustomAttributes = "";
			$products->soluong_tonkho->EditValue = ew_HtmlEncode($products->soluong_tonkho->CurrentValue);

			// khuyenmai_status
			$products->khuyenmai_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không khuyến mại");
			$arwrk[] = array("1", "CÓ khuyến mại");
			array_unshift($arwrk, array("", "Chọn"));
			$products->khuyenmai_status->EditValue = $arwrk;

			// km_date_begin
			$products->km_date_begin->EditCustomAttributes = "";
			$products->km_date_begin->EditValue = ew_HtmlEncode(ew_FormatDateTime($products->km_date_begin->CurrentValue, 7));

			// km_date_end
			$products->km_date_end->EditCustomAttributes = "";
			$products->km_date_end->EditValue = ew_HtmlEncode(ew_FormatDateTime($products->km_date_end->CurrentValue, 7));

			// Edit refer script
			// ten_sanpham

			$products->ten_sanpham->HrefValue = "";

			// ma_sanpham
			$products->ma_sanpham->HrefValue = "";

			// anh_to
			$products->anh_to->HrefValue = "";

			// anh_nho
			$products->anh_nho->HrefValue = "";

			// nganhnghe_id
			$products->nganhnghe_id->HrefValue = "";

			// chung_nhan
			$products->chung_nhan->HrefValue = "";

			// nhan_hieu
			$products->nhan_hieu->HrefValue = "";

			// tomtat_sanpham
			$products->tomtat_sanpham->HrefValue = "";

			// noidung_sanpham
			$products->noidung_sanpham->HrefValue = "";

			// loai_tien
			$products->loai_tien->HrefValue = "";

			// donvi_tinh
			$products->donvi_tinh->HrefValue = "";

			// gia_xuatcang
			$products->gia_xuatcang->HrefValue = "";

			// phuongthuc_ttoan
			$products->phuongthuc_ttoan->HrefValue = "";

			// thoihan_giaohang
			$products->thoihan_giaohang->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// tg_suasanpham
			$products->tg_suasanpham->HrefValue = "";

			// xuat_su
			$products->xuat_su->HrefValue = "";

			// comment_status
			$products->comment_status->HrefValue = "";

			// don_gia
			$products->don_gia->HrefValue = "";

			// thanhtoan_status
			$products->thanhtoan_status->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// khuyenmai_status
			$products->khuyenmai_status->HrefValue = "";

			// km_date_begin
			$products->km_date_begin->HrefValue = "";

			// km_date_end
			$products->km_date_end->HrefValue = "";
		}

		// Call Row Rendered event
		$products->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $products,$conn;

		// Initialize
		$gsFormError = "";
                //check nganh hang
                $sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_belongto` FROM `career`";
		$sWhereWrk = "`nganhnghe_id` = " . ew_AdjustSql($products->nganhnghe_id->CurrentValue) . "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
                 if ($arwrk[0][1] == 0) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Loại sản phẩm phải thuộc danh mục ngành nghề cấp 2";
		}
		if (!ew_CheckFileType($products->anh_to->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Sai định dạng file ảnh.";
		}
		if ($products->anh_to->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($products->anh_to->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích cỡ ảnh vượt quá cho phép");
		}
		if (!ew_CheckFileType($products->anh_nho->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Sai định dạng file ảnh.";
		}
		if ($products->anh_nho->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($products->anh_nho->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích cỡ ảnh vượt quá cho phép");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($products->ten_sanpham->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - ten san pham";
		}
		if ($products->nganhnghe_id->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Loai sp";
		}
		if ($products->nhan_hieu->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Nhan Hieu";
		}
		if ($products->tomtat_sanpham->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Trich dan";
		}
		if (!ew_CheckInteger($products->soluong_tonkho->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Soluong Nhonhat";
		}
		if ($products->xuat_su->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Xuat Su";
		}
		if ($products->comment_status->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Comment Status";
		}
		if (!ew_CheckInteger($products->don_gia->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Don Gia";
		}
		if ($products->thanhtoan_status->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Thanhtoan Status";
		}
		if (!ew_CheckInteger($products->soluong_tonkho->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Soluong Tonkho";
		}
		if (!ew_CheckEuroDate($products->km_date_begin->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Km Date Begin";
		}
		if (!ew_CheckEuroDate($products->km_date_end->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Km Date End";
		}
$img = new Securimage();
  			$valid = $img->check($_POST['x_maxacnhan']);
  			if($valid == true) {

 			} else {
    			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Mã xác nhận không đúng";
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
		global $conn, $Security, $products;
		$sFilter = $products->KeyFilter();
		$products->CurrentFilter = $sFilter;
		$sSql = $products->SQL();
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

			// Field ten_sanpham
			$products->ten_sanpham->SetDbValueDef($products->ten_sanpham->CurrentValue, "");
			$rsnew['ten_sanpham'] =& $products->ten_sanpham->DbValue;

			// Field ma_sanpham
			$products->ma_sanpham->SetDbValueDef($products->ma_sanpham->CurrentValue, NULL);
			$rsnew['ma_sanpham'] =& $products->ma_sanpham->DbValue;

			// Field anh_to
			$products->anh_to->Upload->SaveToSession(); // Save file value to Session
			if ($products->anh_to->Upload->Action == "2" || $products->anh_to->Upload->Action == "3") { // Update/Remove
			$products->anh_to->Upload->DbValue = $rs->fields('anh_to'); // Get original value
			if (is_null($products->anh_to->Upload->Value)) {
				$rsnew['anh_to'] = NULL;
			} else {
				if ($products->anh_to->Upload->FileName == $products->anh_to->Upload->DbValue) { // Upload file name same as old file name
					$rsnew['anh_to'] = $products->anh_to->Upload->FileName;
				} else {
					$rsnew['anh_to'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH), $products->anh_to->Upload->FileName);
				}
			}
			}

			// Field anh_nho
			$products->anh_nho->Upload->SaveToSession(); // Save file value to Session
			if ($products->anh_nho->Upload->Action == "2" || $products->anh_nho->Upload->Action == "3") { // Update/Remove
			$products->anh_nho->Upload->DbValue = $rs->fields('anh_nho'); // Get original value
			if (is_null($products->anh_nho->Upload->Value)) {
				$rsnew['anh_nho'] = NULL;
			} else {
				if ($products->anh_nho->Upload->FileName == $products->anh_nho->Upload->DbValue) { // Upload file name same as old file name
					$rsnew['anh_nho'] = $products->anh_nho->Upload->FileName;
				} else {
					$rsnew['anh_nho'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH), $products->anh_nho->Upload->FileName);
				}
			}
			}

			// Field nganhnghe_id
			$products->nganhnghe_id->SetDbValueDef($products->nganhnghe_id->CurrentValue, NULL);
			$rsnew['nganhnghe_id'] =& $products->nganhnghe_id->DbValue;

			// Field chung_nhan
			$products->chung_nhan->SetDbValueDef($products->chung_nhan->CurrentValue, NULL);
			$rsnew['chung_nhan'] =& $products->chung_nhan->DbValue;

			// Field nhan_hieu
			$products->nhan_hieu->SetDbValueDef($products->nhan_hieu->CurrentValue, NULL);
			$rsnew['nhan_hieu'] =& $products->nhan_hieu->DbValue;

			// Field tomtat_sanpham
			$products->tomtat_sanpham->SetDbValueDef($products->tomtat_sanpham->CurrentValue, NULL);
			$rsnew['tomtat_sanpham'] =& $products->tomtat_sanpham->DbValue;

			// Field noidung_sanpham
			$products->noidung_sanpham->SetDbValueDef($products->noidung_sanpham->CurrentValue, NULL);
			$rsnew['noidung_sanpham'] =& $products->noidung_sanpham->DbValue;

			// Field loai_tien
			$products->loai_tien->SetDbValueDef($products->loai_tien->CurrentValue, NULL);
			$rsnew['loai_tien'] =& $products->loai_tien->DbValue;

			// Field donvi_tinh
			$products->donvi_tinh->SetDbValueDef($products->donvi_tinh->CurrentValue, NULL);
			$rsnew['donvi_tinh'] =& $products->donvi_tinh->DbValue;

			// Field gia_xuatcang
			$products->gia_xuatcang->SetDbValueDef($products->gia_xuatcang->CurrentValue, NULL);
			$rsnew['gia_xuatcang'] =& $products->gia_xuatcang->DbValue;

			// Field phuongthuc_ttoan
			$products->phuongthuc_ttoan->SetDbValueDef($products->phuongthuc_ttoan->CurrentValue, NULL);
			$rsnew['phuongthuc_ttoan'] =& $products->phuongthuc_ttoan->DbValue;

			// Field thoihan_giaohang
			$products->thoihan_giaohang->SetDbValueDef($products->thoihan_giaohang->CurrentValue, NULL);
			$rsnew['thoihan_giaohang'] =& $products->thoihan_giaohang->DbValue;

			// Field soluong_tonkho
			$products->soluong_tonkho->SetDbValueDef($products->soluong_tonkho->CurrentValue, NULL);
			$rsnew['soluong_tonkho'] =& $products->soluong_tonkho->DbValue;

			// Field tg_suasanpham
			$products->tg_suasanpham->SetDbValueDef(ew_CurrentDateTime(), NULL);
			$rsnew['tg_suasanpham'] =& $products->tg_suasanpham->DbValue;

			// Field xuat_su
			$products->xuat_su->SetDbValueDef($products->xuat_su->CurrentValue, NULL);
			$rsnew['xuat_su'] =& $products->xuat_su->DbValue;

			// Field comment_status
			$products->comment_status->SetDbValueDef($products->comment_status->CurrentValue, NULL);
			$rsnew['comment_status'] =& $products->comment_status->DbValue;

			// Field don_gia
			$products->don_gia->SetDbValueDef($products->don_gia->CurrentValue, NULL);
			$rsnew['don_gia'] =& $products->don_gia->DbValue;

			// Field thanhtoan_status
			$products->thanhtoan_status->SetDbValueDef($products->thanhtoan_status->CurrentValue, NULL);
			$rsnew['thanhtoan_status'] =& $products->thanhtoan_status->DbValue;

			// Field soluong_tonkho
			$products->soluong_tonkho->SetDbValueDef($products->soluong_tonkho->CurrentValue, NULL);
			$rsnew['soluong_tonkho'] =& $products->soluong_tonkho->DbValue;

			// Field khuyenmai_status
			$products->khuyenmai_status->SetDbValueDef($products->khuyenmai_status->CurrentValue, NULL);
			$rsnew['khuyenmai_status'] =& $products->khuyenmai_status->DbValue;

			// Field km_date_begin
			$products->km_date_begin->SetDbValueDef(ew_UnFormatDateTime($products->km_date_begin->CurrentValue, 7), NULL);
			$rsnew['km_date_begin'] =& $products->km_date_begin->DbValue;

			// Field km_date_end
			$products->km_date_end->SetDbValueDef(ew_UnFormatDateTime($products->km_date_end->CurrentValue, 7), NULL);
			$rsnew['km_date_end'] =& $products->km_date_end->DbValue;

			// Call Row Updating event
			$bUpdateRow = $products->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field anh_to
			if (!is_null($products->anh_to->Upload->Value)) {
				if ($products->anh_to->Upload->FileName == $products->anh_to->Upload->DbValue) { // Overwrite if same file name
					$products->anh_to->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_to'], TRUE);
					$products->anh_to->Upload->DbValue = ""; // No need to delete any more
				} else {
					$products->anh_to->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_to'], FALSE);
				}
			}
			if ($products->anh_to->Upload->Action == "2" || $products->anh_to->Upload->Action == "3") { // Update/Remove
				if ($products->anh_to->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $products->anh_to->Upload->DbValue);
			}

			// Field anh_nho
			if (!is_null($products->anh_nho->Upload->Value)) {
				if ($products->anh_nho->Upload->FileName == $products->anh_nho->Upload->DbValue) { // Overwrite if same file name
					$products->anh_nho->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_nho'], TRUE);
					$products->anh_nho->Upload->DbValue = ""; // No need to delete any more
				} else {
					$products->anh_nho->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_nho'], FALSE);
				}
			}
			if ($products->anh_nho->Upload->Action == "2" || $products->anh_nho->Upload->Action == "3") { // Update/Remove
				if ($products->anh_nho->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $products->anh_nho->Upload->DbValue);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($products->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($products->CancelMessage <> "") {
					$this->setMessage($products->CancelMessage);
					$products->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$products->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field anh_to
		$products->anh_to->Upload->RemoveFromSession(); // Remove file value from Session

		// Field anh_nho
		$products->anh_nho->Upload->RemoveFromSession(); // Remove file value from Session
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
