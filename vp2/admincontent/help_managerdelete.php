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
$help_manager_delete = new chelp_manager_delete();
$Page =& $help_manager_delete;

// Page init processing
$help_manager_delete->Page_Init();

// Page main processing
$help_manager_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var help_manager_delete = new ew_Page("help_manager_delete");

// page properties
help_manager_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = help_manager_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
help_manager_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
help_manager_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
help_manager_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
help_manager_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $help_manager_delete->LoadRecordset();
$help_manager_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($help_manager_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$help_manager_delete->Page_Terminate("help_managerlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Help Manager<br><br>
<a href="<?php echo $help_manager->getReturnUrl() ?>">Go Back</a></span></p>
<?php $help_manager_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="help_manager">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($help_manager_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $help_manager->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Họ và tên</td>
		<td valign="top">Điện thoại</td>
		<td valign="top">Chức năng</td>
		<td valign="top">Email</td>
		<td valign="top">Nick Yahoo</td>
		<td valign="top">Nick Skype</td>
	</tr>
	</thead>
	<tbody>
<?php
$help_manager_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$help_manager_delete->lRecCnt++;

	// Set row properties
	$help_manager->CssClass = "";
	$help_manager->CssStyle = "";
	$help_manager->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$help_manager_delete->LoadRowValues($rs);

	// Render row
	$help_manager_delete->RenderRow();
?>
	<tr<?php echo $help_manager->RowAttributes() ?>>
		<td<?php echo $help_manager->help_id->CellAttributes() ?>>
<div<?php echo $help_manager->help_id->ViewAttributes() ?>><?php echo $help_manager->help_id->ListViewValue() ?></div></td>
		<td<?php echo $help_manager->nick_yahoo->CellAttributes() ?>>
<div<?php echo $help_manager->nick_yahoo->ViewAttributes() ?>><?php echo $help_manager->nick_yahoo->ListViewValue() ?></div></td>
		<td<?php echo $help_manager->ho_ten->CellAttributes() ?>>
<div<?php echo $help_manager->ho_ten->ViewAttributes() ?>><?php echo $help_manager->ho_ten->ListViewValue() ?></div></td>
		<td<?php echo $help_manager->dien_thoai->CellAttributes() ?>>
<div<?php echo $help_manager->dien_thoai->ViewAttributes() ?>><?php echo $help_manager->dien_thoai->ListViewValue() ?></div></td>
		<td<?php echo $help_manager->chuc_nang->CellAttributes() ?>>
<div<?php echo $help_manager->chuc_nang->ViewAttributes() ?>><?php echo $help_manager->chuc_nang->ListViewValue() ?></div></td>
		<td<?php echo $help_manager->zemail->CellAttributes() ?>>
<div<?php echo $help_manager->zemail->ViewAttributes() ?>><?php echo $help_manager->zemail->ListViewValue() ?></div></td>
		<td<?php echo $help_manager->nick_skype->CellAttributes() ?>>
<div<?php echo $help_manager->nick_skype->ViewAttributes() ?>><?php echo $help_manager->nick_skype->ListViewValue() ?></div></td>
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
class chelp_manager_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'help_manager';

	// Page Object Name
	var $PageObjName = 'help_manager_delete';

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
	function chelp_manager_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["help_manager"] = new chelp_manager();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $help_manager;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["help_id"] <> "") {
			$help_manager->help_id->setQueryStringValue($_GET["help_id"]);
			if (!is_numeric($help_manager->help_id->QueryStringValue))
				$this->Page_Terminate("help_managerlist.php"); // Prevent SQL injection, exit
			$sKey .= $help_manager->help_id->QueryStringValue;
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
			$this->Page_Terminate("help_managerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("help_managerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`help_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in help_manager class, help_managerinfo.php

		$help_manager->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$help_manager->CurrentAction = $_POST["a_delete"];
		} else {
			$help_manager->CurrentAction = "I"; // Display record
		}
		switch ($help_manager->CurrentAction) {
			case "D": // Delete
				$help_manager->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xoá dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($help_manager->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $help_manager;
		$DeleteRows = TRUE;
		$sWrkFilter = $help_manager->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in help_manager class, help_managerinfo.php

		$help_manager->CurrentFilter = $sWrkFilter;
		$sSql = $help_manager->SQL();
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
				$DeleteRows = $help_manager->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['help_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($help_manager->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($help_manager->CancelMessage <> "") {
				$this->setMessage($help_manager->CancelMessage);
				$help_manager->CancelMessage = "";
			} else {
				$this->setMessage("Huỷ bỏ xoá dữ liệu");
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
				$help_manager->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $help_manager;

		// Call Recordset Selecting event
		$help_manager->Recordset_Selecting($help_manager->CurrentFilter);

		// Load list page SQL
		$sSql = $help_manager->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$help_manager->Recordset_Selected($rs);
		return $rs;
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
		// help_id

		$help_manager->help_id->CellCssStyle = "";
		$help_manager->help_id->CellCssClass = "";

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

			// help_id
			$help_manager->help_id->HrefValue = "";

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
		}

		// Call Row Rendered event
		$help_manager->Row_Rendered();
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
