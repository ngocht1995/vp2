<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "orderinfo.php" ?>
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
$order_search = new corder_search();
$Page =& $order_search;

// Page init processing
$order_search->Page_Init();

// Page main processing
$order_search->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var order_search = new ew_Page("order_search");

// page properties
order_search.PageID = "search"; // page ID
var EW_PAGE_ID = order_search.PageID; // for backward compatibility

// extend page with validate function for search
order_search.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_c_time_order"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - C Time Order");
	elm = fobj.elements["x" + infix + "_c_time_checkout"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - C Time Checkout");
	elm = fobj.elements["x" + infix + "_c_time_delivery"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - C Time Delivery");
	elm = fobj.elements["x" + infix + "_c_tonggiatri"];
	if (elm && !ew_CheckNumber(elm.value))
		return ew_OnError(this, elm, "Incorrect floating point number - C Tonggiatri");
	elm = fobj.elements["x" + infix + "_c_phivanchuyen"];
	if (elm && !ew_CheckNumber(elm.value))
		return ew_OnError(this, elm, "Incorrect floating point number - C Phivanchuyen");
	elm = fobj.elements["x" + infix + "_c_tienthanhtoan"];
	if (elm && !ew_CheckNumber(elm.value))
		return ew_OnError(this, elm, "Incorrect floating point number - C Tienthanhtoan");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	for (var i=0;i<fobj.elements.length;i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
order_search.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
order_search.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
order_search.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_search.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Tìm kiếm giao dịch thanh toán trực tuyến</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $order_search->ShowMessage() ?>
<form name="fordersearch" id="fordersearch" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return order_search.ValidateSearch(this);">
<p>
<input type="hidden" name="t" id="t" value="order">
<input type="hidden" name="a_search" id="a_search" value="S">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr<?php echo $order->c_sanpham_id->RowAttributes ?>>
		<td class="ewTableHeader">Tên sản phẩm</td>
		<td<?php echo $order->c_sanpham_id->CellAttributes() ?>><span class="ewSearchOpr">=<input type="hidden" name="z_c_sanpham_id" id="z_c_sanpham_id" value="="></span></td>
		<td<?php echo $order->c_sanpham_id->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_c_sanpham_id" name="x_c_sanpham_id"<?php echo $order->c_sanpham_id->EditAttributes() ?>>
<?php
if (is_array($order->c_sanpham_id->EditValue)) {
	$arwrk = $order->c_sanpham_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($order->c_sanpham_id->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_soluong->RowAttributes ?>>
		<td class="ewTableHeader">Số lượng</td>
		<td<?php echo $order->c_soluong->CellAttributes() ?>><span class="ewSearchOpr">=<input type="hidden" name="z_c_soluong" id="z_c_soluong" value="="></span></td>
		<td<?php echo $order->c_soluong->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_soluong" id="x_c_soluong" size="30" value="<?php echo $order->c_soluong->EditValue ?>"<?php echo $order->c_soluong->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_dongia->RowAttributes ?>>
		<td class="ewTableHeader">Đơn giá</td>
		<td<?php echo $order->c_dongia->CellAttributes() ?>><span class="ewSearchOpr">=<input type="hidden" name="z_c_dongia" id="z_c_dongia" value="="></span></td>
		<td<?php echo $order->c_dongia->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_dongia" id="x_c_dongia" size="30" value="<?php echo $order->c_dongia->EditValue ?>"<?php echo $order->c_dongia->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_time_order->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian đặt hàng</td>
		<td<?php echo $order->c_time_order->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_time_order" id="z_c_time_order" value="BETWEEN"></span></td>
		<td<?php echo $order->c_time_order->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_time_order" id="x_c_time_order" value="<?php echo $order->c_time_order->EditValue ?>"<?php echo $order->c_time_order->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_c_time_order" name="cal_x_c_time_order" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_c_time_order", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_c_time_order" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_c_time_order" name="btw1_c_time_order">&nbsp;Đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_c_time_order" name="btw1_c_time_order">
<input type="text" name="y_c_time_order" id="y_c_time_order" value="<?php echo $order->c_time_order->EditValue2 ?>"<?php echo $order->c_time_order->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_c_time_order" name="cal_y_c_time_order" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_c_time_order", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_c_time_order" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_checkout_type->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu thanh toán</td>
		<td<?php echo $order->c_checkout_type->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_checkout_type" id="z_c_checkout_type" value="="></span></td>
		<td<?php echo $order->c_checkout_type->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_c_checkout_type" name="x_c_checkout_type"<?php echo $order->c_checkout_type->EditAttributes() ?>>
<?php
if (is_array($order->c_checkout_type->EditValue)) {
	$arwrk = $order->c_checkout_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($order->c_checkout_type->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_time_checkout->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian thanh toán</td>
		<td<?php echo $order->c_time_checkout->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_time_checkout" id="z_c_time_checkout" value="BETWEEN"></span></td>
		<td<?php echo $order->c_time_checkout->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_time_checkout" id="x_c_time_checkout" value="<?php echo $order->c_time_checkout->EditValue ?>"<?php echo $order->c_time_checkout->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_c_time_checkout" name="cal_x_c_time_checkout" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_c_time_checkout", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_c_time_checkout" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_c_time_checkout" name="btw1_c_time_checkout">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_c_time_checkout" name="btw1_c_time_checkout">
<input type="text" name="y_c_time_checkout" id="y_c_time_checkout" value="<?php echo $order->c_time_checkout->EditValue2 ?>"<?php echo $order->c_time_checkout->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_c_time_checkout" name="cal_y_c_time_checkout" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_c_time_checkout", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_c_time_checkout" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_so_hd->RowAttributes ?>>
		<td class="ewTableHeader">Số hóa đơn</td>
		<td<?php echo $order->c_so_hd->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_so_hd" id="z_c_so_hd" value="LIKE"></span></td>
		<td<?php echo $order->c_so_hd->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_so_hd" id="x_c_so_hd" size="30" maxlength="45" value="<?php echo $order->c_so_hd->EditValue ?>"<?php echo $order->c_so_hd->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_tonggiatri->RowAttributes ?>>
		<td class="ewTableHeader">Tổng giá trị đơn hàng</td>
		<td<?php echo $order->c_tonggiatri->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_tonggiatri" id="z_c_tonggiatri" value="="></span></td>
		<td<?php echo $order->c_tonggiatri->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_tonggiatri" id="x_c_tonggiatri" size="30" value="<?php echo $order->c_tonggiatri->EditValue ?>"<?php echo $order->c_tonggiatri->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_status_thanhtoan->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái thanh toán</td>
		<td<?php echo $order->c_status_thanhtoan->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_status_thanhtoan" id="z_c_status_thanhtoan" value="="></span></td>
		<td<?php echo $order->c_status_thanhtoan->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<select id="x_c_status_thanhtoan" name="x_c_status_thanhtoan"<?php echo $order->c_status_thanhtoan->EditAttributes() ?>>
<?php
if (is_array($order->c_status_thanhtoan->EditValue)) {
	$arwrk = $order->c_status_thanhtoan->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($order->c_status_thanhtoan->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr<?php echo $order->c_doitac->RowAttributes ?>>
		<td class="ewTableHeader">Đối tác</td>
		<td<?php echo $order->c_doitac->CellAttributes() ?>><span class="ewSearchOpr"><input type="hidden" name="z_c_doitac" id="z_c_doitac" value="LIKE"></span></td>
		<td<?php echo $order->c_doitac->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_c_doitac" id="x_c_doitac" size="30" maxlength="45" value="<?php echo $order->c_doitac->EditValue ?>"<?php echo $order->c_doitac->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="  Tìm kiếm  ">
<input type="button" name="Reset" id="Reset" value="   Xóa điều kiện   " onclick="ew_ClearForm(this.form);">
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
class corder_search {

	// Page ID
	var $PageID = 'search';

	// Table Name
	var $TableName = 'order';

	// Page Object Name
	var $PageObjName = 'order_search';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $order;
		if ($order->UseTokenInUrl) $PageUrl .= "t=" . $order->TableVar . "&"; // add page token
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
		global $objForm, $order;
		if ($order->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($order->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($order->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function corder_search() {
		global $conn;

		// Initialize table object
		$GLOBALS["order"] = new corder();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'search', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'order', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $order;
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
		if (!$Security->CanSearch()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("orderlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "You do not have the right permission to view the page";
			$this->Page_Terminate("orderlist.php");
		}

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

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsSearchError, $order;
		$objForm = new cFormObj();
		if ($this->IsPageRequest()) { // Validate request

			// Get action
			$order->CurrentAction = $objForm->GetValue("a_search");
			switch ($order->CurrentAction) {
				case "S": // Get Search Criteria

					// Build search string for advanced search, remove blank field
					$this->LoadSearchValues(); // Get search values
					if ($this->ValidateSearch()) {
						$sSrchStr = $this->BuildAdvancedSearch();
					} else {
						$sSrchStr = "";
						$this->setMessage($gsSearchError);
					}
					if ($sSrchStr <> "") {
						$sSrchStr = $order->UrlParm($sSrchStr);
						$this->Page_Terminate("orderlist.php" . "?" . $sSrchStr); // Go to list page
					}
			}
		}

		// Restore search settings from Session
		if ($gsSearchError == "")
			$this->LoadAdvancedSearch();

		// Render row for search
		$order->RowType = EW_ROWTYPE_SEARCH;
		$this->RenderRow();
	}

// Build advanced search
function BuildAdvancedSearch() {
	global $order;
	$sSrchUrl = "";
	$this->BuildSearchUrl($sSrchUrl, $order->c_sanpham_id); // c_sanpham_id
	$this->BuildSearchUrl($sSrchUrl, $order->c_soluong); // c_soluong
	$this->BuildSearchUrl($sSrchUrl, $order->c_dongia); // c_dongia
	$this->BuildSearchUrl($sSrchUrl, $order->c_time_order); // c_time_order
	$this->BuildSearchUrl($sSrchUrl, $order->c_checkout_type); // c_checkout_type
	$this->BuildSearchUrl($sSrchUrl, $order->c_time_checkout); // c_time_checkout
	$this->BuildSearchUrl($sSrchUrl, $order->c_so_hd); // c_so_hd
	$this->BuildSearchUrl($sSrchUrl, $order->c_tonggiatri); // c_tonggiatri
	$this->BuildSearchUrl($sSrchUrl, $order->c_status_thanhtoan); // c_status_thanhtoan
	$this->BuildSearchUrl($sSrchUrl, $order->c_doitac); // c_doitac
	return $sSrchUrl;
}

// Function to build search URL
function BuildSearchUrl(&$Url, &$Fld) {
	global $objForm;
	$sWrk = "";
	$FldParm = substr($Fld->FldVar, 2);
	$FldVal = $objForm->GetValue("x_$FldParm");
	$FldOpr = $objForm->GetValue("z_$FldParm");
	$FldCond = $objForm->GetValue("v_$FldParm");
	$FldVal2 = $objForm->GetValue("y_$FldParm");
	$FldOpr2 = $objForm->GetValue("w_$FldParm");
	$FldVal = ew_StripSlashes($FldVal);
	if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
	$FldVal2 = ew_StripSlashes($FldVal2);
	if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
	$FldOpr = strtoupper(trim($FldOpr));
	if ($FldOpr == "BETWEEN") {
		$IsValidValue = ($Fld->FldDataType <> EW_DATATYPE_NUMBER) ||
			($Fld->FldDataType == EW_DATATYPE_NUMBER && is_numeric($FldVal) && is_numeric($FldVal2));
		if ($FldVal <> "" && $FldVal2 <> "" && $IsValidValue) {
			$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
				"&y_" . $FldParm . "=" . urlencode($FldVal2) .
				"&z_" . $FldParm . "=" . urlencode($FldOpr);
		}
	} elseif ($FldOpr == "IS NULL" || $FldOpr == "IS NOT NULL") {
		$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
			"&z_" . $FldParm . "=" . urlencode($FldOpr);
	} else {
		$IsValidValue = ($Fld->FldDataType <> EW_DATATYPE_NUMBER) ||
			($Fld->FldDataType = EW_DATATYPE_NUMBER && is_numeric($FldVal));
		if ($FldVal <> "" && $IsValidValue && ew_IsValidOpr($FldOpr, $Fld->FldDataType)) {

			//$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
				"&z_" . $FldParm . "=" . urlencode($FldOpr);
		}
		$IsValidValue = ($Fld->FldDataType <> EW_DATATYPE_NUMBER) ||
			($Fld->FldDataType = EW_DATATYPE_NUMBER && is_numeric($FldVal2));
		if ($FldVal2 <> "" && $IsValidValue && ew_IsValidOpr($FldOpr2, $Fld->FldDataType)) {

			//$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			if ($sWrk <> "") $sWrk .= "&v_" . $FldParm . "=" . urlencode($FldCond) . "&";
			$sWrk .= "&y_" . $FldParm . "=" . urlencode($FldVal2) .
				"&w_" . $FldParm . "=" . urlencode($FldOpr2);
		}
	}
	if ($sWrk <> "") {
		if ($Url <> "") $Url .= "&";
		$Url .= $sWrk;
	}
}

	// Convert search value for date
	function ConvertSearchValue(&$Fld, $FldVal) {
		$Value = $FldVal;
		if ($Fld->FldDataType == EW_DATATYPE_DATE && $FldVal <> "")
			$Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
		return $Value;
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $order;

		// Load search values
		// c_sanpham_id

		$order->c_sanpham_id->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_sanpham_id");
		$order->c_sanpham_id->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_sanpham_id");

		// c_soluong
		$order->c_soluong->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_soluong");
		$order->c_soluong->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_soluong");

		// c_dongia
		$order->c_dongia->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_dongia");
		$order->c_dongia->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_dongia");

		// c_time_order
		$order->c_time_order->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_time_order");
		$order->c_time_order->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_time_order");
		$order->c_time_order->AdvancedSearch->SearchCondition = $objForm->GetValue("v_c_time_order");
		$order->c_time_order->AdvancedSearch->SearchValue2 = $objForm->GetValue("y_c_time_order");
		$order->c_time_order->AdvancedSearch->SearchOperator2 = $objForm->GetValue("w_c_time_order");

		// c_checkout_type
		$order->c_checkout_type->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_checkout_type");
		$order->c_checkout_type->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_checkout_type");

		// c_time_checkout
		$order->c_time_checkout->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_time_checkout");
		$order->c_time_checkout->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_time_checkout");
		$order->c_time_checkout->AdvancedSearch->SearchCondition = $objForm->GetValue("v_c_time_checkout");
		$order->c_time_checkout->AdvancedSearch->SearchValue2 = $objForm->GetValue("y_c_time_checkout");
		$order->c_time_checkout->AdvancedSearch->SearchOperator2 = $objForm->GetValue("w_c_time_checkout");

		// c_so_hd
		$order->c_so_hd->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_so_hd");
		$order->c_so_hd->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_so_hd");

		// c_tonggiatri
		$order->c_tonggiatri->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_tonggiatri");
		$order->c_tonggiatri->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_tonggiatri");

		// c_status_thanhtoan
		$order->c_status_thanhtoan->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_status_thanhtoan");
		$order->c_status_thanhtoan->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_status_thanhtoan");

		// c_doitac
		$order->c_doitac->AdvancedSearch->SearchValue = $objForm->GetValue("x_c_doitac");
		$order->c_doitac->AdvancedSearch->SearchOperator = $objForm->GetValue("z_c_doitac");
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $order;

		// Call Row_Rendering event
		$order->Row_Rendering();

		// Common render codes for all row types
		// c_sanpham_id

		$order->c_sanpham_id->CellCssStyle = "";
		$order->c_sanpham_id->CellCssClass = "";

		// c_soluong
		$order->c_soluong->CellCssStyle = "";
		$order->c_soluong->CellCssClass = "";

		// c_dongia
		$order->c_dongia->CellCssStyle = "";
		$order->c_dongia->CellCssClass = "";

		// c_time_order
		$order->c_time_order->CellCssStyle = "";
		$order->c_time_order->CellCssClass = "";

		// c_checkout_type
		$order->c_checkout_type->CellCssStyle = "";
		$order->c_checkout_type->CellCssClass = "";

		// c_time_checkout
		$order->c_time_checkout->CellCssStyle = "";
		$order->c_time_checkout->CellCssClass = "";

		// c_so_hd
		$order->c_so_hd->CellCssStyle = "";
		$order->c_so_hd->CellCssClass = "";

		// c_tonggiatri
		$order->c_tonggiatri->CellCssStyle = "";
		$order->c_tonggiatri->CellCssClass = "";

		// c_status_thanhtoan
		$order->c_status_thanhtoan->CellCssStyle = "";
		$order->c_status_thanhtoan->CellCssClass = "";

		// c_doitac
		$order->c_doitac->CellCssStyle = "";
		$order->c_doitac->CellCssClass = "";
		if ($order->RowType == EW_ROWTYPE_VIEW) { // View row

			// c_sanpham_id
			if (strval($order->c_sanpham_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($order->c_sanpham_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$order->c_sanpham_id->ViewValue = $rswrk->fields('ten_sanpham');
					$rswrk->Close();
				} else {
					$order->c_sanpham_id->ViewValue = $order->c_sanpham_id->CurrentValue;
				}
			} else {
				$order->c_sanpham_id->ViewValue = NULL;
			}
			$order->c_sanpham_id->CssStyle = "";
			$order->c_sanpham_id->CssClass = "";
			$order->c_sanpham_id->ViewCustomAttributes = "";

			// c_soluong
			$order->c_soluong->ViewValue = $order->c_soluong->CurrentValue;
			$order->c_soluong->CssStyle = "";
			$order->c_soluong->CssClass = "";
			$order->c_soluong->ViewCustomAttributes = "";

			// c_dongia
			$order->c_dongia->ViewValue = $order->c_dongia->CurrentValue;
			$order->c_dongia->CssStyle = "";
			$order->c_dongia->CssClass = "";
			$order->c_dongia->ViewCustomAttributes = "";

			// c_time_order
			$order->c_time_order->ViewValue = $order->c_time_order->CurrentValue;
			$order->c_time_order->ViewValue = ew_FormatDateTime($order->c_time_order->ViewValue, 7);
			$order->c_time_order->CssStyle = "";
			$order->c_time_order->CssClass = "";
			$order->c_time_order->ViewCustomAttributes = "";

			// c_checkout_type
			if (strval($order->c_checkout_type->CurrentValue) <> "") {
				switch ($order->c_checkout_type->CurrentValue) {
					case "0":
						$order->c_checkout_type->ViewValue = "Tạm giữ";
						break;
					case "1":
						$order->c_checkout_type->ViewValue = "Thanh toán ngay";
						break;
					default:
						$order->c_checkout_type->ViewValue = $order->c_checkout_type->CurrentValue;
				}
			} else {
				$order->c_checkout_type->ViewValue = NULL;
			}
			$order->c_checkout_type->CssStyle = "";
			$order->c_checkout_type->CssClass = "";
			$order->c_checkout_type->ViewCustomAttributes = "";

			// c_time_checkout
			$order->c_time_checkout->ViewValue = $order->c_time_checkout->CurrentValue;
			$order->c_time_checkout->ViewValue = ew_FormatDateTime($order->c_time_checkout->ViewValue, 7);
			$order->c_time_checkout->CssStyle = "";
			$order->c_time_checkout->CssClass = "";
			$order->c_time_checkout->ViewCustomAttributes = "";

			// c_so_hd
			$order->c_so_hd->ViewValue = $order->c_so_hd->CurrentValue;
			$order->c_so_hd->CssStyle = "";
			$order->c_so_hd->CssClass = "";
			$order->c_so_hd->ViewCustomAttributes = "";

			// c_tonggiatri
			$order->c_tonggiatri->ViewValue = $order->c_tonggiatri->CurrentValue;
			$order->c_tonggiatri->CssStyle = "";
			$order->c_tonggiatri->CssClass = "";
			$order->c_tonggiatri->ViewCustomAttributes = "";

			// c_status_thanhtoan
			if (strval($order->c_status_thanhtoan->CurrentValue) <> "") {
				switch ($order->c_status_thanhtoan->CurrentValue) {
					case "0":
						$order->c_status_thanhtoan->ViewValue = "Chưa hoàn thành";
						break;
					case "1":
						$order->c_status_thanhtoan->ViewValue = "Hoàn thành";
						break;
					default:
						$order->c_status_thanhtoan->ViewValue = $order->c_status_thanhtoan->CurrentValue;
				}
			} else {
				$order->c_status_thanhtoan->ViewValue = NULL;
			}
			$order->c_status_thanhtoan->CssStyle = "";
			$order->c_status_thanhtoan->CssClass = "";
			$order->c_status_thanhtoan->ViewCustomAttributes = "";

			// c_doitac
			$order->c_doitac->ViewValue = $order->c_doitac->CurrentValue;
			$order->c_doitac->CssStyle = "";
			$order->c_doitac->CssClass = "";
			$order->c_doitac->ViewCustomAttributes = "";

			// c_sanpham_id
			$order->c_sanpham_id->HrefValue = "";

			// c_soluong
			$order->c_soluong->HrefValue = "";

			// c_dongia
			$order->c_dongia->HrefValue = "";

			// c_time_order
			$order->c_time_order->HrefValue = "";

			// c_checkout_type
			$order->c_checkout_type->HrefValue = "";

			// c_time_checkout
			$order->c_time_checkout->HrefValue = "";

			// c_so_hd
			$order->c_so_hd->HrefValue = "";

			// c_tonggiatri
			$order->c_tonggiatri->HrefValue = "";

			// c_status_thanhtoan
			$order->c_status_thanhtoan->HrefValue = "";

			// c_doitac
			$order->c_doitac->HrefValue = "";
		} elseif ($order->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// c_sanpham_id
			$order->c_sanpham_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `sanpham_id`, `ten_sanpham`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `products`";
			$sWhereWrk = "";
			$sWhereWrk = $GLOBALS["products"]->AddUserIDFilter($sWhereWrk);
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$order->c_sanpham_id->EditValue = $arwrk;

			// c_soluong
			$order->c_soluong->EditCustomAttributes = "";
			$order->c_soluong->EditValue = ew_HtmlEncode($order->c_soluong->AdvancedSearch->SearchValue);

			// c_dongia
			$order->c_dongia->EditCustomAttributes = "";
			$order->c_dongia->EditValue = ew_HtmlEncode($order->c_dongia->AdvancedSearch->SearchValue);

			// c_time_order
			$order->c_time_order->EditCustomAttributes = "";
			$order->c_time_order->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($order->c_time_order->AdvancedSearch->SearchValue, 7), 7));
			$order->c_time_order->EditCustomAttributes = "";
			$order->c_time_order->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($order->c_time_order->AdvancedSearch->SearchValue2, 7), 7));

			// c_checkout_type
			$order->c_checkout_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Tạm giữ");
			$arwrk[] = array("1", "Thanh toán ngay");
			array_unshift($arwrk, array("", "Chọn"));
			$order->c_checkout_type->EditValue = $arwrk;

			// c_time_checkout
			$order->c_time_checkout->EditCustomAttributes = "";
			$order->c_time_checkout->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($order->c_time_checkout->AdvancedSearch->SearchValue, 7), 7));
			$order->c_time_checkout->EditCustomAttributes = "";
			$order->c_time_checkout->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($order->c_time_checkout->AdvancedSearch->SearchValue2, 7), 7));

			// c_so_hd
			$order->c_so_hd->EditCustomAttributes = "";
			$order->c_so_hd->EditValue = ew_HtmlEncode($order->c_so_hd->AdvancedSearch->SearchValue);

			// c_tonggiatri
			$order->c_tonggiatri->EditCustomAttributes = "";
			$order->c_tonggiatri->EditValue = ew_HtmlEncode($order->c_tonggiatri->AdvancedSearch->SearchValue);

			// c_status_thanhtoan
			$order->c_status_thanhtoan->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa hoàn thành");
			$arwrk[] = array("1", "Hoàn thành");
			array_unshift($arwrk, array("", "Chọn"));
			$order->c_status_thanhtoan->EditValue = $arwrk;

			// c_doitac
			$order->c_doitac->EditCustomAttributes = "";
			$order->c_doitac->EditValue = ew_HtmlEncode($order->c_doitac->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$order->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $order;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckInteger($order->c_soluong->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect integer - C Soluong";
		}
		if (!ew_CheckInteger($order->c_dongia->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect integer - C Dongia";
		}
		if (!ew_CheckEuroDate($order->c_time_order->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - C Time Order";
		}
		if (!ew_CheckEuroDate($order->c_time_order->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - C Time Order";
		}
		if (!ew_CheckEuroDate($order->c_time_checkout->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - C Time Checkout";
		}
		if (!ew_CheckEuroDate($order->c_time_checkout->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - C Time Checkout";
		}
		if (!ew_CheckNumber($order->c_tonggiatri->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect floating point number - C Tonggiatri";
		}

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $order;
		$order->c_sanpham_id->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_sanpham_id");
		$order->c_soluong->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_soluong");
		$order->c_dongia->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_dongia");
		$order->c_time_order->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_time_order");
		$order->c_time_order->AdvancedSearch->SearchValue2 = $order->getAdvancedSearch("y_c_time_order");
		$order->c_checkout_type->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_checkout_type");
		$order->c_time_checkout->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_time_checkout");
		$order->c_time_checkout->AdvancedSearch->SearchValue2 = $order->getAdvancedSearch("y_c_time_checkout");
		$order->c_so_hd->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_so_hd");
		$order->c_tonggiatri->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_tonggiatri");
		$order->c_status_thanhtoan->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_status_thanhtoan");
		$order->c_doitac->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_doitac");
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
