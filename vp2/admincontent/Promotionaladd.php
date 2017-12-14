<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Promotionalinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "securimage.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$Promotional_add = new cPromotional_add();
$Page =& $Promotional_add;

// Page init processing
$Promotional_add->Page_Init();

// Page main processing
$Promotional_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var Promotional_add = new ew_Page("Promotional_add");

// page properties
Promotional_add.PageID = "add"; // page ID
var EW_PAGE_ID = Promotional_add.PageID; // for backward compatibility

// extend page with ValidateForm function
Promotional_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tieude_tintuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tieude Tintuc");
		elm = fobj.elements["x" + infix + "_tomtat_tintuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tomtat Tintuc");
		elm = fobj.elements["x" + infix + "_anh_tintuc"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_noidung_tintuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Noidung Tintuc");
		elm = fobj.elements["x" + infix + "_hienthi_tungay"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Hienthi Tungay");
		elm = fobj.elements["x" + infix + "_hienthi_tungay"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay");
		elm = fobj.elements["x" + infix + "_hienthi_denngay"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Hienthi Denngay");
		elm = fobj.elements["x" + infix + "_hienthi_denngay"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
Promotional_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Promotional_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Promotional_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Promotional_add.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $Promotional->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm danh mục tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $Promotional_add->ShowMessage() ?>
<form name="fPromotionaladd" id="fPromotionaladd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data">
<p>
<input type="hidden" name="t" id="t" value="Promotional">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($Promotional->tieude_tintuc->Visible) { // tieude_tintuc ?>
	<tr<?php echo $Promotional->tieude_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Promotional->tieude_tintuc->CellAttributes() ?>><span id="el_tieude_tintuc">
<input type="text" name="x_tieude_tintuc" id="x_tieude_tintuc" size="100" maxlength="255" value="<?php echo $Promotional->tieude_tintuc->EditValue ?>"<?php echo $Promotional->tieude_tintuc->EditAttributes() ?>>
</span><?php echo $Promotional->tieude_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->tukhoa_tintuc->Visible) { // tukhoa_tintuc ?>
	<tr<?php echo $Promotional->tukhoa_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Từ khóa</td>
		<td<?php echo $Promotional->tukhoa_tintuc->CellAttributes() ?>><span id="el_tukhoa_tintuc">
<input type="text" name="x_tukhoa_tintuc" id="x_tukhoa_tintuc" size="100" maxlength="255" value="<?php echo $Promotional->tukhoa_tintuc->EditValue ?>"<?php echo $Promotional->tukhoa_tintuc->EditAttributes() ?>>
</span><?php echo $Promotional->tukhoa_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->tomtat_tintuc->Visible) { // tomtat_tintuc ?>
	<tr<?php echo $Promotional->tomtat_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Promotional->tomtat_tintuc->CellAttributes() ?>><span id="el_tomtat_tintuc">
<textarea name="x_tomtat_tintuc" id="x_tomtat_tintuc" cols="45" rows="6"<?php echo $Promotional->tomtat_tintuc->EditAttributes() ?>><?php echo $Promotional->tomtat_tintuc->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_tomtat_tintuc", function() {
	var oCKeditor = CKEDITOR.replace('x_tomtat_tintuc', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $Promotional->tomtat_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->anh_tintuc->Visible) { // anh_tintuc ?>
	<tr<?php echo $Promotional->anh_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $Promotional->anh_tintuc->CellAttributes() ?>><span id="el_anh_tintuc">
<input type="file" name="x_anh_tintuc" id="x_anh_tintuc" size="30"<?php echo $Promotional->anh_tintuc->EditAttributes() ?>>
</div>
</span><?php echo $Promotional->anh_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->nguon_tintuc->Visible) { // nguon_tintuc ?>
	<tr<?php echo $Promotional->nguon_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn nhập</td>
		<td<?php echo $Promotional->nguon_tintuc->CellAttributes() ?>><span id="el_nguon_tintuc">
<input type="text" name="x_nguon_tintuc" id="x_nguon_tintuc" size="100" maxlength="255" value="<?php echo $Promotional->nguon_tintuc->EditValue ?>"<?php echo $Promotional->nguon_tintuc->EditAttributes() ?>>
</span><?php echo $Promotional->nguon_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->noidung_tintuc->Visible) { // noidung_tintuc ?>
	<tr<?php echo $Promotional->noidung_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Promotional->noidung_tintuc->CellAttributes() ?>><span id="el_noidung_tintuc">
<textarea name="x_noidung_tintuc" id="x_noidung_tintuc" cols="45" rows="10"<?php echo $Promotional->noidung_tintuc->EditAttributes() ?>><?php echo $Promotional->noidung_tintuc->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_noidung_tintuc", function() {
	var oCKeditor = CKEDITOR.replace('x_noidung_tintuc', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $Promotional->noidung_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->lienket_tintuc->Visible) { // lienket_tintuc ?>
	<tr<?php echo $Promotional->lienket_tintuc->RowAttributes ?>>
		<td class="ewTableHeader">Liên kết tin</td>
		<td<?php echo $Promotional->lienket_tintuc->CellAttributes() ?>><span id="el_lienket_tintuc">
<input type="text" name="x_lienket_tintuc" id="x_lienket_tintuc" size="100" maxlength="255" value="<?php echo $Promotional->lienket_tintuc->EditValue ?>"<?php echo $Promotional->lienket_tintuc->EditAttributes() ?>>
</span><?php echo $Promotional->lienket_tintuc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->hienthi_tungay->Visible) { // hienthi_tungay ?>
	<tr<?php echo $Promotional->hienthi_tungay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị từ ngày<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Promotional->hienthi_tungay->CellAttributes() ?>><span id="el_hienthi_tungay">
<input type="text" name="x_hienthi_tungay" id="x_hienthi_tungay" value="<?php echo $Promotional->hienthi_tungay->EditValue ?>"<?php echo $Promotional->hienthi_tungay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_hienthi_tungay" name="cal_x_hienthi_tungay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_hienthi_tungay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_hienthi_tungay" // ID of the button
});
</script>
</span><?php echo $Promotional->hienthi_tungay->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($Promotional->hienthi_denngay->Visible) { // hienthi_denngay ?>
	<tr<?php echo $Promotional->hienthi_denngay->RowAttributes ?>>
		<td class="ewTableHeader">Hiển thị đến ngày<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $Promotional->hienthi_denngay->CellAttributes() ?>><span id="el_hienthi_denngay">
<input type="text" name="x_hienthi_denngay" id="x_hienthi_denngay" value="<?php echo $Promotional->hienthi_denngay->EditValue ?>"<?php echo $Promotional->hienthi_denngay->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_hienthi_denngay" name="cal_x_hienthi_denngay" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_hienthi_denngay", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_hienthi_denngay" // ID of the button
});
</script>
</span><?php echo $Promotional->hienthi_denngay->CustomMsg ?></td>
	</tr>
<?php } ?>
<td class="ewTableHeader">Mã xác nhận</td>
	<td>
		<img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" align="absmiddle" border="0"></a><br>
		<a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" size="30" maxlength="4">
	</td>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Thêm mới    " onclick="ew_SubmitForm(Promotional_add, this.form);">
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
class cPromotional_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'Promotional';

	// Page Object Name
	var $PageObjName = 'Promotional_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Promotional;
		if ($Promotional->UseTokenInUrl) $PageUrl .= "t=" . $Promotional->TableVar . "&"; // add page token
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
		global $objForm, $Promotional;
		if ($Promotional->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Promotional->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Promotional->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cPromotional_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["Promotional"] = new cPromotional();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Promotional', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Promotional;
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
			$this->Page_Terminate("Promotionallist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("Promotionallist.php");
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
	var $x_ewPriv = 0;

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $Promotional;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["tintuc_id"] != "") {
		  $Promotional->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $Promotional->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$Promotional->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $Promotional->CurrentAction = "C"; // Copy Record
		  } else {
		    $Promotional->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($Promotional->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("Promotionallist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$Promotional->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm tin"); // Set up success message
					$sReturnUrl = $Promotional->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "Promotionalview.php")
						$sReturnUrl = $Promotional->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$Promotional->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $Promotional;

		// Get upload data
			if ($Promotional->anh_tintuc->Upload->UploadFile()) {

				// No action required
			} else {
				echo $Promotional->anh_tintuc->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $Promotional;
		$Promotional->anh_tintuc->CurrentValue = NULL; // Clear file related field
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $Promotional;
		$Promotional->tieude_tintuc->setFormValue($objForm->GetValue("x_tieude_tintuc"));
		$Promotional->tukhoa_tintuc->setFormValue($objForm->GetValue("x_tukhoa_tintuc"));
		$Promotional->tomtat_tintuc->setFormValue($objForm->GetValue("x_tomtat_tintuc"));
		$Promotional->nguon_tintuc->setFormValue($objForm->GetValue("x_nguon_tintuc"));
		$Promotional->noidung_tintuc->setFormValue($objForm->GetValue("x_noidung_tintuc"));
		$Promotional->lienket_tintuc->setFormValue($objForm->GetValue("x_lienket_tintuc"));
		$Promotional->hienthi_tungay->setFormValue($objForm->GetValue("x_hienthi_tungay"));
		$Promotional->hienthi_tungay->CurrentValue = ew_UnFormatDateTime($Promotional->hienthi_tungay->CurrentValue, 7);
		$Promotional->hienthi_denngay->setFormValue($objForm->GetValue("x_hienthi_denngay"));
		$Promotional->hienthi_denngay->CurrentValue = ew_UnFormatDateTime($Promotional->hienthi_denngay->CurrentValue, 7);
		$Promotional->tintuc_id->setFormValue($objForm->GetValue("x_tintuc_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $Promotional;
		$Promotional->tintuc_id->CurrentValue = $Promotional->tintuc_id->FormValue;
		$Promotional->tieude_tintuc->CurrentValue = $Promotional->tieude_tintuc->FormValue;
		$Promotional->tukhoa_tintuc->CurrentValue = $Promotional->tukhoa_tintuc->FormValue;
		$Promotional->tomtat_tintuc->CurrentValue = $Promotional->tomtat_tintuc->FormValue;
		$Promotional->nguon_tintuc->CurrentValue = $Promotional->nguon_tintuc->FormValue;
		$Promotional->noidung_tintuc->CurrentValue = $Promotional->noidung_tintuc->FormValue;
		$Promotional->lienket_tintuc->CurrentValue = $Promotional->lienket_tintuc->FormValue;
		$Promotional->hienthi_tungay->CurrentValue = $Promotional->hienthi_tungay->FormValue;
		$Promotional->hienthi_tungay->CurrentValue = ew_UnFormatDateTime($Promotional->hienthi_tungay->CurrentValue, 7);
		$Promotional->hienthi_denngay->CurrentValue = $Promotional->hienthi_denngay->FormValue;
		$Promotional->hienthi_denngay->CurrentValue = ew_UnFormatDateTime($Promotional->hienthi_denngay->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Promotional;
		$sFilter = $Promotional->KeyFilter();

		// Call Row Selecting event
		$Promotional->Row_Selecting($sFilter);

		// Load sql based on filter
		$Promotional->CurrentFilter = $sFilter;
		$sSql = $Promotional->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Promotional->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Promotional;
		$Promotional->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$Promotional->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Promotional->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$Promotional->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$Promotional->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$Promotional->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$Promotional->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$Promotional->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$Promotional->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$Promotional->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$Promotional->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$Promotional->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$Promotional->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$Promotional->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$Promotional->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Promotional->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$Promotional->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Promotional;

		// Call Row_Rendering event
		$Promotional->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$Promotional->tieude_tintuc->CellCssStyle = "";
		$Promotional->tieude_tintuc->CellCssClass = "";

		// tukhoa_tintuc
		$Promotional->tukhoa_tintuc->CellCssStyle = "";
		$Promotional->tukhoa_tintuc->CellCssClass = "";

		// tomtat_tintuc
		$Promotional->tomtat_tintuc->CellCssStyle = "";
		$Promotional->tomtat_tintuc->CellCssClass = "";

		// anh_tintuc
		$Promotional->anh_tintuc->CellCssStyle = "";
		$Promotional->anh_tintuc->CellCssClass = "";

		// nguon_tintuc
		$Promotional->nguon_tintuc->CellCssStyle = "";
		$Promotional->nguon_tintuc->CellCssClass = "";

		// noidung_tintuc
		$Promotional->noidung_tintuc->CellCssStyle = "";
		$Promotional->noidung_tintuc->CellCssClass = "";

		// lienket_tintuc
		$Promotional->lienket_tintuc->CellCssStyle = "";
		$Promotional->lienket_tintuc->CellCssClass = "";

		// hienthi_tungay
		$Promotional->hienthi_tungay->CellCssStyle = "";
		$Promotional->hienthi_tungay->CellCssClass = "";

		// hienthi_denngay
		$Promotional->hienthi_denngay->CellCssStyle = "";
		$Promotional->hienthi_denngay->CellCssClass = "";
		if ($Promotional->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$Promotional->tieude_tintuc->ViewValue = $Promotional->tieude_tintuc->CurrentValue;
			$Promotional->tieude_tintuc->CssStyle = "";
			$Promotional->tieude_tintuc->CssClass = "";
			$Promotional->tieude_tintuc->ViewCustomAttributes = "";

			// tukhoa_tintuc
			$Promotional->tukhoa_tintuc->ViewValue = $Promotional->tukhoa_tintuc->CurrentValue;
			$Promotional->tukhoa_tintuc->CssStyle = "";
			$Promotional->tukhoa_tintuc->CssClass = "";
			$Promotional->tukhoa_tintuc->ViewCustomAttributes = "";

			// tomtat_tintuc
			$Promotional->tomtat_tintuc->ViewValue = $Promotional->tomtat_tintuc->CurrentValue;
			$Promotional->tomtat_tintuc->CssStyle = "";
			$Promotional->tomtat_tintuc->CssClass = "";
			$Promotional->tomtat_tintuc->ViewCustomAttributes = "";

			// anh_tintuc
			if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) {
				$Promotional->anh_tintuc->ViewValue = $Promotional->anh_tintuc->Upload->DbValue;
				$Promotional->anh_tintuc->ImageWidth = 150;
				$Promotional->anh_tintuc->ImageHeight = 0;
				$Promotional->anh_tintuc->ImageAlt = "";
			} else {
				$Promotional->anh_tintuc->ViewValue = "";
			}
			$Promotional->anh_tintuc->CssStyle = "";
			$Promotional->anh_tintuc->CssClass = "";
			$Promotional->anh_tintuc->ViewCustomAttributes = "";

			// nguon_tintuc
			$Promotional->nguon_tintuc->ViewValue = $Promotional->nguon_tintuc->CurrentValue;
			$Promotional->nguon_tintuc->CssStyle = "";
			$Promotional->nguon_tintuc->CssClass = "";
			$Promotional->nguon_tintuc->ViewCustomAttributes = "";

			// noidung_tintuc
			$Promotional->noidung_tintuc->ViewValue = $Promotional->noidung_tintuc->CurrentValue;
			$Promotional->noidung_tintuc->CssStyle = "";
			$Promotional->noidung_tintuc->CssClass = "";
			$Promotional->noidung_tintuc->ViewCustomAttributes = "";

			// lienket_tintuc
			$Promotional->lienket_tintuc->ViewValue = $Promotional->lienket_tintuc->CurrentValue;
			$Promotional->lienket_tintuc->CssStyle = "";
			$Promotional->lienket_tintuc->CssClass = "";
			$Promotional->lienket_tintuc->ViewCustomAttributes = "";

			// hienthi_tungay
			$Promotional->hienthi_tungay->ViewValue = $Promotional->hienthi_tungay->CurrentValue;
			$Promotional->hienthi_tungay->ViewValue = ew_FormatDateTime($Promotional->hienthi_tungay->ViewValue, 7);
			$Promotional->hienthi_tungay->CssStyle = "";
			$Promotional->hienthi_tungay->CssClass = "";
			$Promotional->hienthi_tungay->ViewCustomAttributes = "";

			// hienthi_denngay
			$Promotional->hienthi_denngay->ViewValue = $Promotional->hienthi_denngay->CurrentValue;
			$Promotional->hienthi_denngay->ViewValue = ew_FormatDateTime($Promotional->hienthi_denngay->ViewValue, 7);
			$Promotional->hienthi_denngay->CssStyle = "";
			$Promotional->hienthi_denngay->CssClass = "";
			$Promotional->hienthi_denngay->ViewCustomAttributes = "";

			// tieude_tintuc
			$Promotional->tieude_tintuc->HrefValue = "";

			// tukhoa_tintuc
			$Promotional->tukhoa_tintuc->HrefValue = "";

			// tomtat_tintuc
			$Promotional->tomtat_tintuc->HrefValue = "";

			// anh_tintuc
			if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) {
				$Promotional->anh_tintuc->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($Promotional->anh_tintuc->ViewValue)) ? $Promotional->anh_tintuc->ViewValue : $Promotional->anh_tintuc->CurrentValue);
				if ($Promotional->Export <> "") $Promotional->anh_tintuc->HrefValue = ew_ConvertFullUrl($Promotional->anh_tintuc->HrefValue);
			} else {
				$Promotional->anh_tintuc->HrefValue = "";
			}

			// nguon_tintuc
			$Promotional->nguon_tintuc->HrefValue = "";

			// noidung_tintuc
			$Promotional->noidung_tintuc->HrefValue = "";

			// lienket_tintuc
			$Promotional->lienket_tintuc->HrefValue = "";

			// hienthi_tungay
			$Promotional->hienthi_tungay->HrefValue = "";

			// hienthi_denngay
			$Promotional->hienthi_denngay->HrefValue = "";
		} elseif ($Promotional->RowType == EW_ROWTYPE_ADD) { // Add row

			// tieude_tintuc
			$Promotional->tieude_tintuc->EditCustomAttributes = "";
			$Promotional->tieude_tintuc->EditValue = ew_HtmlEncode($Promotional->tieude_tintuc->CurrentValue);

			// tukhoa_tintuc
			$Promotional->tukhoa_tintuc->EditCustomAttributes = "";
			$Promotional->tukhoa_tintuc->EditValue = ew_HtmlEncode($Promotional->tukhoa_tintuc->CurrentValue);

			// tomtat_tintuc
			$Promotional->tomtat_tintuc->EditCustomAttributes = "";
			$Promotional->tomtat_tintuc->EditValue = ew_HtmlEncode($Promotional->tomtat_tintuc->CurrentValue);

			// anh_tintuc
			$Promotional->anh_tintuc->EditCustomAttributes = "";
			if (!is_null($Promotional->anh_tintuc->Upload->DbValue)) {
				$Promotional->anh_tintuc->EditValue = $Promotional->anh_tintuc->Upload->DbValue;
				$Promotional->anh_tintuc->ImageWidth = 150;
				$Promotional->anh_tintuc->ImageHeight = 0;
				$Promotional->anh_tintuc->ImageAlt = "";
			} else {
				$Promotional->anh_tintuc->EditValue = "";
			}

			// nguon_tintuc
			$Promotional->nguon_tintuc->EditCustomAttributes = "";
			$Promotional->nguon_tintuc->EditValue = ew_HtmlEncode($Promotional->nguon_tintuc->CurrentValue);

			// noidung_tintuc
			$Promotional->noidung_tintuc->EditCustomAttributes = "";
			$Promotional->noidung_tintuc->EditValue = ew_HtmlEncode($Promotional->noidung_tintuc->CurrentValue);

			// lienket_tintuc
			$Promotional->lienket_tintuc->EditCustomAttributes = "";
			$Promotional->lienket_tintuc->EditValue = ew_HtmlEncode($Promotional->lienket_tintuc->CurrentValue);

			// hienthi_tungay
			$Promotional->hienthi_tungay->EditCustomAttributes = "";
			$Promotional->hienthi_tungay->EditValue = ew_HtmlEncode(ew_FormatDateTime($Promotional->hienthi_tungay->CurrentValue, 7));

			// hienthi_denngay
			$Promotional->hienthi_denngay->EditCustomAttributes = "";
			$Promotional->hienthi_denngay->EditValue = ew_HtmlEncode(ew_FormatDateTime($Promotional->hienthi_denngay->CurrentValue, 7));
		}

		// Call Row Rendered event
		$Promotional->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $Promotional;

		// Initialize
		$gsFormError = "";
		/*if (!ew_CheckFileType($Promotional->anh_tintuc->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($Promotional->anh_tintuc->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($Promotional->anh_tintuc->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($Promotional->tieude_tintuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tieude Tintuc";
		}
		if ($Promotional->tomtat_tintuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tomtat Tintuc";
		}
		if ($Promotional->noidung_tintuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Noidung Tintuc";
		}
		if ($Promotional->hienthi_tungay->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Hienthi Tungay";
		}
		if (!ew_CheckEuroDate($Promotional->hienthi_tungay->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Tungay";
		}
		if ($Promotional->hienthi_denngay->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Hienthi Denngay";
		}
		if (!ew_CheckEuroDate($Promotional->hienthi_denngay->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Hienthi Denngay";
		}*/
		$img = new Securimage();
  			$valid = $img->check($_POST['x_maxacnhan']);
  			if($valid == true) {
    			
 			} else {
    			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Mã xác nhận không đúng";
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
		global $conn, $Security, $Promotional;
		$rsnew = array();

		// Field tieude_tintuc
		$Promotional->tieude_tintuc->SetDbValueDef($Promotional->tieude_tintuc->CurrentValue, "");
		$rsnew['tieude_tintuc'] =& $Promotional->tieude_tintuc->DbValue;

		// Field tukhoa_tintuc
		$Promotional->tukhoa_tintuc->SetDbValueDef($Promotional->tukhoa_tintuc->CurrentValue, NULL);
		$rsnew['tukhoa_tintuc'] =& $Promotional->tukhoa_tintuc->DbValue;

		// Field tomtat_tintuc
		$Promotional->tomtat_tintuc->SetDbValueDef($Promotional->tomtat_tintuc->CurrentValue, "");
		$rsnew['tomtat_tintuc'] =& $Promotional->tomtat_tintuc->DbValue;

		// Field anh_tintuc
		$Promotional->anh_tintuc->Upload->SaveToSession(); // Save file value to Session
		if (is_null($Promotional->anh_tintuc->Upload->Value)) {
			$rsnew['anh_tintuc'] = NULL;
		} else {
			$rsnew['anh_tintuc'] = ew_UploadFileNameEx(ew_UploadPathEx(True, EW_UPLOAD_DEST_PATH), $Promotional->anh_tintuc->Upload->FileName);
		}

		// Field nguon_tintuc
		$Promotional->nguon_tintuc->SetDbValueDef($Promotional->nguon_tintuc->CurrentValue, NULL);
		$rsnew['nguon_tintuc'] =& $Promotional->nguon_tintuc->DbValue;

		// Field noidung_tintuc
		$Promotional->noidung_tintuc->SetDbValueDef($Promotional->noidung_tintuc->CurrentValue, "");
		$rsnew['noidung_tintuc'] =& $Promotional->noidung_tintuc->DbValue;

		// Field lienket_tintuc
		$Promotional->lienket_tintuc->SetDbValueDef($Promotional->lienket_tintuc->CurrentValue, NULL);
		$rsnew['lienket_tintuc'] =& $Promotional->lienket_tintuc->DbValue;

		// Field hienthi_tungay
		$Promotional->hienthi_tungay->SetDbValueDef(ew_UnFormatDateTime($Promotional->hienthi_tungay->CurrentValue, 7), ew_CurrentDate());
		$rsnew['hienthi_tungay'] =& $Promotional->hienthi_tungay->DbValue;

		// Field hienthi_denngay
		$Promotional->hienthi_denngay->SetDbValueDef(ew_UnFormatDateTime($Promotional->hienthi_denngay->CurrentValue, 7), ew_CurrentDate());
		$rsnew['hienthi_denngay'] =& $Promotional->hienthi_denngay->DbValue;
		// Field thoi gian them
		$Promotional->thoigian_them->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_them'] =& $Promotional->thoigian_them->DbValue;
		// 	Field thoi gian sua
		$Promotional->thoigian_sua->SetDbValueDef(ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['thoigian_sua'] =& $Promotional->thoigian_sua->DbValue;
		
		// Field nguoidung_id
		//if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
			$rsnew['nguoidung_id'] = CurrentUserID();
		//}

		// Call Row Inserting event
		$bInsertRow = $Promotional->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field anh_tintuc
			if (!is_null($Promotional->anh_tintuc->Upload->Value)) {
				if ($Promotional->anh_tintuc->Upload->FileName == $Promotional->anh_tintuc->Upload->DbValue) { // Overwrite if same file name
					$Promotional->anh_tintuc->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_tintuc'], TRUE);
					$Promotional->anh_tintuc->Upload->DbValue = ""; // No need to delete any more
				} else {
					$Promotional->anh_tintuc->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['anh_tintuc'], FALSE);
				}
			}
			if ($Promotional->anh_tintuc->Upload->Action == "2" || $Promotional->anh_tintuc->Upload->Action == "3") { // Update/Remove
				if ($Promotional->anh_tintuc->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $Promotional->anh_tintuc->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($Promotional->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($Promotional->CancelMessage <> "") {
				$this->setMessage($Promotional->CancelMessage);
				$Promotional->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$Promotional->tintuc_id->setDbValue($conn->Insert_ID());
			$rsnew['tintuc_id'] =& $Promotional->tintuc_id->DbValue;

			// Call Row Inserted event
			$Promotional->Row_Inserted($rsnew);
		}

		// Field anh_tintuc
		$Promotional->anh_tintuc->Upload->RemoveFromSession(); // Remove file value from Session
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
