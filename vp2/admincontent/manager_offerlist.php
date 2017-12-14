<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_offerinfo.php" ?>
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
$manager_offer_list = new cmanager_offer_list();
$Page =& $manager_offer_list;

// Page init processing
$manager_offer_list->Page_Init();

// Page main processing
$manager_offer_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_offer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_offer_list = new ew_Page("manager_offer_list");

// page properties
manager_offer_list.PageID = "list"; // page ID
var EW_PAGE_ID = manager_offer_list.PageID; // for backward compatibility

// extend page with validate function for search
manager_offer_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_thoihan_tungay"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Thoihan Tungay");
	elm = fobj.elements["x" + infix + "_thoihan_denngay"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Thoihan Denngay");

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
manager_offer_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_offer_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_offer_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_offer_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($manager_offer->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($manager_offer->Export == "" && $manager_offer->SelectLimit);
	if (!$bSelectLimit)
		$rs = $manager_offer_list->LoadRecordset();
	$manager_offer_list->lTotalRecs = ($bSelectLimit) ? $manager_offer->SelectRecordCount() : $rs->RecordCount();
	$manager_offer_list->lStartRec = 1;
	if ($manager_offer_list->lDisplayRecs <= 0) // Display all records
		$manager_offer_list->lDisplayRecs = $manager_offer_list->lTotalRecs;
	if (!($manager_offer->ExportAll && $manager_offer->Export <> ""))
		$manager_offer_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $manager_offer_list->LoadRecordset($manager_offer_list->lStartRec-1, $manager_offer_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý xuất bản chào hàng </font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" valign="top" >
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($manager_offer->Export == "" && $manager_offer->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(manager_offer_list);" style="text-decoration: none;"><img id="manager_offer_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="manager_offer_list_SearchPanel">
<form name="fmanager_offerlistsrch" id="fmanager_offerlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return manager_offer_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="manager_offer">
<?php
if ($gsSearchError == "")
	$manager_offer_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$manager_offer->RowType = EW_ROWTYPE_SEARCH;

// Render row
$manager_offer_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Kiểu chào hàng</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_kieu_chaohang" id="z_kieu_chaohang" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_kieu_chaohang" name="x_kieu_chaohang"<?php echo $manager_offer->kieu_chaohang->EditAttributes() ?>>
<?php
if (is_array($manager_offer->kieu_chaohang->EditValue)) {
	$arwrk = $manager_offer->kieu_chaohang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_offer->kieu_chaohang->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Ngành nghề</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_nganhnghe_id" id="z_nganhnghe_id" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_nganhnghe_id" name="x_nganhnghe_id"<?php echo $manager_offer->nganhnghe_id->EditAttributes() ?>>
<?php
if (is_array($manager_offer->nganhnghe_id->EditValue)) {
	$arwrk = $manager_offer->nganhnghe_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_offer->nganhnghe_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Thời hạn từ ngày</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_thoihan_tungay" id="z_thoihan_tungay" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoihan_tungay" id="x_thoihan_tungay" value="<?php echo $manager_offer->thoihan_tungay->EditValue ?>"<?php echo $manager_offer->thoihan_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoihan_tungay" name="cal_x_thoihan_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoihan_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoihan_tungay" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_thoihan_tungay" name="btw1_thoihan_tungay">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_thoihan_tungay" name="btw1_thoihan_tungay">
<input type="text" name="y_thoihan_tungay" id="y_thoihan_tungay" value="<?php echo $manager_offer->thoihan_tungay->EditValue2 ?>"<?php echo $manager_offer->thoihan_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_thoihan_tungay" name="cal_y_thoihan_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_thoihan_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_thoihan_tungay" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Thời hạn đến ngày</span></td>
		<td><input type="hidden" name="z_thoihan_denngay" id="z_thoihan_denngay" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoihan_denngay" id="x_thoihan_denngay" value="<?php echo $manager_offer->thoihan_denngay->EditValue ?>"<?php echo $manager_offer->thoihan_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoihan_denngay" name="cal_x_thoihan_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoihan_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoihan_denngay" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_thoihan_denngay" name="btw1_thoihan_denngay">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_thoihan_denngay" name="btw1_thoihan_denngay">
<input type="text" name="y_thoihan_denngay" id="y_thoihan_denngay" value="<?php echo $manager_offer->thoihan_denngay->EditValue2 ?>"<?php echo $manager_offer->thoihan_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_thoihan_denngay" name="cal_y_thoihan_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_thoihan_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_thoihan_denngay" // ID of the button
});
</script>
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
<select id="x_xuatban" name="x_xuatban"<?php echo $manager_offer->xuatban->EditAttributes() ?>>
<?php
if (is_array($manager_offer->xuatban->EditValue)) {
	$arwrk = $manager_offer->xuatban->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($manager_offer->xuatban->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($manager_offer->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $manager_offer_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($manager_offer->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($manager_offer->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($manager_offer->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $manager_offer_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($manager_offer->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($manager_offer->CurrentAction <> "gridadd" && $manager_offer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_offer_list->Pager)) $manager_offer_list->Pager = new cNumericPager($manager_offer_list->lStartRec, $manager_offer_list->lDisplayRecs, $manager_offer_list->lTotalRecs, $manager_offer_list->lRecRange) ?>
<?php if ($manager_offer_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_offer_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_offer_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các chào hàng từ <?php echo $manager_offer_list->Pager->FromIndex ?> đến <?php echo $manager_offer_list->Pager->ToIndex ?> của <?php echo $manager_offer_list->Pager->RecordCount ?> chào hàng
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_offer_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có chào hàng
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($manager_offer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_offer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_offer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_offer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_offer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_offer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($manager_offer_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_offerlist)) alert('Chưa chọn chào hàng'); else {document.fmanager_offerlist.action='manager_offerdelete.php';document.fmanager_offerlist.encoding='application/x-www-form-urlencoded';document.fmanager_offerlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_offerlist)) alert('Chưa chọn chào hàng'); else {document.fmanager_offerlist.action='manager_offerupdate.php';document.fmanager_offerlist.encoding='application/x-www-form-urlencoded';document.fmanager_offerlist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fmanager_offerlist" id="fmanager_offerlist" class="ewForm" action="" method="post">
<?php if ($manager_offer_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$manager_offer_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$manager_offer_list->lOptionCnt++; // view
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$manager_offer_list->lOptionCnt++; // Multi-select
}
	$manager_offer_list->lOptionCnt += count($manager_offer_list->ListOptions->Items); // Custom list options
?>
<?php echo $manager_offer->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($manager_offer->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="manager_offer_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_offer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($manager_offer->nguoidung_id->Visible) { // nguoidung_id ?>
	<?php if ($manager_offer->SortUrl($manager_offer->nguoidung_id) == "") { ?>
		<td>Tên thành viên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->nguoidung_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên thành viên</td><td style="width: 10px;"><?php if ($manager_offer->nguoidung_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->nguoidung_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->anh_chaohang->Visible) { // anh_chaohang ?>
	<?php if ($manager_offer->SortUrl($manager_offer->anh_chaohang) == "") { ?>
		<td>Ảnh</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->anh_chaohang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ảnh</td><td style="width: 10px;"><?php if ($manager_offer->anh_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->anh_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<?php if ($manager_offer->SortUrl($manager_offer->kieu_chaohang) == "") { ?>
		<td>Kiểu chào hàng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->kieu_chaohang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Kiểu chào hàng</td><td style="width: 10px;"><?php if ($manager_offer->kieu_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->kieu_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<?php if ($manager_offer->SortUrl($manager_offer->tieude_chaohang) == "") { ?>
		<td>Tiêu đề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->tieude_chaohang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề&nbsp;(*)</td><td style="width: 10px;"><?php if ($manager_offer->tieude_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->tieude_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<?php if ($manager_offer->SortUrl($manager_offer->nganhnghe_id) == "") { ?>
		<td>Ngành nghề</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->nganhnghe_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngành nghề</td><td style="width: 10px;"><?php if ($manager_offer->nganhnghe_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->nganhnghe_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
	<?php if ($manager_offer->SortUrl($manager_offer->thoihan_tungay) == "") { ?>
		<td>Thời hạn từ ngày</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->thoihan_tungay) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời hạn từ ngày</td><td style="width: 10px;"><?php if ($manager_offer->thoihan_tungay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->thoihan_tungay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
	<?php if ($manager_offer->SortUrl($manager_offer->thoihan_denngay) == "") { ?>
		<td>Thời hạn đến ngày</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->thoihan_denngay) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời hạn đến ngày</td><td style="width: 10px;"><?php if ($manager_offer->thoihan_denngay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->thoihan_denngay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->xuatban->Visible) { // xuatban ?>
	<?php if ($manager_offer->SortUrl($manager_offer->xuatban) == "") { ?>
		<td>Xuất bản</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->xuatban) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($manager_offer->xuatban->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->xuatban->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($manager_offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
	<?php if ($manager_offer->SortUrl($manager_offer->chaohang_tieubieu) == "") { ?>
		<td>Chào hàng tiêu biểu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_offer->SortUrl($manager_offer->chaohang_tieubieu) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Chào hàng tiêu biểu</td><td style="width: 10px;"><?php if ($manager_offer->chaohang_tieubieu->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_offer->chaohang_tieubieu->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($manager_offer->ExportAll && $manager_offer->Export <> "") {
	$manager_offer_list->lStopRec = $manager_offer_list->lTotalRecs;
} else {
	$manager_offer_list->lStopRec = $manager_offer_list->lStartRec + $manager_offer_list->lDisplayRecs - 1; // Set the last record to display
}
$manager_offer_list->lRecCount = $manager_offer_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$manager_offer->SelectLimit && $manager_offer_list->lStartRec > 1)
		$rs->Move($manager_offer_list->lStartRec - 1);
}
$manager_offer_list->lRowCnt = 0;
while (($manager_offer->CurrentAction == "gridadd" || !$rs->EOF) &&
	$manager_offer_list->lRecCount < $manager_offer_list->lStopRec) {
	$manager_offer_list->lRecCount++;
	if (intval($manager_offer_list->lRecCount) >= intval($manager_offer_list->lStartRec)) {
		$manager_offer_list->lRowCnt++;

	// Init row class and style
	$manager_offer->CssClass = "";
	$manager_offer->CssStyle = "";
	$manager_offer->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($manager_offer->CurrentAction == "gridadd") {
		$manager_offer_list->LoadDefaultValues(); // Load default values
	} else {
		$manager_offer_list->LoadRowValues($rs); // Load row values
	}
	$manager_offer->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$manager_offer_list->RenderRow();
?>
	<tr<?php echo $manager_offer->RowAttributes() ?>>
<?php if ($manager_offer->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $manager_offer->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($manager_offer->chaohang_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_offer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($manager_offer->nguoidung_id->Visible) { // nguoidung_id ?>
		<td<?php echo $manager_offer->nguoidung_id->CellAttributes() ?>>
<div<?php echo $manager_offer->nguoidung_id->ViewAttributes() ?>><?php echo $manager_offer->nguoidung_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->anh_chaohang->Visible) { // anh_chaohang ?>
		<td<?php echo $manager_offer->anh_chaohang->CellAttributes() ?>>
<?php if ($manager_offer->anh_chaohang->HrefValue <> "") { ?>
<?php if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $manager_offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $manager_offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($manager_offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
		<td<?php echo $manager_offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->kieu_chaohang->ViewAttributes() ?>><?php echo $manager_offer->kieu_chaohang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
		<td<?php echo $manager_offer->tieude_chaohang->CellAttributes() ?>>
<div<?php echo $manager_offer->tieude_chaohang->ViewAttributes() ?>><?php echo $manager_offer->tieude_chaohang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
		<td<?php echo $manager_offer->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $manager_offer->nganhnghe_id->ViewAttributes() ?>><?php echo $manager_offer->nganhnghe_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->thoihan_tungay->Visible) { // thoihan_tungay ?>
		<td<?php echo $manager_offer->thoihan_tungay->CellAttributes() ?>>
<div<?php echo $manager_offer->thoihan_tungay->ViewAttributes() ?>><?php echo $manager_offer->thoihan_tungay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->thoihan_denngay->Visible) { // thoihan_denngay ?>
		<td<?php echo $manager_offer->thoihan_denngay->CellAttributes() ?>>
<div<?php echo $manager_offer->thoihan_denngay->ViewAttributes() ?>><?php echo $manager_offer->thoihan_denngay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->xuatban->Visible) { // xuatban ?>
		<td<?php echo $manager_offer->xuatban->CellAttributes() ?>>
<div<?php echo $manager_offer->xuatban->ViewAttributes() ?>><?php echo $manager_offer->xuatban->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($manager_offer->chaohang_tieubieu->Visible) { // chaohang_tieubieu ?>
		<td<?php echo $manager_offer->chaohang_tieubieu->CellAttributes() ?>>
<div<?php echo $manager_offer->chaohang_tieubieu->ViewAttributes() ?>><?php echo $manager_offer->chaohang_tieubieu->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($manager_offer->CurrentAction <> "gridadd")
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
<?php if ($manager_offer_list->lTotalRecs > 0) { ?>
<?php if ($manager_offer->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($manager_offer->CurrentAction <> "gridadd" && $manager_offer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_offer_list->Pager)) $manager_offer_list->Pager = new cNumericPager($manager_offer_list->lStartRec, $manager_offer_list->lDisplayRecs, $manager_offer_list->lTotalRecs, $manager_offer_list->lRecRange) ?>
<?php if ($manager_offer_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_offer_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_offer_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_offer_list->PageUrl() ?>start=<?php echo $manager_offer_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_offer_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các chào hàng từ <?php echo $manager_offer_list->Pager->FromIndex ?> đến <?php echo $manager_offer_list->Pager->ToIndex ?> của <?php echo $manager_offer_list->Pager->RecordCount ?> chào hàng
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_offer_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có chào hàng
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($manager_offer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_offer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_offer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_offer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_offer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_offer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($manager_offer_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($manager_offer_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_offerlist)) alert('Chưa chọn chào hàng'); else {document.fmanager_offerlist.action='manager_offerdelete.php';document.fmanager_offerlist.encoding='application/x-www-form-urlencoded';document.fmanager_offerlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_offerlist)) alert('Chưa chọn chào hàng'); else {document.fmanager_offerlist.action='manager_offerupdate.php';document.fmanager_offerlist.encoding='application/x-www-form-urlencoded';document.fmanager_offerlist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($manager_offer->Export == "" && $manager_offer->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(manager_offer_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($manager_offer->Export == "") { ?>
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
class cmanager_offer_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'manager_offer';

	// Page Object Name
	var $PageObjName = 'manager_offer_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_offer;
		if ($manager_offer->UseTokenInUrl) $PageUrl .= "t=" . $manager_offer->TableVar . "&"; // add page token
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
		global $objForm, $manager_offer;
		if ($manager_offer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_offer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_offer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_offer_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_offer"] = new cmanager_offer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_offer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_offer;
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
	$manager_offer->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $manager_offer->Export; // Get export parameter, used in header
	$gsExportFile = $manager_offer->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $manager_offer;
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
		if ($manager_offer->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $manager_offer->getRecordsPerPage(); // Restore from Session
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
		$manager_offer->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$manager_offer->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$manager_offer->setStartRecordNumber($this->lStartRec);
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
		$manager_offer->setSessionWhere($sFilter);
		$manager_offer->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $manager_offer;
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
			$manager_offer->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$manager_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $manager_offer;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $manager_offer->chaohang_id, FALSE); // Field chaohang_id
		$this->BuildSearchSql($sWhere, $manager_offer->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $manager_offer->kieu_chaohang, FALSE); // Field kieu_chaohang
		$this->BuildSearchSql($sWhere, $manager_offer->tieude_chaohang, FALSE); // Field tieude_chaohang
		$this->BuildSearchSql($sWhere, $manager_offer->nganhnghe_id, FALSE); // Field nganhnghe_id
		$this->BuildSearchSql($sWhere, $manager_offer->thoihan_tungay, FALSE); // Field thoihan_tungay
		$this->BuildSearchSql($sWhere, $manager_offer->thoihan_denngay, FALSE); // Field thoihan_denngay
		$this->BuildSearchSql($sWhere, $manager_offer->noidung_chaohang, FALSE); // Field noidung_chaohang
		$this->BuildSearchSql($sWhere, $manager_offer->tg_themchaohang, FALSE); // Field tg_themchaohang
		$this->BuildSearchSql($sWhere, $manager_offer->tg_suachaohang, FALSE); // Field tg_suachaohang
		$this->BuildSearchSql($sWhere, $manager_offer->so_lanxem, FALSE); // Field so_lanxem
		$this->BuildSearchSql($sWhere, $manager_offer->xuatban, FALSE); // Field xuatban
		$this->BuildSearchSql($sWhere, $manager_offer->chaohang_tieubieu, FALSE); // Field chaohang_tieubieu
		$this->BuildSearchSql($sWhere, $manager_offer->xuat_su, FALSE); // Field xuat_su

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($manager_offer->chaohang_id); // Field chaohang_id
			$this->SetSearchParm($manager_offer->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($manager_offer->kieu_chaohang); // Field kieu_chaohang
			$this->SetSearchParm($manager_offer->tieude_chaohang); // Field tieude_chaohang
			$this->SetSearchParm($manager_offer->nganhnghe_id); // Field nganhnghe_id
			$this->SetSearchParm($manager_offer->thoihan_tungay); // Field thoihan_tungay
			$this->SetSearchParm($manager_offer->thoihan_denngay); // Field thoihan_denngay
			$this->SetSearchParm($manager_offer->noidung_chaohang); // Field noidung_chaohang
			$this->SetSearchParm($manager_offer->tg_themchaohang); // Field tg_themchaohang
			$this->SetSearchParm($manager_offer->tg_suachaohang); // Field tg_suachaohang
			$this->SetSearchParm($manager_offer->so_lanxem); // Field so_lanxem
			$this->SetSearchParm($manager_offer->xuatban); // Field xuatban
			$this->SetSearchParm($manager_offer->chaohang_tieubieu); // Field chaohang_tieubieu
			$this->SetSearchParm($manager_offer->xuat_su); // Field xuat_su
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
			if (strstr($sWrk,"offer.nganhnghe_id")<>""){
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
		global $manager_offer;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$manager_offer->setAdvancedSearch("x_$FldParm", $FldVal);
		$manager_offer->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$manager_offer->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$manager_offer->setAdvancedSearch("y_$FldParm", $FldVal2);
		$manager_offer->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $manager_offer;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $manager_offer->tieude_chaohang->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $manager_offer->noidung_chaohang->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $manager_offer->xuat_su->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $manager_offer;
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
			$manager_offer->setBasicSearchKeyword($sSearchKeyword);
			$manager_offer->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $manager_offer;
		$this->sSrchWhere = "";
		$manager_offer->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $manager_offer;
		$manager_offer->setBasicSearchKeyword("");
		$manager_offer->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $manager_offer;
		$manager_offer->setAdvancedSearch("x_chaohang_id", "");
		$manager_offer->setAdvancedSearch("x_nguoidung_id", "");
		$manager_offer->setAdvancedSearch("x_kieu_chaohang", "");
		$manager_offer->setAdvancedSearch("x_tieude_chaohang", "");
		$manager_offer->setAdvancedSearch("x_nganhnghe_id", "");
		$manager_offer->setAdvancedSearch("x_thoihan_tungay", "");
		$manager_offer->setAdvancedSearch("y_thoihan_tungay", "");
		$manager_offer->setAdvancedSearch("x_thoihan_denngay", "");
		$manager_offer->setAdvancedSearch("y_thoihan_denngay", "");
		$manager_offer->setAdvancedSearch("x_noidung_chaohang", "");
		$manager_offer->setAdvancedSearch("x_tg_themchaohang", "");
		$manager_offer->setAdvancedSearch("x_tg_suachaohang", "");
		$manager_offer->setAdvancedSearch("x_so_lanxem", "");
		$manager_offer->setAdvancedSearch("x_xuatban", "");
		$manager_offer->setAdvancedSearch("x_chaohang_tieubieu", "");
		$manager_offer->setAdvancedSearch("x_xuat_su", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $manager_offer;
		$this->sSrchWhere = $manager_offer->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $manager_offer;
		 $manager_offer->chaohang_id->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_chaohang_id");
		 $manager_offer->nguoidung_id->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_nguoidung_id");
		 $manager_offer->kieu_chaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_kieu_chaohang");
		 $manager_offer->tieude_chaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_tieude_chaohang");
		 $manager_offer->nganhnghe_id->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_nganhnghe_id");
		 $manager_offer->thoihan_tungay->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_thoihan_tungay");
		 $manager_offer->thoihan_tungay->AdvancedSearch->SearchValue2 = $manager_offer->getAdvancedSearch("y_thoihan_tungay");
		 $manager_offer->thoihan_denngay->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_thoihan_denngay");
		 $manager_offer->thoihan_denngay->AdvancedSearch->SearchValue2 = $manager_offer->getAdvancedSearch("y_thoihan_denngay");
		 $manager_offer->noidung_chaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_noidung_chaohang");
		 $manager_offer->tg_themchaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_tg_themchaohang");
		 $manager_offer->tg_suachaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_tg_suachaohang");
		 $manager_offer->so_lanxem->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_so_lanxem");
		 $manager_offer->xuatban->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_xuatban");
		 $manager_offer->chaohang_tieubieu->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_chaohang_tieubieu");
		 $manager_offer->xuat_su->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_xuat_su");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $manager_offer;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$manager_offer->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$manager_offer->CurrentOrderType = @$_GET["ordertype"];
			$manager_offer->UpdateSort($manager_offer->nguoidung_id); // Field 
			$manager_offer->UpdateSort($manager_offer->anh_chaohang); // Field 
			$manager_offer->UpdateSort($manager_offer->kieu_chaohang); // Field 
			$manager_offer->UpdateSort($manager_offer->tieude_chaohang); // Field 
			$manager_offer->UpdateSort($manager_offer->nganhnghe_id); // Field 
			$manager_offer->UpdateSort($manager_offer->thoihan_tungay); // Field 
			$manager_offer->UpdateSort($manager_offer->thoihan_denngay); // Field 
			$manager_offer->UpdateSort($manager_offer->xuatban); // Field 
			$manager_offer->UpdateSort($manager_offer->chaohang_tieubieu); // Field 
			$manager_offer->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $manager_offer;
		$sOrderBy = $manager_offer->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($manager_offer->SqlOrderBy() <> "") {
				$sOrderBy = $manager_offer->SqlOrderBy();
				$manager_offer->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $manager_offer;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$manager_offer->setSessionOrderBy($sOrderBy);
				$manager_offer->nguoidung_id->setSort("");
				$manager_offer->anh_chaohang->setSort("");
				$manager_offer->kieu_chaohang->setSort("");
				$manager_offer->tieude_chaohang->setSort("");
				$manager_offer->nganhnghe_id->setSort("");
				$manager_offer->thoihan_tungay->setSort("");
				$manager_offer->thoihan_denngay->setSort("");
				$manager_offer->xuatban->setSort("");
				$manager_offer->chaohang_tieubieu->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$manager_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_offer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_offer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_offer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_offer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_offer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_offer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $manager_offer;

		// Load search values
		// chaohang_id

		$manager_offer->chaohang_id->AdvancedSearch->SearchValue = @$_GET["x_chaohang_id"];
		$manager_offer->chaohang_id->AdvancedSearch->SearchOperator = @$_GET["z_chaohang_id"];

		// nguoidung_id
		$manager_offer->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$manager_offer->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// kieu_chaohang
		$manager_offer->kieu_chaohang->AdvancedSearch->SearchValue = @$_GET["x_kieu_chaohang"];
		$manager_offer->kieu_chaohang->AdvancedSearch->SearchOperator = @$_GET["z_kieu_chaohang"];

		// tieude_chaohang
		$manager_offer->tieude_chaohang->AdvancedSearch->SearchValue = @$_GET["x_tieude_chaohang"];
		$manager_offer->tieude_chaohang->AdvancedSearch->SearchOperator = @$_GET["z_tieude_chaohang"];

		// nganhnghe_id
		$manager_offer->nganhnghe_id->AdvancedSearch->SearchValue = @$_GET["x_nganhnghe_id"];
		$manager_offer->nganhnghe_id->AdvancedSearch->SearchOperator = @$_GET["z_nganhnghe_id"];

		// thoihan_tungay
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchValue = @$_GET["x_thoihan_tungay"];
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchOperator = @$_GET["z_thoihan_tungay"];
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchCondition = @$_GET["v_thoihan_tungay"];
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchValue2 = @$_GET["y_thoihan_tungay"];
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchOperator2 = @$_GET["w_thoihan_tungay"];

		// thoihan_denngay
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchValue = @$_GET["x_thoihan_denngay"];
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchOperator = @$_GET["z_thoihan_denngay"];
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchCondition = @$_GET["v_thoihan_denngay"];
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchValue2 = @$_GET["y_thoihan_denngay"];
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchOperator2 = @$_GET["w_thoihan_denngay"];

		// noidung_chaohang
		$manager_offer->noidung_chaohang->AdvancedSearch->SearchValue = @$_GET["x_noidung_chaohang"];
		$manager_offer->noidung_chaohang->AdvancedSearch->SearchOperator = @$_GET["z_noidung_chaohang"];

		// tg_themchaohang
		$manager_offer->tg_themchaohang->AdvancedSearch->SearchValue = @$_GET["x_tg_themchaohang"];
		$manager_offer->tg_themchaohang->AdvancedSearch->SearchOperator = @$_GET["z_tg_themchaohang"];

		// tg_suachaohang
		$manager_offer->tg_suachaohang->AdvancedSearch->SearchValue = @$_GET["x_tg_suachaohang"];
		$manager_offer->tg_suachaohang->AdvancedSearch->SearchOperator = @$_GET["z_tg_suachaohang"];

		// so_lanxem
		$manager_offer->so_lanxem->AdvancedSearch->SearchValue = @$_GET["x_so_lanxem"];
		$manager_offer->so_lanxem->AdvancedSearch->SearchOperator = @$_GET["z_so_lanxem"];

		// xuatban
		$manager_offer->xuatban->AdvancedSearch->SearchValue = @$_GET["x_xuatban"];
		$manager_offer->xuatban->AdvancedSearch->SearchOperator = @$_GET["z_xuatban"];

		// chaohang_tieubieu
		$manager_offer->chaohang_tieubieu->AdvancedSearch->SearchValue = @$_GET["x_chaohang_tieubieu"];
		$manager_offer->chaohang_tieubieu->AdvancedSearch->SearchOperator = @$_GET["z_chaohang_tieubieu"];

		// xuat_su
		$manager_offer->xuat_su->AdvancedSearch->SearchValue = @$_GET["x_xuat_su"];
		$manager_offer->xuat_su->AdvancedSearch->SearchOperator = @$_GET["z_xuat_su"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_offer;

		// Call Recordset Selecting event
		$manager_offer->Recordset_Selecting($manager_offer->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_offer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_offer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_offer;
		$sFilter = $manager_offer->KeyFilter();

		// Call Row Selecting event
		$manager_offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_offer->CurrentFilter = $sFilter;
		$sSql = $manager_offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_offer;
		$manager_offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$manager_offer->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$manager_offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$manager_offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$manager_offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$manager_offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$manager_offer->thoihan_tungay->setDbValue($rs->fields('thoihan_tungay'));
		$manager_offer->thoihan_denngay->setDbValue($rs->fields('thoihan_denngay'));
		$manager_offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$manager_offer->tg_themchaohang->setDbValue($rs->fields('tg_themchaohang'));
		$manager_offer->tg_suachaohang->setDbValue($rs->fields('tg_suachaohang'));
		$manager_offer->trang_thai->setDbValue($rs->fields('trang_thai'));
		$manager_offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$manager_offer->xuatban->setDbValue($rs->fields('xuatban'));
		$manager_offer->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
		$manager_offer->xuat_su->setDbValue($rs->fields('xuat_su'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_offer;

		// Call Row_Rendering event
		$manager_offer->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_id

		$manager_offer->nguoidung_id->CellCssStyle = "";
		$manager_offer->nguoidung_id->CellCssClass = "";

		// anh_chaohang
		$manager_offer->anh_chaohang->CellCssStyle = "";
		$manager_offer->anh_chaohang->CellCssClass = "";

		// kieu_chaohang
		$manager_offer->kieu_chaohang->CellCssStyle = "";
		$manager_offer->kieu_chaohang->CellCssClass = "";

		// tieude_chaohang
		$manager_offer->tieude_chaohang->CellCssStyle = "";
		$manager_offer->tieude_chaohang->CellCssClass = "";

		// nganhnghe_id
		$manager_offer->nganhnghe_id->CellCssStyle = "";
		$manager_offer->nganhnghe_id->CellCssClass = "";

		// thoihan_tungay
		$manager_offer->thoihan_tungay->CellCssStyle = "";
		$manager_offer->thoihan_tungay->CellCssClass = "";

		// thoihan_denngay
		$manager_offer->thoihan_denngay->CellCssStyle = "";
		$manager_offer->thoihan_denngay->CellCssClass = "";

		// xuatban
		$manager_offer->xuatban->CellCssStyle = "";
		$manager_offer->xuatban->CellCssClass = "";

		// chaohang_tieubieu
		$manager_offer->chaohang_tieubieu->CellCssStyle = "";
		$manager_offer->chaohang_tieubieu->CellCssClass = "";
		if ($manager_offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// chaohang_id
			$manager_offer->chaohang_id->ViewValue = $manager_offer->chaohang_id->CurrentValue;
			$manager_offer->chaohang_id->CssStyle = "";
			$manager_offer->chaohang_id->CssClass = "";
			$manager_offer->chaohang_id->ViewCustomAttributes = "";

			// nguoidung_id
			if (strval($manager_offer->nguoidung_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_congty` FROM `user` WHERE `nguoidung_id` = " . ew_AdjustSql($manager_offer->nguoidung_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_offer->nguoidung_id->ViewValue = $rswrk->fields('ten_congty');
					$rswrk->Close();
				} else {
					$manager_offer->nguoidung_id->ViewValue = $manager_offer->nguoidung_id->CurrentValue;
				}
			} else {
				$manager_offer->nguoidung_id->ViewValue = NULL;
			}
			$manager_offer->nguoidung_id->CssStyle = "";
			$manager_offer->nguoidung_id->CssClass = "";
			$manager_offer->nguoidung_id->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) {
				$manager_offer->anh_chaohang->ViewValue = $manager_offer->anh_chaohang->Upload->DbValue;
				$manager_offer->anh_chaohang->ImageWidth = 200;
				$manager_offer->anh_chaohang->ImageHeight = 0;
				$manager_offer->anh_chaohang->ImageAlt = "";
			} else {
				$manager_offer->anh_chaohang->ViewValue = "";
			}
			$manager_offer->anh_chaohang->CssStyle = "";
			$manager_offer->anh_chaohang->CssClass = "";
			$manager_offer->anh_chaohang->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($manager_offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($manager_offer->kieu_chaohang->CurrentValue) {
					case "1":
						$manager_offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					case "2":
						$manager_offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					default:
						$manager_offer->kieu_chaohang->ViewValue = $manager_offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$manager_offer->kieu_chaohang->ViewValue = NULL;
			}
			$manager_offer->kieu_chaohang->CssStyle = "";
			$manager_offer->kieu_chaohang->CssClass = "";
			$manager_offer->kieu_chaohang->ViewCustomAttributes = "";

			// tieude_chaohang
			$manager_offer->tieude_chaohang->ViewValue = $manager_offer->tieude_chaohang->CurrentValue;
			$manager_offer->tieude_chaohang->CssStyle = "";
			$manager_offer->tieude_chaohang->CssClass = "";
			$manager_offer->tieude_chaohang->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($manager_offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($manager_offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$manager_offer->nganhnghe_id->ViewValue = $manager_offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$manager_offer->nganhnghe_id->ViewValue = NULL;
			}
			$manager_offer->nganhnghe_id->CssStyle = "";
			$manager_offer->nganhnghe_id->CssClass = "";
			$manager_offer->nganhnghe_id->ViewCustomAttributes = "";

			// thoihan_tungay
			$manager_offer->thoihan_tungay->ViewValue = $manager_offer->thoihan_tungay->CurrentValue;
			$manager_offer->thoihan_tungay->ViewValue = ew_FormatDateTime($manager_offer->thoihan_tungay->ViewValue, 7);
			$manager_offer->thoihan_tungay->CssStyle = "";
			$manager_offer->thoihan_tungay->CssClass = "";
			$manager_offer->thoihan_tungay->ViewCustomAttributes = "";

			// thoihan_denngay
			$manager_offer->thoihan_denngay->ViewValue = $manager_offer->thoihan_denngay->CurrentValue;
			$manager_offer->thoihan_denngay->ViewValue = ew_FormatDateTime($manager_offer->thoihan_denngay->ViewValue, 7);
			$manager_offer->thoihan_denngay->CssStyle = "";
			$manager_offer->thoihan_denngay->CssClass = "";
			$manager_offer->thoihan_denngay->ViewCustomAttributes = "";

			// tg_themchaohang
			$manager_offer->tg_themchaohang->ViewValue = $manager_offer->tg_themchaohang->CurrentValue;
			$manager_offer->tg_themchaohang->ViewValue = ew_FormatDateTime($manager_offer->tg_themchaohang->ViewValue, 7);
			$manager_offer->tg_themchaohang->CssStyle = "";
			$manager_offer->tg_themchaohang->CssClass = "";
			$manager_offer->tg_themchaohang->ViewCustomAttributes = "";

			// tg_suachaohang
			$manager_offer->tg_suachaohang->ViewValue = $manager_offer->tg_suachaohang->CurrentValue;
			$manager_offer->tg_suachaohang->ViewValue = ew_FormatDateTime($manager_offer->tg_suachaohang->ViewValue, 7);
			$manager_offer->tg_suachaohang->CssStyle = "";
			$manager_offer->tg_suachaohang->CssClass = "";
			$manager_offer->tg_suachaohang->ViewCustomAttributes = "";

			// so_lanxem
			$manager_offer->so_lanxem->ViewValue = $manager_offer->so_lanxem->CurrentValue;
			$manager_offer->so_lanxem->CssStyle = "";
			$manager_offer->so_lanxem->CssClass = "";
			$manager_offer->so_lanxem->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_offer->xuatban->CurrentValue) <> "") {
				switch ($manager_offer->xuatban->CurrentValue) {
					case "0":
						$manager_offer->xuatban->ViewValue = "<font color=\"#FF0000\">Đang chờ</font>";
						break;
					case "1":
						$manager_offer->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_offer->xuatban->ViewValue = $manager_offer->xuatban->CurrentValue;
				}
			} else {
				$manager_offer->xuatban->ViewValue = NULL;
			}
			$manager_offer->xuatban->CssStyle = "";
			$manager_offer->xuatban->CssClass = "";
			$manager_offer->xuatban->ViewCustomAttributes = "";

			// chaohang_tieubieu
			if (strval($manager_offer->chaohang_tieubieu->CurrentValue) <> "") {
				switch ($manager_offer->chaohang_tieubieu->CurrentValue) {
					case "0":
						$manager_offer->chaohang_tieubieu->ViewValue = "Khong tieu bieu";
						break;
					case "1":
						$manager_offer->chaohang_tieubieu->ViewValue = "Tieu bieu";
						break;
					default:
						$manager_offer->chaohang_tieubieu->ViewValue = $manager_offer->chaohang_tieubieu->CurrentValue;
				}
			} else {
				$manager_offer->chaohang_tieubieu->ViewValue = NULL;
			}
			$manager_offer->chaohang_tieubieu->CssStyle = "";
			$manager_offer->chaohang_tieubieu->CssClass = "";
			$manager_offer->chaohang_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			$manager_offer->xuat_su->ViewValue = $manager_offer->xuat_su->CurrentValue;
			$manager_offer->xuat_su->CssStyle = "";
			$manager_offer->xuat_su->CssClass = "";
			$manager_offer->xuat_su->ViewCustomAttributes = "";

			// nguoidung_id
			$manager_offer->nguoidung_id->HrefValue = "";

			// anh_chaohang
			$manager_offer->anh_chaohang->HrefValue = "";

			// kieu_chaohang
			$manager_offer->kieu_chaohang->HrefValue = "";

			// tieude_chaohang
			$manager_offer->tieude_chaohang->HrefValue = "";

			// nganhnghe_id
			$manager_offer->nganhnghe_id->HrefValue = "";

			// thoihan_tungay
			$manager_offer->thoihan_tungay->HrefValue = "";

			// thoihan_denngay
			$manager_offer->thoihan_denngay->HrefValue = "";

			// xuatban
			$manager_offer->xuatban->HrefValue = "";

			// chaohang_tieubieu
			$manager_offer->chaohang_tieubieu->HrefValue = "";
		} elseif ($manager_offer->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// nguoidung_id
			$manager_offer->nguoidung_id->EditCustomAttributes = "";

			// anh_chaohang
			$manager_offer->anh_chaohang->EditCustomAttributes = "";
			if (!is_null($manager_offer->anh_chaohang->Upload->DbValue)) {
				$manager_offer->anh_chaohang->EditValue = $manager_offer->anh_chaohang->Upload->DbValue;
				$manager_offer->anh_chaohang->ImageWidth = 150;
				$manager_offer->anh_chaohang->ImageHeight = 0;
				$manager_offer->anh_chaohang->ImageAlt = "";
			} else {
				$manager_offer->anh_chaohang->EditValue = "";
			}

			// kieu_chaohang
			$manager_offer->kieu_chaohang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chào bán");
			$arwrk[] = array("2", "Chào mua");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_offer->kieu_chaohang->EditValue = $arwrk;

			// tieude_chaohang
			$manager_offer->tieude_chaohang->EditCustomAttributes = "";
			$manager_offer->tieude_chaohang->EditValue = ew_HtmlEncode($manager_offer->tieude_chaohang->AdvancedSearch->SearchValue);

			// nganhnghe_id
			$manager_offer->nganhnghe_id->EditCustomAttributes = "";
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
			array_push($arwrk, array($rswrk1->fields['nganhnghe_id'], "-".$rswrk1->fields['nganhnghe_ten']));
			$sSqlWrk2 = "SELECT `nganhnghe_id`, `nganhnghe_ten`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `career`";
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
			$manager_offer->nganhnghe_id->EditValue = $arwrk;

			// thoihan_tungay
			$manager_offer->thoihan_tungay->EditCustomAttributes = "";
			$manager_offer->thoihan_tungay->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_offer->thoihan_tungay->AdvancedSearch->SearchValue, 7), 7));
			$manager_offer->thoihan_tungay->EditCustomAttributes = "";
			$manager_offer->thoihan_tungay->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_offer->thoihan_tungay->AdvancedSearch->SearchValue2, 7), 7));

			// thoihan_denngay
			$manager_offer->thoihan_denngay->EditCustomAttributes = "";
			$manager_offer->thoihan_denngay->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_offer->thoihan_denngay->AdvancedSearch->SearchValue, 7), 7));
			$manager_offer->thoihan_denngay->EditCustomAttributes = "";
			$manager_offer->thoihan_denngay->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($manager_offer->thoihan_denngay->AdvancedSearch->SearchValue2, 7), 7));

			// xuatban
			$manager_offer->xuatban->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đang chờ");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_offer->xuatban->EditValue = $arwrk;

			// chaohang_tieubieu
			$manager_offer->chaohang_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không tiêu biểu");
			$arwrk[] = array("1", "Tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$manager_offer->chaohang_tieubieu->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$manager_offer->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $manager_offer;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($manager_offer->thoihan_tungay->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thoihan Tungay";
		}
		if (!ew_CheckEuroDate($manager_offer->thoihan_tungay->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thoihan Tungay";
		}
		if (!ew_CheckEuroDate($manager_offer->thoihan_denngay->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thoihan Denngay";
		}
		if (!ew_CheckEuroDate($manager_offer->thoihan_denngay->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thoihan Denngay";
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
		global $manager_offer;
		$manager_offer->chaohang_id->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_chaohang_id");
		$manager_offer->nguoidung_id->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_nguoidung_id");
		$manager_offer->kieu_chaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_kieu_chaohang");
		$manager_offer->tieude_chaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_tieude_chaohang");
		$manager_offer->nganhnghe_id->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_nganhnghe_id");
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_thoihan_tungay");
		$manager_offer->thoihan_tungay->AdvancedSearch->SearchValue2 = $manager_offer->getAdvancedSearch("y_thoihan_tungay");
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_thoihan_denngay");
		$manager_offer->thoihan_denngay->AdvancedSearch->SearchValue2 = $manager_offer->getAdvancedSearch("y_thoihan_denngay");
		$manager_offer->noidung_chaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_noidung_chaohang");
		$manager_offer->tg_themchaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_tg_themchaohang");
		$manager_offer->tg_suachaohang->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_tg_suachaohang");
		$manager_offer->so_lanxem->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_so_lanxem");
		$manager_offer->xuatban->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_xuatban");
		$manager_offer->chaohang_tieubieu->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_chaohang_tieubieu");
		$manager_offer->xuat_su->AdvancedSearch->SearchValue = $manager_offer->getAdvancedSearch("x_xuat_su");
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
