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
$userlevels_delete = new cuserlevels_delete();
$Page =& $userlevels_delete;

// Page init processing
$userlevels_delete->Page_Init();

// Page main processing
$userlevels_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userlevels_delete = new ew_Page("userlevels_delete");

// page properties
userlevels_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = userlevels_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevels_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevels_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevels_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevels_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $userlevels_delete->LoadRecordset();
$userlevels_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($userlevels_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$userlevels_delete->Page_Terminate("userlevelslist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Userlevels<br><br>
<a href="<?php echo $userlevels->getReturnUrl() ?>">Go Back</a></span></p>
<?php $userlevels_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="userlevels">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($userlevels_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $userlevels->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">User Level Name</td>
	</tr>
	</thead>
	<tbody>
<?php
$userlevels_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$userlevels_delete->lRecCnt++;

	// Set row properties
	$userlevels->CssClass = "";
	$userlevels->CssStyle = "";
	$userlevels->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$userlevels_delete->LoadRowValues($rs);

	// Render row
	$userlevels_delete->RenderRow();
?>
	<tr<?php echo $userlevels->RowAttributes() ?>>
		<td<?php echo $userlevels->UserLevelName->CellAttributes() ?>>
<div<?php echo $userlevels->UserLevelName->ViewAttributes() ?>><?php echo $userlevels->UserLevelName->ListViewValue() ?></div></td>
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
class cuserlevels_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'userlevels';

	// Page Object Name
	var $PageObjName = 'userlevels_delete';

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
	function cuserlevels_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevels"] = new cuserlevels();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $userlevels;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["UserLevelID"] <> "") {
			$userlevels->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
			if (!is_numeric($userlevels->UserLevelID->QueryStringValue))
				$this->Page_Terminate("userlevelslist.php"); // Prevent SQL injection, exit
			$sKey .= $userlevels->UserLevelID->QueryStringValue;
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
			$this->Page_Terminate("userlevelslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("userlevelslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`UserLevelID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in userlevels class, userlevelsinfo.php

		$userlevels->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$userlevels->CurrentAction = $_POST["a_delete"];
		} else {
			$userlevels->CurrentAction = "D"; // Delete record directly
		}
		switch ($userlevels->CurrentAction) {
			case "D": // Delete
				$userlevels->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($userlevels->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $userlevels;
		$DeleteRows = TRUE;
		$sWrkFilter = $userlevels->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in userlevels class, userlevelsinfo.php

		$userlevels->CurrentFilter = $sWrkFilter;
		$sSql = $userlevels->SQL();
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
				$DeleteRows = $userlevels->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['UserLevelID'];
				$x_UserLevelID = $row['UserLevelID']; // Get User Level id
                                 if ($x_UserLevelID == 1 || $x_UserLevelID == 2 || $x_UserLevelID == 3 || $x_UserLevelID == 4 || $x_UserLevelID == 5) { // Kiểm tra ID
					$this->setMessage("Không thể xóa các nhóm mặc định"); // Set up success message
                                       $this->Page_Terminate("userlevelslist.php"); // Return to caller
				}elseif ($this->CheckLevel($x_UserLevelID)) { // Kiểm tra liên quan sản phẩm
                                        $this->setMessage("Không thể xóa nhóm có người dùng tham chiếu"); // Set up success message
					$this->Page_Terminate("userlevelslist.php"); // Return to caller
                                }else{
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($userlevels->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
				if (!is_null($x_UserLevelID)) {
					$conn->Execute("DELETE FROM " . EW_USER_LEVEL_PRIV_TABLE . " WHERE " . EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . " = " . $x_UserLevelID); // Delete user rights as well
				}
                                }
                        }
		} else {

			// Set up error message
			if ($userlevels->CancelMessage <> "") {
				$this->setMessage($userlevels->CancelMessage);
				$userlevels->CancelMessage = "";
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
				$userlevels->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}
         // Kiểm tra người dùng có chứa thông tin sản phẩm và chào hàng
        function CheckLevel($x_UserLevelID) {
		global $conn, $Security, $userlevels;
                $sSql ="Select user.nguoidung_id from user where user.UserLevelID=" .$x_UserLevelID;
		$conn->raiseErrorFn = 'ew_ErrorFn';
                $rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			//$this->setMessage(Lang_Text("Không có dữ liệu")); // No record found
			$rs->Close();
			return FALSE;
		}
                return TRUE;
        }
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevels;

		// Call Recordset Selecting event
		$userlevels->Recordset_Selecting($userlevels->CurrentFilter);

		// Load list page SQL
		$sSql = $userlevels->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$userlevels->Recordset_Selected($rs);
		return $rs;
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
		// UserLevelName

		$userlevels->UserLevelName->CellCssStyle = "";
		$userlevels->UserLevelName->CellCssClass = "";
		if ($userlevels->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelName
			$userlevels->UserLevelName->ViewValue = $userlevels->UserLevelName->CurrentValue;
			$userlevels->UserLevelName->CssStyle = "";
			$userlevels->UserLevelName->CssClass = "";
			$userlevels->UserLevelName->ViewCustomAttributes = "";

			// UserLevelName
			$userlevels->UserLevelName->HrefValue = "";
		}

		// Call Row Rendered event
		$userlevels->Row_Rendered();
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
