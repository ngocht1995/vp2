<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_answerinfo.php" ?>
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
$t_answer_list = new ct_answer_list();
$Page =& $t_answer_list;

// Page init processing
$t_answer_list->Page_Init();

// Page main processing
$t_answer_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_answer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_answer_list = new ew_Page("t_answer_list");

// page properties
t_answer_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_answer_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_answer_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_answer_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_answer_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_answer_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_answer->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_answer->Export == "" && $t_answer->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_answer_list->LoadRecordset();
	$t_answer_list->lTotalRecs = ($bSelectLimit) ? $t_answer->SelectRecordCount() : $rs->RecordCount();
	$t_answer_list->lStartRec = 1;
	if ($t_answer_list->lDisplayRecs <= 0) // Display all records
		$t_answer_list->lDisplayRecs = $t_answer_list->lTotalRecs;
	if (!($t_answer->ExportAll && $t_answer->Export <> ""))
		$t_answer_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_answer_list->LoadRecordset($t_answer_list->lStartRec-1, $t_answer_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_questionlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục câu trả lời</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $t_answer_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_answer->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_answer->CurrentAction <> "gridadd" && $t_answer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_answer_list->Pager)) $t_answer_list->Pager = new cPrevNextPager($t_answer_list->lStartRec, $t_answer_list->lDisplayRecs, $t_answer_list->lTotalRecs) ?>
<?php if ($t_answer_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_answer_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_answer_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_answer_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_answer_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_answer_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;trong <?php echo $t_answer_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Bản ghi <?php echo $t_answer_list->Pager->FromIndex ?> tới <?php echo $t_answer_list->Pager->ToIndex ?> trong <?php echo $t_answer_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($t_answer_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Xin nhập tiêu trí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không có bản ghi nào được tìm thấy</span>
	<?php } ?>
<?php } ?>
		</td>
<?php if ($t_answer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_answer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_answer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_answer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_answer_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_answer_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_answer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_answer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $t_answer->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_answer_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_answerlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_answer_list->sDeleteConfirmMsg ?>')) {document.ft_answerlist.action='t_answerdelete.php';document.ft_answerlist.encoding='application/x-www-form-urlencoded';document.ft_answerlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_answerlist" id="ft_answerlist" class="ewForm" action="" method="post">
<?php if ($t_answer_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_answer_list->lOptionCnt = 0;
	$t_answer_list->lOptionCnt++; // view
	$t_answer_list->lOptionCnt++; // edit
	//$t_answer_list->lOptionCnt++; // copy
	$t_answer_list->lOptionCnt++; // Multi-select
	$t_answer_list->lOptionCnt += count($t_answer_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_answer->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_answer->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_answer_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_answer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>

		
<?php if ($t_answer->s_faq->Visible) { // s_faq ?>
	<?php if ($t_answer->SortUrl($t_answer->s_faq) == "") { ?>
		<td>FAQ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_answer->SortUrl($t_answer->s_faq) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>FAQ</td><td style="width: 10px;"><?php if ($t_answer->s_faq->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_answer->s_faq->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
<?php if ($t_answer->desciption->Visible) { // desciption ?>
<?php if ($t_answer->SortUrl($t_answer->desciption) == "") { ?>
<td>Mô tả câu trả lời</td>
<?php } else { ?>
<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_answer->SortUrl($t_answer->desciption) ?>',0);">
<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mô tả câu trả lời</td><td style="width: 10px;"><?php if ($t_answer->desciption->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_answer->desciption->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
</td>
<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($t_answer->ExportAll && $t_answer->Export <> "") {
	$t_answer_list->lStopRec = $t_answer_list->lTotalRecs;
} else {
	$t_answer_list->lStopRec = $t_answer_list->lStartRec + $t_answer_list->lDisplayRecs - 1; // Set the last record to display
}
$t_answer_list->lRecCount = $t_answer_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_answer->SelectLimit && $t_answer_list->lStartRec > 1)
		$rs->Move($t_answer_list->lStartRec - 1);
}
$t_answer_list->lRowCnt = 0;
while (($t_answer->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_answer_list->lRecCount < $t_answer_list->lStopRec) {
	$t_answer_list->lRecCount++;
	if (intval($t_answer_list->lRecCount) >= intval($t_answer_list->lStartRec)) {
		$t_answer_list->lRowCnt++;

	// Init row class and style
	$t_answer->CssClass = "";
	$t_answer->CssStyle = "";
	$t_answer->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_answer->CurrentAction == "gridadd") {
		$t_answer_list->LoadDefaultValues(); // Load default values
	} else {
		$t_answer_list->LoadRowValues($rs); // Load row values
	}
	$t_answer->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_answer_list->RenderRow();
?>
	<tr<?php echo $t_answer->RowAttributes() ?>>
<?php if ($t_answer->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_answer->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_answer->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_answer->CopyUrl() ?>">Sao chép</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_answer->answer_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_answer_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	
	<?php if ($t_answer->s_faq->Visible) { // s_faq ?>
		<td<?php echo $t_answer->s_faq->CellAttributes() ?>>
<div<?php echo $t_answer->s_faq->ViewAttributes() ?>><?php echo $t_answer->s_faq->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($t_answer->desciption->Visible) { // desciption ?>
		<td<?php echo $t_answer->desciption->CellAttributes() ?>>
<div<?php echo $t_answer->desciption->ViewAttributes() ?>><?php echo $t_answer->desciption->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($t_answer->CurrentAction <> "gridadd")
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
<?php if ($t_answer_list->lTotalRecs > 0) { ?>
<?php if ($t_answer->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_answer->CurrentAction <> "gridadd" && $t_answer->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_answer_list->Pager)) $t_answer_list->Pager = new cPrevNextPager($t_answer_list->lStartRec, $t_answer_list->lDisplayRecs, $t_answer_list->lTotalRecs) ?>
<?php if ($t_answer_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_answer_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_answer_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_answer_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_answer_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_answer_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_answer_list->PageUrl() ?>start=<?php echo $t_answer_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;trong <?php echo $t_answer_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Bản ghi <?php echo $t_answer_list->Pager->FromIndex ?> tới <?php echo $t_answer_list->Pager->ToIndex ?> trong <?php echo $t_answer_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($t_answer_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Xin nhập tiêu trí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không có bản ghi nào được tìm thấy</span>
	<?php } ?>
<?php } ?>
		</td>
<?php if ($t_answer_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Kích thước trang&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_answer">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_answer_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_answer_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_answer_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_answer_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_answer_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_answer->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_answer_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $t_answer->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<?php if ($t_answer_list->lTotalRecs > 0) { ?>
<a href="" onclick="if (!ew_KeySelected(document.ft_answerlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_answer_list->sDeleteConfirmMsg ?>')) {document.ft_answerlist.action='t_answerdelete.php';document.ft_answerlist.encoding='application/x-www-form-urlencoded';document.ft_answerlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_answer->Export == "" && $t_answer->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_answer_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_answer->Export == "") { ?>
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
class ct_answer_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_answer';

	// Page Object Name
	var $PageObjName = 't_answer_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_answer;
		if ($t_answer->UseTokenInUrl) $PageUrl .= "t=" . $t_answer->TableVar . "&"; // add page token
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
		global $objForm, $t_answer;
		if ($t_answer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_answer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_answer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_answer_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_answer"] = new ct_answer();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_answer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_answer;
	$t_answer->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_answer->Export; // Get export parameter, used in header
	$gsExportFile = $t_answer->TableVar; // Get export file, used in header
	if ($t_answer->Export == "print" || $t_answer->Export == "html") {

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
		global $objForm, $gsSearchError, $Security, $t_answer;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
                if (!@$_GET[EW_TABLE_PAGE_NO] <> "") 
                 {
                    
            
                 $_SESSION["question_id"] = $_GET["question_id"];
                 }
               
		$this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn không?"; // Delete confirm message

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request
                 if ($_SESSION["question_id"] <> "") {
				$this->sSrchWhere = " question_id = " .$_SESSION["question_id"];
			} else {
				$this->sSrchWhere = "";
			}
			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($t_answer->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_answer->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$t_answer->setSessionWhere($sFilter);
		$t_answer->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_answer;
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
			$t_answer->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_answer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_answer;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_answer->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_answer->CurrentOrderType = @$_GET["ordertype"];
			$t_answer->UpdateSort($t_answer->answer_id); // Field 
			$t_answer->UpdateSort($t_answer->question_id); // Field 
			$t_answer->UpdateSort($t_answer->s_faq); // Field 
			$t_answer->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_answer;
		$sOrderBy = $t_answer->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_answer->SqlOrderBy() <> "") {
				$sOrderBy = $t_answer->SqlOrderBy();
				$t_answer->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_answer;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_answer->setSessionOrderBy($sOrderBy);
				$t_answer->answer_id->setSort("");
				$t_answer->question_id->setSort("");
				$t_answer->s_faq->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_answer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_answer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_answer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_answer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_answer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_answer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_answer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_answer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_answer;

		// Call Recordset Selecting event
		$t_answer->Recordset_Selecting($t_answer->CurrentFilter);

		// Load list page SQL
		$sSql = $t_answer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_answer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_answer;
		$sFilter = $t_answer->KeyFilter();

		// Call Row Selecting event
		$t_answer->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_answer->CurrentFilter = $sFilter;
		$sSql = $t_answer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_answer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_answer;
		$t_answer->answer_id->setDbValue($rs->fields('answer_id'));
		$t_answer->question_id->setDbValue($rs->fields('question_id'));
		$t_answer->answer->setDbValue($rs->fields('answer'));
		$t_answer->s_faq->setDbValue($rs->fields('s_faq'));
               $t_answer->desciption->setDbValue($rs->fields('desciption'));
	}

	// Render row values based on field settings
  function RenderRow() {
		global $conn, $Security, $t_answer;

		// Call Row_Rendering event
		$t_answer->Row_Rendering();

		// Common render codes for all row types
		// answer_id

		$t_answer->answer_id->CellCssStyle = "";
		$t_answer->answer_id->CellCssClass = "";

		// question_id
		$t_answer->question_id->CellCssStyle = "";
		$t_answer->question_id->CellCssClass = "";

		// s_faq
		$t_answer->s_faq->CellCssStyle = "";
		$t_answer->s_faq->CellCssClass = "";

		// desciption
		$t_answer->desciption->CellCssStyle = "";
		$t_answer->desciption->CellCssClass = "";
		if ($t_answer->RowType == EW_ROWTYPE_VIEW) { // View row

			// answer_id
			$t_answer->answer_id->ViewValue = $t_answer->answer_id->CurrentValue;
			$t_answer->answer_id->CssStyle = "";
			$t_answer->answer_id->CssClass = "";
			$t_answer->answer_id->ViewCustomAttributes = "";

			// question_id
			$t_answer->question_id->ViewValue = $t_answer->question_id->CurrentValue;
			$t_answer->question_id->CssStyle = "";
			$t_answer->question_id->CssClass = "";
			$t_answer->question_id->ViewCustomAttributes = "";

			// s_faq
			if (strval($t_answer->s_faq->CurrentValue) <> "") {
				switch ($t_answer->s_faq->CurrentValue) {
					case "0":
						$t_answer->s_faq->ViewValue = "Không";
						break;
					case "1":
						$t_answer->s_faq->ViewValue = "Là FAQ";
						break;
					default:
						$t_answer->s_faq->ViewValue = $t_answer->s_faq->CurrentValue;
				}
			} else {
				$t_answer->s_faq->ViewValue = NULL;
			}
			$t_answer->s_faq->CssStyle = "";
			$t_answer->s_faq->CssClass = "";
			$t_answer->s_faq->ViewCustomAttributes = "";

			// desciption
			$t_answer->desciption->ViewValue = $t_answer->desciption->CurrentValue;
			$t_answer->desciption->CssStyle = "";
			$t_answer->desciption->CssClass = "";
			$t_answer->desciption->ViewCustomAttributes = "";

			// answer_id
			$t_answer->answer_id->HrefValue = "";

			// question_id
			$t_answer->question_id->HrefValue = "";

			// s_faq
			$t_answer->s_faq->HrefValue = "";

			// desciption
			$t_answer->desciption->HrefValue = "";
		}

		// Call Row Rendered event
		$t_answer->Row_Rendered();
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
