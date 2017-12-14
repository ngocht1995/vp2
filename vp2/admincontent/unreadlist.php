<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "unreadinfo.php" ?>
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
$unread_list = new cunread_list();
$Page =& $unread_list;

// Page init processing
$unread_list->Page_Init();

// Page main processing
$unread_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($unread->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var unread_list = new ew_Page("unread_list");

// page properties
unread_list.PageID = "list"; // page ID
var EW_PAGE_ID = unread_list.PageID; // for backward compatibility

// extend page with validate function for search
unread_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_ngay_gui"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Ngay Gui");

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
unread_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
unread_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
unread_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
unread_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($unread->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($unread->Export == "" && $unread->SelectLimit);
	if (!$bSelectLimit)
		$rs = $unread_list->LoadRecordset();
	$unread_list->lTotalRecs = ($bSelectLimit) ? $unread->SelectRecordCount() : $rs->RecordCount();
	$unread_list->lStartRec = 1;
	if ($unread_list->lDisplayRecs <= 0) // Display all records
		$unread_list->lDisplayRecs = $unread_list->lTotalRecs;
	if (!($unread->ExportAll && $unread->Export <> ""))
		$unread_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $unread_list->LoadRecordset($unread_list->lStartRec-1, $unread_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách thư liên hệ chưa đọc</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Security->CanSearch()) { ?>
<?php if ($unread->Export == "" && $unread->CurrentAction == "") { ?>
<br>
<a href="javascript:ew_ToggleSearchPanel(unread_list);" style="text-decoration: none;"><img id="unread_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="unread_list_SearchPanel">
<form name="funreadlistsrch" id="funreadlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return unread_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="unread">
<?php
if ($gsSearchError == "")
	$unread_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$unread->RowType = EW_ROWTYPE_SEARCH;

// Render row
$unread_list->RenderRow();
?>
<br>
<table class="ewBasicSearch" bgcolor="#EBEBEB" width="725">
	<tr>
		<td><span class="phpmaker">Tiêu đề thư</span></td>
		<td><span class="ewSearchOpr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="z_tieu_de" id="z_tieu_de" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_tieu_de" id="x_tieu_de" size="91" value="<?php echo $unread->tieu_de->EditValue ?>"<?php echo $unread->tieu_de->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Địa chỉ Email</span></td>
		<td><span class="ewSearchOpr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="z_diachi_email" id="z_diachi_email" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_diachi_email" id="x_diachi_email" value="<?php echo $unread->diachi_email->EditValue ?>"<?php echo $unread->diachi_email->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày gửi</span></td>
		<td><span class="ewSearchOpr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="z_ngay_gui" id="z_ngay_gui" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_ngay_gui" id="x_ngay_gui" value="<?php echo $unread->ngay_gui->EditValue ?>"<?php echo $unread->ngay_gui->EditAttributes() ?>>
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
<input type="text" name="y_ngay_gui" id="y_ngay_gui" value="<?php echo $unread->ngay_gui->EditValue2 ?>"<?php echo $unread->ngay_gui->EditAttributes() ?>>
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
</table>
<table class="ewBasicSearch" bgcolor="#EBEBEB" width="725">
	<tr>
	<td width="110"></td>
		<td><span class="phpmaker">
		&nbsp;<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($unread->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $unread_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
			</span></td>
	</tr>
	<tr>
	<td width="108"></td>
	<td><span class="phpmaker"><label>&nbsp;<input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($unread->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($unread->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($unread->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>

</form>
</div>
<?php } ?>
<?php } ?>
<?php $unread_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($unread->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($unread->CurrentAction <> "gridadd" && $unread->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($unread_list->Pager)) $unread_list->Pager = new cNumericPager($unread_list->lStartRec, $unread_list->lDisplayRecs, $unread_list->lTotalRecs, $unread_list->lRecRange) ?>
<?php if ($unread_list->Pager->RecordCount > 0) { ?>
	<?php if ($unread_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($unread_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các thư từ <?php echo $unread_list->Pager->FromIndex ?> đến <?php echo $unread_list->Pager->ToIndex ?> của <?php echo $unread_list->Pager->RecordCount ?> thư
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($unread_list->sSrchWhere == "0=101") { ?>
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
<?php if ($unread_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số thư hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="unread">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($unread_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($unread_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($unread_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($unread->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($unread_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<br>
<a href="" onclick="if (!ew_KeySelected(document.funreadlist)) alert('Chưa chọn thư'); else {document.funreadlist.action='unreaddelete.php';document.funreadlist.encoding='application/x-www-form-urlencoded';document.funreadlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="funreadlist" id="funreadlist" class="ewForm" action="" method="post">
<?php if ($unread_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$unread_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$unread_list->lOptionCnt++; // view
}
if ($Security->CanDelete()) {
	$unread_list->lOptionCnt++; // Multi-select
}
	$unread_list->lOptionCnt += count($unread_list->ListOptions->Items); // Custom list options
?>
<?php echo $unread->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($unread->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="unread_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($unread_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($unread->tieu_de->Visible) { // tieu_de ?>
	<?php if ($unread->SortUrl($unread->tieu_de) == "") { ?>
		<td style="width: 250px; white-space: nowrap;">Tieu De</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $unread->SortUrl($unread->tieu_de) ?>',1);" style="width: 250px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề</td><td style="width: 10px;"><?php if ($unread->tieu_de->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($unread->tieu_de->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($unread->nguoi_lienhe->Visible) { // nguoi_lienhe ?>
	<?php if ($unread->SortUrl($unread->nguoi_lienhe) == "") { ?>
		<td style="width: 150px; white-space: nowrap;">Nguoi Lienhe</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $unread->SortUrl($unread->nguoi_lienhe) ?>',1);" style="width: 150px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Người liên hệ</td><td style="width: 10px;"><?php if ($unread->nguoi_lienhe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($unread->nguoi_lienhe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($unread->diachi_email->Visible) { // diachi_email ?>
	<?php if ($unread->SortUrl($unread->diachi_email) == "") { ?>
		<td style="width: 150px; white-space: nowrap;">Diachi Email</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $unread->SortUrl($unread->diachi_email) ?>',1);" style="width: 150px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Địa chỉ Email</td><td style="width: 10px;"><?php if ($unread->diachi_email->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($unread->diachi_email->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($unread->ngay_gui->Visible) { // ngay_gui ?>
	<?php if ($unread->SortUrl($unread->ngay_gui) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Ngay Gui</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $unread->SortUrl($unread->ngay_gui) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày gửi</td><td style="width: 10px;"><?php if ($unread->ngay_gui->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($unread->ngay_gui->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($unread->trang_thai->Visible) { // trang_thai ?>
	<?php if ($unread->SortUrl($unread->trang_thai) == "") { ?>
		<td style="white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $unread->SortUrl($unread->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($unread->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($unread->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($unread->ExportAll && $unread->Export <> "") {
	$unread_list->lStopRec = $unread_list->lTotalRecs;
} else {
	$unread_list->lStopRec = $unread_list->lStartRec + $unread_list->lDisplayRecs - 1; // Set the last record to display
}
$unread_list->lRecCount = $unread_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$unread->SelectLimit && $unread_list->lStartRec > 1)
		$rs->Move($unread_list->lStartRec - 1);
}
$unread_list->lRowCnt = 0;
while (($unread->CurrentAction == "gridadd" || !$rs->EOF) &&
	$unread_list->lRecCount < $unread_list->lStopRec) {
	$unread_list->lRecCount++;
	if (intval($unread_list->lRecCount) >= intval($unread_list->lStartRec)) {
		$unread_list->lRowCnt++;

	// Init row class and style
	$unread->CssClass = "";
	$unread->CssStyle = "";
	$unread->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($unread->CurrentAction == "gridadd") {
		$unread_list->LoadDefaultValues(); // Load default values
	} else {
		$unread_list->LoadRowValues($rs); // Load row values
	}
	$unread->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$unread_list->RenderRow();
?>
	<tr<?php echo $unread->RowAttributes() ?>>
<?php if ($unread->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($unread_list->ShowOptionLink()) { ?>
<a href="<?php echo $unread->ViewUrl() ?>">Xem</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($unread->thu_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($unread_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($unread->tieu_de->Visible) { // tieu_de ?>
		<td<?php echo $unread->tieu_de->CellAttributes() ?>>
<div<?php echo $unread->tieu_de->ViewAttributes() ?>><?php echo $unread->tieu_de->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($unread->nguoi_lienhe->Visible) { // nguoi_lienhe ?>
		<td<?php echo $unread->nguoi_lienhe->CellAttributes() ?>>
<div<?php echo $unread->nguoi_lienhe->ViewAttributes() ?>><?php echo $unread->nguoi_lienhe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($unread->diachi_email->Visible) { // diachi_email ?>
		<td<?php echo $unread->diachi_email->CellAttributes() ?>>
<div<?php echo $unread->diachi_email->ViewAttributes() ?>><?php echo $unread->diachi_email->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($unread->ngay_gui->Visible) { // ngay_gui ?>
		<td<?php echo $unread->ngay_gui->CellAttributes() ?>>
<div<?php echo $unread->ngay_gui->ViewAttributes() ?>><?php echo $unread->ngay_gui->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($unread->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $unread->trang_thai->CellAttributes() ?>>
<div<?php echo $unread->trang_thai->ViewAttributes() ?>><?php echo $unread->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($unread->CurrentAction <> "gridadd")
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
<?php if ($unread_list->lTotalRecs > 0) { ?>
<?php if ($unread->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($unread->CurrentAction <> "gridadd" && $unread->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($unread_list->Pager)) $unread_list->Pager = new cNumericPager($unread_list->lStartRec, $unread_list->lDisplayRecs, $unread_list->lTotalRecs, $unread_list->lRecRange) ?>
<?php if ($unread_list->Pager->RecordCount > 0) { ?>
	<?php if ($unread_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($unread_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $unread_list->PageUrl() ?>start=<?php echo $unread_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các thư từ <?php echo $unread_list->Pager->FromIndex ?> đến <?php echo $unread_list->Pager->ToIndex ?> của <?php echo $unread_list->Pager->RecordCount ?> thư
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($unread_list->sSrchWhere == "0=101") { ?>
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
<?php if ($unread_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số thư hiển thị &nbsp;</td><td>
<input type="hidden" id="t" name="t" value="unread">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($unread_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($unread_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($unread_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($unread->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($unread_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($unread_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<br>
<a href="" onclick="if (!ew_KeySelected(document.funreadlist)) alert('Chưa chọn thư'); else {document.funreadlist.action='unreaddelete.php';document.funreadlist.encoding='application/x-www-form-urlencoded';document.funreadlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($unread->Export == "" && $unread->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(unread_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($unread->Export == "") { ?>
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
class cunread_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'unread';

	// Page Object Name
	var $PageObjName = 'unread_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $unread;
		if ($unread->UseTokenInUrl) $PageUrl .= "t=" . $unread->TableVar . "&"; // add page token
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
		global $objForm, $unread;
		if ($unread->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($unread->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($unread->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cunread_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["unread"] = new cunread();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'unread', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $unread;
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
	$unread->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $unread->Export; // Get export parameter, used in header
	$gsExportFile = $unread->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $unread;
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
		if ($unread->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $unread->getRecordsPerPage(); // Restore from Session
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
		$unread->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$unread->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$unread->setStartRecordNumber($this->lStartRec);
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
		$unread->setSessionWhere($sFilter);
		$unread->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $unread;
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
			$unread->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$unread->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $unread;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $unread->tieu_de, FALSE); // Field tieu_de
		$this->BuildSearchSql($sWhere, $unread->noidung_lienhe, FALSE); // Field noidung_lienhe
		$this->BuildSearchSql($sWhere, $unread->nguoi_lienhe, FALSE); // Field nguoi_lienhe
		$this->BuildSearchSql($sWhere, $unread->gioi_tinh, FALSE); // Field gioi_tinh
		$this->BuildSearchSql($sWhere, $unread->quocgia_id, FALSE); // Field quocgia_id
		$this->BuildSearchSql($sWhere, $unread->diachi_email, FALSE); // Field diachi_email
		$this->BuildSearchSql($sWhere, $unread->ma_quocgia_tel, FALSE); // Field ma_quocgia_tel
		$this->BuildSearchSql($sWhere, $unread->ma_vung_tel, FALSE); // Field ma_vung_tel
		$this->BuildSearchSql($sWhere, $unread->so_dienthoai, FALSE); // Field so_dienthoai
		$this->BuildSearchSql($sWhere, $unread->ma_quocgia_fax, FALSE); // Field ma_quocgia_fax
		$this->BuildSearchSql($sWhere, $unread->ma_vung_fax, FALSE); // Field ma_vung_fax
		$this->BuildSearchSql($sWhere, $unread->so_fax, FALSE); // Field so_fax
		$this->BuildSearchSql($sWhere, $unread->dia_chi, FALSE); // Field dia_chi
		$this->BuildSearchSql($sWhere, $unread->ngay_gui, FALSE); // Field ngay_gui
		$this->BuildSearchSql($sWhere, $unread->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $unread->ngay_doc, FALSE); // Field ngay_doc

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($unread->tieu_de); // Field tieu_de
			$this->SetSearchParm($unread->noidung_lienhe); // Field noidung_lienhe
			$this->SetSearchParm($unread->nguoi_lienhe); // Field nguoi_lienhe
			$this->SetSearchParm($unread->gioi_tinh); // Field gioi_tinh
			$this->SetSearchParm($unread->quocgia_id); // Field quocgia_id
			$this->SetSearchParm($unread->diachi_email); // Field diachi_email
			$this->SetSearchParm($unread->ma_quocgia_tel); // Field ma_quocgia_tel
			$this->SetSearchParm($unread->ma_vung_tel); // Field ma_vung_tel
			$this->SetSearchParm($unread->so_dienthoai); // Field so_dienthoai
			$this->SetSearchParm($unread->ma_quocgia_fax); // Field ma_quocgia_fax
			$this->SetSearchParm($unread->ma_vung_fax); // Field ma_vung_fax
			$this->SetSearchParm($unread->so_fax); // Field so_fax
			$this->SetSearchParm($unread->dia_chi); // Field dia_chi
			$this->SetSearchParm($unread->ngay_gui); // Field ngay_gui
			$this->SetSearchParm($unread->trang_thai); // Field trang_thai
			$this->SetSearchParm($unread->ngay_doc); // Field ngay_doc
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
		global $unread;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$unread->setAdvancedSearch("x_$FldParm", $FldVal);
		$unread->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$unread->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$unread->setAdvancedSearch("y_$FldParm", $FldVal2);
		$unread->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $unread;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $unread->tieu_de->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $unread->nguoi_lienhe->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $unread->diachi_email->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $unread;
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
			$unread->setBasicSearchKeyword($sSearchKeyword);
			$unread->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $unread;
		$this->sSrchWhere = "";
		$unread->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $unread;
		$unread->setBasicSearchKeyword("");
		$unread->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $unread;
		$unread->setAdvancedSearch("x_tieu_de", "");
		$unread->setAdvancedSearch("x_noidung_lienhe", "");
		$unread->setAdvancedSearch("x_nguoi_lienhe", "");
		$unread->setAdvancedSearch("x_gioi_tinh", "");
		$unread->setAdvancedSearch("x_quocgia_id", "");
		$unread->setAdvancedSearch("x_diachi_email", "");
		$unread->setAdvancedSearch("x_ma_quocgia_tel", "");
		$unread->setAdvancedSearch("x_ma_vung_tel", "");
		$unread->setAdvancedSearch("x_so_dienthoai", "");
		$unread->setAdvancedSearch("x_ma_quocgia_fax", "");
		$unread->setAdvancedSearch("x_ma_vung_fax", "");
		$unread->setAdvancedSearch("x_so_fax", "");
		$unread->setAdvancedSearch("x_dia_chi", "");
		$unread->setAdvancedSearch("x_ngay_gui", "");
		$unread->setAdvancedSearch("y_ngay_gui", "");
		$unread->setAdvancedSearch("x_trang_thai", "");
		$unread->setAdvancedSearch("x_ngay_doc", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $unread;
		$this->sSrchWhere = $unread->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $unread;
		 $unread->tieu_de->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_tieu_de");
		 $unread->noidung_lienhe->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_noidung_lienhe");
		 $unread->nguoi_lienhe->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_nguoi_lienhe");
		 $unread->gioi_tinh->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_gioi_tinh");
		 $unread->quocgia_id->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_quocgia_id");
		 $unread->diachi_email->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_diachi_email");
		 $unread->ma_quocgia_tel->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_quocgia_tel");
		 $unread->ma_vung_tel->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_vung_tel");
		 $unread->so_dienthoai->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_so_dienthoai");
		 $unread->ma_quocgia_fax->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_quocgia_fax");
		 $unread->ma_vung_fax->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_vung_fax");
		 $unread->so_fax->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_so_fax");
		 $unread->dia_chi->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_dia_chi");
		 $unread->ngay_gui->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ngay_gui");
		 $unread->ngay_gui->AdvancedSearch->SearchValue2 = $unread->getAdvancedSearch("y_ngay_gui");
		 $unread->trang_thai->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_trang_thai");
		 $unread->ngay_doc->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ngay_doc");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $unread;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$unread->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$unread->CurrentOrderType = @$_GET["ordertype"];
			$unread->UpdateSort($unread->tieu_de); // Field
			$unread->UpdateSort($unread->nguoi_lienhe); // Field
			$unread->UpdateSort($unread->diachi_email); // Field
			$unread->UpdateSort($unread->ngay_gui); // Field
			$unread->UpdateSort($unread->trang_thai); // Field
			$unread->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $unread;
		$sOrderBy = $unread->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($unread->SqlOrderBy() <> "") {
				$sOrderBy = $unread->SqlOrderBy();
				$unread->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $unread;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$unread->setSessionOrderBy($sOrderBy);
				$unread->tieu_de->setSort("");
				$unread->nguoi_lienhe->setSort("");
				$unread->diachi_email->setSort("");
				$unread->ngay_gui->setSort("");
				$unread->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$unread->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $unread;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$unread->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$unread->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $unread->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$unread->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$unread->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$unread->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $unread;

		// Load search values
		// tieu_de

		$unread->tieu_de->AdvancedSearch->SearchValue = @$_GET["x_tieu_de"];
		$unread->tieu_de->AdvancedSearch->SearchOperator = @$_GET["z_tieu_de"];

		// noidung_lienhe
		$unread->noidung_lienhe->AdvancedSearch->SearchValue = @$_GET["x_noidung_lienhe"];
		$unread->noidung_lienhe->AdvancedSearch->SearchOperator = @$_GET["z_noidung_lienhe"];

		// nguoi_lienhe
		$unread->nguoi_lienhe->AdvancedSearch->SearchValue = @$_GET["x_nguoi_lienhe"];
		$unread->nguoi_lienhe->AdvancedSearch->SearchOperator = @$_GET["z_nguoi_lienhe"];

		// gioi_tinh
		$unread->gioi_tinh->AdvancedSearch->SearchValue = @$_GET["x_gioi_tinh"];
		$unread->gioi_tinh->AdvancedSearch->SearchOperator = @$_GET["z_gioi_tinh"];

		// quocgia_id
		$unread->quocgia_id->AdvancedSearch->SearchValue = @$_GET["x_quocgia_id"];
		$unread->quocgia_id->AdvancedSearch->SearchOperator = @$_GET["z_quocgia_id"];

		// diachi_email
		$unread->diachi_email->AdvancedSearch->SearchValue = @$_GET["x_diachi_email"];
		$unread->diachi_email->AdvancedSearch->SearchOperator = @$_GET["z_diachi_email"];

		// ma_quocgia_tel
		$unread->ma_quocgia_tel->AdvancedSearch->SearchValue = @$_GET["x_ma_quocgia_tel"];
		$unread->ma_quocgia_tel->AdvancedSearch->SearchOperator = @$_GET["z_ma_quocgia_tel"];

		// ma_vung_tel
		$unread->ma_vung_tel->AdvancedSearch->SearchValue = @$_GET["x_ma_vung_tel"];
		$unread->ma_vung_tel->AdvancedSearch->SearchOperator = @$_GET["z_ma_vung_tel"];

		// so_dienthoai
		$unread->so_dienthoai->AdvancedSearch->SearchValue = @$_GET["x_so_dienthoai"];
		$unread->so_dienthoai->AdvancedSearch->SearchOperator = @$_GET["z_so_dienthoai"];

		// ma_quocgia_fax
		$unread->ma_quocgia_fax->AdvancedSearch->SearchValue = @$_GET["x_ma_quocgia_fax"];
		$unread->ma_quocgia_fax->AdvancedSearch->SearchOperator = @$_GET["z_ma_quocgia_fax"];

		// ma_vung_fax
		$unread->ma_vung_fax->AdvancedSearch->SearchValue = @$_GET["x_ma_vung_fax"];
		$unread->ma_vung_fax->AdvancedSearch->SearchOperator = @$_GET["z_ma_vung_fax"];

		// so_fax
		$unread->so_fax->AdvancedSearch->SearchValue = @$_GET["x_so_fax"];
		$unread->so_fax->AdvancedSearch->SearchOperator = @$_GET["z_so_fax"];

		// dia_chi
		$unread->dia_chi->AdvancedSearch->SearchValue = @$_GET["x_dia_chi"];
		$unread->dia_chi->AdvancedSearch->SearchOperator = @$_GET["z_dia_chi"];

		// ngay_gui
		$unread->ngay_gui->AdvancedSearch->SearchValue = @$_GET["x_ngay_gui"];
		$unread->ngay_gui->AdvancedSearch->SearchOperator = @$_GET["z_ngay_gui"];
		$unread->ngay_gui->AdvancedSearch->SearchCondition = @$_GET["v_ngay_gui"];
		$unread->ngay_gui->AdvancedSearch->SearchValue2 = @$_GET["y_ngay_gui"];
		$unread->ngay_gui->AdvancedSearch->SearchOperator2 = @$_GET["w_ngay_gui"];

		// trang_thai
		$unread->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$unread->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// ngay_doc
		$unread->ngay_doc->AdvancedSearch->SearchValue = @$_GET["x_ngay_doc"];
		$unread->ngay_doc->AdvancedSearch->SearchOperator = @$_GET["z_ngay_doc"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $unread;

		// Call Recordset Selecting event
		$unread->Recordset_Selecting($unread->CurrentFilter);

		// Load list page SQL
		$sSql = $unread->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$unread->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $unread;
		$sFilter = $unread->KeyFilter();

		// Call Row Selecting event
		$unread->Row_Selecting($sFilter);

		// Load sql based on filter
		$unread->CurrentFilter = $sFilter;
		$sSql = $unread->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$unread->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $unread;
		$unread->thu_id->setDbValue($rs->fields('thu_id'));
		$unread->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$unread->tieu_de->setDbValue($rs->fields('tieu_de'));
		$unread->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$unread->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$unread->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$unread->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$unread->diachi_email->setDbValue($rs->fields('diachi_email'));
		$unread->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$unread->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$unread->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$unread->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$unread->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$unread->so_fax->setDbValue($rs->fields('so_fax'));
		$unread->dia_chi->setDbValue($rs->fields('dia_chi'));
		$unread->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$unread->trang_thai->setDbValue($rs->fields('trang_thai'));
		$unread->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $unread;

		// Call Row_Rendering event
		$unread->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$unread->tieu_de->CellCssStyle = "width: 250px; white-space: nowrap;";
		$unread->tieu_de->CellCssClass = "";

		// nguoi_lienhe
		$unread->nguoi_lienhe->CellCssStyle = "width: 150px; white-space: nowrap;";
		$unread->nguoi_lienhe->CellCssClass = "";

		// diachi_email
		$unread->diachi_email->CellCssStyle = "width: 150px; white-space: nowrap;";
		$unread->diachi_email->CellCssClass = "";

		// ngay_gui
		$unread->ngay_gui->CellCssStyle = "width: 120px; white-space: nowrap;";
		$unread->ngay_gui->CellCssClass = "";

		// trang_thai
		$unread->trang_thai->CellCssStyle = "white-space: nowrap;";
		$unread->trang_thai->CellCssClass = "";
		if ($unread->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$unread->tieu_de->ViewValue = $unread->tieu_de->CurrentValue;
			$unread->tieu_de->CssStyle = "";
			$unread->tieu_de->CssClass = "";
			$unread->tieu_de->ViewCustomAttributes = "";

			// nguoi_lienhe
			$unread->nguoi_lienhe->ViewValue = $unread->nguoi_lienhe->CurrentValue;
			$unread->nguoi_lienhe->CssStyle = "";
			$unread->nguoi_lienhe->CssClass = "";
			$unread->nguoi_lienhe->ViewCustomAttributes = "";

			// diachi_email
			$unread->diachi_email->ViewValue = $unread->diachi_email->CurrentValue;
			$unread->diachi_email->CssStyle = "";
			$unread->diachi_email->CssClass = "";
			$unread->diachi_email->ViewCustomAttributes = "";

			// ngay_gui
			$unread->ngay_gui->ViewValue = $unread->ngay_gui->CurrentValue;
			$unread->ngay_gui->ViewValue = ew_FormatDateTime($unread->ngay_gui->ViewValue, 7);
			$unread->ngay_gui->CssStyle = "";
			$unread->ngay_gui->CssClass = "";
			$unread->ngay_gui->ViewCustomAttributes = "";

			// trang_thai
			if (strval($unread->trang_thai->CurrentValue) <> "") {
				switch ($unread->trang_thai->CurrentValue) {
					case "1":
						$unread->trang_thai->ViewValue = "Chưa đọc";
						break;
					case "2":
						$unread->trang_thai->ViewValue = "Đã đọc";
						break;
					default:
						$unread->trang_thai->ViewValue = $unread->trang_thai->CurrentValue;
				}
			} else {
				$unread->trang_thai->ViewValue = NULL;
			}
			$unread->trang_thai->CssStyle = "";
			$unread->trang_thai->CssClass = "";
			$unread->trang_thai->ViewCustomAttributes = "";

			// tieu_de
			$unread->tieu_de->HrefValue = "";

			// nguoi_lienhe
			$unread->nguoi_lienhe->HrefValue = "";

			// diachi_email
			$unread->diachi_email->HrefValue = "";

			// ngay_gui
			$unread->ngay_gui->HrefValue = "";

			// trang_thai
			$unread->trang_thai->HrefValue = "";
		} elseif ($unread->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieu_de
			$unread->tieu_de->EditCustomAttributes = "";
			$unread->tieu_de->EditValue = ew_HtmlEncode($unread->tieu_de->AdvancedSearch->SearchValue);

			// nguoi_lienhe
			$unread->nguoi_lienhe->EditCustomAttributes = "";
			$unread->nguoi_lienhe->EditValue = ew_HtmlEncode($unread->nguoi_lienhe->AdvancedSearch->SearchValue);

			// diachi_email
			$unread->diachi_email->EditCustomAttributes = "";
			$unread->diachi_email->EditValue = ew_HtmlEncode($unread->diachi_email->AdvancedSearch->SearchValue);

			// ngay_gui
			$unread->ngay_gui->EditCustomAttributes = "";
			$unread->ngay_gui->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($unread->ngay_gui->AdvancedSearch->SearchValue, 7), 7));
			$unread->ngay_gui->EditCustomAttributes = "";
			$unread->ngay_gui->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($unread->ngay_gui->AdvancedSearch->SearchValue2, 7), 7));

			// trang_thai
			$unread->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chưa xem");
			$arwrk[] = array("2", "Đã xem");
			array_unshift($arwrk, array("", "Chọn"));
			$unread->trang_thai->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$unread->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $unread;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($unread->ngay_gui->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Gui";
		}
		if (!ew_CheckEuroDate($unread->ngay_gui->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Gui";
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
		global $unread;
		$unread->tieu_de->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_tieu_de");
		$unread->noidung_lienhe->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_noidung_lienhe");
		$unread->nguoi_lienhe->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_nguoi_lienhe");
		$unread->gioi_tinh->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_gioi_tinh");
		$unread->quocgia_id->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_quocgia_id");
		$unread->diachi_email->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_diachi_email");
		$unread->ma_quocgia_tel->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_quocgia_tel");
		$unread->ma_vung_tel->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_vung_tel");
		$unread->so_dienthoai->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_so_dienthoai");
		$unread->ma_quocgia_fax->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_quocgia_fax");
		$unread->ma_vung_fax->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ma_vung_fax");
		$unread->so_fax->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_so_fax");
		$unread->dia_chi->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_dia_chi");
		$unread->ngay_gui->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ngay_gui");
		$unread->ngay_gui->AdvancedSearch->SearchValue2 = $unread->getAdvancedSearch("y_ngay_gui");
		$unread->trang_thai->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_trang_thai");
		$unread->ngay_doc->AdvancedSearch->SearchValue = $unread->getAdvancedSearch("x_ngay_doc");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $unread;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($unread->nguoidung_id->CurrentValue);
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
