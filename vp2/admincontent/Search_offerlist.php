<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Search_offerinfo.php" ?>
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
$Search_offer_list = new cSearch_offer_list();
$Page =& $Search_offer_list;

// Page init processing
$Search_offer_list->Page_Init();

// Page main processing
$Search_offer_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Search_offer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Search_offer_list = new ew_Page("Search_offer_list");

// page properties
Search_offer_list.PageID = "list"; // page ID
var EW_PAGE_ID = Search_offer_list.PageID; // for backward compatibility

// extend page with validate function for search
Search_offer_list.ValidateSearch = function(fobj) {
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
Search_offer_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Search_offer_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Search_offer_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Search_offer_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($Search_offer->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($Search_offer->Export == "" && $Search_offer->SelectLimit);
	if (!$bSelectLimit)
		$rs = $Search_offer_list->LoadRecordset();
	$Search_offer_list->lTotalRecs = ($bSelectLimit) ? $Search_offer->SelectRecordCount() : $rs->RecordCount();
	$Search_offer_list->lStartRec = 1;
	if ($Search_offer_list->lDisplayRecs <= 0) // Display all records
		$Search_offer_list->lDisplayRecs = $Search_offer_list->lTotalRecs;
	if (!($Search_offer->ExportAll && $Search_offer->Export <> ""))
		$Search_offer_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $Search_offer_list->LoadRecordset($Search_offer_list->lStartRec-1, $Search_offer_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Tìm kiếm thông tin kinh doanh</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php if ($Security->CanSearch()) { ?>
<?php if ($Search_offer->Export == "" && $Search_offer->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(Search_offer_list);" style="text-decoration: none;"><img id="Search_offer_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"><font face="Verdana" size="2">Tìm kiếm</font></span><br>
<div id="Search_offer_list_SearchPanel">
<form name="fSearch_offerlistsrch" id="fSearch_offerlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return Search_offer_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="Search_offer">
<?php
if ($gsSearchError == "")
	$Search_offer_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$Search_offer->RowType = EW_ROWTYPE_SEARCH;

// Render row
$Search_offer_list->RenderRow();
?>
<br>
<table class="ewBasicSearch" bgcolor="#EBEBEB" width="725">
	<tr>
		<td><span class="phpmaker">Ngành hàng</span></td>
		<td><input type="hidden" name="z_nganhnghe_id" id="z_nganhnghe_id" value="="></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_nganhnghe_id" name="x_nganhnghe_id"<?php echo $Search_offer->nganhnghe_id->EditAttributes() ?>>
<?php
if (is_array($Search_offer->nganhnghe_id->EditValue)) {
	$arwrk = $Search_offer->nganhnghe_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Search_offer->nganhnghe_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker">Kiểu chào hàng</span></td>
		<td><input type="hidden" name="z_kieu_chaohang" id="z_kieu_chaohang" value="="></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_kieu_chaohang" name="x_kieu_chaohang"<?php echo $Search_offer->kieu_chaohang->EditAttributes() ?>>
<?php
if (is_array($Search_offer->kieu_chaohang->EditValue)) {
	$arwrk = $Search_offer->kieu_chaohang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Search_offer->kieu_chaohang->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<table class="ewBasicSearch" bgcolor="#EBEBEB" width="725">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($Search_offer->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; 
			<a href="<?php echo $Search_offer_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($Search_offer->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($Search_offer->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($Search_offer->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $Search_offer_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($Search_offer->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($Search_offer->CurrentAction <> "gridadd" && $Search_offer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Search_offer_list->Pager)) $Search_offer_list->Pager = new cNumericPager($Search_offer_list->lStartRec, $Search_offer_list->lDisplayRecs, $Search_offer_list->lTotalRecs, $Search_offer_list->lRecRange) ?>
<?php if ($Search_offer_list->Pager->RecordCount > 0) { ?>
	<?php if ($Search_offer_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Search_offer_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Tin từ <?php echo $Search_offer_list->Pager->FromIndex ?> đến <?php echo $Search_offer_list->Pager->ToIndex ?> của <?php echo $Search_offer_list->Pager->RecordCount ?> tin chào hàng
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Search_offer_list->sSrchWhere == "0=101") { ?>
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
<?php if ($Search_offer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin trên trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="Search_offer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Search_offer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Search_offer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Search_offer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Search_offer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fSearch_offerlist" id="fSearch_offerlist" class="ewForm" action="" method="post">
<?php if ($Search_offer_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$Search_offer_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$Search_offer_list->lOptionCnt++; // view
}
	$Search_offer_list->lOptionCnt += count($Search_offer_list->ListOptions->Items); // Custom list options
?>
<?php echo $Search_offer->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Search_offer->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap; width: 30px; ">&nbsp;</td>
<?php } ?>
<?php

// Custom list options
foreach ($Search_offer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>

<?php if ($Search_offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
	<?php if ($Search_offer->SortUrl($Search_offer->tieude_chaohang) == "") { ?>
		<td style="white-space: nowrap;">Tieude Chaohang</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Search_offer->SortUrl($Search_offer->tieude_chaohang) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Tiêu đề</td><td style="width: 10px;"><?php if ($Search_offer->tieude_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Search_offer->tieude_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Search_offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<?php if ($Search_offer->SortUrl($Search_offer->nganhnghe_id) == "") { ?>
		<td style="white-space: nowrap;">Nganhnghe Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Search_offer->SortUrl($Search_offer->nganhnghe_id) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Ngành hàng</td><td style="width: 10px;"><?php if ($Search_offer->nganhnghe_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Search_offer->nganhnghe_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Search_offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
	<?php if ($Search_offer->SortUrl($Search_offer->kieu_chaohang) == "") { ?>
		<td style="white-space: nowrap; width: 50px; ">Kieu Chaohang</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Search_offer->SortUrl($Search_offer->kieu_chaohang) ?>',1);" style="white-space: nowrap; width: 50px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Loại chào hàng</td><td style="width: 10px;"><?php if ($Search_offer->kieu_chaohang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Search_offer->kieu_chaohang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Search_offer->so_lanxem->Visible) { // so_lanxem ?>
	<?php if ($Search_offer->SortUrl($Search_offer->so_lanxem) == "") { ?>
		<td style="white-space: nowrap; width: 50px;">So Lanxem</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Search_offer->SortUrl($Search_offer->so_lanxem) ?>',1);" style="white-space: nowrap; width: 50px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Số lần xem</td><td style="width: 10px;"><?php if ($Search_offer->so_lanxem->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Search_offer->so_lanxem->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($Search_offer->ten_congty->Visible) { // ten_congty ?>
	<?php if ($Search_offer->SortUrl($Search_offer->ten_congty) == "") { ?>
		<td style="white-space: nowrap;width: 200px;">Ten Congty</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Search_offer->SortUrl($Search_offer->ten_congty) ?>',1);" style="white-space: nowrap;width: 200px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Công ty</td><td style="width: 10px;"><?php if ($Search_offer->ten_congty->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Search_offer->ten_congty->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($Search_offer->ExportAll && $Search_offer->Export <> "") {
	$Search_offer_list->lStopRec = $Search_offer_list->lTotalRecs;
} else {
	$Search_offer_list->lStopRec = $Search_offer_list->lStartRec + $Search_offer_list->lDisplayRecs - 1; // Set the last record to display
}
$Search_offer_list->lRecCount = $Search_offer_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$Search_offer->SelectLimit && $Search_offer_list->lStartRec > 1)
		$rs->Move($Search_offer_list->lStartRec - 1);
}
$Search_offer_list->lRowCnt = 0;
while (($Search_offer->CurrentAction == "gridadd" || !$rs->EOF) &&
	$Search_offer_list->lRecCount < $Search_offer_list->lStopRec) {
	$Search_offer_list->lRecCount++;
	if (intval($Search_offer_list->lRecCount) >= intval($Search_offer_list->lStartRec)) {
		$Search_offer_list->lRowCnt++;

	// Init row class and style
	$Search_offer->CssClass = "";
	$Search_offer->CssStyle = "";
	$Search_offer->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($Search_offer->CurrentAction == "gridadd") {
		$Search_offer_list->LoadDefaultValues(); // Load default values
	} else {
		$Search_offer_list->LoadRowValues($rs); // Load row values
	}
	$Search_offer->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$Search_offer_list->RenderRow();
?>
	<tr<?php echo $Search_offer->RowAttributes() ?>>
<?php if ($Search_offer->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $Search_offer->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($Search_offer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
<?php if ($Search_offer->tieude_chaohang->Visible) { // tieude_chaohang ?>
		<td>
			<table>
				<tr>
					<td width= "200">
<div<?php echo $Search_offer->tieude_chaohang->ViewAttributes() ?>><?php echo $Search_offer->tieude_chaohang->ListViewValue() ?></div>
					</td>
				</tr>
			
	<?php } ?>
	<?php if ($Search_offer->anh_chaohang->Visible) { // anh_chaohang ?>
<script type="text/javascript" src="../js/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="../css/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '../images/highslide/';
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.headingEval = 'this.a.title';
	//hs.dimmingOpacity = 0.75;
</script>

	<tr>
		<td width= "200">
<?php if ($Search_offer->anh_chaohang->HrefValue <> "") { ?>
<?php if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) { ?>
<a href="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Search_offer->anh_chaohang->Upload->DbValue ?>" class="highslide" onclick="return hs.expand(this)">
	<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Search_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $Search_offer->anh_chaohang->ViewAttributes() ?>" alt="Highslide JS" title="Ấn chuột trái để phóng to ảnh"></a>
<?php } elseif (!in_array($Search_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $Search_offer->anh_chaohang->Upload->DbValue ?>" border=0<?php echo $Search_offer->anh_chaohang->ViewAttributes() ?>>
<?php } elseif (!in_array($Search_offer->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</td>
	<?php } ?>
	
	<?php if ($Search_offer->nganhnghe_id->Visible) { // nganhnghe_id ?>
		<td <?php echo $Search_offer->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $Search_offer->nganhnghe_id->ViewAttributes() ?>><?php echo $Search_offer->nganhnghe_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Search_offer->kieu_chaohang->Visible) { // kieu_chaohang ?>
		<td<?php echo $Search_offer->kieu_chaohang->CellAttributes() ?>>
<div<?php echo $Search_offer->kieu_chaohang->ViewAttributes() ?>><?php echo $Search_offer->kieu_chaohang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Search_offer->so_lanxem->Visible) { // so_lanxem ?>
		<td<?php echo $Search_offer->so_lanxem->CellAttributes() ?>>
<div align="center" <?php echo $Search_offer->so_lanxem->ViewAttributes() ?>><?php echo $Search_offer->so_lanxem->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($Search_offer->ten_congty->Visible) { // ten_congty ?>
		<td width= "200">
<div<?php echo $Search_offer->ten_congty->ViewAttributes() ?>><?php echo $Search_offer->ten_congty->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($Search_offer->CurrentAction <> "gridadd")
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
<?php if ($Search_offer_list->lTotalRecs > 0) { ?>
<?php if ($Search_offer->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($Search_offer->CurrentAction <> "gridadd" && $Search_offer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Search_offer_list->Pager)) $Search_offer_list->Pager = new cNumericPager($Search_offer_list->lStartRec, $Search_offer_list->lDisplayRecs, $Search_offer_list->lTotalRecs, $Search_offer_list->lRecRange) ?>
<?php if ($Search_offer_list->Pager->RecordCount > 0) { ?>
	<?php if ($Search_offer_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Search_offer_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Search_offer_list->PageUrl() ?>start=<?php echo $Search_offer_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Search_offer_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Tin từ <?php echo $Search_offer_list->Pager->FromIndex ?> đến <?php echo $Search_offer_list->Pager->ToIndex ?> của <?php echo $Search_offer_list->Pager->RecordCount ?> Tin chào hàng
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Search_offer_list->sSrchWhere == "0=101") { ?>
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
<?php if ($Search_offer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số tin hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="Search_offer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Search_offer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Search_offer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Search_offer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Search_offer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($Search_offer_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($Search_offer->Export == "" && $Search_offer->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(Search_offer_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($Search_offer->Export == "") { ?>
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
class cSearch_offer_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'Search_offer';

	// Page Object Name
	var $PageObjName = 'Search_offer_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Search_offer;
		if ($Search_offer->UseTokenInUrl) $PageUrl .= "t=" . $Search_offer->TableVar . "&"; // add page token
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
		global $objForm, $Search_offer;
		if ($Search_offer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Search_offer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Search_offer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cSearch_offer_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["Search_offer"] = new cSearch_offer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Search_offer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Search_offer;
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
	$Search_offer->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $Search_offer->Export; // Get export parameter, used in header
	$gsExportFile = $Search_offer->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $Search_offer;
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
		if ($Search_offer->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $Search_offer->getRecordsPerPage(); // Restore from Session
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
		$Search_offer->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$Search_offer->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$Search_offer->setStartRecordNumber($this->lStartRec);
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
		$Search_offer->setSessionWhere($sFilter);
		$Search_offer->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $Search_offer;
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
			$Search_offer->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$Search_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $Search_offer;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $Search_offer->nganhnghe_id, FALSE); // Field nganhnghe_id
		$this->BuildSearchSql($sWhere, $Search_offer->kieu_chaohang, FALSE); // Field kieu_chaohang

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($Search_offer->nganhnghe_id); // Field nganhnghe_id
			$this->SetSearchParm($Search_offer->kieu_chaohang); // Field kieu_chaohang
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
		global $Search_offer;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$Search_offer->setAdvancedSearch("x_$FldParm", $FldVal);
		$Search_offer->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$Search_offer->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$Search_offer->setAdvancedSearch("y_$FldParm", $FldVal2);
		$Search_offer->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $Search_offer;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $Search_offer->ten_congty->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $Search_offer;
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
			$Search_offer->setBasicSearchKeyword($sSearchKeyword);
			$Search_offer->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $Search_offer;
		$this->sSrchWhere = "";
		$Search_offer->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $Search_offer;
		$Search_offer->setBasicSearchKeyword("");
		$Search_offer->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $Search_offer;
		$Search_offer->setAdvancedSearch("x_nganhnghe_id", "");
		$Search_offer->setAdvancedSearch("x_kieu_chaohang", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $Search_offer;
		$this->sSrchWhere = $Search_offer->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $Search_offer;
		 $Search_offer->nganhnghe_id->AdvancedSearch->SearchValue = $Search_offer->getAdvancedSearch("x_nganhnghe_id");
		 $Search_offer->kieu_chaohang->AdvancedSearch->SearchValue = $Search_offer->getAdvancedSearch("x_kieu_chaohang");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $Search_offer;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$Search_offer->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$Search_offer->CurrentOrderType = @$_GET["ordertype"];
			$Search_offer->UpdateSort($Search_offer->anh_chaohang); // Field
			$Search_offer->UpdateSort($Search_offer->tieude_chaohang); // Field
			$Search_offer->UpdateSort($Search_offer->nganhnghe_id); // Field
			$Search_offer->UpdateSort($Search_offer->kieu_chaohang); // Field
			$Search_offer->UpdateSort($Search_offer->so_lanxem); // Field
			$Search_offer->UpdateSort($Search_offer->ten_congty); // Field
			$Search_offer->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $Search_offer;
		$sOrderBy = $Search_offer->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($Search_offer->SqlOrderBy() <> "") {
				$sOrderBy = $Search_offer->SqlOrderBy();
				$Search_offer->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $Search_offer;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$Search_offer->setSessionOrderBy($sOrderBy);
				$Search_offer->anh_chaohang->setSort("");
				$Search_offer->tieude_chaohang->setSort("");
				$Search_offer->nganhnghe_id->setSort("");
				$Search_offer->kieu_chaohang->setSort("");
				$Search_offer->so_lanxem->setSort("");
				$Search_offer->ten_congty->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$Search_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Search_offer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Search_offer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Search_offer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Search_offer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Search_offer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Search_offer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Search_offer->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $Search_offer;

		// Load search values
		// nganhnghe_id

		$Search_offer->nganhnghe_id->AdvancedSearch->SearchValue = @$_GET["x_nganhnghe_id"];
		$Search_offer->nganhnghe_id->AdvancedSearch->SearchOperator = @$_GET["z_nganhnghe_id"];

		// kieu_chaohang
		$Search_offer->kieu_chaohang->AdvancedSearch->SearchValue = @$_GET["x_kieu_chaohang"];
		$Search_offer->kieu_chaohang->AdvancedSearch->SearchOperator = @$_GET["z_kieu_chaohang"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Search_offer;

		// Call Recordset Selecting event
		$Search_offer->Recordset_Selecting($Search_offer->CurrentFilter);

		// Load list page SQL
		$sSql = $Search_offer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Search_offer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Search_offer;
		$sFilter = $Search_offer->KeyFilter();

		// Call Row Selecting event
		$Search_offer->Row_Selecting($sFilter);

		// Load sql based on filter
		$Search_offer->CurrentFilter = $sFilter;
		$sSql = $Search_offer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Search_offer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Search_offer;
		$Search_offer->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$Search_offer->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$Search_offer->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$Search_offer->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$Search_offer->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$Search_offer->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$Search_offer->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$Search_offer->ten_congty->setDbValue($rs->fields('ten_congty'));
		$Search_offer->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Search_offer;

		// Call Row_Rendering event
		$Search_offer->Row_Rendering();

		// Common render codes for all row types
		// anh_chaohang

		$Search_offer->anh_chaohang->CellCssStyle = "white-space: nowrap;";
		$Search_offer->anh_chaohang->CellCssClass = "";

		// tieude_chaohang
		$Search_offer->tieude_chaohang->CellCssStyle = "white-space: nowrap;";
		$Search_offer->tieude_chaohang->CellCssClass = "";

		// nganhnghe_id
		$Search_offer->nganhnghe_id->CellCssStyle = "white-space: nowrap;";
		$Search_offer->nganhnghe_id->CellCssClass = "";

		// kieu_chaohang
		$Search_offer->kieu_chaohang->CellCssStyle = "white-space: nowrap;";
		$Search_offer->kieu_chaohang->CellCssClass = "";

		// so_lanxem
		$Search_offer->so_lanxem->CellCssStyle = "white-space: nowrap;";
		$Search_offer->so_lanxem->CellCssClass = "";

		// ten_congty
		$Search_offer->ten_congty->CellCssStyle = "white-space: nowrap;";
		$Search_offer->ten_congty->CellCssClass = "";
		if ($Search_offer->RowType == EW_ROWTYPE_VIEW) { // View row

			// anh_chaohang
			if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) {
				$Search_offer->anh_chaohang->ViewValue = $Search_offer->anh_chaohang->Upload->DbValue;
				$Search_offer->anh_chaohang->ImageWidth = 0;
				$Search_offer->anh_chaohang->ImageHeight = 100;
				$Search_offer->anh_chaohang->ImageAlt = "";
			} else {
				$Search_offer->anh_chaohang->ViewValue = "";
			}
			$Search_offer->anh_chaohang->CssStyle = "";
			$Search_offer->anh_chaohang->CssClass = "";
			$Search_offer->anh_chaohang->ViewCustomAttributes = "";

			// tieude_chaohang
			$Search_offer->tieude_chaohang->ViewValue = $Search_offer->tieude_chaohang->CurrentValue;
			$Search_offer->tieude_chaohang->CssStyle = "";
			$Search_offer->tieude_chaohang->CssClass = "";
			$Search_offer->tieude_chaohang->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($Search_offer->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($Search_offer->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$Search_offer->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$Search_offer->nganhnghe_id->ViewValue = $Search_offer->nganhnghe_id->CurrentValue;
				}
			} else {
				$Search_offer->nganhnghe_id->ViewValue = NULL;
			}
			$Search_offer->nganhnghe_id->CssStyle = "";
			$Search_offer->nganhnghe_id->CssClass = "";
			$Search_offer->nganhnghe_id->ViewCustomAttributes = "";

			// kieu_chaohang
			if (strval($Search_offer->kieu_chaohang->CurrentValue) <> "") {
				switch ($Search_offer->kieu_chaohang->CurrentValue) {
					case "1":
						$Search_offer->kieu_chaohang->ViewValue = "Chào bán";
						break;
					case "2":
						$Search_offer->kieu_chaohang->ViewValue = "Chào mua";
						break;
					default:
						$Search_offer->kieu_chaohang->ViewValue = $Search_offer->kieu_chaohang->CurrentValue;
				}
			} else {
				$Search_offer->kieu_chaohang->ViewValue = NULL;
			}
			$Search_offer->kieu_chaohang->CssStyle = "";
			$Search_offer->kieu_chaohang->CssClass = "";
			$Search_offer->kieu_chaohang->ViewCustomAttributes = "";

			// so_lanxem
			$Search_offer->so_lanxem->ViewValue = $Search_offer->so_lanxem->CurrentValue;
			$Search_offer->so_lanxem->CssStyle = "";
			$Search_offer->so_lanxem->CssClass = "";
			$Search_offer->so_lanxem->ViewCustomAttributes = "";

			// ten_congty
			$Search_offer->ten_congty->ViewValue = $Search_offer->ten_congty->CurrentValue;
			$Search_offer->ten_congty->CssStyle = "";
			$Search_offer->ten_congty->CssClass = "";
			$Search_offer->ten_congty->ViewCustomAttributes = "";

			// anh_chaohang
			if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) {
				$Search_offer->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($Search_offer->anh_chaohang->ViewValue)) ? $Search_offer->anh_chaohang->ViewValue : $Search_offer->anh_chaohang->CurrentValue);
				if ($Search_offer->Export <> "") $Search_offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($Search_offer->anh_chaohang->HrefValue);
			} else {
				$Search_offer->anh_chaohang->HrefValue = "";
			}

			// tieude_chaohang
			$Search_offer->tieude_chaohang->HrefValue = "";

			// nganhnghe_id
			$Search_offer->nganhnghe_id->HrefValue = "";

			// kieu_chaohang
			$Search_offer->kieu_chaohang->HrefValue = "";

			// so_lanxem
			$Search_offer->so_lanxem->HrefValue = "";

			// ten_congty
			$Search_offer->ten_congty->HrefValue = "";
		} elseif ($Search_offer->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// anh_chaohang
			$Search_offer->anh_chaohang->EditCustomAttributes = "";
			if (!is_null($Search_offer->anh_chaohang->Upload->DbValue)) {
				$Search_offer->anh_chaohang->EditValue = $Search_offer->anh_chaohang->Upload->DbValue;
				$Search_offer->anh_chaohang->ImageWidth = 0;
				$Search_offer->anh_chaohang->ImageHeight = 100;
				$Search_offer->anh_chaohang->ImageAlt = "";
			} else {
				$Search_offer->anh_chaohang->EditValue = "";
			}

			// tieude_chaohang
			$Search_offer->tieude_chaohang->EditCustomAttributes = "";
			$Search_offer->tieude_chaohang->EditValue = ew_HtmlEncode($Search_offer->tieude_chaohang->AdvancedSearch->SearchValue);

			// nganhnghe_id
			$Search_offer->nganhnghe_id->EditCustomAttributes = "";
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
			$Search_offer->nganhnghe_id->EditValue = $arwrk;

			// kieu_chaohang
			$Search_offer->kieu_chaohang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chào bán");
			$arwrk[] = array("2", "Chào mua");
			array_unshift($arwrk, array("", "Chọn"));
			$Search_offer->kieu_chaohang->EditValue = $arwrk;

			// so_lanxem
			$Search_offer->so_lanxem->EditCustomAttributes = "";
			$Search_offer->so_lanxem->EditValue = ew_HtmlEncode($Search_offer->so_lanxem->AdvancedSearch->SearchValue);

			// ten_congty
			$Search_offer->ten_congty->EditCustomAttributes = "";
			$Search_offer->ten_congty->EditValue = ew_HtmlEncode($Search_offer->ten_congty->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$Search_offer->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $Search_offer;

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
		global $Search_offer;
		$Search_offer->nganhnghe_id->AdvancedSearch->SearchValue = $Search_offer->getAdvancedSearch("x_nganhnghe_id");
		$Search_offer->kieu_chaohang->AdvancedSearch->SearchValue = $Search_offer->getAdvancedSearch("x_kieu_chaohang");
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
