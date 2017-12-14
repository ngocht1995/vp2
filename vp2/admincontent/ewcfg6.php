<?php

/**
 * PHPMaker 6 configuration file
 */

// Database connection
define("EW_CONN_HOST", "localhost", TRUE);
define("EW_CONN_PORT", 3306, TRUE);
define("EW_CONN_USER", "root", TRUE);
define("EW_CONN_PASS", "", TRUE);
define("EW_CONN_DB", "htsv", TRUE);

// Show SQL for debug
//define("EW_DEBUG_ENABLED", TRUE, TRUE); // Uncomment to debug

define("EW_IS_WINDOWS", (strtolower(substr(PHP_OS, 0, 3)) === 'win'), TRUE); // Is Windows OS
define("EW_IS_PHP5", (phpversion() >= "5.0.0"), TRUE); // Is PHP5
define("EW_PATH_DELIMITER", ((EW_IS_WINDOWS) ? "\\" : "/"), TRUE); // Physical path delimiter
define("EW_ROOT_RELATIVE_PATH", ".", TRUE); // Relative path of app root
define("EW_DEFAULT_DATE_FORMAT", "dd/mm/yyyy", TRUE); // Default date format
define("EW_DEFAULT_DATE_FORMAT_ID", "7", TRUE); // Default date format
define("EW_DATE_SEPARATOR", "/", TRUE); // Date separator
define("EW_PROJECT_NAME", "htsv", TRUE); // Project Name
define("EW_RANDOM_KEY", 'qQkg1EHloi0czBtW', TRUE); // Random key for encryption

/**
 * Encoding for Ajax
 * Note: If you use non English languages, you may need to set the encoding for
 * Ajax features. Make sure your encoding is supported by your PHP and either
 * iconv functions or multibyte string functions are enabled. See PHP manual
 * for details
 * e.g. define("EW_ENCODING", "ISO-8859-1", TRUE);
 */
define("EW_ENCODING", "UTF-8", TRUE); // Encoding for Ajax

/**
 * Password (MD5 and case-sensitivity)
 * Note: If you enable MD5 password, make sure that the passwords in your
 * user table are stored as MD5 hash (32-character hexadecimal number) of the
 * clear text password. If you also use case-insensitive password, convert the
 * clear text passwords to lower case first before calculating MD5 hash.
 * Otherwise, existing users will not be able to login. MD5 hash is
 * irreversible, password will be reset during password recovery.
 */
define("EW_MD5_PASSWORD", TRUE, TRUE); // Use MD5 password
define("EW_CASE_SENSITIVE_PASSWORD", TRUE, TRUE); // Case-sensitive password

// Session names
define("EW_DOMAIN","http://www.baclieutrade.vn", TRUE); // Login Status
define("EW_SESSION_STATUS", EW_PROJECT_NAME . "_status", TRUE); // Login Status
define("EW_SESSION_FULL_USER_NAME", EW_SESSION_STATUS . "_FullUserName", TRUE); // Ful User Name
define("EW_SESSION_USER_NAME", EW_SESSION_STATUS . "_UserName", TRUE); // User Name
define("EW_SESSION_USER_ID", EW_SESSION_STATUS . "_UserID", TRUE); // User ID
define("EW_SESSION_USER_LEVEL_ID", EW_SESSION_STATUS . "_UserLevel", TRUE); // User Level ID
define("EW_SESSION_USER_LEVEL", EW_SESSION_STATUS . "_UserLevelValue", TRUE); // User Level
define("EW_SESSION_PARENT_USER_ID", EW_SESSION_STATUS . "_ParentUserID", TRUE); // Parent User ID
define("EW_SESSION_SYS_ADMIN", EW_PROJECT_NAME . "_SysAdmin", TRUE); // System Admin
define("EW_SESSION_AR_USER_LEVEL", EW_PROJECT_NAME . "_arUserLevel", TRUE); // User Level Array
define("EW_SESSION_AR_USER_LEVEL_PRIV", EW_PROJECT_NAME . "_arUserLevelPriv", TRUE); // User Level Privilege Array
define("EW_SESSION_SECURITY", EW_PROJECT_NAME . "_Security", TRUE); // Security Array
define("EW_SESSION_MESSAGE", EW_PROJECT_NAME . "_Message", TRUE); // System Message
define("EW_SESSION_INLINE_MODE", EW_PROJECT_NAME . "_InlineMode", TRUE); // Inline Mode
define("EW_DATATYPE_NUMBER", 1, TRUE);
define("EW_DATATYPE_DATE", 2, TRUE);
define("EW_DATATYPE_STRING", 3, TRUE);
define("EW_DATATYPE_BOOLEAN", 4, TRUE);
define("EW_DATATYPE_MEMO", 5, TRUE);
define("EW_DATATYPE_BLOB", 6, TRUE);
define("EW_DATATYPE_TIME", 7, TRUE);
define("EW_DATATYPE_GUID", 8, TRUE);
define("EW_DATATYPE_OTHER", 9, TRUE);
define("EW_ROWTYPE_VIEW", 1, TRUE); // Row type view
define("EW_ROWTYPE_ADD", 2, TRUE); // Row type add
define("EW_ROWTYPE_EDIT", 3, TRUE); // Row type edit
define("EW_ROWTYPE_SEARCH", 4, TRUE); // Row type search
define("EW_ROWTYPE_MASTER", 5, TRUE);  // Row type master record
define("EW_COMPOSITE_KEY_SEPARATOR", ",", TRUE); // Composite key separator
define("EW_EMAIL_KEYWORD_SEPARATOR", "|", TRUE); // Email keyword separator
define("EW_HIGHLIGHT_COMPARE", TRUE, TRUE); // TRUE = case-insensitive

// Table parameters
define("EW_TABLE_REC_PER_PAGE", "RecPerPage", TRUE); // Records per page
define("EW_TABLE_START_REC", "start", TRUE); // Start record
define("EW_TABLE_PAGE_NO", "pageno", TRUE); // Page number
define("EW_TABLE_BASIC_SEARCH", "psearch", TRUE); // Basic search keyword
define("EW_TABLE_BASIC_SEARCH_TYPE","psearchtype", TRUE); // Basic search type
define("EW_TABLE_ADVANCED_SEARCH", "advsrch", TRUE); // Advanced search
define("EW_TABLE_SEARCH_WHERE", "searchwhere", TRUE); // Search where clause
define("EW_TABLE_WHERE", "where", TRUE); // Table where
define("EW_TABLE_ORDER_BY", "orderby", TRUE); // Table order by
define("EW_TABLE_SORT", "sort", TRUE); // Table sort
define("EW_TABLE_KEY", "key", TRUE); // Table key
define("EW_TABLE_SHOW_MASTER", "showmaster", TRUE); // Table show master
define("EW_TABLE_MASTER_TABLE", "MasterTable", TRUE); // Master table
define("EW_TABLE_MASTER_FILTER", "MasterFilter", TRUE); // Master filter
define("EW_TABLE_DETAIL_FILTER", "DetailFilter", TRUE); // Detail filter
define("EW_TABLE_RETURN_URL", "return", TRUE); // Return url

// Database
define("EW_IS_MSACCESS", False, TRUE); // Access (Reserved, NOT USED)
define("EW_IS_MYSQL", True, TRUE); // MySQL
define("EW_DB_QUOTE_START", "`", TRUE);
define("EW_DB_QUOTE_END", "`", TRUE);

/**
 * MySQL charset (for SET NAMES statement, not used by default)
 * Note: Read http://dev.mysql.com/doc/refman/5.0/en/charset-connection.html
 * before using this setting.
 */
define("EW_MYSQL_CHARSET", "utf8", TRUE);

// Security
define("EW_ADMIN_USER_NAME", "", TRUE); // Administrator user name
define("EW_ADMIN_PASSWORD", "", TRUE); // Administrator password

// Dynamic User Level table
$EW_USER_LEVEL_TABLE_NAME = array();
$EW_USER_LEVEL_TABLE_CAPTION = array();
$EW_USER_LEVEL_TABLE_NAME[] = 'advertising';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý banner, logo quảng cáo";
$EW_USER_LEVEL_TABLE_NAME[] = 'intro_article';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý thông tin";
$EW_USER_LEVEL_TABLE_NAME[] = 'tbl_bangiaocv';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý công việc đang triển khai";
$EW_USER_LEVEL_TABLE_NAME[] = 'subject';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý chuyên mục bài viết";
$EW_USER_LEVEL_TABLE_NAME[] = 'user';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Thông tin tài khoản";
$EW_USER_LEVEL_TABLE_NAME[] = 'intro_information';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Thông tin giới thiệu";
$EW_USER_LEVEL_TABLE_NAME[] = 'Read';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý thư đã đọc";
$EW_USER_LEVEL_TABLE_NAME[] = 'unread';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý thư chưa đọc";
$EW_USER_LEVEL_TABLE_NAME[] = 'UserAdmin';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Thông tin tài khoản người dùng hệ thống";
$EW_USER_LEVEL_TABLE_NAME[] = 'UsersRegistered';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý thành viên đăng ký";
$EW_USER_LEVEL_TABLE_NAME[] = 'UsersAdmin';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý người dùng hệ thống";
$EW_USER_LEVEL_TABLE_NAME[] = 'Nganhnghe';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý danh mục ngành hàng";
$EW_USER_LEVEL_TABLE_NAME[] = 'subject_ad';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý chuyên mục quảng cáo";
$EW_USER_LEVEL_TABLE_NAME[] = 'advertising_info';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý tin quảng cáo";
$EW_USER_LEVEL_TABLE_NAME[] = 'link';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý liên kết website";
$EW_USER_LEVEL_TABLE_NAME[] = 'banner';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý Banner";
$EW_USER_LEVEL_TABLE_NAME[] = 'footer';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý thông tin nhà quản lý SGD";
$EW_USER_LEVEL_TABLE_NAME[] = 'rss';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý RSS";
$EW_USER_LEVEL_TABLE_NAME[] = 'ew_email';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý Email hệ thống";
$EW_USER_LEVEL_TABLE_NAME[] = 'usernews';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý tin tức doanh nghiệp";
$EW_USER_LEVEL_TABLE_NAME[] = 't_lienhe';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý tin liên hệ";
$EW_USER_LEVEL_TABLE_NAME[] = 't_phanhoi';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý tin phanhoi";
$EW_USER_LEVEL_TABLE_NAME[] = 't_manager_services';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý services";
$EW_USER_LEVEL_TABLE_NAME[] = 'tbl_miengiamhocphi';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Đơn xin miễm giảm học phí";
$EW_USER_LEVEL_TABLE_NAME[] = 'tbl_phieucanhan';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Phiếu cá nhân";
$EW_USER_LEVEL_TABLE_NAME[] = 'tbl_doncaithiendiem';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Đơn xin cải thiện điểm";
$EW_USER_LEVEL_TABLE_NAME[] = 't_question';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý câu hỏi";
$EW_USER_LEVEL_TABLE_NAME[] = 't_question_group';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Quản lý nhóm câu hỏi";
$EW_USER_LEVEL_TABLE_NAME[] = 't_setting';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Trạng thái thiết lập";
$EW_USER_LEVEL_TABLE_NAME[] = 't_setting_aws_ques';
$EW_USER_LEVEL_TABLE_CAPTION[] = "Thiết lập thời gian hỏi đáp";
// Compatibility with PHP Report Maker 3+
define("EW_REPORT_USER_LEVEL_INCLUDE_FILE", "ewruserlevel.php", TRUE);
if (file_exists(EW_REPORT_USER_LEVEL_INCLUDE_FILE))
        include EW_REPORT_USER_LEVEL_INCLUDE_FILE;

// Dynamic User Level settings
// User level definition table/field names

define("EW_USER_LEVEL_TABLE", "`userlevels`", TRUE);
define("EW_USER_LEVEL_ID_FIELD", "`UserLevelID`", TRUE);
define("EW_USER_LEVEL_NAME_FIELD", "`UserLevelName`", TRUE);

// User Level privileges table/field names
define("EW_USER_LEVEL_PRIV_TABLE", "`userlevelpermissions`", TRUE);
define("EW_USER_LEVEL_PRIV_TABLE_NAME_FIELD", "`UserLevelTableName`", TRUE);
define("EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD", "`UserLevelID`", TRUE);
define("EW_USER_LEVEL_PRIV_PRIV_FIELD", "`UserLevelPermission`", TRUE);

// User level constants
define("EW_USER_LEVEL_COMPAT", TRUE, TRUE); // Use old User Level values. Comment out to use new User Level values (separate values for View/Search)
define("EW_ALLOW_ADD", 1, TRUE); // Add
define("EW_ALLOW_DELETE", 2, TRUE); // Delete
define("EW_ALLOW_EDIT", 4, TRUE); // Edit
define("EW_ALLOW_ACTIVE", 8, TRUE); // Active
define("EW_ALLOW_LIST", 16, TRUE); // List
if (defined("EW_USER_LEVEL_COMPAT")) {
        define("EW_ALLOW_VIEW", 16, TRUE); // View
        define("EW_ALLOW_SEARCH", 16, TRUE); // Search
} else {
        define("EW_ALLOW_VIEW", 32, TRUE); // View
        define("EW_ALLOW_SEARCH", 64, TRUE); // Search
}
define("EW_ALLOW_REPORT", 8, TRUE); // Report
define("EW_ALLOW_ADMIN", 16, TRUE); // Admin

// Hierarchical User ID
define("EW_USER_ID_IS_HIERARCHICAL", TRUE, TRUE); // Change to FALSE to show 1 level

// Email
define("EW_EMAIL_COMPONENT", strtoupper("PHPMailer"), TRUE);
define("EW_SMTP_SERVER", "smtp.gmail.com", TRUE); // SMTP server
define("EW_SMTP_SERVER_PORT", 465, TRUE); // SMTP server port
define("EW_SMTP_SERVER_USERNAME", "doanquanghungitcvielina@gmail.com", TRUE); // SMTP server user name
define("EW_SMTP_SERVER_PASSWORD", "25091983", TRUE); // SMTP server password
define("EW_SENDER_EMAIL", "doanquanghungitcvielina@gmail.com", TRUE); // Sender email address
define("EW_RECIPIENT_EMAIL", "doanquanghungitcvielina@gmail.com", TRUE); // Recipient email address


// File upload
define("EW_UPLOAD_DEST_PATH", "../upload/", TRUE); // Upload destination path (relative to app root)
define("EW_UPLOAD_ALLOWED_FILE_EXT", "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip,swf", TRUE); // Allowed file extensions
define("EW_IMAGE_ALLOWED_FILE_EXT", "gif,jpg,png,bmp", TRUE); // Allowed file extensions for images
define("EW_MAX_FILE_SIZE", 700000, TRUE); // Max file size
define("EW_THUMBNAIL_FILE_PREFIX", "tn_", TRUE); // Thumbnail file prefix
define("EW_THUMBNAIL_FILE_SUFFIX", "", TRUE); // Thumbnail file suffix
define("EW_THUMBNAIL_DEFAULT_WIDTH", 0, TRUE); // Thumbnail default width
define("EW_THUMBNAIL_DEFAULT_HEIGHT", 0, TRUE); // Thumbnail default height
define("EW_THUMBNAIL_DEFAULT_QUALITY", 75, TRUE); // Thumbnail default qualtity (JPEG)
define("EW_UPLOADED_FILE_MODE", 0666, TRUE); // Uploaded file mode
define("EW_UPLOAD_TMP_PATH", "", TRUE); // User upload temp path (relative to app root) e.g. "tmp/"

// Audit Trail
define("EW_AUDIT_TRAIL_PATH", "", TRUE); // Audit trail path (relative to app root)

// Export records
define("EW_EXPORT_ALL", TRUE, TRUE); // Export all records
define("EW_XML_ENCODING", "utf-8", TRUE); // Encoding for Export to XML

// Export original value
define("EW_EXPORT_ORIGINAL_VALUE", FALSE, TRUE);

// Use token in URL (reserved, not used, do NOT change!)
define("EW_USE_TOKEN_IN_URL", FALSE, TRUE);

/**
 * Search multi value option
 * 1 - no multi value
 * 2 - AND all multi values
 * 3 - OR all multi values
*/
define("EW_SEARCH_MULTI_VALUE_OPTION", 3, TRUE);

// Validate option
define("EW_CLIENT_VALIDATE", True, TRUE);
define("EW_SERVER_VALIDATE", True, TRUE);

// Checkbox and radio button groups
define("EW_ITEM_TEMPLATE_CLASSNAME", "ewTemplate", TRUE);
define("EW_ITEM_TABLE_CLASSNAME", "ewItemTable", TRUE);

// Remove XSS
define("EW_REMOVE_XSS", TRUE, TRUE);

// Lookup
define("EW_RECORD_DELIMITER", "\r", TRUE);
define("EW_FIELD_DELIMITER", "|", TRUE);

/**
 * Numeric and monetary formatting options
 * Set EW_USE_DEFAULT_LOCALE to TRUE to override localeconv and use the
 * following constants for ew_FormatCurrency/Number/Percent functions
 * Also read http://www.php.net/localeconv for description of the constants
*/
define("EW_USE_DEFAULT_LOCALE", FALSE, TRUE);
define("DEFAULT_DECIMAL_POINT", ".", TRUE);
define("DEFAULT_THOUSANDS_SEP", ",", TRUE);
define("DEFAULT_CURRENCY_SYMBOL", "$", TRUE);
define("DEFAULT_MON_DECIMAL_POINT", ".", TRUE);
define("DEFAULT_MON_THOUSANDS_SEP", ",", TRUE);
define("DEFAULT_POSITIVE_SIGN", "", TRUE);
define("DEFAULT_NEGATIVE_SIGN", "-", TRUE);
define("DEFAULT_FRAC_DIGITS", 2, TRUE);
define("DEFAULT_P_CS_PRECEDES", TRUE, TRUE);
define("DEFAULT_P_SEP_BY_SPACE", FALSE, TRUE);
define("DEFAULT_N_CS_PRECEDES", TRUE, TRUE);
define("DEFAULT_N_SEP_BY_SPACE", FALSE, TRUE);
define("DEFAULT_P_SIGN_POSN", 3, TRUE);
define("DEFAULT_N_SIGN_POSN", 3, TRUE);

/**
 * Time zone (Note: Requires PHP 5 >= 5.1.0)
 * Read http://www.php.net/date_default_timezone_set for details
 * and http://www.php.net/timezones for supported time zones
*/

//date_default_timezone_set("timezone_identifier"); // Comment out this line and change the timezone_identifier to use
  date_default_timezone_set("Asia/Jakarta"); // Note: Change the timezone_identifier here
//  PHPMaker 6 global variables
//
// Common

$Page = NULL; // Common page object
$conn = NULL;
$rs = NULL;
$rsdtl = NULL;
$Security = NULL;
$objForm = NULL;
$ListOptions = NULL;

// Used by ValidateForm/ValidateSearch
$gsFormError = "";
$gsSearchError = "";

// Used by *master.php
$gsMasterReturnUrl = "";

// Used by header.php, export checking
$gsExport = "";
$gsExportFile = "";
?>