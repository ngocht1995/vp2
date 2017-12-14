<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_product_picinfo.php" ?>
<?php include "productsinfo.php" ?>
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
$manager_product_pic_view = new cmanager_product_pic_view();
$Page =& $manager_product_pic_view;

// Page init processing
$manager_product_pic_view->Page_Init();

// Page main processing
$manager_product_pic_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_product_pic->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_pic_view = new ew_Page("manager_product_pic_view");

// page properties
manager_product_pic_view.PageID = "view"; // page ID
var EW_PAGE_ID = manager_product_pic_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_product_pic_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_pic_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_pic_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_pic_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: Tmdt Pic Product
<br><br>
<?php if ($manager_product_pic->Export == "") { ?>
<a href="manager_product_piclist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $manager_product_pic->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $manager_product_pic->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $manager_product_pic->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $manager_product_pic_view->ShowMessage() ?>
<p>
<?php if ($manager_product_pic->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_pic_view->Pager)) $manager_product_pic_view->Pager = new cNumericPager($manager_product_pic_view->lStartRec, $manager_product_pic_view->lDisplayRecs, $manager_product_pic_view->lTotalRecs, $manager_product_pic_view->lRecRange) ?>
<?php if ($manager_product_pic_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_pic_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_pic_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_pic_view->sSrchWhere == "0=101") { ?>
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
<?php if ($manager_product_pic->sanpham_pic->Visible) { // sanpham_pic ?>
	<tr<?php echo $manager_product_pic->sanpham_pic->RowAttributes ?>>
		<td class="ewTableHeader">Sanpham Pic</td>
		<td<?php echo $manager_product_pic->sanpham_pic->CellAttributes() ?>>
<?php if ($manager_product_pic->sanpham_pic->HrefValue <> "") { ?>
<?php if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) { ?>
<a href="<?php echo $manager_product_pic->sanpham_pic->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $manager_product_pic->sanpham_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($manager_product_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $manager_product_pic->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_product_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($manager_product_pic->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_pic_view->Pager)) $manager_product_pic_view->Pager = new cNumericPager($manager_product_pic_view->lStartRec, $manager_product_pic_view->lDisplayRecs, $manager_product_pic_view->lTotalRecs, $manager_product_pic_view->lRecRange) ?>
<?php if ($manager_product_pic_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_pic_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_pic_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_view->PageUrl() ?>start=<?php echo $manager_product_pic_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_pic_view->sSrchWhere == "0=101") { ?>
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
<?php if ($manager_product_pic->Export == "") { ?>
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
class cmanager_product_pic_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'manager_product_pic';

	// Page Object Name
	var $PageObjName = 'manager_product_pic_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_product_pic;
		if ($manager_product_pic->UseTokenInUrl) $PageUrl .= "t=" . $manager_product_pic->TableVar . "&"; // add page token
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
		global $objForm, $manager_product_pic;
		if ($manager_product_pic->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_product_pic->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_product_pic->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_product_pic_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product_pic"] = new cmanager_product_pic();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_product_pic', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_product_pic;
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
			$this->Page_Terminate("manager_product_piclist.php");
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
		global $manager_product_pic;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["anh_sanpham_id"] <> "") {
				$manager_product_pic->anh_sanpham_id->setQueryStringValue($_GET["anh_sanpham_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$manager_product_pic->CurrentAction = "I"; // Display form
			switch ($manager_product_pic->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("manager_product_piclist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($manager_product_pic->anh_sanpham_id->CurrentValue) == strval($rs->fields('anh_sanpham_id'))) {
								$manager_product_pic->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "manager_product_piclist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "manager_product_piclist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$manager_product_pic->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_product_pic;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_product_pic->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_product_pic->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_product_pic->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_product_pic;

		// Call Recordset Selecting event
		$manager_product_pic->Recordset_Selecting($manager_product_pic->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_product_pic->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_product_pic->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_product_pic;
		$sFilter = $manager_product_pic->KeyFilter();

		// Call Row Selecting event
		$manager_product_pic->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_product_pic->CurrentFilter = $sFilter;
		$sSql = $manager_product_pic->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_product_pic->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_product_pic;
		$manager_product_pic->anh_sanpham_id->setDbValue($rs->fields('anh_sanpham_id'));
		$manager_product_pic->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic');
		$manager_product_pic->sanpham_id->setDbValue($rs->fields('sanpham_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product_pic;

		// Call Row_Rendering event
		$manager_product_pic->Row_Rendering();

		// Common render codes for all row types
		// sanpham_pic

		$manager_product_pic->sanpham_pic->CellCssStyle = "";
		$manager_product_pic->sanpham_pic->CellCssClass = "";
		if ($manager_product_pic->RowType == EW_ROWTYPE_VIEW) { // View row

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->ViewValue = $manager_product_pic->sanpham_pic->Upload->DbValue;
				$manager_product_pic->sanpham_pic->ImageWidth = 200;
				$manager_product_pic->sanpham_pic->ImageHeight = 0;
				$manager_product_pic->sanpham_pic->ImageAlt = "";
			} else {
				$manager_product_pic->sanpham_pic->ViewValue = "";
			}
			$manager_product_pic->sanpham_pic->CssStyle = "";
			$manager_product_pic->sanpham_pic->CssClass = "";
			$manager_product_pic->sanpham_pic->ViewCustomAttributes = "";

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_product_pic->sanpham_pic->ViewValue)) ? $manager_product_pic->sanpham_pic->ViewValue : $manager_product_pic->sanpham_pic->CurrentValue);
				if ($manager_product_pic->Export <> "") $manager_product_pic->sanpham_pic->HrefValue = ew_ConvertFullUrl($manager_product_pic->sanpham_pic->HrefValue);
			} else {
				$manager_product_pic->sanpham_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$manager_product_pic->Row_Rendered();
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
