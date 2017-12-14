<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "productsinfo.php" ?>
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
$products_list = new cproducts_list();
$Page =& $products_list;

// Page init processing
$products_list->Page_Init();

// Page main processing
$products_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($products->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var products_list = new ew_Page("products_list");

// page properties
products_list.PageID = "list"; // page ID
var EW_PAGE_ID = products_list.PageID; // for backward compatibility

// extend page with validate function for search
products_list.ValidateSearch = function(fobj) {
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
products_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
products_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
products_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
products_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($products->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($products->Export == "" && $products->SelectLimit);
	if (!$bSelectLimit)
		$rs = $products_list->LoadRecordset();
	$products_list->lTotalRecs = ($bSelectLimit) ? $products->SelectRecordCount() : $rs->RecordCount();
	$products_list->lStartRec = 1;
	if ($products_list->lDisplayRecs <= 0) // Display all records
		$products_list->lDisplayRecs = $products_list->lTotalRecs;
	if (!($products->ExportAll && $products->Export <> ""))
		$products_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $products_list->LoadRecordset($products_list->lStartRec-1, $products_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách thông tin sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($products->Export == "" && $products->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(products_list);" style="text-decoration: none;"><img id="products_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="products_list_SearchPanel">
<form name="fproductslistsrch" id="fproductslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return products_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="products">
<?php
if ($gsSearchError == "")
	$products_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$products->RowType = EW_ROWTYPE_SEARCH;

// Render row
$products_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Ngành hàng</span></td>
		<td><input type="hidden" name="z_nganhnghe_id" id="z_nganhnghe_id" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_nganhnghe_id" name="x_nganhnghe_id"<?php echo $products->nganhnghe_id->EditAttributes() ?>>
<?php
if (is_array($products->nganhnghe_id->EditValue)) {
	$arwrk = $products->nganhnghe_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->nganhnghe_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><input type="hidden" name="z_tg_themsanpham" id="z_tg_themsanpham" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_tg_themsanpham" id="x_tg_themsanpham" value="<?php echo $products->tg_themsanpham->EditValue ?>"<?php echo $products->tg_themsanpham->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_tg_themsanpham" name="cal_x_tg_themsanpham" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_tg_themsanpham", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_tg_themsanpham" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_tg_themsanpham" name="btw1_tg_themsanpham">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_tg_themsanpham" name="btw1_tg_themsanpham">
<input type="text" name="y_tg_themsanpham" id="y_tg_themsanpham" value="<?php echo $products->tg_themsanpham->EditValue2 ?>"<?php echo $products->tg_themsanpham->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_tg_themsanpham" name="cal_y_tg_themsanpham" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_tg_themsanpham", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_tg_themsanpham" // ID of the button
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
<select id="x_trang_thai" name="x_trang_thai"<?php echo $products->trang_thai->EditAttributes() ?>>
<?php
if (is_array($products->trang_thai->EditValue)) {
	$arwrk = $products->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Xuất bản</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_xuatban" id="z_xuatban" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_xuatban" name="x_xuatban"<?php echo $products->xuatban->EditAttributes() ?>>
<?php
if (is_array($products->xuatban->EditValue)) {
	$arwrk = $products->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->xuatban->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Sản phẩm tiêu biểu</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_sanpham_tieubieu" id="z_sanpham_tieubieu" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_sanpham_tieubieu" name="x_sanpham_tieubieu"<?php echo $products->sanpham_tieubieu->EditAttributes() ?>>
<?php
if (is_array($products->sanpham_tieubieu->EditValue)) {
	$arwrk = $products->sanpham_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->sanpham_tieubieu->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Khuyến mại</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_khuyenmai_status" id="z_khuyenmai_status" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_khuyenmai_status" name="x_khuyenmai_status"<?php echo $products->khuyenmai_status->EditAttributes() ?>>
<?php
if (is_array($products->khuyenmai_status->EditValue)) {
	$arwrk = $products->khuyenmai_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($products->khuyenmai_status->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($products->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $products_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($products->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($products->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($products->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $products_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($products->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($products->CurrentAction <> "gridadd" && $products->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($products_list->Pager)) $products_list->Pager = new cNumericPager($products_list->lStartRec, $products_list->lDisplayRecs, $products_list->lTotalRecs, $products_list->lRecRange) ?>
<?php if ($products_list->Pager->RecordCount > 0) { ?>
	<?php if ($products_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($products_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi từ <?php echo $products_list->Pager->FromIndex ?> đến <?php echo $products_list->Pager->ToIndex ?> của <?php echo $products_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($products_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có sản phẩm
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($products_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="products">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($products_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($products_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($products_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($products->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<br>
<a href="<?php echo $products->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($products_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fproductslist)) alert('Chưa chọn sản phẩm'); else {document.fproductslist.action='productsdelete.php';document.fproductslist.encoding='application/x-www-form-urlencoded';document.fproductslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fproductslist)) alert('Chưa chọn sản phẩm'); else {document.fproductslist.action='productsupdate.php';document.fproductslist.encoding='application/x-www-form-urlencoded';document.fproductslist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fproductslist" id="fproductslist" class="ewForm" action="" method="post">
<?php if ($products_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$products_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$products_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$products_list->lOptionCnt++; // edit
}
if ($Security->AllowList('pic_product')) {
	$products_list->lOptionCnt++; // Detail
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$products_list->lOptionCnt++; // Multi-select
}
	$products_list->lOptionCnt += count($products_list->ListOptions->Items); // Custom list options
?>
<?php echo $products->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($products->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px; ">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px; ">&nbsp;</td>
<?php } ?>
<?php if ($Security->AllowList('products')) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px; "><input type="checkbox" name="key" id="key" class="phpmaker" onclick="products_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($products_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($products->ten_sanpham->Visible) { // ten_sanpham ?>
	<?php if ($products->SortUrl($products->ten_sanpham) == "") { ?>
		<td style="width: 200px;">Tên sản phẩm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->ten_sanpham) ?>',1);" style="width: 200px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên sản phẩm&nbsp;(*)</td><td style="width: 10px;"><?php if ($products->ten_sanpham->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->ten_sanpham->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<?php if ($products->SortUrl($products->nganhnghe_id) == "") { ?>
		<td>Ngành nghề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->nganhnghe_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngành nghề</td><td style="width: 10px;"><?php if ($products->nganhnghe_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->nganhnghe_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->tg_themsanpham->Visible) { // tg_themsanpham ?>
	<?php if ($products->SortUrl($products->tg_themsanpham) == "") { ?>
		<td>Thời gian thêm sản phẩm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->tg_themsanpham) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian thêm sản phẩm</td><td style="width: 10px;"><?php if ($products->tg_themsanpham->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->tg_themsanpham->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->so_lanxem->Visible) { // so_lanxem ?>
	<?php if ($products->SortUrl($products->so_lanxem) == "") { ?>
		<td style="width: 100px;">Số lần xem</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->so_lanxem) ?>',1);" style="width: 100px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số lần xem</td><td style="width: 10px;"><?php if ($products->so_lanxem->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->so_lanxem->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->trang_thai->Visible) { // trang_thai ?>
	<?php if ($products->SortUrl($products->trang_thai) == "") { ?>
		<td style="width: 150px;">Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->trang_thai) ?>',1);" style="width: 150px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($products->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->xuatban->Visible) { // xuatban ?>
	<?php if ($products->SortUrl($products->xuatban) == "") { ?>
		<td style="width: 150px;">Xuất bản</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->xuatban) ?>',1);" style="width: 150px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($products->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
	<?php if ($products->SortUrl($products->sanpham_tieubieu) == "") { ?>
		<td>Sản phẩm tiêu biểu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->sanpham_tieubieu) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Sản phẩm tiêu biểu</td><td style="width: 10px;"><?php if ($products->sanpham_tieubieu->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->sanpham_tieubieu->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->don_gia->Visible) { // don_gia ?>
	<?php if ($products->SortUrl($products->don_gia) == "") { ?>
		<td>Đơn giá</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->don_gia) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Đơn giá</td><td style="width: 10px;"><?php if ($products->don_gia->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->don_gia->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->soluong_tonkho->Visible) { // soluong_tonkho ?>
	<?php if ($products->SortUrl($products->soluong_tonkho) == "") { ?>
		<td>Số lượng tồn</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->soluong_tonkho) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số lượng tồn</td><td style="width: 10px;"><?php if ($products->soluong_tonkho->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->soluong_tonkho->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($products->khuyenmai_status->Visible) { // khuyenmai_status ?>
	<?php if ($products->SortUrl($products->khuyenmai_status) == "") { ?>
		<td>Khuyến mại</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $products->SortUrl($products->khuyenmai_status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Khuyến mại</td><td style="width: 10px;"><?php if ($products->khuyenmai_status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($products->khuyenmai_status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
		
	</tr>
</thead>
<?php
if ($products->ExportAll && $products->Export <> "") {
	$products_list->lStopRec = $products_list->lTotalRecs;
} else {
	$products_list->lStopRec = $products_list->lStartRec + $products_list->lDisplayRecs - 1; // Set the last record to display
}
$products_list->lRecCount = $products_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$products->SelectLimit && $products_list->lStartRec > 1)
		$rs->Move($products_list->lStartRec - 1);
}
$products_list->lRowCnt = 0;
while (($products->CurrentAction == "gridadd" || !$rs->EOF) &&
	$products_list->lRecCount < $products_list->lStopRec) {
	$products_list->lRecCount++;
	if (intval($products_list->lRecCount) >= intval($products_list->lStartRec)) {
		$products_list->lRowCnt++;

	// Init row class and style
	$products->CssClass = "";
	$products->CssStyle = "";
	$products->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($products->CurrentAction == "gridadd") {
		$products_list->LoadDefaultValues(); // Load default values
	} else {
		$products_list->LoadRowValues($rs); // Load row values
	}
	$products->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$products_list->RenderRow();
?>
	<tr<?php echo $products->RowAttributes() ?>>
<?php if ($products->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; "><span class="phpmaker"><?php if ($products_list->ShowOptionLink()) { ?>
<a href="<?php echo $products->ViewUrl() ?>">Xem</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; "><span class="phpmaker"><?php if ($products_list->ShowOptionLink()) { ?>
<a href="<?php echo $products->EditUrl() ?>">Sửa</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->AllowList('products')) { ?>
<td style="white-space: nowrap;"><span class="phpmaker"><?php if ($products_list->ShowOptionLink()) { ?>
<a href="pic_productlist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=products&sanpham_id=<?php echo urlencode(strval($products->sanpham_id->CurrentValue)) ?>">Ảnh SP</a>
<?php } else { echo "&nbsp;"; ?><?php } ?></span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($products->sanpham_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($products_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($products->ten_sanpham->Visible) { // ten_sanpham ?>
		<td<?php echo $products->ten_sanpham->CellAttributes() ?>>
<div<?php echo $products->ten_sanpham->ViewAttributes() ?>><?php echo $products->ten_sanpham->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->nganhnghe_id->Visible) { // nganhnghe_id ?>
		<td<?php echo $products->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $products->nganhnghe_id->ViewAttributes() ?>><?php echo $products->nganhnghe_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->tg_themsanpham->Visible) { // tg_themsanpham ?>
		<td<?php echo $products->tg_themsanpham->CellAttributes() ?>>
<div<?php echo $products->tg_themsanpham->ViewAttributes() ?>><?php echo $products->tg_themsanpham->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->so_lanxem->Visible) { // so_lanxem ?>
		<td<?php echo $products->so_lanxem->CellAttributes() ?>>
<div<?php echo $products->so_lanxem->ViewAttributes() ?>><?php echo $products->so_lanxem->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $products->trang_thai->CellAttributes() ?>>
<div<?php echo $products->trang_thai->ViewAttributes() ?>><?php echo $products->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->xuatban->Visible) { // xuatban ?>
		<td<?php echo $products->xuatban->CellAttributes() ?>>
<div<?php echo $products->xuatban->ViewAttributes() ?>><?php echo $products->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
		<td<?php echo $products->sanpham_tieubieu->CellAttributes() ?>>
<div<?php echo $products->sanpham_tieubieu->ViewAttributes() ?>><?php echo $products->sanpham_tieubieu->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->don_gia->Visible) { // don_gia ?>
		<td<?php echo $products->don_gia->CellAttributes() ?>>
<div<?php echo $products->don_gia->ViewAttributes() ?>><?php echo $products->don_gia->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->soluong_tonkho->Visible) { // soluong_tonkho ?>
		<td<?php echo $products->soluong_tonkho->CellAttributes() ?>>
<div<?php echo $products->soluong_tonkho->ViewAttributes() ?>><?php echo $products->soluong_tonkho->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($products->khuyenmai_status->Visible) { // khuyenmai_status ?>
		<td<?php echo $products->khuyenmai_status->CellAttributes() ?>>
<div<?php echo $products->khuyenmai_status->ViewAttributes() ?>><?php echo $products->khuyenmai_status->ListViewValue() ?></div>
</td>
	<?php } ?>	
	</tr>
<?php
	}
	if ($products->CurrentAction <> "gridadd")
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
<?php if ($products_list->lTotalRecs > 0) { ?>
<?php if ($products->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($products->CurrentAction <> "gridadd" && $products->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($products_list->Pager)) $products_list->Pager = new cNumericPager($products_list->lStartRec, $products_list->lDisplayRecs, $products_list->lTotalRecs, $products_list->lRecRange) ?>
<?php if ($products_list->Pager->RecordCount > 0) { ?>
	<?php if ($products_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($products_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $products_list->PageUrl() ?>start=<?php echo $products_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi từ <?php echo $products_list->Pager->FromIndex ?> đến <?php echo $products_list->Pager->ToIndex ?> của <?php echo $products_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($products_list->sSrchWhere == "0=101") { ?>
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
<?php if ($products_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="products">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($products_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($products_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($products_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($products->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($products_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<br>
<a href="<?php echo $products->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($products_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fproductslist)) alert('No records selected'); else {document.fproductslist.action='productsdelete.php';document.fproductslist.encoding='application/x-www-form-urlencoded';document.fproductslist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fproductslist)) alert('Chưa chọn sản phẩm'); else {document.fproductslist.action='productsupdate.php';document.fproductslist.encoding='application/x-www-form-urlencoded';document.fproductslist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($products->Export == "" && $products->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(products_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($products->Export == "") { ?>
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
class cproducts_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'products';

	// Page Object Name
	var $PageObjName = 'products_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $products;
		if ($products->UseTokenInUrl) $PageUrl .= "t=" . $products->TableVar . "&"; // add page token
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
		global $objForm, $products;
		if ($products->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($products->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($products->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cproducts_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["products"] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'products', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $products;
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
	$products->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $products->Export; // Get export parameter, used in header
	$gsExportFile = $products->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $products;
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
		if ($products->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $products->getRecordsPerPage(); // Restore from Session
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
		$products->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$products->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$products->setStartRecordNumber($this->lStartRec);
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
		$products->setSessionWhere($sFilter);
		$products->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $products;
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
			$products->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$products->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $products;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $products->nganhnghe_id, FALSE); // Field nganhnghe_id
		$this->BuildSearchSql($sWhere, $products->tg_themsanpham, FALSE); // Field tg_themsanpham
		$this->BuildSearchSql($sWhere, $products->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $products->xuatban, FALSE); // Field xuatban
		$this->BuildSearchSql($sWhere, $products->sanpham_tieubieu, FALSE); // Field sanpham_tieubieu
		$this->BuildSearchSql($sWhere, $products->khuyenmai_status, FALSE); // Field khuyenmai_status

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($products->nganhnghe_id); // Field nganhnghe_id
			$this->SetSearchParm($products->tg_themsanpham); // Field tg_themsanpham
			$this->SetSearchParm($products->trang_thai); // Field trang_thai
			$this->SetSearchParm($products->xuatban); // Field xuatban
			$this->SetSearchParm($products->sanpham_tieubieu); // Field sanpham_tieubieu
			$this->SetSearchParm($products->khuyenmai_status); // Field khuyenmai_status
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
			//vu viet hung
			if (strstr($sWrk,"products.nganhnghe_id")<>""){
			$sWrk="(".$sWrk;
			$sWrk.=") OR (career.nganhnghe_belongto=".$FldVal.")";}
			// hung
		}
		if ($sWrk <> "") {
			if ($Where <> "") $Where .= " AND ";
			$Where .= "(" . $sWrk . ")";
		}
	}

	// Set search parameters
	function SetSearchParm(&$Fld) {
		global $products;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$products->setAdvancedSearch("x_$FldParm", $FldVal);
		$products->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$products->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$products->setAdvancedSearch("y_$FldParm", $FldVal2);
		$products->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $products;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $products->ten_sanpham->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $products->ma_sanpham->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $products->noidung_sanpham->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (is_numeric($sKeyword)) $sql .= "trang_thai = " . $sKeyword . " OR ";
		$sql .= $products->xuat_su->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $products->anh_to->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $products->anh_nho->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $products;
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
			$products->setBasicSearchKeyword($sSearchKeyword);
			$products->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $products;
		$this->sSrchWhere = "";
		$products->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $products;
		$products->setBasicSearchKeyword("");
		$products->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $products;
		$products->setAdvancedSearch("x_nganhnghe_id", "");
		$products->setAdvancedSearch("x_tg_themsanpham", "");
		$products->setAdvancedSearch("y_tg_themsanpham", "");
		$products->setAdvancedSearch("x_trang_thai", "");
		$products->setAdvancedSearch("x_xuatban", "");
		$products->setAdvancedSearch("x_sanpham_tieubieu", "");
		$products->setAdvancedSearch("x_khuyenmai_status", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $products;
		$this->sSrchWhere = $products->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $products;
		 $products->nganhnghe_id->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_nganhnghe_id");
		 $products->tg_themsanpham->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_tg_themsanpham");
		 $products->tg_themsanpham->AdvancedSearch->SearchValue2 = $products->getAdvancedSearch("y_tg_themsanpham");
		 $products->trang_thai->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_trang_thai");
		 $products->xuatban->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_xuatban");
		 $products->sanpham_tieubieu->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_sanpham_tieubieu");
		 $products->khuyenmai_status->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_khuyenmai_status");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $products;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$products->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$products->CurrentOrderType = @$_GET["ordertype"];
			$products->UpdateSort($products->ten_sanpham); // Field 
			$products->UpdateSort($products->nganhnghe_id); // Field 
			$products->UpdateSort($products->tg_themsanpham); // Field 
			$products->UpdateSort($products->so_lanxem); // Field 
			$products->UpdateSort($products->trang_thai); // Field 
			$products->UpdateSort($products->xuatban); // Field 
			$products->UpdateSort($products->sanpham_tieubieu); // Field 
			$products->UpdateSort($products->don_gia); // Field 
			$products->UpdateSort($products->soluong_tonkho); // Field 
			$products->UpdateSort($products->khuyenmai_status); // Field 
			$products->UpdateSort($products->anh_to); // Field 
			$products->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $products;
		$sOrderBy = $products->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($products->SqlOrderBy() <> "") {
				$sOrderBy = $products->SqlOrderBy();
				$products->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $products;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$products->setSessionOrderBy($sOrderBy);
				$products->ten_sanpham->setSort("");
				$products->nganhnghe_id->setSort("");
				$products->tg_themsanpham->setSort("");
				$products->so_lanxem->setSort("");
				$products->trang_thai->setSort("");
				$products->xuatban->setSort("");
				$products->sanpham_tieubieu->setSort("");
				$products->don_gia->setSort("");
				$products->soluong_tonkho->setSort("");
				$products->khuyenmai_status->setSort("");
				$products->anh_to->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$products->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $products;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$products->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$products->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $products->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$products->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$products->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$products->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $products;

		// Load search values
		// nganhnghe_id

		$products->nganhnghe_id->AdvancedSearch->SearchValue = @$_GET["x_nganhnghe_id"];
		$products->nganhnghe_id->AdvancedSearch->SearchOperator = @$_GET["z_nganhnghe_id"];

		// tg_themsanpham
		$products->tg_themsanpham->AdvancedSearch->SearchValue = @$_GET["x_tg_themsanpham"];
		$products->tg_themsanpham->AdvancedSearch->SearchOperator = @$_GET["z_tg_themsanpham"];
		$products->tg_themsanpham->AdvancedSearch->SearchCondition = @$_GET["v_tg_themsanpham"];
		$products->tg_themsanpham->AdvancedSearch->SearchValue2 = @$_GET["y_tg_themsanpham"];
		$products->tg_themsanpham->AdvancedSearch->SearchOperator2 = @$_GET["w_tg_themsanpham"];

		// trang_thai
		$products->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$products->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// xuatban
		$products->xuatban->AdvancedSearch->SearchValue = @$_GET["x_xuatban"];
		$products->xuatban->AdvancedSearch->SearchOperator = @$_GET["z_xuatban"];

		// sanpham_tieubieu
		$products->sanpham_tieubieu->AdvancedSearch->SearchValue = @$_GET["x_sanpham_tieubieu"];
		$products->sanpham_tieubieu->AdvancedSearch->SearchOperator = @$_GET["z_sanpham_tieubieu"];

		// khuyenmai_status
		$products->khuyenmai_status->AdvancedSearch->SearchValue = @$_GET["x_khuyenmai_status"];
		$products->khuyenmai_status->AdvancedSearch->SearchOperator = @$_GET["z_khuyenmai_status"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $products;

		// Call Recordset Selecting event
		$products->Recordset_Selecting($products->CurrentFilter);

		// Load list page SQL
		$sSql = $products->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$products->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $products;
		$sFilter = $products->KeyFilter();

		// Call Row Selecting event
		$products->Row_Selecting($sFilter);

		// Load sql based on filter
		$products->CurrentFilter = $sFilter;
		$sSql = $products->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$products->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $products;
		$products->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$products->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$products->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
		$products->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));
		$products->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$products->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$products->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$products->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$products->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$products->loai_tien->setDbValue($rs->fields('loai_tien'));
		$products->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$products->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$products->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$products->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$products->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$products->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$products->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$products->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$products->trang_thai->setDbValue($rs->fields('trang_thai'));
		$products->xuatban->setDbValue($rs->fields('xuatban'));
		$products->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
		$products->xuat_su->setDbValue($rs->fields('xuat_su'));
		$products->comment_status->setDbValue($rs->fields('comment_status'));
		$products->don_gia->setDbValue($rs->fields('don_gia'));
		$products->thanhtoan_status->setDbValue($rs->fields('thanhtoan_status'));
		$products->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$products->khuyenmai_status->setDbValue($rs->fields('khuyenmai_status'));
		$products->km_date_begin->setDbValue($rs->fields('km_date_begin'));
		$products->km_date_end->setDbValue($rs->fields('km_date_end'));
		$products->anh_to->Upload->DbValue = $rs->fields('anh_to');
		$products->anh_nho->Upload->DbValue = $rs->fields('anh_nho');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $products;

		// Call Row_Rendering event
		$products->Row_Rendering();

		// Common render codes for all row types
		// ten_sanpham

		$products->ten_sanpham->CellCssStyle = "width: 200px;";
		$products->ten_sanpham->CellCssClass = "";

		// nganhnghe_id
		$products->nganhnghe_id->CellCssStyle = "";
		$products->nganhnghe_id->CellCssClass = "";

		// tg_themsanpham
		$products->tg_themsanpham->CellCssStyle = "";
		$products->tg_themsanpham->CellCssClass = "";

		// so_lanxem
		$products->so_lanxem->CellCssStyle = "width: 100px;";
		$products->so_lanxem->CellCssClass = "";

		// trang_thai
		$products->trang_thai->CellCssStyle = "width: 150px;";
		$products->trang_thai->CellCssClass = "";

		// xuatban
		$products->xuatban->CellCssStyle = "width: 150px;";
		$products->xuatban->CellCssClass = "";

		// sanpham_tieubieu
		$products->sanpham_tieubieu->CellCssStyle = "";
		$products->sanpham_tieubieu->CellCssClass = "";

		// don_gia
		$products->don_gia->CellCssStyle = "";
		$products->don_gia->CellCssClass = "";

		// soluong_tonkho
		$products->soluong_tonkho->CellCssStyle = "";
		$products->soluong_tonkho->CellCssClass = "";

		// khuyenmai_status
		$products->khuyenmai_status->CellCssStyle = "";
		$products->khuyenmai_status->CellCssClass = "";

		// anh_to
		$products->anh_to->CellCssStyle = "";
		$products->anh_to->CellCssClass = "";
		if ($products->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_sanpham
			$products->ten_sanpham->ViewValue = $products->ten_sanpham->CurrentValue;
			$products->ten_sanpham->CssStyle = "";
			$products->ten_sanpham->CssClass = "";
			$products->ten_sanpham->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($products->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($products->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$products->nganhnghe_id->ViewValue = $products->nganhnghe_id->CurrentValue;
				}
			} else {
				$products->nganhnghe_id->ViewValue = NULL;
			}
			$products->nganhnghe_id->CssStyle = "";
			$products->nganhnghe_id->CssClass = "";
			$products->nganhnghe_id->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// tg_themsanpham
			$products->tg_themsanpham->ViewValue = $products->tg_themsanpham->CurrentValue;
			$products->tg_themsanpham->ViewValue = ew_FormatDateTime($products->tg_themsanpham->ViewValue, 7);
			$products->tg_themsanpham->CssStyle = "";
			$products->tg_themsanpham->CssClass = "";
			$products->tg_themsanpham->ViewCustomAttributes = "";

			// so_lanxem
			$products->so_lanxem->ViewValue = $products->so_lanxem->CurrentValue;
			$products->so_lanxem->CssStyle = "";
			$products->so_lanxem->CssClass = "";
			$products->so_lanxem->ViewCustomAttributes = "";

			// trang_thai
			if (strval($products->trang_thai->CurrentValue) <> "") {
				switch ($products->trang_thai->CurrentValue) {
					case "1":
						$products->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa Kích hoạt</font>";
						break;
					case "2":
						$products->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$products->trang_thai->ViewValue = $products->trang_thai->CurrentValue;
				}
			} else {
				$products->trang_thai->ViewValue = NULL;
			}
			$products->trang_thai->CssStyle = "";
			$products->trang_thai->CssClass = "";
			$products->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($products->xuatban->CurrentValue) <> "") {
				switch ($products->xuatban->CurrentValue) {
					case "0":
						$products->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$products->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$products->xuatban->ViewValue = $products->xuatban->CurrentValue;
				}
			} else {
				$products->xuatban->ViewValue = NULL;
			}
			$products->xuatban->CssStyle = "";
			$products->xuatban->CssClass = "";
			$products->xuatban->ViewCustomAttributes = "";

			// sanpham_tieubieu
			if (strval($products->sanpham_tieubieu->CurrentValue) <> "") {
				switch ($products->sanpham_tieubieu->CurrentValue) {
					case "0":
						$products->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$products->sanpham_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$products->sanpham_tieubieu->ViewValue = $products->sanpham_tieubieu->CurrentValue;
				}
			} else {
				$products->sanpham_tieubieu->ViewValue = NULL;
			}
			$products->sanpham_tieubieu->CssStyle = "";
			$products->sanpham_tieubieu->CssClass = "";
			$products->sanpham_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			$products->xuat_su->ViewValue = $products->xuat_su->CurrentValue;
			$products->xuat_su->CssStyle = "";
			$products->xuat_su->CssClass = "";
			$products->xuat_su->ViewCustomAttributes = "";

			// comment_status
			if (strval($products->comment_status->CurrentValue) <> "") {
				switch ($products->comment_status->CurrentValue) {
					case "0":
						$products->comment_status->ViewValue = "Không bình luận";
						break;
					case "1":
						$products->comment_status->ViewValue = "Cho bình luận";
						break;
					default:
						$products->comment_status->ViewValue = $products->comment_status->CurrentValue;
				}
			} else {
				$products->comment_status->ViewValue = NULL;
			}
			$products->comment_status->CssStyle = "";
			$products->comment_status->CssClass = "";
			$products->comment_status->ViewCustomAttributes = "";

			// don_gia
			$products->don_gia->ViewValue = $products->don_gia->CurrentValue;
			$products->don_gia->CssStyle = "";
			$products->don_gia->CssClass = "";
			$products->don_gia->ViewCustomAttributes = "";

			// thanhtoan_status
			if (strval($products->thanhtoan_status->CurrentValue) <> "") {
				switch ($products->thanhtoan_status->CurrentValue) {
					case "0":
						$products->thanhtoan_status->ViewValue = "Không thanh toán trực tuyến";
						break;
					case "1":
						$products->thanhtoan_status->ViewValue = "Thanh toán trực tuyến";
						break;
					default:
						$products->thanhtoan_status->ViewValue = $products->thanhtoan_status->CurrentValue;
				}
			} else {
				$products->thanhtoan_status->ViewValue = NULL;
			}
			$products->thanhtoan_status->CssStyle = "";
			$products->thanhtoan_status->CssClass = "";
			$products->thanhtoan_status->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// khuyenmai_status
			if (strval($products->khuyenmai_status->CurrentValue) <> "") {
				switch ($products->khuyenmai_status->CurrentValue) {
					case "0":
						$products->khuyenmai_status->ViewValue = "Không khuyến mại";
						break;
					case "1":
						$products->khuyenmai_status->ViewValue = "Có khuyến mại";
						break;
					default:
						$products->khuyenmai_status->ViewValue = $products->khuyenmai_status->CurrentValue;
				}
			} else {
				$products->khuyenmai_status->ViewValue = NULL;
			}
			$products->khuyenmai_status->CssStyle = "";
			$products->khuyenmai_status->CssClass = "";
			$products->khuyenmai_status->ViewCustomAttributes = "";

			// km_date_begin
			$products->km_date_begin->ViewValue = $products->km_date_begin->CurrentValue;
			$products->km_date_begin->ViewValue = ew_FormatDateTime($products->km_date_begin->ViewValue, 7);
			$products->km_date_begin->CssStyle = "";
			$products->km_date_begin->CssClass = "";
			$products->km_date_begin->ViewCustomAttributes = "";

			// km_date_end
			$products->km_date_end->ViewValue = $products->km_date_end->CurrentValue;
			$products->km_date_end->ViewValue = ew_FormatDateTime($products->km_date_end->ViewValue, 7);
			$products->km_date_end->CssStyle = "";
			$products->km_date_end->CssClass = "";
			$products->km_date_end->ViewCustomAttributes = "";

			// anh_to
			if (!is_null($products->anh_to->Upload->DbValue)) {
				$products->anh_to->ViewValue = $products->anh_to->Upload->DbValue;
				$products->anh_to->ImageWidth = 300;
				$products->anh_to->ImageHeight = 0;
				$products->anh_to->ImageAlt = "";
			} else {
				$products->anh_to->ViewValue = "";
			}
			$products->anh_to->CssStyle = "";
			$products->anh_to->CssClass = "";
			$products->anh_to->ViewCustomAttributes = "";

			// anh_nho
			if (!is_null($products->anh_nho->Upload->DbValue)) {
				$products->anh_nho->ViewValue = $products->anh_nho->Upload->DbValue;
				$products->anh_nho->ImageWidth = 100;
				$products->anh_nho->ImageHeight = 0;
				$products->anh_nho->ImageAlt = "";
			} else {
				$products->anh_nho->ViewValue = "";
			}
			$products->anh_nho->CssStyle = "";
			$products->anh_nho->CssClass = "";
			$products->anh_nho->ViewCustomAttributes = "";

			// ten_sanpham
			$products->ten_sanpham->HrefValue = "";

			// nganhnghe_id
			$products->nganhnghe_id->HrefValue = "";

			// tg_themsanpham
			$products->tg_themsanpham->HrefValue = "";

			// so_lanxem
			$products->so_lanxem->HrefValue = "";

			// trang_thai
			$products->trang_thai->HrefValue = "";

			// xuatban
			$products->xuatban->HrefValue = "";

			// sanpham_tieubieu
			$products->sanpham_tieubieu->HrefValue = "";

			// don_gia
			$products->don_gia->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// khuyenmai_status
			$products->khuyenmai_status->HrefValue = "";

			// anh_to
			$products->anh_to->HrefValue = "";
		} elseif ($products->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// ten_sanpham
			$products->ten_sanpham->EditCustomAttributes = "";
			$products->ten_sanpham->EditValue = ew_HtmlEncode($products->ten_sanpham->AdvancedSearch->SearchValue);

			// nganhnghe_id
			$products->nganhnghe_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
		if (trim(strval($products->nganhnghe_id->CurrentValue)) == "") {
				$sWhereWrk = "nganhnghe_belongto=-1";
			} else {
				$sWhereWrk = "`nganhnghe_id` = " . ew_AdjustSql($products->nganhnghe_id->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$sSqlWrk1 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
			$sWhereWrk1 = "nganhnghe_belongto=0";
			if ($sWhereWrk1 <> "") $sSqlWrk1 .= " WHERE $sWhereWrk1";
			$rswrk1 = $conn->Execute($sSqlWrk1);
			while (!$rswrk1->EOF){
			array_push($arwrk, array($rswrk1->fields['nganhnghe_id'], "-".$rswrk1->fields['nganhnghe_ten']));			$sSqlWrk2 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
				$sWhereWrk2 = "nganhnghe_belongto=".$rswrk1->fields['nganhnghe_id'];
				if ($sWhereWrk2 <> "") $sSqlWrk2 .= " WHERE $sWhereWrk2";
			$rswrk2 = $conn->Execute($sSqlWrk2);
			while (!$rswrk2->EOF){
			array_push($arwrk, array($rswrk2->fields['nganhnghe_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+".$rswrk2->fields['nganhnghe_ten']));
				$rswrk2->MoveNext();
				}
				if ($rswrk2) $rswrk2->Close();
				$rswrk1->MoveNext();
						}

			array_unshift($arwrk, array("", "Chọn"));
			$products->nganhnghe_id->EditValue = $arwrk;

			// tg_themsanpham
			$products->tg_themsanpham->EditCustomAttributes = "";
			$products->tg_themsanpham->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($products->tg_themsanpham->AdvancedSearch->SearchValue, 7), 7));
			$products->tg_themsanpham->EditCustomAttributes = "";
			$products->tg_themsanpham->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($products->tg_themsanpham->AdvancedSearch->SearchValue2, 7), 7));

			// so_lanxem
			$products->so_lanxem->EditCustomAttributes = "";
			$products->so_lanxem->EditValue = ew_HtmlEncode($products->so_lanxem->AdvancedSearch->SearchValue);

			// trang_thai
			$products->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chưa kích hoạt");
			$arwrk[] = array("2", "Đã kích hoạt");
			array_unshift($arwrk, array("", "Chọn"));
			$products->trang_thai->EditValue = $arwrk;

			// xuatban
			$products->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$products->xuatban->EditValue = $arwrk;

			// sanpham_tieubieu
			$products->sanpham_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$products->sanpham_tieubieu->EditValue = $arwrk;

			// don_gia
			$products->don_gia->EditCustomAttributes = "";
			$products->don_gia->EditValue = ew_HtmlEncode($products->don_gia->AdvancedSearch->SearchValue);

			// soluong_tonkho
			$products->soluong_tonkho->EditCustomAttributes = "";
			$products->soluong_tonkho->EditValue = ew_HtmlEncode($products->soluong_tonkho->AdvancedSearch->SearchValue);

			// khuyenmai_status
			$products->khuyenmai_status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không khuyến mại");
			$arwrk[] = array("1", "Có khuyến mại");
			array_unshift($arwrk, array("", "Chọn"));
			$products->khuyenmai_status->EditValue = $arwrk;

			// anh_to
			$products->anh_to->EditCustomAttributes = "";
			if (!is_null($products->anh_to->Upload->DbValue)) {
				$products->anh_to->EditValue = $products->anh_to->Upload->DbValue;
				$products->anh_to->ImageWidth = 300;
				$products->anh_to->ImageHeight = 0;
				$products->anh_to->ImageAlt = "";
			} else {
				$products->anh_to->EditValue = "";
			}
		}

		// Call Row Rendered event
		$products->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $products;

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
		global $products;
		$products->nganhnghe_id->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_nganhnghe_id");
		$products->tg_themsanpham->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_tg_themsanpham");
		$products->tg_themsanpham->AdvancedSearch->SearchValue2 = $products->getAdvancedSearch("y_tg_themsanpham");
		$products->trang_thai->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_trang_thai");
		$products->xuatban->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_xuatban");
		$products->sanpham_tieubieu->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_sanpham_tieubieu");
		$products->khuyenmai_status->AdvancedSearch->SearchValue = $products->getAdvancedSearch("x_khuyenmai_status");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $products;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($products->nguoidung_id->CurrentValue);
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
