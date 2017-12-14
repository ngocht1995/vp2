<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_productinfo.php" ?>
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
$manager_product_list = new cmanager_product_list();
$Page =& $manager_product_list;

// Page init processing
$manager_product_list->Page_Init();

// Page main processing
$manager_product_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_product->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_list = new ew_Page("manager_product_list");

// page properties
manager_product_list.PageID = "list"; // page ID
var EW_PAGE_ID = manager_product_list.PageID; // for backward compatibility

// extend page with validate function for search
manager_product_list.ValidateSearch = function(fobj) {
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
manager_product_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($manager_product->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($manager_product->Export == "" && $manager_product->SelectLimit);
	if (!$bSelectLimit)
		$rs = $manager_product_list->LoadRecordset();
	$manager_product_list->lTotalRecs = ($bSelectLimit) ? $manager_product->SelectRecordCount() : $rs->RecordCount();
	$manager_product_list->lStartRec = 1;
	if ($manager_product_list->lDisplayRecs <= 0) // Display all records
		$manager_product_list->lDisplayRecs = $manager_product_list->lTotalRecs;
	if (!($manager_product->ExportAll && $manager_product->Export <> ""))
		$manager_product_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $manager_product_list->LoadRecordset($manager_product_list->lStartRec-1, $manager_product_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý xuất bản thông tin sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($manager_product->Export == "" && $manager_product->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(manager_product_list);" style="text-decoration: none;"><img id="manager_product_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="manager_product_list_SearchPanel">
<form name="fmanager_productlistsrch" id="fmanager_productlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return manager_product_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="manager_product">
<?php
if ($gsSearchError == "")
	$manager_product_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$manager_product->RowType = EW_ROWTYPE_SEARCH;

// Render row
$manager_product_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Ngành hàng</span></td>
		<td><input type="hidden" name="z_nganhnghe_id" id="z_nganhnghe_id" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_nganhnghe_id" name="x_nganhnghe_id"<?php echo $manager_product->nganhnghe_id->EditAttributes() ?>>
<?php
if (is_array($manager_product->nganhnghe_id->EditValue)) {
	$arwrk = $manager_product->nganhnghe_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_product->nganhnghe_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><input type="hidden" name="z_xuatban" id="z_xuatban" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_xuatban" name="x_xuatban"<?php echo $manager_product->xuatban->EditAttributes() ?>>
<?php
if (is_array($manager_product->xuatban->EditValue)) {
	$arwrk = $manager_product->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_product->xuatban->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><input type="hidden" name="z_sanpham_tieubieu" id="z_sanpham_tieubieu" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_sanpham_tieubieu" name="x_sanpham_tieubieu"<?php echo $manager_product->sanpham_tieubieu->EditAttributes() ?>>
<?php
if (is_array($manager_product->sanpham_tieubieu->EditValue)) {
	$arwrk = $manager_product->sanpham_tieubieu->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_product->sanpham_tieubieu->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($manager_product->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			 <input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $manager_product_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($manager_product->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($manager_product->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($manager_product->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $manager_product_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($manager_product->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($manager_product->CurrentAction <> "gridadd" && $manager_product->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_list->Pager)) $manager_product_list->Pager = new cNumericPager($manager_product_list->lStartRec, $manager_product_list->lDisplayRecs, $manager_product_list->lTotalRecs, $manager_product_list->lRecRange) ?>
<?php if ($manager_product_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các sản phẩm từ <?php echo $manager_product_list->Pager->FromIndex ?> đến <?php echo $manager_product_list->Pager->ToIndex ?> của <?php echo $manager_product_list->Pager->RecordCount ?> sản phẩm
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_list->sSrchWhere == "0=101") { ?>
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
<?php if ($manager_product_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_product">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_product_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_product_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_product_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_product->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($manager_product_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_productlist)) alert('Chưa chọn sản phẩm'); else {document.fmanager_productlist.action='manager_productdelete.php';document.fmanager_productlist.encoding='application/x-www-form-urlencoded';document.fmanager_productlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_productlist)) alert('Chưa chọn sản phẩm'); else {document.fmanager_productlist.action='manager_productupdate.php';document.fmanager_productlist.encoding='application/x-www-form-urlencoded';document.fmanager_productlist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fmanager_productlist" id="fmanager_productlist" class="ewForm" action="" method="post">
<?php if ($manager_product_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$manager_product_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$manager_product_list->lOptionCnt++; // view
}
if ($Security->AllowList('manager_product_pic')) {
	$manager_product_list->lOptionCnt++; // Detail
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$manager_product_list->lOptionCnt++; // Multi-select
}
	$manager_product_list->lOptionCnt += count($manager_product_list->ListOptions->Items); // Custom list options
?>
<?php echo $manager_product->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($manager_product->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->AllowList('manager_product_pic')) { ?>
<td style="white-space: nowrap;width: 30px;">Ảnh&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="manager_product_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_product_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($manager_product->ten_sanpham->Visible) { // ten_sanpham ?>
	<?php if ($manager_product->SortUrl($manager_product->ten_sanpham) == "") { ?>
		<td style="white-space: nowrap;">Ten Sanpham</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_product->SortUrl($manager_product->ten_sanpham) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tên sản phẩm</td><td style="width: 10px;"><?php if ($manager_product->ten_sanpham->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_product->ten_sanpham->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_product->ten_congty->Visible) { // ten_congty ?>
	<?php if ($manager_product->SortUrl($manager_product->ten_congty) == "") { ?>
		<td style="white-space: nowrap;">Ten Congty</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_product->SortUrl($manager_product->ten_congty) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tên công ty</td><td style="width: 10px;"><?php if ($manager_product->ten_congty->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_product->ten_congty->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_product->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<?php if ($manager_product->SortUrl($manager_product->nganhnghe_id) == "") { ?>
		<td style="white-space: nowrap;">Nganhnghe Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_product->SortUrl($manager_product->nganhnghe_id) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Ngành hàng</td><td style="width: 10px;"><?php if ($manager_product->nganhnghe_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_product->nganhnghe_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_product->xuatban->Visible) { // xuatban ?>
	<?php if ($manager_product->SortUrl($manager_product->xuatban) == "") { ?>
		<td style="white-space: nowrap;">Xuatban</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_product->SortUrl($manager_product->xuatban) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Xuất bản</td><td style="width: 10px;"><?php if ($manager_product->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_product->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_product->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
	<?php if ($manager_product->SortUrl($manager_product->sanpham_tieubieu) == "") { ?>
		<td>Sanpham Tieubieu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_product->SortUrl($manager_product->sanpham_tieubieu) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Sản phẩm tiêu biểu</td><td style="width: 10px;"><?php if ($manager_product->sanpham_tieubieu->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_product->sanpham_tieubieu->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
		
	</tr>
</thead>
<?php
if ($manager_product->ExportAll && $manager_product->Export <> "") {
	$manager_product_list->lStopRec = $manager_product_list->lTotalRecs;
} else {
	$manager_product_list->lStopRec = $manager_product_list->lStartRec + $manager_product_list->lDisplayRecs - 1; // Set the last record to display
}
$manager_product_list->lRecCount = $manager_product_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$manager_product->SelectLimit && $manager_product_list->lStartRec > 1)
		$rs->Move($manager_product_list->lStartRec - 1);
}
$manager_product_list->lRowCnt = 0;
while (($manager_product->CurrentAction == "gridadd" || !$rs->EOF) &&
	$manager_product_list->lRecCount < $manager_product_list->lStopRec) {
	$manager_product_list->lRecCount++;
	if (intval($manager_product_list->lRecCount) >= intval($manager_product_list->lStartRec)) {
		$manager_product_list->lRowCnt++;

	// Init row class and style
	$manager_product->CssClass = "";
	$manager_product->CssStyle = "";
	$manager_product->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($manager_product->CurrentAction == "gridadd") {
		$manager_product_list->LoadDefaultValues(); // Load default values
	} else {
		$manager_product_list->LoadRowValues($rs); // Load row values
	}
	$manager_product->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$manager_product_list->RenderRow();
?>
	<tr<?php echo $manager_product->RowAttributes() ?>>
<?php if ($manager_product->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $manager_product->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->AllowList('manager_product_pic')) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="manager_product_piclist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=manager_product&sanpham_id=<?php echo urlencode(strval($manager_product->sanpham_id->CurrentValue)) ?>">Ảnh sp</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($manager_product->sanpham_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_product_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($manager_product->ten_sanpham->Visible) { // ten_sanpham ?>
		<td width="200">
<div<?php echo $manager_product->ten_sanpham->ViewAttributes() ?>><?php echo $manager_product->ten_sanpham->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_product->ten_congty->Visible) { // ten_congty ?>
		<td width="200">
<div<?php echo $manager_product->ten_congty->ViewAttributes() ?>><?php echo $manager_product->ten_congty->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_product->nganhnghe_id->Visible) { // nganhnghe_id ?>
		<td width="200">
<div<?php echo $manager_product->nganhnghe_id->ViewAttributes() ?>><?php echo $manager_product->nganhnghe_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_product->xuatban->Visible) { // xuatban ?>
		<td<?php echo $manager_product->xuatban->CellAttributes() ?>>
<div<?php echo $manager_product->xuatban->ViewAttributes() ?>><?php echo $manager_product->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_product->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
		<td<?php echo $manager_product->sanpham_tieubieu->CellAttributes() ?>>
<div<?php echo $manager_product->sanpham_tieubieu->ViewAttributes() ?>><?php echo $manager_product->sanpham_tieubieu->ListViewValue() ?></div>
</td>
	<?php } ?>

	</tr>
<?php
	}
	if ($manager_product->CurrentAction <> "gridadd")
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
<?php if ($manager_product_list->lTotalRecs > 0) { ?>
<?php if ($manager_product->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($manager_product->CurrentAction <> "gridadd" && $manager_product->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_list->Pager)) $manager_product_list->Pager = new cNumericPager($manager_product_list->lStartRec, $manager_product_list->lDisplayRecs, $manager_product_list->lTotalRecs, $manager_product_list->lRecRange) ?>
<?php if ($manager_product_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_list->PageUrl() ?>start=<?php echo $manager_product_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các sản phẩm từ <?php echo $manager_product_list->Pager->FromIndex ?> đến <?php echo $manager_product_list->Pager->ToIndex ?> của <?php echo $manager_product_list->Pager->RecordCount ?> sản phẩm
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_list->sSrchWhere == "0=101") { ?>
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
<?php if ($manager_product_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_product">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_product_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_product_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_product_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_product->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($manager_product_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($manager_product_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_productlist)) alert('Chưa chọn sản phẩm'); else {document.fmanager_productlist.action='manager_productdelete.php';document.fmanager_productlist.encoding='application/x-www-form-urlencoded';document.fmanager_productlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_productlist)) alert('Chưa chọn sản phẩm'); else {document.fmanager_productlist.action='manager_productupdate.php';document.fmanager_productlist.encoding='application/x-www-form-urlencoded';document.fmanager_productlist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($manager_product->Export == "" && $manager_product->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(manager_product_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($manager_product->Export == "") { ?>
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
class cmanager_product_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'manager_product';

	// Page Object Name
	var $PageObjName = 'manager_product_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_product;
		if ($manager_product->UseTokenInUrl) $PageUrl .= "t=" . $manager_product->TableVar . "&"; // add page token
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
		global $objForm, $manager_product;
		if ($manager_product->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_product->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_product->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_product_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product"] = new cmanager_product();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_product', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_product;
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
	$manager_product->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $manager_product->Export; // Get export parameter, used in header
	$gsExportFile = $manager_product->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $manager_product;
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
		if ($manager_product->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $manager_product->getRecordsPerPage(); // Restore from Session
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
		$manager_product->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$manager_product->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$manager_product->setStartRecordNumber($this->lStartRec);
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
		$manager_product->setSessionWhere($sFilter);
		$manager_product->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $manager_product;
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
			$manager_product->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$manager_product->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $manager_product;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $manager_product->ten_sanpham, FALSE); // Field ten_sanpham
		$this->BuildSearchSql($sWhere, $manager_product->ten_congty, FALSE); // Field ten_congty
		$this->BuildSearchSql($sWhere, $manager_product->ma_sanpham, FALSE); // Field ma_sanpham
		$this->BuildSearchSql($sWhere, $manager_product->nganhnghe_id, FALSE); // Field nganhnghe_id
		$this->BuildSearchSql($sWhere, $manager_product->xuatban, FALSE); // Field xuatban
		$this->BuildSearchSql($sWhere, $manager_product->chung_nhan, FALSE); // Field chung_nhan
		$this->BuildSearchSql($sWhere, $manager_product->nhan_hieu, FALSE); // Field nhan_hieu
		$this->BuildSearchSql($sWhere, $manager_product->xuat_su, FALSE); // Field xuat_su
		$this->BuildSearchSql($sWhere, $manager_product->tomtat_sanpham, FALSE); // Field tomtat_sanpham
		$this->BuildSearchSql($sWhere, $manager_product->noidung_sanpham, FALSE); // Field noidung_sanpham
		$this->BuildSearchSql($sWhere, $manager_product->loai_tien, FALSE); // Field loai_tien
		$this->BuildSearchSql($sWhere, $manager_product->donvi_tinh, FALSE); // Field donvi_tinh
		$this->BuildSearchSql($sWhere, $manager_product->gia_xuatcang, FALSE); // Field gia_xuatcang
		$this->BuildSearchSql($sWhere, $manager_product->phuongthuc_ttoan, TRUE); // Field phuongthuc_ttoan
		$this->BuildSearchSql($sWhere, $manager_product->thoihan_giaohang, FALSE); // Field thoihan_giaohang
		$this->BuildSearchSql($sWhere, $manager_product->soluong_tonkho, FALSE); // Field soluong_tonkho
		$this->BuildSearchSql($sWhere, $manager_product->khanang_cungcap, FALSE); // Field khanang_cungcap
		$this->BuildSearchSql($sWhere, $manager_product->tg_themsanpham, FALSE); // Field tg_themsanpham
		$this->BuildSearchSql($sWhere, $manager_product->tg_suasanpham, FALSE); // Field tg_suasanpham
		$this->BuildSearchSql($sWhere, $manager_product->so_lanxem, FALSE); // Field so_lanxem
		$this->BuildSearchSql($sWhere, $manager_product->trang_thai, FALSE); // Field trang_thai
		$this->BuildSearchSql($sWhere, $manager_product->hoten_nguoilienhe, FALSE); // Field hoten_nguoilienhe
		$this->BuildSearchSql($sWhere, $manager_product->sanpham_id, FALSE); // Field sanpham_id
		$this->BuildSearchSql($sWhere, $manager_product->sanpham_tieubieu, FALSE); // Field sanpham_tieubieu
		

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($manager_product->ten_sanpham); // Field ten_sanpham
			$this->SetSearchParm($manager_product->ten_congty); // Field ten_congty
			$this->SetSearchParm($manager_product->ma_sanpham); // Field ma_sanpham
			$this->SetSearchParm($manager_product->nganhnghe_id); // Field nganhnghe_id
			$this->SetSearchParm($manager_product->xuatban); // Field xuatban
			$this->SetSearchParm($manager_product->chung_nhan); // Field chung_nhan
			$this->SetSearchParm($manager_product->nhan_hieu); // Field nhan_hieu
			$this->SetSearchParm($manager_product->xuat_su); // Field xuat_su
			$this->SetSearchParm($manager_product->tomtat_sanpham); // Field tomtat_sanpham
			$this->SetSearchParm($manager_product->noidung_sanpham); // Field noidung_sanpham
			$this->SetSearchParm($manager_product->loai_tien); // Field loai_tien
			$this->SetSearchParm($manager_product->donvi_tinh); // Field donvi_tinh
			$this->SetSearchParm($manager_product->gia_xuatcang); // Field gia_xuatcang
			$this->SetSearchParm($manager_product->phuongthuc_ttoan); // Field phuongthuc_ttoan
			$this->SetSearchParm($manager_product->thoihan_giaohang); // Field thoihan_giaohang
			$this->SetSearchParm($manager_product->soluong_tonkho); // Field soluong_tonkho
			$this->SetSearchParm($manager_product->khanang_cungcap); // Field khanang_cungcap
			$this->SetSearchParm($manager_product->tg_themsanpham); // Field tg_themsanpham
			$this->SetSearchParm($manager_product->tg_suasanpham); // Field tg_suasanpham
			$this->SetSearchParm($manager_product->so_lanxem); // Field so_lanxem
			$this->SetSearchParm($manager_product->trang_thai); // Field trang_thai
			$this->SetSearchParm($manager_product->hoten_nguoilienhe); // Field hoten_nguoilienhe
			$this->SetSearchParm($manager_product->sanpham_id); // Field sanpham_id
			$this->SetSearchParm($manager_product->sanpham_tieubieu); // Field sanpham_tieubieu
			
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
		global $manager_product;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$manager_product->setAdvancedSearch("x_$FldParm", $FldVal);
		$manager_product->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$manager_product->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$manager_product->setAdvancedSearch("y_$FldParm", $FldVal2);
		$manager_product->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $manager_product;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $manager_product->ten_sanpham->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $manager_product->ten_congty->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $manager_product;
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
			$manager_product->setBasicSearchKeyword($sSearchKeyword);
			$manager_product->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $manager_product;
		$this->sSrchWhere = "";
		$manager_product->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $manager_product;
		$manager_product->setBasicSearchKeyword("");
		$manager_product->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $manager_product;
		$manager_product->setAdvancedSearch("x_ten_sanpham", "");
		$manager_product->setAdvancedSearch("x_ten_congty", "");
		$manager_product->setAdvancedSearch("x_ma_sanpham", "");
		$manager_product->setAdvancedSearch("x_nganhnghe_id", "");
		$manager_product->setAdvancedSearch("x_xuatban", "");
		$manager_product->setAdvancedSearch("x_chung_nhan", "");
		$manager_product->setAdvancedSearch("x_nhan_hieu", "");
		$manager_product->setAdvancedSearch("x_xuat_su", "");
		$manager_product->setAdvancedSearch("x_tomtat_sanpham", "");
		$manager_product->setAdvancedSearch("x_noidung_sanpham", "");
		$manager_product->setAdvancedSearch("x_loai_tien", "");
		$manager_product->setAdvancedSearch("x_donvi_tinh", "");
		$manager_product->setAdvancedSearch("x_gia_xuatcang", "");
		$manager_product->setAdvancedSearch("x_phuongthuc_ttoan", "");
		$manager_product->setAdvancedSearch("x_thoihan_giaohang", "");
		$manager_product->setAdvancedSearch("x_soluong_tonkho", "");
		$manager_product->setAdvancedSearch("x_khanang_cungcap", "");
		$manager_product->setAdvancedSearch("x_tg_themsanpham", "");
		$manager_product->setAdvancedSearch("x_tg_suasanpham", "");
		$manager_product->setAdvancedSearch("x_so_lanxem", "");
		$manager_product->setAdvancedSearch("x_trang_thai", "");
		$manager_product->setAdvancedSearch("x_hoten_nguoilienhe", "");
		$manager_product->setAdvancedSearch("x_sanpham_id", "");
		$manager_product->setAdvancedSearch("x_sanpham_tieubieu", "");
		
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $manager_product;
		$this->sSrchWhere = $manager_product->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $manager_product;
		 $manager_product->ten_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_ten_sanpham");
		 $manager_product->ten_congty->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_ten_congty");
		 $manager_product->ma_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_ma_sanpham");
		
		 $manager_product->nganhnghe_id->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_nganhnghe_id");
		 $manager_product->xuatban->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_xuatban");
		 $manager_product->chung_nhan->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_chung_nhan");
		 $manager_product->nhan_hieu->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_nhan_hieu");
		 $manager_product->xuat_su->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_xuat_su");
		 $manager_product->tomtat_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_tomtat_sanpham");
		 $manager_product->noidung_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_noidung_sanpham");
		 $manager_product->loai_tien->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_loai_tien");
		 $manager_product->donvi_tinh->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_donvi_tinh");
		 $manager_product->gia_xuatcang->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_gia_xuatcang");
		 $manager_product->phuongthuc_ttoan->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_phuongthuc_ttoan");
		 $manager_product->thoihan_giaohang->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_thoihan_giaohang");
		 $manager_product->soluong_tonkho->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_soluong_tonkho");
		 $manager_product->khanang_cungcap->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_khanang_cungcap");
		 $manager_product->tg_themsanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_tg_themsanpham");
		 $manager_product->tg_suasanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_tg_suasanpham");
		 $manager_product->so_lanxem->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_so_lanxem");
		 $manager_product->trang_thai->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_trang_thai");
		 $manager_product->hoten_nguoilienhe->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_hoten_nguoilienhe");
		 $manager_product->sanpham_id->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_sanpham_id");
		 $manager_product->sanpham_tieubieu->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_sanpham_tieubieu");
		
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $manager_product;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$manager_product->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$manager_product->CurrentOrderType = @$_GET["ordertype"];
			$manager_product->UpdateSort($manager_product->ten_sanpham); // Field
			$manager_product->UpdateSort($manager_product->ten_congty); // Field
			$manager_product->UpdateSort($manager_product->nganhnghe_id); // Field
			$manager_product->UpdateSort($manager_product->xuatban); // Field
			$manager_product->UpdateSort($manager_product->sanpham_tieubieu); // Field
			
			$manager_product->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $manager_product;
		$sOrderBy = $manager_product->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($manager_product->SqlOrderBy() <> "") {
				$sOrderBy = $manager_product->SqlOrderBy();
				$manager_product->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $manager_product;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$manager_product->setSessionOrderBy($sOrderBy);
				$manager_product->ten_sanpham->setSort("");
				$manager_product->ten_congty->setSort("");
				$manager_product->nganhnghe_id->setSort("");
				$manager_product->xuatban->setSort("");
				$manager_product->sanpham_tieubieu->setSort("");
				
			}

			// Reset start position
			$this->lStartRec = 1;
			$manager_product->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_product;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_product->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_product->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_product->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_product->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_product->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_product->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $manager_product;

		// Load search values
		// ten_sanpham

		$manager_product->ten_sanpham->AdvancedSearch->SearchValue = @$_GET["x_ten_sanpham"];
		$manager_product->ten_sanpham->AdvancedSearch->SearchOperator = @$_GET["z_ten_sanpham"];

		// ten_congty
		$manager_product->ten_congty->AdvancedSearch->SearchValue = @$_GET["x_ten_congty"];
		$manager_product->ten_congty->AdvancedSearch->SearchOperator = @$_GET["z_ten_congty"];

		// ma_sanpham
		$manager_product->ma_sanpham->AdvancedSearch->SearchValue = @$_GET["x_ma_sanpham"];
		$manager_product->ma_sanpham->AdvancedSearch->SearchOperator = @$_GET["z_ma_sanpham"];

		

		// nganhnghe_id
		$manager_product->nganhnghe_id->AdvancedSearch->SearchValue = @$_GET["x_nganhnghe_id"];
		$manager_product->nganhnghe_id->AdvancedSearch->SearchOperator = @$_GET["z_nganhnghe_id"];

		// xuatban
		$manager_product->xuatban->AdvancedSearch->SearchValue = @$_GET["x_xuatban"];
		$manager_product->xuatban->AdvancedSearch->SearchOperator = @$_GET["z_xuatban"];

		// chung_nhan
		$manager_product->chung_nhan->AdvancedSearch->SearchValue = @$_GET["x_chung_nhan"];
		$manager_product->chung_nhan->AdvancedSearch->SearchOperator = @$_GET["z_chung_nhan"];

		// nhan_hieu
		$manager_product->nhan_hieu->AdvancedSearch->SearchValue = @$_GET["x_nhan_hieu"];
		$manager_product->nhan_hieu->AdvancedSearch->SearchOperator = @$_GET["z_nhan_hieu"];

		// xuat_su
		$manager_product->xuat_su->AdvancedSearch->SearchValue = @$_GET["x_xuat_su"];
		$manager_product->xuat_su->AdvancedSearch->SearchOperator = @$_GET["z_xuat_su"];

		// tomtat_sanpham
		$manager_product->tomtat_sanpham->AdvancedSearch->SearchValue = @$_GET["x_tomtat_sanpham"];
		$manager_product->tomtat_sanpham->AdvancedSearch->SearchOperator = @$_GET["z_tomtat_sanpham"];

		// noidung_sanpham
		$manager_product->noidung_sanpham->AdvancedSearch->SearchValue = @$_GET["x_noidung_sanpham"];
		$manager_product->noidung_sanpham->AdvancedSearch->SearchOperator = @$_GET["z_noidung_sanpham"];

		// loai_tien
		$manager_product->loai_tien->AdvancedSearch->SearchValue = @$_GET["x_loai_tien"];
		$manager_product->loai_tien->AdvancedSearch->SearchOperator = @$_GET["z_loai_tien"];

		// donvi_tinh
		$manager_product->donvi_tinh->AdvancedSearch->SearchValue = @$_GET["x_donvi_tinh"];
		$manager_product->donvi_tinh->AdvancedSearch->SearchOperator = @$_GET["z_donvi_tinh"];

		// gia_xuatcang
		$manager_product->gia_xuatcang->AdvancedSearch->SearchValue = @$_GET["x_gia_xuatcang"];
		$manager_product->gia_xuatcang->AdvancedSearch->SearchOperator = @$_GET["z_gia_xuatcang"];

		// phuongthuc_ttoan
		$manager_product->phuongthuc_ttoan->AdvancedSearch->SearchValue = @$_GET["x_phuongthuc_ttoan"];
		$manager_product->phuongthuc_ttoan->AdvancedSearch->SearchOperator = @$_GET["z_phuongthuc_ttoan"];

		// thoihan_giaohang
		$manager_product->thoihan_giaohang->AdvancedSearch->SearchValue = @$_GET["x_thoihan_giaohang"];
		$manager_product->thoihan_giaohang->AdvancedSearch->SearchOperator = @$_GET["z_thoihan_giaohang"];

		// soluong_tonkho
		$manager_product->soluong_tonkho->AdvancedSearch->SearchValue = @$_GET["x_soluong_tonkho"];
		$manager_product->soluong_tonkho->AdvancedSearch->SearchOperator = @$_GET["z_soluong_tonkho"];

		// khanang_cungcap
		$manager_product->khanang_cungcap->AdvancedSearch->SearchValue = @$_GET["x_khanang_cungcap"];
		$manager_product->khanang_cungcap->AdvancedSearch->SearchOperator = @$_GET["z_khanang_cungcap"];

		// tg_themsanpham
		$manager_product->tg_themsanpham->AdvancedSearch->SearchValue = @$_GET["x_tg_themsanpham"];
		$manager_product->tg_themsanpham->AdvancedSearch->SearchOperator = @$_GET["z_tg_themsanpham"];

		// tg_suasanpham
		$manager_product->tg_suasanpham->AdvancedSearch->SearchValue = @$_GET["x_tg_suasanpham"];
		$manager_product->tg_suasanpham->AdvancedSearch->SearchOperator = @$_GET["z_tg_suasanpham"];

		// so_lanxem
		$manager_product->so_lanxem->AdvancedSearch->SearchValue = @$_GET["x_so_lanxem"];
		$manager_product->so_lanxem->AdvancedSearch->SearchOperator = @$_GET["z_so_lanxem"];

		// trang_thai
		$manager_product->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$manager_product->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];

		// hoten_nguoilienhe
		$manager_product->hoten_nguoilienhe->AdvancedSearch->SearchValue = @$_GET["x_hoten_nguoilienhe"];
		$manager_product->hoten_nguoilienhe->AdvancedSearch->SearchOperator = @$_GET["z_hoten_nguoilienhe"];


		// sanpham_id
		$manager_product->sanpham_id->AdvancedSearch->SearchValue = @$_GET["x_sanpham_id"];
		$manager_product->sanpham_id->AdvancedSearch->SearchOperator = @$_GET["z_sanpham_id"];

		// sanpham_tieubieu
		$manager_product->sanpham_tieubieu->AdvancedSearch->SearchValue = @$_GET["x_sanpham_tieubieu"];
		$manager_product->sanpham_tieubieu->AdvancedSearch->SearchOperator = @$_GET["z_sanpham_tieubieu"];

		
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_product;

		// Call Recordset Selecting event
		$manager_product->Recordset_Selecting($manager_product->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_product->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_product->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_product;
		$sFilter = $manager_product->KeyFilter();

		// Call Row Selecting event
		$manager_product->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_product->CurrentFilter = $sFilter;
		$sSql = $manager_product->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_product->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_product;
		$manager_product->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
		$manager_product->ten_congty->setDbValue($rs->fields('ten_congty'));
		$manager_product->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));
		
		$manager_product->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$manager_product->xuatban->setDbValue($rs->fields('xuatban'));
		$manager_product->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$manager_product->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$manager_product->xuat_su->setDbValue($rs->fields('xuat_su'));
		$manager_product->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$manager_product->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$manager_product->loai_tien->setDbValue($rs->fields('loai_tien'));
		$manager_product->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$manager_product->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$manager_product->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$manager_product->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$manager_product->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$manager_product->khanang_cungcap->setDbValue($rs->fields('khanang_cungcap'));
		$manager_product->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$manager_product->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$manager_product->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$manager_product->trang_thai->setDbValue($rs->fields('trang_thai'));
		$manager_product->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$manager_product->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$manager_product->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
		
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product;

		// Call Row_Rendering event
		$manager_product->Row_Rendering();

		// Common render codes for all row types
		// ten_sanpham

		$manager_product->ten_sanpham->CellCssStyle = "white-space: nowrap;";
		$manager_product->ten_sanpham->CellCssClass = "";

		// ten_congty
		$manager_product->ten_congty->CellCssStyle = "white-space: nowrap;";
		$manager_product->ten_congty->CellCssClass = "";

		// nganhnghe_id
		$manager_product->nganhnghe_id->CellCssStyle = "white-space: nowrap;";
		$manager_product->nganhnghe_id->CellCssClass = "";

		// xuatban
		$manager_product->xuatban->CellCssStyle = "white-space: nowrap;";
		$manager_product->xuatban->CellCssClass = "";

		// sanpham_tieubieu
		$manager_product->sanpham_tieubieu->CellCssStyle = "";
		$manager_product->sanpham_tieubieu->CellCssClass = "";

		
		if ($manager_product->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_sanpham
			$manager_product->ten_sanpham->ViewValue = $manager_product->ten_sanpham->CurrentValue;
			$manager_product->ten_sanpham->CssStyle = "";
			$manager_product->ten_sanpham->CssClass = "";
			$manager_product->ten_sanpham->ViewCustomAttributes = "";

			// ten_congty
			$manager_product->ten_congty->ViewValue = $manager_product->ten_congty->CurrentValue;
			$manager_product->ten_congty->CssStyle = "";
			$manager_product->ten_congty->CssClass = "";
			$manager_product->ten_congty->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($manager_product->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($manager_product->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$manager_product->nganhnghe_id->ViewValue = $manager_product->nganhnghe_id->CurrentValue;
				}
			} else {
				$manager_product->nganhnghe_id->ViewValue = NULL;
			}
			$manager_product->nganhnghe_id->CssStyle = "";
			$manager_product->nganhnghe_id->CssClass = "";
			$manager_product->nganhnghe_id->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_product->xuatban->CurrentValue) <> "") {
				switch ($manager_product->xuatban->CurrentValue) {
					case "0":
						$manager_product->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$manager_product->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_product->xuatban->ViewValue = $manager_product->xuatban->CurrentValue;
				}
			} else {
				$manager_product->xuatban->ViewValue = NULL;
			}
			$manager_product->xuatban->CssStyle = "";
			$manager_product->xuatban->CssClass = "";
			$manager_product->xuatban->ViewCustomAttributes = "";

			// sanpham_tieubieu
			if (strval($manager_product->sanpham_tieubieu->CurrentValue) <> "") {
				switch ($manager_product->sanpham_tieubieu->CurrentValue) {
					case "0":
						$manager_product->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$manager_product->sanpham_tieubieu->ViewValue = "<font color=\"#FF0000\">Tiêu biểu</font>";
						break;
					default:
						$manager_product->sanpham_tieubieu->ViewValue = $manager_product->sanpham_tieubieu->CurrentValue;
				}
			} else {
				$manager_product->sanpham_tieubieu->ViewValue = NULL;
			}
			$manager_product->sanpham_tieubieu->CssStyle = "";
			$manager_product->sanpham_tieubieu->CssClass = "";
			$manager_product->sanpham_tieubieu->ViewCustomAttributes = "";

			

			// ten_sanpham
			$manager_product->ten_sanpham->HrefValue = "";

			// ten_congty
			$manager_product->ten_congty->HrefValue = "";

			// nganhnghe_id
			$manager_product->nganhnghe_id->HrefValue = "";

			// xuatban
			$manager_product->xuatban->HrefValue = "";

			// sanpham_tieubieu
			$manager_product->sanpham_tieubieu->HrefValue = "";

			
		} elseif ($manager_product->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// ten_sanpham
			$manager_product->ten_sanpham->EditCustomAttributes = "";
			$manager_product->ten_sanpham->EditValue = ew_HtmlEncode($manager_product->ten_sanpham->AdvancedSearch->SearchValue);

			// ten_congty
			$manager_product->ten_congty->EditCustomAttributes = "";
			$manager_product->ten_congty->EditValue = ew_HtmlEncode($manager_product->ten_congty->AdvancedSearch->SearchValue);

			// nganhnghe_id
			$manager_product->nganhnghe_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
		if (trim(strval($offer->nganhnghe_id->CurrentValue)) == "") {
				$sWhereWrk = "nganhnghe_belongto=-1";
			} else {
				$sWhereWrk = "`nganhnghe_id` = " . ew_AdjustSql($offer->nganhnghe_id->CurrentValue) . "";
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
			$manager_product->nganhnghe_id->EditValue = $arwrk;

			// xuatban
			$manager_product->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_product->xuatban->EditValue = $arwrk;

			// sanpham_tieubieu
			$manager_product->sanpham_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_product->sanpham_tieubieu->EditValue = $arwrk;

			
		}

		// Call Row Rendered event
		$manager_product->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $manager_product;

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
		global $manager_product;
		$manager_product->ten_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_ten_sanpham");
		$manager_product->ten_congty->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_ten_congty");
		$manager_product->ma_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_ma_sanpham");
		
		$manager_product->nganhnghe_id->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_nganhnghe_id");
		$manager_product->xuatban->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_xuatban");
		$manager_product->chung_nhan->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_chung_nhan");
		$manager_product->nhan_hieu->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_nhan_hieu");
		$manager_product->xuat_su->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_xuat_su");
		$manager_product->tomtat_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_tomtat_sanpham");
		$manager_product->noidung_sanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_noidung_sanpham");
		$manager_product->loai_tien->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_loai_tien");
		$manager_product->donvi_tinh->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_donvi_tinh");
		$manager_product->gia_xuatcang->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_gia_xuatcang");
		$manager_product->phuongthuc_ttoan->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_phuongthuc_ttoan");
		$manager_product->thoihan_giaohang->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_thoihan_giaohang");
		$manager_product->soluong_tonkho->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_soluong_tonkho");
		$manager_product->khanang_cungcap->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_khanang_cungcap");
		$manager_product->tg_themsanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_tg_themsanpham");
		$manager_product->tg_suasanpham->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_tg_suasanpham");
		$manager_product->so_lanxem->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_so_lanxem");
		$manager_product->trang_thai->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_trang_thai");
		$manager_product->hoten_nguoilienhe->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_hoten_nguoilienhe");
		$manager_product->sanpham_id->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_sanpham_id");
		$manager_product->sanpham_tieubieu->AdvancedSearch->SearchValue = $manager_product->getAdvancedSearch("x_sanpham_tieubieu");
		
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
