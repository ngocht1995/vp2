<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_setting_aws_quesinfo.php" ?>
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
$t_setting_aws_ques_add = new ct_setting_aws_ques_add();
$Page =& $t_setting_aws_ques_add;

// Page init processing
$t_setting_aws_ques_add->Page_Init();

// Page main processing
$t_setting_aws_ques_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_aws_ques_add = new ew_Page("t_setting_aws_ques_add");

// page properties
t_setting_aws_ques_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_setting_aws_ques_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_setting_aws_ques_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_year"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Year");
		elm = fobj.elements["x" + infix + "_type_setting"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Type Setting");
		elm = fobj.elements["x" + infix + "_datetime"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Datetime");
		elm = fobj.elements["x" + infix + "_active"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Active");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_setting_aws_ques_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_aws_ques_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_aws_ques_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_aws_ques_add.ValidateRequired = false; // no JavaScript validation
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

 <link type="text/css" href="../admincontent/js/mutil_calendar/jquery.datepick.css" rel="stylesheet">
 <script type="text/javascript" src="../admincontent/js/mutil_calendar/jquery.datepick.js"></script>
 <script type="text/javascript" src="../admincontent/js/mutil_calendar/jquery.datepick-vi.js"></script>
       <script type="text/javascript">
        $(function() {
	$('#x_datetime').datepick({ 
    multiSelect: 999, monthsToShow: 3, 
    showTrigger: '#calImg1'});
	//$('#inlineDatepicker').datepick({onSelect: showDate});
});
                        </script>

<p><span class="phpmaker">
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thiết lập thời gian hỏi đáp</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>  
        <br><br>
<a href="<?php echo $t_setting_aws_ques->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_setting_aws_ques_add->ShowMessage() ?>
<form name="ft_setting_aws_quesadd" id="ft_setting_aws_quesadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_setting_aws_ques_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_setting_aws_ques">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_setting_aws_ques->year->Visible) { // year ?>
	<tr<?php echo $t_setting_aws_ques->year->RowAttributes ?>>
		<td class="ewTableHeader">Năm<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting_aws_ques->year->CellAttributes() ?>><span id="el_year">
<select id="x_year" name="x_year"<?php echo $t_setting_aws_ques->year->EditAttributes() ?>>
<?php
if (is_array($t_setting_aws_ques->year->EditValue)) {
	$arwrk = $t_setting_aws_ques->year->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting_aws_ques->year->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_setting_aws_ques->year->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->type_setting->Visible) { // type_setting ?>
	<tr<?php echo $t_setting_aws_ques->type_setting->RowAttributes ?>>
		<td class="ewTableHeader">Loại thiết lập<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting_aws_ques->type_setting->CellAttributes() ?>><span id="el_type_setting">
<select id="x_type_setting" name="x_type_setting"<?php echo $t_setting_aws_ques->type_setting->EditAttributes() ?>>
<?php
if (is_array($t_setting_aws_ques->type_setting->EditValue)) {
	$arwrk = $t_setting_aws_ques->type_setting->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting_aws_ques->type_setting->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_setting_aws_ques->type_setting->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->datetime->Visible) { // datetime ?>
	<tr<?php echo $t_setting_aws_ques->datetime->RowAttributes ?>>
		<td class="ewTableHeader">Danh sách ngày<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting_aws_ques->datetime->CellAttributes() ?>><span id="el_datetime">
                        <textarea style="font-weight: bold;color: navy" name="x_datetime" id="x_datetime" cols="120" rows="4"<?php echo $t_setting_aws_ques->datetime->EditAttributes() ?>><?php echo $t_setting_aws_ques->datetime->EditValue ?></textarea>
<br/>  (Note: click image để chọn ngày) <img  id="calImg1"  src="../admincontent/js/mutil_calendar/calendar-blue.gif" alt="Popup" >
</span><?php echo $t_setting_aws_ques->datetime->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_setting_aws_ques->active->Visible) { // active ?>
	<tr<?php echo $t_setting_aws_ques->active->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $t_setting_aws_ques->active->CellAttributes() ?>><span id="el_active">
<div id="tp_x_active" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><input type="radio" name="x_active" id="x_active" value="{value}"<?php echo $t_setting_aws_ques->active->EditAttributes() ?>></div>
<div id="dsl_x_active" repeatcolumn="5">
<?php
$arwrk = $t_setting_aws_ques->active->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_setting_aws_ques->active->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_active" id="x_active" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_setting_aws_ques->active->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_setting_aws_ques->active->CustomMsg ?></td>
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
class ct_setting_aws_ques_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_setting_aws_ques';

	// Page Object Name
	var $PageObjName = 't_setting_aws_ques_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) $PageUrl .= "t=" . $t_setting_aws_ques->TableVar . "&"; // add page token
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
		global $objForm, $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting_aws_ques->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting_aws_ques->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_aws_ques_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting_aws_ques"] = new ct_setting_aws_ques();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting_aws_ques', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting_aws_ques;
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
			$this->Page_Terminate("t_setting_aws_queslist.php");
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
		global $objForm, $gsFormError, $t_setting_aws_ques;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["id"] != "") {
		  $t_setting_aws_ques->id->setQueryStringValue($_GET["id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_setting_aws_ques->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_setting_aws_ques->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_setting_aws_ques->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_setting_aws_ques->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_setting_aws_ques->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("t_setting_aws_queslist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_setting_aws_ques->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $t_setting_aws_ques->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_setting_aws_quesview.php")
						$sReturnUrl = $t_setting_aws_ques->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_setting_aws_ques->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_setting_aws_ques;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_setting_aws_ques;
		$t_setting_aws_ques->active->CurrentValue = 1;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_setting_aws_ques;
		$t_setting_aws_ques->year->setFormValue($objForm->GetValue("x_year"));
		$t_setting_aws_ques->type_setting->setFormValue($objForm->GetValue("x_type_setting"));
		$t_setting_aws_ques->datetime->setFormValue($objForm->GetValue("x_datetime"));
		$t_setting_aws_ques->active->setFormValue($objForm->GetValue("x_active"));
		$t_setting_aws_ques->id->setFormValue($objForm->GetValue("x_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_setting_aws_ques;
		$t_setting_aws_ques->id->CurrentValue = $t_setting_aws_ques->id->FormValue;
		$t_setting_aws_ques->year->CurrentValue = $t_setting_aws_ques->year->FormValue;
		$t_setting_aws_ques->type_setting->CurrentValue = $t_setting_aws_ques->type_setting->FormValue;
		$t_setting_aws_ques->datetime->CurrentValue = $t_setting_aws_ques->datetime->FormValue;
		$t_setting_aws_ques->active->CurrentValue = $t_setting_aws_ques->active->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting_aws_ques;
		$sFilter = $t_setting_aws_ques->KeyFilter();

		// Call Row Selecting event
		$t_setting_aws_ques->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting_aws_ques->CurrentFilter = $sFilter;
		$sSql = $t_setting_aws_ques->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting_aws_ques->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting_aws_ques;
		$t_setting_aws_ques->id->setDbValue($rs->fields('id'));
		$t_setting_aws_ques->year->setDbValue($rs->fields('year'));
		$t_setting_aws_ques->type_setting->setDbValue($rs->fields('type_setting'));
		$t_setting_aws_ques->datetime->setDbValue($rs->fields('datetime'));
		$t_setting_aws_ques->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting_aws_ques;

		// Call Row_Rendering event
		$t_setting_aws_ques->Row_Rendering();

		// Common render codes for all row types
		// year

		$t_setting_aws_ques->year->CellCssStyle = "";
		$t_setting_aws_ques->year->CellCssClass = "";

		// type_setting
		$t_setting_aws_ques->type_setting->CellCssStyle = "";
		$t_setting_aws_ques->type_setting->CellCssClass = "";

		// datetime
		$t_setting_aws_ques->datetime->CellCssStyle = "";
		$t_setting_aws_ques->datetime->CellCssClass = "";

		// active
		$t_setting_aws_ques->active->CellCssStyle = "";
		$t_setting_aws_ques->active->CellCssClass = "";
		if ($t_setting_aws_ques->RowType == EW_ROWTYPE_VIEW) { // View row

			// id
			$t_setting_aws_ques->id->ViewValue = $t_setting_aws_ques->id->CurrentValue;
			$t_setting_aws_ques->id->CssStyle = "";
			$t_setting_aws_ques->id->CssClass = "";
			$t_setting_aws_ques->id->ViewCustomAttributes = "";

			// year
			if (strval($t_setting_aws_ques->year->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->year->CurrentValue) {
					case "1":
						$t_setting_aws_ques->year->ViewValue = "2015";
						break;
					case "2":
						$t_setting_aws_ques->year->ViewValue = "2016";
						break;
					case "3":
						$t_setting_aws_ques->year->ViewValue = "2017";
						break;
					case "4":
						$t_setting_aws_ques->year->ViewValue = "2018";
						break;
					case "5":
						$t_setting_aws_ques->year->ViewValue = "2019";
						break;
					default:
						$t_setting_aws_ques->year->ViewValue = $t_setting_aws_ques->year->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->year->ViewValue = NULL;
			}
			$t_setting_aws_ques->year->CssStyle = "";
			$t_setting_aws_ques->year->CssClass = "";
			$t_setting_aws_ques->year->ViewCustomAttributes = "";

			// type_setting
			if (strval($t_setting_aws_ques->type_setting->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->type_setting->CurrentValue) {
					case "1":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiet lap thoi gian khoa he thong dat cau hoi";
						break;
					case "2":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiet lap thoi gian hen tra loi he thong";
						break;
					default:
						$t_setting_aws_ques->type_setting->ViewValue = $t_setting_aws_ques->type_setting->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->type_setting->ViewValue = NULL;
			}
			$t_setting_aws_ques->type_setting->CssStyle = "";
			$t_setting_aws_ques->type_setting->CssClass = "";
			$t_setting_aws_ques->type_setting->ViewCustomAttributes = "";

			// datetime
			$t_setting_aws_ques->datetime->ViewValue = $t_setting_aws_ques->datetime->CurrentValue;
			$t_setting_aws_ques->datetime->CssStyle = "";
			$t_setting_aws_ques->datetime->CssClass = "";
			$t_setting_aws_ques->datetime->ViewCustomAttributes = "";

			// active
			if (strval($t_setting_aws_ques->active->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->active->CurrentValue) {
					case "0":
						$t_setting_aws_ques->active->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_setting_aws_ques->active->ViewValue = "Kich hoat";
						break;
					default:
						$t_setting_aws_ques->active->ViewValue = $t_setting_aws_ques->active->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->active->ViewValue = NULL;
			}
			$t_setting_aws_ques->active->CssStyle = "";
			$t_setting_aws_ques->active->CssClass = "";
			$t_setting_aws_ques->active->ViewCustomAttributes = "";

			// year
			$t_setting_aws_ques->year->HrefValue = "";

			// type_setting
			$t_setting_aws_ques->type_setting->HrefValue = "";

			// datetime
			$t_setting_aws_ques->datetime->HrefValue = "";

			// active
			$t_setting_aws_ques->active->HrefValue = "";
		} elseif ($t_setting_aws_ques->RowType == EW_ROWTYPE_ADD) { // Add row

			// year
			$t_setting_aws_ques->year->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("2015", "2015");
			$arwrk[] = array("2016", "2016");
			$arwrk[] = array("2017", "2017");
			$arwrk[] = array("2018", "2018");
			$arwrk[] = array("2019", "2019");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$t_setting_aws_ques->year->EditValue = $arwrk;

			// type_setting
			$t_setting_aws_ques->type_setting->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("2", "Thiết lập ngày nghỉ trên hệ thống");
			array_unshift($arwrk, array("", "Lựa chọn"));
			$t_setting_aws_ques->type_setting->EditValue = $arwrk;

			// datetime
			$t_setting_aws_ques->datetime->EditCustomAttributes = "";
			$t_setting_aws_ques->datetime->EditValue = ew_HtmlEncode($t_setting_aws_ques->datetime->CurrentValue);

			// active
			$t_setting_aws_ques->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_setting_aws_ques->active->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$t_setting_aws_ques->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_setting_aws_ques;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_setting_aws_ques->year->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Year";
		}
		if ($t_setting_aws_ques->type_setting->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Type Setting";
		}
		if ($t_setting_aws_ques->datetime->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Datetime";
		}
		if ($t_setting_aws_ques->active->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Active";
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
		global $conn, $Security, $t_setting_aws_ques;
		$rsnew = array();

		// Field year
		$t_setting_aws_ques->year->SetDbValueDef($t_setting_aws_ques->year->CurrentValue, NULL);
		$rsnew['year'] =& $t_setting_aws_ques->year->DbValue;

		// Field type_setting
		$t_setting_aws_ques->type_setting->SetDbValueDef($t_setting_aws_ques->type_setting->CurrentValue, NULL);
		$rsnew['type_setting'] =& $t_setting_aws_ques->type_setting->DbValue;

		// Field datetime
		$t_setting_aws_ques->datetime->SetDbValueDef($t_setting_aws_ques->datetime->CurrentValue, NULL);
		$rsnew['datetime'] =& $t_setting_aws_ques->datetime->DbValue;

		// Field active
		$t_setting_aws_ques->active->SetDbValueDef($t_setting_aws_ques->active->CurrentValue, NULL);
		$rsnew['active'] =& $t_setting_aws_ques->active->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_setting_aws_ques->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_setting_aws_ques->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_setting_aws_ques->CancelMessage <> "") {
				$this->setMessage($t_setting_aws_ques->CancelMessage);
				$t_setting_aws_ques->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_setting_aws_ques->id->setDbValue($conn->Insert_ID());
			$rsnew['id'] =& $t_setting_aws_ques->id->DbValue;

			// Call Row Inserted event
			$t_setting_aws_ques->Row_Inserted($rsnew);
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
