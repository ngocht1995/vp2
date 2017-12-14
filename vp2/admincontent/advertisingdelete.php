<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_delete = new cadvertising_delete();
$Page =& $advertising_delete;

// Page init processing
$advertising_delete->Page_Init();

// Page main processing
$advertising_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_delete = new ew_Page("advertising_delete");

// page properties
advertising_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = advertising_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $advertising_delete->LoadRecordset();
$advertising_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($advertising_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$advertising_delete->Page_Terminate("advertisinglist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $advertising->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa danh mục quảng cáo</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $advertising_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="advertising">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($advertising_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $advertising->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top" align="center">Tiêu đề</td>
		<td valign="top" align="center">Website</td>
		<td valign="top" align="center">Vị trí quảng cáo</td>
		<td valign="top" align="center">Xuất bản</td>
	</tr>
	</thead>
	<tbody>
<?php
$advertising_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$advertising_delete->lRecCnt++;

	// Set row properties
	$advertising->CssClass = "";
	$advertising->CssStyle = "";
	$advertising->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$advertising_delete->LoadRowValues($rs);

	// Render row
	$advertising_delete->RenderRow();
?>
	<tr<?php echo $advertising->RowAttributes() ?>>
		<td><table><tr><td<?php echo $advertising->tieu_de->CellAttributes() ?>>
<div<?php echo $advertising->tieu_de->ViewAttributes() ?>><?php echo $advertising->tieu_de->ListViewValue() ?></div></td>
		</tr><tr>
		<td<?php echo $advertising->anh_logo->CellAttributes() ?>>
<?php if ($advertising->anh_logo->HrefValue <> "") { ?>
<?php if (!is_null($advertising->anh_logo->Upload->DbValue)) { ?>
<!--vu viet hung-->
<?php if ($advertising->kieu_anh->CurrentValue <>"swf"){
 ?>
<img src="advertising_anh_logo_bv.php?lienket_id=<?php echo $advertising->lienket_id->CurrentValue ?>" border=0<?php echo $advertising->anh_logo->ViewAttributes() ?>>
<?php }
else {?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="200" ><param name="width" value="200" /><param name="src" value="flash.php?text=<?php echo $advertising->lienket_id->CurrentValue ;?>" /><embed type="application/x-shockwave-flash" width="200" src="flash.php?text=<?php echo $advertising->lienket_id->CurrentValue ;?>"></embed></object>
 <?php } ?>

<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($advertising->anh_logo->Upload->DbValue)) { ?>
<img src="advertising_anh_logo_bv.php?lienket_id=<?php echo $advertising->lienket_id->CurrentValue ?>" border=0<?php echo $advertising->anh_logo->ViewAttributes() ?>>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td></tr></table></td>
		<td<?php echo $advertising->duongdan_lienket->CellAttributes() ?>>
<div<?php echo $advertising->duongdan_lienket->ViewAttributes() ?>><?php echo $advertising->duongdan_lienket->ListViewValue() ?></div></td>
		<td<?php echo $advertising->vitri_quangcao->CellAttributes() ?>>
<div<?php echo $advertising->vitri_quangcao->ViewAttributes() ?>><?php echo $advertising->vitri_quangcao->ListViewValue() ?></div></td>
		<td<?php echo $advertising->trang_thai->CellAttributes() ?>>
<div<?php echo $advertising->trang_thai->ViewAttributes() ?>><?php echo $advertising->trang_thai->ListViewValue() ?></div></td>
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
class cadvertising_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'advertising';

	// Page Object Name
	var $PageObjName = 'advertising_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising"] = new cadvertising();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising;
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
			$this->Page_Terminate("advertisinglist.php");
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
		global $advertising;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["lienket_id"] <> "") {
			$advertising->lienket_id->setQueryStringValue($_GET["lienket_id"]);
			if (!is_numeric($advertising->lienket_id->QueryStringValue))
				$this->Page_Terminate("advertisinglist.php"); // Prevent SQL injection, exit
			$sKey .= $advertising->lienket_id->QueryStringValue;
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
			$this->Page_Terminate("advertisinglist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("advertisinglist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`lienket_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in advertising class, advertisinginfo.php

		$advertising->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$advertising->CurrentAction = $_POST["a_delete"];
		} else {
			$advertising->CurrentAction = "I"; // Display record
		}
		switch ($advertising->CurrentAction) {
			case "D": // Delete
				$advertising->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa"); // Set up success message
					$this->Page_Terminate($advertising->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $advertising;
		$DeleteRows = TRUE;
		$sWrkFilter = $advertising->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in advertising class, advertisinginfo.php

		$advertising->CurrentFilter = $sWrkFilter;
		$sSql = $advertising->SQL();
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
				$DeleteRows = $advertising->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['lienket_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($advertising->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($advertising->CancelMessage <> "") {
				$this->setMessage($advertising->CancelMessage);
				$advertising->CancelMessage = "";
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
				$advertising->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load sql based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$advertising->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $advertising;
		$advertising->lienket_id->setDbValue($rs->fields('lienket_id'));
		$advertising->tieu_de->setDbValue($rs->fields('tieu_de'));
		$advertising->anh_logo->Upload->DbValue = $rs->fields('anh_logo');
		$advertising->kieu_anh->setDbValue($rs->fields('kieu_anh'));
		$advertising->duongdan_lienket->setDbValue($rs->fields('duongdan_lienket'));
		$advertising->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$advertising->mo_ta->setDbValue($rs->fields('mo_ta'));
		$advertising->dorong_anh->setDbValue($rs->fields('dorong_anh'));
		$advertising->chieucao_anh->setDbValue($rs->fields('chieucao_anh'));
		$advertising->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$advertising->luachon_hienthi->setDbValue($rs->fields('luachon_hienthi'));
		$advertising->vitri_quangcao->setDbValue($rs->fields('vitri_quangcao'));
		$advertising->solan_truycap->setDbValue($rs->fields('solan_truycap'));
		$advertising->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$advertising->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$advertising->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$advertising->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$advertising->trang_thai->setDbValue($rs->fields('trang_thai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising;

		// Call Row_Rendering event
		$advertising->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$advertising->tieu_de->CellCssStyle = "white-space: nowrap;";
		$advertising->tieu_de->CellCssClass = "";

		// anh_logo
		$advertising->anh_logo->CellCssStyle = "white-space: nowrap;";
		$advertising->anh_logo->CellCssClass = "";

		// duongdan_lienket
		$advertising->duongdan_lienket->CellCssStyle = "width: 100px; white-space: nowrap;";
		$advertising->duongdan_lienket->CellCssClass = "";

		// luachon_hienthi
		$advertising->luachon_hienthi->CellCssStyle = "width: 80px; white-space: nowrap;";
		$advertising->luachon_hienthi->CellCssClass = "";

		// vitri_quangcao
		$advertising->vitri_quangcao->CellCssStyle = "width: 80px; white-space: nowrap;";
		$advertising->vitri_quangcao->CellCssClass = "";

		// trang_thai
		$advertising->trang_thai->CellCssStyle = "width: 80px; white-space: nowrap;";
		$advertising->trang_thai->CellCssClass = "";
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$advertising->tieu_de->ViewValue = $advertising->tieu_de->CurrentValue;
			$advertising->tieu_de->CssStyle = "";
			$advertising->tieu_de->CssClass = "";
			$advertising->tieu_de->ViewCustomAttributes = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->ViewValue = "Anh Logo";
				$advertising->anh_logo->ImageWidth = 200;
				$advertising->anh_logo->ImageHeight = 0;
				$advertising->anh_logo->ImageAlt = "";
			} else {
				$advertising->anh_logo->ViewValue = "";
			}
			$advertising->anh_logo->CssStyle = "";
			$advertising->anh_logo->CssClass = "";
			$advertising->anh_logo->ViewCustomAttributes = "";

			// duongdan_lienket
			$advertising->duongdan_lienket->ViewValue = $advertising->duongdan_lienket->CurrentValue;
			$advertising->duongdan_lienket->CssStyle = "";
			$advertising->duongdan_lienket->CssClass = "";
			$advertising->duongdan_lienket->ViewCustomAttributes = "";

			// luachon_hienthi
			if (strval($advertising->luachon_hienthi->CurrentValue) <> "") {
				switch ($advertising->luachon_hienthi->CurrentValue) {
					case "1":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn";
						break;
					case "2":
						$advertising->luachon_hienthi->ViewValue = "Quảng cáo";
						break;
					case "3":
						$advertising->luachon_hienthi->ViewValue = "Liên kết sàn và quảng cáo";
						break;
					default:
						$advertising->luachon_hienthi->ViewValue = $advertising->luachon_hienthi->CurrentValue;
				}
			} else {
				$advertising->luachon_hienthi->ViewValue = NULL;
			}
			$advertising->luachon_hienthi->CssStyle = "";
			$advertising->luachon_hienthi->CssClass = "";
			$advertising->luachon_hienthi->ViewCustomAttributes = "";

			// vitri_quangcao
			if (strval($advertising->vitri_quangcao->CurrentValue) <> "") {
				switch ($advertising->vitri_quangcao->CurrentValue) {
					case "1":
						$advertising->vitri_quangcao->ViewValue = "Vị trí số 1";
						break;
					case "2":
						$advertising->vitri_quangcao->ViewValue = "Vị trí số 2";
						break;
					case "3":
						$advertising->vitri_quangcao->ViewValue = "Vị trí số 3";
						break;
					case "4":
						$advertising->vitri_quangcao->ViewValue = "Vị trí số 4";
						break;
					default:
						$advertising->vitri_quangcao->ViewValue = $advertising->vitri_quangcao->CurrentValue;
				}
			} else {
				$advertising->vitri_quangcao->ViewValue = NULL;
			}
			$advertising->vitri_quangcao->CssStyle = "";
			$advertising->vitri_quangcao->CssClass = "";
			$advertising->vitri_quangcao->ViewCustomAttributes = "";

			// trang_thai
			if (strval($advertising->trang_thai->CurrentValue) <> "") {
				switch ($advertising->trang_thai->CurrentValue) {
					case "0":
						$advertising->trang_thai->ViewValue = "Không xuất bản";
						break;
					case "1":
						$advertising->trang_thai->ViewValue = "Xuất bản";
						break;
					default:
						$advertising->trang_thai->ViewValue = $advertising->trang_thai->CurrentValue;
				}
			} else {
				$advertising->trang_thai->ViewValue = NULL;
			}
			$advertising->trang_thai->CssStyle = "";
			$advertising->trang_thai->CssClass = "";
			$advertising->trang_thai->ViewCustomAttributes = "";

			// tieu_de
			$advertising->tieu_de->HrefValue = "";

			// anh_logo
			if (!is_null($advertising->anh_logo->Upload->DbValue)) {
				$advertising->anh_logo->HrefValue = "advertising_anh_logo_bv.php?lienket_id=" . $advertising->lienket_id->CurrentValue;
				if ($advertising->Export <> "") $advertising->anh_logo->HrefValue = ew_ConvertFullUrl($advertising->anh_logo->HrefValue);
			} else {
				$advertising->anh_logo->HrefValue = "";
			}

			// duongdan_lienket
			$advertising->duongdan_lienket->HrefValue = "";

			// luachon_hienthi
			$advertising->luachon_hienthi->HrefValue = "";

			// vitri_quangcao
			$advertising->vitri_quangcao->HrefValue = "";

			// trang_thai
			$advertising->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising->Row_Rendered();
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
