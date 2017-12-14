<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Readinfo.php" ?>
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
$Read_list = new cRead_list();
$Page =& $Read_list;

// Page init processing
$Read_list->Page_Init();

// Page main processing
$Read_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Read->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Read_list = new ew_Page("Read_list");

// page properties
Read_list.PageID = "list"; // page ID
var EW_PAGE_ID = Read_list.PageID; // for backward compatibility

// extend page with validate function for search
Read_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_ngay_gui"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Ngay Gui");
	elm = fobj.elements["x" + infix + "_ngay_doc"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Ngay Doc");

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
Read_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Read_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Read_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Read_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($Read->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($Read->Export == "" && $Read->SelectLimit);
	if (!$bSelectLimit)
		$rs = $Read_list->LoadRecordset();
	$Read_list->lTotalRecs = ($bSelectLimit) ? $Read->SelectRecordCount() : $rs->RecordCount();
	$Read_list->lStartRec = 1;
	if ($Read_list->lDisplayRecs <= 0) // Display all records
		$Read_list->lDisplayRecs = $Read_list->lTotalRecs;
	if (!($Read->ExportAll && $Read->Export <> ""))
		$Read_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $Read_list->LoadRecordset($Read_list->lStartRec-1, $Read_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách thư liên hệ đã đọc</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> <br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($Read->Export == "" && $Read->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(Read_list);" style="text-decoration: none;"><img id="Read_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="Read_list_SearchPanel">
<form name="fReadlistsrch" id="fReadlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return Read_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="Read">
<?php
if ($gsSearchError == "")
	$Read_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$Read->RowType = EW_ROWTYPE_SEARCH;

// Render row
$Read_list->RenderRow();
?>
<br>
<table class="ewBasicSearch" bgcolor="#EBEBEB" width="725">
	<tr>
		<td><span class="phpmaker">Tiêu đề</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_tieu_de" id="z_tieu_de" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable" width="506"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_tieu_de" id="x_tieu_de" size="68" value="<?php echo $Read->tieu_de->EditValue ?>"<?php echo $Read->tieu_de->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Địa chỉ Email</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_diachi_email" id="z_diachi_email" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable" width="506"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_diachi_email" id="x_diachi_email" size="68" value="<?php echo $Read->diachi_email->EditValue ?>"<?php echo $Read->diachi_email->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày gửi</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_ngay_gui" id="z_ngay_gui" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_ngay_gui" id="x_ngay_gui" value="<?php echo $Read->ngay_gui->EditValue ?>"<?php echo $Read->ngay_gui->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_ngay_gui" name="cal_x_ngay_gui" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_ngay_gui", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_ngay_gui" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_ngay_gui" name="btw1_ngay_gui">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_ngay_gui" name="btw1_ngay_gui">
<input type="text" name="y_ngay_gui" id="y_ngay_gui" value="<?php echo $Read->ngay_gui->EditValue2 ?>"<?php echo $Read->ngay_gui->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_ngay_gui" name="cal_y_ngay_gui" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_ngay_gui", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_ngay_gui" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày đọc</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_ngay_doc" id="z_ngay_doc" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_ngay_doc" id="x_ngay_doc" value="<?php echo $Read->ngay_doc->EditValue ?>"<?php echo $Read->ngay_doc->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_ngay_doc" name="cal_x_ngay_doc" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_ngay_doc", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_ngay_doc" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_ngay_doc" name="btw1_ngay_doc">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_ngay_doc" name="btw1_ngay_doc">
<input type="text" name="y_ngay_doc" id="y_ngay_doc" value="<?php echo $Read->ngay_doc->EditValue2 ?>"<?php echo $Read->ngay_doc->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_ngay_doc" name="cal_y_ngay_doc" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_ngay_doc", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_ngay_doc" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
<table class="ewBasicSearch" bgcolor="#EBEBEB" width="725">
	<tr>
	<td width="85" ></td>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($Read->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $Read_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
			</span></td>
	</tr>
	<tr>
	<td width="85" ></td>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($Read->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($Read->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($Read->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $Read_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($Read->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($Read->CurrentAction <> "gridadd" && $Read->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Read_list->Pager)) $Read_list->Pager = new cNumericPager($Read_list->lStartRec, $Read_list->lDisplayRecs, $Read_list->lTotalRecs, $Read_list->lRecRange) ?>
<?php if ($Read_list->Pager->RecordCount > 0) { ?>
	<?php if ($Read_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Read_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các thư từ <?php echo $Read_list->Pager->FromIndex ?> đến <?php echo $Read_list->Pager->ToIndex ?> của <?php echo $Read_list->Pager->RecordCount ?> thư
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Read_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có thư
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($Read_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số thư hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="Read">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Read_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Read_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Read_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Read->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Read_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<br>
<a href="" onclick="if (!ew_KeySelected(document.fReadlist)) alert('Chưa chọn thư'); else {document.fReadlist.action='Readdelete.php';document.fReadlist.encoding='application/x-www-form-urlencoded';document.fReadlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a><br>&nbsp;&nbsp;

<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fReadlist" id="fReadlist" class="ewForm" action="" method="post">
<?php if ($Read_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$Read_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$Read_list->lOptionCnt++; // view
}
if ($Security->CanDelete()) {
	$Read_list->lOptionCnt++; // Multi-select
}
	$Read_list->lOptionCnt += count($Read_list->ListOptions->Items); // Custom list options
?>
<?php echo $Read->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Read->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="Read_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($Read_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($Read->tieu_de->Visible) { // tieu_de ?>
	<?php if ($Read->SortUrl($Read->tieu_de) == "") { ?>
		<td style="width: 250px; white-space: nowrap;">Tiêu đề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Read->SortUrl($Read->tieu_de) ?>',1);" style="width: 250px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center" >Tiêu đề</td><td style="width: 10px;"><?php if ($Read->tieu_de->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Read->tieu_de->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Read->nguoi_lienhe->Visible) { // nguoi_lienhe ?>
	<?php if ($Read->SortUrl($Read->nguoi_lienhe) == "") { ?>
		<td style="width: 150px; white-space: nowrap;">Nguoi Lienhe</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Read->SortUrl($Read->nguoi_lienhe) ?>',1);" style="width: 150px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Người liên hệ</td><td style="width: 10px;"><?php if ($Read->nguoi_lienhe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Read->nguoi_lienhe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Read->diachi_email->Visible) { // diachi_email ?>
	<?php if ($Read->SortUrl($Read->diachi_email) == "") { ?>
		<td style="width: 150px; white-space: nowrap;">Diachi Email</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Read->SortUrl($Read->diachi_email) ?>',1);" style="width: 150px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Email</td><td style="width: 10px;"><?php if ($Read->diachi_email->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Read->diachi_email->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Read->ngay_gui->Visible) { // ngay_gui ?>
	<?php if ($Read->SortUrl($Read->ngay_gui) == "") { ?>
		<td style="width: 100px; white-space: nowrap;">Ngay Gui</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Read->SortUrl($Read->ngay_gui) ?>',1);" style="width: 100px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Ngày gửi</td><td style="width: 10px;"><?php if ($Read->ngay_gui->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Read->ngay_gui->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Read->ngay_doc->Visible) { // ngay_doc ?>
	<?php if ($Read->SortUrl($Read->ngay_doc) == "") { ?>
		<td style="white-space: nowrap;">Ngay Doc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Read->SortUrl($Read->ngay_doc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Ngày đọc</td><td style="width: 10px;"><?php if ($Read->ngay_doc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Read->ngay_doc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($Read->ExportAll && $Read->Export <> "") {
	$Read_list->lStopRec = $Read_list->lTotalRecs;
} else {
	$Read_list->lStopRec = $Read_list->lStartRec + $Read_list->lDisplayRecs - 1; // Set the last record to display
}
$Read_list->lRecCount = $Read_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$Read->SelectLimit && $Read_list->lStartRec > 1)
		$rs->Move($Read_list->lStartRec - 1);
}
$Read_list->lRowCnt = 0;
while (($Read->CurrentAction == "gridadd" || !$rs->EOF) &&
	$Read_list->lRecCount < $Read_list->lStopRec) {
	$Read_list->lRecCount++;
	if (intval($Read_list->lRecCount) >= intval($Read_list->lStartRec)) {
		$Read_list->lRowCnt++;

	// Init row class and style
	$Read->CssClass = "";
	$Read->CssStyle = "";
	$Read->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($Read->CurrentAction == "gridadd") {
		$Read_list->LoadDefaultValues(); // Load default values
	} else {
		$Read_list->LoadRowValues($rs); // Load row values
	}
	$Read->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$Read_list->RenderRow();
?>
	<tr<?php echo $Read->RowAttributes() ?>>
<?php if ($Read->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($Read_list->ShowOptionLink()) { ?>
<a href="<?php echo $Read->ViewUrl() ?>">Xem</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($Read->thu_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($Read_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($Read->tieu_de->Visible) { // tieu_de ?>
		<td<?php echo $Read->tieu_de->CellAttributes() ?>>
<div<?php echo $Read->tieu_de->ViewAttributes() ?>><?php echo $Read->tieu_de->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Read->nguoi_lienhe->Visible) { // nguoi_lienhe ?>
		<td<?php echo $Read->nguoi_lienhe->CellAttributes() ?>>
<div<?php echo $Read->nguoi_lienhe->ViewAttributes() ?>><?php echo $Read->nguoi_lienhe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Read->diachi_email->Visible) { // diachi_email ?>
		<td<?php echo $Read->diachi_email->CellAttributes() ?>>
<div<?php echo $Read->diachi_email->ViewAttributes() ?>><?php echo $Read->diachi_email->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Read->ngay_gui->Visible) { // ngay_gui ?>
		<td<?php echo $Read->ngay_gui->CellAttributes() ?>>
<div<?php echo $Read->ngay_gui->ViewAttributes() ?>><?php echo $Read->ngay_gui->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Read->ngay_doc->Visible) { // ngay_doc ?>
		<td<?php echo $Read->ngay_doc->CellAttributes() ?>>
<div<?php echo $Read->ngay_doc->ViewAttributes() ?>><?php echo $Read->ngay_doc->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($Read->CurrentAction <> "gridadd")
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
<?php if ($Read_list->lTotalRecs > 0) { ?>
<?php if ($Read->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($Read->CurrentAction <> "gridadd" && $Read->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Read_list->Pager)) $Read_list->Pager = new cNumericPager($Read_list->lStartRec, $Read_list->lDisplayRecs, $Read_list->lTotalRecs, $Read_list->lRecRange) ?>
<?php if ($Read_list->Pager->RecordCount > 0) { ?>
	<?php if ($Read_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Read_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Read_list->PageUrl() ?>start=<?php echo $Read_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Read_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các thư từ <?php echo $Read_list->Pager->FromIndex ?> đến <?php echo $Read_list->Pager->ToIndex ?> của <?php echo $Read_list->Pager->RecordCount ?> thư
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Read_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có thư
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($Read_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số thư hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="Read">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Read_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Read_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Read_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Read->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($Read_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Read_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<br>
<a href="" onclick="if (!ew_KeySelected(document.fReadlist)) alert('Chưa chọn thư'); else {document.fReadlist.action='Readdelete.php';document.fReadlist.encoding='application/x-www-form-urlencoded';document.fReadlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($Read->Export == "" && $Read->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(Read_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($Read->Export == "") { ?>
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
class cRead_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'Read';

	// Page Object Name
	var $PageObjName = 'Read_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Read;
		if ($Read->UseTokenInUrl) $PageUrl .= "t=" . $Read->TableVar . "&"; // add page token
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
		global $objForm, $Read;
		if ($Read->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Read->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Read->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cRead_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["Read"] = new cRead();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Read', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Read;
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
	$Read->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $Read->Export; // Get export parameter, used in header
	$gsExportFile = $Read->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $Read;
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
		if ($Read->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $Read->getRecordsPerPage(); // Restore from Session
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
		$Read->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$Read->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$Read->setStartRecordNumber($this->lStartRec);
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
		$Read->setSessionWhere($sFilter);
		$Read->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $Read;
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
			$Read->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$Read->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $Read;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $Read->tieu_de, FALSE); // Field tieu_de
		$this->BuildSearchSql($sWhere, $Read->noidung_lienhe, FALSE); // Field noidung_lienhe
		$this->BuildSearchSql($sWhere, $Read->nguoi_lienhe, FALSE); // Field nguoi_lienhe
		$this->BuildSearchSql($sWhere, $Read->gioi_tinh, FALSE); // Field gioi_tinh
		$this->BuildSearchSql($sWhere, $Read->quocgia_id, FALSE); // Field quocgia_id
		$this->BuildSearchSql($sWhere, $Read->diachi_email, FALSE); // Field diachi_email
		$this->BuildSearchSql($sWhere, $Read->ma_quocgia_tel, FALSE); // Field ma_quocgia_tel
		$this->BuildSearchSql($sWhere, $Read->ma_vung_tel, FALSE); // Field ma_vung_tel
		$this->BuildSearchSql($sWhere, $Read->so_dienthoai, FALSE); // Field so_dienthoai
		$this->BuildSearchSql($sWhere, $Read->ma_quocgia_fax, FALSE); // Field ma_quocgia_fax
		$this->BuildSearchSql($sWhere, $Read->ma_vung_fax, FALSE); // Field ma_vung_fax
		$this->BuildSearchSql($sWhere, $Read->so_fax, FALSE); // Field so_fax
		$this->BuildSearchSql($sWhere, $Read->dia_chi, FALSE); // Field dia_chi
		$this->BuildSearchSql($sWhere, $Read->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $Read->ngay_gui, FALSE); // Field ngay_gui
		$this->BuildSearchSql($sWhere, $Read->ngay_doc, FALSE); // Field ngay_doc

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($Read->tieu_de); // Field tieu_de
			$this->SetSearchParm($Read->noidung_lienhe); // Field noidung_lienhe
			$this->SetSearchParm($Read->nguoi_lienhe); // Field nguoi_lienhe
			$this->SetSearchParm($Read->gioi_tinh); // Field gioi_tinh
			$this->SetSearchParm($Read->quocgia_id); // Field quocgia_id
			$this->SetSearchParm($Read->diachi_email); // Field diachi_email
			$this->SetSearchParm($Read->ma_quocgia_tel); // Field ma_quocgia_tel
			$this->SetSearchParm($Read->ma_vung_tel); // Field ma_vung_tel
			$this->SetSearchParm($Read->so_dienthoai); // Field so_dienthoai
			$this->SetSearchParm($Read->ma_quocgia_fax); // Field ma_quocgia_fax
			$this->SetSearchParm($Read->ma_vung_fax); // Field ma_vung_fax
			$this->SetSearchParm($Read->so_fax); // Field so_fax
			$this->SetSearchParm($Read->dia_chi); // Field dia_chi
			$this->SetSearchParm($Read->trang_thai); // Field trang_thai
			$this->SetSearchParm($Read->ngay_gui); // Field ngay_gui
			$this->SetSearchParm($Read->ngay_doc); // Field ngay_doc
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
		global $Read;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$Read->setAdvancedSearch("x_$FldParm", $FldVal);
		$Read->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$Read->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$Read->setAdvancedSearch("y_$FldParm", $FldVal2);
		$Read->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $Read;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $Read->tieu_de->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $Read->nguoi_lienhe->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $Read->diachi_email->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $Read->dia_chi->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $Read;
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
			$Read->setBasicSearchKeyword($sSearchKeyword);
			$Read->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $Read;
		$this->sSrchWhere = "";
		$Read->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $Read;
		$Read->setBasicSearchKeyword("");
		$Read->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $Read;
		$Read->setAdvancedSearch("x_tieu_de", "");
		$Read->setAdvancedSearch("x_noidung_lienhe", "");
		$Read->setAdvancedSearch("x_nguoi_lienhe", "");
		$Read->setAdvancedSearch("x_gioi_tinh", "");
		$Read->setAdvancedSearch("x_quocgia_id", "");
		$Read->setAdvancedSearch("x_diachi_email", "");
		$Read->setAdvancedSearch("x_ma_quocgia_tel", "");
		$Read->setAdvancedSearch("x_ma_vung_tel", "");
		$Read->setAdvancedSearch("x_so_dienthoai", "");
		$Read->setAdvancedSearch("x_ma_quocgia_fax", "");
		$Read->setAdvancedSearch("x_ma_vung_fax", "");
		$Read->setAdvancedSearch("x_so_fax", "");
		$Read->setAdvancedSearch("x_dia_chi", "");
		$Read->setAdvancedSearch("x_trang_thai", "");
		$Read->setAdvancedSearch("x_ngay_gui", "");
		$Read->setAdvancedSearch("y_ngay_gui", "");
		$Read->setAdvancedSearch("x_ngay_doc", "");
		$Read->setAdvancedSearch("y_ngay_doc", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $Read;
		$this->sSrchWhere = $Read->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $Read;
		 $Read->tieu_de->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_tieu_de");
		 $Read->noidung_lienhe->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_noidung_lienhe");
		 $Read->nguoi_lienhe->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_nguoi_lienhe");
		 $Read->gioi_tinh->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_gioi_tinh");
		 $Read->quocgia_id->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_quocgia_id");
		 $Read->diachi_email->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_diachi_email");
		 $Read->ma_quocgia_tel->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_quocgia_tel");
		 $Read->ma_vung_tel->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_vung_tel");
		 $Read->so_dienthoai->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_so_dienthoai");
		 $Read->ma_quocgia_fax->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_quocgia_fax");
		 $Read->ma_vung_fax->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_vung_fax");
		 $Read->so_fax->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_so_fax");
		 $Read->dia_chi->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_dia_chi");
		 $Read->trang_thai->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_trang_thai");
		 $Read->ngay_gui->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ngay_gui");
		 $Read->ngay_gui->AdvancedSearch->SearchValue2 = $Read->getAdvancedSearch("y_ngay_gui");
		 $Read->ngay_doc->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ngay_doc");
		 $Read->ngay_doc->AdvancedSearch->SearchValue2 = $Read->getAdvancedSearch("y_ngay_doc");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $Read;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$Read->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$Read->CurrentOrderType = @$_GET["ordertype"];
			$Read->UpdateSort($Read->tieu_de); // Field
			$Read->UpdateSort($Read->nguoi_lienhe); // Field
			$Read->UpdateSort($Read->diachi_email); // Field
			$Read->UpdateSort($Read->ngay_gui); // Field
			$Read->UpdateSort($Read->ngay_doc); // Field
			$Read->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $Read;
		$sOrderBy = $Read->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($Read->SqlOrderBy() <> "") {
				$sOrderBy = $Read->SqlOrderBy();
				$Read->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $Read;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$Read->setSessionOrderBy($sOrderBy);
				$Read->tieu_de->setSort("");
				$Read->nguoi_lienhe->setSort("");
				$Read->diachi_email->setSort("");
				$Read->ngay_gui->setSort("");
				$Read->ngay_doc->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$Read->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Read;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Read->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Read->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Read->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Read->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Read->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Read->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $Read;

		// Load search values
		// tieu_de

		$Read->tieu_de->AdvancedSearch->SearchValue = @$_GET["x_tieu_de"];
		$Read->tieu_de->AdvancedSearch->SearchOperator = @$_GET["z_tieu_de"];

		// noidung_lienhe
		$Read->noidung_lienhe->AdvancedSearch->SearchValue = @$_GET["x_noidung_lienhe"];
		$Read->noidung_lienhe->AdvancedSearch->SearchOperator = @$_GET["z_noidung_lienhe"];

		// nguoi_lienhe
		$Read->nguoi_lienhe->AdvancedSearch->SearchValue = @$_GET["x_nguoi_lienhe"];
		$Read->nguoi_lienhe->AdvancedSearch->SearchOperator = @$_GET["z_nguoi_lienhe"];

		// gioi_tinh
		$Read->gioi_tinh->AdvancedSearch->SearchValue = @$_GET["x_gioi_tinh"];
		$Read->gioi_tinh->AdvancedSearch->SearchOperator = @$_GET["z_gioi_tinh"];

		// quocgia_id
		$Read->quocgia_id->AdvancedSearch->SearchValue = @$_GET["x_quocgia_id"];
		$Read->quocgia_id->AdvancedSearch->SearchOperator = @$_GET["z_quocgia_id"];

		// diachi_email
		$Read->diachi_email->AdvancedSearch->SearchValue = @$_GET["x_diachi_email"];
		$Read->diachi_email->AdvancedSearch->SearchOperator = @$_GET["z_diachi_email"];

		// ma_quocgia_tel
		$Read->ma_quocgia_tel->AdvancedSearch->SearchValue = @$_GET["x_ma_quocgia_tel"];
		$Read->ma_quocgia_tel->AdvancedSearch->SearchOperator = @$_GET["z_ma_quocgia_tel"];

		// ma_vung_tel
		$Read->ma_vung_tel->AdvancedSearch->SearchValue = @$_GET["x_ma_vung_tel"];
		$Read->ma_vung_tel->AdvancedSearch->SearchOperator = @$_GET["z_ma_vung_tel"];

		// so_dienthoai
		$Read->so_dienthoai->AdvancedSearch->SearchValue = @$_GET["x_so_dienthoai"];
		$Read->so_dienthoai->AdvancedSearch->SearchOperator = @$_GET["z_so_dienthoai"];

		// ma_quocgia_fax
		$Read->ma_quocgia_fax->AdvancedSearch->SearchValue = @$_GET["x_ma_quocgia_fax"];
		$Read->ma_quocgia_fax->AdvancedSearch->SearchOperator = @$_GET["z_ma_quocgia_fax"];

		// ma_vung_fax
		$Read->ma_vung_fax->AdvancedSearch->SearchValue = @$_GET["x_ma_vung_fax"];
		$Read->ma_vung_fax->AdvancedSearch->SearchOperator = @$_GET["z_ma_vung_fax"];

		// so_fax
		$Read->so_fax->AdvancedSearch->SearchValue = @$_GET["x_so_fax"];
		$Read->so_fax->AdvancedSearch->SearchOperator = @$_GET["z_so_fax"];

		// dia_chi
		$Read->dia_chi->AdvancedSearch->SearchValue = @$_GET["x_dia_chi"];
		$Read->dia_chi->AdvancedSearch->SearchOperator = @$_GET["z_dia_chi"];

		// trang_thai
		$Read->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$Read->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// ngay_gui
		$Read->ngay_gui->AdvancedSearch->SearchValue = @$_GET["x_ngay_gui"];
		$Read->ngay_gui->AdvancedSearch->SearchOperator = @$_GET["z_ngay_gui"];
		$Read->ngay_gui->AdvancedSearch->SearchCondition = @$_GET["v_ngay_gui"];
		$Read->ngay_gui->AdvancedSearch->SearchValue2 = @$_GET["y_ngay_gui"];
		$Read->ngay_gui->AdvancedSearch->SearchOperator2 = @$_GET["w_ngay_gui"];

		// ngay_doc
		$Read->ngay_doc->AdvancedSearch->SearchValue = @$_GET["x_ngay_doc"];
		$Read->ngay_doc->AdvancedSearch->SearchOperator = @$_GET["z_ngay_doc"];
		$Read->ngay_doc->AdvancedSearch->SearchCondition = @$_GET["v_ngay_doc"];
		$Read->ngay_doc->AdvancedSearch->SearchValue2 = @$_GET["y_ngay_doc"];
		$Read->ngay_doc->AdvancedSearch->SearchOperator2 = @$_GET["w_ngay_doc"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Read;

		// Call Recordset Selecting event
		$Read->Recordset_Selecting($Read->CurrentFilter);

		// Load list page SQL
		$sSql = $Read->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Read->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Read;
		$sFilter = $Read->KeyFilter();

		// Call Row Selecting event
		$Read->Row_Selecting($sFilter);

		// Load sql based on filter
		$Read->CurrentFilter = $sFilter;
		$sSql = $Read->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Read->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Read;
		$Read->thu_id->setDbValue($rs->fields('thu_id'));
		$Read->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Read->tieu_de->setDbValue($rs->fields('tieu_de'));
		$Read->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$Read->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$Read->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$Read->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$Read->diachi_email->setDbValue($rs->fields('diachi_email'));
		$Read->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$Read->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$Read->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$Read->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$Read->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$Read->so_fax->setDbValue($rs->fields('so_fax'));
		$Read->dia_chi->setDbValue($rs->fields('dia_chi'));
		$Read->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Read->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$Read->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Read;

		// Call Row_Rendering event
		$Read->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$Read->tieu_de->CellCssStyle = "width: 250px; white-space: nowrap;";
		$Read->tieu_de->CellCssClass = "";

		// nguoi_lienhe
		$Read->nguoi_lienhe->CellCssStyle = "width: 150px; white-space: nowrap;";
		$Read->nguoi_lienhe->CellCssClass = "";

		// diachi_email
		$Read->diachi_email->CellCssStyle = "width: 150px; white-space: nowrap;";
		$Read->diachi_email->CellCssClass = "";

		// ngay_gui
		$Read->ngay_gui->CellCssStyle = "width: 100px; white-space: nowrap;";
		$Read->ngay_gui->CellCssClass = "";

		// ngay_doc
		$Read->ngay_doc->CellCssStyle = "white-space: nowrap;";
		$Read->ngay_doc->CellCssClass = "";
		if ($Read->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$Read->tieu_de->ViewValue = $Read->tieu_de->CurrentValue;
			$Read->tieu_de->CssStyle = "";
			$Read->tieu_de->CssClass = "";
			$Read->tieu_de->ViewCustomAttributes = "";

			// nguoi_lienhe
			$Read->nguoi_lienhe->ViewValue = $Read->nguoi_lienhe->CurrentValue;
			$Read->nguoi_lienhe->CssStyle = "";
			$Read->nguoi_lienhe->CssClass = "";
			$Read->nguoi_lienhe->ViewCustomAttributes = "";

			// diachi_email
			$Read->diachi_email->ViewValue = $Read->diachi_email->CurrentValue;
			$Read->diachi_email->CssStyle = "";
			$Read->diachi_email->CssClass = "";
			$Read->diachi_email->ViewCustomAttributes = "";

			// ngay_gui
			$Read->ngay_gui->ViewValue = $Read->ngay_gui->CurrentValue;
			$Read->ngay_gui->ViewValue = ew_FormatDateTime($Read->ngay_gui->ViewValue, 7);
			$Read->ngay_gui->CssStyle = "";
			$Read->ngay_gui->CssClass = "";
			$Read->ngay_gui->ViewCustomAttributes = "";

			// ngay_doc
			$Read->ngay_doc->ViewValue = $Read->ngay_doc->CurrentValue;
			$Read->ngay_doc->ViewValue = ew_FormatDateTime($Read->ngay_doc->ViewValue, 7);
			$Read->ngay_doc->CssStyle = "";
			$Read->ngay_doc->CssClass = "";
			$Read->ngay_doc->ViewCustomAttributes = "";

			// tieu_de
			$Read->tieu_de->HrefValue = "";

			// nguoi_lienhe
			$Read->nguoi_lienhe->HrefValue = "";

			// diachi_email
			$Read->diachi_email->HrefValue = "";

			// ngay_gui
			$Read->ngay_gui->HrefValue = "";

			// ngay_doc
			$Read->ngay_doc->HrefValue = "";
		} elseif ($Read->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieu_de
			$Read->tieu_de->EditCustomAttributes = "";
			$Read->tieu_de->EditValue = ew_HtmlEncode($Read->tieu_de->AdvancedSearch->SearchValue);

			// nguoi_lienhe
			$Read->nguoi_lienhe->EditCustomAttributes = "";
			$Read->nguoi_lienhe->EditValue = ew_HtmlEncode($Read->nguoi_lienhe->AdvancedSearch->SearchValue);

			// diachi_email
			$Read->diachi_email->EditCustomAttributes = "";
			$Read->diachi_email->EditValue = ew_HtmlEncode($Read->diachi_email->AdvancedSearch->SearchValue);

			// ngay_gui
			$Read->ngay_gui->EditCustomAttributes = "";
			$Read->ngay_gui->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($Read->ngay_gui->AdvancedSearch->SearchValue, 7), 7));
			$Read->ngay_gui->EditCustomAttributes = "";
			$Read->ngay_gui->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($Read->ngay_gui->AdvancedSearch->SearchValue2, 7), 7));

			// ngay_doc
			$Read->ngay_doc->EditCustomAttributes = "";
			$Read->ngay_doc->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($Read->ngay_doc->AdvancedSearch->SearchValue, 7), 7));
			$Read->ngay_doc->EditCustomAttributes = "";
			$Read->ngay_doc->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($Read->ngay_doc->AdvancedSearch->SearchValue2, 7), 7));
		}

		// Call Row Rendered event
		$Read->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $Read;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($Read->ngay_gui->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Gui";
		}
		if (!ew_CheckEuroDate($Read->ngay_gui->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Gui";
		}
		if (!ew_CheckEuroDate($Read->ngay_doc->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Doc";
		}
		if (!ew_CheckEuroDate($Read->ngay_doc->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Doc";
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
		global $Read;
		$Read->tieu_de->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_tieu_de");
		$Read->noidung_lienhe->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_noidung_lienhe");
		$Read->nguoi_lienhe->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_nguoi_lienhe");
		$Read->gioi_tinh->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_gioi_tinh");
		$Read->quocgia_id->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_quocgia_id");
		$Read->diachi_email->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_diachi_email");
		$Read->ma_quocgia_tel->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_quocgia_tel");
		$Read->ma_vung_tel->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_vung_tel");
		$Read->so_dienthoai->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_so_dienthoai");
		$Read->ma_quocgia_fax->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_quocgia_fax");
		$Read->ma_vung_fax->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ma_vung_fax");
		$Read->so_fax->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_so_fax");
		$Read->dia_chi->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_dia_chi");
		$Read->trang_thai->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_trang_thai");
		$Read->ngay_gui->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ngay_gui");
		$Read->ngay_gui->AdvancedSearch->SearchValue2 = $Read->getAdvancedSearch("y_ngay_gui");
		$Read->ngay_doc->AdvancedSearch->SearchValue = $Read->getAdvancedSearch("x_ngay_doc");
		$Read->ngay_doc->AdvancedSearch->SearchValue2 = $Read->getAdvancedSearch("y_ngay_doc");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $Read;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($Read->nguoidung_id->CurrentValue);
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
