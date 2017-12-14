<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "offer_picinfo.php" ?>
<?php include "offerinfo.php" ?>
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
$offer_pic_list = new coffer_pic_list();
$Page =& $offer_pic_list;

// Page init processing
$offer_pic_list->Page_Init();

// Page main processing
$offer_pic_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($offer_pic->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var offer_pic_list = new ew_Page("offer_pic_list");

// page properties
offer_pic_list.PageID = "list"; // page ID
var EW_PAGE_ID = offer_pic_list.PageID; // for backward compatibility

// extend page with ValidateForm function
offer_pic_list.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_pic_name"];
		aelm = fobj.elements["a" + infix + "_pic_name"];
		var chk_pic_name = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_pic_name && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Nhập trường bắt buộc - Pic Name");
		elm = fobj.elements["x" + infix + "_pic_name"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
offer_pic_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_pic_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_pic_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_pic_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($offer_pic->Export == "") { ?>
<?php
$gsMasterReturnUrl = "offerlist.php";
if ($offer_pic_list->sDbMasterFilter <> "" && $offer_pic->getCurrentMasterTable() == "offer") {
	if ($offer_pic_list->bMasterRecordExists) {
		if ($offer_pic->getCurrentMasterTable() == $offer_pic->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "offermaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($offer_pic->Export == "" && $offer_pic->SelectLimit);
	if (!$bSelectLimit)
		$rs = $offer_pic_list->LoadRecordset();
	$offer_pic_list->lTotalRecs = ($bSelectLimit) ? $offer_pic->SelectRecordCount() : $rs->RecordCount();
	$offer_pic_list->lStartRec = 1;
	if ($offer_pic_list->lDisplayRecs <= 0) // Display all records
		$offer_pic_list->lDisplayRecs = $offer_pic_list->lTotalRecs;
	if (!($offer_pic->ExportAll && $offer_pic->Export <> ""))
		$offer_pic_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $offer_pic_list->LoadRecordset($offer_pic_list->lStartRec-1, $offer_pic_list->lDisplayRecs);
?>

<?php $offer_pic_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($offer_pic->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($offer_pic->CurrentAction <> "gridadd" && $offer_pic->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($offer_pic_list->Pager)) $offer_pic_list->Pager = new cNumericPager($offer_pic_list->lStartRec, $offer_pic_list->lDisplayRecs, $offer_pic_list->lTotalRecs, $offer_pic_list->lRecRange) ?>
<?php if ($offer_pic_list->Pager->RecordCount > 0) { ?>
	<?php if ($offer_pic_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($offer_pic_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Ảnh <?php echo $offer_pic_list->Pager->FromIndex ?> đến <?php echo $offer_pic_list->Pager->ToIndex ?> của <?php echo $offer_pic_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($offer_pic_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($offer_pic_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiểu thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="offer_pic">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($offer_pic_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($offer_pic_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($offer_pic_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($offer_pic->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $offer_pic_list->PageUrl() ?>a=add"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($offer_pic_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.foffer_piclist)) alert('No records selected'); else {document.foffer_piclist.action='offer_picdelete.php';document.foffer_piclist.encoding='application/x-www-form-urlencoded';document.foffer_piclist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="foffer_piclist" id="foffer_piclist" class="ewForm" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="t" id="t" value="offer_pic">
<?php if ($offer_pic_list->lTotalRecs > 0 || $offer_pic->CurrentAction == "add" || $offer_pic->CurrentAction == "copy") { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$offer_pic_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$offer_pic_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$offer_pic_list->lOptionCnt++; // Multi-select
}
	$offer_pic_list->lOptionCnt += count($offer_pic_list->ListOptions->Items); // Custom list options
?>
<?php echo $offer_pic->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($offer_pic->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width:30px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<?php if ($offer_pic_list->lOptionCnt == 0 && $offer_pic->CurrentAction == "add") { ?>
<td style="white-space: nowrap; width:30px">&nbsp;</td>
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width:30px"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="offer_pic_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($offer_pic_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($offer_pic->pic_name->Visible) { // pic_name ?>
	<?php if ($offer_pic->SortUrl($offer_pic->pic_name) == "") { ?>
		<td>Đường dẫn ảnh</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer_pic->SortUrl($offer_pic->pic_name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ảnh</td><td style="width: 10px;"><?php if ($offer_pic->pic_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer_pic->pic_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
	if ($offer_pic->CurrentAction == "add" || $offer_pic->CurrentAction == "copy") {
		$offer_pic_list->lRowIndex = 1;
		if ($offer_pic->CurrentAction == "add")
			$offer_pic_list->LoadDefaultValues();
		if ($offer_pic->EventCancelled) // Insert failed
			$offer_pic_list->RestoreFormValues(); // Restore form values

		// Set row properties
		$offer_pic->CssClass = "ewTableEditRow";
		$offer_pic->CssStyle = "";
		$offer_pic->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
		$offer_pic->RowType = EW_ROWTYPE_ADD;

		// Render row
		$offer_pic_list->RenderRow();
?>
	<tr<?php echo $offer_pic->RowAttributes() ?>>
<td colspan="<?php echo $offer_pic_list->lOptionCnt ?>" align="right"><span class="phpmaker">
<a href="" onclick="if (offer_pic_list.ValidateForm(document.foffer_piclist)) document.foffer_piclist.submit();return false;">Thêm mới</a>&nbsp;<a href="<?php echo $offer_pic_list->PageUrl() ?>a=cancel">Hủy</a>
<input type="hidden" name="a_list" id="a_list" value="insert">
</span></td>
	<?php if ($offer_pic->pic_name->Visible) { // pic_name ?>
		<td>
<input type="file" name="x<?php echo $offer_pic_list->lRowIndex ?>_pic_name" id="x<?php echo $offer_pic_list->lRowIndex ?>_pic_name" size="30"<?php echo $offer_pic->pic_name->EditAttributes() ?>>
</div>
</td>
	<?php } ?>
	</tr>
<?php if (strval($offer_pic->chaohang_id->getSessionValue()) <> "") { ?>
<input type="hidden" name="x_chaohang_id" id="x_chaohang_id" value="<?php echo ew_HtmlEncode(strval($offer_pic->chaohang_id->getSessionValue())) ?>">
<?php } ?>
<?php
}
?>
<?php
if ($offer_pic->ExportAll && $offer_pic->Export <> "") {
	$offer_pic_list->lStopRec = $offer_pic_list->lTotalRecs;
} else {
	$offer_pic_list->lStopRec = $offer_pic_list->lStartRec + $offer_pic_list->lDisplayRecs - 1; // Set the last record to display
}
$offer_pic_list->lRecCount = $offer_pic_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$offer_pic->SelectLimit && $offer_pic_list->lStartRec > 1)
		$rs->Move($offer_pic_list->lStartRec - 1);
}
$offer_pic_list->lRowCnt = 0;
$offer_pic_list->lEditRowCnt = 0;
if ($offer_pic->CurrentAction == "edit")
	$offer_pic_list->lRowIndex = 1;
while (($offer_pic->CurrentAction == "gridadd" || !$rs->EOF) &&
	$offer_pic_list->lRecCount < $offer_pic_list->lStopRec) {
	$offer_pic_list->lRecCount++;
	if (intval($offer_pic_list->lRecCount) >= intval($offer_pic_list->lStartRec)) {
		$offer_pic_list->lRowCnt++;

	// Init row class and style
	$offer_pic->CssClass = "";
	$offer_pic->CssStyle = "";
	$offer_pic->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($offer_pic->CurrentAction == "gridadd") {
		$offer_pic_list->LoadDefaultValues(); // Load default values
	} else {
		$offer_pic_list->LoadRowValues($rs); // Load row values
	}
	$offer_pic->RowType = EW_ROWTYPE_VIEW; // Render view
	if ($offer_pic->CurrentAction == "edit") {
		if ($offer_pic_list->CheckInlineEditKey() && $offer_pic_list->lEditRowCnt == 0) // Inline edit
			$offer_pic->RowType = EW_ROWTYPE_EDIT; // Render edit
	}
	if ($offer_pic->RowType == EW_ROWTYPE_EDIT && $offer_pic->EventCancelled) { // Update failed
		if ($offer_pic->CurrentAction == "edit")
			$offer_pic_list->RestoreFormValues(); // Restore form values
	}
	if ($offer_pic->RowType == EW_ROWTYPE_EDIT) { // Edit row
		$offer_pic_list->lEditRowCnt++;
		$offer_pic->RowClientEvents = "onmouseover='this.edit=true;ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	}
	if ($offer_pic->RowType == EW_ROWTYPE_ADD || $offer_pic->RowType == EW_ROWTYPE_EDIT) // Add / Edit row
			$offer_pic->CssClass = "ewTableEditRow";

	// Render row
	$offer_pic_list->RenderRow();
?>
	<tr<?php echo $offer_pic->RowAttributes() ?>>
<?php if ($offer_pic->RowType == EW_ROWTYPE_ADD || $offer_pic->RowType == EW_ROWTYPE_EDIT) { ?>
<?php if ($offer_pic->CurrentAction == "edit") { ?>
<td colspan="<?php echo $offer_pic_list->lOptionCnt ?>" align="right"><span class="phpmaker">
<a href="" onclick="if (offer_pic_list.ValidateForm(document.foffer_piclist)) document.foffer_piclist.submit();return false;">Cập nhật</a>&nbsp;<a href="<?php echo $offer_pic_list->PageUrl() ?>a=cancel">Hủy</a>
<input type="hidden" name="a_list" id="a_list" value="update">
</span></td>
<?php } ?>
<?php } else { ?>
<?php if ($offer_pic->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $offer_pic->InlineEditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<?php if ($offer_pic_list->lOptionCnt == 0 && $offer_pic->CurrentAction == "add") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($offer_pic->offer_pic_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($offer_pic_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
<?php } ?>
	<?php if ($offer_pic->pic_name->Visible) { // pic_name ?>
		<td<?php echo $offer_pic->pic_name->CellAttributes() ?>>
<?php if ($offer_pic->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<div id="old_x<?php echo $offer_pic_list->lRowIndex ?>_pic_name">
<?php if ($offer_pic->pic_name->HrefValue <> "") { ?>
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue ?>" border=0<?php echo $offer_pic->pic_name->ViewAttributes() ?>>
<?php } elseif (!in_array($offer_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue ?>" border=0<?php echo $offer_pic->pic_name->ViewAttributes() ?>>
<?php } elseif (!in_array($offer_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x<?php echo $offer_pic_list->lRowIndex ?>_pic_name">
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<input type="radio" name="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" id="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" value="1" checked="checked">Giử lại&nbsp;
<input type="radio" name="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" id="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" value="2" disabled="disabled">Xóa&nbsp;
<input type="radio" name="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" id="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" id="a<?php echo $offer_pic_list->lRowIndex ?>_pic_name" value="3">
<?php } ?>
<input type="file" name="x<?php echo $offer_pic_list->lRowIndex ?>_pic_name" id="x<?php echo $offer_pic_list->lRowIndex ?>_pic_name" size="30" onchange="if (this.form.a<?php echo $offer_pic_list->lRowIndex ?>_pic_name[2]) this.form.a<?php echo $offer_pic_list->lRowIndex ?>_pic_name[2].checked=true;"<?php echo $offer_pic->pic_name->EditAttributes() ?>>
</div>
<?php } ?>
<?php if ($offer_pic->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<?php if ($offer_pic->pic_name->HrefValue <> "") { ?>
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue ?>" border=0<?php echo $offer_pic->pic_name->ViewAttributes() ?>>
<?php } elseif (!in_array($offer_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue ?>" border=0<?php echo $offer_pic->pic_name->ViewAttributes() ?>>
<?php } elseif (!in_array($offer_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
<?php if ($offer_pic->RowType == EW_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $offer_pic_list->lRowIndex ?>_offer_pic_id" id="x<?php echo $offer_pic_list->lRowIndex ?>_offer_pic_id" value="<?php echo ew_HtmlEncode($offer_pic->offer_pic_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	</tr>
<?php if ($offer_pic->RowType == EW_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	if ($offer_pic->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($offer_pic->CurrentAction == "add" || $offer_pic->CurrentAction == "copy") { ?>
<input type="hidden" name="key_count" id="key_count" value="<?php echo $offer_pic_list->lRowIndex ?>">
<?php } ?>
<?php if ($offer_pic->CurrentAction == "edit") { ?>
<input type="hidden" name="key_count" id="key_count" value="<?php echo $offer_pic_list->lRowIndex ?>">
<?php } ?>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
</div>
<?php if ($offer_pic_list->lTotalRecs > 0) { ?>
<?php if ($offer_pic->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($offer_pic->CurrentAction <> "gridadd" && $offer_pic->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($offer_pic_list->Pager)) $offer_pic_list->Pager = new cNumericPager($offer_pic_list->lStartRec, $offer_pic_list->lDisplayRecs, $offer_pic_list->lTotalRecs, $offer_pic_list->lRecRange) ?>
<?php if ($offer_pic_list->Pager->RecordCount > 0) { ?>
	<?php if ($offer_pic_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($offer_pic_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $offer_pic_list->PageUrl() ?>start=<?php echo $offer_pic_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_pic_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Ảnh <?php echo $offer_pic_list->Pager->FromIndex ?> đến <?php echo $offer_pic_list->Pager->ToIndex ?> của <?php echo $offer_pic_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($offer_pic_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($offer_pic_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="offer_pic">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($offer_pic_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($offer_pic_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($offer_pic_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($offer_pic->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($offer_pic_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $offer_pic_list->PageUrl() ?>a=add"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($offer_pic_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.foffer_piclist)) alert('No records selected'); else {document.foffer_piclist.action='offer_picdelete.php';document.foffer_piclist.encoding='application/x-www-form-urlencoded';document.foffer_piclist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($offer_pic->Export == "" && $offer_pic->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(offer_pic_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($offer_pic->Export == "") { ?>
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
class coffer_pic_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'offer_pic';

	// Page Object Name
	var $PageObjName = 'offer_pic_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $offer_pic;
		if ($offer_pic->UseTokenInUrl) $PageUrl .= "t=" . $offer_pic->TableVar . "&"; // add page token
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
		global $objForm, $offer_pic;
		if ($offer_pic->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($offer_pic->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($offer_pic->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function coffer_pic_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer_pic"] = new coffer_pic();

		// Initialize other table object
		$GLOBALS['offer'] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'offer_pic', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $offer_pic;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("offer");
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
	$offer_pic->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $offer_pic->Export; // Get export parameter, used in header
	$gsExportFile = $offer_pic->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $offer_pic;
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
				$offer_pic->CurrentAction = $_GET["a"];

				// Clear inline mode
				if ($offer_pic->CurrentAction == "cancel")
					$this->ClearInlineMode();

				// Switch to inline edit mode
				if ($offer_pic->CurrentAction == "edit")
					$this->InlineEditMode();

				// Switch to inline add mode
				if ($offer_pic->CurrentAction == "add" || $offer_pic->CurrentAction == "copy")
					$this->InlineAddMode();
			} else {
				if (@$_POST["a_list"] <> "") {
					$offer_pic->CurrentAction = $_POST["a_list"]; // Get action

					// Inline Update
					if ($offer_pic->CurrentAction == "update" && @$_SESSION[EW_SESSION_INLINE_MODE] == "edit")
						$this->InlineUpdate();

					// Insert Inline
					if ($offer_pic->CurrentAction == "insert" && @$_SESSION[EW_SESSION_INLINE_MODE] == "add")
						$this->InlineInsert();
				}
			}

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($offer_pic->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $offer_pic->getRecordsPerPage(); // Restore from Session
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
		$this->sDbMasterFilter = $offer_pic->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $offer_pic->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($offer_pic->getCurrentMasterTable() == "offer")
				$this->sDbMasterFilter = $offer_pic->AddMasterUserIDFilter($this->sDbMasterFilter, "offer"); // Add master User ID filter
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($offer_pic->getMasterFilter() <> "" && $offer_pic->getCurrentMasterTable() == "offer") {
			global $offer;
			$rsmaster = $offer->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$offer_pic->setMasterFilter(""); // Clear master filter
				$offer_pic->setDetailFilter(""); // Clear detail filter
				$this->setMessage("No records found"); // Set no record found
				$this->Page_Terminate($offer_pic->getReturnUrl()); // Return to caller
			} else {
				$offer->LoadListRowValues($rsmaster);
				$offer->RowType = EW_ROWTYPE_MASTER; // Master row
				$offer->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$offer_pic->setSessionWhere($sFilter);
		$offer_pic->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $offer_pic;
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
			$offer_pic->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$offer_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Exit out of inline mode
	function ClearInlineMode() {
		global $offer_pic;
		$offer_pic->setKey("offer_pic_id", ""); // Clear inline edit key
		$offer_pic->CurrentAction = ""; // Clear action
		$_SESSION[EW_SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Inline Edit Mode
	function InlineEditMode() {
		global $Security, $offer_pic;
		if (!$Security->CanEdit())
			$this->Page_Terminate("login.php"); // Go to login page
		$bInlineEdit = TRUE;
		if (@$_GET["offer_pic_id"] <> "") {
			$offer_pic->offer_pic_id->setQueryStringValue($_GET["offer_pic_id"]);
		} else {
			$bInlineEdit = FALSE;
		}
		if ($bInlineEdit) {
			if ($this->LoadRow()) {
				$offer_pic->setKey("offer_pic_id", $offer_pic->offer_pic_id->CurrentValue); // Set up inline edit key
				$_SESSION[EW_SESSION_INLINE_MODE] = "edit"; // Enable inline edit
			}
		}
	}

	// Perform update to inline edit record
	function InlineUpdate() {
		global $objForm, $gsFormError, $offer_pic;
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
				$offer_pic->SendEmail = TRUE; // Send email on update success
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
			$offer_pic->EventCancelled = TRUE; // Cancel event
			$offer_pic->CurrentAction = "edit"; // Stay in edit mode
		}
	}

	// Check inline edit key
	function CheckInlineEditKey() {
		global $offer_pic;

		//CheckInlineEditKey = True
		if (strval($offer_pic->getKey("offer_pic_id")) <> strval($offer_pic->offer_pic_id->CurrentValue))
			return FALSE;
		return TRUE;
	}

	// Switch to Inline Add Mode
	function InlineAddMode() {
		global $Security, $offer_pic;
		if (!$Security->CanAdd())
			$this->Page_Terminate("login.php"); // Return to login page
		$offer_pic->CurrentAction = "add";
		$_SESSION[EW_SESSION_INLINE_MODE] = "add"; // Enable inline add
	}

	// Perform update to inline add/copy record
	function InlineInsert() {
		global $objForm, $gsFormError, $offer_pic;
		$objForm->Index = 1;
		$this->GetUploadFiles(); // Get upload files
		$this->LoadFormValues(); // Get form values

		// Validate Form
		if (!$this->ValidateForm()) {
			$this->setMessage($gsFormError); // Set validation error message
			$offer_pic->EventCancelled = TRUE; // Set event cancelled
			$offer_pic->CurrentAction = "add"; // Stay in add mode
			return;
		}
		$offer_pic->SendEmail = TRUE; // Send email on add success
		if ($this->AddRow()) { // Add record
			$this->setMessage("Add succeeded"); // Set add success message
			$this->ClearInlineMode(); // Clear inline add mode
		} else { // Add failed
			$offer_pic->EventCancelled = TRUE; // Set event cancelled
			$offer_pic->CurrentAction = "add"; // Stay in add mode
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $offer_pic;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$offer_pic->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$offer_pic->CurrentOrderType = @$_GET["ordertype"];
			$offer_pic->UpdateSort($offer_pic->pic_name); // Field 
			$offer_pic->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $offer_pic;
		$sOrderBy = $offer_pic->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($offer_pic->SqlOrderBy() <> "") {
				$sOrderBy = $offer_pic->SqlOrderBy();
				$offer_pic->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $offer_pic;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$offer_pic->getCurrentMasterTable = ""; // Clear master table
				$offer_pic->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$offer_pic->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$offer_pic->chaohang_id->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$offer_pic->setSessionOrderBy($sOrderBy);
				$offer_pic->pic_name->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$offer_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $offer_pic;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$offer_pic->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$offer_pic->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $offer_pic->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$offer_pic->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$offer_pic->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$offer_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $offer_pic;

		// Get upload data
			if ($offer_pic->pic_name->Upload->UploadFile()) {

				// No action required
			} else {
				echo $offer_pic->pic_name->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $offer_pic;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $offer_pic;
		$offer_pic->offer_pic_id->setFormValue($objForm->GetValue("x_offer_pic_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $offer_pic;
		$offer_pic->offer_pic_id->CurrentValue = $offer_pic->offer_pic_id->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $offer_pic;

		// Call Recordset Selecting event
		$offer_pic->Recordset_Selecting($offer_pic->CurrentFilter);

		// Load list page SQL
		$sSql = $offer_pic->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$offer_pic->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $offer_pic;
		$sFilter = $offer_pic->KeyFilter();

		// Call Row Selecting event
		$offer_pic->Row_Selecting($sFilter);

		// Load sql based on filter
		$offer_pic->CurrentFilter = $sFilter;
		$sSql = $offer_pic->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$offer_pic->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $offer_pic;
		$offer_pic->offer_pic_id->setDbValue($rs->fields('offer_pic_id'));
		$offer_pic->pic_name->Upload->DbValue = $rs->fields('pic_name');
		$offer_pic->chaohang_id->setDbValue($rs->fields('chaohang_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $offer_pic;

		// Call Row_Rendering event
		$offer_pic->Row_Rendering();

		// Common render codes for all row types
		// pic_name

		$offer_pic->pic_name->CellCssStyle = "width: 300px;";
		$offer_pic->pic_name->CellCssClass = "";
		if ($offer_pic->RowType == EW_ROWTYPE_VIEW) { // View row

			// offer_pic_id
			$offer_pic->offer_pic_id->ViewValue = $offer_pic->offer_pic_id->CurrentValue;
			$offer_pic->offer_pic_id->CssStyle = "";
			$offer_pic->offer_pic_id->CssClass = "";
			$offer_pic->offer_pic_id->ViewCustomAttributes = "";

			// pic_name
			if (!is_null($offer_pic->pic_name->Upload->DbValue)) {
				$offer_pic->pic_name->ViewValue = $offer_pic->pic_name->Upload->DbValue;
				$offer_pic->pic_name->ImageAlt = "";
			} else {
				$offer_pic->pic_name->ViewValue = "";
			}
			$offer_pic->pic_name->CssStyle = "width: 300px;";
			$offer_pic->pic_name->CssClass = "";
			$offer_pic->pic_name->ViewCustomAttributes = "";

			// chaohang_id
			$offer_pic->chaohang_id->ViewValue = $offer_pic->chaohang_id->CurrentValue;
			$offer_pic->chaohang_id->CssStyle = "";
			$offer_pic->chaohang_id->CssClass = "";
			$offer_pic->chaohang_id->ViewCustomAttributes = "";

			// pic_name
			$offer_pic->pic_name->HrefValue = "";
		} elseif ($offer_pic->RowType == EW_ROWTYPE_ADD) { // Add row

			// pic_name
			$offer_pic->pic_name->EditCustomAttributes = "";
			if (!is_null($offer_pic->pic_name->Upload->DbValue)) {
				$offer_pic->pic_name->EditValue = $offer_pic->pic_name->Upload->DbValue;
				$offer_pic->pic_name->ImageAlt = "";
			} else {
				$offer_pic->pic_name->EditValue = "";
			}
		} elseif ($offer_pic->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// pic_name
			$offer_pic->pic_name->EditCustomAttributes = "";
			if (!is_null($offer_pic->pic_name->Upload->DbValue)) {
				$offer_pic->pic_name->EditValue = $offer_pic->pic_name->Upload->DbValue;
				$offer_pic->pic_name->ImageAlt = "";
			} else {
				$offer_pic->pic_name->EditValue = "";
			}

			// Edit refer script
			// pic_name
                        $offer_pic->pic_name->CssStyle = "width: 300px;";
			$offer_pic->pic_name->CssClass = "";
			$offer_pic->pic_name->ViewCustomAttributes = "";
			$offer_pic->pic_name->HrefValue = "";
		}

		// Call Row Rendered event
		$offer_pic->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $offer_pic;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($offer_pic->pic_name->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($offer_pic->pic_name->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($offer_pic->pic_name->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích cỡ ảnh vượt quá cho phép.");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($offer_pic->CurrentAction == "gridupdate" || $offer_pic->CurrentAction == "update") {
			if ($offer_pic->pic_name->Upload->Action == "3" && is_null($offer_pic->pic_name->Upload->Value)) {
				$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Nhập trường bắt buộc - Pic Name";
			}
		} elseif (is_null($offer_pic->pic_name->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Nhập trường bắt buộc - Pic Name";
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
		global $conn, $Security, $offer_pic;
		$sFilter = $offer_pic->KeyFilter();
		$offer_pic->CurrentFilter = $sFilter;
		$sSql = $offer_pic->SQL();
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

			// Field pic_name
			$offer_pic->pic_name->Upload->SaveToSession(); // Save file value to Session
			if ($offer_pic->pic_name->Upload->Action == "2" || $offer_pic->pic_name->Upload->Action == "3") { // Update/Remove
			$offer_pic->pic_name->Upload->DbValue = $rs->fields('pic_name'); // Get original value
			if (is_null($offer_pic->pic_name->Upload->Value)) {
				$rsnew['pic_name'] = NULL;
			} else {
				if ($offer_pic->pic_name->Upload->FileName == $offer_pic->pic_name->Upload->DbValue) { // Upload file name same as old file name
					$rsnew['pic_name'] = $offer_pic->pic_name->Upload->FileName;
				} else {
					$rsnew['pic_name'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH), $offer_pic->pic_name->Upload->FileName);
				}
			}
			}

			// Call Row Updating event
			$bUpdateRow = $offer_pic->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field pic_name
			if (!is_null($offer_pic->pic_name->Upload->Value)) {
				if ($offer_pic->pic_name->Upload->FileName == $offer_pic->pic_name->Upload->DbValue) { // Overwrite if same file name
					$offer_pic->pic_name->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['pic_name'], TRUE);
					$offer_pic->pic_name->Upload->DbValue = ""; // No need to delete any more
				} else {
					$offer_pic->pic_name->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['pic_name'], FALSE);
				}
			}
			if ($offer_pic->pic_name->Upload->Action == "2" || $offer_pic->pic_name->Upload->Action == "3") { // Update/Remove
				if ($offer_pic->pic_name->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($offer_pic->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($offer_pic->CancelMessage <> "") {
					$this->setMessage($offer_pic->CancelMessage);
					$offer_pic->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$offer_pic->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field pic_name
		$offer_pic->pic_name->Upload->RemoveFromSession(); // Remove file value from Session
		return $EditRow;
	}

	// Add record
	function AddRow() {
		global $conn, $Security, $offer_pic;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $offer_pic->SqlMasterFilter_offer();
			if (strval($offer_pic->chaohang_id->CurrentValue) <> "") {
				$sFilter = str_replace("@chaohang_id@", ew_AdjustSql($offer_pic->chaohang_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {			
				$rsmaster = $GLOBALS["offer"]->LoadRs($sFilter);
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

		// Field pic_name
		$offer_pic->pic_name->Upload->SaveToSession(); // Save file value to Session
		if (is_null($offer_pic->pic_name->Upload->Value)) {
			$rsnew['pic_name'] = NULL;
		} else {
			$rsnew['pic_name'] = ew_UploadFileNameEx(ew_UploadPathEx(True, EW_UPLOAD_DEST_PATH), $offer_pic->pic_name->Upload->FileName);
		}

		// Field chaohang_id
		if ($offer_pic->chaohang_id->getSessionValue() <> "") {
			$rsnew['chaohang_id'] = $offer_pic->chaohang_id->getSessionValue();
		}

		// Call Row Inserting event
		$bInsertRow = $offer_pic->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field pic_name
			if (!is_null($offer_pic->pic_name->Upload->Value)) {
				if ($offer_pic->pic_name->Upload->FileName == $offer_pic->pic_name->Upload->DbValue) { // Overwrite if same file name
					$offer_pic->pic_name->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['pic_name'], TRUE);
					$offer_pic->pic_name->Upload->DbValue = ""; // No need to delete any more
				} else {
					$offer_pic->pic_name->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['pic_name'], FALSE);
				}
			}
			if ($offer_pic->pic_name->Upload->Action == "2" || $offer_pic->pic_name->Upload->Action == "3") { // Update/Remove
				if ($offer_pic->pic_name->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($offer_pic->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($offer_pic->CancelMessage <> "") {
				$this->setMessage($offer_pic->CancelMessage);
				$offer_pic->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$offer_pic->offer_pic_id->setDbValue($conn->Insert_ID());
			$rsnew['offer_pic_id'] =& $offer_pic->offer_pic_id->DbValue;

			// Call Row Inserted event
			$offer_pic->Row_Inserted($rsnew);
		}

		// Field pic_name
		$offer_pic->pic_name->Upload->RemoveFromSession(); // Remove file value from Session
		return $AddRow;
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $offer_pic;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "offer") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $offer_pic->SqlMasterFilter_offer();
				$this->sDbDetailFilter = $offer_pic->SqlDetailFilter_offer();
				if (@$_GET["chaohang_id"] <> "") {
					$GLOBALS["offer"]->chaohang_id->setQueryStringValue($_GET["chaohang_id"]);
					$offer_pic->chaohang_id->setQueryStringValue($GLOBALS["offer"]->chaohang_id->QueryStringValue);
					$offer_pic->chaohang_id->setSessionValue($offer_pic->chaohang_id->QueryStringValue);
					if (!is_numeric($GLOBALS["offer"]->chaohang_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@chaohang_id@", ew_AdjustSql($GLOBALS["offer"]->chaohang_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@chaohang_id@", ew_AdjustSql($GLOBALS["offer"]->chaohang_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$offer_pic->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$offer_pic->setStartRecordNumber($this->lStartRec);
			$offer_pic->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$offer_pic->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "offer") {
				if ($offer_pic->chaohang_id->QueryStringValue == "") $offer_pic->chaohang_id->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $offer_pic->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $offer_pic->getDetailFilter(); // Restore detail filter
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
