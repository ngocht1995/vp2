<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_phanhoiinfo.php" ?>
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
$t_phanhoi_list = new ct_phanhoi_list();
$Page =& $t_phanhoi_list;

// Page init processing
$t_phanhoi_list->Page_Init();

// Page main processing
$t_phanhoi_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_phanhoi->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_phanhoi_list = new ew_Page("t_phanhoi_list");

// page properties
t_phanhoi_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_phanhoi_list.PageID; // for backward compatibility

// extend page with validate function for search
t_phanhoi_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_c_read_time"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Thời gian xem");

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
t_phanhoi_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_phanhoi_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_phanhoi_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_phanhoi_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_phanhoi->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_phanhoi->Export == "" && $t_phanhoi->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_phanhoi_list->LoadRecordset();
	$t_phanhoi_list->lTotalRecs = ($bSelectLimit) ? $t_phanhoi->SelectRecordCount() : $rs->RecordCount();
	$t_phanhoi_list->lStartRec = 1;
	if ($t_phanhoi_list->lDisplayRecs <= 0) // Display all records
		$t_phanhoi_list->lDisplayRecs = $t_phanhoi_list->lTotalRecs;
	if (!($t_phanhoi->ExportAll && $t_phanhoi->Export <> ""))
		$t_phanhoi_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_phanhoi_list->LoadRecordset($t_phanhoi_list->lStartRec-1, $t_phanhoi_list->lDisplayRecs);
?>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_phanhoi->Export == "" && $t_phanhoi->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_phanhoi_list);" style="text-decoration: none;"><img id="t_phanhoi_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_phanhoi_list_SearchPanel">
<form name="ft_phanhoilistsrch" id="ft_phanhoilistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_phanhoi_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_phanhoi">
<?php
if ($gsSearchError == "")
	$t_phanhoi_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_phanhoi->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_phanhoi_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Thời gian xem</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_c_read_time" id="z_c_read_time" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_read_time" id="x_c_read_time" value="<?php echo $t_phanhoi->c_read_time->EditValue ?>"<?php echo $t_phanhoi->c_read_time->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_c_read_time" name="cal_x_c_read_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_c_read_time", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_c_read_time" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_c_read_time" name="btw1_c_read_time">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_c_read_time" name="btw1_c_read_time">
<input type="text" name="y_c_read_time" id="y_c_read_time" value="<?php echo $t_phanhoi->c_read_time->EditValue2 ?>"<?php echo $t_phanhoi->c_read_time->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_c_read_time" name="cal_y_c_read_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_c_read_time", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_c_read_time" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Thời gian thêm mới</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_c_add_time" id="z_c_add_time" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_add_time" id="x_c_add_time" value="<?php echo $t_phanhoi->c_add_time->EditValue ?>"<?php echo $t_phanhoi->c_add_time->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_c_add_time" name="cal_x_c_add_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_c_add_time", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_c_add_time" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_c_add_time" name="btw1_c_add_time">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_c_add_time" name="btw1_c_add_time">
<input type="text" name="y_c_add_time" id="y_c_add_time" value="<?php echo $t_phanhoi->c_add_time->EditValue2 ?>"<?php echo $t_phanhoi->c_add_time->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_c_add_time" name="cal_y_c_add_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_c_add_time", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_c_add_time" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Trạng thái</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_c_status" id="z_c_status" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_c_status" name="x_c_status"<?php echo $t_phanhoi->c_status->EditAttributes() ?>>
<?php
if (is_array($t_phanhoi->c_status->EditValue)) {
	$arwrk = $t_phanhoi->c_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_phanhoi->c_status->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_phanhoi->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_phanhoi_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_phanhoi->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_phanhoi->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_phanhoi->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $t_phanhoi_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_phanhoi->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_phanhoi->CurrentAction <> "gridadd" && $t_phanhoi->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_phanhoi_list->Pager)) $t_phanhoi_list->Pager = new cNumericPager($t_phanhoi_list->lStartRec, $t_phanhoi_list->lDisplayRecs, $t_phanhoi_list->lTotalRecs, $t_phanhoi_list->lRecRange) ?>
<?php if ($t_phanhoi_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_phanhoi_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_phanhoi_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_phanhoi_list->Pager->FromIndex ?> đến <?php echo $t_phanhoi_list->Pager->ToIndex ?> của <?php echo $t_phanhoi_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_phanhoi_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_phanhoi_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>số hiển thị&nbsp</td><td>
<input type="hidden" id="t" name="t" value="t_phanhoi">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_phanhoi_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_phanhoi_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_phanhoi_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_phanhoi->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($t_phanhoi_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_phanhoilist)) alert('Chưa chọn bản ghi'); else {document.ft_phanhoilist.action='t_phanhoidelete.php';document.ft_phanhoilist.encoding='application/x-www-form-urlencoded';document.ft_phanhoilist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_phanhoilist" id="ft_phanhoilist" class="ewForm" action="" method="post">
<?php if ($t_phanhoi_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_phanhoi_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$t_phanhoi_list->lOptionCnt++; // view
}
if ($Security->CanDelete()) {
	$t_phanhoi_list->lOptionCnt++; // Multi-select
}
	$t_phanhoi_list->lOptionCnt += count($t_phanhoi_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_phanhoi->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_phanhoi->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_phanhoi_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_phanhoi_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_phanhoi->c_hoten->Visible) { // c_hoten ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_hoten) == "") { ?>
		<td>Họ và tên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_hoten) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Họ và tên&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_phanhoi->c_hoten->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_hoten->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_phanhoi->c_email->Visible) { // c_email ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_email) == "") { ?>
		<td>Địa chỉ email</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_email) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Địa chỉ email&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_phanhoi->c_email->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_email->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_phanhoi->c_tieude->Visible) { // c_tieude ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_tieude) == "") { ?>
		<td>Tiêu đề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_tieude) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_phanhoi->c_tieude->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_tieude->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_phanhoi->c_tel->Visible) { // c_tel ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_tel) == "") { ?>
		<td>Số điện thoại</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_tel) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số điện thoại&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_phanhoi->c_tel->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_tel->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_phanhoi->c_read_time->Visible) { // c_read_time ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_read_time) == "") { ?>
		<td>Thời gian xem</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_read_time) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian xem</td><td style="width: 10px;"><?php if ($t_phanhoi->c_read_time->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_read_time->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_phanhoi->c_add_time->Visible) { // c_add_time ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_add_time) == "") { ?>
		<td>Thời gian thêm mới</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_add_time) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian thêm mới</td><td style="width: 10px;"><?php if ($t_phanhoi->c_add_time->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_add_time->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_phanhoi->c_status->Visible) { // c_status ?>
	<?php if ($t_phanhoi->SortUrl($t_phanhoi->c_status) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_phanhoi->SortUrl($t_phanhoi->c_status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($t_phanhoi->c_status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_phanhoi->c_status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_phanhoi->ExportAll && $t_phanhoi->Export <> "") {
	$t_phanhoi_list->lStopRec = $t_phanhoi_list->lTotalRecs;
} else {
	$t_phanhoi_list->lStopRec = $t_phanhoi_list->lStartRec + $t_phanhoi_list->lDisplayRecs - 1; // Set the last record to display
}
$t_phanhoi_list->lRecCount = $t_phanhoi_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_phanhoi->SelectLimit && $t_phanhoi_list->lStartRec > 1)
		$rs->Move($t_phanhoi_list->lStartRec - 1);
}
$t_phanhoi_list->lRowCnt = 0;
while (($t_phanhoi->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_phanhoi_list->lRecCount < $t_phanhoi_list->lStopRec) {
	$t_phanhoi_list->lRecCount++;
	if (intval($t_phanhoi_list->lRecCount) >= intval($t_phanhoi_list->lStartRec)) {
		$t_phanhoi_list->lRowCnt++;

	// Init row class and style
	$t_phanhoi->CssClass = "";
	$t_phanhoi->CssStyle = "";
	$t_phanhoi->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_phanhoi->CurrentAction == "gridadd") {
		$t_phanhoi_list->LoadDefaultValues(); // Load default values
	} else {
		$t_phanhoi_list->LoadRowValues($rs); // Load row values
	}
	$t_phanhoi->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_phanhoi_list->RenderRow();
?>
	<tr<?php echo $t_phanhoi->RowAttributes() ?>>
<?php if ($t_phanhoi->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_phanhoi->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_phanhoi->id_contact->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($t_phanhoi_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_phanhoi->c_hoten->Visible) { // c_hoten ?>
		<td<?php echo $t_phanhoi->c_hoten->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_hoten->ViewAttributes() ?>><?php echo $t_phanhoi->c_hoten->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_phanhoi->c_email->Visible) { // c_email ?>
		<td<?php echo $t_phanhoi->c_email->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_email->ViewAttributes() ?>><?php echo $t_phanhoi->c_email->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_phanhoi->c_tieude->Visible) { // c_tieude ?>
		<td<?php echo $t_phanhoi->c_tieude->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_tieude->ViewAttributes() ?>><?php echo $t_phanhoi->c_tieude->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_phanhoi->c_tel->Visible) { // c_tel ?>
		<td<?php echo $t_phanhoi->c_tel->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_tel->ViewAttributes() ?>><?php echo $t_phanhoi->c_tel->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_phanhoi->c_read_time->Visible) { // c_read_time ?>
		<td<?php echo $t_phanhoi->c_read_time->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_read_time->ViewAttributes() ?>><?php echo $t_phanhoi->c_read_time->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_phanhoi->c_add_time->Visible) { // c_add_time ?>
		<td<?php echo $t_phanhoi->c_add_time->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_add_time->ViewAttributes() ?>><?php echo $t_phanhoi->c_add_time->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_phanhoi->c_status->Visible) { // c_status ?>
		<td<?php echo $t_phanhoi->c_status->CellAttributes() ?>>
<div<?php echo $t_phanhoi->c_status->ViewAttributes() ?>><?php echo $t_phanhoi->c_status->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_phanhoi->CurrentAction <> "gridadd")
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
<?php if ($t_phanhoi_list->lTotalRecs > 0) { ?>
<?php if ($t_phanhoi->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_phanhoi->CurrentAction <> "gridadd" && $t_phanhoi->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_phanhoi_list->Pager)) $t_phanhoi_list->Pager = new cNumericPager($t_phanhoi_list->lStartRec, $t_phanhoi_list->lDisplayRecs, $t_phanhoi_list->lTotalRecs, $t_phanhoi_list->lRecRange) ?>
<?php if ($t_phanhoi_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_phanhoi_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_phanhoi_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_phanhoi_list->PageUrl() ?>start=<?php echo $t_phanhoi_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_phanhoi_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_phanhoi_list->Pager->FromIndex ?> đến <?php echo $t_phanhoi_list->Pager->ToIndex ?> của <?php echo $t_phanhoi_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_phanhoi_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_phanhoi_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>số hiển thị&nbsp</td><td>
<input type="hidden" id="t" name="t" value="t_phanhoi">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_phanhoi_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_phanhoi_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_phanhoi_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_phanhoi->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_phanhoi_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($t_phanhoi_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_phanhoilist)) alert('Chưa chọn bản ghi'); else {document.ft_phanhoilist.action='t_phanhoidelete.php';document.ft_phanhoilist.encoding='application/x-www-form-urlencoded';document.ft_phanhoilist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_phanhoi->Export == "" && $t_phanhoi->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_phanhoi_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_phanhoi->Export == "") { ?>
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
class ct_phanhoi_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_phanhoi';

	// Page Object Name
	var $PageObjName = 't_phanhoi_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_phanhoi;
		if ($t_phanhoi->UseTokenInUrl) $PageUrl .= "t=" . $t_phanhoi->TableVar . "&"; // add page token
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
		global $objForm, $t_phanhoi;
		if ($t_phanhoi->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_phanhoi->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_phanhoi->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_phanhoi_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_phanhoi"] = new ct_phanhoi();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_phanhoi', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_phanhoi;
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
	$t_phanhoi->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_phanhoi->Export; // Get export parameter, used in header
	$gsExportFile = $t_phanhoi->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $t_phanhoi;
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
		if ($t_phanhoi->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_phanhoi->getRecordsPerPage(); // Restore from Session
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
		$t_phanhoi->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_phanhoi->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_phanhoi->setStartRecordNumber($this->lStartRec);
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
		$t_phanhoi->setSessionWhere($sFilter);
		$t_phanhoi->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_phanhoi;
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
			$t_phanhoi->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_phanhoi->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_phanhoi;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_hoten, FALSE); // Field c_hoten
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_email, FALSE); // Field c_email
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_tieude, FALSE); // Field c_tieude
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_tel, FALSE); // Field c_tel
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_noidung, FALSE); // Field c_noidung
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_read_time, FALSE); // Field c_read_time
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_add_time, FALSE); // Field c_add_time
		$this->BuildSearchSql($sWhere, $t_phanhoi->c_status, FALSE); // Field c_status

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_phanhoi->c_hoten); // Field c_hoten
			$this->SetSearchParm($t_phanhoi->c_email); // Field c_email
			$this->SetSearchParm($t_phanhoi->c_tieude); // Field c_tieude
			$this->SetSearchParm($t_phanhoi->c_tel); // Field c_tel
			$this->SetSearchParm($t_phanhoi->c_noidung); // Field c_noidung
			$this->SetSearchParm($t_phanhoi->c_read_time); // Field c_read_time
			$this->SetSearchParm($t_phanhoi->c_add_time); // Field c_add_time
			$this->SetSearchParm($t_phanhoi->c_status); // Field c_status
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
		global $t_phanhoi;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_phanhoi->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_phanhoi->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_phanhoi->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_phanhoi->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_phanhoi->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $t_phanhoi;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_phanhoi->c_hoten->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_phanhoi->c_email->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_phanhoi->c_tieude->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_phanhoi->c_tel->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_phanhoi->c_noidung->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_phanhoi;
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
			$t_phanhoi->setBasicSearchKeyword($sSearchKeyword);
			$t_phanhoi->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_phanhoi;
		$this->sSrchWhere = "";
		$t_phanhoi->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_phanhoi;
		$t_phanhoi->setBasicSearchKeyword("");
		$t_phanhoi->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_phanhoi;
		$t_phanhoi->setAdvancedSearch("x_c_hoten", "");
		$t_phanhoi->setAdvancedSearch("x_c_email", "");
		$t_phanhoi->setAdvancedSearch("x_c_tieude", "");
		$t_phanhoi->setAdvancedSearch("x_c_tel", "");
		$t_phanhoi->setAdvancedSearch("x_c_noidung", "");
		$t_phanhoi->setAdvancedSearch("x_c_read_time", "");
		$t_phanhoi->setAdvancedSearch("y_c_read_time", "");
		$t_phanhoi->setAdvancedSearch("x_c_add_time", "");
		$t_phanhoi->setAdvancedSearch("y_c_add_time", "");
		$t_phanhoi->setAdvancedSearch("x_c_status", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_phanhoi;
		$this->sSrchWhere = $t_phanhoi->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_phanhoi;
		 $t_phanhoi->c_hoten->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_hoten");
		 $t_phanhoi->c_email->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_email");
		 $t_phanhoi->c_tieude->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_tieude");
		 $t_phanhoi->c_tel->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_tel");
		 $t_phanhoi->c_noidung->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_noidung");
		 $t_phanhoi->c_read_time->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_read_time");
		 $t_phanhoi->c_read_time->AdvancedSearch->SearchValue2 = $t_phanhoi->getAdvancedSearch("y_c_read_time");
		 $t_phanhoi->c_add_time->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_add_time");
		 $t_phanhoi->c_add_time->AdvancedSearch->SearchValue2 = $t_phanhoi->getAdvancedSearch("y_c_add_time");
		 $t_phanhoi->c_status->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_status");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_phanhoi;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_phanhoi->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_phanhoi->CurrentOrderType = @$_GET["ordertype"];
			$t_phanhoi->UpdateSort($t_phanhoi->c_hoten); // Field 
			$t_phanhoi->UpdateSort($t_phanhoi->c_email); // Field 
			$t_phanhoi->UpdateSort($t_phanhoi->c_tieude); // Field 
			$t_phanhoi->UpdateSort($t_phanhoi->c_tel); // Field 
			$t_phanhoi->UpdateSort($t_phanhoi->c_read_time); // Field 
			$t_phanhoi->UpdateSort($t_phanhoi->c_add_time); // Field 
			$t_phanhoi->UpdateSort($t_phanhoi->c_status); // Field 
			$t_phanhoi->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_phanhoi;
		$sOrderBy = $t_phanhoi->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_phanhoi->SqlOrderBy() <> "") {
				$sOrderBy = $t_phanhoi->SqlOrderBy();
				$t_phanhoi->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_phanhoi;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_phanhoi->setSessionOrderBy($sOrderBy);
				$t_phanhoi->c_hoten->setSort("");
				$t_phanhoi->c_email->setSort("");
				$t_phanhoi->c_tieude->setSort("");
				$t_phanhoi->c_tel->setSort("");
				$t_phanhoi->c_read_time->setSort("");
				$t_phanhoi->c_add_time->setSort("");
				$t_phanhoi->c_status->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_phanhoi->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_phanhoi;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_phanhoi->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_phanhoi->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_phanhoi->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_phanhoi->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_phanhoi->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_phanhoi->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_phanhoi;

		// Load search values
		// c_hoten

		$t_phanhoi->c_hoten->AdvancedSearch->SearchValue = @$_GET["x_c_hoten"];
		$t_phanhoi->c_hoten->AdvancedSearch->SearchOperator = @$_GET["z_c_hoten"];

		// c_email
		$t_phanhoi->c_email->AdvancedSearch->SearchValue = @$_GET["x_c_email"];
		$t_phanhoi->c_email->AdvancedSearch->SearchOperator = @$_GET["z_c_email"];

		// c_tieude
		$t_phanhoi->c_tieude->AdvancedSearch->SearchValue = @$_GET["x_c_tieude"];
		$t_phanhoi->c_tieude->AdvancedSearch->SearchOperator = @$_GET["z_c_tieude"];

		// c_tel
		$t_phanhoi->c_tel->AdvancedSearch->SearchValue = @$_GET["x_c_tel"];
		$t_phanhoi->c_tel->AdvancedSearch->SearchOperator = @$_GET["z_c_tel"];

		// c_noidung
		$t_phanhoi->c_noidung->AdvancedSearch->SearchValue = @$_GET["x_c_noidung"];
		$t_phanhoi->c_noidung->AdvancedSearch->SearchOperator = @$_GET["z_c_noidung"];

		// c_read_time
		$t_phanhoi->c_read_time->AdvancedSearch->SearchValue = @$_GET["x_c_read_time"];
		$t_phanhoi->c_read_time->AdvancedSearch->SearchOperator = @$_GET["z_c_read_time"];
		$t_phanhoi->c_read_time->AdvancedSearch->SearchCondition = @$_GET["v_c_read_time"];
		$t_phanhoi->c_read_time->AdvancedSearch->SearchValue2 = @$_GET["y_c_read_time"];
		$t_phanhoi->c_read_time->AdvancedSearch->SearchOperator2 = @$_GET["w_c_read_time"];

		// c_add_time
		$t_phanhoi->c_add_time->AdvancedSearch->SearchValue = @$_GET["x_c_add_time"];
		$t_phanhoi->c_add_time->AdvancedSearch->SearchOperator = @$_GET["z_c_add_time"];
		$t_phanhoi->c_add_time->AdvancedSearch->SearchCondition = @$_GET["v_c_add_time"];
		$t_phanhoi->c_add_time->AdvancedSearch->SearchValue2 = @$_GET["y_c_add_time"];
		$t_phanhoi->c_add_time->AdvancedSearch->SearchOperator2 = @$_GET["w_c_add_time"];

		// c_status
		$t_phanhoi->c_status->AdvancedSearch->SearchValue = @$_GET["x_c_status"];
		$t_phanhoi->c_status->AdvancedSearch->SearchOperator = @$_GET["z_c_status"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_phanhoi;

		// Call Recordset Selecting event
		$t_phanhoi->Recordset_Selecting($t_phanhoi->CurrentFilter);

		// Load list page SQL
		$sSql = $t_phanhoi->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_phanhoi->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_phanhoi;
		$sFilter = $t_phanhoi->KeyFilter();

		// Call Row Selecting event
		$t_phanhoi->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_phanhoi->CurrentFilter = $sFilter;
		$sSql = $t_phanhoi->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_phanhoi->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_phanhoi;
		$t_phanhoi->id_contact->setDbValue($rs->fields('id_contact'));
		$t_phanhoi->c_type->setDbValue($rs->fields('c_type'));
		$t_phanhoi->c_hoten->setDbValue($rs->fields('c_hoten'));
		$t_phanhoi->c_email->setDbValue($rs->fields('c_email'));
		$t_phanhoi->c_tieude->setDbValue($rs->fields('c_tieude'));
		$t_phanhoi->c_tel->setDbValue($rs->fields('c_tel'));
		$t_phanhoi->c_noidung->setDbValue($rs->fields('c_noidung'));
		$t_phanhoi->c_read_time->setDbValue($rs->fields('c_read_time'));
		$t_phanhoi->c_add_time->setDbValue($rs->fields('c_add_time'));
		$t_phanhoi->c_status->setDbValue($rs->fields('c_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_phanhoi;

		// Call Row_Rendering event
		$t_phanhoi->Row_Rendering();

		// Common render codes for all row types
		// c_hoten

		$t_phanhoi->c_hoten->CellCssStyle = "";
		$t_phanhoi->c_hoten->CellCssClass = "";

		// c_email
		$t_phanhoi->c_email->CellCssStyle = "";
		$t_phanhoi->c_email->CellCssClass = "";

		// c_tieude
		$t_phanhoi->c_tieude->CellCssStyle = "";
		$t_phanhoi->c_tieude->CellCssClass = "";

		// c_tel
		$t_phanhoi->c_tel->CellCssStyle = "";
		$t_phanhoi->c_tel->CellCssClass = "";

		// c_read_time
		$t_phanhoi->c_read_time->CellCssStyle = "";
		$t_phanhoi->c_read_time->CellCssClass = "";

		// c_add_time
		$t_phanhoi->c_add_time->CellCssStyle = "";
		$t_phanhoi->c_add_time->CellCssClass = "";

		// c_status
		$t_phanhoi->c_status->CellCssStyle = "";
		$t_phanhoi->c_status->CellCssClass = "";
		if ($t_phanhoi->RowType == EW_ROWTYPE_VIEW) { // View row

			// c_hoten
			$t_phanhoi->c_hoten->ViewValue = $t_phanhoi->c_hoten->CurrentValue;
			$t_phanhoi->c_hoten->CssStyle = "";
			$t_phanhoi->c_hoten->CssClass = "";
			$t_phanhoi->c_hoten->ViewCustomAttributes = "";

			// c_email
			$t_phanhoi->c_email->ViewValue = $t_phanhoi->c_email->CurrentValue;
			$t_phanhoi->c_email->CssStyle = "";
			$t_phanhoi->c_email->CssClass = "";
			$t_phanhoi->c_email->ViewCustomAttributes = "";

			// c_tieude
			$t_phanhoi->c_tieude->ViewValue = $t_phanhoi->c_tieude->CurrentValue;
			$t_phanhoi->c_tieude->CssStyle = "";
			$t_phanhoi->c_tieude->CssClass = "";
			$t_phanhoi->c_tieude->ViewCustomAttributes = "";

			// c_tel
			$t_phanhoi->c_tel->ViewValue = $t_phanhoi->c_tel->CurrentValue;
			$t_phanhoi->c_tel->CssStyle = "";
			$t_phanhoi->c_tel->CssClass = "";
			$t_phanhoi->c_tel->ViewCustomAttributes = "";

			// c_read_time
			$t_phanhoi->c_read_time->ViewValue = $t_phanhoi->c_read_time->CurrentValue;
			$t_phanhoi->c_read_time->ViewValue = ew_FormatDateTime($t_phanhoi->c_read_time->ViewValue, 7);
			$t_phanhoi->c_read_time->CssStyle = "";
			$t_phanhoi->c_read_time->CssClass = "";
			$t_phanhoi->c_read_time->ViewCustomAttributes = "";

			// c_add_time
			$t_phanhoi->c_add_time->ViewValue = $t_phanhoi->c_add_time->CurrentValue;
			$t_phanhoi->c_add_time->ViewValue = ew_FormatDateTime($t_phanhoi->c_add_time->ViewValue, 7);
			$t_phanhoi->c_add_time->CssStyle = "";
			$t_phanhoi->c_add_time->CssClass = "";
			$t_phanhoi->c_add_time->ViewCustomAttributes = "";

			// c_status
			if (strval($t_phanhoi->c_status->CurrentValue) <> "") {
				switch ($t_phanhoi->c_status->CurrentValue) {
					case "0":
						$t_phanhoi->c_status->ViewValue = "<span style=\"color:red\">Chưa xem</span>";
						break;
					case "1":
						$t_phanhoi->c_status->ViewValue = "<b>Đã xem</b>";
						break;
					default:
						$t_phanhoi->c_status->ViewValue = $t_phanhoi->c_status->CurrentValue;
				}
			} else {
				$t_phanhoi->c_status->ViewValue = NULL;
			}
			$t_phanhoi->c_status->CssStyle = "";
			$t_phanhoi->c_status->CssClass = "";
			$t_phanhoi->c_status->ViewCustomAttributes = "";

			// c_hoten
			$t_phanhoi->c_hoten->HrefValue = "";

			// c_email
			$t_phanhoi->c_email->HrefValue = "";

			// c_tieude
			$t_phanhoi->c_tieude->HrefValue = "";

			// c_tel
			$t_phanhoi->c_tel->HrefValue = "";

			// c_read_time
			$t_phanhoi->c_read_time->HrefValue = "";

			// c_add_time
			$t_phanhoi->c_add_time->HrefValue = "";

			// c_status
			$t_phanhoi->c_status->HrefValue = "";
		} elseif ($t_phanhoi->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// c_hoten
			$t_phanhoi->c_hoten->EditCustomAttributes = "";
			$t_phanhoi->c_hoten->EditValue = ew_HtmlEncode($t_phanhoi->c_hoten->AdvancedSearch->SearchValue);

			// c_email
			$t_phanhoi->c_email->EditCustomAttributes = "";
			$t_phanhoi->c_email->EditValue = ew_HtmlEncode($t_phanhoi->c_email->AdvancedSearch->SearchValue);

			// c_tieude
			$t_phanhoi->c_tieude->EditCustomAttributes = "";
			$t_phanhoi->c_tieude->EditValue = ew_HtmlEncode($t_phanhoi->c_tieude->AdvancedSearch->SearchValue);

			// c_tel
			$t_phanhoi->c_tel->EditCustomAttributes = "";
			$t_phanhoi->c_tel->EditValue = ew_HtmlEncode($t_phanhoi->c_tel->AdvancedSearch->SearchValue);

			// c_read_time
			$t_phanhoi->c_read_time->EditCustomAttributes = "";
			$t_phanhoi->c_read_time->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_phanhoi->c_read_time->AdvancedSearch->SearchValue, 7), 7));
			$t_phanhoi->c_read_time->EditCustomAttributes = "";
			$t_phanhoi->c_read_time->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_phanhoi->c_read_time->AdvancedSearch->SearchValue2, 7), 7));

			// c_add_time
			$t_phanhoi->c_add_time->EditCustomAttributes = "";
			$t_phanhoi->c_add_time->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_phanhoi->c_add_time->AdvancedSearch->SearchValue, 7), 7));
			$t_phanhoi->c_add_time->EditCustomAttributes = "";
			$t_phanhoi->c_add_time->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_phanhoi->c_add_time->AdvancedSearch->SearchValue2, 7), 7));

			// c_status
			$t_phanhoi->c_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa xem");
			$arwrk[] = array("1", "Đã xem");
			array_unshift($arwrk, array("", "Chọn"));
			$t_phanhoi->c_status->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$t_phanhoi->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_phanhoi;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($t_phanhoi->c_read_time->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thời gian xem";
		}
		if (!ew_CheckEuroDate($t_phanhoi->c_read_time->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thời gian xem";
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
		global $t_phanhoi;
		$t_phanhoi->c_hoten->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_hoten");
		$t_phanhoi->c_email->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_email");
		$t_phanhoi->c_tieude->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_tieude");
		$t_phanhoi->c_tel->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_tel");
		$t_phanhoi->c_noidung->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_noidung");
		$t_phanhoi->c_read_time->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_read_time");
		$t_phanhoi->c_read_time->AdvancedSearch->SearchValue2 = $t_phanhoi->getAdvancedSearch("y_c_read_time");
		$t_phanhoi->c_add_time->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_add_time");
		$t_phanhoi->c_add_time->AdvancedSearch->SearchValue2 = $t_phanhoi->getAdvancedSearch("y_c_add_time");
		$t_phanhoi->c_status->AdvancedSearch->SearchValue = $t_phanhoi->getAdvancedSearch("x_c_status");
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
