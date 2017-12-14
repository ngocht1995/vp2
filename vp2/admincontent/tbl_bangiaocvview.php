<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_bangiaocvinfo.php" ?>
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
$tbl_bangiaocv_view = new ctbl_bangiaocv_view();
$Page =& $tbl_bangiaocv_view;

// Page init processing
$tbl_bangiaocv_view->Page_Init();

// Page main processing
$tbl_bangiaocv_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_bangiaocv_view = new ew_Page("tbl_bangiaocv_view");

// page properties
tbl_bangiaocv_view.PageID = "view"; // page ID
var EW_PAGE_ID = tbl_bangiaocv_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_bangiaocv_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_bangiaocv_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_bangiaocv_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_bangiaocv_view.ValidateRequired = false; // no JavaScript validation
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
<p>
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Công việc đang triển khai</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>    
<a href="<?php echo $tbl_bangiaocv->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?>Go Back</a></span></p>
<?php $tbl_bangiaocv_view->ShowMessage() ?>
<p>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_bangiaocv_view->Pager)) $tbl_bangiaocv_view->Pager = new cNumericPager($tbl_bangiaocv_view->lStartRec, $tbl_bangiaocv_view->lDisplayRecs, $tbl_bangiaocv_view->lTotalRecs, $tbl_bangiaocv_view->lRecRange) ?>
<?php if ($tbl_bangiaocv_view->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_bangiaocv_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_bangiaocv_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_bangiaocv_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($tbl_bangiaocv->tieude_congviec->Visible) { // tieude_congviec ?>
	<tr<?php echo $tbl_bangiaocv->tieude_congviec->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề công việc</td>
		<td<?php echo $tbl_bangiaocv->tieude_congviec->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->tieude_congviec->ViewAttributes() ?>><?php echo $tbl_bangiaocv->tieude_congviec->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->thoigian_diadiem->Visible) { // thoigian_diadiem ?>
	<tr<?php echo $tbl_bangiaocv->thoigian_diadiem->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian địa điểm</td>
		<td<?php echo $tbl_bangiaocv->thoigian_diadiem->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_diadiem->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_diadiem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->phamvi_doituong->Visible) { // phamvi_doituong ?>
	<tr<?php echo $tbl_bangiaocv->phamvi_doituong->RowAttributes ?>>
		<td class="ewTableHeader">Phạm vi đối tượng</td>
		<td<?php echo $tbl_bangiaocv->phamvi_doituong->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->phamvi_doituong->ViewAttributes() ?>><?php echo $tbl_bangiaocv->phamvi_doituong->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->doituong_thuchien->Visible) { // doituong_thuchien ?>
	<tr<?php echo $tbl_bangiaocv->doituong_thuchien->RowAttributes ?>>
		<td class="ewTableHeader">Đối tượng thực hiện</td>
		<td<?php echo $tbl_bangiaocv->doituong_thuchien->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->doituong_thuchien->ViewAttributes() ?>><?php echo $tbl_bangiaocv->doituong_thuchien->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($tbl_bangiaocv->thoigian_batdau->Visible) { // thoigian_batdau ?>
	<tr<?php echo $tbl_bangiaocv->thoigian_batdau->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian bắt đầu</td>
		<td<?php echo $tbl_bangiaocv->thoigian_batdau->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_batdau->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_batdau->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->thoigian_ketthuc->Visible) { // thoigian_ketthuc ?>
	<tr<?php echo $tbl_bangiaocv->thoigian_ketthuc->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian kết thúc</td>
		<td<?php echo $tbl_bangiaocv->thoigian_ketthuc->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_ketthuc->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_ketthuc->ViewValue ?></div></td>
	</tr>
<?php } ?>       
<?php if ($tbl_bangiaocv->ghichu->Visible) { // ghichu ?>
	<tr<?php echo $tbl_bangiaocv->ghichu->RowAttributes ?>>
		<td class="ewTableHeader">Ghi chú</td>
		<td<?php echo $tbl_bangiaocv->ghichu->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->ghichu->ViewAttributes() ?>><?php echo $tbl_bangiaocv->ghichu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->trangthai->Visible) { // trangthai ?>
	<tr<?php echo $tbl_bangiaocv->trangthai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $tbl_bangiaocv->trangthai->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->trangthai->ViewAttributes() ?>><?php echo $tbl_bangiaocv->trangthai->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($tbl_bangiaocv->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_bangiaocv_view->Pager)) $tbl_bangiaocv_view->Pager = new cNumericPager($tbl_bangiaocv_view->lStartRec, $tbl_bangiaocv_view->lDisplayRecs, $tbl_bangiaocv_view->lTotalRecs, $tbl_bangiaocv_view->lRecRange) ?>
<?php if ($tbl_bangiaocv_view->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_bangiaocv_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_bangiaocv_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_bangiaocv_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_bangiaocv_view->PageUrl() ?>start=<?php echo $tbl_bangiaocv_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_bangiaocv_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($tbl_bangiaocv->Export == "") { ?>
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
class ctbl_bangiaocv_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'tbl_bangiaocv';

	// Page Object Name
	var $PageObjName = 'tbl_bangiaocv_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) $PageUrl .= "t=" . $tbl_bangiaocv->TableVar . "&"; // add page token
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
		global $objForm, $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_bangiaocv->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_bangiaocv->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_bangiaocv_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_bangiaocv"] = new ctbl_bangiaocv();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_bangiaocv', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_bangiaocv;
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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("tbl_bangiaocvlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$tbl_bangiaocv->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $tbl_bangiaocv->Export; // Get export parameter, used in header
	$gsExportFile = $tbl_bangiaocv->TableVar; // Get export file, used in header
	if (@$_GET["bangiao_id"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["bangiao_id"]);
	}
	if ($tbl_bangiaocv->Export == "print" || $tbl_bangiaocv->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($tbl_bangiaocv->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($tbl_bangiaocv->Export == "word") {
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
	var $lRecCnt;

	//
	// Page main processing
	//
	function Page_Main() {
		global $tbl_bangiaocv;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["bangiao_id"] <> "") {
				$tbl_bangiaocv->bangiao_id->setQueryStringValue($_GET["bangiao_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$tbl_bangiaocv->CurrentAction = "I"; // Display form
			switch ($tbl_bangiaocv->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("tbl_bangiaocvlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($tbl_bangiaocv->bangiao_id->CurrentValue) == strval($rs->fields('bangiao_id'))) {
								$tbl_bangiaocv->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("No records found"); // Set no record message
						$sReturnUrl = "tbl_bangiaocvlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($tbl_bangiaocv->Export == "html" || $tbl_bangiaocv->Export == "csv" ||
				$tbl_bangiaocv->Export == "word" || $tbl_bangiaocv->Export == "excel" ||
				$tbl_bangiaocv->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "tbl_bangiaocvlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$tbl_bangiaocv->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_bangiaocv;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_bangiaocv->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_bangiaocv->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_bangiaocv;

		// Call Recordset Selecting event
		$tbl_bangiaocv->Recordset_Selecting($tbl_bangiaocv->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_bangiaocv->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_bangiaocv->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_bangiaocv;
		$sFilter = $tbl_bangiaocv->KeyFilter();

		// Call Row Selecting event
		$tbl_bangiaocv->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_bangiaocv->CurrentFilter = $sFilter;
		$sSql = $tbl_bangiaocv->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_bangiaocv->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_bangiaocv;
		$tbl_bangiaocv->bangiao_id->setDbValue($rs->fields('bangiao_id'));
		$tbl_bangiaocv->tieude_congviec->setDbValue($rs->fields('tieude_congviec'));
		$tbl_bangiaocv->thoigian_diadiem->setDbValue($rs->fields('thoigian_diadiem'));
		$tbl_bangiaocv->phamvi_doituong->setDbValue($rs->fields('phamvi_doituong'));
		$tbl_bangiaocv->doituong_thuchien->setDbValue($rs->fields('doituong_thuchien'));
		$tbl_bangiaocv->thoigian_ketthuc->setDbValue($rs->fields('thoigian_ketthuc'));
		$tbl_bangiaocv->thoigian_batdau->setDbValue($rs->fields('thoigian_batdau'));
		$tbl_bangiaocv->ghichu->setDbValue($rs->fields('ghichu'));
		$tbl_bangiaocv->trangthai->setDbValue($rs->fields('trangthai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_bangiaocv;

		// Call Row_Rendering event
		$tbl_bangiaocv->Row_Rendering();

		// Common render codes for all row types
		// tieude_congviec

		$tbl_bangiaocv->tieude_congviec->CellCssStyle = "";
		$tbl_bangiaocv->tieude_congviec->CellCssClass = "";

		// thoigian_diadiem
		$tbl_bangiaocv->thoigian_diadiem->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_diadiem->CellCssClass = "";

		// phamvi_doituong
		$tbl_bangiaocv->phamvi_doituong->CellCssStyle = "";
		$tbl_bangiaocv->phamvi_doituong->CellCssClass = "";

		// doituong_thuchien
		$tbl_bangiaocv->doituong_thuchien->CellCssStyle = "";
		$tbl_bangiaocv->doituong_thuchien->CellCssClass = "";

		// thoigian_ketthuc
		$tbl_bangiaocv->thoigian_ketthuc->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_ketthuc->CellCssClass = "";

		// thoigian_batdau
		$tbl_bangiaocv->thoigian_batdau->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_batdau->CellCssClass = "";

		// ghichu
		$tbl_bangiaocv->ghichu->CellCssStyle = "";
		$tbl_bangiaocv->ghichu->CellCssClass = "";

		// trangthai
		$tbl_bangiaocv->trangthai->CellCssStyle = "";
		$tbl_bangiaocv->trangthai->CellCssClass = "";
		if ($tbl_bangiaocv->RowType == EW_ROWTYPE_VIEW) { // View row

			// bangiao_id
			$tbl_bangiaocv->bangiao_id->ViewValue = $tbl_bangiaocv->bangiao_id->CurrentValue;
			$tbl_bangiaocv->bangiao_id->CssStyle = "";
			$tbl_bangiaocv->bangiao_id->CssClass = "";
			$tbl_bangiaocv->bangiao_id->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->ViewValue = $tbl_bangiaocv->tieude_congviec->CurrentValue;
			$tbl_bangiaocv->tieude_congviec->CssStyle = "";
			$tbl_bangiaocv->tieude_congviec->CssClass = "";
			$tbl_bangiaocv->tieude_congviec->ViewCustomAttributes = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->ViewValue = $tbl_bangiaocv->thoigian_diadiem->CurrentValue;
			$tbl_bangiaocv->thoigian_diadiem->CssStyle = "";
			$tbl_bangiaocv->thoigian_diadiem->CssClass = "";
			$tbl_bangiaocv->thoigian_diadiem->ViewCustomAttributes = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->ViewValue = $tbl_bangiaocv->phamvi_doituong->CurrentValue;
			$tbl_bangiaocv->phamvi_doituong->CssStyle = "";
			$tbl_bangiaocv->phamvi_doituong->CssClass = "";
			$tbl_bangiaocv->phamvi_doituong->ViewCustomAttributes = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->ViewValue = $tbl_bangiaocv->doituong_thuchien->CurrentValue;
			$tbl_bangiaocv->doituong_thuchien->CssStyle = "";
			$tbl_bangiaocv->doituong_thuchien->CssClass = "";
			$tbl_bangiaocv->doituong_thuchien->ViewCustomAttributes = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = $tbl_bangiaocv->thoigian_ketthuc->CurrentValue;
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_ketthuc->ViewValue, 7);
			$tbl_bangiaocv->thoigian_ketthuc->CssStyle = "";
			$tbl_bangiaocv->thoigian_ketthuc->CssClass = "";
			$tbl_bangiaocv->thoigian_ketthuc->ViewCustomAttributes = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->ViewValue = $tbl_bangiaocv->thoigian_batdau->CurrentValue;
			$tbl_bangiaocv->thoigian_batdau->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_batdau->ViewValue, 7);
			$tbl_bangiaocv->thoigian_batdau->CssStyle = "";
			$tbl_bangiaocv->thoigian_batdau->CssClass = "";
			$tbl_bangiaocv->thoigian_batdau->ViewCustomAttributes = "";

			// ghichu
			$tbl_bangiaocv->ghichu->ViewValue = $tbl_bangiaocv->ghichu->CurrentValue;
			$tbl_bangiaocv->ghichu->CssStyle = "";
			$tbl_bangiaocv->ghichu->CssClass = "";
			$tbl_bangiaocv->ghichu->ViewCustomAttributes = "";

			// trangthai
			if (strval($tbl_bangiaocv->trangthai->CurrentValue) <> "") {
				switch ($tbl_bangiaocv->trangthai->CurrentValue) {
					case "0":
						$tbl_bangiaocv->trangthai->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$tbl_bangiaocv->trangthai->ViewValue = "Kich hoat";
						break;
                                         case "2":
						$tbl_bangiaocv->trangthai->ViewValue = "Nội bộ";
						break;
					default:
						$tbl_bangiaocv->trangthai->ViewValue = $tbl_bangiaocv->trangthai->CurrentValue;
				}
			} else {
				$tbl_bangiaocv->trangthai->ViewValue = NULL;
			}
			$tbl_bangiaocv->trangthai->CssStyle = "";
			$tbl_bangiaocv->trangthai->CssClass = "";
			$tbl_bangiaocv->trangthai->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->HrefValue = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->HrefValue = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->HrefValue = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->HrefValue = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->HrefValue = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->HrefValue = "";

			// ghichu
			$tbl_bangiaocv->ghichu->HrefValue = "";

			// trangthai
			$tbl_bangiaocv->trangthai->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_bangiaocv->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $tbl_bangiaocv;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "v";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		if ($tbl_bangiaocv->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($tbl_bangiaocv->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $tbl_bangiaocv->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'bangiao_id', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'tieude_congviec', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_diadiem', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'phamvi_doituong', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'doituong_thuchien', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_ketthuc', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_batdau', $tbl_bangiaocv->Export);
				ew_ExportAddValue($sExportStr, 'trangthai', $tbl_bangiaocv->Export);
				echo ew_ExportLine($sExportStr, $tbl_bangiaocv->Export);
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
				$tbl_bangiaocv->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($tbl_bangiaocv->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('bangiao_id', $tbl_bangiaocv->bangiao_id->CurrentValue);
					$XmlDoc->AddField('tieude_congviec', $tbl_bangiaocv->tieude_congviec->CurrentValue);
					$XmlDoc->AddField('thoigian_diadiem', $tbl_bangiaocv->thoigian_diadiem->CurrentValue);
					$XmlDoc->AddField('phamvi_doituong', $tbl_bangiaocv->phamvi_doituong->CurrentValue);
					$XmlDoc->AddField('doituong_thuchien', $tbl_bangiaocv->doituong_thuchien->CurrentValue);
					$XmlDoc->AddField('thoigian_ketthuc', $tbl_bangiaocv->thoigian_ketthuc->CurrentValue);
					$XmlDoc->AddField('thoigian_batdau', $tbl_bangiaocv->thoigian_batdau->CurrentValue);
					$XmlDoc->AddField('trangthai', $tbl_bangiaocv->trangthai->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $tbl_bangiaocv->Export <> "csv") { // Vertical format
						echo ew_ExportField('bangiao_id', $tbl_bangiaocv->bangiao_id->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('tieude_congviec', $tbl_bangiaocv->tieude_congviec->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('thoigian_diadiem', $tbl_bangiaocv->thoigian_diadiem->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('phamvi_doituong', $tbl_bangiaocv->phamvi_doituong->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('doituong_thuchien', $tbl_bangiaocv->doituong_thuchien->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('thoigian_ketthuc', $tbl_bangiaocv->thoigian_ketthuc->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('thoigian_batdau', $tbl_bangiaocv->thoigian_batdau->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportField('trangthai', $tbl_bangiaocv->trangthai->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->bangiao_id->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->tieude_congviec->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->thoigian_diadiem->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->phamvi_doituong->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->doituong_thuchien->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->thoigian_ketthuc->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->thoigian_batdau->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						ew_ExportAddValue($sExportStr, $tbl_bangiaocv->trangthai->ExportValue($tbl_bangiaocv->Export, $tbl_bangiaocv->ExportOriginalValue), $tbl_bangiaocv->Export);
						echo ew_ExportLine($sExportStr, $tbl_bangiaocv->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($tbl_bangiaocv->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($tbl_bangiaocv->Export);
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
}
?>
