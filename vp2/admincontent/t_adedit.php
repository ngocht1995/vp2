<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_adinfo.php" ?>
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
$t_ad_edit = new ct_ad_edit();
$Page =& $t_ad_edit;

// Page init processing
$t_ad_edit->Page_Init();

// Page main processing
$t_ad_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_ad_edit = new ew_Page("t_ad_edit");

// page properties
t_ad_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = t_ad_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_ad_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_date_c"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Date C");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_ad_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ad_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ad_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ad_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>

<script type="text/javascript" src="../raovat/ckeditor/ckeditor.js"></script>

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
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker"><table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_adlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa tin rao vặt</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table></span></p>
<?php $t_ad_edit->ShowMessage() ?>
<form name="ft_adedit" id="ft_adedit" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_ad">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_ad->cat_ID->Visible) { // cat_ID ?>
	<tr<?php echo $t_ad->cat_ID->RowAttributes ?>>
		<td class="ewTableHeader">Chuyên mục</td>
		<td<?php echo $t_ad->cat_ID->CellAttributes() ?>><span id="el_cat_ID">
<select id="x_cat_ID" name="x_cat_ID"<?php echo $t_ad->cat_ID->EditAttributes() ?>>
<?php
if (is_array($t_ad->cat_ID->EditValue)) {
	$arwrk = $t_ad->cat_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_ad->cat_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_ad->cat_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->Title->Visible) { // Title ?>
	<tr<?php echo $t_ad->Title->RowAttributes ?>>
		<td class="ewTableHeader">Tiêu đề</td>
		<td<?php echo $t_ad->Title->CellAttributes() ?>><span id="el_Title">
                        <input type="text" name="x_Title" id="x_Title" size="65" value="<?php echo $t_ad->Title->EditValue ?>"<?php echo $t_ad->Title->EditAttributes() ?>>
</span><?php echo $t_ad->Title->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->content->Visible) { // content ?>
	<tr<?php echo $t_ad->content->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $t_ad->content->CellAttributes() ?>><span id="el_content">
<textarea name="x_content" id="x_content" cols="35" rows="4"<?php echo $t_ad->content->EditAttributes() ?>><?php echo $t_ad->content->EditValue ?></textarea>
<script type="text/javascript">
<!-- 
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_content", function() {
	var oCKeditor = CKEDITOR.replace('x_content', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: true, baseHref: '../raovat/ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_ad->content->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->date_c->Visible) { // date_c ?>
	<tr<?php echo $t_ad->date_c->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo</td>
		<td<?php echo $t_ad->date_c->CellAttributes() ?>><span id="el_date_c">
<input type="text" name="x_date_c" id="x_date_c" value="<?php echo $t_ad->date_c->EditValue ?>"<?php echo $t_ad->date_c->EditAttributes() ?>><img src="images/calendar.png" id="cal_x_date_cread_time" name="cal_x_date_cread_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_date_c", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_date_cread_time" // ID of the button
});
</script>
</span><?php echo $t_ad->date_c->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->zemail->Visible) { // email ?>
	<tr<?php echo $t_ad->zemail->RowAttributes ?>>
		<td class="ewTableHeader">Email</td>
		<td<?php echo $t_ad->zemail->CellAttributes() ?>><span id="el_zemail">
<input type="text" name="x_zemail" id="x_zemail" value="<?php echo $t_ad->zemail->EditValue ?>"<?php echo $t_ad->zemail->EditAttributes() ?>>
</span><?php echo $t_ad->zemail->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->name->Visible) { // name ?>
	<tr<?php echo $t_ad->name->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên</td>
		<td<?php echo $t_ad->name->CellAttributes() ?>><span id="el_name">
<input type="text" name="x_name" id="x_name" value="<?php echo $t_ad->name->EditValue ?>"<?php echo $t_ad->name->EditAttributes() ?>>
</span><?php echo $t_ad->name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->phone->Visible) { // phone ?>
	<tr<?php echo $t_ad->phone->RowAttributes ?>>
		<td class="ewTableHeader">Điện thoại</td>
		<td<?php echo $t_ad->phone->CellAttributes() ?>><span id="el_phone">
<input type="text" name="x_phone" id="x_phone" size="30" maxlength="30" value="<?php echo $t_ad->phone->EditValue ?>"<?php echo $t_ad->phone->EditAttributes() ?>>
</span><?php echo $t_ad->phone->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ad->status->Visible) { // status ?>
	<tr<?php echo $t_ad->status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $t_ad->status->CellAttributes() ?>><span id="el_status">
<select id="x_status" name="x_status"<?php echo $t_ad->status->EditAttributes() ?>>
<?php
if (is_array($t_ad->status->EditValue)) {
	$arwrk = $t_ad->status->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_ad->status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_ad->status->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_ad_ID" id="x_ad_ID" value="<?php echo ew_HtmlEncode($t_ad->ad_ID->CurrentValue) ?>">
<p>
<input type="button" name="btnAction" id="btnAction" value="   Sửa   " onclick="ew_SubmitForm(t_ad_edit, this.form);">
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
class ct_ad_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 't_ad';

	// Page Object Name
	var $PageObjName = 't_ad_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ad;
		if ($t_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_ad;
		if ($t_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_ad_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_ad"] = new ct_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_ad;

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
		global $objForm, $gsFormError, $t_ad;

		// Load key from QueryString
		if (@$_GET["ad_ID"] <> "")
			$t_ad->ad_ID->setQueryStringValue($_GET["ad_ID"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$t_ad->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_ad->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$t_ad->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_ad->ad_ID->CurrentValue == "")
			$this->Page_Terminate("t_adlist.php"); // Invalid key, return to list
		switch ($t_ad->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("t_adlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_ad->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Update succeeded"); // Update success
					$sReturnUrl = $t_ad->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_adview.php")
						$sReturnUrl = $t_ad->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_ad->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_ad;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_ad;
		$t_ad->cat_ID->setFormValue($objForm->GetValue("x_cat_ID"));
		$t_ad->Title->setFormValue($objForm->GetValue("x_Title"));
		$t_ad->content->setFormValue($objForm->GetValue("x_content"));
		$t_ad->date_c->setFormValue($objForm->GetValue("x_date_c"));
		$t_ad->date_c->CurrentValue = ew_UnFormatDateTime($t_ad->date_c->CurrentValue, 7);
		$t_ad->zemail->setFormValue($objForm->GetValue("x_zemail"));
		$t_ad->name->setFormValue($objForm->GetValue("x_name"));
		$t_ad->phone->setFormValue($objForm->GetValue("x_phone"));
		$t_ad->status->setFormValue($objForm->GetValue("x_status"));
		$t_ad->ad_ID->setFormValue($objForm->GetValue("x_ad_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_ad;
		$t_ad->ad_ID->CurrentValue = $t_ad->ad_ID->FormValue;
		$this->LoadRow();
		$t_ad->cat_ID->CurrentValue = $t_ad->cat_ID->FormValue;
		$t_ad->Title->CurrentValue = $t_ad->Title->FormValue;
		$t_ad->content->CurrentValue = $t_ad->content->FormValue;
		$t_ad->date_c->CurrentValue = $t_ad->date_c->FormValue;
		$t_ad->date_c->CurrentValue = ew_UnFormatDateTime($t_ad->date_c->CurrentValue, 7);
		$t_ad->zemail->CurrentValue = $t_ad->zemail->FormValue;
		$t_ad->name->CurrentValue = $t_ad->name->FormValue;
		$t_ad->phone->CurrentValue = $t_ad->phone->FormValue;
		$t_ad->status->CurrentValue = $t_ad->status->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ad;
		$sFilter = $t_ad->KeyFilter();

		// Call Row Selecting event
		$t_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_ad->CurrentFilter = $sFilter;
		$sSql = $t_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_ad;
		$t_ad->ad_ID->setDbValue($rs->fields('ad_ID'));
		$t_ad->cat_ID->setDbValue($rs->fields('cat_ID'));
		$t_ad->Title->setDbValue($rs->fields('Title'));
		$t_ad->content->setDbValue($rs->fields('content'));
		$t_ad->date_c->setDbValue($rs->fields('date_c'));
		$t_ad->zemail->setDbValue($rs->fields('email'));
		$t_ad->name->setDbValue($rs->fields('name'));
		$t_ad->phone->setDbValue($rs->fields('phone'));
		$t_ad->status->setDbValue($rs->fields('status'));
		$t_ad->n_click->setDbValue($rs->fields('n_click'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_ad;

		// Call Row_Rendering event
		$t_ad->Row_Rendering();

		// Common render codes for all row types
		// cat_ID

		$t_ad->cat_ID->CellCssStyle = "";
		$t_ad->cat_ID->CellCssClass = "";

		// Title
		$t_ad->Title->CellCssStyle = "";
		$t_ad->Title->CellCssClass = "";

		// content
		$t_ad->content->CellCssStyle = "";
		$t_ad->content->CellCssClass = "";

		// date_c
		$t_ad->date_c->CellCssStyle = "";
		$t_ad->date_c->CellCssClass = "";

		// email
		$t_ad->zemail->CellCssStyle = "";
		$t_ad->zemail->CellCssClass = "";

		// name
		$t_ad->name->CellCssStyle = "";
		$t_ad->name->CellCssClass = "";

		// phone
		$t_ad->phone->CellCssStyle = "";
		$t_ad->phone->CellCssClass = "";

		// status
		$t_ad->status->CellCssStyle = "";
		$t_ad->status->CellCssClass = "";
		if ($t_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_ID
			$t_ad->ad_ID->ViewValue = $t_ad->ad_ID->CurrentValue;
			$t_ad->ad_ID->CssStyle = "";
			$t_ad->ad_ID->CssClass = "";
			$t_ad->ad_ID->ViewCustomAttributes = "";

			// cat_ID
			if (strval($t_ad->cat_ID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_ad->cat_ID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_ad->cat_ID->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_ad->cat_ID->ViewValue = $t_ad->cat_ID->CurrentValue;
				}
			} else {
				$t_ad->cat_ID->ViewValue = NULL;
			}
			$t_ad->cat_ID->CssStyle = "";
			$t_ad->cat_ID->CssClass = "";
			$t_ad->cat_ID->ViewCustomAttributes = "";

			// Title
			$t_ad->Title->ViewValue = $t_ad->Title->CurrentValue;
			$t_ad->Title->CssStyle = "";
			$t_ad->Title->CssClass = "";
			$t_ad->Title->ViewCustomAttributes = "";

			// content
			$t_ad->content->ViewValue = $t_ad->content->CurrentValue;
			$t_ad->content->CssStyle = "";
			$t_ad->content->CssClass = "";
			$t_ad->content->ViewCustomAttributes = "";

			// date_c
			$t_ad->date_c->ViewValue = $t_ad->date_c->CurrentValue;
			$t_ad->date_c->ViewValue = ew_FormatDateTime($t_ad->date_c->ViewValue, 7);
			$t_ad->date_c->CssStyle = "";
			$t_ad->date_c->CssClass = "";
			$t_ad->date_c->ViewCustomAttributes = "";

			// email
			$t_ad->zemail->ViewValue = $t_ad->zemail->CurrentValue;
			$t_ad->zemail->CssStyle = "";
			$t_ad->zemail->CssClass = "";
			$t_ad->zemail->ViewCustomAttributes = "";

			// name
			$t_ad->name->ViewValue = $t_ad->name->CurrentValue;
			$t_ad->name->CssStyle = "";
			$t_ad->name->CssClass = "";
			$t_ad->name->ViewCustomAttributes = "";

			// phone
			$t_ad->phone->ViewValue = $t_ad->phone->CurrentValue;
			$t_ad->phone->CssStyle = "";
			$t_ad->phone->CssClass = "";
			$t_ad->phone->ViewCustomAttributes = "";

			// status
			if (strval($t_ad->status->CurrentValue) <> "") {
				switch ($t_ad->status->CurrentValue) {
					case "0":
						$t_ad->status->ViewValue = "Chưa duyệt";
						break;
					case "1":
						$t_ad->status->ViewValue = "Đã duyệt";
						break;
					default:
						$t_ad->status->ViewValue = $t_ad->status->CurrentValue;
				}
			} else {
				$t_ad->status->ViewValue = NULL;
			}
			$t_ad->status->CssStyle = "";
			$t_ad->status->CssClass = "";
			$t_ad->status->ViewCustomAttributes = "";

			// n_click
			$t_ad->n_click->ViewValue = $t_ad->n_click->CurrentValue;
			$t_ad->n_click->CssStyle = "";
			$t_ad->n_click->CssClass = "";
			$t_ad->n_click->ViewCustomAttributes = "";

			// cat_ID
			$t_ad->cat_ID->HrefValue = "";

			// Title
			$t_ad->Title->HrefValue = "";

			// content
			$t_ad->content->HrefValue = "";

			// date_c
			$t_ad->date_c->HrefValue = "";

			// email
			$t_ad->zemail->HrefValue = "";

			// name
			$t_ad->name->HrefValue = "";

			// phone
			$t_ad->phone->HrefValue = "";

			// status
			$t_ad->status->HrefValue = "";
		} elseif ($t_ad->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// cat_ID
			$t_ad->cat_ID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `ad_catID`, `name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_cat_ad`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Please Select"));
			$t_ad->cat_ID->EditValue = $arwrk;

			// Title
			$t_ad->Title->EditCustomAttributes = "";
			$t_ad->Title->EditValue = ew_HtmlEncode($t_ad->Title->CurrentValue);

			// content
			$t_ad->content->EditCustomAttributes = "";
			$t_ad->content->EditValue = ew_HtmlEncode($t_ad->content->CurrentValue);

			// date_c
			$t_ad->date_c->EditCustomAttributes = "";
			$t_ad->date_c->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_ad->date_c->CurrentValue, 7));

			// email
			$t_ad->zemail->EditCustomAttributes = "";
			$t_ad->zemail->EditValue = ew_HtmlEncode($t_ad->zemail->CurrentValue);

			// name
			$t_ad->name->EditCustomAttributes = "";
			$t_ad->name->EditValue = ew_HtmlEncode($t_ad->name->CurrentValue);

			// phone
			$t_ad->phone->EditCustomAttributes = "";
			$t_ad->phone->EditValue = ew_HtmlEncode($t_ad->phone->CurrentValue);

			// status
			$t_ad->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa duyệt");
			$arwrk[] = array("1", "Đã duyệt");
			array_unshift($arwrk, array("", "Please Select"));
			$t_ad->status->EditValue = $arwrk;

			// Edit refer script
			// cat_ID

			$t_ad->cat_ID->HrefValue = "";

			// Title
			$t_ad->Title->HrefValue = "";

			// content
			$t_ad->content->HrefValue = "";

			// date_c
			$t_ad->date_c->HrefValue = "";

			// email
			$t_ad->zemail->HrefValue = "";

			// name
			$t_ad->name->HrefValue = "";

			// phone
			$t_ad->phone->HrefValue = "";

			// status
			$t_ad->status->HrefValue = "";
		}

		// Call Row Rendered event
		$t_ad->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_ad;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!ew_CheckEuroDate($t_ad->date_c->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Date C";
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
		global $conn, $Security, $t_ad;
		$sFilter = $t_ad->KeyFilter();
		$t_ad->CurrentFilter = $sFilter;
		$sSql = $t_ad->SQL();
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

			// Field cat_ID
			$t_ad->cat_ID->SetDbValueDef($t_ad->cat_ID->CurrentValue, NULL);
			$rsnew['cat_ID'] =& $t_ad->cat_ID->DbValue;

			// Field Title
			$t_ad->Title->SetDbValueDef($t_ad->Title->CurrentValue, NULL);
			$rsnew['Title'] =& $t_ad->Title->DbValue;

			// Field content
			$t_ad->content->SetDbValueDef($t_ad->content->CurrentValue, NULL);
			$rsnew['content'] =& $t_ad->content->DbValue;

			// Field date_c
			$t_ad->date_c->SetDbValueDef(ew_UnFormatDateTime($t_ad->date_c->CurrentValue, 7), NULL);
			$rsnew['date_c'] =& $t_ad->date_c->DbValue;

			// Field email
			$t_ad->zemail->SetDbValueDef($t_ad->zemail->CurrentValue, NULL);
			$rsnew['email'] =& $t_ad->zemail->DbValue;

			// Field name
			$t_ad->name->SetDbValueDef($t_ad->name->CurrentValue, NULL);
			$rsnew['name'] =& $t_ad->name->DbValue;

			// Field phone
			$t_ad->phone->SetDbValueDef($t_ad->phone->CurrentValue, NULL);
			$rsnew['phone'] =& $t_ad->phone->DbValue;

			// Field status
			$t_ad->status->SetDbValueDef($t_ad->status->CurrentValue, NULL);
			$rsnew['status'] =& $t_ad->status->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_ad->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_ad->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_ad->CancelMessage <> "") {
					$this->setMessage($t_ad->CancelMessage);
					$t_ad->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_ad->Row_Updated($rsold, $rsnew);
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
