<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
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
&nbsp;&nbsp;<a href="<?php echo $t_question_list->PageUrl() ?>export=excel">Export to Excel</a>
&nbsp;&nbsp;<a href="<?php echo $t_question_list->PageUrl() ?>export=word">Export to Word</a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
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
		<td><span class="phpmaker">ID Group</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_ID_Group" id="z_ID_Group" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_ID_Group" name="x_ID_Group"<?php echo $t_question->ID_Group->EditAttributes() ?>>
<?php
if (is_array($t_question->ID_Group->EditValue)) {
	$arwrk = $t_question->ID_Group->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->ID_Group->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_question->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_question_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_question->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_question->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_question->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Any word</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
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
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_question_list->Pager->FromIndex ?> to <?php echo $t_question_list->Pager->ToIndex ?> of <?php echo $t_question_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
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
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_question->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_questionlist)) alert('No records selected'); else {document.ft_questionlist.action='t_questiondelete.php';document.ft_questionlist.encoding='application/x-www-form-urlencoded';document.ft_questionlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
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
if ($Security->CanView()) {
	$t_question_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$t_question_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$t_question_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$t_question_list->lOptionCnt++; // Multi-select
}
	$t_question_list->lOptionCnt += count($t_question_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_question->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_question->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_question_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_question->question_id->Visible) { // question_id ?>
	<?php if ($t_question->SortUrl($t_question->question_id) == "") { ?>
		<td>Question Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->question_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Question Id</td><td style="width: 10px;"><?php if ($t_question->question_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->question_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
	<?php if ($t_question->SortUrl($t_question->cat_question_id) == "") { ?>
		<td>Cat Question Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->cat_question_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Cat Question Id</td><td style="width: 10px;"><?php if ($t_question->cat_question_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->cat_question_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->IDcard->Visible) { // IDcard ?>
	<?php if ($t_question->SortUrl($t_question->IDcard) == "") { ?>
		<td>IDcard</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->IDcard) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>IDcard&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question->IDcard->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->IDcard->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
	<?php if ($t_question->SortUrl($t_question->datetime_h) == "") { ?>
		<td>Datetime H</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_h) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Datetime H</td><td style="width: 10px;"><?php if ($t_question->datetime_h->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_h->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->msv_id->Visible) { // msv_id ?>
	<?php if ($t_question->SortUrl($t_question->msv_id) == "") { ?>
		<td>Msv Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->msv_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Msv Id&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question->msv_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->msv_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->zemail->Visible) { // email ?>
	<?php if ($t_question->SortUrl($t_question->zemail) == "") { ?>
		<td>Email</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->zemail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Email&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question->zemail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->zemail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->user_name->Visible) { // user_name ?>
	<?php if ($t_question->SortUrl($t_question->user_name) == "") { ?>
		<td>User Name</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->user_name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>User Name&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question->user_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->user_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->tel->Visible) { // tel ?>
	<?php if ($t_question->SortUrl($t_question->tel) == "") { ?>
		<td>Tel</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->tel) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tel&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question->tel->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->tel->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->status->Visible) { // status ?>
	<?php if ($t_question->SortUrl($t_question->status) == "") { ?>
		<td>Status</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Status</td><td style="width: 10px;"><?php if ($t_question->status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->active->Visible) { // active ?>
	<?php if ($t_question->SortUrl($t_question->active) == "") { ?>
		<td>Active</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->active) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Active</td><td style="width: 10px;"><?php if ($t_question->active->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->active->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_level->Visible) { // s_level ?>
	<?php if ($t_question->SortUrl($t_question->s_level) == "") { ?>
		<td>S Level</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_level) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>S Level</td><td style="width: 10px;"><?php if ($t_question->s_level->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_level->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_Multi->Visible) { // s_Multi ?>
	<?php if ($t_question->SortUrl($t_question->s_Multi) == "") { ?>
		<td>S Multi</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_Multi) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>S Multi</td><td style="width: 10px;"><?php if ($t_question->s_Multi->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_Multi->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_ok->Visible) { // s_ok ?>
	<?php if ($t_question->SortUrl($t_question->s_ok) == "") { ?>
		<td>S Ok</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_ok) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>S Ok</td><td style="width: 10px;"><?php if ($t_question->s_ok->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_ok->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_number->Visible) { // s_number ?>
	<?php if ($t_question->SortUrl($t_question->s_number) == "") { ?>
		<td>S Number</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_number) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>S Number</td><td style="width: 10px;"><?php if ($t_question->s_number->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_number->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_finish->Visible) { // s_finish ?>
	<?php if ($t_question->SortUrl($t_question->s_finish) == "") { ?>
		<td>S Finish</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_finish) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>S Finish</td><td style="width: 10px;"><?php if ($t_question->s_finish->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_finish->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->status_faq->Visible) { // status_faq ?>
	<?php if ($t_question->SortUrl($t_question->status_faq) == "") { ?>
		<td>Status Faq</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->status_faq) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Status Faq</td><td style="width: 10px;"><?php if ($t_question->status_faq->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->status_faq->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
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
<?php if ($t_question->datetime_hen->Visible) { // datetime_hen ?>
	<?php if ($t_question->SortUrl($t_question->datetime_hen) == "") { ?>
		<td>Datetime Hen</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_hen) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Datetime Hen</td><td style="width: 10px;"><?php if ($t_question->datetime_hen->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_hen->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->datetime_kq->Visible) { // datetime_kq ?>
	<?php if ($t_question->SortUrl($t_question->datetime_kq) == "") { ?>
		<td>Datetime Kq</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_kq) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Datetime Kq</td><td style="width: 10px;"><?php if ($t_question->datetime_kq->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_kq->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->user_IDAndser->Visible) { // user_IDAndser ?>
	<?php if ($t_question->SortUrl($t_question->user_IDAndser) == "") { ?>
		<td>User IDAndser</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->user_IDAndser) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>User IDAndser&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question->user_IDAndser->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->user_IDAndser->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->datetime_update->Visible) { // datetime_update ?>
	<?php if ($t_question->SortUrl($t_question->datetime_update) == "") { ?>
		<td>Datetime Update</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_update) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Datetime Update</td><td style="width: 10px;"><?php if ($t_question->datetime_update->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_update->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->ID_Group->Visible) { // ID_Group ?>
	<?php if ($t_question->SortUrl($t_question->ID_Group) == "") { ?>
		<td>ID Group</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->ID_Group) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>ID Group</td><td style="width: 10px;"><?php if ($t_question->ID_Group->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->ID_Group->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
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
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->ViewUrl() ?>">View</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->CopyUrl() ?>">Copy</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_question->question_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_question->question_id->Visible) { // question_id ?>
		<td<?php echo $t_question->question_id->CellAttributes() ?>>
<div<?php echo $t_question->question_id->ViewAttributes() ?>><?php echo $t_question->question_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
		<td<?php echo $t_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_question->cat_question_id->ViewAttributes() ?>><?php echo $t_question->cat_question_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->IDcard->Visible) { // IDcard ?>
		<td<?php echo $t_question->IDcard->CellAttributes() ?>>
<div<?php echo $t_question->IDcard->ViewAttributes() ?>><?php echo $t_question->IDcard->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
		<td<?php echo $t_question->datetime_h->CellAttributes() ?>>
<div<?php echo $t_question->datetime_h->ViewAttributes() ?>><?php echo $t_question->datetime_h->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->msv_id->Visible) { // msv_id ?>
		<td<?php echo $t_question->msv_id->CellAttributes() ?>>
<div<?php echo $t_question->msv_id->ViewAttributes() ?>><?php echo $t_question->msv_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->zemail->Visible) { // email ?>
		<td<?php echo $t_question->zemail->CellAttributes() ?>>
<div<?php echo $t_question->zemail->ViewAttributes() ?>><?php echo $t_question->zemail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->user_name->Visible) { // user_name ?>
		<td<?php echo $t_question->user_name->CellAttributes() ?>>
<div<?php echo $t_question->user_name->ViewAttributes() ?>><?php echo $t_question->user_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->tel->Visible) { // tel ?>
		<td<?php echo $t_question->tel->CellAttributes() ?>>
<div<?php echo $t_question->tel->ViewAttributes() ?>><?php echo $t_question->tel->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->status->Visible) { // status ?>
		<td<?php echo $t_question->status->CellAttributes() ?>>
<div<?php echo $t_question->status->ViewAttributes() ?>><?php echo $t_question->status->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->active->Visible) { // active ?>
		<td<?php echo $t_question->active->CellAttributes() ?>>
<div<?php echo $t_question->active->ViewAttributes() ?>><?php echo $t_question->active->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_level->Visible) { // s_level ?>
		<td<?php echo $t_question->s_level->CellAttributes() ?>>
<div<?php echo $t_question->s_level->ViewAttributes() ?>><?php echo $t_question->s_level->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_Multi->Visible) { // s_Multi ?>
		<td<?php echo $t_question->s_Multi->CellAttributes() ?>>
<div<?php echo $t_question->s_Multi->ViewAttributes() ?>><?php echo $t_question->s_Multi->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_ok->Visible) { // s_ok ?>
		<td<?php echo $t_question->s_ok->CellAttributes() ?>>
<div<?php echo $t_question->s_ok->ViewAttributes() ?>><?php echo $t_question->s_ok->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_number->Visible) { // s_number ?>
		<td<?php echo $t_question->s_number->CellAttributes() ?>>
<div<?php echo $t_question->s_number->ViewAttributes() ?>><?php echo $t_question->s_number->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_finish->Visible) { // s_finish ?>
		<td<?php echo $t_question->s_finish->CellAttributes() ?>>
<div<?php echo $t_question->s_finish->ViewAttributes() ?>><?php echo $t_question->s_finish->ListViewValue() ?></div>
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
	<?php if ($t_question->datetime_hen->Visible) { // datetime_hen ?>
		<td<?php echo $t_question->datetime_hen->CellAttributes() ?>>
<div<?php echo $t_question->datetime_hen->ViewAttributes() ?>><?php echo $t_question->datetime_hen->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->datetime_kq->Visible) { // datetime_kq ?>
		<td<?php echo $t_question->datetime_kq->CellAttributes() ?>>
<div<?php echo $t_question->datetime_kq->ViewAttributes() ?>><?php echo $t_question->datetime_kq->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->user_IDAndser->Visible) { // user_IDAndser ?>
		<td<?php echo $t_question->user_IDAndser->CellAttributes() ?>>
<div<?php echo $t_question->user_IDAndser->ViewAttributes() ?>><?php echo $t_question->user_IDAndser->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->datetime_update->Visible) { // datetime_update ?>
		<td<?php echo $t_question->datetime_update->CellAttributes() ?>>
<div<?php echo $t_question->datetime_update->ViewAttributes() ?>><?php echo $t_question->datetime_update->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->ID_Group->Visible) { // ID_Group ?>
		<td<?php echo $t_question->ID_Group->CellAttributes() ?>>
<div<?php echo $t_question->ID_Group->ViewAttributes() ?>><?php echo $t_question->ID_Group->ListViewValue() ?></div>
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
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_question_list->Pager->FromIndex ?> to <?php echo $t_question_list->Pager->ToIndex ?> of <?php echo $t_question_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
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
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_question->AddUrl() ?>">Add</a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_questionlist)) alert('No records selected'); else {document.ft_questionlist.action='t_questiondelete.php';document.ft_questionlist.encoding='application/x-www-form-urlencoded';document.ft_questionlist.submit();};return false;">Delete Selected Records</a>&nbsp;&nbsp;
<?php } ?>
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

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

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
	$t_question->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_question->Export; // Get export parameter, used in header
	$gsExportFile = $t_question->TableVar; // Get export file, used in header
	if ($t_question->Export == "print" || $t_question->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_question->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_question->Export == "word") {
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
		global $objForm, $gsSearchError, $Security, $t_question;
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
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
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
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$t_question->setSessionWhere($sFilter);
		$t_question->CurrentFilter = "";

		// Export data only
		if (in_array($t_question->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
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
		if (!$Security->CanSearch()) return "";
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
		$this->BuildSearchSql($sWhere, $t_question->user_IDAndser, FALSE); // Field user_IDAndser
		$this->BuildSearchSql($sWhere, $t_question->datetime_update, FALSE); // Field datetime_update
		$this->BuildSearchSql($sWhere, $t_question->ID_Group, FALSE); // Field ID_Group

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
			$this->SetSearchParm($t_question->user_IDAndser); // Field user_IDAndser
			$this->SetSearchParm($t_question->datetime_update); // Field datetime_update
			$this->SetSearchParm($t_question->ID_Group); // Field ID_Group
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

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $t_question;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_question->IDcard->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->msv_id->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->zemail->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->user_name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->tel->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->content->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->content1->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->content2->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->description->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->reason->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->user_IDAndser->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_question;
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
			$t_question->setBasicSearchKeyword($sSearchKeyword);
			$t_question->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_question;
		$this->sSrchWhere = "";
		$t_question->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_question;
		$t_question->setBasicSearchKeyword("");
		$t_question->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_question;
		$t_question->setAdvancedSearch("x_question_id", "");
		$t_question->setAdvancedSearch("x_cat_question_id", "");
		$t_question->setAdvancedSearch("x_IDcard", "");
		$t_question->setAdvancedSearch("x_datetime_h", "");
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
		$t_question->setAdvancedSearch("x_datetime_kq", "");
		$t_question->setAdvancedSearch("x_reason", "");
		$t_question->setAdvancedSearch("x_user_IDAndser", "");
		$t_question->setAdvancedSearch("x_datetime_update", "");
		$t_question->setAdvancedSearch("x_ID_Group", "");
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
		 $t_question->datetime_kq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_kq");
		 $t_question->reason->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_reason");
		 $t_question->user_IDAndser->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_user_IDAndser");
		 $t_question->datetime_update->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_update");
		 $t_question->ID_Group->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_ID_Group");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_question;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_question->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_question->CurrentOrderType = @$_GET["ordertype"];
			$t_question->UpdateSort($t_question->question_id); // Field 
			$t_question->UpdateSort($t_question->cat_question_id); // Field 
			$t_question->UpdateSort($t_question->IDcard); // Field 
			$t_question->UpdateSort($t_question->datetime_h); // Field 
			$t_question->UpdateSort($t_question->msv_id); // Field 
			$t_question->UpdateSort($t_question->zemail); // Field 
			$t_question->UpdateSort($t_question->user_name); // Field 
			$t_question->UpdateSort($t_question->tel); // Field 
			$t_question->UpdateSort($t_question->status); // Field 
			$t_question->UpdateSort($t_question->active); // Field 
			$t_question->UpdateSort($t_question->s_level); // Field 
			$t_question->UpdateSort($t_question->s_Multi); // Field 
			$t_question->UpdateSort($t_question->s_ok); // Field 
			$t_question->UpdateSort($t_question->s_number); // Field 
			$t_question->UpdateSort($t_question->s_finish); // Field 
			$t_question->UpdateSort($t_question->status_faq); // Field 
			$t_question->UpdateSort($t_question->s_public); // Field 
			$t_question->UpdateSort($t_question->datetime_hen); // Field 
			$t_question->UpdateSort($t_question->datetime_kq); // Field 
			$t_question->UpdateSort($t_question->user_IDAndser); // Field 
			$t_question->UpdateSort($t_question->datetime_update); // Field 
			$t_question->UpdateSort($t_question->ID_Group); // Field 
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
				$t_question->question_id->setSort("");
				$t_question->cat_question_id->setSort("");
				$t_question->IDcard->setSort("");
				$t_question->datetime_h->setSort("");
				$t_question->msv_id->setSort("");
				$t_question->zemail->setSort("");
				$t_question->user_name->setSort("");
				$t_question->tel->setSort("");
				$t_question->status->setSort("");
				$t_question->active->setSort("");
				$t_question->s_level->setSort("");
				$t_question->s_Multi->setSort("");
				$t_question->s_ok->setSort("");
				$t_question->s_number->setSort("");
				$t_question->s_finish->setSort("");
				$t_question->status_faq->setSort("");
				$t_question->s_public->setSort("");
				$t_question->datetime_hen->setSort("");
				$t_question->datetime_kq->setSort("");
				$t_question->user_IDAndser->setSort("");
				$t_question->datetime_update->setSort("");
				$t_question->ID_Group->setSort("");
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

		// datetime_kq
		$t_question->datetime_kq->AdvancedSearch->SearchValue = @$_GET["x_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchOperator = @$_GET["z_datetime_kq"];

		// reason
		$t_question->reason->AdvancedSearch->SearchValue = @$_GET["x_reason"];
		$t_question->reason->AdvancedSearch->SearchOperator = @$_GET["z_reason"];

		// user_IDAndser
		$t_question->user_IDAndser->AdvancedSearch->SearchValue = @$_GET["x_user_IDAndser"];
		$t_question->user_IDAndser->AdvancedSearch->SearchOperator = @$_GET["z_user_IDAndser"];

		// datetime_update
		$t_question->datetime_update->AdvancedSearch->SearchValue = @$_GET["x_datetime_update"];
		$t_question->datetime_update->AdvancedSearch->SearchOperator = @$_GET["z_datetime_update"];

		// ID_Group
		$t_question->ID_Group->AdvancedSearch->SearchValue = @$_GET["x_ID_Group"];
		$t_question->ID_Group->AdvancedSearch->SearchOperator = @$_GET["z_ID_Group"];
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
		$t_question->user_IDAndser->setDbValue($rs->fields('user_IDAndser'));
		$t_question->datetime_update->setDbValue($rs->fields('datetime_update'));
		$t_question->ID_Group->setDbValue($rs->fields('ID_Group'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question;

		// Call Row_Rendering event
		$t_question->Row_Rendering();

		// Common render codes for all row types
		// question_id

		$t_question->question_id->CellCssStyle = "";
		$t_question->question_id->CellCssClass = "";

		// cat_question_id
		$t_question->cat_question_id->CellCssStyle = "";
		$t_question->cat_question_id->CellCssClass = "";

		// IDcard
		$t_question->IDcard->CellCssStyle = "";
		$t_question->IDcard->CellCssClass = "";

		// datetime_h
		$t_question->datetime_h->CellCssStyle = "";
		$t_question->datetime_h->CellCssClass = "";

		// msv_id
		$t_question->msv_id->CellCssStyle = "";
		$t_question->msv_id->CellCssClass = "";

		// email
		$t_question->zemail->CellCssStyle = "";
		$t_question->zemail->CellCssClass = "";

		// user_name
		$t_question->user_name->CellCssStyle = "";
		$t_question->user_name->CellCssClass = "";

		// tel
		$t_question->tel->CellCssStyle = "";
		$t_question->tel->CellCssClass = "";

		// status
		$t_question->status->CellCssStyle = "";
		$t_question->status->CellCssClass = "";

		// active
		$t_question->active->CellCssStyle = "";
		$t_question->active->CellCssClass = "";

		// s_level
		$t_question->s_level->CellCssStyle = "";
		$t_question->s_level->CellCssClass = "";

		// s_Multi
		$t_question->s_Multi->CellCssStyle = "";
		$t_question->s_Multi->CellCssClass = "";

		// s_ok
		$t_question->s_ok->CellCssStyle = "";
		$t_question->s_ok->CellCssClass = "";

		// s_number
		$t_question->s_number->CellCssStyle = "";
		$t_question->s_number->CellCssClass = "";

		// s_finish
		$t_question->s_finish->CellCssStyle = "";
		$t_question->s_finish->CellCssClass = "";

		// status_faq
		$t_question->status_faq->CellCssStyle = "";
		$t_question->status_faq->CellCssClass = "";

		// s_public
		$t_question->s_public->CellCssStyle = "";
		$t_question->s_public->CellCssClass = "";

		// datetime_hen
		$t_question->datetime_hen->CellCssStyle = "";
		$t_question->datetime_hen->CellCssClass = "";

		// datetime_kq
		$t_question->datetime_kq->CellCssStyle = "";
		$t_question->datetime_kq->CellCssClass = "";

		// user_IDAndser
		$t_question->user_IDAndser->CellCssStyle = "";
		$t_question->user_IDAndser->CellCssClass = "";

		// datetime_update
		$t_question->datetime_update->CellCssStyle = "";
		$t_question->datetime_update->CellCssClass = "";

		// ID_Group
		$t_question->ID_Group->CellCssStyle = "";
		$t_question->ID_Group->CellCssClass = "";
		if ($t_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// question_id
			$t_question->question_id->ViewValue = $t_question->question_id->CurrentValue;
			$t_question->question_id->CssStyle = "";
			$t_question->question_id->CssClass = "";
			$t_question->question_id->ViewCustomAttributes = "";

			// cat_question_id
			$t_question->cat_question_id->ViewValue = $t_question->cat_question_id->CurrentValue;
			$t_question->cat_question_id->CssStyle = "";
			$t_question->cat_question_id->CssClass = "";
			$t_question->cat_question_id->ViewCustomAttributes = "";

			// IDcard
			$t_question->IDcard->ViewValue = $t_question->IDcard->CurrentValue;
			$t_question->IDcard->CssStyle = "";
			$t_question->IDcard->CssClass = "";
			$t_question->IDcard->ViewCustomAttributes = "";

			// datetime_h
			$t_question->datetime_h->ViewValue = $t_question->datetime_h->CurrentValue;
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 7);
			$t_question->datetime_h->CssStyle = "";
			$t_question->datetime_h->CssClass = "";
			$t_question->datetime_h->ViewCustomAttributes = "";

			// msv_id
			$t_question->msv_id->ViewValue = $t_question->msv_id->CurrentValue;
			$t_question->msv_id->CssStyle = "";
			$t_question->msv_id->CssClass = "";
			$t_question->msv_id->ViewCustomAttributes = "";

			// email
			$t_question->zemail->ViewValue = $t_question->zemail->CurrentValue;
			$t_question->zemail->CssStyle = "";
			$t_question->zemail->CssClass = "";
			$t_question->zemail->ViewCustomAttributes = "";

			// user_name
			$t_question->user_name->ViewValue = $t_question->user_name->CurrentValue;
			$t_question->user_name->CssStyle = "";
			$t_question->user_name->CssClass = "";
			$t_question->user_name->ViewCustomAttributes = "";

			// tel
			$t_question->tel->ViewValue = $t_question->tel->CurrentValue;
			$t_question->tel->CssStyle = "";
			$t_question->tel->CssClass = "";
			$t_question->tel->ViewCustomAttributes = "";

			// status
			$t_question->status->ViewValue = $t_question->status->CurrentValue;
			$t_question->status->CssStyle = "";
			$t_question->status->CssClass = "";
			$t_question->status->ViewCustomAttributes = "";

			// active
			$t_question->active->ViewValue = $t_question->active->CurrentValue;
			$t_question->active->CssStyle = "";
			$t_question->active->CssClass = "";
			$t_question->active->ViewCustomAttributes = "";

			// s_level
			$t_question->s_level->ViewValue = $t_question->s_level->CurrentValue;
			$t_question->s_level->CssStyle = "";
			$t_question->s_level->CssClass = "";
			$t_question->s_level->ViewCustomAttributes = "";

			// s_Multi
			$t_question->s_Multi->ViewValue = $t_question->s_Multi->CurrentValue;
			$t_question->s_Multi->CssStyle = "";
			$t_question->s_Multi->CssClass = "";
			$t_question->s_Multi->ViewCustomAttributes = "";

			// s_ok
			$t_question->s_ok->ViewValue = $t_question->s_ok->CurrentValue;
			$t_question->s_ok->CssStyle = "";
			$t_question->s_ok->CssClass = "";
			$t_question->s_ok->ViewCustomAttributes = "";

			// s_number
			$t_question->s_number->ViewValue = $t_question->s_number->CurrentValue;
			$t_question->s_number->CssStyle = "";
			$t_question->s_number->CssClass = "";
			$t_question->s_number->ViewCustomAttributes = "";

			// s_finish
			$t_question->s_finish->ViewValue = $t_question->s_finish->CurrentValue;
			$t_question->s_finish->CssStyle = "";
			$t_question->s_finish->CssClass = "";
			$t_question->s_finish->ViewCustomAttributes = "";

			// status_faq
			$t_question->status_faq->ViewValue = $t_question->status_faq->CurrentValue;
			$t_question->status_faq->CssStyle = "";
			$t_question->status_faq->CssClass = "";
			$t_question->status_faq->ViewCustomAttributes = "";

			// s_public
			$t_question->s_public->ViewValue = $t_question->s_public->CurrentValue;
			$t_question->s_public->CssStyle = "";
			$t_question->s_public->CssClass = "";
			$t_question->s_public->ViewCustomAttributes = "";

			// datetime_hen
			$t_question->datetime_hen->ViewValue = $t_question->datetime_hen->CurrentValue;
			$t_question->datetime_hen->ViewValue = ew_FormatDateTime($t_question->datetime_hen->ViewValue, 7);
			$t_question->datetime_hen->CssStyle = "";
			$t_question->datetime_hen->CssClass = "";
			$t_question->datetime_hen->ViewCustomAttributes = "";

			// datetime_kq
			$t_question->datetime_kq->ViewValue = $t_question->datetime_kq->CurrentValue;
			$t_question->datetime_kq->ViewValue = ew_FormatDateTime($t_question->datetime_kq->ViewValue, 7);
			$t_question->datetime_kq->CssStyle = "";
			$t_question->datetime_kq->CssClass = "";
			$t_question->datetime_kq->ViewCustomAttributes = "";

			// user_IDAndser
			$t_question->user_IDAndser->ViewValue = $t_question->user_IDAndser->CurrentValue;
			$t_question->user_IDAndser->CssStyle = "";
			$t_question->user_IDAndser->CssClass = "";
			$t_question->user_IDAndser->ViewCustomAttributes = "";

			// datetime_update
			$t_question->datetime_update->ViewValue = $t_question->datetime_update->CurrentValue;
			$t_question->datetime_update->ViewValue = ew_FormatDateTime($t_question->datetime_update->ViewValue, 7);
			$t_question->datetime_update->CssStyle = "";
			$t_question->datetime_update->CssClass = "";
			$t_question->datetime_update->ViewCustomAttributes = "";

			// ID_Group
			if (strval($t_question->ID_Group->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `NAME` FROM `t_question_group` WHERE `ID` = " . ew_AdjustSql($t_question->ID_Group->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_question->ID_Group->ViewValue = $rswrk->fields('NAME');
					$rswrk->Close();
				} else {
					$t_question->ID_Group->ViewValue = $t_question->ID_Group->CurrentValue;
				}
			} else {
				$t_question->ID_Group->ViewValue = NULL;
			}
			$t_question->ID_Group->CssStyle = "";
			$t_question->ID_Group->CssClass = "";
			$t_question->ID_Group->ViewCustomAttributes = "";

			// question_id
			$t_question->question_id->HrefValue = "";

			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// IDcard
			$t_question->IDcard->HrefValue = "";

			// datetime_h
			$t_question->datetime_h->HrefValue = "";

			// msv_id
			$t_question->msv_id->HrefValue = "";

			// email
			$t_question->zemail->HrefValue = "";

			// user_name
			$t_question->user_name->HrefValue = "";

			// tel
			$t_question->tel->HrefValue = "";

			// status
			$t_question->status->HrefValue = "";

			// active
			$t_question->active->HrefValue = "";

			// s_level
			$t_question->s_level->HrefValue = "";

			// s_Multi
			$t_question->s_Multi->HrefValue = "";

			// s_ok
			$t_question->s_ok->HrefValue = "";

			// s_number
			$t_question->s_number->HrefValue = "";

			// s_finish
			$t_question->s_finish->HrefValue = "";

			// status_faq
			$t_question->status_faq->HrefValue = "";

			// s_public
			$t_question->s_public->HrefValue = "";

			// datetime_hen
			$t_question->datetime_hen->HrefValue = "";

			// datetime_kq
			$t_question->datetime_kq->HrefValue = "";

			// user_IDAndser
			$t_question->user_IDAndser->HrefValue = "";

			// datetime_update
			$t_question->datetime_update->HrefValue = "";

			// ID_Group
			$t_question->ID_Group->HrefValue = "";
		} elseif ($t_question->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// question_id
			$t_question->question_id->EditCustomAttributes = "";
			$t_question->question_id->EditValue = ew_HtmlEncode($t_question->question_id->AdvancedSearch->SearchValue);

			// cat_question_id
			$t_question->cat_question_id->EditCustomAttributes = "";
			$t_question->cat_question_id->EditValue = ew_HtmlEncode($t_question->cat_question_id->AdvancedSearch->SearchValue);

			// IDcard
			$t_question->IDcard->EditCustomAttributes = "";
			$t_question->IDcard->EditValue = ew_HtmlEncode($t_question->IDcard->AdvancedSearch->SearchValue);

			// datetime_h
			$t_question->datetime_h->EditCustomAttributes = "";
			$t_question->datetime_h->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_h->AdvancedSearch->SearchValue, 7), 7));

			// msv_id
			$t_question->msv_id->EditCustomAttributes = "";
			$t_question->msv_id->EditValue = ew_HtmlEncode($t_question->msv_id->AdvancedSearch->SearchValue);

			// email
			$t_question->zemail->EditCustomAttributes = "";
			$t_question->zemail->EditValue = ew_HtmlEncode($t_question->zemail->AdvancedSearch->SearchValue);

			// user_name
			$t_question->user_name->EditCustomAttributes = "";
			$t_question->user_name->EditValue = ew_HtmlEncode($t_question->user_name->AdvancedSearch->SearchValue);

			// tel
			$t_question->tel->EditCustomAttributes = "";
			$t_question->tel->EditValue = ew_HtmlEncode($t_question->tel->AdvancedSearch->SearchValue);

			// status
			$t_question->status->EditCustomAttributes = "";
			$t_question->status->EditValue = ew_HtmlEncode($t_question->status->AdvancedSearch->SearchValue);

			// active
			$t_question->active->EditCustomAttributes = "";
			$t_question->active->EditValue = ew_HtmlEncode($t_question->active->AdvancedSearch->SearchValue);

			// s_level
			$t_question->s_level->EditCustomAttributes = "";
			$t_question->s_level->EditValue = ew_HtmlEncode($t_question->s_level->AdvancedSearch->SearchValue);

			// s_Multi
			$t_question->s_Multi->EditCustomAttributes = "";
			$t_question->s_Multi->EditValue = ew_HtmlEncode($t_question->s_Multi->AdvancedSearch->SearchValue);

			// s_ok
			$t_question->s_ok->EditCustomAttributes = "";
			$t_question->s_ok->EditValue = ew_HtmlEncode($t_question->s_ok->AdvancedSearch->SearchValue);

			// s_number
			$t_question->s_number->EditCustomAttributes = "";
			$t_question->s_number->EditValue = ew_HtmlEncode($t_question->s_number->AdvancedSearch->SearchValue);

			// s_finish
			$t_question->s_finish->EditCustomAttributes = "";
			$t_question->s_finish->EditValue = ew_HtmlEncode($t_question->s_finish->AdvancedSearch->SearchValue);

			// status_faq
			$t_question->status_faq->EditCustomAttributes = "";
			$t_question->status_faq->EditValue = ew_HtmlEncode($t_question->status_faq->AdvancedSearch->SearchValue);

			// s_public
			$t_question->s_public->EditCustomAttributes = "";
			$t_question->s_public->EditValue = ew_HtmlEncode($t_question->s_public->AdvancedSearch->SearchValue);

			// datetime_hen
			$t_question->datetime_hen->EditCustomAttributes = "";
			$t_question->datetime_hen->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_hen->AdvancedSearch->SearchValue, 7), 7));

			// datetime_kq
			$t_question->datetime_kq->EditCustomAttributes = "";
			$t_question->datetime_kq->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_kq->AdvancedSearch->SearchValue, 7), 7));

			// user_IDAndser
			$t_question->user_IDAndser->EditCustomAttributes = "";
			$t_question->user_IDAndser->EditValue = ew_HtmlEncode($t_question->user_IDAndser->AdvancedSearch->SearchValue);

			// datetime_update
			$t_question->datetime_update->EditCustomAttributes = "";
			$t_question->datetime_update->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_update->AdvancedSearch->SearchValue, 7), 7));

			// ID_Group
			$t_question->ID_Group->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `ID`, `NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_question_group`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Please Select"));
			$t_question->ID_Group->EditValue = $arwrk;
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
		$t_question->datetime_kq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_kq");
		$t_question->reason->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_reason");
		$t_question->user_IDAndser->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_user_IDAndser");
		$t_question->datetime_update->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_update");
		$t_question->ID_Group->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_ID_Group");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_question;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($t_question->ExportAll) {
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
		if ($t_question->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_question->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_question->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'question_id', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'cat_question_id', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'IDcard', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'datetime_h', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'msv_id', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'email', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'user_name', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'tel', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'status', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'active', $t_question->Export);
				ew_ExportAddValue($sExportStr, 's_level', $t_question->Export);
				ew_ExportAddValue($sExportStr, 's_Multi', $t_question->Export);
				ew_ExportAddValue($sExportStr, 's_ok', $t_question->Export);
				ew_ExportAddValue($sExportStr, 's_number', $t_question->Export);
				ew_ExportAddValue($sExportStr, 's_finish', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'status_faq', $t_question->Export);
				ew_ExportAddValue($sExportStr, 's_public', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'datetime_hen', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'datetime_kq', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'user_IDAndser', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'datetime_update', $t_question->Export);
				ew_ExportAddValue($sExportStr, 'ID_Group', $t_question->Export);
				echo ew_ExportLine($sExportStr, $t_question->Export);
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
				$t_question->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_question->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('question_id', $t_question->question_id->CurrentValue);
					$XmlDoc->AddField('cat_question_id', $t_question->cat_question_id->CurrentValue);
					$XmlDoc->AddField('IDcard', $t_question->IDcard->CurrentValue);
					$XmlDoc->AddField('datetime_h', $t_question->datetime_h->CurrentValue);
					$XmlDoc->AddField('msv_id', $t_question->msv_id->CurrentValue);
					$XmlDoc->AddField('zemail', $t_question->zemail->CurrentValue);
					$XmlDoc->AddField('user_name', $t_question->user_name->CurrentValue);
					$XmlDoc->AddField('tel', $t_question->tel->CurrentValue);
					$XmlDoc->AddField('status', $t_question->status->CurrentValue);
					$XmlDoc->AddField('active', $t_question->active->CurrentValue);
					$XmlDoc->AddField('s_level', $t_question->s_level->CurrentValue);
					$XmlDoc->AddField('s_Multi', $t_question->s_Multi->CurrentValue);
					$XmlDoc->AddField('s_ok', $t_question->s_ok->CurrentValue);
					$XmlDoc->AddField('s_number', $t_question->s_number->CurrentValue);
					$XmlDoc->AddField('s_finish', $t_question->s_finish->CurrentValue);
					$XmlDoc->AddField('status_faq', $t_question->status_faq->CurrentValue);
					$XmlDoc->AddField('s_public', $t_question->s_public->CurrentValue);
					$XmlDoc->AddField('datetime_hen', $t_question->datetime_hen->CurrentValue);
					$XmlDoc->AddField('datetime_kq', $t_question->datetime_kq->CurrentValue);
					$XmlDoc->AddField('user_IDAndser', $t_question->user_IDAndser->CurrentValue);
					$XmlDoc->AddField('datetime_update', $t_question->datetime_update->CurrentValue);
					$XmlDoc->AddField('ID_Group', $t_question->ID_Group->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_question->Export <> "csv") { // Vertical format
						echo ew_ExportField('question_id', $t_question->question_id->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('cat_question_id', $t_question->cat_question_id->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('IDcard', $t_question->IDcard->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('datetime_h', $t_question->datetime_h->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('msv_id', $t_question->msv_id->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('email', $t_question->zemail->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('user_name', $t_question->user_name->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('tel', $t_question->tel->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('status', $t_question->status->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('active', $t_question->active->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('s_level', $t_question->s_level->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('s_Multi', $t_question->s_Multi->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('s_ok', $t_question->s_ok->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('s_number', $t_question->s_number->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('s_finish', $t_question->s_finish->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('status_faq', $t_question->status_faq->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('s_public', $t_question->s_public->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('datetime_hen', $t_question->datetime_hen->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('datetime_kq', $t_question->datetime_kq->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('user_IDAndser', $t_question->user_IDAndser->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('datetime_update', $t_question->datetime_update->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportField('ID_Group', $t_question->ID_Group->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_question->question_id->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->cat_question_id->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->IDcard->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->datetime_h->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->msv_id->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->zemail->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->user_name->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->tel->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->status->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->active->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->s_level->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->s_Multi->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->s_ok->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->s_number->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->s_finish->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->status_faq->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->s_public->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->datetime_hen->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->datetime_kq->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->user_IDAndser->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->datetime_update->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						ew_ExportAddValue($sExportStr, $t_question->ID_Group->ExportValue($t_question->Export, $t_question->ExportOriginalValue), $t_question->Export);
						echo ew_ExportLine($sExportStr, $t_question->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_question->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_question->Export);
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
