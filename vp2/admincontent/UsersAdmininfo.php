<?php

// PHPMaker 6 configuration for Table UsersAdmin
$UsersAdmin = NULL; // Initialize table object

// Define table class
class cUsersAdmin {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $nguoidung_id;
	var $nguoidung_option;
	var $tendangnhap;
	var $mat_khau;
	var $truycap_gannhat;
	var $UserLevelID;
	var $quocgia_id;
	var $gioi_tinh;
	var $hoten_nguoilienhe;
	var $nick_yahoo;
	var $nick_skype;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cUsersAdmin() {
		$this->TableVar = "UsersAdmin";
		$this->TableName = "UsersAdmin";
		$this->nguoidung_id = new cField('UsersAdmin', 'x_nguoidung_id', 'nguoidung_id', "user.nguoidung_id", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->nguoidung_option = new cField('UsersAdmin', 'x_nguoidung_option', 'nguoidung_option', "user.nguoidung_option", 19, -1, FALSE);
		$this->fields['nguoidung_option'] =& $this->nguoidung_option;
		$this->tendangnhap = new cField('UsersAdmin', 'x_tendangnhap', 'tendangnhap', "user.tendangnhap", 200, -1, FALSE);
		$this->fields['tendangnhap'] =& $this->tendangnhap;
		$this->mat_khau = new cField('UsersAdmin', 'x_mat_khau', 'mat_khau', "user.mat_khau", 200, -1, FALSE);
		$this->fields['mat_khau'] =& $this->mat_khau;
		$this->truycap_gannhat = new cField('UsersAdmin', 'x_truycap_gannhat', 'truycap_gannhat', "user.truycap_gannhat", 135, 7, FALSE);
		$this->fields['truycap_gannhat'] =& $this->truycap_gannhat;
		$this->UserLevelID = new cField('UsersAdmin', 'x_UserLevelID', 'UserLevelID', "user.UserLevelID", 3, -1, FALSE);
		$this->fields['UserLevelID'] =& $this->UserLevelID;
		$this->quocgia_id = new cField('UsersAdmin', 'x_quocgia_id', 'quocgia_id', "user.quocgia_id", 200, -1, FALSE);
		$this->fields['quocgia_id'] =& $this->quocgia_id;
		$this->gioi_tinh = new cField('UsersAdmin', 'x_gioi_tinh', 'gioi_tinh', "user.gioi_tinh", 19, -1, FALSE);
		$this->fields['gioi_tinh'] =& $this->gioi_tinh;
		$this->hoten_nguoilienhe = new cField('UsersAdmin', 'x_hoten_nguoilienhe', 'hoten_nguoilienhe', "user.hoten_nguoilienhe", 200, -1, FALSE);
		$this->fields['hoten_nguoilienhe'] =& $this->hoten_nguoilienhe;
		$this->nick_yahoo = new cField('UsersAdmin', 'x_nick_yahoo', 'nick_yahoo', "user.nick_yahoo", 200, -1, FALSE);
		$this->fields['nick_yahoo'] =& $this->nick_yahoo;
		$this->nick_skype = new cField('UsersAdmin', 'x_nick_skype', 'nick_skype', "user.nick_skype", 200, -1, FALSE);
		$this->fields['nick_skype'] =& $this->nick_skype;
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
		return "UsersAdmin_Highlight";
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
		return "SELECT user.nguoidung_id, user.nguoidung_option, user.tendangnhap, user.mat_khau, user.truycap_gannhat, user.UserLevelID, user.quocgia_id, user.gioi_tinh, user.hoten_nguoilienhe, user.nick_yahoo, user.nick_skype FROM user";
	}

	function SqlWhere() { // Where
		return "user.nguoidung_option = 0 and user.UserLevelID not IN (-1)";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "user.ngay_thamgia desc";
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
			if (EW_MD5_PASSWORD && $name == 'mat_khau') {
				$value = (EW_CASE_SENSITIVE_PASSWORD) ? md5($value) : md5(strtolower($value));
			}
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= (is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `user` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `user` SET ";
		foreach ($rs as $name => $value) {
			if (EW_MD5_PASSWORD && $name == 'mat_khau') {
				$value = (EW_CASE_SENSITIVE_PASSWORD) ? md5($value) : md5(strtolower($value));
			}
			$SQL .= $this->fields[$name]->FldExpression . "=" .
					(is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM user WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'nguoidung_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['nguoidung_id'], $this->nguoidung_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "user.nguoidung_id = @nguoidung_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->nguoidung_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@nguoidung_id@", ew_AdjustSql($this->nguoidung_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "UsersAdminlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("UsersAdminview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "UsersAdminadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("UsersAdminedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("UsersAdminadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("UsersAdmindelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->nguoidung_id->CurrentValue)) {
			$sUrl .= "nguoidung_id=" . urlencode($this->nguoidung_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=UsersAdmin" : "";
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
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$this->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$this->mat_khau->setDbValue($rs->fields('mat_khau'));
		$this->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$this->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$this->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$this->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$this->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$this->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$this->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// nguoidung_option
		if (strval($this->nguoidung_option->CurrentValue) <> "") {
			switch ($this->nguoidung_option->CurrentValue) {
				case "0":
					$this->nguoidung_option->ViewValue = "Quan tri he thong";
					break;
				case "1":
					$this->nguoidung_option->ViewValue = "Thanh vien dang ky";
					break;
				default:
					$this->nguoidung_option->ViewValue = $this->nguoidung_option->CurrentValue;
			}
		} else {
			$this->nguoidung_option->ViewValue = NULL;
		}
		$this->nguoidung_option->CssStyle = "";
		$this->nguoidung_option->CssClass = "";
		$this->nguoidung_option->ViewCustomAttributes = "";

		// tendangnhap
		$this->tendangnhap->ViewValue = $this->tendangnhap->CurrentValue;
		$this->tendangnhap->CssStyle = "";
		$this->tendangnhap->CssClass = "";
		$this->tendangnhap->ViewCustomAttributes = "";

		// truycap_gannhat
		$this->truycap_gannhat->ViewValue = $this->truycap_gannhat->CurrentValue;
		$this->truycap_gannhat->ViewValue = ew_FormatDateTime($this->truycap_gannhat->ViewValue, 11);
		$this->truycap_gannhat->CssStyle = "";
		$this->truycap_gannhat->CssClass = "";
		$this->truycap_gannhat->ViewCustomAttributes = "";

		// UserLevelID
		if (strval($this->UserLevelID->CurrentValue) <> "") {
			$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($this->UserLevelID->CurrentValue) . "";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
				$this->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
				$rswrk->Close();
			} else {
				$this->UserLevelID->ViewValue = $this->UserLevelID->CurrentValue;
			}
		} else {
			$this->UserLevelID->ViewValue = NULL;
		}
		$this->UserLevelID->CssStyle = "";
		$this->UserLevelID->CssClass = "";
		$this->UserLevelID->ViewCustomAttributes = "";

		// hoten_nguoilienhe
		$this->hoten_nguoilienhe->ViewValue = $this->hoten_nguoilienhe->CurrentValue;
		$this->hoten_nguoilienhe->CssStyle = "";
		$this->hoten_nguoilienhe->CssClass = "";
		$this->hoten_nguoilienhe->ViewCustomAttributes = "";

		// nguoidung_option
		$this->nguoidung_option->HrefValue = "";

		// tendangnhap
		$this->tendangnhap->HrefValue = "";

		// truycap_gannhat
		$this->truycap_gannhat->HrefValue = "";

		// UserLevelID
		$this->UserLevelID->HrefValue = "";

		// hoten_nguoilienhe
		$this->hoten_nguoilienhe->HrefValue = "";

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
