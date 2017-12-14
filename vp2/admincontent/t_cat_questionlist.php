<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_questioninfo.php" ?>
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
$t_cat_question_list = new ct_cat_question_list();
$Page =& $t_cat_question_list;

// Page init processing
$t_cat_question_list->Page_Init();

// Page main processing
$t_cat_question_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_cat_question->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_question_list = new ew_Page("t_cat_question_list");

// page properties
t_cat_question_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_cat_question_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_cat_question_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_question_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_question_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_question_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_cat_question->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_cat_question->Export == "" && $t_cat_question->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_cat_question_list->LoadRecordset();
	$t_cat_question_list->lTotalRecs = ($bSelectLimit) ? $t_cat_question->SelectRecordCount() : $rs->RecordCount();
	$t_cat_question_list->lStartRec = 1;
	if ($t_cat_question_list->lDisplayRecs <= 0) // Display all records
		$t_cat_question_list->lDisplayRecs = $t_cat_question_list->lTotalRecs;
	if (!($t_cat_question->ExportAll && $t_cat_question->Export <> ""))
		$t_cat_question_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_cat_question_list->LoadRecordset($t_cat_question_list->lStartRec-1, $t_cat_question_list->lDisplayRecs);
?><table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục loại câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($t_cat_question->Export == "" && $t_cat_question->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_cat_question_list);" style="text-decoration: none;"><img id="t_cat_question_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_cat_question_list_SearchPanel">
<form name="ft_cat_questionlistsrch" id="ft_cat_questionlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_cat_question">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_cat_question->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm">&nbsp;
			<a href="<?php echo $t_cat_question_list->PageUrl() ?>cmd=reset">Hiện hết</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_cat_question->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_cat_question->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_cat_question->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_cat_question_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_cat_question->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_cat_question->CurrentAction <> "gridadd" && $t_cat_question->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_question_list->Pager)) $t_cat_question_list->Pager = new cNumericPager($t_cat_question_list->lStartRec, $t_cat_question_list->lDisplayRecs, $t_cat_question_list->lTotalRecs, $t_cat_question_list->lRecRange) ?>
<?php if ($t_cat_question_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_question_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_question_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->LastButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $t_cat_question_list->Pager->FromIndex ?> tới <?php echo $t_cat_question_list->Pager->ToIndex ?> of <?php echo $t_cat_question_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_cat_question_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi nào 
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_cat_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_cat_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_cat_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_cat_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_cat_question_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_cat_question_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_cat_question_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_cat_question->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_cat_question->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_cat_question_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_cat_questionlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_cat_question_list->sDeleteConfirmMsg ?>')) {document.ft_cat_questionlist.action='t_cat_questiondelete.php';document.ft_cat_questionlist.encoding='application/x-www-form-urlencoded';document.ft_cat_questionlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_cat_questionlist" id="ft_cat_questionlist" class="ewForm" action="" method="post">
<?php if ($t_cat_question_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_cat_question_list->lOptionCnt = 0;
	$t_cat_question_list->lOptionCnt++; // view
	$t_cat_question_list->lOptionCnt++; // edit
	$t_cat_question_list->lOptionCnt++; // copy
	$t_cat_question_list->lOptionCnt++; // Multi-select
	$t_cat_question_list->lOptionCnt += count($t_cat_question_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_cat_question->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_cat_question->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_cat_question_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_cat_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($t_cat_question->cat_question_id->Visible) { // cat_question_id ?>
	<?php if ($t_cat_question->SortUrl($t_cat_question->cat_question_id) == "") { ?>
		<td>Mã danh mục</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_cat_question->SortUrl($t_cat_question->cat_question_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã danh mục</td><td style="width: 10px;"><?php if ($t_cat_question->cat_question_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_cat_question->cat_question_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_cat_question->name->Visible) { // name ?>
	<?php if ($t_cat_question->SortUrl($t_cat_question->name) == "") { ?>
		<td>Tên danh mục</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_cat_question->SortUrl($t_cat_question->name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên danh mục</td><td style="width: 10px;"><?php if ($t_cat_question->name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_cat_question->name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_cat_question->ExportAll && $t_cat_question->Export <> "") {
	$t_cat_question_list->lStopRec = $t_cat_question_list->lTotalRecs;
} else {
	$t_cat_question_list->lStopRec = $t_cat_question_list->lStartRec + $t_cat_question_list->lDisplayRecs - 1; // Set the last record to display
}
$t_cat_question_list->lRecCount = $t_cat_question_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_cat_question->SelectLimit && $t_cat_question_list->lStartRec > 1)
		$rs->Move($t_cat_question_list->lStartRec - 1);
}
$t_cat_question_list->lRowCnt = 0;
while (($t_cat_question->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_cat_question_list->lRecCount < $t_cat_question_list->lStopRec) {
	$t_cat_question_list->lRecCount++;
	if (intval($t_cat_question_list->lRecCount) >= intval($t_cat_question_list->lStartRec)) {
		$t_cat_question_list->lRowCnt++;

	// Init row class and style
	$t_cat_question->CssClass = "";
	$t_cat_question->CssStyle = "";
	$t_cat_question->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_cat_question->CurrentAction == "gridadd") {
		$t_cat_question_list->LoadDefaultValues(); // Load default values
	} else {
		$t_cat_question_list->LoadRowValues($rs); // Load row values
	}
	$t_cat_question->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_cat_question_list->RenderRow();
?>
	<tr<?php echo $t_cat_question->RowAttributes() ?>>
<?php if ($t_cat_question->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_cat_question->ViewUrl() ?>">xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_cat_question->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_cat_question->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_cat_question->cat_question_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_cat_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($t_cat_question->cat_question_id->Visible) { // cat_question_id ?>
		<td<?php echo $t_cat_question->cat_question_id->CellAttributes() ?>>
<div<?php echo $t_cat_question->cat_question_id->ViewAttributes() ?>><?php echo $t_cat_question->cat_question_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_cat_question->name->Visible) { // name ?>
		<td<?php echo $t_cat_question->name->CellAttributes() ?>>
<div<?php echo $t_cat_question->name->ViewAttributes() ?>><?php echo $t_cat_question->name->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_cat_question->CurrentAction <> "gridadd")
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
<?php if ($t_cat_question_list->lTotalRecs > 0) { ?>
<?php if ($t_cat_question->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_cat_question->CurrentAction <> "gridadd" && $t_cat_question->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_cat_question_list->Pager)) $t_cat_question_list->Pager = new cNumericPager($t_cat_question_list->lStartRec, $t_cat_question_list->lDisplayRecs, $t_cat_question_list->lTotalRecs, $t_cat_question_list->lRecRange) ?>
<?php if ($t_cat_question_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_cat_question_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_cat_question_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_cat_question_list->PageUrl() ?>start=<?php echo $t_cat_question_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_cat_question_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi<?php echo $t_cat_question_list->Pager->FromIndex ?> tới <?php echo $t_cat_question_list->Pager->ToIndex ?> of <?php echo $t_cat_question_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($t_cat_question_list->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi nào tìm thấy
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($t_cat_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_cat_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_cat_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_cat_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_cat_question_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_cat_question_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_cat_question_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_cat_question->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_cat_question_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_cat_question->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_cat_question_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_cat_questionlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_cat_question_list->sDeleteConfirmMsg ?>')) {document.ft_cat_questionlist.action='t_cat_questiondelete.php';document.ft_cat_questionlist.encoding='application/x-www-form-urlencoded';document.ft_cat_questionlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_cat_question->Export == "" && $t_cat_question->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_cat_question_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_cat_question->Export == "") { ?>
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
class ct_cat_question_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_cat_question';

	// Page Object Name
	var $PageObjName = 't_cat_question_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_question;
		if ($t_cat_question->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_question->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_question;
		if ($t_cat_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_question_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_question"] = new ct_cat_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_question;
	$t_cat_question->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_cat_question->Export; // Get export parameter, used in header
	$gsExportFile = $t_cat_question->TableVar; // Get export file, used in header
	if ($t_cat_question->Export == "print" || $t_cat_question->Export == "html") {

		// Printer friendly or Export to HTML, no action required
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
		global $objForm, $gsSearchError, $Security, $t_cat_question;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
		$this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn không?"; // Delete confirm message

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
		if ($t_cat_question->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_cat_question->getRecordsPerPage(); // Restore from Session
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
		$t_cat_question->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_cat_question->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_cat_question->setStartRecordNumber($this->lStartRec);
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
		$t_cat_question->setSessionWhere($sFilter);
		$t_cat_question->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_cat_question;
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
			$t_cat_question->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $t_cat_question;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_cat_question->name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_cat_question;
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
			$t_cat_question->setBasicSearchKeyword($sSearchKeyword);
			$t_cat_question->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_cat_question;
		$this->sSrchWhere = "";
		$t_cat_question->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_cat_question;
		$t_cat_question->setBasicSearchKeyword("");
		$t_cat_question->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_cat_question;
		$this->sSrchWhere = $t_cat_question->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_cat_question;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_cat_question->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_cat_question->CurrentOrderType = @$_GET["ordertype"];
			$t_cat_question->UpdateSort($t_cat_question->cat_question_id); // Field 
			$t_cat_question->UpdateSort($t_cat_question->name); // Field 
			$t_cat_question->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_cat_question;
		$sOrderBy = $t_cat_question->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_cat_question->SqlOrderBy() <> "") {
				$sOrderBy = $t_cat_question->SqlOrderBy();
				$t_cat_question->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_cat_question;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_cat_question->setSessionOrderBy($sOrderBy);
				$t_cat_question->cat_question_id->setSort("");
				$t_cat_question->name->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_cat_question;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_cat_question->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_cat_question->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_cat_question->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_cat_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_cat_question;

		// Call Recordset Selecting event
		$t_cat_question->Recordset_Selecting($t_cat_question->CurrentFilter);

		// Load list page SQL
		$sSql = $t_cat_question->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_cat_question->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_question;
		$sFilter = $t_cat_question->KeyFilter();

		// Call Row Selecting event
		$t_cat_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_question->CurrentFilter = $sFilter;
		$sSql = $t_cat_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_question;
		$t_cat_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_cat_question->name->setDbValue($rs->fields('name'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_question;

		// Call Row_Rendering event
		$t_cat_question->Row_Rendering();

		// Common render codes for all row types
		// cat_question_id

		$t_cat_question->cat_question_id->CellCssStyle = "";
		$t_cat_question->cat_question_id->CellCssClass = "";

		// name
		$t_cat_question->name->CellCssStyle = "";
		$t_cat_question->name->CellCssClass = "";
		if ($t_cat_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// cat_question_id
			$t_cat_question->cat_question_id->ViewValue = $t_cat_question->cat_question_id->CurrentValue;
			$t_cat_question->cat_question_id->CssStyle = "";
			$t_cat_question->cat_question_id->CssClass = "";
			$t_cat_question->cat_question_id->ViewCustomAttributes = "";

			// name
			$t_cat_question->name->ViewValue = $t_cat_question->name->CurrentValue;
			$t_cat_question->name->CssStyle = "";
			$t_cat_question->name->CssClass = "";
			$t_cat_question->name->ViewCustomAttributes = "";

			// cat_question_id
			$t_cat_question->cat_question_id->HrefValue = "";

			// name
			$t_cat_question->name->HrefValue = "";
		}

		// Call Row Rendered event
		$t_cat_question->Row_Rendered();
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
