<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_bangiaocvinfo.php" ?>
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
$tbl_bangiaocv_list = new ctbl_bangiaocv_list();
$Page =& $tbl_bangiaocv_list;

// Page init processing
$tbl_bangiaocv_list->Page_Init();

// Page main processing
$tbl_bangiaocv_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_bangiaocv_list = new ew_Page("tbl_bangiaocv_list");

// page properties
tbl_bangiaocv_list.PageID = "list"; // page ID
var EW_PAGE_ID = tbl_bangiaocv_list.PageID; // for backward compatibility

// extend page with validate function for search
tbl_bangiaocv_list.ValidateSearch = function(fobj) {
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
tbl_bangiaocv_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_bangiaocv_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_bangiaocv_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_bangiaocv_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {			
			var inst;			
			for (inst in FCKeditorAPI.__Instances)
				FCKeditorAPI.__Instances[inst].UpdateLinkedField();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {
		var inst = FCKeditorAPI.GetInstance(name);		
		if (inst)
			inst.SetHTML(inst.LinkedField.value)
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof FCKeditorAPI != 'undefined') {
		var inst = FCKeditorAPI.GetInstance(name);	
		if (inst && inst.EditorWindow) {
			inst.EditorWindow.focus();
		}
	}
}

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
<?php if ($tbl_bangiaocv->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($tbl_bangiaocv->Export == "" && $tbl_bangiaocv->SelectLimit);
	if (!$bSelectLimit)
		$rs = $tbl_bangiaocv_list->LoadRecordset();
	$tbl_bangiaocv_list->lTotalRecs = ($bSelectLimit) ? $tbl_bangiaocv->SelectRecordCount() : $rs->RecordCount();
	$tbl_bangiaocv_list->lStartRec = 1;
	if ($tbl_bangiaocv_list->lDisplayRecs <= 0) // Display all records
		$tbl_bangiaocv_list->lDisplayRecs = $tbl_bangiaocv_list->lTotalRecs;
	if (!($tbl_bangiaocv->ExportAll && $tbl_bangiaocv->Export <> ""))
		$tbl_bangiaocv_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $tbl_bangiaocv_list->LoadRecordset($tbl_bangiaocv_list->lStartRec-1, $tbl_bangiaocv_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;">
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0" style="border-bottom:1px #000033 solid">
     <tr  >
								<td  width="46%" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách công việc đang triển khai</font></b>
         
                                                                </td>
                                                                <td  width="54%">
                                                                <?php if ($tbl_bangiaocv->Export == "" && $tbl_bangiaocv->CurrentAction == "") { ?>
                                                                        <div style="text-align: right">
                                                                            &nbsp;&nbsp;<a title="In ấn" href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>export=print"><img style="width:20px;" alt="Văn phòng hỗ trợ trực tuyến - Suport online" src='images/print-icon.gif'></a>
                                                                            &nbsp;&nbsp;<a title="Xuất ra excel" href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>export=excel"><img style="width:20px;" alt="Văn phòng hỗ trợ trực tuyến - Suport online" src='images/icon_Excel_2003_32px.gif'></a></a>
                                                                            &nbsp;&nbsp;<a title="Xuất ra word" href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>export=word"><img style="width:20px;" alt="Văn phòng hỗ trợ trực tuyến - Suport online" src='images/export_word.jpg'></a>
                                                                    </div>
                                                                   <?php } ?>
                                                                </td>
								
							</tr>
							
</table> 

</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_bangiaocv->Export == "" && $tbl_bangiaocv->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(tbl_bangiaocv_list);" style="text-decoration: none;"><img id="tbl_bangiaocv_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><b style="font-size: 14px">&nbsp;Tìm kiếm</b></span><br>
<div id="tbl_bangiaocv_list_SearchPanel">
<form name="ftbl_bangiaocvlistsrch" id="ftbl_bangiaocvlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return tbl_bangiaocv_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="tbl_bangiaocv">
<?php
if ($gsSearchError == "")
	$tbl_bangiaocv_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$tbl_bangiaocv->RowType = EW_ROWTYPE_SEARCH;

// Render row
$tbl_bangiaocv_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Tiêu đề công việc</span></td>
		
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_tieude_congviec" id="x_tieude_congviec" size="30" maxlength="200" value="<?php echo $tbl_bangiaocv->tieude_congviec->EditValue ?>"<?php echo $tbl_bangiaocv->tieude_congviec->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Thời gian địa điểm</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_thoigian_diadiem" id="x_thoigian_diadiem" size="30" maxlength="200" value="<?php echo $tbl_bangiaocv->thoigian_diadiem->EditValue ?>"<?php echo $tbl_bangiaocv->thoigian_diadiem->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Phạm vi đối tượng</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_phamvi_doituong" id="x_phamvi_doituong" size="30" maxlength="200" value="<?php echo $tbl_bangiaocv->phamvi_doituong->EditValue ?>"<?php echo $tbl_bangiaocv->phamvi_doituong->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Đối tượng thực hiện</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_doituong_thuchien" id="x_doituong_thuchien" size="30" maxlength="200" value="<?php echo $tbl_bangiaocv->doituong_thuchien->EditValue ?>"<?php echo $tbl_bangiaocv->doituong_thuchien->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Trạng thái</span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_trangthai" name="x_trangthai"<?php echo $tbl_bangiaocv->trangthai->EditAttributes() ?>>
<?php
if (is_array($tbl_bangiaocv->trangthai->EditValue)) {
	$arwrk = $tbl_bangiaocv->trangthai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_bangiaocv->trangthai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="100" value="<?php echo ew_HtmlEncode($tbl_bangiaocv->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Search (*)">&nbsp;
			<!-- <input type="Button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; -->
			<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_bangiaocv->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_bangiaocv->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_bangiaocv->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Từ bất kỳ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_bangiaocv_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($tbl_bangiaocv->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($tbl_bangiaocv->CurrentAction <> "gridadd" && $tbl_bangiaocv->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_bangiaocv_list->Pager)) $tbl_bangiaocv_list->Pager = new cNumericPager($tbl_bangiaocv_list->lStartRec, $tbl_bangiaocv_list->lDisplayRecs, $tbl_bangiaocv_list->lTotalRecs, $tbl_bangiaocv_list->lRecRange) ?>
<?php if ($tbl_bangiaocv_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_bangiaocv_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_bangiaocv_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	 Bản ghi <?php echo $tbl_bangiaocv_list->Pager->FromIndex ?> to <?php echo $tbl_bangiaocv_list->Pager->ToIndex ?> of <?php echo $tbl_bangiaocv_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_bangiaocv_list->sSrchWhere == "0=101") { ?>
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
<?php if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_bangiaocv">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_bangiaocv_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_bangiaocv_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_bangiaocv_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_bangiaocv->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_bangiaocv->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;</a>
<?php } ?>
<?php if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_bangiaocvlist)) alert('Không có bản ghi nào được chọn'); else {document.ftbl_bangiaocvlist.action='tbl_bangiaocvdelete.php';document.ftbl_bangiaocvlist.encoding='application/x-www-form-urlencoded';document.ftbl_bangiaocvlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ftbl_bangiaocvlist" id="ftbl_bangiaocvlist" class="ewForm" action="" method="post">
<?php if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$tbl_bangiaocv_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$tbl_bangiaocv_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$tbl_bangiaocv_list->lOptionCnt++; // edit
}
if ($Security->CanAdd()) {
	$tbl_bangiaocv_list->lOptionCnt++; // copy
}
if ($Security->CanDelete()) {
	$tbl_bangiaocv_list->lOptionCnt++; // Multi-select
}
	$tbl_bangiaocv_list->lOptionCnt += count($tbl_bangiaocv_list->ListOptions->Items); // Custom list options
?>
<?php echo $tbl_bangiaocv->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($tbl_bangiaocv->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;width: 15px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 15px">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 15px"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="tbl_bangiaocv_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_bangiaocv_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($tbl_bangiaocv->tieude_congviec->Visible) { // tieude_congviec ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->tieude_congviec) == "") { ?>
		<td>Tieude Congviec</td>
	<?php } else { ?>
                <td style="width:500px"  class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->tieude_congviec) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tiêu đề công việc&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->tieude_congviec->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->tieude_congviec->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_bangiaocv->thoigian_diadiem->Visible) { // thoigian_diadiem ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->thoigian_diadiem) == "") { ?>
		<td>Thoigian Diadiem</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->thoigian_diadiem) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian đại điểm&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->thoigian_diadiem->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->thoigian_diadiem->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_bangiaocv->phamvi_doituong->Visible) { // phamvi_doituong ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->phamvi_doituong) == "") { ?>
		<td>Phamvi Doituong</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->phamvi_doituong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Phạm vi đối tượng&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->phamvi_doituong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->phamvi_doituong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_bangiaocv->doituong_thuchien->Visible) { // doituong_thuchien ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->doituong_thuchien) == "") { ?>
		<td>Doituong Thuchien</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->doituong_thuchien) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Đối tượng thực hiện&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->doituong_thuchien->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->doituong_thuchien->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_bangiaocv->thoigian_batdau->Visible) { // thoigian_batdau ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->thoigian_batdau) == "") { ?>
		<td>Thoigian Batdau</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->thoigian_batdau) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->thoigian_batdau->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->thoigian_batdau->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_bangiaocv->ghichu->Visible) { // ghichu ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->ghichu) == "") { ?>
		<td>Ghichu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->ghichu) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ghi chú&nbsp;(*)</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->ghichu->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->ghichu->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($tbl_bangiaocv->trangthai->Visible) { // trangthai ?>
	<?php if ($tbl_bangiaocv->SortUrl($tbl_bangiaocv->trangthai) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $tbl_bangiaocv->SortUrl($tbl_bangiaocv->trangthai) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trangthai</td><td style="width: 10px;"><?php if ($tbl_bangiaocv->trangthai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_bangiaocv->trangthai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($tbl_bangiaocv->ExportAll && $tbl_bangiaocv->Export <> "") {
	$tbl_bangiaocv_list->lStopRec = $tbl_bangiaocv_list->lTotalRecs;
} else {
	$tbl_bangiaocv_list->lStopRec = $tbl_bangiaocv_list->lStartRec + $tbl_bangiaocv_list->lDisplayRecs - 1; // Set the last record to display
}
$tbl_bangiaocv_list->lRecCount = $tbl_bangiaocv_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$tbl_bangiaocv->SelectLimit && $tbl_bangiaocv_list->lStartRec > 1)
		$rs->Move($tbl_bangiaocv_list->lStartRec - 1);
}
$tbl_bangiaocv_list->lRowCnt = 0;
while (($tbl_bangiaocv->CurrentAction == "gridadd" || !$rs->EOF) &&
	$tbl_bangiaocv_list->lRecCount < $tbl_bangiaocv_list->lStopRec) {
	$tbl_bangiaocv_list->lRecCount++;
	if (intval($tbl_bangiaocv_list->lRecCount) >= intval($tbl_bangiaocv_list->lStartRec)) {
		$tbl_bangiaocv_list->lRowCnt++;

	// Init row class and style
	$tbl_bangiaocv->CssClass = "";
	$tbl_bangiaocv->CssStyle = "";
	$tbl_bangiaocv->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($tbl_bangiaocv->CurrentAction == "gridadd") {
		$tbl_bangiaocv_list->LoadDefaultValues(); // Load default values
	} else {
		$tbl_bangiaocv_list->LoadRowValues($rs); // Load row values
	}
	$tbl_bangiaocv->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$tbl_bangiaocv_list->RenderRow();
?>
	<tr<?php echo $tbl_bangiaocv->RowAttributes() ?>>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $tbl_bangiaocv->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $tbl_bangiaocv->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($tbl_bangiaocv->bangiao_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($tbl_bangiaocv_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($tbl_bangiaocv->tieude_congviec->Visible) { // tieude_congviec ?>
		<td<?php echo $tbl_bangiaocv->tieude_congviec->CellAttributes() ?>>
                    <div<?php echo $tbl_bangiaocv->tieude_congviec->ViewAttributes() ?>><b><?php echo $tbl_bangiaocv->tieude_congviec->ListViewValue() ?></b></div>
</td>
	<?php } ?>
	<?php if ($tbl_bangiaocv->thoigian_diadiem->Visible) { // thoigian_diadiem ?>
		<td<?php echo $tbl_bangiaocv->thoigian_diadiem->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_diadiem->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_diadiem->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_bangiaocv->phamvi_doituong->Visible) { // phamvi_doituong ?>
		<td<?php echo $tbl_bangiaocv->phamvi_doituong->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->phamvi_doituong->ViewAttributes() ?>><?php echo $tbl_bangiaocv->phamvi_doituong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_bangiaocv->doituong_thuchien->Visible) { // doituong_thuchien ?>
		<td<?php echo $tbl_bangiaocv->doituong_thuchien->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->doituong_thuchien->ViewAttributes() ?>><?php echo $tbl_bangiaocv->doituong_thuchien->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_bangiaocv->thoigian_ketthuc->Visible) { // thoigian_ketthuc ?>
		<td<?php echo $tbl_bangiaocv->thoigian_ketthuc->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_ketthuc->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_batdau->ListViewValue()." - ".$tbl_bangiaocv->thoigian_ketthuc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_bangiaocv->ghichu->Visible) { // ghichu ?>
		<td<?php echo $tbl_bangiaocv->ghichu->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->ghichu->ViewAttributes() ?>>
    <?php if($tbl_bangiaocv->ghichu->ListViewValue() <> null) { ?>
    <a href="<?php echo $tbl_bangiaocv->ViewUrl() ?>">Chi tiết...</a>
    <?php } ?>
</div>
</td>
	<?php } ?>
	<?php if ($tbl_bangiaocv->trangthai->Visible) { // trangthai ?>
		<td<?php echo $tbl_bangiaocv->trangthai->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->trangthai->ViewAttributes() ?>><?php echo $tbl_bangiaocv->trangthai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($tbl_bangiaocv->CurrentAction <> "gridadd")
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
<?php if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($tbl_bangiaocv->CurrentAction <> "gridadd" && $tbl_bangiaocv->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_bangiaocv_list->Pager)) $tbl_bangiaocv_list->Pager = new cNumericPager($tbl_bangiaocv_list->lStartRec, $tbl_bangiaocv_list->lDisplayRecs, $tbl_bangiaocv_list->lTotalRecs, $tbl_bangiaocv_list->lRecRange) ?>
<?php if ($tbl_bangiaocv_list->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_bangiaocv_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_bangiaocv_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_list->PageUrl() ?>start=<?php echo $tbl_bangiaocv_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	bản ghi <?php echo $tbl_bangiaocv_list->Pager->FromIndex ?> to <?php echo $tbl_bangiaocv_list->Pager->ToIndex ?> of <?php echo $tbl_bangiaocv_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_bangiaocv_list->sSrchWhere == "0=101") { ?>
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
<?php if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Page Size&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="tbl_bangiaocv">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($tbl_bangiaocv_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($tbl_bangiaocv_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($tbl_bangiaocv_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($tbl_bangiaocv->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_bangiaocv->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;</a>
<?php } ?>
<?php if ($tbl_bangiaocv_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ftbl_bangiaocvlist)) alert('Không có bản ghi nào được chọn'); else {document.ftbl_bangiaocvlist.action='tbl_bangiaocvdelete.php';document.ftbl_bangiaocvlist.encoding='application/x-www-form-urlencoded';document.ftbl_bangiaocvlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_bangiaocv->Export == "" && $tbl_bangiaocv->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

ew_ToggleSearchPanel(tbl_bangiaocv_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
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
class ctbl_bangiaocv_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'tbl_bangiaocv';

	// Page Object Name
	var $PageObjName = 'tbl_bangiaocv_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) $PageUrl .= "t=" . $tbl_bangiaocv->TableVar . "&"; // add page token
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
		global $objForm, $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_bangiaocv->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_bangiaocv->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_bangiaocv_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_bangiaocv"] = new ctbl_bangiaocv();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_bangiaocv', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_bangiaocv;
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
	$tbl_bangiaocv->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $tbl_bangiaocv->Export; // Get export parameter, used in header
	$gsExportFile = $tbl_bangiaocv->TableVar; // Get export file, used in header
	if ($tbl_bangiaocv->Export == "print" || $tbl_bangiaocv->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($tbl_bangiaocv->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($tbl_bangiaocv->Export == "word") {
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
		global $objForm, $gsSearchError, $Security, $tbl_bangiaocv;
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
		if ($tbl_bangiaocv->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $tbl_bangiaocv->getRecordsPerPage(); // Restore from Session
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
		$tbl_bangiaocv->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$tbl_bangiaocv->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
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
		$tbl_bangiaocv->setSessionWhere($sFilter);
		$tbl_bangiaocv->CurrentFilter = "";

		// Export data only
		if (in_array($tbl_bangiaocv->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $tbl_bangiaocv;
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
			$tbl_bangiaocv->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $tbl_bangiaocv;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->bangiao_id, FALSE); // Field bangiao_id
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->tieude_congviec, FALSE); // Field tieude_congviec
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->thoigian_diadiem, FALSE); // Field thoigian_diadiem
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->phamvi_doituong, FALSE); // Field phamvi_doituong
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->doituong_thuchien, FALSE); // Field doituong_thuchien
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->thoigian_ketthuc, FALSE); // Field thoigian_ketthuc
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->thoigian_batdau, FALSE); // Field thoigian_batdau
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->ghichu, FALSE); // Field ghichu
		$this->BuildSearchSql($sWhere, $tbl_bangiaocv->trangthai, FALSE); // Field trangthai

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($tbl_bangiaocv->bangiao_id); // Field bangiao_id
			$this->SetSearchParm($tbl_bangiaocv->tieude_congviec); // Field tieude_congviec
			$this->SetSearchParm($tbl_bangiaocv->thoigian_diadiem); // Field thoigian_diadiem
			$this->SetSearchParm($tbl_bangiaocv->phamvi_doituong); // Field phamvi_doituong
			$this->SetSearchParm($tbl_bangiaocv->doituong_thuchien); // Field doituong_thuchien
			$this->SetSearchParm($tbl_bangiaocv->thoigian_ketthuc); // Field thoigian_ketthuc
			$this->SetSearchParm($tbl_bangiaocv->thoigian_batdau); // Field thoigian_batdau
			$this->SetSearchParm($tbl_bangiaocv->ghichu); // Field ghichu
			$this->SetSearchParm($tbl_bangiaocv->trangthai); // Field trangthai
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
		global $tbl_bangiaocv;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$tbl_bangiaocv->setAdvancedSearch("x_$FldParm", $FldVal);
		$tbl_bangiaocv->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$tbl_bangiaocv->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$tbl_bangiaocv->setAdvancedSearch("y_$FldParm", $FldVal2);
		$tbl_bangiaocv->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $tbl_bangiaocv;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $tbl_bangiaocv->tieude_congviec->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_bangiaocv->thoigian_diadiem->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_bangiaocv->phamvi_doituong->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_bangiaocv->doituong_thuchien->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $tbl_bangiaocv->ghichu->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $tbl_bangiaocv;
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
			$tbl_bangiaocv->setBasicSearchKeyword($sSearchKeyword);
			$tbl_bangiaocv->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $tbl_bangiaocv;
		$this->sSrchWhere = "";
		$tbl_bangiaocv->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $tbl_bangiaocv;
		$tbl_bangiaocv->setBasicSearchKeyword("");
		$tbl_bangiaocv->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $tbl_bangiaocv;
		$tbl_bangiaocv->setAdvancedSearch("x_bangiao_id", "");
		$tbl_bangiaocv->setAdvancedSearch("x_tieude_congviec", "");
		$tbl_bangiaocv->setAdvancedSearch("x_thoigian_diadiem", "");
		$tbl_bangiaocv->setAdvancedSearch("x_phamvi_doituong", "");
		$tbl_bangiaocv->setAdvancedSearch("x_doituong_thuchien", "");
		$tbl_bangiaocv->setAdvancedSearch("x_thoigian_ketthuc", "");
		$tbl_bangiaocv->setAdvancedSearch("x_thoigian_batdau", "");
		$tbl_bangiaocv->setAdvancedSearch("x_ghichu", "");
		$tbl_bangiaocv->setAdvancedSearch("x_trangthai", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $tbl_bangiaocv;
		$this->sSrchWhere = $tbl_bangiaocv->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $tbl_bangiaocv;
		 $tbl_bangiaocv->bangiao_id->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_bangiao_id");
		 $tbl_bangiaocv->tieude_congviec->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_tieude_congviec");
		 $tbl_bangiaocv->thoigian_diadiem->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_thoigian_diadiem");
		 $tbl_bangiaocv->phamvi_doituong->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_phamvi_doituong");
		 $tbl_bangiaocv->doituong_thuchien->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_doituong_thuchien");
		 $tbl_bangiaocv->thoigian_ketthuc->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_thoigian_ketthuc");
		 $tbl_bangiaocv->thoigian_batdau->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_thoigian_batdau");
		 $tbl_bangiaocv->ghichu->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_ghichu");
		 $tbl_bangiaocv->trangthai->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_trangthai");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $tbl_bangiaocv;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$tbl_bangiaocv->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$tbl_bangiaocv->CurrentOrderType = @$_GET["ordertype"];
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->tieude_congviec); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->thoigian_diadiem); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->phamvi_doituong); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->doituong_thuchien); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->thoigian_ketthuc); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->thoigian_batdau); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->ghichu); // Field 
			$tbl_bangiaocv->UpdateSort($tbl_bangiaocv->trangthai); // Field 
			$tbl_bangiaocv->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $tbl_bangiaocv;
		$sOrderBy = $tbl_bangiaocv->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($tbl_bangiaocv->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_bangiaocv->SqlOrderBy();
				$tbl_bangiaocv->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $tbl_bangiaocv;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_bangiaocv->setSessionOrderBy($sOrderBy);
				$tbl_bangiaocv->tieude_congviec->setSort("");
				$tbl_bangiaocv->thoigian_diadiem->setSort("");
				$tbl_bangiaocv->phamvi_doituong->setSort("");
				$tbl_bangiaocv->doituong_thuchien->setSort("");
				$tbl_bangiaocv->thoigian_ketthuc->setSort("");
				$tbl_bangiaocv->thoigian_batdau->setSort("");
				$tbl_bangiaocv->ghichu->setSort("");
				$tbl_bangiaocv->trangthai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_bangiaocv;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_bangiaocv->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $tbl_bangiaocv;

		// Load search values
		// bangiao_id

		$tbl_bangiaocv->bangiao_id->AdvancedSearch->SearchValue = @$_GET["x_bangiao_id"];
		$tbl_bangiaocv->bangiao_id->AdvancedSearch->SearchOperator = @$_GET["z_bangiao_id"];

		// tieude_congviec
		$tbl_bangiaocv->tieude_congviec->AdvancedSearch->SearchValue = @$_GET["x_tieude_congviec"];
		$tbl_bangiaocv->tieude_congviec->AdvancedSearch->SearchOperator = @$_GET["z_tieude_congviec"];

		// thoigian_diadiem
		$tbl_bangiaocv->thoigian_diadiem->AdvancedSearch->SearchValue = @$_GET["x_thoigian_diadiem"];
		$tbl_bangiaocv->thoigian_diadiem->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_diadiem"];

		// phamvi_doituong
		$tbl_bangiaocv->phamvi_doituong->AdvancedSearch->SearchValue = @$_GET["x_phamvi_doituong"];
		$tbl_bangiaocv->phamvi_doituong->AdvancedSearch->SearchOperator = @$_GET["z_phamvi_doituong"];

		// doituong_thuchien
		$tbl_bangiaocv->doituong_thuchien->AdvancedSearch->SearchValue = @$_GET["x_doituong_thuchien"];
		$tbl_bangiaocv->doituong_thuchien->AdvancedSearch->SearchOperator = @$_GET["z_doituong_thuchien"];

		// thoigian_ketthuc
		$tbl_bangiaocv->thoigian_ketthuc->AdvancedSearch->SearchValue = @$_GET["x_thoigian_ketthuc"];
		$tbl_bangiaocv->thoigian_ketthuc->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_ketthuc"];

		// thoigian_batdau
		$tbl_bangiaocv->thoigian_batdau->AdvancedSearch->SearchValue = @$_GET["x_thoigian_batdau"];
		$tbl_bangiaocv->thoigian_batdau->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_batdau"];

		// ghichu
		$tbl_bangiaocv->ghichu->AdvancedSearch->SearchValue = @$_GET["x_ghichu"];
		$tbl_bangiaocv->ghichu->AdvancedSearch->SearchOperator = @$_GET["z_ghichu"];

		// trangthai
		$tbl_bangiaocv->trangthai->AdvancedSearch->SearchValue = @$_GET["x_trangthai"];
		$tbl_bangiaocv->trangthai->AdvancedSearch->SearchOperator = @$_GET["z_trangthai"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_bangiaocv;

		// Call Recordset Selecting event
		$tbl_bangiaocv->Recordset_Selecting($tbl_bangiaocv->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_bangiaocv->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_bangiaocv->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_bangiaocv;
		$sFilter = $tbl_bangiaocv->KeyFilter();

		// Call Row Selecting event
		$tbl_bangiaocv->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_bangiaocv->CurrentFilter = $sFilter;
		$sSql = $tbl_bangiaocv->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_bangiaocv->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_bangiaocv;
		$tbl_bangiaocv->bangiao_id->setDbValue($rs->fields('bangiao_id'));
		$tbl_bangiaocv->tieude_congviec->setDbValue($rs->fields('tieude_congviec'));
		$tbl_bangiaocv->thoigian_diadiem->setDbValue($rs->fields('thoigian_diadiem'));
		$tbl_bangiaocv->phamvi_doituong->setDbValue($rs->fields('phamvi_doituong'));
		$tbl_bangiaocv->doituong_thuchien->setDbValue($rs->fields('doituong_thuchien'));
		$tbl_bangiaocv->thoigian_ketthuc->setDbValue($rs->fields('thoigian_ketthuc'));
		$tbl_bangiaocv->thoigian_batdau->setDbValue($rs->fields('thoigian_batdau'));
		$tbl_bangiaocv->ghichu->setDbValue($rs->fields('ghichu'));
		$tbl_bangiaocv->trangthai->setDbValue($rs->fields('trangthai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_bangiaocv;

		// Call Row_Rendering event
		$tbl_bangiaocv->Row_Rendering();

		// Common render codes for all row types
		// tieude_congviec

		$tbl_bangiaocv->tieude_congviec->CellCssStyle = "";
		$tbl_bangiaocv->tieude_congviec->CellCssClass = "";

		// thoigian_diadiem
		$tbl_bangiaocv->thoigian_diadiem->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_diadiem->CellCssClass = "";

		// phamvi_doituong
		$tbl_bangiaocv->phamvi_doituong->CellCssStyle = "";
		$tbl_bangiaocv->phamvi_doituong->CellCssClass = "";

		// doituong_thuchien
		$tbl_bangiaocv->doituong_thuchien->CellCssStyle = "";
		$tbl_bangiaocv->doituong_thuchien->CellCssClass = "";

		// thoigian_ketthuc
		$tbl_bangiaocv->thoigian_ketthuc->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_ketthuc->CellCssClass = "";

		// thoigian_batdau
		$tbl_bangiaocv->thoigian_batdau->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_batdau->CellCssClass = "";

		// ghichu
		$tbl_bangiaocv->ghichu->CellCssStyle = "";
		$tbl_bangiaocv->ghichu->CellCssClass = "";

		// trangthai
		$tbl_bangiaocv->trangthai->CellCssStyle = "";
		$tbl_bangiaocv->trangthai->CellCssClass = "";
		if ($tbl_bangiaocv->RowType == EW_ROWTYPE_VIEW) { // View row

			// bangiao_id
			$tbl_bangiaocv->bangiao_id->ViewValue = $tbl_bangiaocv->bangiao_id->CurrentValue;
			$tbl_bangiaocv->bangiao_id->CssStyle = "";
			$tbl_bangiaocv->bangiao_id->CssClass = "";
			$tbl_bangiaocv->bangiao_id->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->ViewValue = $tbl_bangiaocv->tieude_congviec->CurrentValue;
			$tbl_bangiaocv->tieude_congviec->CssStyle = "";
			$tbl_bangiaocv->tieude_congviec->CssClass = "";
			$tbl_bangiaocv->tieude_congviec->ViewCustomAttributes = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->ViewValue = $tbl_bangiaocv->thoigian_diadiem->CurrentValue;
			$tbl_bangiaocv->thoigian_diadiem->CssStyle = "";
			$tbl_bangiaocv->thoigian_diadiem->CssClass = "";
			$tbl_bangiaocv->thoigian_diadiem->ViewCustomAttributes = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->ViewValue = $tbl_bangiaocv->phamvi_doituong->CurrentValue;
			$tbl_bangiaocv->phamvi_doituong->CssStyle = "";
			$tbl_bangiaocv->phamvi_doituong->CssClass = "";
			$tbl_bangiaocv->phamvi_doituong->ViewCustomAttributes = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->ViewValue = $tbl_bangiaocv->doituong_thuchien->CurrentValue;
			$tbl_bangiaocv->doituong_thuchien->CssStyle = "";
			$tbl_bangiaocv->doituong_thuchien->CssClass = "";
			$tbl_bangiaocv->doituong_thuchien->ViewCustomAttributes = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = $tbl_bangiaocv->thoigian_ketthuc->CurrentValue;
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_ketthuc->ViewValue, 7);
			$tbl_bangiaocv->thoigian_ketthuc->CssStyle = "";
			$tbl_bangiaocv->thoigian_ketthuc->CssClass = "";
			$tbl_bangiaocv->thoigian_ketthuc->ViewCustomAttributes = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->ViewValue = $tbl_bangiaocv->thoigian_batdau->CurrentValue;
			$tbl_bangiaocv->thoigian_batdau->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_batdau->ViewValue, 7);
			$tbl_bangiaocv->thoigian_batdau->CssStyle = "";
			$tbl_bangiaocv->thoigian_batdau->CssClass = "";
			$tbl_bangiaocv->thoigian_batdau->ViewCustomAttributes = "";

			// ghichu
			$tbl_bangiaocv->ghichu->ViewValue = $tbl_bangiaocv->ghichu->CurrentValue;
			$tbl_bangiaocv->ghichu->CssStyle = "";
			$tbl_bangiaocv->ghichu->CssClass = "";
			$tbl_bangiaocv->ghichu->ViewCustomAttributes = "";

			// trangthai
			if (strval($tbl_bangiaocv->trangthai->CurrentValue) <> "") {
				switch ($tbl_bangiaocv->trangthai->CurrentValue) {
					case "0":
						$tbl_bangiaocv->trangthai->ViewValue = "<span style=\"color:red\">Không kích hoạt</span>";
						break;
					case "1":
						$tbl_bangiaocv->trangthai->ViewValue = "<b>Kích hoạt</b>";
						break;
                                         case "2":
						$tbl_bangiaocv->trangthai->ViewValue = "Nội bộ";
						break;
					default:
						$tbl_bangiaocv->trangthai->ViewValue = $tbl_bangiaocv->trangthai->CurrentValue;
				}
			} else {
				$tbl_bangiaocv->trangthai->ViewValue = NULL;
			}
			$tbl_bangiaocv->trangthai->CssStyle = "";
			$tbl_bangiaocv->trangthai->CssClass = "";
			$tbl_bangiaocv->trangthai->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->HrefValue = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->HrefValue = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->HrefValue = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->HrefValue = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->HrefValue = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->HrefValue = "";

			// ghichu
			$tbl_bangiaocv->ghichu->HrefValue = "";

			// trangthai
			$tbl_bangiaocv->trangthai->HrefValue = "";
		} elseif ($tbl_bangiaocv->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->EditCustomAttributes = "";
			$tbl_bangiaocv->tieude_congviec->EditValue = ew_HtmlEncode($tbl_bangiaocv->tieude_congviec->AdvancedSearch->SearchValue);

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->EditCustomAttributes = "";
			$tbl_bangiaocv->thoigian_diadiem->EditValue = ew_HtmlEncode($tbl_bangiaocv->thoigian_diadiem->AdvancedSearch->SearchValue);

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->EditCustomAttributes = "";
			$tbl_bangiaocv->phamvi_doituong->EditValue = ew_HtmlEncode($tbl_bangiaocv->phamvi_doituong->AdvancedSearch->SearchValue);

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->EditCustomAttributes = "";
			$tbl_bangiaocv->doituong_thuchien->EditValue = ew_HtmlEncode($tbl_bangiaocv->doituong_thuchien->AdvancedSearch->SearchValue);

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->EditCustomAttributes = "";
			$tbl_bangiaocv->thoigian_ketthuc->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_bangiaocv->thoigian_ketthuc->AdvancedSearch->SearchValue, 7), 7));

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->EditCustomAttributes = "";
			$tbl_bangiaocv->thoigian_batdau->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($tbl_bangiaocv->thoigian_batdau->AdvancedSearch->SearchValue, 7), 7));

			// ghichu
			$tbl_bangiaocv->ghichu->EditCustomAttributes = "";
			$tbl_bangiaocv->ghichu->EditValue = ew_HtmlEncode($tbl_bangiaocv->ghichu->AdvancedSearch->SearchValue);

			// trangthai
			$tbl_bangiaocv->trangthai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
                        $arwrk[] = array("2", "Nội bộ");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$tbl_bangiaocv->trangthai->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$tbl_bangiaocv->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $tbl_bangiaocv;

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
		global $tbl_bangiaocv;
		$tbl_bangiaocv->bangiao_id->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_bangiao_id");
		$tbl_bangiaocv->tieude_congviec->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_tieude_congviec");
		$tbl_bangiaocv->thoigian_diadiem->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_thoigian_diadiem");
		$tbl_bangiaocv->phamvi_doituong->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_phamvi_doituong");
		$tbl_bangiaocv->doituong_thuchien->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_doituong_thuchien");
		$tbl_bangiaocv->thoigian_ketthuc->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_thoigian_ketthuc");
		$tbl_bangiaocv->thoigian_batdau->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_thoigian_batdau");
		$tbl_bangiaocv->ghichu->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_ghichu");
		$tbl_bangiaocv->trangthai->AdvancedSearch->SearchValue = $tbl_bangiaocv->getAdvancedSearch("x_trangthai");
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $tbl_bangiaocv;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($tbl_bangiaocv->ExportAll) {
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
		if ($tbl_bangiaocv->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($tbl_bangiaocv->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $tbl_bangiaocv->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'bangiao_id', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Tiêu dề công việc', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Thời gian địa điểm', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Phạm vi đối tượng', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Đối tượng thực hiện', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Thời gian kết thúc', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Thời gian bắt đầu', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'Trạng thái', $tbl_bangiaocv->Export);
				echo ew_ExportLine($sExportStr, $tbl_bangiaocv->Export);
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
				$tbl_bangiaocv->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($tbl_bangiaocv->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('bangiao_id', $tbl_bangiaocv->bangiao_id->CurrentValue);
					$XmlDoc->AddField('tieude_congviec', $tbl_bangiaocv->tieude_congviec->CurrentValue);
					$XmlDoc->AddField('thoigian_diadiem', $tbl_bangiaocv->thoigian_diadiem->CurrentValue);
					$XmlDoc->AddField('phamvi_doituong', $tbl_bangiaocv->phamvi_doituong->CurrentValue);
					$XmlDoc->AddField('doituong_thuchien', $tbl_bangiaocv->doituong_thuchien->CurrentValue);
					$XmlDoc->AddField('thoigian_ketthuc', $tbl_bangiaocv->thoigian_ketthuc->CurrentValue);
					$XmlDoc->AddField('thoigian_batdau', $tbl_bangiaocv->thoigian_batdau->CurrentValue);
					$XmlDoc->AddField('trangthai', $tbl_bangiaocv->trangthai->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $tbl_bangiaocv->Export <> "csv") { // Vertical format
						echo ew_ExportField('bangiao_id', $tbl_bangiaocv->bangiao_id->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('tieude_congviec', $tbl_bangiaocv->tieude_congviec->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('thoigian_diadiem', $tbl_bangiaocv->thoigian_diadiem->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('phamvi_doituong', $tbl_bangiaocv->phamvi_doituong->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('doituong_thuchien', $tbl_bangiaocv->doituong_thuchien->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('thoigian_ketthuc', $tbl_bangiaocv->thoigian_ketthuc->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('thoigian_batdau', $tbl_bangiaocv->thoigian_batdau->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('trangthai', $tbl_bangiaocv->trangthai->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->bangiao_id->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->tieude_congviec->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->thoigian_diadiem->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->phamvi_doituong->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->doituong_thuchien->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->thoigian_ketthuc->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->thoigian_batdau->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->trangthai->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportLine($sExportStr, $tbl_bangiaocv->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($tbl_bangiaocv->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($tbl_bangiaocv->Export);
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
