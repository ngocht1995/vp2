<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_manager_servicesinfo.php" ?>
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
$t_manager_services_add = new ct_manager_services_add();
$Page =& $t_manager_services_add;

// Page init processing
$t_manager_services_add->Page_Init();

// Page main processing
$t_manager_services_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_manager_services_add = new ew_Page("t_manager_services_add");

// page properties
t_manager_services_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_manager_services_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_manager_services_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_name_ser"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Name Ser");
		elm = fobj.elements["x" + infix + "_code_ser"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Code Ser");
		elm = fobj.elements["x" + infix + "_active_ser"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Active Ser");
		elm = fobj.elements["x" + infix + "_oder"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Oder");
		elm = fobj.elements["x" + infix + "_oder"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Oder");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_manager_services_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_manager_services_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_manager_services_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_manager_services_add.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý Webserviecs"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $t_manager_services->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_manager_services_add->ShowMessage() ?>
<form name="ft_manager_servicesadd" id="ft_manager_servicesadd" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_manager_services">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_manager_services->name_ser->Visible) { // name_ser ?>
	<tr<?php echo $t_manager_services->name_ser->RowAttributes ?>>
		<td class="ewTableHeader">Tên Services<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_manager_services->name_ser->CellAttributes() ?>><span id="el_name_ser">
<input type="text" name="x_name_ser" id="x_name_ser" size="60" maxlength="255" value="<?php echo $t_manager_services->name_ser->EditValue ?>"<?php echo $t_manager_services->name_ser->EditAttributes() ?>>
</span><?php echo $t_manager_services->name_ser->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_manager_services->code_ser->Visible) { // code_ser ?>
	<tr<?php echo $t_manager_services->code_ser->RowAttributes ?>>
		<td class="ewTableHeader">Mã Services<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_manager_services->code_ser->CellAttributes() ?>><span id="el_code_ser">
<input type="text" name="x_code_ser" id="x_code_ser" size="60" maxlength="255" value="<?php echo $t_manager_services->code_ser->EditValue ?>"<?php echo $t_manager_services->code_ser->EditAttributes() ?>>
</span><?php echo $t_manager_services->code_ser->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_manager_services->descript_ser->Visible) { // descript_ser ?>
	<tr<?php echo $t_manager_services->descript_ser->RowAttributes ?>>
		<td class="ewTableHeader">Diễn giải Services</td>
		<td<?php echo $t_manager_services->descript_ser->CellAttributes() ?>><span id="el_descript_ser">
<textarea name="x_descript_ser" id="x_descript_ser" cols="45" rows="4"<?php echo $t_manager_services->descript_ser->EditAttributes() ?>><?php echo $t_manager_services->descript_ser->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_descript_ser", function() {
	var oCKeditor = CKEDITOR.replace('x_descript_ser', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_manager_services->descript_ser->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_manager_services->active_ser->Visible) { // active_ser ?>
	<tr<?php echo $t_manager_services->active_ser->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái Services<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_manager_services->active_ser->CellAttributes() ?>><span id="el_active_ser">
<select id="x_active_ser" name="x_active_ser"<?php echo $t_manager_services->active_ser->EditAttributes() ?>>
<?php
if (is_array($t_manager_services->active_ser->EditValue)) {
	$arwrk = $t_manager_services->active_ser->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_manager_services->active_ser->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_manager_services->active_ser->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_manager_services->oder->Visible) { // oder ?>
	<tr<?php echo $t_manager_services->oder->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_manager_services->oder->CellAttributes() ?>><span id="el_oder">
<input type="text" name="x_oder" id="x_oder" size="5" value="<?php echo $t_manager_services->oder->EditValue ?>"<?php echo $t_manager_services->oder->EditAttributes() ?>>
</span><?php echo $t_manager_services->oder->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="button" name="btnAction" id="btnAction" value="    Add    " onclick="ew_SubmitForm(t_manager_services_add, this.form);">
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
class ct_manager_services_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_manager_services';

	// Page Object Name
	var $PageObjName = 't_manager_services_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_manager_services;
		if ($t_manager_services->UseTokenInUrl) $PageUrl .= "t=" . $t_manager_services->TableVar . "&"; // add page token
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
		global $objForm, $t_manager_services;
		if ($t_manager_services->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_manager_services->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_manager_services->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_manager_services_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_manager_services"] = new ct_manager_services();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_manager_services', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_manager_services;
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
			$this->Page_Terminate("t_manager_serviceslist.php");
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
		global $objForm, $gsFormError, $t_manager_services;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["services_id"] != "") {
		  $t_manager_services->services_id->setQueryStringValue($_GET["services_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_manager_services->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_manager_services->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_manager_services->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_manager_services->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_manager_services->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("t_manager_serviceslist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_manager_services->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $t_manager_services->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_manager_servicesview.php")
						$sReturnUrl = $t_manager_services->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_manager_services->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_manager_services;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_manager_services;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_manager_services;
		$t_manager_services->name_ser->setFormValue($objForm->GetValue("x_name_ser"));
		$t_manager_services->code_ser->setFormValue($objForm->GetValue("x_code_ser"));
		$t_manager_services->descript_ser->setFormValue($objForm->GetValue("x_descript_ser"));
		$t_manager_services->active_ser->setFormValue($objForm->GetValue("x_active_ser"));
		$t_manager_services->user_add->setFormValue($objForm->GetValue("x_user_add"));
		$t_manager_services->datime_add->setFormValue($objForm->GetValue("x_datime_add"));
		$t_manager_services->datime_add->CurrentValue = ew_UnFormatDateTime($t_manager_services->datime_add->CurrentValue, 7);
		$t_manager_services->oder->setFormValue($objForm->GetValue("x_oder"));
		$t_manager_services->services_id->setFormValue($objForm->GetValue("x_services_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_manager_services;
		$t_manager_services->services_id->CurrentValue = $t_manager_services->services_id->FormValue;
		$t_manager_services->name_ser->CurrentValue = $t_manager_services->name_ser->FormValue;
		$t_manager_services->code_ser->CurrentValue = $t_manager_services->code_ser->FormValue;
		$t_manager_services->descript_ser->CurrentValue = $t_manager_services->descript_ser->FormValue;
		$t_manager_services->active_ser->CurrentValue = $t_manager_services->active_ser->FormValue;
		$t_manager_services->user_add->CurrentValue = $t_manager_services->user_add->FormValue;
		$t_manager_services->datime_add->CurrentValue = $t_manager_services->datime_add->FormValue;
		$t_manager_services->datime_add->CurrentValue = ew_UnFormatDateTime($t_manager_services->datime_add->CurrentValue, 7);
		$t_manager_services->oder->CurrentValue = $t_manager_services->oder->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_manager_services;
		$sFilter = $t_manager_services->KeyFilter();

		// Call Row Selecting event
		$t_manager_services->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_manager_services->CurrentFilter = $sFilter;
		$sSql = $t_manager_services->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_manager_services->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_manager_services;
		$t_manager_services->services_id->setDbValue($rs->fields('services_id'));
		$t_manager_services->name_ser->setDbValue($rs->fields('name_ser'));
		$t_manager_services->code_ser->setDbValue($rs->fields('code_ser'));
		$t_manager_services->descript_ser->setDbValue($rs->fields('descript_ser'));
		$t_manager_services->active_ser->setDbValue($rs->fields('active_ser'));
		$t_manager_services->user_add->setDbValue($rs->fields('user_add'));
		$t_manager_services->datime_add->setDbValue($rs->fields('datime_add'));
		$t_manager_services->user_edit->setDbValue($rs->fields('user_edit'));
		$t_manager_services->datime_edit->setDbValue($rs->fields('datime_edit'));
		$t_manager_services->oder->setDbValue($rs->fields('oder'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_manager_services;

		// Call Row_Rendering event
		$t_manager_services->Row_Rendering();

		// Common render codes for all row types
		// name_ser

		$t_manager_services->name_ser->CellCssStyle = "";
		$t_manager_services->name_ser->CellCssClass = "";

		// code_ser
		$t_manager_services->code_ser->CellCssStyle = "";
		$t_manager_services->code_ser->CellCssClass = "";

		// descript_ser
		$t_manager_services->descript_ser->CellCssStyle = "";
		$t_manager_services->descript_ser->CellCssClass = "";

		// active_ser
		$t_manager_services->active_ser->CellCssStyle = "";
		$t_manager_services->active_ser->CellCssClass = "";

		// user_add
		$t_manager_services->user_add->CellCssStyle = "";
		$t_manager_services->user_add->CellCssClass = "";

		// datime_add
		$t_manager_services->datime_add->CellCssStyle = "";
		$t_manager_services->datime_add->CellCssClass = "";

		// oder
		$t_manager_services->oder->CellCssStyle = "";
		$t_manager_services->oder->CellCssClass = "";
		if ($t_manager_services->RowType == EW_ROWTYPE_VIEW) { // View row

			// services_id
			$t_manager_services->services_id->ViewValue = $t_manager_services->services_id->CurrentValue;
			$t_manager_services->services_id->CssStyle = "";
			$t_manager_services->services_id->CssClass = "";
			$t_manager_services->services_id->ViewCustomAttributes = "";

			// name_ser
			$t_manager_services->name_ser->ViewValue = $t_manager_services->name_ser->CurrentValue;
			$t_manager_services->name_ser->CssStyle = "";
			$t_manager_services->name_ser->CssClass = "";
			$t_manager_services->name_ser->ViewCustomAttributes = "";

			// code_ser
			$t_manager_services->code_ser->ViewValue = $t_manager_services->code_ser->CurrentValue;
			$t_manager_services->code_ser->CssStyle = "";
			$t_manager_services->code_ser->CssClass = "";
			$t_manager_services->code_ser->ViewCustomAttributes = "";

			// descript_ser
			$t_manager_services->descript_ser->ViewValue = $t_manager_services->descript_ser->CurrentValue;
			$t_manager_services->descript_ser->CssStyle = "";
			$t_manager_services->descript_ser->CssClass = "";
			$t_manager_services->descript_ser->ViewCustomAttributes = "";

			// active_ser
			if (strval($t_manager_services->active_ser->CurrentValue) <> "") {
				switch ($t_manager_services->active_ser->CurrentValue) {
					case "0":
						$t_manager_services->active_ser->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_manager_services->active_ser->ViewValue = "Kích hoạt";
						break;
					default:
						$t_manager_services->active_ser->ViewValue = $t_manager_services->active_ser->CurrentValue;
				}
			} else {
				$t_manager_services->active_ser->ViewValue = NULL;
			}
			$t_manager_services->active_ser->CssStyle = "";
			$t_manager_services->active_ser->CssClass = "";
			$t_manager_services->active_ser->ViewCustomAttributes = "";

			// user_add
			$t_manager_services->user_add->ViewValue = $t_manager_services->user_add->CurrentValue;
			$t_manager_services->user_add->CssStyle = "";
			$t_manager_services->user_add->CssClass = "";
			$t_manager_services->user_add->ViewCustomAttributes = "";

			// datime_add
			$t_manager_services->datime_add->ViewValue = $t_manager_services->datime_add->CurrentValue;
			$t_manager_services->datime_add->ViewValue = ew_FormatDateTime($t_manager_services->datime_add->ViewValue, 7);
			$t_manager_services->datime_add->CssStyle = "";
			$t_manager_services->datime_add->CssClass = "";
			$t_manager_services->datime_add->ViewCustomAttributes = "";

			// user_edit
			$t_manager_services->user_edit->ViewValue = $t_manager_services->user_edit->CurrentValue;
			$t_manager_services->user_edit->CssStyle = "";
			$t_manager_services->user_edit->CssClass = "";
			$t_manager_services->user_edit->ViewCustomAttributes = "";

			// datime_edit
			$t_manager_services->datime_edit->ViewValue = $t_manager_services->datime_edit->CurrentValue;
			$t_manager_services->datime_edit->ViewValue = ew_FormatDateTime($t_manager_services->datime_edit->ViewValue, 7);
			$t_manager_services->datime_edit->CssStyle = "";
			$t_manager_services->datime_edit->CssClass = "";
			$t_manager_services->datime_edit->ViewCustomAttributes = "";

			// oder
			$t_manager_services->oder->ViewValue = $t_manager_services->oder->CurrentValue;
			$t_manager_services->oder->CssStyle = "";
			$t_manager_services->oder->CssClass = "";
			$t_manager_services->oder->ViewCustomAttributes = "";

			// name_ser
			$t_manager_services->name_ser->HrefValue = "";

			// code_ser
			$t_manager_services->code_ser->HrefValue = "";

			// descript_ser
			$t_manager_services->descript_ser->HrefValue = "";

			// active_ser
			$t_manager_services->active_ser->HrefValue = "";

			// user_add
			$t_manager_services->user_add->HrefValue = "";

			// datime_add
			$t_manager_services->datime_add->HrefValue = "";

			// oder
			$t_manager_services->oder->HrefValue = "";
		} elseif ($t_manager_services->RowType == EW_ROWTYPE_ADD) { // Add row

			// name_ser
			$t_manager_services->name_ser->EditCustomAttributes = "";
			$t_manager_services->name_ser->EditValue = ew_HtmlEncode($t_manager_services->name_ser->CurrentValue);

			// code_ser
			$t_manager_services->code_ser->EditCustomAttributes = "";
			$t_manager_services->code_ser->EditValue = ew_HtmlEncode($t_manager_services->code_ser->CurrentValue);

			// descript_ser
			$t_manager_services->descript_ser->EditCustomAttributes = "";
			$t_manager_services->descript_ser->EditValue = ew_HtmlEncode($t_manager_services->descript_ser->CurrentValue);

			// active_ser
			$t_manager_services->active_ser->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			array_unshift($arwrk, array("", "Please Select"));
			$t_manager_services->active_ser->EditValue = $arwrk;

			// user_add
			// datime_add
			// oder

			$t_manager_services->oder->EditCustomAttributes = "";
			$t_manager_services->oder->EditValue = ew_HtmlEncode($t_manager_services->oder->CurrentValue);
		}

		// Call Row Rendered event
		$t_manager_services->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_manager_services;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_manager_services->name_ser->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Name Ser";
		}
		if ($t_manager_services->code_ser->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Code Ser";
		}
		if ($t_manager_services->active_ser->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Active Ser";
		}
		if ($t_manager_services->oder->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Oder";
		}
		if (!ew_CheckInteger($t_manager_services->oder->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Oder";
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
		global $conn, $Security, $t_manager_services;
		$rsnew = array();

		// Field name_ser
		$t_manager_services->name_ser->SetDbValueDef($t_manager_services->name_ser->CurrentValue, NULL);
		$rsnew['name_ser'] =& $t_manager_services->name_ser->DbValue;

		// Field code_ser
		$t_manager_services->code_ser->SetDbValueDef($t_manager_services->code_ser->CurrentValue, NULL);
		$rsnew['code_ser'] =& $t_manager_services->code_ser->DbValue;

		// Field descript_ser
		$t_manager_services->descript_ser->SetDbValueDef($t_manager_services->descript_ser->CurrentValue, NULL);
		$rsnew['descript_ser'] =& $t_manager_services->descript_ser->DbValue;

		// Field active_ser
		$t_manager_services->active_ser->SetDbValueDef($t_manager_services->active_ser->CurrentValue, NULL);
		$rsnew['active_ser'] =& $t_manager_services->active_ser->DbValue;

		// Field user_add
		$t_manager_services->user_add->SetDbValueDef(CurrentUserID(), NULL);
		$rsnew['user_add'] =& $t_manager_services->user_add->DbValue;

		// Field datime_add
		$t_manager_services->datime_add->SetDbValueDef(ew_CurrentDateTime(), NULL);
		$rsnew['datime_add'] =& $t_manager_services->datime_add->DbValue;

		// Field oder
		$t_manager_services->oder->SetDbValueDef($t_manager_services->oder->CurrentValue, NULL);
		$rsnew['oder'] =& $t_manager_services->oder->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_manager_services->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_manager_services->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_manager_services->CancelMessage <> "") {
				$this->setMessage($t_manager_services->CancelMessage);
				$t_manager_services->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_manager_services->services_id->setDbValue($conn->Insert_ID());
			$rsnew['services_id'] =& $t_manager_services->services_id->DbValue;

			// Call Row Inserted event
			$t_manager_services->Row_Inserted($rsnew);
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
