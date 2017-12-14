<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "help_managerinfo.php" ?>
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
$help_manager_add = new chelp_manager_add();
$Page =& $help_manager_add;

// Page init processing
$help_manager_add->Page_Init();

// Page main processing
$help_manager_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var help_manager_add = new ew_Page("help_manager_add");

// page properties
help_manager_add.PageID = "add"; // page ID
var EW_PAGE_ID = help_manager_add.PageID; // for backward compatibility

// extend page with ValidateForm function
help_manager_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_ho_ten"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Họ và tên");
		elm = fobj.elements["x" + infix + "_chuc_nang"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Chức năng");
		elm = fobj.elements["x" + infix + "_zemail"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Email");
		elm = fobj.elements["x" + infix + "_nick_yahoo"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Nick Yahoo");
		elm = fobj.elements["x" + infix + "_nick_skye"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Nick Skype");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
help_manager_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
help_manager_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
help_manager_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
help_manager_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $help_manager->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm người trợ giúp</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $help_manager_add->ShowMessage() ?>
<form name="fhelp_manageradd" id="fhelp_manageradd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return help_manager_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="help_manager">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($help_manager->ho_ten->Visible) { // ho_ten ?>
	<tr<?php echo $help_manager->ho_ten->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $help_manager->ho_ten->CellAttributes() ?>><span id="el_ho_ten">
<input type="text" name="x_ho_ten" id="x_ho_ten" size="30" maxlength="45" value="<?php echo $help_manager->ho_ten->EditValue ?>"<?php echo $help_manager->ho_ten->EditAttributes() ?>>
</span><?php echo $help_manager->ho_ten->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($help_manager->dien_thoai->Visible) { // dien_thoai ?>
	<tr<?php echo $help_manager->dien_thoai->RowAttributes ?>>
		<td class="ewTableHeader">Điện thoại<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $help_manager->dien_thoai->CellAttributes() ?>><span id="el_dien_thoai">
<input type="text" name="x_dien_thoai" id="x_dien_thoai" size="30" maxlength="45" value="<?php echo $help_manager->dien_thoai->EditValue ?>"<?php echo $help_manager->dien_thoai->EditAttributes() ?>>
</span><?php echo $help_manager->dien_thoai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($help_manager->chuc_nang->Visible) { // chuc_nang ?>
	<tr<?php echo $help_manager->chuc_nang->RowAttributes ?>>
		<td class="ewTableHeader">Chức năng<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $help_manager->chuc_nang->CellAttributes() ?>><span id="el_chuc_nang">
<select id="x_chuc_nang" name="x_chuc_nang"<?php echo $help_manager->chuc_nang->EditAttributes() ?>>
<?php
if (is_array($help_manager->chuc_nang->EditValue)) {
	$arwrk = $help_manager->chuc_nang->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($help_manager->chuc_nang->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $help_manager->chuc_nang->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($help_manager->zemail->Visible) { // email ?>
	<tr<?php echo $help_manager->zemail->RowAttributes ?>>
		<td class="ewTableHeader">Email<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $help_manager->zemail->CellAttributes() ?>><span id="el_zemail">
<input type="text" name="x_zemail" id="x_zemail" size="30" maxlength="45" value="<?php echo $help_manager->zemail->EditValue ?>"<?php echo $help_manager->zemail->EditAttributes() ?>>
</span><?php echo $help_manager->zemail->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($help_manager->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $help_manager->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $help_manager->nick_yahoo->CellAttributes() ?>><span id="el_nick_yahoo">
<input type="text" name="x_nick_yahoo" id="x_nick_yahoo" size="30" maxlength="45" value="<?php echo $help_manager->nick_yahoo->EditValue ?>"<?php echo $help_manager->nick_yahoo->EditAttributes() ?>>
</span><?php echo $help_manager->nick_yahoo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($help_manager->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $help_manager->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $help_manager->nick_skype->CellAttributes() ?>><span id="el_nick_skype">
<input type="text" name="x_nick_skype" id="x_nick_skype" size="30" maxlength="45" value="<?php echo $help_manager->nick_skype->EditValue ?>"<?php echo $help_manager->nick_skype->EditAttributes() ?>>
</span><?php echo $help_manager->nick_skype->CustomMsg ?></td>
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
class chelp_manager_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'help_manager';

	// Page Object Name
	var $PageObjName = 'help_manager_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $help_manager;
		if ($help_manager->UseTokenInUrl) $PageUrl .= "t=" . $help_manager->TableVar . "&"; // add page token
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
		global $objForm, $help_manager;
		if ($help_manager->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($help_manager->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($help_manager->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function chelp_manager_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["help_manager"] = new chelp_manager();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'help_manager', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $help_manager;
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
			$this->Page_Terminate("help_managerlist.php");
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
		global $objForm, $gsFormError, $help_manager;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["help_id"] != "") {
		  $help_manager->help_id->setQueryStringValue($_GET["help_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $help_manager->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$help_manager->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $help_manager->CurrentAction = "C"; // Copy Record
		  } else {
		    $help_manager->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($help_manager->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("help_managerlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$help_manager->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm mới thành công"); // Set up success message
					$sReturnUrl = $help_manager->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "help_managerview.php")
						$sReturnUrl = $help_manager->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$help_manager->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $help_manager;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $help_manager;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $help_manager;
		$help_manager->nick_yahoo->setFormValue($objForm->GetValue("x_nick_yahoo"));
		$help_manager->ho_ten->setFormValue($objForm->GetValue("x_ho_ten"));
		$help_manager->dien_thoai->setFormValue($objForm->GetValue("x_dien_thoai"));
		$help_manager->chuc_nang->setFormValue($objForm->GetValue("x_chuc_nang"));
		$help_manager->zemail->setFormValue($objForm->GetValue("x_zemail"));
		$help_manager->nick_skype->setFormValue($objForm->GetValue("x_nick_skype"));
		$help_manager->help_id->setFormValue($objForm->GetValue("x_help_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $help_manager;
		$help_manager->help_id->CurrentValue = $help_manager->help_id->FormValue;
		$help_manager->nick_yahoo->CurrentValue = $help_manager->nick_yahoo->FormValue;
		$help_manager->ho_ten->CurrentValue = $help_manager->ho_ten->FormValue;
		$help_manager->dien_thoai->CurrentValue = $help_manager->dien_thoai->FormValue;
		$help_manager->chuc_nang->CurrentValue = $help_manager->chuc_nang->FormValue;
		$help_manager->zemail->CurrentValue = $help_manager->zemail->FormValue;
		$help_manager->nick_skype->CurrentValue = $help_manager->nick_skype->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $help_manager;
		$sFilter = $help_manager->KeyFilter();

		// Call Row Selecting event
		$help_manager->Row_Selecting($sFilter);

		// Load sql based on filter
		$help_manager->CurrentFilter = $sFilter;
		$sSql = $help_manager->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$help_manager->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $help_manager;
		$help_manager->help_id->setDbValue($rs->fields('help_id'));
		$help_manager->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$help_manager->ho_ten->setDbValue($rs->fields('ho_ten'));
		$help_manager->dien_thoai->setDbValue($rs->fields('dien_thoai'));
		$help_manager->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$help_manager->zemail->setDbValue($rs->fields('email'));
		$help_manager->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $help_manager;

		// Call Row_Rendering event
		$help_manager->Row_Rendering();

		// Common render codes for all row types
		// nick_yahoo

		$help_manager->nick_yahoo->CellCssStyle = "";
		$help_manager->nick_yahoo->CellCssClass = "";

		// ho_ten
		$help_manager->ho_ten->CellCssStyle = "";
		$help_manager->ho_ten->CellCssClass = "";

		// dien_thoai
		$help_manager->dien_thoai->CellCssStyle = "";
		$help_manager->dien_thoai->CellCssClass = "";

		// chuc_nang
		$help_manager->chuc_nang->CellCssStyle = "";
		$help_manager->chuc_nang->CellCssClass = "";

		// email
		$help_manager->zemail->CellCssStyle = "";
		$help_manager->zemail->CellCssClass = "";

		// nick_skype
		$help_manager->nick_skype->CellCssStyle = "";
		$help_manager->nick_skype->CellCssClass = "";
		if ($help_manager->RowType == EW_ROWTYPE_VIEW) { // View row

			// help_id
			$help_manager->help_id->ViewValue = $help_manager->help_id->CurrentValue;
			$help_manager->help_id->CssStyle = "";
			$help_manager->help_id->CssClass = "";
			$help_manager->help_id->ViewCustomAttributes = "";

			// nick_yahoo
			$help_manager->nick_yahoo->ViewValue = $help_manager->nick_yahoo->CurrentValue;
			$help_manager->nick_yahoo->CssStyle = "";
			$help_manager->nick_yahoo->CssClass = "";
			$help_manager->nick_yahoo->ViewCustomAttributes = "";

			// ho_ten
			$help_manager->ho_ten->ViewValue = $help_manager->ho_ten->CurrentValue;
			$help_manager->ho_ten->CssStyle = "";
			$help_manager->ho_ten->CssClass = "";
			$help_manager->ho_ten->ViewCustomAttributes = "";

			// dien_thoai
			$help_manager->dien_thoai->ViewValue = $help_manager->dien_thoai->CurrentValue;
			$help_manager->dien_thoai->CssStyle = "";
			$help_manager->dien_thoai->CssClass = "";
			$help_manager->dien_thoai->ViewCustomAttributes = "";

			// chuc_nang
			if (strval($help_manager->chuc_nang->CurrentValue) <> "") {
				switch ($help_manager->chuc_nang->CurrentValue) {
					case "1":
						$help_manager->chuc_nang->ViewValue = "Quản lý website";
						break;
					case "2":
						$help_manager->chuc_nang->ViewValue = "Chăm sóc khách hàng";
						break;
					default:
						$help_manager->chuc_nang->ViewValue = $help_manager->chuc_nang->CurrentValue;
				}
			} else {
				$help_manager->chuc_nang->ViewValue = NULL;
			}
			$help_manager->chuc_nang->CssStyle = "";
			$help_manager->chuc_nang->CssClass = "";
			$help_manager->chuc_nang->ViewCustomAttributes = "";

			// email
			$help_manager->zemail->ViewValue = $help_manager->zemail->CurrentValue;
			$help_manager->zemail->CssStyle = "";
			$help_manager->zemail->CssClass = "";
			$help_manager->zemail->ViewCustomAttributes = "";

			// nick_skype
			$help_manager->nick_skype->ViewValue = $help_manager->nick_skype->CurrentValue;
			$help_manager->nick_skype->CssStyle = "";
			$help_manager->nick_skype->CssClass = "";
			$help_manager->nick_skype->ViewCustomAttributes = "";

			// nick_yahoo
			$help_manager->nick_yahoo->HrefValue = "";

			// ho_ten
			$help_manager->ho_ten->HrefValue = "";

			// dien_thoai
			$help_manager->dien_thoai->HrefValue = "";

			// chuc_nang
			$help_manager->chuc_nang->HrefValue = "";

			// email
			$help_manager->zemail->HrefValue = "";

			// nick_skype
			$help_manager->nick_skype->HrefValue = "";
		} elseif ($help_manager->RowType == EW_ROWTYPE_ADD) { // Add row

			// nick_yahoo
			$help_manager->nick_yahoo->EditCustomAttributes = "";
			$help_manager->nick_yahoo->EditValue = ew_HtmlEncode($help_manager->nick_yahoo->CurrentValue);

			// ho_ten
			$help_manager->ho_ten->EditCustomAttributes = "";
			$help_manager->ho_ten->EditValue = ew_HtmlEncode($help_manager->ho_ten->CurrentValue);

			// dien_thoai
			$help_manager->dien_thoai->EditCustomAttributes = "";
			$help_manager->dien_thoai->EditValue = ew_HtmlEncode($help_manager->dien_thoai->CurrentValue);

			// chuc_nang
			$help_manager->chuc_nang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Quản lý HTSV");
			$arwrk[] = array("2", "Quản lý học phí");
			array_unshift($arwrk, array("", "Chọn"));
			$help_manager->chuc_nang->EditValue = $arwrk;

			// email
			$help_manager->zemail->EditCustomAttributes = "";
			$help_manager->zemail->EditValue = ew_HtmlEncode($help_manager->zemail->CurrentValue);

			// nick_skype
			$help_manager->nick_skype->EditCustomAttributes = "";
			$help_manager->nick_skype->EditValue = ew_HtmlEncode($help_manager->nick_skype->CurrentValue);
		}

		// Call Row Rendered event
		$help_manager->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $help_manager;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($help_manager->nick_yahoo->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nick Yahoo";
		}
		if ($help_manager->ho_ten->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Ho Ten";
		}
		if ($help_manager->chuc_nang->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Chuc Nang";
		}
		if ($help_manager->zemail->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Email";
		}
		if ($help_manager->nick_skype->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nick Skype";
		}*/

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
		global $conn, $Security, $help_manager;
		$rsnew = array();

		// Field nick_yahoo
		$help_manager->nick_yahoo->SetDbValueDef($help_manager->nick_yahoo->CurrentValue, "");
		$rsnew['nick_yahoo'] =& $help_manager->nick_yahoo->DbValue;

		// Field ho_ten
		$help_manager->ho_ten->SetDbValueDef($help_manager->ho_ten->CurrentValue, "");
		$rsnew['ho_ten'] =& $help_manager->ho_ten->DbValue;

		// Field dien_thoai
		$help_manager->dien_thoai->SetDbValueDef($help_manager->dien_thoai->CurrentValue, NULL);
		$rsnew['dien_thoai'] =& $help_manager->dien_thoai->DbValue;

		// Field chuc_nang
		$help_manager->chuc_nang->SetDbValueDef($help_manager->chuc_nang->CurrentValue, 0);
		$rsnew['chuc_nang'] =& $help_manager->chuc_nang->DbValue;

		// Field email
		$help_manager->zemail->SetDbValueDef($help_manager->zemail->CurrentValue, "");
		$rsnew['email'] =& $help_manager->zemail->DbValue;

		// Field nick_skype
		$help_manager->nick_skype->SetDbValueDef($help_manager->nick_skype->CurrentValue, "");
		$rsnew['nick_skype'] =& $help_manager->nick_skype->DbValue;

		// Call Row Inserting event
		$bInsertRow = $help_manager->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($help_manager->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($help_manager->CancelMessage <> "") {
				$this->setMessage($help_manager->CancelMessage);
				$help_manager->CancelMessage = "";
			} else {
				$this->setMessage("Huỷ bỏ cập nhật");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$help_manager->help_id->setDbValue($conn->Insert_ID());
			$rsnew['help_id'] =& $help_manager->help_id->DbValue;

			// Call Row Inserted event
			$help_manager->Row_Inserted($rsnew);
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
