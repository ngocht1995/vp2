<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_bangiaocvinfo.php" ?>
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
$tbl_bangiaocv_add = new ctbl_bangiaocv_add();
$Page =& $tbl_bangiaocv_add;

// Page init processing
$tbl_bangiaocv_add->Page_Init();

// Page main processing
$tbl_bangiaocv_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_bangiaocv_add = new ew_Page("tbl_bangiaocv_add");

// page properties
tbl_bangiaocv_add.PageID = "add"; // page ID
var EW_PAGE_ID = tbl_bangiaocv_add.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_bangiaocv_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tieude_congviec"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Tiêu đề công việc");
		elm = fobj.elements["x" + infix + "_thoigian_diadiem"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Thời gian địa điểm ");
		elm = fobj.elements["x" + infix + "_phamvi_doituong"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Phạm vi đối tượng");
		elm = fobj.elements["x" + infix + "_doituong_thuchien"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Đối tượng thực hiện");
		elm = fobj.elements["x" + infix + "_thoigian_ketthuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Thời gian kết thúc");
		elm = fobj.elements["x" + infix + "_thoigian_ketthuc"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Sai định dạng ngày tháng, format = dd/mm/yyyy - Thoigian Ketthuc");
		elm = fobj.elements["x" + infix + "_thoigian_batdau"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Thời gian bắt đầu");
		elm = fobj.elements["x" + infix + "_thoigian_batdau"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Sai định dạng ngày tháng, format, format = dd/mm/yyyy - Thoigian Batdau");
		elm = fobj.elements["x" + infix + "_trangthai"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Vui lòng nhập trường bắt buộc - Trạng thái");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
tbl_bangiaocv_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_bangiaocv_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_bangiaocv_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_bangiaocv_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
			var inst;
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.focus();
		}
	}


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
<p>
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Công việc đang triển khai</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>    
<a href="<?php echo $tbl_bangiaocv->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?>Go Back</a></span></p>
<?php $tbl_bangiaocv_add->ShowMessage() ?>
<form name="ftbl_bangiaocvadd" id="ftbl_bangiaocvadd" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_bangiaocv">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($tbl_bangiaocv->tieude_congviec->Visible) { // tieude_congviec ?>
	<tr<?php echo $tbl_bangiaocv->tieude_congviec->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề công việc<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_bangiaocv->tieude_congviec->CellAttributes() ?>><span id="el_tieude_congviec">
<input type="text" name="x_tieude_congviec" id="x_tieude_congviec" size="120" maxlength="200" value="<?php echo $tbl_bangiaocv->tieude_congviec->EditValue ?>"<?php echo $tbl_bangiaocv->tieude_congviec->EditAttributes() ?>>
</span><?php echo $tbl_bangiaocv->tieude_congviec->CustomMsg ?></td>
	</tr>
<?php } ?>

 <?php if ($tbl_bangiaocv->thoigian_batdau->Visible) { // thoigian_batdau ?>
	<tr<?php echo $tbl_bangiaocv->thoigian_batdau->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian bắt đầu<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_bangiaocv->thoigian_batdau->CellAttributes() ?>><span id="el_thoigian_batdau">
<input type="text" name="x_thoigian_batdau" id="x_thoigian_batdau" value="<?php echo $tbl_bangiaocv->thoigian_batdau->EditValue ?>"<?php echo $tbl_bangiaocv->thoigian_batdau->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoigian_batdau" name="cal_x_thoigian_batdau" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoigian_batdau", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoigian_batdau" // ID of the button
});
</script>
</span><?php echo $tbl_bangiaocv->thoigian_batdau->CustomMsg ?>
 <b>Thời gian kết thúc:</b><span class="ewRequired">&nbsp;*</span>               
 <input type="text" name="x_thoigian_ketthuc" id="x_thoigian_ketthuc" value="<?php echo $tbl_bangiaocv->thoigian_ketthuc->EditValue ?>"<?php echo $tbl_bangiaocv->thoigian_ketthuc->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_thoigian_ketthuc" name="cal_x_thoigian_ketthuc" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_thoigian_ketthuc", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_thoigian_ketthuc" // ID of the button
});
</script>
</span><?php echo $tbl_bangiaocv->thoigian_ketthuc->CustomMsg ?>              
                </td>
	</tr>
<?php } ?>       
        
<?php if ($tbl_bangiaocv->thoigian_diadiem->Visible) { // thoigian_diadiem ?>
	<tr<?php echo $tbl_bangiaocv->thoigian_diadiem->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian - Địa điểm<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_bangiaocv->thoigian_diadiem->CellAttributes() ?>><span id="el_thoigian_diadiem">
<input type="text" name="x_thoigian_diadiem" id="x_thoigian_diadiem" size="120" maxlength="200" value="<?php echo $tbl_bangiaocv->thoigian_diadiem->EditValue ?>"<?php echo $tbl_bangiaocv->thoigian_diadiem->EditAttributes() ?>>
</span><?php echo $tbl_bangiaocv->thoigian_diadiem->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->phamvi_doituong->Visible) { // phamvi_doituong ?>
	<tr<?php echo $tbl_bangiaocv->phamvi_doituong->RowAttributes ?>>
		<td class="ewTableHeader">Phạm vi đối tượng<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_bangiaocv->phamvi_doituong->CellAttributes() ?>><span id="el_phamvi_doituong">
<input type="text" name="x_phamvi_doituong" id="x_phamvi_doituong" size="120" maxlength="200" value="<?php echo $tbl_bangiaocv->phamvi_doituong->EditValue ?>"<?php echo $tbl_bangiaocv->phamvi_doituong->EditAttributes() ?>>
</span><?php echo $tbl_bangiaocv->phamvi_doituong->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->doituong_thuchien->Visible) { // doituong_thuchien ?>
	<tr<?php echo $tbl_bangiaocv->doituong_thuchien->RowAttributes ?>>
		<td class="ewTableHeader">Đối tượng thực hiện<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_bangiaocv->doituong_thuchien->CellAttributes() ?>><span id="el_doituong_thuchien">
<input type="text" name="x_doituong_thuchien" id="x_doituong_thuchien" size="120" maxlength="200" value="<?php echo $tbl_bangiaocv->doituong_thuchien->EditValue ?>"<?php echo $tbl_bangiaocv->doituong_thuchien->EditAttributes() ?>>
</span><?php echo $tbl_bangiaocv->doituong_thuchien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->ghichu->Visible) { // ghichu ?>
	<tr<?php echo $tbl_bangiaocv->ghichu->RowAttributes ?>>
		<td class="ewTableHeader">Ghi chú</td>
		<td<?php echo $tbl_bangiaocv->ghichu->CellAttributes() ?>><span id="el_ghichu">
<textarea name="x_ghichu" id="x_ghichu" cols="110" rows="4"<?php echo $tbl_bangiaocv->ghichu->EditAttributes() ?>><?php echo $tbl_bangiaocv->ghichu->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_ghichu", function() {
	var oCKeditor = CKEDITOR.replace('x_ghichu', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $tbl_bangiaocv->ghichu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_bangiaocv->trangthai->Visible) { // trangthai ?>
	<tr<?php echo $tbl_bangiaocv->trangthai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_bangiaocv->trangthai->CellAttributes() ?>><span id="el_trangthai">
<select id="x_trangthai" name="x_trangthai"<?php echo $tbl_bangiaocv->trangthai->EditAttributes() ?>>
<?php
if (is_array($tbl_bangiaocv->trangthai->EditValue)) {
	$arwrk = $tbl_bangiaocv->trangthai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_bangiaocv->trangthai->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $tbl_bangiaocv->trangthai->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Add    " onclick="ew_SubmitForm(tbl_bangiaocv_add, this.form);">
</form>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
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
class ctbl_bangiaocv_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'tbl_bangiaocv';

	// Page Object Name
	var $PageObjName = 'tbl_bangiaocv_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) $PageUrl .= "t=" . $tbl_bangiaocv->TableVar . "&"; // add page token
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
		global $objForm, $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_bangiaocv->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_bangiaocv->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_bangiaocv_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_bangiaocv"] = new ctbl_bangiaocv();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_bangiaocv', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_bangiaocv;
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
			$this->Page_Terminate("tbl_bangiaocvlist.php");
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
		global $objForm, $gsFormError, $tbl_bangiaocv;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["bangiao_id"] != "") {
		  $tbl_bangiaocv->bangiao_id->setQueryStringValue($_GET["bangiao_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $tbl_bangiaocv->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$tbl_bangiaocv->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $tbl_bangiaocv->CurrentAction = "C"; // Copy Record
		  } else {
		    $tbl_bangiaocv->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($tbl_bangiaocv->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("tbl_bangiaocvlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$tbl_bangiaocv->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $tbl_bangiaocv->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "tbl_bangiaocvview.php")
						$sReturnUrl = $tbl_bangiaocv->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$tbl_bangiaocv->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_bangiaocv;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $tbl_bangiaocv;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_bangiaocv;
		$tbl_bangiaocv->tieude_congviec->setFormValue($objForm->GetValue("x_tieude_congviec"));
		$tbl_bangiaocv->thoigian_diadiem->setFormValue($objForm->GetValue("x_thoigian_diadiem"));
		$tbl_bangiaocv->phamvi_doituong->setFormValue($objForm->GetValue("x_phamvi_doituong"));
		$tbl_bangiaocv->doituong_thuchien->setFormValue($objForm->GetValue("x_doituong_thuchien"));
		$tbl_bangiaocv->thoigian_ketthuc->setFormValue($objForm->GetValue("x_thoigian_ketthuc"));
		$tbl_bangiaocv->thoigian_ketthuc->CurrentValue = ew_UnFormatDateTime($tbl_bangiaocv->thoigian_ketthuc->CurrentValue, 7);
		$tbl_bangiaocv->thoigian_batdau->setFormValue($objForm->GetValue("x_thoigian_batdau"));
		$tbl_bangiaocv->thoigian_batdau->CurrentValue = ew_UnFormatDateTime($tbl_bangiaocv->thoigian_batdau->CurrentValue, 7);
		$tbl_bangiaocv->ghichu->setFormValue($objForm->GetValue("x_ghichu"));
		$tbl_bangiaocv->trangthai->setFormValue($objForm->GetValue("x_trangthai"));
		$tbl_bangiaocv->bangiao_id->setFormValue($objForm->GetValue("x_bangiao_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $tbl_bangiaocv;
		$tbl_bangiaocv->bangiao_id->CurrentValue = $tbl_bangiaocv->bangiao_id->FormValue;
		$tbl_bangiaocv->tieude_congviec->CurrentValue = $tbl_bangiaocv->tieude_congviec->FormValue;
		$tbl_bangiaocv->thoigian_diadiem->CurrentValue = $tbl_bangiaocv->thoigian_diadiem->FormValue;
		$tbl_bangiaocv->phamvi_doituong->CurrentValue = $tbl_bangiaocv->phamvi_doituong->FormValue;
		$tbl_bangiaocv->doituong_thuchien->CurrentValue = $tbl_bangiaocv->doituong_thuchien->FormValue;
		$tbl_bangiaocv->thoigian_ketthuc->CurrentValue = $tbl_bangiaocv->thoigian_ketthuc->FormValue;
		$tbl_bangiaocv->thoigian_ketthuc->CurrentValue = ew_UnFormatDateTime($tbl_bangiaocv->thoigian_ketthuc->CurrentValue, 7);
		$tbl_bangiaocv->thoigian_batdau->CurrentValue = $tbl_bangiaocv->thoigian_batdau->FormValue;
		$tbl_bangiaocv->thoigian_batdau->CurrentValue = ew_UnFormatDateTime($tbl_bangiaocv->thoigian_batdau->CurrentValue, 7);
		$tbl_bangiaocv->ghichu->CurrentValue = $tbl_bangiaocv->ghichu->FormValue;
		$tbl_bangiaocv->trangthai->CurrentValue = $tbl_bangiaocv->trangthai->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_bangiaocv;
		$sFilter = $tbl_bangiaocv->KeyFilter();

		// Call Row Selecting event
		$tbl_bangiaocv->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_bangiaocv->CurrentFilter = $sFilter;
		$sSql = $tbl_bangiaocv->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_bangiaocv->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_bangiaocv;
		$tbl_bangiaocv->bangiao_id->setDbValue($rs->fields('bangiao_id'));
		$tbl_bangiaocv->tieude_congviec->setDbValue($rs->fields('tieude_congviec'));
		$tbl_bangiaocv->thoigian_diadiem->setDbValue($rs->fields('thoigian_diadiem'));
		$tbl_bangiaocv->phamvi_doituong->setDbValue($rs->fields('phamvi_doituong'));
		$tbl_bangiaocv->doituong_thuchien->setDbValue($rs->fields('doituong_thuchien'));
		$tbl_bangiaocv->thoigian_ketthuc->setDbValue($rs->fields('thoigian_ketthuc'));
		$tbl_bangiaocv->thoigian_batdau->setDbValue($rs->fields('thoigian_batdau'));
		$tbl_bangiaocv->ghichu->setDbValue($rs->fields('ghichu'));
		$tbl_bangiaocv->trangthai->setDbValue($rs->fields('trangthai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_bangiaocv;

		// Call Row_Rendering event
		$tbl_bangiaocv->Row_Rendering();

		// Common render codes for all row types
		// tieude_congviec

		$tbl_bangiaocv->tieude_congviec->CellCssStyle = "";
		$tbl_bangiaocv->tieude_congviec->CellCssClass = "";

		// thoigian_diadiem
		$tbl_bangiaocv->thoigian_diadiem->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_diadiem->CellCssClass = "";

		// phamvi_doituong
		$tbl_bangiaocv->phamvi_doituong->CellCssStyle = "";
		$tbl_bangiaocv->phamvi_doituong->CellCssClass = "";

		// doituong_thuchien
		$tbl_bangiaocv->doituong_thuchien->CellCssStyle = "";
		$tbl_bangiaocv->doituong_thuchien->CellCssClass = "";

		// thoigian_ketthuc
		$tbl_bangiaocv->thoigian_ketthuc->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_ketthuc->CellCssClass = "";

		// thoigian_batdau
		$tbl_bangiaocv->thoigian_batdau->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_batdau->CellCssClass = "";

		// ghichu
		$tbl_bangiaocv->ghichu->CellCssStyle = "";
		$tbl_bangiaocv->ghichu->CellCssClass = "";

		// trangthai
		$tbl_bangiaocv->trangthai->CellCssStyle = "";
		$tbl_bangiaocv->trangthai->CellCssClass = "";
		if ($tbl_bangiaocv->RowType == EW_ROWTYPE_VIEW) { // View row

			// bangiao_id
			$tbl_bangiaocv->bangiao_id->ViewValue = $tbl_bangiaocv->bangiao_id->CurrentValue;
			$tbl_bangiaocv->bangiao_id->CssStyle = "";
			$tbl_bangiaocv->bangiao_id->CssClass = "";
			$tbl_bangiaocv->bangiao_id->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->ViewValue = $tbl_bangiaocv->tieude_congviec->CurrentValue;
			$tbl_bangiaocv->tieude_congviec->CssStyle = "";
			$tbl_bangiaocv->tieude_congviec->CssClass = "";
			$tbl_bangiaocv->tieude_congviec->ViewCustomAttributes = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->ViewValue = $tbl_bangiaocv->thoigian_diadiem->CurrentValue;
			$tbl_bangiaocv->thoigian_diadiem->CssStyle = "";
			$tbl_bangiaocv->thoigian_diadiem->CssClass = "";
			$tbl_bangiaocv->thoigian_diadiem->ViewCustomAttributes = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->ViewValue = $tbl_bangiaocv->phamvi_doituong->CurrentValue;
			$tbl_bangiaocv->phamvi_doituong->CssStyle = "";
			$tbl_bangiaocv->phamvi_doituong->CssClass = "";
			$tbl_bangiaocv->phamvi_doituong->ViewCustomAttributes = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->ViewValue = $tbl_bangiaocv->doituong_thuchien->CurrentValue;
			$tbl_bangiaocv->doituong_thuchien->CssStyle = "";
			$tbl_bangiaocv->doituong_thuchien->CssClass = "";
			$tbl_bangiaocv->doituong_thuchien->ViewCustomAttributes = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = $tbl_bangiaocv->thoigian_ketthuc->CurrentValue;
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_ketthuc->ViewValue, 7);
			$tbl_bangiaocv->thoigian_ketthuc->CssStyle = "";
			$tbl_bangiaocv->thoigian_ketthuc->CssClass = "";
			$tbl_bangiaocv->thoigian_ketthuc->ViewCustomAttributes = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->ViewValue = $tbl_bangiaocv->thoigian_batdau->CurrentValue;
			$tbl_bangiaocv->thoigian_batdau->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_batdau->ViewValue, 7);
			$tbl_bangiaocv->thoigian_batdau->CssStyle = "";
			$tbl_bangiaocv->thoigian_batdau->CssClass = "";
			$tbl_bangiaocv->thoigian_batdau->ViewCustomAttributes = "";

			// ghichu
			$tbl_bangiaocv->ghichu->ViewValue = $tbl_bangiaocv->ghichu->CurrentValue;
			$tbl_bangiaocv->ghichu->CssStyle = "";
			$tbl_bangiaocv->ghichu->CssClass = "";
			$tbl_bangiaocv->ghichu->ViewCustomAttributes = "";

			// trangthai
			if (strval($tbl_bangiaocv->trangthai->CurrentValue) <> "") {
				switch ($tbl_bangiaocv->trangthai->CurrentValue) {
					case "0":
						$tbl_bangiaocv->trangthai->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$tbl_bangiaocv->trangthai->ViewValue = "Kich hoạt";
						break;
                                        case "2":
						$tbl_bangiaocv->trangthai->ViewValue = "Nội bộ";
						break;
					default:
						$tbl_bangiaocv->trangthai->ViewValue = $tbl_bangiaocv->trangthai->CurrentValue;
				}
			} else {
				$tbl_bangiaocv->trangthai->ViewValue = NULL;
			}
			$tbl_bangiaocv->trangthai->CssStyle = "";
			$tbl_bangiaocv->trangthai->CssClass = "";
			$tbl_bangiaocv->trangthai->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->HrefValue = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->HrefValue = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->HrefValue = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->HrefValue = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->HrefValue = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->HrefValue = "";

			// ghichu
			$tbl_bangiaocv->ghichu->HrefValue = "";

			// trangthai
			$tbl_bangiaocv->trangthai->HrefValue = "";
		} elseif ($tbl_bangiaocv->RowType == EW_ROWTYPE_ADD) { // Add row

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->EditCustomAttributes = "";
			$tbl_bangiaocv->tieude_congviec->EditValue = ew_HtmlEncode($tbl_bangiaocv->tieude_congviec->CurrentValue);

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->EditCustomAttributes = "";
			$tbl_bangiaocv->thoigian_diadiem->EditValue = ew_HtmlEncode($tbl_bangiaocv->thoigian_diadiem->CurrentValue);

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->EditCustomAttributes = "";
			$tbl_bangiaocv->phamvi_doituong->EditValue = ew_HtmlEncode($tbl_bangiaocv->phamvi_doituong->CurrentValue);

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->EditCustomAttributes = "";
			$tbl_bangiaocv->doituong_thuchien->EditValue = ew_HtmlEncode($tbl_bangiaocv->doituong_thuchien->CurrentValue);

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->EditCustomAttributes = "";
			$tbl_bangiaocv->thoigian_ketthuc->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_bangiaocv->thoigian_ketthuc->CurrentValue, 7));

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->EditCustomAttributes = "";
			$tbl_bangiaocv->thoigian_batdau->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_bangiaocv->thoigian_batdau->CurrentValue, 7));

			// ghichu
			$tbl_bangiaocv->ghichu->EditCustomAttributes = "";
			$tbl_bangiaocv->ghichu->EditValue = ew_HtmlEncode($tbl_bangiaocv->ghichu->CurrentValue);

			// trangthai
			$tbl_bangiaocv->trangthai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kich hoạt");
                        $arwrk[] = array("2", "Nội bộ");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$tbl_bangiaocv->trangthai->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$tbl_bangiaocv->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $tbl_bangiaocv;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($tbl_bangiaocv->tieude_congviec->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Tieude Congviec";
		}
		if ($tbl_bangiaocv->thoigian_diadiem->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Thoigian Diadiem";
		}
		if ($tbl_bangiaocv->phamvi_doituong->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Phamvi Doituong";
		}
		if ($tbl_bangiaocv->doituong_thuchien->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Doituong Thuchien";
		}
		if ($tbl_bangiaocv->thoigian_ketthuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Thoigian Ketthuc";
		}
		if (!ew_CheckEuroDate($tbl_bangiaocv->thoigian_ketthuc->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Thoigian Ketthuc";
		}
		if ($tbl_bangiaocv->thoigian_batdau->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Thoigian Batdau";
		}
		if (!ew_CheckEuroDate($tbl_bangiaocv->thoigian_batdau->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Thoigian Batdau";
		}
		if ($tbl_bangiaocv->trangthai->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Trangthai";
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
		global $conn, $Security, $tbl_bangiaocv;
		$rsnew = array();

		// Field tieude_congviec
		$tbl_bangiaocv->tieude_congviec->SetDbValueDef($tbl_bangiaocv->tieude_congviec->CurrentValue, NULL);
		$rsnew['tieude_congviec'] =& $tbl_bangiaocv->tieude_congviec->DbValue;

		// Field thoigian_diadiem
		$tbl_bangiaocv->thoigian_diadiem->SetDbValueDef($tbl_bangiaocv->thoigian_diadiem->CurrentValue, NULL);
		$rsnew['thoigian_diadiem'] =& $tbl_bangiaocv->thoigian_diadiem->DbValue;

		// Field phamvi_doituong
		$tbl_bangiaocv->phamvi_doituong->SetDbValueDef($tbl_bangiaocv->phamvi_doituong->CurrentValue, NULL);
		$rsnew['phamvi_doituong'] =& $tbl_bangiaocv->phamvi_doituong->DbValue;

		// Field doituong_thuchien
		$tbl_bangiaocv->doituong_thuchien->SetDbValueDef($tbl_bangiaocv->doituong_thuchien->CurrentValue, NULL);
		$rsnew['doituong_thuchien'] =& $tbl_bangiaocv->doituong_thuchien->DbValue;

		// Field thoigian_ketthuc
		$tbl_bangiaocv->thoigian_ketthuc->SetDbValueDef(ew_UnFormatDateTime($tbl_bangiaocv->thoigian_ketthuc->CurrentValue, 7), NULL);
		$rsnew['thoigian_ketthuc'] =& $tbl_bangiaocv->thoigian_ketthuc->DbValue;

		// Field thoigian_batdau
		$tbl_bangiaocv->thoigian_batdau->SetDbValueDef(ew_UnFormatDateTime($tbl_bangiaocv->thoigian_batdau->CurrentValue, 7), NULL);
		$rsnew['thoigian_batdau'] =& $tbl_bangiaocv->thoigian_batdau->DbValue;

		// Field ghichu
		$tbl_bangiaocv->ghichu->SetDbValueDef($tbl_bangiaocv->ghichu->CurrentValue, NULL);
		$rsnew['ghichu'] =& $tbl_bangiaocv->ghichu->DbValue;

		// Field trangthai
		$tbl_bangiaocv->trangthai->SetDbValueDef($tbl_bangiaocv->trangthai->CurrentValue, NULL);
		$rsnew['trangthai'] =& $tbl_bangiaocv->trangthai->DbValue;

		// Call Row Inserting event
		$bInsertRow = $tbl_bangiaocv->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($tbl_bangiaocv->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($tbl_bangiaocv->CancelMessage <> "") {
				$this->setMessage($tbl_bangiaocv->CancelMessage);
				$tbl_bangiaocv->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$tbl_bangiaocv->bangiao_id->setDbValue($conn->Insert_ID());
			$rsnew['bangiao_id'] =& $tbl_bangiaocv->bangiao_id->DbValue;

			// Call Row Inserted event
			$tbl_bangiaocv->Row_Inserted($rsnew);
		}
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
