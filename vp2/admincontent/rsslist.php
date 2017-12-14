<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "rssinfo.php" ?>
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
$rss_list = new crss_list();
$Page =& $rss_list;

// Page init processing
$rss_list->Page_Init();

// Page main processing
$rss_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($rss->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var rss_list = new ew_Page("rss_list");

// page properties
rss_list.PageID = "list"; // page ID
var EW_PAGE_ID = rss_list.PageID; // for backward compatibility

// extend page with validate function for search
rss_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	for (var i=0;i<fobj.elements.length;i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
rss_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
rss_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
rss_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
rss_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($rss->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($rss->Export == "" && $rss->SelectLimit);
	if (!$bSelectLimit)
		$rs = $rss_list->LoadRecordset();
	$rss_list->lTotalRecs = ($bSelectLimit) ? $rss->SelectRecordCount() : $rs->RecordCount();
	$rss_list->lStartRec = 1;
	if ($rss_list->lDisplayRecs <= 0) // Display all records
		$rss_list->lDisplayRecs = $rss_list->lTotalRecs;
	if (!($rss->ExportAll && $rss->Export <> ""))
		$rss_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $rss_list->LoadRecordset($rss_list->lStartRec-1, $rss_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý RSS"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Security->CanSearch()) { ?>
<?php if ($rss->Export == "" && $rss->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(rss_list);" style="text-decoration: none;"><img id="rss_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="rss_list_SearchPanel">
<form name="frsslistsrch" id="frsslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return rss_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="rss">
<?php
if ($gsSearchError == "")
	$rss_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$rss->RowType = EW_ROWTYPE_SEARCH;

// Render row
$rss_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
		<br>
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($rss->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value=" Tìm kiếm ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $rss_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($rss->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($rss->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($rss->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Tên RSS</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_rss_name" id="x_rss_name" size="30" maxlength="255" value="<?php echo $rss->rss_name->EditValue ?>"<?php echo $rss->rss_name->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Trạng thái RSS</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_rss_state" name="x_rss_state"<?php echo $rss->rss_state->EditAttributes() ?>>
<?php
if (is_array($rss->rss_state->EditValue)) {
	$arwrk = $rss->rss_state->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($rss->rss_state->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Loại RSS</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_rss_type" name="x_rss_type"<?php echo $rss->rss_type->EditAttributes() ?>>
<?php
if (is_array($rss->rss_type->EditValue)) {
	$arwrk = $rss->rss_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($rss->rss_type->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $rss_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($rss->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($rss->CurrentAction <> "gridadd" && $rss->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($rss_list->Pager)) $rss_list->Pager = new cNumericPager($rss_list->lStartRec, $rss_list->lDisplayRecs, $rss_list->lTotalRecs, $rss_list->lRecRange) ?>
<?php if ($rss_list->Pager->RecordCount > 0) { ?>
	<?php if ($rss_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($rss_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $rss_list->Pager->FromIndex ?> đến <?php echo $rss_list->Pager->ToIndex ?> của <?php echo $rss_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($rss_list->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($rss_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="rss">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($rss_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($rss_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($rss_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($rss->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $rss->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($rss_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.frsslist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $rss_list->sDeleteConfirmMsg ?>')) {document.frsslist.action='rssdelete.php';document.frsslist.encoding='application/x-www-form-urlencoded';document.frsslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="frsslist" id="frsslist" class="ewForm" action="" method="post">
<?php if ($rss_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$rss_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$rss_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$rss_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$rss_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$rss_list->lOptionCnt++; // Multi-select
}
	$rss_list->lOptionCnt += count($rss_list->ListOptions->Items); // Custom list options
?>
<?php echo $rss->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($rss->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="rss_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($rss_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($rss->rss_name->Visible) { // rss_name ?>
	<?php if ($rss->SortUrl($rss->rss_name) == "") { ?>
		<td>Rss Name</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $rss->SortUrl($rss->rss_name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên RSS&nbsp;(*)</td><td style="width: 10px;"><?php if ($rss->rss_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rss->rss_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($rss->rss_order->Visible) { // rss_order ?>
	<?php if ($rss->SortUrl($rss->rss_order) == "") { ?>
		<td>Rss Order</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $rss->SortUrl($rss->rss_order) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thứ tự RSS</td><td style="width: 10px;"><?php if ($rss->rss_order->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rss->rss_order->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($rss->rss_state->Visible) { // rss_state ?>
	<?php if ($rss->SortUrl($rss->rss_state) == "") { ?>
		<td>Rss State</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $rss->SortUrl($rss->rss_state) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái RSS</td><td style="width: 10px;"><?php if ($rss->rss_state->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rss->rss_state->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($rss->rss_type->Visible) { // rss_type ?>
	<?php if ($rss->SortUrl($rss->rss_type) == "") { ?>
		<td>Rss Type</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $rss->SortUrl($rss->rss_type) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại RSS</td><td style="width: 10px;"><?php if ($rss->rss_type->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rss->rss_type->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($rss->ExportAll && $rss->Export <> "") {
	$rss_list->lStopRec = $rss_list->lTotalRecs;
} else {
	$rss_list->lStopRec = $rss_list->lStartRec + $rss_list->lDisplayRecs - 1; // Set the last record to display
}
$rss_list->lRecCount = $rss_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$rss->SelectLimit && $rss_list->lStartRec > 1)
		$rs->Move($rss_list->lStartRec - 1);
}
$rss_list->lRowCnt = 0;
while (($rss->CurrentAction == "gridadd" || !$rs->EOF) &&
	$rss_list->lRecCount < $rss_list->lStopRec) {
	$rss_list->lRecCount++;
	if (intval($rss_list->lRecCount) >= intval($rss_list->lStartRec)) {
		$rss_list->lRowCnt++;

	// Init row class and style
	$rss->CssClass = "";
	$rss->CssStyle = "";
	$rss->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($rss->CurrentAction == "gridadd") {
		$rss_list->LoadDefaultValues(); // Load default values
	} else {
		$rss_list->LoadRowValues($rs); // Load row values
	}
	$rss->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$rss_list->RenderRow();
?>
	<tr<?php echo $rss->RowAttributes() ?>>
<?php if ($rss->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $rss->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $rss->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $rss->CopyUrl() ?>">Sao chép</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($rss->rss_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($rss_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($rss->rss_name->Visible) { // rss_name ?>
		<td<?php echo $rss->rss_name->CellAttributes() ?>>
<div<?php echo $rss->rss_name->ViewAttributes() ?>><?php echo $rss->rss_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rss->rss_order->Visible) { // rss_order ?>
		<td<?php echo $rss->rss_order->CellAttributes() ?>>
<div<?php echo $rss->rss_order->ViewAttributes() ?>><?php echo $rss->rss_order->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rss->rss_state->Visible) { // rss_state ?>
		<td<?php echo $rss->rss_state->CellAttributes() ?>>
<div<?php echo $rss->rss_state->ViewAttributes() ?>><?php echo $rss->rss_state->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rss->rss_type->Visible) { // rss_type ?>
		<td<?php echo $rss->rss_type->CellAttributes() ?>>
<div<?php echo $rss->rss_type->ViewAttributes() ?>><?php echo $rss->rss_type->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($rss->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
</div>
<?php if ($rss_list->lTotalRecs > 0) { ?>
<?php if ($rss->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($rss->CurrentAction <> "gridadd" && $rss->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($rss_list->Pager)) $rss_list->Pager = new cNumericPager($rss_list->lStartRec, $rss_list->lDisplayRecs, $rss_list->lTotalRecs, $rss_list->lRecRange) ?>
<?php if ($rss_list->Pager->RecordCount > 0) { ?>
	<?php if ($rss_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($rss_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $rss_list->PageUrl() ?>start=<?php echo $rss_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $rss_list->Pager->FromIndex ?> đến <?php echo $rss_list->Pager->ToIndex ?> của <?php echo $rss_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($rss_list->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($rss_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="rss">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($rss_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($rss_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($rss_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($rss->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($rss_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $rss->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($rss_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.frsslist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $rss_list->sDeleteConfirmMsg ?>')) {document.frsslist.action='rssdelete.php';document.frsslist.encoding='application/x-www-form-urlencoded';document.frsslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($rss->Export == "" && $rss->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(rss_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($rss->Export == "") { ?>
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
class crss_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'rss';

	// Page Object Name
	var $PageObjName = 'rss_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $rss;
		if ($rss->UseTokenInUrl) $PageUrl .= "t=" . $rss->TableVar . "&"; // add page token
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
		global $objForm, $rss;
		if ($rss->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($rss->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($rss->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function crss_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["rss"] = new crss();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'rss', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $rss;
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
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$rss->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $rss->Export; // Get export parameter, used in header
	$gsExportFile = $rss->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $rss;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
                $this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn không?"; // Delete confirm message

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Get search criteria for advanced search
			$this->LoadSearchValues(); // Get search values
			if ($this->ValidateSearch()) {
				$sSrchAdvanced = $this->AdvancedSearchWhere();
			} else {
				$this->setMessage($gsSearchError);
			}

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($rss->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $rss->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchAdvanced)" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchBasic)" : $sSrchBasic;

		// Call Recordset_Searching event
		$rss->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$rss->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$rss->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$rss->setSessionWhere($sFilter);
		$rss->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $rss;
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
			$rss->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$rss->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $rss;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $rss->rss_id, FALSE); // Field rss_id
		$this->BuildSearchSql($sWhere, $rss->rss_name, FALSE); // Field rss_name
		$this->BuildSearchSql($sWhere, $rss->rss_link, FALSE); // Field rss_link
		$this->BuildSearchSql($sWhere, $rss->rss_order, FALSE); // Field rss_order
		$this->BuildSearchSql($sWhere, $rss->rss_state, FALSE); // Field rss_state
		$this->BuildSearchSql($sWhere, $rss->rss_type, FALSE); // Field rss_type

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($rss->rss_id); // Field rss_id
			$this->SetSearchParm($rss->rss_name); // Field rss_name
			$this->SetSearchParm($rss->rss_link); // Field rss_link
			$this->SetSearchParm($rss->rss_order); // Field rss_order
			$this->SetSearchParm($rss->rss_state); // Field rss_state
			$this->SetSearchParm($rss->rss_type); // Field rss_type
		}
		return $sWhere;
	}

	// Build search SQL
	function BuildSearchSql(&$Where, &$Fld, $MultiValue) {
		$FldParm = substr($Fld->FldVar, 2);		
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldOpr = $Fld->AdvancedSearch->SearchOperator; // @$_GET["z_$FldParm"]
		$FldCond = $Fld->AdvancedSearch->SearchCondition; // @$_GET["v_$FldParm"]
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldOpr2 = $Fld->AdvancedSearch->SearchOperator2; // @$_GET["w_$FldParm"]
		$sWrk = "";
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$FldOpr = strtoupper(trim($FldOpr));
		if ($FldOpr == "") $FldOpr = "=";
		$FldOpr2 = strtoupper(trim($FldOpr2));
		if ($FldOpr2 == "") $FldOpr2 = "=";
		if (EW_SEARCH_MULTI_VALUE_OPTION == 1 || $FldOpr <> "LIKE" ||
			($FldOpr2 <> "LIKE" && $FldVal2 <> ""))
			$MultiValue = FALSE;
		if ($MultiValue) {
			$sWrk1 = ($FldVal <> "") ? ew_GetMultiSearchSql($Fld, $FldVal) : ""; // Field value 1
			$sWrk2 = ($FldVal2 <> "") ? ew_GetMultiSearchSql($Fld, $FldVal2) : ""; // Field value 2
			$sWrk = $sWrk1; // Build final SQL
			if ($sWrk2 <> "")
				$sWrk = ($sWrk <> "") ? "($sWrk) $FldCond ($sWrk2)" : $sWrk2;
		} else {
			$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			$sWrk = ew_GetSearchSql($Fld, $FldVal, $FldOpr, $FldCond, $FldVal2, $FldOpr2);
		}
		if ($sWrk <> "") {
			if ($Where <> "") $Where .= " AND ";
			$Where .= "(" . $sWrk . ")";
		}
	}

	// Set search parameters
	function SetSearchParm(&$Fld) {
		global $rss;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$rss->setAdvancedSearch("x_$FldParm", $FldVal);
		$rss->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$rss->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$rss->setAdvancedSearch("y_$FldParm", $FldVal2);
		$rss->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Convert search value
	function ConvertSearchValue(&$Fld, $FldVal) {
		$Value = $FldVal;
		if ($Fld->FldDataType == EW_DATATYPE_BOOLEAN) {
			if ($FldVal <> "") $Value = ($FldVal == "1") ? $Fld->TrueValue : $Fld->FalseValue;
		} elseif ($Fld->FldDataType == EW_DATATYPE_DATE) {
			if ($FldVal <> "") $Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
		}
		return $Value;
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $rss;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $rss->rss_name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (is_numeric($sKeyword)) $sql .= "rss_state = " . $sKeyword . " OR ";
		if (is_numeric($sKeyword)) $sql .= "rss_type = " . $sKeyword . " OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $rss;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = ew_StripSlashes(@$_GET[EW_TABLE_BASIC_SEARCH]);
		$sSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$rss->setBasicSearchKeyword($sSearchKeyword);
			$rss->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $rss;
		$this->sSrchWhere = "";
		$rss->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $rss;
		$rss->setBasicSearchKeyword("");
		$rss->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $rss;
		$rss->setAdvancedSearch("x_rss_id", "");
		$rss->setAdvancedSearch("x_rss_name", "");
		$rss->setAdvancedSearch("x_rss_link", "");
		$rss->setAdvancedSearch("x_rss_order", "");
		$rss->setAdvancedSearch("x_rss_state", "");
		$rss->setAdvancedSearch("x_rss_type", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $rss;
		$this->sSrchWhere = $rss->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $rss;
		 $rss->rss_id->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_id");
		 $rss->rss_name->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_name");
		 $rss->rss_link->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_link");
		 $rss->rss_order->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_order");
		 $rss->rss_state->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_state");
		 $rss->rss_type->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_type");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $rss;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$rss->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$rss->CurrentOrderType = @$_GET["ordertype"];
			$rss->UpdateSort($rss->rss_name); // Field 
			$rss->UpdateSort($rss->rss_order); // Field 
			$rss->UpdateSort($rss->rss_state); // Field 
			$rss->UpdateSort($rss->rss_type); // Field 
			$rss->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $rss;
		$sOrderBy = $rss->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($rss->SqlOrderBy() <> "") {
				$sOrderBy = $rss->SqlOrderBy();
				$rss->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $rss;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$rss->setSessionOrderBy($sOrderBy);
				$rss->rss_name->setSort("");
				$rss->rss_order->setSort("");
				$rss->rss_state->setSort("");
				$rss->rss_type->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$rss->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $rss;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$rss->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$rss->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $rss->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$rss->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$rss->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$rss->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $rss;

		// Load search values
		// rss_id

		$rss->rss_id->AdvancedSearch->SearchValue = @$_GET["x_rss_id"];
		$rss->rss_id->AdvancedSearch->SearchOperator = @$_GET["z_rss_id"];

		// rss_name
		$rss->rss_name->AdvancedSearch->SearchValue = @$_GET["x_rss_name"];
		$rss->rss_name->AdvancedSearch->SearchOperator = @$_GET["z_rss_name"];

		// rss_link
		$rss->rss_link->AdvancedSearch->SearchValue = @$_GET["x_rss_link"];
		$rss->rss_link->AdvancedSearch->SearchOperator = @$_GET["z_rss_link"];

		// rss_order
		$rss->rss_order->AdvancedSearch->SearchValue = @$_GET["x_rss_order"];
		$rss->rss_order->AdvancedSearch->SearchOperator = @$_GET["z_rss_order"];

		// rss_state
		$rss->rss_state->AdvancedSearch->SearchValue = @$_GET["x_rss_state"];
		$rss->rss_state->AdvancedSearch->SearchOperator = @$_GET["z_rss_state"];

		// rss_type
		$rss->rss_type->AdvancedSearch->SearchValue = @$_GET["x_rss_type"];
		$rss->rss_type->AdvancedSearch->SearchOperator = @$_GET["z_rss_type"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $rss;

		// Call Recordset Selecting event
		$rss->Recordset_Selecting($rss->CurrentFilter);

		// Load list page SQL
		$sSql = $rss->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$rss->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $rss;
		$sFilter = $rss->KeyFilter();

		// Call Row Selecting event
		$rss->Row_Selecting($sFilter);

		// Load sql based on filter
		$rss->CurrentFilter = $sFilter;
		$sSql = $rss->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$rss->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $rss;
		$rss->rss_id->setDbValue($rs->fields('rss_id'));
		$rss->rss_name->setDbValue($rs->fields('rss_name'));
		$rss->rss_link->setDbValue($rs->fields('rss_link'));
		$rss->rss_order->setDbValue($rs->fields('rss_order'));
		$rss->rss_state->setDbValue($rs->fields('rss_state'));
		$rss->rss_type->setDbValue($rs->fields('rss_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $rss;

		// Call Row_Rendering event
		$rss->Row_Rendering();

		// Common render codes for all row types
		// rss_name

		$rss->rss_name->CellCssStyle = "";
		$rss->rss_name->CellCssClass = "";

		// rss_order
		$rss->rss_order->CellCssStyle = "";
		$rss->rss_order->CellCssClass = "";

		// rss_state
		$rss->rss_state->CellCssStyle = "";
		$rss->rss_state->CellCssClass = "";

		// rss_type
		$rss->rss_type->CellCssStyle = "";
		$rss->rss_type->CellCssClass = "";
		if ($rss->RowType == EW_ROWTYPE_VIEW) { // View row

			// rss_id
			$rss->rss_id->ViewValue = $rss->rss_id->CurrentValue;
			$rss->rss_id->CssStyle = "";
			$rss->rss_id->CssClass = "";
			$rss->rss_id->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->ViewValue = $rss->rss_name->CurrentValue;
			$rss->rss_name->CssStyle = "";
			$rss->rss_name->CssClass = "";
			$rss->rss_name->ViewCustomAttributes = "";

			// rss_link
			$rss->rss_link->ViewValue = $rss->rss_link->CurrentValue;
			$rss->rss_link->CssStyle = "";
			$rss->rss_link->CssClass = "";
			$rss->rss_link->ViewCustomAttributes = "";

			// rss_order
			$rss->rss_order->ViewValue = $rss->rss_order->CurrentValue;
			$rss->rss_order->CssStyle = "";
			$rss->rss_order->CssClass = "";
			$rss->rss_order->ViewCustomAttributes = "";

			// rss_state
			if (strval($rss->rss_state->CurrentValue) <> "") {
				switch ($rss->rss_state->CurrentValue) {
					case "0":
						$rss->rss_state->ViewValue = "Không hiển thị";
						break;
					case "1":
						$rss->rss_state->ViewValue = "Hiển thị";
						break;
					default:
						$rss->rss_state->ViewValue = $rss->rss_state->CurrentValue;
				}
			} else {
				$rss->rss_state->ViewValue = NULL;
			}
			$rss->rss_state->CssStyle = "";
			$rss->rss_state->CssClass = "";
			$rss->rss_state->ViewCustomAttributes = "";

			// rss_type
			if (strval($rss->rss_type->CurrentValue) <> "") {
				switch ($rss->rss_type->CurrentValue) {
					case "1":
						$rss->rss_type->ViewValue = "Chào mua";
						break;
					case "2":
						$rss->rss_type->ViewValue = "Chào bán";
						break;
					case "3":
						$rss->rss_type->ViewValue = "Sản phẩm";
						break;
					default:
						$rss->rss_type->ViewValue = $rss->rss_type->CurrentValue;
				}
			} else {
				$rss->rss_type->ViewValue = NULL;
			}
			$rss->rss_type->CssStyle = "";
			$rss->rss_type->CssClass = "";
			$rss->rss_type->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->HrefValue = "";

			// rss_order
			$rss->rss_order->HrefValue = "";

			// rss_state
			$rss->rss_state->HrefValue = "";

			// rss_type
			$rss->rss_type->HrefValue = "";
		} elseif ($rss->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// rss_name
			$rss->rss_name->EditCustomAttributes = "";
			$rss->rss_name->EditValue = ew_HtmlEncode($rss->rss_name->AdvancedSearch->SearchValue);

			// rss_order
			$rss->rss_order->EditCustomAttributes = "";
			$rss->rss_order->EditValue = ew_HtmlEncode($rss->rss_order->AdvancedSearch->SearchValue);

			// rss_state
			$rss->rss_state->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không hiển thị");
			$arwrk[] = array("1", "Hiển thị");
			array_unshift($arwrk, array("", "Chọn"));
			$rss->rss_state->EditValue = $arwrk;

			// rss_type
			$rss->rss_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chào mua");
			$arwrk[] = array("2", "Chào bán");
			$arwrk[] = array("3", "Sản phẩm");
			array_unshift($arwrk, array("", "Chọn"));
			$rss->rss_type->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$rss->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $rss;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $rss;
		$rss->rss_id->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_id");
		$rss->rss_name->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_name");
		$rss->rss_link->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_link");
		$rss->rss_order->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_order");
		$rss->rss_state->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_state");
		$rss->rss_type->AdvancedSearch->SearchValue = $rss->getAdvancedSearch("x_rss_type");
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
