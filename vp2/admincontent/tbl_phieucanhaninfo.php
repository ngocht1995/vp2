<?php

// PHPMaker 6 configuration for Table tbl_phieucanhan
$tbl_phieucanhan = NULL; // Initialize table object

// Define table class
class ctbl_phieucanhan {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $phieucanhan_id;
	var $chuyenmucphieu_id;
	var $msv;
	var $e_mail;
	var $hoten;
     	var $ngaysinh;
	var $nganh_hoc;
	var $lop;
	var $khoa_hoc;
	var $he_daotao;
	var $tinh_trang;
	var $chungminh_nhandan;
	var $ngaycap_chungminh;
	var $hokhau_tt;
	var $noi_cap;
	var $dan_toc;
	var $ton_giao;
	var $capbac_chucvu_dang;
	var $htlt_odau;
	var $ngayvaodang;
	var $nangkhieucanhan;
	var $dtdc_khicanlh;
	var $hoten_bo;
	var $namsinh_bo;
	var $dt_bo;
	var $hoten_me;
	var $namsinh_me;
	var $dt_me;
	var $gdchinhsach;
	var $chucvu_bo;
	var $chucvu_me;
	var $sdt_lienhegd;
	var $datetime_add;
	var $datetime_edit;
	var $active;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function ctbl_phieucanhan() {
		$this->TableVar = "tbl_phieucanhan";
		$this->TableName = "tbl_phieucanhan";
		$this->SelectLimit = TRUE;
		$this->phieucanhan_id = new cField('tbl_phieucanhan', 'x_phieucanhan_id', 'phieucanhan_id', "`phieucanhan_id`", 19, -1, FALSE);
		$this->fields['phieucanhan_id'] =& $this->phieucanhan_id;
		$this->chuyenmucphieu_id = new cField('tbl_phieucanhan', 'x_chuyenmucphieu_id', 'chuyenmucphieu_id', "`chuyenmucphieu_id`", 3, -1, FALSE);
		$this->fields['chuyenmucphieu_id'] =& $this->chuyenmucphieu_id;
		$this->msv = new cField('tbl_phieucanhan', 'x_msv', 'msv', "`msv`", 200, -1, FALSE);
		$this->fields['msv'] =& $this->msv;
		$this->e_mail = new cField('tbl_phieucanhan', 'x_e_mail', 'e_mail', "`e_mail`", 200, -1, FALSE);
		$this->fields['e_mail'] =& $this->e_mail;
		$this->hoten = new cField('tbl_phieucanhan', 'x_hoten', 'hoten', "`hoten`", 200, -1, FALSE);
		$this->fields['hoten'] =& $this->hoten;
		$this->nganh_hoc = new cField('tbl_phieucanhan', 'x_nganh_hoc', 'nganh_hoc', "`nganh_hoc`", 200, -1, FALSE);
		$this->fields['nganh_hoc'] =& $this->nganh_hoc;
		$this->lop = new cField('tbl_phieucanhan', 'x_lop', 'lop', "`lop`", 200, -1, FALSE);
		$this->fields['lop'] =& $this->lop;
		$this->khoa_hoc = new cField('tbl_phieucanhan', 'x_khoa_hoc', 'khoa_hoc', "`khoa_hoc`", 200, -1, FALSE);
		$this->fields['khoa_hoc'] =& $this->khoa_hoc;
		$this->he_daotao = new cField('tbl_phieucanhan', 'x_he_daotao', 'he_daotao', "`he_daotao`", 200, -1, FALSE);
		$this->fields['he_daotao'] =& $this->he_daotao;
		$this->tinh_trang = new cField('tbl_phieucanhan', 'x_tinh_trang', 'tinh_trang', "`tinh_trang`", 200, -1, FALSE);
		$this->fields['tinh_trang'] =& $this->tinh_trang;
		$this->chungminh_nhandan = new cField('tbl_phieucanhan', 'x_chungminh_nhandan', 'chungminh_nhandan', "`chungminh_nhandan`", 200, -1, FALSE);
		$this->fields['chungminh_nhandan'] =& $this->chungminh_nhandan;
		$this->ngaycap_chungminh = new cField('tbl_phieucanhan', 'x_ngaycap_chungminh', 'ngaycap_chungminh', "`ngaycap_chungminh`", 200, -1, FALSE);
		$this->fields['ngaycap_chungminh'] =& $this->ngaycap_chungminh;
		$this->hokhau_tt = new cField('tbl_phieucanhan', 'x_hokhau_tt', 'hokhau_tt', "`hokhau_tt`", 201, -1, FALSE);
		$this->fields['hokhau_tt'] =& $this->hokhau_tt;
		$this->noi_cap = new cField('tbl_phieucanhan', 'x_noi_cap', 'noi_cap', "`noi_cap`", 200, -1, FALSE);
		$this->fields['noi_cap'] =& $this->noi_cap;
		$this->dan_toc = new cField('tbl_phieucanhan', 'x_dan_toc', 'dan_toc', "`dan_toc`", 200, -1, FALSE);
		$this->fields['dan_toc'] =& $this->dan_toc;
		$this->ton_giao = new cField('tbl_phieucanhan', 'x_ton_giao', 'ton_giao', "`ton_giao`", 200, -1, FALSE);
		$this->fields['ton_giao'] =& $this->ton_giao;
		$this->capbac_chucvu_dang = new cField('tbl_phieucanhan', 'x_capbac_chucvu_dang', 'capbac_chucvu_dang', "`capbac_chucvu_dang`", 201, -1, FALSE);
		$this->fields['capbac_chucvu_dang'] =& $this->capbac_chucvu_dang;
		$this->htlt_odau = new cField('tbl_phieucanhan', 'x_htlt_odau', 'htlt_odau', "`htlt_odau`", 201, -1, FALSE);
		$this->fields['htlt_odau'] =& $this->htlt_odau;
		$this->ngayvaodang = new cField('tbl_phieucanhan', 'x_ngayvaodang', 'ngayvaodang', "`ngayvaodang`", 135, 7, FALSE);
		$this->fields['ngayvaodang'] =& $this->ngayvaodang;
		$this->nangkhieucanhan = new cField('tbl_phieucanhan', 'x_nangkhieucanhan', 'nangkhieucanhan', "`nangkhieucanhan`", 201, -1, FALSE);
		$this->fields['nangkhieucanhan'] =& $this->nangkhieucanhan;
		$this->dtdc_khicanlh = new cField('tbl_phieucanhan', 'x_dtdc_khicanlh', 'dtdc_khicanlh', "`dtdc_khicanlh`", 201, -1, FALSE);
		$this->fields['dtdc_khicanlh'] =& $this->dtdc_khicanlh;
		$this->hoten_bo = new cField('tbl_phieucanhan', 'x_hoten_bo', 'hoten_bo', "`hoten_bo`", 200, -1, FALSE);
		$this->fields['hoten_bo'] =& $this->hoten_bo;
		$this->namsinh_bo = new cField('tbl_phieucanhan', 'x_namsinh_bo', 'namsinh_bo', "`namsinh_bo`", 3, -1, FALSE);
		$this->fields['namsinh_bo'] =& $this->namsinh_bo;
		$this->dt_bo = new cField('tbl_phieucanhan', 'x_dt_bo', 'dt_bo', "`dt_bo`", 200, -1, FALSE);
		$this->fields['dt_bo'] =& $this->dt_bo;
		$this->hoten_me = new cField('tbl_phieucanhan', 'x_hoten_me', 'hoten_me', "`hoten_me`", 200, -1, FALSE);
		$this->fields['hoten_me'] =& $this->hoten_me;
		$this->namsinh_me = new cField('tbl_phieucanhan', 'x_namsinh_me', 'namsinh_me', "`namsinh_me`", 3, -1, FALSE);
		$this->fields['namsinh_me'] =& $this->namsinh_me;
		$this->dt_me = new cField('tbl_phieucanhan', 'x_dt_me', 'dt_me', "`dt_me`", 200, -1, FALSE);
		$this->fields['dt_me'] =& $this->dt_me;
		$this->gdchinhsach = new cField('tbl_phieucanhan', 'x_gdchinhsach', 'gdchinhsach', "`gdchinhsach`", 201, -1, FALSE);
		$this->fields['gdchinhsach'] =& $this->gdchinhsach;
		$this->chucvu_bo = new cField('tbl_phieucanhan', 'x_chucvu_bo', 'chucvu_bo', "`chucvu_bo`", 201, -1, FALSE);
		$this->fields['chucvu_bo'] =& $this->chucvu_bo;
		$this->chucvu_me = new cField('tbl_phieucanhan', 'x_chucvu_me', 'chucvu_me', "`chucvu_me`", 201, -1, FALSE);
		$this->fields['chucvu_me'] =& $this->chucvu_me;
		$this->sdt_lienhegd = new cField('tbl_phieucanhan', 'x_sdt_lienhegd', 'sdt_lienhegd', "`sdt_lienhegd`", 200, -1, FALSE);
		$this->fields['sdt_lienhegd'] =& $this->sdt_lienhegd;
		$this->datetime_add = new cField('tbl_phieucanhan', 'x_datetime_add', 'datetime_add', "`datetime_add`", 135, 7, FALSE);
		$this->fields['datetime_add'] =& $this->datetime_add;
		$this->datetime_edit = new cField('tbl_phieucanhan', 'x_datetime_edit', 'datetime_edit', "`datetime_edit`", 135, 7, FALSE);
		$this->fields['datetime_edit'] =& $this->datetime_edit;
		$this->active = new cField('tbl_phieucanhan', 'x_active', 'active', "`active`", 3, -1, FALSE);
		$this->fields['active'] =& $this->active;
                $this->ngaysinh = new cField('tbl_phieucanhan', 'x_ngaysinh', 'ngaysinh', "`ngaysinh`", 135, 7, FALSE);
		$this->fields['ngaysinh'] =& $this->ngaysinh;
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
		return "tbl_phieucanhan_Highlight";
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
		return "SELECT * FROM `tbl_phieucanhan`";
	}

	function SqlWhere() { // Where
            global $Security;
             if (!isAdmin())
                {  
                   
                   if ($sWhere <> "")
                   {   
                      if (CurrentParentUserID()== 3) $sWhere .= " AND (tbl_phieucanhan.msv =" . $_SESSION['arraythongtin']['MaSinhVien']  . ")";
                   }
                   else
                   {
                      if (CurrentParentUserID()== 3) $sWhere .= "(tbl_phieucanhan.msv =" . $_SESSION['arraythongtin']['MaSinhVien'] . ")";
                   }
                }
            
		return $sWhere;
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
		return "INSERT INTO `tbl_phieucanhan` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `tbl_phieucanhan` SET ";
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
		$SQL = "DELETE FROM `tbl_phieucanhan` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'phieucanhan_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['phieucanhan_id'], $this->phieucanhan_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`phieucanhan_id` = @phieucanhan_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->phieucanhan_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@phieucanhan_id@", ew_AdjustSql($this->phieucanhan_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "tbl_phieucanhanlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("tbl_phieucanhanview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "tbl_phieucanhanadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("tbl_phieucanhanedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("tbl_phieucanhanadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("tbl_phieucanhandelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->phieucanhan_id->CurrentValue)) {
			$sUrl .= "phieucanhan_id=" . urlencode($this->phieucanhan_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_phieucanhan" : "";
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
		$this->phieucanhan_id->setDbValue($rs->fields('phieucanhan_id'));
		$this->chuyenmucphieu_id->setDbValue($rs->fields('chuyenmucphieu_id'));
		$this->msv->setDbValue($rs->fields('msv'));
		$this->e_mail->setDbValue($rs->fields('e_mail'));
		$this->hoten->setDbValue($rs->fields('hoten'));
		$this->nganh_hoc->setDbValue($rs->fields('nganh_hoc'));
		$this->lop->setDbValue($rs->fields('lop'));
		$this->khoa_hoc->setDbValue($rs->fields('khoa_hoc'));
		$this->he_daotao->setDbValue($rs->fields('he_daotao'));
		$this->tinh_trang->setDbValue($rs->fields('tinh_trang'));
		$this->chungminh_nhandan->setDbValue($rs->fields('chungminh_nhandan'));
		$this->ngaycap_chungminh->setDbValue($rs->fields('ngaycap_chungminh'));
		$this->hokhau_tt->setDbValue($rs->fields('hokhau_tt'));
		$this->noi_cap->setDbValue($rs->fields('noi_cap'));
		$this->dan_toc->setDbValue($rs->fields('dan_toc'));
		$this->ton_giao->setDbValue($rs->fields('ton_giao'));
		$this->capbac_chucvu_dang->setDbValue($rs->fields('capbac_chucvu_dang'));
		$this->htlt_odau->setDbValue($rs->fields('htlt_odau'));
		$this->ngayvaodang->setDbValue($rs->fields('ngayvaodang'));
		$this->nangkhieucanhan->setDbValue($rs->fields('nangkhieucanhan'));
		$this->dtdc_khicanlh->setDbValue($rs->fields('dtdc_khicanlh'));
		$this->hoten_bo->setDbValue($rs->fields('hoten_bo'));
		$this->namsinh_bo->setDbValue($rs->fields('namsinh_bo'));
		$this->dt_bo->setDbValue($rs->fields('dt_bo'));
		$this->hoten_me->setDbValue($rs->fields('hoten_me'));
		$this->namsinh_me->setDbValue($rs->fields('namsinh_me'));
		$this->dt_me->setDbValue($rs->fields('dt_me'));
		$this->gdchinhsach->setDbValue($rs->fields('gdchinhsach'));
		$this->chucvu_bo->setDbValue($rs->fields('chucvu_bo'));
		$this->chucvu_me->setDbValue($rs->fields('chucvu_me'));
		$this->sdt_lienhegd->setDbValue($rs->fields('sdt_lienhegd'));
		$this->datetime_add->setDbValue($rs->fields('datetime_add'));
		$this->datetime_edit->setDbValue($rs->fields('datetime_edit'));
		$this->active->setDbValue($rs->fields('active'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// phieucanhan_id
		$this->phieucanhan_id->ViewValue = $this->phieucanhan_id->CurrentValue;
		$this->phieucanhan_id->CssStyle = "";
		$this->phieucanhan_id->CssClass = "";
		$this->phieucanhan_id->ViewCustomAttributes = "";

		// chuyenmucphieu_id
		$this->chuyenmucphieu_id->ViewValue = $this->chuyenmucphieu_id->CurrentValue;
		$this->chuyenmucphieu_id->CssStyle = "";
		$this->chuyenmucphieu_id->CssClass = "";
		$this->chuyenmucphieu_id->ViewCustomAttributes = "";

		// msv
		$this->msv->ViewValue = $this->msv->CurrentValue;
		$this->msv->CssStyle = "";
		$this->msv->CssClass = "";
		$this->msv->ViewCustomAttributes = "";

		// e_mail
		$this->e_mail->ViewValue = $this->e_mail->CurrentValue;
		$this->e_mail->CssStyle = "";
		$this->e_mail->CssClass = "";
		$this->e_mail->ViewCustomAttributes = "";

		// hoten
		$this->hoten->ViewValue = $this->hoten->CurrentValue;
		$this->hoten->CssStyle = "";
		$this->hoten->CssClass = "";
		$this->hoten->ViewCustomAttributes = "";

		// nganh_hoc
		$this->nganh_hoc->ViewValue = $this->nganh_hoc->CurrentValue;
		$this->nganh_hoc->CssStyle = "";
		$this->nganh_hoc->CssClass = "";
		$this->nganh_hoc->ViewCustomAttributes = "";

		// lop
		$this->lop->ViewValue = $this->lop->CurrentValue;
		$this->lop->CssStyle = "";
		$this->lop->CssClass = "";
		$this->lop->ViewCustomAttributes = "";

		// khoa_hoc
		$this->khoa_hoc->ViewValue = $this->khoa_hoc->CurrentValue;
		$this->khoa_hoc->CssStyle = "";
		$this->khoa_hoc->CssClass = "";
		$this->khoa_hoc->ViewCustomAttributes = "";

		// he_daotao
		$this->he_daotao->ViewValue = $this->he_daotao->CurrentValue;
		$this->he_daotao->CssStyle = "";
		$this->he_daotao->CssClass = "";
		$this->he_daotao->ViewCustomAttributes = "";

		// tinh_trang
		$this->tinh_trang->ViewValue = $this->tinh_trang->CurrentValue;
		$this->tinh_trang->CssStyle = "";
		$this->tinh_trang->CssClass = "";
		$this->tinh_trang->ViewCustomAttributes = "";

		// chungminh_nhandan
		$this->chungminh_nhandan->ViewValue = $this->chungminh_nhandan->CurrentValue;
		$this->chungminh_nhandan->CssStyle = "";
		$this->chungminh_nhandan->CssClass = "";
		$this->chungminh_nhandan->ViewCustomAttributes = "";

		// ngaycap_chungminh
		$this->ngaycap_chungminh->ViewValue = $this->ngaycap_chungminh->CurrentValue;
		$this->ngaycap_chungminh->CssStyle = "";
		$this->ngaycap_chungminh->CssClass = "";
		$this->ngaycap_chungminh->ViewCustomAttributes = "";

		// noi_cap
		$this->noi_cap->ViewValue = $this->noi_cap->CurrentValue;
		$this->noi_cap->CssStyle = "";
		$this->noi_cap->CssClass = "";
		$this->noi_cap->ViewCustomAttributes = "";

		// dan_toc
		$this->dan_toc->ViewValue = $this->dan_toc->CurrentValue;
		$this->dan_toc->CssStyle = "";
		$this->dan_toc->CssClass = "";
		$this->dan_toc->ViewCustomAttributes = "";

		// ton_giao
		$this->ton_giao->ViewValue = $this->ton_giao->CurrentValue;
		$this->ton_giao->CssStyle = "";
		$this->ton_giao->CssClass = "";
		$this->ton_giao->ViewCustomAttributes = "";

		// ngayvaodang
		$this->ngayvaodang->ViewValue = $this->ngayvaodang->CurrentValue;
		$this->ngayvaodang->ViewValue = ew_FormatDateTime($this->ngayvaodang->ViewValue, 7);
		$this->ngayvaodang->CssStyle = "";
		$this->ngayvaodang->CssClass = "";
		$this->ngayvaodang->ViewCustomAttributes = "";

		// hoten_bo
		$this->hoten_bo->ViewValue = $this->hoten_bo->CurrentValue;
		$this->hoten_bo->CssStyle = "";
		$this->hoten_bo->CssClass = "";
		$this->hoten_bo->ViewCustomAttributes = "";

		// namsinh_bo
		$this->namsinh_bo->ViewValue = $this->namsinh_bo->CurrentValue;
		$this->namsinh_bo->CssStyle = "";
		$this->namsinh_bo->CssClass = "";
		$this->namsinh_bo->ViewCustomAttributes = "";

		// dt_bo
		$this->dt_bo->ViewValue = $this->dt_bo->CurrentValue;
		$this->dt_bo->CssStyle = "";
		$this->dt_bo->CssClass = "";
		$this->dt_bo->ViewCustomAttributes = "";

		// hoten_me
		$this->hoten_me->ViewValue = $this->hoten_me->CurrentValue;
		$this->hoten_me->CssStyle = "";
		$this->hoten_me->CssClass = "";
		$this->hoten_me->ViewCustomAttributes = "";

		// namsinh_me
		$this->namsinh_me->ViewValue = $this->namsinh_me->CurrentValue;
		$this->namsinh_me->CssStyle = "";
		$this->namsinh_me->CssClass = "";
		$this->namsinh_me->ViewCustomAttributes = "";

		// dt_me
		$this->dt_me->ViewValue = $this->dt_me->CurrentValue;
		$this->dt_me->CssStyle = "";
		$this->dt_me->CssClass = "";
		$this->dt_me->ViewCustomAttributes = "";

		// chucvu_bo
		$this->chucvu_bo->ViewValue = $this->chucvu_bo->CurrentValue;
		$this->chucvu_bo->CssStyle = "";
		$this->chucvu_bo->CssClass = "";
		$this->chucvu_bo->ViewCustomAttributes = "";

		// chucvu_me
		$this->chucvu_me->ViewValue = $this->chucvu_me->CurrentValue;
		$this->chucvu_me->CssStyle = "";
		$this->chucvu_me->CssClass = "";
		$this->chucvu_me->ViewCustomAttributes = "";

		// sdt_lienhegd
		$this->sdt_lienhegd->ViewValue = $this->sdt_lienhegd->CurrentValue;
		$this->sdt_lienhegd->CssStyle = "";
		$this->sdt_lienhegd->CssClass = "";
		$this->sdt_lienhegd->ViewCustomAttributes = "";

		// datetime_add
		$this->datetime_add->ViewValue = $this->datetime_add->CurrentValue;
		$this->datetime_add->ViewValue = ew_FormatDateTime($this->datetime_add->ViewValue, 7);
		$this->datetime_add->CssStyle = "";
		$this->datetime_add->CssClass = "";
		$this->datetime_add->ViewCustomAttributes = "";

		// datetime_edit
		$this->datetime_edit->ViewValue = $this->datetime_edit->CurrentValue;
		$this->datetime_edit->ViewValue = ew_FormatDateTime($this->datetime_edit->ViewValue, 7);
		$this->datetime_edit->CssStyle = "";
		$this->datetime_edit->CssClass = "";
		$this->datetime_edit->ViewCustomAttributes = "";

		// active
		if (strval($this->active->CurrentValue) <> "") {
			switch ($this->active->CurrentValue) {
				case "0":
					$this->active->ViewValue = "khong kich hoat";
					break;
				case "1":
					$this->active->ViewValue = "kich hoat";
					break;
				default:
					$this->active->ViewValue = $this->active->CurrentValue;
			}
		} else {
			$this->active->ViewValue = NULL;
		}
		$this->active->CssStyle = "";
		$this->active->CssClass = "";
		$this->active->ViewCustomAttributes = "";

		// phieucanhan_id
		$this->phieucanhan_id->HrefValue = "";

		// chuyenmucphieu_id
		$this->chuyenmucphieu_id->HrefValue = "";

		// msv
		$this->msv->HrefValue = "";

		// e_mail
		$this->e_mail->HrefValue = "";

		// hoten
		$this->hoten->HrefValue = "";

		// nganh_hoc
		$this->nganh_hoc->HrefValue = "";

		// lop
		$this->lop->HrefValue = "";

		// khoa_hoc
		$this->khoa_hoc->HrefValue = "";

		// he_daotao
		$this->he_daotao->HrefValue = "";

		// tinh_trang
		$this->tinh_trang->HrefValue = "";

		// chungminh_nhandan
		$this->chungminh_nhandan->HrefValue = "";

		// ngaycap_chungminh
		$this->ngaycap_chungminh->HrefValue = "";

		// noi_cap
		$this->noi_cap->HrefValue = "";

		// dan_toc
		$this->dan_toc->HrefValue = "";

		// ton_giao
		$this->ton_giao->HrefValue = "";

		// ngayvaodang
		$this->ngayvaodang->HrefValue = "";

		// hoten_bo
		$this->hoten_bo->HrefValue = "";

		// namsinh_bo
		$this->namsinh_bo->HrefValue = "";

		// dt_bo
		$this->dt_bo->HrefValue = "";

		// hoten_me
		$this->hoten_me->HrefValue = "";

		// namsinh_me
		$this->namsinh_me->HrefValue = "";

		// dt_me
		$this->dt_me->HrefValue = "";

		// chucvu_bo
		$this->chucvu_bo->HrefValue = "";

		// chucvu_me
		$this->chucvu_me->HrefValue = "";

		// sdt_lienhegd
		$this->sdt_lienhegd->HrefValue = "";

		// datetime_add
		$this->datetime_add->HrefValue = "";

		// datetime_edit
		$this->datetime_edit->HrefValue = "";

		// active
		$this->active->HrefValue = "";

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
