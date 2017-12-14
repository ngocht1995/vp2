<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userlevelsinfo.php" ?>
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
$userlevels_view = new cuserlevels_view();
$Page =& $userlevels_view;

// Page init processing
$userlevels_view->Page_Init();

// Page main processing
$userlevels_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userlevels->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userlevels_view = new ew_Page("userlevels_view");

// page properties
userlevels_view.PageID = "view"; // page ID
var EW_PAGE_ID = userlevels_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevels_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevels_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevels_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevels_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="userlevelslist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nhóm người dùng</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($userlevels->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $userlevels->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $userlevels->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm('Bạn có muốn xóa bản ghi đã chọn?');" href="<?php echo $userlevels->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $userlevels_view->ShowMessage() ?>
<p>
<?php if ($userlevels->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevels_view->Pager)) $userlevels_view->Pager = new cNumericPager($userlevels_view->lStartRec, $userlevels_view->lDisplayRecs, $userlevels_view->lTotalRecs, $userlevels_view->lRecRange) ?>
<?php if ($userlevels_view->Pager->RecordCount > 0) { ?>
	<?php if ($userlevels_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevels_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevels_view->sSrchWhere == "0=101") { ?>
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
<?php if ($userlevels->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $userlevels->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Mã cấp bậc</td>
		<td<?php echo $userlevels->UserLevelID->CellAttributes() ?>>
<div<?php echo $userlevels->UserLevelID->ViewAttributes() ?>><?php echo $userlevels->UserLevelID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userlevels->UserLevelName->Visible) { // UserLevelName ?>
	<tr<?php echo $userlevels->UserLevelName->RowAttributes ?>>
		<td class="ewTableHeader">Tên cấp bậc</td>
		<td<?php echo $userlevels->UserLevelName->CellAttributes() ?>>
<div<?php echo $userlevels->UserLevelName->ViewAttributes() ?>><?php echo $userlevels->UserLevelName->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($userlevels->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevels_view->Pager)) $userlevels_view->Pager = new cNumericPager($userlevels_view->lStartRec, $userlevels_view->lDisplayRecs, $userlevels_view->lTotalRecs, $userlevels_view->lRecRange) ?>
<?php if ($userlevels_view->Pager->RecordCount > 0) { ?>
	<?php if ($userlevels_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevels_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevels_view->sSrchWhere == "0=101") { ?>
	Hãy nhập từ khóa tìm kiếm
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
<?php if ($userlevels->Export == "") { ?>
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
class cuserlevels_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'userlevels';

	// Page Object Name
	var $PageObjName = 'userlevels_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevels;
		if ($userlevels->UseTokenInUrl) $PageUrl .= "t=" . $userlevels->TableVar . "&"; // add page token
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
		global $objForm, $userlevels;
		if ($userlevels->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($userlevels->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevels->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserlevels_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevels"] = new cuserlevels();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevels', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $userlevels;
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
		global $userlevels;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["UserLevelID"] <> "") {
				$userlevels->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$userlevels->CurrentAction = "I"; // Display form
			switch ($userlevels->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("userlevelslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($userlevels->UserLevelID->CurrentValue) == strval($rs->fields('UserLevelID'))) {
								$userlevels->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "userlevelslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "userlevelslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$userlevels->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $userlevels;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$userlevels->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$userlevels->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $userlevels->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$userlevels->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$userlevels->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$userlevels->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevels;

		// Call Recordset Selecting event
		$userlevels->Recordset_Selecting($userlevels->CurrentFilter);

		// Load list page SQL
		$sSql = $userlevels->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$userlevels->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevels;
		$sFilter = $userlevels->KeyFilter();

		// Call Row Selecting event
		$userlevels->Row_Selecting($sFilter);

		// Load sql based on filter
		$userlevels->CurrentFilter = $sFilter;
		$sSql = $userlevels->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$userlevels->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $userlevels;
		$userlevels->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		if (is_null($userlevels->UserLevelID->CurrentValue)) {
			$userlevels->UserLevelID->CurrentValue = 0;
		} else {
			$userlevels->UserLevelID->CurrentValue = intval($userlevels->UserLevelID->CurrentValue);
		}
		$userlevels->UserLevelName->setDbValue($rs->fields('UserLevelName'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $userlevels;

		// Call Row_Rendering event
		$userlevels->Row_Rendering();

		// Common render codes for all row types
		// UserLevelID

		$userlevels->UserLevelID->CellCssStyle = "";
		$userlevels->UserLevelID->CellCssClass = "";

		// UserLevelName
		$userlevels->UserLevelName->CellCssStyle = "";
		$userlevels->UserLevelName->CellCssClass = "";
		if ($userlevels->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelID
			$userlevels->UserLevelID->ViewValue = $userlevels->UserLevelID->CurrentValue;
			$userlevels->UserLevelID->CssStyle = "";
			$userlevels->UserLevelID->CssClass = "";
			$userlevels->UserLevelID->ViewCustomAttributes = "";

			// UserLevelName
			$userlevels->UserLevelName->ViewValue = $userlevels->UserLevelName->CurrentValue;
			$userlevels->UserLevelName->CssStyle = "";
			$userlevels->UserLevelName->CssClass = "";
			$userlevels->UserLevelName->ViewCustomAttributes = "";

			// UserLevelID
			$userlevels->UserLevelID->HrefValue = "";

			// UserLevelName
			$userlevels->UserLevelName->HrefValue = "";
		}

		// Call Row Rendered event
		$userlevels->Row_Rendered();
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
