<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_phieucanhaninfo.php" ?>
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
$tbl_phieucanhan_list = new ctbl_phieucanhan_list();
$Page =& $tbl_phieucanhan_list;

// Page init processing
$tbl_phieucanhan_list->Page_Init();

// Page main processing
$tbl_phieucanhan_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_phieucanhan->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_phieucanhan_list = new ew_Page("tbl_phieucanhan_list");

// page properties
tbl_phieucanhan_list.PageID = "list"; // page ID
var EW_PAGE_ID = tbl_phieucanhan_list.PageID; // for backward compatibility

// extend page with validate function for search
tbl_phieucanhan_list.ValidateSearch = function(fobj) {
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
tbl_phieucanhan_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_phieucanhan_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_phieucanhan_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_phieucanhan_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($tbl_phieucanhan->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($tbl_phieucanhan->Export == "" && $tbl_phieucanhan->SelectLimit);
	if (!$bSelectLimit)
		$rs = $tbl_phieucanhan_list->LoadRecordset();
	$tbl_phieucanhan_list->lTotalRecs = ($bSelectLimit) ? $tbl_phieucanhan->SelectRecordCount() : $rs->RecordCount();
	$tbl_phieucanhan_list->lStartRec = 1;
	if ($tbl_phieucanhan_list->lDisplayRecs <= 0) // Display all records
		$tbl_phieucanhan_list->lDisplayRecs = $tbl_phieucanhan_list->lTotalRecs;
	if (!($tbl_phieucanhan->ExportAll && $tbl_phieucanhan->Export <> ""))
		$tbl_phieucanhan_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $tbl_phieucanhan_list->LoadRecordset($tbl_phieucanhan_list->lStartRec-1, $tbl_phieucanhan_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý phiếu cá nhân sinh viên</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 

</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_phieucanhan->Export == "" && $tbl_phieucanhan->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(tbl_phieucanhan_list);" style="text-decoration: none;"><img id="tbl_phieucanhan_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Search</span><br>
<div id="tbl_phieucanhan_list_SearchPanel">
<form name="ftbl_phieucanhanlistsrch" id="ftbl_phieucanhanlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return tbl_phieucanhan_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="tbl_phieucanhan">
<?php
if ($gsSearchError == "")
	$tbl_phieucanhan_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$tbl_phieucanhan->RowType = EW_ROWTYPE_SEARCH;

// Render row
$tbl_phieucanhan_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Mã sinh viên</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_msv" id="x_msv" size="30" maxlength="20" value="<?php echo $tbl_phieucanhan->msv->EditValue ?>"<?php echo $tbl_phieucanhan->msv->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Tình trạng</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
                                <input type="text" name="x_tinh_trang" id="x_tinh_trang" size="30" maxlength="200" value="<?php echo $tbl_phieucanhan->tinh_trang->EditValue ?>"<?php echo $tbl_phieucanhan->tinh_trang->EditAttributes() ?>>
                                </span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Trạng thái</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_active" name="x_active"<?php echo $tbl_phieucanhan->active->EditAttributes() ?>>
<?php
if (is_array($tbl_phieucanhan->active->EditValue)) {
	$arwrk = $tbl_phieucanhan->active->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_phieucanhan->active->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($tbl_phieucanhan->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>cmd=reset">Show all</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_phieucanhan->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Tìm chính xác từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_phieucanhan->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_phieucanhan->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Từ bất kỳ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_phieucanhan_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($tbl_phieucanhan->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($tbl_phieucanhan->CurrentAction <> "gridadd" && $tbl_phieucanhan->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_phieucanhan_list->Pager)) $tbl_phieucanhan_list->Pager = new cNumericPager($tbl_phieucanhan_list->lStartRec, $tbl_phieucanhan_list->lDisplayRecs, $tbl_phieucanhan_list->lTotalRecs, $tbl_phieucanhan_list->lRecRange) ?>
<?php if ($tbl_phieucanhan_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_phieucanhan_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_phieucanhan_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $tbl_phieucanhan_list->Pager->FromIndex ?> to <?php echo $tbl_phieucanhan_list->Pager->ToIndex ?> of <?php echo $tbl_phieucanhan_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_phieucanhan_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy nhập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_phieucanhan">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_phieucanhan_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_phieucanhan_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_phieucanhan_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_phieucanhan->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_phieucanhan->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_phieucanhanlist)) alert('No records selected'); else {document.ftbl_phieucanhanlist.action='tbl_phieucanhandelete.php';document.ftbl_phieucanhanlist.encoding='application/x-www-form-urlencoded';document.ftbl_phieucanhanlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_phieucanhanlist)) alert('No records selected'); else {document.ftbl_phieucanhanlist.action='tbl_phieucanhanupdate.php';document.ftbl_phieucanhanlist.encoding='application/x-www-form-urlencoded';document.ftbl_phieucanhanlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ftbl_phieucanhanlist" id="ftbl_phieucanhanlist" class="ewForm" action="" method="post">
<?php if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$tbl_phieucanhan_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$tbl_phieucanhan_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$tbl_phieucanhan_list->lOptionCnt++; // edit
}

if ($Security->CanEdit() || $Security->CanDelete()) {
	$tbl_phieucanhan_list->lOptionCnt++; // Multi-select
}
	$tbl_phieucanhan_list->lOptionCnt += count($tbl_phieucanhan_list->ListOptions->Items); // Custom list options
?>
<?php echo $tbl_phieucanhan->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($tbl_phieucanhan->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="tbl_phieucanhan_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_phieucanhan_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($tbl_phieucanhan->msv->Visible) { // msv ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->msv) == "") { ?>
		<td>Msv</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->msv) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã sinh viên&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->msv->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->msv->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->e_mail->Visible) { // e_mail ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->e_mail) == "") { ?>
		<td>E Mail</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->e_mail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Email&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->e_mail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->e_mail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->hoten->Visible) { // hoten ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->hoten) == "") { ?>
		<td>Hoten</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->hoten) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Họ tên&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->hoten->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->hoten->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->nganh_hoc->Visible) { // nganh_hoc ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->nganh_hoc) == "") { ?>
		<td>Nganh Hoc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->nganh_hoc) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngành học&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->nganh_hoc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->nganh_hoc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->lop->Visible) { // lop ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->lop) == "") { ?>
		<td>Lop</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->lop) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Lớp&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->lop->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->lop->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->khoa_hoc->Visible) { // khoa_hoc ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->khoa_hoc) == "") { ?>
		<td>Khoa Hoc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->khoa_hoc) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Khóa học&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->khoa_hoc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->khoa_hoc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->he_daotao->Visible) { // he_daotao ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->he_daotao) == "") { ?>
		<td>He Daotao</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->he_daotao) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Hệ đào tạo&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->he_daotao->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->he_daotao->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_phieucanhan->tinh_trang->Visible) { // tinh_trang ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->tinh_trang) == "") { ?>
		<td>Tinh Trang</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->tinh_trang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tình trạng&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->tinh_trang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->tinh_trang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>			
<?php if ($tbl_phieucanhan->active->Visible) { // active ?>
	<?php if ($tbl_phieucanhan->SortUrl($tbl_phieucanhan->active) == "") { ?>
		<td>Active</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_phieucanhan->SortUrl($tbl_phieucanhan->active) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($tbl_phieucanhan->active->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_phieucanhan->active->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($tbl_phieucanhan->ExportAll && $tbl_phieucanhan->Export <> "") {
	$tbl_phieucanhan_list->lStopRec = $tbl_phieucanhan_list->lTotalRecs;
} else {
	$tbl_phieucanhan_list->lStopRec = $tbl_phieucanhan_list->lStartRec + $tbl_phieucanhan_list->lDisplayRecs - 1; // Set the last record to display
}
$tbl_phieucanhan_list->lRecCount = $tbl_phieucanhan_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$tbl_phieucanhan->SelectLimit && $tbl_phieucanhan_list->lStartRec > 1)
		$rs->Move($tbl_phieucanhan_list->lStartRec - 1);
}
$tbl_phieucanhan_list->lRowCnt = 0;
while (($tbl_phieucanhan->CurrentAction == "gridadd" || !$rs->EOF) &&
	$tbl_phieucanhan_list->lRecCount < $tbl_phieucanhan_list->lStopRec) {
	$tbl_phieucanhan_list->lRecCount++;
	if (intval($tbl_phieucanhan_list->lRecCount) >= intval($tbl_phieucanhan_list->lStartRec)) {
		$tbl_phieucanhan_list->lRowCnt++;

	// Init row class and style
	$tbl_phieucanhan->CssClass = "";
	$tbl_phieucanhan->CssStyle = "";
	$tbl_phieucanhan->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($tbl_phieucanhan->CurrentAction == "gridadd") {
		$tbl_phieucanhan_list->LoadDefaultValues(); // Load default values
	} else {
		$tbl_phieucanhan_list->LoadRowValues($rs); // Load row values
	}
	$tbl_phieucanhan->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$tbl_phieucanhan_list->RenderRow();
?>
	<tr<?php echo $tbl_phieucanhan->RowAttributes() ?>>
<?php if ($tbl_phieucanhan->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $tbl_phieucanhan->ViewUrl() ?>">View</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $tbl_phieucanhan->EditUrl() ?>">Edit</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($tbl_phieucanhan->phieucanhan_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_phieucanhan_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($tbl_phieucanhan->msv->Visible) { // msv ?>
		<td<?php echo $tbl_phieucanhan->msv->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->msv->ViewAttributes() ?>><?php echo $tbl_phieucanhan->msv->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->e_mail->Visible) { // e_mail ?>
		<td<?php echo $tbl_phieucanhan->e_mail->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->e_mail->ViewAttributes() ?>><?php echo $tbl_phieucanhan->e_mail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->hoten->Visible) { // hoten ?>
		<td<?php echo $tbl_phieucanhan->hoten->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->hoten->ViewAttributes() ?>><?php echo $tbl_phieucanhan->hoten->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->nganh_hoc->Visible) { // nganh_hoc ?>
		<td<?php echo $tbl_phieucanhan->nganh_hoc->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->nganh_hoc->ViewAttributes() ?>><?php echo $tbl_phieucanhan->nganh_hoc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->lop->Visible) { // lop ?>
		<td<?php echo $tbl_phieucanhan->lop->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->lop->ViewAttributes() ?>><?php echo $tbl_phieucanhan->lop->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->khoa_hoc->Visible) { // khoa_hoc ?>
		<td<?php echo $tbl_phieucanhan->khoa_hoc->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->khoa_hoc->ViewAttributes() ?>><?php echo $tbl_phieucanhan->khoa_hoc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->he_daotao->Visible) { // he_daotao ?>
		<td<?php echo $tbl_phieucanhan->he_daotao->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->he_daotao->ViewAttributes() ?>><?php echo $tbl_phieucanhan->he_daotao->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->tinh_trang->Visible) { // tinh_trang ?>
		<td<?php echo $tbl_phieucanhan->tinh_trang->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->tinh_trang->ViewAttributes() ?>><?php echo $tbl_phieucanhan->tinh_trang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_phieucanhan->active->Visible) { // active ?>
		<td<?php echo $tbl_phieucanhan->active->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->active->ViewAttributes() ?>><?php echo $tbl_phieucanhan->active->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($tbl_phieucanhan->CurrentAction <> "gridadd")
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
<?php if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
<?php if ($tbl_phieucanhan->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($tbl_phieucanhan->CurrentAction <> "gridadd" && $tbl_phieucanhan->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_phieucanhan_list->Pager)) $tbl_phieucanhan_list->Pager = new cNumericPager($tbl_phieucanhan_list->lStartRec, $tbl_phieucanhan_list->lDisplayRecs, $tbl_phieucanhan_list->lTotalRecs, $tbl_phieucanhan_list->lRecRange) ?>
<?php if ($tbl_phieucanhan_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_phieucanhan_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_phieucanhan_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_list->PageUrl() ?>start=<?php echo $tbl_phieucanhan_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $tbl_phieucanhan_list->Pager->FromIndex ?> to <?php echo $tbl_phieucanhan_list->Pager->ToIndex ?> of <?php echo $tbl_phieucanhan_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_phieucanhan_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	 Bạn không có quyền truy nhập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_phieucanhan">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_phieucanhan_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_phieucanhan_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_phieucanhan_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_phieucanhan->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_phieucanhan->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_phieucanhan_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_phieucanhanlist)) alert('Chưa lựa chọn bản ghi'); else {document.ftbl_phieucanhanlist.action='tbl_phieucanhandelete.php';document.ftbl_phieucanhanlist.encoding='application/x-www-form-urlencoded';document.ftbl_phieucanhanlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_phieucanhanlist)) alert('Chưa lựa chọn bản ghi'); else {document.ftbl_phieucanhanlist.action='tbl_phieucanhanupdate.php';document.ftbl_phieucanhanlist.encoding='application/x-www-form-urlencoded';document.ftbl_phieucanhanlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_phieucanhan->Export == "" && $tbl_phieucanhan->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(tbl_phieucanhan_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($tbl_phieucanhan->Export == "") { ?>
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
class ctbl_phieucanhan_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'tbl_phieucanhan';

	// Page Object Name
	var $PageObjName = 'tbl_phieucanhan_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_phieucanhan;
		if ($tbl_phieucanhan->UseTokenInUrl) $PageUrl .= "t=" . $tbl_phieucanhan->TableVar . "&"; // add page token
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
		global $objForm, $tbl_phieucanhan;
		if ($tbl_phieucanhan->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_phieucanhan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_phieucanhan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_phieucanhan_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_phieucanhan"] = new ctbl_phieucanhan();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_phieucanhan', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_phieucanhan;
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
	$tbl_phieucanhan->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $tbl_phieucanhan->Export; // Get export parameter, used in header
	$gsExportFile = $tbl_phieucanhan->TableVar; // Get export file, used in header
	if ($tbl_phieucanhan->Export == "print" || $tbl_phieucanhan->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($tbl_phieucanhan->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($tbl_phieucanhan->Export == "word") {
		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
	}

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
		global $objForm, $gsSearchError, $Security, $tbl_phieucanhan;
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
		if ($tbl_phieucanhan->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $tbl_phieucanhan->getRecordsPerPage(); // Restore from Session
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
		$tbl_phieucanhan->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$tbl_phieucanhan->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
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
		$tbl_phieucanhan->setSessionWhere($sFilter);
		$tbl_phieucanhan->CurrentFilter = "";

		// Export data only
		if (in_array($tbl_phieucanhan->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $tbl_phieucanhan;
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
			$tbl_phieucanhan->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $tbl_phieucanhan;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->phieucanhan_id, FALSE); // Field phieucanhan_id
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->chuyenmucphieu_id, FALSE); // Field chuyenmucphieu_id
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->msv, FALSE); // Field msv
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->e_mail, FALSE); // Field e_mail
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->hoten, FALSE); // Field hoten
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->nganh_hoc, FALSE); // Field nganh_hoc
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->lop, FALSE); // Field lop
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->khoa_hoc, FALSE); // Field khoa_hoc
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->he_daotao, FALSE); // Field he_daotao
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->tinh_trang, FALSE); // Field tinh_trang
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->chungminh_nhandan, FALSE); // Field chungminh_nhandan
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->ngaycap_chungminh, FALSE); // Field ngaycap_chungminh
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->hokhau_tt, FALSE); // Field hokhau_tt
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->htlt_odau, FALSE); // Field htlt_odau
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->noi_cap, FALSE); // Field noi_cap
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->dan_toc, FALSE); // Field dan_toc
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->ton_giao, FALSE); // Field ton_giao
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->ngayvaodang, FALSE); // Field ngayvaodang
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->capbac_chucvu_dang, FALSE); // Field capbac_chucvu_dang
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->nangkhieucanhan, FALSE); // Field nangkhieucanhan
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->dtdc_khicanlh, FALSE); // Field dtdc_khicanlh
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->hoten_bo, FALSE); // Field hoten_bo
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->namsinh_bo, FALSE); // Field namsinh_bo
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->dt_bo, FALSE); // Field dt_bo
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->hoten_me, FALSE); // Field hoten_me
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->namsinh_me, FALSE); // Field namsinh_me
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->dt_me, FALSE); // Field dt_me
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->gdchinhsach, FALSE); // Field gdchinhsach
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->chucvu_bo, FALSE); // Field chucvu_bo
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->chucvu_me, FALSE); // Field chucvu_me
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->sdt_lienhegd, FALSE); // Field sdt_lienhegd
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->datetime_add, FALSE); // Field datetime_add
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->datetime_edit, FALSE); // Field datetime_edit
		$this->BuildSearchSql($sWhere, $tbl_phieucanhan->active, FALSE); // Field active

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($tbl_phieucanhan->phieucanhan_id); // Field phieucanhan_id
			$this->SetSearchParm($tbl_phieucanhan->chuyenmucphieu_id); // Field chuyenmucphieu_id
			$this->SetSearchParm($tbl_phieucanhan->msv); // Field msv
			$this->SetSearchParm($tbl_phieucanhan->e_mail); // Field e_mail
			$this->SetSearchParm($tbl_phieucanhan->hoten); // Field hoten
			$this->SetSearchParm($tbl_phieucanhan->nganh_hoc); // Field nganh_hoc
			$this->SetSearchParm($tbl_phieucanhan->lop); // Field lop
			$this->SetSearchParm($tbl_phieucanhan->khoa_hoc); // Field khoa_hoc
			$this->SetSearchParm($tbl_phieucanhan->he_daotao); // Field he_daotao
			$this->SetSearchParm($tbl_phieucanhan->tinh_trang); // Field tinh_trang
			$this->SetSearchParm($tbl_phieucanhan->chungminh_nhandan); // Field chungminh_nhandan
			$this->SetSearchParm($tbl_phieucanhan->ngaycap_chungminh); // Field ngaycap_chungminh
			$this->SetSearchParm($tbl_phieucanhan->hokhau_tt); // Field hokhau_tt
			$this->SetSearchParm($tbl_phieucanhan->htlt_odau); // Field htlt_odau
			$this->SetSearchParm($tbl_phieucanhan->noi_cap); // Field noi_cap
			$this->SetSearchParm($tbl_phieucanhan->dan_toc); // Field dan_toc
			$this->SetSearchParm($tbl_phieucanhan->ton_giao); // Field ton_giao
			$this->SetSearchParm($tbl_phieucanhan->ngayvaodang); // Field ngayvaodang
			$this->SetSearchParm($tbl_phieucanhan->capbac_chucvu_dang); // Field capbac_chucvu_dang
			$this->SetSearchParm($tbl_phieucanhan->nangkhieucanhan); // Field nangkhieucanhan
			$this->SetSearchParm($tbl_phieucanhan->dtdc_khicanlh); // Field dtdc_khicanlh
			$this->SetSearchParm($tbl_phieucanhan->hoten_bo); // Field hoten_bo
			$this->SetSearchParm($tbl_phieucanhan->namsinh_bo); // Field namsinh_bo
			$this->SetSearchParm($tbl_phieucanhan->dt_bo); // Field dt_bo
			$this->SetSearchParm($tbl_phieucanhan->hoten_me); // Field hoten_me
			$this->SetSearchParm($tbl_phieucanhan->namsinh_me); // Field namsinh_me
			$this->SetSearchParm($tbl_phieucanhan->dt_me); // Field dt_me
			$this->SetSearchParm($tbl_phieucanhan->gdchinhsach); // Field gdchinhsach
			$this->SetSearchParm($tbl_phieucanhan->chucvu_bo); // Field chucvu_bo
			$this->SetSearchParm($tbl_phieucanhan->chucvu_me); // Field chucvu_me
			$this->SetSearchParm($tbl_phieucanhan->sdt_lienhegd); // Field sdt_lienhegd
			$this->SetSearchParm($tbl_phieucanhan->datetime_add); // Field datetime_add
			$this->SetSearchParm($tbl_phieucanhan->datetime_edit); // Field datetime_edit
			$this->SetSearchParm($tbl_phieucanhan->active); // Field active
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
		global $tbl_phieucanhan;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$tbl_phieucanhan->setAdvancedSearch("x_$FldParm", $FldVal);
		$tbl_phieucanhan->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$tbl_phieucanhan->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$tbl_phieucanhan->setAdvancedSearch("y_$FldParm", $FldVal2);
		$tbl_phieucanhan->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $tbl_phieucanhan;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $tbl_phieucanhan->msv->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->e_mail->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->hoten->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->nganh_hoc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->lop->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->khoa_hoc->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->he_daotao->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->tinh_trang->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->hoten_bo->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->dt_bo->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_phieucanhan->sdt_lienhegd->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $tbl_phieucanhan;
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
			$tbl_phieucanhan->setBasicSearchKeyword($sSearchKeyword);
			$tbl_phieucanhan->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $tbl_phieucanhan;
		$this->sSrchWhere = "";
		$tbl_phieucanhan->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $tbl_phieucanhan;
		$tbl_phieucanhan->setBasicSearchKeyword("");
		$tbl_phieucanhan->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $tbl_phieucanhan;
		$tbl_phieucanhan->setAdvancedSearch("x_phieucanhan_id", "");
		$tbl_phieucanhan->setAdvancedSearch("x_chuyenmucphieu_id", "");
		$tbl_phieucanhan->setAdvancedSearch("x_msv", "");
		$tbl_phieucanhan->setAdvancedSearch("x_e_mail", "");
		$tbl_phieucanhan->setAdvancedSearch("x_hoten", "");
		$tbl_phieucanhan->setAdvancedSearch("x_nganh_hoc", "");
		$tbl_phieucanhan->setAdvancedSearch("x_lop", "");
		$tbl_phieucanhan->setAdvancedSearch("x_khoa_hoc", "");
		$tbl_phieucanhan->setAdvancedSearch("x_he_daotao", "");
		$tbl_phieucanhan->setAdvancedSearch("x_tinh_trang", "");
		$tbl_phieucanhan->setAdvancedSearch("x_chungminh_nhandan", "");
		$tbl_phieucanhan->setAdvancedSearch("x_ngaycap_chungminh", "");
		$tbl_phieucanhan->setAdvancedSearch("x_hokhau_tt", "");
		$tbl_phieucanhan->setAdvancedSearch("x_htlt_odau", "");
		$tbl_phieucanhan->setAdvancedSearch("x_noi_cap", "");
		$tbl_phieucanhan->setAdvancedSearch("x_dan_toc", "");
		$tbl_phieucanhan->setAdvancedSearch("x_ton_giao", "");
		$tbl_phieucanhan->setAdvancedSearch("x_ngayvaodang", "");
		$tbl_phieucanhan->setAdvancedSearch("x_capbac_chucvu_dang", "");
		$tbl_phieucanhan->setAdvancedSearch("x_nangkhieucanhan", "");
		$tbl_phieucanhan->setAdvancedSearch("x_dtdc_khicanlh", "");
		$tbl_phieucanhan->setAdvancedSearch("x_hoten_bo", "");
		$tbl_phieucanhan->setAdvancedSearch("x_namsinh_bo", "");
		$tbl_phieucanhan->setAdvancedSearch("x_dt_bo", "");
		$tbl_phieucanhan->setAdvancedSearch("x_hoten_me", "");
		$tbl_phieucanhan->setAdvancedSearch("x_namsinh_me", "");
		$tbl_phieucanhan->setAdvancedSearch("x_dt_me", "");
		$tbl_phieucanhan->setAdvancedSearch("x_gdchinhsach", "");
		$tbl_phieucanhan->setAdvancedSearch("x_chucvu_bo", "");
		$tbl_phieucanhan->setAdvancedSearch("x_chucvu_me", "");
		$tbl_phieucanhan->setAdvancedSearch("x_sdt_lienhegd", "");
		$tbl_phieucanhan->setAdvancedSearch("x_datetime_add", "");
		$tbl_phieucanhan->setAdvancedSearch("x_datetime_edit", "");
		$tbl_phieucanhan->setAdvancedSearch("x_active", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $tbl_phieucanhan;
		$this->sSrchWhere = $tbl_phieucanhan->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $tbl_phieucanhan;
		 $tbl_phieucanhan->phieucanhan_id->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_phieucanhan_id");
		 $tbl_phieucanhan->chuyenmucphieu_id->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chuyenmucphieu_id");
		 $tbl_phieucanhan->msv->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_msv");
		 $tbl_phieucanhan->e_mail->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_e_mail");
		 $tbl_phieucanhan->hoten->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hoten");
		 $tbl_phieucanhan->nganh_hoc->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_nganh_hoc");
		 $tbl_phieucanhan->lop->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_lop");
		 $tbl_phieucanhan->khoa_hoc->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_khoa_hoc");
		 $tbl_phieucanhan->he_daotao->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_he_daotao");
		 $tbl_phieucanhan->tinh_trang->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_tinh_trang");
		 $tbl_phieucanhan->chungminh_nhandan->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chungminh_nhandan");
		 $tbl_phieucanhan->ngaycap_chungminh->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_ngaycap_chungminh");
		 $tbl_phieucanhan->hokhau_tt->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hokhau_tt");
		 $tbl_phieucanhan->htlt_odau->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_htlt_odau");
		 $tbl_phieucanhan->noi_cap->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_noi_cap");
		 $tbl_phieucanhan->dan_toc->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dan_toc");
		 $tbl_phieucanhan->ton_giao->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_ton_giao");
		 $tbl_phieucanhan->ngayvaodang->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_ngayvaodang");
		 $tbl_phieucanhan->capbac_chucvu_dang->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_capbac_chucvu_dang");
		 $tbl_phieucanhan->nangkhieucanhan->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_nangkhieucanhan");
		 $tbl_phieucanhan->dtdc_khicanlh->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dtdc_khicanlh");
		 $tbl_phieucanhan->hoten_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hoten_bo");
		 $tbl_phieucanhan->namsinh_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_namsinh_bo");
		 $tbl_phieucanhan->dt_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dt_bo");
		 $tbl_phieucanhan->hoten_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hoten_me");
		 $tbl_phieucanhan->namsinh_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_namsinh_me");
		 $tbl_phieucanhan->dt_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dt_me");
		 $tbl_phieucanhan->gdchinhsach->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_gdchinhsach");
		 $tbl_phieucanhan->chucvu_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chucvu_bo");
		 $tbl_phieucanhan->chucvu_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chucvu_me");
		 $tbl_phieucanhan->sdt_lienhegd->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_sdt_lienhegd");
		 $tbl_phieucanhan->datetime_add->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_datetime_add");
		 $tbl_phieucanhan->datetime_edit->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_datetime_edit");
		 $tbl_phieucanhan->active->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_active");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $tbl_phieucanhan;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$tbl_phieucanhan->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$tbl_phieucanhan->CurrentOrderType = @$_GET["ordertype"];
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->msv); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->e_mail); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->hoten); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->nganh_hoc); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->lop); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->khoa_hoc); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->he_daotao); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->tinh_trang); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->chungminh_nhandan); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->ngaycap_chungminh); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->hokhau_tt); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->htlt_odau); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->noi_cap); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->dan_toc); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->ton_giao); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->ngayvaodang); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->capbac_chucvu_dang); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->nangkhieucanhan); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->dtdc_khicanlh); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->hoten_bo); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->namsinh_bo); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->dt_bo); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->hoten_me); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->namsinh_me); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->dt_me); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->gdchinhsach); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->chucvu_bo); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->chucvu_me); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->sdt_lienhegd); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->datetime_add); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->datetime_edit); // Field 
			$tbl_phieucanhan->UpdateSort($tbl_phieucanhan->active); // Field 
			$tbl_phieucanhan->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $tbl_phieucanhan;
		$sOrderBy = $tbl_phieucanhan->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($tbl_phieucanhan->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_phieucanhan->SqlOrderBy();
				$tbl_phieucanhan->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $tbl_phieucanhan;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_phieucanhan->setSessionOrderBy($sOrderBy);
				$tbl_phieucanhan->msv->setSort("");
				$tbl_phieucanhan->e_mail->setSort("");
				$tbl_phieucanhan->hoten->setSort("");
				$tbl_phieucanhan->nganh_hoc->setSort("");
				$tbl_phieucanhan->lop->setSort("");
				$tbl_phieucanhan->khoa_hoc->setSort("");
				$tbl_phieucanhan->he_daotao->setSort("");
				$tbl_phieucanhan->tinh_trang->setSort("");
				$tbl_phieucanhan->chungminh_nhandan->setSort("");
				$tbl_phieucanhan->ngaycap_chungminh->setSort("");
				$tbl_phieucanhan->hokhau_tt->setSort("");
				$tbl_phieucanhan->htlt_odau->setSort("");
				$tbl_phieucanhan->noi_cap->setSort("");
				$tbl_phieucanhan->dan_toc->setSort("");
				$tbl_phieucanhan->ton_giao->setSort("");
				$tbl_phieucanhan->ngayvaodang->setSort("");
				$tbl_phieucanhan->capbac_chucvu_dang->setSort("");
				$tbl_phieucanhan->nangkhieucanhan->setSort("");
				$tbl_phieucanhan->dtdc_khicanlh->setSort("");
				$tbl_phieucanhan->hoten_bo->setSort("");
				$tbl_phieucanhan->namsinh_bo->setSort("");
				$tbl_phieucanhan->dt_bo->setSort("");
				$tbl_phieucanhan->hoten_me->setSort("");
				$tbl_phieucanhan->namsinh_me->setSort("");
				$tbl_phieucanhan->dt_me->setSort("");
				$tbl_phieucanhan->gdchinhsach->setSort("");
				$tbl_phieucanhan->chucvu_bo->setSort("");
				$tbl_phieucanhan->chucvu_me->setSort("");
				$tbl_phieucanhan->sdt_lienhegd->setSort("");
				$tbl_phieucanhan->datetime_add->setSort("");
				$tbl_phieucanhan->datetime_edit->setSort("");
				$tbl_phieucanhan->active->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_phieucanhan;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_phieucanhan->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $tbl_phieucanhan;

		// Load search values
		// phieucanhan_id

		$tbl_phieucanhan->phieucanhan_id->AdvancedSearch->SearchValue = @$_GET["x_phieucanhan_id"];
		$tbl_phieucanhan->phieucanhan_id->AdvancedSearch->SearchOperator = @$_GET["z_phieucanhan_id"];

		// chuyenmucphieu_id
		$tbl_phieucanhan->chuyenmucphieu_id->AdvancedSearch->SearchValue = @$_GET["x_chuyenmucphieu_id"];
		$tbl_phieucanhan->chuyenmucphieu_id->AdvancedSearch->SearchOperator = @$_GET["z_chuyenmucphieu_id"];

		// msv
		$tbl_phieucanhan->msv->AdvancedSearch->SearchValue = @$_GET["x_msv"];
		$tbl_phieucanhan->msv->AdvancedSearch->SearchOperator = @$_GET["z_msv"];

		// e_mail
		$tbl_phieucanhan->e_mail->AdvancedSearch->SearchValue = @$_GET["x_e_mail"];
		$tbl_phieucanhan->e_mail->AdvancedSearch->SearchOperator = @$_GET["z_e_mail"];

		// hoten
		$tbl_phieucanhan->hoten->AdvancedSearch->SearchValue = @$_GET["x_hoten"];
		$tbl_phieucanhan->hoten->AdvancedSearch->SearchOperator = @$_GET["z_hoten"];

		// nganh_hoc
		$tbl_phieucanhan->nganh_hoc->AdvancedSearch->SearchValue = @$_GET["x_nganh_hoc"];
		$tbl_phieucanhan->nganh_hoc->AdvancedSearch->SearchOperator = @$_GET["z_nganh_hoc"];

		// lop
		$tbl_phieucanhan->lop->AdvancedSearch->SearchValue = @$_GET["x_lop"];
		$tbl_phieucanhan->lop->AdvancedSearch->SearchOperator = @$_GET["z_lop"];

		// khoa_hoc
		$tbl_phieucanhan->khoa_hoc->AdvancedSearch->SearchValue = @$_GET["x_khoa_hoc"];
		$tbl_phieucanhan->khoa_hoc->AdvancedSearch->SearchOperator = @$_GET["z_khoa_hoc"];

		// he_daotao
		$tbl_phieucanhan->he_daotao->AdvancedSearch->SearchValue = @$_GET["x_he_daotao"];
		$tbl_phieucanhan->he_daotao->AdvancedSearch->SearchOperator = @$_GET["z_he_daotao"];

		// tinh_trang
		$tbl_phieucanhan->tinh_trang->AdvancedSearch->SearchValue = @$_GET["x_tinh_trang"];
		$tbl_phieucanhan->tinh_trang->AdvancedSearch->SearchOperator = @$_GET["z_tinh_trang"];

		// chungminh_nhandan
		$tbl_phieucanhan->chungminh_nhandan->AdvancedSearch->SearchValue = @$_GET["x_chungminh_nhandan"];
		$tbl_phieucanhan->chungminh_nhandan->AdvancedSearch->SearchOperator = @$_GET["z_chungminh_nhandan"];

		// ngaycap_chungminh
		$tbl_phieucanhan->ngaycap_chungminh->AdvancedSearch->SearchValue = @$_GET["x_ngaycap_chungminh"];
		$tbl_phieucanhan->ngaycap_chungminh->AdvancedSearch->SearchOperator = @$_GET["z_ngaycap_chungminh"];

		// hokhau_tt
		$tbl_phieucanhan->hokhau_tt->AdvancedSearch->SearchValue = @$_GET["x_hokhau_tt"];
		$tbl_phieucanhan->hokhau_tt->AdvancedSearch->SearchOperator = @$_GET["z_hokhau_tt"];

		// htlt_odau
		$tbl_phieucanhan->htlt_odau->AdvancedSearch->SearchValue = @$_GET["x_htlt_odau"];
		$tbl_phieucanhan->htlt_odau->AdvancedSearch->SearchOperator = @$_GET["z_htlt_odau"];

		// noi_cap
		$tbl_phieucanhan->noi_cap->AdvancedSearch->SearchValue = @$_GET["x_noi_cap"];
		$tbl_phieucanhan->noi_cap->AdvancedSearch->SearchOperator = @$_GET["z_noi_cap"];

		// dan_toc
		$tbl_phieucanhan->dan_toc->AdvancedSearch->SearchValue = @$_GET["x_dan_toc"];
		$tbl_phieucanhan->dan_toc->AdvancedSearch->SearchOperator = @$_GET["z_dan_toc"];

		// ton_giao
		$tbl_phieucanhan->ton_giao->AdvancedSearch->SearchValue = @$_GET["x_ton_giao"];
		$tbl_phieucanhan->ton_giao->AdvancedSearch->SearchOperator = @$_GET["z_ton_giao"];

		// ngayvaodang
		$tbl_phieucanhan->ngayvaodang->AdvancedSearch->SearchValue = @$_GET["x_ngayvaodang"];
		$tbl_phieucanhan->ngayvaodang->AdvancedSearch->SearchOperator = @$_GET["z_ngayvaodang"];

		// capbac_chucvu_dang
		$tbl_phieucanhan->capbac_chucvu_dang->AdvancedSearch->SearchValue = @$_GET["x_capbac_chucvu_dang"];
		$tbl_phieucanhan->capbac_chucvu_dang->AdvancedSearch->SearchOperator = @$_GET["z_capbac_chucvu_dang"];

		// nangkhieucanhan
		$tbl_phieucanhan->nangkhieucanhan->AdvancedSearch->SearchValue = @$_GET["x_nangkhieucanhan"];
		$tbl_phieucanhan->nangkhieucanhan->AdvancedSearch->SearchOperator = @$_GET["z_nangkhieucanhan"];

		// dtdc_khicanlh
		$tbl_phieucanhan->dtdc_khicanlh->AdvancedSearch->SearchValue = @$_GET["x_dtdc_khicanlh"];
		$tbl_phieucanhan->dtdc_khicanlh->AdvancedSearch->SearchOperator = @$_GET["z_dtdc_khicanlh"];

		// hoten_bo
		$tbl_phieucanhan->hoten_bo->AdvancedSearch->SearchValue = @$_GET["x_hoten_bo"];
		$tbl_phieucanhan->hoten_bo->AdvancedSearch->SearchOperator = @$_GET["z_hoten_bo"];

		// namsinh_bo
		$tbl_phieucanhan->namsinh_bo->AdvancedSearch->SearchValue = @$_GET["x_namsinh_bo"];
		$tbl_phieucanhan->namsinh_bo->AdvancedSearch->SearchOperator = @$_GET["z_namsinh_bo"];

		// dt_bo
		$tbl_phieucanhan->dt_bo->AdvancedSearch->SearchValue = @$_GET["x_dt_bo"];
		$tbl_phieucanhan->dt_bo->AdvancedSearch->SearchOperator = @$_GET["z_dt_bo"];

		// hoten_me
		$tbl_phieucanhan->hoten_me->AdvancedSearch->SearchValue = @$_GET["x_hoten_me"];
		$tbl_phieucanhan->hoten_me->AdvancedSearch->SearchOperator = @$_GET["z_hoten_me"];

		// namsinh_me
		$tbl_phieucanhan->namsinh_me->AdvancedSearch->SearchValue = @$_GET["x_namsinh_me"];
		$tbl_phieucanhan->namsinh_me->AdvancedSearch->SearchOperator = @$_GET["z_namsinh_me"];

		// dt_me
		$tbl_phieucanhan->dt_me->AdvancedSearch->SearchValue = @$_GET["x_dt_me"];
		$tbl_phieucanhan->dt_me->AdvancedSearch->SearchOperator = @$_GET["z_dt_me"];

		// gdchinhsach
		$tbl_phieucanhan->gdchinhsach->AdvancedSearch->SearchValue = @$_GET["x_gdchinhsach"];
		$tbl_phieucanhan->gdchinhsach->AdvancedSearch->SearchOperator = @$_GET["z_gdchinhsach"];

		// chucvu_bo
		$tbl_phieucanhan->chucvu_bo->AdvancedSearch->SearchValue = @$_GET["x_chucvu_bo"];
		$tbl_phieucanhan->chucvu_bo->AdvancedSearch->SearchOperator = @$_GET["z_chucvu_bo"];

		// chucvu_me
		$tbl_phieucanhan->chucvu_me->AdvancedSearch->SearchValue = @$_GET["x_chucvu_me"];
		$tbl_phieucanhan->chucvu_me->AdvancedSearch->SearchOperator = @$_GET["z_chucvu_me"];

		// sdt_lienhegd
		$tbl_phieucanhan->sdt_lienhegd->AdvancedSearch->SearchValue = @$_GET["x_sdt_lienhegd"];
		$tbl_phieucanhan->sdt_lienhegd->AdvancedSearch->SearchOperator = @$_GET["z_sdt_lienhegd"];

		// datetime_add
		$tbl_phieucanhan->datetime_add->AdvancedSearch->SearchValue = @$_GET["x_datetime_add"];
		$tbl_phieucanhan->datetime_add->AdvancedSearch->SearchOperator = @$_GET["z_datetime_add"];

		// datetime_edit
		$tbl_phieucanhan->datetime_edit->AdvancedSearch->SearchValue = @$_GET["x_datetime_edit"];
		$tbl_phieucanhan->datetime_edit->AdvancedSearch->SearchOperator = @$_GET["z_datetime_edit"];

		// active
		$tbl_phieucanhan->active->AdvancedSearch->SearchValue = @$_GET["x_active"];
		$tbl_phieucanhan->active->AdvancedSearch->SearchOperator = @$_GET["z_active"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_phieucanhan;

		// Call Recordset Selecting event
		$tbl_phieucanhan->Recordset_Selecting($tbl_phieucanhan->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_phieucanhan->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_phieucanhan->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_phieucanhan;
		$sFilter = $tbl_phieucanhan->KeyFilter();

		// Call Row Selecting event
		$tbl_phieucanhan->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_phieucanhan->CurrentFilter = $sFilter;
		$sSql = $tbl_phieucanhan->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_phieucanhan->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_phieucanhan;
		$tbl_phieucanhan->phieucanhan_id->setDbValue($rs->fields('phieucanhan_id'));
		$tbl_phieucanhan->chuyenmucphieu_id->setDbValue($rs->fields('chuyenmucphieu_id'));
		$tbl_phieucanhan->msv->setDbValue($rs->fields('msv'));
		$tbl_phieucanhan->e_mail->setDbValue($rs->fields('e_mail'));
		$tbl_phieucanhan->hoten->setDbValue($rs->fields('hoten'));
		$tbl_phieucanhan->nganh_hoc->setDbValue($rs->fields('nganh_hoc'));
		$tbl_phieucanhan->lop->setDbValue($rs->fields('lop'));
		$tbl_phieucanhan->khoa_hoc->setDbValue($rs->fields('khoa_hoc'));
		$tbl_phieucanhan->he_daotao->setDbValue($rs->fields('he_daotao'));
		$tbl_phieucanhan->tinh_trang->setDbValue($rs->fields('tinh_trang'));
		$tbl_phieucanhan->chungminh_nhandan->setDbValue($rs->fields('chungminh_nhandan'));
		$tbl_phieucanhan->ngaycap_chungminh->setDbValue($rs->fields('ngaycap_chungminh'));
		$tbl_phieucanhan->hokhau_tt->setDbValue($rs->fields('hokhau_tt'));
		$tbl_phieucanhan->htlt_odau->setDbValue($rs->fields('htlt_odau'));
		$tbl_phieucanhan->noi_cap->setDbValue($rs->fields('noi_cap'));
		$tbl_phieucanhan->dan_toc->setDbValue($rs->fields('dan_toc'));
		$tbl_phieucanhan->ton_giao->setDbValue($rs->fields('ton_giao'));
		$tbl_phieucanhan->ngayvaodang->setDbValue($rs->fields('ngayvaodang'));
		$tbl_phieucanhan->capbac_chucvu_dang->setDbValue($rs->fields('capbac_chucvu_dang'));
		$tbl_phieucanhan->nangkhieucanhan->setDbValue($rs->fields('nangkhieucanhan'));
		$tbl_phieucanhan->dtdc_khicanlh->setDbValue($rs->fields('dtdc_khicanlh'));
		$tbl_phieucanhan->hoten_bo->setDbValue($rs->fields('hoten_bo'));
		$tbl_phieucanhan->namsinh_bo->setDbValue($rs->fields('namsinh_bo'));
		$tbl_phieucanhan->dt_bo->setDbValue($rs->fields('dt_bo'));
		$tbl_phieucanhan->hoten_me->setDbValue($rs->fields('hoten_me'));
		$tbl_phieucanhan->namsinh_me->setDbValue($rs->fields('namsinh_me'));
		$tbl_phieucanhan->dt_me->setDbValue($rs->fields('dt_me'));
		$tbl_phieucanhan->gdchinhsach->setDbValue($rs->fields('gdchinhsach'));
		$tbl_phieucanhan->chucvu_bo->setDbValue($rs->fields('chucvu_bo'));
		$tbl_phieucanhan->chucvu_me->setDbValue($rs->fields('chucvu_me'));
		$tbl_phieucanhan->sdt_lienhegd->setDbValue($rs->fields('sdt_lienhegd'));
		$tbl_phieucanhan->datetime_add->setDbValue($rs->fields('datetime_add'));
		$tbl_phieucanhan->datetime_edit->setDbValue($rs->fields('datetime_edit'));
		$tbl_phieucanhan->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_phieucanhan;

		// Call Row_Rendering event
		$tbl_phieucanhan->Row_Rendering();

		// Common render codes for all row types
		// msv

		$tbl_phieucanhan->msv->CellCssStyle = "";
		$tbl_phieucanhan->msv->CellCssClass = "";

		// e_mail
		$tbl_phieucanhan->e_mail->CellCssStyle = "";
		$tbl_phieucanhan->e_mail->CellCssClass = "";

		// hoten
		$tbl_phieucanhan->hoten->CellCssStyle = "";
		$tbl_phieucanhan->hoten->CellCssClass = "";

		// nganh_hoc
		$tbl_phieucanhan->nganh_hoc->CellCssStyle = "";
		$tbl_phieucanhan->nganh_hoc->CellCssClass = "";

		// lop
		$tbl_phieucanhan->lop->CellCssStyle = "";
		$tbl_phieucanhan->lop->CellCssClass = "";

		// khoa_hoc
		$tbl_phieucanhan->khoa_hoc->CellCssStyle = "";
		$tbl_phieucanhan->khoa_hoc->CellCssClass = "";

		// he_daotao
		$tbl_phieucanhan->he_daotao->CellCssStyle = "";
		$tbl_phieucanhan->he_daotao->CellCssClass = "";

		// tinh_trang
		$tbl_phieucanhan->tinh_trang->CellCssStyle = "";
		$tbl_phieucanhan->tinh_trang->CellCssClass = "";

		// chungminh_nhandan
		$tbl_phieucanhan->chungminh_nhandan->CellCssStyle = "";
		$tbl_phieucanhan->chungminh_nhandan->CellCssClass = "";

		// ngaycap_chungminh
		$tbl_phieucanhan->ngaycap_chungminh->CellCssStyle = "";
		$tbl_phieucanhan->ngaycap_chungminh->CellCssClass = "";

		// hokhau_tt
		$tbl_phieucanhan->hokhau_tt->CellCssStyle = "";
		$tbl_phieucanhan->hokhau_tt->CellCssClass = "";

		// htlt_odau
		$tbl_phieucanhan->htlt_odau->CellCssStyle = "";
		$tbl_phieucanhan->htlt_odau->CellCssClass = "";

		// noi_cap
		$tbl_phieucanhan->noi_cap->CellCssStyle = "";
		$tbl_phieucanhan->noi_cap->CellCssClass = "";

		// dan_toc
		$tbl_phieucanhan->dan_toc->CellCssStyle = "";
		$tbl_phieucanhan->dan_toc->CellCssClass = "";

		// ton_giao
		$tbl_phieucanhan->ton_giao->CellCssStyle = "";
		$tbl_phieucanhan->ton_giao->CellCssClass = "";

		// ngayvaodang
		$tbl_phieucanhan->ngayvaodang->CellCssStyle = "";
		$tbl_phieucanhan->ngayvaodang->CellCssClass = "";

		// capbac_chucvu_dang
		$tbl_phieucanhan->capbac_chucvu_dang->CellCssStyle = "";
		$tbl_phieucanhan->capbac_chucvu_dang->CellCssClass = "";

		// nangkhieucanhan
		$tbl_phieucanhan->nangkhieucanhan->CellCssStyle = "";
		$tbl_phieucanhan->nangkhieucanhan->CellCssClass = "";

		// dtdc_khicanlh
		$tbl_phieucanhan->dtdc_khicanlh->CellCssStyle = "";
		$tbl_phieucanhan->dtdc_khicanlh->CellCssClass = "";

		// hoten_bo
		$tbl_phieucanhan->hoten_bo->CellCssStyle = "";
		$tbl_phieucanhan->hoten_bo->CellCssClass = "";

		// namsinh_bo
		$tbl_phieucanhan->namsinh_bo->CellCssStyle = "";
		$tbl_phieucanhan->namsinh_bo->CellCssClass = "";

		// dt_bo
		$tbl_phieucanhan->dt_bo->CellCssStyle = "";
		$tbl_phieucanhan->dt_bo->CellCssClass = "";

		// hoten_me
		$tbl_phieucanhan->hoten_me->CellCssStyle = "";
		$tbl_phieucanhan->hoten_me->CellCssClass = "";

		// namsinh_me
		$tbl_phieucanhan->namsinh_me->CellCssStyle = "";
		$tbl_phieucanhan->namsinh_me->CellCssClass = "";

		// dt_me
		$tbl_phieucanhan->dt_me->CellCssStyle = "";
		$tbl_phieucanhan->dt_me->CellCssClass = "";

		// gdchinhsach
		$tbl_phieucanhan->gdchinhsach->CellCssStyle = "";
		$tbl_phieucanhan->gdchinhsach->CellCssClass = "";

		// chucvu_bo
		$tbl_phieucanhan->chucvu_bo->CellCssStyle = "";
		$tbl_phieucanhan->chucvu_bo->CellCssClass = "";

		// chucvu_me
		$tbl_phieucanhan->chucvu_me->CellCssStyle = "";
		$tbl_phieucanhan->chucvu_me->CellCssClass = "";

		// sdt_lienhegd
		$tbl_phieucanhan->sdt_lienhegd->CellCssStyle = "";
		$tbl_phieucanhan->sdt_lienhegd->CellCssClass = "";

		// datetime_add
		$tbl_phieucanhan->datetime_add->CellCssStyle = "";
		$tbl_phieucanhan->datetime_add->CellCssClass = "";

		// datetime_edit
		$tbl_phieucanhan->datetime_edit->CellCssStyle = "";
		$tbl_phieucanhan->datetime_edit->CellCssClass = "";

		// active
		$tbl_phieucanhan->active->CellCssStyle = "";
		$tbl_phieucanhan->active->CellCssClass = "";
		if ($tbl_phieucanhan->RowType == EW_ROWTYPE_VIEW) { // View row

			// msv
			$tbl_phieucanhan->msv->ViewValue = $tbl_phieucanhan->msv->CurrentValue;
			$tbl_phieucanhan->msv->CssStyle = "";
			$tbl_phieucanhan->msv->CssClass = "";
			$tbl_phieucanhan->msv->ViewCustomAttributes = "";

			// e_mail
			$tbl_phieucanhan->e_mail->ViewValue = $tbl_phieucanhan->e_mail->CurrentValue;
			$tbl_phieucanhan->e_mail->CssStyle = "";
			$tbl_phieucanhan->e_mail->CssClass = "";
			$tbl_phieucanhan->e_mail->ViewCustomAttributes = "";

			// hoten
			$tbl_phieucanhan->hoten->ViewValue = $tbl_phieucanhan->hoten->CurrentValue;
			$tbl_phieucanhan->hoten->CssStyle = "";
			$tbl_phieucanhan->hoten->CssClass = "";
			$tbl_phieucanhan->hoten->ViewCustomAttributes = "";

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->ViewValue = $tbl_phieucanhan->nganh_hoc->CurrentValue;
			$tbl_phieucanhan->nganh_hoc->CssStyle = "";
			$tbl_phieucanhan->nganh_hoc->CssClass = "";
			$tbl_phieucanhan->nganh_hoc->ViewCustomAttributes = "";

			// lop
			$tbl_phieucanhan->lop->ViewValue = $tbl_phieucanhan->lop->CurrentValue;
			$tbl_phieucanhan->lop->CssStyle = "";
			$tbl_phieucanhan->lop->CssClass = "";
			$tbl_phieucanhan->lop->ViewCustomAttributes = "";

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->ViewValue = $tbl_phieucanhan->khoa_hoc->CurrentValue;
			$tbl_phieucanhan->khoa_hoc->CssStyle = "";
			$tbl_phieucanhan->khoa_hoc->CssClass = "";
			$tbl_phieucanhan->khoa_hoc->ViewCustomAttributes = "";

			// he_daotao
			$tbl_phieucanhan->he_daotao->ViewValue = $tbl_phieucanhan->he_daotao->CurrentValue;
			$tbl_phieucanhan->he_daotao->CssStyle = "";
			$tbl_phieucanhan->he_daotao->CssClass = "";
			$tbl_phieucanhan->he_daotao->ViewCustomAttributes = "";

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->ViewValue = $tbl_phieucanhan->tinh_trang->CurrentValue;
			$tbl_phieucanhan->tinh_trang->CssStyle = "";
			$tbl_phieucanhan->tinh_trang->CssClass = "";
			$tbl_phieucanhan->tinh_trang->ViewCustomAttributes = "";

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->ViewValue = $tbl_phieucanhan->chungminh_nhandan->CurrentValue;
			$tbl_phieucanhan->chungminh_nhandan->CssStyle = "";
			$tbl_phieucanhan->chungminh_nhandan->CssClass = "";
			$tbl_phieucanhan->chungminh_nhandan->ViewCustomAttributes = "";

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->ViewValue = $tbl_phieucanhan->ngaycap_chungminh->CurrentValue;
			$tbl_phieucanhan->ngaycap_chungminh->CssStyle = "";
			$tbl_phieucanhan->ngaycap_chungminh->CssClass = "";
			$tbl_phieucanhan->ngaycap_chungminh->ViewCustomAttributes = "";

			// hokhau_tt
			$tbl_phieucanhan->hokhau_tt->ViewValue = $tbl_phieucanhan->hokhau_tt->CurrentValue;
			$tbl_phieucanhan->hokhau_tt->CssStyle = "";
			$tbl_phieucanhan->hokhau_tt->CssClass = "";
			$tbl_phieucanhan->hokhau_tt->ViewCustomAttributes = "";

			// htlt_odau
			$tbl_phieucanhan->htlt_odau->ViewValue = $tbl_phieucanhan->htlt_odau->CurrentValue;
			$tbl_phieucanhan->htlt_odau->CssStyle = "";
			$tbl_phieucanhan->htlt_odau->CssClass = "";
			$tbl_phieucanhan->htlt_odau->ViewCustomAttributes = "";

			// noi_cap
			$tbl_phieucanhan->noi_cap->ViewValue = $tbl_phieucanhan->noi_cap->CurrentValue;
			$tbl_phieucanhan->noi_cap->CssStyle = "";
			$tbl_phieucanhan->noi_cap->CssClass = "";
			$tbl_phieucanhan->noi_cap->ViewCustomAttributes = "";

			// dan_toc
			$tbl_phieucanhan->dan_toc->ViewValue = $tbl_phieucanhan->dan_toc->CurrentValue;
			$tbl_phieucanhan->dan_toc->CssStyle = "";
			$tbl_phieucanhan->dan_toc->CssClass = "";
			$tbl_phieucanhan->dan_toc->ViewCustomAttributes = "";

			// ton_giao
			$tbl_phieucanhan->ton_giao->ViewValue = $tbl_phieucanhan->ton_giao->CurrentValue;
			$tbl_phieucanhan->ton_giao->CssStyle = "";
			$tbl_phieucanhan->ton_giao->CssClass = "";
			$tbl_phieucanhan->ton_giao->ViewCustomAttributes = "";

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->ViewValue = $tbl_phieucanhan->ngayvaodang->CurrentValue;
			$tbl_phieucanhan->ngayvaodang->ViewValue = ew_FormatDateTime($tbl_phieucanhan->ngayvaodang->ViewValue, 7);
			$tbl_phieucanhan->ngayvaodang->CssStyle = "";
			$tbl_phieucanhan->ngayvaodang->CssClass = "";
			$tbl_phieucanhan->ngayvaodang->ViewCustomAttributes = "";

			// capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->ViewValue = $tbl_phieucanhan->capbac_chucvu_dang->CurrentValue;
			$tbl_phieucanhan->capbac_chucvu_dang->CssStyle = "";
			$tbl_phieucanhan->capbac_chucvu_dang->CssClass = "";
			$tbl_phieucanhan->capbac_chucvu_dang->ViewCustomAttributes = "";

			// nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->ViewValue = $tbl_phieucanhan->nangkhieucanhan->CurrentValue;
			$tbl_phieucanhan->nangkhieucanhan->CssStyle = "";
			$tbl_phieucanhan->nangkhieucanhan->CssClass = "";
			$tbl_phieucanhan->nangkhieucanhan->ViewCustomAttributes = "";

			// dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->ViewValue = $tbl_phieucanhan->dtdc_khicanlh->CurrentValue;
			$tbl_phieucanhan->dtdc_khicanlh->CssStyle = "";
			$tbl_phieucanhan->dtdc_khicanlh->CssClass = "";
			$tbl_phieucanhan->dtdc_khicanlh->ViewCustomAttributes = "";

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->ViewValue = $tbl_phieucanhan->hoten_bo->CurrentValue;
			$tbl_phieucanhan->hoten_bo->CssStyle = "";
			$tbl_phieucanhan->hoten_bo->CssClass = "";
			$tbl_phieucanhan->hoten_bo->ViewCustomAttributes = "";

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->ViewValue = $tbl_phieucanhan->namsinh_bo->CurrentValue;
			$tbl_phieucanhan->namsinh_bo->CssStyle = "";
			$tbl_phieucanhan->namsinh_bo->CssClass = "";
			$tbl_phieucanhan->namsinh_bo->ViewCustomAttributes = "";

			// dt_bo
			$tbl_phieucanhan->dt_bo->ViewValue = $tbl_phieucanhan->dt_bo->CurrentValue;
			$tbl_phieucanhan->dt_bo->CssStyle = "";
			$tbl_phieucanhan->dt_bo->CssClass = "";
			$tbl_phieucanhan->dt_bo->ViewCustomAttributes = "";

			// hoten_me
			$tbl_phieucanhan->hoten_me->ViewValue = $tbl_phieucanhan->hoten_me->CurrentValue;
			$tbl_phieucanhan->hoten_me->CssStyle = "";
			$tbl_phieucanhan->hoten_me->CssClass = "";
			$tbl_phieucanhan->hoten_me->ViewCustomAttributes = "";

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->ViewValue = $tbl_phieucanhan->namsinh_me->CurrentValue;
			$tbl_phieucanhan->namsinh_me->CssStyle = "";
			$tbl_phieucanhan->namsinh_me->CssClass = "";
			$tbl_phieucanhan->namsinh_me->ViewCustomAttributes = "";

			// dt_me
			$tbl_phieucanhan->dt_me->ViewValue = $tbl_phieucanhan->dt_me->CurrentValue;
			$tbl_phieucanhan->dt_me->CssStyle = "";
			$tbl_phieucanhan->dt_me->CssClass = "";
			$tbl_phieucanhan->dt_me->ViewCustomAttributes = "";

			// gdchinhsach
			$tbl_phieucanhan->gdchinhsach->ViewValue = $tbl_phieucanhan->gdchinhsach->CurrentValue;
			$tbl_phieucanhan->gdchinhsach->CssStyle = "";
			$tbl_phieucanhan->gdchinhsach->CssClass = "";
			$tbl_phieucanhan->gdchinhsach->ViewCustomAttributes = "";

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->ViewValue = $tbl_phieucanhan->chucvu_bo->CurrentValue;
			$tbl_phieucanhan->chucvu_bo->CssStyle = "";
			$tbl_phieucanhan->chucvu_bo->CssClass = "";
			$tbl_phieucanhan->chucvu_bo->ViewCustomAttributes = "";

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->ViewValue = $tbl_phieucanhan->chucvu_me->CurrentValue;
			$tbl_phieucanhan->chucvu_me->CssStyle = "";
			$tbl_phieucanhan->chucvu_me->CssClass = "";
			$tbl_phieucanhan->chucvu_me->ViewCustomAttributes = "";

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->ViewValue = $tbl_phieucanhan->sdt_lienhegd->CurrentValue;
			$tbl_phieucanhan->sdt_lienhegd->CssStyle = "";
			$tbl_phieucanhan->sdt_lienhegd->CssClass = "";
			$tbl_phieucanhan->sdt_lienhegd->ViewCustomAttributes = "";

			// datetime_add
			$tbl_phieucanhan->datetime_add->ViewValue = $tbl_phieucanhan->datetime_add->CurrentValue;
			$tbl_phieucanhan->datetime_add->ViewValue = ew_FormatDateTime($tbl_phieucanhan->datetime_add->ViewValue, 7);
			$tbl_phieucanhan->datetime_add->CssStyle = "";
			$tbl_phieucanhan->datetime_add->CssClass = "";
			$tbl_phieucanhan->datetime_add->ViewCustomAttributes = "";

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->ViewValue = $tbl_phieucanhan->datetime_edit->CurrentValue;
			$tbl_phieucanhan->datetime_edit->ViewValue = ew_FormatDateTime($tbl_phieucanhan->datetime_edit->ViewValue, 7);
			$tbl_phieucanhan->datetime_edit->CssStyle = "";
			$tbl_phieucanhan->datetime_edit->CssClass = "";
			$tbl_phieucanhan->datetime_edit->ViewCustomAttributes = "";

			// active
			if (strval($tbl_phieucanhan->active->CurrentValue) <> "") {
				switch ($tbl_phieucanhan->active->CurrentValue) {
					case "0":
						$tbl_phieucanhan->active->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$tbl_phieucanhan->active->ViewValue = "Kích hoạt";
						break;
					default:
						$tbl_phieucanhan->active->ViewValue = $tbl_phieucanhan->active->CurrentValue;
				}
			} else {
				$tbl_phieucanhan->active->ViewValue = NULL;
			}
			$tbl_phieucanhan->active->CssStyle = "";
			$tbl_phieucanhan->active->CssClass = "";
			$tbl_phieucanhan->active->ViewCustomAttributes = "";

			// msv
			$tbl_phieucanhan->msv->HrefValue = "";

			// e_mail
			$tbl_phieucanhan->e_mail->HrefValue = "";

			// hoten
			$tbl_phieucanhan->hoten->HrefValue = "";

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->HrefValue = "";

			// lop
			$tbl_phieucanhan->lop->HrefValue = "";

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->HrefValue = "";

			// he_daotao
			$tbl_phieucanhan->he_daotao->HrefValue = "";

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->HrefValue = "";

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->HrefValue = "";

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->HrefValue = "";

			// hokhau_tt
			$tbl_phieucanhan->hokhau_tt->HrefValue = "";

			// htlt_odau
			$tbl_phieucanhan->htlt_odau->HrefValue = "";

			// noi_cap
			$tbl_phieucanhan->noi_cap->HrefValue = "";

			// dan_toc
			$tbl_phieucanhan->dan_toc->HrefValue = "";

			// ton_giao
			$tbl_phieucanhan->ton_giao->HrefValue = "";

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->HrefValue = "";

			// capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->HrefValue = "";

			// nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->HrefValue = "";

			// dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->HrefValue = "";

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->HrefValue = "";

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->HrefValue = "";

			// dt_bo
			$tbl_phieucanhan->dt_bo->HrefValue = "";

			// hoten_me
			$tbl_phieucanhan->hoten_me->HrefValue = "";

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->HrefValue = "";

			// dt_me
			$tbl_phieucanhan->dt_me->HrefValue = "";

			// gdchinhsach
			$tbl_phieucanhan->gdchinhsach->HrefValue = "";

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->HrefValue = "";

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->HrefValue = "";

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->HrefValue = "";

			// datetime_add
			$tbl_phieucanhan->datetime_add->HrefValue = "";

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->HrefValue = "";

			// active
			$tbl_phieucanhan->active->HrefValue = "";
		} elseif ($tbl_phieucanhan->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// msv
			$tbl_phieucanhan->msv->EditCustomAttributes = "";
			$tbl_phieucanhan->msv->EditValue = ew_HtmlEncode($tbl_phieucanhan->msv->AdvancedSearch->SearchValue);

			// e_mail
			$tbl_phieucanhan->e_mail->EditCustomAttributes = "";
			$tbl_phieucanhan->e_mail->EditValue = ew_HtmlEncode($tbl_phieucanhan->e_mail->AdvancedSearch->SearchValue);

			// hoten
			$tbl_phieucanhan->hoten->EditCustomAttributes = "";
			$tbl_phieucanhan->hoten->EditValue = ew_HtmlEncode($tbl_phieucanhan->hoten->AdvancedSearch->SearchValue);

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->EditCustomAttributes = "";
			$tbl_phieucanhan->nganh_hoc->EditValue = ew_HtmlEncode($tbl_phieucanhan->nganh_hoc->AdvancedSearch->SearchValue);

			// lop
			$tbl_phieucanhan->lop->EditCustomAttributes = "";
			$tbl_phieucanhan->lop->EditValue = ew_HtmlEncode($tbl_phieucanhan->lop->AdvancedSearch->SearchValue);

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->EditCustomAttributes = "";
			$tbl_phieucanhan->khoa_hoc->EditValue = ew_HtmlEncode($tbl_phieucanhan->khoa_hoc->AdvancedSearch->SearchValue);

			// he_daotao
			$tbl_phieucanhan->he_daotao->EditCustomAttributes = "";
			$tbl_phieucanhan->he_daotao->EditValue = ew_HtmlEncode($tbl_phieucanhan->he_daotao->AdvancedSearch->SearchValue);

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->EditCustomAttributes = "";
			$tbl_phieucanhan->tinh_trang->EditValue = ew_HtmlEncode($tbl_phieucanhan->tinh_trang->AdvancedSearch->SearchValue);

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->EditCustomAttributes = "";
			$tbl_phieucanhan->chungminh_nhandan->EditValue = ew_HtmlEncode($tbl_phieucanhan->chungminh_nhandan->AdvancedSearch->SearchValue);

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->EditCustomAttributes = "";
			$tbl_phieucanhan->ngaycap_chungminh->EditValue = ew_HtmlEncode($tbl_phieucanhan->ngaycap_chungminh->AdvancedSearch->SearchValue);

			// hokhau_tt
			$tbl_phieucanhan->hokhau_tt->EditCustomAttributes = "";
			$tbl_phieucanhan->hokhau_tt->EditValue = ew_HtmlEncode($tbl_phieucanhan->hokhau_tt->AdvancedSearch->SearchValue);

			// htlt_odau
			$tbl_phieucanhan->htlt_odau->EditCustomAttributes = "";
			$tbl_phieucanhan->htlt_odau->EditValue = ew_HtmlEncode($tbl_phieucanhan->htlt_odau->AdvancedSearch->SearchValue);

			// noi_cap
			$tbl_phieucanhan->noi_cap->EditCustomAttributes = "";
			$tbl_phieucanhan->noi_cap->EditValue = ew_HtmlEncode($tbl_phieucanhan->noi_cap->AdvancedSearch->SearchValue);

			// dan_toc
			$tbl_phieucanhan->dan_toc->EditCustomAttributes = "";
			$tbl_phieucanhan->dan_toc->EditValue = ew_HtmlEncode($tbl_phieucanhan->dan_toc->AdvancedSearch->SearchValue);

			// ton_giao
			$tbl_phieucanhan->ton_giao->EditCustomAttributes = "";
			$tbl_phieucanhan->ton_giao->EditValue = ew_HtmlEncode($tbl_phieucanhan->ton_giao->AdvancedSearch->SearchValue);

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->EditCustomAttributes = "";
			$tbl_phieucanhan->ngayvaodang->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_phieucanhan->ngayvaodang->AdvancedSearch->SearchValue, 7), 7));

			// capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->EditCustomAttributes = "";
			$tbl_phieucanhan->capbac_chucvu_dang->EditValue = ew_HtmlEncode($tbl_phieucanhan->capbac_chucvu_dang->AdvancedSearch->SearchValue);

			// nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->EditCustomAttributes = "";
			$tbl_phieucanhan->nangkhieucanhan->EditValue = ew_HtmlEncode($tbl_phieucanhan->nangkhieucanhan->AdvancedSearch->SearchValue);

			// dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->EditCustomAttributes = "";
			$tbl_phieucanhan->dtdc_khicanlh->EditValue = ew_HtmlEncode($tbl_phieucanhan->dtdc_khicanlh->AdvancedSearch->SearchValue);

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->hoten_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->hoten_bo->AdvancedSearch->SearchValue);

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->namsinh_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->namsinh_bo->AdvancedSearch->SearchValue);

			// dt_bo
			$tbl_phieucanhan->dt_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->dt_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->dt_bo->AdvancedSearch->SearchValue);

			// hoten_me
			$tbl_phieucanhan->hoten_me->EditCustomAttributes = "";
			$tbl_phieucanhan->hoten_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->hoten_me->AdvancedSearch->SearchValue);

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->EditCustomAttributes = "";
			$tbl_phieucanhan->namsinh_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->namsinh_me->AdvancedSearch->SearchValue);

			// dt_me
			$tbl_phieucanhan->dt_me->EditCustomAttributes = "";
			$tbl_phieucanhan->dt_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->dt_me->AdvancedSearch->SearchValue);

			// gdchinhsach
			$tbl_phieucanhan->gdchinhsach->EditCustomAttributes = "";
			$tbl_phieucanhan->gdchinhsach->EditValue = ew_HtmlEncode($tbl_phieucanhan->gdchinhsach->AdvancedSearch->SearchValue);

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->chucvu_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->chucvu_bo->AdvancedSearch->SearchValue);

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->EditCustomAttributes = "";
			$tbl_phieucanhan->chucvu_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->chucvu_me->AdvancedSearch->SearchValue);

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->EditCustomAttributes = "";
			$tbl_phieucanhan->sdt_lienhegd->EditValue = ew_HtmlEncode($tbl_phieucanhan->sdt_lienhegd->AdvancedSearch->SearchValue);

			// datetime_add
			$tbl_phieucanhan->datetime_add->EditCustomAttributes = "";
			$tbl_phieucanhan->datetime_add->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_phieucanhan->datetime_add->AdvancedSearch->SearchValue, 7), 7));

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->EditCustomAttributes = "";
			$tbl_phieucanhan->datetime_edit->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_phieucanhan->datetime_edit->AdvancedSearch->SearchValue, 7), 7));

			// active
			$tbl_phieucanhan->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$tbl_phieucanhan->active->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$tbl_phieucanhan->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $tbl_phieucanhan;

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
		global $tbl_phieucanhan;
		$tbl_phieucanhan->phieucanhan_id->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_phieucanhan_id");
		$tbl_phieucanhan->chuyenmucphieu_id->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chuyenmucphieu_id");
		$tbl_phieucanhan->msv->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_msv");
		$tbl_phieucanhan->e_mail->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_e_mail");
		$tbl_phieucanhan->hoten->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hoten");
		$tbl_phieucanhan->nganh_hoc->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_nganh_hoc");
		$tbl_phieucanhan->lop->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_lop");
		$tbl_phieucanhan->khoa_hoc->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_khoa_hoc");
		$tbl_phieucanhan->he_daotao->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_he_daotao");
		$tbl_phieucanhan->tinh_trang->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_tinh_trang");
		$tbl_phieucanhan->chungminh_nhandan->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chungminh_nhandan");
		$tbl_phieucanhan->ngaycap_chungminh->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_ngaycap_chungminh");
		$tbl_phieucanhan->hokhau_tt->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hokhau_tt");
		$tbl_phieucanhan->htlt_odau->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_htlt_odau");
		$tbl_phieucanhan->noi_cap->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_noi_cap");
		$tbl_phieucanhan->dan_toc->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dan_toc");
		$tbl_phieucanhan->ton_giao->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_ton_giao");
		$tbl_phieucanhan->ngayvaodang->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_ngayvaodang");
		$tbl_phieucanhan->capbac_chucvu_dang->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_capbac_chucvu_dang");
		$tbl_phieucanhan->nangkhieucanhan->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_nangkhieucanhan");
		$tbl_phieucanhan->dtdc_khicanlh->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dtdc_khicanlh");
		$tbl_phieucanhan->hoten_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hoten_bo");
		$tbl_phieucanhan->namsinh_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_namsinh_bo");
		$tbl_phieucanhan->dt_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dt_bo");
		$tbl_phieucanhan->hoten_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_hoten_me");
		$tbl_phieucanhan->namsinh_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_namsinh_me");
		$tbl_phieucanhan->dt_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_dt_me");
		$tbl_phieucanhan->gdchinhsach->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_gdchinhsach");
		$tbl_phieucanhan->chucvu_bo->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chucvu_bo");
		$tbl_phieucanhan->chucvu_me->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_chucvu_me");
		$tbl_phieucanhan->sdt_lienhegd->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_sdt_lienhegd");
		$tbl_phieucanhan->datetime_add->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_datetime_add");
		$tbl_phieucanhan->datetime_edit->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_datetime_edit");
		$tbl_phieucanhan->active->AdvancedSearch->SearchValue = $tbl_phieucanhan->getAdvancedSearch("x_active");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $tbl_phieucanhan;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($tbl_phieucanhan->ExportAll) {
			$this->lStopRec = $this->lTotalRecs;
		} else { // Export 1 page only
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		}
		if ($tbl_phieucanhan->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($tbl_phieucanhan->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $tbl_phieucanhan->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'msv', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'e_mail', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'hoten', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'nganh_hoc', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'lop', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'khoa_hoc', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'he_daotao', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'tinh_trang', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'hokhau_tt', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'htlt_odau', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'dan_toc', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'ton_giao', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'ngayvaodang', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'capbac_chucvu_dang', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'nangkhieucanhan', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'hoten_bo', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'namsinh_bo', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'dt_bo', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'hoten_me', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'namsinh_me', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'dt_me', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'gdchinhsach', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'chucvu_bo', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'chucvu_me', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'sdt_lienhegd', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'datetime_add', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'datetime_edit', $tbl_phieucanhan->Export);
				ew_ExportAddValue($sExportStr, 'active', $tbl_phieucanhan->Export);
				echo ew_ExportLine($sExportStr, $tbl_phieucanhan->Export);
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row for display
				$tbl_phieucanhan->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($tbl_phieucanhan->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('msv', $tbl_phieucanhan->msv->CurrentValue);
					$XmlDoc->AddField('e_mail', $tbl_phieucanhan->e_mail->CurrentValue);
					$XmlDoc->AddField('hoten', $tbl_phieucanhan->hoten->CurrentValue);
					$XmlDoc->AddField('nganh_hoc', $tbl_phieucanhan->nganh_hoc->CurrentValue);
					$XmlDoc->AddField('lop', $tbl_phieucanhan->lop->CurrentValue);
					$XmlDoc->AddField('khoa_hoc', $tbl_phieucanhan->khoa_hoc->CurrentValue);
					$XmlDoc->AddField('he_daotao', $tbl_phieucanhan->he_daotao->CurrentValue);
					$XmlDoc->AddField('tinh_trang', $tbl_phieucanhan->tinh_trang->CurrentValue);
					$XmlDoc->AddField('hokhau_tt', $tbl_phieucanhan->hokhau_tt->CurrentValue);
					$XmlDoc->AddField('htlt_odau', $tbl_phieucanhan->htlt_odau->CurrentValue);
					$XmlDoc->AddField('dan_toc', $tbl_phieucanhan->dan_toc->CurrentValue);
					$XmlDoc->AddField('ton_giao', $tbl_phieucanhan->ton_giao->CurrentValue);
					$XmlDoc->AddField('ngayvaodang', $tbl_phieucanhan->ngayvaodang->CurrentValue);
					$XmlDoc->AddField('capbac_chucvu_dang', $tbl_phieucanhan->capbac_chucvu_dang->CurrentValue);
					$XmlDoc->AddField('nangkhieucanhan', $tbl_phieucanhan->nangkhieucanhan->CurrentValue);
					$XmlDoc->AddField('hoten_bo', $tbl_phieucanhan->hoten_bo->CurrentValue);
					$XmlDoc->AddField('namsinh_bo', $tbl_phieucanhan->namsinh_bo->CurrentValue);
					$XmlDoc->AddField('dt_bo', $tbl_phieucanhan->dt_bo->CurrentValue);
					$XmlDoc->AddField('hoten_me', $tbl_phieucanhan->hoten_me->CurrentValue);
					$XmlDoc->AddField('namsinh_me', $tbl_phieucanhan->namsinh_me->CurrentValue);
					$XmlDoc->AddField('dt_me', $tbl_phieucanhan->dt_me->CurrentValue);
					$XmlDoc->AddField('gdchinhsach', $tbl_phieucanhan->gdchinhsach->CurrentValue);
					$XmlDoc->AddField('chucvu_bo', $tbl_phieucanhan->chucvu_bo->CurrentValue);
					$XmlDoc->AddField('chucvu_me', $tbl_phieucanhan->chucvu_me->CurrentValue);
					$XmlDoc->AddField('sdt_lienhegd', $tbl_phieucanhan->sdt_lienhegd->CurrentValue);
					$XmlDoc->AddField('datetime_add', $tbl_phieucanhan->datetime_add->CurrentValue);
					$XmlDoc->AddField('datetime_edit', $tbl_phieucanhan->datetime_edit->CurrentValue);
					$XmlDoc->AddField('active', $tbl_phieucanhan->active->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $tbl_phieucanhan->Export <> "csv") { // Vertical format
						echo ew_ExportField('msv', $tbl_phieucanhan->msv->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('e_mail', $tbl_phieucanhan->e_mail->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('hoten', $tbl_phieucanhan->hoten->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('nganh_hoc', $tbl_phieucanhan->nganh_hoc->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('lop', $tbl_phieucanhan->lop->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('khoa_hoc', $tbl_phieucanhan->khoa_hoc->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('he_daotao', $tbl_phieucanhan->he_daotao->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('tinh_trang', $tbl_phieucanhan->tinh_trang->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('hokhau_tt', $tbl_phieucanhan->hokhau_tt->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('htlt_odau', $tbl_phieucanhan->htlt_odau->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('dan_toc', $tbl_phieucanhan->dan_toc->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('ton_giao', $tbl_phieucanhan->ton_giao->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('ngayvaodang', $tbl_phieucanhan->ngayvaodang->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('capbac_chucvu_dang', $tbl_phieucanhan->capbac_chucvu_dang->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('nangkhieucanhan', $tbl_phieucanhan->nangkhieucanhan->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('hoten_bo', $tbl_phieucanhan->hoten_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('namsinh_bo', $tbl_phieucanhan->namsinh_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('dt_bo', $tbl_phieucanhan->dt_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('hoten_me', $tbl_phieucanhan->hoten_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('namsinh_me', $tbl_phieucanhan->namsinh_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('dt_me', $tbl_phieucanhan->dt_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('gdchinhsach', $tbl_phieucanhan->gdchinhsach->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('chucvu_bo', $tbl_phieucanhan->chucvu_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('chucvu_me', $tbl_phieucanhan->chucvu_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('sdt_lienhegd', $tbl_phieucanhan->sdt_lienhegd->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('datetime_add', $tbl_phieucanhan->datetime_add->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('datetime_edit', $tbl_phieucanhan->datetime_edit->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportField('active', $tbl_phieucanhan->active->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->msv->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->e_mail->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->hoten->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->nganh_hoc->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->lop->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->khoa_hoc->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->he_daotao->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->tinh_trang->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->hokhau_tt->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->htlt_odau->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->dan_toc->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->ton_giao->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->ngayvaodang->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->capbac_chucvu_dang->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->nangkhieucanhan->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->hoten_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->namsinh_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->dt_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->hoten_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->namsinh_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->dt_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->gdchinhsach->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->chucvu_bo->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->chucvu_me->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->sdt_lienhegd->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->datetime_add->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->datetime_edit->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						ew_ExportAddValue($sExportStr, $tbl_phieucanhan->active->ExportValue($tbl_phieucanhan->Export, $tbl_phieucanhan->ExportOriginalValue), $tbl_phieucanhan->Export);
						echo ew_ExportLine($sExportStr, $tbl_phieucanhan->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($tbl_phieucanhan->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($tbl_phieucanhan->Export);
		}
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
