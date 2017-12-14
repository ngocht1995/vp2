<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
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
$t_question_list = new ct_question_list();
$Page =& $t_question_list;

// Page init processing
$t_question_list->Page_Init();

// Page main processing
$t_question_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_question->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_list = new ew_Page("t_question_list");

// page properties
t_question_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_question_list.PageID; // for backward compatibility

// extend page with validate function for search
t_question_list.ValidateSearch = function(fobj) {
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
t_question_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_question->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_question->Export == "" && $t_question->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_question_list->LoadRecordset();
	$t_question_list->lTotalRecs = ($bSelectLimit) ? $t_question->SelectRecordCount() : $rs->RecordCount();
	$t_question_list->lStartRec = 1;
	if ($t_question_list->lDisplayRecs <= 0) // Display all records
		$t_question_list->lDisplayRecs = $t_question_list->lTotalRecs;
	if (!($t_question->ExportAll && $t_question->Export <> ""))
		$t_question_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_question_list->LoadRecordset($t_question_list->lStartRec-1, $t_question_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">TABLE: T Question
<?php if ($t_question->Export == "" && $t_question->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_question_list->PageUrl() ?>export=print">Printer Friendly</a>
<?php } ?>
</span></p>
<?php if ($t_question->Export == "" && $t_question->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_question_list);" style="text-decoration: none;"><img id="t_question_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="t_question_list_SearchPanel">
<form name="ft_questionlistsrch" id="ft_questionlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_question_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_question">
<?php
if ($gsSearchError == "")
	$t_question_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_question->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_question_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Nhóm câu hỏi</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_cat_question_id" id="z_cat_question_id" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_cat_question_id" name="x_cat_question_id"<?php echo $t_question->cat_question_id->EditAttributes() ?>>
<?php
if (is_array($t_question->cat_question_id->EditValue)) {
	$arwrk = $t_question->cat_question_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->cat_question_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">FAQ</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_status_faq" id="z_status_faq" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_status_faq" name="x_status_faq"<?php echo $t_question->status_faq->EditAttributes() ?>>
<?php
if (is_array($t_question->status_faq->EditValue)) {
	$arwrk = $t_question->status_faq->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->status_faq->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Xuất bản</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_s_public" id="z_s_public" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_s_public" name="x_s_public"<?php echo $t_question->s_public->EditAttributes() ?>>
<?php
if (is_array($t_question->s_public->EditValue)) {
	$arwrk = $t_question->s_public->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->s_public->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="Submit" name="Submit" id="Submit" value="Tim kiếm">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_question_list->PageUrl() ?>cmd=reset">Hiện hết</a>&nbsp;
		</span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_question_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_question->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_question->CurrentAction <> "gridadd" && $t_question->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_list->Pager)) $t_question_list->Pager = new cNumericPager($t_question_list->lStartRec, $t_question_list->lDisplayRecs, $t_question_list->lTotalRecs, $t_question_list->lRecRange) ?>
<?php if ($t_question_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_question_list->Pager->FromIndex ?> to <?php echo $t_question_list->Pager->ToIndex ?> of <?php echo $t_question_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi được tìm thấy
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_question_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_question_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_question_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_question->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_question->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_questionlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_question_list->sDeleteConfirmMsg ?>')) {document.ft_questionlist.action='t_questiondelete.php';document.ft_questionlist.encoding='application/x-www-form-urlencoded';document.ft_questionlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_questionlist" id="ft_questionlist" class="ewForm" action="" method="post">
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_question_list->lOptionCnt = 0;
	$t_question_list->lOptionCnt++; // view
	$t_question_list->lOptionCnt++; // edit
	$t_question_list->lOptionCnt++; // copy
	$t_question_list->lOptionCnt++; // Multi-select
	$t_question_list->lOptionCnt += count($t_question_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_question->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_question->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_question_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
	<?php if ($t_question->SortUrl($t_question->cat_question_id) == "") { ?>
		<td>Nhóm danh mục</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->cat_question_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Nhóm danh mục</td><td style="width: 10px;"><?php if ($t_question->cat_question_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->cat_question_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->status_faq->Visible) { // status_faq ?>
	<?php if ($t_question->SortUrl($t_question->status_faq) == "") { ?>
		<td>FAQ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->status_faq) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>FAQ</td><td style="width: 10px;"><?php if ($t_question->status_faq->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->status_faq->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_public->Visible) { // s_public ?>
	<?php if ($t_question->SortUrl($t_question->s_public) == "") { ?>
		<td>S Public</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_public) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>S Public</td><td style="width: 10px;"><?php if ($t_question->s_public->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_public->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_question->ExportAll && $t_question->Export <> "") {
	$t_question_list->lStopRec = $t_question_list->lTotalRecs;
} else {
	$t_question_list->lStopRec = $t_question_list->lStartRec + $t_question_list->lDisplayRecs - 1; // Set the last record to display
}
$t_question_list->lRecCount = $t_question_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_question->SelectLimit && $t_question_list->lStartRec > 1)
		$rs->Move($t_question_list->lStartRec - 1);
}
$t_question_list->lRowCnt = 0;
while (($t_question->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_question_list->lRecCount < $t_question_list->lStopRec) {
	$t_question_list->lRecCount++;
	if (intval($t_question_list->lRecCount) >= intval($t_question_list->lStartRec)) {
		$t_question_list->lRowCnt++;

	// Init row class and style
	$t_question->CssClass = "";
	$t_question->CssStyle = "";
	$t_question->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_question->CurrentAction == "gridadd") {
		$t_question_list->LoadDefaultValues(); // Load default values
	} else {
		$t_question_list->LoadRowValues($rs); // Load row values
	}
	$t_question->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_question_list->RenderRow();
?>
	<tr<?php echo $t_question->RowAttributes() ?>>
<?php if ($t_question->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_question->question_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
		<td<?php echo $t_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_question->cat_question_id->ViewAttributes() ?>><?php echo $t_question->cat_question_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->status_faq->Visible) { // status_faq ?>
		<td<?php echo $t_question->status_faq->CellAttributes() ?>>
<div<?php echo $t_question->status_faq->ViewAttributes() ?>><?php echo $t_question->status_faq->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_public->Visible) { // s_public ?>
		<td<?php echo $t_question->s_public->CellAttributes() ?>>
<div<?php echo $t_question->s_public->ViewAttributes() ?>><?php echo $t_question->s_public->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_question->CurrentAction <> "gridadd")
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
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<?php if ($t_question->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_question->CurrentAction <> "gridadd" && $t_question->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_list->Pager)) $t_question_list->Pager = new cNumericPager($t_question_list->lStartRec, $t_question_list->lDisplayRecs, $t_question_list->lTotalRecs, $t_question_list->lRecRange) ?>
<?php if ($t_question_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_question_list->Pager->FromIndex ?> to <?php echo $t_question_list->Pager->ToIndex ?> of <?php echo $t_question_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_question_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_question_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_question_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_question->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_question_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_question->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_questionlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_question_list->sDeleteConfirmMsg ?>')) {document.ft_questionlist.action='t_questiondelete.php';document.ft_questionlist.encoding='application/x-www-form-urlencoded';document.ft_questionlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_question->Export == "" && $t_question->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_question_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_question->Export == "") { ?>
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
class ct_question_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_question';

	// Page Object Name
	var $PageObjName = 't_question_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question;
		if ($t_question->UseTokenInUrl) $PageUrl .= "t=" . $t_question->TableVar . "&"; // add page token
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
		global $objForm, $t_question;
		if ($t_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question"] = new ct_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question;
	$t_question->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_question->Export; // Get export parameter, used in header
	$gsExportFile = $t_question->TableVar; // Get export file, used in header
	if ($t_question->Export == "print" || $t_question->Export == "html") {

		// Printer friendly or Export to HTML, no action required
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
		global $objForm, $gsSearchError, $Security, $t_question;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
		$this->sDeleteConfirmMsg = "Do you want to delete the selected records?"; // Delete confirm message

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

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($t_question->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_question->getRecordsPerPage(); // Restore from Session
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
		$t_question->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_question->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_question->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$t_question->setSessionWhere($sFilter);
		$t_question->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_question;
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
			$t_question->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_question;
		$sWhere = "";
		$this->BuildSearchSql($sWhere, $t_question->question_id, FALSE); // Field question_id
		$this->BuildSearchSql($sWhere, $t_question->cat_question_id, FALSE); // Field cat_question_id
		$this->BuildSearchSql($sWhere, $t_question->IDcard, FALSE); // Field IDcard
		$this->BuildSearchSql($sWhere, $t_question->datetime_h, FALSE); // Field datetime_h
		$this->BuildSearchSql($sWhere, $t_question->msv_id, FALSE); // Field msv_id
		$this->BuildSearchSql($sWhere, $t_question->zemail, FALSE); // Field email
		$this->BuildSearchSql($sWhere, $t_question->user_name, FALSE); // Field user_name
		$this->BuildSearchSql($sWhere, $t_question->tel, FALSE); // Field tel
		$this->BuildSearchSql($sWhere, $t_question->content, FALSE); // Field content
		$this->BuildSearchSql($sWhere, $t_question->content1, FALSE); // Field content1
		$this->BuildSearchSql($sWhere, $t_question->content2, FALSE); // Field content2
		$this->BuildSearchSql($sWhere, $t_question->description, FALSE); // Field description
		$this->BuildSearchSql($sWhere, $t_question->status, FALSE); // Field status
		$this->BuildSearchSql($sWhere, $t_question->active, FALSE); // Field active
		$this->BuildSearchSql($sWhere, $t_question->s_level, FALSE); // Field s_level
		$this->BuildSearchSql($sWhere, $t_question->s_Multi, FALSE); // Field s_Multi
		$this->BuildSearchSql($sWhere, $t_question->s_ok, FALSE); // Field s_ok
		$this->BuildSearchSql($sWhere, $t_question->s_number, FALSE); // Field s_number
		$this->BuildSearchSql($sWhere, $t_question->s_finish, FALSE); // Field s_finish
		$this->BuildSearchSql($sWhere, $t_question->status_faq, FALSE); // Field status_faq
		$this->BuildSearchSql($sWhere, $t_question->s_public, FALSE); // Field s_public
		$this->BuildSearchSql($sWhere, $t_question->datetime_hen, FALSE); // Field datetime_hen
		$this->BuildSearchSql($sWhere, $t_question->datetime_kq, FALSE); // Field datetime_kq
		$this->BuildSearchSql($sWhere, $t_question->reason, FALSE); // Field reason

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_question->question_id); // Field question_id
			$this->SetSearchParm($t_question->cat_question_id); // Field cat_question_id
			$this->SetSearchParm($t_question->IDcard); // Field IDcard
			$this->SetSearchParm($t_question->datetime_h); // Field datetime_h
			$this->SetSearchParm($t_question->msv_id); // Field msv_id
			$this->SetSearchParm($t_question->zemail); // Field email
			$this->SetSearchParm($t_question->user_name); // Field user_name
			$this->SetSearchParm($t_question->tel); // Field tel
			$this->SetSearchParm($t_question->content); // Field content
			$this->SetSearchParm($t_question->content1); // Field content1
			$this->SetSearchParm($t_question->content2); // Field content2
			$this->SetSearchParm($t_question->description); // Field description
			$this->SetSearchParm($t_question->status); // Field status
			$this->SetSearchParm($t_question->active); // Field active
			$this->SetSearchParm($t_question->s_level); // Field s_level
			$this->SetSearchParm($t_question->s_Multi); // Field s_Multi
			$this->SetSearchParm($t_question->s_ok); // Field s_ok
			$this->SetSearchParm($t_question->s_number); // Field s_number
			$this->SetSearchParm($t_question->s_finish); // Field s_finish
			$this->SetSearchParm($t_question->status_faq); // Field status_faq
			$this->SetSearchParm($t_question->s_public); // Field s_public
			$this->SetSearchParm($t_question->datetime_hen); // Field datetime_hen
			$this->SetSearchParm($t_question->datetime_kq); // Field datetime_kq
			$this->SetSearchParm($t_question->reason); // Field reason
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
		global $t_question;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_question->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_question->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_question->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_question->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_question->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_question;
		$this->sSrchWhere = "";
		$t_question->setSearchWhere($this->sSrchWhere);

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_question;
		$t_question->setAdvancedSearch("x_question_id", "");
		$t_question->setAdvancedSearch("x_cat_question_id", "");
		$t_question->setAdvancedSearch("x_IDcard", "");
		$t_question->setAdvancedSearch("x_datetime_h", "");
		$t_question->setAdvancedSearch("y_datetime_h", "");
		$t_question->setAdvancedSearch("x_msv_id", "");
		$t_question->setAdvancedSearch("x_zemail", "");
		$t_question->setAdvancedSearch("x_user_name", "");
		$t_question->setAdvancedSearch("x_tel", "");
		$t_question->setAdvancedSearch("x_content", "");
		$t_question->setAdvancedSearch("x_content1", "");
		$t_question->setAdvancedSearch("x_content2", "");
		$t_question->setAdvancedSearch("x_description", "");
		$t_question->setAdvancedSearch("x_status", "");
		$t_question->setAdvancedSearch("x_active", "");
		$t_question->setAdvancedSearch("x_s_level", "");
		$t_question->setAdvancedSearch("x_s_Multi", "");
		$t_question->setAdvancedSearch("x_s_ok", "");
		$t_question->setAdvancedSearch("x_s_number", "");
		$t_question->setAdvancedSearch("x_s_finish", "");
		$t_question->setAdvancedSearch("x_status_faq", "");
		$t_question->setAdvancedSearch("x_s_public", "");
		$t_question->setAdvancedSearch("x_datetime_hen", "");
		$t_question->setAdvancedSearch("y_datetime_hen", "");
		$t_question->setAdvancedSearch("x_datetime_kq", "");
		$t_question->setAdvancedSearch("y_datetime_kq", "");
		$t_question->setAdvancedSearch("x_reason", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_question;
		$this->sSrchWhere = $t_question->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_question;
		 $t_question->question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_question_id");
		 $t_question->cat_question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_cat_question_id");
		 $t_question->IDcard->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_IDcard");
		 $t_question->datetime_h->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_h");
		 $t_question->datetime_h->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_h");
		 $t_question->msv_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_msv_id");
		 $t_question->zemail->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_zemail");
		 $t_question->user_name->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_user_name");
		 $t_question->tel->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_tel");
		 $t_question->content->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content");
		 $t_question->content1->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content1");
		 $t_question->content2->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content2");
		 $t_question->description->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_description");
		 $t_question->status->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status");
		 $t_question->active->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_active");
		 $t_question->s_level->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_level");
		 $t_question->s_Multi->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_Multi");
		 $t_question->s_ok->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_ok");
		 $t_question->s_number->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_number");
		 $t_question->s_finish->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_finish");
		 $t_question->status_faq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status_faq");
		 $t_question->s_public->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_public");
		 $t_question->datetime_hen->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_hen");
		 $t_question->datetime_hen->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_hen");
		 $t_question->datetime_kq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_kq");
		 $t_question->datetime_kq->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_kq");
		 $t_question->reason->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_reason");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_question;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_question->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_question->CurrentOrderType = @$_GET["ordertype"];
			$t_question->UpdateSort($t_question->cat_question_id); // Field 
			$t_question->UpdateSort($t_question->status_faq); // Field 
			$t_question->UpdateSort($t_question->s_public); // Field 
			$t_question->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_question;
		$sOrderBy = $t_question->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_question->SqlOrderBy() <> "") {
				$sOrderBy = $t_question->SqlOrderBy();
				$t_question->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_question;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_question->setSessionOrderBy($sOrderBy);
				$t_question->cat_question_id->setSort("");
				$t_question->status_faq->setSort("");
				$t_question->s_public->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_question;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_question->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_question->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_question->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_question;

		// Load search values
		// question_id

		$t_question->question_id->AdvancedSearch->SearchValue = @$_GET["x_question_id"];
		$t_question->question_id->AdvancedSearch->SearchOperator = @$_GET["z_question_id"];

		// cat_question_id
		$t_question->cat_question_id->AdvancedSearch->SearchValue = @$_GET["x_cat_question_id"];
		$t_question->cat_question_id->AdvancedSearch->SearchOperator = @$_GET["z_cat_question_id"];

		// IDcard
		$t_question->IDcard->AdvancedSearch->SearchValue = @$_GET["x_IDcard"];
		$t_question->IDcard->AdvancedSearch->SearchOperator = @$_GET["z_IDcard"];

		// datetime_h
		$t_question->datetime_h->AdvancedSearch->SearchValue = @$_GET["x_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchOperator = @$_GET["z_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchCondition = @$_GET["v_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchValue2 = @$_GET["y_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchOperator2 = @$_GET["w_datetime_h"];

		// msv_id
		$t_question->msv_id->AdvancedSearch->SearchValue = @$_GET["x_msv_id"];
		$t_question->msv_id->AdvancedSearch->SearchOperator = @$_GET["z_msv_id"];

		// email
		$t_question->zemail->AdvancedSearch->SearchValue = @$_GET["x_zemail"];
		$t_question->zemail->AdvancedSearch->SearchOperator = @$_GET["z_zemail"];

		// user_name
		$t_question->user_name->AdvancedSearch->SearchValue = @$_GET["x_user_name"];
		$t_question->user_name->AdvancedSearch->SearchOperator = @$_GET["z_user_name"];

		// tel
		$t_question->tel->AdvancedSearch->SearchValue = @$_GET["x_tel"];
		$t_question->tel->AdvancedSearch->SearchOperator = @$_GET["z_tel"];

		// content
		$t_question->content->AdvancedSearch->SearchValue = @$_GET["x_content"];
		$t_question->content->AdvancedSearch->SearchOperator = @$_GET["z_content"];

		// content1
		$t_question->content1->AdvancedSearch->SearchValue = @$_GET["x_content1"];
		$t_question->content1->AdvancedSearch->SearchOperator = @$_GET["z_content1"];

		// content2
		$t_question->content2->AdvancedSearch->SearchValue = @$_GET["x_content2"];
		$t_question->content2->AdvancedSearch->SearchOperator = @$_GET["z_content2"];

		// description
		$t_question->description->AdvancedSearch->SearchValue = @$_GET["x_description"];
		$t_question->description->AdvancedSearch->SearchOperator = @$_GET["z_description"];

		// status
		$t_question->status->AdvancedSearch->SearchValue = @$_GET["x_status"];
		$t_question->status->AdvancedSearch->SearchOperator = @$_GET["z_status"];

		// active
		$t_question->active->AdvancedSearch->SearchValue = @$_GET["x_active"];
		$t_question->active->AdvancedSearch->SearchOperator = @$_GET["z_active"];

		// s_level
		$t_question->s_level->AdvancedSearch->SearchValue = @$_GET["x_s_level"];
		$t_question->s_level->AdvancedSearch->SearchOperator = @$_GET["z_s_level"];

		// s_Multi
		$t_question->s_Multi->AdvancedSearch->SearchValue = @$_GET["x_s_Multi"];
		$t_question->s_Multi->AdvancedSearch->SearchOperator = @$_GET["z_s_Multi"];

		// s_ok
		$t_question->s_ok->AdvancedSearch->SearchValue = @$_GET["x_s_ok"];
		$t_question->s_ok->AdvancedSearch->SearchOperator = @$_GET["z_s_ok"];

		// s_number
		$t_question->s_number->AdvancedSearch->SearchValue = @$_GET["x_s_number"];
		$t_question->s_number->AdvancedSearch->SearchOperator = @$_GET["z_s_number"];

		// s_finish
		$t_question->s_finish->AdvancedSearch->SearchValue = @$_GET["x_s_finish"];
		$t_question->s_finish->AdvancedSearch->SearchOperator = @$_GET["z_s_finish"];

		// status_faq
		$t_question->status_faq->AdvancedSearch->SearchValue = @$_GET["x_status_faq"];
		$t_question->status_faq->AdvancedSearch->SearchOperator = @$_GET["z_status_faq"];

		// s_public
		$t_question->s_public->AdvancedSearch->SearchValue = @$_GET["x_s_public"];
		$t_question->s_public->AdvancedSearch->SearchOperator = @$_GET["z_s_public"];

		// datetime_hen
		$t_question->datetime_hen->AdvancedSearch->SearchValue = @$_GET["x_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchOperator = @$_GET["z_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchCondition = @$_GET["v_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchValue2 = @$_GET["y_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchOperator2 = @$_GET["w_datetime_hen"];

		// datetime_kq
		$t_question->datetime_kq->AdvancedSearch->SearchValue = @$_GET["x_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchOperator = @$_GET["z_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchCondition = @$_GET["v_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchValue2 = @$_GET["y_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchOperator2 = @$_GET["w_datetime_kq"];

		// reason
		$t_question->reason->AdvancedSearch->SearchValue = @$_GET["x_reason"];
		$t_question->reason->AdvancedSearch->SearchOperator = @$_GET["z_reason"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question;

		// Call Recordset Selecting event
		$t_question->Recordset_Selecting($t_question->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question;
		$sFilter = $t_question->KeyFilter();

		// Call Row Selecting event
		$t_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question->CurrentFilter = $sFilter;
		$sSql = $t_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question;
		$t_question->question_id->setDbValue($rs->fields('question_id'));
		$t_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_question->IDcard->setDbValue($rs->fields('IDcard'));
		$t_question->datetime_h->setDbValue($rs->fields('datetime_h'));
		$t_question->msv_id->setDbValue($rs->fields('msv_id'));
		$t_question->zemail->setDbValue($rs->fields('email'));
		$t_question->user_name->setDbValue($rs->fields('user_name'));
		$t_question->tel->setDbValue($rs->fields('tel'));
		$t_question->content->setDbValue($rs->fields('content'));
		$t_question->content1->setDbValue($rs->fields('content1'));
		$t_question->content2->setDbValue($rs->fields('content2'));
		$t_question->description->setDbValue($rs->fields('description'));
		$t_question->status->setDbValue($rs->fields('status'));
		$t_question->active->setDbValue($rs->fields('active'));
		$t_question->s_level->setDbValue($rs->fields('s_level'));
		$t_question->s_Multi->setDbValue($rs->fields('s_Multi'));
		$t_question->s_ok->setDbValue($rs->fields('s_ok'));
		$t_question->s_number->setDbValue($rs->fields('s_number'));
		$t_question->s_finish->setDbValue($rs->fields('s_finish'));
		$t_question->status_faq->setDbValue($rs->fields('status_faq'));
		$t_question->s_public->setDbValue($rs->fields('s_public'));
		$t_question->datetime_hen->setDbValue($rs->fields('datetime_hen'));
		$t_question->datetime_kq->setDbValue($rs->fields('datetime_kq'));
		$t_question->reason->setDbValue($rs->fields('reason'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question;

		// Call Row_Rendering event
		$t_question->Row_Rendering();

		// Common render codes for all row types
		// cat_question_id

		$t_question->cat_question_id->CellCssStyle = "";
		$t_question->cat_question_id->CellCssClass = "";

		// status_faq
		$t_question->status_faq->CellCssStyle = "";
		$t_question->status_faq->CellCssClass = "";

		// s_public
		$t_question->s_public->CellCssStyle = "";
		$t_question->s_public->CellCssClass = "";
		if ($t_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// cat_question_id
			if (strval($t_question->cat_question_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_question` WHERE `cat_question_id` = " . ew_AdjustSql($t_question->cat_question_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_question->cat_question_id->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_question->cat_question_id->ViewValue = $t_question->cat_question_id->CurrentValue;
				}
			} else {
				$t_question->cat_question_id->ViewValue = NULL;
			}
			$t_question->cat_question_id->CssStyle = "";
			$t_question->cat_question_id->CssClass = "";
			$t_question->cat_question_id->ViewCustomAttributes = "";

			// datetime_h
			$t_question->datetime_h->ViewValue = $t_question->datetime_h->CurrentValue;
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 7);
			$t_question->datetime_h->CssStyle = "";
			$t_question->datetime_h->CssClass = "";
			$t_question->datetime_h->ViewCustomAttributes = "";

			// user_name
			$t_question->user_name->ViewValue = $t_question->user_name->CurrentValue;
			$t_question->user_name->CssStyle = "";
			$t_question->user_name->CssClass = "";
			$t_question->user_name->ViewCustomAttributes = "";

			// status_faq
			if (strval($t_question->status_faq->CurrentValue) <> "") {
				switch ($t_question->status_faq->CurrentValue) {
					case "0":
						$t_question->status_faq->ViewValue = "Không";
						break;
					case "1":
						$t_question->status_faq->ViewValue = "FAQ";
						break;
					default:
						$t_question->status_faq->ViewValue = $t_question->status_faq->CurrentValue;
				}
			} else {
				$t_question->status_faq->ViewValue = NULL;
			}
			$t_question->status_faq->CssStyle = "";
			$t_question->status_faq->CssClass = "";
			$t_question->status_faq->ViewCustomAttributes = "";

			// s_public
			if (strval($t_question->s_public->CurrentValue) <> "") {
				switch ($t_question->s_public->CurrentValue) {
					case "0":
						$t_question->s_public->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xuất bản";
						break;
					default:
						$t_question->s_public->ViewValue = $t_question->s_public->CurrentValue;
				}
			} else {
				$t_question->s_public->ViewValue = NULL;
			}
			$t_question->s_public->CssStyle = "";
			$t_question->s_public->CssClass = "";
			$t_question->s_public->ViewCustomAttributes = "";

			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// status_faq
			$t_question->status_faq->HrefValue = "";

			// s_public
			$t_question->s_public->HrefValue = "";
		} elseif ($t_question->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// cat_question_id
			$t_question->cat_question_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `cat_question_id`, `name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_cat_question`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->cat_question_id->EditValue = $arwrk;

			// status_faq
			$t_question->status_faq->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khô");
			$arwrk[] = array("1", " FAQ");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->status_faq->EditValue = $arwrk;

			// s_public
			$t_question->s_public->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->s_public->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$t_question->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_question;

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
		global $t_question;
		$t_question->question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_question_id");
		$t_question->cat_question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_cat_question_id");
		$t_question->IDcard->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_IDcard");
		$t_question->datetime_h->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_h");
		$t_question->datetime_h->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_h");
		$t_question->msv_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_msv_id");
		$t_question->zemail->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_zemail");
		$t_question->user_name->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_user_name");
		$t_question->tel->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_tel");
		$t_question->content->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content");
		$t_question->content1->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content1");
		$t_question->content2->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content2");
		$t_question->description->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_description");
		$t_question->status->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status");
		$t_question->active->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_active");
		$t_question->s_level->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_level");
		$t_question->s_Multi->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_Multi");
		$t_question->s_ok->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_ok");
		$t_question->s_number->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_number");
		$t_question->s_finish->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_finish");
		$t_question->status_faq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status_faq");
		$t_question->s_public->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_public");
		$t_question->datetime_hen->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_hen");
		$t_question->datetime_hen->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_hen");
		$t_question->datetime_kq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_kq");
		$t_question->datetime_kq->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_kq");
		$t_question->reason->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_reason");
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
