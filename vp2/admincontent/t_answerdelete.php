<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_answerinfo.php" ?>
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
$t_answer_delete = new ct_answer_delete();
$Page =& $t_answer_delete;

// Page init processing
$t_answer_delete->Page_Init();

// Page main processing
$t_answer_delete->Page_Main();
?>
<?php include "header.php";
include_once('CAS.php');

// set debug mode
//phpCAS::setDebug();

// initialize phpCAS
phpCAS::client(CAS_VERSION_2_0,'login.hpu.edu.vn',80,'');

// no SSL validation for the CAS server
phpCAS::setNoCasServerValidation();

// force CAS authentication
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().
var_dump($_SESSION);
$_SESSION['user']=phpCAS::getUser();

?>
<script type="text/javascript">
<!--

// Create page object
var t_answer_delete = new ew_Page("t_answer_delete");

// page properties
t_answer_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_answer_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_answer_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_answer_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_answer_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_answer_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_answer_delete->LoadRecordset();
$t_answer_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_answer_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_answer_delete->Page_Terminate("t_answerlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Answer<br><br>
<a href="<?php echo $t_answer->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_answer_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_answer">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_answer_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_answer->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Mã câu trả lơi</td>
		<td valign="top">Mã câu hỏi</td>
		<td valign="top">FAQ</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_answer_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_answer_delete->lRecCnt++;

	// Set row properties
	$t_answer->CssClass = "";
	$t_answer->CssStyle = "";
	$t_answer->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_answer_delete->LoadRowValues($rs);

	// Render row
	$t_answer_delete->RenderRow();
?>
	<tr<?php echo $t_answer->RowAttributes() ?>>
		<td<?php echo $t_answer->answer_id->CellAttributes() ?>>
<div<?php echo $t_answer->answer_id->ViewAttributes() ?>><?php echo $t_answer->answer_id->ListViewValue() ?></div></td>
		<td<?php echo $t_answer->question_id->CellAttributes() ?>>
<div<?php echo $t_answer->question_id->ViewAttributes() ?>><?php echo $t_answer->question_id->ListViewValue() ?></div></td>
		<td<?php echo $t_answer->s_faq->CellAttributes() ?>>
<div<?php echo $t_answer->s_faq->ViewAttributes() ?>><?php echo $t_answer->s_faq->ListViewValue() ?></div></td>
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
class ct_answer_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_answer';

	// Page Object Name
	var $PageObjName = 't_answer_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_answer;
		if ($t_answer->UseTokenInUrl) $PageUrl .= "t=" . $t_answer->TableVar . "&"; // add page token
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
		global $objForm, $t_answer;
		if ($t_answer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_answer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_answer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_answer_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_answer"] = new ct_answer();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_answer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_answer;

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
		global $t_answer;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["answer_id"] <> "") {
			$t_answer->answer_id->setQueryStringValue($_GET["answer_id"]);
			if (!is_numeric($t_answer->answer_id->QueryStringValue))
				$this->Page_Terminate("t_answerlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_answer->answer_id->QueryStringValue;
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
			$this->Page_Terminate("t_answerlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_answerlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`answer_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_answer class, t_answerinfo.php

		$t_answer->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_answer->CurrentAction = $_POST["a_delete"];
		} else {
			$t_answer->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_answer->CurrentAction) {
			case "D": // Delete
				$t_answer->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_answer->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_answer;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_answer->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_answer class, t_answerinfo.php

		$t_answer->CurrentFilter = $sWrkFilter;
		$sSql = $t_answer->SQL();
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
				$DeleteRows = $t_answer->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['answer_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_answer->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_answer->CancelMessage <> "") {
				$this->setMessage($t_answer->CancelMessage);
				$t_answer->CancelMessage = "";
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
				$t_answer->Row_Deleted($row);
			}	
		}
                 $sql= " UPDATE  t_question SET active = 0 " . " ,datetime_Update = '". date("Y-m-d H:i:s") . "' ,user_IDAndser =  '". $_SESSION['user']. "' " . " WHERE question_id = '".   $_SESSION["question_id"] ."'";
                                        if (!mysql_query($sql))
                                        {
                                        die('Error: ' . mysql_error());
                                        }
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_answer;

		// Call Recordset Selecting event
		$t_answer->Recordset_Selecting($t_answer->CurrentFilter);

		// Load list page SQL
		$sSql = $t_answer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_answer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_answer;
		$sFilter = $t_answer->KeyFilter();

		// Call Row Selecting event
		$t_answer->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_answer->CurrentFilter = $sFilter;
		$sSql = $t_answer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_answer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_answer;
		$t_answer->answer_id->setDbValue($rs->fields('answer_id'));
		$t_answer->question_id->setDbValue($rs->fields('question_id'));
		$t_answer->answer->setDbValue($rs->fields('answer'));
		$t_answer->s_faq->setDbValue($rs->fields('s_faq'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_answer;

		// Call Row_Rendering event
		$t_answer->Row_Rendering();

		// Common render codes for all row types
		// answer_id

		$t_answer->answer_id->CellCssStyle = "";
		$t_answer->answer_id->CellCssClass = "";

		// question_id
		$t_answer->question_id->CellCssStyle = "";
		$t_answer->question_id->CellCssClass = "";

		// s_faq
		$t_answer->s_faq->CellCssStyle = "";
		$t_answer->s_faq->CellCssClass = "";
		if ($t_answer->RowType == EW_ROWTYPE_VIEW) { // View row

			// answer_id
			$t_answer->answer_id->ViewValue = $t_answer->answer_id->CurrentValue;
			$t_answer->answer_id->CssStyle = "";
			$t_answer->answer_id->CssClass = "";
			$t_answer->answer_id->ViewCustomAttributes = "";

			// question_id
			$t_answer->question_id->ViewValue = $t_answer->question_id->CurrentValue;
			$t_answer->question_id->ViewValue = strtolower($t_answer->question_id->ViewValue);
			$t_answer->question_id->CssStyle = "";
			$t_answer->question_id->CssClass = "";
			$t_answer->question_id->ViewCustomAttributes = "";

			// s_faq
			if (strval($t_answer->s_faq->CurrentValue) <> "") {
				switch ($t_answer->s_faq->CurrentValue) {
					case "0":
						$t_answer->s_faq->ViewValue = "Kh�ng";
						break;
					case "1":
						$t_answer->s_faq->ViewValue = "FAQ";
						break;
					default:
						$t_answer->s_faq->ViewValue = $t_answer->s_faq->CurrentValue;
				}
			} else {
				$t_answer->s_faq->ViewValue = NULL;
			}
			$t_answer->s_faq->CssStyle = "";
			$t_answer->s_faq->CssClass = "";
			$t_answer->s_faq->ViewCustomAttributes = "";

			// answer_id
			$t_answer->answer_id->HrefValue = "";

			// question_id
			$t_answer->question_id->HrefValue = "";

			// s_faq
			$t_answer->s_faq->HrefValue = "";
		}

		// Call Row Rendered event
		$t_answer->Row_Rendered();
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
