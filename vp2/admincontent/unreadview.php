<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "unreadinfo.php" ?>
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
$unread_view = new cunread_view();
$Page =& $unread_view;

// Page init processing
$unread_view->Page_Init();

// Page main processing
$unread_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($unread->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var unread_view = new ew_Page("unread_view");

// page properties
unread_view.PageID = "view"; // page ID
var EW_PAGE_ID = unread_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
unread_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
unread_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
unread_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
unread_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="unreadlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung thư liên hệ</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table><br>
<?php if ($unread->Export == "") { ?>

<?php if ($Security->CanDelete()) { ?>
<?php if ($unread_view->ShowOptionLink()) { ?>
<a href="<?php echo $unread->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $unread_view->ShowMessage() ?>
<p>
<?php if ($unread->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($unread_view->Pager)) $unread_view->Pager = new cNumericPager($unread_view->lStartRec, $unread_view->lDisplayRecs, $unread_view->lTotalRecs, $unread_view->lRecRange) ?>
<?php if ($unread_view->Pager->RecordCount > 0) { ?>
	<?php if ($unread_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($unread_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($unread_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($unread_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có thư
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
<?php $unread_view->EditRow();?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($unread->tieu_de->Visible) { // tieu_de ?>
	<tr<?php echo $unread->tieu_de->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $unread->tieu_de->CellAttributes() ?>>
<div<?php echo $unread->tieu_de->ViewAttributes() ?>><?php echo $unread->tieu_de->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->noidung_lienhe->Visible) { // noidung_lienhe ?>
	<tr<?php echo $unread->noidung_lienhe->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td height="40" <?php echo $unread->noidung_lienhe->CellAttributes() ?>>
<div <?php echo $unread->noidung_lienhe->ViewAttributes() ?>><?php echo $unread->noidung_lienhe->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->nguoi_lienhe->Visible) { // nguoi_lienhe ?>
	<tr<?php echo $unread->nguoi_lienhe->RowAttributes ?>>
		<td class="ewTableHeader">Người liên hệ</td>
		<td<?php echo $unread->nguoi_lienhe->CellAttributes() ?>>
<div<?php echo $unread->nguoi_lienhe->ViewAttributes() ?>><?php echo $unread->nguoi_lienhe->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $unread->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $unread->gioi_tinh->CellAttributes() ?>>
<div<?php echo $unread->gioi_tinh->ViewAttributes() ?>><?php echo $unread->gioi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $unread->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $unread->quocgia_id->CellAttributes() ?>>
<div<?php echo $unread->quocgia_id->ViewAttributes() ?>><?php echo $unread->quocgia_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->diachi_email->Visible) { // diachi_email ?>
	<tr<?php echo $unread->diachi_email->RowAttributes ?>>
		<td class="ewTableHeader">Email</td>
		<td<?php echo $unread->diachi_email->CellAttributes() ?>>
<div<?php echo $unread->diachi_email->ViewAttributes() ?>><?php echo $unread->diachi_email->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->ma_quocgia_tel->Visible) { // ma_quocgia_tel ?>
	<tr<?php echo $unread->ma_quocgia_tel->RowAttributes ?>>
		<td class="ewTableHeader">Mã ĐT quốc gia</td>
		<td<?php echo $unread->ma_quocgia_tel->CellAttributes() ?>>
<div<?php echo $unread->ma_quocgia_tel->ViewAttributes() ?>><?php echo $unread->ma_quocgia_tel->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->ma_vung_tel->Visible) { // ma_vung_tel ?>
	<tr<?php echo $unread->ma_vung_tel->RowAttributes ?>>
		<td class="ewTableHeader">Mã ĐT vùng</td>
		<td<?php echo $unread->ma_vung_tel->CellAttributes() ?>>
<div<?php echo $unread->ma_vung_tel->ViewAttributes() ?>><?php echo $unread->ma_vung_tel->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $unread->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại</td>
		<td<?php echo $unread->so_dienthoai->CellAttributes() ?>>
<div<?php echo $unread->so_dienthoai->ViewAttributes() ?>><?php echo $unread->so_dienthoai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->ma_quocgia_fax->Visible) { // ma_quocgia_fax ?>
	<tr<?php echo $unread->ma_quocgia_fax->RowAttributes ?>>
		<td class="ewTableHeader">Mã Fax quốc gia</td>
		<td<?php echo $unread->ma_quocgia_fax->CellAttributes() ?>>
<div<?php echo $unread->ma_quocgia_fax->ViewAttributes() ?>><?php echo $unread->ma_quocgia_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->ma_vung_fax->Visible) { // ma_vung_fax ?>
	<tr<?php echo $unread->ma_vung_fax->RowAttributes ?>>
		<td class="ewTableHeader">Mã Fax vùng</td>
		<td<?php echo $unread->ma_vung_fax->CellAttributes() ?>>
<div<?php echo $unread->ma_vung_fax->ViewAttributes() ?>><?php echo $unread->ma_vung_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->so_fax->Visible) { // so_fax ?>
	<tr<?php echo $unread->so_fax->RowAttributes ?>>
		<td class="ewTableHeader">Số Fax</td>
		<td<?php echo $unread->so_fax->CellAttributes() ?>>
<div<?php echo $unread->so_fax->ViewAttributes() ?>><?php echo $unread->so_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->dia_chi->Visible) { // dia_chi ?>
	<tr<?php echo $unread->dia_chi->RowAttributes ?>>
		<td class="ewTableHeader">Địa chỉ</td>
		<td<?php echo $unread->dia_chi->CellAttributes() ?>>
<div<?php echo $unread->dia_chi->ViewAttributes() ?>><?php echo $unread->dia_chi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->ngay_gui->Visible) { // ngay_gui ?>
	<tr<?php echo $unread->ngay_gui->RowAttributes ?>>
		<td class="ewTableHeader">Ngày gửi</td>
		<td<?php echo $unread->ngay_gui->CellAttributes() ?>>
<div<?php echo $unread->ngay_gui->ViewAttributes() ?>><?php echo $unread->ngay_gui->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($unread->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $unread->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $unread->trang_thai->CellAttributes() ?>>
<div<?php echo $unread->trang_thai->ViewAttributes() ?>><?php echo $unread->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($unread->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($unread_view->Pager)) $unread_view->Pager = new cNumericPager($unread_view->lStartRec, $unread_view->lDisplayRecs, $unread_view->lTotalRecs, $unread_view->lRecRange) ?>
<?php if ($unread_view->Pager->RecordCount > 0) { ?>
	<?php if ($unread_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($unread_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($unread_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($unread_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $unread_view->PageUrl() ?>start=<?php echo $unread_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($unread_view->sSrchWhere == "0=101") { ?>
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
<?php if ($unread->Export == "") { ?>
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
class cunread_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'unread';

	// Page Object Name
	var $PageObjName = 'unread_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $unread;
		if ($unread->UseTokenInUrl) $PageUrl .= "t=" . $unread->TableVar . "&"; // add page token
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
		global $objForm, $unread;
		if ($unread->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($unread->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($unread->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cunread_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["unread"] = new cunread();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'unread', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $unread;
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
			$this->Page_Terminate("unreadlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("unreadlist.php");
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
		global $unread;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["thu_id"] <> "") {
				$unread->thu_id->setQueryStringValue($_GET["thu_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$unread->CurrentAction = "I"; // Display form
			switch ($unread->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("unreadlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($unread->thu_id->CurrentValue) == strval($rs->fields('thu_id'))) {
								$unread->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "unreadlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "unreadlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$unread->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $unread;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$unread->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$unread->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $unread->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$unread->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$unread->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$unread->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $unread;

		// Call Recordset Selecting event
		$unread->Recordset_Selecting($unread->CurrentFilter);

		// Load list page SQL
		$sSql = $unread->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$unread->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $unread;
		$sFilter = $unread->KeyFilter();

		// Call Row Selecting event
		$unread->Row_Selecting($sFilter);

		// Load sql based on filter
		$unread->CurrentFilter = $sFilter;
		$sSql = $unread->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$unread->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $unread;
		$unread->thu_id->setDbValue($rs->fields('thu_id'));
		$unread->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$unread->tieu_de->setDbValue($rs->fields('tieu_de'));
		$unread->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$unread->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$unread->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$unread->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$unread->diachi_email->setDbValue($rs->fields('diachi_email'));
		$unread->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$unread->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$unread->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$unread->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$unread->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$unread->so_fax->setDbValue($rs->fields('so_fax'));
		$unread->dia_chi->setDbValue($rs->fields('dia_chi'));
		$unread->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$unread->trang_thai->setDbValue($rs->fields('trang_thai'));
		$unread->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}
// Update record based on key values
	function EditRow() {
		global $conn, $Security, $unread;
		$sFilter = $unread->KeyFilter();
		$unread->CurrentFilter = $sFilter;
		$sSql = $unread->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// Field trang_thai
			$unread->trang_thai->SetDbValueDef(2, 2);
			$rsnew['trang_thai'] =& $unread->trang_thai->DbValue;

			// Field ngay_doc
			$unread->ngay_doc->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
			$rsnew['ngay_doc'] =& $unread->ngay_doc->DbValue;

			// Call Row Updating event
			$bUpdateRow = $unread->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($unread->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($unread->CancelMessage <> "") {
					$this->setMessage($unread->CancelMessage);
					$unread->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$unread->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}
	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $unread;

		// Call Row_Rendering event
		$unread->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$unread->tieu_de->CellCssStyle = "";
		$unread->tieu_de->CellCssClass = "";

		// noidung_lienhe
		$unread->noidung_lienhe->CellCssStyle = "";
		$unread->noidung_lienhe->CellCssClass = "";

		// nguoi_lienhe
		$unread->nguoi_lienhe->CellCssStyle = "";
		$unread->nguoi_lienhe->CellCssClass = "";

		// gioi_tinh
		$unread->gioi_tinh->CellCssStyle = "";
		$unread->gioi_tinh->CellCssClass = "";

		// quocgia_id
		$unread->quocgia_id->CellCssStyle = "";
		$unread->quocgia_id->CellCssClass = "";

		// diachi_email
		$unread->diachi_email->CellCssStyle = "";
		$unread->diachi_email->CellCssClass = "";

		// ma_quocgia_tel
		$unread->ma_quocgia_tel->CellCssStyle = "";
		$unread->ma_quocgia_tel->CellCssClass = "";

		// ma_vung_tel
		$unread->ma_vung_tel->CellCssStyle = "";
		$unread->ma_vung_tel->CellCssClass = "";

		// so_dienthoai
		$unread->so_dienthoai->CellCssStyle = "";
		$unread->so_dienthoai->CellCssClass = "";

		// ma_quocgia_fax
		$unread->ma_quocgia_fax->CellCssStyle = "";
		$unread->ma_quocgia_fax->CellCssClass = "";

		// ma_vung_fax
		$unread->ma_vung_fax->CellCssStyle = "";
		$unread->ma_vung_fax->CellCssClass = "";

		// so_fax
		$unread->so_fax->CellCssStyle = "";
		$unread->so_fax->CellCssClass = "";

		// dia_chi
		$unread->dia_chi->CellCssStyle = "";
		$unread->dia_chi->CellCssClass = "";

		// ngay_gui
		$unread->ngay_gui->CellCssStyle = "";
		$unread->ngay_gui->CellCssClass = "";

		// trang_thai
		$unread->trang_thai->CellCssStyle = "";
		$unread->trang_thai->CellCssClass = "";
		if ($unread->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$unread->tieu_de->ViewValue = $unread->tieu_de->CurrentValue;
			$unread->tieu_de->CssStyle = "";
			$unread->tieu_de->CssClass = "";
			$unread->tieu_de->ViewCustomAttributes = "";

			// noidung_lienhe
			$unread->noidung_lienhe->ViewValue = $unread->noidung_lienhe->CurrentValue;
			$unread->noidung_lienhe->CssStyle = "";
			$unread->noidung_lienhe->CssClass = "";
			$unread->noidung_lienhe->ViewCustomAttributes = "";

			// nguoi_lienhe
			$unread->nguoi_lienhe->ViewValue = $unread->nguoi_lienhe->CurrentValue;
			$unread->nguoi_lienhe->CssStyle = "";
			$unread->nguoi_lienhe->CssClass = "";
			$unread->nguoi_lienhe->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($unread->gioi_tinh->CurrentValue) <> "") {
				switch ($unread->gioi_tinh->CurrentValue) {
					case "0":
						$unread->gioi_tinh->ViewValue = "Nữ";
						break;
					case "1":
						$unread->gioi_tinh->ViewValue = "Nam";
						break;
					default:
						$unread->gioi_tinh->ViewValue = $unread->gioi_tinh->CurrentValue;
				}
			} else {
				$unread->gioi_tinh->ViewValue = NULL;
			}
			$unread->gioi_tinh->CssStyle = "";
			$unread->gioi_tinh->CssClass = "";
			$unread->gioi_tinh->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($unread->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($unread->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$unread->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$unread->quocgia_id->ViewValue = $unread->quocgia_id->CurrentValue;
				}
			} else {
				$unread->quocgia_id->ViewValue = NULL;
			}
			$unread->quocgia_id->CssStyle = "";
			$unread->quocgia_id->CssClass = "";
			$unread->quocgia_id->ViewCustomAttributes = "";

			// diachi_email
			$unread->diachi_email->ViewValue = $unread->diachi_email->CurrentValue;
			$unread->diachi_email->CssStyle = "";
			$unread->diachi_email->CssClass = "";
			$unread->diachi_email->ViewCustomAttributes = "";

			// ma_quocgia_tel
			$unread->ma_quocgia_tel->ViewValue = $unread->ma_quocgia_tel->CurrentValue;
			$unread->ma_quocgia_tel->CssStyle = "";
			$unread->ma_quocgia_tel->CssClass = "";
			$unread->ma_quocgia_tel->ViewCustomAttributes = "";

			// ma_vung_tel
			$unread->ma_vung_tel->ViewValue = $unread->ma_vung_tel->CurrentValue;
			$unread->ma_vung_tel->CssStyle = "";
			$unread->ma_vung_tel->CssClass = "";
			$unread->ma_vung_tel->ViewCustomAttributes = "";

			// so_dienthoai
			$unread->so_dienthoai->ViewValue = $unread->so_dienthoai->CurrentValue;
			$unread->so_dienthoai->CssStyle = "";
			$unread->so_dienthoai->CssClass = "";
			$unread->so_dienthoai->ViewCustomAttributes = "";

			// ma_quocgia_fax
			$unread->ma_quocgia_fax->ViewValue = $unread->ma_quocgia_fax->CurrentValue;
			$unread->ma_quocgia_fax->CssStyle = "";
			$unread->ma_quocgia_fax->CssClass = "";
			$unread->ma_quocgia_fax->ViewCustomAttributes = "";

			// ma_vung_fax
			$unread->ma_vung_fax->ViewValue = $unread->ma_vung_fax->CurrentValue;
			$unread->ma_vung_fax->CssStyle = "";
			$unread->ma_vung_fax->CssClass = "";
			$unread->ma_vung_fax->ViewCustomAttributes = "";

			// so_fax
			$unread->so_fax->ViewValue = $unread->so_fax->CurrentValue;
			$unread->so_fax->CssStyle = "";
			$unread->so_fax->CssClass = "";
			$unread->so_fax->ViewCustomAttributes = "";

			// dia_chi
			$unread->dia_chi->ViewValue = $unread->dia_chi->CurrentValue;
			$unread->dia_chi->CssStyle = "";
			$unread->dia_chi->CssClass = "";
			$unread->dia_chi->ViewCustomAttributes = "";

			// ngay_gui
			$unread->ngay_gui->ViewValue = $unread->ngay_gui->CurrentValue;
			$unread->ngay_gui->ViewValue = ew_FormatDateTime($unread->ngay_gui->ViewValue, 7);
			$unread->ngay_gui->CssStyle = "";
			$unread->ngay_gui->CssClass = "";
			$unread->ngay_gui->ViewCustomAttributes = "";

			// trang_thai
			if (strval($unread->trang_thai->CurrentValue) <> "") {
				switch ($unread->trang_thai->CurrentValue) {
					case "1":
						$unread->trang_thai->ViewValue = "Chưa đọc";
						break;
					case "2":
						$unread->trang_thai->ViewValue = "Đã đọc";
						break;
					default:
						$unread->trang_thai->ViewValue = $unread->trang_thai->CurrentValue;
				}
			} else {
				$unread->trang_thai->ViewValue = NULL;
			}
			$unread->trang_thai->CssStyle = "";
			$unread->trang_thai->CssClass = "";
			$unread->trang_thai->ViewCustomAttributes = "";

			// tieu_de
			$unread->tieu_de->HrefValue = "";

			// noidung_lienhe
			$unread->noidung_lienhe->HrefValue = "";

			// nguoi_lienhe
			$unread->nguoi_lienhe->HrefValue = "";

			// gioi_tinh
			$unread->gioi_tinh->HrefValue = "";

			// quocgia_id
			$unread->quocgia_id->HrefValue = "";

			// diachi_email
			$unread->diachi_email->HrefValue = "";

			// ma_quocgia_tel
			$unread->ma_quocgia_tel->HrefValue = "";

			// ma_vung_tel
			$unread->ma_vung_tel->HrefValue = "";

			// so_dienthoai
			$unread->so_dienthoai->HrefValue = "";

			// ma_quocgia_fax
			$unread->ma_quocgia_fax->HrefValue = "";

			// ma_vung_fax
			$unread->ma_vung_fax->HrefValue = "";

			// so_fax
			$unread->so_fax->HrefValue = "";

			// dia_chi
			$unread->dia_chi->HrefValue = "";

			// ngay_gui
			$unread->ngay_gui->HrefValue = "";

			// trang_thai
			$unread->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$unread->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $unread;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($unread->nguoidung_id->CurrentValue);
			}
		}
		return TRUE;
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
