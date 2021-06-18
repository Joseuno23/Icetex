<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

defined('TITLE_')  OR define('TITLE_', "Nexus");
defined('URL_PROJETC')  OR define('URL_PROJETC', "http://localhost/Nexus/");


defined('SO_SERVER')       OR define('SO_SERVER', "windows");
defined('LOCALE')       OR define('LOCALE', "es_CO.utf8");

defined('KEY_ENCRYP')       OR define('KEY_ENCRYP', "fd0200488992dc70cf2365a24c0c74031f51e48a");
defined('METHOD_ENCRYP')       OR define('METHOD_ENCRYP', "aes-192-cbc");

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//sweetalert
defined('SWEETALERT_JS')    OR define('SWEETALERT_JS','plugins/sweetalert/sweetalert2.min.js');
defined('SWEETALERT_CSS')      OR define('SWEETALERT_CSS','plugins/sweetalert/sweetalert2.min.css');

//datatable
defined('DATATABLES_CSS')      OR define('DATATABLES_CSS', 'plugins/datatable/dataTables.bootstrap4.min.css'); 
defined('DATATABLES_CSS_B')      OR define('DATATABLES_CSS_B', 'plugins/datatable/responsivebootstrap4.min.css'); 
//defined('DATATABLES_JS')      OR define('DATATABLES_JS', 'plugins/datatable/jquery.dataTables.min.js'); 
//defined('DATATABLES_JS_B')      OR define('DATATABLES_JS_B', 'plugins/datatables/dataTables.bootstrap.min.js');
$array = serialize(
        array(
            "plugins/datatable/jquery.dataTables.min.js",
            "plugins/datatable/dataTables.bootstrap4.min.js",
            "plugins/datatable/datatable.js",
            "plugins/datatable/dataTables.responsive.min.js"
            )
        );
defined('DATATABLE_JS')    OR define('DATATABLE_JS',$array);
//defined('BTN_DATATABLE_CSS')    OR define('BTN_DATATABLE_CSS','plugins/datatables/buttons.dataTables.min.css');

//ALERTIFY

defined('ALERTIFY_CSS')    OR define('ALERTIFY_CSS','plugins/alertifyjs/css/alertify.min.css');
defined('ALERTIFY_CSS2')    OR define('ALERTIFY_CSS2','plugins/alertifyjs/css/themes/bootstrap.min.css');
defined('ALERTIFY_JS')     OR define('ALERTIFY_JS','plugins/alertifyjs/alertify.js');

//SELECT2
defined('SELECT2_JS')    OR define('SELECT2_JS','plugins/select2/select2.full.min.js');
defined('SELECT2_CSS')      OR define('SELECT2_CSS','plugins/select2/select2.min.css');

//TABS
defined('TABS_CSS')      OR define('TABS_CSS','css/tabs.css');

//iCheck
defined('ICHECK_CSS_RED')    OR define('ICHECK_CSS_RED', 'plugins/iCheck/minimal/red.css');
defined('ICHECK_CSS_FLAT')    OR define('ICHECK_CSS_FLAT', 'plugins/iCheck/flat/_all.css');
defined('ICHECK_CSS_BLUE')    OR define('ICHECK_CSS_BLUE', 'plugins/iCheck/minimal/blue.css');
defined('ICHECK_JS')      OR define('ICHECK_JS','plugins/iCheck/icheck.min.js');

//Form-wizard
defined('WIZARD_JS')    OR define('WIZARD_JS', 'plugins/formwizard/jquery.smartWizard.js');
defined('WIZARD_CSS')    OR define('WIZARD_CSS', 'plugins/formwizard/smart_wizard.css');
defined('WIZARD_CSS_B')    OR define('WIZARD_CSS_B', 'plugins/formwizard/smart_wizard_theme_dots.css');


defined('MOMENT_JS')    OR define('MOMENT_JS', 'plugins/moment/moment.min.js');

defined('RANGO_PICKER_CSS')    OR define('RANGO_PICKER_CSS', 'plugins/bootstrap-daterangepicker/daterangepicker.css');
defined('RANGO_PICKER_JS')    OR define('RANGO_PICKER_JS', 'plugins/bootstrap-daterangepicker/daterangepicker.js');

