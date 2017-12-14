<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_manager_servicesinfo.php" ?>
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
$t_manager_services_list = new ct_manager_services_list();
$Page =& $t_manager_services_list;

// Page init processing
$t_manager_services_list->Page_Init();

// Page main processing
$t_manager_services_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_manager_services->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_manager_services_list = new ew_Page("t_manager_services_list");

// page properties
t_manager_services_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_manager_services_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_manager_services_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_manager_services_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_manager_services_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_manager_services_list.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý Webserviecs"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($t_manager_services->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_manager_services->Export == "" && $t_manager_services->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_manager_services_list->LoadRecordset();
	$t_manager_services_list->lTotalRecs = ($bSelectLimit) ? $t_manager_services->SelectRecordCount() : $rs->RecordCount();
	$t_manager_services_list->lStartRec = 1;
	if ($t_manager_services_list->lDisplayRecs <= 0) // Display all records
		$t_manager_services_list->lDisplayRecs = $t_manager_services_list->lTotalRecs;
	if (!($t_manager_services->ExportAll && $t_manager_services->Export <> ""))
		$t_manager_services_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_manager_services_list->LoadRecordset($t_manager_services_list->lStartRec-1, $t_manager_services_list->lDisplayRecs);
?>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_manager_services->Export == "" && $t_manager_services->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_manager_services_list);" style="text-decoration: none;"><img id="t_manager_services_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="t_manager_services_list_SearchPanel">
<form name="ft_manager_serviceslistsrch" id="ft_manager_serviceslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_manager_services">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($t_manager_services->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<a href="<?php echo $t_manager_services_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_manager_services->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_manager_services->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_manager_services->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Any word</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $t_manager_services_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_manager_services->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_manager_services->CurrentAction <> "gridadd" && $t_manager_services->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_manager_services_list->Pager)) $t_manager_services_list->Pager = new cNumericPager($t_manager_services_list->lStartRec, $t_manager_services_list->lDisplayRecs, $t_manager_services_list->lTotalRecs, $t_manager_services_list->lRecRange) ?>
<?php if ($t_manager_services_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_manager_services_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_manager_services_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_manager_services_list->Pager->FromIndex ?> to <?php echo $t_manager_services_list->Pager->ToIndex ?> of <?php echo $t_manager_services_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_manager_services_list->sSrchWhere == "0=101") { ?>
	<?php echo Lang_Text('Hãy điền từ khóa tìm kiếm')?>
	<?php } else { ?>
	<?php echo Lang_Text('Không có dữ liệu')?>
	<?php } ?>
	<?php } else { ?>
	<?php echo Lang_Text('Bạn không có quyền xem trang này')?>
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_manager_services_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_manager_services">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_manager_services_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_manager_services_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_manager_services_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_manager_services->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_manager_services->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_manager_services_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_manager_serviceslist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.ft_manager_serviceslist.action='t_manager_servicesdelete.php';document.ft_manager_serviceslist.encoding='application/x-www-form-urlencoded';document.ft_manager_serviceslist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_manager_serviceslist" id="ft_manager_serviceslist" class="ewForm" action="" method="post">
<?php if ($t_manager_services_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_manager_services_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$t_manager_services_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$t_manager_services_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$t_manager_services_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$t_manager_services_list->lOptionCnt++; // Multi-select
}
	$t_manager_services_list->lOptionCnt += count($t_manager_services_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_manager_services->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_manager_services->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 20px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_manager_services_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_manager_services_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
		
<?php if ($t_manager_services->name_ser->Visible) { // name_ser ?>
	<?php if ($t_manager_services->SortUrl($t_manager_services->name_ser) == "") { ?>
		<td>Name Ser</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_manager_services->SortUrl($t_manager_services->name_ser) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên services&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_manager_services->name_ser->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_manager_services->name_ser->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_manager_services->code_ser->Visible) { // code_ser ?>
	<?php if ($t_manager_services->SortUrl($t_manager_services->code_ser) == "") { ?>
		<td>Code Ser</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_manager_services->SortUrl($t_manager_services->code_ser) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã services&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_manager_services->code_ser->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_manager_services->code_ser->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_manager_services->active_ser->Visible) { // active_ser ?>
	<?php if ($t_manager_services->SortUrl($t_manager_services->active_ser) == "") { ?>
		<td>Active Ser</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_manager_services->SortUrl($t_manager_services->active_ser) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái services</td><td style="width: 10px;"><?php if ($t_manager_services->active_ser->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_manager_services->active_ser->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_manager_services->oder->Visible) { // oder ?>
	<?php if ($t_manager_services->SortUrl($t_manager_services->oder) == "") { ?>
		<td>Oder</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_manager_services->SortUrl($t_manager_services->oder) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thứ tự</td><td style="width: 10px;"><?php if ($t_manager_services->oder->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_manager_services->oder->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_manager_services->ExportAll && $t_manager_services->Export <> "") {
	$t_manager_services_list->lStopRec = $t_manager_services_list->lTotalRecs;
} else {
	$t_manager_services_list->lStopRec = $t_manager_services_list->lStartRec + $t_manager_services_list->lDisplayRecs - 1; // Set the last record to display
}
$t_manager_services_list->lRecCount = $t_manager_services_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_manager_services->SelectLimit && $t_manager_services_list->lStartRec > 1)
		$rs->Move($t_manager_services_list->lStartRec - 1);
}
$t_manager_services_list->lRowCnt = 0;
while (($t_manager_services->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_manager_services_list->lRecCount < $t_manager_services_list->lStopRec) {
	$t_manager_services_list->lRecCount++;
	if (intval($t_manager_services_list->lRecCount) >= intval($t_manager_services_list->lStartRec)) {
		$t_manager_services_list->lRowCnt++;

	// Init row class and style
	$t_manager_services->CssClass = "";
	$t_manager_services->CssStyle = "";
	$t_manager_services->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_manager_services->CurrentAction == "gridadd") {
		$t_manager_services_list->LoadDefaultValues(); // Load default values
	} else {
		$t_manager_services_list->LoadRowValues($rs); // Load row values
	}
	$t_manager_services->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_manager_services_list->RenderRow();
?>
	<tr<?php echo $t_manager_services->RowAttributes() ?>>
<?php if ($t_manager_services->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_manager_services->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>

<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_manager_services->services_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_manager_services_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>

	<?php if ($t_manager_services->name_ser->Visible) { // name_ser ?>
		<td<?php echo $t_manager_services->name_ser->CellAttributes() ?>>
<div<?php echo $t_manager_services->name_ser->ViewAttributes() ?>><?php echo $t_manager_services->name_ser->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_manager_services->code_ser->Visible) { // code_ser ?>
		<td<?php echo $t_manager_services->code_ser->CellAttributes() ?>>
<div<?php echo $t_manager_services->code_ser->ViewAttributes() ?>><?php echo "<b>".$t_manager_services->code_ser->ListViewValue()."</b>" ?></div>
</td>
	<?php } ?>
	<?php if ($t_manager_services->active_ser->Visible) { // active_ser ?>
		<td<?php echo $t_manager_services->active_ser->CellAttributes() ?>>
<div<?php echo $t_manager_services->active_ser->ViewAttributes() ?>><?php echo $t_manager_services->active_ser->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_manager_services->oder->Visible) { // oder ?>
		<td<?php echo $t_manager_services->oder->CellAttributes() ?>>
<div<?php echo $t_manager_services->oder->ViewAttributes() ?>><?php echo $t_manager_services->oder->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_manager_services->CurrentAction <> "gridadd")
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
<?php if ($t_manager_services_list->lTotalRecs > 0) { ?>
<?php if ($t_manager_services->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_manager_services->CurrentAction <> "gridadd" && $t_manager_services->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_manager_services_list->Pager)) $t_manager_services_list->Pager = new cNumericPager($t_manager_services_list->lStartRec, $t_manager_services_list->lDisplayRecs, $t_manager_services_list->lTotalRecs, $t_manager_services_list->lRecRange) ?>
<?php if ($t_manager_services_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_manager_services_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_manager_services_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_manager_services_list->PageUrl() ?>start=<?php echo $t_manager_services_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_manager_services_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_manager_services_list->Pager->FromIndex ?> to <?php echo $t_manager_services_list->Pager->ToIndex ?> of <?php echo $t_manager_services_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_manager_services_list->sSrchWhere == "0=101") { ?>
	<?php echo Lang_Text('Hãy điền từ khóa tìm kiếm')?>
	<?php } else { ?>
	<?php echo Lang_Text('Không có dữ liệu')?>
	<?php } ?>
	<?php } else { ?>
	<?php echo Lang_Text('Bạn không có quyền xem trang này')?>
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_manager_services_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_manager_services">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_manager_services_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_manager_services_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_manager_services_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_manager_services->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_manager_services_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_manager_services->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_manager_services_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_manager_serviceslist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.ft_manager_serviceslist.action='t_manager_servicesdelete.php';document.ft_manager_serviceslist.encoding='application/x-www-form-urlencoded';document.ft_manager_serviceslist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_manager_services->Export == "" && $t_manager_services->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_manager_services_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_manager_services->Export == "") { ?>
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
class ct_manager_services_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_manager_services';

	// Page Object Name
	var $PageObjName = 't_manager_services_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_manager_services;
		if ($t_manager_services->UseTokenInUrl) $PageUrl .= "t=" . $t_manager_services->TableVar . "&"; // add page token
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
		global $objForm, $t_manager_services;
		if ($t_manager_services->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_manager_services->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_manager_services->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_manager_services_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_manager_services"] = new ct_manager_services();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_manager_services', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_manager_services;
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
	$t_manager_services->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_manager_services->Export; // Get export parameter, used in header
	$gsExportFile = $t_manager_services->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $t_manager_services;
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

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($t_manager_services->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_manager_services->getRecordsPerPage(); // Restore from Session
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
		$t_manager_services->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_manager_services->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_manager_services->setStartRecordNumber($this->lStartRec);
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
		$t_manager_services->setSessionWhere($sFilter);
		$t_manager_services->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_manager_services;
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
			$t_manager_services->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_manager_services->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $t_manager_services;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_manager_services->name_ser->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_manager_services->code_ser->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_manager_services->descript_ser->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_manager_services;
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
			$t_manager_services->setBasicSearchKeyword($sSearchKeyword);
			$t_manager_services->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_manager_services;
		$this->sSrchWhere = "";
		$t_manager_services->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_manager_services;
		$t_manager_services->setBasicSearchKeyword("");
		$t_manager_services->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_manager_services;
		$this->sSrchWhere = $t_manager_services->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_manager_services;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_manager_services->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_manager_services->CurrentOrderType = @$_GET["ordertype"];
			$t_manager_services->UpdateSort($t_manager_services->services_id); // Field 
			$t_manager_services->UpdateSort($t_manager_services->name_ser); // Field 
			$t_manager_services->UpdateSort($t_manager_services->code_ser); // Field 
			$t_manager_services->UpdateSort($t_manager_services->active_ser); // Field 
			$t_manager_services->UpdateSort($t_manager_services->oder); // Field 
			$t_manager_services->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_manager_services;
		$sOrderBy = $t_manager_services->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_manager_services->SqlOrderBy() <> "") {
				$sOrderBy = $t_manager_services->SqlOrderBy();
				$t_manager_services->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_manager_services;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_manager_services->setSessionOrderBy($sOrderBy);
				$t_manager_services->services_id->setSort("");
				$t_manager_services->name_ser->setSort("");
				$t_manager_services->code_ser->setSort("");
				$t_manager_services->active_ser->setSort("");
				$t_manager_services->oder->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_manager_services->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_manager_services;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_manager_services->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_manager_services->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_manager_services->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_manager_services->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_manager_services->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_manager_services->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_manager_services;

		// Call Recordset Selecting event
		$t_manager_services->Recordset_Selecting($t_manager_services->CurrentFilter);

		// Load list page SQL
		$sSql = $t_manager_services->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_manager_services->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_manager_services;
		$sFilter = $t_manager_services->KeyFilter();

		// Call Row Selecting event
		$t_manager_services->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_manager_services->CurrentFilter = $sFilter;
		$sSql = $t_manager_services->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_manager_services->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_manager_services;
		$t_manager_services->services_id->setDbValue($rs->fields('services_id'));
		$t_manager_services->name_ser->setDbValue($rs->fields('name_ser'));
		$t_manager_services->code_ser->setDbValue($rs->fields('code_ser'));
		$t_manager_services->descript_ser->setDbValue($rs->fields('descript_ser'));
		$t_manager_services->active_ser->setDbValue($rs->fields('active_ser'));
		$t_manager_services->user_add->setDbValue($rs->fields('user_add'));
		$t_manager_services->datime_add->setDbValue($rs->fields('datime_add'));
		$t_manager_services->user_edit->setDbValue($rs->fields('user_edit'));
		$t_manager_services->datime_edit->setDbValue($rs->fields('datime_edit'));
		$t_manager_services->oder->setDbValue($rs->fields('oder'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_manager_services;

		// Call Row_Rendering event
		$t_manager_services->Row_Rendering();

		// Common render codes for all row types
		// services_id

		$t_manager_services->services_id->CellCssStyle = "";
		$t_manager_services->services_id->CellCssClass = "";

		// name_ser
		$t_manager_services->name_ser->CellCssStyle = "";
		$t_manager_services->name_ser->CellCssClass = "";

		// code_ser
		$t_manager_services->code_ser->CellCssStyle = "";
		$t_manager_services->code_ser->CellCssClass = "";

		// active_ser
		$t_manager_services->active_ser->CellCssStyle = "";
		$t_manager_services->active_ser->CellCssClass = "";

		// oder
		$t_manager_services->oder->CellCssStyle = "";
		$t_manager_services->oder->CellCssClass = "";
		if ($t_manager_services->RowType == EW_ROWTYPE_VIEW) { // View row

			// services_id
			$t_manager_services->services_id->ViewValue = $t_manager_services->services_id->CurrentValue;
			$t_manager_services->services_id->CssStyle = "";
			$t_manager_services->services_id->CssClass = "";
			$t_manager_services->services_id->ViewCustomAttributes = "";

			// name_ser
			$t_manager_services->name_ser->ViewValue = $t_manager_services->name_ser->CurrentValue;
			$t_manager_services->name_ser->CssStyle = "";
			$t_manager_services->name_ser->CssClass = "";
			$t_manager_services->name_ser->ViewCustomAttributes = "";

			// code_ser
			$t_manager_services->code_ser->ViewValue = $t_manager_services->code_ser->CurrentValue;
			$t_manager_services->code_ser->CssStyle = "";
			$t_manager_services->code_ser->CssClass = "";
			$t_manager_services->code_ser->ViewCustomAttributes = "";

			// active_ser
			if (strval($t_manager_services->active_ser->CurrentValue) <> "") {
				switch ($t_manager_services->active_ser->CurrentValue) {
					case "0":
						$t_manager_services->active_ser->ViewValue = "<span style=\"color:red\">Không kích hoạt </span>";
						break;
					case "1":
						$t_manager_services->active_ser->ViewValue = "Kích hoạt";
						break;
					default:
						$t_manager_services->active_ser->ViewValue = $t_manager_services->active_ser->CurrentValue;
				}
			} else {
				$t_manager_services->active_ser->ViewValue = NULL;
			}
			$t_manager_services->active_ser->CssStyle = "";
			$t_manager_services->active_ser->CssClass = "";
			$t_manager_services->active_ser->ViewCustomAttributes = "";

			// user_add
			$t_manager_services->user_add->ViewValue = $t_manager_services->user_add->CurrentValue;
			$t_manager_services->user_add->CssStyle = "";
			$t_manager_services->user_add->CssClass = "";
			$t_manager_services->user_add->ViewCustomAttributes = "";

			// datime_add
			$t_manager_services->datime_add->ViewValue = $t_manager_services->datime_add->CurrentValue;
			$t_manager_services->datime_add->ViewValue = ew_FormatDateTime($t_manager_services->datime_add->ViewValue, 7);
			$t_manager_services->datime_add->CssStyle = "";
			$t_manager_services->datime_add->CssClass = "";
			$t_manager_services->datime_add->ViewCustomAttributes = "";

			// user_edit
			$t_manager_services->user_edit->ViewValue = $t_manager_services->user_edit->CurrentValue;
			$t_manager_services->user_edit->CssStyle = "";
			$t_manager_services->user_edit->CssClass = "";
			$t_manager_services->user_edit->ViewCustomAttributes = "";

			// datime_edit
			$t_manager_services->datime_edit->ViewValue = $t_manager_services->datime_edit->CurrentValue;
			$t_manager_services->datime_edit->ViewValue = ew_FormatDateTime($t_manager_services->datime_edit->ViewValue, 7);
			$t_manager_services->datime_edit->CssStyle = "";
			$t_manager_services->datime_edit->CssClass = "";
			$t_manager_services->datime_edit->ViewCustomAttributes = "";

			// oder
			$t_manager_services->oder->ViewValue = $t_manager_services->oder->CurrentValue;
			$t_manager_services->oder->CssStyle = "";
			$t_manager_services->oder->CssClass = "";
			$t_manager_services->oder->ViewCustomAttributes = "";

			// services_id
			$t_manager_services->services_id->HrefValue = "";

			// name_ser
			$t_manager_services->name_ser->HrefValue = "";

			// code_ser
			$t_manager_services->code_ser->HrefValue = "";

			// active_ser
			$t_manager_services->active_ser->HrefValue = "";

			// oder
			$t_manager_services->oder->HrefValue = "";
		}

		// Call Row Rendered event
		$t_manager_services->Row_Rendered();
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
