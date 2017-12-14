<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "payment_accountinfo.php" ?>
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
$payment_account_view = new cpayment_account_view();
$Page =& $payment_account_view;

// Page init processing
$payment_account_view->Page_Init();

// Page main processing
$payment_account_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($payment_account->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var payment_account_view = new ew_Page("payment_account_view");

// page properties
payment_account_view.PageID = "view"; // page ID
var EW_PAGE_ID = payment_account_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
payment_account_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
payment_account_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
payment_account_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
payment_account_view.ValidateRequired = false; // no JavaScript validation
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
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<a href="<?php echo $payment_account->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem tài khoản giao dịch</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($payment_account->Export == "") { ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $payment_account->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $payment_account->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $payment_account->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php $payment_account_view->ShowMessage() ?>
<p>
<?php if ($payment_account->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($payment_account_view->Pager)) $payment_account_view->Pager = new cNumericPager($payment_account_view->lStartRec, $payment_account_view->lDisplayRecs, $payment_account_view->lTotalRecs, $payment_account_view->lRecRange) ?>
<?php if ($payment_account_view->Pager->RecordCount > 0) { ?>
	<?php if ($payment_account_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($payment_account_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($payment_account_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->LastButton->Start ?>"><b>Cuôi</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($payment_account_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
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
<?php if ($payment_account->user_account->Visible) { // user_account ?>
	<tr<?php echo $payment_account->user_account->RowAttributes ?>>
		<td class="ewTableHeader">Tên tài khoản</td>
		<td<?php echo $payment_account->user_account->CellAttributes() ?>>
<div<?php echo $payment_account->user_account->ViewAttributes() ?>><?php echo $payment_account->user_account->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($payment_account->payment_account_type->Visible) { // payment_account_type ?>
	<tr<?php echo $payment_account->payment_account_type->RowAttributes ?>>
		<td class="ewTableHeader">Loại tài khoản</td>
		<td<?php echo $payment_account->payment_account_type->CellAttributes() ?>>
<div<?php echo $payment_account->payment_account_type->ViewAttributes() ?>><?php echo $payment_account->payment_account_type->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($payment_account->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($payment_account_view->Pager)) $payment_account_view->Pager = new cNumericPager($payment_account_view->lStartRec, $payment_account_view->lDisplayRecs, $payment_account_view->lTotalRecs, $payment_account_view->lRecRange) ?>
<?php if ($payment_account_view->Pager->RecordCount > 0) { ?>
	<?php if ($payment_account_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($payment_account_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($payment_account_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $payment_account_view->PageUrl() ?>start=<?php echo $payment_account_view->Pager->LastButton->Start ?>"><b>Cuôi</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($payment_account_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
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
<?php if ($payment_account->Export == "") { ?>
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
class cpayment_account_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'payment_account';

	// Page Object Name
	var $PageObjName = 'payment_account_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $payment_account;
		if ($payment_account->UseTokenInUrl) $PageUrl .= "t=" . $payment_account->TableVar . "&"; // add page token
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
		global $objForm, $payment_account;
		if ($payment_account->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($payment_account->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($payment_account->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cpayment_account_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["payment_account"] = new cpayment_account();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'payment_account', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $payment_account;
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
			$this->Page_Terminate("payment_accountlist.php");
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
		global $payment_account;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["payment_account_id"] <> "") {
				$payment_account->payment_account_id->setQueryStringValue($_GET["payment_account_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$payment_account->CurrentAction = "I"; // Display form
			switch ($payment_account->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("payment_accountlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($payment_account->payment_account_id->CurrentValue) == strval($rs->fields('payment_account_id'))) {
								$payment_account->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "payment_accountlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "payment_accountlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$payment_account->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $payment_account;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$payment_account->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$payment_account->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $payment_account->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$payment_account->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$payment_account->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$payment_account->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $payment_account;

		// Call Recordset Selecting event
		$payment_account->Recordset_Selecting($payment_account->CurrentFilter);

		// Load list page SQL
		$sSql = $payment_account->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$payment_account->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $payment_account;
		$sFilter = $payment_account->KeyFilter();

		// Call Row Selecting event
		$payment_account->Row_Selecting($sFilter);

		// Load sql based on filter
		$payment_account->CurrentFilter = $sFilter;
		$sSql = $payment_account->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$payment_account->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $payment_account;
		$payment_account->payment_account_id->setDbValue($rs->fields('payment_account_id'));
		$payment_account->user_id->setDbValue($rs->fields('user_id'));
		$payment_account->user_account->setDbValue($rs->fields('user_account'));
		$payment_account->payment_account_type->setDbValue($rs->fields('payment_account_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $payment_account;

		// Call Row_Rendering event
		$payment_account->Row_Rendering();

		// Common render codes for all row types
		// user_account

		$payment_account->user_account->CellCssStyle = "";
		$payment_account->user_account->CellCssClass = "";

		// payment_account_type
		$payment_account->payment_account_type->CellCssStyle = "";
		$payment_account->payment_account_type->CellCssClass = "";
		if ($payment_account->RowType == EW_ROWTYPE_VIEW) { // View row

			// user_account
			$payment_account->user_account->ViewValue = $payment_account->user_account->CurrentValue;
			$payment_account->user_account->CssStyle = "";
			$payment_account->user_account->CssClass = "";
			$payment_account->user_account->ViewCustomAttributes = "";

			// payment_account_type
			if (strval($payment_account->payment_account_type->CurrentValue) <> "") {
				switch ($payment_account->payment_account_type->CurrentValue) {
					case "1":
						$payment_account->payment_account_type->ViewValue = "Tài khoản Ngân lượng";
						break;
					default:
						$payment_account->payment_account_type->ViewValue = $payment_account->payment_account_type->CurrentValue;
				}
			} else {
				$payment_account->payment_account_type->ViewValue = NULL;
			}
			$payment_account->payment_account_type->CssStyle = "";
			$payment_account->payment_account_type->CssClass = "";
			$payment_account->payment_account_type->ViewCustomAttributes = "";

			// user_account
			$payment_account->user_account->HrefValue = "";

			// payment_account_type
			$payment_account->payment_account_type->HrefValue = "";
		}

		// Call Row Rendered event
		$payment_account->Row_Rendered();
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
