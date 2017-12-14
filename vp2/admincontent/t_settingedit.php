<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_settinginfo.php" ?>
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
$t_setting_edit = new ct_setting_edit();
$Page =& $t_setting_edit;

// Page init processing
$t_setting_edit->Page_Init();

// Page main processing
$t_setting_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_edit = new ew_Page("t_setting_edit");

// page properties
t_setting_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = t_setting_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_setting_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		
		elm = fobj.elements["x" + infix + "_set_status"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Set Status");
		elm = fobj.elements["x" + infix + "_set_date_start"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Set Date Start");
		elm = fobj.elements["x" + infix + "_set_date_start"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Set Date Start");
		elm = fobj.elements["x" + infix + "_set_date_end"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Set Date End");
		elm = fobj.elements["x" + infix + "_set_date_end"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Set Date End");
		elm = fobj.elements["x" + infix + "_set_description"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Set Description");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_setting_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_edit.ValidateRequired = false; // no JavaScript validation
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
								&nbsp;&nbsp;&nbsp;Thiết lập trạng thái</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 
<a href="<?php echo $t_setting->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_setting_edit->ShowMessage() ?>
<form name="ft_settingedit" id="ft_settingedit" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_setting">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_setting->set_type->Visible) { // set_type ?>
	<tr<?php echo $t_setting->set_type->RowAttributes ?>>
		<td class="ewTableHeader">Loại trạng thái<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting->set_type->CellAttributes() ?>><span id="el_set_type">
<select disabled ="disabled" id="x_set_type" name="x_set_type"<?php echo $t_setting->set_type->EditAttributes() ?>>
<?php
if (is_array($t_setting->set_type->EditValue)) {
	$arwrk = $t_setting->set_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting->set_type->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_setting->set_type->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_status->Visible) { // set_status ?>
	<tr<?php echo $t_setting->set_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái thiết lập<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting->set_status->CellAttributes() ?>><span id="el_set_status">
<select id="x_set_status" name="x_set_status"<?php echo $t_setting->set_status->EditAttributes() ?>>
<?php
if (is_array($t_setting->set_status->EditValue)) {
	$arwrk = $t_setting->set_status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting->set_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_setting->set_status->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_date_start->Visible) { // set_date_start ?>
	<tr<?php echo $t_setting->set_date_start->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian bắt đầu<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting->set_date_start->CellAttributes() ?>><span id="el_set_date_start">
<input type="text" name="x_set_date_start" id="x_set_date_start" value="<?php echo $t_setting->set_date_start->EditValue ?>"<?php echo $t_setting->set_date_start->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_set_date_start" name="cal_x_set_date_start" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_set_date_start", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_set_date_start" // ID of the button
});
</script>
</span><?php echo $t_setting->set_date_start->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_date_end->Visible) { // set_date_end ?>
	<tr<?php echo $t_setting->set_date_end->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian kết thúc<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting->set_date_end->CellAttributes() ?>><span id="el_set_date_end">
<input type="text" name="x_set_date_end" id="x_set_date_end" value="<?php echo $t_setting->set_date_end->EditValue ?>"<?php echo $t_setting->set_date_end->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_set_date_end" name="cal_x_set_date_end" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_set_date_end", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_set_date_end" // ID of the button
});
</script>
</span><?php echo $t_setting->set_date_end->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_description->Visible) { // set_description ?>
	<tr<?php echo $t_setting->set_description->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting->set_description->CellAttributes() ?>><span id="el_set_description">
<textarea name="x_set_description" id="x_set_description" cols="80" rows="2"<?php echo $t_setting->set_description->EditAttributes() ?>><?php echo $t_setting->set_description->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_set_description", function() {
	var oCKeditor = CKEDITOR.replace('x_set_description', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_setting->set_description->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting->set_active->Visible) { // set_active ?>
	<tr<?php echo $t_setting->set_active->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $t_setting->set_active->CellAttributes() ?>><span id="el_set_active">
<div id="tp_x_set_active" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><input type="radio" name="x_set_active" id="x_set_active" value="{value}"<?php echo $t_setting->set_active->EditAttributes() ?>></div>
<div id="dsl_x_set_active" repeatcolumn="5">
<?php
$arwrk = $t_setting->set_active->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting->set_active->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_set_active" id="x_set_active" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_setting->set_active->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_setting->set_active->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_set_id" id="x_set_id" value="<?php echo ew_HtmlEncode($t_setting->set_id->CurrentValue) ?>">
<p>
<input type="button" name="btnAction" id="btnAction" value="   Edit   " onclick="ew_SubmitForm(t_setting_edit, this.form);">
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
class ct_setting_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 't_setting';

	// Page Object Name
	var $PageObjName = 't_setting_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting;
		if ($t_setting->UseTokenInUrl) $PageUrl .= "t=" . $t_setting->TableVar . "&"; // add page token
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
		global $objForm, $t_setting;
		if ($t_setting->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting"] = new ct_setting();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting;
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
		global $objForm, $gsFormError, $t_setting;

		// Load key from QueryString
		if (@$_GET["set_id"] <> "")
			$t_setting->set_id->setQueryStringValue($_GET["set_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$t_setting->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_setting->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$t_setting->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_setting->set_id->CurrentValue == "")
			$this->Page_Terminate("t_settinglist.php"); // Invalid key, return to list
		switch ($t_setting->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("t_settinglist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_setting->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Update succeeded"); // Update success
					$sReturnUrl = $t_setting->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_settingview.php")
						$sReturnUrl = $t_setting->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_setting->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_setting;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_setting;
		$t_setting->set_type->setFormValue($objForm->GetValue("x_set_type"));
		$t_setting->set_status->setFormValue($objForm->GetValue("x_set_status"));
		$t_setting->set_date_start->setFormValue($objForm->GetValue("x_set_date_start"));
		$t_setting->set_date_start->CurrentValue = ew_UnFormatDateTime($t_setting->set_date_start->CurrentValue, 7);
		$t_setting->set_date_end->setFormValue($objForm->GetValue("x_set_date_end"));
		$t_setting->set_date_end->CurrentValue = ew_UnFormatDateTime($t_setting->set_date_end->CurrentValue, 7);
		$t_setting->set_description->setFormValue($objForm->GetValue("x_set_description"));
		$t_setting->set_active->setFormValue($objForm->GetValue("x_set_active"));
		$t_setting->set_id->setFormValue($objForm->GetValue("x_set_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_setting;
		$t_setting->set_id->CurrentValue = $t_setting->set_id->FormValue;
		$this->LoadRow();
		$t_setting->set_type->CurrentValue = $t_setting->set_type->FormValue;
		$t_setting->set_status->CurrentValue = $t_setting->set_status->FormValue;
		$t_setting->set_date_start->CurrentValue = $t_setting->set_date_start->FormValue;
		$t_setting->set_date_start->CurrentValue = ew_UnFormatDateTime($t_setting->set_date_start->CurrentValue, 7);
		$t_setting->set_date_end->CurrentValue = $t_setting->set_date_end->FormValue;
		$t_setting->set_date_end->CurrentValue = ew_UnFormatDateTime($t_setting->set_date_end->CurrentValue, 7);
		$t_setting->set_description->CurrentValue = $t_setting->set_description->FormValue;
		$t_setting->set_active->CurrentValue = $t_setting->set_active->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting;
		$sFilter = $t_setting->KeyFilter();

		// Call Row Selecting event
		$t_setting->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting->CurrentFilter = $sFilter;
		$sSql = $t_setting->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting;
		$t_setting->set_id->setDbValue($rs->fields('set_id'));
		$t_setting->set_type->setDbValue($rs->fields('set_type'));
		$t_setting->set_status->setDbValue($rs->fields('set_status'));
		$t_setting->set_date_start->setDbValue($rs->fields('set_date_start'));
		$t_setting->set_date_end->setDbValue($rs->fields('set_date_end'));
		$t_setting->set_description->setDbValue($rs->fields('set_description'));
		$t_setting->set_active->setDbValue($rs->fields('set_active'));
		$t_setting->set_code->setDbValue($rs->fields('set_code'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting;

		// Call Row_Rendering event
		$t_setting->Row_Rendering();

		// Common render codes for all row types
		// set_type

		$t_setting->set_type->CellCssStyle = "";
		$t_setting->set_type->CellCssClass = "";

		// set_status
		$t_setting->set_status->CellCssStyle = "";
		$t_setting->set_status->CellCssClass = "";

		// set_date_start
		$t_setting->set_date_start->CellCssStyle = "";
		$t_setting->set_date_start->CellCssClass = "";

		// set_date_end
		$t_setting->set_date_end->CellCssStyle = "";
		$t_setting->set_date_end->CellCssClass = "";

		// set_description
		$t_setting->set_description->CellCssStyle = "";
		$t_setting->set_description->CellCssClass = "";

		// set_active
		$t_setting->set_active->CellCssStyle = "";
		$t_setting->set_active->CellCssClass = "";
		if ($t_setting->RowType == EW_ROWTYPE_VIEW) { // View row

			// set_id
			$t_setting->set_id->ViewValue = $t_setting->set_id->CurrentValue;
			$t_setting->set_id->CssStyle = "";
			$t_setting->set_id->CssClass = "";
			$t_setting->set_id->ViewCustomAttributes = "";

			// set_type
			if (strval($t_setting->set_type->CurrentValue) <> "") {
				switch ($t_setting->set_type->CurrentValue) {
					case "1":
						$t_setting->set_type->ViewValue = "Cau hoi";
						break;
					case "2":
						$t_setting->set_type->ViewValue = "Tham do";
						break;
					default:
						$t_setting->set_type->ViewValue = $t_setting->set_type->CurrentValue;
				}
			} else {
				$t_setting->set_type->ViewValue = NULL;
			}
			$t_setting->set_type->CssStyle = "";
			$t_setting->set_type->CssClass = "";
			$t_setting->set_type->ViewCustomAttributes = "";

			// set_status
			if (strval($t_setting->set_status->CurrentValue) <> "") {
				switch ($t_setting->set_status->CurrentValue) {
					case "0":
						$t_setting->set_status->ViewValue = "Mac dinh";
						break;
					case "1":
						$t_setting->set_status->ViewValue = "Khoa cau hoi";
						break;
					case "2":
						$t_setting->set_status->ViewValue = "Thiet lap 2 trang thai tham do";
						break;
					case "3":
						$t_setting->set_status->ViewValue = "Thiet lap tham do theo thoi gian";
						break;
					case "4":
						$t_setting->set_status->ViewValue = "Thiet al tham do xac nhan";
						break;
					default:
						$t_setting->set_status->ViewValue = $t_setting->set_status->CurrentValue;
				}
			} else {
				$t_setting->set_status->ViewValue = NULL;
			}
			$t_setting->set_status->CssStyle = "";
			$t_setting->set_status->CssClass = "";
			$t_setting->set_status->ViewCustomAttributes = "";

			// set_date_start
			$t_setting->set_date_start->ViewValue = $t_setting->set_date_start->CurrentValue;
			$t_setting->set_date_start->ViewValue = ew_FormatDateTime($t_setting->set_date_start->ViewValue, 7);
			$t_setting->set_date_start->CssStyle = "";
			$t_setting->set_date_start->CssClass = "";
			$t_setting->set_date_start->ViewCustomAttributes = "";

			// set_date_end
			$t_setting->set_date_end->ViewValue = $t_setting->set_date_end->CurrentValue;
			$t_setting->set_date_end->ViewValue = ew_FormatDateTime($t_setting->set_date_end->ViewValue, 7);
			$t_setting->set_date_end->CssStyle = "";
			$t_setting->set_date_end->CssClass = "";
			$t_setting->set_date_end->ViewCustomAttributes = "";

			// set_description
			$t_setting->set_description->ViewValue = $t_setting->set_description->CurrentValue;
			$t_setting->set_description->CssStyle = "";
			$t_setting->set_description->CssClass = "";
			$t_setting->set_description->ViewCustomAttributes = "";

			// set_active
			if (strval($t_setting->set_active->CurrentValue) <> "") {
				switch ($t_setting->set_active->CurrentValue) {
					case "0":
						$t_setting->set_active->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_setting->set_active->ViewValue = "Kich hoat";
						break;
					default:
						$t_setting->set_active->ViewValue = $t_setting->set_active->CurrentValue;
				}
			} else {
				$t_setting->set_active->ViewValue = NULL;
			}
			$t_setting->set_active->CssStyle = "";
			$t_setting->set_active->CssClass = "";
			$t_setting->set_active->ViewCustomAttributes = "";

			// set_type
			$t_setting->set_type->HrefValue = "";

			// set_status
			$t_setting->set_status->HrefValue = "";

			// set_date_start
			$t_setting->set_date_start->HrefValue = "";

			// set_date_end
			$t_setting->set_date_end->HrefValue = "";

			// set_description
			$t_setting->set_description->HrefValue = "";

			// set_active
			$t_setting->set_active->HrefValue = "";
		} elseif ($t_setting->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// set_type
			$t_setting->set_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Thiết lập trạng thái đặt câu hỏi");
			$arwrk[] = array("2", "Thiết lập trạng thái thăm dò");
			array_unshift($arwrk, array("", "Please Select"));
			$t_setting->set_type->EditValue = $arwrk;

			// set_status
			$t_setting->set_status->EditCustomAttributes = "";
			$arwrk = array();
                        switch ($t_setting->set_id->CurrentValue) {  
                          case 1:
                            $arwrk[] = array("1", "Thiết lập trạng thái khóa câu hỏi");
                            break;
                          case 2:
                            $arwrk[] = array("2", "Thiết lập 2 trạng thái khóa câu hỏi ");
                            $arwrk[] = array("3", "Thiết lập thăm dò theo thời gian");
                            $arwrk[] = array("4", "Thiết lập thăm dò xác nhận");
                            break;
                        }
			array_unshift($arwrk, array("", "Please Select"));
			$t_setting->set_status->EditValue = $arwrk;

			// set_date_start
			$t_setting->set_date_start->EditCustomAttributes = "";
			$t_setting->set_date_start->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_setting->set_date_start->CurrentValue, 7));

			// set_date_end
			$t_setting->set_date_end->EditCustomAttributes = "";
			$t_setting->set_date_end->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_setting->set_date_end->CurrentValue, 7));

			// set_description
			$t_setting->set_description->EditCustomAttributes = "";
			$t_setting->set_description->EditValue = ew_HtmlEncode($t_setting->set_description->CurrentValue);

			// set_active
			$t_setting->set_active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_setting->set_active->EditValue = $arwrk;

			// Edit refer script
			// set_type

			$t_setting->set_type->HrefValue = "";

			// set_status
			$t_setting->set_status->HrefValue = "";

			// set_date_start
			$t_setting->set_date_start->HrefValue = "";

			// set_date_end
			$t_setting->set_date_end->HrefValue = "";

			// set_description
			$t_setting->set_description->HrefValue = "";

			// set_active
			$t_setting->set_active->HrefValue = "";
		}

		// Call Row Rendered event
		$t_setting->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_setting;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");

		if ($t_setting->set_status->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Set Status";
		}
		if ($t_setting->set_date_start->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Set Date Start";
		}
		if (!ew_CheckEuroDate($t_setting->set_date_start->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Set Date Start";
		}
		if ($t_setting->set_date_end->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Set Date End";
		}
		if (!ew_CheckEuroDate($t_setting->set_date_end->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Set Date End";
		}
		if ($t_setting->set_description->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Set Description";
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
		global $conn, $Security, $t_setting;
		$sFilter = $t_setting->KeyFilter();
		$t_setting->CurrentFilter = $sFilter;
		$sSql = $t_setting->SQL();
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

			// Field set_status
			$t_setting->set_status->SetDbValueDef($t_setting->set_status->CurrentValue, NULL);
			$rsnew['set_status'] =& $t_setting->set_status->DbValue;

			// Field set_date_start
			$t_setting->set_date_start->SetDbValueDef(ew_UnFormatDateTime($t_setting->set_date_start->CurrentValue, 7), NULL);
			$rsnew['set_date_start'] =& $t_setting->set_date_start->DbValue;

			// Field set_date_end
			$t_setting->set_date_end->SetDbValueDef(ew_UnFormatDateTime($t_setting->set_date_end->CurrentValue, 7), NULL);
			$rsnew['set_date_end'] =& $t_setting->set_date_end->DbValue;

			// Field set_description
			$t_setting->set_description->SetDbValueDef($t_setting->set_description->CurrentValue, NULL);
			$rsnew['set_description'] =& $t_setting->set_description->DbValue;

			// Field set_active
			$t_setting->set_active->SetDbValueDef($t_setting->set_active->CurrentValue, NULL);
			$rsnew['set_active'] =& $t_setting->set_active->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_setting->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_setting->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_setting->CancelMessage <> "") {
					$this->setMessage($t_setting->CancelMessage);
					$t_setting->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_setting->Row_Updated($rsold, $rsnew);
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
