<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_adinfo.php" ?>
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
$t_ad_list = new ct_ad_list();
$Page =& $t_ad_list;

// Page init processing
$t_ad_list->Page_Init();

// Page main processing
$t_ad_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_ad->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_ad_list = new ew_Page("t_ad_list");

// page properties
t_ad_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_ad_list.PageID; // for backward compatibility

// extend page with validate function for search
t_ad_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_date_c"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Date C");

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
t_ad_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ad_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ad_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ad_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_ad->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_ad->Export == "" && $t_ad->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_ad_list->LoadRecordset();
	$t_ad_list->lTotalRecs = ($bSelectLimit) ? $t_ad->SelectRecordCount() : $rs->RecordCount();
	$t_ad_list->lStartRec = 1;
	if ($t_ad_list->lDisplayRecs <= 0) // Display all records
		$t_ad_list->lDisplayRecs = $t_ad_list->lTotalRecs;
	if (!($t_ad->ExportAll && $t_ad->Export <> ""))
		$t_ad_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_ad_list->LoadRecordset($t_ad_list->lStartRec-1, $t_ad_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_adlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản trị rao vặt</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
</span></p>
<?php if ($t_ad->Export == "" && $t_ad->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_ad_list);" style="text-decoration: none;"><img id="t_ad_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_ad_list_SearchPanel">
<form name="ft_adlistsrch" id="ft_adlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_ad_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_ad">
<?php
if ($gsSearchError == "")
	$t_ad_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_ad->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_ad_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Chuyên mục</span></td>
		<td><span class="ewSearchOpr">=<input type="hidden" name="z_cat_ID" id="z_cat_ID" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_cat_ID" name="x_cat_ID"<?php echo $t_ad->cat_ID->EditAttributes() ?>>
<?php
if (is_array($t_ad->cat_ID->EditValue)) {
	$arwrk = $t_ad->cat_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_ad->cat_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Ngày tạo</span></td>
		<td><span class="ewSearchOpr">Từ<input type="hidden" name="z_date_c" id="z_date_c" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_date_c" id="x_date_c" value="<?php echo $t_ad->date_c->EditValue ?>"<?php echo $t_ad->date_c->EditAttributes() ?>>&nbsp;<img src="images/calendar.png" id="cal_x_date_cread_time" name="cal_x_date_cread_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_date_c", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_date_cread_time" // ID of the button
});
</script>
                                </td>
				<td><span class="ewSearchOpr" id="btw1_date_c" name="btw1_date_c">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_date_c" name="btw1_date_c">
<input type="text" name="y_date_c" id="y_date_c" value="<?php echo $t_ad->date_c->EditValue2 ?>"<?php echo $t_ad->date_c->EditAttributes() ?>><img src="images/calendar.png" id="cal_y_date_ccread_time" name="cal_y_date_ccread_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_date_c", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_date_ccread_time" // ID of the button
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_ad->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_ad_list->PageUrl() ?>cmd=reset">Hiện hết</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_ad->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_ad->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_ad->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_ad_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_ad->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_ad->CurrentAction <> "gridadd" && $t_ad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ad_list->Pager)) $t_ad_list->Pager = new cNumericPager($t_ad_list->lStartRec, $t_ad_list->lDisplayRecs, $t_ad_list->lTotalRecs, $t_ad_list->lRecRange) ?>
<?php if ($t_ad_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_ad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_ad_list->Pager->FromIndex ?> tới <?php echo $t_ad_list->Pager->ToIndex ?> trong <?php echo $t_ad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_ad_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
        Không có bản ghi nào
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_ad_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_ad">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_ad_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_ad_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_ad_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_ad->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_ad->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_ad_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_adlist)) alert('No records selected'); else {document.ft_adlist.action='t_addelete.php';document.ft_adlist.encoding='application/x-www-form-urlencoded';document.ft_adlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_adlist" id="ft_adlist" class="ewForm" action="" method="post">
<?php if ($t_ad_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_ad_list->lOptionCnt = 0;
	$t_ad_list->lOptionCnt++; // view
	$t_ad_list->lOptionCnt++; // edit
	$t_ad_list->lOptionCnt++; // copy
	$t_ad_list->lOptionCnt++; // Multi-select
	$t_ad_list->lOptionCnt += count($t_ad_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_ad->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_ad->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_ad_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_ad_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_ad->cat_ID->Visible) { // cat_ID ?>
	<?php if ($t_ad->SortUrl($t_ad->cat_ID) == "") { ?>
		<td>Chuyên mục</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ad->SortUrl($t_ad->cat_ID) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Chuyên mục</td><td style="width: 10px;"><?php if ($t_ad->cat_ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ad->cat_ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_ad->Title->Visible) { // Title ?>
	<?php if ($t_ad->SortUrl($t_ad->Title) == "") { ?>
		<td>Tiêu đề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ad->SortUrl($t_ad->Title) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_ad->Title->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ad->Title->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_ad->date_c->Visible) { // date_c ?>
	<?php if ($t_ad->SortUrl($t_ad->date_c) == "") { ?>
		<td>Ngày tạo</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ad->SortUrl($t_ad->date_c) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày tạo</td><td style="width: 10px;"><?php if ($t_ad->date_c->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ad->date_c->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_ad->status->Visible) { // status ?>
	<?php if ($t_ad->SortUrl($t_ad->status) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ad->SortUrl($t_ad->status) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Status</td><td style="width: 10px;"><?php if ($t_ad->status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ad->status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_ad->n_click->Visible) { // n_click ?>
	<?php if ($t_ad->SortUrl($t_ad->n_click) == "") { ?>
		<td>Lượt xem</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ad->SortUrl($t_ad->n_click) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>N Click</td><td style="width: 10px;"><?php if ($t_ad->n_click->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ad->n_click->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_ad->ExportAll && $t_ad->Export <> "") {
	$t_ad_list->lStopRec = $t_ad_list->lTotalRecs;
} else {
	$t_ad_list->lStopRec = $t_ad_list->lStartRec + $t_ad_list->lDisplayRecs - 1; // Set the last record to display
}
$t_ad_list->lRecCount = $t_ad_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_ad->SelectLimit && $t_ad_list->lStartRec > 1)
		$rs->Move($t_ad_list->lStartRec - 1);
}
$t_ad_list->lRowCnt = 0;
while (($t_ad->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_ad_list->lRecCount < $t_ad_list->lStopRec) {
	$t_ad_list->lRecCount++;
	if (intval($t_ad_list->lRecCount) >= intval($t_ad_list->lStartRec)) {
		$t_ad_list->lRowCnt++;

	// Init row class and style
	$t_ad->CssClass = "";
	$t_ad->CssStyle = "";
	$t_ad->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_ad->CurrentAction == "gridadd") {
		$t_ad_list->LoadDefaultValues(); // Load default values
	} else {
		$t_ad_list->LoadRowValues($rs); // Load row values
	}
	$t_ad->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_ad_list->RenderRow();
?>
	<tr<?php echo $t_ad->RowAttributes() ?>>
<?php if ($t_ad->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_ad->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_ad->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_ad->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_ad->ad_ID->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_ad_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_ad->cat_ID->Visible) { // cat_ID ?>
		<td<?php echo $t_ad->cat_ID->CellAttributes() ?>>
<div<?php echo $t_ad->cat_ID->ViewAttributes() ?>><?php echo $t_ad->cat_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_ad->Title->Visible) { // Title ?>
		<td<?php echo $t_ad->Title->CellAttributes() ?>>
<div<?php echo $t_ad->Title->ViewAttributes() ?>><?php echo $t_ad->Title->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_ad->date_c->Visible) { // date_c ?>
		<td<?php echo $t_ad->date_c->CellAttributes() ?>>
<div<?php echo $t_ad->date_c->ViewAttributes() ?>><?php echo $t_ad->date_c->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_ad->status->Visible) { // status ?>
		<td<?php echo $t_ad->status->CellAttributes() ?>>
<div<?php echo $t_ad->status->ViewAttributes() ?>><?php echo $t_ad->status->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_ad->n_click->Visible) { // n_click ?>
		<td<?php echo $t_ad->n_click->CellAttributes() ?>>
<div<?php echo $t_ad->n_click->ViewAttributes() ?>><?php echo $t_ad->n_click->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_ad->CurrentAction <> "gridadd")
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
<?php if ($t_ad_list->lTotalRecs > 0) { ?>
<?php if ($t_ad->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_ad->CurrentAction <> "gridadd" && $t_ad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ad_list->Pager)) $t_ad_list->Pager = new cNumericPager($t_ad_list->lStartRec, $t_ad_list->lDisplayRecs, $t_ad_list->lTotalRecs, $t_ad_list->lRecRange) ?>
<?php if ($t_ad_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_ad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ad_list->PageUrl() ?>start=<?php echo $t_ad_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_ad_list->Pager->FromIndex ?> tới <?php echo $t_ad_list->Pager->ToIndex ?> trong <?php echo $t_ad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_ad_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không tìm thấy bản ghi nào!
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_ad_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_ad">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_ad_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_ad_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_ad_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_ad->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_ad_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_ad->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_ad_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_adlist)) alert('No records selected'); else {document.ft_adlist.action='t_addelete.php';document.ft_adlist.encoding='application/x-www-form-urlencoded';document.ft_adlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_ad->Export == "" && $t_ad->CurrentAction == "") { ?>
<script type="text/javascript"><
!--

//ew_ToggleSearchPanel(t_ad_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_ad->Export == "") { ?>
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
class ct_ad_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_ad';

	// Page Object Name
	var $PageObjName = 't_ad_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ad;
		if ($t_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_ad;
		if ($t_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_ad_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_ad"] = new ct_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_ad;
	$t_ad->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_ad->Export; // Get export parameter, used in header
	$gsExportFile = $t_ad->TableVar; // Get export file, used in header
	if ($t_ad->Export == "print" || $t_ad->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_ad->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_ad->Export == "word") {
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
		global $objForm, $gsSearchError, $Security, $t_ad;
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
		if ($t_ad->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_ad->getRecordsPerPage(); // Restore from Session
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
		$t_ad->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_ad->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_ad->setStartRecordNumber($this->lStartRec);
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
		$t_ad->setSessionWhere($sFilter);
		$t_ad->CurrentFilter = "";

		// Export data only
		if (in_array($t_ad->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_ad;
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
			$t_ad->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_ad;
		$sWhere = "";
		$this->BuildSearchSql($sWhere, $t_ad->ad_ID, FALSE); // Field ad_ID
		$this->BuildSearchSql($sWhere, $t_ad->cat_ID, FALSE); // Field cat_ID
		$this->BuildSearchSql($sWhere, $t_ad->Title, FALSE); // Field Title
		$this->BuildSearchSql($sWhere, $t_ad->content, FALSE); // Field content
		$this->BuildSearchSql($sWhere, $t_ad->date_c, FALSE); // Field date_c
		$this->BuildSearchSql($sWhere, $t_ad->zemail, FALSE); // Field email
		$this->BuildSearchSql($sWhere, $t_ad->name, FALSE); // Field name
		$this->BuildSearchSql($sWhere, $t_ad->phone, FALSE); // Field phone
		$this->BuildSearchSql($sWhere, $t_ad->status, FALSE); // Field status
		$this->BuildSearchSql($sWhere, $t_ad->n_click, FALSE); // Field n_click

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_ad->ad_ID); // Field ad_ID
			$this->SetSearchParm($t_ad->cat_ID); // Field cat_ID
			$this->SetSearchParm($t_ad->Title); // Field Title
			$this->SetSearchParm($t_ad->content); // Field content
			$this->SetSearchParm($t_ad->date_c); // Field date_c
			$this->SetSearchParm($t_ad->zemail); // Field email
			$this->SetSearchParm($t_ad->name); // Field name
			$this->SetSearchParm($t_ad->phone); // Field phone
			$this->SetSearchParm($t_ad->status); // Field status
			$this->SetSearchParm($t_ad->n_click); // Field n_click
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
		global $t_ad;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_ad->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_ad->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_ad->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_ad->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_ad->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $t_ad;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_ad->Title->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_ad->content->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_ad->zemail->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_ad->name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_ad->phone->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_ad;
		$sSearchStr = "";
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
			$t_ad->setBasicSearchKeyword($sSearchKeyword);
			$t_ad->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_ad;
		$this->sSrchWhere = "";
		$t_ad->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_ad;
		$t_ad->setBasicSearchKeyword("");
		$t_ad->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_ad;
		$t_ad->setAdvancedSearch("x_ad_ID", "");
		$t_ad->setAdvancedSearch("x_cat_ID", "");
		$t_ad->setAdvancedSearch("x_Title", "");
		$t_ad->setAdvancedSearch("x_content", "");
		$t_ad->setAdvancedSearch("x_date_c", "");
		$t_ad->setAdvancedSearch("y_date_c", "");
		$t_ad->setAdvancedSearch("x_zemail", "");
		$t_ad->setAdvancedSearch("x_name", "");
		$t_ad->setAdvancedSearch("x_phone", "");
		$t_ad->setAdvancedSearch("x_status", "");
		$t_ad->setAdvancedSearch("x_n_click", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_ad;
		$this->sSrchWhere = $t_ad->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_ad;
		 $t_ad->ad_ID->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_ad_ID");
		 $t_ad->cat_ID->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_cat_ID");
		 $t_ad->Title->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_Title");
		 $t_ad->content->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_content");
		 $t_ad->date_c->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_date_c");
		 $t_ad->date_c->AdvancedSearch->SearchValue2 = $t_ad->getAdvancedSearch("y_date_c");
		 $t_ad->zemail->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_zemail");
		 $t_ad->name->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_name");
		 $t_ad->phone->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_phone");
		 $t_ad->status->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_status");
		 $t_ad->n_click->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_n_click");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_ad;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_ad->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_ad->CurrentOrderType = @$_GET["ordertype"];
			$t_ad->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_ad;
		$sOrderBy = $t_ad->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_ad->SqlOrderBy() <> "") {
				$sOrderBy = $t_ad->SqlOrderBy();
				$t_ad->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_ad;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_ad->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_ad;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_ad->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_ad->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_ad->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_ad->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_ad->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_ad;

		// Load search values
		// ad_ID

		$t_ad->ad_ID->AdvancedSearch->SearchValue = @$_GET["x_ad_ID"];
		$t_ad->ad_ID->AdvancedSearch->SearchOperator = @$_GET["z_ad_ID"];

		// cat_ID
		$t_ad->cat_ID->AdvancedSearch->SearchValue = @$_GET["x_cat_ID"];
		$t_ad->cat_ID->AdvancedSearch->SearchOperator = @$_GET["z_cat_ID"];

		// Title
		$t_ad->Title->AdvancedSearch->SearchValue = @$_GET["x_Title"];
		$t_ad->Title->AdvancedSearch->SearchOperator = @$_GET["z_Title"];

		// content
		$t_ad->content->AdvancedSearch->SearchValue = @$_GET["x_content"];
		$t_ad->content->AdvancedSearch->SearchOperator = @$_GET["z_content"];

		// date_c
		$t_ad->date_c->AdvancedSearch->SearchValue = @$_GET["x_date_c"];
		$t_ad->date_c->AdvancedSearch->SearchOperator = @$_GET["z_date_c"];
		$t_ad->date_c->AdvancedSearch->SearchCondition = @$_GET["v_date_c"];
		$t_ad->date_c->AdvancedSearch->SearchValue2 = @$_GET["y_date_c"];
		$t_ad->date_c->AdvancedSearch->SearchOperator2 = @$_GET["w_date_c"];

		// email
		$t_ad->zemail->AdvancedSearch->SearchValue = @$_GET["x_zemail"];
		$t_ad->zemail->AdvancedSearch->SearchOperator = @$_GET["z_zemail"];

		// name
		$t_ad->name->AdvancedSearch->SearchValue = @$_GET["x_name"];
		$t_ad->name->AdvancedSearch->SearchOperator = @$_GET["z_name"];

		// phone
		$t_ad->phone->AdvancedSearch->SearchValue = @$_GET["x_phone"];
		$t_ad->phone->AdvancedSearch->SearchOperator = @$_GET["z_phone"];

		// status
		$t_ad->status->AdvancedSearch->SearchValue = @$_GET["x_status"];
		$t_ad->status->AdvancedSearch->SearchOperator = @$_GET["z_status"];

		// n_click
		$t_ad->n_click->AdvancedSearch->SearchValue = @$_GET["x_n_click"];
		$t_ad->n_click->AdvancedSearch->SearchOperator = @$_GET["z_n_click"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_ad;

		// Call Recordset Selecting event
		$t_ad->Recordset_Selecting($t_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $t_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ad;
		$sFilter = $t_ad->KeyFilter();

		// Call Row Selecting event
		$t_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_ad->CurrentFilter = $sFilter;
		$sSql = $t_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_ad;
		$t_ad->ad_ID->setDbValue($rs->fields('ad_ID'));
		$t_ad->cat_ID->setDbValue($rs->fields('cat_ID'));
		$t_ad->Title->setDbValue($rs->fields('Title'));
		$t_ad->content->setDbValue($rs->fields('content'));
		$t_ad->date_c->setDbValue($rs->fields('date_c'));
		$t_ad->zemail->setDbValue($rs->fields('email'));
		$t_ad->name->setDbValue($rs->fields('name'));
		$t_ad->phone->setDbValue($rs->fields('phone'));
		$t_ad->status->setDbValue($rs->fields('status'));
		$t_ad->n_click->setDbValue($rs->fields('n_click'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_ad;

		// Call Row_Rendering event
		$t_ad->Row_Rendering();

		// Common render codes for all row types
		// cat_ID

		$t_ad->cat_ID->CellCssStyle = "";
		$t_ad->cat_ID->CellCssClass = "";

		// Title
		$t_ad->Title->CellCssStyle = "";
		$t_ad->Title->CellCssClass = "";

		// date_c
		$t_ad->date_c->CellCssStyle = "";
		$t_ad->date_c->CellCssClass = "";

		// status
		$t_ad->status->CellCssStyle = "";
		$t_ad->status->CellCssClass = "";

		// n_click
		$t_ad->n_click->CellCssStyle = "";
		$t_ad->n_click->CellCssClass = "";
		if ($t_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_ID
			$t_ad->ad_ID->ViewValue = $t_ad->ad_ID->CurrentValue;
			$t_ad->ad_ID->CssStyle = "";
			$t_ad->ad_ID->CssClass = "";
			$t_ad->ad_ID->ViewCustomAttributes = "";

			// cat_ID
			if (strval($t_ad->cat_ID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_ad->cat_ID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_ad->cat_ID->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_ad->cat_ID->ViewValue = $t_ad->cat_ID->CurrentValue;
				}
			} else {
				$t_ad->cat_ID->ViewValue = NULL;
			}
			$t_ad->cat_ID->CssStyle = "";
			$t_ad->cat_ID->CssClass = "";
			$t_ad->cat_ID->ViewCustomAttributes = "";

			// Title
			$t_ad->Title->ViewValue = $t_ad->Title->CurrentValue;
			$t_ad->Title->CssStyle = "";
			$t_ad->Title->CssClass = "";
			$t_ad->Title->ViewCustomAttributes = "";

			// date_c
			$t_ad->date_c->ViewValue = $t_ad->date_c->CurrentValue;
			$t_ad->date_c->ViewValue = ew_FormatDateTime($t_ad->date_c->ViewValue, 7);
			$t_ad->date_c->CssStyle = "";
			$t_ad->date_c->CssClass = "";
			$t_ad->date_c->ViewCustomAttributes = "";

			// phone
			$t_ad->phone->ViewValue = $t_ad->phone->CurrentValue;
			$t_ad->phone->CssStyle = "";
			$t_ad->phone->CssClass = "";
			$t_ad->phone->ViewCustomAttributes = "";

			// status
			if (strval($t_ad->status->CurrentValue) <> "") {
				switch ($t_ad->status->CurrentValue) {
					case "0":
						$t_ad->status->ViewValue = "Chưa duyệt";
						break;
					case "1":
						$t_ad->status->ViewValue = "Đã duyệt";
						break;
					default:
						$t_ad->status->ViewValue = $t_ad->status->CurrentValue;
				}
			} else {
				$t_ad->status->ViewValue = NULL;
			}
			$t_ad->status->CssStyle = "";
			$t_ad->status->CssClass = "";
			$t_ad->status->ViewCustomAttributes = "";

			// n_click
			$t_ad->n_click->ViewValue = $t_ad->n_click->CurrentValue;
			$t_ad->n_click->CssStyle = "";
			$t_ad->n_click->CssClass = "";
			$t_ad->n_click->ViewCustomAttributes = "";

			// cat_ID
			$t_ad->cat_ID->HrefValue = "";

			// Title
			$t_ad->Title->HrefValue = "";

			// date_c
			$t_ad->date_c->HrefValue = "";

			// status
			$t_ad->status->HrefValue = "";

			// n_click
			$t_ad->n_click->HrefValue = "";
		} elseif ($t_ad->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// cat_ID
			$t_ad->cat_ID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `ad_catID`, `name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_cat_ad`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Please Select"));
			$t_ad->cat_ID->EditValue = $arwrk;

			// Title
			$t_ad->Title->EditCustomAttributes = "";
			$t_ad->Title->EditValue = ew_HtmlEncode($t_ad->Title->AdvancedSearch->SearchValue);

			// date_c
			$t_ad->date_c->EditCustomAttributes = "";
			$t_ad->date_c->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_ad->date_c->AdvancedSearch->SearchValue, 7), 7));
			$t_ad->date_c->EditCustomAttributes = "";
			$t_ad->date_c->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_ad->date_c->AdvancedSearch->SearchValue2, 7), 7));

			// status
			$t_ad->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa duyệt");
			$arwrk[] = array("1", "Đã duyệt");
			array_unshift($arwrk, array("", "Please Select"));
			$t_ad->status->EditValue = $arwrk;

			// n_click
			$t_ad->n_click->EditCustomAttributes = "";
			$t_ad->n_click->EditValue = ew_HtmlEncode($t_ad->n_click->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$t_ad->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_ad;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($t_ad->date_c->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Date C";
		}
		if (!ew_CheckEuroDate($t_ad->date_c->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Date C";
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
		global $t_ad;
		$t_ad->ad_ID->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_ad_ID");
		$t_ad->cat_ID->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_cat_ID");
		$t_ad->Title->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_Title");
		$t_ad->content->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_content");
		$t_ad->date_c->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_date_c");
		$t_ad->date_c->AdvancedSearch->SearchValue2 = $t_ad->getAdvancedSearch("y_date_c");
		$t_ad->zemail->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_zemail");
		$t_ad->name->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_name");
		$t_ad->phone->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_phone");
		$t_ad->status->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_status");
		$t_ad->n_click->AdvancedSearch->SearchValue = $t_ad->getAdvancedSearch("x_n_click");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_ad;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($t_ad->ExportAll) {
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
		if ($t_ad->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_ad->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_ad->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'ad_ID', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'cat_ID', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'date_c', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'phone', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'status', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'n_click', $t_ad->Export);
				echo ew_ExportLine($sExportStr, $t_ad->Export);
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
				$t_ad->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_ad->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('ad_ID', $t_ad->ad_ID->CurrentValue);
					$XmlDoc->AddField('cat_ID', $t_ad->cat_ID->CurrentValue);
					$XmlDoc->AddField('date_c', $t_ad->date_c->CurrentValue);
					$XmlDoc->AddField('phone', $t_ad->phone->CurrentValue);
					$XmlDoc->AddField('status', $t_ad->status->CurrentValue);
					$XmlDoc->AddField('n_click', $t_ad->n_click->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_ad->Export <> "csv") { // Vertical format
						echo ew_ExportField('ad_ID', $t_ad->ad_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('cat_ID', $t_ad->cat_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('date_c', $t_ad->date_c->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('phone', $t_ad->phone->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('status', $t_ad->status->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('n_click', $t_ad->n_click->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_ad->ad_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->cat_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->date_c->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->phone->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->status->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->n_click->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportLine($sExportStr, $t_ad->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_ad->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_ad->Export);
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
