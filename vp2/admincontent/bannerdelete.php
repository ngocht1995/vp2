<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "bannerinfo.php" ?>
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
$banner_delete = new cbanner_delete();
$Page =& $banner_delete;

// Page init processing
$banner_delete->Page_Init();

// Page main processing
$banner_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var banner_delete = new ew_Page("banner_delete");

// page properties
banner_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = banner_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
banner_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
banner_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
banner_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
banner_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $banner_delete->LoadRecordset();
$banner_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($banner_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$banner_delete->Page_Terminate("bannerlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Banner<br><br>
<a href="<?php echo $banner->getReturnUrl() ?>">Go Back</a></span></p>
<?php $banner_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="banner">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($banner_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $banner->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Banner Pic</td>
		<td valign="top">Banner Url</td>
		<td valign="top">Banner Type</td>
	</tr>
	</thead>
	<tbody>
<?php
$banner_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$banner_delete->lRecCnt++;

	// Set row properties
	$banner->CssClass = "";
	$banner->CssStyle = "";
	$banner->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$banner_delete->LoadRowValues($rs);

	// Render row
	$banner_delete->RenderRow();
?>
	<tr<?php echo $banner->RowAttributes() ?>>
		<td<?php echo $banner->banner_pic->CellAttributes() ?>>
<?php if ($banner->banner_pic->HrefValue <> "") { ?>
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<a href="<?php echo $banner->banner_pic->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue ?>" border=0<?php echo $banner->banner_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($banner->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue ?>" border=0<?php echo $banner->banner_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($banner->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
		<td<?php echo $banner->banner_url->CellAttributes() ?>>
<div<?php echo $banner->banner_url->ViewAttributes() ?>><?php echo $banner->banner_url->ListViewValue() ?></div></td>
		<td<?php echo $banner->banner_type->CellAttributes() ?>>
<div<?php echo $banner->banner_type->ViewAttributes() ?>><?php echo $banner->banner_type->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="Confirm Delete">
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
class cbanner_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'banner';

	// Page Object Name
	var $PageObjName = 'banner_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $banner;
		if ($banner->UseTokenInUrl) $PageUrl .= "t=" . $banner->TableVar . "&"; // add page token
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
		global $objForm, $banner;
		if ($banner->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($banner->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($banner->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cbanner_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["banner"] = new cbanner();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'banner', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $banner;
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
			$this->Page_Terminate("bannerlist.php");
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
		global $banner;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["banner_id"] <> "") {
			$banner->banner_id->setQueryStringValue($_GET["banner_id"]);
			if (!is_numeric($banner->banner_id->QueryStringValue))
				$this->Page_Terminate("bannerlist.php"); // Prevent SQL injection, exit
			$sKey .= $banner->banner_id->QueryStringValue;
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
			$this->Page_Terminate("bannerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("bannerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`banner_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in banner class, bannerinfo.php

		$banner->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$banner->CurrentAction = $_POST["a_delete"];
		} else {
			$banner->CurrentAction = "I"; // Display record
		}
		switch ($banner->CurrentAction) {
			case "D": // Delete
				$banner->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($banner->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $banner;
		$DeleteRows = TRUE;
		$sWrkFilter = $banner->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in banner class, bannerinfo.php

		$banner->CurrentFilter = $sWrkFilter;
		$sSql = $banner->SQL();
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
				$DeleteRows = $banner->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['banner_id'];
				@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $row['banner_pic']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($banner->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($banner->CancelMessage <> "") {
				$this->setMessage($banner->CancelMessage);
				$banner->CancelMessage = "";
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
				$banner->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $banner;

		// Call Recordset Selecting event
		$banner->Recordset_Selecting($banner->CurrentFilter);

		// Load list page SQL
		$sSql = $banner->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$banner->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $banner;
		$sFilter = $banner->KeyFilter();

		// Call Row Selecting event
		$banner->Row_Selecting($sFilter);

		// Load sql based on filter
		$banner->CurrentFilter = $sFilter;
		$sSql = $banner->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$banner->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $banner;
		$banner->banner_id->setDbValue($rs->fields('banner_id'));
		$banner->banner_pic->Upload->DbValue = $rs->fields('banner_pic');
		$banner->banner_url->setDbValue($rs->fields('banner_url'));
		$banner->banner_type->setDbValue($rs->fields('banner_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $banner;

		// Call Row_Rendering event
		$banner->Row_Rendering();

		// Common render codes for all row types
		// banner_pic

		$banner->banner_pic->CellCssStyle = "";
		$banner->banner_pic->CellCssClass = "";

		// banner_url
		$banner->banner_url->CellCssStyle = "";
		$banner->banner_url->CellCssClass = "";

		// banner_type
		$banner->banner_type->CellCssStyle = "";
		$banner->banner_type->CellCssClass = "";
		if ($banner->RowType == EW_ROWTYPE_VIEW) { // View row

			// banner_pic
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->ViewValue = $banner->banner_pic->Upload->DbValue;
				$banner->banner_pic->ImageAlt = "";
			} else {
				$banner->banner_pic->ViewValue = "";
			}
			$banner->banner_pic->CssStyle = "";
			$banner->banner_pic->CssClass = "";
			$banner->banner_pic->ViewCustomAttributes = "";

			// banner_url
			$banner->banner_url->ViewValue = $banner->banner_url->CurrentValue;
			$banner->banner_url->CssStyle = "";
			$banner->banner_url->CssClass = "";
			$banner->banner_url->ViewCustomAttributes = "";

			// banner_type
			if (strval($banner->banner_type->CurrentValue) <> "") {
				switch ($banner->banner_type->CurrentValue) {
					case "0":
						$banner->banner_type->ViewValue = "Image";
						break;
					case "1":
						$banner->banner_type->ViewValue = "Flash";
						break;
					default:
						$banner->banner_type->ViewValue = $banner->banner_type->CurrentValue;
				}
			} else {
				$banner->banner_type->ViewValue = NULL;
			}
			$banner->banner_type->CssStyle = "";
			$banner->banner_type->CssClass = "";
			$banner->banner_type->ViewCustomAttributes = "";

			// banner_pic
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($banner->banner_pic->ViewValue)) ? $banner->banner_pic->ViewValue : $banner->banner_pic->CurrentValue);
				if ($banner->Export <> "") $banner->banner_pic->HrefValue = ew_ConvertFullUrl($banner->banner_pic->HrefValue);
			} else {
				$banner->banner_pic->HrefValue = "";
			}

			// banner_url
			$banner->banner_url->HrefValue = "";

			// banner_type
			$banner->banner_type->HrefValue = "";
		}

		// Call Row Rendered event
		$banner->Row_Rendered();
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
