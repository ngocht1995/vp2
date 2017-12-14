<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "pic_productinfo.php" ?>
<?php include "productsinfo.php" ?>
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
$pic_product_list = new cpic_product_list();
$Page =& $pic_product_list;

// Page init processing
$pic_product_list->Page_Init();

// Page main processing
$pic_product_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($pic_product->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var pic_product_list = new ew_Page("pic_product_list");

// page properties
pic_product_list.PageID = "list"; // page ID
var EW_PAGE_ID = pic_product_list.PageID; // for backward compatibility

// extend page with ValidateForm function
pic_product_list.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_sanpham_pic"];
		aelm = fobj.elements["a" + infix + "_sanpham_pic"];
		var chk_sanpham_pic = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_sanpham_pic && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Nhập trường bắt buộc - Sanpham Pic");
		elm = fobj.elements["x" + infix + "_sanpham_pic"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
pic_product_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
pic_product_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
pic_product_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
pic_product_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($pic_product->Export == "") { ?>
<?php
$gsMasterReturnUrl = "productslist.php";
if ($pic_product_list->sDbMasterFilter <> "" && $pic_product->getCurrentMasterTable() == "products") {
	if ($pic_product_list->bMasterRecordExists) {
		if ($pic_product->getCurrentMasterTable() == $pic_product->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "productsmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($pic_product->Export == "" && $pic_product->SelectLimit);
	if (!$bSelectLimit)
		$rs = $pic_product_list->LoadRecordset();
	$pic_product_list->lTotalRecs = ($bSelectLimit) ? $pic_product->SelectRecordCount() : $rs->RecordCount();
	$pic_product_list->lStartRec = 1;
	if ($pic_product_list->lDisplayRecs <= 0) // Display all records
		$pic_product_list->lDisplayRecs = $pic_product_list->lTotalRecs;
	if (!($pic_product->ExportAll && $pic_product->Export <> ""))
		$pic_product_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $pic_product_list->LoadRecordset($pic_product_list->lStartRec-1, $pic_product_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Ảnh của sản phẩm</font></b></td>
								<td height="20" width="54%" >
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table><br>
<?php $pic_product_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($pic_product->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($pic_product->CurrentAction <> "gridadd" && $pic_product->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($pic_product_list->Pager)) $pic_product_list->Pager = new cNumericPager($pic_product_list->lStartRec, $pic_product_list->lDisplayRecs, $pic_product_list->lTotalRecs, $pic_product_list->lRecRange) ?>
<?php if ($pic_product_list->Pager->RecordCount > 0) { ?>
	<?php if ($pic_product_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($pic_product_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Ảnh từ <?php echo $pic_product_list->Pager->FromIndex ?> đến <?php echo $pic_product_list->Pager->ToIndex ?> của <?php echo $pic_product_list->Pager->RecordCount ?> ảnh
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($pic_product_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có ảnh
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($pic_product_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số ảnh hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="pic_product">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($pic_product_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($pic_product_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($pic_product_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($pic_product->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $pic_product_list->PageUrl() ?>a=add"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($pic_product_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fpic_productlist)) alert('Chưa chọn ảnh'); else {document.fpic_productlist.action='pic_productdelete.php';document.fpic_productlist.encoding='application/x-www-form-urlencoded';document.fpic_productlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fpic_productlist" id="fpic_productlist" class="ewForm" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="t" id="t" value="pic_product">
<?php if ($pic_product_list->lTotalRecs > 0 || $pic_product->CurrentAction == "add" || $pic_product->CurrentAction == "copy") { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$pic_product_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$pic_product_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$pic_product_list->lOptionCnt++; // Multi-select
}
	$pic_product_list->lOptionCnt += count($pic_product_list->ListOptions->Items); // Custom list options
?>
<?php echo $pic_product->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($pic_product->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<?php if ($pic_product_list->lOptionCnt == 0 && $pic_product->CurrentAction == "add") { ?>
<td style="white-space: nowrap; width: 30px">&nbsp;</td>
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 30px"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="pic_product_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($pic_product_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($pic_product->sanpham_pic->Visible) { // sanpham_pic ?>
	<?php if ($pic_product->SortUrl($pic_product->sanpham_pic) == "") { ?>
		<td>Ảnh sản phẩm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $pic_product->SortUrl($pic_product->sanpham_pic) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ảnh sản phẩm</td><td style="width: 10px;"><?php if ($pic_product->sanpham_pic->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($pic_product->sanpham_pic->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
	if ($pic_product->CurrentAction == "add" || $pic_product->CurrentAction == "copy") {
		$pic_product_list->lRowIndex = 1;
		if ($pic_product->CurrentAction == "add")
			$pic_product_list->LoadDefaultValues();
		if ($pic_product->EventCancelled) // Insert failed
			$pic_product_list->RestoreFormValues(); // Restore form values

		// Set row properties
		$pic_product->CssClass = "ewTableEditRow";
		$pic_product->CssStyle = "";
		$pic_product->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
		$pic_product->RowType = EW_ROWTYPE_ADD;

		// Render row
		$pic_product_list->RenderRow();
?>
	<tr<?php echo $pic_product->RowAttributes() ?>>
<td colspan="<?php echo $pic_product_list->lOptionCnt ?>" align="right"><span class="phpmaker">
<a href="" onclick="if (pic_product_list.ValidateForm(document.fpic_productlist)) document.fpic_productlist.submit();return false;">Thêm</a>&nbsp;<a href="<?php echo $pic_product_list->PageUrl() ?>a=cancel">Hủy</a>
<input type="hidden" name="a_list" id="a_list" value="insert">
</span></td>
	<?php if ($pic_product->sanpham_pic->Visible) { // sanpham_pic ?>
		<td>
<input type="file" name="x<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" id="x<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" size="30"<?php echo $pic_product->sanpham_pic->EditAttributes() ?>>
</div>
</td>
	<?php } ?>
	</tr>
<?php if (strval($pic_product->sanpham_id->getSessionValue()) <> "") { ?>
<input type="hidden" name="x_sanpham_id" id="x_sanpham_id" value="<?php echo ew_HtmlEncode(strval($pic_product->sanpham_id->getSessionValue())) ?>">
<?php } ?>
<?php
}
?>
<?php
if ($pic_product->ExportAll && $pic_product->Export <> "") {
	$pic_product_list->lStopRec = $pic_product_list->lTotalRecs;
} else {
	$pic_product_list->lStopRec = $pic_product_list->lStartRec + $pic_product_list->lDisplayRecs - 1; // Set the last record to display
}
$pic_product_list->lRecCount = $pic_product_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$pic_product->SelectLimit && $pic_product_list->lStartRec > 1)
		$rs->Move($pic_product_list->lStartRec - 1);
}
$pic_product_list->lRowCnt = 0;
$pic_product_list->lEditRowCnt = 0;
if ($pic_product->CurrentAction == "edit")
	$pic_product_list->lRowIndex = 1;
while (($pic_product->CurrentAction == "gridadd" || !$rs->EOF) &&
	$pic_product_list->lRecCount < $pic_product_list->lStopRec) {
	$pic_product_list->lRecCount++;
	if (intval($pic_product_list->lRecCount) >= intval($pic_product_list->lStartRec)) {
		$pic_product_list->lRowCnt++;

	// Init row class and style
	$pic_product->CssClass = "";
	$pic_product->CssStyle = "";
	$pic_product->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($pic_product->CurrentAction == "gridadd") {
		$pic_product_list->LoadDefaultValues(); // Load default values
	} else {
		$pic_product_list->LoadRowValues($rs); // Load row values
	}
	$pic_product->RowType = EW_ROWTYPE_VIEW; // Render view
	if ($pic_product->CurrentAction == "edit") {
		if ($pic_product_list->CheckInlineEditKey() && $pic_product_list->lEditRowCnt == 0) // Inline edit
			$pic_product->RowType = EW_ROWTYPE_EDIT; // Render edit
	}
	if ($pic_product->RowType == EW_ROWTYPE_EDIT && $pic_product->EventCancelled) { // Update failed
		if ($pic_product->CurrentAction == "edit")
			$pic_product_list->RestoreFormValues(); // Restore form values
	}
	if ($pic_product->RowType == EW_ROWTYPE_EDIT) { // Edit row
		$pic_product_list->lEditRowCnt++;
		$pic_product->RowClientEvents = "onmouseover='this.edit=true;ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	}
	if ($pic_product->RowType == EW_ROWTYPE_ADD || $pic_product->RowType == EW_ROWTYPE_EDIT) // Add / Edit row
			$pic_product->CssClass = "ewTableEditRow";

	// Render row
	$pic_product_list->RenderRow();
?>
	<tr<?php echo $pic_product->RowAttributes() ?>>
<?php if ($pic_product->RowType == EW_ROWTYPE_ADD || $pic_product->RowType == EW_ROWTYPE_EDIT) { ?>
<?php if ($pic_product->CurrentAction == "edit") { ?>
<td colspan="<?php echo $pic_product_list->lOptionCnt ?>" align="right"><span class="phpmaker">
<a href="" onclick="if (pic_product_list.ValidateForm(document.fpic_productlist)) document.fpic_productlist.submit();return false;">Cập nhật</a>&nbsp;<a href="<?php echo $pic_product_list->PageUrl() ?>a=cancel">Hủy</a>
<input type="hidden" name="a_list" id="a_list" value="update">
</span></td>
<?php } ?>
<?php } else { ?>
<?php if ($pic_product->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px"><span class="phpmaker">
<a href="<?php echo $pic_product->InlineEditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<?php if ($pic_product_list->lOptionCnt == 0 && $pic_product->CurrentAction == "add") { ?>
<td style="white-space: nowrap; width: 30px">&nbsp;</td>
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 30px"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($pic_product->anh_sanpham_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($pic_product_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
<?php } ?>
	<?php if ($pic_product->sanpham_pic->Visible) { // sanpham_pic ?>
		<td<?php echo $pic_product->sanpham_pic->CellAttributes() ?>>
<?php if ($pic_product->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<div id="old_x<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic">
<?php if ($pic_product->sanpham_pic->HrefValue <> "") { ?>
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $pic_product->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($pic_product->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $pic_product->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($pic_product->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic">
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<input type="radio" name="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" id="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" value="1" checked="checked">Giữ lại&nbsp;
<input type="radio" name="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" id="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" value="2" disabled="disabled">Xóa&nbsp;
<input type="radio" name="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" id="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" id="a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" value="3">
<?php } ?>
<input type="file" name="x<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" id="x<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic" size="30" onchange="if (this.form.a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic[2]) this.form.a<?php echo $pic_product_list->lRowIndex ?>_sanpham_pic[2].checked=true;"<?php echo $pic_product->sanpham_pic->EditAttributes() ?>>
</div>
<?php } ?>
<?php if ($pic_product->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<?php if ($pic_product->sanpham_pic->HrefValue <> "") { ?>
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $pic_product->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($pic_product->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $pic_product->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($pic_product->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
<?php if ($pic_product->RowType == EW_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $pic_product_list->lRowIndex ?>_anh_sanpham_id" id="x<?php echo $pic_product_list->lRowIndex ?>_anh_sanpham_id" value="<?php echo ew_HtmlEncode($pic_product->anh_sanpham_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	</tr>
<?php if ($pic_product->RowType == EW_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	if ($pic_product->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($pic_product->CurrentAction == "add" || $pic_product->CurrentAction == "copy") { ?>
<input type="hidden" name="key_count" id="key_count" value="<?php echo $pic_product_list->lRowIndex ?>">
<?php } ?>
<?php if ($pic_product->CurrentAction == "edit") { ?>
<input type="hidden" name="key_count" id="key_count" value="<?php echo $pic_product_list->lRowIndex ?>">
<?php } ?>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
</div>
<?php if ($pic_product_list->lTotalRecs > 0) { ?>
<?php if ($pic_product->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($pic_product->CurrentAction <> "gridadd" && $pic_product->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($pic_product_list->Pager)) $pic_product_list->Pager = new cNumericPager($pic_product_list->lStartRec, $pic_product_list->lDisplayRecs, $pic_product_list->lTotalRecs, $pic_product_list->lRecRange) ?>
<?php if ($pic_product_list->Pager->RecordCount > 0) { ?>
	<?php if ($pic_product_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($pic_product_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $pic_product_list->PageUrl() ?>start=<?php echo $pic_product_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($pic_product_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Ảnh từ <?php echo $pic_product_list->Pager->FromIndex ?> đến <?php echo $pic_product_list->Pager->ToIndex ?> của <?php echo $pic_product_list->Pager->RecordCount ?> ảnh
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($pic_product_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có ảnh
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($pic_product_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số ảnh hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="pic_product">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($pic_product_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($pic_product_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($pic_product_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($pic_product->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($pic_product_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $pic_product_list->PageUrl() ?>a=add"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($pic_product_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fpic_productlist)) alert('Chưa chọn ảnh'); else {document.fpic_productlist.action='pic_productdelete.php';document.fpic_productlist.encoding='application/x-www-form-urlencoded';document.fpic_productlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($pic_product->Export == "" && $pic_product->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(pic_product_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($pic_product->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cpic_product_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'pic_product';

	// Page Object Name
	var $PageObjName = 'pic_product_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $pic_product;
		if ($pic_product->UseTokenInUrl) $PageUrl .= "t=" . $pic_product->TableVar . "&"; // add page token
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
		global $objForm, $pic_product;
		if ($pic_product->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($pic_product->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($pic_product->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cpic_product_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["pic_product"] = new cpic_product();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'pic_product', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $pic_product;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("products");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$pic_product->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $pic_product->Export; // Get export parameter, used in header
	$gsExportFile = $pic_product->TableVar; // Get export file, used in header

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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $sSrchWhere;
	var $lRecCnt;
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex;
	var $lOptionCnt;
	var $lRecPerRow;
	var $lColCnt;
	var $sDeleteConfirmMsg; // Delete confirm message
	var $sDbMasterFilter;
	var $sDbDetailFilter;
	var $bMasterRecordExists;	
	var $ListOptions;
	var $sMultiSelectKey;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsSearchError, $Security, $pic_product;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter

		// Create form object
		$objForm = new cFormObj();
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Set up master detail parameters
			$this->SetUpMasterDetail();

			// Check QueryString parameters
			if (@$_GET["a"] <> "") {
				$pic_product->CurrentAction = $_GET["a"];

				// Clear inline mode
				if ($pic_product->CurrentAction == "cancel")
					$this->ClearInlineMode();

				// Switch to inline edit mode
				if ($pic_product->CurrentAction == "edit")
					$this->InlineEditMode();

				// Switch to inline add mode
				if ($pic_product->CurrentAction == "add" || $pic_product->CurrentAction == "copy")
					$this->InlineAddMode();
			} else {
				if (@$_POST["a_list"] <> "") {
					$pic_product->CurrentAction = $_POST["a_list"]; // Get action

					// Inline Update
					if ($pic_product->CurrentAction == "update" && @$_SESSION[EW_SESSION_INLINE_MODE] == "edit")
						$this->InlineUpdate();

					// Insert Inline
					if ($pic_product->CurrentAction == "insert" && @$_SESSION[EW_SESSION_INLINE_MODE] == "add")
						$this->InlineInsert();
				}
			}

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($pic_product->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $pic_product->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}

		// Restore master/detail filter
		$this->sDbMasterFilter = $pic_product->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $pic_product->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($pic_product->getCurrentMasterTable() == "products")
				$this->sDbMasterFilter = $pic_product->AddMasterUserIDFilter($this->sDbMasterFilter, "products"); // Add master User ID filter
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($pic_product->getMasterFilter() <> "" && $pic_product->getCurrentMasterTable() == "products") {
			global $products;
			$rsmaster = $products->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$pic_product->setMasterFilter(""); // Clear master filter
				$pic_product->setDetailFilter(""); // Clear detail filter
				$this->setMessage("No records found"); // Set no record found
				$this->Page_Terminate($pic_product->getReturnUrl()); // Return to caller
			} else {
				$products->LoadListRowValues($rsmaster);
				$products->RowType = EW_ROWTYPE_MASTER; // Master row
				$products->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$pic_product->setSessionWhere($sFilter);
		$pic_product->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $pic_product;
		$sWrk = @$_GET[EW_TABLE_REC_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->lDisplayRecs = intval($sWrk);
			} else {
				if (strtolower($sWrk) == "all") { // Display all records
					$this->lDisplayRecs = -1;
				} else {
					$this->lDisplayRecs = 20; // Non-numeric, load default
				}
			}
			$pic_product->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$pic_product->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Exit out of inline mode
	function ClearInlineMode() {
		global $pic_product;
		$pic_product->setKey("anh_sanpham_id", ""); // Clear inline edit key
		$pic_product->CurrentAction = ""; // Clear action
		$_SESSION[EW_SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Inline Edit Mode
	function InlineEditMode() {
		global $Security, $pic_product;
		if (!$Security->CanEdit())
			$this->Page_Terminate("login.php"); // Go to login page
		$bInlineEdit = TRUE;
		if (@$_GET["anh_sanpham_id"] <> "") {
			$pic_product->anh_sanpham_id->setQueryStringValue($_GET["anh_sanpham_id"]);
		} else {
			$bInlineEdit = FALSE;
		}
		if ($bInlineEdit) {
			if ($this->LoadRow()) {
				$pic_product->setKey("anh_sanpham_id", $pic_product->anh_sanpham_id->CurrentValue); // Set up inline edit key
				$_SESSION[EW_SESSION_INLINE_MODE] = "edit"; // Enable inline edit
			}
		}
	}

	// Perform update to inline edit record
	function InlineUpdate() {
		global $objForm, $gsFormError, $pic_product;
		$objForm->Index = 1; 
		$this->GetUploadFiles(); // Get upload files
		$this->LoadFormValues(); // Get form values

		// Validate Form
		$bInlineUpdate = TRUE;
		if (!$this->ValidateForm()) {	
			$bInlineUpdate = FALSE; // Form error, reset action
			$this->setMessage($gsFormError);
		} else {
			$bInlineUpdate = FALSE;	
			if ($this->CheckInlineEditKey()) { // Check key
				$pic_product->SendEmail = TRUE; // Send email on update success
				$bInlineUpdate = $this->EditRow(); // Update record
			} else {
				$bInlineUpdate = FALSE;
			}
		}
		if ($bInlineUpdate) { // Update success
			$this->setMessage("Đã cập nhật"); // Set success message
			$this->ClearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getMessage() == "")
				$this->setMessage("Update failed"); // Set update failed message
			$pic_product->EventCancelled = TRUE; // Cancel event
			$pic_product->CurrentAction = "edit"; // Stay in edit mode
		}
	}

	// Check inline edit key
	function CheckInlineEditKey() {
		global $pic_product;

		//CheckInlineEditKey = True
		if (strval($pic_product->getKey("anh_sanpham_id")) <> strval($pic_product->anh_sanpham_id->CurrentValue))
			return FALSE;
		return TRUE;
	}

	// Switch to Inline Add Mode
	function InlineAddMode() {
		global $Security, $pic_product;
		if (!$Security->CanAdd())
			$this->Page_Terminate("login.php"); // Return to login page
		$pic_product->CurrentAction = "add";
		$_SESSION[EW_SESSION_INLINE_MODE] = "add"; // Enable inline add
	}

	// Perform update to inline add/copy record
	function InlineInsert() {
		global $objForm, $gsFormError, $pic_product;
		$objForm->Index = 1;
		$this->GetUploadFiles(); // Get upload files
		$this->LoadFormValues(); // Get form values

		// Validate Form
		if (!$this->ValidateForm()) {
			$this->setMessage($gsFormError); // Set validation error message
			$pic_product->EventCancelled = TRUE; // Set event cancelled
			$pic_product->CurrentAction = "add"; // Stay in add mode
			return;
		}
		$pic_product->SendEmail = TRUE; // Send email on add success
		if ($this->AddRow()) { // Add record
			$this->setMessage("Đã thêm mới"); // Set add success message
			$this->ClearInlineMode(); // Clear inline add mode
		} else { // Add failed
			$pic_product->EventCancelled = TRUE; // Set event cancelled
			$pic_product->CurrentAction = "add"; // Stay in add mode
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $pic_product;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$pic_product->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$pic_product->CurrentOrderType = @$_GET["ordertype"];
			$pic_product->UpdateSort($pic_product->sanpham_pic); // Field 
			$pic_product->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $pic_product;
		$sOrderBy = $pic_product->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($pic_product->SqlOrderBy() <> "") {
				$sOrderBy = $pic_product->SqlOrderBy();
				$pic_product->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $pic_product;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$pic_product->getCurrentMasterTable = ""; // Clear master table
				$pic_product->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$pic_product->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$pic_product->sanpham_id->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$pic_product->setSessionOrderBy($sOrderBy);
				$pic_product->sanpham_pic->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$pic_product->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $pic_product;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$pic_product->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$pic_product->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $pic_product->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$pic_product->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$pic_product->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$pic_product->setStartRecordNumber($this->lStartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $pic_product;

		// Get upload data
			if ($pic_product->sanpham_pic->Upload->UploadFile()) {

				// No action required
			} else {
				echo $pic_product->sanpham_pic->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $pic_product;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $pic_product;
		$pic_product->anh_sanpham_id->setFormValue($objForm->GetValue("x_anh_sanpham_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $pic_product;
		$pic_product->anh_sanpham_id->CurrentValue = $pic_product->anh_sanpham_id->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $pic_product;

		// Call Recordset Selecting event
		$pic_product->Recordset_Selecting($pic_product->CurrentFilter);

		// Load list page SQL
		$sSql = $pic_product->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$pic_product->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $pic_product;
		$sFilter = $pic_product->KeyFilter();

		// Call Row Selecting event
		$pic_product->Row_Selecting($sFilter);

		// Load sql based on filter
		$pic_product->CurrentFilter = $sFilter;
		$sSql = $pic_product->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$pic_product->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $pic_product;
		$pic_product->anh_sanpham_id->setDbValue($rs->fields('anh_sanpham_id'));
		$pic_product->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic');
		$pic_product->sanpham_id->setDbValue($rs->fields('sanpham_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $pic_product;

		// Call Row_Rendering event
		$pic_product->Row_Rendering();

		// Common render codes for all row types
		// sanpham_pic

		$pic_product->sanpham_pic->CellCssStyle = "";
		$pic_product->sanpham_pic->CellCssClass = "";
		if ($pic_product->RowType == EW_ROWTYPE_VIEW) { // View row

			// anh_sanpham_id
			$pic_product->anh_sanpham_id->ViewValue = $pic_product->anh_sanpham_id->CurrentValue;
			$pic_product->anh_sanpham_id->CssStyle = "";
			$pic_product->anh_sanpham_id->CssClass = "";
			$pic_product->anh_sanpham_id->ViewCustomAttributes = "";

			// sanpham_pic
			if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) {
				$pic_product->sanpham_pic->ViewValue = $pic_product->sanpham_pic->Upload->DbValue;
				$pic_product->sanpham_pic->ImageWidth = 300;
				$pic_product->sanpham_pic->ImageHeight = 0;
				$pic_product->sanpham_pic->ImageAlt = "";
			} else {
				$pic_product->sanpham_pic->ViewValue = "";
			}
			$pic_product->sanpham_pic->CssStyle = "";
			$pic_product->sanpham_pic->CssClass = "";
			$pic_product->sanpham_pic->ViewCustomAttributes = "";

			// sanpham_id
			$pic_product->sanpham_id->ViewValue = $pic_product->sanpham_id->CurrentValue;
			$pic_product->sanpham_id->CssStyle = "";
			$pic_product->sanpham_id->CssClass = "";
			$pic_product->sanpham_id->ViewCustomAttributes = "";

			// sanpham_pic
			$pic_product->sanpham_pic->HrefValue = "";
		} elseif ($pic_product->RowType == EW_ROWTYPE_ADD) { // Add row

			// sanpham_pic
			$pic_product->sanpham_pic->EditCustomAttributes = "";
			if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) {
				$pic_product->sanpham_pic->EditValue = $pic_product->sanpham_pic->Upload->DbValue;
				$pic_product->sanpham_pic->ImageWidth = 300;
				$pic_product->sanpham_pic->ImageHeight = 0;
				$pic_product->sanpham_pic->ImageAlt = "";
			} else {
				$pic_product->sanpham_pic->EditValue = "";
			}
		} elseif ($pic_product->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// sanpham_pic
			$pic_product->sanpham_pic->EditCustomAttributes = "";
			if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) {
				$pic_product->sanpham_pic->EditValue = $pic_product->sanpham_pic->Upload->DbValue;
				$pic_product->sanpham_pic->ImageWidth = 300;
				$pic_product->sanpham_pic->ImageHeight = 0;
				$pic_product->sanpham_pic->ImageAlt = "";
			} else {
				$pic_product->sanpham_pic->EditValue = "";
			}

			// Edit refer script
			// sanpham_pic

			$pic_product->sanpham_pic->HrefValue = "";
		}

		// Call Row Rendered event
		$pic_product->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $pic_product;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($pic_product->sanpham_pic->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($pic_product->sanpham_pic->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($pic_product->sanpham_pic->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích cỡ ảnh vượt quá cho phép");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($pic_product->CurrentAction == "gridupdate" || $pic_product->CurrentAction == "update") {
			if ($pic_product->sanpham_pic->Upload->Action == "3" && is_null($pic_product->sanpham_pic->Upload->Value)) {
				$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Nhập trường bắt buộc - Sanpham Pic";
			}
		} elseif (is_null($pic_product->sanpham_pic->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Sanpham Pic";
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
		global $conn, $Security, $pic_product;
		$sFilter = $pic_product->KeyFilter();
		$pic_product->CurrentFilter = $sFilter;
		$sSql = $pic_product->SQL();
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

			// Field sanpham_pic
			$pic_product->sanpham_pic->Upload->SaveToSession(); // Save file value to Session
			if ($pic_product->sanpham_pic->Upload->Action == "2" || $pic_product->sanpham_pic->Upload->Action == "3") { // Update/Remove
			$pic_product->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic'); // Get original value
			if (is_null($pic_product->sanpham_pic->Upload->Value)) {
				$rsnew['sanpham_pic'] = NULL;
			} else {
				if ($pic_product->sanpham_pic->Upload->FileName == $pic_product->sanpham_pic->Upload->DbValue) { // Upload file name same as old file name
					$rsnew['sanpham_pic'] = $pic_product->sanpham_pic->Upload->FileName;
				} else {
					$rsnew['sanpham_pic'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH), $pic_product->sanpham_pic->Upload->FileName);
				}
			}
			}

			// Call Row Updating event
			$bUpdateRow = $pic_product->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field sanpham_pic
			if (!is_null($pic_product->sanpham_pic->Upload->Value)) {
				if ($pic_product->sanpham_pic->Upload->FileName == $pic_product->sanpham_pic->Upload->DbValue) { // Overwrite if same file name
					$pic_product->sanpham_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['sanpham_pic'], TRUE);
					$pic_product->sanpham_pic->Upload->DbValue = ""; // No need to delete any more
				} else {
					$pic_product->sanpham_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['sanpham_pic'], FALSE);
				}
			}
			if ($pic_product->sanpham_pic->Upload->Action == "2" || $pic_product->sanpham_pic->Upload->Action == "3") { // Update/Remove
				if ($pic_product->sanpham_pic->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($pic_product->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($pic_product->CancelMessage <> "") {
					$this->setMessage($pic_product->CancelMessage);
					$pic_product->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$pic_product->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field sanpham_pic
		$pic_product->sanpham_pic->Upload->RemoveFromSession(); // Remove file value from Session
		return $EditRow;
	}

	// Add record
	function AddRow() {
		global $conn, $Security, $pic_product;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $pic_product->SqlMasterFilter_products();
			if (strval($pic_product->sanpham_id->CurrentValue) <> "") {
				$sFilter = str_replace("@sanpham_id@", ew_AdjustSql($pic_product->sanpham_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {			
				$rsmaster = $GLOBALS["products"]->LoadRs($sFilter);
				$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
				if (!$this->bMasterRecordExists) {
					$sMasterUserIdMsg = str_replace("%c", CurrentUserID(), "The current user (%c) is not authorized to insert the record. Master filter: %f");
					$sMasterUserIdMsg = str_replace("%f", $sFilter, $sMasterUserIdMsg);
					$this->setMessage($sMasterUserIdMsg);					
					return FALSE;
				} else {
					$rsmaster->Close();
				}
			}
		}
		$rsnew = array();

		// Field sanpham_pic
		$pic_product->sanpham_pic->Upload->SaveToSession(); // Save file value to Session
		if (is_null($pic_product->sanpham_pic->Upload->Value)) {
			$rsnew['sanpham_pic'] = NULL;
		} else {
			$rsnew['sanpham_pic'] = ew_UploadFileNameEx(ew_UploadPathEx(True, EW_UPLOAD_DEST_PATH), $pic_product->sanpham_pic->Upload->FileName);
		}

		// Field sanpham_id
		if ($pic_product->sanpham_id->getSessionValue() <> "") {
			$rsnew['sanpham_id'] = $pic_product->sanpham_id->getSessionValue();
		}

		// Call Row Inserting event
		$bInsertRow = $pic_product->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field sanpham_pic
			if (!is_null($pic_product->sanpham_pic->Upload->Value)) {
				if ($pic_product->sanpham_pic->Upload->FileName == $pic_product->sanpham_pic->Upload->DbValue) { // Overwrite if same file name
					$pic_product->sanpham_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['sanpham_pic'], TRUE);
					$pic_product->sanpham_pic->Upload->DbValue = ""; // No need to delete any more
				} else {
					$pic_product->sanpham_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['sanpham_pic'], FALSE);
				}
			}
			if ($pic_product->sanpham_pic->Upload->Action == "2" || $pic_product->sanpham_pic->Upload->Action == "3") { // Update/Remove
				if ($pic_product->sanpham_pic->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($pic_product->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($pic_product->CancelMessage <> "") {
				$this->setMessage($pic_product->CancelMessage);
				$pic_product->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$pic_product->anh_sanpham_id->setDbValue($conn->Insert_ID());
			$rsnew['anh_sanpham_id'] =& $pic_product->anh_sanpham_id->DbValue;

			// Call Row Inserted event
			$pic_product->Row_Inserted($rsnew);
		}

		// Field sanpham_pic
		$pic_product->sanpham_pic->Upload->RemoveFromSession(); // Remove file value from Session
		return $AddRow;
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $pic_product;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "products") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $pic_product->SqlMasterFilter_products();
				$this->sDbDetailFilter = $pic_product->SqlDetailFilter_products();
				if (@$_GET["sanpham_id"] <> "") {
					$GLOBALS["products"]->sanpham_id->setQueryStringValue($_GET["sanpham_id"]);
					$pic_product->sanpham_id->setQueryStringValue($GLOBALS["products"]->sanpham_id->QueryStringValue);
					$pic_product->sanpham_id->setSessionValue($pic_product->sanpham_id->QueryStringValue);
					if (!is_numeric($GLOBALS["products"]->sanpham_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@sanpham_id@", ew_AdjustSql($GLOBALS["products"]->sanpham_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@sanpham_id@", ew_AdjustSql($GLOBALS["products"]->sanpham_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$pic_product->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$pic_product->setStartRecordNumber($this->lStartRec);
			$pic_product->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$pic_product->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "products") {
				if ($pic_product->sanpham_id->QueryStringValue == "") $pic_product->sanpham_id->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $pic_product->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $pic_product->getDetailFilter(); // Restore detail filter
		}
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
