<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_miengiamhocphiinfo.php" ?>
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
$tbl_miengiamhocphi_list = new ctbl_miengiamhocphi_list();
$Page =& $tbl_miengiamhocphi_list;

// Page init processing
$tbl_miengiamhocphi_list->Page_Init();

// Page main processing
$tbl_miengiamhocphi_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_miengiamhocphi_list = new ew_Page("tbl_miengiamhocphi_list");

// page properties
tbl_miengiamhocphi_list.PageID = "list"; // page ID
var EW_PAGE_ID = tbl_miengiamhocphi_list.PageID; // for backward compatibility

// extend page with validate function for search
tbl_miengiamhocphi_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_datetime"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Datetime");

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
tbl_miengiamhocphi_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_miengiamhocphi_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_miengiamhocphi_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_miengiamhocphi_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

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
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($tbl_miengiamhocphi->Export == "" && $tbl_miengiamhocphi->SelectLimit);
	if (!$bSelectLimit)
		$rs = $tbl_miengiamhocphi_list->LoadRecordset();
	$tbl_miengiamhocphi_list->lTotalRecs = ($bSelectLimit) ? $tbl_miengiamhocphi->SelectRecordCount() : $rs->RecordCount();
	$tbl_miengiamhocphi_list->lStartRec = 1;
	if ($tbl_miengiamhocphi_list->lDisplayRecs <= 0) // Display all records
		$tbl_miengiamhocphi_list->lDisplayRecs = $tbl_miengiamhocphi_list->lTotalRecs;
	if (!($tbl_miengiamhocphi->ExportAll && $tbl_miengiamhocphi->Export <> ""))
		$tbl_miengiamhocphi_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $tbl_miengiamhocphi_list->LoadRecordset($tbl_miengiamhocphi_list->lStartRec-1, $tbl_miengiamhocphi_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Đơn xin miễm giảm học phí</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_miengiamhocphi->Export == "" && $tbl_miengiamhocphi->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(tbl_miengiamhocphi_list);" style="text-decoration: none;"><img id="tbl_miengiamhocphi_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="tbl_miengiamhocphi_list_SearchPanel">
<form name="ftbl_miengiamhocphilistsrch" id="ftbl_miengiamhocphilistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return tbl_miengiamhocphi_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="tbl_miengiamhocphi">
<?php
if ($gsSearchError == "")
	$tbl_miengiamhocphi_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$tbl_miengiamhocphi->RowType = EW_ROWTYPE_SEARCH;

// Render row
$tbl_miengiamhocphi_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Mã sinh viên</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_msv" id="z_msv" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_msv" id="x_msv" size="30" maxlength="15" value="<?php echo $tbl_miengiamhocphi->msv->EditValue ?>"<?php echo $tbl_miengiamhocphi->msv->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Họ tên sinh viên</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_hoten_sinhvien" id="z_hoten_sinhvien" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_hoten_sinhvien" id="x_hoten_sinhvien" size="30" maxlength="50" value="<?php echo $tbl_miengiamhocphi->hoten_sinhvien->EditValue ?>"<?php echo $tbl_miengiamhocphi->hoten_sinhvien->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày tạo đơn</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_datetime" id="z_datetime" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_datetime" id="x_datetime" value="<?php echo $tbl_miengiamhocphi->datetime->EditValue ?>"<?php echo $tbl_miengiamhocphi->datetime->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_datetime" name="cal_x_datetime" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_datetime", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_datetime" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($tbl_miengiamhocphi->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_miengiamhocphi->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Tìm chính xác từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_miengiamhocphi->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_miengiamhocphi->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_miengiamhocphi_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($tbl_miengiamhocphi->CurrentAction <> "gridadd" && $tbl_miengiamhocphi->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_miengiamhocphi_list->Pager)) $tbl_miengiamhocphi_list->Pager = new cNumericPager($tbl_miengiamhocphi_list->lStartRec, $tbl_miengiamhocphi_list->lDisplayRecs, $tbl_miengiamhocphi_list->lTotalRecs, $tbl_miengiamhocphi_list->lRecRange) ?>
<?php if ($tbl_miengiamhocphi_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_miengiamhocphi_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $tbl_miengiamhocphi_list->Pager->FromIndex ?> to <?php echo $tbl_miengiamhocphi_list->Pager->ToIndex ?> of <?php echo $tbl_miengiamhocphi_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_miengiamhocphi_list->sSrchWhere == "0=101") { ?>
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
<?php if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_miengiamhocphi">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_miengiamhocphi_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_miengiamhocphi_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_miengiamhocphi_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_miengiamhocphi->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_miengiamhocphi->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_miengiamhocphilist)) alert('No records selected'); else {document.ftbl_miengiamhocphilist.action='tbl_miengiamhocphidelete.php';document.ftbl_miengiamhocphilist.encoding='application/x-www-form-urlencoded';document.ftbl_miengiamhocphilist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_miengiamhocphilist)) alert('No records selected'); else {document.ftbl_miengiamhocphilist.action='tbl_miengiamhocphiupdate.php';document.ftbl_miengiamhocphilist.encoding='application/x-www-form-urlencoded';document.ftbl_miengiamhocphilist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ftbl_miengiamhocphilist" id="ftbl_miengiamhocphilist" class="ewForm" action="" method="post">
<?php if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$tbl_miengiamhocphi_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$tbl_miengiamhocphi_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$tbl_miengiamhocphi_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$tbl_miengiamhocphi_list->lOptionCnt++; // copy
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$tbl_miengiamhocphi_list->lOptionCnt++; // Multi-select
}
	$tbl_miengiamhocphi_list->lOptionCnt += count($tbl_miengiamhocphi_list->ListOptions->Items); // Custom list options
?>
<?php echo $tbl_miengiamhocphi->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="tbl_miengiamhocphi_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_miengiamhocphi_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($tbl_miengiamhocphi->loaidon_id->Visible) { // loaidon_id ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->loaidon_id) == "") { ?>
		<td>Loaidon Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->loaidon_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại đơn</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->loaidon_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->loaidon_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_miengiamhocphi->msv->Visible) { // msv ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->msv) == "") { ?>
		<td>Mã sinh viên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->msv) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã sinh viên&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->msv->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->msv->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_miengiamhocphi->hoten_sinhvien->Visible) { // hoten_sinhvien ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->hoten_sinhvien) == "") { ?>
		<td>Họ tên sinh viên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->hoten_sinhvien) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Họ tên sinh viên</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->hoten_sinhvien->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->hoten_sinhvien->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_miengiamhocphi->datetime->Visible) { // datetime ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->datetime) == "") { ?>
		<td style="white-space: nowrap;">Thời gian tạo</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->datetime) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td style="white-space: nowrap;">Thời gian tạo</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->datetime->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->datetime->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_miengiamhocphi->status->Visible) { // status ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->status) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_miengiamhocphi->datetime_add->Visible) { // datetime_add ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->datetime_add) == "") { ?>
		<td>Thời gian thêm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->datetime_add) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian thêm</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->datetime_add->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->datetime_add->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_miengiamhocphi->dateedit_edit->Visible) { // dateedit_edit ?>
	<?php if ($tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->dateedit_edit) == "") { ?>
		<td>Thời gian sửa</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_miengiamhocphi->SortUrl($tbl_miengiamhocphi->dateedit_edit) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>DThời gian sửa</td><td style="width: 10px;"><?php if ($tbl_miengiamhocphi->dateedit_edit->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_miengiamhocphi->dateedit_edit->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($tbl_miengiamhocphi->ExportAll && $tbl_miengiamhocphi->Export <> "") {
	$tbl_miengiamhocphi_list->lStopRec = $tbl_miengiamhocphi_list->lTotalRecs;
} else {
	$tbl_miengiamhocphi_list->lStopRec = $tbl_miengiamhocphi_list->lStartRec + $tbl_miengiamhocphi_list->lDisplayRecs - 1; // Set the last record to display
}
$tbl_miengiamhocphi_list->lRecCount = $tbl_miengiamhocphi_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$tbl_miengiamhocphi->SelectLimit && $tbl_miengiamhocphi_list->lStartRec > 1)
		$rs->Move($tbl_miengiamhocphi_list->lStartRec - 1);
}
$tbl_miengiamhocphi_list->lRowCnt = 0;
while (($tbl_miengiamhocphi->CurrentAction == "gridadd" || !$rs->EOF) &&
	$tbl_miengiamhocphi_list->lRecCount < $tbl_miengiamhocphi_list->lStopRec) {
	$tbl_miengiamhocphi_list->lRecCount++;
	if (intval($tbl_miengiamhocphi_list->lRecCount) >= intval($tbl_miengiamhocphi_list->lStartRec)) {
		$tbl_miengiamhocphi_list->lRowCnt++;

	// Init row class and style
	$tbl_miengiamhocphi->CssClass = "";
	$tbl_miengiamhocphi->CssStyle = "";
	$tbl_miengiamhocphi->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($tbl_miengiamhocphi->CurrentAction == "gridadd") {
		$tbl_miengiamhocphi_list->LoadDefaultValues(); // Load default values
	} else {
		$tbl_miengiamhocphi_list->LoadRowValues($rs); // Load row values
	}
	$tbl_miengiamhocphi->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$tbl_miengiamhocphi_list->RenderRow();
?>
	<tr<?php echo $tbl_miengiamhocphi->RowAttributes() ?>>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $tbl_miengiamhocphi->ViewUrl() ?>">Xem - in ấn - export</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $tbl_miengiamhocphi->EditUrl() ?>">Sửa đơn</a>
</span></td>
<?php } ?>

<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($tbl_miengiamhocphi->don_tchthp_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_miengiamhocphi_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($tbl_miengiamhocphi->loaidon_id->Visible) { // loaidon_id ?>
		<td<?php echo $tbl_miengiamhocphi->loaidon_id->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->loaidon_id->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->loaidon_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_miengiamhocphi->msv->Visible) { // msv ?>
		<td<?php echo $tbl_miengiamhocphi->msv->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->msv->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->msv->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_miengiamhocphi->hoten_sinhvien->Visible) { // hoten_sinhvien ?>
		<td<?php echo $tbl_miengiamhocphi->hoten_sinhvien->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->hoten_sinhvien->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->hoten_sinhvien->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_miengiamhocphi->datetime->Visible) { // datetime ?>
		<td<?php echo $tbl_miengiamhocphi->datetime->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->datetime->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->datetime->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_miengiamhocphi->status->Visible) { // status ?>
		<td<?php echo $tbl_miengiamhocphi->status->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->status->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->status->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_miengiamhocphi->datetime_add->Visible) { // datetime_add ?>
		<td<?php echo $tbl_miengiamhocphi->datetime_add->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->datetime_add->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->datetime_add->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_miengiamhocphi->dateedit_edit->Visible) { // dateedit_edit ?>
		<td<?php echo $tbl_miengiamhocphi->dateedit_edit->CellAttributes() ?>>
<div<?php echo $tbl_miengiamhocphi->dateedit_edit->ViewAttributes() ?>><?php echo $tbl_miengiamhocphi->dateedit_edit->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($tbl_miengiamhocphi->CurrentAction <> "gridadd")
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
<?php if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($tbl_miengiamhocphi->CurrentAction <> "gridadd" && $tbl_miengiamhocphi->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_miengiamhocphi_list->Pager)) $tbl_miengiamhocphi_list->Pager = new cNumericPager($tbl_miengiamhocphi_list->lStartRec, $tbl_miengiamhocphi_list->lDisplayRecs, $tbl_miengiamhocphi_list->lTotalRecs, $tbl_miengiamhocphi_list->lRecRange) ?>
<?php if ($tbl_miengiamhocphi_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_miengiamhocphi_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_miengiamhocphi_list->PageUrl() ?>start=<?php echo $tbl_miengiamhocphi_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_miengiamhocphi_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $tbl_miengiamhocphi_list->Pager->FromIndex ?> to <?php echo $tbl_miengiamhocphi_list->Pager->ToIndex ?> of <?php echo $tbl_miengiamhocphi_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_miengiamhocphi_list->sSrchWhere == "0=101") { ?>
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
<?php if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_miengiamhocphi">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_miengiamhocphi_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_miengiamhocphi_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_miengiamhocphi_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_miengiamhocphi->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_miengiamhocphi->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_miengiamhocphi_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_miengiamhocphilist)) alert('No records selected'); else {document.ftbl_miengiamhocphilist.action='tbl_miengiamhocphidelete.php';document.ftbl_miengiamhocphilist.encoding='application/x-www-form-urlencoded';document.ftbl_miengiamhocphilist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_miengiamhocphilist)) alert('No records selected'); else {document.ftbl_miengiamhocphilist.action='tbl_miengiamhocphiupdate.php';document.ftbl_miengiamhocphilist.encoding='application/x-www-form-urlencoded';document.ftbl_miengiamhocphilist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_miengiamhocphi->Export == "" && $tbl_miengiamhocphi->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(tbl_miengiamhocphi_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
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
class ctbl_miengiamhocphi_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'tbl_miengiamhocphi';

	// Page Object Name
	var $PageObjName = 'tbl_miengiamhocphi_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) $PageUrl .= "t=" . $tbl_miengiamhocphi->TableVar . "&"; // add page token
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
		global $objForm, $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_miengiamhocphi->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_miengiamhocphi->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_miengiamhocphi_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_miengiamhocphi"] = new ctbl_miengiamhocphi();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_miengiamhocphi', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_miengiamhocphi;
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
	$tbl_miengiamhocphi->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $tbl_miengiamhocphi->Export; // Get export parameter, used in header
	$gsExportFile = $tbl_miengiamhocphi->TableVar; // Get export file, used in header
	if ($tbl_miengiamhocphi->Export == "print" || $tbl_miengiamhocphi->Export == "html") {

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
		global $objForm, $gsSearchError, $Security, $tbl_miengiamhocphi;
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
		if ($tbl_miengiamhocphi->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $tbl_miengiamhocphi->getRecordsPerPage(); // Restore from Session
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
		$tbl_miengiamhocphi->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$tbl_miengiamhocphi->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
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
		$tbl_miengiamhocphi->setSessionWhere($sFilter);
		$tbl_miengiamhocphi->CurrentFilter = "";

		// Export data only
		if (in_array($tbl_miengiamhocphi->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $tbl_miengiamhocphi;
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
			$tbl_miengiamhocphi->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $tbl_miengiamhocphi;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->don_tchthp_id, FALSE); // Field don_tchthp_id
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->loaidon_id, FALSE); // Field loaidon_id
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->nhomdon_id, FALSE); // Field nhomdon_id
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->msv, FALSE); // Field msv
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->hoten_sinhvien, FALSE); // Field hoten_sinhvien
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->ngay_thang_nam, FALSE); // Field ngay_thang_nam
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->hoten_chame, FALSE); // Field hoten_chame
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->hokhau, FALSE); // Field hokhau
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->nganhhoc, FALSE); // Field nganhhoc
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->doituong, FALSE); // Field doituong
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->datetime, FALSE); // Field datetime
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->status, FALSE); // Field status
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->active, FALSE); // Field active
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->datetime_add, FALSE); // Field datetime_add
		$this->BuildSearchSql($sWhere, $tbl_miengiamhocphi->dateedit_edit, FALSE); // Field dateedit_edit

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($tbl_miengiamhocphi->don_tchthp_id); // Field don_tchthp_id
			$this->SetSearchParm($tbl_miengiamhocphi->loaidon_id); // Field loaidon_id
			$this->SetSearchParm($tbl_miengiamhocphi->nhomdon_id); // Field nhomdon_id
			$this->SetSearchParm($tbl_miengiamhocphi->msv); // Field msv
			$this->SetSearchParm($tbl_miengiamhocphi->hoten_sinhvien); // Field hoten_sinhvien
			$this->SetSearchParm($tbl_miengiamhocphi->ngay_thang_nam); // Field ngay_thang_nam
			$this->SetSearchParm($tbl_miengiamhocphi->hoten_chame); // Field hoten_chame
			$this->SetSearchParm($tbl_miengiamhocphi->hokhau); // Field hokhau
			$this->SetSearchParm($tbl_miengiamhocphi->nganhhoc); // Field nganhhoc
			$this->SetSearchParm($tbl_miengiamhocphi->doituong); // Field doituong
			$this->SetSearchParm($tbl_miengiamhocphi->datetime); // Field datetime
			$this->SetSearchParm($tbl_miengiamhocphi->status); // Field status
			$this->SetSearchParm($tbl_miengiamhocphi->active); // Field active
			$this->SetSearchParm($tbl_miengiamhocphi->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($tbl_miengiamhocphi->datetime_add); // Field datetime_add
			$this->SetSearchParm($tbl_miengiamhocphi->dateedit_edit); // Field dateedit_edit
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
		global $tbl_miengiamhocphi;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$tbl_miengiamhocphi->setAdvancedSearch("x_$FldParm", $FldVal);
		$tbl_miengiamhocphi->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$tbl_miengiamhocphi->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$tbl_miengiamhocphi->setAdvancedSearch("y_$FldParm", $FldVal2);
		$tbl_miengiamhocphi->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $tbl_miengiamhocphi;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $tbl_miengiamhocphi->msv->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_miengiamhocphi->hoten_sinhvien->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_miengiamhocphi->ngay_thang_nam->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_miengiamhocphi->hoten_chame->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_miengiamhocphi->hokhau->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_miengiamhocphi->nganhhoc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_miengiamhocphi->doituong->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (is_numeric($sKeyword)) $sql .= "nguoidung_id = " . $sKeyword . " OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $tbl_miengiamhocphi;
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
			$tbl_miengiamhocphi->setBasicSearchKeyword($sSearchKeyword);
			$tbl_miengiamhocphi->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $tbl_miengiamhocphi;
		$this->sSrchWhere = "";
		$tbl_miengiamhocphi->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->setBasicSearchKeyword("");
		$tbl_miengiamhocphi->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->setAdvancedSearch("x_don_tchthp_id", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_loaidon_id", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_nhomdon_id", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_msv", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_hoten_sinhvien", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_ngay_thang_nam", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_hoten_chame", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_hokhau", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_nganhhoc", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_doituong", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_datetime", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_status", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_active", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_nguoidung_id", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_datetime_add", "");
		$tbl_miengiamhocphi->setAdvancedSearch("x_dateedit_edit", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $tbl_miengiamhocphi;
		$this->sSrchWhere = $tbl_miengiamhocphi->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $tbl_miengiamhocphi;
		 $tbl_miengiamhocphi->don_tchthp_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_don_tchthp_id");
		 $tbl_miengiamhocphi->loaidon_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_loaidon_id");
		 $tbl_miengiamhocphi->nhomdon_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_nhomdon_id");
		 $tbl_miengiamhocphi->msv->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_msv");
		 $tbl_miengiamhocphi->hoten_sinhvien->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_hoten_sinhvien");
		 $tbl_miengiamhocphi->ngay_thang_nam->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_ngay_thang_nam");
		 $tbl_miengiamhocphi->hoten_chame->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_hoten_chame");
		 $tbl_miengiamhocphi->hokhau->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_hokhau");
		 $tbl_miengiamhocphi->nganhhoc->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_nganhhoc");
		 $tbl_miengiamhocphi->doituong->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_doituong");
		 $tbl_miengiamhocphi->datetime->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_datetime");
		 $tbl_miengiamhocphi->status->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_status");
		 $tbl_miengiamhocphi->active->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_active");
		 $tbl_miengiamhocphi->nguoidung_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_nguoidung_id");
		 $tbl_miengiamhocphi->datetime_add->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_datetime_add");
		 $tbl_miengiamhocphi->dateedit_edit->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_dateedit_edit");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $tbl_miengiamhocphi;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$tbl_miengiamhocphi->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$tbl_miengiamhocphi->CurrentOrderType = @$_GET["ordertype"];
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->loaidon_id); // Field 
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->msv); // Field 
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->hoten_sinhvien); // Field 
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->datetime); // Field 
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->status); // Field 
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->datetime_add); // Field 
			$tbl_miengiamhocphi->UpdateSort($tbl_miengiamhocphi->dateedit_edit); // Field 
			$tbl_miengiamhocphi->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $tbl_miengiamhocphi;
		$sOrderBy = $tbl_miengiamhocphi->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($tbl_miengiamhocphi->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_miengiamhocphi->SqlOrderBy();
				$tbl_miengiamhocphi->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $tbl_miengiamhocphi;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_miengiamhocphi->setSessionOrderBy($sOrderBy);
				$tbl_miengiamhocphi->loaidon_id->setSort("");
				$tbl_miengiamhocphi->msv->setSort("");
				$tbl_miengiamhocphi->hoten_sinhvien->setSort("");
				$tbl_miengiamhocphi->datetime->setSort("");
				$tbl_miengiamhocphi->status->setSort("");
				$tbl_miengiamhocphi->datetime_add->setSort("");
				$tbl_miengiamhocphi->dateedit_edit->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_miengiamhocphi;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_miengiamhocphi->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $tbl_miengiamhocphi;

		// Load search values
		// don_tchthp_id

		$tbl_miengiamhocphi->don_tchthp_id->AdvancedSearch->SearchValue = @$_GET["x_don_tchthp_id"];
		$tbl_miengiamhocphi->don_tchthp_id->AdvancedSearch->SearchOperator = @$_GET["z_don_tchthp_id"];

		// loaidon_id
		$tbl_miengiamhocphi->loaidon_id->AdvancedSearch->SearchValue = @$_GET["x_loaidon_id"];
		$tbl_miengiamhocphi->loaidon_id->AdvancedSearch->SearchOperator = @$_GET["z_loaidon_id"];

		// nhomdon_id
		$tbl_miengiamhocphi->nhomdon_id->AdvancedSearch->SearchValue = @$_GET["x_nhomdon_id"];
		$tbl_miengiamhocphi->nhomdon_id->AdvancedSearch->SearchOperator = @$_GET["z_nhomdon_id"];

		// msv
		$tbl_miengiamhocphi->msv->AdvancedSearch->SearchValue = @$_GET["x_msv"];
		$tbl_miengiamhocphi->msv->AdvancedSearch->SearchOperator = @$_GET["z_msv"];

		// hoten_sinhvien
		$tbl_miengiamhocphi->hoten_sinhvien->AdvancedSearch->SearchValue = @$_GET["x_hoten_sinhvien"];
		$tbl_miengiamhocphi->hoten_sinhvien->AdvancedSearch->SearchOperator = @$_GET["z_hoten_sinhvien"];

		// ngay_thang_nam
		$tbl_miengiamhocphi->ngay_thang_nam->AdvancedSearch->SearchValue = @$_GET["x_ngay_thang_nam"];
		$tbl_miengiamhocphi->ngay_thang_nam->AdvancedSearch->SearchOperator = @$_GET["z_ngay_thang_nam"];

		// hoten_chame
		$tbl_miengiamhocphi->hoten_chame->AdvancedSearch->SearchValue = @$_GET["x_hoten_chame"];
		$tbl_miengiamhocphi->hoten_chame->AdvancedSearch->SearchOperator = @$_GET["z_hoten_chame"];

		// hokhau
		$tbl_miengiamhocphi->hokhau->AdvancedSearch->SearchValue = @$_GET["x_hokhau"];
		$tbl_miengiamhocphi->hokhau->AdvancedSearch->SearchOperator = @$_GET["z_hokhau"];

		// nganhhoc
		$tbl_miengiamhocphi->nganhhoc->AdvancedSearch->SearchValue = @$_GET["x_nganhhoc"];
		$tbl_miengiamhocphi->nganhhoc->AdvancedSearch->SearchOperator = @$_GET["z_nganhhoc"];

		// doituong
		$tbl_miengiamhocphi->doituong->AdvancedSearch->SearchValue = @$_GET["x_doituong"];
		$tbl_miengiamhocphi->doituong->AdvancedSearch->SearchOperator = @$_GET["z_doituong"];

		// datetime
		$tbl_miengiamhocphi->datetime->AdvancedSearch->SearchValue = @$_GET["x_datetime"];
		$tbl_miengiamhocphi->datetime->AdvancedSearch->SearchOperator = @$_GET["z_datetime"];

		// status
		$tbl_miengiamhocphi->status->AdvancedSearch->SearchValue = @$_GET["x_status"];
		$tbl_miengiamhocphi->status->AdvancedSearch->SearchOperator = @$_GET["z_status"];

		// active
		$tbl_miengiamhocphi->active->AdvancedSearch->SearchValue = @$_GET["x_active"];
		$tbl_miengiamhocphi->active->AdvancedSearch->SearchOperator = @$_GET["z_active"];

		// nguoidung_id
		$tbl_miengiamhocphi->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$tbl_miengiamhocphi->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// datetime_add
		$tbl_miengiamhocphi->datetime_add->AdvancedSearch->SearchValue = @$_GET["x_datetime_add"];
		$tbl_miengiamhocphi->datetime_add->AdvancedSearch->SearchOperator = @$_GET["z_datetime_add"];

		// dateedit_edit
		$tbl_miengiamhocphi->dateedit_edit->AdvancedSearch->SearchValue = @$_GET["x_dateedit_edit"];
		$tbl_miengiamhocphi->dateedit_edit->AdvancedSearch->SearchOperator = @$_GET["z_dateedit_edit"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_miengiamhocphi;

		// Call Recordset Selecting event
		$tbl_miengiamhocphi->Recordset_Selecting($tbl_miengiamhocphi->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_miengiamhocphi->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
                echo $sSql;
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_miengiamhocphi->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_miengiamhocphi;
		$sFilter = $tbl_miengiamhocphi->KeyFilter();

		// Call Row Selecting event
		$tbl_miengiamhocphi->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_miengiamhocphi->CurrentFilter = $sFilter;
		$sSql = $tbl_miengiamhocphi->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_miengiamhocphi->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->don_tchthp_id->setDbValue($rs->fields('don_tchthp_id'));
		$tbl_miengiamhocphi->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$tbl_miengiamhocphi->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$tbl_miengiamhocphi->msv->setDbValue($rs->fields('msv'));
		$tbl_miengiamhocphi->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$tbl_miengiamhocphi->ngay_thang_nam->setDbValue($rs->fields('ngay_thang_nam'));
		$tbl_miengiamhocphi->hoten_chame->setDbValue($rs->fields('hoten_chame'));
		$tbl_miengiamhocphi->hokhau->setDbValue($rs->fields('hokhau'));
		$tbl_miengiamhocphi->nganhhoc->setDbValue($rs->fields('nganhhoc'));
		$tbl_miengiamhocphi->doituong->setDbValue($rs->fields('doituong'));
		$tbl_miengiamhocphi->datetime->setDbValue($rs->fields('datetime'));
		$tbl_miengiamhocphi->status->setDbValue($rs->fields('status'));
		$tbl_miengiamhocphi->active->setDbValue($rs->fields('active'));
		$tbl_miengiamhocphi->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_miengiamhocphi->datetime_add->setDbValue($rs->fields('datetime_add'));
		$tbl_miengiamhocphi->dateedit_edit->setDbValue($rs->fields('dateedit_edit'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_miengiamhocphi;

		// Call Row_Rendering event
		$tbl_miengiamhocphi->Row_Rendering();

		// Common render codes for all row types
		// loaidon_id

		$tbl_miengiamhocphi->loaidon_id->CellCssStyle = "";
		$tbl_miengiamhocphi->loaidon_id->CellCssClass = "";

		// msv
		$tbl_miengiamhocphi->msv->CellCssStyle = "";
		$tbl_miengiamhocphi->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssStyle = "";
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssClass = "";

		// datetime
		$tbl_miengiamhocphi->datetime->CellCssStyle = "white-space: nowrap;";
		$tbl_miengiamhocphi->datetime->CellCssClass = "";

		// status
		$tbl_miengiamhocphi->status->CellCssStyle = "";
		$tbl_miengiamhocphi->status->CellCssClass = "";

		// datetime_add
		$tbl_miengiamhocphi->datetime_add->CellCssStyle = "";
		$tbl_miengiamhocphi->datetime_add->CellCssClass = "";

		// dateedit_edit
		$tbl_miengiamhocphi->dateedit_edit->CellCssStyle = "";
		$tbl_miengiamhocphi->dateedit_edit->CellCssClass = "";
		if ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_VIEW) { // View row

			// don_tchthp_id
			$tbl_miengiamhocphi->don_tchthp_id->ViewValue = $tbl_miengiamhocphi->don_tchthp_id->CurrentValue;
			$tbl_miengiamhocphi->don_tchthp_id->CssStyle = "";
			$tbl_miengiamhocphi->don_tchthp_id->CssClass = "";
			$tbl_miengiamhocphi->don_tchthp_id->ViewCustomAttributes = "";

			// loaidon_id
			if (strval($tbl_miengiamhocphi->loaidon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->loaidon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "khong xu ly";
						break;
					case "1":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "Xu ly";
						break;
					default:
						$tbl_miengiamhocphi->loaidon_id->ViewValue = $tbl_miengiamhocphi->loaidon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->loaidon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->loaidon_id->CssStyle = "";
			$tbl_miengiamhocphi->loaidon_id->CssClass = "";
			$tbl_miengiamhocphi->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			if (strval($tbl_miengiamhocphi->nhomdon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->nhomdon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp1";
						break;
					case "1":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp2";
						break;
					case "2":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp3";
						break;
					default:
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = $tbl_miengiamhocphi->nhomdon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->nhomdon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->nhomdon_id->CssStyle = "";
			$tbl_miengiamhocphi->nhomdon_id->CssClass = "";
			$tbl_miengiamhocphi->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_miengiamhocphi->msv->ViewValue = $tbl_miengiamhocphi->msv->CurrentValue;
			$tbl_miengiamhocphi->msv->CssStyle = "";
			$tbl_miengiamhocphi->msv->CssClass = "";
			$tbl_miengiamhocphi->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->ViewValue = $tbl_miengiamhocphi->hoten_sinhvien->CurrentValue;
			$tbl_miengiamhocphi->hoten_sinhvien->CssStyle = "";
			$tbl_miengiamhocphi->hoten_sinhvien->CssClass = "";
			$tbl_miengiamhocphi->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->ViewValue = $tbl_miengiamhocphi->ngay_thang_nam->CurrentValue;
			$tbl_miengiamhocphi->ngay_thang_nam->CssStyle = "";
			$tbl_miengiamhocphi->ngay_thang_nam->CssClass = "";
			$tbl_miengiamhocphi->ngay_thang_nam->ViewCustomAttributes = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->ViewValue = $tbl_miengiamhocphi->hoten_chame->CurrentValue;
			$tbl_miengiamhocphi->hoten_chame->CssStyle = "";
			$tbl_miengiamhocphi->hoten_chame->CssClass = "";
			$tbl_miengiamhocphi->hoten_chame->ViewCustomAttributes = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->ViewValue = $tbl_miengiamhocphi->hokhau->CurrentValue;
			$tbl_miengiamhocphi->hokhau->CssStyle = "";
			$tbl_miengiamhocphi->hokhau->CssClass = "";
			$tbl_miengiamhocphi->hokhau->ViewCustomAttributes = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->ViewValue = $tbl_miengiamhocphi->nganhhoc->CurrentValue;
			$tbl_miengiamhocphi->nganhhoc->CssStyle = "";
			$tbl_miengiamhocphi->nganhhoc->CssClass = "";
			$tbl_miengiamhocphi->nganhhoc->ViewCustomAttributes = "";

			// doituong
			$tbl_miengiamhocphi->doituong->ViewValue = $tbl_miengiamhocphi->doituong->CurrentValue;
			$tbl_miengiamhocphi->doituong->CssStyle = "";
			$tbl_miengiamhocphi->doituong->CssClass = "";
			$tbl_miengiamhocphi->doituong->ViewCustomAttributes = "";

			// datetime
			$tbl_miengiamhocphi->datetime->ViewValue = $tbl_miengiamhocphi->datetime->CurrentValue;
			$tbl_miengiamhocphi->datetime->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime->ViewValue, 7);
			$tbl_miengiamhocphi->datetime->CssStyle = "";
			$tbl_miengiamhocphi->datetime->CssClass = "";
			$tbl_miengiamhocphi->datetime->ViewCustomAttributes = "";

			// status
			if (strval($tbl_miengiamhocphi->status->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->status->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->status->ViewValue = "Khong xet duyet";
						break;
					case "1":
						$tbl_miengiamhocphi->status->ViewValue = "Cho xet duyet";
						break;
					case "2":
						$tbl_miengiamhocphi->status->ViewValue = "dang xu ly";
						break;
					case "3 ":
						$tbl_miengiamhocphi->status->ViewValue = "Ket thuc";
						break;
					default:
						$tbl_miengiamhocphi->status->ViewValue = $tbl_miengiamhocphi->status->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->status->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->status->CssStyle = "";
			$tbl_miengiamhocphi->status->CssClass = "";
			$tbl_miengiamhocphi->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_miengiamhocphi->active->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->active->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->active->ViewValue = "Chua xac nhan";
						break;
					case "1":
						$tbl_miengiamhocphi->active->ViewValue = "Xac nhan";
						break;
					case "":
						$tbl_miengiamhocphi->active->ViewValue = "";
						break;
					default:
						$tbl_miengiamhocphi->active->ViewValue = $tbl_miengiamhocphi->active->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->active->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->active->CssStyle = "";
			$tbl_miengiamhocphi->active->CssClass = "";
			$tbl_miengiamhocphi->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_miengiamhocphi->nguoidung_id->ViewValue = $tbl_miengiamhocphi->nguoidung_id->CurrentValue;
			$tbl_miengiamhocphi->nguoidung_id->CssStyle = "";
			$tbl_miengiamhocphi->nguoidung_id->CssClass = "";
			$tbl_miengiamhocphi->nguoidung_id->ViewCustomAttributes = "";

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->ViewValue = $tbl_miengiamhocphi->datetime_add->CurrentValue;
			$tbl_miengiamhocphi->datetime_add->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime_add->ViewValue, 7);
			$tbl_miengiamhocphi->datetime_add->CssStyle = "";
			$tbl_miengiamhocphi->datetime_add->CssClass = "";
			$tbl_miengiamhocphi->datetime_add->ViewCustomAttributes = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = $tbl_miengiamhocphi->dateedit_edit->CurrentValue;
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->dateedit_edit->ViewValue, 7);
			$tbl_miengiamhocphi->dateedit_edit->CssStyle = "";
			$tbl_miengiamhocphi->dateedit_edit->CssClass = "";
			$tbl_miengiamhocphi->dateedit_edit->ViewCustomAttributes = "";

			// loaidon_id
			$tbl_miengiamhocphi->loaidon_id->HrefValue = "";

			// msv
			$tbl_miengiamhocphi->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->HrefValue = "";

			// datetime
			$tbl_miengiamhocphi->datetime->HrefValue = "";

			// status
			$tbl_miengiamhocphi->status->HrefValue = "";

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->HrefValue = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->HrefValue = "";
		} elseif ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// loaidon_id
			$tbl_miengiamhocphi->loaidon_id->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong xu ly");
			$arwrk[] = array("1", "Xu ly");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_miengiamhocphi->loaidon_id->EditValue = $arwrk;

			// msv
			$tbl_miengiamhocphi->msv->EditCustomAttributes = "";
			$tbl_miengiamhocphi->msv->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->msv->AdvancedSearch->SearchValue);

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->EditCustomAttributes = "";
			$tbl_miengiamhocphi->hoten_sinhvien->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->hoten_sinhvien->AdvancedSearch->SearchValue);

			// datetime
			$tbl_miengiamhocphi->datetime->EditCustomAttributes = "";
			$tbl_miengiamhocphi->datetime->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_miengiamhocphi->datetime->AdvancedSearch->SearchValue, 7), 7));

			// status
			$tbl_miengiamhocphi->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xet duyet");
			$arwrk[] = array("1", "Cho xet duyet");
			$arwrk[] = array("2", "dang xu ly");
			$arwrk[] = array("3 ", "Ket thuc");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_miengiamhocphi->status->EditValue = $arwrk;

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->EditCustomAttributes = "";
			$tbl_miengiamhocphi->datetime_add->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_miengiamhocphi->datetime_add->AdvancedSearch->SearchValue, 7), 7));

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->EditCustomAttributes = "";
			$tbl_miengiamhocphi->dateedit_edit->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_miengiamhocphi->dateedit_edit->AdvancedSearch->SearchValue, 7), 7));
		}

		// Call Row Rendered event
		$tbl_miengiamhocphi->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $tbl_miengiamhocphi;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($tbl_miengiamhocphi->datetime->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Datetime";
		}

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
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->don_tchthp_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_don_tchthp_id");
		$tbl_miengiamhocphi->loaidon_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_loaidon_id");
		$tbl_miengiamhocphi->nhomdon_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_nhomdon_id");
		$tbl_miengiamhocphi->msv->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_msv");
		$tbl_miengiamhocphi->hoten_sinhvien->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_hoten_sinhvien");
		$tbl_miengiamhocphi->ngay_thang_nam->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_ngay_thang_nam");
		$tbl_miengiamhocphi->hoten_chame->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_hoten_chame");
		$tbl_miengiamhocphi->hokhau->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_hokhau");
		$tbl_miengiamhocphi->nganhhoc->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_nganhhoc");
		$tbl_miengiamhocphi->doituong->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_doituong");
		$tbl_miengiamhocphi->datetime->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_datetime");
		$tbl_miengiamhocphi->status->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_status");
		$tbl_miengiamhocphi->active->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_active");
		$tbl_miengiamhocphi->nguoidung_id->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_nguoidung_id");
		$tbl_miengiamhocphi->datetime_add->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_datetime_add");
		$tbl_miengiamhocphi->dateedit_edit->AdvancedSearch->SearchValue = $tbl_miengiamhocphi->getAdvancedSearch("x_dateedit_edit");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $tbl_miengiamhocphi;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($tbl_miengiamhocphi->ExportAll) {
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
		if ($tbl_miengiamhocphi->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($tbl_miengiamhocphi->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $tbl_miengiamhocphi->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'don_tchthp_id', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'loaidon_id', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'nhomdon_id', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'msv', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'hoten_sinhvien', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'ngay_thang_nam', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'hoten_chame', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'hokhau', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'nganhhoc', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'doituong', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'datetime', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'status', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'active', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'nguoidung_id', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'datetime_add', $tbl_miengiamhocphi->Export);
				ew_ExportAddValue($sExportStr, 'dateedit_edit', $tbl_miengiamhocphi->Export);
				echo ew_ExportLine($sExportStr, $tbl_miengiamhocphi->Export);
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
				$tbl_miengiamhocphi->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($tbl_miengiamhocphi->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('don_tchthp_id', $tbl_miengiamhocphi->don_tchthp_id->CurrentValue);
					$XmlDoc->AddField('loaidon_id', $tbl_miengiamhocphi->loaidon_id->CurrentValue);
					$XmlDoc->AddField('nhomdon_id', $tbl_miengiamhocphi->nhomdon_id->CurrentValue);
					$XmlDoc->AddField('msv', $tbl_miengiamhocphi->msv->CurrentValue);
					$XmlDoc->AddField('hoten_sinhvien', $tbl_miengiamhocphi->hoten_sinhvien->CurrentValue);
					$XmlDoc->AddField('ngay_thang_nam', $tbl_miengiamhocphi->ngay_thang_nam->CurrentValue);
					$XmlDoc->AddField('hoten_chame', $tbl_miengiamhocphi->hoten_chame->CurrentValue);
					$XmlDoc->AddField('hokhau', $tbl_miengiamhocphi->hokhau->CurrentValue);
					$XmlDoc->AddField('nganhhoc', $tbl_miengiamhocphi->nganhhoc->CurrentValue);
					$XmlDoc->AddField('doituong', $tbl_miengiamhocphi->doituong->CurrentValue);
					$XmlDoc->AddField('datetime', $tbl_miengiamhocphi->datetime->CurrentValue);
					$XmlDoc->AddField('status', $tbl_miengiamhocphi->status->CurrentValue);
					$XmlDoc->AddField('active', $tbl_miengiamhocphi->active->CurrentValue);
					$XmlDoc->AddField('nguoidung_id', $tbl_miengiamhocphi->nguoidung_id->CurrentValue);
					$XmlDoc->AddField('datetime_add', $tbl_miengiamhocphi->datetime_add->CurrentValue);
					$XmlDoc->AddField('dateedit_edit', $tbl_miengiamhocphi->dateedit_edit->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $tbl_miengiamhocphi->Export <> "csv") { // Vertical format
						echo ew_ExportField('don_tchthp_id', $tbl_miengiamhocphi->don_tchthp_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('loaidon_id', $tbl_miengiamhocphi->loaidon_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('nhomdon_id', $tbl_miengiamhocphi->nhomdon_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('msv', $tbl_miengiamhocphi->msv->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('hoten_sinhvien', $tbl_miengiamhocphi->hoten_sinhvien->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('ngay_thang_nam', $tbl_miengiamhocphi->ngay_thang_nam->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('hoten_chame', $tbl_miengiamhocphi->hoten_chame->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('hokhau', $tbl_miengiamhocphi->hokhau->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('nganhhoc', $tbl_miengiamhocphi->nganhhoc->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('doituong', $tbl_miengiamhocphi->doituong->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('datetime', $tbl_miengiamhocphi->datetime->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('status', $tbl_miengiamhocphi->status->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('active', $tbl_miengiamhocphi->active->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('nguoidung_id', $tbl_miengiamhocphi->nguoidung_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('datetime_add', $tbl_miengiamhocphi->datetime_add->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportField('dateedit_edit', $tbl_miengiamhocphi->dateedit_edit->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->don_tchthp_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->loaidon_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->nhomdon_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->msv->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->hoten_sinhvien->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->ngay_thang_nam->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->hoten_chame->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->hokhau->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->nganhhoc->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->doituong->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->datetime->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->status->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->active->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->nguoidung_id->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->datetime_add->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						ew_ExportAddValue($sExportStr, $tbl_miengiamhocphi->dateedit_edit->ExportValue($tbl_miengiamhocphi->Export, $tbl_miengiamhocphi->ExportOriginalValue), $tbl_miengiamhocphi->Export);
						echo ew_ExportLine($sExportStr, $tbl_miengiamhocphi->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($tbl_miengiamhocphi->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($tbl_miengiamhocphi->Export);
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
