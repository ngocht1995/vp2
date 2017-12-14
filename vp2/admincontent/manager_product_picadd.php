<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_product_picinfo.php" ?>
<?php include "productsinfo.php" ?>
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
$manager_product_pic_add = new cmanager_product_pic_add();
$Page =& $manager_product_pic_add;

// Page init processing
$manager_product_pic_add->Page_Init();

// Page main processing
$manager_product_pic_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_pic_add = new ew_Page("manager_product_pic_add");

// page properties
manager_product_pic_add.PageID = "add"; // page ID
var EW_PAGE_ID = manager_product_pic_add.PageID; // for backward compatibility

// extend page with ValidateForm function
manager_product_pic_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_sanpham_id"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Sanpham Id");
		elm = fobj.elements["x" + infix + "_sanpham_id"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Sanpham Id");
		elm = fobj.elements["x" + infix + "_sanpham_pic"];
		aelm = fobj.elements["a" + infix + "_sanpham_pic"];
		var chk_sanpham_pic = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_sanpham_pic && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Sanpham Pic");
		elm = fobj.elements["x" + infix + "_sanpham_pic"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
manager_product_pic_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_pic_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_pic_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_pic_add.ValidateRequired = false; // no JavaScript validation
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
								<td height="10" width="46%">
								<a href="<?php echo $manager_product_pic->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Ảnh của sản phẩm</font></b></td>
								<td height="20" width="54%" >
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $manager_product_pic_add->ShowMessage() ?>
<form name="fmanager_product_picadd" id="fmanager_product_picadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return manager_product_pic_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="manager_product_pic">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($manager_product_pic->sanpham_id->Visible) { // sanpham_id ?>
	<tr<?php echo $manager_product_pic->sanpham_id->RowAttributes ?>>
		<td class="ewTableHeader">Tên sản phẩm<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $manager_product_pic->sanpham_id->CellAttributes() ?>><span id="el_sanpham_id">
<?php if ($manager_product_pic->sanpham_id->getSessionValue() <> "") { ?>
<div<?php echo $manager_product_pic->sanpham_id->ViewAttributes() ?>><?php echo $manager_product_pic->sanpham_id->ViewValue ?></div>
<input type="hidden" id="x_sanpham_id" name="x_sanpham_id" value="<?php echo ew_HtmlEncode($manager_product_pic->sanpham_id->CurrentValue) ?>">
<?php } else { ?>
<div id="as_x_sanpham_id" style="z-index: 8980">
	<input type="text" name="sv_x_sanpham_id" id="sv_x_sanpham_id" value="<?php echo $manager_product_pic->sanpham_id->EditValue ?>" size="30"<?php echo $manager_product_pic->sanpham_id->EditAttributes() ?>>&nbsp;<span id="em_x_sanpham_id" class="ewMessage" style="display: none"><img src="images/alert-small.gif" alt="Value does not exist" width="16" height="16" border="0"></span>
	<div id="sc_x_sanpham_id"></div>
</div>
<input type="hidden" name="x_sanpham_id" id="x_sanpham_id" value="<?php echo $manager_product_pic->sanpham_id->CurrentValue ?>">
<?php
	$sSqlWrk = "SELECT `sanpham_id`, `ten_sanpham` FROM `products` WHERE (`ten_sanpham` LIKE '{query_value}%')";
	$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_sanpham_id" id="s_x_sanpham_id" value="<?php echo $sSqlWrk ?>">
<script type="text/javascript">
<!--
var oas_x_sanpham_id = new ew_AutoSuggest("sv_x_sanpham_id", "sc_x_sanpham_id", "s_x_sanpham_id", "em_x_sanpham_id", "x_sanpham_id", "", false);
oas_x_sanpham_id.formatResult = function(ar) {	
	var df1 = ar[1];
	return df1;
};
oas_x_sanpham_id.ac.typeAhead = false;

//-->
</script>
<?php } ?>
</span><?php echo $manager_product_pic->sanpham_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($manager_product_pic->sanpham_pic->Visible) { // sanpham_pic ?>
	<tr<?php echo $manager_product_pic->sanpham_pic->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh<span class="ewRequired"></span></td>
		<td<?php echo $manager_product_pic->sanpham_pic->CellAttributes() ?>><span id="el_sanpham_pic">
<input type="file" name="x_sanpham_pic" id="x_sanpham_pic" size="30"<?php echo $manager_product_pic->sanpham_pic->EditAttributes() ?>>
</div>
</span><?php echo $manager_product_pic->sanpham_pic->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Thêm ảnh    ">
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
class cmanager_product_pic_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'manager_product_pic';

	// Page Object Name
	var $PageObjName = 'manager_product_pic_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_product_pic;
		if ($manager_product_pic->UseTokenInUrl) $PageUrl .= "t=" . $manager_product_pic->TableVar . "&"; // add page token
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
		global $objForm, $manager_product_pic;
		if ($manager_product_pic->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_product_pic->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_product_pic->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_product_pic_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product_pic"] = new cmanager_product_pic();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_product_pic', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_product_pic;
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
			$this->Page_Terminate("manager_product_piclist.php");
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
		global $objForm, $gsFormError, $manager_product_pic;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["anh_sanpham_id"] != "") {
		  $manager_product_pic->anh_sanpham_id->setQueryStringValue($_GET["anh_sanpham_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $manager_product_pic->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$manager_product_pic->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $manager_product_pic->CurrentAction = "C"; // Copy Record
		  } else {
		    $manager_product_pic->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($manager_product_pic->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("manager_product_piclist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$manager_product_pic->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Đã thêm ảnh"); // Set up success message
					$sReturnUrl = $manager_product_pic->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "manager_product_picview.php")
						$sReturnUrl = $manager_product_pic->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$manager_product_pic->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $manager_product_pic;

		// Get upload data
			if ($manager_product_pic->sanpham_pic->Upload->UploadFile()) {

				// No action required
			} else {
				echo $manager_product_pic->sanpham_pic->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $manager_product_pic;
		$manager_product_pic->sanpham_pic->CurrentValue = NULL; // Clear file related field
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $manager_product_pic;
		$manager_product_pic->sanpham_id->setFormValue($objForm->GetValue("x_sanpham_id"));
		$manager_product_pic->anh_sanpham_id->setFormValue($objForm->GetValue("x_anh_sanpham_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $manager_product_pic;
		$manager_product_pic->anh_sanpham_id->CurrentValue = $manager_product_pic->anh_sanpham_id->FormValue;
		$manager_product_pic->sanpham_id->CurrentValue = $manager_product_pic->sanpham_id->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_product_pic;
		$sFilter = $manager_product_pic->KeyFilter();

		// Call Row Selecting event
		$manager_product_pic->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_product_pic->CurrentFilter = $sFilter;
		$sSql = $manager_product_pic->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_product_pic->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_product_pic;
		$manager_product_pic->anh_sanpham_id->setDbValue($rs->fields('anh_sanpham_id'));
		$manager_product_pic->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$manager_product_pic->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product_pic;

		// Call Row_Rendering event
		$manager_product_pic->Row_Rendering();

		// Common render codes for all row types
		// sanpham_id

		$manager_product_pic->sanpham_id->CellCssStyle = "";
		$manager_product_pic->sanpham_id->CellCssClass = "";

		// sanpham_pic
		$manager_product_pic->sanpham_pic->CellCssStyle = "";
		$manager_product_pic->sanpham_pic->CellCssClass = "";
		if ($manager_product_pic->RowType == EW_ROWTYPE_VIEW) { // View row

			// sanpham_id
			$manager_product_pic->sanpham_id->ViewValue = $manager_product_pic->sanpham_id->CurrentValue;
			if (strval($manager_product_pic->sanpham_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($manager_product_pic->sanpham_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product_pic->sanpham_id->ViewValue = $rswrk->fields('ten_sanpham');
					$rswrk->Close();
				} else {
					$manager_product_pic->sanpham_id->ViewValue = $manager_product_pic->sanpham_id->CurrentValue;
				}
			} else {
				$manager_product_pic->sanpham_id->ViewValue = NULL;
			}
			$manager_product_pic->sanpham_id->CssStyle = "";
			$manager_product_pic->sanpham_id->CssClass = "";
			$manager_product_pic->sanpham_id->ViewCustomAttributes = "";

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->ViewValue = $manager_product_pic->sanpham_pic->Upload->DbValue;
				$manager_product_pic->sanpham_pic->ImageWidth = 200;
				$manager_product_pic->sanpham_pic->ImageHeight = 0;
				$manager_product_pic->sanpham_pic->ImageAlt = "";
			} else {
				$manager_product_pic->sanpham_pic->ViewValue = "";
			}
			$manager_product_pic->sanpham_pic->CssStyle = "";
			$manager_product_pic->sanpham_pic->CssClass = "";
			$manager_product_pic->sanpham_pic->ViewCustomAttributes = "";

			// sanpham_id
			$manager_product_pic->sanpham_id->HrefValue = "";

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_product_pic->sanpham_pic->ViewValue)) ? $manager_product_pic->sanpham_pic->ViewValue : $manager_product_pic->sanpham_pic->CurrentValue);
				if ($manager_product_pic->Export <> "") $manager_product_pic->sanpham_pic->HrefValue = ew_ConvertFullUrl($manager_product_pic->sanpham_pic->HrefValue);
			} else {
				$manager_product_pic->sanpham_pic->HrefValue = "";
			}
		} elseif ($manager_product_pic->RowType == EW_ROWTYPE_ADD) { // Add row

			// sanpham_id
			$manager_product_pic->sanpham_id->EditCustomAttributes = "";
			if ($manager_product_pic->sanpham_id->getSessionValue() <> "") {
				$manager_product_pic->sanpham_id->CurrentValue = $manager_product_pic->sanpham_id->getSessionValue();
			$manager_product_pic->sanpham_id->ViewValue = $manager_product_pic->sanpham_id->CurrentValue;
			if (strval($manager_product_pic->sanpham_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($manager_product_pic->sanpham_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product_pic->sanpham_id->ViewValue = $rswrk->fields('ten_sanpham');
					$rswrk->Close();
				} else {
					$manager_product_pic->sanpham_id->ViewValue = $manager_product_pic->sanpham_id->CurrentValue;
				}
			} else {
				$manager_product_pic->sanpham_id->ViewValue = NULL;
			}
			$manager_product_pic->sanpham_id->CssStyle = "";
			$manager_product_pic->sanpham_id->CssClass = "";
			$manager_product_pic->sanpham_id->ViewCustomAttributes = "";
			} else {
			$manager_product_pic->sanpham_id->EditValue = ew_HtmlEncode($manager_product_pic->sanpham_id->CurrentValue);
			if (strval($manager_product_pic->sanpham_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($manager_product_pic->sanpham_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product_pic->sanpham_id->EditValue = $rswrk->fields('ten_sanpham');
					$rswrk->Close();
				} else {
					$manager_product_pic->sanpham_id->EditValue = $manager_product_pic->sanpham_id->CurrentValue;
				}
			} else {
				$manager_product_pic->sanpham_id->EditValue = NULL;
			}
			}

			// sanpham_pic
			$manager_product_pic->sanpham_pic->EditCustomAttributes = "";
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->EditValue = $manager_product_pic->sanpham_pic->Upload->DbValue;
				$manager_product_pic->sanpham_pic->ImageWidth = 200;
				$manager_product_pic->sanpham_pic->ImageHeight = 0;
				$manager_product_pic->sanpham_pic->ImageAlt = "";
			} else {
				$manager_product_pic->sanpham_pic->EditValue = "";
			}
		}

		// Call Row Rendered event
		$manager_product_pic->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $manager_product_pic;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($manager_product_pic->sanpham_pic->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($manager_product_pic->sanpham_pic->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($manager_product_pic->sanpham_pic->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($manager_product_pic->sanpham_id->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Sanpham Id";
		}
		if (!ew_CheckInteger($manager_product_pic->sanpham_id->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Sanpham Id";
		}
		if (is_null($manager_product_pic->sanpham_pic->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Sanpham Pic";
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
		global $conn, $Security, $manager_product_pic;

		// Check if valid key values for master user
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $manager_product_pic->SqlMasterFilter_products();
			if (strval($manager_product_pic->sanpham_id->CurrentValue) <> "") {
				$sFilter = str_replace("@sanpham_id@", ew_AdjustSql($manager_product_pic->sanpham_id->CurrentValue), $sFilter);
			} else {
				$sFilter = "";
			}
			if ($sFilter <> "") {			
				$rsmaster = $GLOBALS["products"]->LoadRs($sFilter);
				$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
				if (!$this->bMasterRecordExists) {
					$sMasterUserIdMsg = str_replace("%c", CurrentUserID(), "The current user (%c) is not authorized to insert the record. Master filter: %f");
					$sMasterUserIdMsg = str_replace("%f", $sFilter, $sMasterUserIdMsg);
					$this->setMessage($sMasterUserIdMsg);					
					return FALSE;
				} else {
					$rsmaster->Close();
				}
			}
		}
		$rsnew = array();

		// Field sanpham_id
		$manager_product_pic->sanpham_id->SetDbValueDef($manager_product_pic->sanpham_id->CurrentValue, 0);
		$rsnew['sanpham_id'] =& $manager_product_pic->sanpham_id->DbValue;

		// Field sanpham_pic
		$manager_product_pic->sanpham_pic->Upload->SaveToSession(); // Save file value to Session
		if (is_null($manager_product_pic->sanpham_pic->Upload->Value)) {
			$rsnew['sanpham_pic'] = NULL;
		} else {
			$rsnew['sanpham_pic'] = ew_UploadFileNameEx(ew_UploadPathEx(True, EW_UPLOAD_DEST_PATH), $manager_product_pic->sanpham_pic->Upload->FileName);
		}

		// Call Row Inserting event
		$bInsertRow = $manager_product_pic->Row_Inserting($rsnew);
		if ($bInsertRow) {

			// Field sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->Value)) {
				if ($manager_product_pic->sanpham_pic->Upload->FileName == $manager_product_pic->sanpham_pic->Upload->DbValue) { // Overwrite if same file name
					$manager_product_pic->sanpham_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['sanpham_pic'], TRUE);
					$manager_product_pic->sanpham_pic->Upload->DbValue = ""; // No need to delete any more
				} else {
					$manager_product_pic->sanpham_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['sanpham_pic'], FALSE);
				}
			}
			if ($manager_product_pic->sanpham_pic->Upload->Action == "2" || $manager_product_pic->sanpham_pic->Upload->Action == "3") { // Update/Remove
				if ($manager_product_pic->sanpham_pic->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($manager_product_pic->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($manager_product_pic->CancelMessage <> "") {
				$this->setMessage($manager_product_pic->CancelMessage);
				$manager_product_pic->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$manager_product_pic->anh_sanpham_id->setDbValue($conn->Insert_ID());
			$rsnew['anh_sanpham_id'] =& $manager_product_pic->anh_sanpham_id->DbValue;

			// Call Row Inserted event
			$manager_product_pic->Row_Inserted($rsnew);
		}

		// Field sanpham_pic
		$manager_product_pic->sanpham_pic->Upload->RemoveFromSession(); // Remove file value from Session
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
