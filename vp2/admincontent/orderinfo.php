<?php

// PHPMaker 6 configuration for Table order
$order = NULL; // Initialize table object

// Define table class
class corder {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $order_id;
	var $nguoidung_id;
	var $c_madh;
	var $c_sanpham_id;
	var $c_soluong;
	var $c_dongia;
	var $c_time_order;
	var $c_checkout_type;
	var $c_time_checkout;
	var $c_so_hd;
	var $c_tonggiatri;
	var $c_status_thanhtoan;
	var $c_doitac;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function corder() {
		$this->TableVar = "order";
		$this->TableName = "order";
		$this->SelectLimit = TRUE;
		$this->order_id = new cField('order', 'x_order_id', 'order_id', "`order_id`", 19, -1, FALSE);
		$this->fields['order_id'] =& $this->order_id;
		$this->nguoidung_id = new cField('order', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->c_madh = new cField('order', 'x_c_madh', 'c_madh', "`c_madh`", 200, -1, FALSE);
		$this->fields['c_madh'] =& $this->c_madh;
		$this->c_sanpham_id = new cField('order', 'x_c_sanpham_id', 'c_sanpham_id', "`c_sanpham_id`", 19, -1, FALSE);
		$this->fields['c_sanpham_id'] =& $this->c_sanpham_id;
		$this->c_soluong = new cField('order', 'x_c_soluong', 'c_soluong', "`c_soluong`", 19, -1, FALSE);
		$this->fields['c_soluong'] =& $this->c_soluong;
		$this->c_dongia = new cField('order', 'x_c_dongia', 'c_dongia', "`c_dongia`", 21, -1, FALSE);
		$this->fields['c_dongia'] =& $this->c_dongia;
		$this->c_time_order = new cField('order', 'x_c_time_order', 'c_time_order', "`c_time_order`", 135, 7, FALSE);
		$this->fields['c_time_order'] =& $this->c_time_order;
		$this->c_checkout_type = new cField('order', 'x_c_checkout_type', 'c_checkout_type', "`c_checkout_type`", 19, -1, FALSE);
		$this->fields['c_checkout_type'] =& $this->c_checkout_type;
		$this->c_time_checkout = new cField('order', 'x_c_time_checkout', 'c_time_checkout', "`c_time_checkout`", 135, 7, FALSE);
		$this->fields['c_time_checkout'] =& $this->c_time_checkout;
		$this->c_so_hd = new cField('order', 'x_c_so_hd', 'c_so_hd', "`c_so_hd`", 200, -1, FALSE);
		$this->fields['c_so_hd'] =& $this->c_so_hd;
		$this->c_tonggiatri = new cField('order', 'x_c_tonggiatri', 'c_tonggiatri', "`c_tonggiatri`", 131, -1, FALSE);
		$this->fields['c_tonggiatri'] =& $this->c_tonggiatri;
		$this->c_status_thanhtoan = new cField('order', 'x_c_status_thanhtoan', 'c_status_thanhtoan', "`c_status_thanhtoan`", 19, -1, FALSE);
		$this->fields['c_status_thanhtoan'] =& $this->c_status_thanhtoan;
		$this->c_doitac = new cField('order', 'x_c_doitac', 'c_doitac', "`c_doitac`", 200, -1, FALSE);
		$this->fields['c_doitac'] =& $this->c_doitac;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC] = $v;
	}

	// Search Highlight Name
	function HighlightName() {
		return "order_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search Keyword
	function getBasicSearchKeyword() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH];
	}

	function setBasicSearchKeyword($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic Search Type
	function getBasicSearchType() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE];
	}

	function setBasicSearchType($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search where clause
	function getSearchWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE Clause
	function getSessionWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY] = $v;
	}

	// Session Key
	function getKey($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlSelect() { // Select
		return "SELECT * FROM `order`";
	}

	function SqlWhere() { // Where
		return "";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// SQL variables
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		global $Security;

		// Add User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return table sql with list page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		if ($this->CurrentFilter <> "") {
			if ($sFilter <> "") $sFilter = "($sFilter) AND ";
			$sFilter .= "(" . $this->CurrentFilter . ")";
		}
		global $Security;

		// Add User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return record count
	function SelectRecordCount() {
		global $conn;
		$cnt = -1;
		$sFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		if ($this->SelectLimit) {
			$sSelect = $this->SelectSQL();
			if (strtoupper(substr($sSelect, 0, 13)) == "SELECT * FROM") {
				$sSelect = "SELECT COUNT(*) FROM" . substr($sSelect, 13);
				if ($rs = $conn->Execute($sSelect)) {
					if (!$rs->EOF)
						$cnt = $rs->fields[0];
					$rs->Close();
				}
			}
		}
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $sFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= (is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `order` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `order` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=" .
					(is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `order` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'order_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['order_id'], $this->order_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`order_id` = @order_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->order_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@order_id@", ew_AdjustSql($this->order_id->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return url
	function getReturnUrl() {

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] <> "") {
			return $_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL];
		} else {
			return "orderlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("orderview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "orderadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("orderedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("orderadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("orderdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->order_id->CurrentValue)) {
			$sUrl .= "order_id=" . urlencode($this->order_id->CurrentValue);
		} else {
			return "javascript:alert('Invalid Record! Key is null');";
		}
		return $sUrl;
	}

	// Sort Url
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			($fld->FldType == 205)) { // Unsortable data type
			return "";
		} else {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		}
	}

	// URL parm
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=order" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Function LoadRs
	// - Load rows based on filter
	function LoadRs($sFilter) {
		global $conn;

		// Set up filter (Sql Where Clause) and get Return Sql
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		return $conn->Execute($sSql);
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->order_id->setDbValue($rs->fields('order_id'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->c_madh->setDbValue($rs->fields('c_madh'));
		$this->c_sanpham_id->setDbValue($rs->fields('c_sanpham_id'));
		$this->c_soluong->setDbValue($rs->fields('c_soluong'));
		$this->c_dongia->setDbValue($rs->fields('c_dongia'));
		$this->c_time_order->setDbValue($rs->fields('c_time_order'));
		$this->c_checkout_type->setDbValue($rs->fields('c_checkout_type'));
		$this->c_time_checkout->setDbValue($rs->fields('c_time_checkout'));
		$this->c_so_hd->setDbValue($rs->fields('c_so_hd'));
		$this->c_tonggiatri->setDbValue($rs->fields('c_tonggiatri'));
		$this->c_status_thanhtoan->setDbValue($rs->fields('c_status_thanhtoan'));
		$this->c_doitac->setDbValue($rs->fields('c_doitac'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// c_sanpham_id
		if (strval($this->c_sanpham_id->CurrentValue) <> "") {
			$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($this->c_sanpham_id->CurrentValue) . "";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
				$this->c_sanpham_id->ViewValue = $rswrk->fields('ten_sanpham');
				$rswrk->Close();
			} else {
				$this->c_sanpham_id->ViewValue = $this->c_sanpham_id->CurrentValue;
			}
		} else {
			$this->c_sanpham_id->ViewValue = NULL;
		}
		$this->c_sanpham_id->CssStyle = "";
		$this->c_sanpham_id->CssClass = "";
		$this->c_sanpham_id->ViewCustomAttributes = "";

		// c_soluong
		$this->c_soluong->ViewValue = $this->c_soluong->CurrentValue;
		$this->c_soluong->CssStyle = "";
		$this->c_soluong->CssClass = "";
		$this->c_soluong->ViewCustomAttributes = "";

		// c_dongia
		$this->c_dongia->ViewValue = $this->c_dongia->CurrentValue;
		$this->c_dongia->CssStyle = "";
		$this->c_dongia->CssClass = "";
		$this->c_dongia->ViewCustomAttributes = "";

		// c_time_order
		$this->c_time_order->ViewValue = $this->c_time_order->CurrentValue;
		$this->c_time_order->ViewValue = ew_FormatDateTime($this->c_time_order->ViewValue, 7);
		$this->c_time_order->CssStyle = "";
		$this->c_time_order->CssClass = "";
		$this->c_time_order->ViewCustomAttributes = "";

		// c_checkout_type
		if (strval($this->c_checkout_type->CurrentValue) <> "") {
			switch ($this->c_checkout_type->CurrentValue) {
				case "0":
					$this->c_checkout_type->ViewValue = "Tam giu";
					break;
				case "1":
					$this->c_checkout_type->ViewValue = "Thanh toan ngay";
					break;
				default:
					$this->c_checkout_type->ViewValue = $this->c_checkout_type->CurrentValue;
			}
		} else {
			$this->c_checkout_type->ViewValue = NULL;
		}
		$this->c_checkout_type->CssStyle = "";
		$this->c_checkout_type->CssClass = "";
		$this->c_checkout_type->ViewCustomAttributes = "";

		// c_time_checkout
		$this->c_time_checkout->ViewValue = $this->c_time_checkout->CurrentValue;
		$this->c_time_checkout->ViewValue = ew_FormatDateTime($this->c_time_checkout->ViewValue, 7);
		$this->c_time_checkout->CssStyle = "";
		$this->c_time_checkout->CssClass = "";
		$this->c_time_checkout->ViewCustomAttributes = "";

		// c_so_hd
		$this->c_so_hd->ViewValue = $this->c_so_hd->CurrentValue;
		$this->c_so_hd->CssStyle = "";
		$this->c_so_hd->CssClass = "";
		$this->c_so_hd->ViewCustomAttributes = "";

		// c_tonggiatri
		$this->c_tonggiatri->ViewValue = $this->c_tonggiatri->CurrentValue;
		$this->c_tonggiatri->CssStyle = "";
		$this->c_tonggiatri->CssClass = "";
		$this->c_tonggiatri->ViewCustomAttributes = "";

		// c_status_thanhtoan
		if (strval($this->c_status_thanhtoan->CurrentValue) <> "") {
			switch ($this->c_status_thanhtoan->CurrentValue) {
				case "0":
					$this->c_status_thanhtoan->ViewValue = "Chua thanh toan";
					break;
				case "1":
					$this->c_status_thanhtoan->ViewValue = "Da Thanh toan";
					break;
				default:
					$this->c_status_thanhtoan->ViewValue = $this->c_status_thanhtoan->CurrentValue;
			}
		} else {
			$this->c_status_thanhtoan->ViewValue = NULL;
		}
		$this->c_status_thanhtoan->CssStyle = "";
		$this->c_status_thanhtoan->CssClass = "";
		$this->c_status_thanhtoan->ViewCustomAttributes = "";

		// c_doitac
		$this->c_doitac->ViewValue = $this->c_doitac->CurrentValue;
		$this->c_doitac->CssStyle = "";
		$this->c_doitac->CssClass = "";
		$this->c_doitac->ViewCustomAttributes = "";

		// c_sanpham_id
		$this->c_sanpham_id->HrefValue = "";

		// c_soluong
		$this->c_soluong->HrefValue = "";

		// c_dongia
		$this->c_dongia->HrefValue = "";

		// c_time_order
		$this->c_time_order->HrefValue = "";

		// c_checkout_type
		$this->c_checkout_type->HrefValue = "";

		// c_time_checkout
		$this->c_time_checkout->HrefValue = "";

		// c_so_hd
		$this->c_so_hd->HrefValue = "";

		// c_tonggiatri
		$this->c_tonggiatri->HrefValue = "";

		// c_status_thanhtoan
		$this->c_status_thanhtoan->HrefValue = "";

		// c_doitac
		$this->c_doitac->HrefValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		$sFilterWrk = $Security->UserIDList();
		if (!$Security->IsAdmin() && $sFilterWrk <> "") {
			$sFilterWrk = '`nguoidung_id` IN (' . $sFilterWrk . ')';
			if ($sFilter <> "")
				$sFilterWrk = "($sFilter) AND ($sFilterWrk)";
		} else {
			$sFilterWrk = $sFilter;
		}
		return $sFilterWrk;
	}

	// Get User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `order` WHERE " . $this->AddUserIDFilter("");

		// List all values
		if ($rs = $conn->Execute($sSql)) {
			while (!$rs->EOF) {
				if ($sWrk <> "") $sWrk .= ",";
				$sWrk .= ew_QuotedValue($rs->fields[0], $masterfld->FldDataType);
				$rs->MoveNext();
			}
			$rs->Close();
		}
		if ($sWrk <> "") {
			$sWrk = $fld->FldExpression . " IN (" . $sWrk . ")";
		}
		return $sWrk;
	}
	var $CurrentAction; // Current action
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message
	var $RowType; // Row Type
	var $CssClass; // Css class
	var $CssStyle; // Css style
	var $RowClientEvents; // Row client events

	// Row Attribute
	function RowAttributes() {
		$sAtt = "";
		if (trim($this->CssStyle) <> "") {
			$sAtt .= " style=\"" . trim($this->CssStyle) . "\"";
		}
		if (trim($this->CssClass) <> "") {
			$sAtt .= " class=\"" . trim($this->CssClass) . "\"";
		}
		if ($this->Export == "") {
			if (trim($this->RowClientEvents) <> "") {
				$sAtt .= " " . trim($this->RowClientEvents);
			}
		}
		return $sAtt;
	}

	// Field objects
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// Row Inserting event
	function Row_Inserting(&$rs) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted(&$rs) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating(&$rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated(&$rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
}
?>
