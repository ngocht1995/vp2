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
$tbl_phieucanhan_edit = new ctbl_phieucanhan_edit();
$Page =& $tbl_phieucanhan_edit;

// Page init processing
$tbl_phieucanhan_edit->Page_Init();

// Page main processing
$tbl_phieucanhan_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_phieucanhan_edit = new ew_Page("tbl_phieucanhan_edit");

// page properties
tbl_phieucanhan_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = tbl_phieucanhan_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_phieucanhan_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_e_mail"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - E Mail");
		elm = fobj.elements["x" + infix + "_e_mail"];
		if (elm && !ew_CheckEmail(elm.value))
			return ew_OnError(this, elm, "Incorrect email - E Mail");
		elm = fobj.elements["x" + infix + "_hokhau_tt"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Nhập hộ khẩu thường chú");
		elm = fobj.elements["x" + infix + "_ngayvaodang"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Định dạng ngày tháng = dd/mm/yyyy - Ngayvaodang");
		elm = fobj.elements["x" + infix + "_dtdc_khicanlh"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Dtdc Khicanlh");
		elm = fobj.elements["x" + infix + "_hoten_bo"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Nhập họ tên bố");
		elm = fobj.elements["x" + infix + "_namsinh_bo"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Năm sinh phải là số");
		elm = fobj.elements["x" + infix + "_hoten_me"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Nhập họ tên mẹ");
		elm = fobj.elements["x" + infix + "_namsinh_me"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Năm sinh mẹ phải là số");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
tbl_phieucanhan_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_phieucanhan_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_phieucanhan_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_phieucanhan_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker">Edit TABLE: Tbl Phieucanhan<br><br>
<a href="<?php echo $tbl_phieucanhan->getReturnUrl() ?>">Go Back</a></span></p>
<?php $tbl_phieucanhan_edit->ShowMessage() ?>
<form name="ftbl_phieucanhanedit" id="ftbl_phieucanhanedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return tbl_phieucanhan_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_phieucanhan">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($tbl_phieucanhan->e_mail->Visible) { // e_mail ?>
	<tr<?php echo $tbl_phieucanhan->e_mail->RowAttributes ?>>
		<td class="ewTableHeader">E Mail<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_phieucanhan->e_mail->CellAttributes() ?>><span id="el_e_mail">
<input type="text" name="x_e_mail" id="x_e_mail" size="30" maxlength="200" value="<?php echo $tbl_phieucanhan->e_mail->EditValue ?>"<?php echo $tbl_phieucanhan->e_mail->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->e_mail->CustomMsg ?>
                    <input hidden="true" type="text" name="x_msv" id="x_msv" size="30" maxlength="20" value="<?php echo $_SESSION['arraythongtin']['MaSinhVien'] ?>"<?php echo $tbl_phieucanhan->msv->EditAttributes() ?>>            
                </td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->chungminh_nhandan->Visible) { // chungminh_nhandan ?>
	<tr<?php echo $tbl_phieucanhan->chungminh_nhandan->RowAttributes ?>>
		<td class="ewTableHeader">Chứng minh nhân dân</td>
		<td <?php echo $tbl_phieucanhan->chungminh_nhandan->CellAttributes() ?>><span id="el_chungminh_nhandan">
<input type="text" name="x_chungminh_nhandan" id="x_chungminh_nhandan" size="25" maxlength="20" value="<?php echo $tbl_phieucanhan->chungminh_nhandan->EditValue ?>"<?php echo $tbl_phieucanhan->chungminh_nhandan->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->chungminh_nhandan->CustomMsg ?>
                    <b>Ngày cấp CMND</b>             
  <input type="text" name="x_ngaycap_chungminh" id="x_ngaycap_chungminh" size="25" maxlength="20" value="<?php echo $tbl_phieucanhan->ngaycap_chungminh->EditValue ?>"<?php echo $tbl_phieucanhan->ngaycap_chungminh->EditAttributes() ?>>              
                    <b>Nơi cấp</b>  
                <input type="text" name="x_noi_cap" id="x_noi_cap" size="70" maxlength="200" value="<?php echo $tbl_phieucanhan->noi_cap->EditValue ?>"<?php echo $tbl_phieucanhan->noi_cap->EditAttributes() ?>>
                </td>
	</tr>
<?php } ?>
       
<?php if ($tbl_phieucanhan->hokhau_tt->Visible) { // hokhau_tt ?>
	<tr<?php echo $tbl_phieucanhan->hokhau_tt->RowAttributes ?>>
		<td class="ewTableHeader">Hộ khẩu thường chú<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_phieucanhan->hokhau_tt->CellAttributes() ?>><span id="el_hokhau_tt">
<textarea name="x_hokhau_tt" id="x_hokhau_tt" cols="77" rows="2"<?php echo $tbl_phieucanhan->hokhau_tt->EditAttributes() ?>><?php echo $tbl_phieucanhan->hokhau_tt->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->hokhau_tt->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->htlt_odau->Visible) { // htlt_odau ?>
	<tr<?php echo $tbl_phieucanhan->htlt_odau->RowAttributes ?>>
		<td class="ewTableHeader">Chỗ ở hiện tại</td>
		<td<?php echo $tbl_phieucanhan->htlt_odau->CellAttributes() ?>><span id="el_htlt_odau">
<textarea name="x_htlt_odau" id="x_htlt_odau" cols="77" rows="2"<?php echo $tbl_phieucanhan->htlt_odau->EditAttributes() ?>><?php echo $tbl_phieucanhan->htlt_odau->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->htlt_odau->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->dtdc_khicanlh->Visible) { // dtdc_khicanlh ?>
	<tr<?php echo $tbl_phieucanhan->dtdc_khicanlh->RowAttributes ?>>
		<td class="ewTableHeader">Điện thoại liên hệ khi cần<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_phieucanhan->dtdc_khicanlh->CellAttributes() ?>><span id="el_dtdc_khicanlh">
<textarea name="x_dtdc_khicanlh" id="x_dtdc_khicanlh" cols="77" rows="2"<?php echo $tbl_phieucanhan->dtdc_khicanlh->EditAttributes() ?>><?php echo $tbl_phieucanhan->dtdc_khicanlh->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->dtdc_khicanlh->CustomMsg ?></td>
	</tr>
<?php } ?>       
<?php if ($tbl_phieucanhan->dan_toc->Visible) { // dan_toc ?>
	<tr<?php echo $tbl_phieucanhan->dan_toc->RowAttributes ?>>
		<td class="ewTableHeader">Dân tộc</td>
		<td<?php echo $tbl_phieucanhan->dan_toc->CellAttributes() ?>><span id="el_dan_toc">
<input type="text" name="x_dan_toc" id="x_dan_toc" size="30" maxlength="20" value="<?php echo $tbl_phieucanhan->dan_toc->EditValue ?>"<?php echo $tbl_phieucanhan->dan_toc->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->dan_toc->CustomMsg ?>
      <b>Tôn giáo</b>            
      <input type="text" name="x_ton_giao" id="x_ton_giao" size="30" maxlength="20" value="<?php echo $tbl_phieucanhan->ton_giao->EditValue ?>"<?php echo $tbl_phieucanhan->ton_giao->EditAttributes() ?>>          
                </td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->capbac_chucvu_dang->Visible) { // capbac_chucvu_dang ?>
	<tr<?php echo $tbl_phieucanhan->capbac_chucvu_dang->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc chức vụ Đảng</td>
		<td<?php echo $tbl_phieucanhan->capbac_chucvu_dang->CellAttributes() ?>><span id="el_capbac_chucvu_dang">
<textarea name="x_capbac_chucvu_dang" id="x_capbac_chucvu_dang" cols="77" rows="2"<?php echo $tbl_phieucanhan->capbac_chucvu_dang->EditAttributes() ?>><?php echo $tbl_phieucanhan->capbac_chucvu_dang->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->capbac_chucvu_dang->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($tbl_phieucanhan->ngayvaodang->Visible) { // ngayvaodang ?>
	<tr<?php echo $tbl_phieucanhan->ngayvaodang->RowAttributes ?>>
		<td class="ewTableHeader">Ngày vào đảng</td>
		<td<?php echo $tbl_phieucanhan->ngayvaodang->CellAttributes() ?>><span id="el_ngayvaodang">
<input type="text" name="x_ngayvaodang" id="x_ngayvaodang" value="<?php echo $tbl_phieucanhan->ngayvaodang->EditValue ?>"<?php echo $tbl_phieucanhan->ngayvaodang->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_ngayvaodang" name="cal_x_ngayvaodang" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_ngayvaodang", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_ngayvaodang" // ID of the button
});
</script>
</span><?php echo $tbl_phieucanhan->ngayvaodang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->nangkhieucanhan->Visible) { // nangkhieucanhan ?>
	<tr<?php echo $tbl_phieucanhan->nangkhieucanhan->RowAttributes ?>>
		<td class="ewTableHeader">Năng khiếu cá nhân</td>
		<td<?php echo $tbl_phieucanhan->nangkhieucanhan->CellAttributes() ?>><span id="el_nangkhieucanhan">
<textarea name="x_nangkhieucanhan" id="x_nangkhieucanhan" cols="77" rows="1"<?php echo $tbl_phieucanhan->nangkhieucanhan->EditAttributes() ?>><?php echo $tbl_phieucanhan->nangkhieucanhan->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->nangkhieucanhan->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($tbl_phieucanhan->hoten_bo->Visible) { // hoten_bo ?>
	<tr<?php echo $tbl_phieucanhan->hoten_bo->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên bố<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_phieucanhan->hoten_bo->CellAttributes() ?>><span id="el_hoten_bo">
<input type="text" name="x_hoten_bo" id="x_hoten_bo" size="30" maxlength="50" value="<?php echo $tbl_phieucanhan->hoten_bo->EditValue ?>"<?php echo $tbl_phieucanhan->hoten_bo->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->hoten_bo->CustomMsg ?>
                    <b> Họ tên mẹ &nbsp;&nbsp;&nbsp;&nbsp;</b>           
 <input type="text" name="x_hoten_me" id="x_hoten_me" size="30" maxlength="50" value="<?php echo $tbl_phieucanhan->hoten_me->EditValue ?>"<?php echo $tbl_phieucanhan->hoten_me->EditAttributes() ?>>          
                </td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->namsinh_bo->Visible) { // namsinh_bo ?>
	<tr<?php echo $tbl_phieucanhan->namsinh_bo->RowAttributes ?>>
		<td class="ewTableHeader">Năm sinh bố</td>
		<td<?php echo $tbl_phieucanhan->namsinh_bo->CellAttributes() ?>><span id="el_namsinh_bo">
<input type="text" name="x_namsinh_bo" id="x_namsinh_bo" size="30" value="<?php echo $tbl_phieucanhan->namsinh_bo->EditValue ?>"<?php echo $tbl_phieucanhan->namsinh_bo->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->namsinh_bo->CustomMsg ?>
                    <b> Năm sinh mẹ</b>
 <input type="text" name="x_namsinh_me" id="x_namsinh_me" size="30" value="<?php echo $tbl_phieucanhan->namsinh_me->EditValue ?>"<?php echo $tbl_phieucanhan->namsinh_me->EditAttributes() ?>>           
                </td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->dt_bo->Visible) { // dt_bo ?>
	<tr<?php echo $tbl_phieucanhan->dt_bo->RowAttributes ?>>
		<td class="ewTableHeader">Điện thoại bố</td>
		<td<?php echo $tbl_phieucanhan->dt_bo->CellAttributes() ?>><span id="el_dt_bo">
<input type="text" name="x_dt_bo" id="x_dt_bo" size="30" maxlength="15" value="<?php echo $tbl_phieucanhan->dt_bo->EditValue ?>"<?php echo $tbl_phieucanhan->dt_bo->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->dt_bo->CustomMsg ?>
                    <b>Điện thoại mẹ</b>         
      <input type="text" name="x_dt_me" id="x_dt_me" size="30" maxlength="15" value="<?php echo $tbl_phieucanhan->dt_me->EditValue ?>"<?php echo $tbl_phieucanhan->dt_me->EditAttributes() ?>>          
                </td>
	</tr>
<?php } ?>


<?php if ($tbl_phieucanhan->chucvu_bo->Visible) { // chucvu_bo ?>
	<tr<?php echo $tbl_phieucanhan->chucvu_bo->RowAttributes ?>>
		<td class="ewTableHeader">Nghề nghiệp bố</td>
                <td  ALIGN="top"  <?php echo $tbl_phieucanhan->chucvu_bo->CellAttributes() ?>><span id="el_chucvu_bo">
<textarea name="x_chucvu_bo" id="x_chucvu_bo" cols="32" rows="2"<?php echo $tbl_phieucanhan->chucvu_bo->EditAttributes() ?>><?php echo $tbl_phieucanhan->chucvu_bo->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->chucvu_bo->CustomMsg ?>
                    <b>Nghề nghiệp mẹ</b>
 <textarea name="x_chucvu_me" id="x_chucvu_me" cols="32" rows="2"<?php echo $tbl_phieucanhan->chucvu_me->EditAttributes() ?>><?php echo $tbl_phieucanhan->chucvu_me->EditValue ?></textarea>
                </td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->gdchinhsach->Visible) { // gdchinhsach ?>
	<tr<?php echo $tbl_phieucanhan->gdchinhsach->RowAttributes ?>>
		<td class="ewTableHeader">Đối tượng gia đình</td>
		<td<?php echo $tbl_phieucanhan->gdchinhsach->CellAttributes() ?>><span id="el_gdchinhsach">
<textarea name="x_gdchinhsach" id="x_gdchinhsach" cols="77" rows="2"<?php echo $tbl_phieucanhan->gdchinhsach->EditAttributes() ?>><?php echo $tbl_phieucanhan->gdchinhsach->EditValue ?></textarea>
</span><?php echo $tbl_phieucanhan->gdchinhsach->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_phieucanhan->sdt_lienhegd->Visible) { // sdt_lienhegd ?>
	<tr<?php echo $tbl_phieucanhan->sdt_lienhegd->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại gia đình</td>
		<td<?php echo $tbl_phieucanhan->sdt_lienhegd->CellAttributes() ?>><span id="el_sdt_lienhegd">
<input type="text" name="x_sdt_lienhegd" id="x_sdt_lienhegd" size="30" maxlength="15" value="<?php echo $tbl_phieucanhan->sdt_lienhegd->EditValue ?>"<?php echo $tbl_phieucanhan->sdt_lienhegd->EditAttributes() ?>>
</span><?php echo $tbl_phieucanhan->sdt_lienhegd->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_phieucanhan_id" id="x_phieucanhan_id" value="<?php echo ew_HtmlEncode($tbl_phieucanhan->phieucanhan_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="   Edit   ">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class ctbl_phieucanhan_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'tbl_phieucanhan';

	// Page Object Name
	var $PageObjName = 'tbl_phieucanhan_edit';

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
	function ctbl_phieucanhan_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_phieucanhan"] = new ctbl_phieucanhan();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

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
		if (!$Security->CanEdit()) {
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

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $tbl_phieucanhan;

		// Load key from QueryString
		if (@$_GET["phieucanhan_id"] <> "")
			$tbl_phieucanhan->phieucanhan_id->setQueryStringValue($_GET["phieucanhan_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$tbl_phieucanhan->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$tbl_phieucanhan->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$tbl_phieucanhan->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_phieucanhan->phieucanhan_id->CurrentValue == "")
			$this->Page_Terminate("tbl_phieucanhanlist.php"); // Invalid key, return to list
		switch ($tbl_phieucanhan->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("tbl_phieucanhanlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_phieucanhan->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Update succeeded"); // Update success
					$sReturnUrl = $tbl_phieucanhan->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "tbl_phieucanhanview.php")
						$sReturnUrl = $tbl_phieucanhan->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_phieucanhan->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_phieucanhan;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_phieucanhan;
		$tbl_phieucanhan->e_mail->setFormValue($objForm->GetValue("x_e_mail"));
		$tbl_phieucanhan->chungminh_nhandan->setFormValue($objForm->GetValue("x_chungminh_nhandan"));
		$tbl_phieucanhan->ngaycap_chungminh->setFormValue($objForm->GetValue("x_ngaycap_chungminh"));
		$tbl_phieucanhan->hokhau_tt->setFormValue($objForm->GetValue("x_hokhau_tt"));
		$tbl_phieucanhan->noi_cap->setFormValue($objForm->GetValue("x_noi_cap"));
		$tbl_phieucanhan->dan_toc->setFormValue($objForm->GetValue("x_dan_toc"));
		$tbl_phieucanhan->ton_giao->setFormValue($objForm->GetValue("x_ton_giao"));
		$tbl_phieucanhan->capbac_chucvu_dang->setFormValue($objForm->GetValue("x_capbac_chucvu_dang"));
		$tbl_phieucanhan->htlt_odau->setFormValue($objForm->GetValue("x_htlt_odau"));
		$tbl_phieucanhan->ngayvaodang->setFormValue($objForm->GetValue("x_ngayvaodang"));
		$tbl_phieucanhan->ngayvaodang->CurrentValue = ew_UnFormatDateTime($tbl_phieucanhan->ngayvaodang->CurrentValue, 7);
		$tbl_phieucanhan->nangkhieucanhan->setFormValue($objForm->GetValue("x_nangkhieucanhan"));
		$tbl_phieucanhan->dtdc_khicanlh->setFormValue($objForm->GetValue("x_dtdc_khicanlh"));
		$tbl_phieucanhan->hoten_bo->setFormValue($objForm->GetValue("x_hoten_bo"));
		$tbl_phieucanhan->namsinh_bo->setFormValue($objForm->GetValue("x_namsinh_bo"));
		$tbl_phieucanhan->dt_bo->setFormValue($objForm->GetValue("x_dt_bo"));
		$tbl_phieucanhan->hoten_me->setFormValue($objForm->GetValue("x_hoten_me"));
		$tbl_phieucanhan->namsinh_me->setFormValue($objForm->GetValue("x_namsinh_me"));
		$tbl_phieucanhan->dt_me->setFormValue($objForm->GetValue("x_dt_me"));
		$tbl_phieucanhan->gdchinhsach->setFormValue($objForm->GetValue("x_gdchinhsach"));
		$tbl_phieucanhan->chucvu_bo->setFormValue($objForm->GetValue("x_chucvu_bo"));
		$tbl_phieucanhan->chucvu_me->setFormValue($objForm->GetValue("x_chucvu_me"));
		$tbl_phieucanhan->sdt_lienhegd->setFormValue($objForm->GetValue("x_sdt_lienhegd"));
		$tbl_phieucanhan->datetime_edit->setFormValue($objForm->GetValue("x_datetime_edit"));
		$tbl_phieucanhan->datetime_edit->CurrentValue = ew_UnFormatDateTime($tbl_phieucanhan->datetime_edit->CurrentValue, 7);
		$tbl_phieucanhan->active->setFormValue($objForm->GetValue("x_active"));
		$tbl_phieucanhan->phieucanhan_id->setFormValue($objForm->GetValue("x_phieucanhan_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $tbl_phieucanhan;
		$tbl_phieucanhan->phieucanhan_id->CurrentValue = $tbl_phieucanhan->phieucanhan_id->FormValue;
		$this->LoadRow();
		$tbl_phieucanhan->e_mail->CurrentValue = $tbl_phieucanhan->e_mail->FormValue;
		$tbl_phieucanhan->chungminh_nhandan->CurrentValue = $tbl_phieucanhan->chungminh_nhandan->FormValue;
		$tbl_phieucanhan->ngaycap_chungminh->CurrentValue = $tbl_phieucanhan->ngaycap_chungminh->FormValue;
		$tbl_phieucanhan->hokhau_tt->CurrentValue = $tbl_phieucanhan->hokhau_tt->FormValue;
		$tbl_phieucanhan->noi_cap->CurrentValue = $tbl_phieucanhan->noi_cap->FormValue;
		$tbl_phieucanhan->dan_toc->CurrentValue = $tbl_phieucanhan->dan_toc->FormValue;
		$tbl_phieucanhan->ton_giao->CurrentValue = $tbl_phieucanhan->ton_giao->FormValue;
		$tbl_phieucanhan->capbac_chucvu_dang->CurrentValue = $tbl_phieucanhan->capbac_chucvu_dang->FormValue;
		$tbl_phieucanhan->htlt_odau->CurrentValue = $tbl_phieucanhan->htlt_odau->FormValue;
		$tbl_phieucanhan->ngayvaodang->CurrentValue = $tbl_phieucanhan->ngayvaodang->FormValue;
		$tbl_phieucanhan->ngayvaodang->CurrentValue = ew_UnFormatDateTime($tbl_phieucanhan->ngayvaodang->CurrentValue, 7);
		$tbl_phieucanhan->nangkhieucanhan->CurrentValue = $tbl_phieucanhan->nangkhieucanhan->FormValue;
		$tbl_phieucanhan->dtdc_khicanlh->CurrentValue = $tbl_phieucanhan->dtdc_khicanlh->FormValue;
		$tbl_phieucanhan->hoten_bo->CurrentValue = $tbl_phieucanhan->hoten_bo->FormValue;
		$tbl_phieucanhan->namsinh_bo->CurrentValue = $tbl_phieucanhan->namsinh_bo->FormValue;
		$tbl_phieucanhan->dt_bo->CurrentValue = $tbl_phieucanhan->dt_bo->FormValue;
		$tbl_phieucanhan->hoten_me->CurrentValue = $tbl_phieucanhan->hoten_me->FormValue;
		$tbl_phieucanhan->namsinh_me->CurrentValue = $tbl_phieucanhan->namsinh_me->FormValue;
		$tbl_phieucanhan->dt_me->CurrentValue = $tbl_phieucanhan->dt_me->FormValue;
		$tbl_phieucanhan->gdchinhsach->CurrentValue = $tbl_phieucanhan->gdchinhsach->FormValue;
		$tbl_phieucanhan->chucvu_bo->CurrentValue = $tbl_phieucanhan->chucvu_bo->FormValue;
		$tbl_phieucanhan->chucvu_me->CurrentValue = $tbl_phieucanhan->chucvu_me->FormValue;
		$tbl_phieucanhan->sdt_lienhegd->CurrentValue = $tbl_phieucanhan->sdt_lienhegd->FormValue;
		$tbl_phieucanhan->datetime_edit->CurrentValue = $tbl_phieucanhan->datetime_edit->FormValue;
		$tbl_phieucanhan->datetime_edit->CurrentValue = ew_UnFormatDateTime($tbl_phieucanhan->datetime_edit->CurrentValue, 7);
		$tbl_phieucanhan->active->CurrentValue = $tbl_phieucanhan->active->FormValue;
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
		// e_mail

		$tbl_phieucanhan->e_mail->CellCssStyle = "";
		$tbl_phieucanhan->e_mail->CellCssClass = "";

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

			// e_mail
			$tbl_phieucanhan->e_mail->HrefValue = "";

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

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->HrefValue = "";

			// active
			$tbl_phieucanhan->active->HrefValue = "";
		} elseif ($tbl_phieucanhan->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// e_mail
			$tbl_phieucanhan->e_mail->EditCustomAttributes = "";
			$tbl_phieucanhan->e_mail->EditValue = ew_HtmlEncode($tbl_phieucanhan->e_mail->CurrentValue);

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->EditCustomAttributes = "";
			$tbl_phieucanhan->chungminh_nhandan->EditValue = ew_HtmlEncode($tbl_phieucanhan->chungminh_nhandan->CurrentValue);

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->EditCustomAttributes = "";
			$tbl_phieucanhan->ngaycap_chungminh->EditValue = ew_HtmlEncode($tbl_phieucanhan->ngaycap_chungminh->CurrentValue);

			// hokhau_tt
			$tbl_phieucanhan->hokhau_tt->EditCustomAttributes = "";
			$tbl_phieucanhan->hokhau_tt->EditValue = ew_HtmlEncode($tbl_phieucanhan->hokhau_tt->CurrentValue);

			// noi_cap
			$tbl_phieucanhan->noi_cap->EditCustomAttributes = "";
			$tbl_phieucanhan->noi_cap->EditValue = ew_HtmlEncode($tbl_phieucanhan->noi_cap->CurrentValue);

			// dan_toc
			$tbl_phieucanhan->dan_toc->EditCustomAttributes = "";
			$tbl_phieucanhan->dan_toc->EditValue = ew_HtmlEncode($tbl_phieucanhan->dan_toc->CurrentValue);

			// ton_giao
			$tbl_phieucanhan->ton_giao->EditCustomAttributes = "";
			$tbl_phieucanhan->ton_giao->EditValue = ew_HtmlEncode($tbl_phieucanhan->ton_giao->CurrentValue);

			// capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->EditCustomAttributes = "";
			$tbl_phieucanhan->capbac_chucvu_dang->EditValue = ew_HtmlEncode($tbl_phieucanhan->capbac_chucvu_dang->CurrentValue);

			// htlt_odau
			$tbl_phieucanhan->htlt_odau->EditCustomAttributes = "";
			$tbl_phieucanhan->htlt_odau->EditValue = ew_HtmlEncode($tbl_phieucanhan->htlt_odau->CurrentValue);

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->EditCustomAttributes = "";
			$tbl_phieucanhan->ngayvaodang->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_phieucanhan->ngayvaodang->CurrentValue, 7));

			// nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->EditCustomAttributes = "";
			$tbl_phieucanhan->nangkhieucanhan->EditValue = ew_HtmlEncode($tbl_phieucanhan->nangkhieucanhan->CurrentValue);

			// dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->EditCustomAttributes = "";
			$tbl_phieucanhan->dtdc_khicanlh->EditValue = ew_HtmlEncode($tbl_phieucanhan->dtdc_khicanlh->CurrentValue);

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->hoten_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->hoten_bo->CurrentValue);

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->namsinh_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->namsinh_bo->CurrentValue);

			// dt_bo
			$tbl_phieucanhan->dt_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->dt_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->dt_bo->CurrentValue);

			// hoten_me
			$tbl_phieucanhan->hoten_me->EditCustomAttributes = "";
			$tbl_phieucanhan->hoten_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->hoten_me->CurrentValue);

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->EditCustomAttributes = "";
			$tbl_phieucanhan->namsinh_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->namsinh_me->CurrentValue);

			// dt_me
			$tbl_phieucanhan->dt_me->EditCustomAttributes = "";
			$tbl_phieucanhan->dt_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->dt_me->CurrentValue);

			// gdchinhsach
			$tbl_phieucanhan->gdchinhsach->EditCustomAttributes = "";
			$tbl_phieucanhan->gdchinhsach->EditValue = ew_HtmlEncode($tbl_phieucanhan->gdchinhsach->CurrentValue);

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->EditCustomAttributes = "";
			$tbl_phieucanhan->chucvu_bo->EditValue = ew_HtmlEncode($tbl_phieucanhan->chucvu_bo->CurrentValue);

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->EditCustomAttributes = "";
			$tbl_phieucanhan->chucvu_me->EditValue = ew_HtmlEncode($tbl_phieucanhan->chucvu_me->CurrentValue);

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->EditCustomAttributes = "";
			$tbl_phieucanhan->sdt_lienhegd->EditValue = ew_HtmlEncode($tbl_phieucanhan->sdt_lienhegd->CurrentValue);

			// datetime_edit
			// active

			$tbl_phieucanhan->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong kich hoat");
			$arwrk[] = array("1", "kich hoat");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_phieucanhan->active->EditValue = $arwrk;

			// Edit refer script
			// e_mail

			$tbl_phieucanhan->e_mail->HrefValue = "";

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

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->HrefValue = "";

			// active
			$tbl_phieucanhan->active->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_phieucanhan->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $tbl_phieucanhan;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($tbl_phieucanhan->e_mail->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - E Mail";
		}
		if (!ew_CheckEmail($tbl_phieucanhan->e_mail->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect email - E Mail";
		}
		if ($tbl_phieucanhan->hokhau_tt->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hokhau Tt";
		}
		if (!ew_CheckEuroDate($tbl_phieucanhan->ngayvaodang->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Ngayvaodang";
		}
		if ($tbl_phieucanhan->dtdc_khicanlh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Dtdc Khicanlh";
		}
		if ($tbl_phieucanhan->hoten_bo->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hoten Bo";
		}
		if (!ew_CheckInteger($tbl_phieucanhan->namsinh_bo->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Namsinh Bo";
		}
		if ($tbl_phieucanhan->hoten_me->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hoten Me";
		}
		if (!ew_CheckInteger($tbl_phieucanhan->namsinh_me->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Namsinh Me";
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $tbl_phieucanhan;
		$sFilter = $tbl_phieucanhan->KeyFilter();
			if ($tbl_phieucanhan->msv->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(msv = '" . ew_AdjustSql($tbl_phieucanhan->msv->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$tbl_phieucanhan->CurrentFilter = $sFilterChk;
			$sSqlChk = $tbl_phieucanhan->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "msv", "Duplicate value '%v' for unique index '%f'");
				$sIdxErrMsg = str_replace("%v", $tbl_phieucanhan->msv->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$tbl_phieucanhan->CurrentFilter = $sFilter;
		$sSql = $tbl_phieucanhan->SQL();
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

			// Field e_mail
			$tbl_phieucanhan->e_mail->SetDbValueDef($tbl_phieucanhan->e_mail->CurrentValue, NULL);
			$rsnew['e_mail'] =& $tbl_phieucanhan->e_mail->DbValue;

			// Field chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->SetDbValueDef($tbl_phieucanhan->chungminh_nhandan->CurrentValue, NULL);
			$rsnew['chungminh_nhandan'] =& $tbl_phieucanhan->chungminh_nhandan->DbValue;

			// Field ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->SetDbValueDef($tbl_phieucanhan->ngaycap_chungminh->CurrentValue, NULL);
			$rsnew['ngaycap_chungminh'] =& $tbl_phieucanhan->ngaycap_chungminh->DbValue;

			// Field hokhau_tt
			$tbl_phieucanhan->hokhau_tt->SetDbValueDef($tbl_phieucanhan->hokhau_tt->CurrentValue, NULL);
			$rsnew['hokhau_tt'] =& $tbl_phieucanhan->hokhau_tt->DbValue;

			// Field noi_cap
			$tbl_phieucanhan->noi_cap->SetDbValueDef($tbl_phieucanhan->noi_cap->CurrentValue, NULL);
			$rsnew['noi_cap'] =& $tbl_phieucanhan->noi_cap->DbValue;

			// Field dan_toc
			$tbl_phieucanhan->dan_toc->SetDbValueDef($tbl_phieucanhan->dan_toc->CurrentValue, NULL);
			$rsnew['dan_toc'] =& $tbl_phieucanhan->dan_toc->DbValue;

			// Field ton_giao
			$tbl_phieucanhan->ton_giao->SetDbValueDef($tbl_phieucanhan->ton_giao->CurrentValue, NULL);
			$rsnew['ton_giao'] =& $tbl_phieucanhan->ton_giao->DbValue;

			// Field capbac_chucvu_dang
			$tbl_phieucanhan->capbac_chucvu_dang->SetDbValueDef($tbl_phieucanhan->capbac_chucvu_dang->CurrentValue, NULL);
			$rsnew['capbac_chucvu_dang'] =& $tbl_phieucanhan->capbac_chucvu_dang->DbValue;

			// Field htlt_odau
			$tbl_phieucanhan->htlt_odau->SetDbValueDef($tbl_phieucanhan->htlt_odau->CurrentValue, NULL);
			$rsnew['htlt_odau'] =& $tbl_phieucanhan->htlt_odau->DbValue;

			// Field ngayvaodang
			$tbl_phieucanhan->ngayvaodang->SetDbValueDef(ew_UnFormatDateTime($tbl_phieucanhan->ngayvaodang->CurrentValue, 7), NULL);
			$rsnew['ngayvaodang'] =& $tbl_phieucanhan->ngayvaodang->DbValue;

			// Field nangkhieucanhan
			$tbl_phieucanhan->nangkhieucanhan->SetDbValueDef($tbl_phieucanhan->nangkhieucanhan->CurrentValue, NULL);
			$rsnew['nangkhieucanhan'] =& $tbl_phieucanhan->nangkhieucanhan->DbValue;

			// Field dtdc_khicanlh
			$tbl_phieucanhan->dtdc_khicanlh->SetDbValueDef($tbl_phieucanhan->dtdc_khicanlh->CurrentValue, NULL);
			$rsnew['dtdc_khicanlh'] =& $tbl_phieucanhan->dtdc_khicanlh->DbValue;

			// Field hoten_bo
			$tbl_phieucanhan->hoten_bo->SetDbValueDef($tbl_phieucanhan->hoten_bo->CurrentValue, NULL);
			$rsnew['hoten_bo'] =& $tbl_phieucanhan->hoten_bo->DbValue;

			// Field namsinh_bo
			$tbl_phieucanhan->namsinh_bo->SetDbValueDef($tbl_phieucanhan->namsinh_bo->CurrentValue, NULL);
			$rsnew['namsinh_bo'] =& $tbl_phieucanhan->namsinh_bo->DbValue;

			// Field dt_bo
			$tbl_phieucanhan->dt_bo->SetDbValueDef($tbl_phieucanhan->dt_bo->CurrentValue, NULL);
			$rsnew['dt_bo'] =& $tbl_phieucanhan->dt_bo->DbValue;

			// Field hoten_me
			$tbl_phieucanhan->hoten_me->SetDbValueDef($tbl_phieucanhan->hoten_me->CurrentValue, NULL);
			$rsnew['hoten_me'] =& $tbl_phieucanhan->hoten_me->DbValue;

			// Field namsinh_me
			$tbl_phieucanhan->namsinh_me->SetDbValueDef($tbl_phieucanhan->namsinh_me->CurrentValue, NULL);
			$rsnew['namsinh_me'] =& $tbl_phieucanhan->namsinh_me->DbValue;

			// Field dt_me
			$tbl_phieucanhan->dt_me->SetDbValueDef($tbl_phieucanhan->dt_me->CurrentValue, NULL);
			$rsnew['dt_me'] =& $tbl_phieucanhan->dt_me->DbValue;

			// Field gdchinhsach
			$tbl_phieucanhan->gdchinhsach->SetDbValueDef($tbl_phieucanhan->gdchinhsach->CurrentValue, NULL);
			$rsnew['gdchinhsach'] =& $tbl_phieucanhan->gdchinhsach->DbValue;

			// Field chucvu_bo
			$tbl_phieucanhan->chucvu_bo->SetDbValueDef($tbl_phieucanhan->chucvu_bo->CurrentValue, NULL);
			$rsnew['chucvu_bo'] =& $tbl_phieucanhan->chucvu_bo->DbValue;

			// Field chucvu_me
			$tbl_phieucanhan->chucvu_me->SetDbValueDef($tbl_phieucanhan->chucvu_me->CurrentValue, NULL);
			$rsnew['chucvu_me'] =& $tbl_phieucanhan->chucvu_me->DbValue;

			// Field sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->SetDbValueDef($tbl_phieucanhan->sdt_lienhegd->CurrentValue, NULL);
			$rsnew['sdt_lienhegd'] =& $tbl_phieucanhan->sdt_lienhegd->DbValue;

			// Field datetime_edit
			$tbl_phieucanhan->datetime_edit->SetDbValueDef(ew_CurrentDateTime(), NULL);
			$rsnew['datetime_edit'] =& $tbl_phieucanhan->datetime_edit->DbValue;

			// Field active
			$tbl_phieucanhan->active->SetDbValueDef(1, NULL);
			$rsnew['active'] =& $tbl_phieucanhan->active->DbValue;

			// Call Row Updating event
			$bUpdateRow = $tbl_phieucanhan->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($tbl_phieucanhan->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_phieucanhan->CancelMessage <> "") {
					$this->setMessage($tbl_phieucanhan->CancelMessage);
					$tbl_phieucanhan->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_phieucanhan->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
