<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_subjectinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "subject_adinfo.php" ?>
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
$advertising_subject_list = new cadvertising_subject_list();
$Page =& $advertising_subject_list;

// Page init processing
$advertising_subject_list->Page_Init();

// Page main processing
$advertising_subject_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising_subject->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_subject_list = new ew_Page("advertising_subject_list");

// page properties
advertising_subject_list.PageID = "list"; // page ID
var EW_PAGE_ID = advertising_subject_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_subject_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_subject_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_subject_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_subject_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($advertising_subject->Export == "") { ?>
<?php
$gsMasterReturnUrl = "subject_adlist.php";
if ($advertising_subject_list->sDbMasterFilter <> "" && $advertising_subject->getCurrentMasterTable() == "subject_ad") {
	if ($advertising_subject_list->bMasterRecordExists) {
		if ($advertising_subject->getCurrentMasterTable() == $advertising_subject->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "subject_admaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($advertising_subject->Export == "" && $advertising_subject->SelectLimit);
	if (!$bSelectLimit)
		$rs = $advertising_subject_list->LoadRecordset();
	$advertising_subject_list->lTotalRecs = ($bSelectLimit) ? $advertising_subject->SelectRecordCount() : $rs->RecordCount();
	$advertising_subject_list->lStartRec = 1;
	if ($advertising_subject_list->lDisplayRecs <= 0) // Display all records
		$advertising_subject_list->lDisplayRecs = $advertising_subject_list->lTotalRecs;
	if (!($advertising_subject->ExportAll && $advertising_subject->Export <> ""))
		$advertising_subject_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $advertising_subject_list->LoadRecordset($advertising_subject_list->lStartRec-1, $advertising_subject_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Chuyên mục con"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php $advertising_subject_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($advertising_subject->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($advertising_subject->CurrentAction <> "gridadd" && $advertising_subject->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_subject_list->Pager)) $advertising_subject_list->Pager = new cNumericPager($advertising_subject_list->lStartRec, $advertising_subject_list->lDisplayRecs, $advertising_subject_list->lTotalRecs, $advertising_subject_list->lRecRange) ?>
<?php if ($advertising_subject_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_subject_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_subject_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo Lang_Text('Bản ghi')?> <?php echo $advertising_subject_list->Pager->FromIndex ?> <?php echo Lang_Text('đến');?> <?php echo $advertising_subject_list->Pager->ToIndex ?> <?php echo Lang_Text('của');?> <?php echo $advertising_subject_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_subject_list->sSrchWhere == "0=101") { ?>
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
<?php if ($advertising_subject_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo Lang_Text('Số bản ghi hiển thị');?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="advertising_subject">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($advertising_subject_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($advertising_subject_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($advertising_subject_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($advertising_subject->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo Lang_Text('Tất cả');?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_subject->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_subject_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_subjectlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_subjectlist.action='advertising_subjectdelete.php';document.fadvertising_subjectlist.encoding='application/x-www-form-urlencoded';document.fadvertising_subjectlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_subjectlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_subjectlist.action='advertising_subjectupdate.php';document.fadvertising_subjectlist.encoding='application/x-www-form-urlencoded';document.fadvertising_subjectlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xb.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fadvertising_subjectlist" id="fadvertising_subjectlist" class="ewForm" action="" method="post">
<?php if ($advertising_subject_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$advertising_subject_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$advertising_subject_list->lOptionCnt++; // edit
}
if ($Security->CanEdit() || $Security->CanDelete()) {
	$advertising_subject_list->lOptionCnt++; // Multi-select
}
	$advertising_subject_list->lOptionCnt += count($advertising_subject_list->ListOptions->Items); // Custom list options
?>
<?php echo $advertising_subject->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($advertising_subject->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width:30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap; width:20px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="advertising_subject_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($advertising_subject_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($advertising_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<?php if ($advertising_subject->SortUrl($advertising_subject->ten_chuyenmuc) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Tên chuyên mục con');?>(VI)</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_subject->SortUrl($advertising_subject->ten_chuyenmuc) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Tên chuyên mục con');?>(VI)</td><td style="width: 10px;"><?php if ($advertising_subject->ten_chuyenmuc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_subject->ten_chuyenmuc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
		
<?php if ($advertising_subject->trang_thai->Visible) { // trang_thai ?>
	<?php if ($advertising_subject->SortUrl($advertising_subject->trang_thai) == "") { ?>
		<td style="white-space: nowrap;"><?php echo Lang_Text('Trạng thái');?></td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising_subject->SortUrl($advertising_subject->trang_thai) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center"><?php echo Lang_Text('Trạng thái');?></td><td style="width: 10px;"><?php if ($advertising_subject->trang_thai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising_subject->trang_thai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($advertising_subject->ExportAll && $advertising_subject->Export <> "") {
	$advertising_subject_list->lStopRec = $advertising_subject_list->lTotalRecs;
} else {
	$advertising_subject_list->lStopRec = $advertising_subject_list->lStartRec + $advertising_subject_list->lDisplayRecs - 1; // Set the last record to display
}
$advertising_subject_list->lRecCount = $advertising_subject_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$advertising_subject->SelectLimit && $advertising_subject_list->lStartRec > 1)
		$rs->Move($advertising_subject_list->lStartRec - 1);
}
$advertising_subject_list->lRowCnt = 0;
while (($advertising_subject->CurrentAction == "gridadd" || !$rs->EOF) &&
	$advertising_subject_list->lRecCount < $advertising_subject_list->lStopRec) {
	$advertising_subject_list->lRecCount++;
	if (intval($advertising_subject_list->lRecCount) >= intval($advertising_subject_list->lStartRec)) {
		$advertising_subject_list->lRowCnt++;

	// Init row class and style
	$advertising_subject->CssClass = "";
	$advertising_subject->CssStyle = "";
	$advertising_subject->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($advertising_subject->CurrentAction == "gridadd") {
		$advertising_subject_list->LoadDefaultValues(); // Load default values
	} else {
		$advertising_subject_list->LoadRowValues($rs); // Load row values
	}
	$advertising_subject->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$advertising_subject_list->RenderRow();
?>
	<tr<?php echo $advertising_subject->RowAttributes() ?>>
<?php if ($advertising_subject->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $advertising_subject->EditUrl() ?>"><?php echo Lang_Text('Sửa');?></a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit() || $Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($advertising_subject->chuyenmuc_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($advertising_subject_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($advertising_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
		<td<?php echo $advertising_subject->ten_chuyenmuc->CellAttributes() ?>>
<div<?php echo $advertising_subject->ten_chuyenmuc->ViewAttributes() ?>><?php echo $advertising_subject->ten_chuyenmuc->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($advertising_subject->trang_thai->Visible) { // trang_thai ?>
		<td<?php echo $advertising_subject->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising_subject->trang_thai->ViewAttributes() ?>><?php echo $advertising_subject->trang_thai->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($advertising_subject->CurrentAction <> "gridadd")
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
<?php if ($advertising_subject_list->lTotalRecs > 0) { ?>
<?php if ($advertising_subject->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($advertising_subject->CurrentAction <> "gridadd" && $advertising_subject->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_subject_list->Pager)) $advertising_subject_list->Pager = new cNumericPager($advertising_subject_list->lStartRec, $advertising_subject_list->lDisplayRecs, $advertising_subject_list->lTotalRecs, $advertising_subject_list->lRecRange) ?>
<?php if ($advertising_subject_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_subject_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->FirstButton->Start ?>"><b><?php echo Lang_Text('Đầu');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->PrevButton->Start ?>"><b><?php echo Lang_Text('Trước');?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_subject_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->NextButton->Start ?>"><b><?php echo Lang_Text('Sau');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_subject_list->PageUrl() ?>start=<?php echo $advertising_subject_list->Pager->LastButton->Start ?>"><b><?php echo Lang_Text('Cuối');?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_subject_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo Lang_Text('Bản ghi')?> <?php echo $advertising_subject_list->Pager->FromIndex ?> <?php echo Lang_Text('đến');?> <?php echo $advertising_subject_list->Pager->ToIndex ?> <?php echo Lang_Text('của');?> <?php echo $advertising_subject_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_subject_list->sSrchWhere == "0=101") { ?>
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
<?php if ($advertising_subject_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo Lang_Text('Số bản ghi hiển thị');?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="advertising_subject">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($advertising_subject_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($advertising_subject_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($advertising_subject_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($advertising_subject->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo Lang_Text('Tất cả');?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($advertising_subject_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_subject->AddUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_them.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_subject_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_subjectlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_subjectlist.action='advertising_subjectdelete.php';document.fadvertising_subjectlist.encoding='application/x-www-form-urlencoded';document.fadvertising_subjectlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xoa.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fadvertising_subjectlist)) alert('<?php echo Lang_Text('Không có bản ghi được chọn')?>'); else {document.fadvertising_subjectlist.action='advertising_subjectupdate.php';document.fadvertising_subjectlist.encoding='application/x-www-form-urlencoded';document.fadvertising_subjectlist.submit();};return false;"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_xb.gif\">"); ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($advertising_subject->Export == "" && $advertising_subject->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(advertising_subject_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($advertising_subject->Export == "") { ?>
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
class cadvertising_subject_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'advertising_subject';

	// Page Object Name
	var $PageObjName = 'advertising_subject_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_subject;
		if ($advertising_subject->UseTokenInUrl) $PageUrl .= "t=" . $advertising_subject->TableVar . "&"; // add page token
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
		global $objForm, $advertising_subject;
		if ($advertising_subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_subject_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_subject"] = new cadvertising_subject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['subject_ad'] = new csubject_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_subject;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("subject_ad");
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
	$advertising_subject->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $advertising_subject->Export; // Get export parameter, used in header
	$gsExportFile = $advertising_subject->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $advertising_subject;
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

			// Set up master detail parameters
			$this->SetUpMasterDetail();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($advertising_subject->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $advertising_subject->getRecordsPerPage(); // Restore from Session
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

		// Restore master/detail filter
		$this->sDbMasterFilter = $advertising_subject->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $advertising_subject->getDetailFilter(); // Restore detail filter
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($advertising_subject->getMasterFilter() <> "" && $advertising_subject->getCurrentMasterTable() == "subject_ad") {
			global $subject_ad;
			$rsmaster = $subject_ad->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$advertising_subject->setMasterFilter(""); // Clear master filter
				$advertising_subject->setDetailFilter(""); // Clear detail filter
				$this->setMessage(Lang_Text("Chưa chọn menu")); // Set no record found
				$this->Page_Terminate($advertising_subject->getReturnUrl()); // Return to caller
			} else {
				$subject_ad->LoadListRowValues($rsmaster);
				$subject_ad->RowType = EW_ROWTYPE_MASTER; // Master row
				$subject_ad->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$advertising_subject->setSessionWhere($sFilter);
		$advertising_subject->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $advertising_subject;
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
			$advertising_subject->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$advertising_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $advertising_subject;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$advertising_subject->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$advertising_subject->CurrentOrderType = @$_GET["ordertype"];
			$advertising_subject->UpdateSort($advertising_subject->ten_chuyenmuc); // Field 
			$advertising_subject->UpdateSort($advertising_subject->ten_chuyenmuc_en); // Field 
			$advertising_subject->UpdateSort($advertising_subject->trang_thai); // Field 
			$advertising_subject->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $advertising_subject;
		$sOrderBy = $advertising_subject->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($advertising_subject->SqlOrderBy() <> "") {
				$sOrderBy = $advertising_subject->SqlOrderBy();
				$advertising_subject->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $advertising_subject;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$advertising_subject->getCurrentMasterTable = ""; // Clear master table
				$advertising_subject->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$advertising_subject->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$advertising_subject->chuyenmuc_belongto->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$advertising_subject->setSessionOrderBy($sOrderBy);
				$advertising_subject->ten_chuyenmuc->setSort("");
				$advertising_subject->ten_chuyenmuc_en->setSort("");
				$advertising_subject->trang_thai->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$advertising_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $advertising_subject;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising_subject->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising_subject->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising_subject->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising_subject->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising_subject->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising_subject->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising_subject;

		// Call Recordset Selecting event
		$advertising_subject->Recordset_Selecting($advertising_subject->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising_subject->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising_subject->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising_subject;
		$sFilter = $advertising_subject->KeyFilter();

		// Call Row Selecting event
		$advertising_subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising_subject->CurrentFilter = $sFilter;
		$sSql = $advertising_subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising_subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising_subject;
		$advertising_subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$advertising_subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$advertising_subject->ten_chuyenmuc_en->setDbValue($rs->fields('ten_chuyenmuc_en'));
		$advertising_subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$advertising_subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising_subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$advertising_subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising_subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$advertising_subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising_subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_subject;

		// Call Row_Rendering event
		$advertising_subject->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$advertising_subject->ten_chuyenmuc->CellCssStyle = "white-space: nowrap;";
		$advertising_subject->ten_chuyenmuc->CellCssClass = "";
		
		// ten_chuyenmuc_en

		$advertising_subject->ten_chuyenmuc_en->CellCssStyle = "white-space: nowrap;";
		$advertising_subject->ten_chuyenmuc_en->CellCssClass = "";

		// trang_thai
		$advertising_subject->trang_thai->CellCssStyle = "white-space: nowrap;";
		$advertising_subject->trang_thai->CellCssClass = "";
		if ($advertising_subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->ViewValue = $advertising_subject->ten_chuyenmuc->CurrentValue;
			$advertising_subject->ten_chuyenmuc->CssStyle = "";
			$advertising_subject->ten_chuyenmuc->CssClass = "";
			$advertising_subject->ten_chuyenmuc->ViewCustomAttributes = "";
			
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->ViewValue = $advertising_subject->ten_chuyenmuc_en->CurrentValue;
			$advertising_subject->ten_chuyenmuc_en->CssStyle = "";
			$advertising_subject->ten_chuyenmuc_en->CssClass = "";
			$advertising_subject->ten_chuyenmuc_en->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising_subject->trang_thai->CurrentValue) <> "") {
				switch ($advertising_subject->trang_thai->CurrentValue) {
					case "0":
						$advertising_subject->trang_thai->ViewValue = Lang_Text("<font color=\"#FF0000\">Không xuất bản</font>");
						break;
					case "1":
						$advertising_subject->trang_thai->ViewValue = Lang_Text("Xuất bản");
						break;
					default:
						$advertising_subject->trang_thai->ViewValue = $advertising_subject->trang_thai->CurrentValue;
				}
			} else {
				$advertising_subject->trang_thai->ViewValue = NULL;
			}
			$advertising_subject->trang_thai->CssStyle = "";
			$advertising_subject->trang_thai->CssClass = "";
			$advertising_subject->trang_thai->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->HrefValue = "";
			
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->HrefValue = "";

			// trang_thai
			$advertising_subject->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising_subject->Row_Rendered();
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $advertising_subject;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "subject_ad") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $advertising_subject->SqlMasterFilter_subject_ad();
				$this->sDbDetailFilter = $advertising_subject->SqlDetailFilter_subject_ad();
				if (@$_GET["chuyenmuc_id"] <> "") {
					$GLOBALS["subject_ad"]->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);
					$advertising_subject->chuyenmuc_belongto->setQueryStringValue($GLOBALS["subject_ad"]->chuyenmuc_id->QueryStringValue);
					$advertising_subject->chuyenmuc_belongto->setSessionValue($advertising_subject->chuyenmuc_belongto->QueryStringValue);
					if (!is_numeric($GLOBALS["subject_ad"]->chuyenmuc_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@chuyenmuc_id@", ew_AdjustSql($GLOBALS["subject_ad"]->chuyenmuc_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@chuyenmuc_belongto@", ew_AdjustSql($GLOBALS["subject_ad"]->chuyenmuc_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$advertising_subject->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$advertising_subject->setStartRecordNumber($this->lStartRec);
			$advertising_subject->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$advertising_subject->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "subject_ad") {
				if ($advertising_subject->chuyenmuc_belongto->QueryStringValue == "") $advertising_subject->chuyenmuc_belongto->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $advertising_subject->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $advertising_subject->getDetailFilter(); // Restore detail filter
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
