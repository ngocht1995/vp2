<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_messagesinfo.php" ?>
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
$t_messages_edit = new ct_messages_edit();
$Page =& $t_messages_edit;

// Page init processing
$t_messages_edit->Page_Init();

// Page main processing
$t_messages_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_messages_edit = new ew_Page("t_messages_edit");

// page properties
t_messages_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = t_messages_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_messages_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_Doc"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_Datetime_C"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Datetime C");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_messages_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_messages_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_messages_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_messages_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $t_messages->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa thông báo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
<?php $t_messages_edit->ShowMessage() ?>
<form name="ft_messagesedit" id="ft_messagesedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_messages">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_messages->Name->Visible) { // Name ?>
	<tr<?php echo $t_messages->Name->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $t_messages->Name->CellAttributes() ?>><span id="el_Name">
<input type="text" name="x_Name" id="x_Name" size="100" maxlength="255" value="<?php echo $t_messages->Name->EditValue ?>"<?php echo $t_messages->Name->EditAttributes() ?>>
</span><?php echo $t_messages->Name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Content->Visible) { // Content ?>
	<tr<?php echo $t_messages->Content->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $t_messages->Content->CellAttributes() ?>><span id="el_Content">
<textarea name="x_Content" id="x_Content" cols="35" rows="4"<?php echo $t_messages->Content->EditAttributes() ?>><?php echo $t_messages->Content->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_Content", function() {
	var oCKeditor = CKEDITOR.replace('x_Content', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: true, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_messages->Content->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Doc->Visible) { // Doc ?>
	<tr<?php echo $t_messages->Doc->RowAttributes ?>>
		<td class="ewTableHeader">Tài liệu</td>
		<td<?php echo $t_messages->Doc->CellAttributes() ?>><span id="el_Doc">
<div id="old_x_Doc">
<?php if ($t_messages->Doc->HrefValue <> "") { ?>
<?php if (!is_null($t_messages->Doc->Upload->DbValue)) { ?>
<a href="<?php echo $t_messages->Doc->HrefValue ?>"><?php echo $t_messages->Doc->EditValue ?></a>
<?php } elseif (!in_array($t_messages->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($t_messages->Doc->Upload->DbValue)) { ?>
<?php echo $t_messages->Doc->EditValue ?>
<?php } elseif (!in_array($t_messages->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_Doc">
<?php if (!is_null($t_messages->Doc->Upload->DbValue)) { ?>
<input type="radio" name="a_Doc" id="a_Doc" value="1" checked="checked">Keep&nbsp;
<input type="radio" name="a_Doc" id="a_Doc" value="2">Remove&nbsp;
<input type="radio" name="a_Doc" id="a_Doc" value="3">Replace<br>
<?php } else { ?>
<input type="hidden" name="a_Doc" id="a_Doc" value="3">
<?php } ?>
<input type="file" name="x_Doc" id="x_Doc" size="30" onchange="if(this.form.a_Doc[2]) this.form.a_Doc[2].checked=true;"<?php echo $t_messages->Doc->EditAttributes(); ?>>
</div>
</span><?php echo $t_messages->Doc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Public->Visible) { // Public ?>
	<tr<?php echo $t_messages->Public->RowAttributes ?>>
		<td class="ewTableHeader">Public</td>
		<td<?php echo $t_messages->Public->CellAttributes() ?>><span id="el_Public">
<select id="x_Public" name="x_Public"<?php echo $t_messages->Public->EditAttributes() ?>>
<?php
if (is_array($t_messages->Public->EditValue)) {
	$arwrk = $t_messages->Public->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_messages->Public->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_messages->Public->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Datetime_C->Visible) { // Datetime_C ?>
	<tr<?php echo $t_messages->Datetime_C->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo</td>
		<td<?php echo $t_messages->Datetime_C->CellAttributes() ?>><span id="el_Datetime_C">
<input type="text" name="x_Datetime_C" id="x_Datetime_C" value="<?php echo $t_messages->Datetime_C->EditValue ?>"<?php echo $t_messages->Datetime_C->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_Datetime_C" name="cal_x_Datetime_C" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_Datetime_C", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_Datetime_C" // ID of the button
});
</script>
</span><?php echo $t_messages->Datetime_C->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_messages->Source->Visible) { // Source ?>
	<tr<?php echo $t_messages->Source->RowAttributes ?>>
		<td class="ewTableHeader">Nguồn</td>
		<td<?php echo $t_messages->Source->CellAttributes() ?>><span id="el_Source">
<input type="text" size="45"  name="x_Source" id="x_Source" value="<?php echo $t_messages->Source->EditValue ?>"<?php echo $t_messages->Source->EditAttributes() ?>>
</span><?php echo $t_messages->Source->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_Id_Messages" id="x_Id_Messages" value="<?php echo ew_HtmlEncode($t_messages->Id_Messages->CurrentValue) ?>">
<p>
<input type="button" name="btnAction" id="btnAction" value="   Sửa   " onclick="ew_SubmitForm(t_messages_edit, this.form);">
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
class ct_messages_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 't_messages';

	// Page Object Name
	var $PageObjName = 't_messages_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_messages;
		if ($t_messages->UseTokenInUrl) $PageUrl .= "t=" . $t_messages->TableVar . "&"; // add page token
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
		global $objForm, $t_messages;
		if ($t_messages->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_messages->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_messages->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_messages_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_messages"] = new ct_messages();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_messages', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_messages;

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
		global $objForm, $gsFormError, $t_messages;

		// Load key from QueryString
		if (@$_GET["Id_Messages"] <> "")
			$t_messages->Id_Messages->setQueryStringValue($_GET["Id_Messages"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$t_messages->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_messages->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$t_messages->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_messages->Id_Messages->CurrentValue == "")
			$this->Page_Terminate("t_messageslist.php"); // Invalid key, return to list
		switch ($t_messages->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("t_messageslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_messages->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Update succeeded"); // Update success
					$sReturnUrl = $t_messages->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_messagesview.php")
						$sReturnUrl = $t_messages->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_messages->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_messages;

		// Get upload data
			if ($t_messages->Doc->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_messages->Doc->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_messages;
		$t_messages->Name->setFormValue($objForm->GetValue("x_Name"));
		$t_messages->Content->setFormValue($objForm->GetValue("x_Content"));
		$t_messages->Public->setFormValue($objForm->GetValue("x_Public"));
		$t_messages->Datetime_C->setFormValue($objForm->GetValue("x_Datetime_C"));
		$t_messages->Datetime_C->CurrentValue = ew_UnFormatDateTime($t_messages->Datetime_C->CurrentValue, 7);
		$t_messages->Source->setFormValue($objForm->GetValue("x_Source"));
		$t_messages->Id_Messages->setFormValue($objForm->GetValue("x_Id_Messages"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_messages;
		$t_messages->Id_Messages->CurrentValue = $t_messages->Id_Messages->FormValue;
		$this->LoadRow();
		$t_messages->Name->CurrentValue = $t_messages->Name->FormValue;
		$t_messages->Content->CurrentValue = $t_messages->Content->FormValue;
		$t_messages->Public->CurrentValue = $t_messages->Public->FormValue;
		$t_messages->Datetime_C->CurrentValue = $t_messages->Datetime_C->FormValue;
		$t_messages->Datetime_C->CurrentValue = ew_UnFormatDateTime($t_messages->Datetime_C->CurrentValue, 7);
		$t_messages->Source->CurrentValue = $t_messages->Source->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_messages;
		$sFilter = $t_messages->KeyFilter();

		// Call Row Selecting event
		$t_messages->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_messages->CurrentFilter = $sFilter;
		$sSql = $t_messages->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_messages->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_messages;
		$t_messages->Id_Messages->setDbValue($rs->fields('Id_Messages'));
		$t_messages->Name->setDbValue($rs->fields('Name'));
		$t_messages->Content->setDbValue($rs->fields('Content'));
		$t_messages->Doc->Upload->DbValue = $rs->fields('Doc');
		$t_messages->Public->setDbValue($rs->fields('Public'));
		$t_messages->Datetime_C->setDbValue($rs->fields('Datetime_C'));
		$t_messages->Source->setDbValue($rs->fields('Source'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_messages;

		// Call Row_Rendering event
		$t_messages->Row_Rendering();

		// Common render codes for all row types
		// Name

		$t_messages->Name->CellCssStyle = "";
		$t_messages->Name->CellCssClass = "";

		// Content
		$t_messages->Content->CellCssStyle = "";
		$t_messages->Content->CellCssClass = "";

		// Doc
		$t_messages->Doc->CellCssStyle = "";
		$t_messages->Doc->CellCssClass = "";

		// Public
		$t_messages->Public->CellCssStyle = "";
		$t_messages->Public->CellCssClass = "";

		// Datetime_C
		$t_messages->Datetime_C->CellCssStyle = "";
		$t_messages->Datetime_C->CellCssClass = "";

		// Source
		$t_messages->Source->CellCssStyle = "";
		$t_messages->Source->CellCssClass = "";
		if ($t_messages->RowType == EW_ROWTYPE_VIEW) { // View row

			// Id_Messages
			$t_messages->Id_Messages->ViewValue = $t_messages->Id_Messages->CurrentValue;
			$t_messages->Id_Messages->CssStyle = "";
			$t_messages->Id_Messages->CssClass = "";
			$t_messages->Id_Messages->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->ViewValue = $t_messages->Name->CurrentValue;
			$t_messages->Name->CssStyle = "";
			$t_messages->Name->CssClass = "";
			$t_messages->Name->ViewCustomAttributes = "";

			// Content
			$t_messages->Content->ViewValue = $t_messages->Content->CurrentValue;
			$t_messages->Content->CssStyle = "";
			$t_messages->Content->CssClass = "";
			$t_messages->Content->ViewCustomAttributes = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->ViewValue = $t_messages->Doc->Upload->DbValue;
			} else {
				$t_messages->Doc->ViewValue = "";
			}
			$t_messages->Doc->CssStyle = "";
			$t_messages->Doc->CssClass = "";
			$t_messages->Doc->ViewCustomAttributes = "";

			// Public
			if (strval($t_messages->Public->CurrentValue) <> "") {
				switch ($t_messages->Public->CurrentValue) {
					case "0":
						$t_messages->Public->ViewValue = "Chưa";
						break;
					case "1":
						$t_messages->Public->ViewValue = "Xuất bản";
						break;
					default:
						$t_messages->Public->ViewValue = $t_messages->Public->CurrentValue;
				}
			} else {
				$t_messages->Public->ViewValue = NULL;
			}
			$t_messages->Public->CssStyle = "";
			$t_messages->Public->CssClass = "";
			$t_messages->Public->ViewCustomAttributes = "";

			// Datetime_C
			$t_messages->Datetime_C->ViewValue = $t_messages->Datetime_C->CurrentValue;
			$t_messages->Datetime_C->ViewValue = ew_FormatDateTime($t_messages->Datetime_C->ViewValue, 7);
			$t_messages->Datetime_C->CssStyle = "";
			$t_messages->Datetime_C->CssClass = "";
			$t_messages->Datetime_C->ViewCustomAttributes = "";

			// Source
			$t_messages->Source->ViewValue = $t_messages->Source->CurrentValue;
			$t_messages->Source->CssStyle = "";
			$t_messages->Source->CssClass = "";
			$t_messages->Source->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->HrefValue = "";

			// Content
			$t_messages->Content->HrefValue = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->HrefValue = ew_UploadPathEx(FALSE, "upload/messages/") . ((!empty($t_messages->Doc->ViewValue)) ? $t_messages->Doc->ViewValue : $t_messages->Doc->CurrentValue);
				if ($t_messages->Export <> "") $t_messages->Doc->HrefValue = ew_ConvertFullUrl($t_messages->Doc->HrefValue);
			} else {
				$t_messages->Doc->HrefValue = "";
			}

			// Public
			$t_messages->Public->HrefValue = "";

			// Datetime_C
			$t_messages->Datetime_C->HrefValue = "";

			// Source
			$t_messages->Source->HrefValue = "";
		} elseif ($t_messages->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// Name
			$t_messages->Name->EditCustomAttributes = "";
			$t_messages->Name->EditValue = ew_HtmlEncode($t_messages->Name->CurrentValue);

			// Content
			$t_messages->Content->EditCustomAttributes = "";
			$t_messages->Content->EditValue = ew_HtmlEncode($t_messages->Content->CurrentValue);

			// Doc
			$t_messages->Doc->EditCustomAttributes = "";
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->EditValue = $t_messages->Doc->Upload->DbValue;
			} else {
				$t_messages->Doc->EditValue = "";
			}

			// Public
			$t_messages->Public->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$t_messages->Public->EditValue = $arwrk;

			// Datetime_C
			$t_messages->Datetime_C->EditCustomAttributes = "";
			$t_messages->Datetime_C->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_messages->Datetime_C->CurrentValue, 7));

			// Source
			$t_messages->Source->EditCustomAttributes = "";
			$t_messages->Source->EditValue = ew_HtmlEncode($t_messages->Source->CurrentValue);

			// Edit refer script
			// Name

			$t_messages->Name->HrefValue = "";

			// Content
			$t_messages->Content->HrefValue = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->HrefValue = ew_UploadPathEx(FALSE, "upload/messages/") . ((!empty($t_messages->Doc->EditValue)) ? $t_messages->Doc->EditValue : $t_messages->Doc->CurrentValue);
				if ($t_messages->Export <> "") $t_messages->Doc->HrefValue = ew_ConvertFullUrl($t_messages->Doc->HrefValue);
			} else {
				$t_messages->Doc->HrefValue = "";
			}

			// Public
			$t_messages->Public->HrefValue = "";

			// Datetime_C
			$t_messages->Datetime_C->HrefValue = "";

			// Source
			$t_messages->Source->HrefValue = "";
		}

		// Call Row Rendered event
		$t_messages->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_messages;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($t_messages->Doc->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($t_messages->Doc->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($t_messages->Doc->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Max. file size (%s bytes) exceeded.");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!ew_CheckEuroDate($t_messages->Datetime_C->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Datetime C";
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
		global $conn, $Security, $t_messages;
		$sFilter = $t_messages->KeyFilter();
		$t_messages->CurrentFilter = $sFilter;
		$sSql = $t_messages->SQL();
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

			// Field Name
			$t_messages->Name->SetDbValueDef($t_messages->Name->CurrentValue, NULL);
			$rsnew['Name'] =& $t_messages->Name->DbValue;

			// Field Content
			$t_messages->Content->SetDbValueDef($t_messages->Content->CurrentValue, NULL);
			$rsnew['Content'] =& $t_messages->Content->DbValue;

			// Field Doc
			$t_messages->Doc->Upload->SaveToSession(); // Save file value to Session
			if ($t_messages->Doc->Upload->Action == "2" || $t_messages->Doc->Upload->Action == "3") { // Update/Remove
			$t_messages->Doc->Upload->DbValue = $rs->fields('Doc'); // Get original value
			if (is_null($t_messages->Doc->Upload->Value)) {
				$rsnew['Doc'] = NULL;
			} else {
				$rsnew['Doc'] = ew_UploadFileNameEx(ew_UploadPathEx(True, "upload/messages/"), $t_messages->Doc->Upload->FileName);
			}
			}

			// Field Public
			$t_messages->Public->SetDbValueDef($t_messages->Public->CurrentValue, NULL);
			$rsnew['Public'] =& $t_messages->Public->DbValue;

			// Field Datetime_C
			$t_messages->Datetime_C->SetDbValueDef(ew_UnFormatDateTime($t_messages->Datetime_C->CurrentValue, 7), NULL);
			$rsnew['Datetime_C'] =& $t_messages->Datetime_C->DbValue;

			// Field Source
			$t_messages->Source->SetDbValueDef($t_messages->Source->CurrentValue, NULL);
			$rsnew['Source'] =& $t_messages->Source->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_messages->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field Doc
			if (!is_null($t_messages->Doc->Upload->Value)) {
				$t_messages->Doc->Upload->SaveToFile("upload/messages/", $rsnew['Doc'], FALSE);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_messages->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_messages->CancelMessage <> "") {
					$this->setMessage($t_messages->CancelMessage);
					$t_messages->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_messages->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field Doc
		$t_messages->Doc->Upload->RemoveFromSession(); // Remove file value from Session
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
