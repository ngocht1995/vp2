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
$userpriv = new cuserpriv();
$Page =& $userpriv;

// Page init processing
$userpriv->Page_Init();

// Page main processing
$userpriv->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userpriv = new ew_Page("userpriv");

// page properties
userpriv.PageID = "userpriv"; // page ID
var EW_PAGE_ID = userpriv.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userpriv.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userpriv.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userpriv.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userpriv.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<a href="userlevelslist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Phân quyền</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<p><span class="phpmaker">Cấp bậc: <?php echo $Security->GetUserLevelName($userlevels->UserLevelID->CurrentValue) ?></span></p>
<?php $userpriv->ShowMessage() ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<form name="userpriv" id="userpriv" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" id="t" value="userlevels">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<!-- hidden tag for User Level ID -->
<input type="hidden" name="x_UserLevelID" id="x_UserLevelID" value="<?php echo $userlevels->UserLevelID->CurrentValue ?>">
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
	<thead>
	<tr class="ewTableHeader">
		<td width="500">Danh sách quyền</td>
		<td width="50">Thêm/Sao chép<input type="checkbox" name="Add" id="Add" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
		<td width="50">Xóa<input type="checkbox" name="Delete" id="Delete" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
		<td width="50">Sửa<input type="checkbox" name="Edit" id="Edit" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
                <td width="50">Kích hoạt/Xuất bản<input type="checkbox" name="Active" id="Active" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
<?php if (EW_USER_LEVEL_COMPAT) { ?>
		<td width="50">Xem/Tìm kiếm<input type="checkbox" name="List" id="List" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
<?php } else { ?>
		<td width="50">Liệt kê<input type="checkbox" name="List" id="List" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
		<td width="50">Xem<input type="checkbox" name="View" id="View" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
		<td width="50">Tìm kiếm<input type="checkbox" name="Search" id="Search" onclick="ew_SelectAll(this);"<?php echo $userpriv->sDisabled ?>></td>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
for ($i = 0; $i < count($EW_USER_LEVEL_TABLE_NAME); $i++) {
	$userpriv->TempPriv = $Security->GetUserLevelPrivEx($EW_USER_LEVEL_TABLE_NAME[$i], $userlevels->UserLevelID->CurrentValue);

	// Set row properties
	$userlevels->CssClass = "";
	$userlevels->CssStyle = "";
	$userlevels->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
?>
	<tr<?php echo $userlevels->RowAttributes() ?>>
		<td><span class="phpmaker"><?php echo $EW_USER_LEVEL_TABLE_CAPTION[$i] ?><?php if (defined("EW_REPORT_TABLE_PREFIX") && substr($EW_USER_LEVEL_TABLE_NAME[$i], 0, strlen(EW_REPORT_TABLE_PREFIX)) == EW_REPORT_TABLE_PREFIX) { ?> (Report)<?php } ?></span></td>
		<td align="center"><input type="checkbox" name="Add_<?php echo $i ?>" id="Add_<?php echo $i ?>" value="1"<?php if (($userpriv->TempPriv & EW_ALLOW_ADD) == EW_ALLOW_ADD) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
		<td align="center"><input type="checkbox" name="Delete_<?php echo $i ?>" id="Delete_<?php echo $i ?>" value="2"<?php if (($userpriv->TempPriv & EW_ALLOW_DELETE) == EW_ALLOW_DELETE) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
		<td align="center"><input type="checkbox" name="Edit_<?php echo $i ?>" id="Edit_<?php echo $i ?>" value="4"<?php if (($userpriv->TempPriv & EW_ALLOW_EDIT) == EW_ALLOW_EDIT) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
                <td align="center"><input type="checkbox" name="Active_<?php echo $i ?>" id="Active_<?php echo $i ?>" value="8"<?php if (($userpriv->TempPriv & EW_ALLOW_ACTIVE) == EW_ALLOW_ACTIVE) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
<?php if (EW_USER_LEVEL_COMPAT) { ?>
		<td align="center"><input type="checkbox" name="List_<?php echo $i ?>" id="List_<?php echo $i ?>" value="16"<?php if (($userpriv->TempPriv & EW_ALLOW_LIST) == EW_ALLOW_LIST) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
<?php } else { ?>
		<td align="center"><input type="checkbox" name="List_<?php echo $i ?>" id="List_<?php echo $i ?>" value="16"<?php if (($userpriv->TempPriv & EW_ALLOW_LIST) == EW_ALLOW_LIST) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
		<td align="center"><input type="checkbox" name="View_<?php echo $i ?>" id="View_<?php echo $i ?>" value="32"<?php if (($userpriv->TempPriv & EW_ALLOW_VIEW) == EW_ALLOW_VIEW) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
		<td align="center"><input type="checkbox" name="Search_<?php echo $i ?>" id="Search_<?php echo $i ?>" value="64"<?php if (($userpriv->TempPriv & EW_ALLOW_SEARCH) == EW_ALLOW_SEARCH) { ?> checked="checked"<?php } ?><?php echo $userpriv->sDisabled ?>></td>
<?php } ?>
	</tr>
<?php } ?>
	</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnSubmit" id="btnSubmit" value="  Cập nhật  "<?php echo $userpriv->sDisabled ?>>
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cuserpriv {

	// Page ID
	var $PageID = 'userpriv';

	// Page Object Name
	var $PageObjName = 'userpriv';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
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
		return TRUE;
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserpriv() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevels"] = new cuserlevels();

	  // Initialize user table object
		$GLOBALS["user"] = new cuser;

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'userpriv', TRUE);

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
		$Security->LoadCurrentUserLevel('userlevels');
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
	var $TempPriv;
	var $sDisabled;
	var $arPriv;

	//
	// Page main processing
	//
	function Page_Main() {
		global $userlevels, $EW_USER_LEVEL_TABLE_NAME, $Security;
		if (!is_array($EW_USER_LEVEL_TABLE_NAME)) {
		  $this->setMessage("Không có quyền nào được tạo");
			$this->Page_Terminate("userlevelslist.php"); // Return to list
		}
		$this->arPriv = ew_InitArray(count($EW_USER_LEVEL_TABLE_NAME), 0);

		// Get action
		if (@$_POST["a_edit"] == "") {
			$userlevels->CurrentAction = "I"; // Display with input box

			// Load key from QueryString
			if (@$_GET["UserLevelID"] <> "") {
				$userlevels->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
			} else {
				$this->Page_Terminate("userlevelslist.php"); // Return to list
			}
			if ($userlevels->UserLevelID->QueryStringValue == "-1") {
				$this->sDisabled = " disabled=\"disabled\"";
			} else {
				$this->sDisabled = "";
			}
		} else {
			$userlevels->CurrentAction = $_POST["a_edit"];

			// Get fields from form
			$userlevels->UserLevelID->setFormValue($_POST["x_UserLevelID"]);
			for ($i = 0; $i < count($EW_USER_LEVEL_TABLE_NAME); $i++) {
				if (defined("EW_USER_LEVEL_COMPAT")) {
					$this->arPriv[$i] = intval(@$_POST["Add_" . $i]) + 
						intval(@$_POST["Delete_" . $i]) + intval(@$_POST["Edit_" . $i]) +
						intval(@$_POST["Active_" . $i]) + intval(@$_POST["List_" . $i]);
				} else {
					$this->arPriv[$i] = intval(@$_POST["Add_" . $i]) +
						intval(@$_POST["Delete_" . $i]) + intval(@$_POST["Edit_" . $i]) +
						intval(@$_POST["Active_" . $i]) + intval(@$_POST["List_" . $i]) +
                                                intval(@$_POST["View_" . $i]) +	intval(@$_POST["Search_" . $i]);
				}
			}
		}
		switch ($userlevels->CurrentAction) {
			case "I": // Display
				$Security->SetUpUserLevelEx(); // Get all User Level info
				break;
			case "U": // Update
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Set update success message

					// Alternatively, comment out the following line to go back to this page
					$this->Page_Terminate("userlevelslist.php"); // Return to list
				}
		}
	}

	// Update privileges
	function EditRow() {
		global $conn, $EW_USER_LEVEL_TABLE_NAME, $userlevels;
		for ($i = 0; $i < count($EW_USER_LEVEL_TABLE_NAME); $i++) {
			$Sql = "SELECT * FROM " . EW_USER_LEVEL_PRIV_TABLE . " WHERE " . 
				EW_USER_LEVEL_PRIV_TABLE_NAME_FIELD . " = '" . ew_AdjustSql($EW_USER_LEVEL_TABLE_NAME[$i]) . "' AND " .
				EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . " = " . $userlevels->UserLevelID->CurrentValue;
			$rs = $conn->Execute($Sql);
			if ($rs && !$rs->EOF) {
				$Sql = "UPDATE " . EW_USER_LEVEL_PRIV_TABLE . " SET " . EW_USER_LEVEL_PRIV_PRIV_FIELD . " = " . $this->arPriv[$i] . " WHERE " .
					EW_USER_LEVEL_PRIV_TABLE_NAME_FIELD . " = '" . ew_AdjustSql($EW_USER_LEVEL_TABLE_NAME[$i]) . "' AND " .
					EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . " = " . $userlevels->UserLevelID->CurrentValue;
				$conn->Execute($Sql);
			} else {
				$Sql = "INSERT INTO " . EW_USER_LEVEL_PRIV_TABLE . " (" . EW_USER_LEVEL_PRIV_TABLE_NAME_FIELD . ", " . EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . ", " . EW_USER_LEVEL_PRIV_PRIV_FIELD . ") VALUES ('" . ew_AdjustSql($EW_USER_LEVEL_TABLE_NAME[$i]) . "', " . $userlevels->UserLevelID->CurrentValue . ", " . $this->arPriv[$i] . ")";
				$conn->Execute($Sql);
			}
			if ($rs) $rs->Close();
		}
		return TRUE;
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
