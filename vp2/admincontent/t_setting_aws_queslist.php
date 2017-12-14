<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_setting_aws_quesinfo.php" ?>
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
$t_setting_aws_ques_list = new ct_setting_aws_ques_list();
$Page =& $t_setting_aws_ques_list;

// Page init processing
$t_setting_aws_ques_list->Page_Init();

// Page main processing
$t_setting_aws_ques_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_aws_ques_list = new ew_Page("t_setting_aws_ques_list");

// page properties
t_setting_aws_ques_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_setting_aws_ques_list.PageID; // for backward compatibility

// extend page with validate function for search
t_setting_aws_ques_list.ValidateSearch = function(fobj) {
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
t_setting_aws_ques_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_aws_ques_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_aws_ques_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_aws_ques_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_setting_aws_ques->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_setting_aws_ques->Export == "" && $t_setting_aws_ques->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_setting_aws_ques_list->LoadRecordset();
	$t_setting_aws_ques_list->lTotalRecs = ($bSelectLimit) ? $t_setting_aws_ques->SelectRecordCount() : $rs->RecordCount();
	$t_setting_aws_ques_list->lStartRec = 1;
	if ($t_setting_aws_ques_list->lDisplayRecs <= 0) // Display all records
		$t_setting_aws_ques_list->lDisplayRecs = $t_setting_aws_ques_list->lTotalRecs;
	if (!($t_setting_aws_ques->ExportAll && $t_setting_aws_ques->Export <> ""))
		$t_setting_aws_ques_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_setting_aws_ques_list->LoadRecordset($t_setting_aws_ques_list->lStartRec-1, $t_setting_aws_ques_list->lDisplayRecs);
?>
<p>
         <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thiết lập thời gian hỏi đáp</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>    
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_setting_aws_ques->Export == "" && $t_setting_aws_ques->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_setting_aws_ques_list);" style="text-decoration: none;"><img id="t_setting_aws_ques_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="t_setting_aws_ques_list_SearchPanel">
<form name="ft_setting_aws_queslistsrch" id="ft_setting_aws_queslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_setting_aws_ques_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_setting_aws_ques">
<?php
if ($gsSearchError == "")
	$t_setting_aws_ques_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_setting_aws_ques->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_setting_aws_ques_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Năm</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_year" id="z_year" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_year" name="x_year"<?php echo $t_setting_aws_ques->year->EditAttributes() ?>>
<?php
if (is_array($t_setting_aws_ques->year->EditValue)) {
	$arwrk = $t_setting_aws_ques->year->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting_aws_ques->year->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Loại thiết lập</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_type_setting" id="z_type_setting" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_type_setting" name="x_type_setting"<?php echo $t_setting_aws_ques->type_setting->EditAttributes() ?>>
<?php
if (is_array($t_setting_aws_ques->type_setting->EditValue)) {
	$arwrk = $t_setting_aws_ques->type_setting->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting_aws_ques->type_setting->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_setting_aws_ques->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_setting_aws_ques->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_setting_aws_ques->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_setting_aws_ques->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Any word</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $t_setting_aws_ques_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_setting_aws_ques->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_setting_aws_ques->CurrentAction <> "gridadd" && $t_setting_aws_ques->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_aws_ques_list->Pager)) $t_setting_aws_ques_list->Pager = new cNumericPager($t_setting_aws_ques_list->lStartRec, $t_setting_aws_ques_list->lDisplayRecs, $t_setting_aws_ques_list->lTotalRecs, $t_setting_aws_ques_list->lRecRange) ?>
<?php if ($t_setting_aws_ques_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_aws_ques_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_aws_ques_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_setting_aws_ques_list->Pager->FromIndex ?> to <?php echo $t_setting_aws_ques_list->Pager->ToIndex ?> of <?php echo $t_setting_aws_ques_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_aws_ques_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_setting_aws_ques">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_setting_aws_ques_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_setting_aws_ques_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_setting_aws_ques_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_setting_aws_ques->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting_aws_ques->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_setting_aws_queslist)) alert('No records selected'); else {document.ft_setting_aws_queslist.action='t_setting_aws_quesdelete.php';document.ft_setting_aws_queslist.encoding='application/x-www-form-urlencoded';document.ft_setting_aws_queslist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_setting_aws_queslist" id="ft_setting_aws_queslist" class="ewForm" action="" method="post">
<?php if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_setting_aws_ques_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$t_setting_aws_ques_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$t_setting_aws_ques_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$t_setting_aws_ques_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$t_setting_aws_ques_list->lOptionCnt++; // Multi-select
}
	$t_setting_aws_ques_list->lOptionCnt += count($t_setting_aws_ques_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_setting_aws_ques->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_setting_aws_ques->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;width: 10px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 10px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;width: 10px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 10px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_setting_aws_ques_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_setting_aws_ques_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_setting_aws_ques->year->Visible) { // year ?>
	<?php if ($t_setting_aws_ques->SortUrl($t_setting_aws_ques->year) == "") { ?>
		<td>Year</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting_aws_ques->SortUrl($t_setting_aws_ques->year) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Năm</td><td style="width: 10px;"><?php if ($t_setting_aws_ques->year->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting_aws_ques->year->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting_aws_ques->type_setting->Visible) { // type_setting ?>
	<?php if ($t_setting_aws_ques->SortUrl($t_setting_aws_ques->type_setting) == "") { ?>
		<td>Loại thiết lập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting_aws_ques->SortUrl($t_setting_aws_ques->type_setting) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại thiết lập</td><td style="width: 10px;"><?php if ($t_setting_aws_ques->type_setting->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting_aws_ques->type_setting->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting_aws_ques->datetime->Visible) { // datetime ?>
	<?php if ($t_setting_aws_ques->SortUrl($t_setting_aws_ques->datetime) == "") { ?>
		<td>Datetime</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting_aws_ques->SortUrl($t_setting_aws_ques->datetime) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Danh sách ngày&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_setting_aws_ques->datetime->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting_aws_ques->datetime->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting_aws_ques->active->Visible) { // active ?>
	<?php if ($t_setting_aws_ques->SortUrl($t_setting_aws_ques->active) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting_aws_ques->SortUrl($t_setting_aws_ques->active) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($t_setting_aws_ques->active->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting_aws_ques->active->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_setting_aws_ques->ExportAll && $t_setting_aws_ques->Export <> "") {
	$t_setting_aws_ques_list->lStopRec = $t_setting_aws_ques_list->lTotalRecs;
} else {
	$t_setting_aws_ques_list->lStopRec = $t_setting_aws_ques_list->lStartRec + $t_setting_aws_ques_list->lDisplayRecs - 1; // Set the last record to display
}
$t_setting_aws_ques_list->lRecCount = $t_setting_aws_ques_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_setting_aws_ques->SelectLimit && $t_setting_aws_ques_list->lStartRec > 1)
		$rs->Move($t_setting_aws_ques_list->lStartRec - 1);
}
$t_setting_aws_ques_list->lRowCnt = 0;
while (($t_setting_aws_ques->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_setting_aws_ques_list->lRecCount < $t_setting_aws_ques_list->lStopRec) {
	$t_setting_aws_ques_list->lRecCount++;
	if (intval($t_setting_aws_ques_list->lRecCount) >= intval($t_setting_aws_ques_list->lStartRec)) {
		$t_setting_aws_ques_list->lRowCnt++;

	// Init row class and style
	$t_setting_aws_ques->CssClass = "";
	$t_setting_aws_ques->CssStyle = "";
	$t_setting_aws_ques->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_setting_aws_ques->CurrentAction == "gridadd") {
		$t_setting_aws_ques_list->LoadDefaultValues(); // Load default values
	} else {
		$t_setting_aws_ques_list->LoadRowValues($rs); // Load row values
	}
	$t_setting_aws_ques->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_setting_aws_ques_list->RenderRow();
?>
	<tr<?php echo $t_setting_aws_ques->RowAttributes() ?>>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;width: 10px"><span class="phpmaker">
<a href="<?php echo $t_setting_aws_ques->ViewUrl() ?>">View</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 10px"><span class="phpmaker">
<a href="<?php echo $t_setting_aws_ques->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;width: 10px"><span class="phpmaker">
<a href="<?php echo $t_setting_aws_ques->CopyUrl() ?>">Copy</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_setting_aws_ques->id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_setting_aws_ques_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_setting_aws_ques->year->Visible) { // year ?>
		<td<?php echo $t_setting_aws_ques->year->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->year->ViewAttributes() ?>><?php echo $t_setting_aws_ques->year->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting_aws_ques->type_setting->Visible) { // type_setting ?>
		<td<?php echo $t_setting_aws_ques->type_setting->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->type_setting->ViewAttributes() ?>><?php echo $t_setting_aws_ques->type_setting->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting_aws_ques->datetime->Visible) { // datetime ?>
		<td<?php echo $t_setting_aws_ques->datetime->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->datetime->ViewAttributes() ?>><?php echo $t_setting_aws_ques->datetime->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting_aws_ques->active->Visible) { // active ?>
		<td<?php echo $t_setting_aws_ques->active->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->active->ViewAttributes() ?>><?php echo $t_setting_aws_ques->active->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_setting_aws_ques->CurrentAction <> "gridadd")
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
<?php if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
<?php if ($t_setting_aws_ques->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_setting_aws_ques->CurrentAction <> "gridadd" && $t_setting_aws_ques->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_aws_ques_list->Pager)) $t_setting_aws_ques_list->Pager = new cNumericPager($t_setting_aws_ques_list->lStartRec, $t_setting_aws_ques_list->lDisplayRecs, $t_setting_aws_ques_list->lTotalRecs, $t_setting_aws_ques_list->lRecRange) ?>
<?php if ($t_setting_aws_ques_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_aws_ques_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_aws_ques_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_aws_ques_list->PageUrl() ?>start=<?php echo $t_setting_aws_ques_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_aws_ques_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_setting_aws_ques_list->Pager->FromIndex ?> to <?php echo $t_setting_aws_ques_list->Pager->ToIndex ?> of <?php echo $t_setting_aws_ques_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_aws_ques_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_setting_aws_ques">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_setting_aws_ques_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_setting_aws_ques_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_setting_aws_ques_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_setting_aws_ques->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting_aws_ques->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_setting_aws_ques_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_setting_aws_queslist)) alert('No records selected'); else {document.ft_setting_aws_queslist.action='t_setting_aws_quesdelete.php';document.ft_setting_aws_queslist.encoding='application/x-www-form-urlencoded';document.ft_setting_aws_queslist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_setting_aws_ques->Export == "" && $t_setting_aws_ques->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_setting_aws_ques_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_setting_aws_ques->Export == "") { ?>
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
class ct_setting_aws_ques_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_setting_aws_ques';

	// Page Object Name
	var $PageObjName = 't_setting_aws_ques_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) $PageUrl .= "t=" . $t_setting_aws_ques->TableVar . "&"; // add page token
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
		global $objForm, $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting_aws_ques->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting_aws_ques->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_aws_ques_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting_aws_ques"] = new ct_setting_aws_ques();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting_aws_ques', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting_aws_ques;
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
	$t_setting_aws_ques->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_setting_aws_ques->Export; // Get export parameter, used in header
	$gsExportFile = $t_setting_aws_ques->TableVar; // Get export file, used in header
	if ($t_setting_aws_ques->Export == "print" || $t_setting_aws_ques->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_setting_aws_ques->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_setting_aws_ques->Export == "word") {
		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
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
		global $objForm, $gsSearchError, $Security, $t_setting_aws_ques;
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
		if ($t_setting_aws_ques->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_setting_aws_ques->getRecordsPerPage(); // Restore from Session
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
		$t_setting_aws_ques->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_setting_aws_ques->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
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
		$t_setting_aws_ques->setSessionWhere($sFilter);
		$t_setting_aws_ques->CurrentFilter = "";

		// Export data only
		if (in_array($t_setting_aws_ques->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_setting_aws_ques;
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
			$t_setting_aws_ques->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_setting_aws_ques;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_setting_aws_ques->id, FALSE); // Field id
		$this->BuildSearchSql($sWhere, $t_setting_aws_ques->year, FALSE); // Field year
		$this->BuildSearchSql($sWhere, $t_setting_aws_ques->type_setting, FALSE); // Field type_setting
		$this->BuildSearchSql($sWhere, $t_setting_aws_ques->datetime, FALSE); // Field datetime
		$this->BuildSearchSql($sWhere, $t_setting_aws_ques->active, FALSE); // Field active

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_setting_aws_ques->id); // Field id
			$this->SetSearchParm($t_setting_aws_ques->year); // Field year
			$this->SetSearchParm($t_setting_aws_ques->type_setting); // Field type_setting
			$this->SetSearchParm($t_setting_aws_ques->datetime); // Field datetime
			$this->SetSearchParm($t_setting_aws_ques->active); // Field active
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
		global $t_setting_aws_ques;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_setting_aws_ques->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_setting_aws_ques->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_setting_aws_ques->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_setting_aws_ques->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_setting_aws_ques->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $t_setting_aws_ques;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_setting_aws_ques->datetime->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_setting_aws_ques;
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
			$t_setting_aws_ques->setBasicSearchKeyword($sSearchKeyword);
			$t_setting_aws_ques->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_setting_aws_ques;
		$this->sSrchWhere = "";
		$t_setting_aws_ques->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_setting_aws_ques;
		$t_setting_aws_ques->setBasicSearchKeyword("");
		$t_setting_aws_ques->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_setting_aws_ques;
		$t_setting_aws_ques->setAdvancedSearch("x_id", "");
		$t_setting_aws_ques->setAdvancedSearch("x_year", "");
		$t_setting_aws_ques->setAdvancedSearch("x_type_setting", "");
		$t_setting_aws_ques->setAdvancedSearch("x_datetime", "");
		$t_setting_aws_ques->setAdvancedSearch("x_active", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_setting_aws_ques;
		$this->sSrchWhere = $t_setting_aws_ques->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_setting_aws_ques;
		 $t_setting_aws_ques->id->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_id");
		 $t_setting_aws_ques->year->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_year");
		 $t_setting_aws_ques->type_setting->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_type_setting");
		 $t_setting_aws_ques->datetime->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_datetime");
		 $t_setting_aws_ques->active->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_active");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_setting_aws_ques;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_setting_aws_ques->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_setting_aws_ques->CurrentOrderType = @$_GET["ordertype"];
			$t_setting_aws_ques->UpdateSort($t_setting_aws_ques->year); // Field 
			$t_setting_aws_ques->UpdateSort($t_setting_aws_ques->type_setting); // Field 
			$t_setting_aws_ques->UpdateSort($t_setting_aws_ques->datetime); // Field 
			$t_setting_aws_ques->UpdateSort($t_setting_aws_ques->active); // Field 
			$t_setting_aws_ques->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_setting_aws_ques;
		$sOrderBy = $t_setting_aws_ques->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_setting_aws_ques->SqlOrderBy() <> "") {
				$sOrderBy = $t_setting_aws_ques->SqlOrderBy();
				$t_setting_aws_ques->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_setting_aws_ques;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_setting_aws_ques->setSessionOrderBy($sOrderBy);
				$t_setting_aws_ques->year->setSort("");
				$t_setting_aws_ques->type_setting->setSort("");
				$t_setting_aws_ques->datetime->setSort("");
				$t_setting_aws_ques->active->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_setting_aws_ques;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_setting_aws_ques->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_setting_aws_ques->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_setting_aws_ques;

		// Load search values
		// id

		$t_setting_aws_ques->id->AdvancedSearch->SearchValue = @$_GET["x_id"];
		$t_setting_aws_ques->id->AdvancedSearch->SearchOperator = @$_GET["z_id"];

		// year
		$t_setting_aws_ques->year->AdvancedSearch->SearchValue = @$_GET["x_year"];
		$t_setting_aws_ques->year->AdvancedSearch->SearchOperator = @$_GET["z_year"];

		// type_setting
		$t_setting_aws_ques->type_setting->AdvancedSearch->SearchValue = @$_GET["x_type_setting"];
		$t_setting_aws_ques->type_setting->AdvancedSearch->SearchOperator = @$_GET["z_type_setting"];

		// datetime
		$t_setting_aws_ques->datetime->AdvancedSearch->SearchValue = @$_GET["x_datetime"];
		$t_setting_aws_ques->datetime->AdvancedSearch->SearchOperator = @$_GET["z_datetime"];

		// active
		$t_setting_aws_ques->active->AdvancedSearch->SearchValue = @$_GET["x_active"];
		$t_setting_aws_ques->active->AdvancedSearch->SearchOperator = @$_GET["z_active"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_setting_aws_ques;

		// Call Recordset Selecting event
		$t_setting_aws_ques->Recordset_Selecting($t_setting_aws_ques->CurrentFilter);

		// Load list page SQL
		$sSql = $t_setting_aws_ques->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_setting_aws_ques->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting_aws_ques;
		$sFilter = $t_setting_aws_ques->KeyFilter();

		// Call Row Selecting event
		$t_setting_aws_ques->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting_aws_ques->CurrentFilter = $sFilter;
		$sSql = $t_setting_aws_ques->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting_aws_ques->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting_aws_ques;
		$t_setting_aws_ques->id->setDbValue($rs->fields('id'));
		$t_setting_aws_ques->year->setDbValue($rs->fields('year'));
		$t_setting_aws_ques->type_setting->setDbValue($rs->fields('type_setting'));
		$t_setting_aws_ques->datetime->setDbValue($rs->fields('datetime'));
		$t_setting_aws_ques->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting_aws_ques;

		// Call Row_Rendering event
		$t_setting_aws_ques->Row_Rendering();

		// Common render codes for all row types
		// year

		$t_setting_aws_ques->year->CellCssStyle = "";
		$t_setting_aws_ques->year->CellCssClass = "";

		// type_setting
		$t_setting_aws_ques->type_setting->CellCssStyle = "";
		$t_setting_aws_ques->type_setting->CellCssClass = "";

		// datetime
		$t_setting_aws_ques->datetime->CellCssStyle = "";
		$t_setting_aws_ques->datetime->CellCssClass = "";

		// active
		$t_setting_aws_ques->active->CellCssStyle = "";
		$t_setting_aws_ques->active->CellCssClass = "";
		if ($t_setting_aws_ques->RowType == EW_ROWTYPE_VIEW) { // View row

			// id
			$t_setting_aws_ques->id->ViewValue = $t_setting_aws_ques->id->CurrentValue;
			$t_setting_aws_ques->id->CssStyle = "";
			$t_setting_aws_ques->id->CssClass = "";
			$t_setting_aws_ques->id->ViewCustomAttributes = "";

			// year
			if (strval($t_setting_aws_ques->year->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->year->CurrentValue) {
					case "2015":
						$t_setting_aws_ques->year->ViewValue = "2015";
						break;
					case "2016":
						$t_setting_aws_ques->year->ViewValue = "2016";
						break;
					case "2017":
						$t_setting_aws_ques->year->ViewValue = "2017";
						break;
					case "2018":
						$t_setting_aws_ques->year->ViewValue = "2018";
						break;
					case "2019":
						$t_setting_aws_ques->year->ViewValue = "2019";
						break;
					default:
						$t_setting_aws_ques->year->ViewValue = $t_setting_aws_ques->year->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->year->ViewValue = NULL;
			}
			$t_setting_aws_ques->year->CssStyle = "";
			$t_setting_aws_ques->year->CssClass = "";
			$t_setting_aws_ques->year->ViewCustomAttributes = "";

			// type_setting
			if (strval($t_setting_aws_ques->type_setting->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->type_setting->CurrentValue) {
					
					case "2":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiết lập ngày nghỉ trên hệ thống";
						break;
					default:
						$t_setting_aws_ques->type_setting->ViewValue = $t_setting_aws_ques->type_setting->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->type_setting->ViewValue = NULL;
			}
			$t_setting_aws_ques->type_setting->CssStyle = "";
			$t_setting_aws_ques->type_setting->CssClass = "";
			$t_setting_aws_ques->type_setting->ViewCustomAttributes = "";

			// datetime
			$t_setting_aws_ques->datetime->ViewValue = $t_setting_aws_ques->datetime->CurrentValue;
			$t_setting_aws_ques->datetime->CssStyle = "";
			$t_setting_aws_ques->datetime->CssClass = "";
			$t_setting_aws_ques->datetime->ViewCustomAttributes = "";

			// active
			if (strval($t_setting_aws_ques->active->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->active->CurrentValue) {
					case "0":
						$t_setting_aws_ques->active->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_setting_aws_ques->active->ViewValue = "Kích hoạt";
						break;
					default:
						$t_setting_aws_ques->active->ViewValue = $t_setting_aws_ques->active->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->active->ViewValue = NULL;
			}
			$t_setting_aws_ques->active->CssStyle = "";
			$t_setting_aws_ques->active->CssClass = "";
			$t_setting_aws_ques->active->ViewCustomAttributes = "";

			// year
			$t_setting_aws_ques->year->HrefValue = "";

			// type_setting
			$t_setting_aws_ques->type_setting->HrefValue = "";

			// datetime
			$t_setting_aws_ques->datetime->HrefValue = "";

			// active
			$t_setting_aws_ques->active->HrefValue = "";
		} elseif ($t_setting_aws_ques->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// year
			$t_setting_aws_ques->year->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("2015", "2015");
			$arwrk[] = array("2016", "2016");
			$arwrk[] = array("2017", "2017");
			$arwrk[] = array("2018", "2018");
			$arwrk[] = array("2019", "2019");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$t_setting_aws_ques->year->EditValue = $arwrk;

			// type_setting
			$t_setting_aws_ques->type_setting->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("2", "Thiết lập ngày nghỉ trên hệ thống");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$t_setting_aws_ques->type_setting->EditValue = $arwrk;

			// datetime
			$t_setting_aws_ques->datetime->EditCustomAttributes = "";
			$t_setting_aws_ques->datetime->EditValue = ew_HtmlEncode($t_setting_aws_ques->datetime->AdvancedSearch->SearchValue);

			// active
			$t_setting_aws_ques->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_setting_aws_ques->active->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$t_setting_aws_ques->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_setting_aws_ques;

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
		global $t_setting_aws_ques;
		$t_setting_aws_ques->id->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_id");
		$t_setting_aws_ques->year->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_year");
		$t_setting_aws_ques->type_setting->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_type_setting");
		$t_setting_aws_ques->datetime->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_datetime");
		$t_setting_aws_ques->active->AdvancedSearch->SearchValue = $t_setting_aws_ques->getAdvancedSearch("x_active");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_setting_aws_ques;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($t_setting_aws_ques->ExportAll) {
			$this->lStopRec = $this->lTotalRecs;
		} else { // Export 1 page only
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		}
		if ($t_setting_aws_ques->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_setting_aws_ques->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_setting_aws_ques->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'id', $t_setting_aws_ques->Export);
				ew_ExportAddValue($sExportStr, 'year', $t_setting_aws_ques->Export);
				ew_ExportAddValue($sExportStr, 'type_setting', $t_setting_aws_ques->Export);
				ew_ExportAddValue($sExportStr, 'active', $t_setting_aws_ques->Export);
				echo ew_ExportLine($sExportStr, $t_setting_aws_ques->Export);
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row for display
				$t_setting_aws_ques->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_setting_aws_ques->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('id', $t_setting_aws_ques->id->CurrentValue);
					$XmlDoc->AddField('year', $t_setting_aws_ques->year->CurrentValue);
					$XmlDoc->AddField('type_setting', $t_setting_aws_ques->type_setting->CurrentValue);
					$XmlDoc->AddField('active', $t_setting_aws_ques->active->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_setting_aws_ques->Export <> "csv") { // Vertical format
						echo ew_ExportField('id', $t_setting_aws_ques->id->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportField('year', $t_setting_aws_ques->year->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportField('type_setting', $t_setting_aws_ques->type_setting->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportField('active', $t_setting_aws_ques->active->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->id->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->year->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->type_setting->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						ew_ExportAddValue($sExportStr, $t_setting_aws_ques->active->ExportValue($t_setting_aws_ques->Export, $t_setting_aws_ques->ExportOriginalValue), $t_setting_aws_ques->Export);
						echo ew_ExportLine($sExportStr, $t_setting_aws_ques->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_setting_aws_ques->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_setting_aws_ques->Export);
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
