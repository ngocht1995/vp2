<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "user_newinfo.php" ?>
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
$user_new_view = new cuser_new_view();
$Page =& $user_new_view;

// Page init processing
$user_new_view->Page_Init();

// Page main processing
$user_new_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($user_new->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var user_new_view = new ew_Page("user_new_view");

// page properties
user_new_view.PageID = "view"; // page ID
var EW_PAGE_ID = user_new_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_new_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_new_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_new_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_new_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="user_newlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($user_new->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<?php if ($user_new_view->ShowOptionLink()) { ?>
<a href="<?php echo $user_new->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<?php if ($user_new_view->ShowOptionLink()) { ?>
<a href="<?php echo $user_new->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<?php if ($user_new_view->ShowOptionLink()) { ?>
<a href="<?php echo $user_new->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $user_new_view->ShowMessage() ?>
<p>
<?php if ($user_new->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_new_view->Pager)) $user_new_view->Pager = new cNumericPager($user_new_view->lStartRec, $user_new_view->lDisplayRecs, $user_new_view->lTotalRecs, $user_new_view->lRecRange) ?>
<?php if ($user_new_view->Pager->RecordCount > 0) { ?>
	<?php if ($user_new_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_new_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_new_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_new_view->sSrchWhere == "0=101") { ?>
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
<?php if ($user_new->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<tr<?php echo $user_new->tieude_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $user_new->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->tieude_tintuc->ViewAttributes() ?>><?php echo $user_new->tieude_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->tukhoa_tintuc->Visible) { // tukhoa_tintuc ?>
	<tr<?php echo $user_new->tukhoa_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $user_new->tukhoa_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->tukhoa_tintuc->ViewAttributes() ?>><?php echo $user_new->tukhoa_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->tomtat_tintuc->Visible) { // tomtat_tintuc ?>
	<tr<?php echo $user_new->tomtat_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn</td>
		<td<?php echo $user_new->tomtat_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->tomtat_tintuc->ViewAttributes() ?>><?php echo $user_new->tomtat_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->anh_tintuc->Visible) { // anh_tintuc ?>
	<tr<?php echo $user_new->anh_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $user_new->anh_tintuc->CellAttributes() ?>>
<?php if ($user_new->anh_tintuc->HrefValue <> "") { ?>
<?php if (!is_null($user_new->anh_tintuc->Upload->DbValue)) { ?>
<a href="<?php echo $user_new->anh_tintuc->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $user_new->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $user_new->anh_tintuc->ViewAttributes() ?>></a>
<?php } elseif (!in_array($user_new->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($user_new->anh_tintuc->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $user_new->anh_tintuc->Upload->DbValue ?>" border=0<?php echo $user_new->anh_tintuc->ViewAttributes() ?>>
<?php } elseif (!in_array($user_new->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($user_new->nguon_tintuc->Visible) { // nguon_tintuc ?>
	<tr<?php echo $user_new->nguon_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn nhập</td>
		<td<?php echo $user_new->nguon_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->nguon_tintuc->ViewAttributes() ?>><?php echo $user_new->nguon_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->noidung_tintuc->Visible) { // noidung_tintuc ?>
	<tr<?php echo $user_new->noidung_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $user_new->noidung_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->noidung_tintuc->ViewAttributes() ?>><?php echo $user_new->noidung_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->lienket_tintuc->Visible) { // lienket_tintuc ?>
	<tr<?php echo $user_new->lienket_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết tin tức</td>
		<td<?php echo $user_new->lienket_tintuc->CellAttributes() ?>>
<div<?php echo $user_new->lienket_tintuc->ViewAttributes() ?>><?php echo $user_new->lienket_tintuc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->hienthi_tungay->Visible) { // hienthi_tungay ?>
	<tr<?php echo $user_new->hienthi_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị từ ngày</td>
		<td<?php echo $user_new->hienthi_tungay->CellAttributes() ?>>
<div<?php echo $user_new->hienthi_tungay->ViewAttributes() ?>><?php echo $user_new->hienthi_tungay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->hienthi_denngay->Visible) { // hienthi_denngay ?>
	<tr<?php echo $user_new->hienthi_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị đến ngày</td>
		<td<?php echo $user_new->hienthi_denngay->CellAttributes() ?>>
<div<?php echo $user_new->hienthi_denngay->ViewAttributes() ?>><?php echo $user_new->hienthi_denngay->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $user_new->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $user_new->thoigian_them->CellAttributes() ?>>
<div<?php echo $user_new->thoigian_them->ViewAttributes() ?>><?php echo $user_new->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->thoigian_sua->Visible) { // thoigian_sua ?>
	<tr<?php echo $user_new->thoigian_sua->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $user_new->thoigian_sua->CellAttributes() ?>>
<div<?php echo $user_new->thoigian_sua->ViewAttributes() ?>><?php echo $user_new->thoigian_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->soluot_truynhap->Visible) { // soluot_truynhap ?>
	<tr<?php echo $user_new->soluot_truynhap->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $user_new->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $user_new->soluot_truynhap->ViewAttributes() ?>><?php echo $user_new->soluot_truynhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $user_new->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $user_new->trang_thai->CellAttributes() ?>>
<div<?php echo $user_new->trang_thai->ViewAttributes() ?>><?php echo $user_new->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user_new->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $user_new->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $user_new->xuatban->CellAttributes() ?>>
<div<?php echo $user_new->xuatban->ViewAttributes() ?>><?php echo $user_new->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($user_new->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_new_view->Pager)) $user_new_view->Pager = new cNumericPager($user_new_view->lStartRec, $user_new_view->lDisplayRecs, $user_new_view->lTotalRecs, $user_new_view->lRecRange) ?>
<?php if ($user_new_view->Pager->RecordCount > 0) { ?>
	<?php if ($user_new_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_new_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_new_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_new_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_new_view->PageUrl() ?>start=<?php echo $user_new_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_new_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không co tin
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
<?php if ($user_new->Export == "") { ?>
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
class cuser_new_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'user_new';

	// Page Object Name
	var $PageObjName = 'user_new_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user_new;
		if ($user_new->UseTokenInUrl) $PageUrl .= "t=" . $user_new->TableVar . "&"; // add page token
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
		global $objForm, $user_new;
		if ($user_new->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user_new->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user_new->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_new_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["user_new"] = new cuser_new();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user_new', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user_new;
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
			$this->Page_Terminate("user_newlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("user_newlist.php");
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
		global $user_new;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["tintuc_id"] <> "") {
				$user_new->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$user_new->CurrentAction = "I"; // Display form
			switch ($user_new->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("user_newlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($user_new->tintuc_id->CurrentValue) == strval($rs->fields('tintuc_id'))) {
								$user_new->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "user_newlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "user_newlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$user_new->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $user_new;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$user_new->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$user_new->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $user_new->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$user_new->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$user_new->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$user_new->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user_new;

		// Call Recordset Selecting event
		$user_new->Recordset_Selecting($user_new->CurrentFilter);

		// Load list page SQL
		$sSql = $user_new->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user_new->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user_new;
		$sFilter = $user_new->KeyFilter();

		// Call Row Selecting event
		$user_new->Row_Selecting($sFilter);

		// Load sql based on filter
		$user_new->CurrentFilter = $sFilter;
		$sSql = $user_new->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user_new->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user_new;
		$user_new->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$user_new->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user_new->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$user_new->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$user_new->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$user_new->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$user_new->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$user_new->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$user_new->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$user_new->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$user_new->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$user_new->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$user_new->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$user_new->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$user_new->trang_thai->setDbValue($rs->fields('trang_thai'));
		$user_new->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$user_new->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user_new;

		// Call Row_Rendering event
		$user_new->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$user_new->tieude_tintuc->CellCssStyle = "";
		$user_new->tieude_tintuc->CellCssClass = "";

		// tukhoa_tintuc
		$user_new->tukhoa_tintuc->CellCssStyle = "";
		$user_new->tukhoa_tintuc->CellCssClass = "";

		// tomtat_tintuc
		$user_new->tomtat_tintuc->CellCssStyle = "";
		$user_new->tomtat_tintuc->CellCssClass = "";

		// anh_tintuc
		$user_new->anh_tintuc->CellCssStyle = "";
		$user_new->anh_tintuc->CellCssClass = "";

		// nguon_tintuc
		$user_new->nguon_tintuc->CellCssStyle = "";
		$user_new->nguon_tintuc->CellCssClass = "";

		// noidung_tintuc
		$user_new->noidung_tintuc->CellCssStyle = "";
		$user_new->noidung_tintuc->CellCssClass = "";

		// lienket_tintuc
		$user_new->lienket_tintuc->CellCssStyle = "";
		$user_new->lienket_tintuc->CellCssClass = "";

		// hienthi_tungay
		$user_new->hienthi_tungay->CellCssStyle = "";
		$user_new->hienthi_tungay->CellCssClass = "";

		// hienthi_denngay
		$user_new->hienthi_denngay->CellCssStyle = "";
		$user_new->hienthi_denngay->CellCssClass = "";

		// thoigian_them
		$user_new->thoigian_them->CellCssStyle = "";
		$user_new->thoigian_them->CellCssClass = "";

		// thoigian_sua
		$user_new->thoigian_sua->CellCssStyle = "";
		$user_new->thoigian_sua->CellCssClass = "";

		// soluot_truynhap
		$user_new->soluot_truynhap->CellCssStyle = "";
		$user_new->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$user_new->trang_thai->CellCssStyle = "";
		$user_new->trang_thai->CellCssClass = "";

		// xuatban
		$user_new->xuatban->CellCssStyle = "";
		$user_new->xuatban->CellCssClass = "";
		if ($user_new->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$user_new->tieude_tintuc->ViewValue = $user_new->tieude_tintuc->CurrentValue;
			$user_new->tieude_tintuc->CssStyle = "";
			$user_new->tieude_tintuc->CssClass = "";
			$user_new->tieude_tintuc->ViewCustomAttributes = "";

			// tukhoa_tintuc
			$user_new->tukhoa_tintuc->ViewValue = $user_new->tukhoa_tintuc->CurrentValue;
			$user_new->tukhoa_tintuc->CssStyle = "";
			$user_new->tukhoa_tintuc->CssClass = "";
			$user_new->tukhoa_tintuc->ViewCustomAttributes = "";

			// tomtat_tintuc
			$user_new->tomtat_tintuc->ViewValue = $user_new->tomtat_tintuc->CurrentValue;
			$user_new->tomtat_tintuc->CssStyle = "";
			$user_new->tomtat_tintuc->CssClass = "";
			$user_new->tomtat_tintuc->ViewCustomAttributes = "";

			// anh_tintuc
			if (!is_null($user_new->anh_tintuc->Upload->DbValue)) {
				$user_new->anh_tintuc->ViewValue = $user_new->anh_tintuc->Upload->DbValue;
				$user_new->anh_tintuc->ImageWidth = 150;
				$user_new->anh_tintuc->ImageHeight = 0;
				$user_new->anh_tintuc->ImageAlt = "";
			} else {
				$user_new->anh_tintuc->ViewValue = "";
			}
			$user_new->anh_tintuc->CssStyle = "";
			$user_new->anh_tintuc->CssClass = "";
			$user_new->anh_tintuc->ViewCustomAttributes = "";

			// nguon_tintuc
			$user_new->nguon_tintuc->ViewValue = $user_new->nguon_tintuc->CurrentValue;
			$user_new->nguon_tintuc->CssStyle = "";
			$user_new->nguon_tintuc->CssClass = "";
			$user_new->nguon_tintuc->ViewCustomAttributes = "";

			// noidung_tintuc
			$user_new->noidung_tintuc->ViewValue = $user_new->noidung_tintuc->CurrentValue;
			$user_new->noidung_tintuc->CssStyle = "";
			$user_new->noidung_tintuc->CssClass = "";
			$user_new->noidung_tintuc->ViewCustomAttributes = "";

			// lienket_tintuc
			$user_new->lienket_tintuc->ViewValue = $user_new->lienket_tintuc->CurrentValue;
			$user_new->lienket_tintuc->CssStyle = "";
			$user_new->lienket_tintuc->CssClass = "";
			$user_new->lienket_tintuc->ViewCustomAttributes = "";

			// hienthi_tungay
			$user_new->hienthi_tungay->ViewValue = $user_new->hienthi_tungay->CurrentValue;
			$user_new->hienthi_tungay->ViewValue = ew_FormatDateTime($user_new->hienthi_tungay->ViewValue, 7);
			$user_new->hienthi_tungay->CssStyle = "";
			$user_new->hienthi_tungay->CssClass = "";
			$user_new->hienthi_tungay->ViewCustomAttributes = "";

			// hienthi_denngay
			$user_new->hienthi_denngay->ViewValue = $user_new->hienthi_denngay->CurrentValue;
			$user_new->hienthi_denngay->ViewValue = ew_FormatDateTime($user_new->hienthi_denngay->ViewValue, 7);
			$user_new->hienthi_denngay->CssStyle = "";
			$user_new->hienthi_denngay->CssClass = "";
			$user_new->hienthi_denngay->ViewCustomAttributes = "";

			// thoigian_them
			$user_new->thoigian_them->ViewValue = $user_new->thoigian_them->CurrentValue;
			$user_new->thoigian_them->ViewValue = ew_FormatDateTime($user_new->thoigian_them->ViewValue, 7);
			$user_new->thoigian_them->CssStyle = "";
			$user_new->thoigian_them->CssClass = "";
			$user_new->thoigian_them->ViewCustomAttributes = "";

			// thoigian_sua
			$user_new->thoigian_sua->ViewValue = $user_new->thoigian_sua->CurrentValue;
			$user_new->thoigian_sua->ViewValue = ew_FormatDateTime($user_new->thoigian_sua->ViewValue, 7);
			$user_new->thoigian_sua->CssStyle = "";
			$user_new->thoigian_sua->CssClass = "";
			$user_new->thoigian_sua->ViewCustomAttributes = "";

			// soluot_truynhap
			$user_new->soluot_truynhap->ViewValue = $user_new->soluot_truynhap->CurrentValue;
			$user_new->soluot_truynhap->CssStyle = "";
			$user_new->soluot_truynhap->CssClass = "";
			$user_new->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($user_new->trang_thai->CurrentValue) <> "") {
				switch ($user_new->trang_thai->CurrentValue) {
					case "1":
						$user_new->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$user_new->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$user_new->trang_thai->ViewValue = $user_new->trang_thai->CurrentValue;
				}
			} else {
				$user_new->trang_thai->ViewValue = NULL;
			}
			$user_new->trang_thai->CssStyle = "";
			$user_new->trang_thai->CssClass = "";
			$user_new->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($user_new->xuatban->CurrentValue) <> "") {
				switch ($user_new->xuatban->CurrentValue) {
					case "0":
						$user_new->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$user_new->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$user_new->xuatban->ViewValue = $user_new->xuatban->CurrentValue;
				}
			} else {
				$user_new->xuatban->ViewValue = NULL;
			}
			$user_new->xuatban->CssStyle = "";
			$user_new->xuatban->CssClass = "";
			$user_new->xuatban->ViewCustomAttributes = "";

			// tieude_tintuc
			$user_new->tieude_tintuc->HrefValue = "";

			// tukhoa_tintuc
			$user_new->tukhoa_tintuc->HrefValue = "";

			// tomtat_tintuc
			$user_new->tomtat_tintuc->HrefValue = "";

			// anh_tintuc
			if (!is_null($user_new->anh_tintuc->Upload->DbValue)) {
				$user_new->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($user_new->anh_tintuc->ViewValue)) ? $user_new->anh_tintuc->ViewValue : $user_new->anh_tintuc->CurrentValue);
				if ($user_new->Export <> "") $user_new->anh_tintuc->HrefValue = ew_ConvertFullUrl($user_new->anh_tintuc->HrefValue);
			} else {
				$user_new->anh_tintuc->HrefValue = "";
			}

			// nguon_tintuc
			$user_new->nguon_tintuc->HrefValue = "";

			// noidung_tintuc
			$user_new->noidung_tintuc->HrefValue = "";

			// lienket_tintuc
			$user_new->lienket_tintuc->HrefValue = "";

			// hienthi_tungay
			$user_new->hienthi_tungay->HrefValue = "";

			// hienthi_denngay
			$user_new->hienthi_denngay->HrefValue = "";

			// thoigian_them
			$user_new->thoigian_them->HrefValue = "";

			// thoigian_sua
			$user_new->thoigian_sua->HrefValue = "";

			// soluot_truynhap
			$user_new->soluot_truynhap->HrefValue = "";

			// trang_thai
			$user_new->trang_thai->HrefValue = "";

			// xuatban
			$user_new->xuatban->HrefValue = "";
		}

		// Call Row Rendered event
		$user_new->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $user_new;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($user_new->nguoidung_id->CurrentValue);
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
