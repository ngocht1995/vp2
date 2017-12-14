<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$intro_article_list = new cintro_article_list();
$Page =& $intro_article_list;

// Page init processing
$intro_article_list->Page_Init();

// Page main processing
$intro_article_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($intro_article->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var intro_article_list = new ew_Page("intro_article_list");

// page properties
intro_article_list.PageID = "list"; // page ID
var EW_PAGE_ID = intro_article_list.PageID; // for backward compatibility

// extend page with validate function for search
intro_article_list.ValidateSearch = function(fobj) {
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
intro_article_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_article_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_article_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_article_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($intro_article->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($intro_article->Export == "" && $intro_article->SelectLimit);
	if (!$bSelectLimit)
		$rs = $intro_article_list->LoadRecordset();
	$intro_article_list->lTotalRecs = ($bSelectLimit) ? $intro_article->SelectRecordCount() : $rs->RecordCount();
	$intro_article_list->lStartRec = 1;
	if ($intro_article_list->lDisplayRecs <= 0) // Display all records
		$intro_article_list->lDisplayRecs = $intro_article_list->lTotalRecs;
	if (!($intro_article->ExportAll && $intro_article->Export <> ""))
		$intro_article_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $intro_article_list->LoadRecordset($intro_article_list->lStartRec-1, $intro_article_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý bài viết</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($intro_article->Export == "" && $intro_article->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(intro_article_list);" style="text-decoration: none;"><img id="intro_article_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"></font><font face="Verdana" size="2">Tìm kiếm</font></span></b></span><br>
<div id="intro_article_list_SearchPanel">
<form name="fintro_articlelistsrch" id="fintro_articlelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return intro_article_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="intro_article">
<?php
if ($gsSearchError == "")
	$intro_article_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$intro_article->RowType = EW_ROWTYPE_SEARCH;

// Render row
$intro_article_list->RenderRow();
?>
<br>
<table class="ewBasicSearch">
<tr>
		<td><span class="phpmaker">Chuyên mục</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_chuyenmuc_id" id="z_chuyenmuc_id" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_chuyenmuc_id" name="x_chuyenmuc_id"<?php echo $intro_article->chuyenmuc_id->EditAttributes() ?>>
<?php
if (is_array($intro_article->chuyenmuc_id->EditValue)) {
	$arwrk = $intro_article->chuyenmuc_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($intro_article->chuyenmuc_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Thời gian nhập</span></td>
		<td><input type="hidden" name="z_thoigian_them" id="z_thoigian_them" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoigian_them" id="x_thoigian_them" value="<?php echo $intro_article->thoigian_them->EditValue ?>"<?php echo $intro_article->thoigian_them->EditAttributes() ?>>
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
<input type="text" name="y_thoigian_them" id="y_thoigian_them" value="<?php echo $intro_article->thoigian_them->EditValue2 ?>"<?php echo $intro_article->thoigian_them->EditAttributes() ?>>
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
		<td><input type="hidden" name="z_trang_thai" id="z_trang_thai" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $intro_article->trang_thai->EditAttributes() ?>>
<?php
if (is_array($intro_article->trang_thai->EditValue)) {
	$arwrk = $intro_article->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($intro_article->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($intro_article->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $intro_article_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($intro_article->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($intro_article->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($intro_article->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $intro_article_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($intro_article->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($intro_article->CurrentAction <> "gridadd" && $intro_article->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_article_list->Pager)) $intro_article_list->Pager = new cNumericPager($intro_article_list->lStartRec, $intro_article_list->lDisplayRecs, $intro_article_list->lTotalRecs, $intro_article_list->lRecRange) ?>
<?php if ($intro_article_list->Pager->RecordCount > 0) { ?>
	<?php if ($intro_article_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_article_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $intro_article_list->Pager->FromIndex ?> đến <?php echo $intro_article_list->Pager->ToIndex ?> của <?php echo $intro_article_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_article_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có bài viết
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="intro_article">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($intro_article_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($intro_article_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($intro_article_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($intro_article->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $intro_article->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_articlelist)) alert('Chưa chọn bài viết'); else {document.fintro_articlelist.action='intro_articledelete.php';document.fintro_articlelist.encoding='application/x-www-form-urlencoded';document.fintro_articlelist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_articlelist)) alert('Chưa chọn bài viết'); else {document.fintro_articlelist.action='intro_articleupdate.php';document.fintro_articlelist.encoding='application/x-www-form-urlencoded';document.fintro_articlelist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fintro_articlelist" id="fintro_articlelist" class="ewForm" action="" method="post">
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$intro_article_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$intro_article_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$intro_article_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$intro_article_list->lOptionCnt++; // Multi-select
}
	$intro_article_list->lOptionCnt += count($intro_article_list->ListOptions->Items); // Custom list options
?>
<?php echo $intro_article->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($intro_article->Export == "") { ?>
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
<td style="white-space: nowrap; width:20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="intro_article_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($intro_article_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($intro_article->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
	<?php if ($intro_article->SortUrl($intro_article->chuyenmuc_id) == "") { ?>
		<td style="white-space: nowrap;">Chuyenmuc Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_article->SortUrl($intro_article->chuyenmuc_id) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Chuyên mục bài viết</td><td style="width: 10px;"><?php if ($intro_article->chuyenmuc_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_article->chuyenmuc_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($intro_article->tieude_baiviet->Visible) { // tieude_baiviet ?>
	<?php if ($intro_article->SortUrl($intro_article->tieude_baiviet) == "") { ?>
		<td style="white-space: nowrap;">Tieude Baiviet</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_article->SortUrl($intro_article->tieude_baiviet) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tiêu đề</td><td style="width: 10px;"><?php if ($intro_article->tieude_baiviet->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_article->tieude_baiviet->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($intro_article->thoigian_them->Visible) { // thoigian_them ?>
	<?php if ($intro_article->SortUrl($intro_article->thoigian_them) == "") { ?>
		<td style="white-space: nowrap;">Thoigian Them</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_article->SortUrl($intro_article->thoigian_them) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Thời gian nhập</td><td style="width: 10px;"><?php if ($intro_article->thoigian_them->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_article->thoigian_them->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($intro_article->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<?php if ($intro_article->SortUrl($intro_article->soluot_truynhap) == "") { ?>
		<td style="white-space: nowrap;">Soluot Truynhap</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_article->SortUrl($intro_article->soluot_truynhap) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Số lần xem</td><td style="width: 10px;"><?php if ($intro_article->soluot_truynhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_article->soluot_truynhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($intro_article->trang_thai->Visible) { // trang_thai ?>
	<?php if ($intro_article->SortUrl($intro_article->trang_thai) == "") { ?>
		<td style="white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $intro_article->SortUrl($intro_article->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Trạng thái</td><td style="width: 10px;"><?php if ($intro_article->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($intro_article->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($intro_article->ExportAll && $intro_article->Export <> "") {
	$intro_article_list->lStopRec = $intro_article_list->lTotalRecs;
} else {
	$intro_article_list->lStopRec = $intro_article_list->lStartRec + $intro_article_list->lDisplayRecs - 1; // Set the last record to display
}
$intro_article_list->lRecCount = $intro_article_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$intro_article->SelectLimit && $intro_article_list->lStartRec > 1)
		$rs->Move($intro_article_list->lStartRec - 1);
}
$intro_article_list->lRowCnt = 0;
while (($intro_article->CurrentAction == "gridadd" || !$rs->EOF) &&
	$intro_article_list->lRecCount < $intro_article_list->lStopRec) {
	$intro_article_list->lRecCount++;
	if (intval($intro_article_list->lRecCount) >= intval($intro_article_list->lStartRec)) {
		$intro_article_list->lRowCnt++;

	// Init row class and style
	$intro_article->CssClass = "";
	$intro_article->CssStyle = "";
	$intro_article->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($intro_article->CurrentAction == "gridadd") {
		$intro_article_list->LoadDefaultValues(); // Load default values
	} else {
		$intro_article_list->LoadRowValues($rs); // Load row values
	}
	$intro_article->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$intro_article_list->RenderRow();
?>
	<tr<?php echo $intro_article->RowAttributes() ?>>
<?php if ($intro_article->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $intro_article->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $intro_article->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="file_attach_articlelist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=intro_article&baiviet_id=<?php echo urlencode(strval($intro_article->baiviet_id->CurrentValue)) ?>">File đính kèm</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($intro_article->baiviet_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($intro_article_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($intro_article->chuyenmuc_id->Visible) { // chuyenmuc_id ?>
		<td width="200">
<?php echo $intro_article->chuyenmuc_id->ListViewValue() ?>
</td>
	<?php } ?>
	<?php if ($intro_article->tieude_baiviet->Visible) { // tieude_baiviet ?>
		<td width="200">
<?php echo $intro_article->tieude_baiviet->ListViewValue() ?>
</td>
	<?php } ?>
	<?php if ($intro_article->thoigian_them->Visible) { // thoigian_them ?>
		<td<?php echo $intro_article->thoigian_them->CellAttributes() ?>>
<div<?php echo $intro_article->thoigian_them->ViewAttributes() ?>><?php echo $intro_article->thoigian_them->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($intro_article->soluot_truynhap->Visible) { // soluot_truynhap ?>
		<td<?php echo $intro_article->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $intro_article->soluot_truynhap->ViewAttributes() ?>><?php echo $intro_article->soluot_truynhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($intro_article->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $intro_article->trang_thai->CellAttributes() ?>>
<div<?php echo $intro_article->trang_thai->ViewAttributes() ?>><?php echo $intro_article->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($intro_article->CurrentAction <> "gridadd")
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
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
<?php if ($intro_article->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($intro_article->CurrentAction <> "gridadd" && $intro_article->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($intro_article_list->Pager)) $intro_article_list->Pager = new cNumericPager($intro_article_list->lStartRec, $intro_article_list->lDisplayRecs, $intro_article_list->lTotalRecs, $intro_article_list->lRecRange) ?>
<?php if ($intro_article_list->Pager->RecordCount > 0) { ?>
	<?php if ($intro_article_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($intro_article_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $intro_article_list->PageUrl() ?>start=<?php echo $intro_article_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($intro_article_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $intro_article_list->Pager->FromIndex ?> đến <?php echo $intro_article_list->Pager->ToIndex ?> của <?php echo $intro_article_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($intro_article_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có bài viết
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="intro_article">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($intro_article_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($intro_article_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($intro_article_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($intro_article->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($intro_article_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $intro_article->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($intro_article_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_articlelist)) alert('Chưa chọn bài viết'); else {document.fintro_articlelist.action='intro_articledelete.php';document.fintro_articlelist.encoding='application/x-www-form-urlencoded';document.fintro_articlelist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fintro_articlelist)) alert('Chưa chọn bài viết'); else {document.fintro_articlelist.action='intro_articleupdate.php';document.fintro_articlelist.encoding='application/x-www-form-urlencoded';document.fintro_articlelist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($intro_article->Export == "" && $intro_article->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(intro_article_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($intro_article->Export == "") { ?>
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
class cintro_article_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'intro_article';

	// Page Object Name
	var $PageObjName = 'intro_article_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_article;
		if ($intro_article->UseTokenInUrl) $PageUrl .= "t=" . $intro_article->TableVar . "&"; // add page token
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
		global $objForm, $intro_article;
		if ($intro_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_article_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_article"] = new cintro_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_article;
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
	$intro_article->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $intro_article->Export; // Get export parameter, used in header
	$gsExportFile = $intro_article->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $intro_article;
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
		if ($intro_article->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $intro_article->getRecordsPerPage(); // Restore from Session
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
		$intro_article->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$intro_article->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$intro_article->setStartRecordNumber($this->lStartRec);
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
		$intro_article->setSessionWhere($sFilter);
		$intro_article->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $intro_article;
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
			$intro_article->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $intro_article;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $intro_article->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $intro_article->thoihan_sua, FALSE); // Field thoihan_sua
		$this->BuildSearchSql($sWhere, $intro_article->trang_thai, FALSE); // Field trang_thai
                $this->BuildSearchSql($sWhere, $intro_article->chuyenmuc_id, FALSE);

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($intro_article->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($intro_article->thoihan_sua); // Field thoihan_sua
			$this->SetSearchParm($intro_article->trang_thai); // Field trang_thai
                        $this->SetSearchParm($intro_article->chuyenmuc_id);
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
		global $intro_article;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$intro_article->setAdvancedSearch("x_$FldParm", $FldVal);
		$intro_article->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$intro_article->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$intro_article->setAdvancedSearch("y_$FldParm", $FldVal2);
		$intro_article->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $intro_article;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $intro_article->tieude_baiviet->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $intro_article;
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
			$intro_article->setBasicSearchKeyword($sSearchKeyword);
			$intro_article->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $intro_article;
		$this->sSrchWhere = "";
		$intro_article->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $intro_article;
		$intro_article->setBasicSearchKeyword("");
		$intro_article->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $intro_article;
		$intro_article->setAdvancedSearch("x_thoigian_them", "");
		$intro_article->setAdvancedSearch("y_thoigian_them", "");
		$intro_article->setAdvancedSearch("x_thoihan_sua", "");
		$intro_article->setAdvancedSearch("x_trang_thai", "");
                $intro_article->setAdvancedSearch("x_chuyenmuc_id", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $intro_article;
		$this->sSrchWhere = $intro_article->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $intro_article;
		 $intro_article->thoigian_them->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoigian_them");
		 $intro_article->thoigian_them->AdvancedSearch->SearchValue2 = $intro_article->getAdvancedSearch("y_thoigian_them");
		 $intro_article->thoihan_sua->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoihan_sua");
		 $intro_article->trang_thai->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_trang_thai");
                 $intro_article->chuyenmuc_id->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_chuyenmuc_id");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $intro_article;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$intro_article->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$intro_article->CurrentOrderType = @$_GET["ordertype"];
			$intro_article->UpdateSort($intro_article->chuyenmuc_id); // Field 
			$intro_article->UpdateSort($intro_article->tieude_baiviet); // Field 
			$intro_article->UpdateSort($intro_article->thoigian_them); // Field 
			$intro_article->UpdateSort($intro_article->soluot_truynhap); // Field 
			$intro_article->UpdateSort($intro_article->trang_thai); // Field 
			$intro_article->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $intro_article;
		$sOrderBy = $intro_article->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($intro_article->SqlOrderBy() <> "") {
				$sOrderBy = $intro_article->SqlOrderBy();
				$intro_article->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $intro_article;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$intro_article->setSessionOrderBy($sOrderBy);
				$intro_article->chuyenmuc_id->setSort("");
				$intro_article->tieude_baiviet->setSort("");
				$intro_article->thoigian_them->setSort("");
				$intro_article->soluot_truynhap->setSort("");
				$intro_article->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $intro_article;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$intro_article->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$intro_article->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $intro_article->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$intro_article->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$intro_article->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$intro_article->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $intro_article;

		// Load search values
		// thoigian_them

		$intro_article->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$intro_article->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];
		$intro_article->thoigian_them->AdvancedSearch->SearchCondition = @$_GET["v_thoigian_them"];
		$intro_article->thoigian_them->AdvancedSearch->SearchValue2 = @$_GET["y_thoigian_them"];
		$intro_article->thoigian_them->AdvancedSearch->SearchOperator2 = @$_GET["w_thoigian_them"];
                $intro_article->chuyenmuc_id->AdvancedSearch->SearchValue = @$_GET["x_chuyenmuc_id"];
		$intro_article->chuyenmuc_id->AdvancedSearch->SearchOperator = @$_GET["z_chuyenmuc_id"];
		// trang_thai
		$intro_article->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$intro_article->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_article;

		// Call Recordset Selecting event
		$intro_article->Recordset_Selecting($intro_article->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_article->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_article->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_article;
		$sFilter = $intro_article->KeyFilter();

		// Call Row Selecting event
		$intro_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_article->CurrentFilter = $sFilter;
		$sSql = $intro_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_article;
		$intro_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$intro_article->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_article->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$intro_article->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$intro_article->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$intro_article->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$intro_article->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$intro_article->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$intro_article->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_article->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$intro_article->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_article->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$intro_article->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$intro_article->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_article->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_article;

		// Call Row_Rendering event
		$intro_article->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$intro_article->chuyenmuc_id->CellCssStyle = "white-space: nowrap;";
		$intro_article->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$intro_article->tieude_baiviet->CellCssStyle = "white-space: nowrap;";
		$intro_article->tieude_baiviet->CellCssClass = "";

		// thoigian_them
		$intro_article->thoigian_them->CellCssStyle = "white-space: nowrap;";
		$intro_article->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$intro_article->soluot_truynhap->CellCssStyle = "white-space: nowrap;";
		$intro_article->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$intro_article->trang_thai->CellCssStyle = "white-space: nowrap;";
		$intro_article->trang_thai->CellCssClass = "";
		if ($intro_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			if (strval($intro_article->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc` FROM `intro_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($intro_article->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$intro_article->chuyenmuc_id->ViewValue = $rswrk->fields('ten_chuyenmuc');
					$rswrk->Close();
				} else {
					$intro_article->chuyenmuc_id->ViewValue = $intro_article->chuyenmuc_id->CurrentValue;
				}
			} else {
				$intro_article->chuyenmuc_id->ViewValue = NULL;
			}
			$intro_article->chuyenmuc_id->CssStyle = "";
			$intro_article->chuyenmuc_id->CssClass = "";
			$intro_article->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->ViewValue = $intro_article->tieude_baiviet->CurrentValue;
			$intro_article->tieude_baiviet->CssStyle = "";
			$intro_article->tieude_baiviet->CssClass = "";
			$intro_article->tieude_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$intro_article->thoigian_them->ViewValue = $intro_article->thoigian_them->CurrentValue;
			$intro_article->thoigian_them->ViewValue = ew_FormatDateTime($intro_article->thoigian_them->ViewValue, 7);
			$intro_article->thoigian_them->CssStyle = "";
			$intro_article->thoigian_them->CssClass = "";
			$intro_article->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->ViewValue = $intro_article->soluot_truynhap->CurrentValue;
			$intro_article->soluot_truynhap->CssStyle = "";
			$intro_article->soluot_truynhap->CssClass = "";
			$intro_article->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($intro_article->trang_thai->CurrentValue) <> "") {
				switch ($intro_article->trang_thai->CurrentValue) {
					case "0":
						$intro_article->trang_thai->ViewValue = "<font color=\"#FF0000\">Không xuất bản</font>";
						break;
					case "1":
						$intro_article->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$intro_article->trang_thai->ViewValue = $intro_article->trang_thai->CurrentValue;
				}
			} else {
				$intro_article->trang_thai->ViewValue = NULL;
			}
			$intro_article->trang_thai->CssStyle = "";
			$intro_article->trang_thai->CssClass = "";
			$intro_article->trang_thai->ViewCustomAttributes = "";

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->HrefValue = "";

			// thoigian_them
			$intro_article->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->HrefValue = "";

			// trang_thai
			$intro_article->trang_thai->HrefValue = "";
		} elseif ($intro_article->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_subject`";
			$sWhereWrk = "chuyenmuc_belongto=-1";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
				$sSqlWrk1 = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_subject`";
				$sWhereWrk1 = "chuyenmuc_belongto=0 and show_news <>5 and show_news <>6";
				if ($sWhereWrk1 <> "") $sSqlWrk1 .= " WHERE $sWhereWrk1";
				$rswrk1 = $conn->Execute($sSqlWrk1);
			while (!$rswrk1->EOF){
			array_push($arwrk, array($rswrk1->fields['chuyenmuc_id'], "-".$rswrk1->fields['ten_chuyenmuc']));
				$sSqlWrk2 = "SELECT `chuyenmuc_id`, `ten_chuyenmuc`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `intro_subject`";
				$sWhereWrk2 = "chuyenmuc_belongto=".$rswrk1->fields['chuyenmuc_id'];
				if ($sWhereWrk2 <> "") $sSqlWrk2 .= " WHERE $sWhereWrk2";
				$rswrk2 = $conn->Execute($sSqlWrk2);
				while (!$rswrk2->EOF){
					array_push($arwrk, array($rswrk2->fields['chuyenmuc_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['ten_chuyenmuc']));
					$rswrk2->MoveNext();
				}
				if ($rswrk2) $rswrk2->Close();
				$rswrk1->MoveNext();
						}
			array_unshift($arwrk, array("", "Chọn"));
			$intro_article->chuyenmuc_id->EditValue = $arwrk;

			// tieude_baiviet
			$intro_article->tieude_baiviet->EditCustomAttributes = "";
			$intro_article->tieude_baiviet->EditValue = ew_HtmlEncode($intro_article->tieude_baiviet->AdvancedSearch->SearchValue);

			// thoigian_them
			$intro_article->thoigian_them->EditCustomAttributes = "";
			$intro_article->thoigian_them->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($intro_article->thoigian_them->AdvancedSearch->SearchValue, 7), 7));
			$intro_article->thoigian_them->EditCustomAttributes = "";
			$intro_article->thoigian_them->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($intro_article->thoigian_them->AdvancedSearch->SearchValue2, 7), 7));

			// soluot_truynhap
			$intro_article->soluot_truynhap->EditCustomAttributes = "";
			$intro_article->soluot_truynhap->EditValue = ew_HtmlEncode($intro_article->soluot_truynhap->AdvancedSearch->SearchValue);

			// trang_thai
			$intro_article->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$intro_article->trang_thai->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$intro_article->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $intro_article;

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
		global $intro_article;
                
		$intro_article->thoigian_them->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_thoigian_them");
		$intro_article->thoigian_them->AdvancedSearch->SearchValue2 = $intro_article->getAdvancedSearch("y_thoigian_them");
		$intro_article->trang_thai->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_trang_thai");
                $intro_article->chuyenmuc_id->AdvancedSearch->SearchValue = $intro_article->getAdvancedSearch("x_chuyenmuc_id");
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
