<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "offer_picinfo.php" ?>
<?php include "offerinfo.php" ?>
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
$offer_pic_delete = new coffer_pic_delete();
$Page =& $offer_pic_delete;

// Page init processing
$offer_pic_delete->Page_Init();

// Page main processing
$offer_pic_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var offer_pic_delete = new ew_Page("offer_pic_delete");

// page properties
offer_pic_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = offer_pic_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
offer_pic_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
offer_pic_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
offer_pic_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
offer_pic_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
$rs = $offer_pic_delete->LoadRecordset();
$offer_pic_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($offer_pic_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$offer_pic_delete->Page_Terminate("offer_piclist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $offer_pic->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa thông ảnh chào hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $offer_pic_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="offer_pic">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($offer_pic_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $offer_pic->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Ảnh</td>
	</tr>
	</thead>
	<tbody>
<?php
$offer_pic_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$offer_pic_delete->lRecCnt++;

	// Set row properties
	$offer_pic->CssClass = "";
	$offer_pic->CssStyle = "";
	$offer_pic->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$offer_pic_delete->LoadRowValues($rs);

	// Render row
	$offer_pic_delete->RenderRow();
?>
	<tr<?php echo $offer_pic->RowAttributes() ?>>
		<td<?php echo $offer_pic->pic_name->CellAttributes() ?>>
<?php if ($offer_pic->pic_name->HrefValue <> "") { ?>
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue ?>" border=0<?php echo $offer_pic->pic_name->ViewAttributes() ?>>
<?php } elseif (!in_array($offer_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($offer_pic->pic_name->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $offer_pic->pic_name->Upload->DbValue ?>" border=0<?php echo $offer_pic->pic_name->ViewAttributes() ?>>
<?php } elseif (!in_array($offer_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="  Xóa  ">
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
class coffer_pic_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'offer_pic';

	// Page Object Name
	var $PageObjName = 'offer_pic_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $offer_pic;
		if ($offer_pic->UseTokenInUrl) $PageUrl .= "t=" . $offer_pic->TableVar . "&"; // add page token
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
		global $objForm, $offer_pic;
		if ($offer_pic->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($offer_pic->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($offer_pic->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function coffer_pic_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["offer_pic"] = new coffer_pic();

		// Initialize other table object
		$GLOBALS['offer'] = new coffer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'offer_pic', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $offer_pic;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("offer");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("offer_piclist.php");
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $offer_pic;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["offer_pic_id"] <> "") {
			$offer_pic->offer_pic_id->setQueryStringValue($_GET["offer_pic_id"]);
			if (!is_numeric($offer_pic->offer_pic_id->QueryStringValue))
				$this->Page_Terminate("offer_piclist.php"); // Prevent SQL injection, exit
			$sKey .= $offer_pic->offer_pic_id->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("offer_piclist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("offer_piclist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`offer_pic_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in offer_pic class, offer_picinfo.php

		$offer_pic->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$offer_pic->CurrentAction = $_POST["a_delete"];
		} else {
			$offer_pic->CurrentAction = "I"; // Display record
		}
		switch ($offer_pic->CurrentAction) {
			case "D": // Delete
				$offer_pic->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($offer_pic->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $offer_pic;
		$DeleteRows = TRUE;
		$sWrkFilter = $offer_pic->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in offer_pic class, offer_picinfo.php

		$offer_pic->CurrentFilter = $sWrkFilter;
		$sSql = $offer_pic->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("No records found"); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs) $rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $offer_pic->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['offer_pic_id'];
				@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $row['pic_name']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($offer_pic->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($offer_pic->CancelMessage <> "") {
				$this->setMessage($offer_pic->CancelMessage);
				$offer_pic->CancelMessage = "";
			} else {
				$this->setMessage("Hủy xóa");
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call recordset deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$offer_pic->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $offer_pic;

		// Call Recordset Selecting event
		$offer_pic->Recordset_Selecting($offer_pic->CurrentFilter);

		// Load list page SQL
		$sSql = $offer_pic->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$offer_pic->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $offer_pic;
		$sFilter = $offer_pic->KeyFilter();

		// Call Row Selecting event
		$offer_pic->Row_Selecting($sFilter);

		// Load sql based on filter
		$offer_pic->CurrentFilter = $sFilter;
		$sSql = $offer_pic->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$offer_pic->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $offer_pic;
		$offer_pic->offer_pic_id->setDbValue($rs->fields('offer_pic_id'));
		$offer_pic->pic_name->Upload->DbValue = $rs->fields('pic_name');
		$offer_pic->chaohang_id->setDbValue($rs->fields('chaohang_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $offer_pic;

		// Call Row_Rendering event
		$offer_pic->Row_Rendering();

		// Common render codes for all row types
		// pic_name

		$offer_pic->pic_name->CellCssStyle = "width: 300px;";
		$offer_pic->pic_name->CellCssClass = "";
		if ($offer_pic->RowType == EW_ROWTYPE_VIEW) { // View row

			// offer_pic_id
			$offer_pic->offer_pic_id->ViewValue = $offer_pic->offer_pic_id->CurrentValue;
			$offer_pic->offer_pic_id->CssStyle = "";
			$offer_pic->offer_pic_id->CssClass = "";
			$offer_pic->offer_pic_id->ViewCustomAttributes = "";

			// pic_name
			if (!is_null($offer_pic->pic_name->Upload->DbValue)) {
				$offer_pic->pic_name->ViewValue = $offer_pic->pic_name->Upload->DbValue;
				$offer_pic->pic_name->ImageAlt = "";
			} else {
				$offer_pic->pic_name->ViewValue = "";
			}
			$offer_pic->pic_name->CssStyle = "width: 300px;";
			$offer_pic->pic_name->CssClass = "";
			$offer_pic->pic_name->ViewCustomAttributes = "";

			// chaohang_id
			$offer_pic->chaohang_id->ViewValue = $offer_pic->chaohang_id->CurrentValue;
			$offer_pic->chaohang_id->CssStyle = "";
			$offer_pic->chaohang_id->CssClass = "";
			$offer_pic->chaohang_id->ViewCustomAttributes = "";

			// pic_name
			$offer_pic->pic_name->HrefValue = "";
		}

		// Call Row Rendered event
		$offer_pic->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>
