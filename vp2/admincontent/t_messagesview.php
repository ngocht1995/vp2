<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_messagesinfo.php" ?>
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
$t_messages_view = new ct_messages_view();
$Page =& $t_messages_view;

// Page init processing
$t_messages_view->Page_Init();

// Page main processing
$t_messages_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_messages->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_messages_view = new ew_Page("t_messages_view");

// page properties
t_messages_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_messages_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_messages_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_messages_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_messages_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_messages_view.ValidateRequired = false; // no JavaScript validation
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
<p><table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_messageslist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin thông báo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($t_messages->Export == "") { ?>
<a href="<?php echo $t_messages->AddUrl() ?>">Thêm</a>&nbsp;
<a href="<?php echo $t_messages->EditUrl() ?>">Sửa</a>&nbsp;
<a href="<?php echo $t_messages->CopyUrl() ?>">Sao chép</a>&nbsp;
<a onclick="return ew_Confirm('Do you want to delete this record?');" href="<?php echo $t_messages->DeleteUrl() ?>">Xóa</a>&nbsp;
<?php } ?>
</span></p>
<?php $t_messages_view->ShowMessage() ?>
<p>
<?php if ($t_messages->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_messages_view->Pager)) $t_messages_view->Pager = new cPrevNextPager($t_messages_view->lStartRec, $t_messages_view->lDisplayRecs, $t_messages_view->lTotalRecs) ?>
<?php if ($t_messages_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_messages_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_messages_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_messages_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_messages_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_messages_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_messages_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($t_messages_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Nhập tiêu trí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không tìm thấy bản ghi</span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_messages->Name->Visible) { // Name ?>
	<tr<?php echo $t_messages->Name->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $t_messages->Name->CellAttributes() ?>>
<div<?php echo $t_messages->Name->ViewAttributes() ?>><?php echo $t_messages->Name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Content->Visible) { // Content ?>
	<tr<?php echo $t_messages->Content->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $t_messages->Content->CellAttributes() ?>>
<div<?php echo $t_messages->Content->ViewAttributes() ?>><?php echo $t_messages->Content->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Doc->Visible) { // Doc ?>
	<tr<?php echo $t_messages->Doc->RowAttributes ?>>
		<td class="ewTableHeader">Tài liệu</td>
		<td<?php echo $t_messages->Doc->CellAttributes() ?>>
<?php if ($t_messages->Doc->HrefValue <> "") { ?>
<?php if (!is_null($t_messages->Doc->Upload->DbValue)) { ?>
<a href="<?php echo $t_messages->Doc->HrefValue ?>"><?php echo $t_messages->Doc->ViewValue ?></a>
<?php } elseif (!in_array($t_messages->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($t_messages->Doc->Upload->DbValue)) { ?>
<?php echo $t_messages->Doc->ViewValue ?>
<?php } elseif (!in_array($t_messages->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_messages->Public->Visible) { // Public ?>
	<tr<?php echo $t_messages->Public->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $t_messages->Public->CellAttributes() ?>>
<div<?php echo $t_messages->Public->ViewAttributes() ?>><?php echo $t_messages->Public->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Datetime_C->Visible) { // Datetime_C ?>
	<tr<?php echo $t_messages->Datetime_C->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo</td>
		<td<?php echo $t_messages->Datetime_C->CellAttributes() ?>>
<div<?php echo $t_messages->Datetime_C->ViewAttributes() ?>><?php echo $t_messages->Datetime_C->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Source->Visible) { // Source ?>
	<tr<?php echo $t_messages->Source->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn</td>
		<td<?php echo $t_messages->Source->CellAttributes() ?>>
<div<?php echo $t_messages->Source->ViewAttributes() ?>><?php echo $t_messages->Source->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_messages->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_messages_view->Pager)) $t_messages_view->Pager = new cPrevNextPager($t_messages_view->lStartRec, $t_messages_view->lDisplayRecs, $t_messages_view->lTotalRecs) ?>
<?php if ($t_messages_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_messages_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_messages_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_messages_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_messages_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_messages_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_messages_view->PageUrl() ?>start=<?php echo $t_messages_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_messages_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($t_messages_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Nhập tiêu trí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không tìm thấy bản ghi</span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_messages->Export == "") { ?>
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
class ct_messages_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_messages';

	// Page Object Name
	var $PageObjName = 't_messages_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_messages;
		if ($t_messages->UseTokenInUrl) $PageUrl .= "t=" . $t_messages->TableVar . "&"; // add page token
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
		global $objForm, $t_messages;
		if ($t_messages->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_messages->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_messages->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_messages_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_messages"] = new ct_messages();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_messages', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_messages;

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
		global $t_messages;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["Id_Messages"] <> "") {
				$t_messages->Id_Messages->setQueryStringValue($_GET["Id_Messages"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_messages->CurrentAction = "I"; // Display form
			switch ($t_messages->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_messageslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_messages->Id_Messages->CurrentValue) == strval($rs->fields('Id_Messages'))) {
								$t_messages->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_messageslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "t_messageslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_messages->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_messages;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_messages->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_messages->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_messages->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_messages->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_messages->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_messages->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_messages;

		// Call Recordset Selecting event
		$t_messages->Recordset_Selecting($t_messages->CurrentFilter);

		// Load list page SQL
		$sSql = $t_messages->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_messages->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_messages;
		$sFilter = $t_messages->KeyFilter();

		// Call Row Selecting event
		$t_messages->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_messages->CurrentFilter = $sFilter;
		$sSql = $t_messages->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_messages->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_messages;
		$t_messages->Id_Messages->setDbValue($rs->fields('Id_Messages'));
		$t_messages->Name->setDbValue($rs->fields('Name'));
		$t_messages->Content->setDbValue($rs->fields('Content'));
		$t_messages->Doc->Upload->DbValue = $rs->fields('Doc');
		$t_messages->Public->setDbValue($rs->fields('Public'));
		$t_messages->Datetime_C->setDbValue($rs->fields('Datetime_C'));
		$t_messages->Source->setDbValue($rs->fields('Source'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_messages;

		// Call Row_Rendering event
		$t_messages->Row_Rendering();

		// Common render codes for all row types
		// Name

		$t_messages->Name->CellCssStyle = "";
		$t_messages->Name->CellCssClass = "";

		// Content
		$t_messages->Content->CellCssStyle = "";
		$t_messages->Content->CellCssClass = "";

		// Doc
		$t_messages->Doc->CellCssStyle = "";
		$t_messages->Doc->CellCssClass = "";

		// Public
		$t_messages->Public->CellCssStyle = "";
		$t_messages->Public->CellCssClass = "";

		// Datetime_C
		$t_messages->Datetime_C->CellCssStyle = "";
		$t_messages->Datetime_C->CellCssClass = "";

		// Source
		$t_messages->Source->CellCssStyle = "";
		$t_messages->Source->CellCssClass = "";
		if ($t_messages->RowType == EW_ROWTYPE_VIEW) { // View row

			// Id_Messages
			$t_messages->Id_Messages->ViewValue = $t_messages->Id_Messages->CurrentValue;
			$t_messages->Id_Messages->CssStyle = "";
			$t_messages->Id_Messages->CssClass = "";
			$t_messages->Id_Messages->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->ViewValue = $t_messages->Name->CurrentValue;
			$t_messages->Name->CssStyle = "";
			$t_messages->Name->CssClass = "";
			$t_messages->Name->ViewCustomAttributes = "";

			// Content
			$t_messages->Content->ViewValue = $t_messages->Content->CurrentValue;
			$t_messages->Content->CssStyle = "";
			$t_messages->Content->CssClass = "";
			$t_messages->Content->ViewCustomAttributes = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->ViewValue = $t_messages->Doc->Upload->DbValue;
			} else {
				$t_messages->Doc->ViewValue = "";
			}
			$t_messages->Doc->CssStyle = "";
			$t_messages->Doc->CssClass = "";
			$t_messages->Doc->ViewCustomAttributes = "";

			// Public
			if (strval($t_messages->Public->CurrentValue) <> "") {
				switch ($t_messages->Public->CurrentValue) {
					case "0":
						$t_messages->Public->ViewValue = "Chưa";
						break;
					case "1":
						$t_messages->Public->ViewValue = "Xuất bản";
						break;
					default:
						$t_messages->Public->ViewValue = $t_messages->Public->CurrentValue;
				}
			} else {
				$t_messages->Public->ViewValue = NULL;
			}
			$t_messages->Public->CssStyle = "";
			$t_messages->Public->CssClass = "";
			$t_messages->Public->ViewCustomAttributes = "";

			// Datetime_C
			$t_messages->Datetime_C->ViewValue = $t_messages->Datetime_C->CurrentValue;
			$t_messages->Datetime_C->ViewValue = ew_FormatDateTime($t_messages->Datetime_C->ViewValue, 7);
			$t_messages->Datetime_C->CssStyle = "";
			$t_messages->Datetime_C->CssClass = "";
			$t_messages->Datetime_C->ViewCustomAttributes = "";

			// Source
			$t_messages->Source->ViewValue = $t_messages->Source->CurrentValue;
			$t_messages->Source->CssStyle = "";
			$t_messages->Source->CssClass = "";
			$t_messages->Source->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->HrefValue = "";

			// Content
			$t_messages->Content->HrefValue = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->HrefValue = ew_UploadPathEx(FALSE, "upload/messages/") . ((!empty($t_messages->Doc->ViewValue)) ? $t_messages->Doc->ViewValue : $t_messages->Doc->CurrentValue);
				if ($t_messages->Export <> "") $t_messages->Doc->HrefValue = ew_ConvertFullUrl($t_messages->Doc->HrefValue);
			} else {
				$t_messages->Doc->HrefValue = "";
			}

			// Public
			$t_messages->Public->HrefValue = "";

			// Datetime_C
			$t_messages->Datetime_C->HrefValue = "";

			// Source
			$t_messages->Source->HrefValue = "";
		}

		// Call Row Rendered event
		$t_messages->Row_Rendered();
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
