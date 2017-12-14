<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_settinginfo.php" ?>
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
$t_setting_list = new ct_setting_list();
$Page =& $t_setting_list;

// Page init processing
$t_setting_list->Page_Init();

// Page main processing
$t_setting_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_setting->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_list = new ew_Page("t_setting_list");

// page properties
t_setting_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_setting_list.PageID; // for backward compatibility

// extend page with validate function for search
t_setting_list.ValidateSearch = function(fobj) {
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
t_setting_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {			
			var inst;			
			for (inst in FCKeditorAPI.__Instances)
				FCKeditorAPI.__Instances[inst].UpdateLinkedField();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {
		var inst = FCKeditorAPI.GetInstance(name);		
		if (inst)
			inst.SetHTML(inst.LinkedField.value)
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {
		var inst = FCKeditorAPI.GetInstance(name);	
		if (inst && inst.EditorWindow) {
			inst.EditorWindow.focus();
		}
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
<?php } ?>
<?php if ($t_setting->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_setting->Export == "" && $t_setting->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_setting_list->LoadRecordset();
	$t_setting_list->lTotalRecs = ($bSelectLimit) ? $t_setting->SelectRecordCount() : $rs->RecordCount();
	$t_setting_list->lStartRec = 1;
	if ($t_setting_list->lDisplayRecs <= 0) // Display all records
		$t_setting_list->lDisplayRecs = $t_setting_list->lTotalRecs;
	if (!($t_setting->ExportAll && $t_setting->Export <> ""))
		$t_setting_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_setting_list->LoadRecordset($t_setting_list->lStartRec-1, $t_setting_list->lDisplayRecs);
?>
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thiết lập trạng thái</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 
<?php 
if (!$Security->CanSearch()) { ?>
<?php if ($t_setting->Export == "" && $t_setting->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_setting_list);" style="text-decoration: none;"><img id="t_setting_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="t_setting_list_SearchPanel">
<form name="ft_settinglistsrch" id="ft_settinglistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_setting_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_setting">
<?php
if ($gsSearchError == "")
	$t_setting_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_setting->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_setting_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Set Type</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_set_type" id="z_set_type" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_set_type" name="x_set_type"<?php echo $t_setting->set_type->EditAttributes() ?>>
<?php
if (is_array($t_setting->set_type->EditValue)) {
	$arwrk = $t_setting->set_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting->set_type->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Set Status</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_set_status" id="z_set_status" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_set_status" name="x_set_status"<?php echo $t_setting->set_status->EditAttributes() ?>>
<?php
if (is_array($t_setting->set_status->EditValue)) {
	$arwrk = $t_setting->set_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting->set_status->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Set Code</span></td>
		<td><span class="ewSearchOpr">contains<input type="hidden" name="z_set_code" id="z_set_code" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_set_code" id="x_set_code" value="<?php echo $t_setting->set_code->EditValue ?>"<?php echo $t_setting->set_code->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_setting->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_setting_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_setting->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_setting->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_setting->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Any word</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $t_setting_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_setting->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_setting->CurrentAction <> "gridadd" && $t_setting->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_list->Pager)) $t_setting_list->Pager = new cNumericPager($t_setting_list->lStartRec, $t_setting_list->lDisplayRecs, $t_setting_list->lTotalRecs, $t_setting_list->lRecRange) ?>
<?php if ($t_setting_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_setting_list->Pager->FromIndex ?> to <?php echo $t_setting_list->Pager->ToIndex ?> of <?php echo $t_setting_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_setting_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_setting">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_setting_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_setting_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_setting_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_setting->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_settinglist" id="ft_settinglist" class="ewForm" action="" method="post">
<?php if ($t_setting_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_setting_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$t_setting_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$t_setting_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$t_setting_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$t_setting_list->lOptionCnt++; // Multi-select
}
	$t_setting_list->lOptionCnt += count($t_setting_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_setting->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_setting->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>

<?php

// Custom list options
foreach ($t_setting_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_setting->set_id->Visible) { // set_id ?>
	<?php if ($t_setting->SortUrl($t_setting->set_id) == "") { ?>
		<td>Set Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Set Id</td><td style="width: 10px;"><?php if ($t_setting->set_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_type->Visible) { // set_type ?>
	<?php if ($t_setting->SortUrl($t_setting->set_type) == "") { ?>
		<td>Loại thiết lập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_type) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại thiết lập</td><td style="width: 10px;"><?php if ($t_setting->set_type->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_type->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_status->Visible) { // set_status ?>
	<?php if ($t_setting->SortUrl($t_setting->set_status) == "") { ?>
		<td>Trạng thái thiết lập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái thiết lập</td><td style="width: 10px;"><?php if ($t_setting->set_status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_date_start->Visible) { // set_date_start ?>
	<?php if ($t_setting->SortUrl($t_setting->set_date_start) == "") { ?>
		<td>Thời gian bắt đầu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_date_start) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian bắt đầu</td><td style="width: 10px;"><?php if ($t_setting->set_date_start->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_date_start->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_date_end->Visible) { // set_date_end ?>
	<?php if ($t_setting->SortUrl($t_setting->set_date_end) == "") { ?>
		<td>Thời gian kết thúc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_date_end) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian kết thúc</td><td style="width: 10px;"><?php if ($t_setting->set_date_end->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_date_end->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_description->Visible) { // set_description ?>
	<?php if ($t_setting->SortUrl($t_setting->set_description) == "") { ?>
		<td >Nội dung</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_description) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td >Nội dung</td><td style="width: 10px;"><?php if ($t_setting->set_description->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_description->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_active->Visible) { // set_active ?>
	<?php if ($t_setting->SortUrl($t_setting->set_active) == "") { ?>
		<td>Kích hoạt</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_active) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Set Active</td><td style="width: 10px;"><?php if ($t_setting->set_active->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_active->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_setting->set_code->Visible) { // set_code ?>
	<?php if ($t_setting->SortUrl($t_setting->set_code) == "") { ?>
		<td>Code</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_setting->SortUrl($t_setting->set_code) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Code</td><td style="width: 10px;"><?php if ($t_setting->set_code->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_setting->set_code->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_setting->ExportAll && $t_setting->Export <> "") {
	$t_setting_list->lStopRec = $t_setting_list->lTotalRecs;
} else {
	$t_setting_list->lStopRec = $t_setting_list->lStartRec + $t_setting_list->lDisplayRecs - 1; // Set the last record to display
}
$t_setting_list->lRecCount = $t_setting_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_setting->SelectLimit && $t_setting_list->lStartRec > 1)
		$rs->Move($t_setting_list->lStartRec - 1);
}
$t_setting_list->lRowCnt = 0;
while (($t_setting->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_setting_list->lRecCount < $t_setting_list->lStopRec) {
	$t_setting_list->lRecCount++;
	if (intval($t_setting_list->lRecCount) >= intval($t_setting_list->lStartRec)) {
		$t_setting_list->lRowCnt++;

	// Init row class and style
	$t_setting->CssClass = "";
	$t_setting->CssStyle = "";
	$t_setting->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_setting->CurrentAction == "gridadd") {
		$t_setting_list->LoadDefaultValues(); // Load default values
	} else {
		$t_setting_list->LoadRowValues($rs); // Load row values
	}
	$t_setting->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_setting_list->RenderRow();
?>
	<tr<?php echo $t_setting->RowAttributes() ?>>
<?php if ($t_setting->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_setting->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>

<?php

// Custom list options
foreach ($t_setting_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_setting->set_id->Visible) { // set_id ?>
		<td<?php echo $t_setting->set_id->CellAttributes() ?>>
<div style="width:10px;" <?php echo $t_setting->set_id->ViewAttributes() ?>><?php echo $t_setting->set_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_type->Visible) { // set_type ?>
		<td<?php echo $t_setting->set_type->CellAttributes() ?>>
<div<?php echo $t_setting->set_type->ViewAttributes() ?>><?php echo $t_setting->set_type->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_status->Visible) { // set_status ?>
		<td<?php echo $t_setting->set_status->CellAttributes() ?>>
<div<?php echo $t_setting->set_status->ViewAttributes() ?>><?php echo $t_setting->set_status->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_date_start->Visible) { // set_date_start ?>
		<td<?php echo $t_setting->set_date_start->CellAttributes() ?>>
<div<?php echo $t_setting->set_date_start->ViewAttributes() ?>><?php echo $t_setting->set_date_start->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_date_end->Visible) { // set_date_end ?>
		<td<?php echo $t_setting->set_date_end->CellAttributes() ?>>
<div<?php echo $t_setting->set_date_end->ViewAttributes() ?>><?php echo $t_setting->set_date_end->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_description->Visible) { // set_description ?>
		<td<?php echo $t_setting->set_description->CellAttributes() ?>>
<div style="width:500px;" <?php echo $t_setting->set_description->ViewAttributes() ?>><?php echo $t_setting->set_description->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_active->Visible) { // set_active ?>
		<td<?php echo $t_setting->set_active->CellAttributes() ?>>
<div<?php echo $t_setting->set_active->ViewAttributes() ?>><?php echo $t_setting->set_active->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_setting->set_code->Visible) { // set_code ?>
		<td<?php echo $t_setting->set_code->CellAttributes() ?>>
<div<?php echo $t_setting->set_code->ViewAttributes() ?>><?php echo $t_setting->set_code->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_setting->CurrentAction <> "gridadd")
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
<?php if ($t_setting_list->lTotalRecs > 0) { ?>
<?php if ($t_setting->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_setting->CurrentAction <> "gridadd" && $t_setting->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_list->Pager)) $t_setting_list->Pager = new cNumericPager($t_setting_list->lStartRec, $t_setting_list->lDisplayRecs, $t_setting_list->lTotalRecs, $t_setting_list->lRecRange) ?>
<?php if ($t_setting_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_list->PageUrl() ?>start=<?php echo $t_setting_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_setting_list->Pager->FromIndex ?> to <?php echo $t_setting_list->Pager->ToIndex ?> of <?php echo $t_setting_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_setting_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_setting">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_setting_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_setting_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_setting_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_setting->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_setting_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>

</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_setting->Export == "" && $t_setting->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_setting_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_setting->Export == "") { ?>
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
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class ct_setting_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_setting';

	// Page Object Name
	var $PageObjName = 't_setting_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting;
		if ($t_setting->UseTokenInUrl) $PageUrl .= "t=" . $t_setting->TableVar . "&"; // add page token
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
		global $objForm, $t_setting;
		if ($t_setting->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting"] = new ct_setting();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting;
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

	$t_setting->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_setting->Export; // Get export parameter, used in header
	$gsExportFile = $t_setting->TableVar; // Get export file, used in header
	if ($t_setting->Export == "print" || $t_setting->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_setting->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_setting->Export == "word") {
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
		global $objForm, $gsSearchError, $Security, $t_setting;
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
		if ($t_setting->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_setting->getRecordsPerPage(); // Restore from Session
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
		$t_setting->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_setting->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_setting->setStartRecordNumber($this->lStartRec);
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
		$t_setting->setSessionWhere($sFilter);
		$t_setting->CurrentFilter = "";

		// Export data only
		if (in_array($t_setting->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_setting;
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
			$t_setting->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_setting->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_setting;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_setting->set_id, FALSE); // Field set_id
		$this->BuildSearchSql($sWhere, $t_setting->set_type, FALSE); // Field set_type
		$this->BuildSearchSql($sWhere, $t_setting->set_status, FALSE); // Field set_status
		$this->BuildSearchSql($sWhere, $t_setting->set_date_start, FALSE); // Field set_date_start
		$this->BuildSearchSql($sWhere, $t_setting->set_date_end, FALSE); // Field set_date_end
		$this->BuildSearchSql($sWhere, $t_setting->set_description, FALSE); // Field set_description
		$this->BuildSearchSql($sWhere, $t_setting->set_active, FALSE); // Field set_active
		$this->BuildSearchSql($sWhere, $t_setting->set_code, FALSE); // Field set_code

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_setting->set_id); // Field set_id
			$this->SetSearchParm($t_setting->set_type); // Field set_type
			$this->SetSearchParm($t_setting->set_status); // Field set_status
			$this->SetSearchParm($t_setting->set_date_start); // Field set_date_start
			$this->SetSearchParm($t_setting->set_date_end); // Field set_date_end
			$this->SetSearchParm($t_setting->set_description); // Field set_description
			$this->SetSearchParm($t_setting->set_active); // Field set_active
			$this->SetSearchParm($t_setting->set_code); // Field set_code
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
		global $t_setting;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_setting->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_setting->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_setting->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_setting->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_setting->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $t_setting;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		if (is_numeric($sKeyword)) $sql .= "set_type = " . $sKeyword . " OR ";
		if (is_numeric($sKeyword)) $sql .= "set_status = " . $sKeyword . " OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_setting;
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
			$t_setting->setBasicSearchKeyword($sSearchKeyword);
			$t_setting->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_setting;
		$this->sSrchWhere = "";
		$t_setting->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_setting;
		$t_setting->setBasicSearchKeyword("");
		$t_setting->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_setting;
		$t_setting->setAdvancedSearch("x_set_id", "");
		$t_setting->setAdvancedSearch("x_set_type", "");
		$t_setting->setAdvancedSearch("x_set_status", "");
		$t_setting->setAdvancedSearch("x_set_date_start", "");
		$t_setting->setAdvancedSearch("x_set_date_end", "");
		$t_setting->setAdvancedSearch("x_set_description", "");
		$t_setting->setAdvancedSearch("x_set_active", "");
		$t_setting->setAdvancedSearch("x_set_code", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_setting;
		$this->sSrchWhere = $t_setting->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_setting;
		 $t_setting->set_id->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_id");
		 $t_setting->set_type->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_type");
		 $t_setting->set_status->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_status");
		 $t_setting->set_date_start->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_date_start");
		 $t_setting->set_date_end->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_date_end");
		 $t_setting->set_description->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_description");
		 $t_setting->set_active->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_active");
		 $t_setting->set_code->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_code");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_setting;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_setting->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_setting->CurrentOrderType = @$_GET["ordertype"];
			$t_setting->UpdateSort($t_setting->set_id); // Field 
			$t_setting->UpdateSort($t_setting->set_type); // Field 
			$t_setting->UpdateSort($t_setting->set_status); // Field 
			$t_setting->UpdateSort($t_setting->set_date_start); // Field 
			$t_setting->UpdateSort($t_setting->set_date_end); // Field 
			$t_setting->UpdateSort($t_setting->set_description); // Field 
			$t_setting->UpdateSort($t_setting->set_active); // Field 
			$t_setting->UpdateSort($t_setting->set_code); // Field 
			$t_setting->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_setting;
		$sOrderBy = $t_setting->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_setting->SqlOrderBy() <> "") {
				$sOrderBy = $t_setting->SqlOrderBy();
				$t_setting->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_setting;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_setting->setSessionOrderBy($sOrderBy);
				$t_setting->set_id->setSort("");
				$t_setting->set_type->setSort("");
				$t_setting->set_status->setSort("");
				$t_setting->set_date_start->setSort("");
				$t_setting->set_date_end->setSort("");
				$t_setting->set_description->setSort("");
				$t_setting->set_active->setSort("");
				$t_setting->set_code->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_setting->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_setting;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_setting->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_setting->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_setting->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_setting->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_setting->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_setting->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_setting;

		// Load search values
		// set_id

		$t_setting->set_id->AdvancedSearch->SearchValue = @$_GET["x_set_id"];
		$t_setting->set_id->AdvancedSearch->SearchOperator = @$_GET["z_set_id"];

		// set_type
		$t_setting->set_type->AdvancedSearch->SearchValue = @$_GET["x_set_type"];
		$t_setting->set_type->AdvancedSearch->SearchOperator = @$_GET["z_set_type"];

		// set_status
		$t_setting->set_status->AdvancedSearch->SearchValue = @$_GET["x_set_status"];
		$t_setting->set_status->AdvancedSearch->SearchOperator = @$_GET["z_set_status"];

		// set_date_start
		$t_setting->set_date_start->AdvancedSearch->SearchValue = @$_GET["x_set_date_start"];
		$t_setting->set_date_start->AdvancedSearch->SearchOperator = @$_GET["z_set_date_start"];

		// set_date_end
		$t_setting->set_date_end->AdvancedSearch->SearchValue = @$_GET["x_set_date_end"];
		$t_setting->set_date_end->AdvancedSearch->SearchOperator = @$_GET["z_set_date_end"];

		// set_description
		$t_setting->set_description->AdvancedSearch->SearchValue = @$_GET["x_set_description"];
		$t_setting->set_description->AdvancedSearch->SearchOperator = @$_GET["z_set_description"];

		// set_active
		$t_setting->set_active->AdvancedSearch->SearchValue = @$_GET["x_set_active"];
		$t_setting->set_active->AdvancedSearch->SearchOperator = @$_GET["z_set_active"];

		// set_code
		$t_setting->set_code->AdvancedSearch->SearchValue = @$_GET["x_set_code"];
		$t_setting->set_code->AdvancedSearch->SearchOperator = @$_GET["z_set_code"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_setting;

		// Call Recordset Selecting event
		$t_setting->Recordset_Selecting($t_setting->CurrentFilter);

		// Load list page SQL
		$sSql = $t_setting->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_setting->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting;
		$sFilter = $t_setting->KeyFilter();

		// Call Row Selecting event
		$t_setting->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting->CurrentFilter = $sFilter;
		$sSql = $t_setting->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting;
		$t_setting->set_id->setDbValue($rs->fields('set_id'));
		$t_setting->set_type->setDbValue($rs->fields('set_type'));
		$t_setting->set_status->setDbValue($rs->fields('set_status'));
		$t_setting->set_date_start->setDbValue($rs->fields('set_date_start'));
		$t_setting->set_date_end->setDbValue($rs->fields('set_date_end'));
		$t_setting->set_description->setDbValue($rs->fields('set_description'));
		$t_setting->set_active->setDbValue($rs->fields('set_active'));
		$t_setting->set_code->setDbValue($rs->fields('set_code'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting;

		// Call Row_Rendering event
		$t_setting->Row_Rendering();

		// Common render codes for all row types
		// set_id

		$t_setting->set_id->CellCssStyle = "";
		$t_setting->set_id->CellCssClass = "";

		// set_type
		$t_setting->set_type->CellCssStyle = "";
		$t_setting->set_type->CellCssClass = "";

		// set_status
		$t_setting->set_status->CellCssStyle = "";
		$t_setting->set_status->CellCssClass = "";

		// set_date_start
		$t_setting->set_date_start->CellCssStyle = "";
		$t_setting->set_date_start->CellCssClass = "";

		// set_date_end
		$t_setting->set_date_end->CellCssStyle = "";
		$t_setting->set_date_end->CellCssClass = "";

		// set_description
		$t_setting->set_description->CellCssStyle = "";
		$t_setting->set_description->CellCssClass = "";

		// set_active
		$t_setting->set_active->CellCssStyle = "";
		$t_setting->set_active->CellCssClass = "";

		// set_code
		$t_setting->set_code->CellCssStyle = "";
		$t_setting->set_code->CellCssClass = "";
		if ($t_setting->RowType == EW_ROWTYPE_VIEW) { // View row

			// set_id
			$t_setting->set_id->ViewValue = $t_setting->set_id->CurrentValue;
			$t_setting->set_id->CssStyle = "";
			$t_setting->set_id->CssClass = "";
			$t_setting->set_id->ViewCustomAttributes = "";

			// set_type
			if (strval($t_setting->set_type->CurrentValue) <> "") {
				switch ($t_setting->set_type->CurrentValue) {
					case "1":
						$t_setting->set_type->ViewValue = "Thiết lập trạng thái đặt câu hỏi";
						break;
					case "2":
						$t_setting->set_type->ViewValue = "Thiết lập trạng thái thăm dò";
						break;
					default:
						$t_setting->set_type->ViewValue = $t_setting->set_type->CurrentValue;
				}
			} else {
				$t_setting->set_type->ViewValue = NULL;
			}
			$t_setting->set_type->CssStyle = "";
			$t_setting->set_type->CssClass = "";
			$t_setting->set_type->ViewCustomAttributes = "";

			// set_status
			if (strval($t_setting->set_status->CurrentValue) <> "") {
				switch ($t_setting->set_status->CurrentValue) {
					case "0":
						$t_setting->set_status->ViewValue = "Mặc định";
						break;
					case "1":
						$t_setting->set_status->ViewValue = "Khóa câu hỏi";
						break;
					case "2":
						$t_setting->set_status->ViewValue = "Thiết lập 2 trạng thái thăm dò";
						break;
					case "3":
						$t_setting->set_status->ViewValue = "Thiết lập thăm dò theo thời gian";
						break;
					case "4":
						$t_setting->set_status->ViewValue = "Thiết lập trạng thái thăm dò xác nhận";
						break;
					default:
						$t_setting->set_status->ViewValue = $t_setting->set_status->CurrentValue;
				}
			} else {
				$t_setting->set_status->ViewValue = NULL;
			}
			$t_setting->set_status->CssStyle = "";
			$t_setting->set_status->CssClass = "";
			$t_setting->set_status->ViewCustomAttributes = "";

			// set_date_start
			$t_setting->set_date_start->ViewValue = $t_setting->set_date_start->CurrentValue;
			$t_setting->set_date_start->ViewValue = ew_FormatDateTime($t_setting->set_date_start->ViewValue, 7);
			$t_setting->set_date_start->CssStyle = "";
			$t_setting->set_date_start->CssClass = "";
			$t_setting->set_date_start->ViewCustomAttributes = "";

			// set_date_end
			$t_setting->set_date_end->ViewValue = $t_setting->set_date_end->CurrentValue;
			$t_setting->set_date_end->ViewValue = ew_FormatDateTime($t_setting->set_date_end->ViewValue, 7);
			$t_setting->set_date_end->CssStyle = "";
			$t_setting->set_date_end->CssClass = "";
			$t_setting->set_date_end->ViewCustomAttributes = "";

			// set_description
			$t_setting->set_description->ViewValue = $t_setting->set_description->CurrentValue;
			$t_setting->set_description->CssStyle = "";
			$t_setting->set_description->CssClass = "";
			$t_setting->set_description->ViewCustomAttributes = "";

			// set_active
			if (strval($t_setting->set_active->CurrentValue) <> "") {
				switch ($t_setting->set_active->CurrentValue) {
					case "0":
						$t_setting->set_active->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_setting->set_active->ViewValue = "<b>Kích hoạt</b>";
						break;
					default:
						$t_setting->set_active->ViewValue = $t_setting->set_active->CurrentValue;
				}
			} else {
				$t_setting->set_active->ViewValue = NULL;
			}
			$t_setting->set_active->CssStyle = "";
			$t_setting->set_active->CssClass = "";
			$t_setting->set_active->ViewCustomAttributes = "";

			// set_code
			$t_setting->set_code->ViewValue = $t_setting->set_code->CurrentValue;
			$t_setting->set_code->CssStyle = "";
			$t_setting->set_code->CssClass = "";
			$t_setting->set_code->ViewCustomAttributes = "";

			// set_id
			$t_setting->set_id->HrefValue = "";

			// set_type
			$t_setting->set_type->HrefValue = "";

			// set_status
			$t_setting->set_status->HrefValue = "";

			// set_date_start
			$t_setting->set_date_start->HrefValue = "";

			// set_date_end
			$t_setting->set_date_end->HrefValue = "";

			// set_description
			$t_setting->set_description->HrefValue = "";

			// set_active
			$t_setting->set_active->HrefValue = "";

			// set_code
			$t_setting->set_code->HrefValue = "";
		} elseif ($t_setting->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// set_id
			$t_setting->set_id->EditCustomAttributes = "";
			$t_setting->set_id->EditValue = ew_HtmlEncode($t_setting->set_id->AdvancedSearch->SearchValue);

			// set_type
			$t_setting->set_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Thiết lập trạng thái câu hỏi");
			$arwrk[] = array("2", "Thiết lập trạng thái thăm dò");
			array_unshift($arwrk, array("", "Please Select"));
			$t_setting->set_type->EditValue = $arwrk;

			// set_status
			$t_setting->set_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Mặc định");
			$arwrk[] = array("1", "Thiết lập trạng thái khóa câu hỏi");
			$arwrk[] = array("2", "Thiết lập 2 trạng thái thăm dò");
			$arwrk[] = array("3", "Thiết lặ trạng thái thăm dò theo thời gian");
			$arwrk[] = array("4", "Thiết lập trạng thái thăm dò xác nhận");
			array_unshift($arwrk, array("", "Please Select"));
			$t_setting->set_status->EditValue = $arwrk;

			// set_date_start
			$t_setting->set_date_start->EditCustomAttributes = "";
			$t_setting->set_date_start->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_setting->set_date_start->AdvancedSearch->SearchValue, 7), 7));

			// set_date_end
			$t_setting->set_date_end->EditCustomAttributes = "";
			$t_setting->set_date_end->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_setting->set_date_end->AdvancedSearch->SearchValue, 7), 7));

			// set_description
			$t_setting->set_description->EditCustomAttributes = "";
			$t_setting->set_description->EditValue = ew_HtmlEncode($t_setting->set_description->AdvancedSearch->SearchValue);

			// set_active
			$t_setting->set_active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_setting->set_active->EditValue = $arwrk;

			// set_code
			$t_setting->set_code->EditCustomAttributes = "";
			$t_setting->set_code->EditValue = ew_HtmlEncode($t_setting->set_code->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$t_setting->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_setting;

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
		global $t_setting;
		$t_setting->set_id->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_id");
		$t_setting->set_type->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_type");
		$t_setting->set_status->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_status");
		$t_setting->set_date_start->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_date_start");
		$t_setting->set_date_end->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_date_end");
		$t_setting->set_description->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_description");
		$t_setting->set_active->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_active");
		$t_setting->set_code->AdvancedSearch->SearchValue = $t_setting->getAdvancedSearch("x_set_code");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_setting;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($t_setting->ExportAll) {
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
		if ($t_setting->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_setting->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_setting->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'set_id', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_type', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_status', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_date_start', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_date_end', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_active', $t_setting->Export);
				echo ew_ExportLine($sExportStr, $t_setting->Export);
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
				$t_setting->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_setting->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('set_id', $t_setting->set_id->CurrentValue);
					$XmlDoc->AddField('set_type', $t_setting->set_type->CurrentValue);
					$XmlDoc->AddField('set_status', $t_setting->set_status->CurrentValue);
					$XmlDoc->AddField('set_date_start', $t_setting->set_date_start->CurrentValue);
					$XmlDoc->AddField('set_date_end', $t_setting->set_date_end->CurrentValue);
					$XmlDoc->AddField('set_active', $t_setting->set_active->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_setting->Export <> "csv") { // Vertical format
						echo ew_ExportField('set_id', $t_setting->set_id->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_type', $t_setting->set_type->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_status', $t_setting->set_status->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_date_start', $t_setting->set_date_start->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_date_end', $t_setting->set_date_end->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_active', $t_setting->set_active->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_setting->set_id->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_type->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_status->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_date_start->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_date_end->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_active->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportLine($sExportStr, $t_setting->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_setting->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_setting->Export);
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
