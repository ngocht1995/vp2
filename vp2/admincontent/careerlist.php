<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "careerinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "manager_careerinfo.php" ?>
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
$career_list = new ccareer_list();
$Page =& $career_list;

// Page init processing
$career_list->Page_Init();

// Page main processing
$career_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($career->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var career_list = new ew_Page("career_list");

// page properties
career_list.PageID = "list"; // page ID
var EW_PAGE_ID = career_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
career_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
career_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
career_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($career->Export == "") { ?>
<?php
$gsMasterReturnUrl = "manager_careerlist.php";
if ($career_list->sDbMasterFilter <> "" && $career->getCurrentMasterTable() == "Nganhnghe") {
	if ($career_list->bMasterRecordExists) {
		if ($career->getCurrentMasterTable() == $career->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "manager_careermaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($career->Export == "" && $career->SelectLimit);
	if (!$bSelectLimit)
		$rs = $career_list->LoadRecordset();
	$career_list->lTotalRecs = ($bSelectLimit) ? $career->SelectRecordCount() : $rs->RecordCount();
	$career_list->lStartRec = 1;
	if ($career_list->lDisplayRecs <= 0) // Display all records
		$career_list->lDisplayRecs = $career_list->lTotalRecs;
	if (!($career->ExportAll && $career->Export <> ""))
		$career_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $career_list->LoadRecordset($career_list->lStartRec-1, $career_list->lDisplayRecs);
?>
<br>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" >
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Ngành nghề thuộc nhóm</font></b></td>
								<td height="20" width="54%" >
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $career_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($career->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($career->CurrentAction <> "gridadd" && $career->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($career_list->Pager)) $career_list->Pager = new cNumericPager($career_list->lStartRec, $career_list->lDisplayRecs, $career_list->lTotalRecs, $career_list->lRecRange) ?>
<?php if ($career_list->Pager->RecordCount > 0) { ?>
	<?php if ($career_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($career_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các ngành từ <?php echo $career_list->Pager->FromIndex ?> đến <?php echo $career_list->Pager->ToIndex ?> của <?php echo $career_list->Pager->RecordCount ?> ngành
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($career_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có ngành
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($career_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiên thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="career">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($career_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($career_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($career_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($career->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $career->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fcareerlist" id="fcareerlist" class="ewForm" action="" method="post">
<?php if ($career_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$career_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$career_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$career_list->lOptionCnt++; // Delete
}
	$career_list->lOptionCnt += count($career_list->ListOptions->Items); // Custom list options
?>
<?php echo $career->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($career->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;width: 30px;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;width: 30px;">&nbsp;</td>
<?php } ?>
<?php

// Custom list options
foreach ($career_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($career->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
	<?php if ($career->SortUrl($career->nganhnghe_ten) == "") { ?>
		<td style="white-space: nowrap;width: 680px;">Nganhnghe Ten</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $career->SortUrl($career->nganhnghe_ten) ?>',1);" style="white-space: nowrap;width: 680px;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td align="center">Ngành nghề</td><td style="width: 10px;"><?php if ($career->nganhnghe_ten->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($career->nganhnghe_ten->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	
	</tr>
</thead>
<?php
if ($career->ExportAll && $career->Export <> "") {
	$career_list->lStopRec = $career_list->lTotalRecs;
} else {
	$career_list->lStopRec = $career_list->lStartRec + $career_list->lDisplayRecs - 1; // Set the last record to display
}
$career_list->lRecCount = $career_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$career->SelectLimit && $career_list->lStartRec > 1)
		$rs->Move($career_list->lStartRec - 1);
}
$career_list->lRowCnt = 0;
while (($career->CurrentAction == "gridadd" || !$rs->EOF) &&
	$career_list->lRecCount < $career_list->lStopRec) {
	$career_list->lRecCount++;
	if (intval($career_list->lRecCount) >= intval($career_list->lStartRec)) {
		$career_list->lRowCnt++;

	// Init row class and style
	$career->CssClass = "";
	$career->CssStyle = "";
	$career->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($career->CurrentAction == "gridadd") {
		$career_list->LoadDefaultValues(); // Load default values
	} else {
		$career_list->LoadRowValues($rs); // Load row values
	}
	$career->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$career_list->RenderRow();
?>
	<tr<?php echo $career->RowAttributes() ?>>
<?php if ($career->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $career->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $career->DeleteUrl() ?>">Xóa</a>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($career_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<td><table><tr>
	<?php if ($career->nganhnghe_pic->Visible) { // nganhnghe_pic ?>
		<td<?php echo $career->nganhnghe_pic->CellAttributes() ?>>
<?php if ($career->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<a href="<?php echo $career->nganhnghe_pic->HrefValue ?>" target="_blank"><img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($career->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
		<td<?php echo $career->nganhnghe_ten->CellAttributes() ?>>
<div<?php echo $career->nganhnghe_ten->ViewAttributes() ?>><?php echo $career->nganhnghe_ten->ListViewValue() ?></div>
</td>
	<?php } ?>
	</td></table></tr>
	</tr>
<?php
	}
	if ($career->CurrentAction <> "gridadd")
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
<?php if ($career_list->lTotalRecs > 0) { ?>
<?php if ($career->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($career->CurrentAction <> "gridadd" && $career->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($career_list->Pager)) $career_list->Pager = new cNumericPager($career_list->lStartRec, $career_list->lDisplayRecs, $career_list->lTotalRecs, $career_list->lRecRange) ?>
<?php if ($career_list->Pager->RecordCount > 0) { ?>
	<?php if ($career_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($career_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $career_list->PageUrl() ?>start=<?php echo $career_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($career_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Các ngành từ <?php echo $career_list->Pager->FromIndex ?> đến <?php echo $career_list->Pager->ToIndex ?> của <?php echo $career_list->Pager->RecordCount ?> ngành
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($career_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có ngành nghề
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($career_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="career">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($career_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($career_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($career_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($career->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($career_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $career->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($career->Export == "" && $career->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(career_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($career->Export == "") { ?>
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
class ccareer_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'career';

	// Page Object Name
	var $PageObjName = 'career_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $career;
		if ($career->UseTokenInUrl) $PageUrl .= "t=" . $career->TableVar . "&"; // add page token
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
		global $objForm, $career;
		if ($career->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($career->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($career->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ccareer_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["career"] = new ccareer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['Nganhnghe'] = new cNganhnghe();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'career', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $career;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("Nganhnghe");
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
	$career->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $career->Export; // Get export parameter, used in header
	$gsExportFile = $career->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $career;
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
		if ($career->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $career->getRecordsPerPage(); // Restore from Session
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
		$this->sDbMasterFilter = $career->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $career->getDetailFilter(); // Restore detail filter
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($career->getMasterFilter() <> "" && $career->getCurrentMasterTable() == "Nganhnghe") {
			global $Nganhnghe;
			$rsmaster = $Nganhnghe->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$career->setMasterFilter(""); // Clear master filter
				$career->setDetailFilter(""); // Clear detail filter
				$this->setMessage("Không có dữ liệu"); // Set no record found
				$this->Page_Terminate($career->getReturnUrl()); // Return to caller
			} else {
				$Nganhnghe->LoadListRowValues($rsmaster);
				$Nganhnghe->RowType = EW_ROWTYPE_MASTER; // Master row
				$Nganhnghe->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$career->setSessionWhere($sFilter);
		$career->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $career;
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
			$career->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$career->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $career;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$career->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$career->CurrentOrderType = @$_GET["ordertype"];
			$career->UpdateSort($career->nganhnghe_ten); // Field 
			$career->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $career;
		$sOrderBy = $career->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($career->SqlOrderBy() <> "") {
				$sOrderBy = $career->SqlOrderBy();
				$career->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $career;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$career->getCurrentMasterTable = ""; // Clear master table
				$career->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$career->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$career->nganhnghe_belongto->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$career->setSessionOrderBy($sOrderBy);
				$career->nganhnghe_ten->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$career->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $career;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$career->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$career->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $career->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$career->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$career->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$career->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $career;

		// Call Recordset Selecting event
		$career->Recordset_Selecting($career->CurrentFilter);

		// Load list page SQL
		$sSql = $career->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$career->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $career;
		$sFilter = $career->KeyFilter();

		// Call Row Selecting event
		$career->Row_Selecting($sFilter);

		// Load sql based on filter
		$career->CurrentFilter = $sFilter;
		$sSql = $career->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$career->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $career;
		$career->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$career->nganhnghe_ten->setDbValue($rs->fields('nganhnghe_ten'));
		$career->nganhnghe_pic->Upload->DbValue = $rs->fields('nganhnghe_pic');
		$career->nganhnghe_belongto->setDbValue($rs->fields('nganhnghe_belongto'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $career;

		// Call Row_Rendering event
		$career->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$career->nganhnghe_ten->CellCssStyle = "white-space: nowrap;";
		$career->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$career->nganhnghe_pic->CellCssStyle = "white-space: nowrap;";
		$career->nganhnghe_pic->CellCssClass = "";
		if ($career->RowType == EW_ROWTYPE_VIEW) { // View row

			// nganhnghe_ten
			$career->nganhnghe_ten->ViewValue = $career->nganhnghe_ten->CurrentValue;
			$career->nganhnghe_ten->CssStyle = "";
			$career->nganhnghe_ten->CssClass = "";
			$career->nganhnghe_ten->ViewCustomAttributes = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->ViewValue = "Nganhnghe Pic";
				$career->nganhnghe_pic->ImageWidth = 20;
				$career->nganhnghe_pic->ImageHeight = 0;
				$career->nganhnghe_pic->ImageAlt = "";
			} else {
				$career->nganhnghe_pic->ViewValue = "";
			}
			$career->nganhnghe_pic->CssStyle = "";
			$career->nganhnghe_pic->CssClass = "";
			$career->nganhnghe_pic->ViewCustomAttributes = "";

			// nganhnghe_ten
			$career->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->HrefValue = "career_nganhnghe_pic_bv.php?nganhnghe_id=" . $career->nganhnghe_id->CurrentValue;
				if ($career->Export <> "") $career->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($career->nganhnghe_pic->HrefValue);
			} else {
				$career->nganhnghe_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$career->Row_Rendered();
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $career;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "Nganhnghe") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $career->SqlMasterFilter_Nganhnghe();
				$this->sDbDetailFilter = $career->SqlDetailFilter_Nganhnghe();
				if (@$_GET["nganhnghe_id"] <> "") {
					$GLOBALS["Nganhnghe"]->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);
					$career->nganhnghe_belongto->setQueryStringValue($GLOBALS["Nganhnghe"]->nganhnghe_id->QueryStringValue);
					$career->nganhnghe_belongto->setSessionValue($career->nganhnghe_belongto->QueryStringValue);
					if (!is_numeric($GLOBALS["Nganhnghe"]->nganhnghe_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@nganhnghe_id@", ew_AdjustSql($GLOBALS["Nganhnghe"]->nganhnghe_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@nganhnghe_belongto@", ew_AdjustSql($GLOBALS["Nganhnghe"]->nganhnghe_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$career->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$career->setStartRecordNumber($this->lStartRec);
			$career->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$career->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "Nganhnghe") {
				if ($career->nganhnghe_belongto->QueryStringValue == "") $career->nganhnghe_belongto->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $career->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $career->getDetailFilter(); // Restore detail filter
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
