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
$advertising_add = new cadvertising_add();
$Page =& $advertising_add;

// Page init processing
$advertising_add->Page_Init();

// Page main processing
$advertising_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_add = new ew_Page("advertising_add");

// page properties
advertising_add.PageID = "add"; // page ID
var EW_PAGE_ID = advertising_add.PageID; // for backward compatibility

// extend page with ValidateForm function
advertising_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tieu_de"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tieu De");
		elm = fobj.elements["x" + infix + "_anh_logo"];
		aelm = fobj.elements["a" + infix + "_anh_logo"];
		var chk_anh_logo = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_anh_logo && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Anh Logo");
		elm = fobj.elements["x" + infix + "_anh_logo"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_dorong_anh"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Dorong Anh");
		elm = fobj.elements["x" + infix + "_chieucao_anh"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Chieucao Anh");
		elm = fobj.elements["x" + infix + "_thutu_sapxep"];
		if (elm && !ew_CheckNumber(elm.value))
			return ew_OnError(this, elm, "Incorrect floating point number - Thutu Sapxep");
		elm = fobj.elements["x" + infix + "_vitri_quangcao"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Vitri Quangcao");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
advertising_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $advertising->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm danh mục quảng cáo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $advertising_add->ShowMessage() ?>
<form name="fadvertisingadd" id="fadvertisingadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return advertising_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="advertising">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($advertising->tieu_de->Visible) { // tieu_de ?>
	<tr<?php echo $advertising->tieu_de->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising->tieu_de->CellAttributes() ?>><span id="el_tieu_de">
<input type="text" name="x_tieu_de" id="x_tieu_de" size="100" maxlength="255" value="<?php echo $advertising->tieu_de->EditValue ?>"<?php echo $advertising->tieu_de->EditAttributes() ?>>
</span><?php echo $advertising->tieu_de->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->anh_logo->Visible) { // anh_logo ?>
	<tr<?php echo $advertising->anh_logo->RowAttributes ?>>
		<td class="ewTableHeader">Logo<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising->anh_logo->CellAttributes() ?>><span id="el_anh_logo">
<input type="file" name="x_anh_logo" id="x_anh_logo" size="30"<?php echo $advertising->anh_logo->EditAttributes() ?>>
</div>
</span><?php echo $advertising->anh_logo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php  // kieu_anh ?>
	<tr<?php echo $advertising->kieu_anh->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu Logo<span class="ewRequired"></span></td>
		<td<?php echo $advertising->kieu_anh->CellAttributes() ?>><span id="el_kieu_anh">
<select id="x_kieu_anh" name="x_kieu_anh"<?php echo $advertising->kieu_anh->EditAttributes() ?>>
<?php
if (is_array($advertising->kieu_anh->EditValue)) {
	$arwrk = $advertising->kieu_anh->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->kieu_anh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $advertising->kieu_anh->CustomMsg ?></td>
	</tr>
<?php  ?>
<?php if ($advertising->duongdan_lienket->Visible) { // duongdan_lienket ?>
	<tr<?php echo $advertising->duongdan_lienket->RowAttributes ?>>
		<td class="ewTableHeader">Website<span class="ewRequired"></span></td>
		<td<?php echo $advertising->duongdan_lienket->CellAttributes() ?>><span id="el_duongdan_lienket">
<input type="text" name="x_duongdan_lienket" id="x_duongdan_lienket" size="100" maxlength="255" value="<?php echo $advertising->duongdan_lienket->EditValue ?>"<?php echo $advertising->duongdan_lienket->EditAttributes() ?>>
</span><?php echo $advertising->duongdan_lienket->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->ten_viettat->Visible) { // ten_viettat ?>
	<tr<?php echo $advertising->ten_viettat->RowAttributes ?>>
		<td class="ewTableHeader">Tên viết tắt<span class="ewRequired"></span></td>
		<td<?php echo $advertising->ten_viettat->CellAttributes() ?>><span id="el_ten_viettat">
<input type="text" name="x_ten_viettat" id="x_ten_viettat" size="50" maxlength="50" value="<?php echo $advertising->ten_viettat->EditValue ?>"<?php echo $advertising->ten_viettat->EditAttributes() ?>>
</span><?php echo $advertising->ten_viettat->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->mo_ta->Visible) { // mo_ta ?>
	<tr<?php echo $advertising->mo_ta->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả</td>
		<td<?php echo $advertising->mo_ta->CellAttributes() ?>><span id="el_mo_ta">
<textarea name="x_mo_ta" id="x_mo_ta" cols="110" rows="4"<?php echo $advertising->mo_ta->EditAttributes() ?>><?php echo $advertising->mo_ta->EditValue ?></textarea>
</span><?php echo $advertising->mo_ta->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->dorong_anh->Visible) { // dorong_anh ?>
	<tr<?php echo $advertising->dorong_anh->RowAttributes ?>>
		<td class="ewTableHeader">Chiều rộng Logo<span class="ewRequired"></span></td>
		<td<?php echo $advertising->dorong_anh->CellAttributes() ?>><span id="el_dorong_anh">
<input type="text" name="x_dorong_anh" id="x_dorong_anh" size="30" value="<?php echo $advertising->dorong_anh->EditValue ?>"<?php echo $advertising->dorong_anh->EditAttributes() ?>>
</span><?php echo $advertising->dorong_anh->CustomMsg ?><br/><span class="ewRequired">&nbsp;Độ rộng tối đa:(bên trái trang tin:203px;bên phải trang tin:142px;banner trang tin :960px*360px;bên trái sàn TMĐT: 225px;giữa sàn TMĐT:535px*279px. ) </span></td>
	</tr>
<?php } ?>
<?php if ($advertising->chieucao_anh->Visible) { // chieucao_anh ?>
	<tr<?php echo $advertising->chieucao_anh->RowAttributes ?>>
		<td class="ewTableHeader">Chiều cao Logo<span class="ewRequired"></span></td>
		<td<?php echo $advertising->chieucao_anh->CellAttributes() ?>><span id="el_chieucao_anh">
<input type="text" name="x_chieucao_anh" id="x_chieucao_anh" size="30" value="<?php echo $advertising->chieucao_anh->EditValue ?>"<?php echo $advertising->chieucao_anh->EditAttributes() ?>>
</span><?php echo $advertising->chieucao_anh->CustomMsg ?><span class="ewRequired"></span></td>
	</tr>
<?php } ?>
<?php if ($advertising->vitri_quangcao->Visible) { // vitri_quangcao ?>
	<tr<?php echo $advertising->vitri_quangcao->RowAttributes ?>>
		<td class="ewTableHeader">Vị trí hiển thị<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising->vitri_quangcao->CellAttributes() ?>><span id="el_vitri_quangcao">
<select id="x_vitri_quangcao" name="x_vitri_quangcao"<?php echo $advertising->vitri_quangcao->EditAttributes() ?>>
<?php
if (is_array($advertising->vitri_quangcao->EditValue)) {
	$arwrk = $advertising->vitri_quangcao->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->vitri_quangcao->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $advertising->vitri_quangcao->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Thêm    ">
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
class cadvertising_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'advertising';

	// Page Object Name
	var $PageObjName = 'advertising_add';

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
	function cadvertising_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising"] = new cadvertising();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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
		if (!$Security->CanAdd()) {
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
	var $x_ewPriv = 0;

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $advertising;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["lienket_id"] != "") {
		  $advertising->lienket_id->setQueryStringValue($_GET["lienket_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $advertising->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$advertising->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $advertising->CurrentAction = "C"; // Copy Record
		  } else {
		    $advertising->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($advertising->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("advertisinglist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$advertising->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm"); // Set up success message
					$sReturnUrl = $advertising->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "advertisingview.php")
						$sReturnUrl = $advertising->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$advertising->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $advertising;

		// Get upload data
			if ($advertising->anh_logo->Upload->UploadFile()) {

				// No action required
			} else {
				echo $advertising->anh_logo->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $advertising;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $advertising;
		$advertising->tieu_de->setFormValue($objForm->GetValue("x_tieu_de"));
		$advertising->kieu_anh->setFormValue($objForm->GetValue("x_kieu_anh"));
		$advertising->duongdan_lienket->setFormValue($objForm->GetValue("x_duongdan_lienket"));
		$advertising->ten_viettat->setFormValue($objForm->GetValue("x_ten_viettat"));
		$advertising->mo_ta->setFormValue($objForm->GetValue("x_mo_ta"));
		$advertising->dorong_anh->setFormValue($objForm->GetValue("x_dorong_anh"));
		$advertising->chieucao_anh->setFormValue($objForm->GetValue("x_chieucao_anh"));
		$advertising->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$advertising->luachon_hienthi->setFormValue($objForm->GetValue("x_luachon_hienthi"));
		$advertising->vitri_quangcao->setFormValue($objForm->GetValue("x_vitri_quangcao"));
		$advertising->nguoi_them->setFormValue($objForm->GetValue("x_nguoi_them"));
		$advertising->lienket_id->setFormValue($objForm->GetValue("x_lienket_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $advertising;
		$advertising->lienket_id->CurrentValue = $advertising->lienket_id->FormValue;
		$advertising->tieu_de->CurrentValue = $advertising->tieu_de->FormValue;
		$advertising->kieu_anh->CurrentValue = $advertising->kieu_anh->FormValue;
		$advertising->duongdan_lienket->CurrentValue = $advertising->duongdan_lienket->FormValue;
		$advertising->ten_viettat->CurrentValue = $advertising->ten_viettat->FormValue;
		$advertising->mo_ta->CurrentValue = $advertising->mo_ta->FormValue;
		$advertising->dorong_anh->CurrentValue = $advertising->dorong_anh->FormValue;
		$advertising->chieucao_anh->CurrentValue = $advertising->chieucao_anh->FormValue;
		$advertising->thutu_sapxep->CurrentValue = $advertising->thutu_sapxep->FormValue;
		$advertising->luachon_hienthi->CurrentValue = $advertising->luachon_hienthi->FormValue;
		$advertising->vitri_quangcao->CurrentValue = $advertising->vitri_quangcao->FormValue;
		$advertising->nguoi_them->CurrentValue = $advertising->nguoi_them->FormValue;
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

		// nguoi_them
		$advertising->nguoi_them->CellCssStyle = "";
		$advertising->nguoi_them->CellCssClass = "";
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$advertising->tieu_de->ViewValue = $advertising->tieu_de->CurrentValue;
			$advertising->tieu_de->CssStyle = "";
			$advertising->tieu_de->CssClass = "";
			$advertising->tieu_de->ViewCustomAttributes = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->ViewValue = "Anh Logo";
				$advertising->anh_logo->ImageWidth = 100;
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

			// nguoi_them
			$advertising->nguoi_them->ViewValue = $advertising->nguoi_them->CurrentValue;
			$advertising->nguoi_them->CssStyle = "";
			$advertising->nguoi_them->CssClass = "";
			$advertising->nguoi_them->ViewCustomAttributes = "";

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

			// nguoi_them
			$advertising->nguoi_them->HrefValue = "";
		} elseif ($advertising->RowType == EW_ROWTYPE_ADD) { // Add row

			// tieu_de
			$advertising->tieu_de->EditCustomAttributes = "";
			$advertising->tieu_de->EditValue = ew_HtmlEncode($advertising->tieu_de->CurrentValue);

			// anh_logo
			$advertising->anh_logo->EditCustomAttributes = "";
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->EditValue = "Anh Logo";
				$advertising->anh_logo->ImageWidth = 200;
				$advertising->anh_logo->ImageHeight = 0;
				$advertising->anh_logo->ImageAlt = "";
			} else {
				$advertising->anh_logo->EditValue = "";
			}
			// kieu_anh
			$advertising->kieu_anh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("", "Ảnh");
			$arwrk[] = array("swf", "FLash");
			//array_unshift($arwrk, array("", "Chọn"));
			$advertising->kieu_anh->EditValue = $arwrk;
			// duongdan_lienket
			$advertising->duongdan_lienket->EditCustomAttributes = "";
			$advertising->duongdan_lienket->EditValue = ew_HtmlEncode($advertising->duongdan_lienket->CurrentValue);

			// ten_viettat
			$advertising->ten_viettat->EditCustomAttributes = "";
			$advertising->ten_viettat->EditValue = ew_HtmlEncode($advertising->ten_viettat->CurrentValue);

			// mo_ta
			$advertising->mo_ta->EditCustomAttributes = "";
			$advertising->mo_ta->EditValue = ew_HtmlEncode($advertising->mo_ta->CurrentValue);

			// dorong_anh
			$advertising->dorong_anh->EditCustomAttributes = "";
			$advertising->dorong_anh->EditValue = ew_HtmlEncode($advertising->dorong_anh->CurrentValue);

			// chieucao_anh
			$advertising->chieucao_anh->EditCustomAttributes = "";
			$advertising->chieucao_anh->EditValue = ew_HtmlEncode($advertising->chieucao_anh->CurrentValue);

			// thutu_sapxep
			$advertising->thutu_sapxep->EditCustomAttributes = "";
			$advertising->thutu_sapxep->EditValue = ew_HtmlEncode($advertising->thutu_sapxep->CurrentValue);

			// luachon_hienthi
			$advertising->luachon_hienthi->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Liên kết sàn");
			$arwrk[] = array("2", "Quảng cáo");
			$arwrk[] = array("3", "Liên kết sàn và quảng cáo");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->luachon_hienthi->EditValue = $arwrk;

			// vitri_quangcao
			$advertising->vitri_quangcao->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Quảng cáo bên trái trang tin");
                        $arwrk[] = array("2", "Quảng cáo bên phải trang tin");
                        $arwrk[] = array("3", "Quảng cáo bên trái sàn TMĐT");
                        $arwrk[] = array("5", "Quảng cáo vị trí giữa sàn TMĐT");
                        $arwrk[] = array("4", "Ảnh Banner trang tin");
			array_unshift($arwrk, array("", "Chọn"));
			$advertising->vitri_quangcao->EditValue = $arwrk;

			// nguoi_them
		}

		// Call Row Rendered event
		$advertising->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $advertising;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($advertising->anh_logo->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($advertising->anh_logo->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($advertising->anh_logo->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($advertising->tieu_de->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tieu De";
		}
		if (is_null($advertising->anh_logo->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Anh Logo";
		}
		if (!ew_CheckInteger($advertising->dorong_anh->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Dorong Anh";
		}
		if (!ew_CheckInteger($advertising->chieucao_anh->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Chieucao Anh";
		}
		if (!ew_CheckNumber($advertising->thutu_sapxep->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect floating point number - Thutu Sapxep";
		}
		
		if ($advertising->vitri_quangcao->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Vitri Quangcao";
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

	// Add record
	function AddRow() {
		global $conn, $Security, $advertising;
		$rsnew = array();

		// Field tieu_de
		$advertising->tieu_de->SetDbValueDef($advertising->tieu_de->CurrentValue, "");
		$rsnew['tieu_de'] =& $advertising->tieu_de->DbValue;

		// Field anh_logo
		$advertising->anh_logo->Upload->SaveToSession(); // Save file value to Session
		if (is_null($advertising->anh_logo->Upload->Value)) {
			$rsnew['anh_logo'] = NULL;	
		} else {
			$rsnew['anh_logo'] = $advertising->anh_logo->Upload->Value;
		}
		$advertising->dorong_anh->SetDbValueDef($advertising->anh_logo->Upload->ImageWidth, 0);
		$rsnew['dorong_anh'] =& $advertising->dorong_anh->DbValue;
		$advertising->chieucao_anh->SetDbValueDef($advertising->anh_logo->Upload->ImageHeight, 0);
		$rsnew['chieucao_anh'] =& $advertising->chieucao_anh->DbValue;
		
		// Field kieu_anh
		$advertising->kieu_anh->SetDbValueDef($advertising->kieu_anh->CurrentValue, "");
		$rsnew['kieu_anh'] =& $advertising->kieu_anh->DbValue;
		// Field duongdan_lienket
		$advertising->duongdan_lienket->SetDbValueDef($advertising->duongdan_lienket->CurrentValue, "");
		$rsnew['duongdan_lienket'] =& $advertising->duongdan_lienket->DbValue;

		// Field ten_viettat
		$advertising->ten_viettat->SetDbValueDef($advertising->ten_viettat->CurrentValue, "");
		$rsnew['ten_viettat'] =& $advertising->ten_viettat->DbValue;

		// Field mo_ta
		$advertising->mo_ta->SetDbValueDef($advertising->mo_ta->CurrentValue, NULL);
		$rsnew['mo_ta'] =& $advertising->mo_ta->DbValue;
		// Field dorong_anh
		// Field chieucao_anh
		// Field thutu_sapxep
	
		$advertising->thutu_sapxep->SetDbValueDef($advertising->thutu_sapxep->CurrentValue, 0);
		$rsnew['thutu_sapxep'] =& $advertising->thutu_sapxep->DbValue;

		// Field luachon_hienthi
		$advertising->luachon_hienthi->SetDbValueDef($advertising->luachon_hienthi->CurrentValue, 0);
		$rsnew['luachon_hienthi'] =& $advertising->luachon_hienthi->DbValue;

		// Field vitri_quangcao
		$advertising->vitri_quangcao->SetDbValueDef($advertising->vitri_quangcao->CurrentValue, 0);
		$rsnew['vitri_quangcao'] =& $advertising->vitri_quangcao->DbValue;

		// Field thoigian_them
		$advertising->thoigian_them->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_them'] =& $advertising->thoigian_them->DbValue;
		
		// Field thoigian_sua
		$advertising->thoigian_sua->SetDbValueDef(ew_UnFormatDateTime($advertising->thoigian_sua->CurrentValue, 7), ew_CurrentDate());
		$rsnew['thoigian_sua'] =& $advertising->thoigian_sua->DbValue;

		// Field nguoi_them
		$advertising->nguoi_them->SetDbValueDef(CurrentUserID(), 0);
		$rsnew['nguoi_them'] =& $advertising->nguoi_them->DbValue;

		// Call Row Inserting event
		$bInsertRow = $advertising->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field anh_logo
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($advertising->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($advertising->CancelMessage <> "") {
				$this->setMessage($advertising->CancelMessage);
				$advertising->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$advertising->lienket_id->setDbValue($conn->Insert_ID());
			$rsnew['lienket_id'] =& $advertising->lienket_id->DbValue;

			// Call Row Inserted event
			$advertising->Row_Inserted($rsnew);
		}

		// Field anh_logo
		$advertising->anh_logo->Upload->RemoveFromSession(); // Remove file value from Session
		return $AddRow;
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
