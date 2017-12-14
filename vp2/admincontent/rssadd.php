<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "rssinfo.php" ?>
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
$rss_add = new crss_add();
$Page =& $rss_add;

// Page init processing
$rss_add->Page_Init();

// Page main processing
$rss_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var rss_add = new ew_Page("rss_add");

// page properties
rss_add.PageID = "add"; // page ID
var EW_PAGE_ID = rss_add.PageID; // for backward compatibility

// extend page with ValidateForm function
rss_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_rss_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Rss Name");
		elm = fobj.elements["x" + infix + "_rss_link"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Rss Link");
		elm = fobj.elements["x" + infix + "_rss_order"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Rss Order");
		elm = fobj.elements["x" + infix + "_rss_order"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Rss Order");
		elm = fobj.elements["x" + infix + "_rss_state"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Rss State");
		elm = fobj.elements["x" + infix + "_rss_type"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Rss Type");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
rss_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
rss_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
rss_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
rss_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $rss->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a>
                                                                <b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý RSS"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $rss_add->ShowMessage() ?>
<form name="frssadd" id="frssadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return rss_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="rss">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($rss->rss_name->Visible) { // rss_name ?>
	<tr<?php echo $rss->rss_name->RowAttributes ?>>
		<td class="ewTableHeader">Tên RSS<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $rss->rss_name->CellAttributes() ?>><span id="el_rss_name">
<input type="text" name="x_rss_name" id="x_rss_name" size="30" maxlength="255" value="<?php echo $rss->rss_name->EditValue ?>"<?php echo $rss->rss_name->EditAttributes() ?>>
</span><?php echo $rss->rss_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_link->Visible) { // rss_link ?>
	<tr<?php echo $rss->rss_link->RowAttributes ?>>
		<td class="ewTableHeader">Đường dẫn RSS<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $rss->rss_link->CellAttributes() ?>><span id="el_rss_link">
<input type="text" name="x_rss_link" id="x_rss_link" size="30" maxlength="255" value="<?php echo $rss->rss_link->EditValue ?>"<?php echo $rss->rss_link->EditAttributes() ?>>
</span><?php echo $rss->rss_link->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_order->Visible) { // rss_order ?>
	<tr<?php echo $rss->rss_order->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự hiển thị RSS<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $rss->rss_order->CellAttributes() ?>><span id="el_rss_order">
<input type="text" name="x_rss_order" id="x_rss_order" size="30" value="<?php echo $rss->rss_order->EditValue ?>"<?php echo $rss->rss_order->EditAttributes() ?>>
</span><?php echo $rss->rss_order->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_state->Visible) { // rss_state ?>
	<tr<?php echo $rss->rss_state->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái RSS<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $rss->rss_state->CellAttributes() ?>><span id="el_rss_state">
<select id="x_rss_state" name="x_rss_state"<?php echo $rss->rss_state->EditAttributes() ?>>
<?php
if (is_array($rss->rss_state->EditValue)) {
	$arwrk = $rss->rss_state->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($rss->rss_state->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $rss->rss_state->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($rss->rss_type->Visible) { // rss_type ?>
	<tr<?php echo $rss->rss_type->RowAttributes ?>>
		<td class="ewTableHeader">Loại RSS<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $rss->rss_type->CellAttributes() ?>><span id="el_rss_type">
<select id="x_rss_type" name="x_rss_type"<?php echo $rss->rss_type->EditAttributes() ?>>
<?php
if (is_array($rss->rss_type->EditValue)) {
	$arwrk = $rss->rss_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($rss->rss_type->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $rss->rss_type->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Thêm mới    ">
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
class crss_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'rss';

	// Page Object Name
	var $PageObjName = 'rss_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $rss;
		if ($rss->UseTokenInUrl) $PageUrl .= "t=" . $rss->TableVar . "&"; // add page token
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
		global $objForm, $rss;
		if ($rss->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($rss->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($rss->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function crss_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["rss"] = new crss();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'rss', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $rss;
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
			$this->Page_Terminate("rsslist.php");
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
		global $objForm, $gsFormError, $rss;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["rss_id"] != "") {
		  $rss->rss_id->setQueryStringValue($_GET["rss_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $rss->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$rss->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $rss->CurrentAction = "C"; // Copy Record
		  } else {
		    $rss->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($rss->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("rsslist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$rss->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm mới thành công"); // Set up success message
					$sReturnUrl = $rss->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "rssview.php")
						$sReturnUrl = $rss->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$rss->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $rss;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $rss;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $rss;
		$rss->rss_name->setFormValue($objForm->GetValue("x_rss_name"));
		$rss->rss_link->setFormValue($objForm->GetValue("x_rss_link"));
		$rss->rss_order->setFormValue($objForm->GetValue("x_rss_order"));
		$rss->rss_state->setFormValue($objForm->GetValue("x_rss_state"));
		$rss->rss_type->setFormValue($objForm->GetValue("x_rss_type"));
		$rss->rss_id->setFormValue($objForm->GetValue("x_rss_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $rss;
		$rss->rss_id->CurrentValue = $rss->rss_id->FormValue;
		$rss->rss_name->CurrentValue = $rss->rss_name->FormValue;
		$rss->rss_link->CurrentValue = $rss->rss_link->FormValue;
		$rss->rss_order->CurrentValue = $rss->rss_order->FormValue;
		$rss->rss_state->CurrentValue = $rss->rss_state->FormValue;
		$rss->rss_type->CurrentValue = $rss->rss_type->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $rss;
		$sFilter = $rss->KeyFilter();

		// Call Row Selecting event
		$rss->Row_Selecting($sFilter);

		// Load sql based on filter
		$rss->CurrentFilter = $sFilter;
		$sSql = $rss->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$rss->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $rss;
		$rss->rss_id->setDbValue($rs->fields('rss_id'));
		$rss->rss_name->setDbValue($rs->fields('rss_name'));
		$rss->rss_link->setDbValue($rs->fields('rss_link'));
		$rss->rss_order->setDbValue($rs->fields('rss_order'));
		$rss->rss_state->setDbValue($rs->fields('rss_state'));
		$rss->rss_type->setDbValue($rs->fields('rss_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $rss;

		// Call Row_Rendering event
		$rss->Row_Rendering();

		// Common render codes for all row types
		// rss_name

		$rss->rss_name->CellCssStyle = "";
		$rss->rss_name->CellCssClass = "";

		// rss_link
		$rss->rss_link->CellCssStyle = "";
		$rss->rss_link->CellCssClass = "";

		// rss_order
		$rss->rss_order->CellCssStyle = "";
		$rss->rss_order->CellCssClass = "";

		// rss_state
		$rss->rss_state->CellCssStyle = "";
		$rss->rss_state->CellCssClass = "";

		// rss_type
		$rss->rss_type->CellCssStyle = "";
		$rss->rss_type->CellCssClass = "";
		if ($rss->RowType == EW_ROWTYPE_VIEW) { // View row

			// rss_id
			$rss->rss_id->ViewValue = $rss->rss_id->CurrentValue;
			$rss->rss_id->CssStyle = "";
			$rss->rss_id->CssClass = "";
			$rss->rss_id->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->ViewValue = $rss->rss_name->CurrentValue;
			$rss->rss_name->CssStyle = "";
			$rss->rss_name->CssClass = "";
			$rss->rss_name->ViewCustomAttributes = "";

			// rss_link
			$rss->rss_link->ViewValue = $rss->rss_link->CurrentValue;
			$rss->rss_link->CssStyle = "";
			$rss->rss_link->CssClass = "";
			$rss->rss_link->ViewCustomAttributes = "";

			// rss_order
			$rss->rss_order->ViewValue = $rss->rss_order->CurrentValue;
			$rss->rss_order->CssStyle = "";
			$rss->rss_order->CssClass = "";
			$rss->rss_order->ViewCustomAttributes = "";

			// rss_state
			if (strval($rss->rss_state->CurrentValue) <> "") {
				switch ($rss->rss_state->CurrentValue) {
					case "0":
						$rss->rss_state->ViewValue = "Không hiển thị";
						break;
					case "1":
						$rss->rss_state->ViewValue = "Hiển thị";
						break;
					default:
						$rss->rss_state->ViewValue = $rss->rss_state->CurrentValue;
				}
			} else {
				$rss->rss_state->ViewValue = NULL;
			}
			$rss->rss_state->CssStyle = "";
			$rss->rss_state->CssClass = "";
			$rss->rss_state->ViewCustomAttributes = "";

			// rss_type
			if (strval($rss->rss_type->CurrentValue) <> "") {
				switch ($rss->rss_type->CurrentValue) {
					case "1":
						$rss->rss_type->ViewValue = "Chào mua";
						break;
					case "2":
						$rss->rss_type->ViewValue = "Chào bán";
						break;
					case "3":
						$rss->rss_type->ViewValue = "Sản phẩm";
						break;
					default:
						$rss->rss_type->ViewValue = $rss->rss_type->CurrentValue;
				}
			} else {
				$rss->rss_type->ViewValue = NULL;
			}
			$rss->rss_type->CssStyle = "";
			$rss->rss_type->CssClass = "";
			$rss->rss_type->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->HrefValue = "";

			// rss_link
			$rss->rss_link->HrefValue = "";

			// rss_order
			$rss->rss_order->HrefValue = "";

			// rss_state
			$rss->rss_state->HrefValue = "";

			// rss_type
			$rss->rss_type->HrefValue = "";
		} elseif ($rss->RowType == EW_ROWTYPE_ADD) { // Add row

			// rss_name
			$rss->rss_name->EditCustomAttributes = "";
			$rss->rss_name->EditValue = ew_HtmlEncode($rss->rss_name->CurrentValue);

			// rss_link
			$rss->rss_link->EditCustomAttributes = "";
			$rss->rss_link->EditValue = ew_HtmlEncode($rss->rss_link->CurrentValue);

			// rss_order
			$rss->rss_order->EditCustomAttributes = "";
			$rss->rss_order->EditValue = ew_HtmlEncode($rss->rss_order->CurrentValue);

			// rss_state
			$rss->rss_state->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không hiển thị");
			$arwrk[] = array("1", "Hiển thị");
			array_unshift($arwrk, array("", "Chọn"));
			$rss->rss_state->EditValue = $arwrk;

			// rss_type
			$rss->rss_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Chào mua");
			$arwrk[] = array("2", "Chào bán");
			$arwrk[] = array("3", "Sản phẩm");
			array_unshift($arwrk, array("", "Chọn"));
			$rss->rss_type->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$rss->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $rss;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($rss->rss_name->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Rss Name";
		}
		if ($rss->rss_link->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Rss Link";
		}
		if ($rss->rss_order->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Rss Order";
		}
		if (!ew_CheckInteger($rss->rss_order->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Rss Order";
		}
		if ($rss->rss_state->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Rss State";
		}
		if ($rss->rss_type->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Rss Type";
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
		global $conn, $Security, $rss;
		$rsnew = array();

		// Field rss_name
		$rss->rss_name->SetDbValueDef($rss->rss_name->CurrentValue, "");
		$rsnew['rss_name'] =& $rss->rss_name->DbValue;

		// Field rss_link
		$rss->rss_link->SetDbValueDef($rss->rss_link->CurrentValue, "");
		$rsnew['rss_link'] =& $rss->rss_link->DbValue;

		// Field rss_order
		$rss->rss_order->SetDbValueDef($rss->rss_order->CurrentValue, 0);
		$rsnew['rss_order'] =& $rss->rss_order->DbValue;

		// Field rss_state
		$rss->rss_state->SetDbValueDef($rss->rss_state->CurrentValue, 0);
		$rsnew['rss_state'] =& $rss->rss_state->DbValue;

		// Field rss_type
		$rss->rss_type->SetDbValueDef($rss->rss_type->CurrentValue, 0);
		$rsnew['rss_type'] =& $rss->rss_type->DbValue;

		// Call Row Inserting event
		$bInsertRow = $rss->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($rss->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($rss->CancelMessage <> "") {
				$this->setMessage($rss->CancelMessage);
				$rss->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$rss->rss_id->setDbValue($conn->Insert_ID());
			$rsnew['rss_id'] =& $rss->rss_id->DbValue;

			// Call Row Inserted event
			$rss->Row_Inserted($rsnew);
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
