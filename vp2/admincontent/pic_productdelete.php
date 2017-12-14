<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "pic_productinfo.php" ?>
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
$pic_product_delete = new cpic_product_delete();
$Page =& $pic_product_delete;

// Page init processing
$pic_product_delete->Page_Init();

// Page main processing
$pic_product_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var pic_product_delete = new ew_Page("pic_product_delete");

// page properties
pic_product_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = pic_product_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
pic_product_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
pic_product_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
pic_product_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
pic_product_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $pic_product_delete->LoadRecordset();
$pic_product_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($pic_product_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$pic_product_delete->Page_Terminate("pic_productlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $pic_product->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa ảnh của sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $pic_product_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="pic_product">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($pic_product_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $pic_product->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Ảnh</td>
	</tr>
	</thead>
	<tbody>
<?php
$pic_product_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$pic_product_delete->lRecCnt++;

	// Set row properties
	$pic_product->CssClass = "";
	$pic_product->CssStyle = "";
	$pic_product->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$pic_product_delete->LoadRowValues($rs);

	// Render row
	$pic_product_delete->RenderRow();
?>
	<tr<?php echo $pic_product->RowAttributes() ?>>
		<td<?php echo $pic_product->sanpham_pic->CellAttributes() ?>>
<?php if ($pic_product->sanpham_pic->HrefValue <> "") { ?>
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $pic_product->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($pic_product->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $pic_product->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $pic_product->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($pic_product->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
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
class cpic_product_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'pic_product';

	// Page Object Name
	var $PageObjName = 'pic_product_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $pic_product;
		if ($pic_product->UseTokenInUrl) $PageUrl .= "t=" . $pic_product->TableVar . "&"; // add page token
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
		global $objForm, $pic_product;
		if ($pic_product->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($pic_product->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($pic_product->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cpic_product_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["pic_product"] = new cpic_product();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'pic_product', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $pic_product;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("products");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("pic_productlist.php");
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
		global $pic_product;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["anh_sanpham_id"] <> "") {
			$pic_product->anh_sanpham_id->setQueryStringValue($_GET["anh_sanpham_id"]);
			if (!is_numeric($pic_product->anh_sanpham_id->QueryStringValue))
				$this->Page_Terminate("pic_productlist.php"); // Prevent SQL injection, exit
			$sKey .= $pic_product->anh_sanpham_id->QueryStringValue;
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
			$this->Page_Terminate("pic_productlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("pic_productlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`anh_sanpham_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in pic_product class, pic_productinfo.php

		$pic_product->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$pic_product->CurrentAction = $_POST["a_delete"];
		} else {
			$pic_product->CurrentAction = "I"; // Display record
		}
		switch ($pic_product->CurrentAction) {
			case "D": // Delete
				$pic_product->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($pic_product->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $pic_product;
		$DeleteRows = TRUE;
		$sWrkFilter = $pic_product->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in pic_product class, pic_productinfo.php

		$pic_product->CurrentFilter = $sWrkFilter;
		$sSql = $pic_product->SQL();
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
				$DeleteRows = $pic_product->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($pic_product->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($pic_product->CancelMessage <> "") {
				$this->setMessage($pic_product->CancelMessage);
				$pic_product->CancelMessage = "";
			} else {
				$this->setMessage("Delete cancelled");
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
				$pic_product->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $pic_product;

		// Call Recordset Selecting event
		$pic_product->Recordset_Selecting($pic_product->CurrentFilter);

		// Load list page SQL
		$sSql = $pic_product->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$pic_product->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $pic_product;
		$sFilter = $pic_product->KeyFilter();

		// Call Row Selecting event
		$pic_product->Row_Selecting($sFilter);

		// Load sql based on filter
		$pic_product->CurrentFilter = $sFilter;
		$sSql = $pic_product->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$pic_product->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $pic_product;
		$pic_product->anh_sanpham_id->setDbValue($rs->fields('anh_sanpham_id'));
		$pic_product->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic');
		$pic_product->sanpham_id->setDbValue($rs->fields('sanpham_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $pic_product;

		// Call Row_Rendering event
		$pic_product->Row_Rendering();

		// Common render codes for all row types
		// sanpham_pic

		$pic_product->sanpham_pic->CellCssStyle = "";
		$pic_product->sanpham_pic->CellCssClass = "";
		if ($pic_product->RowType == EW_ROWTYPE_VIEW) { // View row

			// anh_sanpham_id
			$pic_product->anh_sanpham_id->ViewValue = $pic_product->anh_sanpham_id->CurrentValue;
			$pic_product->anh_sanpham_id->CssStyle = "";
			$pic_product->anh_sanpham_id->CssClass = "";
			$pic_product->anh_sanpham_id->ViewCustomAttributes = "";

			// sanpham_pic
			if (!is_null($pic_product->sanpham_pic->Upload->DbValue)) {
				$pic_product->sanpham_pic->ViewValue = $pic_product->sanpham_pic->Upload->DbValue;
				$pic_product->sanpham_pic->ImageWidth = 300;
				$pic_product->sanpham_pic->ImageHeight = 0;
				$pic_product->sanpham_pic->ImageAlt = "";
			} else {
				$pic_product->sanpham_pic->ViewValue = "";
			}
			$pic_product->sanpham_pic->CssStyle = "";
			$pic_product->sanpham_pic->CssClass = "";
			$pic_product->sanpham_pic->ViewCustomAttributes = "";

			// sanpham_id
			$pic_product->sanpham_id->ViewValue = $pic_product->sanpham_id->CurrentValue;
			$pic_product->sanpham_id->CssStyle = "";
			$pic_product->sanpham_id->CssClass = "";
			$pic_product->sanpham_id->ViewCustomAttributes = "";

			// sanpham_pic
			$pic_product->sanpham_pic->HrefValue = "";
		}

		// Call Row Rendered event
		$pic_product->Row_Rendered();
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
