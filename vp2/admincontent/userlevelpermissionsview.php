<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userlevelpermissionsinfo.php" ?>
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
$userlevelpermissions_view = new cuserlevelpermissions_view();
$Page =& $userlevelpermissions_view;

// Page init processing
$userlevelpermissions_view->Page_Init();

// Page main processing
$userlevelpermissions_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userlevelpermissions->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userlevelpermissions_view = new ew_Page("userlevelpermissions_view");

// page properties
userlevelpermissions_view.PageID = "view"; // page ID
var EW_PAGE_ID = userlevelpermissions_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevelpermissions_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevelpermissions_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevelpermissions_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevelpermissions_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: Userlevelpermissions
<br><br>
<?php if ($userlevelpermissions->Export == "") { ?>
<a href="userlevelpermissionslist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $userlevelpermissions->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $userlevelpermissions->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm('Bạn có muốn xóa bản ghi đã chọn?');" href="<?php echo $userlevelpermissions->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $userlevelpermissions_view->ShowMessage() ?>
<p>
<?php if ($userlevelpermissions->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevelpermissions_view->Pager)) $userlevelpermissions_view->Pager = new cNumericPager($userlevelpermissions_view->lStartRec, $userlevelpermissions_view->lDisplayRecs, $userlevelpermissions_view->lTotalRecs, $userlevelpermissions_view->lRecRange) ?>
<?php if ($userlevelpermissions_view->Pager->RecordCount > 0) { ?>
	<?php if ($userlevelpermissions_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevelpermissions_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevelpermissions_view->sSrchWhere == "0=101") { ?>
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
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($userlevelpermissions->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $userlevelpermissions->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">User Level ID</td>
		<td<?php echo $userlevelpermissions->UserLevelID->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelID->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userlevelpermissions->UserLevelTableName->Visible) { // UserLevelTableName ?>
	<tr<?php echo $userlevelpermissions->UserLevelTableName->RowAttributes ?>>
		<td class="ewTableHeader">User Level Table Name</td>
		<td<?php echo $userlevelpermissions->UserLevelTableName->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelTableName->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelTableName->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userlevelpermissions->UserLevelPermission->Visible) { // UserLevelPermission ?>
	<tr<?php echo $userlevelpermissions->UserLevelPermission->RowAttributes ?>>
		<td class="ewTableHeader">User Level Permission</td>
		<td<?php echo $userlevelpermissions->UserLevelPermission->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelPermission->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelPermission->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($userlevelpermissions->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevelpermissions_view->Pager)) $userlevelpermissions_view->Pager = new cNumericPager($userlevelpermissions_view->lStartRec, $userlevelpermissions_view->lDisplayRecs, $userlevelpermissions_view->lTotalRecs, $userlevelpermissions_view->lRecRange) ?>
<?php if ($userlevelpermissions_view->Pager->RecordCount > 0) { ?>
	<?php if ($userlevelpermissions_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevelpermissions_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevelpermissions_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevelpermissions_view->PageUrl() ?>start=<?php echo $userlevelpermissions_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevelpermissions_view->sSrchWhere == "0=101") { ?>
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
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($userlevelpermissions->Export == "") { ?>
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
class cuserlevelpermissions_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'userlevelpermissions';

	// Page Object Name
	var $PageObjName = 'userlevelpermissions_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevelpermissions;
		if ($userlevelpermissions->UseTokenInUrl) $PageUrl .= "t=" . $userlevelpermissions->TableVar . "&"; // add page token
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
		global $objForm, $userlevelpermissions;
		if ($userlevelpermissions->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($userlevelpermissions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevelpermissions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserlevelpermissions_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevelpermissions"] = new cuserlevelpermissions();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevelpermissions', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $userlevelpermissions;
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
		if (!$Security->CanAdmin()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

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
		global $userlevelpermissions;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["UserLevelID"] <> "") {
				$userlevelpermissions->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}
			if (@$_GET["UserLevelTableName"] <> "") {
				$userlevelpermissions->UserLevelTableName->setQueryStringValue($_GET["UserLevelTableName"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$userlevelpermissions->CurrentAction = "I"; // Display form
			switch ($userlevelpermissions->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("userlevelpermissionslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($userlevelpermissions->UserLevelID->CurrentValue) == strval($rs->fields('UserLevelID')) AND strval($userlevelpermissions->UserLevelTableName->CurrentValue) == strval($rs->fields('UserLevelTableName'))) {
								$userlevelpermissions->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$sReturnUrl = "userlevelpermissionslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "userlevelpermissionslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$userlevelpermissions->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $userlevelpermissions;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$userlevelpermissions->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$userlevelpermissions->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $userlevelpermissions->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$userlevelpermissions->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevelpermissions;

		// Call Recordset Selecting event
		$userlevelpermissions->Recordset_Selecting($userlevelpermissions->CurrentFilter);

		// Load list page SQL
		$sSql = $userlevelpermissions->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$userlevelpermissions->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevelpermissions;
		$sFilter = $userlevelpermissions->KeyFilter();

		// Call Row Selecting event
		$userlevelpermissions->Row_Selecting($sFilter);

		// Load sql based on filter
		$userlevelpermissions->CurrentFilter = $sFilter;
		$sSql = $userlevelpermissions->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$userlevelpermissions->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $userlevelpermissions;
		$userlevelpermissions->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$userlevelpermissions->UserLevelTableName->setDbValue($rs->fields('UserLevelTableName'));
		$userlevelpermissions->UserLevelPermission->setDbValue($rs->fields('UserLevelPermission'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $userlevelpermissions;

		// Call Row_Rendering event
		$userlevelpermissions->Row_Rendering();

		// Common render codes for all row types
		// UserLevelID

		$userlevelpermissions->UserLevelID->CellCssStyle = "";
		$userlevelpermissions->UserLevelID->CellCssClass = "";

		// UserLevelTableName
		$userlevelpermissions->UserLevelTableName->CellCssStyle = "";
		$userlevelpermissions->UserLevelTableName->CellCssClass = "";

		// UserLevelPermission
		$userlevelpermissions->UserLevelPermission->CellCssStyle = "";
		$userlevelpermissions->UserLevelPermission->CellCssClass = "";
		if ($userlevelpermissions->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelID
			if (strval($userlevelpermissions->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($userlevelpermissions->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$userlevelpermissions->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$userlevelpermissions->UserLevelID->ViewValue = $userlevelpermissions->UserLevelID->CurrentValue;
				}
			} else {
				$userlevelpermissions->UserLevelID->ViewValue = NULL;
			}
			$userlevelpermissions->UserLevelID->CssStyle = "";
			$userlevelpermissions->UserLevelID->CssClass = "";
			$userlevelpermissions->UserLevelID->ViewCustomAttributes = "";

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->ViewValue = $userlevelpermissions->UserLevelTableName->CurrentValue;
			$userlevelpermissions->UserLevelTableName->CssStyle = "";
			$userlevelpermissions->UserLevelTableName->CssClass = "";
			$userlevelpermissions->UserLevelTableName->ViewCustomAttributes = "";

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->ViewValue = $userlevelpermissions->UserLevelPermission->CurrentValue;
			$userlevelpermissions->UserLevelPermission->CssStyle = "";
			$userlevelpermissions->UserLevelPermission->CssClass = "";
			$userlevelpermissions->UserLevelPermission->ViewCustomAttributes = "";

			// UserLevelID
			$userlevelpermissions->UserLevelID->HrefValue = "";

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->HrefValue = "";

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->HrefValue = "";
		}

		// Call Row Rendered event
		$userlevelpermissions->Row_Rendered();
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
