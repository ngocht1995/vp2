<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "subject_adinfo.php" ?>
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
$subject_ad_list = new csubject_ad_list();
$Page =& $subject_ad_list;

// Page init processing
$subject_ad_list->Page_Init();

// Page main processing
$subject_ad_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($subject_ad->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var subject_ad_list = new ew_Page("subject_ad_list");

// page properties
subject_ad_list.PageID = "list"; // page ID
var EW_PAGE_ID = subject_ad_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
subject_ad_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
subject_ad_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
subject_ad_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
subject_ad_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($subject_ad->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($subject_ad->Export == "" && $subject_ad->SelectLimit);
	if (!$bSelectLimit)
		$rs = $subject_ad_list->LoadRecordset();
	$subject_ad_list->lTotalRecs = ($bSelectLimit) ? $subject_ad->SelectRecordCount() : $rs->RecordCount();
	$subject_ad_list->lStartRec = 1;
	if ($subject_ad_list->lDisplayRecs <= 0) // Display all records
		$subject_ad_list->lDisplayRecs = $subject_ad_list->lTotalRecs;
	if (!($subject_ad->ExportAll && $subject_ad->Export <> ""))
		$subject_ad_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $subject_ad_list->LoadRecordset($subject_ad_list->lStartRec-1, $subject_ad_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý chuyên mục quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php $subject_ad_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($subject_ad->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($subject_ad->CurrentAction <> "gridadd" && $subject_ad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($subject_ad_list->Pager)) $subject_ad_list->Pager = new cNumericPager($subject_ad_list->lStartRec, $subject_ad_list->lDisplayRecs, $subject_ad_list->lTotalRecs, $subject_ad_list->lRecRange) ?>
<?php if ($subject_ad_list->Pager->RecordCount > 0) { ?>
	<?php if ($subject_ad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($subject_ad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo Lang_Text('Bản ghi')?> <?php echo $subject_ad_list->Pager->FromIndex ?> <?php echo Lang_Text('đến');?> <?php echo $subject_ad_list->Pager->ToIndex ?> <?php echo Lang_Text('của');?> <?php echo $subject_ad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($subject_ad_list->sSrchWhere == "0=101") { ?>
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
<?php if ($subject_ad_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo Lang_Text('Số bản ghi hiển thị');?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="subject_ad">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($subject_ad_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($subject_ad_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($subject_ad_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($subject_ad->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo Lang_Text('Tất cả');?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $subject_ad->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($subject_ad_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubject_adlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fsubject_adlist.action='subject_addelete.php';document.fsubject_adlist.encoding='application/x-www-form-urlencoded';document.fsubject_adlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubject_adlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fsubject_adlist.action='subject_adupdate.php';document.fsubject_adlist.encoding='application/x-www-form-urlencoded';document.fsubject_adlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xb.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fsubject_adlist" id="fsubject_adlist" class="ewForm" action="" method="post">
<?php if ($subject_ad_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$subject_ad_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$subject_ad_list->lOptionCnt++; // edit
}
if ($Security->AllowList('subject_ad')) {
	$subject_ad_list->lOptionCnt++; // Detail
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$subject_ad_list->lOptionCnt++; // Multi-select
}
	$subject_ad_list->lOptionCnt += count($subject_ad_list->ListOptions->Items); // Custom list options
?>
<?php echo $subject_ad->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($subject_ad->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->AllowList('subject_ad')) { ?>
<td style="white-space: nowrap; width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="subject_ad_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($subject_ad_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($subject_ad->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<?php if ($subject_ad->SortUrl($subject_ad->ten_chuyenmuc) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Tên chuyên mục');?>(VI)</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $subject_ad->SortUrl($subject_ad->ten_chuyenmuc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Tên chuyên mục');?>(VI)</td><td style="width: 10px;"><?php if ($subject_ad->ten_chuyenmuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($subject_ad->ten_chuyenmuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
		
<?php if ($subject_ad->trang_thai->Visible) { // trang_thai ?>
	<?php if ($subject_ad->SortUrl($subject_ad->trang_thai) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Trạng thái');?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $subject_ad->SortUrl($subject_ad->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Trạng thái');?></td><td style="width: 10px;"><?php if ($subject_ad->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($subject_ad->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($subject_ad->ExportAll && $subject_ad->Export <> "") {
	$subject_ad_list->lStopRec = $subject_ad_list->lTotalRecs;
} else {
	$subject_ad_list->lStopRec = $subject_ad_list->lStartRec + $subject_ad_list->lDisplayRecs - 1; // Set the last record to display
}
$subject_ad_list->lRecCount = $subject_ad_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$subject_ad->SelectLimit && $subject_ad_list->lStartRec > 1)
		$rs->Move($subject_ad_list->lStartRec - 1);
}
$subject_ad_list->lRowCnt = 0;
while (($subject_ad->CurrentAction == "gridadd" || !$rs->EOF) &&
	$subject_ad_list->lRecCount < $subject_ad_list->lStopRec) {
	$subject_ad_list->lRecCount++;
	if (intval($subject_ad_list->lRecCount) >= intval($subject_ad_list->lStartRec)) {
		$subject_ad_list->lRowCnt++;

	// Init row class and style
	$subject_ad->CssClass = "";
	$subject_ad->CssStyle = "";
	$subject_ad->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($subject_ad->CurrentAction == "gridadd") {
		$subject_ad_list->LoadDefaultValues(); // Load default values
	} else {
		$subject_ad_list->LoadRowValues($rs); // Load row values
	}
	$subject_ad->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$subject_ad_list->RenderRow();
?>
	<tr<?php echo $subject_ad->RowAttributes() ?>>
<?php if ($subject_ad->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $subject_ad->EditUrl() ?>"><?php echo Lang_Text('Sửa');?></a>
</span></td>
<?php } ?>
<?php if ($Security->AllowList('subject_ad')) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="advertising_subjectlist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=subject_ad&chuyenmuc_id=<?php echo urlencode(strval($subject_ad->chuyenmuc_id->CurrentValue)) ?>"><?php echo Lang_Text('Chuyên mục con');?></a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($subject_ad->chuyenmuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($subject_ad_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($subject_ad->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
		<td width="300">
<div<?php echo $subject_ad->ten_chuyenmuc->ViewAttributes() ?>><?php echo $subject_ad->ten_chuyenmuc->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($subject_ad->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $subject_ad->trang_thai->CellAttributes() ?>>
<div<?php echo $subject_ad->trang_thai->ViewAttributes() ?>><?php echo Lang_Text($subject_ad->trang_thai->ListViewValue()) ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($subject_ad->CurrentAction <> "gridadd")
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
<?php if ($subject_ad_list->lTotalRecs > 0) { ?>
<?php if ($subject_ad->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($subject_ad->CurrentAction <> "gridadd" && $subject_ad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($subject_ad_list->Pager)) $subject_ad_list->Pager = new cNumericPager($subject_ad_list->lStartRec, $subject_ad_list->lDisplayRecs, $subject_ad_list->lTotalRecs, $subject_ad_list->lRecRange) ?>
<?php if ($subject_ad_list->Pager->RecordCount > 0) { ?>
	<?php if ($subject_ad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($subject_ad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $subject_ad_list->PageUrl() ?>start=<?php echo $subject_ad_list->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
	<?php if ($subject_ad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo Lang_Text('Bản ghi')?> <?php echo $subject_ad_list->Pager->FromIndex ?> <?php echo Lang_Text('đến');?> <?php echo $subject_ad_list->Pager->ToIndex ?> <?php echo Lang_Text('của');?> <?php echo $subject_ad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($subject_ad_list->sSrchWhere == "0=101") { ?>
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
<?php if ($subject_ad_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo Lang_Text('Số bản ghi hiển thị');?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="subject_ad">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($subject_ad_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($subject_ad_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($subject_ad_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($subject_ad->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo Lang_Text('Tất cả');?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($subject_ad_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $subject_ad->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($subject_ad_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubject_adlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fsubject_adlist.action='subject_addelete.php';document.fsubject_adlist.encoding='application/x-www-form-urlencoded';document.fsubject_adlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fsubject_adlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fsubject_adlist.action='subject_adupdate.php';document.fsubject_adlist.encoding='application/x-www-form-urlencoded';document.fsubject_adlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xb.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($subject_ad->Export == "" && $subject_ad->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(subject_ad_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($subject_ad->Export == "") { ?>
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
class csubject_ad_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'subject_ad';

	// Page Object Name
	var $PageObjName = 'subject_ad_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $subject_ad;
		if ($subject_ad->UseTokenInUrl) $PageUrl .= "t=" . $subject_ad->TableVar . "&"; // add page token
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
		global $objForm, $subject_ad;
		if ($subject_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($subject_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($subject_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function csubject_ad_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["subject_ad"] = new csubject_ad();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'subject_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $subject_ad;
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
	$subject_ad->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $subject_ad->Export; // Get export parameter, used in header
	$gsExportFile = $subject_ad->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $subject_ad;
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

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($subject_ad->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $subject_ad->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

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
		$subject_ad->setSessionWhere($sFilter);
		$subject_ad->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $subject_ad;
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
			$subject_ad->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$subject_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $subject_ad;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$subject_ad->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$subject_ad->CurrentOrderType = @$_GET["ordertype"];
			$subject_ad->UpdateSort($subject_ad->ten_chuyenmuc); // Field
			$subject_ad->UpdateSort($subject_ad->ten_chuyenmuc_en); // Field
			$subject_ad->UpdateSort($subject_ad->trang_thai); // Field
			$subject_ad->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $subject_ad;
		$sOrderBy = $subject_ad->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($subject_ad->SqlOrderBy() <> "") {
				$sOrderBy = $subject_ad->SqlOrderBy();
				$subject_ad->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $subject_ad;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$subject_ad->setSessionOrderBy($sOrderBy);
				$subject_ad->ten_chuyenmuc->setSort("");
				$subject_ad->ten_chuyenmuc_en->setSort("");
				$subject_ad->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$subject_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $subject_ad;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$subject_ad->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$subject_ad->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $subject_ad->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$subject_ad->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$subject_ad->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$subject_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $subject_ad;

		// Call Recordset Selecting event
		$subject_ad->Recordset_Selecting($subject_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $subject_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$subject_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $subject_ad;
		$sFilter = $subject_ad->KeyFilter();

		// Call Row Selecting event
		$subject_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$subject_ad->CurrentFilter = $sFilter;
		$sSql = $subject_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$subject_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $subject_ad;
		$subject_ad->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$subject_ad->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$subject_ad->ten_chuyenmuc_en->setDbValue($rs->fields('ten_chuyenmuc_en'));
		$subject_ad->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$subject_ad->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$subject_ad->trang_thai->setDbValue($rs->fields('trang_thai'));
		$subject_ad->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$subject_ad->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$subject_ad->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$subject_ad->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $subject_ad;

		// Call Row_Rendering event
		$subject_ad->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$subject_ad->ten_chuyenmuc->CellCssStyle = "white-space: nowrap;";
		$subject_ad->ten_chuyenmuc->CellCssClass = "";
		
		// ten_chuyenmuc_en

		$subject_ad->ten_chuyenmuc_en->CellCssStyle = "white-space: nowrap;";
		$subject_ad->ten_chuyenmuc_en->CellCssClass = "";

		// trang_thai
		$subject_ad->trang_thai->CellCssStyle = "white-space: nowrap;";
		$subject_ad->trang_thai->CellCssClass = "";
		if ($subject_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->ViewValue = $subject_ad->ten_chuyenmuc->CurrentValue;
			$subject_ad->ten_chuyenmuc->CssStyle = "";
			$subject_ad->ten_chuyenmuc->CssClass = "";
			$subject_ad->ten_chuyenmuc->ViewCustomAttributes = "";
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->ViewValue = $subject_ad->ten_chuyenmuc_en->CurrentValue;
			$subject_ad->ten_chuyenmuc_en->CssStyle = "";
			$subject_ad->ten_chuyenmuc_en->CssClass = "";
			$subject_ad->ten_chuyenmuc_en->ViewCustomAttributes = "";

			// trang_thai
			if (strval($subject_ad->trang_thai->CurrentValue) <> "") {
				switch ($subject_ad->trang_thai->CurrentValue) {
					case "0":
						$subject_ad->trang_thai->ViewValue = "<font color=\"#FF0000\">Không xuất bản</font>";
						break;
					case "1":
						$subject_ad->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$subject_ad->trang_thai->ViewValue = $subject_ad->trang_thai->CurrentValue;
				}
			} else {
				$subject_ad->trang_thai->ViewValue = NULL;
			}
			$subject_ad->trang_thai->CssStyle = "";
			$subject_ad->trang_thai->CssClass = "";
			$subject_ad->trang_thai->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->HrefValue = "";
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->HrefValue = "";

			// trang_thai
			$subject_ad->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$subject_ad->Row_Rendered();
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
