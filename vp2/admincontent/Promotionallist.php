<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Promotionalinfo.php" ?>
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
$Promotional_list = new cPromotional_list();
$Page =& $Promotional_list;

// Page init processing
$Promotional_list->Page_Init();

// Page main processing
$Promotional_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Promotional->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Promotional_list = new ew_Page("Promotional_list");

// page properties
Promotional_list.PageID = "list"; // page ID
var EW_PAGE_ID = Promotional_list.PageID; // for backward compatibility

// extend page with validate function for search
Promotional_list.ValidateSearch = function(fobj) {
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
Promotional_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Promotional_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Promotional_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Promotional_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($Promotional->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($Promotional->Export == "" && $Promotional->SelectLimit);
	if (!$bSelectLimit)
		$rs = $Promotional_list->LoadRecordset();
	$Promotional_list->lTotalRecs = ($bSelectLimit) ? $Promotional->SelectRecordCount() : $rs->RecordCount();
	$Promotional_list->lStartRec = 1;
	if ($Promotional_list->lDisplayRecs <= 0) // Display all records
		$Promotional_list->lDisplayRecs = $Promotional_list->lTotalRecs;
	if (!($Promotional->ExportAll && $Promotional->Export <> ""))
		$Promotional_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $Promotional_list->LoadRecordset($Promotional_list->lStartRec-1, $Promotional_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($Promotional->Export == "" && $Promotional->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(Promotional_list);" style="text-decoration: none;"><img id="Promotional_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="Promotional_list_SearchPanel">
<form name="fPromotionallistsrch" id="fPromotionallistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return Promotional_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="Promotional">
<?php
if ($gsSearchError == "")
	$Promotional_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$Promotional->RowType = EW_ROWTYPE_SEARCH;

// Render row
$Promotional_list->RenderRow();
?>
<br>
<table class="ewBasicSearch" width="725" bgcolor="#EBEBEB">
	<tr>
		<td><span class="phpmaker">Thời gian nhập</span></td>
		<td><span class="ewSearchOpr"> Từ <input type="hidden" name="z_thoigian_them" id="z_thoigian_them" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoigian_them" id="x_thoigian_them" value="<?php echo $Promotional->thoigian_them->EditValue ?>"<?php echo $Promotional->thoigian_them->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoigian_them" name="cal_x_thoigian_them" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoigian_them", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoigian_them" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_thoigian_them" name="btw1_thoigian_them">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_thoigian_them" name="btw1_thoigian_them">
<input type="text" name="y_thoigian_them" id="y_thoigian_them" value="<?php echo $Promotional->thoigian_them->EditValue2 ?>"<?php echo $Promotional->thoigian_them->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_thoigian_them" name="cal_y_thoigian_them" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_thoigian_them", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_thoigian_them" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Trạng thái</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_trang_thai" id="z_trang_thai" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $Promotional->trang_thai->EditAttributes() ?>>
<?php
if (is_array($Promotional->trang_thai->EditValue)) {
	$arwrk = $Promotional->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Promotional->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($Promotional->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value=" Tìm kiếm ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $Promotional_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($Promotional->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($Promotional->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($Promotional->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $Promotional_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($Promotional->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($Promotional->CurrentAction <> "gridadd" && $Promotional->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Promotional_list->Pager)) $Promotional_list->Pager = new cNumericPager($Promotional_list->lStartRec, $Promotional_list->lDisplayRecs, $Promotional_list->lTotalRecs, $Promotional_list->lRecRange) ?>
<?php if ($Promotional_list->Pager->RecordCount > 0) { ?>
	<?php if ($Promotional_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Promotional_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các tin từ <?php echo $Promotional_list->Pager->FromIndex ?> đến <?php echo $Promotional_list->Pager->ToIndex ?> của <?php echo $Promotional_list->Pager->RecordCount ?> tin
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Promotional_list->sSrchWhere == "0=101") { ?>
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
<?php if ($Promotional_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị</td><td>
<input type="hidden" id="t" name="t" value="Promotional">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Promotional_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Promotional_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Promotional_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Promotional->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $Promotional->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Promotional_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fPromotionallist)) alert('Chưa chọn tin'); else {document.fPromotionallist.action='Promotionaldelete.php';document.fPromotionallist.encoding='application/x-www-form-urlencoded';document.fPromotionallist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fPromotionallist)) alert('Chưa chọn tin'); else {document.fPromotionallist.action='Promotionalupdate.php';document.fPromotionallist.encoding='application/x-www-form-urlencoded';document.fPromotionallist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fPromotionallist" id="fPromotionallist" class="ewForm" action="" method="post">
<?php if ($Promotional_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$Promotional_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$Promotional_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$Promotional_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$Promotional_list->lOptionCnt++; // Multi-select
}
	$Promotional_list->lOptionCnt += count($Promotional_list->ListOptions->Items); // Custom list options
?>
<?php echo $Promotional->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Promotional->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="Promotional_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($Promotional_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($Promotional->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<?php if ($Promotional->SortUrl($Promotional->tieude_tintuc) == "") { ?>
		<td style="width: 340px; white-space: nowrap;">Tieude Tintuc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Promotional->SortUrl($Promotional->tieude_tintuc) ?>',1);" style="width: 340px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề&nbsp;(*)</td><td style="width: 10px;"><?php if ($Promotional->tieude_tintuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Promotional->tieude_tintuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Promotional->thoigian_them->Visible) { // thoigian_them ?>
	<?php if ($Promotional->SortUrl($Promotional->thoigian_them) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Thoigian Them</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Promotional->SortUrl($Promotional->thoigian_them) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian nhập</td><td style="width: 10px;"><?php if ($Promotional->thoigian_them->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Promotional->thoigian_them->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Promotional->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<?php if ($Promotional->SortUrl($Promotional->soluot_truynhap) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Soluot Truynhap</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Promotional->SortUrl($Promotional->soluot_truynhap) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số lượt xem</td><td style="width: 10px;"><?php if ($Promotional->soluot_truynhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Promotional->soluot_truynhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Promotional->trang_thai->Visible) { // trang_thai ?>
	<?php if ($Promotional->SortUrl($Promotional->trang_thai) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Promotional->SortUrl($Promotional->trang_thai) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($Promotional->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Promotional->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Promotional->xuatban->Visible) { // xuatban ?>
	<?php if ($Promotional->SortUrl($Promotional->xuatban) == "") { ?>
		<td style="white-space: nowrap;">Xuatban</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Promotional->SortUrl($Promotional->xuatban) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($Promotional->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Promotional->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($Promotional->ExportAll && $Promotional->Export <> "") {
	$Promotional_list->lStopRec = $Promotional_list->lTotalRecs;
} else {
	$Promotional_list->lStopRec = $Promotional_list->lStartRec + $Promotional_list->lDisplayRecs - 1; // Set the last record to display
}
$Promotional_list->lRecCount = $Promotional_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$Promotional->SelectLimit && $Promotional_list->lStartRec > 1)
		$rs->Move($Promotional_list->lStartRec - 1);
}
$Promotional_list->lRowCnt = 0;
while (($Promotional->CurrentAction == "gridadd" || !$rs->EOF) &&
	$Promotional_list->lRecCount < $Promotional_list->lStopRec) {
	$Promotional_list->lRecCount++;
	if (intval($Promotional_list->lRecCount) >= intval($Promotional_list->lStartRec)) {
		$Promotional_list->lRowCnt++;

	// Init row class and style
	$Promotional->CssClass = "";
	$Promotional->CssStyle = "";
	$Promotional->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($Promotional->CurrentAction == "gridadd") {
		$Promotional_list->LoadDefaultValues(); // Load default values
	} else {
		$Promotional_list->LoadRowValues($rs); // Load row values
	}
	$Promotional->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$Promotional_list->RenderRow();
?>
	<tr<?php echo $Promotional->RowAttributes() ?>>
<?php if ($Promotional->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($Promotional_list->ShowOptionLink()) { ?>
<a href="<?php echo $Promotional->ViewUrl() ?>">Xem</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($Promotional_list->ShowOptionLink()) { ?>
<a href="<?php echo $Promotional->EditUrl() ?>">Sửa</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($Promotional->tintuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($Promotional_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($Promotional->tieude_tintuc->Visible) { // tieude_tintuc ?>
		<td<?php echo $Promotional->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->tieude_tintuc->ViewAttributes() ?>><?php echo $Promotional->tieude_tintuc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Promotional->thoigian_them->Visible) { // thoigian_them ?>
		<td<?php echo $Promotional->thoigian_them->CellAttributes() ?>>
<div<?php echo $Promotional->thoigian_them->ViewAttributes() ?>><?php echo $Promotional->thoigian_them->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Promotional->soluot_truynhap->Visible) { // soluot_truynhap ?>
		<td<?php echo $Promotional->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $Promotional->soluot_truynhap->ViewAttributes() ?>><?php echo $Promotional->soluot_truynhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Promotional->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $Promotional->trang_thai->CellAttributes() ?>>
<div<?php echo $Promotional->trang_thai->ViewAttributes() ?>><?php echo $Promotional->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Promotional->xuatban->Visible) { // xuatban ?>
		<td<?php echo $Promotional->xuatban->CellAttributes() ?>>
<div<?php echo $Promotional->xuatban->ViewAttributes() ?>><?php echo $Promotional->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($Promotional->CurrentAction <> "gridadd")
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
<?php if ($Promotional_list->lTotalRecs > 0) { ?>
<?php if ($Promotional->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($Promotional->CurrentAction <> "gridadd" && $Promotional->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Promotional_list->Pager)) $Promotional_list->Pager = new cNumericPager($Promotional_list->lStartRec, $Promotional_list->lDisplayRecs, $Promotional_list->lTotalRecs, $Promotional_list->lRecRange) ?>
<?php if ($Promotional_list->Pager->RecordCount > 0) { ?>
	<?php if ($Promotional_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Promotional_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Promotional_list->PageUrl() ?>start=<?php echo $Promotional_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Promotional_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các tin từ <?php echo $Promotional_list->Pager->FromIndex ?> đến <?php echo $Promotional_list->Pager->ToIndex ?> của <?php echo $Promotional_list->Pager->RecordCount ?> tin
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Promotional_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($Promotional_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị</td><td>
<input type="hidden" id="t" name="t" value="Promotional">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Promotional_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Promotional_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Promotional_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Promotional->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($Promotional_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $Promotional->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Promotional_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fPromotionallist)) alert('Chưa chọn tin'); else {document.fPromotionallist.action='Promotionaldelete.php';document.fPromotionallist.encoding='application/x-www-form-urlencoded';document.fPromotionallist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fPromotionallist)) alert('Chưa chọn tin'); else {document.fPromotionallist.action='Promotionalupdate.php';document.fPromotionallist.encoding='application/x-www-form-urlencoded';document.fPromotionallist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($Promotional->Export == "" && $Promotional->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(Promotional_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($Promotional->Export == "") { ?>
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
class cPromotional_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'Promotional';

	// Page Object Name
	var $PageObjName = 'Promotional_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Promotional;
		if ($Promotional->UseTokenInUrl) $PageUrl .= "t=" . $Promotional->TableVar . "&"; // add page token
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
		global $objForm, $Promotional;
		if ($Promotional->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Promotional->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Promotional->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cPromotional_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["Promotional"] = new cPromotional();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Promotional', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Promotional;
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
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate();
		}
	$Promotional->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $Promotional->Export; // Get export parameter, used in header
	$gsExportFile = $Promotional->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $Promotional;
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
		if ($Promotional->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $Promotional->getRecordsPerPage(); // Restore from Session
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
		$Promotional->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$Promotional->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$Promotional->setStartRecordNumber($this->lStartRec);
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
		$Promotional->setSessionWhere($sFilter);
		$Promotional->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $Promotional;
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
			$Promotional->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$Promotional->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $Promotional;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $Promotional->tukhoa_tintuc, FALSE); // Field tukhoa_tintuc
		$this->BuildSearchSql($sWhere, $Promotional->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $Promotional->trang_thai, FALSE); // Field trang_thai

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($Promotional->tukhoa_tintuc); // Field tukhoa_tintuc
			$this->SetSearchParm($Promotional->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($Promotional->trang_thai); // Field trang_thai
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
		global $Promotional;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$Promotional->setAdvancedSearch("x_$FldParm", $FldVal);
		$Promotional->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$Promotional->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$Promotional->setAdvancedSearch("y_$FldParm", $FldVal2);
		$Promotional->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $Promotional;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $Promotional->tieude_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $Promotional->tomtat_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $Promotional->nguon_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $Promotional->noidung_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $Promotional;
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
			$Promotional->setBasicSearchKeyword($sSearchKeyword);
			$Promotional->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $Promotional;
		$this->sSrchWhere = "";
		$Promotional->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $Promotional;
		$Promotional->setBasicSearchKeyword("");
		$Promotional->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $Promotional;
		$Promotional->setAdvancedSearch("x_tukhoa_tintuc", "");
		$Promotional->setAdvancedSearch("x_thoigian_them", "");
		$Promotional->setAdvancedSearch("y_thoigian_them", "");
		$Promotional->setAdvancedSearch("x_trang_thai", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $Promotional;
		$this->sSrchWhere = $Promotional->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $Promotional;
		 $Promotional->tukhoa_tintuc->AdvancedSearch->SearchValue = $Promotional->getAdvancedSearch("x_tukhoa_tintuc");
		 $Promotional->thoigian_them->AdvancedSearch->SearchValue = $Promotional->getAdvancedSearch("x_thoigian_them");
		 $Promotional->thoigian_them->AdvancedSearch->SearchValue2 = $Promotional->getAdvancedSearch("y_thoigian_them");
		 $Promotional->trang_thai->AdvancedSearch->SearchValue = $Promotional->getAdvancedSearch("x_trang_thai");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $Promotional;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$Promotional->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$Promotional->CurrentOrderType = @$_GET["ordertype"];
			$Promotional->UpdateSort($Promotional->tieude_tintuc); // Field 
			$Promotional->UpdateSort($Promotional->thoigian_them); // Field 
			$Promotional->UpdateSort($Promotional->soluot_truynhap); // Field 
			$Promotional->UpdateSort($Promotional->trang_thai); // Field 
			$Promotional->UpdateSort($Promotional->xuatban); // Field 
			$Promotional->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $Promotional;
		$sOrderBy = $Promotional->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($Promotional->SqlOrderBy() <> "") {
				$sOrderBy = $Promotional->SqlOrderBy();
				$Promotional->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $Promotional;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$Promotional->setSessionOrderBy($sOrderBy);
				$Promotional->tieude_tintuc->setSort("");
				$Promotional->thoigian_them->setSort("");
				$Promotional->soluot_truynhap->setSort("");
				$Promotional->trang_thai->setSort("");
				$Promotional->xuatban->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$Promotional->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Promotional;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Promotional->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Promotional->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Promotional->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Promotional->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Promotional->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Promotional->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $Promotional;

		// Load search values
		// thoigian_them

		$Promotional->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$Promotional->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];
		$Promotional->thoigian_them->AdvancedSearch->SearchCondition = @$_GET["v_thoigian_them"];
		$Promotional->thoigian_them->AdvancedSearch->SearchValue2 = @$_GET["y_thoigian_them"];
		$Promotional->thoigian_them->AdvancedSearch->SearchOperator2 = @$_GET["w_thoigian_them"];

		// trang_thai
		$Promotional->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$Promotional->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Promotional;

		// Call Recordset Selecting event
		$Promotional->Recordset_Selecting($Promotional->CurrentFilter);

		// Load list page SQL
		$sSql = $Promotional->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Promotional->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Promotional;
		$sFilter = $Promotional->KeyFilter();

		// Call Row Selecting event
		$Promotional->Row_Selecting($sFilter);

		// Load sql based on filter
		$Promotional->CurrentFilter = $sFilter;
		$sSql = $Promotional->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Promotional->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Promotional;
		$Promotional->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$Promotional->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Promotional->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$Promotional->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$Promotional->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$Promotional->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$Promotional->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$Promotional->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$Promotional->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$Promotional->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$Promotional->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$Promotional->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$Promotional->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$Promotional->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$Promotional->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Promotional->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$Promotional->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Promotional;

		// Call Row_Rendering event
		$Promotional->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$Promotional->tieude_tintuc->CellCssStyle = "width: 340px; white-space: nowrap;";
		$Promotional->tieude_tintuc->CellCssClass = "";

		// thoigian_them
		$Promotional->thoigian_them->CellCssStyle = "width: 120px; white-space: nowrap;";
		$Promotional->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$Promotional->soluot_truynhap->CellCssStyle = "width: 120px; white-space: nowrap;";
		$Promotional->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$Promotional->trang_thai->CellCssStyle = "width: 120px; white-space: nowrap;";
		$Promotional->trang_thai->CellCssClass = "";

		// xuatban
		$Promotional->xuatban->CellCssStyle = "white-space: nowrap;";
		$Promotional->xuatban->CellCssClass = "";
		if ($Promotional->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$Promotional->tieude_tintuc->ViewValue = $Promotional->tieude_tintuc->CurrentValue;
			$Promotional->tieude_tintuc->CssStyle = "";
			$Promotional->tieude_tintuc->CssClass = "";
			$Promotional->tieude_tintuc->ViewCustomAttributes = "";

			// thoigian_them
			$Promotional->thoigian_them->ViewValue = $Promotional->thoigian_them->CurrentValue;
			$Promotional->thoigian_them->ViewValue = ew_FormatDateTime($Promotional->thoigian_them->ViewValue, 7);
			$Promotional->thoigian_them->CssStyle = "";
			$Promotional->thoigian_them->CssClass = "";
			$Promotional->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$Promotional->soluot_truynhap->ViewValue = $Promotional->soluot_truynhap->CurrentValue;
			$Promotional->soluot_truynhap->CssStyle = "";
			$Promotional->soluot_truynhap->CssClass = "";
			$Promotional->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($Promotional->trang_thai->CurrentValue) <> "") {
				switch ($Promotional->trang_thai->CurrentValue) {
					case "1":
						$Promotional->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa kích hoạt</font>";
						break;
					case "2":
						$Promotional->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$Promotional->trang_thai->ViewValue = $Promotional->trang_thai->CurrentValue;
				}
			} else {
				$Promotional->trang_thai->ViewValue = NULL;
			}
			$Promotional->trang_thai->CssStyle = "";
			$Promotional->trang_thai->CssClass = "";
			$Promotional->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($Promotional->xuatban->CurrentValue) <> "") {
				switch ($Promotional->xuatban->CurrentValue) {
					case "0":
						$Promotional->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$Promotional->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$Promotional->xuatban->ViewValue = $Promotional->xuatban->CurrentValue;
				}
			} else {
				$Promotional->xuatban->ViewValue = NULL;
			}
			$Promotional->xuatban->CssStyle = "";
			$Promotional->xuatban->CssClass = "";
			$Promotional->xuatban->ViewCustomAttributes = "";

			// tieude_tintuc
			$Promotional->tieude_tintuc->HrefValue = "";

			// thoigian_them
			$Promotional->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$Promotional->soluot_truynhap->HrefValue = "";

			// trang_thai
			$Promotional->trang_thai->HrefValue = "";

			// xuatban
			$Promotional->xuatban->HrefValue = "";
		} elseif ($Promotional->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieude_tintuc
			$Promotional->tieude_tintuc->EditCustomAttributes = "";
			$Promotional->tieude_tintuc->EditValue = ew_HtmlEncode($Promotional->tieude_tintuc->AdvancedSearch->SearchValue);

			// thoigian_them
			$Promotional->thoigian_them->EditCustomAttributes = "";
			$Promotional->thoigian_them->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($Promotional->thoigian_them->AdvancedSearch->SearchValue, 7), 7));
			$Promotional->thoigian_them->EditCustomAttributes = "";
			$Promotional->thoigian_them->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($Promotional->thoigian_them->AdvancedSearch->SearchValue2, 7), 7));

			// soluot_truynhap
			$Promotional->soluot_truynhap->EditCustomAttributes = "";
			$Promotional->soluot_truynhap->EditValue = ew_HtmlEncode($Promotional->soluot_truynhap->AdvancedSearch->SearchValue);

			// trang_thai
			$Promotional->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chưa kích hoạt");
			$arwrk[] = array("2", "Đã kích hoạt");
			array_unshift($arwrk, array("", "Chọn"));
			$Promotional->trang_thai->EditValue = $arwrk;

			// xuatban
			$Promotional->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$Promotional->xuatban->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$Promotional->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $Promotional;

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
		global $Promotional;
		$Promotional->thoigian_them->AdvancedSearch->SearchValue = $Promotional->getAdvancedSearch("x_thoigian_them");
		$Promotional->thoigian_them->AdvancedSearch->SearchValue2 = $Promotional->getAdvancedSearch("y_thoigian_them");
		$Promotional->trang_thai->AdvancedSearch->SearchValue = $Promotional->getAdvancedSearch("x_trang_thai");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $Promotional;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($Promotional->nguoidung_id->CurrentValue);
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
