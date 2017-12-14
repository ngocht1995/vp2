<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "file_attach_articleinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$file_attach_article_delete = new cfile_attach_article_delete();
$Page =& $file_attach_article_delete;

// Page init processing
$file_attach_article_delete->Page_Init();

// Page main processing
$file_attach_article_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var file_attach_article_delete = new ew_Page("file_attach_article_delete");

// page properties
file_attach_article_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = file_attach_article_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
file_attach_article_delete.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
file_attach_article_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
file_attach_article_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
file_attach_article_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $file_attach_article_delete->LoadRecordset();
$file_attach_article_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($file_attach_article_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$file_attach_article_delete->Page_Terminate("file_attach_articlelist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: File Attach<br><br>
<a href="<?php echo $file_attach_article->getReturnUrl() ?>">Go Back</a></span></p>
<?php $file_attach_article_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="file_attach_article">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($file_attach_article_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $file_attach_article->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">File Name</td>
		<td valign="top">File Desc</td>
	</tr>
	</thead>
	<tbody>
<?php
$file_attach_article_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$file_attach_article_delete->lRecCnt++;

	// Set row properties
	$file_attach_article->CssClass = "";
	$file_attach_article->CssStyle = "";
	$file_attach_article->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$file_attach_article_delete->LoadRowValues($rs);

	// Render row
	$file_attach_article_delete->RenderRow();
?>
	<tr<?php echo $file_attach_article->RowAttributes() ?>>
		<td<?php echo $file_attach_article->file_name->CellAttributes() ?>>
<div<?php echo $file_attach_article->file_name->ViewAttributes() ?>><?php echo $file_attach_article->file_name->ListViewValue() ?></div></td>
		<td<?php echo $file_attach_article->file_desc->CellAttributes() ?>>
<div<?php echo $file_attach_article->file_desc->ViewAttributes() ?>><?php echo $file_attach_article->file_desc->ListViewValue() ?></div></td>
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
class cfile_attach_article_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'file_attach_article';

	// Page Object Name
	var $PageObjName = 'file_attach_article_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $file_attach_article;
		if ($file_attach_article->UseTokenInUrl) $PageUrl .= "t=" . $file_attach_article->TableVar . "&"; // add page token
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
		global $objForm, $file_attach_article;
		if ($file_attach_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($file_attach_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($file_attach_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfile_attach_article_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["file_attach_article"] = new cfile_attach_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['intro_article'] = new cintro_article();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'file_attach_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $file_attach_article;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("intro_article");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("file_attach_articlelist.php");
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
		global $file_attach_article;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["file_id"] <> "") {
			$file_attach_article->file_id->setQueryStringValue($_GET["file_id"]);
			if (!is_numeric($file_attach_article->file_id->QueryStringValue))
				$this->Page_Terminate("file_attach_articlelist.php"); // Prevent SQL injection, exit
			$sKey .= $file_attach_article->file_id->QueryStringValue;
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
			$this->Page_Terminate("file_attach_articlelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("file_attach_articlelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`file_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in file_attach_article class, file_attach_articleinfo.php

		$file_attach_article->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$file_attach_article->CurrentAction = $_POST["a_delete"];
		} else {
			$file_attach_article->CurrentAction = "D"; // Display record
		}
		switch ($file_attach_article->CurrentAction) {
			case "D": // Delete
				$file_attach_article->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa thành công"); // Set up success message
					$this->Page_Terminate($file_attach_article->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $file_attach_article;
		$DeleteRows = TRUE;
		$sWrkFilter = $file_attach_article->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in file_attach_article class, file_attach_articleinfo.php

		$file_attach_article->CurrentFilter = $sWrkFilter;
		$sSql = $file_attach_article->SQL();
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
				$DeleteRows = $file_attach_article->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['file_id'];
				@unlink(ew_UploadPathEx(TRUE, "attach/") . $row['file_fullname']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($file_attach_article->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($file_attach_article->CancelMessage <> "") {
				$this->setMessage($file_attach_article->CancelMessage);
				$file_attach_article->CancelMessage = "";
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
				$file_attach_article->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $file_attach_article;

		// Call Recordset Selecting event
		$file_attach_article->Recordset_Selecting($file_attach_article->CurrentFilter);

		// Load list page SQL
		$sSql = $file_attach_article->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$file_attach_article->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $file_attach_article;
		$sFilter = $file_attach_article->KeyFilter();

		// Call Row Selecting event
		$file_attach_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$file_attach_article->CurrentFilter = $sFilter;
		$sSql = $file_attach_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$file_attach_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $file_attach_article;
		$file_attach_article->file_id->setDbValue($rs->fields('file_id'));
		$file_attach_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$file_attach_article->file_name->setDbValue($rs->fields('file_name'));
		$file_attach_article->file_fullname->Upload->DbValue = $rs->fields('file_fullname');
		$file_attach_article->file_desc->setDbValue($rs->fields('file_desc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $file_attach_article;

		// Call Row_Rendering event
		$file_attach_article->Row_Rendering();

		// Common render codes for all row types
		// file_name

		$file_attach_article->file_name->CellCssStyle = "";
		$file_attach_article->file_name->CellCssClass = "";

		// file_desc
		$file_attach_article->file_desc->CellCssStyle = "";
		$file_attach_article->file_desc->CellCssClass = "";
		if ($file_attach_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// file_name
			$file_attach_article->file_name->ViewValue = $file_attach_article->file_name->CurrentValue;
			$file_attach_article->file_name->CssStyle = "";
			$file_attach_article->file_name->CssClass = "";
			$file_attach_article->file_name->ViewCustomAttributes = "";

			// file_desc
			$file_attach_article->file_desc->ViewValue = $file_attach_article->file_desc->CurrentValue;
			$file_attach_article->file_desc->CssStyle = "";
			$file_attach_article->file_desc->CssClass = "";
			$file_attach_article->file_desc->ViewCustomAttributes = "";

			// file_name
			$file_attach_article->file_name->HrefValue = "";

			// file_desc
			$file_attach_article->file_desc->HrefValue = "";
		}

		// Call Row Rendered event
		$file_attach_article->Row_Rendered();
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
