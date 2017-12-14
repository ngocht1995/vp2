<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_lienheinfo.php" ?>
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
$t_lienhe_delete = new ct_lienhe_delete();
$Page =& $t_lienhe_delete;

// Page init processing
$t_lienhe_delete->Page_Init();

// Page main processing
$t_lienhe_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lienhe_delete = new ew_Page("t_lienhe_delete");

// page properties
t_lienhe_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_lienhe_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_lienhe_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lienhe_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lienhe_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lienhe_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_lienhe_delete->LoadRecordset();
$t_lienhe_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_lienhe_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_lienhe_delete->Page_Terminate("t_lienhelist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_lienhelist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa thông tin liên hệ</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $t_lienhe_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_lienhe">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_lienhe_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_lienhe->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Họ và tên</td>
		<td valign="top">Địa chỉ email</td>
		<td valign="top">Tiêu đề</td>
		<td valign="top">Số điện thoại</td>
		<td valign="top">Thời gian xem</td>
		<td valign="top">Thời gian thêm mới</td>
		<td valign="top">Trạng thái</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_lienhe_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_lienhe_delete->lRecCnt++;

	// Set row properties
	$t_lienhe->CssClass = "";
	$t_lienhe->CssStyle = "";
	$t_lienhe->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_lienhe_delete->LoadRowValues($rs);

	// Render row
	$t_lienhe_delete->RenderRow();
?>
	<tr<?php echo $t_lienhe->RowAttributes() ?>>
		<td<?php echo $t_lienhe->c_hoten->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_hoten->ViewAttributes() ?>><?php echo $t_lienhe->c_hoten->ListViewValue() ?></div></td>
		<td<?php echo $t_lienhe->c_email->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_email->ViewAttributes() ?>><?php echo $t_lienhe->c_email->ListViewValue() ?></div></td>
		<td<?php echo $t_lienhe->c_tieude->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_tieude->ViewAttributes() ?>><?php echo $t_lienhe->c_tieude->ListViewValue() ?></div></td>
		<td<?php echo $t_lienhe->c_tel->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_tel->ViewAttributes() ?>><?php echo $t_lienhe->c_tel->ListViewValue() ?></div></td>
		<td<?php echo $t_lienhe->c_read_time->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_read_time->ViewAttributes() ?>><?php echo $t_lienhe->c_read_time->ListViewValue() ?></div></td>
		<td<?php echo $t_lienhe->c_add_time->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_add_time->ViewAttributes() ?>><?php echo $t_lienhe->c_add_time->ListViewValue() ?></div></td>
		<td<?php echo $t_lienhe->c_status->CellAttributes() ?>>
<div<?php echo $t_lienhe->c_status->ViewAttributes() ?>><?php echo $t_lienhe->c_status->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="  Xóa   ">
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
class ct_lienhe_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_lienhe';

	// Page Object Name
	var $PageObjName = 't_lienhe_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lienhe;
		if ($t_lienhe->UseTokenInUrl) $PageUrl .= "t=" . $t_lienhe->TableVar . "&"; // add page token
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
		global $objForm, $t_lienhe;
		if ($t_lienhe->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_lienhe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lienhe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_lienhe_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_lienhe"] = new ct_lienhe();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lienhe', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_lienhe;
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
			$this->Page_Terminate("t_lienhelist.php");
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
		global $t_lienhe;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["id_contact"] <> "") {
			$t_lienhe->id_contact->setQueryStringValue($_GET["id_contact"]);
			if (!is_numeric($t_lienhe->id_contact->QueryStringValue))
				$this->Page_Terminate("t_lienhelist.php"); // Prevent SQL injection, exit
			$sKey .= $t_lienhe->id_contact->QueryStringValue;
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
			$this->Page_Terminate("t_lienhelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_lienhelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`id_contact`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_lienhe class, t_lienheinfo.php

		$t_lienhe->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_lienhe->CurrentAction = $_POST["a_delete"];
		} else {
			$t_lienhe->CurrentAction = "I"; // Display record
		}
		switch ($t_lienhe->CurrentAction) {
			case "D": // Delete
				$t_lienhe->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($t_lienhe->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_lienhe;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_lienhe->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_lienhe class, t_lienheinfo.php

		$t_lienhe->CurrentFilter = $sWrkFilter;
		$sSql = $t_lienhe->SQL();
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
				$DeleteRows = $t_lienhe->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['id_contact'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_lienhe->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_lienhe->CancelMessage <> "") {
				$this->setMessage($t_lienhe->CancelMessage);
				$t_lienhe->CancelMessage = "";
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
				$t_lienhe->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lienhe;

		// Call Recordset Selecting event
		$t_lienhe->Recordset_Selecting($t_lienhe->CurrentFilter);

		// Load list page SQL
		$sSql = $t_lienhe->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_lienhe->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lienhe;
		$sFilter = $t_lienhe->KeyFilter();

		// Call Row Selecting event
		$t_lienhe->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_lienhe->CurrentFilter = $sFilter;
		$sSql = $t_lienhe->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_lienhe->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_lienhe;
		$t_lienhe->id_contact->setDbValue($rs->fields('id_contact'));
		$t_lienhe->c_type->setDbValue($rs->fields('c_type'));
		$t_lienhe->c_hoten->setDbValue($rs->fields('c_hoten'));
		$t_lienhe->c_email->setDbValue($rs->fields('c_email'));
		$t_lienhe->c_tieude->setDbValue($rs->fields('c_tieude'));
		$t_lienhe->c_tel->setDbValue($rs->fields('c_tel'));
		$t_lienhe->c_noidung->setDbValue($rs->fields('c_noidung'));
		$t_lienhe->c_read_time->setDbValue($rs->fields('c_read_time'));
		$t_lienhe->c_add_time->setDbValue($rs->fields('c_add_time'));
		$t_lienhe->c_status->setDbValue($rs->fields('c_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_lienhe;

		// Call Row_Rendering event
		$t_lienhe->Row_Rendering();

		// Common render codes for all row types
		// c_hoten

		$t_lienhe->c_hoten->CellCssStyle = "";
		$t_lienhe->c_hoten->CellCssClass = "";

		// c_email
		$t_lienhe->c_email->CellCssStyle = "";
		$t_lienhe->c_email->CellCssClass = "";

		// c_tieude
		$t_lienhe->c_tieude->CellCssStyle = "";
		$t_lienhe->c_tieude->CellCssClass = "";

		// c_tel
		$t_lienhe->c_tel->CellCssStyle = "";
		$t_lienhe->c_tel->CellCssClass = "";

		// c_read_time
		$t_lienhe->c_read_time->CellCssStyle = "";
		$t_lienhe->c_read_time->CellCssClass = "";

		// c_add_time
		$t_lienhe->c_add_time->CellCssStyle = "";
		$t_lienhe->c_add_time->CellCssClass = "";

		// c_status
		$t_lienhe->c_status->CellCssStyle = "";
		$t_lienhe->c_status->CellCssClass = "";
		if ($t_lienhe->RowType == EW_ROWTYPE_VIEW) { // View row

			// c_hoten
			$t_lienhe->c_hoten->ViewValue = $t_lienhe->c_hoten->CurrentValue;
			$t_lienhe->c_hoten->CssStyle = "";
			$t_lienhe->c_hoten->CssClass = "";
			$t_lienhe->c_hoten->ViewCustomAttributes = "";

			// c_email
			$t_lienhe->c_email->ViewValue = $t_lienhe->c_email->CurrentValue;
			$t_lienhe->c_email->CssStyle = "";
			$t_lienhe->c_email->CssClass = "";
			$t_lienhe->c_email->ViewCustomAttributes = "";

			// c_tieude
			$t_lienhe->c_tieude->ViewValue = $t_lienhe->c_tieude->CurrentValue;
			$t_lienhe->c_tieude->CssStyle = "";
			$t_lienhe->c_tieude->CssClass = "";
			$t_lienhe->c_tieude->ViewCustomAttributes = "";

			// c_tel
			$t_lienhe->c_tel->ViewValue = $t_lienhe->c_tel->CurrentValue;
			$t_lienhe->c_tel->CssStyle = "";
			$t_lienhe->c_tel->CssClass = "";
			$t_lienhe->c_tel->ViewCustomAttributes = "";

			// c_read_time
			$t_lienhe->c_read_time->ViewValue = $t_lienhe->c_read_time->CurrentValue;
			$t_lienhe->c_read_time->ViewValue = ew_FormatDateTime($t_lienhe->c_read_time->ViewValue, 7);
			$t_lienhe->c_read_time->CssStyle = "";
			$t_lienhe->c_read_time->CssClass = "";
			$t_lienhe->c_read_time->ViewCustomAttributes = "";

			// c_add_time
			$t_lienhe->c_add_time->ViewValue = $t_lienhe->c_add_time->CurrentValue;
			$t_lienhe->c_add_time->ViewValue = ew_FormatDateTime($t_lienhe->c_add_time->ViewValue, 7);
			$t_lienhe->c_add_time->CssStyle = "";
			$t_lienhe->c_add_time->CssClass = "";
			$t_lienhe->c_add_time->ViewCustomAttributes = "";

			// c_status
			if (strval($t_lienhe->c_status->CurrentValue) <> "") {
				switch ($t_lienhe->c_status->CurrentValue) {
					case "0":
						$t_lienhe->c_status->ViewValue = "Chưa xem";
						break;
					case "1":
						$t_lienhe->c_status->ViewValue = "Đã xem";
						break;
					default:
						$t_lienhe->c_status->ViewValue = $t_lienhe->c_status->CurrentValue;
				}
			} else {
				$t_lienhe->c_status->ViewValue = NULL;
			}
			$t_lienhe->c_status->CssStyle = "";
			$t_lienhe->c_status->CssClass = "";
			$t_lienhe->c_status->ViewCustomAttributes = "";

			// c_hoten
			$t_lienhe->c_hoten->HrefValue = "";

			// c_email
			$t_lienhe->c_email->HrefValue = "";

			// c_tieude
			$t_lienhe->c_tieude->HrefValue = "";

			// c_tel
			$t_lienhe->c_tel->HrefValue = "";

			// c_read_time
			$t_lienhe->c_read_time->HrefValue = "";

			// c_add_time
			$t_lienhe->c_add_time->HrefValue = "";

			// c_status
			$t_lienhe->c_status->HrefValue = "";
		}

		// Call Row Rendered event
		$t_lienhe->Row_Rendered();
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
