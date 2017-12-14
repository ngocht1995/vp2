<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_messagesinfo.php" ?>
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
$t_messages_list = new ct_messages_list();
$Page =& $t_messages_list;

// Page init processing
$t_messages_list->Page_Init();

// Page main processing
$t_messages_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_messages->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_messages_list = new ew_Page("t_messages_list");

// page properties
t_messages_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_messages_list.PageID; // for backward compatibility

// extend page with validate function for search
t_messages_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_Datetime_C"];
	if (elm && !ew_CheckUSDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = mm/dd/yyyy - Datetime C");

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
t_messages_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_messages_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_messages_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_messages_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_messages->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_messages->Export == "" && $t_messages->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_messages_list->LoadRecordset();
	$t_messages_list->lTotalRecs = ($bSelectLimit) ? $t_messages->SelectRecordCount() : $rs->RecordCount();
	$t_messages_list->lStartRec = 1;
	if ($t_messages_list->lDisplayRecs <= 0) // Display all records
		$t_messages_list->lDisplayRecs = $t_messages_list->lTotalRecs;
	if (!($t_messages->ExportAll && $t_messages->Export <> ""))
		$t_messages_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_messages_list->LoadRecordset($t_messages_list->lStartRec-1, $t_messages_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục thông báo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($t_messages->Export == "" && $t_messages->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_messages_list);" style="text-decoration: none;"><img id="t_messages_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_messages_list_SearchPanel">
<form name="ft_messageslistsrch" id="ft_messageslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_messages_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_messages">
<?php
if ($gsSearchError == "")
	$t_messages_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_messages->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_messages_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Tiêu đề</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_Name" id="z_Name" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_Name" id="x_Name" size="30" maxlength="255" value="<?php echo $t_messages->Name->EditValue ?>"<?php echo $t_messages->Name->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Xuất bản</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_Public" id="z_Public" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_Public" name="x_Public"<?php echo $t_messages->Public->EditAttributes() ?>>
<?php
if (is_array($t_messages->Public->EditValue)) {
	$arwrk = $t_messages->Public->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_messages->Public->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="ewSearchOpr">từ<input type="hidden" name="z_Datetime_C" id="z_Datetime_C" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_Datetime_C" id="x_Datetime_C" value="<?php echo $t_messages->Datetime_C->EditValue ?>"<?php echo $t_messages->Datetime_C->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_Datetime_C" name="cal_x_Datetime_C" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_Datetime_C", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_Datetime_C" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_Datetime_C" name="btw1_Datetime_C">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_Datetime_C" name="btw1_Datetime_C">
<input type="text" name="y_Datetime_C" id="y_Datetime_C" value="<?php echo $t_messages->Datetime_C->EditValue2 ?>"<?php echo $t_messages->Datetime_C->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_Datetime_C" name="cal_y_Datetime_C" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_Datetime_C", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_Datetime_C" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Nguồn</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_Source" id="z_Source" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_Source" id="x_Source" value="<?php echo $t_messages->Source->EditValue ?>"<?php echo $t_messages->Source->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_messages->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $t_messages_list->PageUrl() ?>cmd=reset">Hiện hết</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_messages->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_messages->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_messages->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_messages_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_messages->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_messages->CurrentAction <> "gridadd" && $t_messages->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_messages_list->Pager)) $t_messages_list->Pager = new cPrevNextPager($t_messages_list->lStartRec, $t_messages_list->lDisplayRecs, $t_messages_list->lTotalRecs) ?>
<?php if ($t_messages_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_messages_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_messages_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_messages_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_messages_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_messages_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_messages_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Bản ghi <?php echo $t_messages_list->Pager->FromIndex ?> tới <?php echo $t_messages_list->Pager->ToIndex ?> thuộc <?php echo $t_messages_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($t_messages_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Nhập tiêu trí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không tìm thấy bản ghi</span>
	<?php } ?>
<?php } ?>
		</td>
<?php if ($t_messages_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_messages">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_messages_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_messages_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_messages_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_messages_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_messages_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_messages->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_messages->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_messages_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_messageslist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_messages_list->sDeleteConfirmMsg ?>')) {document.ft_messageslist.action='t_messagesdelete.php';document.ft_messageslist.encoding='application/x-www-form-urlencoded';document.ft_messageslist.submit();};return false;">Xóa bản ghi đã  chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_messageslist" id="ft_messageslist" class="ewForm" action="" method="post">
<?php if ($t_messages_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_messages_list->lOptionCnt = 0;
	$t_messages_list->lOptionCnt++; // view
	$t_messages_list->lOptionCnt++; // edit
	$t_messages_list->lOptionCnt++; // copy
	$t_messages_list->lOptionCnt++; // Multi-select
	$t_messages_list->lOptionCnt += count($t_messages_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_messages->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_messages->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_messages_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_messages_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_messages->Name->Visible) { // Name ?>
	<?php if ($t_messages->SortUrl($t_messages->Name) == "") { ?>
		<td>Tiêu đề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_messages->SortUrl($t_messages->Name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề</td><td style="width: 10px;"><?php if ($t_messages->Name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_messages->Name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_messages->Public->Visible) { // Public ?>
	<?php if ($t_messages->SortUrl($t_messages->Public) == "") { ?>
		<td>Xuất bản</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_messages->SortUrl($t_messages->Public) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($t_messages->Public->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_messages->Public->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_messages->Datetime_C->Visible) { // Datetime_C ?>
	<?php if ($t_messages->SortUrl($t_messages->Datetime_C) == "") { ?>
		<td>Ngày tạo</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_messages->SortUrl($t_messages->Datetime_C) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày tạo</td><td style="width: 10px;"><?php if ($t_messages->Datetime_C->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_messages->Datetime_C->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_messages->Source->Visible) { // Source ?>
	<?php if ($t_messages->SortUrl($t_messages->Source) == "") { ?>
		<td>Nguồn</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_messages->SortUrl($t_messages->Source) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Nguồn</td><td style="width: 10px;"><?php if ($t_messages->Source->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_messages->Source->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_messages->ExportAll && $t_messages->Export <> "") {
	$t_messages_list->lStopRec = $t_messages_list->lTotalRecs;
} else {
	$t_messages_list->lStopRec = $t_messages_list->lStartRec + $t_messages_list->lDisplayRecs - 1; // Set the last record to display
}
$t_messages_list->lRecCount = $t_messages_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_messages->SelectLimit && $t_messages_list->lStartRec > 1)
		$rs->Move($t_messages_list->lStartRec - 1);
}
$t_messages_list->lRowCnt = 0;
while (($t_messages->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_messages_list->lRecCount < $t_messages_list->lStopRec) {
	$t_messages_list->lRecCount++;
	if (intval($t_messages_list->lRecCount) >= intval($t_messages_list->lStartRec)) {
		$t_messages_list->lRowCnt++;

	// Init row class and style
	$t_messages->CssClass = "";
	$t_messages->CssStyle = "";
	$t_messages->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_messages->CurrentAction == "gridadd") {
		$t_messages_list->LoadDefaultValues(); // Load default values
	} else {
		$t_messages_list->LoadRowValues($rs); // Load row values
	}
	$t_messages->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_messages_list->RenderRow();
?>
	<tr<?php echo $t_messages->RowAttributes() ?>>
<?php if ($t_messages->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_messages->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_messages->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_messages->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_messages->Id_Messages->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_messages_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_messages->Name->Visible) { // Name ?>
		<td<?php echo $t_messages->Name->CellAttributes() ?>>
<div<?php echo $t_messages->Name->ViewAttributes() ?>><?php echo $t_messages->Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_messages->Public->Visible) { // Public ?>
		<td<?php echo $t_messages->Public->CellAttributes() ?>>
<div<?php echo $t_messages->Public->ViewAttributes() ?>><?php echo $t_messages->Public->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_messages->Datetime_C->Visible) { // Datetime_C ?>
		<td<?php echo $t_messages->Datetime_C->CellAttributes() ?>>
<div<?php echo $t_messages->Datetime_C->ViewAttributes() ?>><?php echo $t_messages->Datetime_C->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_messages->Source->Visible) { // Source ?>
		<td<?php echo $t_messages->Source->CellAttributes() ?>>
<div<?php echo $t_messages->Source->ViewAttributes() ?>><?php echo $t_messages->Source->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_messages->CurrentAction <> "gridadd")
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
<?php if ($t_messages_list->lTotalRecs > 0) { ?>
<?php if ($t_messages->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_messages->CurrentAction <> "gridadd" && $t_messages->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_messages_list->Pager)) $t_messages_list->Pager = new cPrevNextPager($t_messages_list->lStartRec, $t_messages_list->lDisplayRecs, $t_messages_list->lTotalRecs) ?>
<?php if ($t_messages_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_messages_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_messages_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_messages_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_messages_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_messages_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_list->PageUrl() ?>start=<?php echo $t_messages_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_messages_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Bản ghi <?php echo $t_messages_list->Pager->FromIndex ?> tới <?php echo $t_messages_list->Pager->ToIndex ?> trong <?php echo $t_messages_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($t_messages_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Nhập tiêu trí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không tìm thấy bản ghi</span>
	<?php } ?>
<?php } ?>
		</td>
<?php if ($t_messages_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_messages">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_messages_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_messages_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_messages_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_messages_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_messages_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_messages->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_messages_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_messages->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_messages_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_messageslist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_messages_list->sDeleteConfirmMsg ?>')) {document.ft_messageslist.action='t_messagesdelete.php';document.ft_messageslist.encoding='application/x-www-form-urlencoded';document.ft_messageslist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_messages->Export == "" && $t_messages->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_messages_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_messages->Export == "") { ?>
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
class ct_messages_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_messages';

	// Page Object Name
	var $PageObjName = 't_messages_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_messages;
		if ($t_messages->UseTokenInUrl) $PageUrl .= "t=" . $t_messages->TableVar . "&"; // add page token
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
		global $objForm, $t_messages;
		if ($t_messages->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_messages->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_messages->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_messages_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_messages"] = new ct_messages();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_messages', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_messages;
	$t_messages->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_messages->Export; // Get export parameter, used in header
	$gsExportFile = $t_messages->TableVar; // Get export file, used in header
	if ($t_messages->Export == "print" || $t_messages->Export == "html") {

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
		global $objForm, $gsSearchError, $Security, $t_messages;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
		$this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn hay ko?"; // Delete confirm message

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
		if ($t_messages->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_messages->getRecordsPerPage(); // Restore from Session
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
		$t_messages->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_messages->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_messages->setStartRecordNumber($this->lStartRec);
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
		$t_messages->setSessionWhere($sFilter);
		$t_messages->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_messages;
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
			$t_messages->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_messages->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_messages;
		$sWhere = "";
		$this->BuildSearchSql($sWhere, $t_messages->Id_Messages, FALSE); // Field Id_Messages
		$this->BuildSearchSql($sWhere, $t_messages->Name, FALSE); // Field Name
		$this->BuildSearchSql($sWhere, $t_messages->Content, FALSE); // Field Content
		$this->BuildSearchSql($sWhere, $t_messages->Public, FALSE); // Field Public
		$this->BuildSearchSql($sWhere, $t_messages->Datetime_C, FALSE); // Field Datetime_C
		$this->BuildSearchSql($sWhere, $t_messages->Source, FALSE); // Field Source

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_messages->Id_Messages); // Field Id_Messages
			$this->SetSearchParm($t_messages->Name); // Field Name
			$this->SetSearchParm($t_messages->Content); // Field Content
			$this->SetSearchParm($t_messages->Public); // Field Public
			$this->SetSearchParm($t_messages->Datetime_C); // Field Datetime_C
			$this->SetSearchParm($t_messages->Source); // Field Source
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
		global $t_messages;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_messages->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_messages->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_messages->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_messages->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_messages->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $t_messages;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_messages->Name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_messages->Doc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_messages->Source->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_messages;
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
			$t_messages->setBasicSearchKeyword($sSearchKeyword);
			$t_messages->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_messages;
		$this->sSrchWhere = "";
		$t_messages->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_messages;
		$t_messages->setBasicSearchKeyword("");
		$t_messages->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_messages;
		$t_messages->setAdvancedSearch("x_Id_Messages", "");
		$t_messages->setAdvancedSearch("x_Name", "");
		$t_messages->setAdvancedSearch("x_Content", "");
		$t_messages->setAdvancedSearch("x_Public", "");
		$t_messages->setAdvancedSearch("x_Datetime_C", "");
		$t_messages->setAdvancedSearch("y_Datetime_C", "");
		$t_messages->setAdvancedSearch("x_Source", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_messages;
		$this->sSrchWhere = $t_messages->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_messages;
		 $t_messages->Id_Messages->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Id_Messages");
		 $t_messages->Name->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Name");
		 $t_messages->Content->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Content");
		 $t_messages->Public->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Public");
		 $t_messages->Datetime_C->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Datetime_C");
		 $t_messages->Datetime_C->AdvancedSearch->SearchValue2 = $t_messages->getAdvancedSearch("y_Datetime_C");
		 $t_messages->Source->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Source");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_messages;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_messages->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_messages->CurrentOrderType = @$_GET["ordertype"];
			$t_messages->UpdateSort($t_messages->Name); // Field 
			$t_messages->UpdateSort($t_messages->Public); // Field 
			$t_messages->UpdateSort($t_messages->Datetime_C); // Field 
			$t_messages->UpdateSort($t_messages->Source); // Field 
			$t_messages->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_messages;
		$sOrderBy = $t_messages->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_messages->SqlOrderBy() <> "") {
				$sOrderBy = $t_messages->SqlOrderBy();
				$t_messages->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_messages;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_messages->setSessionOrderBy($sOrderBy);
				$t_messages->Name->setSort("");
				$t_messages->Public->setSort("");
				$t_messages->Datetime_C->setSort("");
				$t_messages->Source->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_messages->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_messages;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_messages->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_messages->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_messages->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_messages->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_messages->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_messages->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_messages;

		// Load search values
		// Id_Messages

		$t_messages->Id_Messages->AdvancedSearch->SearchValue = @$_GET["x_Id_Messages"];
		$t_messages->Id_Messages->AdvancedSearch->SearchOperator = @$_GET["z_Id_Messages"];

		// Name
		$t_messages->Name->AdvancedSearch->SearchValue = @$_GET["x_Name"];
		$t_messages->Name->AdvancedSearch->SearchOperator = @$_GET["z_Name"];

		// Content
		$t_messages->Content->AdvancedSearch->SearchValue = @$_GET["x_Content"];
		$t_messages->Content->AdvancedSearch->SearchOperator = @$_GET["z_Content"];

		// Public
		$t_messages->Public->AdvancedSearch->SearchValue = @$_GET["x_Public"];
		$t_messages->Public->AdvancedSearch->SearchOperator = @$_GET["z_Public"];

		// Datetime_C
		$t_messages->Datetime_C->AdvancedSearch->SearchValue = @$_GET["x_Datetime_C"];
		$t_messages->Datetime_C->AdvancedSearch->SearchOperator = @$_GET["z_Datetime_C"];
		$t_messages->Datetime_C->AdvancedSearch->SearchCondition = @$_GET["v_Datetime_C"];
		$t_messages->Datetime_C->AdvancedSearch->SearchValue2 = @$_GET["y_Datetime_C"];
		$t_messages->Datetime_C->AdvancedSearch->SearchOperator2 = @$_GET["w_Datetime_C"];

		// Source
		$t_messages->Source->AdvancedSearch->SearchValue = @$_GET["x_Source"];
		$t_messages->Source->AdvancedSearch->SearchOperator = @$_GET["z_Source"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_messages;

		// Call Recordset Selecting event
		$t_messages->Recordset_Selecting($t_messages->CurrentFilter);

		// Load list page SQL
		$sSql = $t_messages->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_messages->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_messages;
		$sFilter = $t_messages->KeyFilter();

		// Call Row Selecting event
		$t_messages->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_messages->CurrentFilter = $sFilter;
		$sSql = $t_messages->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_messages->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_messages;
		$t_messages->Id_Messages->setDbValue($rs->fields('Id_Messages'));
		$t_messages->Name->setDbValue($rs->fields('Name'));
		$t_messages->Content->setDbValue($rs->fields('Content'));
		$t_messages->Doc->Upload->DbValue = $rs->fields('Doc');
		$t_messages->Public->setDbValue($rs->fields('Public'));
		$t_messages->Datetime_C->setDbValue($rs->fields('Datetime_C'));
		$t_messages->Source->setDbValue($rs->fields('Source'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_messages;

		// Call Row_Rendering event
		$t_messages->Row_Rendering();

		// Common render codes for all row types
		// Name

		$t_messages->Name->CellCssStyle = "";
		$t_messages->Name->CellCssClass = "";

		// Public
		$t_messages->Public->CellCssStyle = "";
		$t_messages->Public->CellCssClass = "";

		// Datetime_C
		$t_messages->Datetime_C->CellCssStyle = "";
		$t_messages->Datetime_C->CellCssClass = "";

		// Source
		$t_messages->Source->CellCssStyle = "";
		$t_messages->Source->CellCssClass = "";
		if ($t_messages->RowType == EW_ROWTYPE_VIEW) { // View row

			// Id_Messages
			$t_messages->Id_Messages->ViewValue = $t_messages->Id_Messages->CurrentValue;
			$t_messages->Id_Messages->CssStyle = "";
			$t_messages->Id_Messages->CssClass = "";
			$t_messages->Id_Messages->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->ViewValue = $t_messages->Name->CurrentValue;
			$t_messages->Name->CssStyle = "";
			$t_messages->Name->CssClass = "";
			$t_messages->Name->ViewCustomAttributes = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->ViewValue = $t_messages->Doc->Upload->DbValue;
			} else {
				$t_messages->Doc->ViewValue = "";
			}
			$t_messages->Doc->CssStyle = "";
			$t_messages->Doc->CssClass = "";
			$t_messages->Doc->ViewCustomAttributes = "";

			// Public
			if (strval($t_messages->Public->CurrentValue) <> "") {
				switch ($t_messages->Public->CurrentValue) {
					case "0":
						$t_messages->Public->ViewValue = "Chưa";
						break;
					case "1":
						$t_messages->Public->ViewValue = "Xuất bản";
						break;
					default:
						$t_messages->Public->ViewValue = $t_messages->Public->CurrentValue;
				}
			} else {
				$t_messages->Public->ViewValue = NULL;
			}
			$t_messages->Public->CssStyle = "";
			$t_messages->Public->CssClass = "";
			$t_messages->Public->ViewCustomAttributes = "";

			// Datetime_C
			$t_messages->Datetime_C->ViewValue = $t_messages->Datetime_C->CurrentValue;
			$t_messages->Datetime_C->ViewValue = ew_FormatDateTime($t_messages->Datetime_C->ViewValue, 7);
			$t_messages->Datetime_C->CssStyle = "";
			$t_messages->Datetime_C->CssClass = "";
			$t_messages->Datetime_C->ViewCustomAttributes = "";

			// Source
			$t_messages->Source->ViewValue = $t_messages->Source->CurrentValue;
			$t_messages->Source->CssStyle = "";
			$t_messages->Source->CssClass = "";
			$t_messages->Source->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->HrefValue = "";

			// Public
			$t_messages->Public->HrefValue = "";

			// Datetime_C
			$t_messages->Datetime_C->HrefValue = "";

			// Source
			$t_messages->Source->HrefValue = "";
		} elseif ($t_messages->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// Name
			$t_messages->Name->EditCustomAttributes = "";
			$t_messages->Name->EditValue = ew_HtmlEncode($t_messages->Name->AdvancedSearch->SearchValue);

			// Public
			$t_messages->Public->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$t_messages->Public->EditValue = $arwrk;

			// Datetime_C
			$t_messages->Datetime_C->EditCustomAttributes = "";
			$t_messages->Datetime_C->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_messages->Datetime_C->AdvancedSearch->SearchValue, 7), 7));
			$t_messages->Datetime_C->EditCustomAttributes = "";
			$t_messages->Datetime_C->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_messages->Datetime_C->AdvancedSearch->SearchValue2, 7), 7));

			// Source
			$t_messages->Source->EditCustomAttributes = "";
			$t_messages->Source->EditValue = ew_HtmlEncode($t_messages->Source->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$t_messages->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_messages;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckUSDate($t_messages->Datetime_C->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Datetime C";
		}
		if (!ew_CheckUSDate($t_messages->Datetime_C->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Datetime C";
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
		global $t_messages;
		$t_messages->Id_Messages->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Id_Messages");
		$t_messages->Name->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Name");
		$t_messages->Content->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Content");
		$t_messages->Public->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Public");
		$t_messages->Datetime_C->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Datetime_C");
		$t_messages->Datetime_C->AdvancedSearch->SearchValue2 = $t_messages->getAdvancedSearch("y_Datetime_C");
		$t_messages->Source->AdvancedSearch->SearchValue = $t_messages->getAdvancedSearch("x_Source");
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
