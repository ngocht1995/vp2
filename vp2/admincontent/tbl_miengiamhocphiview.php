<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_miengiamhocphiinfo.php" ?>
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
$tbl_miengiamhocphi_view = new ctbl_miengiamhocphi_view();
$Page =& $tbl_miengiamhocphi_view;

// Page init processing
$tbl_miengiamhocphi_view->Page_Init();

// Page main processing
$tbl_miengiamhocphi_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_miengiamhocphi_view = new ew_Page("tbl_miengiamhocphi_view");

// page properties
tbl_miengiamhocphi_view.PageID = "view"; // page ID
var EW_PAGE_ID = tbl_miengiamhocphi_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_miengiamhocphi_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_miengiamhocphi_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_miengiamhocphi_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_miengiamhocphi_view.ValidateRequired = false; // no JavaScript validation
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

<?php $tbl_miengiamhocphi_view->ShowMessage() ?>
<p>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_miengiamhocphi_view->Pager)) $tbl_miengiamhocphi_view->Pager = new cNumericPager($tbl_miengiamhocphi_view->lStartRec, $tbl_miengiamhocphi_view->lDisplayRecs, $tbl_miengiamhocphi_view->lTotalRecs, $tbl_miengiamhocphi_view->lRecRange) ?>
<?php if ($tbl_miengiamhocphi_view->Pager->RecordCount > 0) { ?>
	
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_miengiamhocphi_view->sSrchWhere == "0=101") { ?>
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
<?php } 
?>
 
 <form id="form2" action="export2word.php" method="post" onsubmit='
     $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html());'>
<div id="ReportTable" class="ewGridMiddlePanel">
    <center>
    <style>
            
                table.tabledon {
                width:760px;
           
                }
                table.tabledon tr td{
                
                  padding-top: 8px;
                }
                div.divdong {
                 padding-top: 12px;
                }
                span.spantieude {
                background:white;
                padding-right: 10px;
                font-weight: bold;
                }
                span.spantieude2 {
                background:white;
                padding-right: 10px;
                font-weight: bold;
                }
                div.noidungtd {
                 background: url('../images/img_bgtdtdon.jpg') repeat-x;background-position:left bottom;
                }
            
        </style>       
        
    <table class="tabledon">
        <tr>
            <td>
                <center>
                    <font size="4" >  <b> CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </br>
                    <span style="text-decoration: underline"> Độc lập - Tự do - Hạnh phúc</span>
                     </b>
                    </font>
                </center>
            </td>
        </tr>
           <tr>
            <td>   
            </td>
        </tr>
         <tr>
            <td>
                <center>
                    <font size="5" > <b> ĐƠN ĐỂ NGHỊ CẤP TIỀN HỖ TRỢ MIỄM, GIẢM HỌC PHÍ</b>       </font>        
                </center>
            </td>
        </tr>
          <tr>
             <td>   
            </td>
        </tr>
         <tr>
            <td>
                <center>
                    <b>Kính giửi:</b> Phòng lao động - thương binh và xã hội:.........................................              
                </center>
            </td>
        </tr>
          <tr>
            <td>   
            </td>
        </tr>
         <tr> 
            <td>
                <div class="noidungtd"> <span class="spantieude"> Họ tên:  </span>  <?php echo $tbl_miengiamhocphi->hoten_sinhvien->ViewValue  ?></div>               
            </td>
        </tr>
        <tr>
            <td>
               <div class="noidungtd"> <span class="spantieude"> Ngày, tháng, năm sinh:  </span> <?php echo $tbl_miengiamhocphi->ngay_thang_nam->ViewValue  ?></div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="noidungtd"> <span class="spantieude"> Nơi sinh:  </span>  <?php echo $tbl_miengiamhocphi->noi_sinh->ViewValue  ?></div> 
            </td>
        </tr>
          <tr>
            <td>
                <div class="noidungtd"> <span class="spantieude"> Họ tên cha mẹ học sinh/sinh viên:  </span>  <?php echo $tbl_miengiamhocphi->hoten_chame->ViewValue  ?></div>  
            </td>
        </tr>
        <tr>
            <td>
                <div class="noidungtd">  <span class="spantieude"> Hộ khẩu thường trú:  </span> <?php echo $tbl_miengiamhocphi->hokhau->ViewValue  ?></div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="noidungtd"> <span class="spantieude"> Ngành học:  </span>  <?php echo $tbl_miengiamhocphi->nganhhoc->ViewValue  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <span class="spantieude2">Mã sinh viên:  </span> <?php echo $tbl_miengiamhocphi->msv->ViewValue  ?></div> 
            </td>
        </tr>
        <tr>
            <td>
                <div class="noidungtd"> <span class="spantieude"> Thuộc đối tượng:  </span>  <?php echo $tbl_miengiamhocphi->doituong->ViewValue  ?>  </div>
            </td>
        </tr>
        <tr>
            <td>
                 <div style="line-height: 22px;"> Căn cứ vào Nghị định số 49/2010/NĐ-CP ngày 14 tháng 5 năm 2010 của chính phủ, tôi làm đơn này đề nghị được xem xét, giải quyết để được cấp tiền hỗ trợ miễn giảm học phí theo quy định và chế độ hiện hành </div> 
            </td>
        </tr>
        <tr>
            <td align="right" style="padding-right: 30px;" > <b> Ngày tháng năm </b></td>
        </tr>
         <tr>
                 <td align="right" style="padding-right:40px;" > Người viết đơn</td>
        </tr>
        <tr>
            <td><hr /></td>  
        </tr>
        <tr>
            <td align="center"><font size="3" > <b>Xác nhận của cơ sở giáo dục nghề nghiệp và giáo dục đại học công lập</b></font></td>  
        </tr>
        <tr>
         <td><font size="3" ><b>Trường Đại Học Đân Lập Hải Phòng</b> </font></td> 
         </tr>
          <tr>
         <td><b>Xác nhận anh chị:</b> ......................................................................................................................................................</td> 
         </tr>
           <tr>
               <td><b>Hiện là học sinh năm thứ:</b>...................<b>Học kỳ</b> ...............<b>Năm học</b>.................<b>Lớp</b>........................................................</td> 
           </tr>
           <tr>
               <td><b>Khoa:</b>................................................<b>Khóa học</b> ................<b>Thời gian khóa  học</b>..........................<b>Năm </b>...........................<br/>
                   <b>hệ đào tạo chính quy.</b>
               </td> 
         </tr> 
          <tr>
               <td><b>Kỷ luật:</b>.........................................................................(Ghi rõ mức độ kỷ luật nếu có)
               </td> 
          </tr>
          <tr>
               <td><b>Số tiền đóng học phí hàng tháng:</b>....................................................................đồng.
               </td> 
          </tr>
           <tr>
               <td>
                   <div style="line-height: 22px;">
                <b>Đề nghị phòng lao động - thương binh và xã hội xem xét giải quyết tiền hỗ trợ miễn giảm </br>
                học phí cho anh/ chị:</b>.........................................................<b>Theo quy định và chế độ hiện hành</b>
                 </div>
               </td> 
          </tr>
         <tr>
         <td align="right" style="padding-right: 30px;"></td>
        </tr>
         <tr>
         <td align="right" style="padding-right: 30px;"> <b>Hải phòng, Ngày tháng năm </b></td>
        </tr>
        <tr>
         <td align="right" style="padding-right:60px;"> Thủ trưởng đơn vị</td>
        </tr>
    </table>     
    </center>
</div>
     <center>
      <input type="hidden" id="datatodisplay" name="datatodisplay">
      <input id="export_excel" type="submit" value="Export to World">
      <input id="export_excel" onclick="printform('ReportTable')" type="button" value="In ấn">
      </center>
</form>

       
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_miengiamhocphi_view->Pager)) $tbl_miengiamhocphi_view->Pager = new cNumericPager($tbl_miengiamhocphi_view->lStartRec, $tbl_miengiamhocphi_view->lDisplayRecs, $tbl_miengiamhocphi_view->lTotalRecs, $tbl_miengiamhocphi_view->lRecRange) ?>
<?php if ($tbl_miengiamhocphi_view->Pager->RecordCount > 0) { ?>

<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_miengiamhocphi_view->sSrchWhere == "0=101") { ?>
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
<p>
<?php if ($tbl_miengiamhocphi->Export == "") { ?>
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
class ctbl_miengiamhocphi_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'tbl_miengiamhocphi';

	// Page Object Name
	var $PageObjName = 'tbl_miengiamhocphi_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) $PageUrl .= "t=" . $tbl_miengiamhocphi->TableVar . "&"; // add page token
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
		global $objForm, $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_miengiamhocphi->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_miengiamhocphi->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_miengiamhocphi_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_miengiamhocphi"] = new ctbl_miengiamhocphi();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_miengiamhocphi', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_miengiamhocphi;
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
			$this->Page_Terminate("tbl_miengiamhocphilist.php");
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
		global $tbl_miengiamhocphi;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["don_tchthp_id"] <> "") {
				$tbl_miengiamhocphi->don_tchthp_id->setQueryStringValue($_GET["don_tchthp_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$tbl_miengiamhocphi->CurrentAction = "I"; // Display form
			switch ($tbl_miengiamhocphi->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("tbl_miengiamhocphilist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($tbl_miengiamhocphi->don_tchthp_id->CurrentValue) == strval($rs->fields('don_tchthp_id'))) {
								$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "tbl_miengiamhocphilist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "tbl_miengiamhocphilist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$tbl_miengiamhocphi->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_miengiamhocphi;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_miengiamhocphi->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_miengiamhocphi->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_miengiamhocphi;

		// Call Recordset Selecting event
		$tbl_miengiamhocphi->Recordset_Selecting($tbl_miengiamhocphi->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_miengiamhocphi->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_miengiamhocphi->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_miengiamhocphi;
		$sFilter = $tbl_miengiamhocphi->KeyFilter();

		// Call Row Selecting event
		$tbl_miengiamhocphi->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_miengiamhocphi->CurrentFilter = $sFilter;
		$sSql = $tbl_miengiamhocphi->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_miengiamhocphi->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->don_tchthp_id->setDbValue($rs->fields('don_tchthp_id'));
		$tbl_miengiamhocphi->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$tbl_miengiamhocphi->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$tbl_miengiamhocphi->msv->setDbValue($rs->fields('msv'));
		$tbl_miengiamhocphi->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$tbl_miengiamhocphi->ngay_thang_nam->setDbValue($rs->fields('ngay_thang_nam'));
                $tbl_miengiamhocphi->noi_sinh->setDbValue($rs->fields('noi_sinh'));
		$tbl_miengiamhocphi->hoten_chame->setDbValue($rs->fields('hoten_chame'));
		$tbl_miengiamhocphi->hokhau->setDbValue($rs->fields('hokhau'));
		$tbl_miengiamhocphi->nganhhoc->setDbValue($rs->fields('nganhhoc'));
		$tbl_miengiamhocphi->doituong->setDbValue($rs->fields('doituong'));
		$tbl_miengiamhocphi->datetime->setDbValue($rs->fields('datetime'));
		$tbl_miengiamhocphi->status->setDbValue($rs->fields('status'));
		$tbl_miengiamhocphi->active->setDbValue($rs->fields('active'));
		$tbl_miengiamhocphi->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_miengiamhocphi->datetime_add->setDbValue($rs->fields('datetime_add'));
		$tbl_miengiamhocphi->dateedit_edit->setDbValue($rs->fields('dateedit_edit'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_miengiamhocphi;

		// Call Row_Rendering event
		$tbl_miengiamhocphi->Row_Rendering();

		// Common render codes for all row types
		// don_tchthp_id

		$tbl_miengiamhocphi->don_tchthp_id->CellCssStyle = "";
		$tbl_miengiamhocphi->don_tchthp_id->CellCssClass = "";

		// loaidon_id
		$tbl_miengiamhocphi->loaidon_id->CellCssStyle = "";
		$tbl_miengiamhocphi->loaidon_id->CellCssClass = "";

		// nhomdon_id
		$tbl_miengiamhocphi->nhomdon_id->CellCssStyle = "";
		$tbl_miengiamhocphi->nhomdon_id->CellCssClass = "";

		// msv
		$tbl_miengiamhocphi->msv->CellCssStyle = "";
		$tbl_miengiamhocphi->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssStyle = "";
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssClass = "";

		// ngay_thang_nam
		$tbl_miengiamhocphi->ngay_thang_nam->CellCssStyle = "";
		$tbl_miengiamhocphi->ngay_thang_nam->CellCssClass = "";

		// hoten_chame
		$tbl_miengiamhocphi->hoten_chame->CellCssStyle = "";
		$tbl_miengiamhocphi->hoten_chame->CellCssClass = "";

		// hokhau
		$tbl_miengiamhocphi->hokhau->CellCssStyle = "";
		$tbl_miengiamhocphi->hokhau->CellCssClass = "";

		// nganhhoc
		$tbl_miengiamhocphi->nganhhoc->CellCssStyle = "";
		$tbl_miengiamhocphi->nganhhoc->CellCssClass = "";

		// doituong
		$tbl_miengiamhocphi->doituong->CellCssStyle = "";
		$tbl_miengiamhocphi->doituong->CellCssClass = "";

		// datetime
		$tbl_miengiamhocphi->datetime->CellCssStyle = "";
		$tbl_miengiamhocphi->datetime->CellCssClass = "";

		// status
		$tbl_miengiamhocphi->status->CellCssStyle = "";
		$tbl_miengiamhocphi->status->CellCssClass = "";

		// active
		$tbl_miengiamhocphi->active->CellCssStyle = "";
		$tbl_miengiamhocphi->active->CellCssClass = "";

		// nguoidung_id
		$tbl_miengiamhocphi->nguoidung_id->CellCssStyle = "";
		$tbl_miengiamhocphi->nguoidung_id->CellCssClass = "";

		// datetime_add
		$tbl_miengiamhocphi->datetime_add->CellCssStyle = "";
		$tbl_miengiamhocphi->datetime_add->CellCssClass = "";

		// dateedit_edit
		$tbl_miengiamhocphi->dateedit_edit->CellCssStyle = "";
		$tbl_miengiamhocphi->dateedit_edit->CellCssClass = "";
		if ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_VIEW) { // View row

			// don_tchthp_id
			$tbl_miengiamhocphi->don_tchthp_id->ViewValue = $tbl_miengiamhocphi->don_tchthp_id->CurrentValue;
			$tbl_miengiamhocphi->don_tchthp_id->CssStyle = "";
			$tbl_miengiamhocphi->don_tchthp_id->CssClass = "";
			$tbl_miengiamhocphi->don_tchthp_id->ViewCustomAttributes = "";
                        
                        
                        $tbl_miengiamhocphi->noi_sinh->ViewValue = $tbl_miengiamhocphi->noi_sinh->CurrentValue;
			$tbl_miengiamhocphi->noi_sinh->CssStyle = "";
			$tbl_miengiamhocphi->noi_sinh->CssClass = "";
			$tbl_miengiamhocphi->noi_sinh->ViewCustomAttributes = "";
                        
                        

			// loaidon_id
			if (strval($tbl_miengiamhocphi->loaidon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->loaidon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "Không chờ xử lý";
						break;
					case "1":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "Sử lý";
						break;
					default:
						$tbl_miengiamhocphi->loaidon_id->ViewValue = $tbl_miengiamhocphi->loaidon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->loaidon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->loaidon_id->CssStyle = "";
			$tbl_miengiamhocphi->loaidon_id->CssClass = "";
			$tbl_miengiamhocphi->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			if (strval($tbl_miengiamhocphi->nhomdon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->nhomdon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp1";
						break;
					case "1":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp2";
						break;
					case "2":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp3";
						break;
					default:
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = $tbl_miengiamhocphi->nhomdon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->nhomdon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->nhomdon_id->CssStyle = "";
			$tbl_miengiamhocphi->nhomdon_id->CssClass = "";
			$tbl_miengiamhocphi->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_miengiamhocphi->msv->ViewValue = $tbl_miengiamhocphi->msv->CurrentValue;
			$tbl_miengiamhocphi->msv->CssStyle = "";
			$tbl_miengiamhocphi->msv->CssClass = "";
			$tbl_miengiamhocphi->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->ViewValue = $tbl_miengiamhocphi->hoten_sinhvien->CurrentValue;
			$tbl_miengiamhocphi->hoten_sinhvien->CssStyle = "";
			$tbl_miengiamhocphi->hoten_sinhvien->CssClass = "";
			$tbl_miengiamhocphi->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->ViewValue = $tbl_miengiamhocphi->ngay_thang_nam->CurrentValue;
			$tbl_miengiamhocphi->ngay_thang_nam->CssStyle = "";
			$tbl_miengiamhocphi->ngay_thang_nam->CssClass = "";
			$tbl_miengiamhocphi->ngay_thang_nam->ViewCustomAttributes = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->ViewValue = $tbl_miengiamhocphi->hoten_chame->CurrentValue;
			$tbl_miengiamhocphi->hoten_chame->CssStyle = "";
			$tbl_miengiamhocphi->hoten_chame->CssClass = "";
			$tbl_miengiamhocphi->hoten_chame->ViewCustomAttributes = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->ViewValue = $tbl_miengiamhocphi->hokhau->CurrentValue;
			$tbl_miengiamhocphi->hokhau->CssStyle = "";
			$tbl_miengiamhocphi->hokhau->CssClass = "";
			$tbl_miengiamhocphi->hokhau->ViewCustomAttributes = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->ViewValue = $tbl_miengiamhocphi->nganhhoc->CurrentValue;
			$tbl_miengiamhocphi->nganhhoc->CssStyle = "";
			$tbl_miengiamhocphi->nganhhoc->CssClass = "";
			$tbl_miengiamhocphi->nganhhoc->ViewCustomAttributes = "";

			// doituong
			$tbl_miengiamhocphi->doituong->ViewValue = $tbl_miengiamhocphi->doituong->CurrentValue;
			$tbl_miengiamhocphi->doituong->CssStyle = "";
			$tbl_miengiamhocphi->doituong->CssClass = "";
			$tbl_miengiamhocphi->doituong->ViewCustomAttributes = "";

			// datetime
			$tbl_miengiamhocphi->datetime->ViewValue = $tbl_miengiamhocphi->datetime->CurrentValue;
			$tbl_miengiamhocphi->datetime->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime->ViewValue, 7);
			$tbl_miengiamhocphi->datetime->CssStyle = "";
			$tbl_miengiamhocphi->datetime->CssClass = "";
			$tbl_miengiamhocphi->datetime->ViewCustomAttributes = "";

			// status
			if (strval($tbl_miengiamhocphi->status->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->status->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->status->ViewValue = "Khong xet duyet";
						break;
					case "1":
						$tbl_miengiamhocphi->status->ViewValue = "Cho xet duyet";
						break;
					case "2":
						$tbl_miengiamhocphi->status->ViewValue = "dang xu ly";
						break;
					case "3 ":
						$tbl_miengiamhocphi->status->ViewValue = "Ket thuc";
						break;
					default:
						$tbl_miengiamhocphi->status->ViewValue = $tbl_miengiamhocphi->status->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->status->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->status->CssStyle = "";
			$tbl_miengiamhocphi->status->CssClass = "";
			$tbl_miengiamhocphi->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_miengiamhocphi->active->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->active->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->active->ViewValue = "Chua xac nhan";
						break;
					case "1":
						$tbl_miengiamhocphi->active->ViewValue = "Xac nhan";
						break;
					case "":
						$tbl_miengiamhocphi->active->ViewValue = "";
						break;
					default:
						$tbl_miengiamhocphi->active->ViewValue = $tbl_miengiamhocphi->active->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->active->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->active->CssStyle = "";
			$tbl_miengiamhocphi->active->CssClass = "";
			$tbl_miengiamhocphi->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_miengiamhocphi->nguoidung_id->ViewValue = $tbl_miengiamhocphi->nguoidung_id->CurrentValue;
			$tbl_miengiamhocphi->nguoidung_id->CssStyle = "";
			$tbl_miengiamhocphi->nguoidung_id->CssClass = "";
			$tbl_miengiamhocphi->nguoidung_id->ViewCustomAttributes = "";

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->ViewValue = $tbl_miengiamhocphi->datetime_add->CurrentValue;
			$tbl_miengiamhocphi->datetime_add->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime_add->ViewValue, 7);
			$tbl_miengiamhocphi->datetime_add->CssStyle = "";
			$tbl_miengiamhocphi->datetime_add->CssClass = "";
			$tbl_miengiamhocphi->datetime_add->ViewCustomAttributes = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = $tbl_miengiamhocphi->dateedit_edit->CurrentValue;
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->dateedit_edit->ViewValue, 7);
			$tbl_miengiamhocphi->dateedit_edit->CssStyle = "";
			$tbl_miengiamhocphi->dateedit_edit->CssClass = "";
			$tbl_miengiamhocphi->dateedit_edit->ViewCustomAttributes = "";

			// don_tchthp_id
			$tbl_miengiamhocphi->don_tchthp_id->HrefValue = "";

			// loaidon_id
			$tbl_miengiamhocphi->loaidon_id->HrefValue = "";

			// nhomdon_id
			$tbl_miengiamhocphi->nhomdon_id->HrefValue = "";

			// msv
			$tbl_miengiamhocphi->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->HrefValue = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->HrefValue = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->HrefValue = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->HrefValue = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->HrefValue = "";

			// doituong
			$tbl_miengiamhocphi->doituong->HrefValue = "";

			// datetime
			$tbl_miengiamhocphi->datetime->HrefValue = "";

			// status
			$tbl_miengiamhocphi->status->HrefValue = "";

			// active
			$tbl_miengiamhocphi->active->HrefValue = "";

			// nguoidung_id
			$tbl_miengiamhocphi->nguoidung_id->HrefValue = "";

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->HrefValue = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_miengiamhocphi->Row_Rendered();
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
