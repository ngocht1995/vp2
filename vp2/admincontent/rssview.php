<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "rssinfo.php" ?>
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
$rss_view = new crss_view();
$Page =& $rss_view;

// Page init processing
$rss_view->Page_Init();

// Page main processing
$rss_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($rss->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var rss_view = new ew_Page("rss_view");

// page properties
rss_view.PageID = "view"; // page ID
var EW_PAGE_ID = rss_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
rss_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
rss_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
rss_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
rss_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $rss->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a>
                                                                <b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý RSS"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br><br>
<?php if ($rss->Export == "") { ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $rss->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $rss->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm('Bạn có muốn xóa bản ghi đã chọn?');" href="<?php echo $rss->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $rss_view->ShowMessage() ?>
<p>
<?php if ($rss->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($rss_view->Pager)) $rss_view->Pager = new cNumericPager($rss_view->lStartRec, $rss_view->lDisplayRecs, $rss_view->lTotalRecs, $rss_view->lRecRange) ?>
<?php if ($rss_view->Pager->RecordCount > 0) { ?>
	<?php if ($rss_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($rss_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($rss_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($rss_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
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
<?php if ($rss->rss_name->Visible) { // rss_name ?>
	<tr<?php echo $rss->rss_name->RowAttributes ?>>
		<td class="ewTableHeader">Tên RSS</td>
		<td<?php echo $rss->rss_name->CellAttributes() ?>>
<div<?php echo $rss->rss_name->ViewAttributes() ?>><?php echo $rss->rss_name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_link->Visible) { // rss_link ?>
	<tr<?php echo $rss->rss_link->RowAttributes ?>>
		<td class="ewTableHeader">Đường dẫn RSS</td>
		<td<?php echo $rss->rss_link->CellAttributes() ?>>
<div<?php echo $rss->rss_link->ViewAttributes() ?>><?php echo $rss->rss_link->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_order->Visible) { // rss_order ?>
	<tr<?php echo $rss->rss_order->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự RSS</td>
		<td<?php echo $rss->rss_order->CellAttributes() ?>>
<div<?php echo $rss->rss_order->ViewAttributes() ?>><?php echo $rss->rss_order->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_state->Visible) { // rss_state ?>
	<tr<?php echo $rss->rss_state->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái RSS</td>
		<td<?php echo $rss->rss_state->CellAttributes() ?>>
<div<?php echo $rss->rss_state->ViewAttributes() ?>><?php echo $rss->rss_state->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_type->Visible) { // rss_type ?>
	<tr<?php echo $rss->rss_type->RowAttributes ?>>
		<td class="ewTableHeader">Loại RSS</td>
		<td<?php echo $rss->rss_type->CellAttributes() ?>>
<div<?php echo $rss->rss_type->ViewAttributes() ?>><?php echo $rss->rss_type->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($rss->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($rss_view->Pager)) $rss_view->Pager = new cNumericPager($rss_view->lStartRec, $rss_view->lDisplayRecs, $rss_view->lTotalRecs, $rss_view->lRecRange) ?>
<?php if ($rss_view->Pager->RecordCount > 0) { ?>
	<?php if ($rss_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($rss_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($rss_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($rss_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $rss_view->PageUrl() ?>start=<?php echo $rss_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($rss_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($rss->Export == "") { ?>
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
class crss_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'rss';

	// Page Object Name
	var $PageObjName = 'rss_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $rss;
		if ($rss->UseTokenInUrl) $PageUrl .= "t=" . $rss->TableVar . "&"; // add page token
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
		global $objForm, $rss;
		if ($rss->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($rss->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($rss->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function crss_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["rss"] = new crss();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'rss', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $rss;
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
			$this->Page_Terminate("rsslist.php");
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
		global $rss;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["rss_id"] <> "") {
				$rss->rss_id->setQueryStringValue($_GET["rss_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$rss->CurrentAction = "I"; // Display form
			switch ($rss->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("rsslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($rss->rss_id->CurrentValue) == strval($rs->fields('rss_id'))) {
								$rss->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "rsslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "rsslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$rss->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $rss;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$rss->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$rss->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $rss->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$rss->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$rss->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$rss->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $rss;

		// Call Recordset Selecting event
		$rss->Recordset_Selecting($rss->CurrentFilter);

		// Load list page SQL
		$sSql = $rss->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$rss->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $rss;
		$sFilter = $rss->KeyFilter();

		// Call Row Selecting event
		$rss->Row_Selecting($sFilter);

		// Load sql based on filter
		$rss->CurrentFilter = $sFilter;
		$sSql = $rss->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$rss->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $rss;
		$rss->rss_id->setDbValue($rs->fields('rss_id'));
		$rss->rss_name->setDbValue($rs->fields('rss_name'));
		$rss->rss_link->setDbValue($rs->fields('rss_link'));
		$rss->rss_order->setDbValue($rs->fields('rss_order'));
		$rss->rss_state->setDbValue($rs->fields('rss_state'));
		$rss->rss_type->setDbValue($rs->fields('rss_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $rss;

		// Call Row_Rendering event
		$rss->Row_Rendering();

		// Common render codes for all row types
		// rss_name

		$rss->rss_name->CellCssStyle = "";
		$rss->rss_name->CellCssClass = "";

		// rss_link
		$rss->rss_link->CellCssStyle = "";
		$rss->rss_link->CellCssClass = "";

		// rss_order
		$rss->rss_order->CellCssStyle = "";
		$rss->rss_order->CellCssClass = "";

		// rss_state
		$rss->rss_state->CellCssStyle = "";
		$rss->rss_state->CellCssClass = "";

		// rss_type
		$rss->rss_type->CellCssStyle = "";
		$rss->rss_type->CellCssClass = "";
		if ($rss->RowType == EW_ROWTYPE_VIEW) { // View row

			// rss_id
			$rss->rss_id->ViewValue = $rss->rss_id->CurrentValue;
			$rss->rss_id->CssStyle = "";
			$rss->rss_id->CssClass = "";
			$rss->rss_id->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->ViewValue = $rss->rss_name->CurrentValue;
			$rss->rss_name->CssStyle = "";
			$rss->rss_name->CssClass = "";
			$rss->rss_name->ViewCustomAttributes = "";

			// rss_link
			$rss->rss_link->ViewValue = $rss->rss_link->CurrentValue;
			$rss->rss_link->CssStyle = "";
			$rss->rss_link->CssClass = "";
			$rss->rss_link->ViewCustomAttributes = "";

			// rss_order
			$rss->rss_order->ViewValue = $rss->rss_order->CurrentValue;
			$rss->rss_order->CssStyle = "";
			$rss->rss_order->CssClass = "";
			$rss->rss_order->ViewCustomAttributes = "";

			// rss_state
			if (strval($rss->rss_state->CurrentValue) <> "") {
				switch ($rss->rss_state->CurrentValue) {
					case "0":
						$rss->rss_state->ViewValue = "Không hiển thị";
						break;
					case "1":
						$rss->rss_state->ViewValue = "Hiển thị";
						break;
					default:
						$rss->rss_state->ViewValue = $rss->rss_state->CurrentValue;
				}
			} else {
				$rss->rss_state->ViewValue = NULL;
			}
			$rss->rss_state->CssStyle = "";
			$rss->rss_state->CssClass = "";
			$rss->rss_state->ViewCustomAttributes = "";

			// rss_type
			if (strval($rss->rss_type->CurrentValue) <> "") {
				switch ($rss->rss_type->CurrentValue) {
					case "1":
						$rss->rss_type->ViewValue = "Chào mua";
						break;
					case "2":
						$rss->rss_type->ViewValue = "Chào bán";
						break;
					case "3":
						$rss->rss_type->ViewValue = "Sản phẩm";
						break;
					default:
						$rss->rss_type->ViewValue = $rss->rss_type->CurrentValue;
				}
			} else {
				$rss->rss_type->ViewValue = NULL;
			}
			$rss->rss_type->CssStyle = "";
			$rss->rss_type->CssClass = "";
			$rss->rss_type->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->HrefValue = "";

			// rss_link
			$rss->rss_link->HrefValue = "";

			// rss_order
			$rss->rss_order->HrefValue = "";

			// rss_state
			$rss->rss_state->HrefValue = "";

			// rss_type
			$rss->rss_type->HrefValue = "";
		}

		// Call Row Rendered event
		$rss->Row_Rendered();
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
