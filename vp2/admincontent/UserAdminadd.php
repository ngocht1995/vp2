<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UserAdmininfo.php" ?>
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
$UserAdmin_add = new cUserAdmin_add();
$Page =& $UserAdmin_add;

// Page init processing
$UserAdmin_add->Page_Init();

// Page main processing
$UserAdmin_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UserAdmin_add = new ew_Page("UserAdmin_add");

// page properties
UserAdmin_add.PageID = "add"; // page ID
var EW_PAGE_ID = UserAdmin_add.PageID; // for backward compatibility

// extend page with ValidateForm function
UserAdmin_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_nguoidung_option"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nguoidung Option");
		elm = fobj.elements["x" + infix + "_tendangnhap"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Tendangnhap");
		elm = fobj.elements["x" + infix + "_mat_khau"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Mat Khau");
		elm = fobj.elements["x" + infix + "_UserLevelID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - User Level ID");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
UserAdmin_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UserAdmin_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UserAdmin_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UserAdmin_add.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">Add to CUSTOM VIEW: User Admin<br><br>
<a href="<?php echo $UserAdmin->getReturnUrl() ?>">Go Back</a></span></p>
<?php $UserAdmin_add->ShowMessage() ?>
<form name="fuseradminadd" id="fuseradminadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return UserAdmin_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="UserAdmin">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($UserAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UserAdmin->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Nguoidung Option<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UserAdmin->nguoidung_option->CellAttributes() ?>><span id="el_nguoidung_option">
<select id="x_nguoidung_option" name="x_nguoidung_option"<?php echo $UserAdmin->nguoidung_option->EditAttributes() ?>>
<?php
if (is_array($UserAdmin->nguoidung_option->EditValue)) {
	$arwrk = $UserAdmin->nguoidung_option->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UserAdmin->nguoidung_option->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $UserAdmin->nguoidung_option->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UserAdmin->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tendangnhap<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UserAdmin->tendangnhap->CellAttributes() ?>><span id="el_tendangnhap">
<input type="text" name="x_tendangnhap" id="x_tendangnhap" size="30" maxlength="150" value="<?php echo $UserAdmin->tendangnhap->EditValue ?>"<?php echo $UserAdmin->tendangnhap->EditAttributes() ?>>
</span><?php echo $UserAdmin->tendangnhap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->mat_khau->Visible) { // mat_khau ?>
	<tr<?php echo $UserAdmin->mat_khau->RowAttributes ?>>
		<td class="ewTableHeader">Mat Khau<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UserAdmin->mat_khau->CellAttributes() ?>><span id="el_mat_khau">
<input type="text" name="x_mat_khau" id="x_mat_khau" size="30" maxlength="150" value="<?php echo $UserAdmin->mat_khau->EditValue ?>"<?php echo $UserAdmin->mat_khau->EditAttributes() ?>>
</span><?php echo $UserAdmin->mat_khau->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UserAdmin->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">User Level ID<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UserAdmin->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $UserAdmin->UserLevelID->EditAttributes() ?>>
<?php
if (is_array($UserAdmin->UserLevelID->EditValue)) {
	$arwrk = $UserAdmin->UserLevelID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UserAdmin->UserLevelID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php
$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld FROM `userlevels`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_UserLevelID" id="s_x_UserLevelID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_UserLevelID" id="lft_x_UserLevelID" value="">
</span><?php echo $UserAdmin->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Add    ">
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_UserLevelID','x_UserLevelID',false]]);

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
class cUserAdmin_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'UserAdmin';

	// Page Object Name
	var $PageObjName = 'UserAdmin_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UserAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UserAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UserAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUserAdmin_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["UserAdmin"] = new cUserAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UserAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserAdmin;
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
			$this->Page_Terminate("UserAdminlist.php");
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
		global $objForm, $gsFormError, $UserAdmin;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["nguoidung_id"] != "") {
		  $UserAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $UserAdmin->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$UserAdmin->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $UserAdmin->CurrentAction = "C"; // Copy Record
		  } else {
		    $UserAdmin->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($UserAdmin->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("UserAdminlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$UserAdmin->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm mới thành công"); // Set up success message
					$sReturnUrl = $UserAdmin->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "UserAdminview.php")
						$sReturnUrl = $UserAdmin->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$UserAdmin->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $UserAdmin;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $UserAdmin;
		$UserAdmin->nguoidung_option->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $UserAdmin;
		$UserAdmin->nguoidung_option->setFormValue($objForm->GetValue("x_nguoidung_option"));
		$UserAdmin->tendangnhap->setFormValue($objForm->GetValue("x_tendangnhap"));
		$UserAdmin->mat_khau->setFormValue($objForm->GetValue("x_mat_khau"));
		$UserAdmin->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$UserAdmin->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->CurrentValue = $UserAdmin->nguoidung_id->FormValue;
		$UserAdmin->nguoidung_option->CurrentValue = $UserAdmin->nguoidung_option->FormValue;
		$UserAdmin->tendangnhap->CurrentValue = $UserAdmin->tendangnhap->FormValue;
		$UserAdmin->mat_khau->CurrentValue = $UserAdmin->mat_khau->FormValue;
		$UserAdmin->UserLevelID->CurrentValue = $UserAdmin->UserLevelID->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UserAdmin;
		$sFilter = $UserAdmin->KeyFilter();

		// Call Row Selecting event
		$UserAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UserAdmin->CurrentFilter = $sFilter;
		$sSql = $UserAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UserAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UserAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UserAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UserAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UserAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UserAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UserAdmin;

		// Call Row_Rendering event
		$UserAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UserAdmin->nguoidung_option->CellCssStyle = "";
		$UserAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UserAdmin->tendangnhap->CellCssStyle = "";
		$UserAdmin->tendangnhap->CellCssClass = "";

		// mat_khau
		$UserAdmin->mat_khau->CellCssStyle = "";
		$UserAdmin->mat_khau->CellCssClass = "";

		// UserLevelID
		$UserAdmin->UserLevelID->CellCssStyle = "";
		$UserAdmin->UserLevelID->CellCssClass = "";
		if ($UserAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UserAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UserAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UserAdmin->nguoidung_option->ViewValue = "Quan tri he thong";
						break;
					case "1":
						$UserAdmin->nguoidung_option->ViewValue = "Thanh vien dang ky";
						break;
					default:
						$UserAdmin->nguoidung_option->ViewValue = $UserAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UserAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UserAdmin->nguoidung_option->CssStyle = "";
			$UserAdmin->nguoidung_option->CssClass = "";
			$UserAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UserAdmin->tendangnhap->ViewValue = $UserAdmin->tendangnhap->CurrentValue;
			$UserAdmin->tendangnhap->CssStyle = "";
			$UserAdmin->tendangnhap->CssClass = "";
			$UserAdmin->tendangnhap->ViewCustomAttributes = "";

			// mat_khau
			$UserAdmin->mat_khau->ViewValue = $UserAdmin->mat_khau->CurrentValue;
			$UserAdmin->mat_khau->CssStyle = "";
			$UserAdmin->mat_khau->CssClass = "";
			$UserAdmin->mat_khau->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UserAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UserAdmin->UserLevelID->ViewValue = $UserAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UserAdmin->UserLevelID->ViewValue = NULL;
			}
			$UserAdmin->UserLevelID->CssStyle = "";
			$UserAdmin->UserLevelID->CssClass = "";
			$UserAdmin->UserLevelID->ViewCustomAttributes = "";

			// nguoidung_option
			$UserAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UserAdmin->tendangnhap->HrefValue = "";

			// mat_khau
			$UserAdmin->mat_khau->HrefValue = "";

			// UserLevelID
			$UserAdmin->UserLevelID->HrefValue = "";
		} elseif ($UserAdmin->RowType == EW_ROWTYPE_ADD) { // Add row

			// nguoidung_option
			$UserAdmin->nguoidung_option->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Quan tri he thong");
			$arwrk[] = array("1", "Thanh vien dang ky");
			array_unshift($arwrk, array("", "Chọn"));
			$UserAdmin->nguoidung_option->EditValue = $arwrk;

			// tendangnhap
			$UserAdmin->tendangnhap->EditCustomAttributes = "";
			$UserAdmin->tendangnhap->EditValue = ew_HtmlEncode($UserAdmin->tendangnhap->CurrentValue);

			// mat_khau
			$UserAdmin->mat_khau->EditCustomAttributes = "";
			$UserAdmin->mat_khau->EditValue = ew_HtmlEncode($UserAdmin->mat_khau->CurrentValue);

			// UserLevelID
			$UserAdmin->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			if (trim(strval($UserAdmin->UserLevelID->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UserAdmin->UserLevelID->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$UserAdmin->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $UserAdmin;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($UserAdmin->nguoidung_option->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nguoidung Option";
		}
		if ($UserAdmin->tendangnhap->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Tendangnhap";
		}
		if ($UserAdmin->mat_khau->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Mat Khau";
		}
		if ($UserAdmin->UserLevelID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level ID";
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
		global $conn, $Security, $UserAdmin;
		$rsnew = array();

		// Field nguoidung_option
		$UserAdmin->nguoidung_option->SetDbValueDef($UserAdmin->nguoidung_option->CurrentValue, 0);
		$rsnew['nguoidung_option'] =& $UserAdmin->nguoidung_option->DbValue;

		// Field tendangnhap
		$UserAdmin->tendangnhap->SetDbValueDef($UserAdmin->tendangnhap->CurrentValue, "");
		$rsnew['tendangnhap'] =& $UserAdmin->tendangnhap->DbValue;

		// Field mat_khau
		$UserAdmin->mat_khau->SetDbValueDef($UserAdmin->mat_khau->CurrentValue, "");
		$rsnew['mat_khau'] =& $UserAdmin->mat_khau->DbValue;

		// Field UserLevelID
		$UserAdmin->UserLevelID->SetDbValueDef($UserAdmin->UserLevelID->CurrentValue, 0);
		$rsnew['UserLevelID'] =& $UserAdmin->UserLevelID->DbValue;

		// Call Row Inserting event
		$bInsertRow = $UserAdmin->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($UserAdmin->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($UserAdmin->CancelMessage <> "") {
				$this->setMessage($UserAdmin->CancelMessage);
				$UserAdmin->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$UserAdmin->nguoidung_id->setDbValue($conn->Insert_ID());
			$rsnew['nguoidung_id'] =& $UserAdmin->nguoidung_id->DbValue;

			// Call Row Inserted event
			$UserAdmin->Row_Inserted($rsnew);
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
