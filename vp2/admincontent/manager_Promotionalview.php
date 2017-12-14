<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_Promotionalinfo.php" ?>
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
$manager_Promotional_view = new cmanager_Promotional_view();
$Page =& $manager_Promotional_view;

// Page init processing
$manager_Promotional_view->Page_Init();

// Page main processing
$manager_Promotional_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_Promotional->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_Promotional_view = new ew_Page("manager_Promotional_view");

// page properties
manager_Promotional_view.PageID = "view"; // page ID
var EW_PAGE_ID = manager_Promotional_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_Promotional_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_Promotional_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_Promotional_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_Promotional_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="manager_Promotionallist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($manager_Promotional->Export == "") { ?>

<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $manager_Promotional->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $manager_Promotional_view->ShowMessage() ?>
<p>
<?php if ($manager_Promotional->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_Promotional_view->Pager)) $manager_Promotional_view->Pager = new cNumericPager($manager_Promotional_view->lStartRec, $manager_Promotional_view->lDisplayRecs, $manager_Promotional_view->lTotalRecs, $manager_Promotional_view->lRecRange) ?>
<?php if ($manager_Promotional_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_Promotional_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_Promotional_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_Promotional_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_Promotional_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_Promotional_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_Promotional_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có tin
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
<?php if ($manager_Promotional->anh_tintuc->Visible) { // anh_tintuc ?>
	<tr<?php echo $manager_Promotional->anh_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $manager_Promotional->anh_tintuc->CellAttributes() ?>>
<?php if ($manager_Promotional->anh_tintuc->HrefValue <> "") { ?>
<?php if (!is_null($manager_Promotional->anh_tintuc->Upload->DbValue)) { ?>
<a href="<?php echo $manager_Promotional->anh_tintuc->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_Promotional->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $manager_Promotional->anh_tintuc->ViewAttributes() ?>></a>
<?php } elseif (!in_array($manager_Promotional->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_Promotional->anh_tintuc->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_Promotional->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $manager_Promotional->anh_tintuc->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_Promotional->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->ten_congty->Visible) { // ten_congty ?>
	<tr<?php echo $manager_Promotional->ten_congty->RowAttributes ?>>
		<td class="ewTableHeader">Tên công ty</td>
		<td<?php echo $manager_Promotional->ten_congty->CellAttributes() ?>>
<div<?php echo $manager_Promotional->ten_congty->ViewAttributes() ?>><?php echo $manager_Promotional->ten_congty->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $manager_Promotional->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Tên người liên hệ</td>
		<td<?php echo $manager_Promotional->hoten_nguoilienhe->CellAttributes() ?>>
<?php echo $manager_Promotional->hoten_nguoilienhe->ViewValue ?>
	
<?php } ?>

<?php if ($manager_Promotional->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<tr<?php echo $manager_Promotional->tieude_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $manager_Promotional->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $manager_Promotional->tieude_tintuc->ViewAttributes() ?>><?php echo $manager_Promotional->tieude_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->tukhoa_tintuc->Visible) { // tukhoa_tintuc ?>
	<tr<?php echo $manager_Promotional->tukhoa_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $manager_Promotional->tukhoa_tintuc->CellAttributes() ?>>
<div<?php echo $manager_Promotional->tukhoa_tintuc->ViewAttributes() ?>><?php echo $manager_Promotional->tukhoa_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->tomtat_tintuc->Visible) { // tomtat_tintuc ?>
	<tr<?php echo $manager_Promotional->tomtat_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn</td>
		<td<?php echo $manager_Promotional->tomtat_tintuc->CellAttributes() ?>>
<div<?php echo $manager_Promotional->tomtat_tintuc->ViewAttributes() ?>><?php echo $manager_Promotional->tomtat_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->nguon_tintuc->Visible) { // nguon_tintuc ?>
	<tr<?php echo $manager_Promotional->nguon_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn tin</td>
		<td<?php echo $manager_Promotional->nguon_tintuc->CellAttributes() ?>>
<div<?php echo $manager_Promotional->nguon_tintuc->ViewAttributes() ?>><?php echo $manager_Promotional->nguon_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->noidung_tintuc->Visible) { // noidung_tintuc ?>
	<tr<?php echo $manager_Promotional->noidung_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $manager_Promotional->noidung_tintuc->CellAttributes() ?>>
<div<?php echo $manager_Promotional->noidung_tintuc->ViewAttributes() ?>><?php echo $manager_Promotional->noidung_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->lienket_tintuc->Visible) { // lienket_tintuc ?>
	<tr<?php echo $manager_Promotional->lienket_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết tin</td>
		<td<?php echo $manager_Promotional->lienket_tintuc->CellAttributes() ?>>
<div<?php echo $manager_Promotional->lienket_tintuc->ViewAttributes() ?>><?php echo $manager_Promotional->lienket_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->hienthi_tungay->Visible) { // hienthi_tungay ?>
	<tr<?php echo $manager_Promotional->hienthi_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị từ ngày</td>
		<td<?php echo $manager_Promotional->hienthi_tungay->CellAttributes() ?>>
<div<?php echo $manager_Promotional->hienthi_tungay->ViewAttributes() ?>><?php echo $manager_Promotional->hienthi_tungay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->hienthi_denngay->Visible) { // hienthi_denngay ?>
	<tr<?php echo $manager_Promotional->hienthi_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị đến ngày</td>
		<td<?php echo $manager_Promotional->hienthi_denngay->CellAttributes() ?>>
<div<?php echo $manager_Promotional->hienthi_denngay->ViewAttributes() ?>><?php echo $manager_Promotional->hienthi_denngay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $manager_Promotional->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $manager_Promotional->thoigian_them->CellAttributes() ?>>
<div<?php echo $manager_Promotional->thoigian_them->ViewAttributes() ?>><?php echo $manager_Promotional->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->thoigian_sua->Visible) { // thoigian_sua ?>
	<tr<?php echo $manager_Promotional->thoigian_sua->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $manager_Promotional->thoigian_sua->CellAttributes() ?>>
<div<?php echo $manager_Promotional->thoigian_sua->ViewAttributes() ?>><?php echo $manager_Promotional->thoigian_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<tr<?php echo $manager_Promotional->soluot_truynhap->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $manager_Promotional->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $manager_Promotional->soluot_truynhap->ViewAttributes() ?>><?php echo $manager_Promotional->soluot_truynhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_Promotional->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $manager_Promotional->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $manager_Promotional->xuatban->CellAttributes() ?>>
<div<?php echo $manager_Promotional->xuatban->ViewAttributes() ?>><?php echo $manager_Promotional->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($manager_Promotional->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_Promotional_view->Pager)) $manager_Promotional_view->Pager = new cNumericPager($manager_Promotional_view->lStartRec, $manager_Promotional_view->lDisplayRecs, $manager_Promotional_view->lTotalRecs, $manager_Promotional_view->lRecRange) ?>
<?php if ($manager_Promotional_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_Promotional_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_Promotional_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_Promotional_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_Promotional_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_Promotional_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_Promotional_view->PageUrl() ?>start=<?php echo $manager_Promotional_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_Promotional_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có tin
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
<?php if ($manager_Promotional->Export == "") { ?>
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
class cmanager_Promotional_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'manager_Promotional';

	// Page Object Name
	var $PageObjName = 'manager_Promotional_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_Promotional;
		if ($manager_Promotional->UseTokenInUrl) $PageUrl .= "t=" . $manager_Promotional->TableVar . "&"; // add page token
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
		global $objForm, $manager_Promotional;
		if ($manager_Promotional->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_Promotional->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_Promotional->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_Promotional_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_Promotional"] = new cmanager_Promotional();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_Promotional', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_Promotional;
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
			$this->Page_Terminate("manager_Promotionallist.php");
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
		global $manager_Promotional;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["tintuc_id"] <> "") {
				$manager_Promotional->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$manager_Promotional->CurrentAction = "I"; // Display form
			switch ($manager_Promotional->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("manager_Promotionallist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($manager_Promotional->tintuc_id->CurrentValue) == strval($rs->fields('tintuc_id'))) {
								$manager_Promotional->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "manager_Promotionallist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "manager_Promotionallist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$manager_Promotional->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_Promotional;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_Promotional->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_Promotional->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_Promotional->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_Promotional->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_Promotional->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_Promotional->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_Promotional;

		// Call Recordset Selecting event
		$manager_Promotional->Recordset_Selecting($manager_Promotional->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_Promotional->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_Promotional->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_Promotional;
		$sFilter = $manager_Promotional->KeyFilter();

		// Call Row Selecting event
		$manager_Promotional->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_Promotional->CurrentFilter = $sFilter;
		$sSql = $manager_Promotional->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_Promotional->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_Promotional;
		$manager_Promotional->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$manager_Promotional->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$manager_Promotional->ten_congty->setDbValue($rs->fields('ten_congty'));
		$manager_Promotional->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		
		$manager_Promotional->trang_thai->setDbValue($rs->fields('trang_thai'));
		$manager_Promotional->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$manager_Promotional->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$manager_Promotional->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$manager_Promotional->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$manager_Promotional->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$manager_Promotional->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$manager_Promotional->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$manager_Promotional->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$manager_Promotional->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$manager_Promotional->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$manager_Promotional->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$manager_Promotional->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$manager_Promotional->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_Promotional;

		// Call Row_Rendering event
		$manager_Promotional->Row_Rendering();

		// Common render codes for all row types
		// anh_tintuc

		$manager_Promotional->anh_tintuc->CellCssStyle = "";
		$manager_Promotional->anh_tintuc->CellCssClass = "";

		// ten_congty
		$manager_Promotional->ten_congty->CellCssStyle = "";
		$manager_Promotional->ten_congty->CellCssClass = "";

		// hoten_nguoilienhe
		$manager_Promotional->hoten_nguoilienhe->CellCssStyle = "";
		$manager_Promotional->hoten_nguoilienhe->CellCssClass = "";

		

		// tieude_tintuc
		$manager_Promotional->tieude_tintuc->CellCssStyle = "";
		$manager_Promotional->tieude_tintuc->CellCssClass = "";

		// tukhoa_tintuc
		$manager_Promotional->tukhoa_tintuc->CellCssStyle = "";
		$manager_Promotional->tukhoa_tintuc->CellCssClass = "";

		// tomtat_tintuc
		$manager_Promotional->tomtat_tintuc->CellCssStyle = "";
		$manager_Promotional->tomtat_tintuc->CellCssClass = "";

		// nguon_tintuc
		$manager_Promotional->nguon_tintuc->CellCssStyle = "";
		$manager_Promotional->nguon_tintuc->CellCssClass = "";

		// noidung_tintuc
		$manager_Promotional->noidung_tintuc->CellCssStyle = "";
		$manager_Promotional->noidung_tintuc->CellCssClass = "";

		// lienket_tintuc
		$manager_Promotional->lienket_tintuc->CellCssStyle = "";
		$manager_Promotional->lienket_tintuc->CellCssClass = "";

		// hienthi_tungay
		$manager_Promotional->hienthi_tungay->CellCssStyle = "";
		$manager_Promotional->hienthi_tungay->CellCssClass = "";

		// hienthi_denngay
		$manager_Promotional->hienthi_denngay->CellCssStyle = "";
		$manager_Promotional->hienthi_denngay->CellCssClass = "";

		// thoigian_them
		$manager_Promotional->thoigian_them->CellCssStyle = "";
		$manager_Promotional->thoigian_them->CellCssClass = "";

		// thoigian_sua
		$manager_Promotional->thoigian_sua->CellCssStyle = "";
		$manager_Promotional->thoigian_sua->CellCssClass = "";

		// soluot_truynhap
		$manager_Promotional->soluot_truynhap->CellCssStyle = "";
		$manager_Promotional->soluot_truynhap->CellCssClass = "";

		// xuatban
		$manager_Promotional->xuatban->CellCssStyle = "";
		$manager_Promotional->xuatban->CellCssClass = "";
		if ($manager_Promotional->RowType == EW_ROWTYPE_VIEW) { // View row

			// anh_tintuc
			if (!is_null($manager_Promotional->anh_tintuc->Upload->DbValue)) {
				$manager_Promotional->anh_tintuc->ViewValue = $manager_Promotional->anh_tintuc->Upload->DbValue;
				$manager_Promotional->anh_tintuc->ImageWidth = 150;
				$manager_Promotional->anh_tintuc->ImageHeight = 0;
				$manager_Promotional->anh_tintuc->ImageAlt = "";
			} else {
				$manager_Promotional->anh_tintuc->ViewValue = "";
			}
			$manager_Promotional->anh_tintuc->CssStyle = "";
			$manager_Promotional->anh_tintuc->CssClass = "";
			$manager_Promotional->anh_tintuc->ViewCustomAttributes = "";

			// ten_congty
			$manager_Promotional->ten_congty->ViewValue = $manager_Promotional->ten_congty->CurrentValue;
			$manager_Promotional->ten_congty->CssStyle = "";
			$manager_Promotional->ten_congty->CssClass = "";
			$manager_Promotional->ten_congty->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$manager_Promotional->hoten_nguoilienhe->ViewValue = $manager_Promotional->hoten_nguoilienhe->CurrentValue;
			$manager_Promotional->hoten_nguoilienhe->CssStyle = "";
			$manager_Promotional->hoten_nguoilienhe->CssClass = "";
			$manager_Promotional->hoten_nguoilienhe->ViewCustomAttributes = "";

			

			// tieude_tintuc
			$manager_Promotional->tieude_tintuc->ViewValue = $manager_Promotional->tieude_tintuc->CurrentValue;
			$manager_Promotional->tieude_tintuc->CssStyle = "";
			$manager_Promotional->tieude_tintuc->CssClass = "";
			$manager_Promotional->tieude_tintuc->ViewCustomAttributes = "";

			// tukhoa_tintuc
			$manager_Promotional->tukhoa_tintuc->ViewValue = $manager_Promotional->tukhoa_tintuc->CurrentValue;
			$manager_Promotional->tukhoa_tintuc->CssStyle = "";
			$manager_Promotional->tukhoa_tintuc->CssClass = "";
			$manager_Promotional->tukhoa_tintuc->ViewCustomAttributes = "";

			// tomtat_tintuc
			$manager_Promotional->tomtat_tintuc->ViewValue = $manager_Promotional->tomtat_tintuc->CurrentValue;
			$manager_Promotional->tomtat_tintuc->CssStyle = "";
			$manager_Promotional->tomtat_tintuc->CssClass = "";
			$manager_Promotional->tomtat_tintuc->ViewCustomAttributes = "";

			// nguon_tintuc
			$manager_Promotional->nguon_tintuc->ViewValue = $manager_Promotional->nguon_tintuc->CurrentValue;
			$manager_Promotional->nguon_tintuc->CssStyle = "";
			$manager_Promotional->nguon_tintuc->CssClass = "";
			$manager_Promotional->nguon_tintuc->ViewCustomAttributes = "";

			// noidung_tintuc
			$manager_Promotional->noidung_tintuc->ViewValue = $manager_Promotional->noidung_tintuc->CurrentValue;
			$manager_Promotional->noidung_tintuc->CssStyle = "";
			$manager_Promotional->noidung_tintuc->CssClass = "";
			$manager_Promotional->noidung_tintuc->ViewCustomAttributes = "";

			// lienket_tintuc
			$manager_Promotional->lienket_tintuc->ViewValue = $manager_Promotional->lienket_tintuc->CurrentValue;
			$manager_Promotional->lienket_tintuc->CssStyle = "";
			$manager_Promotional->lienket_tintuc->CssClass = "";
			$manager_Promotional->lienket_tintuc->ViewCustomAttributes = "";

			// hienthi_tungay
			$manager_Promotional->hienthi_tungay->ViewValue = $manager_Promotional->hienthi_tungay->CurrentValue;
			$manager_Promotional->hienthi_tungay->ViewValue = ew_FormatDateTime($manager_Promotional->hienthi_tungay->ViewValue, 7);
			$manager_Promotional->hienthi_tungay->CssStyle = "";
			$manager_Promotional->hienthi_tungay->CssClass = "";
			$manager_Promotional->hienthi_tungay->ViewCustomAttributes = "";

			// hienthi_denngay
			$manager_Promotional->hienthi_denngay->ViewValue = $manager_Promotional->hienthi_denngay->CurrentValue;
			$manager_Promotional->hienthi_denngay->ViewValue = ew_FormatDateTime($manager_Promotional->hienthi_denngay->ViewValue, 7);
			$manager_Promotional->hienthi_denngay->CssStyle = "";
			$manager_Promotional->hienthi_denngay->CssClass = "";
			$manager_Promotional->hienthi_denngay->ViewCustomAttributes = "";

			// thoigian_them
			$manager_Promotional->thoigian_them->ViewValue = $manager_Promotional->thoigian_them->CurrentValue;
			$manager_Promotional->thoigian_them->ViewValue = ew_FormatDateTime($manager_Promotional->thoigian_them->ViewValue, 7);
			$manager_Promotional->thoigian_them->CssStyle = "";
			$manager_Promotional->thoigian_them->CssClass = "";
			$manager_Promotional->thoigian_them->ViewCustomAttributes = "";

			// thoigian_sua
			$manager_Promotional->thoigian_sua->ViewValue = $manager_Promotional->thoigian_sua->CurrentValue;
			$manager_Promotional->thoigian_sua->ViewValue = ew_FormatDateTime($manager_Promotional->thoigian_sua->ViewValue, 7);
			$manager_Promotional->thoigian_sua->CssStyle = "";
			$manager_Promotional->thoigian_sua->CssClass = "";
			$manager_Promotional->thoigian_sua->ViewCustomAttributes = "";

			// soluot_truynhap
			$manager_Promotional->soluot_truynhap->ViewValue = $manager_Promotional->soluot_truynhap->CurrentValue;
			$manager_Promotional->soluot_truynhap->CssStyle = "";
			$manager_Promotional->soluot_truynhap->CssClass = "";
			$manager_Promotional->soluot_truynhap->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_Promotional->xuatban->CurrentValue) <> "") {
				switch ($manager_Promotional->xuatban->CurrentValue) {
					case "0":
						$manager_Promotional->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$manager_Promotional->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_Promotional->xuatban->ViewValue = $manager_Promotional->xuatban->CurrentValue;
				}
			} else {
				$manager_Promotional->xuatban->ViewValue = NULL;
			}
			$manager_Promotional->xuatban->CssStyle = "";
			$manager_Promotional->xuatban->CssClass = "";
			$manager_Promotional->xuatban->ViewCustomAttributes = "";

			// anh_tintuc
			if (!is_null($manager_Promotional->anh_tintuc->Upload->DbValue)) {
				$manager_Promotional->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_Promotional->anh_tintuc->ViewValue)) ? $manager_Promotional->anh_tintuc->ViewValue : $manager_Promotional->anh_tintuc->CurrentValue);
				if ($manager_Promotional->Export <> "") $manager_Promotional->anh_tintuc->HrefValue = ew_ConvertFullUrl($manager_Promotional->anh_tintuc->HrefValue);
			} else {
				$manager_Promotional->anh_tintuc->HrefValue = "";
			}

			// ten_congty
			$manager_Promotional->ten_congty->HrefValue = "";

			// hoten_nguoilienhe
			$manager_Promotional->hoten_nguoilienhe->HrefValue = "";

		

			// tieude_tintuc
			$manager_Promotional->tieude_tintuc->HrefValue = "";

			// tukhoa_tintuc
			$manager_Promotional->tukhoa_tintuc->HrefValue = "";

			// tomtat_tintuc
			$manager_Promotional->tomtat_tintuc->HrefValue = "";

			// nguon_tintuc
			$manager_Promotional->nguon_tintuc->HrefValue = "";

			// noidung_tintuc
			$manager_Promotional->noidung_tintuc->HrefValue = "";

			// lienket_tintuc
			$manager_Promotional->lienket_tintuc->HrefValue = "";

			// hienthi_tungay
			$manager_Promotional->hienthi_tungay->HrefValue = "";

			// hienthi_denngay
			$manager_Promotional->hienthi_denngay->HrefValue = "";

			// thoigian_them
			$manager_Promotional->thoigian_them->HrefValue = "";

			// thoigian_sua
			$manager_Promotional->thoigian_sua->HrefValue = "";

			// soluot_truynhap
			$manager_Promotional->soluot_truynhap->HrefValue = "";

			// xuatban
			$manager_Promotional->xuatban->HrefValue = "";
		}

		// Call Row Rendered event
		$manager_Promotional->Row_Rendered();
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
