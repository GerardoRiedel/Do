<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_group = 'capacitacion';
$active_group = 'oc';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'cetepcl_do';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['capacitacion']['hostname'] = 'localhost';
$db['capacitacion']['username'] = 'root';
$db['capacitacion']['password'] = '';
$db['capacitacion']['database'] = 'cetepcl_capacitacion';
$db['capacitacion']['dbdriver'] = 'mysql';
$db['capacitacion']['dbprefix'] = '';
$db['capacitacion']['pconnect'] = TRUE;
$db['capacitacion']['db_debug'] = TRUE;
$db['capacitacion']['cache_on'] = FALSE;
$db['capacitacion']['cachedir'] = '';
$db['capacitacion']['char_set'] = 'utf8';
$db['capacitacion']['dbcollat'] = 'utf8_general_ci';
$db['capacitacion']['swap_pre'] = '';
$db['capacitacion']['autoinit'] = TRUE;
$db['capacitacion']['stricton'] = FALSE;

$db['oc']['hostname'] = 'localhost';
$db['oc']['username'] = 'root';
$db['oc']['password'] = '';
$db['oc']['database'] = 'cetepcl_ordencompra';
$db['oc']['dbdriver'] = 'mysql';
$db['oc']['dbprefix'] = '';
$db['oc']['pconnect'] = TRUE;
$db['oc']['db_debug'] = TRUE;
$db['oc']['cache_on'] = FALSE;
$db['oc']['cachedir'] = '';
$db['oc']['char_set'] = 'utf8';
$db['oc']['dbcollat'] = 'utf8_general_ci';
$db['oc']['swap_pre'] = '';
$db['oc']['autoinit'] = TRUE;
$db['oc']['stricton'] = FALSE;



/* End of file database.php */
/* Location: ./application/config/database.php */