<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "help_managerinfo.php" ?>
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
$help_manager_list = new chelp_manager_list();
$Page =& $help_manager_list;

// Page init processing
$help_manager_list->Page_Init();

// Page main processing
$help_manager_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($help_manager->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var help_manager_list = new ew_Page("help_manager_list");

// page properties
help_manager_list.PageID = "list"; // page ID
var EW_PAGE_ID = help_manager_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
help_manager_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
help_manager_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
help_manager_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
help_manager_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($help_manager->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($help_manager->Export == "" && $help_manager->SelectLimit);
	if (!$bSelectLimit)
		$rs = $help_manager_list->LoadRecordset();
	$help_manager_list->lTotalRecs = ($bSelectLimit) ? $help_manager->SelectRecordCount() : $rs->RecordCount();
	$help_manager_list->lStartRec = 1;
	if ($help_manager_list->lDisplayRecs <= 0) // Display all records
		$help_manager_list->lDisplayRecs = $help_manager_list->lTotalRecs;
	if (!($help_manager->ExportAll && $help_manager->Export <> ""))
		$help_manager_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $help_manager_list->LoadRecordset($help_manager_list->lStartRec-1, $help_manager_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách người trợ giúp</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $help_manager_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($help_manager->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($help_manager->CurrentAction <> "gridadd" && $help_manager->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($help_manager_list->Pager)) $help_manager_list->Pager = new cNumericPager($help_manager_list->lStartRec, $help_manager_list->lDisplayRecs, $help_manager_list->lTotalRecs, $help_manager_list->lRecRange) ?>
<?php if ($help_manager_list->Pager->RecordCount > 0) { ?>
	<?php if ($help_manager_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($help_manager_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các bản ghi từ <?php echo $help_manager_list->Pager->FromIndex ?> đến <?php echo $help_manager_list->Pager->ToIndex ?> của <?php echo $help_manager_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($help_manager_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($help_manager_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="help_manager">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($help_manager_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($help_manager_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($help_manager_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($help_manager->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $help_manager->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($help_manager_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fhelp_managerlist)) alert('Chưa chọn bản ghi cần xóa'); else {document.fhelp_managerlist.action='help_managerdelete.php';document.fhelp_managerlist.encoding='application/x-www-form-urlencoded';document.fhelp_managerlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fhelp_managerlist" id="fhelp_managerlist" class="ewForm" action="" method="post">
<?php if ($help_manager_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$help_manager_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$help_manager_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$help_manager_list->lOptionCnt++; // Multi-select
}
	$help_manager_list->lOptionCnt += count($help_manager_list->ListOptions->Items); // Custom list options
?>
<?php echo $help_manager->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($help_manager->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width:30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width:20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="help_manager_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($help_manager_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($help_manager->ho_ten->Visible) { // ho_ten ?>
	<?php if ($help_manager->SortUrl($help_manager->ho_ten) == "") { ?>
		<td>Họ và tên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $help_manager->SortUrl($help_manager->ho_ten) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Họ và tên</td><td style="width: 10px;"><?php if ($help_manager->ho_ten->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($help_manager->ho_ten->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($help_manager->dien_thoai->Visible) { // dien_thoai ?>
	<?php if ($help_manager->SortUrl($help_manager->dien_thoai) == "") { ?>
		<td>Điện Thoại</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $help_manager->SortUrl($help_manager->dien_thoai) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Điện thoại</td><td style="width: 10px;"><?php if ($help_manager->dien_thoai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($help_manager->dien_thoai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($help_manager->chuc_nang->Visible) { // chuc_nang ?>
	<?php if ($help_manager->SortUrl($help_manager->chuc_nang) == "") { ?>
		<td>Chức Năng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $help_manager->SortUrl($help_manager->chuc_nang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Chức năng</td><td style="width: 10px;"><?php if ($help_manager->chuc_nang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($help_manager->chuc_nang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($help_manager->zemail->Visible) { // email ?>
	<?php if ($help_manager->SortUrl($help_manager->zemail) == "") { ?>
		<td>Email</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $help_manager->SortUrl($help_manager->zemail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Email</td><td style="width: 10px;"><?php if ($help_manager->zemail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($help_manager->zemail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
<?php if ($help_manager->nick_yahoo->Visible) { // nick_yahoo ?>
	<?php if ($help_manager->SortUrl($help_manager->nick_yahoo) == "") { ?>
		<td>Nick Yahoo</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $help_manager->SortUrl($help_manager->nick_yahoo) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Nick Yahoo</td><td style="width: 10px;"><?php if ($help_manager->nick_yahoo->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($help_manager->nick_yahoo->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>			
<?php if ($help_manager->nick_skype->Visible) { // nick_skype ?>
	<?php if ($help_manager->SortUrl($help_manager->nick_skype) == "") { ?>
		<td>Nick Skype</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $help_manager->SortUrl($help_manager->nick_skype) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Nick Skype</td><td style="width: 10px;"><?php if ($help_manager->nick_skype->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($help_manager->nick_skype->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($help_manager->ExportAll && $help_manager->Export <> "") {
	$help_manager_list->lStopRec = $help_manager_list->lTotalRecs;
} else {
	$help_manager_list->lStopRec = $help_manager_list->lStartRec + $help_manager_list->lDisplayRecs - 1; // Set the last record to display
}
$help_manager_list->lRecCount = $help_manager_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$help_manager->SelectLimit && $help_manager_list->lStartRec > 1)
		$rs->Move($help_manager_list->lStartRec - 1);
}
$help_manager_list->lRowCnt = 0;
while (($help_manager->CurrentAction == "gridadd" || !$rs->EOF) &&
	$help_manager_list->lRecCount < $help_manager_list->lStopRec) {
	$help_manager_list->lRecCount++;
	if (intval($help_manager_list->lRecCount) >= intval($help_manager_list->lStartRec)) {
		$help_manager_list->lRowCnt++;

	// Init row class and style
	$help_manager->CssClass = "";
	$help_manager->CssStyle = "";
	$help_manager->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($help_manager->CurrentAction == "gridadd") {
		$help_manager_list->LoadDefaultValues(); // Load default values
	} else {
		$help_manager_list->LoadRowValues($rs); // Load row values
	}
	$help_manager->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$help_manager_list->RenderRow();
?>
	<tr<?php echo $help_manager->RowAttributes() ?>>
<?php if ($help_manager->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $help_manager->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($help_manager->help_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($help_manager_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($help_manager->ho_ten->Visible) { // ho_ten ?>
		<td<?php echo $help_manager->ho_ten->CellAttributes() ?>>
<div<?php echo $help_manager->ho_ten->ViewAttributes() ?>><?php echo $help_manager->ho_ten->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($help_manager->dien_thoai->Visible) { // dien_thoai ?>
		<td<?php echo $help_manager->dien_thoai->CellAttributes() ?>>
<div<?php echo $help_manager->dien_thoai->ViewAttributes() ?>><?php echo $help_manager->dien_thoai->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($help_manager->chuc_nang->Visible) { // chuc_nang ?>
		<td<?php echo $help_manager->chuc_nang->CellAttributes() ?>>
<div<?php echo $help_manager->chuc_nang->ViewAttributes() ?>><?php echo $help_manager->chuc_nang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($help_manager->zemail->Visible) { // email ?>
		<td<?php echo $help_manager->zemail->CellAttributes() ?>>
<div<?php echo $help_manager->zemail->ViewAttributes() ?>><?php echo $help_manager->zemail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($help_manager->nick_yahoo->Visible) { // nick_yahoo ?>
		<td<?php echo $help_manager->nick_yahoo->CellAttributes() ?>>
<div<?php echo $help_manager->nick_yahoo->ViewAttributes() ?>><?php echo $help_manager->nick_yahoo->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($help_manager->nick_skype->Visible) { // nick_skype ?>
		<td<?php echo $help_manager->nick_skype->CellAttributes() ?>>
<div<?php echo $help_manager->nick_skype->ViewAttributes() ?>><?php echo $help_manager->nick_skype->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($help_manager->CurrentAction <> "gridadd")
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
<?php if ($help_manager_list->lTotalRecs > 0) { ?>
<?php if ($help_manager->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($help_manager->CurrentAction <> "gridadd" && $help_manager->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($help_manager_list->Pager)) $help_manager_list->Pager = new cNumericPager($help_manager_list->lStartRec, $help_manager_list->lDisplayRecs, $help_manager_list->lTotalRecs, $help_manager_list->lRecRange) ?>
<?php if ($help_manager_list->Pager->RecordCount > 0) { ?>
	<?php if ($help_manager_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($help_manager_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $help_manager_list->PageUrl() ?>start=<?php echo $help_manager_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($help_manager_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các bản ghi từ <?php echo $help_manager_list->Pager->FromIndex ?> đến <?php echo $help_manager_list->Pager->ToIndex ?> của <?php echo $help_manager_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($help_manager_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($help_manager_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="help_manager">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($help_manager_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($help_manager_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($help_manager_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($help_manager->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($help_manager_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $help_manager->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($help_manager_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fhelp_managerlist)) alert('Chưa chọn bản ghi cần xóa'); else {document.fhelp_managerlist.action='help_managerdelete.php';document.fhelp_managerlist.encoding='application/x-www-form-urlencoded';document.fhelp_managerlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($help_manager->Export == "" && $help_manager->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

////ew_ToggleSearchPanel(help_manager_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($help_manager->Export == "") { ?>
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
class chelp_manager_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'help_manager';

	// Page Object Name
	var $PageObjName = 'help_manager_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $help_manager;
		if ($help_manager->UseTokenInUrl) $PageUrl .= "t=" . $help_manager->TableVar . "&"; // add page token
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
		global $objForm, $help_manager;
		if ($help_manager->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($help_manager->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($help_manager->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function chelp_manager_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["help_manager"] = new chelp_manager();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'help_manager', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $help_manager;
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
	$help_manager->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $help_manager->Export; // Get export parameter, used in header
	$gsExportFile = $help_manager->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $help_manager;
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
		if ($help_manager->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $help_manager->getRecordsPerPage(); // Restore from Session
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
		$help_manager->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$help_manager->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$help_manager->setStartRecordNumber($this->lStartRec);
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
		$help_manager->setSessionWhere($sFilter);
		$help_manager->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $help_manager;
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
			$help_manager->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$help_manager->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $help_manager;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $help_manager->nick_yahoo->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $help_manager->ho_ten->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $help_manager->dien_thoai->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $help_manager->zemail->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $help_manager->nick_skype->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $help_manager;
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
			$help_manager->setBasicSearchKeyword($sSearchKeyword);
			$help_manager->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $help_manager;
		$this->sSrchWhere = "";
		$help_manager->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $help_manager;
		$help_manager->setBasicSearchKeyword("");
		$help_manager->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $help_manager;
		$this->sSrchWhere = $help_manager->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $help_manager;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$help_manager->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$help_manager->CurrentOrderType = @$_GET["ordertype"];
			$help_manager->UpdateSort($help_manager->help_id); // Field
			$help_manager->UpdateSort($help_manager->nick_yahoo); // Field 
			$help_manager->UpdateSort($help_manager->ho_ten); // Field
			$help_manager->UpdateSort($help_manager->dien_thoai); // Field 
			$help_manager->UpdateSort($help_manager->chuc_nang); // Field
			$help_manager->UpdateSort($help_manager->zemail); // Field 
			$help_manager->UpdateSort($help_manager->nick_skype); // Field 
			$help_manager->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $help_manager;
		$sOrderBy = $help_manager->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($help_manager->SqlOrderBy() <> "") {
				$sOrderBy = $help_manager->SqlOrderBy();
				$help_manager->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $help_manager;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$help_manager->setSessionOrderBy($sOrderBy);
				$help_manager->help_id->setSort("");
				$help_manager->nick_yahoo->setSort("");
				$help_manager->ho_ten->setSort("");
				$help_manager->dien_thoai->setSort("");
				$help_manager->chuc_nang->setSort("");
				$help_manager->zemail->setSort("");
				$help_manager->nick_skype->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$help_manager->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $help_manager;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$help_manager->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$help_manager->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $help_manager->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$help_manager->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$help_manager->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$help_manager->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $help_manager;

		// Call Recordset Selecting event
		$help_manager->Recordset_Selecting($help_manager->CurrentFilter);

		// Load list page SQL
		$sSql = $help_manager->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';
                $rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$help_manager->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $help_manager;
		$sFilter = $help_manager->KeyFilter();

		// Call Row Selecting event
		$help_manager->Row_Selecting($sFilter);

		// Load sql based on filter
		$help_manager->CurrentFilter = $sFilter;
		$sSql = $help_manager->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$help_manager->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $help_manager;
		$help_manager->help_id->setDbValue($rs->fields('help_id'));
		$help_manager->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$help_manager->ho_ten->setDbValue($rs->fields('ho_ten'));
		$help_manager->dien_thoai->setDbValue($rs->fields('dien_thoai'));
		$help_manager->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$help_manager->zemail->setDbValue($rs->fields('email'));
		$help_manager->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $help_manager;

		// Call Row_Rendering event
		$help_manager->Row_Rendering();

		// Common render codes for all row types
		// help_id

		$help_manager->help_id->CellCssStyle = "";
		$help_manager->help_id->CellCssClass = "";

		// nick_yahoo
		$help_manager->nick_yahoo->CellCssStyle = "";
		$help_manager->nick_yahoo->CellCssClass = "";

		// ho_ten
		$help_manager->ho_ten->CellCssStyle = "";
		$help_manager->ho_ten->CellCssClass = "";

		// dien_thoai
		$help_manager->dien_thoai->CellCssStyle = "";
		$help_manager->dien_thoai->CellCssClass = "";

		// chuc_nang
		$help_manager->chuc_nang->CellCssStyle = "";
		$help_manager->chuc_nang->CellCssClass = "";

		// email
		$help_manager->zemail->CellCssStyle = "";
		$help_manager->zemail->CellCssClass = "";

		// nick_skype
		$help_manager->nick_skype->CellCssStyle = "";
		$help_manager->nick_skype->CellCssClass = "";
		if ($help_manager->RowType == EW_ROWTYPE_VIEW) { // View row

			// help_id
			$help_manager->help_id->ViewValue = $help_manager->help_id->CurrentValue;
			$help_manager->help_id->CssStyle = "";
			$help_manager->help_id->CssClass = "";
			$help_manager->help_id->ViewCustomAttributes = "";

			// nick_yahoo
			$help_manager->nick_yahoo->ViewValue = $help_manager->nick_yahoo->CurrentValue;
			$help_manager->nick_yahoo->CssStyle = "";
			$help_manager->nick_yahoo->CssClass = "";
			$help_manager->nick_yahoo->ViewCustomAttributes = "";

			// ho_ten
			$help_manager->ho_ten->ViewValue = $help_manager->ho_ten->CurrentValue;
			$help_manager->ho_ten->CssStyle = "";
			$help_manager->ho_ten->CssClass = "";
			$help_manager->ho_ten->ViewCustomAttributes = "";

			// dien_thoai
			$help_manager->dien_thoai->ViewValue = $help_manager->dien_thoai->CurrentValue;
			$help_manager->dien_thoai->CssStyle = "";
			$help_manager->dien_thoai->CssClass = "";
			$help_manager->dien_thoai->ViewCustomAttributes = "";

			// chuc_nang
			if (strval($help_manager->chuc_nang->CurrentValue) <> "") {
				switch ($help_manager->chuc_nang->CurrentValue) {
					case "1":
						$help_manager->chuc_nang->ViewValue = "Quản lý website";
						break;
					case "2":
						$help_manager->chuc_nang->ViewValue = "Chăm sóc khách hàng";
						break;
					default:
						$help_manager->chuc_nang->ViewValue = $help_manager->chuc_nang->CurrentValue;
				}
			} else {
				$help_manager->chuc_nang->ViewValue = NULL;
			}
			$help_manager->chuc_nang->CssStyle = "";
			$help_manager->chuc_nang->CssClass = "";
			$help_manager->chuc_nang->ViewCustomAttributes = "";

			// email
			$help_manager->zemail->ViewValue = $help_manager->zemail->CurrentValue;
			$help_manager->zemail->CssStyle = "";
			$help_manager->zemail->CssClass = "";
			$help_manager->zemail->ViewCustomAttributes = "";

			// nick_skype
			$help_manager->nick_skype->ViewValue = $help_manager->nick_skype->CurrentValue;
			$help_manager->nick_skype->CssStyle = "";
			$help_manager->nick_skype->CssClass = "";
			$help_manager->nick_skype->ViewCustomAttributes = "";

			// help_id
			$help_manager->help_id->HrefValue = "";

			// nick_yahoo
			$help_manager->nick_yahoo->HrefValue = "";

			// ho_ten
			$help_manager->ho_ten->HrefValue = "";

			// dien_thoai
			$help_manager->dien_thoai->HrefValue = "";

			// chuc_nang
			$help_manager->chuc_nang->HrefValue = "";

			// email
			$help_manager->zemail->HrefValue = "";

			// nick_skype
			$help_manager->nick_skype->HrefValue = "";
		}

		// Call Row Rendered event
		$help_manager->Row_Rendered();
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
