<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_careerinfo.php" ?>
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
$Nganhnghe_list = new cNganhnghe_list();
$Page =& $Nganhnghe_list;

// Page init processing
$Nganhnghe_list->Page_Init();

// Page main processing
$Nganhnghe_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($Nganhnghe->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var Nganhnghe_list = new ew_Page("Nganhnghe_list");

// page properties
Nganhnghe_list.PageID = "list"; // page ID
var EW_PAGE_ID = Nganhnghe_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Nganhnghe_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
Nganhnghe_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Nganhnghe_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($Nganhnghe->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($Nganhnghe->Export == "" && $Nganhnghe->SelectLimit);
	if (!$bSelectLimit)
		$rs = $Nganhnghe_list->LoadRecordset();
	$Nganhnghe_list->lTotalRecs = ($bSelectLimit) ? $Nganhnghe->SelectRecordCount() : $rs->RecordCount();
	$Nganhnghe_list->lStartRec = 1;
	if ($Nganhnghe_list->lDisplayRecs <= 0) // Display all records
		$Nganhnghe_list->lDisplayRecs = $Nganhnghe_list->lTotalRecs;
	if (!($Nganhnghe->ExportAll && $Nganhnghe->Export <> ""))
		$Nganhnghe_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $Nganhnghe_list->LoadRecordset($Nganhnghe_list->lStartRec-1, $Nganhnghe_list->lDisplayRecs);
?>
<br>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>

<?php if ($Security->CanSearch()) { ?>
<?php if ($Nganhnghe->Export == "" && $Nganhnghe->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(Nganhnghe_list);" style="text-decoration: none;"><img id="Nganhnghe_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker"></font><font face="Verdana" size="2">Tìm kiếm</font></span></b></span><br>
<div id="Nganhnghe_list_SearchPanel">
<form name="fNganhnghelistsrch" id="fNganhnghelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="Nganhnghe">
<br>
<table class="ewBasicSearch" width="725" id="table6" bgcolor="#EBEBEB">
	<tr>
	<td width ="100"></td>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($Nganhnghe->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="  Tìm kiếm  ">&nbsp;
			<a href="<?php echo $Nganhnghe_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td width ="100"></td>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($Nganhnghe->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($Nganhnghe->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($Nganhnghe->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $Nganhnghe_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($Nganhnghe->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($Nganhnghe->CurrentAction <> "gridadd" && $Nganhnghe->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Nganhnghe_list->Pager)) $Nganhnghe_list->Pager = new cNumericPager($Nganhnghe_list->lStartRec, $Nganhnghe_list->lDisplayRecs, $Nganhnghe_list->lTotalRecs, $Nganhnghe_list->lRecRange) ?>
<?php if ($Nganhnghe_list->Pager->RecordCount > 0) { ?>
	<?php if ($Nganhnghe_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Nganhnghe_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các nhóm ngành nghề từ <?php echo $Nganhnghe_list->Pager->FromIndex ?> đến <?php echo $Nganhnghe_list->Pager->ToIndex ?> của <?php echo $Nganhnghe_list->Pager->RecordCount ?> nhóm ngành
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Nganhnghe_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có nhóm ngành nghề
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($Nganhnghe_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="Nganhnghe">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Nganhnghe_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Nganhnghe_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Nganhnghe_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Nganhnghe->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<br>
<a href="<?php echo $Nganhnghe->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fNganhnghelist" id="fNganhnghelist" class="ewForm" action="" method="post">
<?php if ($Nganhnghe_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$Nganhnghe_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$Nganhnghe_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$Nganhnghe_list->lOptionCnt++; // Delete
}
if ($Security->AllowList('Nganhnghe')) {
	$Nganhnghe_list->lOptionCnt++; // Detail
}
	$Nganhnghe_list->lOptionCnt += count($Nganhnghe_list->ListOptions->Items); // Custom list options
?>
<?php echo $Nganhnghe->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Nganhnghe->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->AllowList('Nganhnghe')) { ?>
<td style="white-space: nowrap;width: 30px;" align="center"></td>
<?php } ?>
<?php

// Custom list options
foreach ($Nganhnghe_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($Nganhnghe->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
	<?php if ($Nganhnghe->SortUrl($Nganhnghe->nganhnghe_ten) == "") { ?>
		<td style="white-space: nowrap;">Nganhnghe Ten</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $Nganhnghe->SortUrl($Nganhnghe->nganhnghe_ten) ?>',1);" style="white-space: nowrap; width: 680px;">
			<table cellspacing="0" class="ewTableHeaderBtn" ><tr><td align="center" >Nhóm ngành nghề</td><td style="width: 10px;"><?php if ($Nganhnghe->nganhnghe_ten->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($Nganhnghe->nganhnghe_ten->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	
	</tr>
</thead>
<?php
if ($Nganhnghe->ExportAll && $Nganhnghe->Export <> "") {
	$Nganhnghe_list->lStopRec = $Nganhnghe_list->lTotalRecs;
} else {
	$Nganhnghe_list->lStopRec = $Nganhnghe_list->lStartRec + $Nganhnghe_list->lDisplayRecs - 1; // Set the last record to display
}
$Nganhnghe_list->lRecCount = $Nganhnghe_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$Nganhnghe->SelectLimit && $Nganhnghe_list->lStartRec > 1)
		$rs->Move($Nganhnghe_list->lStartRec - 1);
}
$Nganhnghe_list->lRowCnt = 0;
while (($Nganhnghe->CurrentAction == "gridadd" || !$rs->EOF) &&
	$Nganhnghe_list->lRecCount < $Nganhnghe_list->lStopRec) {
	$Nganhnghe_list->lRecCount++;
	if (intval($Nganhnghe_list->lRecCount) >= intval($Nganhnghe_list->lStartRec)) {
		$Nganhnghe_list->lRowCnt++;

	// Init row class and style
	$Nganhnghe->CssClass = "";
	$Nganhnghe->CssStyle = "";
	$Nganhnghe->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($Nganhnghe->CurrentAction == "gridadd") {
		$Nganhnghe_list->LoadDefaultValues(); // Load default values
	} else {
		$Nganhnghe_list->LoadRowValues($rs); // Load row values
	}
	$Nganhnghe->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$Nganhnghe_list->RenderRow();
?>
	<tr<?php echo $Nganhnghe->RowAttributes() ?>>
<?php if ($Nganhnghe->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;"><span class="phpmaker">
<a href="<?php echo $Nganhnghe->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 30px;"><span class="phpmaker">
<a href="<?php echo $Nganhnghe->DeleteUrl() ?>">Xóa</a>
</span></td>
<?php } ?>
<?php if ($Security->AllowList('Nganhnghe')) { ?>
<td style="white-space: nowrap; width: 30px;"><span class="phpmaker">
<a href="careerlist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=Nganhnghe&nganhnghe_id=<?php echo urlencode(strval($Nganhnghe->nganhnghe_id->CurrentValue)) ?>">Ngành nghề con</a>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($Nganhnghe_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
<td><table><tr>
<?php if ($Nganhnghe->nganhnghe_pic->Visible) { // nganhnghe_pic ?>
		<td<?php echo $Nganhnghe->nganhnghe_pic->CellAttributes() ?>>
<?php if ($Nganhnghe->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="manager_career_pic_bv.php?nganhnghe_id=<?php echo $Nganhnghe->nganhnghe_id->CurrentValue ?>" border=0<?php echo $Nganhnghe->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($Nganhnghe->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="manager_career_pic_bv.php?nganhnghe_id=<?php echo $Nganhnghe->nganhnghe_id->CurrentValue ?>" border=0<?php echo $Nganhnghe->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($Nganhnghe->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>



	<?php if ($Nganhnghe->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
		<td<?php echo $Nganhnghe->nganhnghe_ten->CellAttributes() ?>>
<?php echo $Nganhnghe->nganhnghe_ten->ListViewValue() ?>
</td>
	<?php } ?>
	
	</tr></table></td></tr>
<?php
	}
	if ($Nganhnghe->CurrentAction <> "gridadd")
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
<?php if ($Nganhnghe_list->lTotalRecs > 0) { ?>
<?php if ($Nganhnghe->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($Nganhnghe->CurrentAction <> "gridadd" && $Nganhnghe->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($Nganhnghe_list->Pager)) $Nganhnghe_list->Pager = new cNumericPager($Nganhnghe_list->lStartRec, $Nganhnghe_list->lDisplayRecs, $Nganhnghe_list->lTotalRecs, $Nganhnghe_list->lRecRange) ?>
<?php if ($Nganhnghe_list->Pager->RecordCount > 0) { ?>
	<?php if ($Nganhnghe_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($Nganhnghe_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $Nganhnghe_list->PageUrl() ?>start=<?php echo $Nganhnghe_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($Nganhnghe_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các nhóm ngành nghề từ <?php echo $Nganhnghe_list->Pager->FromIndex ?> đến <?php echo $Nganhnghe_list->Pager->ToIndex ?> của <?php echo $Nganhnghe_list->Pager->RecordCount ?> nhóm ngành
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($Nganhnghe_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($Nganhnghe_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="Nganhnghe">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($Nganhnghe_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($Nganhnghe_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($Nganhnghe_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($Nganhnghe->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($Nganhnghe_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<br>
<a href="<?php echo $Nganhnghe->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($Nganhnghe->Export == "" && $Nganhnghe->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(Nganhnghe_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($Nganhnghe->Export == "") { ?>
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
class cNganhnghe_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'Nganhnghe';

	// Page Object Name
	var $PageObjName = 'Nganhnghe_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Nganhnghe;
		if ($Nganhnghe->UseTokenInUrl) $PageUrl .= "t=" . $Nganhnghe->TableVar . "&"; // add page token
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
		global $objForm, $Nganhnghe;
		if ($Nganhnghe->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Nganhnghe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Nganhnghe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cNganhnghe_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["Nganhnghe"] = new cNganhnghe();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Nganhnghe', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Nganhnghe;
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
	$Nganhnghe->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $Nganhnghe->Export; // Get export parameter, used in header
	$gsExportFile = $Nganhnghe->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $Nganhnghe;
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
		if ($Nganhnghe->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $Nganhnghe->getRecordsPerPage(); // Restore from Session
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
		$Nganhnghe->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$Nganhnghe->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$Nganhnghe->setStartRecordNumber($this->lStartRec);
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
		$Nganhnghe->setSessionWhere($sFilter);
		$Nganhnghe->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $Nganhnghe;
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
			$Nganhnghe->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$Nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $Nganhnghe;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $Nganhnghe->nganhnghe_ten->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $Nganhnghe;
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
			$Nganhnghe->setBasicSearchKeyword($sSearchKeyword);
			$Nganhnghe->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $Nganhnghe;
		$this->sSrchWhere = "";
		$Nganhnghe->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $Nganhnghe;
		$Nganhnghe->setBasicSearchKeyword("");
		$Nganhnghe->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $Nganhnghe;
		$this->sSrchWhere = $Nganhnghe->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $Nganhnghe;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$Nganhnghe->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$Nganhnghe->CurrentOrderType = @$_GET["ordertype"];
			$Nganhnghe->UpdateSort($Nganhnghe->nganhnghe_ten); // Field 
			$Nganhnghe->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $Nganhnghe;
		$sOrderBy = $Nganhnghe->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($Nganhnghe->SqlOrderBy() <> "") {
				$sOrderBy = $Nganhnghe->SqlOrderBy();
				$Nganhnghe->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $Nganhnghe;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$Nganhnghe->setSessionOrderBy($sOrderBy);
				$Nganhnghe->nganhnghe_ten->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$Nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $Nganhnghe;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$Nganhnghe->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$Nganhnghe->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $Nganhnghe->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$Nganhnghe->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$Nganhnghe->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$Nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Nganhnghe;

		// Call Recordset Selecting event
		$Nganhnghe->Recordset_Selecting($Nganhnghe->CurrentFilter);

		// Load list page SQL
		$sSql = $Nganhnghe->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Nganhnghe->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Nganhnghe;
		$sFilter = $Nganhnghe->KeyFilter();

		// Call Row Selecting event
		$Nganhnghe->Row_Selecting($sFilter);

		// Load sql based on filter
		$Nganhnghe->CurrentFilter = $sFilter;
		$sSql = $Nganhnghe->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Nganhnghe->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Nganhnghe;
		$Nganhnghe->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$Nganhnghe->nganhnghe_ten->setDbValue($rs->fields('nganhnghe_ten'));
		$Nganhnghe->nganhnghe_pic->Upload->DbValue = $rs->fields('nganhnghe_pic');
		$Nganhnghe->nganhnghe_belongto->setDbValue($rs->fields('nganhnghe_belongto'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Nganhnghe;

		// Call Row_Rendering event
		$Nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$Nganhnghe->nganhnghe_ten->CellCssStyle = "white-space: nowrap;";
		$Nganhnghe->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$Nganhnghe->nganhnghe_pic->CellCssStyle = "white-space: nowrap;";
		$Nganhnghe->nganhnghe_pic->CellCssClass = "";
		if ($Nganhnghe->RowType == EW_ROWTYPE_VIEW) { // View row

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->ViewValue = $Nganhnghe->nganhnghe_ten->CurrentValue;
			$Nganhnghe->nganhnghe_ten->CssStyle = "";
			$Nganhnghe->nganhnghe_ten->CssClass = "";
			$Nganhnghe->nganhnghe_ten->ViewCustomAttributes = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->ViewValue = "Nganhnghe Pic";
				$Nganhnghe->nganhnghe_pic->ImageAlt = "";
			} else {
				$Nganhnghe->nganhnghe_pic->ViewValue = "";
			}
			$Nganhnghe->nganhnghe_pic->CssStyle = "";
			$Nganhnghe->nganhnghe_pic->CssClass = "";
			$Nganhnghe->nganhnghe_pic->ViewCustomAttributes = "";

			// nganhnghe_ten
			$Nganhnghe->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($Nganhnghe->nganhnghe_pic->Upload->DbValue)) {
				$Nganhnghe->nganhnghe_pic->HrefValue = "manager_career_pic_bv.php?nganhnghe_id=" . $Nganhnghe->nganhnghe_id->CurrentValue;
				if ($Nganhnghe->Export <> "") $Nganhnghe->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($Nganhnghe->nganhnghe_pic->HrefValue);
			} else {
				$Nganhnghe->nganhnghe_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$Nganhnghe->Row_Rendered();
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
