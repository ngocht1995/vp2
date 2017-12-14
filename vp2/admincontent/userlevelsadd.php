<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userlevelsinfo.php" ?>
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
$userlevels_add = new cuserlevels_add();
$Page =& $userlevels_add;

// Page init processing
$userlevels_add->Page_Init();

// Page main processing
$userlevels_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userlevels_add = new ew_Page("userlevels_add");

// page properties
userlevels_add.PageID = "add"; // page ID
var EW_PAGE_ID = userlevels_add.PageID; // for backward compatibility

// extend page with ValidateForm function
userlevels_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_UserLevelID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy điền mã cấp bậc");
		elm = fobj.elements["x" + infix + "_UserLevelID"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Mã cấp bậc phải là số nguyên dương");
		elm = fobj.elements["x" + infix + "_UserLevelName"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy điền tên cấp bậc");
		elmId = fobj.elements["x" + infix + "_UserLevelID"];
		elmName = fobj.elements["x" + infix + "_UserLevelName"];
		if (elmId && elmName) {
			elmId.value = elmId.value.replace(/^\s+|\s+$/, '');
			elmName.value = elmName.value.replace(/^\s+|\s+$/, '');
			if (elmId && !ew_CheckInteger(elmId.value))
				return ew_OnError(this, elmId, "Mã cấp bậc phải là số nguyên dương");
			var level = parseInt(elmId.value);
			if (level == 0) {
				if (elmName.value.toLowerCase() != "default")
					return ew_OnError(this, elmName, "Nhóm 'default' không được phép tạo mới");
			} else if (level == -1) { 
				if (elmName.value.toLowerCase() != "administrator")
					return ew_OnError(this, elmName, "Nhóm 'Administrator' không được phép tạo mới");
			} else if (level < -1) {
				return ew_OnError(this, elmId, "Mã cấp bậc phải lớn hơn 0");
			} else if (level > 0) { 
				if (elmName.value.toLowerCase() == "administrator" || elmName.value.toLowerCase() == "default")
					return ew_OnError(this, elmName, "Không được đặt tên nhóm người dùng là 'Administrator' hoặc 'Default'");
			}
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
userlevels_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevels_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevels_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevels_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<a href="<?php echo $userlevels->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm nhóm người dùng</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $userlevels_add->ShowMessage() ?>
<form name="fuserlevelsadd" id="fuserlevelsadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return userlevels_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="userlevels">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($userlevels->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $userlevels->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Mã cấp bậc<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $userlevels->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<input type="text" name="x_UserLevelID" id="x_UserLevelID" size="30" value="<?php echo $userlevels->UserLevelID->EditValue ?>"<?php echo $userlevels->UserLevelID->EditAttributes() ?>>
</span><?php echo $userlevels->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($userlevels->UserLevelName->Visible) { // UserLevelName ?>
	<tr<?php echo $userlevels->UserLevelName->RowAttributes ?>>
		<td class="ewTableHeader">Tên cấp bậc<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $userlevels->UserLevelName->CellAttributes() ?>><span id="el_UserLevelName">
<input type="text" name="x_UserLevelName" id="x_UserLevelName" size="30" maxlength="80" value="<?php echo $userlevels->UserLevelName->EditValue ?>"<?php echo $userlevels->UserLevelName->EditAttributes() ?>>
</span><?php echo $userlevels->UserLevelName->CustomMsg ?></td>
	</tr>
<?php } ?>
	<!-- row for permission values -->
	<tr>
    <td class="ewTableHeader">Quyền trên nhóm cấp bậc</td>
    <td>
<input type="checkbox" name="x_ewAllowAdd" id="Add" value="<?php echo EW_ALLOW_ADD ?>">Thêm/Sao chép
<input type="checkbox" name="x_ewAllowDelete" id="Delete" value="<?php echo EW_ALLOW_DELETE ?>">Xóa
<input type="checkbox" name="x_ewAllowEdit" id="Edit" value="<?php echo EW_ALLOW_EDIT ?>">Sửa
<input type="checkbox" name="x_ewAllowActive" id="Active" value="<?php echo EW_ALLOW_ACTIVE ?>">Kích hoạt
<?php if (defined("EW_USER_LEVEL_COMPAT")) { ?>
<input type="checkbox" name="x_ewAllowList" id="List" value="<?php echo EW_ALLOW_LIST ?>">Liệt kê/Tìm kiếm/Xem
<?php } else { ?>
<input type="checkbox" name="x_ewAllowList" id="List" value="<?php echo EW_ALLOW_LIST ?>">Liệt kê
<input type="checkbox" name="x_ewAllowView" id="View" value="<?php echo EW_ALLOW_VIEW ?>">Tìm kiếm
<input type="checkbox" name="x_ewAllowSearch" id="Search" value="<?php echo EW_ALLOW_SEARCH ?>">Xem
<?php } ?>
</td>
  </tr> 
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Tạo mới    ">
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
class cuserlevels_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'userlevels';

	// Page Object Name
	var $PageObjName = 'userlevels_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevels;
		if ($userlevels->UseTokenInUrl) $PageUrl .= "t=" . $userlevels->TableVar . "&"; // add page token
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
		global $objForm, $userlevels;
		if ($userlevels->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($userlevels->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevels->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserlevels_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevels"] = new cuserlevels();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevels', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $userlevels;
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
		if (!$Security->CanAdmin()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
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
		global $objForm, $gsFormError, $userlevels;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["UserLevelID"] != "") {
		  $userlevels->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $userlevels->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

		  // Load values for user privileges
		  $x_ewAllowAdd = @$_POST["x_ewAllowAdd"];
		  if ($x_ewAllowAdd == "") $x_ewAllowAdd = 0;
		  $x_ewAllowEdit = @$_POST["x_ewAllowEdit"];
		  if ($x_ewAllowEdit == "") $x_ewAllowEdit = 0;
		  $x_ewAllowDelete = @$_POST["x_ewAllowDelete"];
		  if ($x_ewAllowDelete == "") $x_ewAllowDelete = 0;
		  $x_ewAllowList = @$_POST["x_ewAllowList"];
		  if ($x_ewAllowList == "") $x_ewAllowList = 0;
		  if (defined("EW_USER_LEVEL_COMPAT")) {
		    $this->x_ewPriv = intval($x_ewAllowAdd) + intval($x_ewAllowEdit) +
		      intval($x_ewAllowDelete) + intval($x_ewAllowList);
		  } else {
		    $x_ewAllowView = @$_POST["x_ewAllowView"];
		    if ($x_ewAllowView == "") $x_ewAllowView = 0;
		    $x_ewAllowSearch = @$_POST["x_ewAllowSearch"];
		    if ($x_ewAllowSearch == "") $x_ewAllowSearch = 0;
		    $this->x_ewPriv = intval($x_ewAllowAdd) + intval($x_ewAllowEdit) +
		      intval($x_ewAllowDelete) + intval($x_ewAllowList) +
		      intval($x_ewAllowView) + intval($x_ewAllowSearch);
		  }

			// Validate Form
			if (!$this->ValidateForm()) {
				$userlevels->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $userlevels->CurrentAction = "C"; // Copy Record
		  } else {
		    $userlevels->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($userlevels->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("userlevelslist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$userlevels->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Tạo mới thành công"); // Set up success message
					$sReturnUrl = $userlevels->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "userlevelsview.php")
						$sReturnUrl = $userlevels->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$userlevels->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $userlevels;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $userlevels;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $userlevels;
		$userlevels->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$userlevels->UserLevelName->setFormValue($objForm->GetValue("x_UserLevelName"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $userlevels;
		$userlevels->UserLevelID->CurrentValue = $userlevels->UserLevelID->FormValue;
		$userlevels->UserLevelName->CurrentValue = $userlevels->UserLevelName->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevels;
		$sFilter = $userlevels->KeyFilter();

		// Call Row Selecting event
		$userlevels->Row_Selecting($sFilter);

		// Load sql based on filter
		$userlevels->CurrentFilter = $sFilter;
		$sSql = $userlevels->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$userlevels->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $userlevels;
		$userlevels->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		if (is_null($userlevels->UserLevelID->CurrentValue)) {
			$userlevels->UserLevelID->CurrentValue = 0;
		} else {
			$userlevels->UserLevelID->CurrentValue = intval($userlevels->UserLevelID->CurrentValue);
		}
		$userlevels->UserLevelName->setDbValue($rs->fields('UserLevelName'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $userlevels;

		// Call Row_Rendering event
		$userlevels->Row_Rendering();

		// Common render codes for all row types
		// UserLevelID

		$userlevels->UserLevelID->CellCssStyle = "";
		$userlevels->UserLevelID->CellCssClass = "";

		// UserLevelName
		$userlevels->UserLevelName->CellCssStyle = "";
		$userlevels->UserLevelName->CellCssClass = "";
		if ($userlevels->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelID
			$userlevels->UserLevelID->ViewValue = $userlevels->UserLevelID->CurrentValue;
			$userlevels->UserLevelID->CssStyle = "";
			$userlevels->UserLevelID->CssClass = "";
			$userlevels->UserLevelID->ViewCustomAttributes = "";

			// UserLevelName
			$userlevels->UserLevelName->ViewValue = $userlevels->UserLevelName->CurrentValue;
			$userlevels->UserLevelName->CssStyle = "";
			$userlevels->UserLevelName->CssClass = "";
			$userlevels->UserLevelName->ViewCustomAttributes = "";

			// UserLevelID
			$userlevels->UserLevelID->HrefValue = "";

			// UserLevelName
			$userlevels->UserLevelName->HrefValue = "";
		} elseif ($userlevels->RowType == EW_ROWTYPE_ADD) { // Add row

			// UserLevelID
			$userlevels->UserLevelID->EditCustomAttributes = "";
			$userlevels->UserLevelID->EditValue = ew_HtmlEncode($userlevels->UserLevelID->CurrentValue);

			// UserLevelName
			$userlevels->UserLevelName->EditCustomAttributes = "";
			$userlevels->UserLevelName->EditValue = ew_HtmlEncode($userlevels->UserLevelName->CurrentValue);
		}

		// Call Row Rendered event
		$userlevels->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $userlevels;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($userlevels->UserLevelID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level ID";
		}
		if (!ew_CheckInteger($userlevels->UserLevelID->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - User Level ID";
		}
		if ($userlevels->UserLevelName->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level Name";
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
		global $conn, $Security, $userlevels;
		if (trim(strval($userlevels->UserLevelID->CurrentValue)) == "") {
			$this->setMessage("Thiếu mã cấp bậc");
		} elseif (trim($userlevels->UserLevelName->CurrentValue) == "") {
			$this->setMessage("Thiếu tên cấp bậc");
		} elseif (!is_numeric($userlevels->UserLevelID->CurrentValue)) {
			$this->setMessage("Mã cấp bậc phải là số nguyên dương");
		} elseif (intval($userlevels->UserLevelID->CurrentValue) < -1) {
			$this->setMessage("Mã cấp bậc phải là số nguyên dương");
		} elseif (intval($userlevels->UserLevelID->CurrentValue) == 0 && strtolower(trim($userlevels->UserLevelName->CurrentValue)) <> "default") {
			$this->setMessage("Không được tạo cấp bậc có tên 'Default' và mã cấp bậc bằng 0");
		} elseif (intval($userlevels->UserLevelID->CurrentValue) == -1 && strtolower(trim($userlevels->UserLevelName->CurrentValue)) <> "administrator") {
			$this->setMessage("Không được tạo cấp bậc có tên 'Administrator' và mã cấp bậc bằng -1");
		} elseif (intval($userlevels->UserLevelID->CurrentValue) > 0 && (strtolower(trim($userlevels->UserLevelName->CurrentValue)) == "administrator" || strtolower(trim($userlevels->UserLevelName->CurrentValue)) == "default")) {
			$this->setMessage("Không được tạo nhóm cấp bậc có tên 'Administrator' hoặc 'Default'");
		}
		if ($this->getMessage() <> "")
			return FALSE;

		// Check if key value entered
		if ($userlevels->UserLevelID->CurrentValue == "") {
			$this->setMessage("Khóa không hợp lệ");
			return FALSE;
		}

		// Check for duplicate key
		$bCheckKey = TRUE;
		$sFilter = $userlevels->KeyFilter();
		if ($bCheckKey) {
			$rsChk = $userlevels->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, "Mã cấp bậc'%f' đã tồn tại");
				$this->setMessage($sKeyErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		if ($userlevels->UserLevelID->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(UserLevelID = " . ew_AdjustSql($userlevels->UserLevelID->CurrentValue) . ")";
			$rsChk = $userlevels->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "UserLevelID", "Mã cấp bậc '%v' đã tồn tại '%f'");
				$sIdxErrMsg = str_replace("%v", $userlevels->UserLevelID->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		if ($userlevels->UserLevelName->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(UserLevelName = '" . ew_AdjustSql($userlevels->UserLevelName->CurrentValue) . "')";
			$rsChk = $userlevels->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "UserLevelName", "Tên cấp bậc '%v' đã tồn tại '%f'");
				$sIdxErrMsg = str_replace("%v", $userlevels->UserLevelName->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// Field UserLevelID
		$userlevels->UserLevelID->SetDbValueDef($userlevels->UserLevelID->CurrentValue, 0);
		$rsnew['UserLevelID'] =& $userlevels->UserLevelID->DbValue;

		// Field UserLevelName
		$userlevels->UserLevelName->SetDbValueDef($userlevels->UserLevelName->CurrentValue, "");
		$rsnew['UserLevelName'] =& $userlevels->UserLevelName->DbValue;

		// Call Row Inserting event
		$bInsertRow = $userlevels->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($userlevels->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($userlevels->CancelMessage <> "") {
				$this->setMessage($userlevels->CancelMessage);
				$userlevels->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị lỗi");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$userlevels->Row_Inserted($rsnew);
		}

		// Add User Level priv
		if ($this->x_ewPriv > 0 && is_array($GLOBALS["EW_USER_LEVEL_TABLE_NAME"])) {
			for ($i = 0; $i < count($GLOBALS["EW_USER_LEVEL_TABLE_NAME"]); $i++) {
				$sSql = "INSERT INTO " . EW_USER_LEVEL_PRIV_TABLE . " (" .
					EW_USER_LEVEL_PRIV_TABLE_NAME_FIELD . ", " .
					EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . ", " .
					EW_USER_LEVEL_PRIV_PRIV_FIELD . ") VALUES ('" .
					ew_AdjustSql($GLOBALS["EW_USER_LEVEL_TABLE_NAME"][$i]) .
					"', " . $userlevels->UserLevelID->CurrentValue . ", " . $this->x_ewPriv . ")";
				$conn->Execute($sSql);
			}
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
