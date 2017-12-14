<?php

// PHPMaker 6 configuration for Table t_setting
$t_setting = NULL; // Initialize table object

// Define table class
class ct_setting {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $set_id;
	var $set_type;
	var $set_status;
	var $set_date_start;
	var $set_date_end;
	var $set_description;
	var $set_active;
	var $set_code;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function ct_setting() {
		$this->TableVar = "t_setting";
		$this->TableName = "t_setting";
		$this->SelectLimit = TRUE;
		$this->set_id = new cField('t_setting', 'x_set_id', 'set_id', "`set_id`", 3, -1, FALSE);
		$this->fields['set_id'] =& $this->set_id;
		$this->set_type = new cField('t_setting', 'x_set_type', 'set_type', "`set_type`", 3, -1, FALSE);
		$this->fields['set_type'] =& $this->set_type;
		$this->set_status = new cField('t_setting', 'x_set_status', 'set_status', "`set_status`", 3, -1, FALSE);
		$this->fields['set_status'] =& $this->set_status;
		$this->set_date_start = new cField('t_setting', 'x_set_date_start', 'set_date_start', "`set_date_start`", 135, 7, FALSE);
		$this->fields['set_date_start'] =& $this->set_date_start;
		$this->set_date_end = new cField('t_setting', 'x_set_date_end', 'set_date_end', "`set_date_end`", 135, 7, FALSE);
		$this->fields['set_date_end'] =& $this->set_date_end;
		$this->set_description = new cField('t_setting', 'x_set_description', 'set_description', "`set_description`", 201, -1, FALSE);
		$this->fields['set_description'] =& $this->set_description;
		$this->set_active = new cField('t_setting', 'x_set_active', 'set_active', "`set_active`", 3, -1, FALSE);
		$this->fields['set_active'] =& $this->set_active;
		$this->set_code = new cField('t_setting', 'x_set_code', 'set_code', "`set_code`", 201, -1, FALSE);
		$this->fields['set_code'] =& $this->set_code;
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
		return "t_setting_Highlight";
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
		return "SELECT * FROM `t_setting`";
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
		return "INSERT INTO `t_setting` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `t_setting` SET ";
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
		$SQL = "DELETE FROM `t_setting` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'set_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['set_id'], $this->set_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`set_id` = @set_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->set_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@set_id@", ew_AdjustSql($this->set_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_settinglist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("t_settingview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "t_settingadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("t_settingedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("t_settingadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("t_settingdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->set_id->CurrentValue)) {
			$sUrl .= "set_id=" . urlencode($this->set_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_setting" : "";
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
		$this->set_id->setDbValue($rs->fields('set_id'));
		$this->set_type->setDbValue($rs->fields('set_type'));
		$this->set_status->setDbValue($rs->fields('set_status'));
		$this->set_date_start->setDbValue($rs->fields('set_date_start'));
		$this->set_date_end->setDbValue($rs->fields('set_date_end'));
		$this->set_description->setDbValue($rs->fields('set_description'));
		$this->set_active->setDbValue($rs->fields('set_active'));
		$this->set_code->setDbValue($rs->fields('set_code'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// set_id
		$this->set_id->ViewValue = $this->set_id->CurrentValue;
		$this->set_id->CssStyle = "";
		$this->set_id->CssClass = "";
		$this->set_id->ViewCustomAttributes = "";

		// set_type
		if (strval($this->set_type->CurrentValue) <> "") {
			switch ($this->set_type->CurrentValue) {
				case "1":
					$this->set_type->ViewValue = "Cau hoi";
					break;
				case "2":
					$this->set_type->ViewValue = "Tham do";
					break;
				default:
					$this->set_type->ViewValue = $this->set_type->CurrentValue;
			}
		} else {
			$this->set_type->ViewValue = NULL;
		}
		$this->set_type->CssStyle = "";
		$this->set_type->CssClass = "";
		$this->set_type->ViewCustomAttributes = "";

		// set_status
		if (strval($this->set_status->CurrentValue) <> "") {
			switch ($this->set_status->CurrentValue) {
				case "0":
					$this->set_status->ViewValue = "Mac dinh";
					break;
				case "1":
					$this->set_status->ViewValue = "Khoa cau hoi";
					break;
				case "2":
					$this->set_status->ViewValue = "Thiet lap 2 trang thai tham do";
					break;
				case "3":
					$this->set_status->ViewValue = "Thiet lap tham do theo thoi gian";
					break;
				case "4":
					$this->set_status->ViewValue = "Thiet al tham do xac nhan";
					break;
				default:
					$this->set_status->ViewValue = $this->set_status->CurrentValue;
			}
		} else {
			$this->set_status->ViewValue = NULL;
		}
		$this->set_status->CssStyle = "";
		$this->set_status->CssClass = "";
		$this->set_status->ViewCustomAttributes = "";

		// set_date_start
		$this->set_date_start->ViewValue = $this->set_date_start->CurrentValue;
		$this->set_date_start->ViewValue = ew_FormatDateTime($this->set_date_start->ViewValue, 7);
		$this->set_date_start->CssStyle = "";
		$this->set_date_start->CssClass = "";
		$this->set_date_start->ViewCustomAttributes = "";

		// set_date_end
		$this->set_date_end->ViewValue = $this->set_date_end->CurrentValue;
		$this->set_date_end->ViewValue = ew_FormatDateTime($this->set_date_end->ViewValue, 7);
		$this->set_date_end->CssStyle = "";
		$this->set_date_end->CssClass = "";
		$this->set_date_end->ViewCustomAttributes = "";

		// set_description
		$this->set_description->ViewValue = $this->set_description->CurrentValue;
		$this->set_description->CssStyle = "";
		$this->set_description->CssClass = "";
		$this->set_description->ViewCustomAttributes = "";

		// set_active
		if (strval($this->set_active->CurrentValue) <> "") {
			switch ($this->set_active->CurrentValue) {
				case "0":
					$this->set_active->ViewValue = "Khong kich hoat";
					break;
				case "1":
					$this->set_active->ViewValue = "Kich hoat";
					break;
				default:
					$this->set_active->ViewValue = $this->set_active->CurrentValue;
			}
		} else {
			$this->set_active->ViewValue = NULL;
		}
		$this->set_active->CssStyle = "";
		$this->set_active->CssClass = "";
		$this->set_active->ViewCustomAttributes = "";

		// set_code
		$this->set_code->ViewValue = $this->set_code->CurrentValue;
		$this->set_code->CssStyle = "";
		$this->set_code->CssClass = "";
		$this->set_code->ViewCustomAttributes = "";

		// set_id
		$this->set_id->HrefValue = "";

		// set_type
		$this->set_type->HrefValue = "";

		// set_status
		$this->set_status->HrefValue = "";

		// set_date_start
		$this->set_date_start->HrefValue = "";

		// set_date_end
		$this->set_date_end->HrefValue = "";

		// set_description
		$this->set_description->HrefValue = "";

		// set_active
		$this->set_active->HrefValue = "";

		// set_code
		$this->set_code->HrefValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
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
