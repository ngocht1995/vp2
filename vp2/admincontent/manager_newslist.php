<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_newsinfo.php" ?>
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
$manager_news_list = new cmanager_news_list();
$Page =& $manager_news_list;

// Page init processing
$manager_news_list->Page_Init();

// Page main processing
$manager_news_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_news->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_news_list = new ew_Page("manager_news_list");

// page properties
manager_news_list.PageID = "list"; // page ID
var EW_PAGE_ID = manager_news_list.PageID; // for backward compatibility

// extend page with validate function for search
manager_news_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_hienthi_tungay"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay");
	elm = fobj.elements["x" + infix + "_hienthi_denngay"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay");

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
manager_news_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_news_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_news_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_news_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($manager_news->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($manager_news->Export == "" && $manager_news->SelectLimit);
	if (!$bSelectLimit)
		$rs = $manager_news_list->LoadRecordset();
	$manager_news_list->lTotalRecs = ($bSelectLimit) ? $manager_news->SelectRecordCount() : $rs->RecordCount();
	$manager_news_list->lStartRec = 1;
	if ($manager_news_list->lDisplayRecs <= 0) // Display all records
		$manager_news_list->lDisplayRecs = $manager_news_list->lTotalRecs;
	if (!($manager_news->ExportAll && $manager_news->Export <> ""))
		$manager_news_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $manager_news_list->LoadRecordset($manager_news_list->lStartRec-1, $manager_news_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xuất bản tin tức</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($manager_news->Export == "" && $manager_news->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(manager_news_list);" style="text-decoration: none;"><img id="manager_news_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="manager_news_list_SearchPanel">
<form name="fmanager_newslistsrch" id="fmanager_newslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return manager_news_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="manager_news">
<?php
if ($gsSearchError == "")
	$manager_news_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$manager_news->RowType = EW_ROWTYPE_SEARCH;

// Render row
$manager_news_list->RenderRow();
?>
<table class="ewBasicSearch" width="725" bgcolor="#EBEBEB">
	<tr>
		<td><span class="phpmaker">Hiển thị từ ngày</span></td>
		<td><input type="hidden" name="z_hienthi_tungay" id="z_hienthi_tungay" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_hienthi_tungay" id="x_hienthi_tungay" value="<?php echo $manager_news->hienthi_tungay->EditValue ?>"<?php echo $manager_news->hienthi_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_hienthi_tungay" name="cal_x_hienthi_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_hienthi_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_hienthi_tungay" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_hienthi_tungay" name="btw1_hienthi_tungay">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_hienthi_tungay" name="btw1_hienthi_tungay">
<input type="text" name="y_hienthi_tungay" id="y_hienthi_tungay" value="<?php echo $manager_news->hienthi_tungay->EditValue2 ?>"<?php echo $manager_news->hienthi_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_hienthi_tungay" name="cal_y_hienthi_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_hienthi_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_hienthi_tungay" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Hiển thị đến ngày</span></td>
		<td><input type="hidden" name="z_hienthi_denngay" id="z_hienthi_denngay" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_hienthi_denngay" id="x_hienthi_denngay" value="<?php echo $manager_news->hienthi_denngay->EditValue ?>"<?php echo $manager_news->hienthi_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_hienthi_denngay" name="cal_x_hienthi_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_hienthi_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_hienthi_denngay" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_hienthi_denngay" name="btw1_hienthi_denngay">&nbsp;Đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_hienthi_denngay" name="btw1_hienthi_denngay">
<input type="text" name="y_hienthi_denngay" id="y_hienthi_denngay" value="<?php echo $manager_news->hienthi_denngay->EditValue2 ?>"<?php echo $manager_news->hienthi_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_hienthi_denngay" name="cal_y_hienthi_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_hienthi_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_hienthi_denngay" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Xuất bản</span></td>
		<td><input type="hidden" name="z_xuatban" id="z_xuatban" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_xuatban" name="x_xuatban"<?php echo $manager_news->xuatban->EditAttributes() ?>>
<?php
if (is_array($manager_news->xuatban->EditValue)) {
	$arwrk = $manager_news->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_news->xuatban->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<table class="ewBasicSearch" width="725" bgcolor="#EBEBEB">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($manager_news->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiễm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; 
			<a href="<?php echo $manager_news_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($manager_news->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($manager_news->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($manager_news->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $manager_news_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($manager_news->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($manager_news->CurrentAction <> "gridadd" && $manager_news->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_news_list->Pager)) $manager_news_list->Pager = new cNumericPager($manager_news_list->lStartRec, $manager_news_list->lDisplayRecs, $manager_news_list->lTotalRecs, $manager_news_list->lRecRange) ?>
<?php if ($manager_news_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_news_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_news_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các tin từ <?php echo $manager_news_list->Pager->FromIndex ?> đến <?php echo $manager_news_list->Pager->ToIndex ?> của <?php echo $manager_news_list->Pager->RecordCount ?> tin
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_news_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có tin
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($manager_news_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_news">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_news_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_news_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_news_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_news->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($manager_news_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_newslist)) alert('Chưa chọn tin'); else {document.fmanager_newslist.action='manager_newsdelete.php';document.fmanager_newslist.encoding='application/x-www-form-urlencoded';document.fmanager_newslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_newslist)) alert('Chưa chọn tin'); else {document.fmanager_newslist.action='manager_newsupdate.php';document.fmanager_newslist.encoding='application/x-www-form-urlencoded';document.fmanager_newslist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fmanager_newslist" id="fmanager_newslist" class="ewForm" action="" method="post">
<?php if ($manager_news_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$manager_news_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$manager_news_list->lOptionCnt++; // view
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$manager_news_list->lOptionCnt++; // Multi-select
}
	$manager_news_list->lOptionCnt += count($manager_news_list->ListOptions->Items); // Custom list options
?>
<?php echo $manager_news->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($manager_news->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="manager_news_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_news_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($manager_news->anh_tintuc->Visible) { // anh_tintuc ?>
	<?php if ($manager_news->SortUrl($manager_news->anh_tintuc) == "") { ?>
		<td style="white-space: nowrap;">Anh Tintuc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_news->SortUrl($manager_news->anh_tintuc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Ảnh</td><td style="width: 10px;"><?php if ($manager_news->anh_tintuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_news->anh_tintuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>

<?php if ($manager_news->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<?php if ($manager_news->SortUrl($manager_news->tieude_tintuc) == "") { ?>
		<td style="white-space: nowrap;">Tieude Tintuc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_news->SortUrl($manager_news->tieude_tintuc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tiêu đề tin</td><td style="width: 10px;"><?php if ($manager_news->tieude_tintuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_news->tieude_tintuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_news->hienthi_tungay->Visible) { // hienthi_tungay ?>
	<?php if ($manager_news->SortUrl($manager_news->hienthi_tungay) == "") { ?>
		<td style="white-space: nowrap;">Hienthi Tungay</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_news->SortUrl($manager_news->hienthi_tungay) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Hiển thị từ ngày</td><td style="width: 10px;"><?php if ($manager_news->hienthi_tungay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_news->hienthi_tungay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_news->hienthi_denngay->Visible) { // hienthi_denngay ?>
	<?php if ($manager_news->SortUrl($manager_news->hienthi_denngay) == "") { ?>
		<td style="white-space: nowrap;">Hienthi Denngay</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_news->SortUrl($manager_news->hienthi_denngay) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Hiển thị đến ngày</td><td style="width: 10px;"><?php if ($manager_news->hienthi_denngay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_news->hienthi_denngay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_news->xuatban->Visible) { // xuatban ?>
	<?php if ($manager_news->SortUrl($manager_news->xuatban) == "") { ?>
		<td style="white-space: nowrap;">Xuatban</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_news->SortUrl($manager_news->xuatban) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Xuất bản</td><td style="width: 10px;"><?php if ($manager_news->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_news->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($manager_news->ExportAll && $manager_news->Export <> "") {
	$manager_news_list->lStopRec = $manager_news_list->lTotalRecs;
} else {
	$manager_news_list->lStopRec = $manager_news_list->lStartRec + $manager_news_list->lDisplayRecs - 1; // Set the last record to display
}
$manager_news_list->lRecCount = $manager_news_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$manager_news->SelectLimit && $manager_news_list->lStartRec > 1)
		$rs->Move($manager_news_list->lStartRec - 1);
}
$manager_news_list->lRowCnt = 0;
while (($manager_news->CurrentAction == "gridadd" || !$rs->EOF) &&
	$manager_news_list->lRecCount < $manager_news_list->lStopRec) {
	$manager_news_list->lRecCount++;
	if (intval($manager_news_list->lRecCount) >= intval($manager_news_list->lStartRec)) {
		$manager_news_list->lRowCnt++;

	// Init row class and style
	$manager_news->CssClass = "";
	$manager_news->CssStyle = "";
	$manager_news->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($manager_news->CurrentAction == "gridadd") {
		$manager_news_list->LoadDefaultValues(); // Load default values
	} else {
		$manager_news_list->LoadRowValues($rs); // Load row values
	}
	$manager_news->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$manager_news_list->RenderRow();
?>
	<tr<?php echo $manager_news->RowAttributes() ?>>
<?php if ($manager_news->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $manager_news->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($manager_news->tintuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_news_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($manager_news->anh_tintuc->Visible) { // anh_tintuc ?>
		<td width="300">
<?php if ($manager_news->anh_tintuc->HrefValue <> "") { ?>
<?php if (!is_null($manager_news->anh_tintuc->Upload->DbValue)) { ?>
<a href="<?php echo $manager_news->anh_tintuc->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_news->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $manager_news->anh_tintuc->ViewAttributes() ?>></a>
<?php } elseif (!in_array($manager_news->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_news->anh_tintuc->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_news->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $manager_news->anh_tintuc->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_news->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>

	<?php if ($manager_news->tieude_tintuc->Visible) { // tieude_tintuc ?>
		<td width="350">
<div<?php echo $manager_news->tieude_tintuc->ViewAttributes() ?>><?php echo $manager_news->tieude_tintuc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_news->hienthi_tungay->Visible) { // hienthi_tungay ?>
		<td<?php echo $manager_news->hienthi_tungay->CellAttributes() ?>>
<div<?php echo $manager_news->hienthi_tungay->ViewAttributes() ?>><?php echo $manager_news->hienthi_tungay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_news->hienthi_denngay->Visible) { // hienthi_denngay ?>
		<td<?php echo $manager_news->hienthi_denngay->CellAttributes() ?>>
<div<?php echo $manager_news->hienthi_denngay->ViewAttributes() ?>><?php echo $manager_news->hienthi_denngay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_news->xuatban->Visible) { // xuatban ?>
		<td<?php echo $manager_news->xuatban->CellAttributes() ?>>
<div<?php echo $manager_news->xuatban->ViewAttributes() ?>><?php echo $manager_news->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($manager_news->CurrentAction <> "gridadd")
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
<?php if ($manager_news_list->lTotalRecs > 0) { ?>
<?php if ($manager_news->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($manager_news->CurrentAction <> "gridadd" && $manager_news->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_news_list->Pager)) $manager_news_list->Pager = new cNumericPager($manager_news_list->lStartRec, $manager_news_list->lDisplayRecs, $manager_news_list->lTotalRecs, $manager_news_list->lRecRange) ?>
<?php if ($manager_news_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_news_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_news_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_news_list->PageUrl() ?>start=<?php echo $manager_news_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_news_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các tin từ <?php echo $manager_news_list->Pager->FromIndex ?> đến <?php echo $manager_news_list->Pager->ToIndex ?> của <?php echo $manager_news_list->Pager->RecordCount ?> tin
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_news_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có tin
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($manager_news_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_news">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_news_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_news_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_news_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_news->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($manager_news_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($manager_news_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_newslist)) alert('Chưa chọn tin'); else {document.fmanager_newslist.action='manager_newsdelete.php';document.fmanager_newslist.encoding='application/x-www-form-urlencoded';document.fmanager_newslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_newslist)) alert('Chưa chọn tin'); else {document.fmanager_newslist.action='manager_newsupdate.php';document.fmanager_newslist.encoding='application/x-www-form-urlencoded';document.fmanager_newslist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($manager_news->Export == "" && $manager_news->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(manager_news_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($manager_news->Export == "") { ?>
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
class cmanager_news_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'manager_news';

	// Page Object Name
	var $PageObjName = 'manager_news_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_news;
		if ($manager_news->UseTokenInUrl) $PageUrl .= "t=" . $manager_news->TableVar . "&"; // add page token
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
		global $objForm, $manager_news;
		if ($manager_news->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_news->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_news->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_news_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_news"] = new cmanager_news();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_news', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_news;
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
	$manager_news->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $manager_news->Export; // Get export parameter, used in header
	$gsExportFile = $manager_news->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $manager_news;
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
		if ($manager_news->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $manager_news->getRecordsPerPage(); // Restore from Session
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
		$manager_news->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$manager_news->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$manager_news->setStartRecordNumber($this->lStartRec);
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
		$manager_news->setSessionWhere($sFilter);
		$manager_news->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $manager_news;
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
			$manager_news->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$manager_news->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $manager_news;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $manager_news->tintuc_id, FALSE); // Field tintuc_id
		$this->BuildSearchSql($sWhere, $manager_news->ten_congty, FALSE); // Field ten_congty
		$this->BuildSearchSql($sWhere, $manager_news->hoten_nguoilienhe, FALSE); // Field hoten_nguoilienhe
		
		$this->BuildSearchSql($sWhere, $manager_news->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $manager_news->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $manager_news->tieude_tintuc, FALSE); // Field tieude_tintuc
		$this->BuildSearchSql($sWhere, $manager_news->tukhoa_tintuc, FALSE); // Field tukhoa_tintuc
		$this->BuildSearchSql($sWhere, $manager_news->tomtat_tintuc, FALSE); // Field tomtat_tintuc
		$this->BuildSearchSql($sWhere, $manager_news->nguon_tintuc, FALSE); // Field nguon_tintuc
		$this->BuildSearchSql($sWhere, $manager_news->noidung_tintuc, FALSE); // Field noidung_tintuc
		$this->BuildSearchSql($sWhere, $manager_news->lienket_tintuc, FALSE); // Field lienket_tintuc
		$this->BuildSearchSql($sWhere, $manager_news->hienthi_tungay, FALSE); // Field hienthi_tungay
		$this->BuildSearchSql($sWhere, $manager_news->hienthi_denngay, FALSE); // Field hienthi_denngay
		$this->BuildSearchSql($sWhere, $manager_news->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $manager_news->thoigian_sua, FALSE); // Field thoigian_sua
		$this->BuildSearchSql($sWhere, $manager_news->soluot_truynhap, FALSE); // Field soluot_truynhap
		$this->BuildSearchSql($sWhere, $manager_news->xuatban, FALSE); // Field xuatban

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($manager_news->tintuc_id); // Field tintuc_id
			$this->SetSearchParm($manager_news->ten_congty); // Field ten_congty
			$this->SetSearchParm($manager_news->hoten_nguoilienhe); // Field hoten_nguoilienhe
			
			$this->SetSearchParm($manager_news->trang_thai); // Field trang_thai
			$this->SetSearchParm($manager_news->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($manager_news->tieude_tintuc); // Field tieude_tintuc
			$this->SetSearchParm($manager_news->tukhoa_tintuc); // Field tukhoa_tintuc
			$this->SetSearchParm($manager_news->tomtat_tintuc); // Field tomtat_tintuc
			$this->SetSearchParm($manager_news->nguon_tintuc); // Field nguon_tintuc
			$this->SetSearchParm($manager_news->noidung_tintuc); // Field noidung_tintuc
			$this->SetSearchParm($manager_news->lienket_tintuc); // Field lienket_tintuc
			$this->SetSearchParm($manager_news->hienthi_tungay); // Field hienthi_tungay
			$this->SetSearchParm($manager_news->hienthi_denngay); // Field hienthi_denngay
			$this->SetSearchParm($manager_news->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($manager_news->thoigian_sua); // Field thoigian_sua
			$this->SetSearchParm($manager_news->soluot_truynhap); // Field soluot_truynhap
			$this->SetSearchParm($manager_news->xuatban); // Field xuatban
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
		global $manager_news;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$manager_news->setAdvancedSearch("x_$FldParm", $FldVal);
		$manager_news->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$manager_news->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$manager_news->setAdvancedSearch("y_$FldParm", $FldVal2);
		$manager_news->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $manager_news;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $manager_news->ten_congty->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $manager_news->tieude_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $manager_news;
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
			$manager_news->setBasicSearchKeyword($sSearchKeyword);
			$manager_news->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $manager_news;
		$this->sSrchWhere = "";
		$manager_news->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $manager_news;
		$manager_news->setBasicSearchKeyword("");
		$manager_news->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $manager_news;
		$manager_news->setAdvancedSearch("x_tintuc_id", "");
		$manager_news->setAdvancedSearch("x_ten_congty", "");
		$manager_news->setAdvancedSearch("x_hoten_nguoilienhe", "");
		$manager_news->setAdvancedSearch("x_ten_nguoilienhe", "");
		$manager_news->setAdvancedSearch("x_trang_thai", "");
		$manager_news->setAdvancedSearch("x_nguoidung_id", "");
		$manager_news->setAdvancedSearch("x_tieude_tintuc", "");
		$manager_news->setAdvancedSearch("x_tukhoa_tintuc", "");
		$manager_news->setAdvancedSearch("x_tomtat_tintuc", "");
		$manager_news->setAdvancedSearch("x_nguon_tintuc", "");
		$manager_news->setAdvancedSearch("x_noidung_tintuc", "");
		$manager_news->setAdvancedSearch("x_lienket_tintuc", "");
		$manager_news->setAdvancedSearch("x_hienthi_tungay", "");
		$manager_news->setAdvancedSearch("y_hienthi_tungay", "");
		$manager_news->setAdvancedSearch("x_hienthi_denngay", "");
		$manager_news->setAdvancedSearch("y_hienthi_denngay", "");
		$manager_news->setAdvancedSearch("x_thoigian_them", "");
		$manager_news->setAdvancedSearch("x_thoigian_sua", "");
		$manager_news->setAdvancedSearch("x_soluot_truynhap", "");
		$manager_news->setAdvancedSearch("x_xuatban", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $manager_news;
		$this->sSrchWhere = $manager_news->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $manager_news;
		 $manager_news->tintuc_id->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tintuc_id");
		 $manager_news->ten_congty->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_ten_congty");
		 $manager_news->hoten_nguoilienhe->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_hoten_nguoilienhe");
		
		 $manager_news->trang_thai->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_trang_thai");
		 $manager_news->nguoidung_id->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_nguoidung_id");
		 $manager_news->tieude_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tieude_tintuc");
		 $manager_news->tukhoa_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tukhoa_tintuc");
		 $manager_news->tomtat_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tomtat_tintuc");
		 $manager_news->nguon_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_nguon_tintuc");
		 $manager_news->noidung_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_noidung_tintuc");
		 $manager_news->lienket_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_lienket_tintuc");
		 $manager_news->hienthi_tungay->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_hienthi_tungay");
		 $manager_news->hienthi_tungay->AdvancedSearch->SearchValue2 = $manager_news->getAdvancedSearch("y_hienthi_tungay");
		 $manager_news->hienthi_denngay->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_hienthi_denngay");
		 $manager_news->hienthi_denngay->AdvancedSearch->SearchValue2 = $manager_news->getAdvancedSearch("y_hienthi_denngay");
		 $manager_news->thoigian_them->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_thoigian_them");
		 $manager_news->thoigian_sua->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_thoigian_sua");
		 $manager_news->soluot_truynhap->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_soluot_truynhap");
		 $manager_news->xuatban->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_xuatban");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $manager_news;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$manager_news->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$manager_news->CurrentOrderType = @$_GET["ordertype"];
			$manager_news->UpdateSort($manager_news->anh_tintuc); // Field
			$manager_news->UpdateSort($manager_news->ten_congty); // Field
			$manager_news->UpdateSort($manager_news->tieude_tintuc); // Field
			$manager_news->UpdateSort($manager_news->hienthi_tungay); // Field
			$manager_news->UpdateSort($manager_news->hienthi_denngay); // Field
			$manager_news->UpdateSort($manager_news->xuatban); // Field
			$manager_news->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $manager_news;
		$sOrderBy = $manager_news->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($manager_news->SqlOrderBy() <> "") {
				$sOrderBy = $manager_news->SqlOrderBy();
				$manager_news->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $manager_news;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$manager_news->setSessionOrderBy($sOrderBy);
				$manager_news->anh_tintuc->setSort("");
				$manager_news->ten_congty->setSort("");
				$manager_news->tieude_tintuc->setSort("");
				$manager_news->hienthi_tungay->setSort("");
				$manager_news->hienthi_denngay->setSort("");
				$manager_news->xuatban->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$manager_news->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_news;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_news->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_news->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_news->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_news->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_news->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_news->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $manager_news;

		// Load search values
		// tintuc_id

		$manager_news->tintuc_id->AdvancedSearch->SearchValue = @$_GET["x_tintuc_id"];
		$manager_news->tintuc_id->AdvancedSearch->SearchOperator = @$_GET["z_tintuc_id"];

		// ten_congty
		$manager_news->ten_congty->AdvancedSearch->SearchValue = @$_GET["x_ten_congty"];
		$manager_news->ten_congty->AdvancedSearch->SearchOperator = @$_GET["z_ten_congty"];

		// hoten_nguoilienhe
		$manager_news->hoten_nguoilienhe->AdvancedSearch->SearchValue = @$_GET["x_hoten_nguoilienhe"];
		$manager_news->hoten_nguoilienhe->AdvancedSearch->SearchOperator = @$_GET["z_hoten_nguoilienhe"];

		
		// trang_thai
		$manager_news->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$manager_news->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// nguoidung_id
		$manager_news->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$manager_news->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// tieude_tintuc
		$manager_news->tieude_tintuc->AdvancedSearch->SearchValue = @$_GET["x_tieude_tintuc"];
		$manager_news->tieude_tintuc->AdvancedSearch->SearchOperator = @$_GET["z_tieude_tintuc"];

		// tukhoa_tintuc
		$manager_news->tukhoa_tintuc->AdvancedSearch->SearchValue = @$_GET["x_tukhoa_tintuc"];
		$manager_news->tukhoa_tintuc->AdvancedSearch->SearchOperator = @$_GET["z_tukhoa_tintuc"];

		// tomtat_tintuc
		$manager_news->tomtat_tintuc->AdvancedSearch->SearchValue = @$_GET["x_tomtat_tintuc"];
		$manager_news->tomtat_tintuc->AdvancedSearch->SearchOperator = @$_GET["z_tomtat_tintuc"];

		// nguon_tintuc
		$manager_news->nguon_tintuc->AdvancedSearch->SearchValue = @$_GET["x_nguon_tintuc"];
		$manager_news->nguon_tintuc->AdvancedSearch->SearchOperator = @$_GET["z_nguon_tintuc"];

		// noidung_tintuc
		$manager_news->noidung_tintuc->AdvancedSearch->SearchValue = @$_GET["x_noidung_tintuc"];
		$manager_news->noidung_tintuc->AdvancedSearch->SearchOperator = @$_GET["z_noidung_tintuc"];

		// lienket_tintuc
		$manager_news->lienket_tintuc->AdvancedSearch->SearchValue = @$_GET["x_lienket_tintuc"];
		$manager_news->lienket_tintuc->AdvancedSearch->SearchOperator = @$_GET["z_lienket_tintuc"];

		// hienthi_tungay
		$manager_news->hienthi_tungay->AdvancedSearch->SearchValue = @$_GET["x_hienthi_tungay"];
		$manager_news->hienthi_tungay->AdvancedSearch->SearchOperator = @$_GET["z_hienthi_tungay"];
		$manager_news->hienthi_tungay->AdvancedSearch->SearchCondition = @$_GET["v_hienthi_tungay"];
		$manager_news->hienthi_tungay->AdvancedSearch->SearchValue2 = @$_GET["y_hienthi_tungay"];
		$manager_news->hienthi_tungay->AdvancedSearch->SearchOperator2 = @$_GET["w_hienthi_tungay"];

		// hienthi_denngay
		$manager_news->hienthi_denngay->AdvancedSearch->SearchValue = @$_GET["x_hienthi_denngay"];
		$manager_news->hienthi_denngay->AdvancedSearch->SearchOperator = @$_GET["z_hienthi_denngay"];
		$manager_news->hienthi_denngay->AdvancedSearch->SearchCondition = @$_GET["v_hienthi_denngay"];
		$manager_news->hienthi_denngay->AdvancedSearch->SearchValue2 = @$_GET["y_hienthi_denngay"];
		$manager_news->hienthi_denngay->AdvancedSearch->SearchOperator2 = @$_GET["w_hienthi_denngay"];

		// thoigian_them
		$manager_news->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$manager_news->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];

		// thoigian_sua
		$manager_news->thoigian_sua->AdvancedSearch->SearchValue = @$_GET["x_thoigian_sua"];
		$manager_news->thoigian_sua->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_sua"];

		// soluot_truynhap
		$manager_news->soluot_truynhap->AdvancedSearch->SearchValue = @$_GET["x_soluot_truynhap"];
		$manager_news->soluot_truynhap->AdvancedSearch->SearchOperator = @$_GET["z_soluot_truynhap"];

		// xuatban
		$manager_news->xuatban->AdvancedSearch->SearchValue = @$_GET["x_xuatban"];
		$manager_news->xuatban->AdvancedSearch->SearchOperator = @$_GET["z_xuatban"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_news;

		// Call Recordset Selecting event
		$manager_news->Recordset_Selecting($manager_news->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_news->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_news->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_news;
		$sFilter = $manager_news->KeyFilter();

		// Call Row Selecting event
		$manager_news->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_news->CurrentFilter = $sFilter;
		$sSql = $manager_news->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_news->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_news;
		$manager_news->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$manager_news->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$manager_news->ten_congty->setDbValue($rs->fields('ten_congty'));
		$manager_news->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));		
		$manager_news->trang_thai->setDbValue($rs->fields('trang_thai'));
		$manager_news->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$manager_news->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$manager_news->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$manager_news->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$manager_news->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$manager_news->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$manager_news->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$manager_news->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$manager_news->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$manager_news->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$manager_news->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$manager_news->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$manager_news->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_news;

		// Call Row_Rendering event
		$manager_news->Row_Rendering();

		// Common render codes for all row types
		// anh_tintuc

		$manager_news->anh_tintuc->CellCssStyle = "white-space: nowrap;";
		$manager_news->anh_tintuc->CellCssClass = "";

		// ten_congty
		$manager_news->ten_congty->CellCssStyle = "white-space: nowrap;";
		$manager_news->ten_congty->CellCssClass = "";

		// tieude_tintuc
		$manager_news->tieude_tintuc->CellCssStyle = "white-space: nowrap;";
		$manager_news->tieude_tintuc->CellCssClass = "";

		// hienthi_tungay
		$manager_news->hienthi_tungay->CellCssStyle = "white-space: nowrap;";
		$manager_news->hienthi_tungay->CellCssClass = "";

		// hienthi_denngay
		$manager_news->hienthi_denngay->CellCssStyle = "white-space: nowrap;";
		$manager_news->hienthi_denngay->CellCssClass = "";

		// xuatban
		$manager_news->xuatban->CellCssStyle = "white-space: nowrap;";
		$manager_news->xuatban->CellCssClass = "";
		if ($manager_news->RowType == EW_ROWTYPE_VIEW) { // View row

			// anh_tintuc
			if (!is_null($manager_news->anh_tintuc->Upload->DbValue)) {
				$manager_news->anh_tintuc->ViewValue = $manager_news->anh_tintuc->Upload->DbValue;
				$manager_news->anh_tintuc->ImageWidth = 150;
				$manager_news->anh_tintuc->ImageHeight = 0;
				$manager_news->anh_tintuc->ImageAlt = "";
			} else {
				$manager_news->anh_tintuc->ViewValue = "";
			}
			$manager_news->anh_tintuc->CssStyle = "";
			$manager_news->anh_tintuc->CssClass = "";
			$manager_news->anh_tintuc->ViewCustomAttributes = "";

			// ten_congty
			$manager_news->ten_congty->ViewValue = $manager_news->ten_congty->CurrentValue;
			$manager_news->ten_congty->CssStyle = "";
			$manager_news->ten_congty->CssClass = "";
			$manager_news->ten_congty->ViewCustomAttributes = "";

			// tieude_tintuc
			$manager_news->tieude_tintuc->ViewValue = $manager_news->tieude_tintuc->CurrentValue;
			$manager_news->tieude_tintuc->CssStyle = "";
			$manager_news->tieude_tintuc->CssClass = "";
			$manager_news->tieude_tintuc->ViewCustomAttributes = "";

			// hienthi_tungay
			$manager_news->hienthi_tungay->ViewValue = $manager_news->hienthi_tungay->CurrentValue;
			$manager_news->hienthi_tungay->ViewValue = ew_FormatDateTime($manager_news->hienthi_tungay->ViewValue, 7);
			$manager_news->hienthi_tungay->CssStyle = "";
			$manager_news->hienthi_tungay->CssClass = "";
			$manager_news->hienthi_tungay->ViewCustomAttributes = "";

			// hienthi_denngay
			$manager_news->hienthi_denngay->ViewValue = $manager_news->hienthi_denngay->CurrentValue;
			$manager_news->hienthi_denngay->ViewValue = ew_FormatDateTime($manager_news->hienthi_denngay->ViewValue, 7);
			$manager_news->hienthi_denngay->CssStyle = "";
			$manager_news->hienthi_denngay->CssClass = "";
			$manager_news->hienthi_denngay->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_news->xuatban->CurrentValue) <> "") {
				switch ($manager_news->xuatban->CurrentValue) {
					case "0":
						$manager_news->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$manager_news->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_news->xuatban->ViewValue = $manager_news->xuatban->CurrentValue;
				}
			} else {
				$manager_news->xuatban->ViewValue = NULL;
			}
			$manager_news->xuatban->CssStyle = "";
			$manager_news->xuatban->CssClass = "";
			$manager_news->xuatban->ViewCustomAttributes = "";

			// anh_tintuc
			if (!is_null($manager_news->anh_tintuc->Upload->DbValue)) {
				$manager_news->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_news->anh_tintuc->ViewValue)) ? $manager_news->anh_tintuc->ViewValue : $manager_news->anh_tintuc->CurrentValue);
				if ($manager_news->Export <> "") $manager_news->anh_tintuc->HrefValue = ew_ConvertFullUrl($manager_news->anh_tintuc->HrefValue);
			} else {
				$manager_news->anh_tintuc->HrefValue = "";
			}

			// ten_congty
			$manager_news->ten_congty->HrefValue = "";

			// tieude_tintuc
			$manager_news->tieude_tintuc->HrefValue = "";

			// hienthi_tungay
			$manager_news->hienthi_tungay->HrefValue = "";

			// hienthi_denngay
			$manager_news->hienthi_denngay->HrefValue = "";

			// xuatban
			$manager_news->xuatban->HrefValue = "";
		} elseif ($manager_news->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// anh_tintuc
			$manager_news->anh_tintuc->EditCustomAttributes = "";
			if (!is_null($manager_news->anh_tintuc->Upload->DbValue)) {
				$manager_news->anh_tintuc->EditValue = $manager_news->anh_tintuc->Upload->DbValue;
				$manager_news->anh_tintuc->ImageWidth = 150;
				$manager_news->anh_tintuc->ImageHeight = 0;
				$manager_news->anh_tintuc->ImageAlt = "";
			} else {
				$manager_news->anh_tintuc->EditValue = "";
			}

			// ten_congty
			$manager_news->ten_congty->EditCustomAttributes = "";
			$manager_news->ten_congty->EditValue = ew_HtmlEncode($manager_news->ten_congty->AdvancedSearch->SearchValue);

			// tieude_tintuc
			$manager_news->tieude_tintuc->EditCustomAttributes = "";
			$manager_news->tieude_tintuc->EditValue = ew_HtmlEncode($manager_news->tieude_tintuc->AdvancedSearch->SearchValue);

			// hienthi_tungay
			$manager_news->hienthi_tungay->EditCustomAttributes = "";
			$manager_news->hienthi_tungay->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_news->hienthi_tungay->AdvancedSearch->SearchValue, 7), 7));
			$manager_news->hienthi_tungay->EditCustomAttributes = "";
			$manager_news->hienthi_tungay->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_news->hienthi_tungay->AdvancedSearch->SearchValue2, 7), 7));

			// hienthi_denngay
			$manager_news->hienthi_denngay->EditCustomAttributes = "";
			$manager_news->hienthi_denngay->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_news->hienthi_denngay->AdvancedSearch->SearchValue, 7), 7));
			$manager_news->hienthi_denngay->EditCustomAttributes = "";
			$manager_news->hienthi_denngay->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_news->hienthi_denngay->AdvancedSearch->SearchValue2, 7), 7));

			// xuatban
			$manager_news->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_news->xuatban->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$manager_news->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $manager_news;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($manager_news->hienthi_tungay->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay";
		}
		if (!ew_CheckEuroDate($manager_news->hienthi_tungay->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay";
		}
		if (!ew_CheckEuroDate($manager_news->hienthi_denngay->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay";
		}
		if (!ew_CheckEuroDate($manager_news->hienthi_denngay->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay";
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
		global $manager_news;
		$manager_news->tintuc_id->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tintuc_id");
		$manager_news->ten_congty->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_ten_congty");
		$manager_news->hoten_nguoilienhe->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_hoten_nguoilienhe");
		$manager_news->ten_nguoilienhe->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_ten_nguoilienhe");
		$manager_news->trang_thai->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_trang_thai");
		$manager_news->nguoidung_id->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_nguoidung_id");
		$manager_news->tieude_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tieude_tintuc");
		$manager_news->tukhoa_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tukhoa_tintuc");
		$manager_news->tomtat_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_tomtat_tintuc");
		$manager_news->nguon_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_nguon_tintuc");
		$manager_news->noidung_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_noidung_tintuc");
		$manager_news->lienket_tintuc->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_lienket_tintuc");
		$manager_news->hienthi_tungay->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_hienthi_tungay");
		$manager_news->hienthi_tungay->AdvancedSearch->SearchValue2 = $manager_news->getAdvancedSearch("y_hienthi_tungay");
		$manager_news->hienthi_denngay->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_hienthi_denngay");
		$manager_news->hienthi_denngay->AdvancedSearch->SearchValue2 = $manager_news->getAdvancedSearch("y_hienthi_denngay");
		$manager_news->thoigian_them->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_thoigian_them");
		$manager_news->thoigian_sua->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_thoigian_sua");
		$manager_news->soluot_truynhap->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_soluot_truynhap");
		$manager_news->xuatban->AdvancedSearch->SearchValue = $manager_news->getAdvancedSearch("x_xuatban");
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
