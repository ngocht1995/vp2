<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_view = new cadvertising_view();
$Page =& $advertising_view;

// Page init processing
$advertising_view->Page_Init();

// Page main processing
$advertising_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_view = new ew_Page("advertising_view");

// page properties
advertising_view.PageID = "view"; // page ID
var EW_PAGE_ID = advertising_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="advertisinglist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem danh mục quảng cáo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br><br>
<?php if ($advertising->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $advertising->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $advertising->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $advertising_view->ShowMessage() ?>
<p>
<?php if ($advertising->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_view->Pager)) $advertising_view->Pager = new cNumericPager($advertising_view->lStartRec, $advertising_view->lDisplayRecs, $advertising_view->lTotalRecs, $advertising_view->lRecRange) ?>
<?php if ($advertising_view->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có quảng cáo
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
<?php if ($advertising->tieu_de->Visible) { // tieu_de ?>
	<tr<?php echo $advertising->tieu_de->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $advertising->tieu_de->CellAttributes() ?>>
<div<?php echo $advertising->tieu_de->ViewAttributes() ?>><?php echo $advertising->tieu_de->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->anh_logo->Visible) { // anh_logo ?>
	<tr<?php echo $advertising->anh_logo->RowAttributes ?>>
		<td class="ewTableHeader">Logo</td>
		<td<?php echo $advertising->anh_logo->CellAttributes() ?>>
<?php if ($advertising->anh_logo->HrefValue <> "") { ?>
<?php if (!is_null($advertising->anh_logo->Upload->DbValue)) { ?>

<!--vu viet hung-->
		<?php if ($advertising->dorong_anh->CurrentValue>260){
		$width="width=\"260\"";
		$x_w="<param name=\"width\" value=\"260\" />";
		$resize=1;}
		else {$width="width=\"".$advertising->dorong_anh->CurrentValue."\"";
		$x_w="<param name=\"width\" value=\"".$advertising->dorong_anh->CurrentValue."\" />";
		$resize=0;}?>
		<?php if($resize==1){
		$x_size=round($advertising->chieucao_anh->CurrentValue*(260/$advertising->dorong_anh->CurrentValue));
		$height="height=\"".$x_size."\"";
		$x_h="<param name=\"height\" value=\"".$x_size."\" />";}
		else {$height="height=\"".$advertising->chieucao_anh->CurrentValue."\"";
		$x_h="<param name=\"height\" value=\"".$advertising->chieucao_anh->CurrentValue."\" />";}?>
<?php if ($advertising->kieu_anh->CurrentValue <>"swf"){
 ?>
<img src="advertising_anh_logo_bv.php?lienket_id=<?php echo $advertising->lienket_id->CurrentValue ?>" border=0 <?php echo $width." ".$height;?>>
<?php }
else {?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" <?php echo $width." ".$height;?> ><?php echo $x_w." ".$x_h;?><param name="src" value="flash.php?text=<?php echo $advertising->lienket_id->CurrentValue ;?>" /><embed type="application/x-shockwave-flash" <?php echo $width." ".$height;?> src="flash.php?text=<?php echo $advertising->lienket_id->CurrentValue ;?>"></embed></object>
 <?php } ?>
 
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($advertising->anh_logo->Upload->DbValue)) { ?>
<img src="advertising_anh_logo_bv.php?lienket_id=<?php echo $advertising->lienket_id->CurrentValue ?>" border=0<?php echo $advertising->anh_logo->ViewAttributes() ?>>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<tr<?php echo $advertising->kieu_anh->RowAttributes ?>>
		<td class="ewTableHeader">Kieu Anh</td>
		<td<?php echo $advertising->kieu_anh->CellAttributes() ?>>
<div<?php echo $advertising->kieu_anh->ViewAttributes() ?>><?php echo $advertising->kieu_anh->ViewValue ?></div></td>
	</tr>
<?php if ($advertising->duongdan_lienket->Visible) { // duongdan_lienket ?>
	<tr<?php echo $advertising->duongdan_lienket->RowAttributes ?>>
		<td class="ewTableHeader">Website</td>
		<td<?php echo $advertising->duongdan_lienket->CellAttributes() ?>>
<div<?php echo $advertising->duongdan_lienket->ViewAttributes() ?>><?php echo $advertising->duongdan_lienket->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->ten_viettat->Visible) { // ten_viettat ?>
	<tr<?php echo $advertising->ten_viettat->RowAttributes ?>>
		<td class="ewTableHeader">Tên viết tắt</td>
		<td<?php echo $advertising->ten_viettat->CellAttributes() ?>>
<div<?php echo $advertising->ten_viettat->ViewAttributes() ?>><?php echo $advertising->ten_viettat->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->mo_ta->Visible) { // mo_ta ?>
	<tr<?php echo $advertising->mo_ta->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả</td>
		<td<?php echo $advertising->mo_ta->CellAttributes() ?>>
<div<?php echo $advertising->mo_ta->ViewAttributes() ?>><?php echo $advertising->mo_ta->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->dorong_anh->Visible) { // dorong_anh ?>
	<tr<?php echo $advertising->dorong_anh->RowAttributes ?>>
		<td class="ewTableHeader">Chiều rộng Logo</td>
		<td<?php echo $advertising->dorong_anh->CellAttributes() ?>>
<div<?php echo $advertising->dorong_anh->ViewAttributes() ?>><?php echo $advertising->dorong_anh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->chieucao_anh->Visible) { // chieucao_anh ?>
	<tr<?php echo $advertising->chieucao_anh->RowAttributes ?>>
		<td class="ewTableHeader">Chiều cao Logo</td>
		<td<?php echo $advertising->chieucao_anh->CellAttributes() ?>>
<div<?php echo $advertising->chieucao_anh->ViewAttributes() ?>><?php echo $advertising->chieucao_anh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $advertising->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự sắp xếp</td>
		<td<?php echo $advertising->thutu_sapxep->CellAttributes() ?>>
<div<?php echo $advertising->thutu_sapxep->ViewAttributes() ?>><?php echo $advertising->thutu_sapxep->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->vitri_quangcao->Visible) { // vitri_quangcao ?>
	<tr<?php echo $advertising->vitri_quangcao->RowAttributes ?>>
		<td class="ewTableHeader">Vị trí hiển thị</td>
		<td<?php echo $advertising->vitri_quangcao->CellAttributes() ?>>
<div<?php echo $advertising->vitri_quangcao->ViewAttributes() ?>><?php echo $advertising->vitri_quangcao->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->solan_truycap->Visible) { // solan_truycap ?>
	<tr<?php echo $advertising->solan_truycap->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $advertising->solan_truycap->CellAttributes() ?>>
<div<?php echo $advertising->solan_truycap->ViewAttributes() ?>><?php echo $advertising->solan_truycap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->thoigian_them->Visible) { // thoigian_them ?>
	<tr<?php echo $advertising->thoigian_them->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $advertising->thoigian_them->CellAttributes() ?>>
<div<?php echo $advertising->thoigian_them->ViewAttributes() ?>><?php echo $advertising->thoigian_them->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->thoigian_sua->Visible) { // thoigian_sua ?>
	<tr<?php echo $advertising->thoigian_sua->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $advertising->thoigian_sua->CellAttributes() ?>>
<div<?php echo $advertising->thoigian_sua->ViewAttributes() ?>><?php echo $advertising->thoigian_sua->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($advertising->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_view->Pager)) $advertising_view->Pager = new cNumericPager($advertising_view->lStartRec, $advertising_view->lDisplayRecs, $advertising_view->lTotalRecs, $advertising_view->lRecRange) ?>
<?php if ($advertising_view->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có quảng cáo
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
<?php if ($advertising->Export == "") { ?>
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
class cadvertising_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'advertising';

	// Page Object Name
	var $PageObjName = 'advertising_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising"] = new cadvertising();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising;
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
			$this->Page_Terminate("advertisinglist.php");
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
		global $advertising;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["lienket_id"] <> "") {
				$advertising->lienket_id->setQueryStringValue($_GET["lienket_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$advertising->CurrentAction = "I"; // Display form
			switch ($advertising->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("advertisinglist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($advertising->lienket_id->CurrentValue) == strval($rs->fields('lienket_id'))) {
								$advertising->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "advertisinglist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "advertisinglist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$advertising->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $advertising;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising;
		$advertising->lienket_id->setDbValue($rs->fields('lienket_id'));
		$advertising->tieu_de->setDbValue($rs->fields('tieu_de'));
		$advertising->anh_logo->Upload->DbValue = $rs->fields('anh_logo');
		$advertising->kieu_anh->setDbValue($rs->fields('kieu_anh'));
		$advertising->duongdan_lienket->setDbValue($rs->fields('duongdan_lienket'));
		$advertising->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$advertising->mo_ta->setDbValue($rs->fields('mo_ta'));
		$advertising->dorong_anh->setDbValue($rs->fields('dorong_anh'));
		$advertising->chieucao_anh->setDbValue($rs->fields('chieucao_anh'));
		$advertising->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising->luachon_hienthi->setDbValue($rs->fields('luachon_hienthi'));
		$advertising->vitri_quangcao->setDbValue($rs->fields('vitri_quangcao'));
		$advertising->solan_truycap->setDbValue($rs->fields('solan_truycap'));
		$advertising->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$advertising->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$advertising->trang_thai->setDbValue($rs->fields('trang_thai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising;

		// Call Row_Rendering event
		$advertising->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$advertising->tieu_de->CellCssStyle = "";
		$advertising->tieu_de->CellCssClass = "";

		// anh_logo
		$advertising->anh_logo->CellCssStyle = "";
		$advertising->anh_logo->CellCssClass = "";
		// kieu_anh
		$advertising->kieu_anh->CellCssStyle = "";
		$advertising->kieu_anh->CellCssClass = "";

		// duongdan_lienket
		$advertising->duongdan_lienket->CellCssStyle = "";
		$advertising->duongdan_lienket->CellCssClass = "";

		// ten_viettat
		$advertising->ten_viettat->CellCssStyle = "";
		$advertising->ten_viettat->CellCssClass = "";

		// mo_ta
		$advertising->mo_ta->CellCssStyle = "";
		$advertising->mo_ta->CellCssClass = "";

		// dorong_anh
		$advertising->dorong_anh->CellCssStyle = "";
		$advertising->dorong_anh->CellCssClass = "";

		// chieucao_anh
		$advertising->chieucao_anh->CellCssStyle = "";
		$advertising->chieucao_anh->CellCssClass = "";

		// thutu_sapxep
		$advertising->thutu_sapxep->CellCssStyle = "";
		$advertising->thutu_sapxep->CellCssClass = "";

		// luachon_hienthi
		$advertising->luachon_hienthi->CellCssStyle = "";
		$advertising->luachon_hienthi->CellCssClass = "";

		// vitri_quangcao
		$advertising->vitri_quangcao->CellCssStyle = "";
		$advertising->vitri_quangcao->CellCssClass = "";

		// solan_truycap
		$advertising->solan_truycap->CellCssStyle = "";
		$advertising->solan_truycap->CellCssClass = "";

		// thoigian_them
		$advertising->thoigian_them->CellCssStyle = "";
		$advertising->thoigian_them->CellCssClass = "";

		// thoigian_sua
		$advertising->thoigian_sua->CellCssStyle = "";
		$advertising->thoigian_sua->CellCssClass = "";

		// nguoi_them
		$advertising->nguoi_them->CellCssStyle = "";
		$advertising->nguoi_them->CellCssClass = "";

		// nguoi_sua
		$advertising->nguoi_sua->CellCssStyle = "";
		$advertising->nguoi_sua->CellCssClass = "";
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$advertising->tieu_de->ViewValue = $advertising->tieu_de->CurrentValue;
			$advertising->tieu_de->CssStyle = "";
			$advertising->tieu_de->CssClass = "";
			$advertising->tieu_de->ViewCustomAttributes = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->ViewValue = "Anh Logo";
				$advertising->anh_logo->ImageWidth = 200;
				$advertising->anh_logo->ImageHeight = 0;
				$advertising->anh_logo->ImageAlt = "";
			} else {
				$advertising->anh_logo->ViewValue = "";
			}
			$advertising->anh_logo->CssStyle = "";
			$advertising->anh_logo->CssClass = "";
			$advertising->anh_logo->ViewCustomAttributes = "";
			// kieu_anh
			if (strval($advertising->kieu_anh->CurrentValue) <> "") {
				switch ($advertising->kieu_anh->CurrentValue) {
					case "":
						$advertising->kieu_anh->ViewValue = "Ảnh";
						break;
					case "swf":
						$advertising->kieu_anh->ViewValue = "FLash";
						break;
					default:
						$advertising->kieu_anh->ViewValue = $advertising->kieu_anh->CurrentValue;
				}
			} else {
				$advertising->kieu_anh->ViewValue = NULL;
			}
			$advertising->kieu_anh->CssStyle = "";
			$advertising->kieu_anh->CssClass = "";
			$advertising->kieu_anh->ViewCustomAttributes = "";


			// duongdan_lienket
			$advertising->duongdan_lienket->ViewValue = $advertising->duongdan_lienket->CurrentValue;
			$advertising->duongdan_lienket->CssStyle = "";
			$advertising->duongdan_lienket->CssClass = "";
			$advertising->duongdan_lienket->ViewCustomAttributes = "";

			// ten_viettat
			$advertising->ten_viettat->ViewValue = $advertising->ten_viettat->CurrentValue;
			$advertising->ten_viettat->CssStyle = "";
			$advertising->ten_viettat->CssClass = "";
			$advertising->ten_viettat->ViewCustomAttributes = "";

			// mo_ta
			$advertising->mo_ta->ViewValue = $advertising->mo_ta->CurrentValue;
			$advertising->mo_ta->CssStyle = "";
			$advertising->mo_ta->CssClass = "";
			$advertising->mo_ta->ViewCustomAttributes = "";

			// dorong_anh
			$advertising->dorong_anh->ViewValue = $advertising->dorong_anh->CurrentValue;
			$advertising->dorong_anh->ViewValue = ew_FormatNumber($advertising->dorong_anh->ViewValue, 0, -2, -2, -2);
			$advertising->dorong_anh->CssStyle = "";
			$advertising->dorong_anh->CssClass = "";
			$advertising->dorong_anh->ViewCustomAttributes = "";

			// chieucao_anh
			$advertising->chieucao_anh->ViewValue = $advertising->chieucao_anh->CurrentValue;
			$advertising->chieucao_anh->ViewValue = ew_FormatNumber($advertising->chieucao_anh->ViewValue, 0, -2, -2, -2);
			$advertising->chieucao_anh->CssStyle = "";
			$advertising->chieucao_anh->CssClass = "";
			$advertising->chieucao_anh->ViewCustomAttributes = "";

			// thutu_sapxep
			$advertising->thutu_sapxep->ViewValue = $advertising->thutu_sapxep->CurrentValue;
			$advertising->thutu_sapxep->CssStyle = "";
			$advertising->thutu_sapxep->CssClass = "";
			$advertising->thutu_sapxep->ViewCustomAttributes = "";

			// luachon_hienthi
			if (strval($advertising->luachon_hienthi->CurrentValue) <> "") {
				switch ($advertising->luachon_hienthi->CurrentValue) {
					case "1":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn";
						break;
					case "2":
						$advertising->luachon_hienthi->ViewValue = "Quảng cáo";
						break;
					case "3":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn và quảng cáo";
						break;
					default:
						$advertising->luachon_hienthi->ViewValue = $advertising->luachon_hienthi->CurrentValue;
				}
			} else {
				$advertising->luachon_hienthi->ViewValue = NULL;
			}
			$advertising->luachon_hienthi->CssStyle = "";
			$advertising->luachon_hienthi->CssClass = "";
			$advertising->luachon_hienthi->ViewCustomAttributes = "";

			// vitri_quangcao
			if (strval($advertising->vitri_quangcao->CurrentValue) <> "") {
				switch ($advertising->vitri_quangcao->CurrentValue) {
					case "1":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang tin ";
						break;
                                        case "2":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên phải trang tin ";
						break;
                                        case "3":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo bên trái trang sàn TMĐT ";
						break;
					case "4":
						$advertising->vitri_quangcao->ViewValue = "Ảnh banner trang tin ";
						break;
                                        case "5":
						$advertising->vitri_quangcao->ViewValue = "Quảng cáo vị trí giữa sàn TMĐT";
						break;
					default:
						$advertising->vitri_quangcao->ViewValue = $advertising->vitri_quangcao->CurrentValue;
				}
			} else {
				$advertising->vitri_quangcao->ViewValue = NULL;
			}
			$advertising->vitri_quangcao->CssStyle = "";
			$advertising->vitri_quangcao->CssClass = "";
			$advertising->vitri_quangcao->ViewCustomAttributes = "";

			// solan_truycap
			$advertising->solan_truycap->ViewValue = $advertising->solan_truycap->CurrentValue;
			$advertising->solan_truycap->CssStyle = "";
			$advertising->solan_truycap->CssClass = "";
			$advertising->solan_truycap->ViewCustomAttributes = "";

			// thoigian_them
			$advertising->thoigian_them->ViewValue = $advertising->thoigian_them->CurrentValue;
			$advertising->thoigian_them->ViewValue = ew_FormatDateTime($advertising->thoigian_them->ViewValue, 7);
			$advertising->thoigian_them->CssStyle = "";
			$advertising->thoigian_them->CssClass = "";
			$advertising->thoigian_them->ViewCustomAttributes = "";

			// thoigian_sua
			$advertising->thoigian_sua->ViewValue = $advertising->thoigian_sua->CurrentValue;
			$advertising->thoigian_sua->ViewValue = ew_FormatDateTime($advertising->thoigian_sua->ViewValue, 7);
			$advertising->thoigian_sua->CssStyle = "";
			$advertising->thoigian_sua->CssClass = "";
			$advertising->thoigian_sua->ViewCustomAttributes = "";

			// nguoi_them
			$advertising->nguoi_them->ViewValue = $advertising->nguoi_them->CurrentValue;
			$advertising->nguoi_them->CssStyle = "";
			$advertising->nguoi_them->CssClass = "";
			$advertising->nguoi_them->ViewCustomAttributes = "";

			// nguoi_sua
			$advertising->nguoi_sua->ViewValue = $advertising->nguoi_sua->CurrentValue;
			$advertising->nguoi_sua->CssStyle = "";
			$advertising->nguoi_sua->CssClass = "";
			$advertising->nguoi_sua->ViewCustomAttributes = "";

			// tieu_de
			$advertising->tieu_de->HrefValue = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->HrefValue = "advertising_anh_logo_bv.php?lienket_id=" . $advertising->lienket_id->CurrentValue;
				if ($advertising->Export <> "") $advertising->anh_logo->HrefValue = ew_ConvertFullUrl($advertising->anh_logo->HrefValue);
			} else {
				$advertising->anh_logo->HrefValue = "";
			}
			
			// kieu_anh
			$advertising->kieu_anh->HrefValue = "";
			// duongdan_lienket
			$advertising->duongdan_lienket->HrefValue = "";

			// ten_viettat
			$advertising->ten_viettat->HrefValue = "";

			// mo_ta
			$advertising->mo_ta->HrefValue = "";

			// dorong_anh
			$advertising->dorong_anh->HrefValue = "";

			// chieucao_anh
			$advertising->chieucao_anh->HrefValue = "";

			// thutu_sapxep
			$advertising->thutu_sapxep->HrefValue = "";

			// luachon_hienthi
			$advertising->luachon_hienthi->HrefValue = "";

			// vitri_quangcao
			$advertising->vitri_quangcao->HrefValue = "";

			// solan_truycap
			$advertising->solan_truycap->HrefValue = "";

			// thoigian_them
			$advertising->thoigian_them->HrefValue = "";

			// thoigian_sua
			$advertising->thoigian_sua->HrefValue = "";

			// nguoi_them
			$advertising->nguoi_them->HrefValue = "";

			// nguoi_sua
			$advertising->nguoi_sua->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising->Row_Rendered();
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
