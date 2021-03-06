<?php

// PHPMaker 6 configuration for Table offer
$offer = NULL; // Initialize table object

// Define table class
class coffer {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $chaohang_id;
	var $nguoidung_id;
	var $tieude_chaohang;
	var $anh_chaohang;
	var $kieu_chaohang;
	var $so_lanxem;
	var $nganhnghe_id;
	var $thoihan_tungay;
	var $thoihan_denngay;
	var $noidung_chaohang;
	var $tg_themchaohang;
	var $tg_suachaohang;
	var $trang_thai;
	var $xuatban;
	var $chaohang_tieubieu;
	var $xuat_su;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function coffer() {
		$this->TableVar = "offer";
		$this->TableName = "offer";
		$this->SelectLimit = TRUE;
		$this->chaohang_id = new cField('offer', 'x_chaohang_id', 'chaohang_id', "`chaohang_id`", 19, -1, FALSE);
		$this->fields['chaohang_id'] =& $this->chaohang_id;
		$this->nguoidung_id = new cField('offer', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->tieude_chaohang = new cField('offer', 'x_tieude_chaohang', 'tieude_chaohang', "`tieude_chaohang`", 200, -1, FALSE);
		$this->fields['tieude_chaohang'] =& $this->tieude_chaohang;
		$this->anh_chaohang = new cField('offer', 'x_anh_chaohang', 'anh_chaohang', "`anh_chaohang`", 200, -1, TRUE);
		$this->fields['anh_chaohang'] =& $this->anh_chaohang;
		$this->kieu_chaohang = new cField('offer', 'x_kieu_chaohang', 'kieu_chaohang', "`kieu_chaohang`", 19, -1, FALSE);
		$this->fields['kieu_chaohang'] =& $this->kieu_chaohang;
		$this->so_lanxem = new cField('offer', 'x_so_lanxem', 'so_lanxem', "`so_lanxem`", 19, -1, FALSE);
		$this->fields['so_lanxem'] =& $this->so_lanxem;
		$this->nganhnghe_id = new cField('offer', 'x_nganhnghe_id', 'nganhnghe_id', "`nganhnghe_id`", 19, -1, FALSE);
		$this->fields['nganhnghe_id'] =& $this->nganhnghe_id;
		$this->thoihan_tungay = new cField('offer', 'x_thoihan_tungay', 'thoihan_tungay', "`thoihan_tungay`", 135, 7, FALSE);
		$this->fields['thoihan_tungay'] =& $this->thoihan_tungay;
		$this->thoihan_denngay = new cField('offer', 'x_thoihan_denngay', 'thoihan_denngay', "`thoihan_denngay`", 135, 7, FALSE);
		$this->fields['thoihan_denngay'] =& $this->thoihan_denngay;
		$this->noidung_chaohang = new cField('offer', 'x_noidung_chaohang', 'noidung_chaohang', "`noidung_chaohang`", 201, -1, FALSE);
		$this->fields['noidung_chaohang'] =& $this->noidung_chaohang;
		$this->tg_themchaohang = new cField('offer', 'x_tg_themchaohang', 'tg_themchaohang', "`tg_themchaohang`", 135, 7, FALSE);
		$this->fields['tg_themchaohang'] =& $this->tg_themchaohang;
		$this->tg_suachaohang = new cField('offer', 'x_tg_suachaohang', 'tg_suachaohang', "`tg_suachaohang`", 135, 7, FALSE);
		$this->fields['tg_suachaohang'] =& $this->tg_suachaohang;
		$this->trang_thai = new cField('offer', 'x_trang_thai', 'trang_thai', "`trang_thai`", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->xuatban = new cField('offer', 'x_xuatban', 'xuatban', "`xuatban`", 19, -1, FALSE);
		$this->fields['xuatban'] =& $this->xuatban;
		$this->chaohang_tieubieu = new cField('offer', 'x_chaohang_tieubieu', 'chaohang_tieubieu', "`chaohang_tieubieu`", 19, -1, FALSE);
		$this->fields['chaohang_tieubieu'] =& $this->chaohang_tieubieu;
		$this->xuat_su = new cField('offer', 'x_xuat_su', 'xuat_su', "`xuat_su`", 200, -1, FALSE);
		$this->fields['xuat_su'] =& $this->xuat_su;
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
		return "offer_Highlight";
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
		return "SELECT * FROM `offer`";
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
		return "INSERT INTO `offer` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `offer` SET ";
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
		$SQL = "DELETE FROM `offer` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'chaohang_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['chaohang_id'], $this->chaohang_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`chaohang_id` = @chaohang_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->chaohang_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@chaohang_id@", ew_AdjustSql($this->chaohang_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "offerlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("offerview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "offeradd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("offeredit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("offeradd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("offerdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->chaohang_id->CurrentValue)) {
			$sUrl .= "chaohang_id=" . urlencode($this->chaohang_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=offer" : "";
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
		$this->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$this->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$this->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$this->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$this->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$this->thoihan_tungay->setDbValue($rs->fields('thoihan_tungay'));
		$this->thoihan_denngay->setDbValue($rs->fields('thoihan_denngay'));
		$this->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$this->tg_themchaohang->setDbValue($rs->fields('tg_themchaohang'));
		$this->tg_suachaohang->setDbValue($rs->fields('tg_suachaohang'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->xuatban->setDbValue($rs->fields('xuatban'));
		$this->chaohang_tieubieu->setDbValue($rs->fields('chaohang_tieubieu'));
		$this->xuat_su->setDbValue($rs->fields('xuat_su'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// tieude_chaohang
		$this->tieude_chaohang->ViewValue = $this->tieude_chaohang->CurrentValue;
		$this->tieude_chaohang->CssStyle = "";
		$this->tieude_chaohang->CssClass = "";
		$this->tieude_chaohang->ViewCustomAttributes = "";

		// anh_chaohang
		if (!is_null($this->anh_chaohang->Upload->DbValue)) {
			$this->anh_chaohang->ViewValue = $this->anh_chaohang->Upload->DbValue;
			$this->anh_chaohang->ImageWidth = 150;
			$this->anh_chaohang->ImageHeight = 0;
			$this->anh_chaohang->ImageAlt = "";
		} else {
			$this->anh_chaohang->ViewValue = "";
		}
		$this->anh_chaohang->CssStyle = "";
		$this->anh_chaohang->CssClass = "";
		$this->anh_chaohang->ViewCustomAttributes = "";

		// kieu_chaohang
		if (strval($this->kieu_chaohang->CurrentValue) <> "") {
			switch ($this->kieu_chaohang->CurrentValue) {
				case "1":
					$this->kieu_chaohang->ViewValue = "Chao ban";
					break;
				case "2":
					$this->kieu_chaohang->ViewValue = "Chao mua";
					break;
				default:
					$this->kieu_chaohang->ViewValue = $this->kieu_chaohang->CurrentValue;
			}
		} else {
			$this->kieu_chaohang->ViewValue = NULL;
		}
		$this->kieu_chaohang->CssStyle = "";
		$this->kieu_chaohang->CssClass = "";
		$this->kieu_chaohang->ViewCustomAttributes = "";

		// so_lanxem
		$this->so_lanxem->ViewValue = $this->so_lanxem->CurrentValue;
		$this->so_lanxem->CssStyle = "text-align:center;";
		$this->so_lanxem->CssClass = "";
		$this->so_lanxem->ViewCustomAttributes = "";

		// thoihan_tungay
		$this->thoihan_tungay->ViewValue = $this->thoihan_tungay->CurrentValue;
		$this->thoihan_tungay->ViewValue = ew_FormatDateTime($this->thoihan_tungay->ViewValue, 7);
		$this->thoihan_tungay->CssStyle = "";
		$this->thoihan_tungay->CssClass = "";
		$this->thoihan_tungay->ViewCustomAttributes = "";

		// thoihan_denngay
		$this->thoihan_denngay->ViewValue = $this->thoihan_denngay->CurrentValue;
		$this->thoihan_denngay->ViewValue = ew_FormatDateTime($this->thoihan_denngay->ViewValue, 7);
		$this->thoihan_denngay->CssStyle = "";
		$this->thoihan_denngay->CssClass = "";
		$this->thoihan_denngay->ViewCustomAttributes = "";

		// trang_thai
		if (strval($this->trang_thai->CurrentValue) <> "") {
			switch ($this->trang_thai->CurrentValue) {
				case "1":
					$this->trang_thai->ViewValue = "Chua Kich hoat";
					break;
				case "2":
					$this->trang_thai->ViewValue = "Da Kich hoat";
					break;
				default:
					$this->trang_thai->ViewValue = $this->trang_thai->CurrentValue;
			}
		} else {
			$this->trang_thai->ViewValue = NULL;
		}
		$this->trang_thai->CssStyle = "";
		$this->trang_thai->CssClass = "";
		$this->trang_thai->ViewCustomAttributes = "";

		// xuatban
		if (strval($this->xuatban->CurrentValue) <> "") {
			switch ($this->xuatban->CurrentValue) {
				case "0":
					$this->xuatban->ViewValue = "Dang cho";
					break;
				case "1":
					$this->xuatban->ViewValue = "Xuat ban";
					break;
				default:
					$this->xuatban->ViewValue = $this->xuatban->CurrentValue;
			}
		} else {
			$this->xuatban->ViewValue = NULL;
		}
		$this->xuatban->CssStyle = "";
		$this->xuatban->CssClass = "";
		$this->xuatban->ViewCustomAttributes = "";

		// chaohang_tieubieu
		if (strval($this->chaohang_tieubieu->CurrentValue) <> "") {
			switch ($this->chaohang_tieubieu->CurrentValue) {
				case "0":
					$this->chaohang_tieubieu->ViewValue = "Khong tieu bieu";
					break;
				case "1":
					$this->chaohang_tieubieu->ViewValue = "Tieu bieu";
					break;
				default:
					$this->chaohang_tieubieu->ViewValue = $this->chaohang_tieubieu->CurrentValue;
			}
		} else {
			$this->chaohang_tieubieu->ViewValue = NULL;
		}
		$this->chaohang_tieubieu->CssStyle = "";
		$this->chaohang_tieubieu->CssClass = "";
		$this->chaohang_tieubieu->ViewCustomAttributes = "";

		// xuat_su
		$this->xuat_su->ViewValue = $this->xuat_su->CurrentValue;
		$this->xuat_su->CssStyle = "";
		$this->xuat_su->CssClass = "";
		$this->xuat_su->ViewCustomAttributes = "";

		// tieude_chaohang
		$this->tieude_chaohang->HrefValue = "";

		// anh_chaohang
		if (!is_null($this->anh_chaohang->Upload->DbValue)) {
			$this->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($this->anh_chaohang->ViewValue)) ? $this->anh_chaohang->ViewValue : $this->anh_chaohang->CurrentValue);
			if ($this->Export <> "") $offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($this->anh_chaohang->HrefValue);
		} else {
			$this->anh_chaohang->HrefValue = "";
		}

		// kieu_chaohang
		$this->kieu_chaohang->HrefValue = "";

		// so_lanxem
		$this->so_lanxem->HrefValue = "";

		// thoihan_tungay
		$this->thoihan_tungay->HrefValue = "";

		// thoihan_denngay
		$this->thoihan_denngay->HrefValue = "";

		// trang_thai
		$this->trang_thai->HrefValue = "";

		// xuatban
		$this->xuatban->HrefValue = "";

		// chaohang_tieubieu
		$this->chaohang_tieubieu->HrefValue = "";

		// xuat_su
		$this->xuat_su->HrefValue = "";

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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `offer` WHERE " . $this->AddUserIDFilter("");

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
