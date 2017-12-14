<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_subjectinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "subject_adinfo.php" ?>
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
$advertising_subject_add = new cadvertising_subject_add();
$Page =& $advertising_subject_add;

// Page init processing
$advertising_subject_add->Page_Init();

// Page main processing
$advertising_subject_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_subject_add = new ew_Page("advertising_subject_add");

// page properties
advertising_subject_add.PageID = "add"; // page ID
var EW_PAGE_ID = advertising_subject_add.PageID; // for backward compatibility

// extend page with ValidateForm function
advertising_subject_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_ten_chuyenmuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Tên chuyên mục');?>(VI)");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
advertising_subject_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_subject_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_subject_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_subject_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $advertising_subject->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text('Quản lý chuyên mục quảng cáo');?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $advertising_subject_add->ShowMessage() ?>
<form name="fadvertising_subjectadd" id="fadvertising_subjectadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return advertising_subject_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="advertising_subject">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($advertising_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<tr<?php echo $advertising_subject->ten_chuyenmuc->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Tên chuyên mục con');?>(VI)<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $advertising_subject->ten_chuyenmuc->CellAttributes() ?>><span id="el_ten_chuyenmuc">
<input type="text" name="x_ten_chuyenmuc" id="x_ten_chuyenmuc" size="100" maxlength="100" value="<?php echo $advertising_subject->ten_chuyenmuc->EditValue ?>"<?php echo $advertising_subject->ten_chuyenmuc->EditAttributes() ?>>
</span><?php echo $advertising_subject->ten_chuyenmuc->CustomMsg ?></td>
	</tr>
<?php } ?>
                <?php if ($advertising_subject->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $advertising_subject->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự sắp xếp<span class="ewRequired"></span></td>
		<td<?php echo $advertising_subject->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<input type="text" name="x_thutu_sapxep" id="x_thutu_sapxep" size="10" value="<?php echo $advertising_subject->thutu_sapxep->EditValue ?>"<?php echo $advertising_subject->thutu_sapxep->EditAttributes() ?>>
</span><?php echo $advertising_subject->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if (strval($advertising_subject->chuyenmuc_belongto->getSessionValue()) <> "") { ?>
<input type="hidden" name="x_chuyenmuc_belongto" id="x_chuyenmuc_belongto" value="<?php echo ew_HtmlEncode(strval($advertising_subject->chuyenmuc_belongto->getSessionValue())) ?>">
<?php } ?>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    <?php echo Lang_Text('Thêm');?>    ">
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
class cadvertising_subject_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'advertising_subject';

	// Page Object Name
	var $PageObjName = 'advertising_subject_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_subject;
		if ($advertising_subject->UseTokenInUrl) $PageUrl .= "t=" . $advertising_subject->TableVar . "&"; // add page token
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
		global $objForm, $advertising_subject;
		if ($advertising_subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_subject_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_subject"] = new cadvertising_subject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['subject_ad'] = new csubject_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_subject;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("subject_ad");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanAdd()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("advertising_subjectlist.php");
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
		global $objForm, $gsFormError, $advertising_subject;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["chuyenmuc_id"] != "") {
		  $advertising_subject->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $advertising_subject->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$advertising_subject->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $advertising_subject->CurrentAction = "C"; // Copy Record
		  } else {
		    $advertising_subject->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($advertising_subject->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage(Lang_Text('Không có dữ liệu')); // No record found
		      $this->Page_Terminate("advertising_subjectlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$advertising_subject->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage(Lang_Text('Thêm mới thành công')); // Set up success message
					$sReturnUrl = $advertising_subject->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "advertising_subjectview.php")
						$sReturnUrl = $advertising_subject->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$advertising_subject->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $advertising_subject;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $advertising_subject;
                 $advertising_subject->thutu_sapxep->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $advertising_subject;
		$advertising_subject->ten_chuyenmuc->setFormValue($objForm->GetValue("x_ten_chuyenmuc"));
		$advertising_subject->ten_chuyenmuc_en->setFormValue($objForm->GetValue("x_ten_chuyenmuc_en"));
                 $advertising_subject->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$advertising_subject->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $advertising_subject;
		$advertising_subject->chuyenmuc_id->CurrentValue = $advertising_subject->chuyenmuc_id->FormValue;
		$advertising_subject->ten_chuyenmuc->CurrentValue = $advertising_subject->ten_chuyenmuc->FormValue;
		$advertising_subject->ten_chuyenmuc_en->CurrentValue = $advertising_subject->ten_chuyenmuc_en->FormValue;
                 $advertising_subject->thutu_sapxep->CurrentValue = $advertising_subject->thutu_sapxep->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising_subject;
		$sFilter = $advertising_subject->KeyFilter();

		// Call Row Selecting event
		$advertising_subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising_subject->CurrentFilter = $sFilter;
		$sSql = $advertising_subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising_subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising_subject;
		$advertising_subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$advertising_subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$advertising_subject->ten_chuyenmuc_en->setDbValue($rs->fields('ten_chuyenmuc_en'));
		$advertising_subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$advertising_subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising_subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$advertising_subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising_subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$advertising_subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising_subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_subject;

		// Call Row_Rendering event
		$advertising_subject->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$advertising_subject->ten_chuyenmuc->CellCssStyle = "";
		$advertising_subject->ten_chuyenmuc->CellCssClass = "";
		
		// ten_chuyenmuc_en

		$advertising_subject->ten_chuyenmuc_en->CellCssStyle = "";
		$advertising_subject->ten_chuyenmuc_en->CellCssClass = "";
                 // thutu_sapxep

		$advertising_subject->thutu_sapxep->CellCssStyle = "";
		$advertising_subject->thutu_sapxep->CellCssClass = "";
		if ($advertising_subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->ViewValue = $advertising_subject->ten_chuyenmuc->CurrentValue;
			$advertising_subject->ten_chuyenmuc->CssStyle = "";
			$advertising_subject->ten_chuyenmuc->CssClass = "";
			$advertising_subject->ten_chuyenmuc->ViewCustomAttributes = "";
			
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->ViewValue = $advertising_subject->ten_chuyenmuc_en->CurrentValue;
			$advertising_subject->ten_chuyenmuc_en->CssStyle = "";
			$advertising_subject->ten_chuyenmuc_en->CssClass = "";
			$advertising_subject->ten_chuyenmuc_en->ViewCustomAttributes = "";
			

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->HrefValue = "";
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->HrefValue = "";

                         $advertising_subject->thutu_sapxep->ViewValue = $advertising_subject->thutu_sapxep->CurrentValue;
			$advertising_subject->thutu_sapxep->CssStyle = "";
			$advertising_subject->thutu_sapxep->CssClass = "";
			$advertising_subject->thutu_sapxep->ViewCustomAttributes = "";

			// thutu_sapxep
			$advertising_subject->thutu_sapxep->HrefValue = "";
		} elseif ($advertising_subject->RowType == EW_ROWTYPE_ADD) { // Add row

			// ten_chuyenmuc
			$advertising_subject->ten_chuyenmuc->EditCustomAttributes = "";
			$advertising_subject->ten_chuyenmuc->EditValue = ew_HtmlEncode($advertising_subject->ten_chuyenmuc->CurrentValue);
			// ten_chuyenmuc_en
			$advertising_subject->ten_chuyenmuc_en->EditCustomAttributes = "";
			$advertising_subject->ten_chuyenmuc_en->EditValue = ew_HtmlEncode($advertising_subject->ten_chuyenmuc_en->CurrentValue);
                          // thutu_sapxep
			$advertising_subject->thutu_sapxep->EditCustomAttributes = "";
			$advertising_subject->thutu_sapxep->EditValue = ew_HtmlEncode($advertising_subject->thutu_sapxep->CurrentValue);

		}

		// Call Row Rendered event
		$advertising_subject->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $advertising_subject;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($advertising_subject->ten_chuyenmuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Tên chuyên mục');?>";
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
		global $conn, $Security, $advertising_subject;
		$rsnew = array();

		// Field ten_chuyenmuc
		$advertising_subject->ten_chuyenmuc->SetDbValueDef($advertising_subject->ten_chuyenmuc->CurrentValue, "");
		$rsnew['ten_chuyenmuc'] =& $advertising_subject->ten_chuyenmuc->DbValue;
		
		// Field ten_chuyenmuc_en
		$advertising_subject->ten_chuyenmuc_en->SetDbValueDef($advertising_subject->ten_chuyenmuc_en->CurrentValue, "");
		$rsnew['ten_chuyenmuc_en'] =& $advertising_subject->ten_chuyenmuc_en->DbValue;
                   // Field thutu_sapxep
			$advertising_subject->thutu_sapxep->SetDbValueDef($advertising_subject->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $advertising_subject->thutu_sapxep->DbValue;


		// Field chuyenmuc_belongto
		if ($advertising_subject->chuyenmuc_belongto->getSessionValue() <> "") {
			$rsnew['chuyenmuc_belongto'] = $advertising_subject->chuyenmuc_belongto->getSessionValue();
		}

		// Call Row Inserting event
		$bInsertRow = $advertising_subject->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($advertising_subject->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($advertising_subject->CancelMessage <> "") {
				$this->setMessage($advertising_subject->CancelMessage);
				$advertising_subject->CancelMessage = "";
			} else {
				$this->setMessage(Lang_Text("Thêm mới bị huỷ bỏ"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$advertising_subject->chuyenmuc_id->setDbValue($conn->Insert_ID());
			$rsnew['chuyenmuc_id'] =& $advertising_subject->chuyenmuc_id->DbValue;

			// Call Row Inserted event
			$advertising_subject->Row_Inserted($rsnew);
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
