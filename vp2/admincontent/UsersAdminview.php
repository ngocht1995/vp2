<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersAdmininfo.php" ?>
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
$UsersAdmin_view = new cUsersAdmin_view();
$Page =& $UsersAdmin_view;

// Page init processing
$UsersAdmin_view->Page_Init();

// Page main processing
$UsersAdmin_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($UsersAdmin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var UsersAdmin_view = new ew_Page("UsersAdmin_view");

// page properties
UsersAdmin_view.PageID = "view"; // page ID
var EW_PAGE_ID = UsersAdmin_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UsersAdmin_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersAdmin_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersAdmin_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersAdmin_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="UsersAdminlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin người dùng hệ thống</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br><br>
<?php if ($UsersAdmin->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UsersAdmin->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $UsersAdmin->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm('Bạn có muốn xóa bản ghi đã chọn?');" href="<?php echo $UsersAdmin->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $UsersAdmin_view->ShowMessage() ?>
<p>
<?php if ($UsersAdmin->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersAdmin_view->Pager)) $UsersAdmin_view->Pager = new cNumericPager($UsersAdmin_view->lStartRec, $UsersAdmin_view->lDisplayRecs, $UsersAdmin_view->lTotalRecs, $UsersAdmin_view->lRecRange) ?>
<?php if ($UsersAdmin_view->Pager->RecordCount > 0) { ?>
	<?php if ($UsersAdmin_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersAdmin_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersAdmin_view->sSrchWhere == "0=101") { ?>
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
<?php if ($UsersAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UsersAdmin->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Loại người dùng</td>
		<td<?php echo $UsersAdmin->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UsersAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UsersAdmin->nguoidung_option->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UsersAdmin->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập</td>
		<td<?php echo $UsersAdmin->tendangnhap->CellAttributes() ?>>
<div<?php echo $UsersAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UsersAdmin->tendangnhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $UsersAdmin->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $UsersAdmin->quocgia_id->CellAttributes() ?>>
<div<?php echo $UsersAdmin->quocgia_id->ViewAttributes() ?>><?php echo $UsersAdmin->quocgia_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $UsersAdmin->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $UsersAdmin->gioi_tinh->CellAttributes() ?>>
<div<?php echo $UsersAdmin->gioi_tinh->ViewAttributes() ?>><?php echo $UsersAdmin->gioi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $UsersAdmin->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên</td>
		<td<?php echo $UsersAdmin->hoten_nguoilienhe->CellAttributes() ?>>
<div<?php echo $UsersAdmin->hoten_nguoilienhe->ViewAttributes() ?>><?php echo $UsersAdmin->hoten_nguoilienhe->ViewValue ?>
</div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $UsersAdmin->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $UsersAdmin->nick_yahoo->CellAttributes() ?>>
<div<?php echo $UsersAdmin->nick_yahoo->ViewAttributes() ?>><?php echo $UsersAdmin->nick_yahoo->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $UsersAdmin->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $UsersAdmin->nick_skype->CellAttributes() ?>>
<div<?php echo $UsersAdmin->nick_skype->ViewAttributes() ?>><?php echo $UsersAdmin->nick_skype->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $UsersAdmin->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</td>
		<td<?php echo $UsersAdmin->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UsersAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersAdmin->truycap_gannhat->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UsersAdmin->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cập bậc</td>
		<td<?php echo $UsersAdmin->UserLevelID->CellAttributes() ?>>
<div<?php echo $UsersAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UsersAdmin->UserLevelID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($UsersAdmin->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersAdmin_view->Pager)) $UsersAdmin_view->Pager = new cNumericPager($UsersAdmin_view->lStartRec, $UsersAdmin_view->lDisplayRecs, $UsersAdmin_view->lTotalRecs, $UsersAdmin_view->lRecRange) ?>
<?php if ($UsersAdmin_view->Pager->RecordCount > 0) { ?>
	<?php if ($UsersAdmin_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersAdmin_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_view->PageUrl() ?>start=<?php echo $UsersAdmin_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersAdmin_view->sSrchWhere == "0=101") { ?>
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
<?php if ($UsersAdmin->Export == "") { ?>
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
class cUsersAdmin_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'UsersAdmin';

	// Page Object Name
	var $PageObjName = 'UsersAdmin_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UsersAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersAdmin_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersAdmin"] = new cUsersAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersAdmin;
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
			$this->Page_Terminate("UsersAdminlist.php");
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
		global $UsersAdmin;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["nguoidung_id"] <> "") {
				$UsersAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$UsersAdmin->CurrentAction = "I"; // Display form
			switch ($UsersAdmin->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("UsersAdminlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($UsersAdmin->nguoidung_id->CurrentValue) == strval($rs->fields('nguoidung_id'))) {
								$UsersAdmin->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("Không có dữ liêu"); // Set no record message
						$sReturnUrl = "UsersAdminlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "UsersAdminlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$UsersAdmin->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $UsersAdmin;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$UsersAdmin->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$UsersAdmin->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $UsersAdmin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UsersAdmin;

		// Call Recordset Selecting event
		$UsersAdmin->Recordset_Selecting($UsersAdmin->CurrentFilter);

		// Load list page SQL
		$sSql = $UsersAdmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UsersAdmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersAdmin;
		$sFilter = $UsersAdmin->KeyFilter();

		// Call Row Selecting event
		$UsersAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersAdmin->CurrentFilter = $sFilter;
		$sSql = $UsersAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersAdmin;
		$UsersAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UsersAdmin->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UsersAdmin->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UsersAdmin->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UsersAdmin->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UsersAdmin->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersAdmin;

		// Call Row_Rendering event
		$UsersAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersAdmin->nguoidung_option->CellCssStyle = "";
		$UsersAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersAdmin->tendangnhap->CellCssStyle = "";
		$UsersAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UsersAdmin->truycap_gannhat->CellCssStyle = "";
		$UsersAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UsersAdmin->UserLevelID->CellCssStyle = "";
		$UsersAdmin->UserLevelID->CellCssClass = "";
		// quocgia_id
		$UsersAdmin->quocgia_id->CellCssStyle = "";
		$UsersAdmin->quocgia_id->CellCssClass = "";

		// gioi_tinh
		$UsersAdmin->gioi_tinh->CellCssStyle = "";
		$UsersAdmin->gioi_tinh->CellCssClass = "";

		// hoten_nguoilienhe
		$UsersAdmin->hoten_nguoilienhe->CellCssStyle = "";
		$UsersAdmin->hoten_nguoilienhe->CellCssClass = "";

		// nick_yahoo
		$UsersAdmin->nick_yahoo->CellCssStyle = "";
		$UsersAdmin->nick_yahoo->CellCssClass = "";

		// nick_skype
		$UsersAdmin->nick_skype->CellCssStyle = "";
		$UsersAdmin->nick_skype->CellCssClass = "";
		if ($UsersAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UsersAdmin->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersAdmin->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UsersAdmin->nguoidung_option->ViewValue = $UsersAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersAdmin->nguoidung_option->ViewValue = NULL;
			}
			
			$UsersAdmin->nguoidung_option->CssStyle = "";
			$UsersAdmin->nguoidung_option->CssClass = "";
			$UsersAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->ViewValue = $UsersAdmin->tendangnhap->CurrentValue;
			$UsersAdmin->tendangnhap->CssStyle = "";
			$UsersAdmin->tendangnhap->CssClass = "";
			$UsersAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->ViewValue = $UsersAdmin->truycap_gannhat->CurrentValue;
			$UsersAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersAdmin->truycap_gannhat->ViewValue, 11);
			$UsersAdmin->truycap_gannhat->CssStyle = "";
			$UsersAdmin->truycap_gannhat->CssClass = "";
			$UsersAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersAdmin->UserLevelID->ViewValue = $UsersAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UsersAdmin->UserLevelID->ViewValue = NULL;
			}
			$UsersAdmin->UserLevelID->CssStyle = "";
			$UsersAdmin->UserLevelID->CssClass = "";
			$UsersAdmin->UserLevelID->ViewCustomAttributes = "";
			// quocgia_id
			if (strval($UsersAdmin->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UsersAdmin->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UsersAdmin->quocgia_id->ViewValue = $UsersAdmin->quocgia_id->CurrentValue;
				}
			} else {
				$UsersAdmin->quocgia_id->ViewValue = NULL;
			}
			$UsersAdmin->quocgia_id->CssStyle = "";
			$UsersAdmin->quocgia_id->CssClass = "";
			$UsersAdmin->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UsersAdmin->gioi_tinh->CurrentValue) <> "") {
				switch ($UsersAdmin->gioi_tinh->CurrentValue) {
					case "0":
						$UsersAdmin->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UsersAdmin->gioi_tinh->ViewValue = "Nu";
						break;
					default:
						$UsersAdmin->gioi_tinh->ViewValue = $UsersAdmin->gioi_tinh->CurrentValue;
				}
			} else {
				$UsersAdmin->gioi_tinh->ViewValue = NULL;
			}
			$UsersAdmin->gioi_tinh->CssStyle = "";
			$UsersAdmin->gioi_tinh->CssClass = "";
			$UsersAdmin->gioi_tinh->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->ViewValue = $UsersAdmin->hoten_nguoilienhe->CurrentValue;
			$UsersAdmin->hoten_nguoilienhe->CssStyle = "";
			$UsersAdmin->hoten_nguoilienhe->CssClass = "";
			$UsersAdmin->hoten_nguoilienhe->ViewCustomAttributes = "";

			// nick_yahoo
			$UsersAdmin->nick_yahoo->ViewValue = $UsersAdmin->nick_yahoo->CurrentValue;
			$UsersAdmin->nick_yahoo->CssStyle = "";
			$UsersAdmin->nick_yahoo->CssClass = "";
			$UsersAdmin->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UsersAdmin->nick_skype->ViewValue = $UsersAdmin->nick_skype->CurrentValue;
			$UsersAdmin->nick_skype->CssStyle = "";
			$UsersAdmin->nick_skype->CssClass = "";
			$UsersAdmin->nick_skype->ViewCustomAttributes = "";
			
			// nguoidung_option
			$UsersAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UsersAdmin->UserLevelID->HrefValue = "";
			
			// quocgia_id
			$UsersAdmin->quocgia_id->HrefValue = "";

			// gioi_tinh
			$UsersAdmin->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->HrefValue = "";

			// nick_yahoo
			$UsersAdmin->nick_yahoo->HrefValue = "";

			// nick_skype
			$UsersAdmin->nick_skype->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersAdmin->Row_Rendered();
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
