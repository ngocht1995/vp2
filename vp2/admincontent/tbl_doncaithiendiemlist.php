<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_doncaithiendieminfo.php" ?>
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
$tbl_doncaithiendiem_list = new ctbl_doncaithiendiem_list();
$Page =& $tbl_doncaithiendiem_list;

// Page init processing
$tbl_doncaithiendiem_list->Page_Init();

// Page main processing
$tbl_doncaithiendiem_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_doncaithiendiem_list = new ew_Page("tbl_doncaithiendiem_list");

// page properties
tbl_doncaithiendiem_list.PageID = "list"; // page ID
var EW_PAGE_ID = tbl_doncaithiendiem_list.PageID; // for backward compatibility

// extend page with validate function for search
tbl_doncaithiendiem_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_msv"];
	if (elm && !ew_CheckInteger(elm.value))
		return ew_OnError(this, elm, "Incorrect integer - Msv");
	elm = fobj.elements["x" + infix + "_ngay_tao_don"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Ngay Tao Don");

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
tbl_doncaithiendiem_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_doncaithiendiem_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_doncaithiendiem_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_doncaithiendiem_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($tbl_doncaithiendiem->Export == "" && $tbl_doncaithiendiem->SelectLimit);
	if (!$bSelectLimit)
		$rs = $tbl_doncaithiendiem_list->LoadRecordset();
	$tbl_doncaithiendiem_list->lTotalRecs = ($bSelectLimit) ? $tbl_doncaithiendiem->SelectRecordCount() : $rs->RecordCount();
	$tbl_doncaithiendiem_list->lStartRec = 1;
	if ($tbl_doncaithiendiem_list->lDisplayRecs <= 0) // Display all records
		$tbl_doncaithiendiem_list->lDisplayRecs = $tbl_doncaithiendiem_list->lTotalRecs;
	if (!($tbl_doncaithiendiem->ExportAll && $tbl_doncaithiendiem->Export <> ""))
		$tbl_doncaithiendiem_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $tbl_doncaithiendiem_list->LoadRecordset($tbl_doncaithiendiem_list->lStartRec-1, $tbl_doncaithiendiem_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Đơn xin cải thiện điểm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 
<?php if ($tbl_doncaithiendiem->Export == "" && $tbl_doncaithiendiem->CurrentAction == "") { ?>
<!--&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>export=excel">Export to Excel</a>
&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>export=word">Export to Word</a>-->
        &nbsp;&nbsp;<a style="float: right" href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>export=xml" title="Kết xuất Excel"><img alt ="" src="../admincontent/images/excel.gif"></a>
<!--&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>export=csv">Export to CSV</a>-->
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_doncaithiendiem->Export == "" && $tbl_doncaithiendiem->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(tbl_doncaithiendiem_list);" style="text-decoration: none;"><img id="tbl_doncaithiendiem_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="tbl_doncaithiendiem_list_SearchPanel">
<form name="ftbl_doncaithiendiemlistsrch" id="ftbl_doncaithiendiemlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return tbl_doncaithiendiem_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="tbl_doncaithiendiem">
<?php
if ($gsSearchError == "")
	$tbl_doncaithiendiem_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$tbl_doncaithiendiem->RowType = EW_ROWTYPE_SEARCH;

// Render row
$tbl_doncaithiendiem_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Mã sinh viên</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_msv" id="z_msv" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_msv" id="x_msv" size="30" value="<?php echo $tbl_doncaithiendiem->msv->EditValue ?>"<?php echo $tbl_doncaithiendiem->msv->EditAttributes() ?>>
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
<input type="text" name="x_hoten_sinhvien" id="x_hoten_sinhvien" size="30" maxlength="200" value="<?php echo $tbl_doncaithiendiem->hoten_sinhvien->EditValue ?>"<?php echo $tbl_doncaithiendiem->hoten_sinhvien->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Mã môn</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_ma_mon" id="z_ma_mon" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_ma_mon" id="x_ma_mon" size="30" maxlength="50" value="<?php echo $tbl_doncaithiendiem->ma_mon->EditValue ?>"<?php echo $tbl_doncaithiendiem->ma_mon->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Lớp tín chỉ</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_lop_tinchi" id="z_lop_tinchi" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_lop_tinchi" id="x_lop_tinchi" size="30" maxlength="200" value="<?php echo $tbl_doncaithiendiem->lop_tinchi->EditValue ?>"<?php echo $tbl_doncaithiendiem->lop_tinchi->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Học kỳ</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_hoc_ky" id="z_hoc_ky" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_hoc_ky" id="x_hoc_ky" size="30" maxlength="100" value="<?php echo $tbl_doncaithiendiem->hoc_ky->EditValue ?>"<?php echo $tbl_doncaithiendiem->hoc_ky->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Môn thi cải thiện điểm</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_monthi_lan2" id="z_monthi_lan2" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_monthi_lan2" id="x_monthi_lan2" size="30" maxlength="200" value="<?php echo $tbl_doncaithiendiem->monthi_lan2->EditValue ?>"<?php echo $tbl_doncaithiendiem->monthi_lan2->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày tạo đơn</span></td>
		<td><span class="ewSearchOpr">trong khoảng<input type="hidden" name="z_ngay_tao_don" id="z_ngay_tao_don" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_ngay_tao_don" id="x_ngay_tao_don" value="<?php echo $tbl_doncaithiendiem->ngay_tao_don->EditValue ?>"<?php echo $tbl_doncaithiendiem->ngay_tao_don->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_ngay_tao_don" name="cal_x_ngay_tao_don" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_ngay_tao_don", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_ngay_tao_don" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_ngay_tao_don" name="btw1_ngay_tao_don">&nbsp;và&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_ngay_tao_don" name="btw1_ngay_tao_don">
<input type="text" name="y_ngay_tao_don" id="y_ngay_tao_don" value="<?php echo $tbl_doncaithiendiem->ngay_tao_don->EditValue2 ?>"<?php echo $tbl_doncaithiendiem->ngay_tao_don->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_ngay_tao_don" name="cal_y_ngay_tao_don" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_ngay_tao_don", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_ngay_tao_don" // ID of the button
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($tbl_doncaithiendiem->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>cmd=reset">Hiện thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_doncaithiendiem->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_doncaithiendiem->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_doncaithiendiem->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Từ bất kỳ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_doncaithiendiem_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($tbl_doncaithiendiem->CurrentAction <> "gridadd" && $tbl_doncaithiendiem->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_doncaithiendiem_list->Pager)) $tbl_doncaithiendiem_list->Pager = new cNumericPager($tbl_doncaithiendiem_list->lStartRec, $tbl_doncaithiendiem_list->lDisplayRecs, $tbl_doncaithiendiem_list->lTotalRecs, $tbl_doncaithiendiem_list->lRecRange) ?>
<?php if ($tbl_doncaithiendiem_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_doncaithiendiem_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $tbl_doncaithiendiem_list->Pager->FromIndex ?> to <?php echo $tbl_doncaithiendiem_list->Pager->ToIndex ?> of <?php echo $tbl_doncaithiendiem_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_doncaithiendiem_list->sSrchWhere == "0=101") { ?>
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
<?php if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_doncaithiendiem">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_doncaithiendiem_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_doncaithiendiem_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_doncaithiendiem_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_doncaithiendiem->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_doncaithiendiem->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_doncaithiendiemlist)) alert('No records selected'); else {document.ftbl_doncaithiendiemlist.action='tbl_doncaithiendiemdelete.php';document.ftbl_doncaithiendiemlist.encoding='application/x-www-form-urlencoded';document.ftbl_doncaithiendiemlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_doncaithiendiemlist)) alert('No records selected'); else {document.ftbl_doncaithiendiemlist.action='tbl_doncaithiendiemupdate.php';document.ftbl_doncaithiendiemlist.encoding='application/x-www-form-urlencoded';document.ftbl_doncaithiendiemlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ftbl_doncaithiendiemlist" id="ftbl_doncaithiendiemlist" class="ewForm" action="" method="post">
<?php if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$tbl_doncaithiendiem_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$tbl_doncaithiendiem_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$tbl_doncaithiendiem_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$tbl_doncaithiendiem_list->lOptionCnt++; // copy
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$tbl_doncaithiendiem_list->lOptionCnt++; // Multi-select
}
	$tbl_doncaithiendiem_list->lOptionCnt += count($tbl_doncaithiendiem_list->ListOptions->Items); // Custom list options
?>
<?php echo $tbl_doncaithiendiem->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;width:15px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width:15px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;width:15px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;width:15px"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="tbl_doncaithiendiem_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_doncaithiendiem_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
		
				
<?php if ($tbl_doncaithiendiem->msv->Visible) { // msv ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->msv) == "") { ?>
		<td>MãSV- Họtên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->msv) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã sinh viên - họ tên</td><td><?php if ($tbl_doncaithiendiem->msv->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->msv->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
		
<?php if ($tbl_doncaithiendiem->lop_tinchi->Visible) { // lop_tinchi ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->lop_tinchi) == "") { ?>
		<td>Lop Tinchi</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->lop_tinchi) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Lớp tín chỉ <br/> Lớp sinh hoạt
                          </td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->lop_tinchi->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->lop_tinchi->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
		
<?php if ($tbl_doncaithiendiem->nam_hoc1->Visible) { // nam_hoc1 ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->nam_hoc1) == "") { ?>
		<td>Nam Hoc 1</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->nam_hoc1) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Năm học  - học kỳ</td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->nam_hoc1->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->nam_hoc1->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doncaithiendiem->monthi_lan2->Visible) { // monthi_lan2 ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->monthi_lan2) == "") { ?>
		<td>Monthi Lan 2</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->monthi_lan2) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Môn thi lại</td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->monthi_lan2->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->monthi_lan2->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
		
<?php if ($tbl_doncaithiendiem->thoigian_h->Visible) { // thoigian_h ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->thoigian_h) == "") { ?>
		<td>Thoigian H</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->thoigian_h) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian</td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->thoigian_h->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->thoigian_h->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	
<?php if ($tbl_doncaithiendiem->ngay_tao_don->Visible) { // ngay_tao_don ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->ngay_tao_don) == "") { ?>
		<td>Ngay Tao Don</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->ngay_tao_don) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày tạo đơn</td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->ngay_tao_don->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->ngay_tao_don->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
          
<?php if ($tbl_doncaithiendiem->status->Visible) { // status ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->status) == "") { ?>
		<td>Status</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
         <?php if ($tbl_doncaithiendiem->note->Visible) { // status ?>
	<?php if ($tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->note) == "") { ?>
		<td>Status</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_doncaithiendiem->SortUrl($tbl_doncaithiendiem->note) ?>',1);">
		<table cellspacing="0" class="ewTableHeaderBtn"><tr><td> Chú ý</td><td style="width: 10px;"><?php if ($tbl_doncaithiendiem->note->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_doncaithiendiem->note->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
			
	</tr>
</thead>
<?php
if ($tbl_doncaithiendiem->ExportAll && $tbl_doncaithiendiem->Export <> "") {
	$tbl_doncaithiendiem_list->lStopRec = $tbl_doncaithiendiem_list->lTotalRecs;
} else {
	$tbl_doncaithiendiem_list->lStopRec = $tbl_doncaithiendiem_list->lStartRec + $tbl_doncaithiendiem_list->lDisplayRecs - 1; // Set the last record to display
}
$tbl_doncaithiendiem_list->lRecCount = $tbl_doncaithiendiem_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$tbl_doncaithiendiem->SelectLimit && $tbl_doncaithiendiem_list->lStartRec > 1)
		$rs->Move($tbl_doncaithiendiem_list->lStartRec - 1);
}
$tbl_doncaithiendiem_list->lRowCnt = 0;
while (($tbl_doncaithiendiem->CurrentAction == "gridadd" || !$rs->EOF) &&
	$tbl_doncaithiendiem_list->lRecCount < $tbl_doncaithiendiem_list->lStopRec) {
	$tbl_doncaithiendiem_list->lRecCount++;
	if (intval($tbl_doncaithiendiem_list->lRecCount) >= intval($tbl_doncaithiendiem_list->lStartRec)) {
		$tbl_doncaithiendiem_list->lRowCnt++;

	// Init row class and style
	$tbl_doncaithiendiem->CssClass = "";
	$tbl_doncaithiendiem->CssStyle = "";
	$tbl_doncaithiendiem->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($tbl_doncaithiendiem->CurrentAction == "gridadd") {
		$tbl_doncaithiendiem_list->LoadDefaultValues(); // Load default values
	} else {
		$tbl_doncaithiendiem_list->LoadRowValues($rs); // Load row values
	}
	$tbl_doncaithiendiem->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$tbl_doncaithiendiem_list->RenderRow();
?>
	<tr<?php echo $tbl_doncaithiendiem->RowAttributes() ?>>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a target="_blank" href="http://docs.google.com/viewer?url=http://vp.hpu.edu.vn/vp/<?php echo substr($rs->fields('file_name'),3) ?>">Xem- In ấn</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
   <?php If (!IsAdmin())
     {
        if ($rs->fields('active') <> '1' && $rs->fields('status') <> '3') 
         {
         ?>
        <a href="<?php echo $tbl_doncaithiendiem->EditUrl() ?>">Sửa</a>
                    <?php } ?>
                <?php } else { ?>
        <a href="<?php echo $tbl_doncaithiendiem->EditUrl() ?>">Sửa</a>
   <?php } ?>  
</span></td>
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $rs->fields('file_name') ?>">Xuất ra world</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
     <?php 
     If (!IsAdmin())
     {
        if ($rs->fields('active') <> '1' && $rs->fields('status') <> '3') 
         {
         ?>
            <input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
     <?php } ?>
    <?php } else { ?>
            <input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>   
       <?php } ?>      
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_doncaithiendiem_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>

	<?php if ($tbl_doncaithiendiem->msv->Visible) { // msv - họ tên ?>
		<td<?php echo $tbl_doncaithiendiem->msv->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->msv->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->msv->ListViewValue() ?></div>
<div<?php echo $tbl_doncaithiendiem->hoten_sinhvien->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->hoten_sinhvien->ListViewValue() ?></div>
</td>
	<?php } ?>
       <?php if ($tbl_doncaithiendiem->lop_tinchi->Visible) { // msv ?>
		<td<?php echo $tbl_doncaithiendiem->msv->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->lop_tinchi->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->lop_tinchi->ListViewValue() ?></div>
<div<?php echo $tbl_doncaithiendiem->lop_sinhhoat->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->lop_sinhhoat->ListViewValue() ?></div>
</td>
	<?php } ?>
         <?php if ($tbl_doncaithiendiem->nam_hoc1->Visible) { // msv ?>
		<td<?php echo $tbl_doncaithiendiem->msv->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nam_hoc1->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nam_hoc1->ListViewValue() ?></div>
<div<?php echo $tbl_doncaithiendiem->hoc_ky->ViewAttributes() ?>><?php echo "học kỳ:".$tbl_doncaithiendiem->hoc_ky->ListViewValue() ?></div>
</td>
	<?php } ?>
   	<?php if ($tbl_doncaithiendiem->monthi_lan2->Visible) { // monthi_lan2 ?>
		<td<?php echo $tbl_doncaithiendiem->monthi_lan2->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->monthi_lan2->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->monthi_lan2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_doncaithiendiem->thoigian_h->Visible) { // thoigian_h ?>
		<td<?php echo $tbl_doncaithiendiem->thoigian_h->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->thoigian_h->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->thoigian_h->ListViewValue() ?>h<?php echo $tbl_doncaithiendiem->thoigian_phut->ListViewValue() ?>'</div>
<div<?php echo $tbl_doncaithiendiem->ngay_thi->ViewAttributes() ?>><?php echo  $tbl_doncaithiendiem->ngay_thi->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_doncaithiendiem->ngay_tao_don->Visible) { // ngay_tao_don ?>
		<td<?php echo $tbl_doncaithiendiem->ngay_tao_don->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_tao_don->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_tao_don->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_doncaithiendiem->status->Visible) { // status ?>
		<td<?php echo $tbl_doncaithiendiem->status->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->status->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->status->ListViewValue() ?></div>
</td>
	<?php } ?>
     <?php if ($tbl_doncaithiendiem->note->Visible) { // status ?>
		<td<?php echo $tbl_doncaithiendiem->note->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->note->ViewAttributes() ?>><?php echo $rs->fields('note') ?></div>
</td>
	<?php } ?>
        

	</tr>
<?php
	}
	if ($tbl_doncaithiendiem->CurrentAction <> "gridadd")
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
<?php if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($tbl_doncaithiendiem->CurrentAction <> "gridadd" && $tbl_doncaithiendiem->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_doncaithiendiem_list->Pager)) $tbl_doncaithiendiem_list->Pager = new cNumericPager($tbl_doncaithiendiem_list->lStartRec, $tbl_doncaithiendiem_list->lDisplayRecs, $tbl_doncaithiendiem_list->lTotalRecs, $tbl_doncaithiendiem_list->lRecRange) ?>
<?php if ($tbl_doncaithiendiem_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_doncaithiendiem_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_list->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $tbl_doncaithiendiem_list->Pager->FromIndex ?> to <?php echo $tbl_doncaithiendiem_list->Pager->ToIndex ?> of <?php echo $tbl_doncaithiendiem_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_doncaithiendiem_list->sSrchWhere == "0=101") { ?>
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
<?php if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_doncaithiendiem">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_doncaithiendiem_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_doncaithiendiem_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_doncaithiendiem_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_doncaithiendiem->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_doncaithiendiem->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_doncaithiendiem_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_doncaithiendiemlist)) alert('No records selected'); else {document.ftbl_doncaithiendiemlist.action='tbl_doncaithiendiemdelete.php';document.ftbl_doncaithiendiemlist.encoding='application/x-www-form-urlencoded';document.ftbl_doncaithiendiemlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_doncaithiendiemlist)) alert('No records selected'); else {document.ftbl_doncaithiendiemlist.action='tbl_doncaithiendiemupdate.php';document.ftbl_doncaithiendiemlist.encoding='application/x-www-form-urlencoded';document.ftbl_doncaithiendiemlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_doncaithiendiem->Export == "" && $tbl_doncaithiendiem->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(tbl_doncaithiendiem_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
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
class ctbl_doncaithiendiem_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'tbl_doncaithiendiem';

	// Page Object Name
	var $PageObjName = 'tbl_doncaithiendiem_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) $PageUrl .= "t=" . $tbl_doncaithiendiem->TableVar . "&"; // add page token
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
		global $objForm, $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_doncaithiendiem->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_doncaithiendiem->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_doncaithiendiem_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_doncaithiendiem"] = new ctbl_doncaithiendiem();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_doncaithiendiem', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_doncaithiendiem;
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
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "You do not have the right permission to view the page";
			$this->Page_Terminate();
		}
	$tbl_doncaithiendiem->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $tbl_doncaithiendiem->Export; // Get export parameter, used in header
	$gsExportFile = $tbl_doncaithiendiem->TableVar; // Get export file, used in header
	if ($tbl_doncaithiendiem->Export == "excel") {
                header('Content-Type: text/xml');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		
	}
	if ($tbl_doncaithiendiem->Export == "word") {
		header('Content-Type: application/vnd.ms-word;charset:utf-8');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
	}
	if ($tbl_doncaithiendiem->Export == "xml") {
		header('Content-Type: text/xml');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($tbl_doncaithiendiem->Export == "csv;") {
		header('Content-Type: application/csv;charset:utf-8');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
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
		global $objForm, $gsSearchError, $Security, $tbl_doncaithiendiem;
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
		if ($tbl_doncaithiendiem->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $tbl_doncaithiendiem->getRecordsPerPage(); // Restore from Session
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
		$tbl_doncaithiendiem->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$tbl_doncaithiendiem->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
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
		$tbl_doncaithiendiem->setSessionWhere($sFilter);
		$tbl_doncaithiendiem->CurrentFilter = "";

		// Export data only
		if (in_array($tbl_doncaithiendiem->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $tbl_doncaithiendiem;
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
			$tbl_doncaithiendiem->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $tbl_doncaithiendiem;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->phieucaithiendiem_id, FALSE); // Field phieucaithiendiem_id
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->loaidon_id, FALSE); // Field loaidon_id
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->nhomdon_id, FALSE); // Field nhomdon_id
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->msv, FALSE); // Field msv
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->hoten_sinhvien, FALSE); // Field hoten_sinhvien
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->ngay_sinh, FALSE); // Field ngay_sinh
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->lop_sinhhoat, FALSE); // Field lop_sinhhoat
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->so_dienthoai, FALSE); // Field so_dienthoai
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->momthi_chinh, FALSE); // Field momthi_chinh
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->ma_mon, FALSE); // Field ma_mon
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->lop_tinchi, FALSE); // Field lop_tinchi
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->hoc_ky, FALSE); // Field hoc_ky
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->nam_hoc1, FALSE); // Field nam_hoc1
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->nam_hoc2, FALSE); // Field nam_hoc2
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->diem, FALSE); // Field diem
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->monthi_lan2, FALSE); // Field monthi_lan2
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->thoigian_h, FALSE); // Field thoigian_h
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->thoigian_phut, FALSE); // Field thoigian_phut
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->ngay_thi, FALSE); // Field ngay_thi
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->ngay_tao_don, FALSE); // Field ngay_tao_don
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->status, FALSE); // Field status
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->active, FALSE); // Field active
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->date_time_add, FALSE); // Field date_time_add
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->date_time_edit, FALSE); // Field date_time_edit
		$this->BuildSearchSql($sWhere, $tbl_doncaithiendiem->file_name, FALSE); // Field file_name

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($tbl_doncaithiendiem->phieucaithiendiem_id); // Field phieucaithiendiem_id
			$this->SetSearchParm($tbl_doncaithiendiem->loaidon_id); // Field loaidon_id
			$this->SetSearchParm($tbl_doncaithiendiem->nhomdon_id); // Field nhomdon_id
			$this->SetSearchParm($tbl_doncaithiendiem->msv); // Field msv
			$this->SetSearchParm($tbl_doncaithiendiem->hoten_sinhvien); // Field hoten_sinhvien
			$this->SetSearchParm($tbl_doncaithiendiem->ngay_sinh); // Field ngay_sinh
			$this->SetSearchParm($tbl_doncaithiendiem->lop_sinhhoat); // Field lop_sinhhoat
			$this->SetSearchParm($tbl_doncaithiendiem->so_dienthoai); // Field so_dienthoai
			$this->SetSearchParm($tbl_doncaithiendiem->momthi_chinh); // Field momthi_chinh
			$this->SetSearchParm($tbl_doncaithiendiem->ma_mon); // Field ma_mon
			$this->SetSearchParm($tbl_doncaithiendiem->lop_tinchi); // Field lop_tinchi
			$this->SetSearchParm($tbl_doncaithiendiem->hoc_ky); // Field hoc_ky
			$this->SetSearchParm($tbl_doncaithiendiem->nam_hoc1); // Field nam_hoc1
			$this->SetSearchParm($tbl_doncaithiendiem->nam_hoc2); // Field nam_hoc2
			$this->SetSearchParm($tbl_doncaithiendiem->diem); // Field diem
			$this->SetSearchParm($tbl_doncaithiendiem->monthi_lan2); // Field monthi_lan2
			$this->SetSearchParm($tbl_doncaithiendiem->thoigian_h); // Field thoigian_h
			$this->SetSearchParm($tbl_doncaithiendiem->thoigian_phut); // Field thoigian_phut
			$this->SetSearchParm($tbl_doncaithiendiem->ngay_thi); // Field ngay_thi
			$this->SetSearchParm($tbl_doncaithiendiem->ngay_tao_don); // Field ngay_tao_don
			$this->SetSearchParm($tbl_doncaithiendiem->email); // Field email
			$this->SetSearchParm($tbl_doncaithiendiem->note); // Field note
			$this->SetSearchParm($tbl_doncaithiendiem->status_email); // Field status_email
			$this->SetSearchParm($tbl_doncaithiendiem->status); // Field status
			$this->SetSearchParm($tbl_doncaithiendiem->active); // Field active
			$this->SetSearchParm($tbl_doncaithiendiem->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($tbl_doncaithiendiem->date_time_add); // Field date_time_add
			$this->SetSearchParm($tbl_doncaithiendiem->date_time_edit); // Field date_time_edit
			$this->SetSearchParm($tbl_doncaithiendiem->file_name); // Field file_name
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
		global $tbl_doncaithiendiem;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$tbl_doncaithiendiem->setAdvancedSearch("x_$FldParm", $FldVal);
		$tbl_doncaithiendiem->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$tbl_doncaithiendiem->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$tbl_doncaithiendiem->setAdvancedSearch("y_$FldParm", $FldVal2);
		$tbl_doncaithiendiem->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $tbl_doncaithiendiem;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $tbl_doncaithiendiem->hoten_sinhvien->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_doncaithiendiem->lop_sinhhoat->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_doncaithiendiem->so_dienthoai->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_doncaithiendiem->ma_mon->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_doncaithiendiem->email->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_doncaithiendiem->note->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_doncaithiendiem->file_name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $tbl_doncaithiendiem;
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
			$tbl_doncaithiendiem->setBasicSearchKeyword($sSearchKeyword);
			$tbl_doncaithiendiem->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $tbl_doncaithiendiem;
		$this->sSrchWhere = "";
		$tbl_doncaithiendiem->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->setBasicSearchKeyword("");
		$tbl_doncaithiendiem->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->setAdvancedSearch("x_phieucaithiendiem_id", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_loaidon_id", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_nhomdon_id", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_msv", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_hoten_sinhvien", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_ngay_sinh", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_lop_sinhhoat", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_so_dienthoai", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_momthi_chinh", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_ma_mon", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_lop_tinchi", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_hoc_ky", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_nam_hoc1", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_nam_hoc2", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_diem", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_monthi_lan2", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_thoigian_h", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_thoigian_phut", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_ngay_thi", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_ngay_tao_don", "");
		$tbl_doncaithiendiem->setAdvancedSearch("y_ngay_tao_don", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_email", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_note", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_status_email", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_status", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_active", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_nguoidung_id", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_date_time_add", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_date_time_edit", "");
		$tbl_doncaithiendiem->setAdvancedSearch("x_file_name", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $tbl_doncaithiendiem;
		$this->sSrchWhere = $tbl_doncaithiendiem->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $tbl_doncaithiendiem;
		 $tbl_doncaithiendiem->phieucaithiendiem_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_phieucaithiendiem_id");
		 $tbl_doncaithiendiem->loaidon_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_loaidon_id");
		 $tbl_doncaithiendiem->nhomdon_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nhomdon_id");
		 $tbl_doncaithiendiem->msv->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_msv");
		 $tbl_doncaithiendiem->hoten_sinhvien->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_hoten_sinhvien");
		 $tbl_doncaithiendiem->ngay_sinh->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ngay_sinh");
		 $tbl_doncaithiendiem->lop_sinhhoat->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_lop_sinhhoat");
		 $tbl_doncaithiendiem->so_dienthoai->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_so_dienthoai");
		 $tbl_doncaithiendiem->momthi_chinh->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_momthi_chinh");
		 $tbl_doncaithiendiem->ma_mon->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ma_mon");
		 $tbl_doncaithiendiem->lop_tinchi->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_lop_tinchi");
		 $tbl_doncaithiendiem->hoc_ky->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_hoc_ky");
		 $tbl_doncaithiendiem->nam_hoc1->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nam_hoc1");
		 $tbl_doncaithiendiem->nam_hoc2->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nam_hoc2");
		 $tbl_doncaithiendiem->diem->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_diem");
		 $tbl_doncaithiendiem->monthi_lan2->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_monthi_lan2");
		 $tbl_doncaithiendiem->thoigian_h->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_thoigian_h");
		 $tbl_doncaithiendiem->thoigian_phut->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_thoigian_phut");
		 $tbl_doncaithiendiem->ngay_thi->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ngay_thi");
		 $tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ngay_tao_don");
		 $tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue2 = $tbl_doncaithiendiem->getAdvancedSearch("y_ngay_tao_don");
		 $tbl_doncaithiendiem->email->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_email");
		 $tbl_doncaithiendiem->note->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_note");
		 $tbl_doncaithiendiem->status_email->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_status_email");
		 $tbl_doncaithiendiem->status->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_status");
		 $tbl_doncaithiendiem->active->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_active");
		 $tbl_doncaithiendiem->nguoidung_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nguoidung_id");
		 $tbl_doncaithiendiem->date_time_add->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_date_time_add");
		 $tbl_doncaithiendiem->date_time_edit->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_date_time_edit");
		 $tbl_doncaithiendiem->file_name->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_file_name");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $tbl_doncaithiendiem;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$tbl_doncaithiendiem->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$tbl_doncaithiendiem->CurrentOrderType = @$_GET["ordertype"];
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->phieucaithiendiem_id); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->loaidon_id); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->nhomdon_id); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->msv); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->hoten_sinhvien); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->ngay_sinh); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->lop_sinhhoat); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->so_dienthoai); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->ma_mon); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->lop_tinchi); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->hoc_ky); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->nam_hoc1); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->nam_hoc2); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->diem); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->monthi_lan2); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->thoigian_h); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->thoigian_phut); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->ngay_thi); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->ngay_tao_don); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->email); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->status_email); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->status); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->active); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->nguoidung_id); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->date_time_add); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->date_time_edit); // Field 
			$tbl_doncaithiendiem->UpdateSort($tbl_doncaithiendiem->file_name); // Field 
			$tbl_doncaithiendiem->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $tbl_doncaithiendiem;
		$sOrderBy = $tbl_doncaithiendiem->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($tbl_doncaithiendiem->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_doncaithiendiem->SqlOrderBy();
				$tbl_doncaithiendiem->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $tbl_doncaithiendiem;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_doncaithiendiem->setSessionOrderBy($sOrderBy);
				$tbl_doncaithiendiem->phieucaithiendiem_id->setSort("");
				$tbl_doncaithiendiem->loaidon_id->setSort("");
				$tbl_doncaithiendiem->nhomdon_id->setSort("");
				$tbl_doncaithiendiem->msv->setSort("");
				$tbl_doncaithiendiem->hoten_sinhvien->setSort("");
				$tbl_doncaithiendiem->ngay_sinh->setSort("");
				$tbl_doncaithiendiem->lop_sinhhoat->setSort("");
				$tbl_doncaithiendiem->so_dienthoai->setSort("");
				$tbl_doncaithiendiem->ma_mon->setSort("");
				$tbl_doncaithiendiem->lop_tinchi->setSort("");
				$tbl_doncaithiendiem->hoc_ky->setSort("");
				$tbl_doncaithiendiem->nam_hoc1->setSort("");
				$tbl_doncaithiendiem->nam_hoc2->setSort("");
				$tbl_doncaithiendiem->diem->setSort("");
				$tbl_doncaithiendiem->monthi_lan2->setSort("");
				$tbl_doncaithiendiem->thoigian_h->setSort("");
				$tbl_doncaithiendiem->thoigian_phut->setSort("");
				$tbl_doncaithiendiem->ngay_thi->setSort("");
				$tbl_doncaithiendiem->ngay_tao_don->setSort("");
				$tbl_doncaithiendiem->email->setSort("");
				$tbl_doncaithiendiem->status_email->setSort("");
				$tbl_doncaithiendiem->status->setSort("");
				$tbl_doncaithiendiem->active->setSort("");
				$tbl_doncaithiendiem->nguoidung_id->setSort("");
				$tbl_doncaithiendiem->date_time_add->setSort("");
				$tbl_doncaithiendiem->date_time_edit->setSort("");
				$tbl_doncaithiendiem->file_name->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_doncaithiendiem;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_doncaithiendiem->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $tbl_doncaithiendiem;

		// Load search values
		// phieucaithiendiem_id

		$tbl_doncaithiendiem->phieucaithiendiem_id->AdvancedSearch->SearchValue = @$_GET["x_phieucaithiendiem_id"];
		$tbl_doncaithiendiem->phieucaithiendiem_id->AdvancedSearch->SearchOperator = @$_GET["z_phieucaithiendiem_id"];

		// loaidon_id
		$tbl_doncaithiendiem->loaidon_id->AdvancedSearch->SearchValue = @$_GET["x_loaidon_id"];
		$tbl_doncaithiendiem->loaidon_id->AdvancedSearch->SearchOperator = @$_GET["z_loaidon_id"];

		// nhomdon_id
		$tbl_doncaithiendiem->nhomdon_id->AdvancedSearch->SearchValue = @$_GET["x_nhomdon_id"];
		$tbl_doncaithiendiem->nhomdon_id->AdvancedSearch->SearchOperator = @$_GET["z_nhomdon_id"];

		// msv
		$tbl_doncaithiendiem->msv->AdvancedSearch->SearchValue = @$_GET["x_msv"];
		$tbl_doncaithiendiem->msv->AdvancedSearch->SearchOperator = @$_GET["z_msv"];

		// hoten_sinhvien
		$tbl_doncaithiendiem->hoten_sinhvien->AdvancedSearch->SearchValue = @$_GET["x_hoten_sinhvien"];
		$tbl_doncaithiendiem->hoten_sinhvien->AdvancedSearch->SearchOperator = @$_GET["z_hoten_sinhvien"];

		// ngay_sinh
		$tbl_doncaithiendiem->ngay_sinh->AdvancedSearch->SearchValue = @$_GET["x_ngay_sinh"];
		$tbl_doncaithiendiem->ngay_sinh->AdvancedSearch->SearchOperator = @$_GET["z_ngay_sinh"];

		// lop_sinhhoat
		$tbl_doncaithiendiem->lop_sinhhoat->AdvancedSearch->SearchValue = @$_GET["x_lop_sinhhoat"];
		$tbl_doncaithiendiem->lop_sinhhoat->AdvancedSearch->SearchOperator = @$_GET["z_lop_sinhhoat"];

		// so_dienthoai
		$tbl_doncaithiendiem->so_dienthoai->AdvancedSearch->SearchValue = @$_GET["x_so_dienthoai"];
		$tbl_doncaithiendiem->so_dienthoai->AdvancedSearch->SearchOperator = @$_GET["z_so_dienthoai"];

		// momthi_chinh
		$tbl_doncaithiendiem->momthi_chinh->AdvancedSearch->SearchValue = @$_GET["x_momthi_chinh"];
		$tbl_doncaithiendiem->momthi_chinh->AdvancedSearch->SearchOperator = @$_GET["z_momthi_chinh"];

		// lop_tinchi
		$tbl_doncaithiendiem->lop_tinchi->AdvancedSearch->SearchValue = @$_GET["x_lop_tinchi"];
		$tbl_doncaithiendiem->lop_tinchi->AdvancedSearch->SearchOperator = @$_GET["z_lop_tinchi"];

		// hoc_ky
		$tbl_doncaithiendiem->hoc_ky->AdvancedSearch->SearchValue = @$_GET["x_hoc_ky"];
		$tbl_doncaithiendiem->hoc_ky->AdvancedSearch->SearchOperator = @$_GET["z_hoc_ky"];

		// nam_hoc1
		$tbl_doncaithiendiem->nam_hoc1->AdvancedSearch->SearchValue = @$_GET["x_nam_hoc1"];
		$tbl_doncaithiendiem->nam_hoc1->AdvancedSearch->SearchOperator = @$_GET["z_nam_hoc1"];

		// nam_hoc2
		$tbl_doncaithiendiem->nam_hoc2->AdvancedSearch->SearchValue = @$_GET["x_nam_hoc2"];
		$tbl_doncaithiendiem->nam_hoc2->AdvancedSearch->SearchOperator = @$_GET["z_nam_hoc2"];

		// diem
		$tbl_doncaithiendiem->diem->AdvancedSearch->SearchValue = @$_GET["x_diem"];
		$tbl_doncaithiendiem->diem->AdvancedSearch->SearchOperator = @$_GET["z_diem"];

		// monthi_lan2
		$tbl_doncaithiendiem->monthi_lan2->AdvancedSearch->SearchValue = @$_GET["x_monthi_lan2"];
		$tbl_doncaithiendiem->monthi_lan2->AdvancedSearch->SearchOperator = @$_GET["z_monthi_lan2"];

		// thoigian_h
		$tbl_doncaithiendiem->thoigian_h->AdvancedSearch->SearchValue = @$_GET["x_thoigian_h"];
		$tbl_doncaithiendiem->thoigian_h->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_h"];

		// thoigian_phut
		$tbl_doncaithiendiem->thoigian_phut->AdvancedSearch->SearchValue = @$_GET["x_thoigian_phut"];
		$tbl_doncaithiendiem->thoigian_phut->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_phut"];

		// ngay_thi
		$tbl_doncaithiendiem->ngay_thi->AdvancedSearch->SearchValue = @$_GET["x_ngay_thi"];
		$tbl_doncaithiendiem->ngay_thi->AdvancedSearch->SearchOperator = @$_GET["z_ngay_thi"];

		// ngay_tao_don
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue = @$_GET["x_ngay_tao_don"];
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchOperator = @$_GET["z_ngay_tao_don"];
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchCondition = @$_GET["v_ngay_tao_don"];
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue2 = @$_GET["y_ngay_tao_don"];
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchOperator2 = @$_GET["w_ngay_tao_don"];

		// note
		$tbl_doncaithiendiem->note->AdvancedSearch->SearchValue = @$_GET["x_note"];
		$tbl_doncaithiendiem->note->AdvancedSearch->SearchOperator = @$_GET["z_note"];

		// status
		$tbl_doncaithiendiem->status->AdvancedSearch->SearchValue = @$_GET["x_status"];
		$tbl_doncaithiendiem->status->AdvancedSearch->SearchOperator = @$_GET["z_status"];

		// active
		$tbl_doncaithiendiem->active->AdvancedSearch->SearchValue = @$_GET["x_active"];
		$tbl_doncaithiendiem->active->AdvancedSearch->SearchOperator = @$_GET["z_active"];

		// nguoidung_id
		$tbl_doncaithiendiem->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$tbl_doncaithiendiem->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// date_time_add
		$tbl_doncaithiendiem->date_time_add->AdvancedSearch->SearchValue = @$_GET["x_date_time_add"];
		$tbl_doncaithiendiem->date_time_add->AdvancedSearch->SearchOperator = @$_GET["z_date_time_add"];

		// date_time_edit
		$tbl_doncaithiendiem->date_time_edit->AdvancedSearch->SearchValue = @$_GET["x_date_time_edit"];
		$tbl_doncaithiendiem->date_time_edit->AdvancedSearch->SearchOperator = @$_GET["z_date_time_edit"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_doncaithiendiem;

		// Call Recordset Selecting event
		$tbl_doncaithiendiem->Recordset_Selecting($tbl_doncaithiendiem->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_doncaithiendiem->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_doncaithiendiem->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_doncaithiendiem;
		$sFilter = $tbl_doncaithiendiem->KeyFilter();

		// Call Row Selecting event
		$tbl_doncaithiendiem->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_doncaithiendiem->CurrentFilter = $sFilter;
		$sSql = $tbl_doncaithiendiem->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_doncaithiendiem->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->setDbValue($rs->fields('phieucaithiendiem_id'));
		$tbl_doncaithiendiem->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$tbl_doncaithiendiem->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$tbl_doncaithiendiem->msv->setDbValue($rs->fields('msv'));
		$tbl_doncaithiendiem->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$tbl_doncaithiendiem->ngay_sinh->setDbValue($rs->fields('ngay_sinh'));
		$tbl_doncaithiendiem->lop_sinhhoat->setDbValue($rs->fields('lop_sinhhoat'));
		$tbl_doncaithiendiem->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$tbl_doncaithiendiem->momthi_chinh->setDbValue($rs->fields('momthi_chinh'));
		$tbl_doncaithiendiem->ma_mon->setDbValue($rs->fields('ma_mon'));
		$tbl_doncaithiendiem->lop_tinchi->setDbValue($rs->fields('lop_tinchi'));
		$tbl_doncaithiendiem->hoc_ky->setDbValue($rs->fields('hoc_ky'));
		$tbl_doncaithiendiem->nam_hoc1->setDbValue($rs->fields('nam_hoc1'));
		$tbl_doncaithiendiem->nam_hoc2->setDbValue($rs->fields('nam_hoc2'));
		$tbl_doncaithiendiem->diem->setDbValue($rs->fields('diem'));
		$tbl_doncaithiendiem->monthi_lan2->setDbValue($rs->fields('monthi_lan2'));
		$tbl_doncaithiendiem->thoigian_h->setDbValue($rs->fields('thoigian_h'));
		$tbl_doncaithiendiem->thoigian_phut->setDbValue($rs->fields('thoigian_phut'));
		$tbl_doncaithiendiem->ngay_thi->setDbValue($rs->fields('ngay_thi'));
		$tbl_doncaithiendiem->ngay_tao_don->setDbValue($rs->fields('ngay_tao_don'));
		$tbl_doncaithiendiem->email->setDbValue($rs->fields('email'));
		$tbl_doncaithiendiem->note->setDbValue($rs->fields('note'));
		$tbl_doncaithiendiem->status_email->setDbValue($rs->fields('status_email'));
		$tbl_doncaithiendiem->status->setDbValue($rs->fields('status'));
		$tbl_doncaithiendiem->active->setDbValue($rs->fields('active'));
		$tbl_doncaithiendiem->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_doncaithiendiem->date_time_add->setDbValue($rs->fields('date_time_add'));
		$tbl_doncaithiendiem->date_time_edit->setDbValue($rs->fields('date_time_edit'));
		$tbl_doncaithiendiem->file_name->setDbValue($rs->fields('file_name'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_doncaithiendiem;

		// Call Row_Rendering event
		$tbl_doncaithiendiem->Row_Rendering();

		// Common render codes for all row types
		// phieucaithiendiem_id

		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssStyle = "";
		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssClass = "";

		// loaidon_id
		$tbl_doncaithiendiem->loaidon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->loaidon_id->CellCssClass = "";

		// nhomdon_id
		$tbl_doncaithiendiem->nhomdon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nhomdon_id->CellCssClass = "";

		// msv
		$tbl_doncaithiendiem->msv->CellCssStyle = "";
		$tbl_doncaithiendiem->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssStyle = "";
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssClass = "";

		// ngay_sinh
		$tbl_doncaithiendiem->ngay_sinh->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_sinh->CellCssClass = "";

		// lop_sinhhoat
		$tbl_doncaithiendiem->lop_sinhhoat->CellCssStyle = "";
		$tbl_doncaithiendiem->lop_sinhhoat->CellCssClass = "";

		// so_dienthoai
		$tbl_doncaithiendiem->so_dienthoai->CellCssStyle = "";
		$tbl_doncaithiendiem->so_dienthoai->CellCssClass = "";

		// ma_mon
		$tbl_doncaithiendiem->ma_mon->CellCssStyle = "";
		$tbl_doncaithiendiem->ma_mon->CellCssClass = "";

		// lop_tinchi
		$tbl_doncaithiendiem->lop_tinchi->CellCssStyle = "";
		$tbl_doncaithiendiem->lop_tinchi->CellCssClass = "";

		// hoc_ky
		$tbl_doncaithiendiem->hoc_ky->CellCssStyle = "";
		$tbl_doncaithiendiem->hoc_ky->CellCssClass = "";

		// nam_hoc1
		$tbl_doncaithiendiem->nam_hoc1->CellCssStyle = "";
		$tbl_doncaithiendiem->nam_hoc1->CellCssClass = "";

		// nam_hoc2
		$tbl_doncaithiendiem->nam_hoc2->CellCssStyle = "";
		$tbl_doncaithiendiem->nam_hoc2->CellCssClass = "";

		// diem
		$tbl_doncaithiendiem->diem->CellCssStyle = "";
		$tbl_doncaithiendiem->diem->CellCssClass = "";

		// monthi_lan2
		$tbl_doncaithiendiem->monthi_lan2->CellCssStyle = "";
		$tbl_doncaithiendiem->monthi_lan2->CellCssClass = "";

		// thoigian_h
		$tbl_doncaithiendiem->thoigian_h->CellCssStyle = "";
		$tbl_doncaithiendiem->thoigian_h->CellCssClass = "";

		// thoigian_phut
		$tbl_doncaithiendiem->thoigian_phut->CellCssStyle = "";
		$tbl_doncaithiendiem->thoigian_phut->CellCssClass = "";

		// ngay_thi
		$tbl_doncaithiendiem->ngay_thi->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_thi->CellCssClass = "";

		// ngay_tao_don
		$tbl_doncaithiendiem->ngay_tao_don->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_tao_don->CellCssClass = "";

		// email
		$tbl_doncaithiendiem->email->CellCssStyle = "";
		$tbl_doncaithiendiem->email->CellCssClass = "";

		// status_email
		$tbl_doncaithiendiem->status_email->CellCssStyle = "";
		$tbl_doncaithiendiem->status_email->CellCssClass = "";

		// status
		$tbl_doncaithiendiem->status->CellCssStyle = "";
		$tbl_doncaithiendiem->status->CellCssClass = "";

		// active
		$tbl_doncaithiendiem->active->CellCssStyle = "";
		$tbl_doncaithiendiem->active->CellCssClass = "";

		// nguoidung_id
		$tbl_doncaithiendiem->nguoidung_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nguoidung_id->CellCssClass = "";

		// date_time_add
		$tbl_doncaithiendiem->date_time_add->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_add->CellCssClass = "";

		// date_time_edit
		$tbl_doncaithiendiem->date_time_edit->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_edit->CellCssClass = "";

		// file_name
		$tbl_doncaithiendiem->file_name->CellCssStyle = "";
		$tbl_doncaithiendiem->file_name->CellCssClass = "";
		if ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_VIEW) { // View row

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewValue = $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue;
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssStyle = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssClass = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewCustomAttributes = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->ViewValue = $tbl_doncaithiendiem->loaidon_id->CurrentValue;
			$tbl_doncaithiendiem->loaidon_id->CssStyle = "";
			$tbl_doncaithiendiem->loaidon_id->CssClass = "";
			$tbl_doncaithiendiem->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->ViewValue = $tbl_doncaithiendiem->nhomdon_id->CurrentValue;
			$tbl_doncaithiendiem->nhomdon_id->CssStyle = "";
			$tbl_doncaithiendiem->nhomdon_id->CssClass = "";
			$tbl_doncaithiendiem->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_doncaithiendiem->msv->ViewValue = $tbl_doncaithiendiem->msv->CurrentValue;
			$tbl_doncaithiendiem->msv->CssStyle = "";
			$tbl_doncaithiendiem->msv->CssClass = "";
			$tbl_doncaithiendiem->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue;
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = strtoupper($tbl_doncaithiendiem->hoten_sinhvien->ViewValue);
			$tbl_doncaithiendiem->hoten_sinhvien->CssStyle = "";
			$tbl_doncaithiendiem->hoten_sinhvien->CssClass = "";
			$tbl_doncaithiendiem->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = $tbl_doncaithiendiem->ngay_sinh->CurrentValue;
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_sinh->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_sinh->CssStyle = "";
			$tbl_doncaithiendiem->ngay_sinh->CssClass = "";
			$tbl_doncaithiendiem->ngay_sinh->ViewCustomAttributes = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->ViewValue = $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue;
			$tbl_doncaithiendiem->lop_sinhhoat->CssStyle = "";
			$tbl_doncaithiendiem->lop_sinhhoat->CssClass = "";
			$tbl_doncaithiendiem->lop_sinhhoat->ViewCustomAttributes = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->ViewValue = $tbl_doncaithiendiem->so_dienthoai->CurrentValue;
			$tbl_doncaithiendiem->so_dienthoai->CssStyle = "";
			$tbl_doncaithiendiem->so_dienthoai->CssClass = "";
			$tbl_doncaithiendiem->so_dienthoai->ViewCustomAttributes = "";

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->ViewValue = $tbl_doncaithiendiem->ma_mon->CurrentValue;
			$tbl_doncaithiendiem->ma_mon->CssStyle = "";
			$tbl_doncaithiendiem->ma_mon->CssClass = "";
			$tbl_doncaithiendiem->ma_mon->ViewCustomAttributes = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->ViewValue = $tbl_doncaithiendiem->lop_tinchi->CurrentValue;
			$tbl_doncaithiendiem->lop_tinchi->CssStyle = "";
			$tbl_doncaithiendiem->lop_tinchi->CssClass = "";
			$tbl_doncaithiendiem->lop_tinchi->ViewCustomAttributes = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->ViewValue = $tbl_doncaithiendiem->hoc_ky->CurrentValue;
			$tbl_doncaithiendiem->hoc_ky->CssStyle = "";
			$tbl_doncaithiendiem->hoc_ky->CssClass = "";
			$tbl_doncaithiendiem->hoc_ky->ViewCustomAttributes = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->ViewValue = $tbl_doncaithiendiem->nam_hoc1->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc1->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc1->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc1->ViewCustomAttributes = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->ViewValue = $tbl_doncaithiendiem->nam_hoc2->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc2->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc2->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc2->ViewCustomAttributes = "";

			// diem
			$tbl_doncaithiendiem->diem->ViewValue = $tbl_doncaithiendiem->diem->CurrentValue;
			$tbl_doncaithiendiem->diem->CssStyle = "";
			$tbl_doncaithiendiem->diem->CssClass = "";
			$tbl_doncaithiendiem->diem->ViewCustomAttributes = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->ViewValue = $tbl_doncaithiendiem->monthi_lan2->CurrentValue;
			$tbl_doncaithiendiem->monthi_lan2->CssStyle = "";
			$tbl_doncaithiendiem->monthi_lan2->CssClass = "";
			$tbl_doncaithiendiem->monthi_lan2->ViewCustomAttributes = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->ViewValue = $tbl_doncaithiendiem->thoigian_h->CurrentValue;
			$tbl_doncaithiendiem->thoigian_h->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_h->CssClass = "";
			$tbl_doncaithiendiem->thoigian_h->ViewCustomAttributes = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->ViewValue = $tbl_doncaithiendiem->thoigian_phut->CurrentValue;
			$tbl_doncaithiendiem->thoigian_phut->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_phut->CssClass = "";
			$tbl_doncaithiendiem->thoigian_phut->ViewCustomAttributes = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->ViewValue = $tbl_doncaithiendiem->ngay_thi->CurrentValue;
			$tbl_doncaithiendiem->ngay_thi->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_thi->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_thi->CssStyle = "";
			$tbl_doncaithiendiem->ngay_thi->CssClass = "";
			$tbl_doncaithiendiem->ngay_thi->ViewCustomAttributes = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = $tbl_doncaithiendiem->ngay_tao_don->CurrentValue;
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_tao_don->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_tao_don->CssStyle = "";
			$tbl_doncaithiendiem->ngay_tao_don->CssClass = "";
			$tbl_doncaithiendiem->ngay_tao_don->ViewCustomAttributes = "";

			// email
			$tbl_doncaithiendiem->email->ViewValue = $tbl_doncaithiendiem->email->CurrentValue;
			$tbl_doncaithiendiem->email->CssStyle = "";
			$tbl_doncaithiendiem->email->CssClass = "";
			$tbl_doncaithiendiem->email->ViewCustomAttributes = "";

			// status_email
			$tbl_doncaithiendiem->status_email->ViewValue = $tbl_doncaithiendiem->status_email->CurrentValue;
			$tbl_doncaithiendiem->status_email->CssStyle = "";
			$tbl_doncaithiendiem->status_email->CssClass = "";
			$tbl_doncaithiendiem->status_email->ViewCustomAttributes = "";

			// status
			if (strval($tbl_doncaithiendiem->status->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->status->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->status->ViewValue = "<span style=\"Color:red\">Không xét duyệt </span>";
						break;
					case "1":
						$tbl_doncaithiendiem->status->ViewValue = "<div style=\"position:relative;\">Chờ xét <img style=\"position:absolute;right:0;top:0;width:30px\" src=\"images/new.gif\"> </div>";
						break;
					case "2":
						$tbl_doncaithiendiem->status->ViewValue = "<span style=\"Color:navy\"> Đang xử lý </span>";
						break;
					case "3":
						$tbl_doncaithiendiem->status->ViewValue = "<b>Kết thúc</b>";
						break;
					default:
						$tbl_doncaithiendiem->status->ViewValue = $tbl_doncaithiendiem->status->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->status->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->status->CssStyle = "";
			$tbl_doncaithiendiem->status->CssClass = "";
			$tbl_doncaithiendiem->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_doncaithiendiem->active->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->active->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->active->ViewValue = "khong kich hoat";
						break;
					case "1":
						$tbl_doncaithiendiem->active->ViewValue = "kich hoat";
						break;
					default:
						$tbl_doncaithiendiem->active->ViewValue = $tbl_doncaithiendiem->active->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->active->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->active->CssStyle = "";
			$tbl_doncaithiendiem->active->CssClass = "";
			$tbl_doncaithiendiem->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->ViewValue = $tbl_doncaithiendiem->nguoidung_id->CurrentValue;
			$tbl_doncaithiendiem->nguoidung_id->CssStyle = "";
			$tbl_doncaithiendiem->nguoidung_id->CssClass = "";
			$tbl_doncaithiendiem->nguoidung_id->ViewCustomAttributes = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->ViewValue = $tbl_doncaithiendiem->date_time_add->CurrentValue;
			$tbl_doncaithiendiem->date_time_add->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_add->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_add->CssStyle = "";
			$tbl_doncaithiendiem->date_time_add->CssClass = "";
			$tbl_doncaithiendiem->date_time_add->ViewCustomAttributes = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->ViewValue = $tbl_doncaithiendiem->date_time_edit->CurrentValue;
			$tbl_doncaithiendiem->date_time_edit->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_edit->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_edit->CssStyle = "";
			$tbl_doncaithiendiem->date_time_edit->CssClass = "";
			$tbl_doncaithiendiem->date_time_edit->ViewCustomAttributes = "";

			// file_name
			$tbl_doncaithiendiem->file_name->ViewValue = $tbl_doncaithiendiem->file_name->CurrentValue;
			$tbl_doncaithiendiem->file_name->CssStyle = "";
			$tbl_doncaithiendiem->file_name->CssClass = "";
			$tbl_doncaithiendiem->file_name->ViewCustomAttributes = "";

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->HrefValue = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->HrefValue = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->HrefValue = "";

			// msv
			$tbl_doncaithiendiem->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->HrefValue = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->HrefValue = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->HrefValue = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->HrefValue = "";

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->HrefValue = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->HrefValue = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->HrefValue = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->HrefValue = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->HrefValue = "";

			// diem
			$tbl_doncaithiendiem->diem->HrefValue = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->HrefValue = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->HrefValue = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->HrefValue = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->HrefValue = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->HrefValue = "";

			// email
			$tbl_doncaithiendiem->email->HrefValue = "";

			// status_email
			$tbl_doncaithiendiem->status_email->HrefValue = "";

			// status
			$tbl_doncaithiendiem->status->HrefValue = "";

			// active
			$tbl_doncaithiendiem->active->HrefValue = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->HrefValue = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
		} elseif ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->EditCustomAttributes = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->AdvancedSearch->SearchValue);

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->EditCustomAttributes = "";
			$tbl_doncaithiendiem->loaidon_id->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->loaidon_id->AdvancedSearch->SearchValue);

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->EditCustomAttributes = "";
			$tbl_doncaithiendiem->nhomdon_id->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->nhomdon_id->AdvancedSearch->SearchValue);

			// msv
			$tbl_doncaithiendiem->msv->EditCustomAttributes = "";
			$tbl_doncaithiendiem->msv->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->msv->AdvancedSearch->SearchValue);

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->EditCustomAttributes = "";
			$tbl_doncaithiendiem->hoten_sinhvien->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->hoten_sinhvien->AdvancedSearch->SearchValue);

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_sinh->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_sinh->AdvancedSearch->SearchValue, 7), 7));

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->EditCustomAttributes = "";
			$tbl_doncaithiendiem->lop_sinhhoat->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->lop_sinhhoat->AdvancedSearch->SearchValue);

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->EditCustomAttributes = "";
			$tbl_doncaithiendiem->so_dienthoai->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->so_dienthoai->AdvancedSearch->SearchValue);

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->EditCustomAttributes = "";
			$tbl_doncaithiendiem->lop_tinchi->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->lop_tinchi->AdvancedSearch->SearchValue);

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->EditCustomAttributes = "";
			$tbl_doncaithiendiem->hoc_ky->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->hoc_ky->AdvancedSearch->SearchValue);

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "2010-2011");
			$arwrk[] = array("1", "2011-2012");
			$arwrk[] = array("2", "2012-2013");
			$arwrk[] = array("3", "2013-2014");
			$arwrk[] = array("4", "2014-2015");
			$arwrk[] = array("5", "2015-2016");
			$arwrk[] = array("6", "2017-2018");
			$arwrk[] = array("7", "2018-2019");
			$arwrk[] = array("8", "2019-2020");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_doncaithiendiem->nam_hoc1->EditValue = $arwrk;

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->EditCustomAttributes = "";
			$tbl_doncaithiendiem->nam_hoc2->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->nam_hoc2->AdvancedSearch->SearchValue);

			// diem
			$tbl_doncaithiendiem->diem->EditCustomAttributes = "";
			$tbl_doncaithiendiem->diem->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->diem->AdvancedSearch->SearchValue);

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->EditCustomAttributes = "";
			$tbl_doncaithiendiem->monthi_lan2->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->monthi_lan2->AdvancedSearch->SearchValue);

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->EditCustomAttributes = "";
			$tbl_doncaithiendiem->thoigian_h->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->thoigian_h->AdvancedSearch->SearchValue);

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->EditCustomAttributes = "";
			$tbl_doncaithiendiem->thoigian_phut->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->thoigian_phut->AdvancedSearch->SearchValue);

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_thi->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_thi->AdvancedSearch->SearchValue, 7), 7));

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_tao_don->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue, 7), 7));
			$tbl_doncaithiendiem->ngay_tao_don->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_tao_don->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue2, 7), 7));

			// email
			$tbl_doncaithiendiem->email->EditCustomAttributes = "";
			$tbl_doncaithiendiem->email->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->email->AdvancedSearch->SearchValue);

			// status_email
			$tbl_doncaithiendiem->status_email->EditCustomAttributes = "";
			$tbl_doncaithiendiem->status_email->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->status_email->AdvancedSearch->SearchValue);

			// status
			$tbl_doncaithiendiem->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong xet duyet");
			$arwrk[] = array("1", "cho xet duyet");
			$arwrk[] = array("2", "dang xu ly");
			$arwrk[] = array("3", "ket thuc");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_doncaithiendiem->status->EditValue = $arwrk;

			// active
			$tbl_doncaithiendiem->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong kich hoat");
			$arwrk[] = array("1", "kich hoat");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_doncaithiendiem->active->EditValue = $arwrk;

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->EditCustomAttributes = "";
			$tbl_doncaithiendiem->nguoidung_id->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->nguoidung_id->AdvancedSearch->SearchValue);

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->EditCustomAttributes = "";
			$tbl_doncaithiendiem->date_time_add->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_doncaithiendiem->date_time_add->AdvancedSearch->SearchValue, 7), 7));

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->EditCustomAttributes = "";
			$tbl_doncaithiendiem->date_time_edit->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_doncaithiendiem->date_time_edit->AdvancedSearch->SearchValue, 7), 7));

			// file_name
			$tbl_doncaithiendiem->file_name->EditCustomAttributes = "";
			$tbl_doncaithiendiem->file_name->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->file_name->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$tbl_doncaithiendiem->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $tbl_doncaithiendiem;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckInteger($tbl_doncaithiendiem->msv->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect integer - Msv";
		}
		if (!ew_CheckEuroDate($tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Tao Don";
		}
		if (!ew_CheckEuroDate($tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Tao Don";
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
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_phieucaithiendiem_id");
		$tbl_doncaithiendiem->loaidon_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_loaidon_id");
		$tbl_doncaithiendiem->nhomdon_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nhomdon_id");
		$tbl_doncaithiendiem->msv->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_msv");
		$tbl_doncaithiendiem->hoten_sinhvien->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_hoten_sinhvien");
		$tbl_doncaithiendiem->ngay_sinh->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ngay_sinh");
		$tbl_doncaithiendiem->lop_sinhhoat->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_lop_sinhhoat");
		$tbl_doncaithiendiem->so_dienthoai->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_so_dienthoai");
		$tbl_doncaithiendiem->momthi_chinh->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_momthi_chinh");
		$tbl_doncaithiendiem->ma_mon->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ma_mon");
		$tbl_doncaithiendiem->lop_tinchi->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_lop_tinchi");
		$tbl_doncaithiendiem->hoc_ky->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_hoc_ky");
		$tbl_doncaithiendiem->nam_hoc1->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nam_hoc1");
		$tbl_doncaithiendiem->nam_hoc2->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nam_hoc2");
		$tbl_doncaithiendiem->diem->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_diem");
		$tbl_doncaithiendiem->monthi_lan2->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_monthi_lan2");
		$tbl_doncaithiendiem->thoigian_h->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_thoigian_h");
		$tbl_doncaithiendiem->thoigian_phut->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_thoigian_phut");
		$tbl_doncaithiendiem->ngay_thi->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ngay_thi");
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_ngay_tao_don");
		$tbl_doncaithiendiem->ngay_tao_don->AdvancedSearch->SearchValue2 = $tbl_doncaithiendiem->getAdvancedSearch("y_ngay_tao_don");
		$tbl_doncaithiendiem->email->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_email");
		$tbl_doncaithiendiem->note->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_note");
		$tbl_doncaithiendiem->status_email->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_status_email");
		$tbl_doncaithiendiem->status->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_status");
		$tbl_doncaithiendiem->active->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_active");
		$tbl_doncaithiendiem->nguoidung_id->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_nguoidung_id");
		$tbl_doncaithiendiem->date_time_add->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_date_time_add");
		$tbl_doncaithiendiem->date_time_edit->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_date_time_edit");
		$tbl_doncaithiendiem->file_name->AdvancedSearch->SearchValue = $tbl_doncaithiendiem->getAdvancedSearch("x_file_name");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $tbl_doncaithiendiem;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($tbl_doncaithiendiem->ExportAll) {
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
		if ($tbl_doncaithiendiem->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($tbl_doncaithiendiem->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $tbl_doncaithiendiem->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'phieucaithiendiem_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'loaidon_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nhomdon_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'msv', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'Họ tên sinh viên', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ngay_sinh', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'lop_sinhhoat', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'so_dienthoai', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ma_mon', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'lop_tinchi', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'hoc_ky', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nam_hoc1', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nam_hoc2', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'diem', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'monthi_lan2', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_h', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_phut', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ngay_thi', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ngay_tao_don', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'email', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'status_email', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'status', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'active', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nguoidung_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'date_time_add', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'date_time_edit', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'file_name', $tbl_doncaithiendiem->Export);
				echo ew_ExportLine($sExportStr, $tbl_doncaithiendiem->Export);
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
				$tbl_doncaithiendiem->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($tbl_doncaithiendiem->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('phieucaithiendiem_id', $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue);
					$XmlDoc->AddField('loaidon_id', $tbl_doncaithiendiem->loaidon_id->CurrentValue);
					$XmlDoc->AddField('nhomdon_id', $tbl_doncaithiendiem->nhomdon_id->CurrentValue);
					$XmlDoc->AddField('msv', $tbl_doncaithiendiem->msv->CurrentValue);
					$XmlDoc->AddField('hoten_sinhvien', $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue);
					$XmlDoc->AddField('ngay_sinh', $tbl_doncaithiendiem->ngay_sinh->CurrentValue);
					$XmlDoc->AddField('lop_sinhhoat', $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue);
					$XmlDoc->AddField('so_dienthoai', $tbl_doncaithiendiem->so_dienthoai->CurrentValue);
					$XmlDoc->AddField('ma_mon', $tbl_doncaithiendiem->ma_mon->CurrentValue);
					$XmlDoc->AddField('lop_tinchi', $tbl_doncaithiendiem->lop_tinchi->CurrentValue);
					$XmlDoc->AddField('hoc_ky', $tbl_doncaithiendiem->hoc_ky->CurrentValue);
					$XmlDoc->AddField('nam_hoc1', $tbl_doncaithiendiem->nam_hoc1->CurrentValue);
					$XmlDoc->AddField('nam_hoc2', $tbl_doncaithiendiem->nam_hoc2->CurrentValue);
					$XmlDoc->AddField('diem', $tbl_doncaithiendiem->diem->CurrentValue);
					$XmlDoc->AddField('monthi_lan2', $tbl_doncaithiendiem->monthi_lan2->CurrentValue);
					$XmlDoc->AddField('thoigian_h', $tbl_doncaithiendiem->thoigian_h->CurrentValue);
					$XmlDoc->AddField('thoigian_phut', $tbl_doncaithiendiem->thoigian_phut->CurrentValue);
					$XmlDoc->AddField('ngay_thi', $tbl_doncaithiendiem->ngay_thi->CurrentValue);
					$XmlDoc->AddField('ngay_tao_don', $tbl_doncaithiendiem->ngay_tao_don->CurrentValue);
					$XmlDoc->AddField('email', $tbl_doncaithiendiem->email->CurrentValue);
					$XmlDoc->AddField('status_email', $tbl_doncaithiendiem->status_email->CurrentValue);
					$XmlDoc->AddField('status', $tbl_doncaithiendiem->status->CurrentValue);
					$XmlDoc->AddField('active', $tbl_doncaithiendiem->active->CurrentValue);
					$XmlDoc->AddField('nguoidung_id', $tbl_doncaithiendiem->nguoidung_id->CurrentValue);
					$XmlDoc->AddField('date_time_add', $tbl_doncaithiendiem->date_time_add->CurrentValue);
					$XmlDoc->AddField('date_time_edit', $tbl_doncaithiendiem->date_time_edit->CurrentValue);
					$XmlDoc->AddField('file_name', $tbl_doncaithiendiem->file_name->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $tbl_doncaithiendiem->Export <> "csv") { // Vertical format
						echo ew_ExportField('phieucaithiendiem_id', $tbl_doncaithiendiem->phieucaithiendiem_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('loaidon_id', $tbl_doncaithiendiem->loaidon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nhomdon_id', $tbl_doncaithiendiem->nhomdon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('msv', $tbl_doncaithiendiem->msv->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('hoten_sinhvien', $tbl_doncaithiendiem->hoten_sinhvien->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ngay_sinh', $tbl_doncaithiendiem->ngay_sinh->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('lop_sinhhoat', $tbl_doncaithiendiem->lop_sinhhoat->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('so_dienthoai', $tbl_doncaithiendiem->so_dienthoai->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ma_mon', $tbl_doncaithiendiem->ma_mon->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('lop_tinchi', $tbl_doncaithiendiem->lop_tinchi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('hoc_ky', $tbl_doncaithiendiem->hoc_ky->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nam_hoc1', $tbl_doncaithiendiem->nam_hoc1->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nam_hoc2', $tbl_doncaithiendiem->nam_hoc2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('diem', $tbl_doncaithiendiem->diem->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('monthi_lan2', $tbl_doncaithiendiem->monthi_lan2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('thoigian_h', $tbl_doncaithiendiem->thoigian_h->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('thoigian_phut', $tbl_doncaithiendiem->thoigian_phut->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ngay_thi', $tbl_doncaithiendiem->ngay_thi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ngay_tao_don', $tbl_doncaithiendiem->ngay_tao_don->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('email', $tbl_doncaithiendiem->email->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('status_email', $tbl_doncaithiendiem->status_email->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('status', $tbl_doncaithiendiem->status->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('active', $tbl_doncaithiendiem->active->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nguoidung_id', $tbl_doncaithiendiem->nguoidung_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('date_time_add', $tbl_doncaithiendiem->date_time_add->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('date_time_edit', $tbl_doncaithiendiem->date_time_edit->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('file_name', $tbl_doncaithiendiem->file_name->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->phieucaithiendiem_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->loaidon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nhomdon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->msv->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->hoten_sinhvien->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ngay_sinh->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->lop_sinhhoat->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->so_dienthoai->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ma_mon->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->lop_tinchi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->hoc_ky->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nam_hoc1->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nam_hoc2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->diem->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->monthi_lan2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->thoigian_h->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->thoigian_phut->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ngay_thi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ngay_tao_don->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->email->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->status_email->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->status->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->active->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nguoidung_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->date_time_add->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->date_time_edit->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->file_name->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportLine($sExportStr, $tbl_doncaithiendiem->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($tbl_doncaithiendiem->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($tbl_doncaithiendiem->Export);
		}
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $tbl_doncaithiendiem;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($tbl_doncaithiendiem->nguoidung_id->CurrentValue);
			}
		}
		return TRUE;
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
