<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_lienheinfo.php" ?>
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
$t_lienhe_view = new ct_lienhe_view();
$Page =& $t_lienhe_view;

// Page init processing
$t_lienhe_view->Page_Init();

// Page main processing
$t_lienhe_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_lienhe->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_lienhe_view = new ew_Page("t_lienhe_view");

// page properties
t_lienhe_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_lienhe_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_lienhe_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lienhe_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lienhe_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lienhe_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="t_lienhelist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin liên hệ</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $t_lienhe_view->ShowMessage() ?>
<p>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_lienhe->c_hoten->Visible) { // c_hoten ?>
	<tr<?php echo $t_lienhe->c_hoten->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên</td>
		<td<?php echo $t_lienhe->c_hoten->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_hoten->ViewAttributes() ?>><?php echo $t_lienhe->c_hoten->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_email->Visible) { // c_email ?>
	<tr<?php echo $t_lienhe->c_email->RowAttributes ?>>
		<td class="ewTableHeader">Địa chỉ email</td>
		<td<?php echo $t_lienhe->c_email->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_email->ViewAttributes() ?>><?php echo $t_lienhe->c_email->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_tieude->Visible) { // c_tieude ?>
	<tr<?php echo $t_lienhe->c_tieude->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $t_lienhe->c_tieude->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_tieude->ViewAttributes() ?>><?php echo $t_lienhe->c_tieude->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_tel->Visible) { // c_tel ?>
	<tr<?php echo $t_lienhe->c_tel->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại</td>
		<td<?php echo $t_lienhe->c_tel->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_tel->ViewAttributes() ?>><?php echo $t_lienhe->c_tel->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_noidung->Visible) { // c_noidung ?>
	<tr<?php echo $t_lienhe->c_noidung->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $t_lienhe->c_noidung->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_noidung->ViewAttributes() ?>><?php echo $t_lienhe->c_noidung->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_read_time->Visible) { // c_read_time ?>
	<tr<?php echo $t_lienhe->c_read_time->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian xem</td>
		<td<?php echo $t_lienhe->c_read_time->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_read_time->ViewAttributes() ?>><?php echo $t_lienhe->c_read_time->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_add_time->Visible) { // c_add_time ?>
	<tr<?php echo $t_lienhe->c_add_time->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian thêm mới</td>
		<td<?php echo $t_lienhe->c_add_time->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_add_time->ViewAttributes() ?>><?php echo $t_lienhe->c_add_time->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lienhe->c_status->Visible) { // c_status ?>
	<tr<?php echo $t_lienhe->c_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $t_lienhe->c_status->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_status->ViewAttributes() ?>><?php echo $t_lienhe->c_status->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($t_lienhe->Export == "") { ?>
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
class ct_lienhe_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_lienhe';

	// Page Object Name
	var $PageObjName = 't_lienhe_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lienhe;
		if ($t_lienhe->UseTokenInUrl) $PageUrl .= "t=" . $t_lienhe->TableVar . "&"; // add page token
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
		global $objForm, $t_lienhe;
		if ($t_lienhe->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_lienhe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lienhe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_lienhe_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_lienhe"] = new ct_lienhe();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lienhe', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_lienhe;
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
			$this->Page_Terminate("t_lienhelist.php");
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
		global $t_lienhe,$conn;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["id_contact"] <> "") {
				$t_lienhe->id_contact->setQueryStringValue($_GET["id_contact"]);
                                $srt="UPDATE contact SET c_status=1, c_read_time='".ew_CurrentDateTime()."' WHERE id_contact=".$_GET["id_contact"];
                                $rswrk = $conn->Execute($srt);
                               // echo $_GET["id_contact"];
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_lienhe->CurrentAction = "I"; // Display form
			switch ($t_lienhe->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_lienhelist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_lienhe->id_contact->CurrentValue) == strval($rs->fields('id_contact'))) {
								$t_lienhe->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_lienhelist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "t_lienhelist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_lienhe->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_lienhe;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_lienhe->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_lienhe->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_lienhe->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_lienhe->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_lienhe->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_lienhe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lienhe;

		// Call Recordset Selecting event
		$t_lienhe->Recordset_Selecting($t_lienhe->CurrentFilter);

		// Load list page SQL
		$sSql = $t_lienhe->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_lienhe->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lienhe;
		$sFilter = $t_lienhe->KeyFilter();

		// Call Row Selecting event
		$t_lienhe->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_lienhe->CurrentFilter = $sFilter;
		$sSql = $t_lienhe->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_lienhe->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_lienhe;
		$t_lienhe->id_contact->setDbValue($rs->fields('id_contact'));
		$t_lienhe->c_type->setDbValue($rs->fields('c_type'));
		$t_lienhe->c_hoten->setDbValue($rs->fields('c_hoten'));
		$t_lienhe->c_email->setDbValue($rs->fields('c_email'));
		$t_lienhe->c_tieude->setDbValue($rs->fields('c_tieude'));
		$t_lienhe->c_tel->setDbValue($rs->fields('c_tel'));
		$t_lienhe->c_noidung->setDbValue($rs->fields('c_noidung'));
		$t_lienhe->c_read_time->setDbValue($rs->fields('c_read_time'));
		$t_lienhe->c_add_time->setDbValue($rs->fields('c_add_time'));
		$t_lienhe->c_status->setDbValue($rs->fields('c_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_lienhe;

		// Call Row_Rendering event
		$t_lienhe->Row_Rendering();

		// Common render codes for all row types
		// c_hoten

		$t_lienhe->c_hoten->CellCssStyle = "";
		$t_lienhe->c_hoten->CellCssClass = "";

		// c_email
		$t_lienhe->c_email->CellCssStyle = "";
		$t_lienhe->c_email->CellCssClass = "";

		// c_tieude
		$t_lienhe->c_tieude->CellCssStyle = "";
		$t_lienhe->c_tieude->CellCssClass = "";

		// c_tel
		$t_lienhe->c_tel->CellCssStyle = "";
		$t_lienhe->c_tel->CellCssClass = "";

		// c_noidung
		$t_lienhe->c_noidung->CellCssStyle = "";
		$t_lienhe->c_noidung->CellCssClass = "";

		// c_read_time
		$t_lienhe->c_read_time->CellCssStyle = "";
		$t_lienhe->c_read_time->CellCssClass = "";

		// c_add_time
		$t_lienhe->c_add_time->CellCssStyle = "";
		$t_lienhe->c_add_time->CellCssClass = "";

		// c_status
		$t_lienhe->c_status->CellCssStyle = "";
		$t_lienhe->c_status->CellCssClass = "";
		if ($t_lienhe->RowType == EW_ROWTYPE_VIEW) { // View row

			// c_hoten
			$t_lienhe->c_hoten->ViewValue = $t_lienhe->c_hoten->CurrentValue;
			$t_lienhe->c_hoten->CssStyle = "";
			$t_lienhe->c_hoten->CssClass = "";
			$t_lienhe->c_hoten->ViewCustomAttributes = "";

			// c_email
			$t_lienhe->c_email->ViewValue = $t_lienhe->c_email->CurrentValue;
			$t_lienhe->c_email->CssStyle = "";
			$t_lienhe->c_email->CssClass = "";
			$t_lienhe->c_email->ViewCustomAttributes = "";

			// c_tieude
			$t_lienhe->c_tieude->ViewValue = $t_lienhe->c_tieude->CurrentValue;
			$t_lienhe->c_tieude->CssStyle = "";
			$t_lienhe->c_tieude->CssClass = "";
			$t_lienhe->c_tieude->ViewCustomAttributes = "";

			// c_tel
			$t_lienhe->c_tel->ViewValue = $t_lienhe->c_tel->CurrentValue;
			$t_lienhe->c_tel->CssStyle = "";
			$t_lienhe->c_tel->CssClass = "";
			$t_lienhe->c_tel->ViewCustomAttributes = "";

			// c_noidung
			$t_lienhe->c_noidung->ViewValue = $t_lienhe->c_noidung->CurrentValue;
			$t_lienhe->c_noidung->CssStyle = "";
			$t_lienhe->c_noidung->CssClass = "";
			$t_lienhe->c_noidung->ViewCustomAttributes = "";

			// c_read_time
			$t_lienhe->c_read_time->ViewValue = $t_lienhe->c_read_time->CurrentValue;
			$t_lienhe->c_read_time->ViewValue = ew_FormatDateTime($t_lienhe->c_read_time->ViewValue, 7);
			$t_lienhe->c_read_time->CssStyle = "";
			$t_lienhe->c_read_time->CssClass = "";
			$t_lienhe->c_read_time->ViewCustomAttributes = "";

			// c_add_time
			$t_lienhe->c_add_time->ViewValue = $t_lienhe->c_add_time->CurrentValue;
			$t_lienhe->c_add_time->ViewValue = ew_FormatDateTime($t_lienhe->c_add_time->ViewValue, 7);
			$t_lienhe->c_add_time->CssStyle = "";
			$t_lienhe->c_add_time->CssClass = "";
			$t_lienhe->c_add_time->ViewCustomAttributes = "";

			// c_status
			if (strval($t_lienhe->c_status->CurrentValue) <> "") {
				switch ($t_lienhe->c_status->CurrentValue) {
					case "0":
						$t_lienhe->c_status->ViewValue = "Chưa xem";
						break;
					case "1":
						$t_lienhe->c_status->ViewValue = "Đã xem";
						break;
					default:
						$t_lienhe->c_status->ViewValue = $t_lienhe->c_status->CurrentValue;
				}
			} else {
				$t_lienhe->c_status->ViewValue = NULL;
			}
			$t_lienhe->c_status->CssStyle = "";
			$t_lienhe->c_status->CssClass = "";
			$t_lienhe->c_status->ViewCustomAttributes = "";

			// c_hoten
			$t_lienhe->c_hoten->HrefValue = "";

			// c_email
			$t_lienhe->c_email->HrefValue = "";

			// c_tieude
			$t_lienhe->c_tieude->HrefValue = "";

			// c_tel
			$t_lienhe->c_tel->HrefValue = "";

			// c_noidung
			$t_lienhe->c_noidung->HrefValue = "";

			// c_read_time
			$t_lienhe->c_read_time->HrefValue = "";

			// c_add_time
			$t_lienhe->c_add_time->HrefValue = "";

			// c_status
			$t_lienhe->c_status->HrefValue = "";
		}

		// Call Row Rendered event
		$t_lienhe->Row_Rendered();
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
