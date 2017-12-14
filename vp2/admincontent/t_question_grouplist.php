<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_question_groupinfo.php" ?>
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
$t_question_group_list = new ct_question_group_list();
$Page =& $t_question_group_list;

// Page init processing
$t_question_group_list->Page_Init();

// Page main processing
$t_question_group_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_question_group->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_group_list = new ew_Page("t_question_group_list");

// page properties
t_question_group_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_question_group_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_question_group_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_group_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_group_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_group_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_question_group->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_question_group->Export == "" && $t_question_group->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_question_group_list->LoadRecordset();
	$t_question_group_list->lTotalRecs = ($bSelectLimit) ? $t_question_group->SelectRecordCount() : $rs->RecordCount();
	$t_question_group_list->lStartRec = 1;
	if ($t_question_group_list->lDisplayRecs <= 0) // Display all records
		$t_question_group_list->lDisplayRecs = $t_question_group_list->lTotalRecs;
	if (!($t_question_group->ExportAll && $t_question_group->Export <> ""))
		$t_question_group_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_question_group_list->LoadRecordset($t_question_group_list->lStartRec-1, $t_question_group_list->lDisplayRecs);
?>

<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục nhóm câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

</span></p>
<?php if ($t_question_group->Export == "" && $t_question_group->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_question_group_list);" style="text-decoration: none;"><img id="t_question_group_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_question_group_list_SearchPanel">
<form name="ft_question_grouplistsrch" id="ft_question_grouplistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_question_group">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_question_group->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm (*)">&nbsp;
			<a href="<?php echo $t_question_group_list->PageUrl() ?>cmd=reset">Hiện hết</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_question_group->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Exact phrase</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_question_group->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>All words</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_question_group->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ khóa nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_question_group_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_question_group->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_question_group->CurrentAction <> "gridadd" && $t_question_group->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_group_list->Pager)) $t_question_group_list->Pager = new cNumericPager($t_question_group_list->lStartRec, $t_question_group_list->lDisplayRecs, $t_question_group_list->lTotalRecs, $t_question_group_list->lRecRange) ?>
<?php if ($t_question_group_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_group_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_group_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_question_group_list->Pager->FromIndex ?> to <?php echo $t_question_group_list->Pager->ToIndex ?> of <?php echo $t_question_group_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_question_group_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi nào được tìm thấy
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_question_group_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Tổng trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question_group">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_group_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_group_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_question_group_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_question_group->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_question_group->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_question_group_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_question_grouplist)) alert('No records selected'); else {document.ft_question_grouplist.action='t_question_groupdelete.php';document.ft_question_grouplist.encoding='application/x-www-form-urlencoded';document.ft_question_grouplist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_question_grouplist" id="ft_question_grouplist" class="ewForm" action="" method="post">
<?php if ($t_question_group_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_question_group_list->lOptionCnt = 0;
	$t_question_group_list->lOptionCnt++; // view
	$t_question_group_list->lOptionCnt++; // edit
	$t_question_group_list->lOptionCnt++; // copy
	$t_question_group_list->lOptionCnt++; // Multi-select
	$t_question_group_list->lOptionCnt += count($t_question_group_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_question_group->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_question_group->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_question_group_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_question_group_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_question_group->ID->Visible) { // ID ?>
	<?php if ($t_question_group->SortUrl($t_question_group->ID) == "") { ?>
		<td>Mã nhóm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question_group->SortUrl($t_question_group->ID) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>ID</td><td style="width: 10px;"><?php if ($t_question_group->ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question_group->ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question_group->NAME->Visible) { // NAME ?>
	<?php if ($t_question_group->SortUrl($t_question_group->NAME) == "") { ?>
		<td>Tên nhóm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question_group->SortUrl($t_question_group->NAME) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>NAME&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question_group->NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question_group->NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question_group->Description->Visible) { // Description ?>
	<?php if ($t_question_group->SortUrl($t_question_group->Description) == "") { ?>
		<td>Mô tả</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question_group->SortUrl($t_question_group->Description) ?>',0);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Description&nbsp;(*)</td><td style="width: 10px;"><?php if ($t_question_group->Description->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question_group->Description->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_question_group->ExportAll && $t_question_group->Export <> "") {
	$t_question_group_list->lStopRec = $t_question_group_list->lTotalRecs;
} else {
	$t_question_group_list->lStopRec = $t_question_group_list->lStartRec + $t_question_group_list->lDisplayRecs - 1; // Set the last record to display
}
$t_question_group_list->lRecCount = $t_question_group_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_question_group->SelectLimit && $t_question_group_list->lStartRec > 1)
		$rs->Move($t_question_group_list->lStartRec - 1);
}
$t_question_group_list->lRowCnt = 0;
while (($t_question_group->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_question_group_list->lRecCount < $t_question_group_list->lStopRec) {
	$t_question_group_list->lRecCount++;
	if (intval($t_question_group_list->lRecCount) >= intval($t_question_group_list->lStartRec)) {
		$t_question_group_list->lRowCnt++;

	// Init row class and style
	$t_question_group->CssClass = "";
	$t_question_group->CssStyle = "";
	$t_question_group->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_question_group->CurrentAction == "gridadd") {
		$t_question_group_list->LoadDefaultValues(); // Load default values
	} else {
		$t_question_group_list->LoadRowValues($rs); // Load row values
	}
	$t_question_group->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_question_group_list->RenderRow();
?>
	<tr<?php echo $t_question_group->RowAttributes() ?>>
<?php if ($t_question_group->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question_group->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question_group->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question_group->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_question_group->ID->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_question_group_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_question_group->ID->Visible) { // ID ?>
		<td<?php echo $t_question_group->ID->CellAttributes() ?>>
<div<?php echo $t_question_group->ID->ViewAttributes() ?>><?php echo $t_question_group->ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question_group->NAME->Visible) { // NAME ?>
		<td<?php echo $t_question_group->NAME->CellAttributes() ?>>
<div<?php echo $t_question_group->NAME->ViewAttributes() ?>><?php echo $t_question_group->NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question_group->Description->Visible) { // Description ?>
		<td<?php echo $t_question_group->Description->CellAttributes() ?>>
<div<?php echo $t_question_group->Description->ViewAttributes() ?>><?php echo $t_question_group->Description->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_question_group->CurrentAction <> "gridadd")
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
<?php if ($t_question_group_list->lTotalRecs > 0) { ?>
<?php if ($t_question_group->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_question_group->CurrentAction <> "gridadd" && $t_question_group->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_question_group_list->Pager)) $t_question_group_list->Pager = new cNumericPager($t_question_group_list->lStartRec, $t_question_group_list->lDisplayRecs, $t_question_group_list->lTotalRecs, $t_question_group_list->lRecRange) ?>
<?php if ($t_question_group_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_question_group_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_question_group_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_question_group_list->PageUrl() ?>start=<?php echo $t_question_group_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_question_group_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Records <?php echo $t_question_group_list->Pager->FromIndex ?> to <?php echo $t_question_group_list->Pager->ToIndex ?> of <?php echo $t_question_group_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_question_group_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi nào được tìm thấy
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_question_group_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Tổng trang &nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question_group">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_group_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_group_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_question_group_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_question_group->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_question_group_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_question_group->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_question_group_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_question_grouplist)) alert('No records selected'); else {document.ft_question_grouplist.action='t_question_groupdelete.php';document.ft_question_grouplist.encoding='application/x-www-form-urlencoded';document.ft_question_grouplist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_question_group->Export == "" && $t_question_group->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_question_group_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_question_group->Export == "") { ?>
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
class ct_question_group_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_question_group';

	// Page Object Name
	var $PageObjName = 't_question_group_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question_group;
		if ($t_question_group->UseTokenInUrl) $PageUrl .= "t=" . $t_question_group->TableVar . "&"; // add page token
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
		global $objForm, $t_question_group;
		if ($t_question_group->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question_group->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question_group->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_group_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question_group"] = new ct_question_group();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question_group', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question_group;
	$t_question_group->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_question_group->Export; // Get export parameter, used in header
	$gsExportFile = $t_question_group->TableVar; // Get export file, used in header
	if ($t_question_group->Export == "print" || $t_question_group->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_question_group->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_question_group->Export == "word") {
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
		global $objForm, $gsSearchError, $Security, $t_question_group;
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
		if ($t_question_group->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_question_group->getRecordsPerPage(); // Restore from Session
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
		$t_question_group->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_question_group->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_question_group->setStartRecordNumber($this->lStartRec);
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
		$t_question_group->setSessionWhere($sFilter);
		$t_question_group->CurrentFilter = "";

		// Export data only
		if (in_array($t_question_group->Export, array("html","word","excel","xml","csv"))) {
			$this->ExportData();
			$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_question_group;
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
			$t_question_group->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_question_group->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $t_question_group;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_question_group->NAME->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question_group->Description->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_question_group;
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
			$t_question_group->setBasicSearchKeyword($sSearchKeyword);
			$t_question_group->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_question_group;
		$this->sSrchWhere = "";
		$t_question_group->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_question_group;
		$t_question_group->setBasicSearchKeyword("");
		$t_question_group->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_question_group;
		$this->sSrchWhere = $t_question_group->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_question_group;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_question_group->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_question_group->CurrentOrderType = @$_GET["ordertype"];
			$t_question_group->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_question_group;
		$sOrderBy = $t_question_group->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_question_group->SqlOrderBy() <> "") {
				$sOrderBy = $t_question_group->SqlOrderBy();
				$t_question_group->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_question_group;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_question_group->setSessionOrderBy($sOrderBy);
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_question_group->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_question_group;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_question_group->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_question_group->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_question_group->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_question_group->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_question_group->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_question_group->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question_group;

		// Call Recordset Selecting event
		$t_question_group->Recordset_Selecting($t_question_group->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question_group->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question_group->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question_group;
		$sFilter = $t_question_group->KeyFilter();

		// Call Row Selecting event
		$t_question_group->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question_group->CurrentFilter = $sFilter;
		$sSql = $t_question_group->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question_group->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question_group;
		$t_question_group->ID->setDbValue($rs->fields('ID'));
		$t_question_group->NAME->setDbValue($rs->fields('NAME'));
		$t_question_group->Description->setDbValue($rs->fields('Description'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question_group;

		// Call Row_Rendering event
		$t_question_group->Row_Rendering();

		// Common render codes for all row types
		// ID

		$t_question_group->ID->CellCssStyle = "";
		$t_question_group->ID->CellCssClass = "";

		// NAME
		$t_question_group->NAME->CellCssStyle = "";
		$t_question_group->NAME->CellCssClass = "";

		// Description
		$t_question_group->Description->CellCssStyle = "";
		$t_question_group->Description->CellCssClass = "";
		if ($t_question_group->RowType == EW_ROWTYPE_VIEW) { // View row

			// ID
			$t_question_group->ID->ViewValue = $t_question_group->ID->CurrentValue;
			$t_question_group->ID->CssStyle = "";
			$t_question_group->ID->CssClass = "";
			$t_question_group->ID->ViewCustomAttributes = "";

			// NAME
			$t_question_group->NAME->ViewValue = $t_question_group->NAME->CurrentValue;
			$t_question_group->NAME->CssStyle = "";
			$t_question_group->NAME->CssClass = "";
			$t_question_group->NAME->ViewCustomAttributes = "";

			// Description
			$t_question_group->Description->ViewValue = $t_question_group->Description->CurrentValue;
			$t_question_group->Description->CssStyle = "";
			$t_question_group->Description->CssClass = "";
			$t_question_group->Description->ViewCustomAttributes = "";

			// ID
			$t_question_group->ID->HrefValue = "";

			// NAME
			$t_question_group->NAME->HrefValue = "";

			// Description
			$t_question_group->Description->HrefValue = "";
		}

		// Call Row Rendered event
		$t_question_group->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_question_group;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "h";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;

		// Export all
		if ($t_question_group->ExportAll) {
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
		if ($t_question_group->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_question_group->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_question_group->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'ID', $t_question_group->Export);
				ew_ExportAddValue($sExportStr, 'NAME', $t_question_group->Export);
				ew_ExportAddValue($sExportStr, 'Description', $t_question_group->Export);
				echo ew_ExportLine($sExportStr, $t_question_group->Export);
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
				$t_question_group->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_question_group->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('ID', $t_question_group->ID->CurrentValue);
					$XmlDoc->AddField('NAME', $t_question_group->NAME->CurrentValue);
					$XmlDoc->AddField('Description', $t_question_group->Description->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_question_group->Export <> "csv") { // Vertical format
						echo ew_ExportField('ID', $t_question_group->ID->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						echo ew_ExportField('NAME', $t_question_group->NAME->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						echo ew_ExportField('Description', $t_question_group->Description->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_question_group->ID->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						ew_ExportAddValue($sExportStr, $t_question_group->NAME->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						ew_ExportAddValue($sExportStr, $t_question_group->Description->ExportValue($t_question_group->Export, $t_question_group->ExportOriginalValue), $t_question_group->Export);
						echo ew_ExportLine($sExportStr, $t_question_group->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_question_group->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_question_group->Export);
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
