<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_settinginfo.php" ?>
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
$t_setting_view = new ct_setting_view();
$Page =& $t_setting_view;

// Page init processing
$t_setting_view->Page_Init();

// Page main processing
$t_setting_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_setting->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_view = new ew_Page("t_setting_view");

// page properties
t_setting_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_setting_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_setting_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: T Setting
<?php if ($t_setting->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_setting_view->PageUrl() ?>export=print&set_id=<?php echo ew_HtmlEncode($t_setting->set_id->CurrentValue) ?>">Printer Friendly</a>
&nbsp;&nbsp;<a href="<?php echo $t_setting_view->PageUrl() ?>export=excel&set_id=<?php echo ew_HtmlEncode($t_setting->set_id->CurrentValue) ?>">Export to Excel</a>
&nbsp;&nbsp;<a href="<?php echo $t_setting_view->PageUrl() ?>export=word&set_id=<?php echo ew_HtmlEncode($t_setting->set_id->CurrentValue) ?>">Export to Word</a>
<?php } ?>
<br><br>
<?php if ($t_setting->Export == "") { ?>
<a href="t_settinglist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_setting->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_setting->CopyUrl() ?>">Copy</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $t_setting->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $t_setting_view->ShowMessage() ?>
<p>
<?php if ($t_setting->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_view->Pager)) $t_setting_view->Pager = new cNumericPager($t_setting_view->lStartRec, $t_setting_view->lDisplayRecs, $t_setting_view->lTotalRecs, $t_setting_view->lRecRange) ?>
<?php if ($t_setting_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_setting->set_id->Visible) { // set_id ?>
	<tr<?php echo $t_setting->set_id->RowAttributes ?>>
		<td class="ewTableHeader">Set Id</td>
		<td<?php echo $t_setting->set_id->CellAttributes() ?>>
<div<?php echo $t_setting->set_id->ViewAttributes() ?>><?php echo $t_setting->set_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_type->Visible) { // set_type ?>
	<tr<?php echo $t_setting->set_type->RowAttributes ?>>
		<td class="ewTableHeader">Set Type</td>
		<td<?php echo $t_setting->set_type->CellAttributes() ?>>
<div<?php echo $t_setting->set_type->ViewAttributes() ?>><?php echo $t_setting->set_type->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_status->Visible) { // set_status ?>
	<tr<?php echo $t_setting->set_status->RowAttributes ?>>
		<td class="ewTableHeader">Set Status</td>
		<td<?php echo $t_setting->set_status->CellAttributes() ?>>
<div<?php echo $t_setting->set_status->ViewAttributes() ?>><?php echo $t_setting->set_status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_date_start->Visible) { // set_date_start ?>
	<tr<?php echo $t_setting->set_date_start->RowAttributes ?>>
		<td class="ewTableHeader">Set Date Start</td>
		<td<?php echo $t_setting->set_date_start->CellAttributes() ?>>
<div<?php echo $t_setting->set_date_start->ViewAttributes() ?>><?php echo $t_setting->set_date_start->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_date_end->Visible) { // set_date_end ?>
	<tr<?php echo $t_setting->set_date_end->RowAttributes ?>>
		<td class="ewTableHeader">Set Date End</td>
		<td<?php echo $t_setting->set_date_end->CellAttributes() ?>>
<div<?php echo $t_setting->set_date_end->ViewAttributes() ?>><?php echo $t_setting->set_date_end->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_description->Visible) { // set_description ?>
	<tr<?php echo $t_setting->set_description->RowAttributes ?>>
		<td class="ewTableHeader">Set Description</td>
		<td<?php echo $t_setting->set_description->CellAttributes() ?>>
<div<?php echo $t_setting->set_description->ViewAttributes() ?>><?php echo $t_setting->set_description->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_active->Visible) { // set_active ?>
	<tr<?php echo $t_setting->set_active->RowAttributes ?>>
		<td class="ewTableHeader">Set Active</td>
		<td<?php echo $t_setting->set_active->CellAttributes() ?>>
<div<?php echo $t_setting->set_active->ViewAttributes() ?>><?php echo $t_setting->set_active->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_code->Visible) { // set_code ?>
	<tr<?php echo $t_setting->set_code->RowAttributes ?>>
		<td class="ewTableHeader">Set Code</td>
		<td<?php echo $t_setting->set_code->CellAttributes() ?>>
<div<?php echo $t_setting->set_code->ViewAttributes() ?>><?php echo $t_setting->set_code->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_setting->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_setting_view->Pager)) $t_setting_view->Pager = new cNumericPager($t_setting_view->lStartRec, $t_setting_view->lDisplayRecs, $t_setting_view->lTotalRecs, $t_setting_view->lRecRange) ?>
<?php if ($t_setting_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_setting_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_setting_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_setting_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_setting_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_setting_view->PageUrl() ?>start=<?php echo $t_setting_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_setting_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_setting->Export == "") { ?>
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
class ct_setting_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_setting';

	// Page Object Name
	var $PageObjName = 't_setting_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting;
		if ($t_setting->UseTokenInUrl) $PageUrl .= "t=" . $t_setting->TableVar . "&"; // add page token
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
		global $objForm, $t_setting;
		if ($t_setting->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting"] = new ct_setting();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting;
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
			$this->Page_Terminate("t_settinglist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$t_setting->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_setting->Export; // Get export parameter, used in header
	$gsExportFile = $t_setting->TableVar; // Get export file, used in header
	if (@$_GET["set_id"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["set_id"]);
	}
	if ($t_setting->Export == "print" || $t_setting->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_setting->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_setting->Export == "word") {
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
		global $t_setting;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["set_id"] <> "") {
				$t_setting->set_id->setQueryStringValue($_GET["set_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_setting->CurrentAction = "I"; // Display form
			switch ($t_setting->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_settinglist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_setting->set_id->CurrentValue) == strval($rs->fields('set_id'))) {
								$t_setting->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_settinglist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($t_setting->Export == "html" || $t_setting->Export == "csv" ||
				$t_setting->Export == "word" || $t_setting->Export == "excel" ||
				$t_setting->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_settinglist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_setting->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_setting;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_setting->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_setting->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_setting->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_setting->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_setting->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_setting->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_setting;

		// Call Recordset Selecting event
		$t_setting->Recordset_Selecting($t_setting->CurrentFilter);

		// Load list page SQL
		$sSql = $t_setting->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_setting->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting;
		$sFilter = $t_setting->KeyFilter();

		// Call Row Selecting event
		$t_setting->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting->CurrentFilter = $sFilter;
		$sSql = $t_setting->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting;
		$t_setting->set_id->setDbValue($rs->fields('set_id'));
		$t_setting->set_type->setDbValue($rs->fields('set_type'));
		$t_setting->set_status->setDbValue($rs->fields('set_status'));
		$t_setting->set_date_start->setDbValue($rs->fields('set_date_start'));
		$t_setting->set_date_end->setDbValue($rs->fields('set_date_end'));
		$t_setting->set_description->setDbValue($rs->fields('set_description'));
		$t_setting->set_active->setDbValue($rs->fields('set_active'));
		$t_setting->set_code->setDbValue($rs->fields('set_code'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting;

		// Call Row_Rendering event
		$t_setting->Row_Rendering();

		// Common render codes for all row types
		// set_id

		$t_setting->set_id->CellCssStyle = "";
		$t_setting->set_id->CellCssClass = "";

		// set_type
		$t_setting->set_type->CellCssStyle = "";
		$t_setting->set_type->CellCssClass = "";

		// set_status
		$t_setting->set_status->CellCssStyle = "";
		$t_setting->set_status->CellCssClass = "";

		// set_date_start
		$t_setting->set_date_start->CellCssStyle = "";
		$t_setting->set_date_start->CellCssClass = "";

		// set_date_end
		$t_setting->set_date_end->CellCssStyle = "";
		$t_setting->set_date_end->CellCssClass = "";

		// set_description
		$t_setting->set_description->CellCssStyle = "";
		$t_setting->set_description->CellCssClass = "";

		// set_active
		$t_setting->set_active->CellCssStyle = "";
		$t_setting->set_active->CellCssClass = "";

		// set_code
		$t_setting->set_code->CellCssStyle = "";
		$t_setting->set_code->CellCssClass = "";
		if ($t_setting->RowType == EW_ROWTYPE_VIEW) { // View row

			// set_id
			$t_setting->set_id->ViewValue = $t_setting->set_id->CurrentValue;
			$t_setting->set_id->CssStyle = "";
			$t_setting->set_id->CssClass = "";
			$t_setting->set_id->ViewCustomAttributes = "";

			// set_type
			if (strval($t_setting->set_type->CurrentValue) <> "") {
				switch ($t_setting->set_type->CurrentValue) {
					case "1":
						$t_setting->set_type->ViewValue = "Cau hoi";
						break;
					case "2":
						$t_setting->set_type->ViewValue = "Tham do";
						break;
					default:
						$t_setting->set_type->ViewValue = $t_setting->set_type->CurrentValue;
				}
			} else {
				$t_setting->set_type->ViewValue = NULL;
			}
			$t_setting->set_type->CssStyle = "";
			$t_setting->set_type->CssClass = "";
			$t_setting->set_type->ViewCustomAttributes = "";

			// set_status
			if (strval($t_setting->set_status->CurrentValue) <> "") {
				switch ($t_setting->set_status->CurrentValue) {
					case "0":
						$t_setting->set_status->ViewValue = "Mac dinh";
						break;
					case "1":
						$t_setting->set_status->ViewValue = "Khoa cau hoi";
						break;
					case "2":
						$t_setting->set_status->ViewValue = "Thiet lap 2 trang thai tham do";
						break;
					case "3":
						$t_setting->set_status->ViewValue = "Thiet lap tham do theo thoi gian";
						break;
					case "4":
						$t_setting->set_status->ViewValue = "Thiet al tham do xac nhan";
						break;
					default:
						$t_setting->set_status->ViewValue = $t_setting->set_status->CurrentValue;
				}
			} else {
				$t_setting->set_status->ViewValue = NULL;
			}
			$t_setting->set_status->CssStyle = "";
			$t_setting->set_status->CssClass = "";
			$t_setting->set_status->ViewCustomAttributes = "";

			// set_date_start
			$t_setting->set_date_start->ViewValue = $t_setting->set_date_start->CurrentValue;
			$t_setting->set_date_start->ViewValue = ew_FormatDateTime($t_setting->set_date_start->ViewValue, 7);
			$t_setting->set_date_start->CssStyle = "";
			$t_setting->set_date_start->CssClass = "";
			$t_setting->set_date_start->ViewCustomAttributes = "";

			// set_date_end
			$t_setting->set_date_end->ViewValue = $t_setting->set_date_end->CurrentValue;
			$t_setting->set_date_end->ViewValue = ew_FormatDateTime($t_setting->set_date_end->ViewValue, 7);
			$t_setting->set_date_end->CssStyle = "";
			$t_setting->set_date_end->CssClass = "";
			$t_setting->set_date_end->ViewCustomAttributes = "";

			// set_description
			$t_setting->set_description->ViewValue = $t_setting->set_description->CurrentValue;
			$t_setting->set_description->CssStyle = "";
			$t_setting->set_description->CssClass = "";
			$t_setting->set_description->ViewCustomAttributes = "";

			// set_active
			if (strval($t_setting->set_active->CurrentValue) <> "") {
				switch ($t_setting->set_active->CurrentValue) {
					case "0":
						$t_setting->set_active->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_setting->set_active->ViewValue = "Kich hoat";
						break;
					default:
						$t_setting->set_active->ViewValue = $t_setting->set_active->CurrentValue;
				}
			} else {
				$t_setting->set_active->ViewValue = NULL;
			}
			$t_setting->set_active->CssStyle = "";
			$t_setting->set_active->CssClass = "";
			$t_setting->set_active->ViewCustomAttributes = "";

			// set_code
			$t_setting->set_code->ViewValue = $t_setting->set_code->CurrentValue;
			$t_setting->set_code->CssStyle = "";
			$t_setting->set_code->CssClass = "";
			$t_setting->set_code->ViewCustomAttributes = "";

			// set_id
			$t_setting->set_id->HrefValue = "";

			// set_type
			$t_setting->set_type->HrefValue = "";

			// set_status
			$t_setting->set_status->HrefValue = "";

			// set_date_start
			$t_setting->set_date_start->HrefValue = "";

			// set_date_end
			$t_setting->set_date_end->HrefValue = "";

			// set_description
			$t_setting->set_description->HrefValue = "";

			// set_active
			$t_setting->set_active->HrefValue = "";

			// set_code
			$t_setting->set_code->HrefValue = "";
		}

		// Call Row Rendered event
		$t_setting->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_setting;
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
		if ($t_setting->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_setting->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_setting->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'set_id', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_type', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_status', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_date_start', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_date_end', $t_setting->Export);
				ew_ExportAddValue($sExportStr, 'set_active', $t_setting->Export);
				echo ew_ExportLine($sExportStr, $t_setting->Export);
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
				$t_setting->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_setting->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('set_id', $t_setting->set_id->CurrentValue);
					$XmlDoc->AddField('set_type', $t_setting->set_type->CurrentValue);
					$XmlDoc->AddField('set_status', $t_setting->set_status->CurrentValue);
					$XmlDoc->AddField('set_date_start', $t_setting->set_date_start->CurrentValue);
					$XmlDoc->AddField('set_date_end', $t_setting->set_date_end->CurrentValue);
					$XmlDoc->AddField('set_active', $t_setting->set_active->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_setting->Export <> "csv") { // Vertical format
						echo ew_ExportField('set_id', $t_setting->set_id->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_type', $t_setting->set_type->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_status', $t_setting->set_status->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_date_start', $t_setting->set_date_start->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_date_end', $t_setting->set_date_end->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportField('set_active', $t_setting->set_active->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_setting->set_id->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_type->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_status->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_date_start->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_date_end->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						ew_ExportAddValue($sExportStr, $t_setting->set_active->ExportValue($t_setting->Export, $t_setting->ExportOriginalValue), $t_setting->Export);
						echo ew_ExportLine($sExportStr, $t_setting->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_setting->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_setting->Export);
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
