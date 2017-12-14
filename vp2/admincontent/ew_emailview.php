<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "ew_emailinfo.php" ?>
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
$ew_email_view = new cew_email_view();
$Page =& $ew_email_view;

// Page init processing
$ew_email_view->Page_Init();

// Page main processing
$ew_email_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($ew_email->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var ew_email_view = new ew_Page("ew_email_view");

// page properties
ew_email_view.PageID = "view"; // page ID
var EW_PAGE_ID = ew_email_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ew_email_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ew_email_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
ew_email_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ew_email_view.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $ew_email->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem Email hệ thống</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $ew_email_view->ShowMessage() ?>
<p>
<?php if ($ew_email->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($ew_email_view->Pager)) $ew_email_view->Pager = new cNumericPager($ew_email_view->lStartRec, $ew_email_view->lDisplayRecs, $ew_email_view->lTotalRecs, $ew_email_view->lRecRange) ?>
<?php if ($ew_email_view->Pager->RecordCount > 0) { ?>
	<?php if ($ew_email_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($ew_email_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($ew_email_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($ew_email_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
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
<?php if ($ew_email->SMTP_SERVER->Visible) { // SMTP_SERVER ?>
	<tr<?php echo $ew_email->SMTP_SERVER->RowAttributes ?>>
		<td class="ewTableHeader">SMTP SERVER</td>
		<td<?php echo $ew_email->SMTP_SERVER->CellAttributes() ?>>
<div<?php echo $ew_email->SMTP_SERVER->ViewAttributes() ?>><?php echo $ew_email->SMTP_SERVER->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SERVER_PORT->Visible) { // SERVER_PORT ?>
	<tr<?php echo $ew_email->SERVER_PORT->RowAttributes ?>>
		<td class="ewTableHeader">SERVER PORT</td>
		<td<?php echo $ew_email->SERVER_PORT->CellAttributes() ?>>
<div<?php echo $ew_email->SERVER_PORT->ViewAttributes() ?>><?php echo $ew_email->SERVER_PORT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SERVER_USERNAME->Visible) { // SERVER_USERNAME ?>
	<tr<?php echo $ew_email->SERVER_USERNAME->RowAttributes ?>>
		<td class="ewTableHeader">SERVER USERNAME</td>
		<td<?php echo $ew_email->SERVER_USERNAME->CellAttributes() ?>>
<div<?php echo $ew_email->SERVER_USERNAME->ViewAttributes() ?>><?php echo $ew_email->SERVER_USERNAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SERVER_PASSWORD->Visible) { // SERVER_PASSWORD ?>
	<tr<?php echo $ew_email->SERVER_PASSWORD->RowAttributes ?>>
		<td class="ewTableHeader">SERVER PASSWORD</td>
		<td<?php echo $ew_email->SERVER_PASSWORD->CellAttributes() ?>>
<div<?php echo $ew_email->SERVER_PASSWORD->ViewAttributes() ?>><?php echo $ew_email->SERVER_PASSWORD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SENDER_EMAIL->Visible) { // SENDER_EMAIL ?>
	<tr<?php echo $ew_email->SENDER_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader">SENDER EMAIL</td>
		<td<?php echo $ew_email->SENDER_EMAIL->CellAttributes() ?>>
<div<?php echo $ew_email->SENDER_EMAIL->ViewAttributes() ?>><?php echo $ew_email->SENDER_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($ew_email->RECIPIENT_EMAIL->Visible) { // RECIPIENT_EMAIL ?>
	<tr<?php echo $ew_email->RECIPIENT_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader">RECIPIENT EMAIL</td>
		<td<?php echo $ew_email->RECIPIENT_EMAIL->CellAttributes() ?>>
<div<?php echo $ew_email->RECIPIENT_EMAIL->ViewAttributes() ?>><?php echo $ew_email->RECIPIENT_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($ew_email->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($ew_email_view->Pager)) $ew_email_view->Pager = new cNumericPager($ew_email_view->lStartRec, $ew_email_view->lDisplayRecs, $ew_email_view->lTotalRecs, $ew_email_view->lRecRange) ?>
<?php if ($ew_email_view->Pager->RecordCount > 0) { ?>
	<?php if ($ew_email_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($ew_email_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($ew_email_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($ew_email_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $ew_email_view->PageUrl() ?>start=<?php echo $ew_email_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($ew_email_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
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
<?php if ($ew_email->Export == "") { ?>
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
class cew_email_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'ew_email';

	// Page Object Name
	var $PageObjName = 'ew_email_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $ew_email;
		if ($ew_email->UseTokenInUrl) $PageUrl .= "t=" . $ew_email->TableVar . "&"; // add page token
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
		global $objForm, $ew_email;
		if ($ew_email->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($ew_email->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ew_email->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cew_email_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["ew_email"] = new cew_email();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'ew_email', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $ew_email;
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
			$this->Page_Terminate("ew_emaillist.php");
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
		global $ew_email;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["id"] <> "") {
				$ew_email->id->setQueryStringValue($_GET["id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$ew_email->CurrentAction = "I"; // Display form
			switch ($ew_email->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("ew_emaillist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($ew_email->id->CurrentValue) == strval($rs->fields('id'))) {
								$ew_email->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "ew_emaillist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "ew_emaillist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$ew_email->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $ew_email;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$ew_email->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$ew_email->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $ew_email->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$ew_email->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$ew_email->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$ew_email->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ew_email;

		// Call Recordset Selecting event
		$ew_email->Recordset_Selecting($ew_email->CurrentFilter);

		// Load list page SQL
		$sSql = $ew_email->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$ew_email->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ew_email;
		$sFilter = $ew_email->KeyFilter();

		// Call Row Selecting event
		$ew_email->Row_Selecting($sFilter);

		// Load sql based on filter
		$ew_email->CurrentFilter = $sFilter;
		$sSql = $ew_email->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$ew_email->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $ew_email;
		$ew_email->id->setDbValue($rs->fields('id'));
		$ew_email->SMTP_SERVER->setDbValue($rs->fields('SMTP_SERVER'));
		$ew_email->SERVER_PORT->setDbValue($rs->fields('SERVER_PORT'));
		$ew_email->SERVER_USERNAME->setDbValue($rs->fields('SERVER_USERNAME'));
		$ew_email->SERVER_PASSWORD->setDbValue($rs->fields('SERVER_PASSWORD'));
		$ew_email->SENDER_EMAIL->setDbValue($rs->fields('SENDER_EMAIL'));
		$ew_email->RECIPIENT_EMAIL->setDbValue($rs->fields('RECIPIENT_EMAIL'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $ew_email;

		// Call Row_Rendering event
		$ew_email->Row_Rendering();

		// Common render codes for all row types
		// SMTP_SERVER

		$ew_email->SMTP_SERVER->CellCssStyle = "";
		$ew_email->SMTP_SERVER->CellCssClass = "";

		// SERVER_PORT
		$ew_email->SERVER_PORT->CellCssStyle = "";
		$ew_email->SERVER_PORT->CellCssClass = "";

		// SERVER_USERNAME
		$ew_email->SERVER_USERNAME->CellCssStyle = "";
		$ew_email->SERVER_USERNAME->CellCssClass = "";

		// SERVER_PASSWORD
		$ew_email->SERVER_PASSWORD->CellCssStyle = "";
		$ew_email->SERVER_PASSWORD->CellCssClass = "";

		// SENDER_EMAIL
		$ew_email->SENDER_EMAIL->CellCssStyle = "";
		$ew_email->SENDER_EMAIL->CellCssClass = "";

		// RECIPIENT_EMAIL
		$ew_email->RECIPIENT_EMAIL->CellCssStyle = "";
		$ew_email->RECIPIENT_EMAIL->CellCssClass = "";
		if ($ew_email->RowType == EW_ROWTYPE_VIEW) { // View row

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->ViewValue = $ew_email->SMTP_SERVER->CurrentValue;
			$ew_email->SMTP_SERVER->CssStyle = "";
			$ew_email->SMTP_SERVER->CssClass = "";
			$ew_email->SMTP_SERVER->ViewCustomAttributes = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->ViewValue = $ew_email->SERVER_PORT->CurrentValue;
			$ew_email->SERVER_PORT->CssStyle = "";
			$ew_email->SERVER_PORT->CssClass = "";
			$ew_email->SERVER_PORT->ViewCustomAttributes = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->ViewValue = $ew_email->SERVER_USERNAME->CurrentValue;
			$ew_email->SERVER_USERNAME->CssStyle = "";
			$ew_email->SERVER_USERNAME->CssClass = "";
			$ew_email->SERVER_USERNAME->ViewCustomAttributes = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->ViewValue = $ew_email->SERVER_PASSWORD->CurrentValue;
			$ew_email->SERVER_PASSWORD->CssStyle = "";
			$ew_email->SERVER_PASSWORD->CssClass = "";
			$ew_email->SERVER_PASSWORD->ViewCustomAttributes = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->ViewValue = $ew_email->SENDER_EMAIL->CurrentValue;
			$ew_email->SENDER_EMAIL->CssStyle = "";
			$ew_email->SENDER_EMAIL->CssClass = "";
			$ew_email->SENDER_EMAIL->ViewCustomAttributes = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->ViewValue = $ew_email->RECIPIENT_EMAIL->CurrentValue;
			$ew_email->RECIPIENT_EMAIL->CssStyle = "";
			$ew_email->RECIPIENT_EMAIL->CssClass = "";
			$ew_email->RECIPIENT_EMAIL->ViewCustomAttributes = "";

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->HrefValue = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->HrefValue = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->HrefValue = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->HrefValue = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->HrefValue = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->HrefValue = "";
		}

		// Call Row Rendered event
		$ew_email->Row_Rendered();
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
