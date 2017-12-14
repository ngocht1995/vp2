<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_phieucanhaninfo.php" ?>
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
$tbl_phieucanhan_view = new ctbl_phieucanhan_view();
$Page =& $tbl_phieucanhan_view;

// Page init processing
$tbl_phieucanhan_view->Page_Init();

// Page main processing
$tbl_phieucanhan_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_phieucanhan->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_phieucanhan_view = new ew_Page("tbl_phieucanhan_view");

// page properties
tbl_phieucanhan_view.PageID = "view"; // page ID
var EW_PAGE_ID = tbl_phieucanhan_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_phieucanhan_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_phieucanhan_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_phieucanhan_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_phieucanhan_view.ValidateRequired = false; // no JavaScript validation
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

<?php $tbl_phieucanhan_view->ShowMessage() ?>
<p>
<?php if ($tbl_phieucanhan->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_phieucanhan_view->Pager)) $tbl_phieucanhan_view->Pager = new cNumericPager($tbl_phieucanhan_view->lStartRec, $tbl_phieucanhan_view->lDisplayRecs, $tbl_phieucanhan_view->lTotalRecs, $tbl_phieucanhan_view->lRecRange) ?>
<?php if ($tbl_phieucanhan_view->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_phieucanhan_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_phieucanhan_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_phieucanhan_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="">
<div class="ewGridMiddlePanel">

<style>
    .anhsinhvien {
        float: left;
        margin-top: 35px;
        margin-right:20px;
        margin-left:20px;
        padding:1px;   
    }
    ol.thongtinsinhvien {
        list-style: disc;
    }
     ol.thongtinsinhvien li 
     {
         font-weight: 600;
         padding-top: 3px;
     }
     ol.thongtinsinhvien li span {
         font-size: normal;
     }
     h2.h2thongtincanhan {
         text-decoration: underline;
         color: navy;
         padding:10px;
     } 
     SPAN.spantieude {
         font-weight: 600;
         color: navy;
     }
</style>
<fieldset>
            <legend> <h2 class="h2thongtincanhan"> Thông tin cá nhân</h2></legend>
         <table border="1"  style="width: 100%">
           <tr>
              <td style="width: 20%"><span class="spantieude">Email xác thực</span></td>
              <td style="width:30%"><?php echo $tbl_phieucanhan->e_mail->ViewValue ?></td>
              <td style="width: 20%"><span class="spantieude">Số CMND</span></td>
              <td style="width: 30%"><?php echo $tbl_phieucanhan->ngaycap_chungminh->ViewValue ?>  </td>
          </tr>
          
          <tr>
              <td><span class="spantieude">Ngày cấp</span></td>
              <td><?php echo $tbl_phieucanhan->ngaycap_chungminh->ViewValue ?></td>
              <td><span class="spantieude">Nơi cấp</span></td>
              <td><?php echo $tbl_phieucanhan->noi_cap->ViewValue ?>    </td>
          </tr>
          
           <tr>
              <td><span class="spantieude">Dân tộc </span></td>
              <td><?php echo $tbl_phieucanhan->dan_toc->ViewValue ?></td>
              <td><span class="spantieude">Tôn giáo</span></td>
              <td> <?php echo $tbl_phieucanhan->ton_giao->ViewValue ?> </td>
          </tr>
          <tr>
              <td><span class="spantieude">Hộ khẩu thường trú </span></td>
              <td><?php echo $tbl_phieucanhan->hokhau_tt->ViewValue ?></td>
              <td><span class="spantieude">Chỗ ở hiện tại</span></td>
              <td><?php echo $tbl_phieucanhan->htlt_odau->ViewValue ?> </td>
          </tr>
           <tr>
              <td><span class="spantieude">Năng kiếu cá nhân</span></td>
              <td><?php echo $tbl_phieucanhan->nangkhieucanhan->ViewValue ?> </td>
              <td><span class="spantieude">Cấp bậc chức vụ hiện tại</span></td>
              <td><?php echo $tbl_phieucanhan->capbac_chucvu_dang->ViewValue ?> </td>
          </tr>
          <tr>
              <td><span class="spantieude">Địa chỉ số điện thoại liên hệ khi cần</span></td>
              <td><?php echo $tbl_phieucanhan->dtdc_khicanlh->ViewValue ?> </td>
              <td><span class="spantieude">Ngày vào đảng</span></td>
              <td><?php echo $tbl_phieucanhan->ngayvaodang->ViewValue ?> </td>
          </tr>
           <tr>
              <td><span class="spantieude">Họ tên bố</span></td>
              <td><?php echo $tbl_phieucanhan->hoten_bo->ViewValue ?> </td>
              <td><span class="spantieude">Họ tên mẹ</span></td>
              <td><?php echo $tbl_phieucanhan->hoten_me->ViewValue ?> </td>
          </tr>
          <tr>
              <td><span class="spantieude">Năm sinh bố</span></td>
              <td><?php echo $tbl_phieucanhan->namsinh_bo->ViewValue ?> </td>
              <td><span class="spantieude">Năm sinh mẹ</span></td>
              <td><?php echo $tbl_phieucanhan->namsinh_me->ViewValue ?> </td>
          </tr>
           <tr>
              <td><span class="spantieude">Nghề nghiệp & cơ quan công tác bố</span></td>
              <td><?php echo $tbl_phieucanhan->chucvu_bo->ViewValue ?> </td>
              <td><span class="spantieude">Nghề nghiệp & cơ quan công tác mẹ</span></td>
               <td><?php echo $tbl_phieucanhan->chucvu_me->ViewValue ?> </td>
          </tr>
          <tr>
              <td><span class="spantieude">Số điện thoại bố</span></td>
               <td><?php echo $tbl_phieucanhan->dt_bo->ViewValue ?> </td>
              <td><span class="spantieude">Số điện thoại mẹ</span></td>
               <td><?php echo $tbl_phieucanhan->dt_me->ViewValue ?> </td>
          </tr>
           <tr>
               <td><span class="spantieude">Số điện thoại gia đình khi cần liên hệ</span></td>
               <td><?php echo $tbl_phieucanhan->sdt_lienhegd->ViewValue ?> </td>
               <td><span class="spantieude">Gia đình chính sách</span></td>
               <td><?php echo $tbl_phieucanhan->gdchinhsach->ViewValue ?> </td>
          </tr>
      </table>
    </fieldset>
</div>
</td></tr></table>
<?php if ($tbl_phieucanhan->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_phieucanhan_view->Pager)) $tbl_phieucanhan_view->Pager = new cNumericPager($tbl_phieucanhan_view->lStartRec, $tbl_phieucanhan_view->lDisplayRecs, $tbl_phieucanhan_view->lTotalRecs, $tbl_phieucanhan_view->lRecRange) ?>
<?php if ($tbl_phieucanhan_view->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_phieucanhan_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_phieucanhan_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_phieucanhan_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_phieucanhan_view->PageUrl() ?>start=<?php echo $tbl_phieucanhan_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_phieucanhan_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p><span class="phpmaker">
<?php if ($tbl_phieucanhan->Export == "") { ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_phieucanhan->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $tbl_phieucanhan->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_phieucanhan->CopyUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $tbl_phieucanhan->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php if ($tbl_phieucanhan->Export == "") { ?>
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
class ctbl_phieucanhan_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'tbl_phieucanhan';

	// Page Object Name
	var $PageObjName = 'tbl_phieucanhan_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_phieucanhan;
		if ($tbl_phieucanhan->UseTokenInUrl) $PageUrl .= "t=" . $tbl_phieucanhan->TableVar . "&"; // add page token
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
		global $objForm, $tbl_phieucanhan;
		if ($tbl_phieucanhan->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_phieucanhan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_phieucanhan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_phieucanhan_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_phieucanhan"] = new ctbl_phieucanhan();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_phieucanhan', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_phieucanhan;
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
			$this->Page_Terminate("tbl_phieucanhanlist.php");
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
		global $tbl_phieucanhan;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["phieucanhan_id"] <> "") {
				$tbl_phieucanhan->phieucanhan_id->setQueryStringValue($_GET["phieucanhan_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
                              
			}

			// Get action
			$tbl_phieucanhan->CurrentAction = "I"; // Display form
			switch ($tbl_phieucanhan->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
					        $this->AddDefaultRow(); // Add  record Default
						$this->Page_Terminate("tbl_phieucanhanview.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($tbl_phieucanhan->phieucanhan_id->CurrentValue) == strval($rs->fields('phieucanhan_id'))) {
								$tbl_phieucanhan->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "tbl_phieucanhanlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "tbl_phieucanhanlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$tbl_phieucanhan->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}
        
        // Add Default record
	function AddDefaultRow() {
		global $conn, $Security, $tbl_phieucanhan;
		if ($_SESSION['arraythongtin']['MaSinhVien'] <> "") { // Check field with unique index
			$sFilter = "(msv = '" . ew_AdjustSql($_SESSION['arraythongtin']['MaSinhVien']) . "')";
			$rsChk = $tbl_phieucanhan->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "msv", "Duplicate value '%v' for unique index '%f'");
				$sIdxErrMsg = str_replace("%v", $tbl_phieucanhan->msv->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// Field chuyenmucphieu_id
		$tbl_phieucanhan->chuyenmucphieu_id->SetDbValueDef(1, NULL);
		$rsnew['chuyenmucphieu_id'] =& $tbl_phieucanhan->chuyenmucphieu_id->DbValue;

		// Field msv
		$tbl_phieucanhan->msv->SetDbValueDef($_SESSION['arraythongtin']['MaSinhVien'], NULL);
		$rsnew['msv'] =& $tbl_phieucanhan->msv->DbValue;

		// Field e_mail
		$tbl_phieucanhan->e_mail->SetDbValueDef($tbl_phieucanhan->e_mail->CurrentValue, NULL);
		$rsnew['e_mail'] =& $tbl_phieucanhan->e_mail->DbValue;

		// Field hoten
		$tbl_phieucanhan->hoten->SetDbValueDef(kill_khoangtrang($_SESSION['arraythongtin']['HoTen']), NULL);
		$rsnew['hoten'] =& $tbl_phieucanhan->hoten->DbValue;
                
                // Field ngaysinh
		$tbl_phieucanhan->ngaysinh->SetDbValueDef(ew_UnFormatDateTime($_SESSION['arraythongtin']['NgaySinh'], 7), NULL);
		$rsnew['ngaysinh'] =& $tbl_phieucanhan->ngaysinh->DbValue;

		// Field nganh_hoc
		$tbl_phieucanhan->nganh_hoc->SetDbValueDef($_SESSION['arraythongtin']['TenNganh'], NULL);
		$rsnew['nganh_hoc'] =& $tbl_phieucanhan->nganh_hoc->DbValue;

		// Field lop
		$tbl_phieucanhan->lop->SetDbValueDef($_SESSION['arraythongtin']['MaLop'], NULL);
		$rsnew['lop'] =& $tbl_phieucanhan->lop->DbValue;

		// Field khoa_hoc
		$tbl_phieucanhan->khoa_hoc->SetDbValueDef($_SESSION['arraythongtin']['TenKhoaHoc'], NULL);
		$rsnew['khoa_hoc'] =& $tbl_phieucanhan->khoa_hoc->DbValue;

		// Field he_daotao
		$tbl_phieucanhan->he_daotao->SetDbValueDef($_SESSION['arraythongtin']['TenHeDaoTao'], NULL);
		$rsnew['he_daotao'] =& $tbl_phieucanhan->he_daotao->DbValue;

		// Field tinh_trang
		$tbl_phieucanhan->tinh_trang->SetDbValueDef($_SESSION['arraythongtin']['TinhTrang'], NULL);
		$rsnew['tinh_trang'] =& $tbl_phieucanhan->tinh_trang->DbValue;

		// Field chungminh_nhandan
		$tbl_phieucanhan->chungminh_nhandan->SetDbValueDef(NULL, NULL);
		$rsnew['chungminh_nhandan'] =& $tbl_phieucanhan->chungminh_nhandan->DbValue;

		// Field ngaycap_chungminh
		$tbl_phieucanhan->ngaycap_chungminh->SetDbValueDef(NULL, NULL);
		$rsnew['ngaycap_chungminh'] =& $tbl_phieucanhan->ngaycap_chungminh->DbValue;

		// Field hokhau_tt
		$tbl_phieucanhan->hokhau_tt->SetDbValueDef(NULL, NULL);
		$rsnew['hokhau_tt'] =& $tbl_phieucanhan->hokhau_tt->DbValue;

		// Field noi_cap
		$tbl_phieucanhan->noi_cap->SetDbValueDef(NULL, NULL);
		$rsnew['noi_cap'] =& $tbl_phieucanhan->noi_cap->DbValue;

		// Field dan_toc
		$tbl_phieucanhan->dan_toc->SetDbValueDef(NULL, NULL);
		$rsnew['dan_toc'] =& $tbl_phieucanhan->dan_toc->DbValue;

		// Field ton_giao
		$tbl_phieucanhan->ton_giao->SetDbValueDef(NULL, NULL);
		$rsnew['ton_giao'] =& $tbl_phieucanhan->ton_giao->DbValue;

		// Field capbac_chucvu_dang
		$tbl_phieucanhan->capbac_chucvu_dang->SetDbValueDef(NULL, NULL);
		$rsnew['capbac_chucvu_dang'] =& $tbl_phieucanhan->capbac_chucvu_dang->DbValue;

		// Field htlt_odau
		$tbl_phieucanhan->htlt_odau->SetDbValueDef(NULL, NULL);
		$rsnew['htlt_odau'] =& $tbl_phieucanhan->htlt_odau->DbValue;

		// Field ngayvaodang
		$tbl_phieucanhan->ngayvaodang->SetDbValueDef(NULL, NULL);
		$rsnew['ngayvaodang'] =& $tbl_phieucanhan->ngayvaodang->DbValue;

		// Field nangkhieucanhan
		$tbl_phieucanhan->nangkhieucanhan->SetDbValueDef(NULL, NULL);
		$rsnew['nangkhieucanhan'] =& $tbl_phieucanhan->nangkhieucanhan->DbValue;

		// Field dtdc_khicanlh
		$tbl_phieucanhan->dtdc_khicanlh->SetDbValueDef(NULL, NULL);
		$rsnew['dtdc_khicanlh'] =& $tbl_phieucanhan->dtdc_khicanlh->DbValue;

		// Field hoten_bo
		$tbl_phieucanhan->hoten_bo->SetDbValueDef(NULL, NULL);
		$rsnew['hoten_bo'] =& $tbl_phieucanhan->hoten_bo->DbValue;

		// Field namsinh_bo
		$tbl_phieucanhan->namsinh_bo->SetDbValueDef(NULL, NULL);
		$rsnew['namsinh_bo'] =& $tbl_phieucanhan->namsinh_bo->DbValue;

		// Field dt_bo
		$tbl_phieucanhan->dt_bo->SetDbValueDef(NULL, NULL);
		$rsnew['dt_bo'] =& $tbl_phieucanhan->dt_bo->DbValue;

		// Field hoten_me
		$tbl_phieucanhan->hoten_me->SetDbValueDef(NULL, NULL);
		$rsnew['hoten_me'] =& $tbl_phieucanhan->hoten_me->DbValue;

		// Field namsinh_me
		$tbl_phieucanhan->namsinh_me->SetDbValueDef(NULL, NULL);
		$rsnew['namsinh_me'] =& $tbl_phieucanhan->namsinh_me->DbValue;

		// Field dt_me
		$tbl_phieucanhan->dt_me->SetDbValueDef(NULL, NULL);
		$rsnew['dt_me'] =& $tbl_phieucanhan->dt_me->DbValue;

		// Field gdchinhsach
		$tbl_phieucanhan->gdchinhsach->SetDbValueDef(NULL, NULL);
		$rsnew['gdchinhsach'] =& $tbl_phieucanhan->gdchinhsach->DbValue;

		// Field chucvu_bo
		$tbl_phieucanhan->chucvu_bo->SetDbValueDef(NULL, NULL);
		$rsnew['chucvu_bo'] =& $tbl_phieucanhan->chucvu_bo->DbValue;

		// Field chucvu_me
		$tbl_phieucanhan->chucvu_me->SetDbValueDef(NULL, NULL);
		$rsnew['chucvu_me'] =& $tbl_phieucanhan->chucvu_me->DbValue;

		// Field sdt_lienhegd
		$tbl_phieucanhan->sdt_lienhegd->SetDbValueDef(NULL, NULL);
		$rsnew['sdt_lienhegd'] =& $tbl_phieucanhan->sdt_lienhegd->DbValue;

		// Field datetime_edit
		$tbl_phieucanhan->datetime_add->SetDbValueDef(ew_CurrentDateTime(), NULL);
		$rsnew['datetime_add'] =& $tbl_phieucanhan->datetime_add->DbValue;
                	// Field active
		$tbl_phieucanhan->active->SetDbValueDef(1, NULL);
		$rsnew['active'] =& $tbl_phieucanhan->active->DbValue;

		// Call Row Inserting event
		$bInsertRow = $tbl_phieucanhan->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($tbl_phieucanhan->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_phieucanhan->CancelMessage <> "") {
				$this->setMessage($tbl_phieucanhan->CancelMessage);
				$tbl_phieucanhan->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$tbl_phieucanhan->phieucanhan_id->setDbValue($conn->Insert_ID());
			$rsnew['phieucanhan_id'] =& $tbl_phieucanhan->phieucanhan_id->DbValue;

			// Call Row Inserted event
			$tbl_phieucanhan->Row_Inserted($rsnew);
		}
		return $AddRow;
	}
        

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_phieucanhan;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_phieucanhan->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_phieucanhan->setStartRecordNumber($this->lStartRec);
		}
	}
   

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_phieucanhan;

		// Call Recordset Selecting event
		$tbl_phieucanhan->Recordset_Selecting($tbl_phieucanhan->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_phieucanhan->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";
                 
		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_phieucanhan->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_phieucanhan;
		$sFilter = $tbl_phieucanhan->KeyFilter();

		// Call Row Selecting event
		$tbl_phieucanhan->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_phieucanhan->CurrentFilter = $sFilter;
		$sSql = $tbl_phieucanhan->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_phieucanhan->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_phieucanhan;
		$tbl_phieucanhan->phieucanhan_id->setDbValue($rs->fields('phieucanhan_id'));
		$tbl_phieucanhan->chuyenmucphieu_id->setDbValue($rs->fields('chuyenmucphieu_id'));
		$tbl_phieucanhan->msv->setDbValue($rs->fields('msv'));
                $tbl_phieucanhan->ngaysinh->setDbValue($rs->fields('ngaysinh'));
		$tbl_phieucanhan->e_mail->setDbValue($rs->fields('e_mail'));
		$tbl_phieucanhan->hoten->setDbValue($rs->fields('hoten'));
		$tbl_phieucanhan->nganh_hoc->setDbValue($rs->fields('nganh_hoc'));
		$tbl_phieucanhan->lop->setDbValue($rs->fields('lop'));
		$tbl_phieucanhan->khoa_hoc->setDbValue($rs->fields('khoa_hoc'));
		$tbl_phieucanhan->he_daotao->setDbValue($rs->fields('he_daotao'));
		$tbl_phieucanhan->tinh_trang->setDbValue($rs->fields('tinh_trang'));
		$tbl_phieucanhan->chungminh_nhandan->setDbValue($rs->fields('chungminh_nhandan'));
		$tbl_phieucanhan->ngaycap_chungminh->setDbValue($rs->fields('ngaycap_chungminh'));
		$tbl_phieucanhan->hokhau_tt->setDbValue($rs->fields('hokhau_tt'));
		$tbl_phieucanhan->noi_cap->setDbValue($rs->fields('noi_cap'));
		$tbl_phieucanhan->dan_toc->setDbValue($rs->fields('dan_toc'));
		$tbl_phieucanhan->ton_giao->setDbValue($rs->fields('ton_giao'));
		$tbl_phieucanhan->capbac_chucvu_dang->setDbValue($rs->fields('capbac_chucvu_dang'));
		$tbl_phieucanhan->htlt_odau->setDbValue($rs->fields('htlt_odau'));
		$tbl_phieucanhan->ngayvaodang->setDbValue($rs->fields('ngayvaodang'));
		$tbl_phieucanhan->nangkhieucanhan->setDbValue($rs->fields('nangkhieucanhan'));
		$tbl_phieucanhan->dtdc_khicanlh->setDbValue($rs->fields('dtdc_khicanlh'));
		$tbl_phieucanhan->hoten_bo->setDbValue($rs->fields('hoten_bo'));
		$tbl_phieucanhan->namsinh_bo->setDbValue($rs->fields('namsinh_bo'));
		$tbl_phieucanhan->dt_bo->setDbValue($rs->fields('dt_bo'));
		$tbl_phieucanhan->hoten_me->setDbValue($rs->fields('hoten_me'));
		$tbl_phieucanhan->namsinh_me->setDbValue($rs->fields('namsinh_me'));
		$tbl_phieucanhan->dt_me->setDbValue($rs->fields('dt_me'));
		$tbl_phieucanhan->gdchinhsach->setDbValue($rs->fields('gdchinhsach'));
		$tbl_phieucanhan->chucvu_bo->setDbValue($rs->fields('chucvu_bo'));
		$tbl_phieucanhan->chucvu_me->setDbValue($rs->fields('chucvu_me'));
		$tbl_phieucanhan->sdt_lienhegd->setDbValue($rs->fields('sdt_lienhegd'));
		$tbl_phieucanhan->datetime_add->setDbValue($rs->fields('datetime_add'));
		$tbl_phieucanhan->datetime_edit->setDbValue($rs->fields('datetime_edit'));
		$tbl_phieucanhan->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_phieucanhan;

		// Call Row_Rendering event
		$tbl_phieucanhan->Row_Rendering();

		// Common render codes for all row types
		// phieucanhan_id

		$tbl_phieucanhan->phieucanhan_id->CellCssStyle = "";
		$tbl_phieucanhan->phieucanhan_id->CellCssClass = "";

		// chuyenmucphieu_id
		$tbl_phieucanhan->chuyenmucphieu_id->CellCssStyle = "";
		$tbl_phieucanhan->chuyenmucphieu_id->CellCssClass = "";

		// msv
		$tbl_phieucanhan->msv->CellCssStyle = "";
		$tbl_phieucanhan->msv->CellCssClass = "";

		// e_mail
		$tbl_phieucanhan->e_mail->CellCssStyle = "";
		$tbl_phieucanhan->e_mail->CellCssClass = "";

		// hoten
		$tbl_phieucanhan->hoten->CellCssStyle = "";
		$tbl_phieucanhan->hoten->CellCssClass = "";

		// nganh_hoc
		$tbl_phieucanhan->nganh_hoc->CellCssStyle = "";
		$tbl_phieucanhan->nganh_hoc->CellCssClass = "";

		// lop
		$tbl_phieucanhan->lop->CellCssStyle = "";
		$tbl_phieucanhan->lop->CellCssClass = "";

		// khoa_hoc
		$tbl_phieucanhan->khoa_hoc->CellCssStyle = "";
		$tbl_phieucanhan->khoa_hoc->CellCssClass = "";

		// he_daotao
		$tbl_phieucanhan->he_daotao->CellCssStyle = "";
		$tbl_phieucanhan->he_daotao->CellCssClass = "";

		// tinh_trang
		$tbl_phieucanhan->tinh_trang->CellCssStyle = "";
		$tbl_phieucanhan->tinh_trang->CellCssClass = "";

		// chungminh_nhandan
		$tbl_phieucanhan->chungminh_nhandan->CellCssStyle = "";
		$tbl_phieucanhan->chungminh_nhandan->CellCssClass = "";

		// ngaycap_chungminh
		$tbl_phieucanhan->ngaycap_chungminh->CellCssStyle = "";
		$tbl_phieucanhan->ngaycap_chungminh->CellCssClass = "";

		// hokhau_tt
		$tbl_phieucanhan->hokhau_tt->CellCssStyle = "";
		$tbl_phieucanhan->hokhau_tt->CellCssClass = "";

		// noi_cap
		$tbl_phieucanhan->noi_cap->CellCssStyle = "";
		$tbl_phieucanhan->noi_cap->CellCssClass = "";

		// dan_toc
		$tbl_phieucanhan->dan_toc->CellCssStyle = "";
		$tbl_phieucanhan->dan_toc->CellCssClass = "";

		// ton_giao
		$tbl_phieucanhan->ton_giao->CellCssStyle = "";
		$tbl_phieucanhan->ton_giao->CellCssClass = "";

		// capbac_chucvu_dang
		$tbl_phieucanhan->capbac_chucvu_dang->CellCssStyle = "";
		$tbl_phieucanhan->capbac_chucvu_dang->CellCssClass = "";

		// htlt_odau
		$tbl_phieucanhan->htlt_odau->CellCssStyle = "";
		$tbl_phieucanhan->htlt_odau->CellCssClass = "";

		// ngayvaodang
		$tbl_phieucanhan->ngayvaodang->CellCssStyle = "";
		$tbl_phieucanhan->ngayvaodang->CellCssClass = "";

		// nangkhieucanhan
		$tbl_phieucanhan->nangkhieucanhan->CellCssStyle = "";
		$tbl_phieucanhan->nangkhieucanhan->CellCssClass = "";

		// dtdc_khicanlh
		$tbl_phieucanhan->dtdc_khicanlh->CellCssStyle = "";
		$tbl_phieucanhan->dtdc_khicanlh->CellCssClass = "";

		// hoten_bo
		$tbl_phieucanhan->hoten_bo->CellCssStyle = "";
		$tbl_phieucanhan->hoten_bo->CellCssClass = "";

		// namsinh_bo
		$tbl_phieucanhan->namsinh_bo->CellCssStyle = "";
		$tbl_phieucanhan->namsinh_bo->CellCssClass = "";

		// dt_bo
		$tbl_phieucanhan->dt_bo->CellCssStyle = "";
		$tbl_phieucanhan->dt_bo->CellCssClass = "";

		// hoten_me
		$tbl_phieucanhan->hoten_me->CellCssStyle = "";
		$tbl_phieucanhan->hoten_me->CellCssClass = "";

		// namsinh_me
		$tbl_phieucanhan->namsinh_me->CellCssStyle = "";
		$tbl_phieucanhan->namsinh_me->CellCssClass = "";

		// dt_me
		$tbl_phieucanhan->dt_me->CellCssStyle = "";
		$tbl_phieucanhan->dt_me->CellCssClass = "";

		// gdchinhsach
		$tbl_phieucanhan->gdchinhsach->CellCssStyle = "";
		$tbl_phieucanhan->gdchinhsach->CellCssClass = "";

		// chucvu_bo
		$tbl_phieucanhan->chucvu_bo->CellCssStyle = "";
		$tbl_phieucanhan->chucvu_bo->CellCssClass = "";

		// chucvu_me
		$tbl_phieucanhan->chucvu_me->CellCssStyle = "";
		$tbl_phieucanhan->chucvu_me->CellCssClass = "";

		// sdt_lienhegd
		$tbl_phieucanhan->sdt_lienhegd->CellCssStyle = "";
		$tbl_phieucanhan->sdt_lienhegd->CellCssClass = "";

		// datetime_add
		$tbl_phieucanhan->datetime_add->CellCssStyle = "";
		$tbl_phieucanhan->datetime_add->CellCssClass = "";

		// datetime_edit
		$tbl_phieucanhan->datetime_edit->CellCssStyle = "";
		$tbl_phieucanhan->datetime_edit->CellCssClass = "";

		// active
		$tbl_phieucanhan->active->CellCssStyle = "";
		$tbl_phieucanhan->active->CellCssClass = "";
		if ($tbl_phieucanhan->RowType == EW_ROWTYPE_VIEW) { // View row

			// phieucanhan_id
			$tbl_phieucanhan->phieucanhan_id->ViewValue = $tbl_phieucanhan->phieucanhan_id->CurrentValue;
			$tbl_phieucanhan->phieucanhan_id->CssStyle = "";
			$tbl_phieucanhan->phieucanhan_id->CssClass = "";
			$tbl_phieucanhan->phieucanhan_id->ViewCustomAttributes = "";

			// chuyenmucphieu_id
			$tbl_phieucanhan->chuyenmucphieu_id->ViewValue = $tbl_phieucanhan->chuyenmucphieu_id->CurrentValue;
			$tbl_phieucanhan->chuyenmucphieu_id->CssStyle = "";
			$tbl_phieucanhan->chuyenmucphieu_id->CssClass = "";
			$tbl_phieucanhan->chuyenmucphieu_id->ViewCustomAttributes = "";

			// msv
			$tbl_phieucanhan->msv->ViewValue = $tbl_phieucanhan->msv->CurrentValue;
			$tbl_phieucanhan->msv->CssStyle = "";
			$tbl_phieucanhan->msv->CssClass = "";
			$tbl_phieucanhan->msv->ViewCustomAttributes = "";

			// e_mail
			$tbl_phieucanhan->e_mail->ViewValue = $tbl_phieucanhan->e_mail->CurrentValue;
			$tbl_phieucanhan->e_mail->CssStyle = "";
			$tbl_phieucanhan->e_mail->CssClass = "";
			$tbl_phieucanhan->e_mail->ViewCustomAttributes = "";

			// hoten
			$tbl_phieucanhan->hoten->ViewValue = $tbl_phieucanhan->hoten->CurrentValue;
			$tbl_phieucanhan->hoten->CssStyle = "";
			$tbl_phieucanhan->hoten->CssClass = "";
			$tbl_phieucanhan->hoten->ViewCustomAttributes = "";

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->ViewValue = $tbl_phieucanhan->nganh_hoc->CurrentValue;
			$tbl_phieucanhan->nganh_hoc->CssStyle = "";
			$tbl_phieucanhan->nganh_hoc->CssClass = "";
			$tbl_phieucanhan->nganh_hoc->ViewCustomAttributes = "";

			// lop
			$tbl_phieucanhan->lop->ViewValue = $tbl_phieucanhan->lop->CurrentValue;
			$tbl_phieucanhan->lop->CssStyle = "";
			$tbl_phieucanhan->lop->CssClass = "";
			$tbl_phieucanhan->lop->ViewCustomAttributes = "";

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->ViewValue = $tbl_phieucanhan->khoa_hoc->CurrentValue;
			$tbl_phieucanhan->khoa_hoc->CssStyle = "";
			$tbl_phieucanhan->khoa_hoc->CssClass = "";
			$tbl_phieucanhan->khoa_hoc->ViewCustomAttributes = "";

			// he_daotao
			$tbl_phieucanhan->he_daotao->ViewValue = $tbl_phieucanhan->he_daotao->CurrentValue;
			$tbl_phieucanhan->he_daotao->CssStyle = "";
			$tbl_phieucanhan->he_daotao->CssClass = "";
			$tbl_phieucanhan->he_daotao->ViewCustomAttributes = "";

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->ViewValue = $tbl_phieucanhan->tinh_trang->CurrentValue;
			$tbl_phieucanhan->tinh_trang->CssStyle = "";
			$tbl_phieucanhan->tinh_trang->CssClass = "";
			$tbl_phieucanhan->tinh_trang->ViewCustomAttributes = "";

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->ViewValue = $tbl_phieucanhan->chungminh_nhandan->CurrentValue;
			$tbl_phieucanhan->chungminh_nhandan->CssStyle = "";
			$tbl_phieucanhan->chungminh_nhandan->CssClass = "";
			$tbl_phieucanhan->chungminh_nhandan->ViewCustomAttributes = "";

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->ViewValue = $tbl_phieucanhan->ngaycap_chungminh->CurrentValue;
			$tbl_phieucanhan->ngaycap_chungminh->CssStyle = "";
			$tbl_phieucanhan->ngaycap_chungminh->CssClass = "";
			$tbl_phieucanhan->ngaycap_chungminh->ViewCustomAttributes = "";

			// hokhau_tt
			$tbl_phieucanhan->hokhau_tt->ViewValue = $tbl_phieucanhan->hokhau_tt->CurrentValue;
			$tbl_phieucanhan->hokhau_tt->CssStyle = "";
			$tbl_phieucanhan->hokhau_tt->CssClass = "";
			$tbl_phieucanhan->hokhau_tt->ViewCustomAttributes = "";

			// noi_cap
			$tbl_phieucanhan->noi_cap->ViewValue = $tbl_phieucanhan->noi_cap->CurrentValue;
			$tbl_phieucanhan->noi_cap->CssStyle = "";
			$tbl_phieucanhan->noi_cap->CssClass = "";
			$tbl_phieucanhan->noi_cap->ViewCustomAttributes = "";

			// dan_toc
			$tbl_phieucanhan->dan_toc->ViewValue = $tbl_phieucanhan->dan_toc->CurrentValue;
			$tbl_phieucanhan->dan_toc->CssStyle = "";
			$tbl_phieucanhan->dan_toc->CssClass = "";
			$tbl_phieucanhan->dan_toc->ViewCustomAttributes = "";

			// ton_giao
			$tbl_phieucanhan->ton_giao->ViewValue = $tbl_phieucanhan->ton_giao->CurrentValue;
			$tbl_phieucanhan->ton_giao->CssStyle = "";
			$tbl_phieucanhan->ton_giao->CssClass = "";
			$tbl_phieucanhan->ton_giao->ViewCustomAttributes = "";

			// capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->ViewValue = $tbl_phieucanhan->capbac_chucvu_dang->CurrentValue;
			$tbl_phieucanhan->capbac_chucvu_dang->CssStyle = "";
			$tbl_phieucanhan->capbac_chucvu_dang->CssClass = "";
			$tbl_phieucanhan->capbac_chucvu_dang->ViewCustomAttributes = "";

			// htlt_odau
			$tbl_phieucanhan->htlt_odau->ViewValue = $tbl_phieucanhan->htlt_odau->CurrentValue;
			$tbl_phieucanhan->htlt_odau->CssStyle = "";
			$tbl_phieucanhan->htlt_odau->CssClass = "";
			$tbl_phieucanhan->htlt_odau->ViewCustomAttributes = "";

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->ViewValue = $tbl_phieucanhan->ngayvaodang->CurrentValue;
			$tbl_phieucanhan->ngayvaodang->ViewValue = ew_FormatDateTime($tbl_phieucanhan->ngayvaodang->ViewValue, 7);
			$tbl_phieucanhan->ngayvaodang->CssStyle = "";
			$tbl_phieucanhan->ngayvaodang->CssClass = "";
			$tbl_phieucanhan->ngayvaodang->ViewCustomAttributes = "";

			// nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->ViewValue = $tbl_phieucanhan->nangkhieucanhan->CurrentValue;
			$tbl_phieucanhan->nangkhieucanhan->CssStyle = "";
			$tbl_phieucanhan->nangkhieucanhan->CssClass = "";
			$tbl_phieucanhan->nangkhieucanhan->ViewCustomAttributes = "";

			// dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->ViewValue = $tbl_phieucanhan->dtdc_khicanlh->CurrentValue;
			$tbl_phieucanhan->dtdc_khicanlh->CssStyle = "";
			$tbl_phieucanhan->dtdc_khicanlh->CssClass = "";
			$tbl_phieucanhan->dtdc_khicanlh->ViewCustomAttributes = "";

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->ViewValue = $tbl_phieucanhan->hoten_bo->CurrentValue;
			$tbl_phieucanhan->hoten_bo->CssStyle = "";
			$tbl_phieucanhan->hoten_bo->CssClass = "";
			$tbl_phieucanhan->hoten_bo->ViewCustomAttributes = "";

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->ViewValue = $tbl_phieucanhan->namsinh_bo->CurrentValue;
			$tbl_phieucanhan->namsinh_bo->CssStyle = "";
			$tbl_phieucanhan->namsinh_bo->CssClass = "";
			$tbl_phieucanhan->namsinh_bo->ViewCustomAttributes = "";

			// dt_bo
			$tbl_phieucanhan->dt_bo->ViewValue = $tbl_phieucanhan->dt_bo->CurrentValue;
			$tbl_phieucanhan->dt_bo->CssStyle = "";
			$tbl_phieucanhan->dt_bo->CssClass = "";
			$tbl_phieucanhan->dt_bo->ViewCustomAttributes = "";

			// hoten_me
			$tbl_phieucanhan->hoten_me->ViewValue = $tbl_phieucanhan->hoten_me->CurrentValue;
			$tbl_phieucanhan->hoten_me->CssStyle = "";
			$tbl_phieucanhan->hoten_me->CssClass = "";
			$tbl_phieucanhan->hoten_me->ViewCustomAttributes = "";

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->ViewValue = $tbl_phieucanhan->namsinh_me->CurrentValue;
			$tbl_phieucanhan->namsinh_me->CssStyle = "";
			$tbl_phieucanhan->namsinh_me->CssClass = "";
			$tbl_phieucanhan->namsinh_me->ViewCustomAttributes = "";

			// dt_me
			$tbl_phieucanhan->dt_me->ViewValue = $tbl_phieucanhan->dt_me->CurrentValue;
			$tbl_phieucanhan->dt_me->CssStyle = "";
			$tbl_phieucanhan->dt_me->CssClass = "";
			$tbl_phieucanhan->dt_me->ViewCustomAttributes = "";

			// gdchinhsach
			$tbl_phieucanhan->gdchinhsach->ViewValue = $tbl_phieucanhan->gdchinhsach->CurrentValue;
			$tbl_phieucanhan->gdchinhsach->CssStyle = "";
			$tbl_phieucanhan->gdchinhsach->CssClass = "";
			$tbl_phieucanhan->gdchinhsach->ViewCustomAttributes = "";

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->ViewValue = $tbl_phieucanhan->chucvu_bo->CurrentValue;
			$tbl_phieucanhan->chucvu_bo->CssStyle = "";
			$tbl_phieucanhan->chucvu_bo->CssClass = "";
			$tbl_phieucanhan->chucvu_bo->ViewCustomAttributes = "";

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->ViewValue = $tbl_phieucanhan->chucvu_me->CurrentValue;
			$tbl_phieucanhan->chucvu_me->CssStyle = "";
			$tbl_phieucanhan->chucvu_me->CssClass = "";
			$tbl_phieucanhan->chucvu_me->ViewCustomAttributes = "";

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->ViewValue = $tbl_phieucanhan->sdt_lienhegd->CurrentValue;
			$tbl_phieucanhan->sdt_lienhegd->CssStyle = "";
			$tbl_phieucanhan->sdt_lienhegd->CssClass = "";
			$tbl_phieucanhan->sdt_lienhegd->ViewCustomAttributes = "";

			// datetime_add
			$tbl_phieucanhan->datetime_add->ViewValue = $tbl_phieucanhan->datetime_add->CurrentValue;
			$tbl_phieucanhan->datetime_add->ViewValue = ew_FormatDateTime($tbl_phieucanhan->datetime_add->ViewValue, 7);
			$tbl_phieucanhan->datetime_add->CssStyle = "";
			$tbl_phieucanhan->datetime_add->CssClass = "";
			$tbl_phieucanhan->datetime_add->ViewCustomAttributes = "";

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->ViewValue = $tbl_phieucanhan->datetime_edit->CurrentValue;
			$tbl_phieucanhan->datetime_edit->ViewValue = ew_FormatDateTime($tbl_phieucanhan->datetime_edit->ViewValue, 7);
			$tbl_phieucanhan->datetime_edit->CssStyle = "";
			$tbl_phieucanhan->datetime_edit->CssClass = "";
			$tbl_phieucanhan->datetime_edit->ViewCustomAttributes = "";

			// active
			if (strval($tbl_phieucanhan->active->CurrentValue) <> "") {
				switch ($tbl_phieucanhan->active->CurrentValue) {
					case "0":
						$tbl_phieucanhan->active->ViewValue = "khong kich hoat";
						break;
					case "1":
						$tbl_phieucanhan->active->ViewValue = "kich hoat";
						break;
					default:
						$tbl_phieucanhan->active->ViewValue = $tbl_phieucanhan->active->CurrentValue;
				}
			} else {
				$tbl_phieucanhan->active->ViewValue = NULL;
			}
			$tbl_phieucanhan->active->CssStyle = "";
			$tbl_phieucanhan->active->CssClass = "";
			$tbl_phieucanhan->active->ViewCustomAttributes = "";

			// phieucanhan_id
			$tbl_phieucanhan->phieucanhan_id->HrefValue = "";

			// chuyenmucphieu_id
			$tbl_phieucanhan->chuyenmucphieu_id->HrefValue = "";

			// msv
			$tbl_phieucanhan->msv->HrefValue = "";

			// e_mail
			$tbl_phieucanhan->e_mail->HrefValue = "";

			// hoten
			$tbl_phieucanhan->hoten->HrefValue = "";

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->HrefValue = "";

			// lop
			$tbl_phieucanhan->lop->HrefValue = "";

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->HrefValue = "";

			// he_daotao
			$tbl_phieucanhan->he_daotao->HrefValue = "";

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->HrefValue = "";

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->HrefValue = "";

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->HrefValue = "";

			// hokhau_tt
			$tbl_phieucanhan->hokhau_tt->HrefValue = "";

			// noi_cap
			$tbl_phieucanhan->noi_cap->HrefValue = "";

			// dan_toc
			$tbl_phieucanhan->dan_toc->HrefValue = "";

			// ton_giao
			$tbl_phieucanhan->ton_giao->HrefValue = "";

			// capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->HrefValue = "";

			// htlt_odau
			$tbl_phieucanhan->htlt_odau->HrefValue = "";

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->HrefValue = "";

			// nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->HrefValue = "";

			// dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->HrefValue = "";

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->HrefValue = "";

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->HrefValue = "";

			// dt_bo
			$tbl_phieucanhan->dt_bo->HrefValue = "";

			// hoten_me
			$tbl_phieucanhan->hoten_me->HrefValue = "";

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->HrefValue = "";

			// dt_me
			$tbl_phieucanhan->dt_me->HrefValue = "";

			// gdchinhsach
			$tbl_phieucanhan->gdchinhsach->HrefValue = "";

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->HrefValue = "";

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->HrefValue = "";

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->HrefValue = "";

			// datetime_add
			$tbl_phieucanhan->datetime_add->HrefValue = "";

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->HrefValue = "";

			// active
			$tbl_phieucanhan->active->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_phieucanhan->Row_Rendered();
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
