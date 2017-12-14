<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_list = new cadvertising_list();
$Page =& $advertising_list;

// Page init processing
$advertising_list->Page_Init();

// Page main processing
$advertising_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_list = new ew_Page("advertising_list");

// page properties
advertising_list.PageID = "list"; // page ID
var EW_PAGE_ID = advertising_list.PageID; // for backward compatibility

// extend page with validate function for search
advertising_list.ValidateSearch = function(fobj) {
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
advertising_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($advertising->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($advertising->Export == "" && $advertising->SelectLimit);
	if (!$bSelectLimit)
		$rs = $advertising_list->LoadRecordset();
	$advertising_list->lTotalRecs = ($bSelectLimit) ? $advertising->SelectRecordCount() : $rs->RecordCount();
	$advertising_list->lStartRec = 1;
	if ($advertising_list->lDisplayRecs <= 0) // Display all records
		$advertising_list->lDisplayRecs = $advertising_list->lTotalRecs;
	if (!($advertising->ExportAll && $advertising->Export <> ""))
		$advertising_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $advertising_list->LoadRecordset($advertising_list->lStartRec-1, $advertising_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục quảng cáo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($advertising->Export == "" && $advertising->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(advertising_list);" style="text-decoration: none;"><img id="advertising_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="advertising_list_SearchPanel">
<form name="fadvertisinglistsrch" id="fadvertisinglistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return advertising_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="advertising">
<br>
<?php
if ($gsSearchError == "")
	$advertising_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$advertising->RowType = EW_ROWTYPE_SEARCH;

// Render row
$advertising_list->RenderRow();
?>
<table class="ewBasicSearch">
	
	<tr>
		<td><span class="phpmaker">Vị trí hiển thị</span></td>
		<td><input type="hidden" name="z_vitri_quangcao" id="z_vitri_quangcao" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_vitri_quangcao" name="x_vitri_quangcao"<?php echo $advertising->vitri_quangcao->EditAttributes() ?>>
<?php
if (is_array($advertising->vitri_quangcao->EditValue)) {
	$arwrk = $advertising->vitri_quangcao->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->vitri_quangcao->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><input type="hidden" name="z_trang_thai" id="z_trang_thai" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $advertising->trang_thai->EditAttributes() ?>>
<?php
if (is_array($advertising->trang_thai->EditValue)) {
	$arwrk = $advertising->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->trang_thai->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($advertising->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; 
			<a href="<?php echo $advertising_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($advertising->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($advertising->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($advertising->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $advertising_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($advertising->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($advertising->CurrentAction <> "gridadd" && $advertising->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_list->Pager)) $advertising_list->Pager = new cNumericPager($advertising_list->lStartRec, $advertising_list->lDisplayRecs, $advertising_list->lTotalRecs, $advertising_list->lRecRange) ?>
<?php if ($advertising_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $advertising_list->Pager->FromIndex ?> đến <?php echo $advertising_list->Pager->ToIndex ?> của <?php echo $advertising_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có quảng cáo
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($advertising_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="advertising">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($advertising_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($advertising_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($advertising_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($advertising->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertisinglist)) alert('Chưa chọn quảng cáo'); else {document.fadvertisinglist.action='advertisingdelete.php';document.fadvertisinglist.encoding='application/x-www-form-urlencoded';document.fadvertisinglist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertisinglist)) alert('Chưa chọn quảng cáo'); else {document.fadvertisinglist.action='advertisingupdate.php';document.fadvertisinglist.encoding='application/x-www-form-urlencoded';document.fadvertisinglist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fadvertisinglist" id="fadvertisinglist" class="ewForm" action="" method="post">
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$advertising_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$advertising_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$advertising_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$advertising_list->lOptionCnt++; // Multi-select
}
	$advertising_list->lOptionCnt += count($advertising_list->ListOptions->Items); // Custom list options
?>
<?php echo $advertising->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($advertising->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="advertising_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($advertising_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($advertising->tieu_de->Visible) { // tieu_de ?>
	<?php if ($advertising->SortUrl($advertising->tieu_de) == "") { ?>
		<td style="white-space: nowrap;">Tieu De</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->tieu_de) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tiêu đề</td><td style="width: 10px;"><?php if ($advertising->tieu_de->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->tieu_de->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising->duongdan_lienket->Visible) { // duongdan_lienket ?>
	<?php if ($advertising->SortUrl($advertising->duongdan_lienket) == "") { ?>
		<td style="width: 100px; white-space: nowrap;">Duongdan Lienket</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->duongdan_lienket) ?>',1);" style="width: 100px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Website</td><td style="width: 10px;"><?php if ($advertising->duongdan_lienket->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->duongdan_lienket->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising->vitri_quangcao->Visible) { // vitri_quangcao ?>
	<?php if ($advertising->SortUrl($advertising->vitri_quangcao) == "") { ?>
		<td style="width: 80px; white-space: nowrap;">Vitri Quangcao</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->vitri_quangcao) ?>',1);" style="width: 80px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Vị trí hiển thị</td><td style="width: 10px;"><?php if ($advertising->vitri_quangcao->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->vitri_quangcao->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($advertising->trang_thai->Visible) { // trang_thai ?>
	<?php if ($advertising->SortUrl($advertising->trang_thai) == "") { ?>
		<td style="width: 80px; white-space: nowrap;">Trang Thai</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->trang_thai) ?>',1);" style="width: 80px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Xuất bản</td><td style="width: 10px;"><?php if ($advertising->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($advertising->ExportAll && $advertising->Export <> "") {
	$advertising_list->lStopRec = $advertising_list->lTotalRecs;
} else {
	$advertising_list->lStopRec = $advertising_list->lStartRec + $advertising_list->lDisplayRecs - 1; // Set the last record to display
}
$advertising_list->lRecCount = $advertising_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$advertising->SelectLimit && $advertising_list->lStartRec > 1)
		$rs->Move($advertising_list->lStartRec - 1);
}
$advertising_list->lRowCnt = 0;
while (($advertising->CurrentAction == "gridadd" || !$rs->EOF) &&
	$advertising_list->lRecCount < $advertising_list->lStopRec) {
	$advertising_list->lRecCount++;
	if (intval($advertising_list->lRecCount) >= intval($advertising_list->lStartRec)) {
		$advertising_list->lRowCnt++;

	// Init row class and style
	$advertising->CssClass = "";
	$advertising->CssStyle = "";
	$advertising->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($advertising->CurrentAction == "gridadd") {
		$advertising_list->LoadDefaultValues(); // Load default values
	} else {
		$advertising_list->LoadRowValues($rs); // Load row values
	}
	$advertising->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$advertising_list->RenderRow();
?>
	<tr<?php echo $advertising->RowAttributes() ?>>
<?php if ($advertising->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $advertising->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $advertising->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($advertising->lienket_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($advertising_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($advertising->tieu_de->Visible) { // tieu_de ?>
		<td><table><tr><td<?php echo $advertising->tieu_de->CellAttributes() ?>>
<div<?php echo $advertising->tieu_de->ViewAttributes() ?>><?php echo $advertising->tieu_de->ListViewValue() ?></div>
</td></tr><tr>
	<?php } ?>
	<?php if ($advertising->anh_logo->Visible) { // anh_logo ?>
		<td<?php echo $advertising->anh_logo->CellAttributes() ?>>
<?php if ($advertising->anh_logo->HrefValue <> "") { ?>
<?php if (!is_null($advertising->anh_logo->Upload->DbValue)) { ?>
<!--vu viet hung-->
		<?php if ($advertising->dorong_anh->CurrentValue>260){
		$width="width=\"260\"";
		$x_w="<param name=\"width\" value=\"260\" />";
		$resize=1;}
		else {$width="width=\"".$advertising->dorong_anh->CurrentValue."\"";
		$x_w="<param name=\"width\" value=\"".$advertising->dorong_anh->CurrentValue."\" />";
		$resize=0;}?>
		<?php if($resize==1){
		$x_size=round($advertising->chieucao_anh->CurrentValue*(260/$advertising->dorong_anh->CurrentValue));
		$height="height=\"".$x_size."\"";
		$x_h="<param name=\"height\" value=\"".$x_size."\" />";}
		else {$height="height=\"".$advertising->chieucao_anh->CurrentValue."\"";
		$x_h="<param name=\"height\" value=\"".$advertising->chieucao_anh->CurrentValue."\" />";}?>
<?php if ($advertising->kieu_anh->CurrentValue <>"swf"){
 ?>
<img src="advertising_anh_logo_bv.php?lienket_id=<?php echo $advertising->lienket_id->CurrentValue ?>" border=0 <?php echo $width." ".$height;?>>
<?php }
else {?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" <?php echo $width." ".$height;?> ><?php echo $x_w." ".$x_h;?><param name="src" value="flash.php?text=<?php echo $advertising->lienket_id->CurrentValue ;?>" /><embed type="application/x-shockwave-flash" <?php echo $width." ".$height;?> src="flash.php?text=<?php echo $advertising->lienket_id->CurrentValue ;?>"></embed></object>
 <?php } ?>


<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($advertising->anh_logo->Upload->DbValue)) { ?>
<img src="advertising_anh_logo_bv.php?lienket_id=<?php echo $advertising->lienket_id->CurrentValue ?>" border=0<?php echo $advertising->anh_logo->ViewAttributes() ?>>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td></tr></table></td>
	<?php } ?>
	<?php if ($advertising->duongdan_lienket->Visible) { // duongdan_lienket ?>
		<td<?php echo $advertising->duongdan_lienket->CellAttributes() ?>>
<div<?php echo $advertising->duongdan_lienket->ViewAttributes() ?>><?php echo $advertising->duongdan_lienket->ListViewValue() ?></div>
</td>
	<?php } ?>
	
	<?php if ($advertising->vitri_quangcao->Visible) { // vitri_quangcao ?>
		<td<?php echo $advertising->vitri_quangcao->CellAttributes() ?>>
<div<?php echo $advertising->vitri_quangcao->ViewAttributes() ?>><?php echo $advertising->vitri_quangcao->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($advertising->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $advertising->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising->trang_thai->ViewAttributes() ?>><?php echo $advertising->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($advertising->CurrentAction <> "gridadd")
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
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<?php if ($advertising->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($advertising->CurrentAction <> "gridadd" && $advertising->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_list->Pager)) $advertising_list->Pager = new cNumericPager($advertising_list->lStartRec, $advertising_list->lDisplayRecs, $advertising_list->lTotalRecs, $advertising_list->lRecRange) ?>
<?php if ($advertising_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Từ <?php echo $advertising_list->Pager->FromIndex ?> đến <?php echo $advertising_list->Pager->ToIndex ?> của <?php echo $advertising_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có quảng cáo
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($advertising_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="advertising">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($advertising_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($advertising_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($advertising_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($advertising->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($advertising_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertisinglist)) alert('Chưa chọn quảng cáo'); else {document.fadvertisinglist.action='advertisingdelete.php';document.fadvertisinglist.encoding='application/x-www-form-urlencoded';document.fadvertisinglist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertisinglist)) alert('Chưa chọn quảng cáo'); else {document.fadvertisinglist.action='advertisingupdate.php';document.fadvertisinglist.encoding='application/x-www-form-urlencoded';document.fadvertisinglist.submit();};return false;"><img border="0" src="images/cmd_xb.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($advertising->Export == "" && $advertising->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(advertising_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($advertising->Export == "") { ?>
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
class cadvertising_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'advertising';

	// Page Object Name
	var $PageObjName = 'advertising_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising"] = new cadvertising();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising;
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
	$advertising->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $advertising->Export; // Get export parameter, used in header
	$gsExportFile = $advertising->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $advertising;
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
		if ($advertising->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $advertising->getRecordsPerPage(); // Restore from Session
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
		$advertising->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$advertising->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$advertising->setStartRecordNumber($this->lStartRec);
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
		$advertising->setSessionWhere($sFilter);
		$advertising->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $advertising;
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
			$advertising->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $advertising;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $advertising->lienket_id, FALSE); // Field lienket_id
		$this->BuildSearchSql($sWhere, $advertising->tieu_de, FALSE); // Field tieu_de
		$this->BuildSearchSql($sWhere, $advertising->kieu_anh, FALSE); // Field kieu_anh
		$this->BuildSearchSql($sWhere, $advertising->duongdan_lienket, FALSE); // Field duongdan_lienket
		$this->BuildSearchSql($sWhere, $advertising->ten_viettat, FALSE); // Field ten_viettat
		$this->BuildSearchSql($sWhere, $advertising->mo_ta, FALSE); // Field mo_ta
		$this->BuildSearchSql($sWhere, $advertising->dorong_anh, FALSE); // Field dorong_anh
		$this->BuildSearchSql($sWhere, $advertising->chieucao_anh, FALSE); // Field chieucao_anh
		$this->BuildSearchSql($sWhere, $advertising->thutu_sapxep, FALSE); // Field thutu_sapxep
		$this->BuildSearchSql($sWhere, $advertising->luachon_hienthi, FALSE); // Field luachon_hienthi
		$this->BuildSearchSql($sWhere, $advertising->vitri_quangcao, FALSE); // Field vitri_quangcao
		$this->BuildSearchSql($sWhere, $advertising->solan_truycap, FALSE); // Field solan_truycap
		$this->BuildSearchSql($sWhere, $advertising->thoigian_them, FALSE); // Field thoigian_them
		$this->BuildSearchSql($sWhere, $advertising->thoigian_sua, FALSE); // Field thoigian_sua
		$this->BuildSearchSql($sWhere, $advertising->nguoi_them, FALSE); // Field nguoi_them
		$this->BuildSearchSql($sWhere, $advertising->nguoi_sua, FALSE); // Field nguoi_sua
		$this->BuildSearchSql($sWhere, $advertising->trang_thai, FALSE); // Field trang_thai

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($advertising->lienket_id); // Field lienket_id
			$this->SetSearchParm($advertising->tieu_de); // Field tieu_de
			$this->SetSearchParm($advertising->kieu_anh); // Field kieu_anh
			$this->SetSearchParm($advertising->duongdan_lienket); // Field duongdan_lienket
			$this->SetSearchParm($advertising->ten_viettat); // Field ten_viettat
			$this->SetSearchParm($advertising->mo_ta); // Field mo_ta
			$this->SetSearchParm($advertising->dorong_anh); // Field dorong_anh
			$this->SetSearchParm($advertising->chieucao_anh); // Field chieucao_anh
			$this->SetSearchParm($advertising->thutu_sapxep); // Field thutu_sapxep
			$this->SetSearchParm($advertising->luachon_hienthi); // Field luachon_hienthi
			$this->SetSearchParm($advertising->vitri_quangcao); // Field vitri_quangcao
			$this->SetSearchParm($advertising->solan_truycap); // Field solan_truycap
			$this->SetSearchParm($advertising->thoigian_them); // Field thoigian_them
			$this->SetSearchParm($advertising->thoigian_sua); // Field thoigian_sua
			$this->SetSearchParm($advertising->nguoi_them); // Field nguoi_them
			$this->SetSearchParm($advertising->nguoi_sua); // Field nguoi_sua
			$this->SetSearchParm($advertising->trang_thai); // Field trang_thai
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
		global $advertising;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$advertising->setAdvancedSearch("x_$FldParm", $FldVal);
		$advertising->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$advertising->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$advertising->setAdvancedSearch("y_$FldParm", $FldVal2);
		$advertising->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $advertising;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $advertising->tieu_de->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $advertising->duongdan_lienket->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $advertising;
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
			$advertising->setBasicSearchKeyword($sSearchKeyword);
			$advertising->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $advertising;
		$this->sSrchWhere = "";
		$advertising->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $advertising;
		$advertising->setBasicSearchKeyword("");
		$advertising->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $advertising;
		$advertising->setAdvancedSearch("x_lienket_id", "");
		$advertising->setAdvancedSearch("x_tieu_de", "");
		$advertising->setAdvancedSearch("x_kieu_anh", "");
		$advertising->setAdvancedSearch("x_duongdan_lienket", "");
		$advertising->setAdvancedSearch("x_ten_viettat", "");
		$advertising->setAdvancedSearch("x_mo_ta", "");
		$advertising->setAdvancedSearch("x_dorong_anh", "");
		$advertising->setAdvancedSearch("x_chieucao_anh", "");
		$advertising->setAdvancedSearch("x_thutu_sapxep", "");
		$advertising->setAdvancedSearch("x_luachon_hienthi", "");
		$advertising->setAdvancedSearch("x_vitri_quangcao", "");
		$advertising->setAdvancedSearch("x_solan_truycap", "");
		$advertising->setAdvancedSearch("x_thoigian_them", "");
		$advertising->setAdvancedSearch("x_thoigian_sua", "");
		$advertising->setAdvancedSearch("x_nguoi_them", "");
		$advertising->setAdvancedSearch("x_nguoi_sua", "");
		$advertising->setAdvancedSearch("x_trang_thai", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $advertising;
		$this->sSrchWhere = $advertising->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $advertising;
		 $advertising->lienket_id->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_lienket_id");
		 $advertising->tieu_de->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_tieu_de");
		 $advertising->kieu_anh->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_kieu_anh");
		 $advertising->duongdan_lienket->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_duongdan_lienket");
		 $advertising->ten_viettat->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_ten_viettat");
		 $advertising->mo_ta->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_mo_ta");
		 $advertising->dorong_anh->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_dorong_anh");
		 $advertising->chieucao_anh->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_chieucao_anh");
		 $advertising->thutu_sapxep->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_thutu_sapxep");
		 $advertising->luachon_hienthi->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_luachon_hienthi");
		 $advertising->vitri_quangcao->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_vitri_quangcao");
		 $advertising->solan_truycap->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_solan_truycap");
		 $advertising->thoigian_them->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_thoigian_them");
		 $advertising->thoigian_sua->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_thoigian_sua");
		 $advertising->nguoi_them->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_nguoi_them");
		 $advertising->nguoi_sua->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_nguoi_sua");
		 $advertising->trang_thai->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_trang_thai");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $advertising;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$advertising->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$advertising->CurrentOrderType = @$_GET["ordertype"];
			$advertising->UpdateSort($advertising->tieu_de); // Field 
			$advertising->UpdateSort($advertising->duongdan_lienket); // Field 
			$advertising->UpdateSort($advertising->luachon_hienthi); // Field 
			$advertising->UpdateSort($advertising->vitri_quangcao); // Field 
			$advertising->UpdateSort($advertising->trang_thai); // Field 
			$advertising->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $advertising;
		$sOrderBy = $advertising->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($advertising->SqlOrderBy() <> "") {
				$sOrderBy = $advertising->SqlOrderBy();
				$advertising->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $advertising;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$advertising->setSessionOrderBy($sOrderBy);
				$advertising->tieu_de->setSort("");
				$advertising->duongdan_lienket->setSort("");
				$advertising->luachon_hienthi->setSort("");
				$advertising->vitri_quangcao->setSort("");
				$advertising->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $advertising;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $advertising;

		// Load search values
		// lienket_id

		$advertising->lienket_id->AdvancedSearch->SearchValue = @$_GET["x_lienket_id"];
		$advertising->lienket_id->AdvancedSearch->SearchOperator = @$_GET["z_lienket_id"];

		// tieu_de
		$advertising->tieu_de->AdvancedSearch->SearchValue = @$_GET["x_tieu_de"];
		$advertising->tieu_de->AdvancedSearch->SearchOperator = @$_GET["z_tieu_de"];

		// kieu_anh
		$advertising->kieu_anh->AdvancedSearch->SearchValue = @$_GET["x_kieu_anh"];
		$advertising->kieu_anh->AdvancedSearch->SearchOperator = @$_GET["z_kieu_anh"];

		// duongdan_lienket
		$advertising->duongdan_lienket->AdvancedSearch->SearchValue = @$_GET["x_duongdan_lienket"];
		$advertising->duongdan_lienket->AdvancedSearch->SearchOperator = @$_GET["z_duongdan_lienket"];

		// ten_viettat
		$advertising->ten_viettat->AdvancedSearch->SearchValue = @$_GET["x_ten_viettat"];
		$advertising->ten_viettat->AdvancedSearch->SearchOperator = @$_GET["z_ten_viettat"];

		// mo_ta
		$advertising->mo_ta->AdvancedSearch->SearchValue = @$_GET["x_mo_ta"];
		$advertising->mo_ta->AdvancedSearch->SearchOperator = @$_GET["z_mo_ta"];

		// dorong_anh
		$advertising->dorong_anh->AdvancedSearch->SearchValue = @$_GET["x_dorong_anh"];
		$advertising->dorong_anh->AdvancedSearch->SearchOperator = @$_GET["z_dorong_anh"];

		// chieucao_anh
		$advertising->chieucao_anh->AdvancedSearch->SearchValue = @$_GET["x_chieucao_anh"];
		$advertising->chieucao_anh->AdvancedSearch->SearchOperator = @$_GET["z_chieucao_anh"];

		// thutu_sapxep
		$advertising->thutu_sapxep->AdvancedSearch->SearchValue = @$_GET["x_thutu_sapxep"];
		$advertising->thutu_sapxep->AdvancedSearch->SearchOperator = @$_GET["z_thutu_sapxep"];

		// luachon_hienthi
		$advertising->luachon_hienthi->AdvancedSearch->SearchValue = @$_GET["x_luachon_hienthi"];
		$advertising->luachon_hienthi->AdvancedSearch->SearchOperator = @$_GET["z_luachon_hienthi"];

		// vitri_quangcao
		$advertising->vitri_quangcao->AdvancedSearch->SearchValue = @$_GET["x_vitri_quangcao"];
		$advertising->vitri_quangcao->AdvancedSearch->SearchOperator = @$_GET["z_vitri_quangcao"];

		// solan_truycap
		$advertising->solan_truycap->AdvancedSearch->SearchValue = @$_GET["x_solan_truycap"];
		$advertising->solan_truycap->AdvancedSearch->SearchOperator = @$_GET["z_solan_truycap"];

		// thoigian_them
		$advertising->thoigian_them->AdvancedSearch->SearchValue = @$_GET["x_thoigian_them"];
		$advertising->thoigian_them->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_them"];

		// thoigian_sua
		$advertising->thoigian_sua->AdvancedSearch->SearchValue = @$_GET["x_thoigian_sua"];
		$advertising->thoigian_sua->AdvancedSearch->SearchOperator = @$_GET["z_thoigian_sua"];

		// nguoi_them
		$advertising->nguoi_them->AdvancedSearch->SearchValue = @$_GET["x_nguoi_them"];
		$advertising->nguoi_them->AdvancedSearch->SearchOperator = @$_GET["z_nguoi_them"];

		// nguoi_sua
		$advertising->nguoi_sua->AdvancedSearch->SearchValue = @$_GET["x_nguoi_sua"];
		$advertising->nguoi_sua->AdvancedSearch->SearchOperator = @$_GET["z_nguoi_sua"];

		// trang_thai
		$advertising->trang_thai->AdvancedSearch->SearchValue = @$_GET["x_trang_thai"];
		$advertising->trang_thai->AdvancedSearch->SearchOperator = @$_GET["z_trang_thai"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising;
		$advertising->lienket_id->setDbValue($rs->fields('lienket_id'));
		$advertising->tieu_de->setDbValue($rs->fields('tieu_de'));
		$advertising->anh_logo->Upload->DbValue = $rs->fields('anh_logo');
		$advertising->kieu_anh->setDbValue($rs->fields('kieu_anh'));
		$advertising->duongdan_lienket->setDbValue($rs->fields('duongdan_lienket'));
		$advertising->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$advertising->mo_ta->setDbValue($rs->fields('mo_ta'));
		$advertising->dorong_anh->setDbValue($rs->fields('dorong_anh'));
		$advertising->chieucao_anh->setDbValue($rs->fields('chieucao_anh'));
		$advertising->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising->luachon_hienthi->setDbValue($rs->fields('luachon_hienthi'));
		$advertising->vitri_quangcao->setDbValue($rs->fields('vitri_quangcao'));
		$advertising->solan_truycap->setDbValue($rs->fields('solan_truycap'));
		$advertising->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$advertising->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$advertising->trang_thai->setDbValue($rs->fields('trang_thai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising;

		// Call Row_Rendering event
		$advertising->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$advertising->tieu_de->CellCssStyle = "white-space: nowrap;";
		$advertising->tieu_de->CellCssClass = "";

		// anh_logo
		$advertising->anh_logo->CellCssStyle = "white-space: nowrap;";
		$advertising->anh_logo->CellCssClass = "";

		// duongdan_lienket
		$advertising->duongdan_lienket->CellCssStyle = "width: 100px; white-space: nowrap;";
		$advertising->duongdan_lienket->CellCssClass = "";

		// luachon_hienthi
		$advertising->luachon_hienthi->CellCssStyle = "width: 80px; white-space: nowrap;";
		$advertising->luachon_hienthi->CellCssClass = "";

		// vitri_quangcao
		$advertising->vitri_quangcao->CellCssStyle = "width: 80px; white-space: nowrap;";
		$advertising->vitri_quangcao->CellCssClass = "";

		// trang_thai
		$advertising->trang_thai->CellCssStyle = "width: 80px; white-space: nowrap;";
		$advertising->trang_thai->CellCssClass = "";
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$advertising->tieu_de->ViewValue = $advertising->tieu_de->CurrentValue;
			$advertising->tieu_de->CssStyle = "";
			$advertising->tieu_de->CssClass = "";
			$advertising->tieu_de->ViewCustomAttributes = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->ViewValue = "Anh Logo";
				$advertising->anh_logo->ImageWidth = 200;
				$advertising->anh_logo->ImageHeight = 0;
				$advertising->anh_logo->ImageAlt = "";
			} else {
				$advertising->anh_logo->ViewValue = "";
			}
			$advertising->anh_logo->CssStyle = "";
			$advertising->anh_logo->CssClass = "";
			$advertising->anh_logo->ViewCustomAttributes = "";

			// duongdan_lienket
			$advertising->duongdan_lienket->ViewValue = $advertising->duongdan_lienket->CurrentValue;
			$advertising->duongdan_lienket->CssStyle = "";
			$advertising->duongdan_lienket->CssClass = "";
			$advertising->duongdan_lienket->ViewCustomAttributes = "";

			// luachon_hienthi
			if (strval($advertising->luachon_hienthi->CurrentValue) <> "") {
				switch ($advertising->luachon_hienthi->CurrentValue) {
					case "1":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn";
						break;
					case "2":
						$advertising->luachon_hienthi->ViewValue = "Quảng cáo";
						break;
					case "3":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn và quảng cáo";
						break;
					default:
						$advertising->luachon_hienthi->ViewValue = $advertising->luachon_hienthi->CurrentValue;
				}
			} else {
				$advertising->luachon_hienthi->ViewValue = NULL;
			}
			$advertising->luachon_hienthi->CssStyle = "";
			$advertising->luachon_hienthi->CssClass = "";
			$advertising->luachon_hienthi->ViewCustomAttributes = "";

			// vitri_quangcao
			if (strval($advertising->vitri_quangcao->CurrentValue) <> "") {
				switch ($advertising->vitri_quangcao->CurrentValue) {
					case "1":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang tin ";
						break;
                                        case "2":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên phải trang tin ";
						break;
                                        case "3":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang sàn TMĐT ";
						break;
					case "4":
						$advertising->vitri_quangcao->ViewValue = "Ảnh banner trang tin ";
						break;
                                        case "5":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo vị trí giữa sàn TMĐT";
						break;
					default:
						$advertising->vitri_quangcao->ViewValue = $advertising->vitri_quangcao->CurrentValue;
				}
			} else {
				$advertising->vitri_quangcao->ViewValue = NULL;
			}
			$advertising->vitri_quangcao->CssStyle = "";
			$advertising->vitri_quangcao->CssClass = "";
			$advertising->vitri_quangcao->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising->trang_thai->CurrentValue) <> "") {
				switch ($advertising->trang_thai->CurrentValue) {
					case "0":
						$advertising->trang_thai->ViewValue = "<font color=\"#FF0000\">Chưa xuất bản</font>";
						break;
					case "1":
						$advertising->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$advertising->trang_thai->ViewValue = $advertising->trang_thai->CurrentValue;
				}
			} else {
				$advertising->trang_thai->ViewValue = NULL;
			}
			$advertising->trang_thai->CssStyle = "";
			$advertising->trang_thai->CssClass = "";
			$advertising->trang_thai->ViewCustomAttributes = "";

			// tieu_de
			$advertising->tieu_de->HrefValue = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->HrefValue = "advertising_anh_logo_bv.php?lienket_id=" . $advertising->lienket_id->CurrentValue;
				if ($advertising->Export <> "") $advertising->anh_logo->HrefValue = ew_ConvertFullUrl($advertising->anh_logo->HrefValue);
			} else {
				$advertising->anh_logo->HrefValue = "";
			}

			// duongdan_lienket
			$advertising->duongdan_lienket->HrefValue = "";

			// luachon_hienthi
			$advertising->luachon_hienthi->HrefValue = "";

			// vitri_quangcao
			$advertising->vitri_quangcao->HrefValue = "";

			// trang_thai
			$advertising->trang_thai->HrefValue = "";
		} elseif ($advertising->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// tieu_de
			$advertising->tieu_de->EditCustomAttributes = "";
			$advertising->tieu_de->EditValue = ew_HtmlEncode($advertising->tieu_de->AdvancedSearch->SearchValue);

			// anh_logo
			$advertising->anh_logo->EditCustomAttributes = "";
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->EditValue = "Anh Logo";
				$advertising->anh_logo->ImageWidth = 200;
				$advertising->anh_logo->ImageHeight = 0;
				$advertising->anh_logo->ImageAlt = "";
			} else {
				$advertising->anh_logo->EditValue = "";
			}

			// duongdan_lienket
			$advertising->duongdan_lienket->EditCustomAttributes = "";
			$advertising->duongdan_lienket->EditValue = ew_HtmlEncode($advertising->duongdan_lienket->AdvancedSearch->SearchValue);

			// luachon_hienthi
			$advertising->luachon_hienthi->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Liên kết sàn");
			$arwrk[] = array("2", "Quảng cáo");
			$arwrk[] = array("3", "Liên kết sàn và quảng cáo");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->luachon_hienthi->EditValue = $arwrk;

			// vitri_quangcao
			$advertising->vitri_quangcao->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Quảng cáo bên trái trang tin");
                        $arwrk[] = array("2", "Quảng cáo bên phải trang tin");
                        $arwrk[] = array("3", "Quảng cáo bên trái sàn TMĐT");
                        $arwrk[] = array("5", "Quảng cáo vị trí giữa sàn TMĐT");
                        $arwrk[] = array("4", "Ảnh Banner trang tin");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->vitri_quangcao->EditValue = $arwrk;

			// trang_thai
			$advertising->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->trang_thai->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$advertising->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $advertising;

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
		global $advertising;
		$advertising->lienket_id->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_lienket_id");
		$advertising->tieu_de->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_tieu_de");
		$advertising->kieu_anh->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_kieu_anh");
		$advertising->duongdan_lienket->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_duongdan_lienket");
		$advertising->ten_viettat->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_ten_viettat");
		$advertising->mo_ta->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_mo_ta");
		$advertising->dorong_anh->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_dorong_anh");
		$advertising->chieucao_anh->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_chieucao_anh");
		$advertising->thutu_sapxep->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_thutu_sapxep");
		$advertising->luachon_hienthi->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_luachon_hienthi");
		$advertising->vitri_quangcao->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_vitri_quangcao");
		$advertising->solan_truycap->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_solan_truycap");
		$advertising->thoigian_them->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_thoigian_them");
		$advertising->thoigian_sua->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_thoigian_sua");
		$advertising->nguoi_them->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_nguoi_them");
		$advertising->nguoi_sua->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_nguoi_sua");
		$advertising->trang_thai->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_trang_thai");
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
