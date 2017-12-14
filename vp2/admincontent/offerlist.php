<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "offerinfo.php" ?>
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
$offer_list = new coffer_list();
$Page =& $offer_list;

// Page init processing
$offer_list->Page_Init();

// Page main processing
$offer_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($offer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var offer_list = new ew_Page("offer_list");

// page properties
offer_list.PageID = "list"; // page ID
var EW_PAGE_ID = offer_list.PageID; // for backward compatibility

// extend page with validate function for search
offer_list.ValidateSearch = function(fobj) {
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
offer_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($offer->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($offer->Export == "" && $offer->SelectLimit);
	if (!$bSelectLimit)
		$rs = $offer_list->LoadRecordset();
	$offer_list->lTotalRecs = ($bSelectLimit) ? $offer->SelectRecordCount() : $rs->RecordCount();
	$offer_list->lStartRec = 1;
	if ($offer_list->lDisplayRecs <= 0) // Display all records
		$offer_list->lDisplayRecs = $offer_list->lTotalRecs;
	if (!($offer->ExportAll && $offer->Export <> ""))
		$offer_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $offer_list->LoadRecordset($offer_list->lStartRec-1, $offer_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách thông tin chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($offer->Export == "" && $offer->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(offer_list);" style="text-decoration: none;"><img id="offer_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"></font><font face="Verdana" size="2">Tìm kiếm</font></span></b></span><br>
<br>
<div id="offer_list_SearchPanel">
<form name="fofferlistsrch" id="fofferlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return offer_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="offer">
<?php
if ($gsSearchError == "")
	$offer_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$offer->RowType = EW_ROWTYPE_SEARCH;

// Render row
$offer_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td width="200"><span class="phpmaker">Kiểu chào hàng</span><input type="hidden" name="z_kieu_chaohang" id="z_kieu_chaohang" value="="></td>
		
		<td>			
			<span class="phpmaker">
<select id="x_kieu_chaohang" name="x_kieu_chaohang"<?php echo $offer->kieu_chaohang->EditAttributes() ?>>
<?php
if (is_array($offer->kieu_chaohang->EditValue)) {
	$arwrk = $offer->kieu_chaohang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->kieu_chaohang->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Trạng thái</span><input type="hidden" name="z_trang_thai" id="z_trang_thai" value="="></td>
		<td><span class="phpmaker">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $offer->trang_thai->EditAttributes() ?>>
<?php
if (is_array($offer->trang_thai->EditValue)) {
	$arwrk = $offer->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Xuất bản</span><input type="hidden" name="z_xuatban" id="z_xuatban" value="="></td>
		<td><span class="phpmaker">
<select id="x_xuatban" name="x_xuatban"<?php echo $offer->xuatban->EditAttributes() ?>>
<?php
if (is_array($offer->xuatban->EditValue)) {
	$arwrk = $offer->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->xuatban->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Chào hàng tiêu biểu</span><input type="hidden" name="z_chaohang_tieubieu" id="z_chaohang_tieubieu" value="="></td>
		<td><span class="phpmaker">
<select id="x_chaohang_tieubieu" name="x_chaohang_tieubieu"<?php echo $offer->chaohang_tieubieu->EditAttributes() ?>>
<?php
if (is_array($offer->chaohang_tieubieu->EditValue)) {
	$arwrk = $offer->chaohang_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($offer->chaohang_tieubieu->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($offer->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm   ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $offer_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($offer->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($offer->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($offer->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $offer_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($offer->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($offer->CurrentAction <> "gridadd" && $offer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($offer_list->Pager)) $offer_list->Pager = new cNumericPager($offer_list->lStartRec, $offer_list->lDisplayRecs, $offer_list->lTotalRecs, $offer_list->lRecRange) ?>
<?php if ($offer_list->Pager->RecordCount > 0) { ?>
	<?php if ($offer_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($offer_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi từ <?php echo $offer_list->Pager->FromIndex ?> đến <?php echo $offer_list->Pager->ToIndex ?> của <?php echo $offer_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($offer_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu chí tìm kiếm
	<?php } else { ?>
	Không tìm thấy
	<?php } ?>
	<?php } else { ?>
	Không có quyền truy cập
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($offer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="offer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($offer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($offer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($offer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($offer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<br>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $offer->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($offer_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fofferlist)) alert('Chưa chọn bản ghi'); else {document.fofferlist.action='offerdelete.php';document.fofferlist.encoding='application/x-www-form-urlencoded';document.fofferlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fofferlist)) alert('Chưa chọn bản ghi'); else {document.fofferlist.action='offerupdate.php';document.fofferlist.encoding='application/x-www-form-urlencoded';document.fofferlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fofferlist" id="fofferlist" class="ewForm" action="" method="post">
<?php if ($offer_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$offer_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$offer_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$offer_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$offer_list->lOptionCnt++; // Multi-select
}
	$offer_list->lOptionCnt += count($offer_list->ListOptions->Items); // Custom list options
?>
<?php echo $offer->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($offer->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="offer_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($offer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<?php if ($offer->SortUrl($offer->tieude_chaohang) == "") { ?>
		<td style="width: 300px;">Tiêu đề chào hàng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->tieude_chaohang) ?>',1);" style="width: 300px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề chào hàng</td><td style="width: 10px;"><?php if ($offer->tieude_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->tieude_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->anh_chaohang->Visible) { // anh_chaohang ?>
	<?php if ($offer->SortUrl($offer->anh_chaohang) == "") { ?>
		<td>Ảnh</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->anh_chaohang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ảnh</td><td style="width: 10px;"><?php if ($offer->anh_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->anh_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
<?php if ($offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<?php if ($offer->SortUrl($offer->kieu_chaohang) == "") { ?>
		<td>Kiểu chào hàng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->kieu_chaohang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Kiểu chào hàng</td><td style="width: 10px;"><?php if ($offer->kieu_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->kieu_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->so_lanxem->Visible) { // so_lanxem ?>
	<?php if ($offer->SortUrl($offer->so_lanxem) == "") { ?>
		<td>Số lần xem</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->so_lanxem) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số lần xem</td><td style="width: 10px;"><?php if ($offer->so_lanxem->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->so_lanxem->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
	<?php if ($offer->SortUrl($offer->thoihan_tungay) == "") { ?>
		<td>Thời gian bắt đầu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->thoihan_tungay) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian bắt đầu</td><td style="width: 10px;"><?php if ($offer->thoihan_tungay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->thoihan_tungay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
	<?php if ($offer->SortUrl($offer->thoihan_denngay) == "") { ?>
		<td>Thời gian kết thúc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->thoihan_denngay) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian kết thúc</td><td style="width: 10px;"><?php if ($offer->thoihan_denngay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->thoihan_denngay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->trang_thai->Visible) { // trang_thai ?>
	<?php if ($offer->SortUrl($offer->trang_thai) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->trang_thai) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($offer->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->xuatban->Visible) { // xuatban ?>
	<?php if ($offer->SortUrl($offer->xuatban) == "") { ?>
		<td>Xuất bản</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->xuatban) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($offer->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
	<?php if ($offer->SortUrl($offer->chaohang_tieubieu) == "") { ?>
		<td>Chào hàng tiêu biểu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->chaohang_tieubieu) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Chào hàng tiêu biểu</td><td style="width: 10px;"><?php if ($offer->chaohang_tieubieu->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->chaohang_tieubieu->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($offer->xuat_su->Visible) { // xuat_su ?>
	<?php if ($offer->SortUrl($offer->xuat_su) == "") { ?>
		<td>Xuất sứ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $offer->SortUrl($offer->xuat_su) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất sứ</td><td style="width: 10px;"><?php if ($offer->xuat_su->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($offer->xuat_su->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($offer->ExportAll && $offer->Export <> "") {
	$offer_list->lStopRec = $offer_list->lTotalRecs;
} else {
	$offer_list->lStopRec = $offer_list->lStartRec + $offer_list->lDisplayRecs - 1; // Set the last record to display
}
$offer_list->lRecCount = $offer_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$offer->SelectLimit && $offer_list->lStartRec > 1)
		$rs->Move($offer_list->lStartRec - 1);
}
$offer_list->lRowCnt = 0;
while (($offer->CurrentAction == "gridadd" || !$rs->EOF) &&
	$offer_list->lRecCount < $offer_list->lStopRec) {
	$offer_list->lRecCount++;
	if (intval($offer_list->lRecCount) >= intval($offer_list->lStartRec)) {
		$offer_list->lRowCnt++;

	// Init row class and style
	$offer->CssClass = "";
	$offer->CssStyle = "";
	$offer->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($offer->CurrentAction == "gridadd") {
		$offer_list->LoadDefaultValues(); // Load default values
	} else {
		$offer_list->LoadRowValues($rs); // Load row values
	}
	$offer->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$offer_list->RenderRow();
?>
	<tr<?php echo $offer->RowAttributes() ?>>
<?php if ($offer->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($offer_list->ShowOptionLink()) { ?>
<a href="<?php echo $offer->ViewUrl() ?>">Xem</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($offer_list->ShowOptionLink()) { ?>
<a href="<?php echo $offer->EditUrl() ?>">Sửa</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($offer->chaohang_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($offer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
		<td<?php echo $offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $offer->tieude_chaohang->ViewAttributes() ?>><?php echo $offer->tieude_chaohang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->anh_chaohang->Visible) { // anh_chaohang ?>
		<td<?php echo $offer->anh_chaohang->CellAttributes() ?>>
<?php if ($offer->anh_chaohang->HrefValue <> "") { ?>
<?php if (!is_null($offer->anh_chaohang->Upload->DbValue)) { ?>
<a href="<?php echo $offer->anh_chaohang->HrefValue ?>" target="_parent"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $offer->anh_chaohang->ViewAttributes() ?>></a>
<?php } elseif (!in_array($offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
		<td<?php echo $offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $offer->kieu_chaohang->ViewAttributes() ?>><?php echo $offer->kieu_chaohang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->so_lanxem->Visible) { // so_lanxem ?>
		<td<?php echo $offer->so_lanxem->CellAttributes() ?>>
<div<?php echo $offer->so_lanxem->ViewAttributes() ?>><?php echo $offer->so_lanxem->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
		<td<?php echo $offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_tungay->ViewAttributes() ?>><?php echo $offer->thoihan_tungay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
		<td<?php echo $offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $offer->thoihan_denngay->ViewAttributes() ?>><?php echo $offer->thoihan_denngay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $offer->trang_thai->CellAttributes() ?>>
<div<?php echo $offer->trang_thai->ViewAttributes() ?>><?php echo $offer->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->xuatban->Visible) { // xuatban ?>
		<td<?php echo $offer->xuatban->CellAttributes() ?>>
<div<?php echo $offer->xuatban->ViewAttributes() ?>><?php echo $offer->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
		<td<?php echo $offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $offer->chaohang_tieubieu->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($offer->xuat_su->Visible) { // xuat_su ?>
		<td<?php echo $offer->xuat_su->CellAttributes() ?>>
<div<?php echo $offer->xuat_su->ViewAttributes() ?>><?php echo $offer->xuat_su->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($offer->CurrentAction <> "gridadd")
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
<?php if ($offer_list->lTotalRecs > 0) { ?>
<?php if ($offer->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($offer->CurrentAction <> "gridadd" && $offer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($offer_list->Pager)) $offer_list->Pager = new cNumericPager($offer_list->lStartRec, $offer_list->lDisplayRecs, $offer_list->lTotalRecs, $offer_list->lRecRange) ?>
<?php if ($offer_list->Pager->RecordCount > 0) { ?>
	<?php if ($offer_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($offer_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $offer_list->PageUrl() ?>start=<?php echo $offer_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($offer_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi từ <?php echo $offer_list->Pager->FromIndex ?> đến <?php echo $offer_list->Pager->ToIndex ?> của <?php echo $offer_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($offer_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu chí tìm kiếm
	<?php } else { ?>
	Không tìm thấy
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy nhập
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($offer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="offer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($offer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($offer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($offer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="All"<?php if ($offer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($offer_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<br>
<a href="<?php echo $offer->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($offer_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fofferlist)) alert('Chưa chọn bản ghi'); else {document.fofferlist.action='offerdelete.php';document.fofferlist.encoding='application/x-www-form-urlencoded';document.fofferlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fofferlist)) alert('Chưa chọn bản ghi'); else {document.fofferlist.action='offerupdate.php';document.fofferlist.encoding='application/x-www-form-urlencoded';document.fofferlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($offer->Export == "" && $offer->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(offer_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($offer->Export == "") { ?>
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
class coffer_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'offer';

	// Page Object Name
	var $PageObjName = 'offer_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $offer;
		if ($offer->UseTokenInUrl) $PageUrl .= "t=" . $offer->TableVar . "&"; // add page token
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
		global $objForm, $offer;
		if ($offer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($offer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($offer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function coffer_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer"] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'offer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $offer;
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
	$offer->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $offer->Export; // Get export parameter, used in header
	$gsExportFile = $offer->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $offer;
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
		if ($offer->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $offer->getRecordsPerPage(); // Restore from Session
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
		$offer->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$offer->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$offer->setStartRecordNumber($this->lStartRec);
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
		$offer->setSessionWhere($sFilter);
		$offer->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $offer;
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
			$offer->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $offer;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $offer->kieu_chaohang, FALSE); // Field kieu_chaohang
		$this->BuildSearchSql($sWhere, $offer->nganhnghe_id, FALSE); // Field nganhnghe_id
		$this->BuildSearchSql($sWhere, $offer->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $offer->xuatban, FALSE); // Field xuatban
		$this->BuildSearchSql($sWhere, $offer->chaohang_tieubieu, FALSE); // Field chaohang_tieubieu
		$this->BuildSearchSql($sWhere, $offer->xuat_su, FALSE); // Field xuat_su

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($offer->kieu_chaohang); // Field kieu_chaohang
			$this->SetSearchParm($offer->nganhnghe_id); // Field nganhnghe_id
			$this->SetSearchParm($offer->trang_thai); // Field trang_thai
			$this->SetSearchParm($offer->xuatban); // Field xuatban
			$this->SetSearchParm($offer->chaohang_tieubieu); // Field chaohang_tieubieu
			$this->SetSearchParm($offer->xuat_su); // Field xuat_su
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
		global $offer;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$offer->setAdvancedSearch("x_$FldParm", $FldVal);
		$offer->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$offer->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$offer->setAdvancedSearch("y_$FldParm", $FldVal2);
		$offer->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $offer;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $offer->tieude_chaohang->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $offer;
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
			$offer->setBasicSearchKeyword($sSearchKeyword);
			$offer->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $offer;
		$this->sSrchWhere = "";
		$offer->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $offer;
		$offer->setBasicSearchKeyword("");
		$offer->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $offer;
		$offer->setAdvancedSearch("x_kieu_chaohang", "");
		$offer->setAdvancedSearch("x_nganhnghe_id", "");
		$offer->setAdvancedSearch("x_trang_thai", "");
		$offer->setAdvancedSearch("x_xuatban", "");
		$offer->setAdvancedSearch("x_chaohang_tieubieu", "");
		$offer->setAdvancedSearch("x_xuat_su", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $offer;
		$this->sSrchWhere = $offer->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $offer;
		 $offer->kieu_chaohang->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_kieu_chaohang");
		 $offer->nganhnghe_id->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_nganhnghe_id");
		 $offer->trang_thai->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_trang_thai");
		 $offer->xuatban->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_xuatban");
		 $offer->chaohang_tieubieu->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_chaohang_tieubieu");
		 $offer->xuat_su->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_xuat_su");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $offer;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$offer->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$offer->CurrentOrderType = @$_GET["ordertype"];
			$offer->UpdateSort($offer->tieude_chaohang); // Field 
			$offer->UpdateSort($offer->anh_chaohang); // Field
			$offer->UpdateSort($offer->kieu_chaohang); // Field 
			$offer->UpdateSort($offer->so_lanxem); // Field 
			$offer->UpdateSort($offer->thoihan_tungay); // Field 
			$offer->UpdateSort($offer->thoihan_denngay); // Field 
			$offer->UpdateSort($offer->trang_thai); // Field 
			$offer->UpdateSort($offer->xuatban); // Field 
			$offer->UpdateSort($offer->chaohang_tieubieu); // Field 
			$offer->UpdateSort($offer->xuat_su); // Field 
			$offer->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $offer;
		$sOrderBy = $offer->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($offer->SqlOrderBy() <> "") {
				$sOrderBy = $offer->SqlOrderBy();
				$offer->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $offer;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$offer->setSessionOrderBy($sOrderBy);
				$offer->tieude_chaohang->setSort("");
				$offer->anh_chaohang->setSort("");
				$offer->kieu_chaohang->setSort("");
				$offer->so_lanxem->setSort("");
				$offer->thoihan_tungay->setSort("");
				$offer->thoihan_denngay->setSort("");
				$offer->trang_thai->setSort("");
				$offer->xuatban->setSort("");
				$offer->chaohang_tieubieu->setSort("");
				$offer->xuat_su->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $offer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$offer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$offer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $offer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$offer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$offer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$offer->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $offer;

		// Load search values
		// kieu_chaohang

		$offer->kieu_chaohang->AdvancedSearch->SearchValue = @$_GET["x_kieu_chaohang"];
		$offer->kieu_chaohang->AdvancedSearch->SearchOperator = @$_GET["z_kieu_chaohang"];

		// trang_thai
		$offer->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$offer->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// xuatban
		$offer->xuatban->AdvancedSearch->SearchValue = @$_GET["x_xuatban"];
		$offer->xuatban->AdvancedSearch->SearchOperator = @$_GET["z_xuatban"];

		// chaohang_tieubieu
		$offer->chaohang_tieubieu->AdvancedSearch->SearchValue = @$_GET["x_chaohang_tieubieu"];
		$offer->chaohang_tieubieu->AdvancedSearch->SearchOperator = @$_GET["z_chaohang_tieubieu"];

		// xuat_su
		$offer->xuat_su->AdvancedSearch->SearchValue = @$_GET["x_xuat_su"];
		$offer->xuat_su->AdvancedSearch->SearchOperator = @$_GET["z_xuat_su"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $offer;

		// Call Recordset Selecting event
		$offer->Recordset_Selecting($offer->CurrentFilter);

		// Load list page SQL
		$sSql = $offer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$offer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $offer;
		$sFilter = $offer->KeyFilter();

		// Call Row Selecting event
		$offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$offer->CurrentFilter = $sFilter;
		$sSql = $offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $offer;
		$offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$offer->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$offer->thoihan_tungay->setDbValue($rs->fields('thoihan_tungay'));
		$offer->thoihan_denngay->setDbValue($rs->fields('thoihan_denngay'));
		$offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$offer->tg_themchaohang->setDbValue($rs->fields('tg_themchaohang'));
		$offer->tg_suachaohang->setDbValue($rs->fields('tg_suachaohang'));
		$offer->trang_thai->setDbValue($rs->fields('trang_thai'));
		$offer->xuatban->setDbValue($rs->fields('xuatban'));
		$offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
		$offer->xuat_su->setDbValue($rs->fields('xuat_su'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $offer;

		// Call Row_Rendering event
		$offer->Row_Rendering();

		// Common render codes for all row types
		// tieude_chaohang

		$offer->tieude_chaohang->CellCssStyle = "width: 300px;";
		$offer->tieude_chaohang->CellCssClass = "";

		// anh_chaohang
		$offer->anh_chaohang->CellCssStyle = "";
		$offer->anh_chaohang->CellCssClass = "";

		// kieu_chaohang
		$offer->kieu_chaohang->CellCssStyle = "";
		$offer->kieu_chaohang->CellCssClass = "";

		// so_lanxem
		$offer->so_lanxem->CellCssStyle = "";
		$offer->so_lanxem->CellCssClass = "";

		// thoihan_tungay
		$offer->thoihan_tungay->CellCssStyle = "";
		$offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$offer->thoihan_denngay->CellCssStyle = "";
		$offer->thoihan_denngay->CellCssClass = "";

		// trang_thai
		$offer->trang_thai->CellCssStyle = "";
		$offer->trang_thai->CellCssClass = "";

		// xuatban
		$offer->xuatban->CellCssStyle = "";
		$offer->xuatban->CellCssClass = "";

		// chaohang_tieubieu
		$offer->chaohang_tieubieu->CellCssStyle = "";
		$offer->chaohang_tieubieu->CellCssClass = "";

		// xuat_su
		$offer->xuat_su->CellCssStyle = "";
		$offer->xuat_su->CellCssClass = "";
		if ($offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_chaohang
			$offer->tieude_chaohang->ViewValue = $offer->tieude_chaohang->CurrentValue;
			$offer->tieude_chaohang->CssStyle = "";
			$offer->tieude_chaohang->CssClass = "";
			$offer->tieude_chaohang->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->ViewValue = $offer->anh_chaohang->Upload->DbValue;
				$offer->anh_chaohang->ImageWidth = 150;
				$offer->anh_chaohang->ImageHeight = 0;
				$offer->anh_chaohang->ImageAlt = "";
			} else {
				$offer->anh_chaohang->ViewValue = "";
			}
			$offer->anh_chaohang->CssStyle = "";
			$offer->anh_chaohang->CssClass = "";
			$offer->anh_chaohang->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($offer->kieu_chaohang->CurrentValue) {
					case "1":
						$offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					case "2":
						$offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					default:
						$offer->kieu_chaohang->ViewValue = $offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$offer->kieu_chaohang->ViewValue = NULL;
			}
			$offer->kieu_chaohang->CssStyle = "";
			$offer->kieu_chaohang->CssClass = "";
			$offer->kieu_chaohang->ViewCustomAttributes = "";

			// so_lanxem
			$offer->so_lanxem->ViewValue = $offer->so_lanxem->CurrentValue;
			$offer->so_lanxem->CssStyle = "text-align:center;";
			$offer->so_lanxem->CssClass = "";
			$offer->so_lanxem->ViewCustomAttributes = "";

			// thoihan_tungay
			$offer->thoihan_tungay->ViewValue = $offer->thoihan_tungay->CurrentValue;
			$offer->thoihan_tungay->ViewValue = ew_FormatDateTime($offer->thoihan_tungay->ViewValue, 7);
			$offer->thoihan_tungay->CssStyle = "";
			$offer->thoihan_tungay->CssClass = "";
			$offer->thoihan_tungay->ViewCustomAttributes = "";

			// thoihan_denngay
			$offer->thoihan_denngay->ViewValue = $offer->thoihan_denngay->CurrentValue;
			$offer->thoihan_denngay->ViewValue = ew_FormatDateTime($offer->thoihan_denngay->ViewValue, 7);
			$offer->thoihan_denngay->CssStyle = "";
			$offer->thoihan_denngay->CssClass = "";
			$offer->thoihan_denngay->ViewCustomAttributes = "";

			// trang_thai
			if (strval($offer->trang_thai->CurrentValue) <> "") {
				switch ($offer->trang_thai->CurrentValue) {
					case "1":
						$offer->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa Kích hoạt</font>";
						break;
					case "2":
						$offer->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$offer->trang_thai->ViewValue = $offer->trang_thai->CurrentValue;
				}
			} else {
				$offer->trang_thai->ViewValue = NULL;
			}
			$offer->trang_thai->CssStyle = "";
			$offer->trang_thai->CssClass = "";
			$offer->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($offer->xuatban->CurrentValue) <> "") {
				switch ($offer->xuatban->CurrentValue) {
					case "0":
						$offer->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$offer->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$offer->xuatban->ViewValue = $offer->xuatban->CurrentValue;
				}
			} else {
				$offer->xuatban->ViewValue = NULL;
			}
			$offer->xuatban->CssStyle = "";
			$offer->xuatban->CssClass = "";
			$offer->xuatban->ViewCustomAttributes = "";

			// chaohang_tieubieu
			if (strval($offer->chaohang_tieubieu->CurrentValue) <> "") {
				switch ($offer->chaohang_tieubieu->CurrentValue) {
					case "0":
						$offer->chaohang_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$offer->chaohang_tieubieu->ViewValue = "<font color=\"#FF0000\">Tiêu biểu</font>";
						break;
					default:
						$offer->chaohang_tieubieu->ViewValue = $offer->chaohang_tieubieu->CurrentValue;
				}
			} else {
				$offer->chaohang_tieubieu->ViewValue = NULL;
			}
			$offer->chaohang_tieubieu->CssStyle = "";
			$offer->chaohang_tieubieu->CssClass = "";
			$offer->chaohang_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			$offer->xuat_su->ViewValue = $offer->xuat_su->CurrentValue;
			$offer->xuat_su->CssStyle = "";
			$offer->xuat_su->CssClass = "";
			$offer->xuat_su->ViewCustomAttributes = "";

			// tieude_chaohang
			$offer->tieude_chaohang->HrefValue = "";

			// anh_chaohang
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($offer->anh_chaohang->ViewValue)) ? $offer->anh_chaohang->ViewValue : $offer->anh_chaohang->CurrentValue);
				if ($offer->Export <> "") $offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($offer->anh_chaohang->HrefValue);
			} else {
				$offer->anh_chaohang->HrefValue = "";
			}

			// kieu_chaohang
			$offer->kieu_chaohang->HrefValue = "";

			// so_lanxem
			$offer->so_lanxem->HrefValue = "";

			// thoihan_tungay
			$offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$offer->thoihan_denngay->HrefValue = "";

			// trang_thai
			$offer->trang_thai->HrefValue = "";

			// xuatban
			$offer->xuatban->HrefValue = "";

			// chaohang_tieubieu
			$offer->chaohang_tieubieu->HrefValue = "";

			// xuat_su
			$offer->xuat_su->HrefValue = "";
		} elseif ($offer->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieude_chaohang
			$offer->tieude_chaohang->EditCustomAttributes = "";
			$offer->tieude_chaohang->EditValue = ew_HtmlEncode($offer->tieude_chaohang->AdvancedSearch->SearchValue);

			// anh_chaohang
			$offer->anh_chaohang->EditCustomAttributes = "";
			if (!is_null($offer->anh_chaohang->Upload->DbValue)) {
				$offer->anh_chaohang->EditValue = $offer->anh_chaohang->Upload->DbValue;
				$offer->anh_chaohang->ImageWidth = 150;
				$offer->anh_chaohang->ImageHeight = 0;
				$offer->anh_chaohang->ImageAlt = "";
			} else {
				$offer->anh_chaohang->EditValue = "";
			}

			// kieu_chaohang
			$offer->kieu_chaohang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chào mua");
			$arwrk[] = array("2", "Chào bán");
			array_unshift($arwrk, array("", "Chọn"));
			$offer->kieu_chaohang->EditValue = $arwrk;

			// so_lanxem
			$offer->so_lanxem->EditCustomAttributes = "";
			$offer->so_lanxem->EditValue = ew_HtmlEncode($offer->so_lanxem->AdvancedSearch->SearchValue);

			// thoihan_tungay
			$offer->thoihan_tungay->EditCustomAttributes = "";
			$offer->thoihan_tungay->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($offer->thoihan_tungay->AdvancedSearch->SearchValue, 7), 7));

			// thoihan_denngay
			$offer->thoihan_denngay->EditCustomAttributes = "";
			$offer->thoihan_denngay->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($offer->thoihan_denngay->AdvancedSearch->SearchValue, 7), 7));

			// trang_thai
			$offer->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chưa kích hoạt");
			$arwrk[] = array("2", "Đã kích hoạt");
			array_unshift($arwrk, array("", "Chọn"));
			$offer->trang_thai->EditValue = $arwrk;

			// xuatban
			$offer->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$offer->xuatban->EditValue = $arwrk;

			// chaohang_tieubieu
			$offer->chaohang_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$offer->chaohang_tieubieu->EditValue = $arwrk;

			// xuat_su
			$offer->xuat_su->EditCustomAttributes = "";
			$offer->xuat_su->EditValue = ew_HtmlEncode($offer->xuat_su->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$offer->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $offer;

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
		global $offer;
		$offer->kieu_chaohang->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_kieu_chaohang");
		$offer->trang_thai->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_trang_thai");
		$offer->xuatban->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_xuatban");
		$offer->chaohang_tieubieu->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_chaohang_tieubieu");
		$offer->xuat_su->AdvancedSearch->SearchValue = $offer->getAdvancedSearch("x_xuat_su");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $offer;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($offer->nguoidung_id->CurrentValue);
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
