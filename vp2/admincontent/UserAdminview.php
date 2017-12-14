<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UserAdmininfo.php" ?>
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
$UserAdmin_view = new cUserAdmin_view();
$Page =& $UserAdmin_view;

// Page init processing
$UserAdmin_view->Page_Init();

// Page main processing
$UserAdmin_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($UserAdmin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var UserAdmin_view = new ew_Page("UserAdmin_view");

// page properties
UserAdmin_view.PageID = "view"; // page ID
var EW_PAGE_ID = UserAdmin_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UserAdmin_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UserAdmin_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UserAdmin_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UserAdmin_view.ValidateRequired = false; // no JavaScript validation
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
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin cá nhân</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($UserAdmin->Export == "") { ?>
<a href="UserAdminlist.php"></a>&nbsp;
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $UserAdmin->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>
<?php } ?>
<?php } ?>

<?php $UserAdmin_view->ShowMessage() ?>
<p>
<?php if ($UserAdmin->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UserAdmin_view->Pager)) $UserAdmin_view->Pager = new cNumericPager($UserAdmin_view->lStartRec, $UserAdmin_view->lDisplayRecs, $UserAdmin_view->lTotalRecs, $UserAdmin_view->lRecRange) ?>
<?php if ($UserAdmin_view->Pager->RecordCount > 0) { ?>
	<?php if ($UserAdmin_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UserAdmin_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UserAdmin_view->sSrchWhere == "0=101") { ?>
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
<?php if ($UserAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UserAdmin->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Loại người dùng</td>
		<td<?php echo $UserAdmin->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UserAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UserAdmin->nguoidung_option->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UserAdmin->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập</td>
		<td<?php echo $UserAdmin->tendangnhap->CellAttributes() ?>>
<div<?php echo $UserAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UserAdmin->tendangnhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $UserAdmin->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $UserAdmin->quocgia_id->CellAttributes() ?>>
<div<?php echo $UserAdmin->quocgia_id->ViewAttributes() ?>><?php echo $UserAdmin->quocgia_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $UserAdmin->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $UserAdmin->gioi_tinh->CellAttributes() ?>>
<div<?php echo $UserAdmin->gioi_tinh->ViewAttributes() ?>><?php echo $UserAdmin->gioi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $UserAdmin->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên</td>
		<td<?php echo $UserAdmin->hoten_nguoilienhe->CellAttributes() ?>>
<div<?php echo $UserAdmin->hoten_nguoilienhe->ViewAttributes() ?>><?php echo $UserAdmin->hoten_nguoilienhe->ViewValue ?>
</div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $UserAdmin->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $UserAdmin->nick_yahoo->CellAttributes() ?>>
<div<?php echo $UserAdmin->nick_yahoo->ViewAttributes() ?>><?php echo $UserAdmin->nick_yahoo->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $UserAdmin->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $UserAdmin->nick_skype->CellAttributes() ?>>
<div<?php echo $UserAdmin->nick_skype->ViewAttributes() ?>><?php echo $UserAdmin->nick_skype->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $UserAdmin->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</td>
		<td<?php echo $UserAdmin->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UserAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UserAdmin->truycap_gannhat->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UserAdmin->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc</td>
		<td<?php echo $UserAdmin->UserLevelID->CellAttributes() ?>>
<div<?php echo $UserAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UserAdmin->UserLevelID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($UserAdmin->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UserAdmin_view->Pager)) $UserAdmin_view->Pager = new cNumericPager($UserAdmin_view->lStartRec, $UserAdmin_view->lDisplayRecs, $UserAdmin_view->lTotalRecs, $UserAdmin_view->lRecRange) ?>
<?php if ($UserAdmin_view->Pager->RecordCount > 0) { ?>
	<?php if ($UserAdmin_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UserAdmin_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($UserAdmin_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UserAdmin_view->PageUrl() ?>start=<?php echo $UserAdmin_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UserAdmin_view->sSrchWhere == "0=101") { ?>
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
<?php if ($UserAdmin->Export == "") { ?>
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
class cUserAdmin_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'UserAdmin';

	// Page Object Name
	var $PageObjName = 'UserAdmin_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UserAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UserAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UserAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUserAdmin_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["UserAdmin"] = new cUserAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UserAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserAdmin;
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
			$this->Page_Terminate("UserAdminlist.php");
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
		global $UserAdmin;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["nguoidung_id"] <> "") {
				$UserAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$UserAdmin->CurrentAction = "I"; // Display form
			switch ($UserAdmin->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("UserAdminlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($UserAdmin->nguoidung_id->CurrentValue) == strval($rs->fields('nguoidung_id'))) {
								$UserAdmin->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "UserAdminlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "UserAdminlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$UserAdmin->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $UserAdmin;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$UserAdmin->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$UserAdmin->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $UserAdmin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$UserAdmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UserAdmin;

		// Call Recordset Selecting event
		$UserAdmin->Recordset_Selecting($UserAdmin->CurrentFilter);

		// Load list page SQL
		$sSql = $UserAdmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
                $conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UserAdmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UserAdmin;
		$sFilter = $UserAdmin->KeyFilter();

		// Call Row Selecting event
		$UserAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UserAdmin->CurrentFilter = $sFilter;
		$sSql = $UserAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UserAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UserAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UserAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UserAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UserAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UserAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UserAdmin->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UserAdmin->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UserAdmin->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UserAdmin->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UserAdmin->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UserAdmin;

		// Call Row_Rendering event
		$UserAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UserAdmin->nguoidung_option->CellCssStyle = "";
		$UserAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UserAdmin->tendangnhap->CellCssStyle = "";
		$UserAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UserAdmin->truycap_gannhat->CellCssStyle = "";
		$UserAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UserAdmin->UserLevelID->CellCssStyle = "";
		$UserAdmin->UserLevelID->CellCssClass = "";

                // hoten_nguoilienhe
		$UserAdmin->hoten_nguoilienhe->CellCssStyle = "";
		$UserAdmin->hoten_nguoilienhe->CellCssClass = "";

		// gioi_tinh
		$UserAdmin->gioi_tinh->CellCssStyle = "";
		$UserAdmin->gioi_tinh->CellCssClass = "";

		// quocgia_id
		$UserAdmin->quocgia_id->CellCssStyle = "";
		$UserAdmin->quocgia_id->CellCssClass = "";

		// nick_yahoo
		$UserAdmin->nick_yahoo->CellCssStyle = "";
		$UserAdmin->nick_yahoo->CellCssClass = "";

		// nick_skype
		$UserAdmin->nick_skype->CellCssStyle = "";
		$UserAdmin->nick_skype->CellCssClass = "";
		
		if ($UserAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UserAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UserAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UserAdmin->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UserAdmin->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UserAdmin->nguoidung_option->ViewValue = $UserAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UserAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UserAdmin->nguoidung_option->CssStyle = "";
			$UserAdmin->nguoidung_option->CssClass = "";
			$UserAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UserAdmin->tendangnhap->ViewValue = $UserAdmin->tendangnhap->CurrentValue;
			$UserAdmin->tendangnhap->CssStyle = "";
			$UserAdmin->tendangnhap->CssClass = "";
			$UserAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->ViewValue = $UserAdmin->truycap_gannhat->CurrentValue;
			$UserAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UserAdmin->truycap_gannhat->ViewValue, 11);
			$UserAdmin->truycap_gannhat->CssStyle = "";
			$UserAdmin->truycap_gannhat->CssClass = "";
			$UserAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UserAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UserAdmin->UserLevelID->ViewValue = $UserAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UserAdmin->UserLevelID->ViewValue = NULL;
			}
			$UserAdmin->UserLevelID->CssStyle = "";
			$UserAdmin->UserLevelID->CssClass = "";
			$UserAdmin->UserLevelID->ViewCustomAttributes = "";

                        // hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->ViewValue = $UserAdmin->hoten_nguoilienhe->CurrentValue;
			$UserAdmin->hoten_nguoilienhe->CssStyle = "";
			$UserAdmin->hoten_nguoilienhe->CssClass = "";
			$UserAdmin->hoten_nguoilienhe->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UserAdmin->gioi_tinh->CurrentValue) <> "") {
				switch ($UserAdmin->gioi_tinh->CurrentValue) {
					case "0":
						$UserAdmin->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UserAdmin->gioi_tinh->ViewValue = "Nu";
						break;
					default:
						$UserAdmin->gioi_tinh->ViewValue = $UserAdmin->gioi_tinh->CurrentValue;
				}
			} else {
				$UserAdmin->gioi_tinh->ViewValue = NULL;
			}
			$UserAdmin->gioi_tinh->CssStyle = "";
			$UserAdmin->gioi_tinh->CssClass = "";
			$UserAdmin->gioi_tinh->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($UserAdmin->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UserAdmin->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UserAdmin->quocgia_id->ViewValue = $UserAdmin->quocgia_id->CurrentValue;
				}
			} else {
				$UserAdmin->quocgia_id->ViewValue = NULL;
			}
			$UserAdmin->quocgia_id->CssStyle = "";
			$UserAdmin->quocgia_id->CssClass = "";
			$UserAdmin->quocgia_id->ViewCustomAttributes = "";

			// nick_yahoo
			$UserAdmin->nick_yahoo->ViewValue = $UserAdmin->nick_yahoo->CurrentValue;
			$UserAdmin->nick_yahoo->CssStyle = "";
			$UserAdmin->nick_yahoo->CssClass = "";
			$UserAdmin->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UserAdmin->nick_skype->ViewValue = $UserAdmin->nick_skype->CurrentValue;
			$UserAdmin->nick_skype->CssStyle = "";
			$UserAdmin->nick_skype->CssClass = "";
			$UserAdmin->nick_skype->ViewCustomAttributes = "";
			// nguoidung_option
			$UserAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UserAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UserAdmin->UserLevelID->HrefValue = "";
			
			// hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->HrefValue = "";

                        // gioi_tinh
			$UserAdmin->gioi_tinh->HrefValue = "";

			// quocgia_id
			$UserAdmin->quocgia_id->HrefValue = "";

			// nick_yahoo
			$UserAdmin->nick_yahoo->HrefValue = "";

			// nick_skype
			$UserAdmin->nick_skype->HrefValue = "";
		}

		// Call Row Rendered event
		$UserAdmin->Row_Rendered();
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
