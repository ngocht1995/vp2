<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_adinfo.php" ?>
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
$t_cat_ad_list = new ct_cat_ad_list();
$Page =& $t_cat_ad_list;

// Page init processing
$t_cat_ad_list->Page_Init();

// Page main processing
$t_cat_ad_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_cat_ad->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_ad_list = new ew_Page("t_cat_ad_list");

// page properties
t_cat_ad_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_cat_ad_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_cat_ad_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_ad_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_ad_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_ad_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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
<?php if ($t_cat_ad->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_cat_ad->Export == "" && $t_cat_ad->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_cat_ad_list->LoadRecordset();
	$t_cat_ad_list->lTotalRecs = ($bSelectLimit) ? $t_cat_ad->SelectRecordCount() : $rs->RecordCount();
	$t_cat_ad_list->lStartRec = 1;
	if ($t_cat_ad_list->lDisplayRecs <= 0) // Display all records
		$t_cat_ad_list->lDisplayRecs = $t_cat_ad_list->lTotalRecs;
	if (!($t_cat_ad->ExportAll && $t_cat_ad->Export <> ""))
		$t_cat_ad_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_cat_ad_list->LoadRecordset($t_cat_ad_list->lStartRec-1, $t_cat_ad_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_cat_adlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục rao vặt</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($t_cat_ad->Export == "" && $t_cat_ad->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_cat_ad_list);" style="text-decoration: none;"><img id="t_cat_ad_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_cat_ad_list_SearchPanel">
<form name="ft_cat_adlistsrch" id="ft_cat_adlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_cat_ad">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_cat_ad->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm (*)">&nbsp;
			<a href="<?php echo $t_cat_ad_list->PageUrl() ?>cmd=reset">Hiện hết</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_cat_ad->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_cat_ad->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_cat_ad->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_cat_ad_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_cat_ad->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_cat_ad->CurrentAction <> "gridadd" && $t_cat_ad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_ad_list->Pager)) $t_cat_ad_list->Pager = new cNumericPager($t_cat_ad_list->lStartRec, $t_cat_ad_list->lDisplayRecs, $t_cat_ad_list->lTotalRecs, $t_cat_ad_list->lRecRange) ?>
<?php if ($t_cat_ad_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_ad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_ad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_cat_ad_list->Pager->FromIndex ?> to <?php echo $t_cat_ad_list->Pager->ToIndex ?> of <?php echo $t_cat_ad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_cat_ad_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi nào được tìm thấy!
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_cat_ad_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_cat_ad">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_cat_ad_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_cat_ad_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_cat_ad_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_cat_ad->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_cat_ad->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_cat_ad_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_cat_adlist)) alert('No records selected'); else {document.ft_cat_adlist.action='t_cat_addelete.php';document.ft_cat_adlist.encoding='application/x-www-form-urlencoded';document.ft_cat_adlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_cat_adlist" id="ft_cat_adlist" class="ewForm" action="" method="post">
<?php if ($t_cat_ad_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_cat_ad_list->lOptionCnt = 0;
	$t_cat_ad_list->lOptionCnt++; // view
	$t_cat_ad_list->lOptionCnt++; // edit
	$t_cat_ad_list->lOptionCnt++; // copy
	$t_cat_ad_list->lOptionCnt++; // Multi-select
	$t_cat_ad_list->lOptionCnt += count($t_cat_ad_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_cat_ad->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_cat_ad->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_cat_ad_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_cat_ad_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_cat_ad->ad_catID->Visible) { // ad_catID ?>
	<?php if ($t_cat_ad->SortUrl($t_cat_ad->ad_catID) == "") { ?>
		<td>Mã đề mục</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_cat_ad->SortUrl($t_cat_ad->ad_catID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã đề mục</td><td style="width: 10px;"><?php if ($t_cat_ad->ad_catID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_cat_ad->ad_catID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_cat_ad->parentid->Visible) { // parentid ?>
	<?php if ($t_cat_ad->SortUrl($t_cat_ad->parentid) == "") { ?>
		<td>Thuộc đề mục</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_cat_ad->SortUrl($t_cat_ad->parentid) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thuộc đề mục</td><td style="width: 10px;"><?php if ($t_cat_ad->parentid->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_cat_ad->parentid->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_cat_ad->name->Visible) { // name ?>
	<?php if ($t_cat_ad->SortUrl($t_cat_ad->name) == "") { ?>
		<td>Tên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_cat_ad->SortUrl($t_cat_ad->name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_cat_ad->name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_cat_ad->name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_cat_ad->cat_order->Visible) { // cat_order ?>
	<?php if ($t_cat_ad->SortUrl($t_cat_ad->cat_order) == "") { ?>
		<td>Vị trí</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_cat_ad->SortUrl($t_cat_ad->cat_order) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Vị trí</td><td style="width: 10px;"><?php if ($t_cat_ad->cat_order->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_cat_ad->cat_order->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_cat_ad->ExportAll && $t_cat_ad->Export <> "") {
	$t_cat_ad_list->lStopRec = $t_cat_ad_list->lTotalRecs;
} else {
	$t_cat_ad_list->lStopRec = $t_cat_ad_list->lStartRec + $t_cat_ad_list->lDisplayRecs - 1; // Set the last record to display
}
$t_cat_ad_list->lRecCount = $t_cat_ad_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_cat_ad->SelectLimit && $t_cat_ad_list->lStartRec > 1)
		$rs->Move($t_cat_ad_list->lStartRec - 1);
}
$t_cat_ad_list->lRowCnt = 0;
while (($t_cat_ad->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_cat_ad_list->lRecCount < $t_cat_ad_list->lStopRec) {
	$t_cat_ad_list->lRecCount++;
	if (intval($t_cat_ad_list->lRecCount) >= intval($t_cat_ad_list->lStartRec)) {
		$t_cat_ad_list->lRowCnt++;

	// Init row class and style
	$t_cat_ad->CssClass = "";
	$t_cat_ad->CssStyle = "";
	$t_cat_ad->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_cat_ad->CurrentAction == "gridadd") {
		$t_cat_ad_list->LoadDefaultValues(); // Load default values
	} else {
		$t_cat_ad_list->LoadRowValues($rs); // Load row values
	}
	$t_cat_ad->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_cat_ad_list->RenderRow();
?>
	<tr<?php echo $t_cat_ad->RowAttributes() ?>>
<?php if ($t_cat_ad->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_cat_ad->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_cat_ad->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_cat_ad->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_cat_ad->ad_catID->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_cat_ad_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_cat_ad->ad_catID->Visible) { // ad_catID ?>
		<td<?php echo $t_cat_ad->ad_catID->CellAttributes() ?>>
<div<?php echo $t_cat_ad->ad_catID->ViewAttributes() ?>><?php echo $t_cat_ad->ad_catID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_cat_ad->parentid->Visible) { // parentid ?>
		<td<?php echo $t_cat_ad->parentid->CellAttributes() ?>>
<div<?php echo $t_cat_ad->parentid->ViewAttributes() ?>><?php echo $t_cat_ad->parentid->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_cat_ad->name->Visible) { // name ?>
		<td<?php echo $t_cat_ad->name->CellAttributes() ?>>
<div<?php echo $t_cat_ad->name->ViewAttributes() ?>><?php echo $t_cat_ad->name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_cat_ad->cat_order->Visible) { // cat_order ?>
		<td<?php echo $t_cat_ad->cat_order->CellAttributes() ?>>
<div<?php echo $t_cat_ad->cat_order->ViewAttributes() ?>><?php echo $t_cat_ad->cat_order->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_cat_ad->CurrentAction <> "gridadd")
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
<?php if ($t_cat_ad_list->lTotalRecs > 0) { ?>
<?php if ($t_cat_ad->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_cat_ad->CurrentAction <> "gridadd" && $t_cat_ad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_ad_list->Pager)) $t_cat_ad_list->Pager = new cNumericPager($t_cat_ad_list->lStartRec, $t_cat_ad_list->lDisplayRecs, $t_cat_ad_list->lTotalRecs, $t_cat_ad_list->lRecRange) ?>
<?php if ($t_cat_ad_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_ad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_ad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_ad_list->PageUrl() ?>start=<?php echo $t_cat_ad_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_ad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_cat_ad_list->Pager->FromIndex ?> to <?php echo $t_cat_ad_list->Pager->ToIndex ?> of <?php echo $t_cat_ad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_cat_ad_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm!
	<?php } else { ?>
	Không có bản ghi nào được tìm thấy!
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_cat_ad_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_cat_ad">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_cat_ad_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_cat_ad_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_cat_ad_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_cat_ad->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_cat_ad_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_cat_ad->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_cat_ad_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_cat_adlist)) alert('No records selected'); else {document.ft_cat_adlist.action='t_cat_addelete.php';document.ft_cat_adlist.encoding='application/x-www-form-urlencoded';document.ft_cat_adlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_cat_ad->Export == "" && $t_cat_ad->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_cat_ad_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_cat_ad->Export == "") { ?>
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
class ct_cat_ad_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_cat_ad';

	// Page Object Name
	var $PageObjName = 't_cat_ad_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_ad_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_ad"] = new ct_cat_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_ad;
	$t_cat_ad->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_cat_ad->Export; // Get export parameter, used in header
	$gsExportFile = $t_cat_ad->TableVar; // Get export file, used in header
	if ($t_cat_ad->Export == "print" || $t_cat_ad->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_cat_ad->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_cat_ad->Export == "word") {
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
		global $objForm, $gsSearchError, $Security, $t_cat_ad;
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

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($t_cat_ad->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_cat_ad->getRecordsPerPage(); // Restore from Session
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
		$t_cat_ad->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_cat_ad->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$t_cat_ad->setSessionWhere($sFilter);
		$t_cat_ad->CurrentFilter = "";

		// Export data only
		if (in_array($t_cat_ad->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_cat_ad;
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
			$t_cat_ad->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $t_cat_ad;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_cat_ad->name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_cat_ad->cat_descript->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_cat_ad->cat_icon->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_cat_ad;
		$sSearchStr = "";
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
			$t_cat_ad->setBasicSearchKeyword($sSearchKeyword);
			$t_cat_ad->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_cat_ad;
		$this->sSrchWhere = "";
		$t_cat_ad->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_cat_ad;
		$t_cat_ad->setBasicSearchKeyword("");
		$t_cat_ad->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_cat_ad;
		$this->sSrchWhere = $t_cat_ad->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_cat_ad;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_cat_ad->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_cat_ad->CurrentOrderType = @$_GET["ordertype"];
			$t_cat_ad->UpdateSort($t_cat_ad->ad_catID); // Field 
			$t_cat_ad->UpdateSort($t_cat_ad->parentid); // Field 
			$t_cat_ad->UpdateSort($t_cat_ad->name); // Field 
			$t_cat_ad->UpdateSort($t_cat_ad->cat_order); // Field 
			$t_cat_ad->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_cat_ad;
		$sOrderBy = $t_cat_ad->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_cat_ad->SqlOrderBy() <> "") {
				$sOrderBy = $t_cat_ad->SqlOrderBy();
				$t_cat_ad->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_cat_ad;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_cat_ad->setSessionOrderBy($sOrderBy);
				$t_cat_ad->ad_catID->setSort("");
				$t_cat_ad->parentid->setSort("");
				$t_cat_ad->name->setSort("");
				$t_cat_ad->cat_order->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_cat_ad;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_cat_ad->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_cat_ad->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_cat_ad->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_cat_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_cat_ad;

		// Call Recordset Selecting event
		$t_cat_ad->Recordset_Selecting($t_cat_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $t_cat_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_cat_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_ad;
		$sFilter = $t_cat_ad->KeyFilter();

		// Call Row Selecting event
		$t_cat_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_ad->CurrentFilter = $sFilter;
		$sSql = $t_cat_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_ad;
		$t_cat_ad->ad_catID->setDbValue($rs->fields('ad_catID'));
		$t_cat_ad->parentid->setDbValue($rs->fields('parentid'));
		$t_cat_ad->name->setDbValue($rs->fields('name'));
		$t_cat_ad->cat_order->setDbValue($rs->fields('cat_order'));
		$t_cat_ad->status->setDbValue($rs->fields('status'));
		$t_cat_ad->cat_descript->setDbValue($rs->fields('cat_descript'));
		$t_cat_ad->cat_icon->Upload->DbValue = $rs->fields('cat_icon');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_ad;

		// Call Row_Rendering event
		$t_cat_ad->Row_Rendering();

		// Common render codes for all row types
		// ad_catID

		$t_cat_ad->ad_catID->CellCssStyle = "";
		$t_cat_ad->ad_catID->CellCssClass = "";

		// parentid
		$t_cat_ad->parentid->CellCssStyle = "";
		$t_cat_ad->parentid->CellCssClass = "";

		// name
		$t_cat_ad->name->CellCssStyle = "";
		$t_cat_ad->name->CellCssClass = "";

		// cat_order
		$t_cat_ad->cat_order->CellCssStyle = "";
		$t_cat_ad->cat_order->CellCssClass = "";
		if ($t_cat_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_catID
			$t_cat_ad->ad_catID->ViewValue = $t_cat_ad->ad_catID->CurrentValue;
			$t_cat_ad->ad_catID->CssStyle = "";
			$t_cat_ad->ad_catID->CssClass = "";
			$t_cat_ad->ad_catID->ViewCustomAttributes = "";

			// parentid
			if (strval($t_cat_ad->parentid->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_cat_ad->parentid->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_cat_ad->parentid->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_cat_ad->parentid->ViewValue = $t_cat_ad->parentid->CurrentValue;
				}
			} else {
				$t_cat_ad->parentid->ViewValue = NULL;
			}
			$t_cat_ad->parentid->CssStyle = "";
			$t_cat_ad->parentid->CssClass = "";
			$t_cat_ad->parentid->ViewCustomAttributes = "";

			// name
			$t_cat_ad->name->ViewValue = $t_cat_ad->name->CurrentValue;
			$t_cat_ad->name->CssStyle = "";
			$t_cat_ad->name->CssClass = "";
			$t_cat_ad->name->ViewCustomAttributes = "";

			// cat_order
			$t_cat_ad->cat_order->ViewValue = $t_cat_ad->cat_order->CurrentValue;
			$t_cat_ad->cat_order->CssStyle = "";
			$t_cat_ad->cat_order->CssClass = "";
			$t_cat_ad->cat_order->ViewCustomAttributes = "";

			// status
			if (strval($t_cat_ad->status->CurrentValue) <> "") {
				switch ($t_cat_ad->status->CurrentValue) {
					case "0":
						$t_cat_ad->status->ViewValue = "Chua";
						break;
					case "1":
						$t_cat_ad->status->ViewValue = "K�ch ho?t";
						break;
					default:
						$t_cat_ad->status->ViewValue = $t_cat_ad->status->CurrentValue;
				}
			} else {
				$t_cat_ad->status->ViewValue = NULL;
			}
			$t_cat_ad->status->CssStyle = "";
			$t_cat_ad->status->CssClass = "";
			$t_cat_ad->status->ViewCustomAttributes = "";

			// ad_catID
			$t_cat_ad->ad_catID->HrefValue = "";

			// parentid
			$t_cat_ad->parentid->HrefValue = "";

			// name
			$t_cat_ad->name->HrefValue = "";

			// cat_order
			$t_cat_ad->cat_order->HrefValue = "";
		}

		// Call Row Rendered event
		$t_cat_ad->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_cat_ad;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($t_cat_ad->ExportAll) {
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
		if ($t_cat_ad->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_cat_ad->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_cat_ad->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'ad_catID', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'parentid', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'name', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'cat_order', $t_cat_ad->Export);
				ew_ExportAddValue($sExportStr, 'status', $t_cat_ad->Export);
				echo ew_ExportLine($sExportStr, $t_cat_ad->Export);
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
				$t_cat_ad->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_cat_ad->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('ad_catID', $t_cat_ad->ad_catID->CurrentValue);
					$XmlDoc->AddField('parentid', $t_cat_ad->parentid->CurrentValue);
					$XmlDoc->AddField('name', $t_cat_ad->name->CurrentValue);
					$XmlDoc->AddField('cat_order', $t_cat_ad->cat_order->CurrentValue);
					$XmlDoc->AddField('status', $t_cat_ad->status->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_cat_ad->Export <> "csv") { // Vertical format
						echo ew_ExportField('ad_catID', $t_cat_ad->ad_catID->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('parentid', $t_cat_ad->parentid->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('name', $t_cat_ad->name->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('cat_order', $t_cat_ad->cat_order->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportField('status', $t_cat_ad->status->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_cat_ad->ad_catID->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->parentid->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->name->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->cat_order->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						ew_ExportAddValue($sExportStr, $t_cat_ad->status->ExportValue($t_cat_ad->Export, $t_cat_ad->ExportOriginalValue), $t_cat_ad->Export);
						echo ew_ExportLine($sExportStr, $t_cat_ad->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_cat_ad->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_cat_ad->Export);
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
