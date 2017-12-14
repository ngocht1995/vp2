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
$manager_product_pic_delete = new cmanager_product_pic_delete();
$Page =& $manager_product_pic_delete;

// Page init processing
$manager_product_pic_delete->Page_Init();

// Page main processing
$manager_product_pic_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_pic_delete = new ew_Page("manager_product_pic_delete");

// page properties
manager_product_pic_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = manager_product_pic_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_product_pic_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_pic_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_pic_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_pic_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $manager_product_pic_delete->LoadRecordset();
$manager_product_pic_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($manager_product_pic_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$manager_product_pic_delete->Page_Terminate("manager_product_piclist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $manager_product_pic->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa ảnh của sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $manager_product_pic_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="manager_product_pic">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($manager_product_pic_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $manager_product_pic->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Ảnh</td>
	</tr>
	</thead>
	<tbody>
<?php
$manager_product_pic_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$manager_product_pic_delete->lRecCnt++;

	// Set row properties
	$manager_product_pic->CssClass = "";
	$manager_product_pic->CssStyle = "";
	$manager_product_pic->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$manager_product_pic_delete->LoadRowValues($rs);

	// Render row
	$manager_product_pic_delete->RenderRow();
?>
	<tr<?php echo $manager_product_pic->RowAttributes() ?>>
		<td<?php echo $manager_product_pic->sanpham_pic->CellAttributes() ?>>
<?php if ($manager_product_pic->sanpham_pic->HrefValue <> "") { ?>
<?php if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) { ?>
<a href="<?php echo $manager_product_pic->sanpham_pic->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $manager_product_pic->sanpham_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($manager_product_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $manager_product_pic->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_product_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
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
<input type="submit" name="Action" id="Action" value="  Xóa ảnh  ">
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
class cmanager_product_pic_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'manager_product_pic';

	// Page Object Name
	var $PageObjName = 'manager_product_pic_delete';

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
	function cmanager_product_pic_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product_pic"] = new cmanager_product_pic();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $manager_product_pic;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["anh_sanpham_id"] <> "") {
			$manager_product_pic->anh_sanpham_id->setQueryStringValue($_GET["anh_sanpham_id"]);
			if (!is_numeric($manager_product_pic->anh_sanpham_id->QueryStringValue))
				$this->Page_Terminate("manager_product_piclist.php"); // Prevent SQL injection, exit
			$sKey .= $manager_product_pic->anh_sanpham_id->QueryStringValue;
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
			$this->Page_Terminate("manager_product_piclist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("manager_product_piclist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`anh_sanpham_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in manager_product_pic class, manager_product_picinfo.php

		$manager_product_pic->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$manager_product_pic->CurrentAction = $_POST["a_delete"];
		} else {
			$manager_product_pic->CurrentAction = "I"; // Display record
		}
		switch ($manager_product_pic->CurrentAction) {
			case "D": // Delete
				$manager_product_pic->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa ảnh"); // Set up success message
					$this->Page_Terminate($manager_product_pic->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $manager_product_pic;
		$DeleteRows = TRUE;
		$sWrkFilter = $manager_product_pic->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in manager_product_pic class, manager_product_picinfo.php

		$manager_product_pic->CurrentFilter = $sWrkFilter;
		$sSql = $manager_product_pic->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("Không có dữ liệu"); // No record found
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
				$DeleteRows = $manager_product_pic->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['anh_sanpham_id'];
				@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $row['sanpham_pic']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($manager_product_pic->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($manager_product_pic->CancelMessage <> "") {
				$this->setMessage($manager_product_pic->CancelMessage);
				$manager_product_pic->CancelMessage = "";
			} else {
				$this->setMessage("Xóa bị hủy bỏ");
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
				$manager_product_pic->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_product_pic;

		// Call Recordset Selecting event
		$manager_product_pic->Recordset_Selecting($manager_product_pic->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_product_pic->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_product_pic->Recordset_Selected($rs);
		return $rs;
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
		$manager_product_pic->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic');
		$manager_product_pic->sanpham_id->setDbValue($rs->fields('sanpham_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product_pic;

		// Call Row_Rendering event
		$manager_product_pic->Row_Rendering();

		// Common render codes for all row types
		// sanpham_pic

		$manager_product_pic->sanpham_pic->CellCssStyle = "white-space: nowrap;";
		$manager_product_pic->sanpham_pic->CellCssClass = "";
		if ($manager_product_pic->RowType == EW_ROWTYPE_VIEW) { // View row

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

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_product_pic->sanpham_pic->ViewValue)) ? $manager_product_pic->sanpham_pic->ViewValue : $manager_product_pic->sanpham_pic->CurrentValue);
				if ($manager_product_pic->Export <> "") $manager_product_pic->sanpham_pic->HrefValue = ew_ConvertFullUrl($manager_product_pic->sanpham_pic->HrefValue);
			} else {
				$manager_product_pic->sanpham_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$manager_product_pic->Row_Rendered();
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
