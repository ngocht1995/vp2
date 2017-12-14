<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "user_trackinfo.php" ?>
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
$user_track_list = new cuser_track_list();
$Page =& $user_track_list;

// Page init processing
$user_track_list->Page_Init();

// Page main processing
$user_track_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($user_track->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var user_track_list = new ew_Page("user_track_list");

// page properties
user_track_list.PageID = "list"; // page ID
var EW_PAGE_ID = user_track_list.PageID; // for backward compatibility

// extend page with validate function for search
user_track_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_thoigian_dangnhap"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Thoigian Dangnhap");

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
user_track_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_track_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_track_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_track_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($user_track->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($user_track->Export == "" && $user_track->SelectLimit);
	if (!$bSelectLimit)
		$rs = $user_track_list->LoadRecordset();
	$user_track_list->lTotalRecs = ($bSelectLimit) ? $user_track->SelectRecordCount() : $rs->RecordCount();
	$user_track_list->lStartRec = 1;
	if ($user_track_list->lDisplayRecs <= 0) // Display all records
		$user_track_list->lDisplayRecs = $user_track_list->lTotalRecs;
	if (!($user_track->ExportAll && $user_track->Export <> ""))
		$user_track_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $user_track_list->LoadRecordset($user_track_list->lStartRec-1, $user_track_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý nhóm người dùng</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Security->CanSearch()) { ?>
<?php if ($user_track->Export == "" && $user_track->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(user_track_list);" style="text-decoration: none;"><img id="user_track_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="user_track_list_SearchPanel">
<form name="fuser_tracklistsrch" id="fuser_tracklistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return user_track_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="user_track">
<?php
if ($gsSearchError == "")
	$user_track_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$user_track->RowType = EW_ROWTYPE_SEARCH;

// Render row
$user_track_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
		<br>
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($user_track->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value=" Tìm kiếm ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $user_track_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($user_track->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($user_track->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($user_track->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Địa chỉ IP</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_diachi_ip" id="z_diachi_ip" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_diachi_ip" id="x_diachi_ip" size="60" maxlength="60" value="<?php echo $user_track->diachi_ip->EditValue ?>"<?php echo $user_track->diachi_ip->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Tên đăng nhập</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_tendangnhap" id="z_tendangnhap" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_tendangnhap" id="x_tendangnhap" size="60" maxlength="60" value="<?php echo $user_track->tendangnhap->EditValue ?>"<?php echo $user_track->tendangnhap->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Thời gian đăng nhập</span></td>
		<td><span class="ewSearchOpr">Bắt đầu<input type="hidden" name="z_thoigian_dangnhap" id="z_thoigian_dangnhap" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoigian_dangnhap" id="x_thoigian_dangnhap" value="<?php echo $user_track->thoigian_dangnhap->EditValue ?>"<?php echo $user_track->thoigian_dangnhap->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoigian_dangnhap" name="cal_x_thoigian_dangnhap" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoigian_dangnhap", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoigian_dangnhap" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_thoigian_dangnhap" name="btw1_thoigian_dangnhap">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_thoigian_dangnhap" name="btw1_thoigian_dangnhap">
<input type="text" name="y_thoigian_dangnhap" id="y_thoigian_dangnhap" value="<?php echo $user_track->thoigian_dangnhap->EditValue2 ?>"<?php echo $user_track->thoigian_dangnhap->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_thoigian_dangnhap" name="cal_y_thoigian_dangnhap" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_thoigian_dangnhap", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_thoigian_dangnhap" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $user_track_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($user_track->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($user_track->CurrentAction <> "gridadd" && $user_track->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_track_list->Pager)) $user_track_list->Pager = new cNumericPager($user_track_list->lStartRec, $user_track_list->lDisplayRecs, $user_track_list->lTotalRecs, $user_track_list->lRecRange) ?>
<?php if ($user_track_list->Pager->RecordCount > 0) { ?>
	<?php if ($user_track_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_track_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $user_track_list->Pager->FromIndex ?> đến <?php echo $user_track_list->Pager->ToIndex ?> của <?php echo $user_track_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_track_list->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($user_track_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="user_track">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($user_track_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($user_track_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($user_track_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($user_track->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($user_track_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuser_tracklist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $user_track_list->sDeleteConfirmMsg ?>')) {document.fuser_tracklist.action='user_trackdelete.php';document.fuser_tracklist.encoding='application/x-www-form-urlencoded';document.fuser_tracklist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fuser_tracklist" id="fuser_tracklist" class="ewForm" action="" method="post">
<?php if ($user_track_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$user_track_list->lOptionCnt = 0;
if ($Security->CanDelete()) {
	$user_track_list->lOptionCnt++; // Multi-select
}
	$user_track_list->lOptionCnt += count($user_track_list->ListOptions->Items); // Custom list options
?>
<?php echo $user_track->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($user_track->Export == "") { ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="user_track_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($user_track_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($user_track->diachi_ip->Visible) { // diachi_ip ?>
	<?php if ($user_track->SortUrl($user_track->diachi_ip) == "") { ?>
		<td style="white-space: nowrap;">Địa chỉ IP</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_track->SortUrl($user_track->diachi_ip) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Địa chỉ IP</td><td style="width: 10px;"><?php if ($user_track->diachi_ip->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_track->diachi_ip->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($user_track->tendangnhap->Visible) { // tendangnhap ?>
	<?php if ($user_track->SortUrl($user_track->tendangnhap) == "") { ?>
		<td style="white-space: nowrap;">Tên đăng nhập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_track->SortUrl($user_track->tendangnhap) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên đăng nhập</td><td style="width: 10px;"><?php if ($user_track->tendangnhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_track->tendangnhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($user_track->thoigian_dangnhap->Visible) { // thoigian_dangnhap ?>
	<?php if ($user_track->SortUrl($user_track->thoigian_dangnhap) == "") { ?>
		<td style="white-space: nowrap;">Thời gian đăng nhập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_track->SortUrl($user_track->thoigian_dangnhap) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian đăng nhập</td><td style="width: 10px;"><?php if ($user_track->thoigian_dangnhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_track->thoigian_dangnhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($user_track->ExportAll && $user_track->Export <> "") {
	$user_track_list->lStopRec = $user_track_list->lTotalRecs;
} else {
	$user_track_list->lStopRec = $user_track_list->lStartRec + $user_track_list->lDisplayRecs - 1; // Set the last record to display
}
$user_track_list->lRecCount = $user_track_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$user_track->SelectLimit && $user_track_list->lStartRec > 1)
		$rs->Move($user_track_list->lStartRec - 1);
}
$user_track_list->lRowCnt = 0;
while (($user_track->CurrentAction == "gridadd" || !$rs->EOF) &&
	$user_track_list->lRecCount < $user_track_list->lStopRec) {
	$user_track_list->lRecCount++;
	if (intval($user_track_list->lRecCount) >= intval($user_track_list->lStartRec)) {
		$user_track_list->lRowCnt++;

	// Init row class and style
	$user_track->CssClass = "";
	$user_track->CssStyle = "";
	$user_track->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($user_track->CurrentAction == "gridadd") {
		$user_track_list->LoadDefaultValues(); // Load default values
	} else {
		$user_track_list->LoadRowValues($rs); // Load row values
	}
	$user_track->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$user_track_list->RenderRow();
?>
	<tr<?php echo $user_track->RowAttributes() ?>>
<?php if ($user_track->Export == "") { ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($user_track->user_track_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($user_track_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($user_track->diachi_ip->Visible) { // diachi_ip ?>
		<td<?php echo $user_track->diachi_ip->CellAttributes() ?>>
<div<?php echo $user_track->diachi_ip->ViewAttributes() ?>><?php echo $user_track->diachi_ip->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($user_track->tendangnhap->Visible) { // tendangnhap ?>
		<td<?php echo $user_track->tendangnhap->CellAttributes() ?>>
<div<?php echo $user_track->tendangnhap->ViewAttributes() ?>><?php echo $user_track->tendangnhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($user_track->thoigian_dangnhap->Visible) { // thoigian_dangnhap ?>
		<td<?php echo $user_track->thoigian_dangnhap->CellAttributes() ?>>
<div<?php echo $user_track->thoigian_dangnhap->ViewAttributes() ?>><?php echo $user_track->thoigian_dangnhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($user_track->CurrentAction <> "gridadd")
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
<?php if ($user_track_list->lTotalRecs > 0) { ?>
<?php if ($user_track->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($user_track->CurrentAction <> "gridadd" && $user_track->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_track_list->Pager)) $user_track_list->Pager = new cNumericPager($user_track_list->lStartRec, $user_track_list->lDisplayRecs, $user_track_list->lTotalRecs, $user_track_list->lRecRange) ?>
<?php if ($user_track_list->Pager->RecordCount > 0) { ?>
	<?php if ($user_track_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_track_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_track_list->PageUrl() ?>start=<?php echo $user_track_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_track_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $user_track_list->Pager->FromIndex ?> đến <?php echo $user_track_list->Pager->ToIndex ?> của <?php echo $user_track_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_track_list->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($user_track_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="user_track">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($user_track_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($user_track_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($user_track_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($user_track->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($user_track_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($user_track_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuser_tracklist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $user_track_list->sDeleteConfirmMsg ?>')) {document.fuser_tracklist.action='user_trackdelete.php';document.fuser_tracklist.encoding='application/x-www-form-urlencoded';document.fuser_tracklist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($user_track->Export == "" && $user_track->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(user_track_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($user_track->Export == "") { ?>
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
class cuser_track_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'user_track';

	// Page Object Name
	var $PageObjName = 'user_track_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user_track;
		if ($user_track->UseTokenInUrl) $PageUrl .= "t=" . $user_track->TableVar . "&"; // add page token
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
		global $objForm, $user_track;
		if ($user_track->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user_track->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user_track->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_track_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["user_track"] = new cuser_track();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user_track', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user_track;
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
	$user_track->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $user_track->Export; // Get export parameter, used in header
	$gsExportFile = $user_track->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $user_track;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
                $this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn không?"; // Delete confirm message

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
		if ($user_track->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $user_track->getRecordsPerPage(); // Restore from Session
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
		$user_track->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$user_track->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$user_track->setStartRecordNumber($this->lStartRec);
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
		$user_track->setSessionWhere($sFilter);
		$user_track->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $user_track;
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
			$user_track->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$user_track->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $user_track;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $user_track->diachi_ip, FALSE); // Field diachi_ip
		$this->BuildSearchSql($sWhere, $user_track->tendangnhap, FALSE); // Field tendangnhap
		$this->BuildSearchSql($sWhere, $user_track->thoigian_dangnhap, FALSE); // Field thoigian_dangnhap

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($user_track->diachi_ip); // Field diachi_ip
			$this->SetSearchParm($user_track->tendangnhap); // Field tendangnhap
			$this->SetSearchParm($user_track->thoigian_dangnhap); // Field thoigian_dangnhap
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
		global $user_track;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$user_track->setAdvancedSearch("x_$FldParm", $FldVal);
		$user_track->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$user_track->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$user_track->setAdvancedSearch("y_$FldParm", $FldVal2);
		$user_track->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $user_track;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $user_track->diachi_ip->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $user_track->tendangnhap->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $user_track;
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
			$user_track->setBasicSearchKeyword($sSearchKeyword);
			$user_track->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $user_track;
		$this->sSrchWhere = "";
		$user_track->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $user_track;
		$user_track->setBasicSearchKeyword("");
		$user_track->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $user_track;
		$user_track->setAdvancedSearch("x_diachi_ip", "");
		$user_track->setAdvancedSearch("x_tendangnhap", "");
		$user_track->setAdvancedSearch("x_thoigian_dangnhap", "");
		$user_track->setAdvancedSearch("y_thoigian_dangnhap", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $user_track;
		$this->sSrchWhere = $user_track->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $user_track;
		 $user_track->diachi_ip->AdvancedSearch->SearchValue = $user_track->getAdvancedSearch("x_diachi_ip");
		 $user_track->tendangnhap->AdvancedSearch->SearchValue = $user_track->getAdvancedSearch("x_tendangnhap");
		 $user_track->thoigian_dangnhap->AdvancedSearch->SearchValue = $user_track->getAdvancedSearch("x_thoigian_dangnhap");
		 $user_track->thoigian_dangnhap->AdvancedSearch->SearchValue2 = $user_track->getAdvancedSearch("y_thoigian_dangnhap");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $user_track;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$user_track->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$user_track->CurrentOrderType = @$_GET["ordertype"];
			$user_track->UpdateSort($user_track->diachi_ip); // Field 
			$user_track->UpdateSort($user_track->tendangnhap); // Field 
			$user_track->UpdateSort($user_track->thoigian_dangnhap); // Field 
			$user_track->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $user_track;
		$sOrderBy = $user_track->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($user_track->SqlOrderBy() <> "") {
				$sOrderBy = $user_track->SqlOrderBy();
				$user_track->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $user_track;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$user_track->setSessionOrderBy($sOrderBy);
				$user_track->diachi_ip->setSort("");
				$user_track->tendangnhap->setSort("");
				$user_track->thoigian_dangnhap->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$user_track->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $user_track;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$user_track->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$user_track->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $user_track->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$user_track->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$user_track->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$user_track->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $user_track;

		// Load search values
		// diachi_ip

		$user_track->diachi_ip->AdvancedSearch->SearchValue = @$_GET["x_diachi_ip"];
		$user_track->diachi_ip->AdvancedSearch->SearchOperator = @$_GET["z_diachi_ip"];

		// tendangnhap
		$user_track->tendangnhap->AdvancedSearch->SearchValue = @$_GET["x_tendangnhap"];
		$user_track->tendangnhap->AdvancedSearch->SearchOperator = @$_GET["z_tendangnhap"];

		// thoigian_dangnhap
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchValue = @$_GET["x_thoigian_dangnhap"];
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_dangnhap"];
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchCondition = @$_GET["v_thoigian_dangnhap"];
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchValue2 = @$_GET["y_thoigian_dangnhap"];
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchOperator2 = @$_GET["w_thoigian_dangnhap"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user_track;

		// Call Recordset Selecting event
		$user_track->Recordset_Selecting($user_track->CurrentFilter);

		// Load list page SQL
		$sSql = $user_track->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user_track->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user_track;
		$sFilter = $user_track->KeyFilter();

		// Call Row Selecting event
		$user_track->Row_Selecting($sFilter);

		// Load sql based on filter
		$user_track->CurrentFilter = $sFilter;
		$sSql = $user_track->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user_track->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user_track;
		$user_track->diachi_ip->setDbValue($rs->fields('diachi_ip'));
		$user_track->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$user_track->thoigian_dangnhap->setDbValue($rs->fields('thoigian_dangnhap'));
		$user_track->user_track_id->setDbValue($rs->fields('user_track_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user_track;

		// Call Row_Rendering event
		$user_track->Row_Rendering();

		// Common render codes for all row types
		// diachi_ip

		$user_track->diachi_ip->CellCssStyle = "white-space: nowrap;";
		$user_track->diachi_ip->CellCssClass = "";

		// tendangnhap
		$user_track->tendangnhap->CellCssStyle = "white-space: nowrap;";
		$user_track->tendangnhap->CellCssClass = "";

		// thoigian_dangnhap
		$user_track->thoigian_dangnhap->CellCssStyle = "white-space: nowrap;";
		$user_track->thoigian_dangnhap->CellCssClass = "";
		if ($user_track->RowType == EW_ROWTYPE_VIEW) { // View row

			// diachi_ip
			$user_track->diachi_ip->ViewValue = $user_track->diachi_ip->CurrentValue;
			$user_track->diachi_ip->CssStyle = "";
			$user_track->diachi_ip->CssClass = "";
			$user_track->diachi_ip->ViewCustomAttributes = "";

			// tendangnhap
			$user_track->tendangnhap->ViewValue = $user_track->tendangnhap->CurrentValue;
			$user_track->tendangnhap->CssStyle = "";
			$user_track->tendangnhap->CssClass = "";
			$user_track->tendangnhap->ViewCustomAttributes = "";

			// thoigian_dangnhap
			$user_track->thoigian_dangnhap->ViewValue = $user_track->thoigian_dangnhap->CurrentValue;
			$user_track->thoigian_dangnhap->ViewValue = ew_FormatDateTime($user_track->thoigian_dangnhap->ViewValue, 7);
			$user_track->thoigian_dangnhap->CssStyle = "";
			$user_track->thoigian_dangnhap->CssClass = "";
			$user_track->thoigian_dangnhap->ViewCustomAttributes = "";

			// diachi_ip
			$user_track->diachi_ip->HrefValue = "";

			// tendangnhap
			$user_track->tendangnhap->HrefValue = "";

			// thoigian_dangnhap
			$user_track->thoigian_dangnhap->HrefValue = "";
		} elseif ($user_track->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// diachi_ip
			$user_track->diachi_ip->EditCustomAttributes = "";
			$user_track->diachi_ip->EditValue = ew_HtmlEncode($user_track->diachi_ip->AdvancedSearch->SearchValue);

			// tendangnhap
			$user_track->tendangnhap->EditCustomAttributes = "";
			$user_track->tendangnhap->EditValue = ew_HtmlEncode($user_track->tendangnhap->AdvancedSearch->SearchValue);

			// thoigian_dangnhap
			$user_track->thoigian_dangnhap->EditCustomAttributes = "";
			$user_track->thoigian_dangnhap->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($user_track->thoigian_dangnhap->AdvancedSearch->SearchValue, 7), 7));
			$user_track->thoigian_dangnhap->EditCustomAttributes = "";
			$user_track->thoigian_dangnhap->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($user_track->thoigian_dangnhap->AdvancedSearch->SearchValue2, 7), 7));
		}

		// Call Row Rendered event
		$user_track->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $user_track;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		/*if (!ew_CheckEuroDate($user_track->thoigian_dangnhap->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thoigian Dangnhap";
		}
		if (!ew_CheckEuroDate($user_track->thoigian_dangnhap->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thoigian Dangnhap";
		}*/

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
		global $user_track;
		$user_track->diachi_ip->AdvancedSearch->SearchValue = $user_track->getAdvancedSearch("x_diachi_ip");
		$user_track->tendangnhap->AdvancedSearch->SearchValue = $user_track->getAdvancedSearch("x_tendangnhap");
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchValue = $user_track->getAdvancedSearch("x_thoigian_dangnhap");
		$user_track->thoigian_dangnhap->AdvancedSearch->SearchValue2 = $user_track->getAdvancedSearch("y_thoigian_dangnhap");
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
