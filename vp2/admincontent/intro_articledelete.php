<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$intro_article_delete = new cintro_article_delete();
$Page =& $intro_article_delete;

// Page init processing
$intro_article_delete->Page_Init();

// Page main processing
$intro_article_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var intro_article_delete = new ew_Page("intro_article_delete");

// page properties
intro_article_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = intro_article_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
intro_article_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_article_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_article_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_article_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $intro_article_delete->LoadRecordset();
$intro_article_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($intro_article_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$intro_article_delete->Page_Terminate("intro_articlelist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $intro_article->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa bài viết</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $intro_article_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="intro_article">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($intro_article_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $intro_article->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Chuyên mục bài viết</td>
		<td valign="top">Tiêu đề</td>
		<td valign="top">Thời gian nhập</td>
		<td valign="top">Số lần xem</td>
		<td valign="top">Trạng thái</td>
	</tr>
	</thead>
	<tbody>
<?php
$intro_article_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$intro_article_delete->lRecCnt++;

	// Set row properties
	$intro_article->CssClass = "";
	$intro_article->CssStyle = "";
	$intro_article->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$intro_article_delete->LoadRowValues($rs);

	// Render row
	$intro_article_delete->RenderRow();
?>
	<tr<?php echo $intro_article->RowAttributes() ?>>
		<td<?php echo $intro_article->chuyenmuc_id->CellAttributes() ?>>
<div<?php echo $intro_article->chuyenmuc_id->ViewAttributes() ?>><?php echo $intro_article->chuyenmuc_id->ListViewValue() ?></div></td>
		<td<?php echo $intro_article->tieude_baiviet->CellAttributes() ?>>
<div<?php echo $intro_article->tieude_baiviet->ViewAttributes() ?>><?php echo $intro_article->tieude_baiviet->ListViewValue() ?></div></td>
		<td<?php echo $intro_article->thoigian_them->CellAttributes() ?>>
<div<?php echo $intro_article->thoigian_them->ViewAttributes() ?>><?php echo $intro_article->thoigian_them->ListViewValue() ?></div></td>
		<td<?php echo $intro_article->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $intro_article->soluot_truynhap->ViewAttributes() ?>><?php echo $intro_article->soluot_truynhap->ListViewValue() ?></div></td>
		<td<?php echo $intro_article->trang_thai->CellAttributes() ?>>
<div<?php echo $intro_article->trang_thai->ViewAttributes() ?>><?php echo $intro_article->trang_thai->ListViewValue() ?></div></td>
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
class cintro_article_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'intro_article';

	// Page Object Name
	var $PageObjName = 'intro_article_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_article;
		if ($intro_article->UseTokenInUrl) $PageUrl .= "t=" . $intro_article->TableVar . "&"; // add page token
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
		global $objForm, $intro_article;
		if ($intro_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_article_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_article"] = new cintro_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_article;
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
			$this->Page_Terminate("intro_articlelist.php");
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
		global $intro_article;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["baiviet_id"] <> "") {
			$intro_article->baiviet_id->setQueryStringValue($_GET["baiviet_id"]);
			if (!is_numeric($intro_article->baiviet_id->QueryStringValue))
				$this->Page_Terminate("intro_articlelist.php"); // Prevent SQL injection, exit
			$sKey .= $intro_article->baiviet_id->QueryStringValue;
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
			$this->Page_Terminate("intro_articlelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("intro_articlelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`baiviet_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in intro_article class, intro_articleinfo.php

		$intro_article->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$intro_article->CurrentAction = $_POST["a_delete"];
		} else {
			$intro_article->CurrentAction = "I"; // Display record
		}
		switch ($intro_article->CurrentAction) {
			case "D": // Delete
				$intro_article->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa bài viết"); // Set up success message
					$this->Page_Terminate($intro_article->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $intro_article;
		$DeleteRows = TRUE;
		$sWrkFilter = $intro_article->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in intro_article class, intro_articleinfo.php

		$intro_article->CurrentFilter = $sWrkFilter;
		$sSql = $intro_article->SQL();
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
				$DeleteRows = $intro_article->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['baiviet_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($intro_article->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($intro_article->CancelMessage <> "") {
				$this->setMessage($intro_article->CancelMessage);
				$intro_article->CancelMessage = "";
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
				$intro_article->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $intro_article;

		// Call Recordset Selecting event
		$intro_article->Recordset_Selecting($intro_article->CurrentFilter);

		// Load list page SQL
		$sSql = $intro_article->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$intro_article->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_article;
		$sFilter = $intro_article->KeyFilter();

		// Call Row Selecting event
		$intro_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_article->CurrentFilter = $sFilter;
		$sSql = $intro_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_article;
		$intro_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$intro_article->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_article->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$intro_article->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$intro_article->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$intro_article->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$intro_article->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$intro_article->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$intro_article->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_article->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$intro_article->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_article->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$intro_article->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$intro_article->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_article->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_article;

		// Call Row_Rendering event
		$intro_article->Row_Rendering();

		// Common render codes for all row types
		// chuyenmuc_id

		$intro_article->chuyenmuc_id->CellCssStyle = "white-space: nowrap;";
		$intro_article->chuyenmuc_id->CellCssClass = "";

		// tieude_baiviet
		$intro_article->tieude_baiviet->CellCssStyle = "white-space: nowrap;";
		$intro_article->tieude_baiviet->CellCssClass = "";

		// thoigian_them
		$intro_article->thoigian_them->CellCssStyle = "white-space: nowrap;";
		$intro_article->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$intro_article->soluot_truynhap->CellCssStyle = "white-space: nowrap;";
		$intro_article->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$intro_article->trang_thai->CellCssStyle = "white-space: nowrap;";
		$intro_article->trang_thai->CellCssClass = "";
		if ($intro_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// chuyenmuc_id
			if (strval($intro_article->chuyenmuc_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_chuyenmuc` FROM `intro_subject` WHERE `chuyenmuc_id` = " . ew_AdjustSql($intro_article->chuyenmuc_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$intro_article->chuyenmuc_id->ViewValue = $rswrk->fields('ten_chuyenmuc');
					$rswrk->Close();
				} else {
					$intro_article->chuyenmuc_id->ViewValue = $intro_article->chuyenmuc_id->CurrentValue;
				}
			} else {
				$intro_article->chuyenmuc_id->ViewValue = NULL;
			}
			$intro_article->chuyenmuc_id->CssStyle = "";
			$intro_article->chuyenmuc_id->CssClass = "";
			$intro_article->chuyenmuc_id->ViewCustomAttributes = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->ViewValue = $intro_article->tieude_baiviet->CurrentValue;
			$intro_article->tieude_baiviet->CssStyle = "";
			$intro_article->tieude_baiviet->CssClass = "";
			$intro_article->tieude_baiviet->ViewCustomAttributes = "";

			// thoigian_them
			$intro_article->thoigian_them->ViewValue = $intro_article->thoigian_them->CurrentValue;
			$intro_article->thoigian_them->ViewValue = ew_FormatDateTime($intro_article->thoigian_them->ViewValue, 7);
			$intro_article->thoigian_them->CssStyle = "";
			$intro_article->thoigian_them->CssClass = "";
			$intro_article->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->ViewValue = $intro_article->soluot_truynhap->CurrentValue;
			$intro_article->soluot_truynhap->CssStyle = "";
			$intro_article->soluot_truynhap->CssClass = "";
			$intro_article->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($intro_article->trang_thai->CurrentValue) <> "") {
				switch ($intro_article->trang_thai->CurrentValue) {
					case "0":
						$intro_article->trang_thai->ViewValue = "Không xuất bản";
						break;
					case "1":
						$intro_article->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$intro_article->trang_thai->ViewValue = $intro_article->trang_thai->CurrentValue;
				}
			} else {
				$intro_article->trang_thai->ViewValue = NULL;
			}
			$intro_article->trang_thai->CssStyle = "";
			$intro_article->trang_thai->CssClass = "";
			$intro_article->trang_thai->ViewCustomAttributes = "";

			// chuyenmuc_id
			$intro_article->chuyenmuc_id->HrefValue = "";

			// tieude_baiviet
			$intro_article->tieude_baiviet->HrefValue = "";

			// thoigian_them
			$intro_article->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$intro_article->soluot_truynhap->HrefValue = "";

			// trang_thai
			$intro_article->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$intro_article->Row_Rendered();
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
