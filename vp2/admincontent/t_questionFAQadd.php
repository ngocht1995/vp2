<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
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
$t_question_add = new ct_question_add();
$Page =& $t_question_add;

// Page init processing
$t_question_add->Page_Init();

// Page main processing
$t_question_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_add = new ew_Page("t_question_add");

// page properties
t_question_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_question_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_question_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_datetime_h"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Datetime H");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_question_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_add.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">Add to TABLE: T Question<br><br>
<a href="<?php echo $t_question->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_question_add->ShowMessage() ?>
<form name="ft_questionadd" id="ft_questionadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_question_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_question">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_question->cat_question_id->Visible) { // cat_question_id ?>
	<tr<?php echo $t_question->cat_question_id->RowAttributes ?>>
		<td class="ewTableHeader">Nhóm câu h?i</td>
		<td<?php echo $t_question->cat_question_id->CellAttributes() ?>><span id="el_cat_question_id">
<select id="x_cat_question_id" name="x_cat_question_id"<?php echo $t_question->cat_question_id->EditAttributes() ?>>
<?php
if (is_array($t_question->cat_question_id->EditValue)) {
	$arwrk = $t_question->cat_question_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->cat_question_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_question->cat_question_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
	<tr<?php echo $t_question->datetime_h->RowAttributes ?>>
		<td class="ewTableHeader">Datetime H</td>
		<td<?php echo $t_question->datetime_h->CellAttributes() ?>><span id="el_datetime_h">
<input type="text" name="x_datetime_h" id="x_datetime_h" value="<?php echo $t_question->datetime_h->EditValue ?>"<?php echo $t_question->datetime_h->EditAttributes() ?>>
</span><?php echo $t_question->datetime_h->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_question->content->Visible) { // content ?>
	<tr<?php echo $t_question->content->RowAttributes ?>>
		<td class="ewTableHeader">Content</td>
		<td<?php echo $t_question->content->CellAttributes() ?>><span id="el_content">
<textarea name="x_content" id="x_content" cols="35" rows="4"<?php echo $t_question->content->EditAttributes() ?>><?php echo $t_question->content->EditValue ?></textarea>
</span><?php echo $t_question->content->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_question->status_faq->Visible) { // status_faq ?>
	<tr<?php echo $t_question->status_faq->RowAttributes ?>>
		<td class="ewTableHeader">Status Faq</td>
		<td<?php echo $t_question->status_faq->CellAttributes() ?>><span id="el_status_faq">
<select id="x_status_faq" name="x_status_faq"<?php echo $t_question->status_faq->EditAttributes() ?>>
<?php
if (is_array($t_question->status_faq->EditValue)) {
	$arwrk = $t_question->status_faq->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->status_faq->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_question->status_faq->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_question->s_public->Visible) { // s_public ?>
	<tr<?php echo $t_question->s_public->RowAttributes ?>>
		<td class="ewTableHeader">S Public</td>
		<td<?php echo $t_question->s_public->CellAttributes() ?>><span id="el_s_public">
<select id="x_s_public" name="x_s_public"<?php echo $t_question->s_public->EditAttributes() ?>>
<?php
if (is_array($t_question->s_public->EditValue)) {
	$arwrk = $t_question->s_public->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->s_public->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_question->s_public->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Add    ">
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
class ct_question_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_question';

	// Page Object Name
	var $PageObjName = 't_question_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question;
		if ($t_question->UseTokenInUrl) $PageUrl .= "t=" . $t_question->TableVar . "&"; // add page token
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
		global $objForm, $t_question;
		if ($t_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question"] = new ct_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question;

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
		global $objForm, $gsFormError, $t_question;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["question_id"] != "") {
		  $t_question->question_id->setQueryStringValue($_GET["question_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_question->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_question->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_question->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_question->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_question->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("t_questionlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_question->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $t_question->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_questionview.php")
						$sReturnUrl = $t_question->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_question->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_question;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_question;
		$t_question->status_faq->CurrentValue = 0;
		$t_question->s_public->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_question;
		$t_question->cat_question_id->setFormValue($objForm->GetValue("x_cat_question_id"));
		$t_question->datetime_h->setFormValue($objForm->GetValue("x_datetime_h"));
		$t_question->datetime_h->CurrentValue = ew_UnFormatDateTime($t_question->datetime_h->CurrentValue, 7);
		$t_question->content->setFormValue($objForm->GetValue("x_content"));
		$t_question->status_faq->setFormValue($objForm->GetValue("x_status_faq"));
		$t_question->s_public->setFormValue($objForm->GetValue("x_s_public"));
		$t_question->question_id->setFormValue($objForm->GetValue("x_question_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_question;
		$t_question->question_id->CurrentValue = $t_question->question_id->FormValue;
		$t_question->cat_question_id->CurrentValue = $t_question->cat_question_id->FormValue;
		$t_question->datetime_h->CurrentValue = $t_question->datetime_h->FormValue;
		$t_question->datetime_h->CurrentValue = ew_UnFormatDateTime($t_question->datetime_h->CurrentValue, 7);
		$t_question->content->CurrentValue = $t_question->content->FormValue;
		$t_question->status_faq->CurrentValue = $t_question->status_faq->FormValue;
		$t_question->s_public->CurrentValue = $t_question->s_public->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question;
		$sFilter = $t_question->KeyFilter();

		// Call Row Selecting event
		$t_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question->CurrentFilter = $sFilter;
		$sSql = $t_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question;
		$t_question->question_id->setDbValue($rs->fields('question_id'));
		$t_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_question->IDcard->setDbValue($rs->fields('IDcard'));
		$t_question->datetime_h->setDbValue($rs->fields('datetime_h'));
		$t_question->msv_id->setDbValue($rs->fields('msv_id'));
		$t_question->zemail->setDbValue($rs->fields('email'));
		$t_question->user_name->setDbValue($rs->fields('user_name'));
		$t_question->tel->setDbValue($rs->fields('tel'));
		$t_question->content->setDbValue($rs->fields('content'));
		$t_question->content1->setDbValue($rs->fields('content1'));
		$t_question->content2->setDbValue($rs->fields('content2'));
		$t_question->description->setDbValue($rs->fields('description'));
		$t_question->status->setDbValue($rs->fields('status'));
		$t_question->active->setDbValue($rs->fields('active'));
		$t_question->s_level->setDbValue($rs->fields('s_level'));
		$t_question->s_Multi->setDbValue($rs->fields('s_Multi'));
		$t_question->s_ok->setDbValue($rs->fields('s_ok'));
		$t_question->s_number->setDbValue($rs->fields('s_number'));
		$t_question->s_finish->setDbValue($rs->fields('s_finish'));
		$t_question->status_faq->setDbValue($rs->fields('status_faq'));
		$t_question->s_public->setDbValue($rs->fields('s_public'));
		$t_question->datetime_hen->setDbValue($rs->fields('datetime_hen'));
		$t_question->datetime_kq->setDbValue($rs->fields('datetime_kq'));
		$t_question->reason->setDbValue($rs->fields('reason'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question;

		// Call Row_Rendering event
		$t_question->Row_Rendering();

		// Common render codes for all row types
		// cat_question_id

		$t_question->cat_question_id->CellCssStyle = "";
		$t_question->cat_question_id->CellCssClass = "";

		// datetime_h
		$t_question->datetime_h->CellCssStyle = "";
		$t_question->datetime_h->CellCssClass = "";

		// content
		$t_question->content->CellCssStyle = "";
		$t_question->content->CellCssClass = "";

		// status_faq
		$t_question->status_faq->CellCssStyle = "";
		$t_question->status_faq->CellCssClass = "";

		// s_public
		$t_question->s_public->CellCssStyle = "";
		$t_question->s_public->CellCssClass = "";
		if ($t_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// cat_question_id
			if (strval($t_question->cat_question_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_question` WHERE `cat_question_id` = " . ew_AdjustSql($t_question->cat_question_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_question->cat_question_id->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_question->cat_question_id->ViewValue = $t_question->cat_question_id->CurrentValue;
				}
			} else {
				$t_question->cat_question_id->ViewValue = NULL;
			}
			$t_question->cat_question_id->CssStyle = "";
			$t_question->cat_question_id->CssClass = "";
			$t_question->cat_question_id->ViewCustomAttributes = "";

			// datetime_h
			$t_question->datetime_h->ViewValue = $t_question->datetime_h->CurrentValue;
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 7);
			$t_question->datetime_h->CssStyle = "";
			$t_question->datetime_h->CssClass = "";
			$t_question->datetime_h->ViewCustomAttributes = "";

			// user_name
			$t_question->user_name->ViewValue = $t_question->user_name->CurrentValue;
			$t_question->user_name->CssStyle = "";
			$t_question->user_name->CssClass = "";
			$t_question->user_name->ViewCustomAttributes = "";

			// content
			$t_question->content->ViewValue = $t_question->content->CurrentValue;
			$t_question->content->CssStyle = "";
			$t_question->content->CssClass = "";
			$t_question->content->ViewCustomAttributes = "";

			// status_faq
			if (strval($t_question->status_faq->CurrentValue) <> "") {
				switch ($t_question->status_faq->CurrentValue) {
					case "0":
						$t_question->status_faq->ViewValue = "Khôngi FAQ";
						break;
					case "1":
						$t_question->status_faq->ViewValue = " FAQ";
						break;
					default:
						$t_question->status_faq->ViewValue = $t_question->status_faq->CurrentValue;
				}
			} else {
				$t_question->status_faq->ViewValue = NULL;
			}
			$t_question->status_faq->CssStyle = "";
			$t_question->status_faq->CssClass = "";
			$t_question->status_faq->ViewCustomAttributes = "";

			// s_public
			if (strval($t_question->s_public->CurrentValue) <> "") {
				switch ($t_question->s_public->CurrentValue) {
					case "0":
						$t_question->s_public->ViewValue = "Không xu?t b?n";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xu?t b?n";
						break;
					default:
						$t_question->s_public->ViewValue = $t_question->s_public->CurrentValue;
				}
			} else {
				$t_question->s_public->ViewValue = NULL;
			}
			$t_question->s_public->CssStyle = "";
			$t_question->s_public->CssClass = "";
			$t_question->s_public->ViewCustomAttributes = "";

			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// datetime_h
			$t_question->datetime_h->HrefValue = "";

			// content
			$t_question->content->HrefValue = "";

			// status_faq
			$t_question->status_faq->HrefValue = "";

			// s_public
			$t_question->s_public->HrefValue = "";
		} elseif ($t_question->RowType == EW_ROWTYPE_ADD) { // Add row

			// cat_question_id
			$t_question->cat_question_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `cat_question_id`, `name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_cat_question`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Please Select"));
			$t_question->cat_question_id->EditValue = $arwrk;

			// datetime_h
			$t_question->datetime_h->EditCustomAttributes = "";
			$t_question->datetime_h->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_question->datetime_h->CurrentValue, 7));

			// content
			$t_question->content->EditCustomAttributes = "";
			$t_question->content->EditValue = ew_HtmlEncode($t_question->content->CurrentValue);

			// status_faq
			$t_question->status_faq->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khôngi FAQ");
			$arwrk[] = array("1", " FAQ");
			array_unshift($arwrk, array("", "Please Select"));
			$t_question->status_faq->EditValue = $arwrk;

			// s_public
			$t_question->s_public->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xu?t b?n");
			$arwrk[] = array("1", "Xu?t b?n");
			array_unshift($arwrk, array("", "Please Select"));
			$t_question->s_public->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$t_question->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_question;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!ew_CheckEuroDate($t_question->datetime_h->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Datetime H";
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
		global $conn, $Security, $t_question;
		$rsnew = array();

		// Field cat_question_id
		$t_question->cat_question_id->SetDbValueDef($t_question->cat_question_id->CurrentValue, NULL);
		$rsnew['cat_question_id'] =& $t_question->cat_question_id->DbValue;

		// Field datetime_h
		$t_question->datetime_h->SetDbValueDef(ew_UnFormatDateTime($t_question->datetime_h->CurrentValue, 7), NULL);
		$rsnew['datetime_h'] =& $t_question->datetime_h->DbValue;

		// Field content
		$t_question->content->SetDbValueDef($t_question->content->CurrentValue, NULL);
		$rsnew['content'] =& $t_question->content->DbValue;

		// Field status_faq
		$t_question->status_faq->SetDbValueDef($t_question->status_faq->CurrentValue, NULL);
		$rsnew['status_faq'] =& $t_question->status_faq->DbValue;

		// Field s_public
		$t_question->s_public->SetDbValueDef($t_question->s_public->CurrentValue, NULL);
		$rsnew['s_public'] =& $t_question->s_public->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_question->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_question->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_question->CancelMessage <> "") {
				$this->setMessage($t_question->CancelMessage);
				$t_question->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_question->question_id->setDbValue($conn->Insert_ID());
			$rsnew['question_id'] =& $t_question->question_id->DbValue;

			// Call Row Inserted event
			$t_question->Row_Inserted($rsnew);
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
