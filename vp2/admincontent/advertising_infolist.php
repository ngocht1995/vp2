<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_infoinfo.php" ?>
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
$advertising_info_list = new cadvertising_info_list();
$Page =& $advertising_info_list;

// Page init processing
$advertising_info_list->Page_Init();

// Page main processing
$advertising_info_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising_info->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_info_list = new ew_Page("advertising_info_list");

// page properties
advertising_info_list.PageID = "list"; // page ID
var EW_PAGE_ID = advertising_info_list.PageID; // for backward compatibility

// extend page with validate function for search
advertising_info_list.ValidateSearch = function(fobj) {
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
advertising_info_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_info_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_info_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_info_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($advertising_info->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($advertising_info->Export == "" && $advertising_info->SelectLimit);
	if (!$bSelectLimit)
		$rs = $advertising_info_list->LoadRecordset();
	$advertising_info_list->lTotalRecs = ($bSelectLimit) ? $advertising_info->SelectRecordCount() : $rs->RecordCount();
	$advertising_info_list->lStartRec = 1;
	if ($advertising_info_list->lDisplayRecs <= 0) // Display all records
		$advertising_info_list->lDisplayRecs = $advertising_info_list->lTotalRecs;
	if (!($advertising_info->ExportAll && $advertising_info->Export <> ""))
		$advertising_info_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $advertising_info_list->LoadRecordset($advertising_info_list->lStartRec-1, $advertising_info_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý tin quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($advertising_info->Export == "" && $advertising_info->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(advertising_info_list);" style="text-decoration: none;"><img id="advertising_info_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"></font><font face="Verdana" size="2"><?php echo Lang_Text('Tìm kiếm');?></font></span></b></span><br>
<div id="advertising_info_list_SearchPanel">
<form name="fadvertising_infolistsrch" id="fadvertising_infolistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return advertising_info_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="advertising_info">
<?php
if ($gsSearchError == "")
	$advertising_info_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$advertising_info->RowType = EW_ROWTYPE_SEARCH;

// Render row
$advertising_info_list->RenderRow();
?>
<br>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo Lang_Text("Thời gian nhập");?></span></td>
		<td><input type="hidden" name="z_thoigian_them" id="z_thoigian_them" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoigian_them" id="x_thoigian_them" value="<?php echo $advertising_info->thoigian_them->EditValue ?>"<?php echo $advertising_info->thoigian_them->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoigian_them" name="cal_x_thoigian_them" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoigian_them", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoigian_them" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_thoigian_them" name="btw1_thoigian_them"><?php echo Lang_Text('đến');?></span></td>
				<td><span class="phpmaker" id="btw1_thoigian_them" name="btw1_thoigian_them">
<input type="text" name="y_thoigian_them" id="y_thoigian_them" value="<?php echo $advertising_info->thoigian_them->EditValue2 ?>"<?php echo $advertising_info->thoigian_them->EditAttributes() ?>>
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
		<td><span class="phpmaker"><?php echo Lang_Text('Trạng thái');?></span></td>
		<td><input type="hidden" name="z_trang_thai" id="z_trang_thai" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $advertising_info->trang_thai->EditAttributes() ?>>
<?php
if (is_array($advertising_info->trang_thai->EditValue)) {
	$arwrk = $advertising_info->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising_info->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($advertising_info->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  <?php echo Lang_Text('Tìm kiếm');?>  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   <?php echo Lang_Text('Nhập lại')?>   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $advertising_info_list->PageUrl() ?>cmd=reset"><?php echo Lang_Text('Hiển thị tất cả');?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($advertising_info->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo Lang_Text('Chính xác');?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($advertising_info->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo Lang_Text('Tất cả các từ');?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($advertising_info->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo Lang_Text('Bất kỳ từ nào');?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $advertising_info_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($advertising_info->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($advertising_info->CurrentAction <> "gridadd" && $advertising_info->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_info_list->Pager)) $advertising_info_list->Pager = new cNumericPager($advertising_info_list->lStartRec, $advertising_info_list->lDisplayRecs, $advertising_info_list->lTotalRecs, $advertising_info_list->lRecRange) ?>
<?php if ($advertising_info_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_info_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_info_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo Lang_Text('Bản ghi')?> <?php echo $advertising_info_list->Pager->FromIndex ?> <?php echo Lang_Text('đến');?> <?php echo $advertising_info_list->Pager->ToIndex ?> <?php echo Lang_Text('của');?> <?php echo $advertising_info_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_info_list->sSrchWhere == "0=101") { ?>
	<?php echo Lang_Text('Hãy điền từ khóa tìm kiếm')?>
	<?php } else { ?>
	<?php echo Lang_Text('Không có dữ liệu')?>
	<?php } ?>
	<?php } else { ?>
	<?php echo Lang_Text('Bạn không có quyền xem trang này')?>
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($advertising_info_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo Lang_Text('Số bản ghi hiển thị');?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="advertising_info">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($advertising_info_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($advertising_info_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($advertising_info_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($advertising_info->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo Lang_Text('Tất cả');?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_info->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_info_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_infolist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_infolist.action='advertising_infodelete.php';document.fadvertising_infolist.encoding='application/x-www-form-urlencoded';document.fadvertising_infolist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_infolist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_infolist.action='advertising_infoupdate.php';document.fadvertising_infolist.encoding='application/x-www-form-urlencoded';document.fadvertising_infolist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xb.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fadvertising_infolist" id="fadvertising_infolist" class="ewForm" action="" method="post">
<?php if ($advertising_info_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$advertising_info_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$advertising_info_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$advertising_info_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$advertising_info_list->lOptionCnt++; // Multi-select
}
	$advertising_info_list->lOptionCnt += count($advertising_info_list->ListOptions->Items); // Custom list options
?>
<?php echo $advertising_info->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($advertising_info->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width:30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width:30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width:40px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width:20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="advertising_info_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($advertising_info_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($advertising_info->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<?php if ($advertising_info->SortUrl($advertising_info->chuyenmuc_id) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Chuyên mục bài viết')?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_info->SortUrl($advertising_info->chuyenmuc_id) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Chuyên mục bài viết')?></td><td style="width: 10px;"><?php if ($advertising_info->chuyenmuc_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_info->chuyenmuc_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising_info->tieude_baiviet->Visible) { // tieude_baiviet ?>
	<?php if ($advertising_info->SortUrl($advertising_info->tieude_baiviet) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Tiêu đề');?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_info->SortUrl($advertising_info->tieude_baiviet) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Tiêu đề');?></td><td style="width: 10px;"><?php if ($advertising_info->tieude_baiviet->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_info->tieude_baiviet->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising_info->thoigian_them->Visible) { // thoigian_them ?>
	<?php if ($advertising_info->SortUrl($advertising_info->thoigian_them) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text("Thời gian nhập");?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_info->SortUrl($advertising_info->thoigian_them) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text("Thời gian nhập");?></td><td style="width: 10px;"><?php if ($advertising_info->thoigian_them->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_info->thoigian_them->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising_info->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<?php if ($advertising_info->SortUrl($advertising_info->soluot_truynhap) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Số lần xem');?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_info->SortUrl($advertising_info->soluot_truynhap) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Số lần xem');?></td><td style="width: 10px;"><?php if ($advertising_info->soluot_truynhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_info->soluot_truynhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising_info->trang_thai->Visible) { // trang_thai ?>
	<?php if ($advertising_info->SortUrl($advertising_info->trang_thai) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Trạng thái');?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_info->SortUrl($advertising_info->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Trạng thái');?></td><td style="width: 10px;"><?php if ($advertising_info->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_info->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($advertising_info->ExportAll && $advertising_info->Export <> "") {
	$advertising_info_list->lStopRec = $advertising_info_list->lTotalRecs;
} else {
	$advertising_info_list->lStopRec = $advertising_info_list->lStartRec + $advertising_info_list->lDisplayRecs - 1; // Set the last record to display
}
$advertising_info_list->lRecCount = $advertising_info_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$advertising_info->SelectLimit && $advertising_info_list->lStartRec > 1)
		$rs->Move($advertising_info_list->lStartRec - 1);
}
$advertising_info_list->lRowCnt = 0;
while (($advertising_info->CurrentAction == "gridadd" || !$rs->EOF) &&
	$advertising_info_list->lRecCount < $advertising_info_list->lStopRec) {
	$advertising_info_list->lRecCount++;
	if (intval($advertising_info_list->lRecCount) >= intval($advertising_info_list->lStartRec)) {
		$advertising_info_list->lRowCnt++;

	// Init row class and style
	$advertising_info->CssClass = "";
	$advertising_info->CssStyle = "";
	$advertising_info->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($advertising_info->CurrentAction == "gridadd") {
		$advertising_info_list->LoadDefaultValues(); // Load default values
	} else {
		$advertising_info_list->LoadRowValues($rs); // Load row values
	}
	$advertising_info->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$advertising_info_list->RenderRow();
?>
	<tr<?php echo $advertising_info->RowAttributes() ?>>
<?php if ($advertising_info->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $advertising_info->ViewUrl() ?>"><?php echo Lang_Text('Xem');?></a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $advertising_info->EditUrl() ?>"><?php echo Lang_Text('Sửa');?></a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="file_attachlist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=advertising_info&baiviet_id=<?php echo urlencode(strval($advertising_info->baiviet_id->CurrentValue)) ?>">File đính kèm</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($advertising_info->baiviet_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($advertising_info_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($advertising_info->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
		<td width="200">
<?php 
	$arwrk = $advertising_info->chuyenmuc_id->ListViewValue();
	if (is_array($arwrk)) {
		echo Lang_Str($arwrk[0][0],$arwrk[0][1]);
	}
?>
</td>
	<?php } ?>
	<?php if ($advertising_info->tieude_baiviet->Visible) { // tieude_baiviet ?>
		<td width="200">
<?php echo $advertising_info->tieude_baiviet->ListViewValue() ?>
</td>
	<?php } ?>
	<?php if ($advertising_info->thoigian_them->Visible) { // thoigian_them ?>
		<td<?php echo $advertising_info->thoigian_them->CellAttributes() ?>>
<div<?php echo $advertising_info->thoigian_them->ViewAttributes() ?>><?php echo $advertising_info->thoigian_them->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($advertising_info->soluot_truynhap->Visible) { // soluot_truynhap ?>
		<td<?php echo $advertising_info->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $advertising_info->soluot_truynhap->ViewAttributes() ?>><?php echo $advertising_info->soluot_truynhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($advertising_info->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $advertising_info->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising_info->trang_thai->ViewAttributes() ?>><?php echo $advertising_info->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($advertising_info->CurrentAction <> "gridadd")
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
<?php if ($advertising_info_list->lTotalRecs > 0) { ?>
<?php if ($advertising_info->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($advertising_info->CurrentAction <> "gridadd" && $advertising_info->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_info_list->Pager)) $advertising_info_list->Pager = new cNumericPager($advertising_info_list->lStartRec, $advertising_info_list->lDisplayRecs, $advertising_info_list->lTotalRecs, $advertising_info_list->lRecRange) ?>
<?php if ($advertising_info_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_info_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_info_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_info_list->PageUrl() ?>start=<?php echo $advertising_info_list->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_info_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo Lang_Text('Bản ghi')?> <?php echo $advertising_info_list->Pager->FromIndex ?> <?php echo Lang_Text('đến');?> <?php echo $advertising_info_list->Pager->ToIndex ?> <?php echo Lang_Text('của');?> <?php echo $advertising_info_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_info_list->sSrchWhere == "0=101") { ?>
	<?php echo Lang_Text('Hãy điền từ khóa tìm kiếm')?>
	<?php } else { ?>
	<?php echo Lang_Text('Không có dữ liệu')?>
	<?php } ?>
	<?php } else { ?>
	<?php echo Lang_Text('Bạn không có quyền xem trang này')?>
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($advertising_info_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo Lang_Text('Số bản ghi hiển thị');?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="advertising_info">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($advertising_info_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($advertising_info_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($advertising_info_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($advertising_info->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo Lang_Text('Tất cả');?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($advertising_info_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_info->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_info_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_infolist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_infolist.action='advertising_infodelete.php';document.fadvertising_infolist.encoding='application/x-www-form-urlencoded';document.fadvertising_infolist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_infolist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_infolist.action='advertising_infoupdate.php';document.fadvertising_infolist.encoding='application/x-www-form-urlencoded';document.fadvertising_infolist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xb.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($advertising_info->Export == "" && $advertising_info->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(advertising_info_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($advertising_info->Export == "") { ?>
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
class cadvertising_info_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'advertising_info';

	// Page Object Name
	var $PageObjName = 'advertising_info_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_info;
		if ($advertising_info->UseTokenInUrl) $PageUrl .= "t=" . $advertising_info->TableVar . "&"; // add page token
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
		global $objForm, $advertising_info;
		if ($advertising_info->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_info->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_info->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_info_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_info"] = new cadvertising_info();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_info', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_info;
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
	$advertising_info->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $advertising_info->Export; // Get export parameter, used in header
	$gsExportFile = $advertising_info->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $advertising_info;
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
		if ($advertising_info->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $advertising_info->getRecordsPerPage(); // Restore from Session
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
		$advertising_info->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$advertising_info->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$advertising_info->setStartRecordNumber($this->lStartRec);
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
		$advertising_info->setSessionWhere($sFilter);
		$advertising_info->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $advertising_info;
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
			$advertising_info->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$advertising_info->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $advertising_info;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $advertising_info->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $advertising_info->thoihan_sua, FALSE); // Field thoihan_sua
		$this->BuildSearchSql($sWhere, $advertising_info->trang_thai, FALSE); // Field trang_thai

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($advertising_info->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($advertising_info->thoihan_sua); // Field thoihan_sua
			$this->SetSearchParm($advertising_info->trang_thai); // Field trang_thai
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
		global $advertising_info;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$advertising_info->setAdvancedSearch("x_$FldParm", $FldVal);
		$advertising_info->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$advertising_info->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$advertising_info->setAdvancedSearch("y_$FldParm", $FldVal2);
		$advertising_info->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $advertising_info;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $advertising_info->tieude_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $advertising_info;
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
			$advertising_info->setBasicSearchKeyword($sSearchKeyword);
			$advertising_info->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $advertising_info;
		$this->sSrchWhere = "";
		$advertising_info->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $advertising_info;
		$advertising_info->setBasicSearchKeyword("");
		$advertising_info->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $advertising_info;
		$advertising_info->setAdvancedSearch("x_thoigian_them", "");
		$advertising_info->setAdvancedSearch("y_thoigian_them", "");
		$advertising_info->setAdvancedSearch("x_thoihan_sua", "");
		$advertising_info->setAdvancedSearch("x_trang_thai", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $advertising_info;
		$this->sSrchWhere = $advertising_info->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $advertising_info;
		 $advertising_info->thoigian_them->AdvancedSearch->SearchValue = $advertising_info->getAdvancedSearch("x_thoigian_them");
		 $advertising_info->thoigian_them->AdvancedSearch->SearchValue2 = $advertising_info->getAdvancedSearch("y_thoigian_them");
		 $advertising_info->thoihan_sua->AdvancedSearch->SearchValue = $advertising_info->getAdvancedSearch("x_thoihan_sua");
		 $advertising_info->trang_thai->AdvancedSearch->SearchValue = $advertising_info->getAdvancedSearch("x_trang_thai");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $advertising_info;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$advertising_info->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$advertising_info->CurrentOrderType = @$_GET["ordertype"];
			$advertising_info->UpdateSort($advertising_info->chuyenmuc_id); // Field 
			$advertising_info->UpdateSort($advertising_info->tieude_baiviet); // Field 
			$advertising_info->UpdateSort($advertising_info->thoigian_them); // Field 
			$advertising_info->UpdateSort($advertising_info->soluot_truynhap); // Field 
			$advertising_info->UpdateSort($advertising_info->trang_thai); // Field 
			$advertising_info->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $advertising_info;
		$sOrderBy = $advertising_info->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($advertising_info->SqlOrderBy() <> "") {
				$sOrderBy = $advertising_info->SqlOrderBy();
				$advertising_info->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $advertising_info;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$advertising_info->setSessionOrderBy($sOrderBy);
				$advertising_info->chuyenmuc_id->setSort("");
				$advertising_info->tieude_baiviet->setSort("");
				$advertising_info->thoigian_them->setSort("");
				$advertising_info->soluot_truynhap->setSort("");
				$advertising_info->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$advertising_info->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $advertising_info;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising_info->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising_info->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising_info->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising_info->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising_info->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising_info->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $advertising_info;

		// Load search values
		// thoigian_them

		$advertising_info->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$advertising_info->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];
		$advertising_info->thoigian_them->AdvancedSearch->SearchCondition = @$_GET["v_thoigian_them"];
		$advertising_info->thoigian_them->AdvancedSearch->SearchValue2 = @$_GET["y_thoigian_them"];
		$advertising_info->thoigian_them->AdvancedSearch->SearchOperator2 = @$_GET["w_thoigian_them"];

		// trang_thai
		$advertising_info->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$advertising_info->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising_info;

		// Call Recordset Selecting event
		$advertising_info->Recordset_Selecting($advertising_info->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising_info->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising_info->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising_info;
		$sFilter = $advertising_info->KeyFilter();

		// Call Row Selecting event
		$advertising_info->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising_info->CurrentFilter = $sFilter;
		$sSql = $advertising_info->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising_info->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising_info;
		$advertising_info->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$advertising_info->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$advertising_info->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$advertising_info->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$advertising_info->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$advertising_info->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$advertising_info->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$advertising_info->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$advertising_info->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising_info->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$advertising_info->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising_info->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$advertising_info->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$advertising_info->trang_thai->setDbValue($rs->fields('trang_thai'));
		$advertising_info->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_info;

		// Call Row_Rendering event
		$advertising_info->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$advertising_info->chuyenmuc_id->CellCssStyle = "white-space: nowrap;";
		$advertising_info->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$advertising_info->tieude_baiviet->CellCssStyle = "white-space: nowrap;";
		$advertising_info->tieude_baiviet->CellCssClass = "";

		// thoigian_them
		$advertising_info->thoigian_them->CellCssStyle = "white-space: nowrap;";
		$advertising_info->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$advertising_info->soluot_truynhap->CellCssStyle = "white-space: nowrap;";
		$advertising_info->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$advertising_info->trang_thai->CellCssStyle = "white-space: nowrap;";
		$advertising_info->trang_thai->CellCssClass = "";
		if ($advertising_info->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			if (strval($advertising_info->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc`,`ten_chuyenmuc_en` FROM `advertising_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($advertising_info->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
					$advertising_info->chuyenmuc_id->ViewValue = $arwrk;
					$rswrk->Close();
				} else {
					$advertising_info->chuyenmuc_id->ViewValue = $advertising_info->chuyenmuc_id->CurrentValue;
				}
			} else {
				$advertising_info->chuyenmuc_id->ViewValue = NULL;
			}
			$advertising_info->chuyenmuc_id->CssStyle = "";
			$advertising_info->chuyenmuc_id->CssClass = "";
			$advertising_info->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->ViewValue = $advertising_info->tieude_baiviet->CurrentValue;
			$advertising_info->tieude_baiviet->CssStyle = "";
			$advertising_info->tieude_baiviet->CssClass = "";
			$advertising_info->tieude_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$advertising_info->thoigian_them->ViewValue = $advertising_info->thoigian_them->CurrentValue;
			$advertising_info->thoigian_them->ViewValue = ew_FormatDateTime($advertising_info->thoigian_them->ViewValue, 7);
			$advertising_info->thoigian_them->CssStyle = "";
			$advertising_info->thoigian_them->CssClass = "";
			$advertising_info->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$advertising_info->soluot_truynhap->ViewValue = $advertising_info->soluot_truynhap->CurrentValue;
			$advertising_info->soluot_truynhap->CssStyle = "";
			$advertising_info->soluot_truynhap->CssClass = "";
			$advertising_info->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising_info->trang_thai->CurrentValue) <> "") {
				switch ($advertising_info->trang_thai->CurrentValue) {
					case "0":
						$advertising_info->trang_thai->ViewValue = "<font color=\"#FF0000\">". Lang_Text("Không xuất bản") ."</font>";
						break;
					case "1":
						$advertising_info->trang_thai->ViewValue = Lang_Text("Xuất bản");
						break;
					default:
						$advertising_info->trang_thai->ViewValue = $advertising_info->trang_thai->CurrentValue;
				}
			} else {
				$advertising_info->trang_thai->ViewValue = NULL;
			}
			$advertising_info->trang_thai->CssStyle = "";
			$advertising_info->trang_thai->CssClass = "";
			$advertising_info->trang_thai->ViewCustomAttributes = "";

			// chuyenmuc_id
			$advertising_info->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->HrefValue = "";

			// thoigian_them
			$advertising_info->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$advertising_info->soluot_truynhap->HrefValue = "";

			// trang_thai
			$advertising_info->trang_thai->HrefValue = "";
		} elseif ($advertising_info->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// chuyenmuc_id
			$advertising_info->chuyenmuc_id->EditCustomAttributes = "";

			// tieude_baiviet
			$advertising_info->tieude_baiviet->EditCustomAttributes = "";
			$advertising_info->tieude_baiviet->EditValue = ew_HtmlEncode($advertising_info->tieude_baiviet->AdvancedSearch->SearchValue);

			// thoigian_them
			$advertising_info->thoigian_them->EditCustomAttributes = "";
			$advertising_info->thoigian_them->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($advertising_info->thoigian_them->AdvancedSearch->SearchValue, 7), 7));
			$advertising_info->thoigian_them->EditCustomAttributes = "";
			$advertising_info->thoigian_them->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($advertising_info->thoigian_them->AdvancedSearch->SearchValue2, 7), 7));

			// soluot_truynhap
			$advertising_info->soluot_truynhap->EditCustomAttributes = "";
			$advertising_info->soluot_truynhap->EditValue = ew_HtmlEncode($advertising_info->soluot_truynhap->AdvancedSearch->SearchValue);

			// trang_thai
			$advertising_info->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", Lang_Text("Không xuất bản"));
			$arwrk[] = array("1", Lang_Text("Xuất bản"));
			array_unshift($arwrk, array("", Lang_Text("Chọn")));
			$advertising_info->trang_thai->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$advertising_info->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $advertising_info;

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
		global $advertising_info;
		$advertising_info->thoigian_them->AdvancedSearch->SearchValue = $advertising_info->getAdvancedSearch("x_thoigian_them");
		$advertising_info->thoigian_them->AdvancedSearch->SearchValue2 = $advertising_info->getAdvancedSearch("y_thoigian_them");
		$advertising_info->trang_thai->AdvancedSearch->SearchValue = $advertising_info->getAdvancedSearch("x_trang_thai");
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
