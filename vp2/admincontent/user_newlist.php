<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "user_newinfo.php" ?>
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
$user_new_list = new cuser_new_list();
$Page =& $user_new_list;

// Page init processing
$user_new_list->Page_Init();

// Page main processing
$user_new_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($user_new->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var user_new_list = new ew_Page("user_new_list");

// page properties
user_new_list.PageID = "list"; // page ID
var EW_PAGE_ID = user_new_list.PageID; // for backward compatibility

// extend page with validate function for search
user_new_list.ValidateSearch = function(fobj) {
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
user_new_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_new_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_new_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_new_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($user_new->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($user_new->Export == "" && $user_new->SelectLimit);
	if (!$bSelectLimit)
		$rs = $user_new_list->LoadRecordset();
	$user_new_list->lTotalRecs = ($bSelectLimit) ? $user_new->SelectRecordCount() : $rs->RecordCount();
	$user_new_list->lStartRec = 1;
	if ($user_new_list->lDisplayRecs <= 0) // Display all records
		$user_new_list->lDisplayRecs = $user_new_list->lTotalRecs;
	if (!($user_new->ExportAll && $user_new->Export <> ""))
		$user_new_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $user_new_list->LoadRecordset($user_new_list->lStartRec-1, $user_new_list->lDisplayRecs);
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
<?php if ($user_new->Export == "" && $user_new->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(user_new_list);" style="text-decoration: none;"><img id="user_new_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="user_new_list_SearchPanel">
<form name="fuser_newlistsrch" id="fuser_newlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return user_new_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="user_new">
<?php
if ($gsSearchError == "")
	$user_new_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$user_new->RowType = EW_ROWTYPE_SEARCH;

// Render row
$user_new_list->RenderRow();
?>
<br>
<table class="ewBasicSearch" width="725" bgcolor="#EBEBEB">
	<tr>
		<td><span class="phpmaker">Thời gian nhập</span></td>
		<td><span class="ewSearchOpr"> Từ <input type="hidden" name="z_thoigian_them" id="z_thoigian_them" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoigian_them" id="x_thoigian_them" value="<?php echo $user_new->thoigian_them->EditValue ?>"<?php echo $user_new->thoigian_them->EditAttributes() ?>>
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
<input type="text" name="y_thoigian_them" id="y_thoigian_them" value="<?php echo $user_new->thoigian_them->EditValue2 ?>"<?php echo $user_new->thoigian_them->EditAttributes() ?>>
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
<select id="x_trang_thai" name="x_trang_thai"<?php echo $user_new->trang_thai->EditAttributes() ?>>
<?php
if (is_array($user_new->trang_thai->EditValue)) {
	$arwrk = $user_new->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($user_new->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($user_new->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value=" Tìm kiếm ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $user_new_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($user_new->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($user_new->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($user_new->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $user_new_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($user_new->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($user_new->CurrentAction <> "gridadd" && $user_new->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_new_list->Pager)) $user_new_list->Pager = new cNumericPager($user_new_list->lStartRec, $user_new_list->lDisplayRecs, $user_new_list->lTotalRecs, $user_new_list->lRecRange) ?>
<?php if ($user_new_list->Pager->RecordCount > 0) { ?>
	<?php if ($user_new_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_new_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các tin từ <?php echo $user_new_list->Pager->FromIndex ?> đến <?php echo $user_new_list->Pager->ToIndex ?> của <?php echo $user_new_list->Pager->RecordCount ?> tin
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_new_list->sSrchWhere == "0=101") { ?>
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
<?php if ($user_new_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị</td><td>
<input type="hidden" id="t" name="t" value="user_new">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($user_new_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($user_new_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($user_new_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($user_new->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $user_new->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($user_new_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuser_newlist)) alert('Chưa chọn tin'); else {document.fuser_newlist.action='user_newdelete.php';document.fuser_newlist.encoding='application/x-www-form-urlencoded';document.fuser_newlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuser_newlist)) alert('Chưa chọn tin'); else {document.fuser_newlist.action='user_newupdate.php';document.fuser_newlist.encoding='application/x-www-form-urlencoded';document.fuser_newlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fuser_newlist" id="fuser_newlist" class="ewForm" action="" method="post">
<?php if ($user_new_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$user_new_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$user_new_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$user_new_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$user_new_list->lOptionCnt++; // Multi-select
}
	$user_new_list->lOptionCnt += count($user_new_list->ListOptions->Items); // Custom list options
?>
<?php echo $user_new->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($user_new->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="user_new_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($user_new_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($user_new->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<?php if ($user_new->SortUrl($user_new->tieude_tintuc) == "") { ?>
		<td style="width: 340px; white-space: nowrap;">Tieude Tintuc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_new->SortUrl($user_new->tieude_tintuc) ?>',1);" style="width: 340px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề&nbsp;(*)</td><td style="width: 10px;"><?php if ($user_new->tieude_tintuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_new->tieude_tintuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($user_new->thoigian_them->Visible) { // thoigian_them ?>
	<?php if ($user_new->SortUrl($user_new->thoigian_them) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Thoigian Them</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_new->SortUrl($user_new->thoigian_them) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian nhập</td><td style="width: 10px;"><?php if ($user_new->thoigian_them->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_new->thoigian_them->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($user_new->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<?php if ($user_new->SortUrl($user_new->soluot_truynhap) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Soluot Truynhap</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_new->SortUrl($user_new->soluot_truynhap) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số lượt xem</td><td style="width: 10px;"><?php if ($user_new->soluot_truynhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_new->soluot_truynhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($user_new->trang_thai->Visible) { // trang_thai ?>
	<?php if ($user_new->SortUrl($user_new->trang_thai) == "") { ?>
		<td style="width: 120px; white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_new->SortUrl($user_new->trang_thai) ?>',1);" style="width: 120px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($user_new->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_new->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($user_new->xuatban->Visible) { // xuatban ?>
	<?php if ($user_new->SortUrl($user_new->xuatban) == "") { ?>
		<td style="white-space: nowrap;">Xuatban</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $user_new->SortUrl($user_new->xuatban) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($user_new->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($user_new->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($user_new->ExportAll && $user_new->Export <> "") {
	$user_new_list->lStopRec = $user_new_list->lTotalRecs;
} else {
	$user_new_list->lStopRec = $user_new_list->lStartRec + $user_new_list->lDisplayRecs - 1; // Set the last record to display
}
$user_new_list->lRecCount = $user_new_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$user_new->SelectLimit && $user_new_list->lStartRec > 1)
		$rs->Move($user_new_list->lStartRec - 1);
}
$user_new_list->lRowCnt = 0;
while (($user_new->CurrentAction == "gridadd" || !$rs->EOF) &&
	$user_new_list->lRecCount < $user_new_list->lStopRec) {
	$user_new_list->lRecCount++;
	if (intval($user_new_list->lRecCount) >= intval($user_new_list->lStartRec)) {
		$user_new_list->lRowCnt++;

	// Init row class and style
	$user_new->CssClass = "";
	$user_new->CssStyle = "";
	$user_new->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($user_new->CurrentAction == "gridadd") {
		$user_new_list->LoadDefaultValues(); // Load default values
	} else {
		$user_new_list->LoadRowValues($rs); // Load row values
	}
	$user_new->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$user_new_list->RenderRow();
?>
	<tr<?php echo $user_new->RowAttributes() ?>>
<?php if ($user_new->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($user_new_list->ShowOptionLink()) { ?>
<a href="<?php echo $user_new->ViewUrl() ?>">Xem</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($user_new_list->ShowOptionLink()) { ?>
<a href="<?php echo $user_new->EditUrl() ?>">Sửa</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($user_new->tintuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($user_new_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($user_new->tieude_tintuc->Visible) { // tieude_tintuc ?>
		<td<?php echo $user_new->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->tieude_tintuc->ViewAttributes() ?>><?php echo $user_new->tieude_tintuc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($user_new->thoigian_them->Visible) { // thoigian_them ?>
		<td<?php echo $user_new->thoigian_them->CellAttributes() ?>>
<div<?php echo $user_new->thoigian_them->ViewAttributes() ?>><?php echo $user_new->thoigian_them->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($user_new->soluot_truynhap->Visible) { // soluot_truynhap ?>
		<td<?php echo $user_new->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $user_new->soluot_truynhap->ViewAttributes() ?>><?php echo $user_new->soluot_truynhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($user_new->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $user_new->trang_thai->CellAttributes() ?>>
<div<?php echo $user_new->trang_thai->ViewAttributes() ?>><?php echo $user_new->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($user_new->xuatban->Visible) { // xuatban ?>
		<td<?php echo $user_new->xuatban->CellAttributes() ?>>
<div<?php echo $user_new->xuatban->ViewAttributes() ?>><?php echo $user_new->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($user_new->CurrentAction <> "gridadd")
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
<?php if ($user_new_list->lTotalRecs > 0) { ?>
<?php if ($user_new->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($user_new->CurrentAction <> "gridadd" && $user_new->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_new_list->Pager)) $user_new_list->Pager = new cNumericPager($user_new_list->lStartRec, $user_new_list->lDisplayRecs, $user_new_list->lTotalRecs, $user_new_list->lRecRange) ?>
<?php if ($user_new_list->Pager->RecordCount > 0) { ?>
	<?php if ($user_new_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_new_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_new_list->PageUrl() ?>start=<?php echo $user_new_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các tin từ <?php echo $user_new_list->Pager->FromIndex ?> đến <?php echo $user_new_list->Pager->ToIndex ?> của <?php echo $user_new_list->Pager->RecordCount ?> tin
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_new_list->sSrchWhere == "0=101") { ?>
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
<?php if ($user_new_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị</td><td>
<input type="hidden" id="t" name="t" value="user_new">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($user_new_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($user_new_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($user_new_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($user_new->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($user_new_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $user_new->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($user_new_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuser_newlist)) alert('Chưa chọn tin'); else {document.fuser_newlist.action='user_newdelete.php';document.fuser_newlist.encoding='application/x-www-form-urlencoded';document.fuser_newlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fuser_newlist)) alert('Chưa chọn tin'); else {document.fuser_newlist.action='user_newupdate.php';document.fuser_newlist.encoding='application/x-www-form-urlencoded';document.fuser_newlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($user_new->Export == "" && $user_new->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(user_new_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($user_new->Export == "") { ?>
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
class cuser_new_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'user_new';

	// Page Object Name
	var $PageObjName = 'user_new_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user_new;
		if ($user_new->UseTokenInUrl) $PageUrl .= "t=" . $user_new->TableVar . "&"; // add page token
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
		global $objForm, $user_new;
		if ($user_new->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user_new->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user_new->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_new_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["user_new"] = new cuser_new();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user_new', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user_new;
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
	$user_new->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $user_new->Export; // Get export parameter, used in header
	$gsExportFile = $user_new->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $user_new;
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
		if ($user_new->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $user_new->getRecordsPerPage(); // Restore from Session
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
		$user_new->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$user_new->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$user_new->setStartRecordNumber($this->lStartRec);
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
		$user_new->setSessionWhere($sFilter);
		$user_new->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $user_new;
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
			$user_new->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$user_new->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $user_new;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $user_new->tukhoa_tintuc, FALSE); // Field tukhoa_tintuc
		$this->BuildSearchSql($sWhere, $user_new->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $user_new->trang_thai, FALSE); // Field trang_thai

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($user_new->tukhoa_tintuc); // Field tukhoa_tintuc
			$this->SetSearchParm($user_new->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($user_new->trang_thai); // Field trang_thai
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
		global $user_new;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$user_new->setAdvancedSearch("x_$FldParm", $FldVal);
		$user_new->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$user_new->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$user_new->setAdvancedSearch("y_$FldParm", $FldVal2);
		$user_new->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $user_new;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $user_new->tieude_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $user_new->tomtat_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $user_new->nguon_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $user_new->noidung_tintuc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $user_new;
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
			$user_new->setBasicSearchKeyword($sSearchKeyword);
			$user_new->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $user_new;
		$this->sSrchWhere = "";
		$user_new->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $user_new;
		$user_new->setBasicSearchKeyword("");
		$user_new->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $user_new;
		$user_new->setAdvancedSearch("x_tukhoa_tintuc", "");
		$user_new->setAdvancedSearch("x_thoigian_them", "");
		$user_new->setAdvancedSearch("y_thoigian_them", "");
		$user_new->setAdvancedSearch("x_trang_thai", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $user_new;
		$this->sSrchWhere = $user_new->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $user_new;
		 $user_new->tukhoa_tintuc->AdvancedSearch->SearchValue = $user_new->getAdvancedSearch("x_tukhoa_tintuc");
		 $user_new->thoigian_them->AdvancedSearch->SearchValue = $user_new->getAdvancedSearch("x_thoigian_them");
		 $user_new->thoigian_them->AdvancedSearch->SearchValue2 = $user_new->getAdvancedSearch("y_thoigian_them");
		 $user_new->trang_thai->AdvancedSearch->SearchValue = $user_new->getAdvancedSearch("x_trang_thai");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $user_new;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$user_new->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$user_new->CurrentOrderType = @$_GET["ordertype"];
			$user_new->UpdateSort($user_new->tieude_tintuc); // Field 
			$user_new->UpdateSort($user_new->thoigian_them); // Field 
			$user_new->UpdateSort($user_new->soluot_truynhap); // Field 
			$user_new->UpdateSort($user_new->trang_thai); // Field 
			$user_new->UpdateSort($user_new->xuatban); // Field 
			$user_new->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $user_new;
		$sOrderBy = $user_new->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($user_new->SqlOrderBy() <> "") {
				$sOrderBy = $user_new->SqlOrderBy();
				$user_new->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $user_new;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$user_new->setSessionOrderBy($sOrderBy);
				$user_new->tieude_tintuc->setSort("");
				$user_new->thoigian_them->setSort("");
				$user_new->soluot_truynhap->setSort("");
				$user_new->trang_thai->setSort("");
				$user_new->xuatban->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$user_new->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $user_new;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$user_new->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$user_new->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $user_new->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$user_new->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$user_new->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$user_new->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $user_new;

		// Load search values
		// thoigian_them

		$user_new->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$user_new->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];
		$user_new->thoigian_them->AdvancedSearch->SearchCondition = @$_GET["v_thoigian_them"];
		$user_new->thoigian_them->AdvancedSearch->SearchValue2 = @$_GET["y_thoigian_them"];
		$user_new->thoigian_them->AdvancedSearch->SearchOperator2 = @$_GET["w_thoigian_them"];

		// trang_thai
		$user_new->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$user_new->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user_new;

		// Call Recordset Selecting event
		$user_new->Recordset_Selecting($user_new->CurrentFilter);

		// Load list page SQL
		$sSql = $user_new->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user_new->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user_new;
		$sFilter = $user_new->KeyFilter();

		// Call Row Selecting event
		$user_new->Row_Selecting($sFilter);

		// Load sql based on filter
		$user_new->CurrentFilter = $sFilter;
		$sSql = $user_new->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user_new->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user_new;
		$user_new->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$user_new->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user_new->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$user_new->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$user_new->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$user_new->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$user_new->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$user_new->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$user_new->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$user_new->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$user_new->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$user_new->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$user_new->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$user_new->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$user_new->trang_thai->setDbValue($rs->fields('trang_thai'));
		$user_new->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$user_new->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user_new;

		// Call Row_Rendering event
		$user_new->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$user_new->tieude_tintuc->CellCssStyle = "width: 340px; white-space: nowrap;";
		$user_new->tieude_tintuc->CellCssClass = "";

		// thoigian_them
		$user_new->thoigian_them->CellCssStyle = "width: 120px; white-space: nowrap;";
		$user_new->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$user_new->soluot_truynhap->CellCssStyle = "width: 120px; white-space: nowrap;";
		$user_new->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$user_new->trang_thai->CellCssStyle = "width: 120px; white-space: nowrap;";
		$user_new->trang_thai->CellCssClass = "";

		// xuatban
		$user_new->xuatban->CellCssStyle = "white-space: nowrap;";
		$user_new->xuatban->CellCssClass = "";
		if ($user_new->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$user_new->tieude_tintuc->ViewValue = $user_new->tieude_tintuc->CurrentValue;
			$user_new->tieude_tintuc->CssStyle = "";
			$user_new->tieude_tintuc->CssClass = "";
			$user_new->tieude_tintuc->ViewCustomAttributes = "";

			// thoigian_them
			$user_new->thoigian_them->ViewValue = $user_new->thoigian_them->CurrentValue;
			$user_new->thoigian_them->ViewValue = ew_FormatDateTime($user_new->thoigian_them->ViewValue, 7);
			$user_new->thoigian_them->CssStyle = "";
			$user_new->thoigian_them->CssClass = "";
			$user_new->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$user_new->soluot_truynhap->ViewValue = $user_new->soluot_truynhap->CurrentValue;
			$user_new->soluot_truynhap->CssStyle = "";
			$user_new->soluot_truynhap->CssClass = "";
			$user_new->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($user_new->trang_thai->CurrentValue) <> "") {
				switch ($user_new->trang_thai->CurrentValue) {
					case "1":
						$user_new->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa kích hoạt</font>";
						break;
					case "2":
						$user_new->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$user_new->trang_thai->ViewValue = $user_new->trang_thai->CurrentValue;
				}
			} else {
				$user_new->trang_thai->ViewValue = NULL;
			}
			$user_new->trang_thai->CssStyle = "";
			$user_new->trang_thai->CssClass = "";
			$user_new->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($user_new->xuatban->CurrentValue) <> "") {
				switch ($user_new->xuatban->CurrentValue) {
					case "0":
						$user_new->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$user_new->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$user_new->xuatban->ViewValue = $user_new->xuatban->CurrentValue;
				}
			} else {
				$user_new->xuatban->ViewValue = NULL;
			}
			$user_new->xuatban->CssStyle = "";
			$user_new->xuatban->CssClass = "";
			$user_new->xuatban->ViewCustomAttributes = "";

			// tieude_tintuc
			$user_new->tieude_tintuc->HrefValue = "";

			// thoigian_them
			$user_new->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$user_new->soluot_truynhap->HrefValue = "";

			// trang_thai
			$user_new->trang_thai->HrefValue = "";

			// xuatban
			$user_new->xuatban->HrefValue = "";
		} elseif ($user_new->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieude_tintuc
			$user_new->tieude_tintuc->EditCustomAttributes = "";
			$user_new->tieude_tintuc->EditValue = ew_HtmlEncode($user_new->tieude_tintuc->AdvancedSearch->SearchValue);

			// thoigian_them
			$user_new->thoigian_them->EditCustomAttributes = "";
			$user_new->thoigian_them->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($user_new->thoigian_them->AdvancedSearch->SearchValue, 7), 7));
			$user_new->thoigian_them->EditCustomAttributes = "";
			$user_new->thoigian_them->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($user_new->thoigian_them->AdvancedSearch->SearchValue2, 7), 7));

			// soluot_truynhap
			$user_new->soluot_truynhap->EditCustomAttributes = "";
			$user_new->soluot_truynhap->EditValue = ew_HtmlEncode($user_new->soluot_truynhap->AdvancedSearch->SearchValue);

			// trang_thai
			$user_new->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chưa kích hoạt");
			$arwrk[] = array("2", "Đã kích hoạt");
			array_unshift($arwrk, array("", "Chọn"));
			$user_new->trang_thai->EditValue = $arwrk;

			// xuatban
			$user_new->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$user_new->xuatban->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$user_new->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $user_new;

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
		global $user_new;
		$user_new->thoigian_them->AdvancedSearch->SearchValue = $user_new->getAdvancedSearch("x_thoigian_them");
		$user_new->thoigian_them->AdvancedSearch->SearchValue2 = $user_new->getAdvancedSearch("y_thoigian_them");
		$user_new->trang_thai->AdvancedSearch->SearchValue = $user_new->getAdvancedSearch("x_trang_thai");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $user_new;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($user_new->nguoidung_id->CurrentValue);
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
