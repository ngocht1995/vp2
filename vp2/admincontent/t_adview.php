<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_adinfo.php" ?>
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
$t_ad_view = new ct_ad_view();
$Page =& $t_ad_view;

// Page init processing
$t_ad_view->Page_Init();

// Page main processing
$t_ad_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_ad->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_ad_view = new ew_Page("t_ad_view");

// page properties
t_ad_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_ad_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_ad_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ad_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ad_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ad_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_adlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Chi tiết rao vặt</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>

</span></p>
<?php $t_ad_view->ShowMessage() ?>
<p>
<?php if ($t_ad->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ad_view->Pager)) $t_ad_view->Pager = new cNumericPager($t_ad_view->lStartRec, $t_ad_view->lDisplayRecs, $t_ad_view->lTotalRecs, $t_ad_view->lRecRange) ?>
<?php if ($t_ad_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_ad_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ad_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ad_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_ad_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không tìm thấy bản ghi
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
<?php if ($t_ad->cat_ID->Visible) { // cat_ID ?>
	<tr<?php echo $t_ad->cat_ID->RowAttributes ?>>
		<td class="ewTableHeader">Chuyên mục</td>
		<td<?php echo $t_ad->cat_ID->CellAttributes() ?>>
<div<?php echo $t_ad->cat_ID->ViewAttributes() ?>><?php echo $t_ad->cat_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->Title->Visible) { // Title ?>
	<tr<?php echo $t_ad->Title->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $t_ad->Title->CellAttributes() ?>>
<div<?php echo $t_ad->Title->ViewAttributes() ?>><?php echo $t_ad->Title->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->content->Visible) { // content ?>
	<tr<?php echo $t_ad->content->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $t_ad->content->CellAttributes() ?>>
<div<?php echo $t_ad->content->ViewAttributes() ?>><?php echo $t_ad->content->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->date_c->Visible) { // date_c ?>
	<tr<?php echo $t_ad->date_c->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo</td>
		<td<?php echo $t_ad->date_c->CellAttributes() ?>>
<div<?php echo $t_ad->date_c->ViewAttributes() ?>><?php echo $t_ad->date_c->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->zemail->Visible) { // email ?>
	<tr<?php echo $t_ad->zemail->RowAttributes ?>>
		<td class="ewTableHeader">Email</td>
		<td<?php echo $t_ad->zemail->CellAttributes() ?>>
<div<?php echo $t_ad->zemail->ViewAttributes() ?>><?php echo $t_ad->zemail->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->name->Visible) { // name ?>
	<tr<?php echo $t_ad->name->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên</td>
		<td<?php echo $t_ad->name->CellAttributes() ?>>
<div<?php echo $t_ad->name->ViewAttributes() ?>><?php echo $t_ad->name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->phone->Visible) { // phone ?>
	<tr<?php echo $t_ad->phone->RowAttributes ?>>
		<td class="ewTableHeader">Phone</td>
		<td<?php echo $t_ad->phone->CellAttributes() ?>>
<div<?php echo $t_ad->phone->ViewAttributes() ?>><?php echo $t_ad->phone->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->status->Visible) { // status ?>
	<tr<?php echo $t_ad->status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $t_ad->status->CellAttributes() ?>>
<div<?php echo $t_ad->status->ViewAttributes() ?>><?php echo $t_ad->status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ad->n_click->Visible) { // n_click ?>
	<tr<?php echo $t_ad->n_click->RowAttributes ?>>
		<td class="ewTableHeader">Lượt xem</td>
		<td<?php echo $t_ad->n_click->CellAttributes() ?>>
<div<?php echo $t_ad->n_click->ViewAttributes() ?>><?php echo $t_ad->n_click->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_ad->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ad_view->Pager)) $t_ad_view->Pager = new cNumericPager($t_ad_view->lStartRec, $t_ad_view->lDisplayRecs, $t_ad_view->lTotalRecs, $t_ad_view->lRecRange) ?>
<?php if ($t_ad_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_ad_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ad_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ad_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ad_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ad_view->PageUrl() ?>start=<?php echo $t_ad_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_ad_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi được tìm thấy
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_ad->Export == "") { ?>
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
class ct_ad_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_ad';

	// Page Object Name
	var $PageObjName = 't_ad_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ad;
		if ($t_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_ad;
		if ($t_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_ad_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_ad"] = new ct_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_ad;
	$t_ad->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_ad->Export; // Get export parameter, used in header
	$gsExportFile = $t_ad->TableVar; // Get export file, used in header
	if (@$_GET["ad_ID"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["ad_ID"]);
	}
	if ($t_ad->Export == "print" || $t_ad->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
	if ($t_ad->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_ad->Export == "word") {
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
		global $t_ad;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["ad_ID"] <> "") {
				$t_ad->ad_ID->setQueryStringValue($_GET["ad_ID"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_ad->CurrentAction = "I"; // Display form
			switch ($t_ad->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_adlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_ad->ad_ID->CurrentValue) == strval($rs->fields('ad_ID'))) {
								$t_ad->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_adlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($t_ad->Export == "html" || $t_ad->Export == "csv" ||
				$t_ad->Export == "word" || $t_ad->Export == "excel" ||
				$t_ad->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_adlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_ad->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_ad;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_ad->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_ad->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_ad->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_ad->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_ad->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_ad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_ad;

		// Call Recordset Selecting event
		$t_ad->Recordset_Selecting($t_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $t_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ad;
		$sFilter = $t_ad->KeyFilter();

		// Call Row Selecting event
		$t_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_ad->CurrentFilter = $sFilter;
		$sSql = $t_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_ad;
		$t_ad->ad_ID->setDbValue($rs->fields('ad_ID'));
		$t_ad->cat_ID->setDbValue($rs->fields('cat_ID'));
		$t_ad->Title->setDbValue($rs->fields('Title'));
		$t_ad->content->setDbValue($rs->fields('content'));
		$t_ad->date_c->setDbValue($rs->fields('date_c'));
		$t_ad->zemail->setDbValue($rs->fields('email'));
		$t_ad->name->setDbValue($rs->fields('name'));
		$t_ad->phone->setDbValue($rs->fields('phone'));
		$t_ad->status->setDbValue($rs->fields('status'));
		$t_ad->n_click->setDbValue($rs->fields('n_click'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_ad;

		// Call Row_Rendering event
		$t_ad->Row_Rendering();

		// Common render codes for all row types
		// cat_ID

		$t_ad->cat_ID->CellCssStyle = "";
		$t_ad->cat_ID->CellCssClass = "";

		// Title
		$t_ad->Title->CellCssStyle = "";
		$t_ad->Title->CellCssClass = "";

		// content
		$t_ad->content->CellCssStyle = "";
		$t_ad->content->CellCssClass = "";

		// date_c
		$t_ad->date_c->CellCssStyle = "";
		$t_ad->date_c->CellCssClass = "";

		// email
		$t_ad->zemail->CellCssStyle = "";
		$t_ad->zemail->CellCssClass = "";

		// name
		$t_ad->name->CellCssStyle = "";
		$t_ad->name->CellCssClass = "";

		// phone
		$t_ad->phone->CellCssStyle = "";
		$t_ad->phone->CellCssClass = "";

		// status
		$t_ad->status->CellCssStyle = "";
		$t_ad->status->CellCssClass = "";

		// n_click
		$t_ad->n_click->CellCssStyle = "";
		$t_ad->n_click->CellCssClass = "";
		if ($t_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_ID
			$t_ad->ad_ID->ViewValue = $t_ad->ad_ID->CurrentValue;
			$t_ad->ad_ID->CssStyle = "";
			$t_ad->ad_ID->CssClass = "";
			$t_ad->ad_ID->ViewCustomAttributes = "";

			// cat_ID
			if (strval($t_ad->cat_ID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_ad->cat_ID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_ad->cat_ID->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_ad->cat_ID->ViewValue = $t_ad->cat_ID->CurrentValue;
				}
			} else {
				$t_ad->cat_ID->ViewValue = NULL;
			}
			$t_ad->cat_ID->CssStyle = "";
			$t_ad->cat_ID->CssClass = "";
			$t_ad->cat_ID->ViewCustomAttributes = "";

			// Title
			$t_ad->Title->ViewValue = $t_ad->Title->CurrentValue;
			$t_ad->Title->CssStyle = "";
			$t_ad->Title->CssClass = "";
			$t_ad->Title->ViewCustomAttributes = "";

			// content
			$t_ad->content->ViewValue = $t_ad->content->CurrentValue;
			$t_ad->content->CssStyle = "";
			$t_ad->content->CssClass = "";
			$t_ad->content->ViewCustomAttributes = "";

			// date_c
			$t_ad->date_c->ViewValue = $t_ad->date_c->CurrentValue;
			$t_ad->date_c->ViewValue = ew_FormatDateTime($t_ad->date_c->ViewValue, 7);
			$t_ad->date_c->CssStyle = "";
			$t_ad->date_c->CssClass = "";
			$t_ad->date_c->ViewCustomAttributes = "";

			// email
			$t_ad->zemail->ViewValue = $t_ad->zemail->CurrentValue;
			$t_ad->zemail->CssStyle = "";
			$t_ad->zemail->CssClass = "";
			$t_ad->zemail->ViewCustomAttributes = "";

			// name
			$t_ad->name->ViewValue = $t_ad->name->CurrentValue;
			$t_ad->name->CssStyle = "";
			$t_ad->name->CssClass = "";
			$t_ad->name->ViewCustomAttributes = "";

			// phone
			$t_ad->phone->ViewValue = $t_ad->phone->CurrentValue;
			$t_ad->phone->CssStyle = "";
			$t_ad->phone->CssClass = "";
			$t_ad->phone->ViewCustomAttributes = "";

			// status
			if (strval($t_ad->status->CurrentValue) <> "") {
				switch ($t_ad->status->CurrentValue) {
					case "0":
						$t_ad->status->ViewValue = "Chưa duyệt";
						break;
					case "1":
						$t_ad->status->ViewValue = "Đã duyệt";
						break;
					default:
						$t_ad->status->ViewValue = $t_ad->status->CurrentValue;
				}
			} else {
				$t_ad->status->ViewValue = NULL;
			}
			$t_ad->status->CssStyle = "";
			$t_ad->status->CssClass = "";
			$t_ad->status->ViewCustomAttributes = "";

			// n_click
			$t_ad->n_click->ViewValue = $t_ad->n_click->CurrentValue;
			$t_ad->n_click->CssStyle = "";
			$t_ad->n_click->CssClass = "";
			$t_ad->n_click->ViewCustomAttributes = "";

			// cat_ID
			$t_ad->cat_ID->HrefValue = "";

			// Title
			$t_ad->Title->HrefValue = "";

			// content
			$t_ad->content->HrefValue = "";

			// date_c
			$t_ad->date_c->HrefValue = "";

			// email
			$t_ad->zemail->HrefValue = "";

			// name
			$t_ad->name->HrefValue = "";

			// phone
			$t_ad->phone->HrefValue = "";

			// status
			$t_ad->status->HrefValue = "";

			// n_click
			$t_ad->n_click->HrefValue = "";
		}

		// Call Row Rendered event
		$t_ad->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $t_ad;
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
		if ($t_ad->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($t_ad->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $t_ad->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'ad_ID', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'cat_ID', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'date_c', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'phone', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'status', $t_ad->Export);
				ew_ExportAddValue($sExportStr, 'n_click', $t_ad->Export);
				echo ew_ExportLine($sExportStr, $t_ad->Export);
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
				$t_ad->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_ad->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('ad_ID', $t_ad->ad_ID->CurrentValue);
					$XmlDoc->AddField('cat_ID', $t_ad->cat_ID->CurrentValue);
					$XmlDoc->AddField('date_c', $t_ad->date_c->CurrentValue);
					$XmlDoc->AddField('phone', $t_ad->phone->CurrentValue);
					$XmlDoc->AddField('status', $t_ad->status->CurrentValue);
					$XmlDoc->AddField('n_click', $t_ad->n_click->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $t_ad->Export <> "csv") { // Vertical format
						echo ew_ExportField('ad_ID', $t_ad->ad_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('cat_ID', $t_ad->cat_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('date_c', $t_ad->date_c->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('phone', $t_ad->phone->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('status', $t_ad->status->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportField('n_click', $t_ad->n_click->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $t_ad->ad_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->cat_ID->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->date_c->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->phone->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->status->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						ew_ExportAddValue($sExportStr, $t_ad->n_click->ExportValue($t_ad->Export, $t_ad->ExportOriginalValue), $t_ad->Export);
						echo ew_ExportLine($sExportStr, $t_ad->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($t_ad->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($t_ad->Export);
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
