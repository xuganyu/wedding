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



/*

//获取域名的中间部分当做是数据库

$S = site_url();

$S = parse_url($S);

$S = strtolower($S['host']) ; //取域名部分

//echo $S;

$domain = array('com','cn','name','org','net'); //域名后缀 有新的就扩展这吧

$SS = $S;

$dd = implode('',$domain);

$SS = preg_replace('/(\.('.$dd.'))*\.('.$dd.')$/iU','',$SS); //把后面的域名后缀部分去掉

 

$SS = explode('.',$SS);

//echo $SS[1];

*/



//地址   bds114572146.my3w.com

//库名   bds114572146_db



//密码   bds114572146



$active_group = 'default';

$active_record = TRUE;



$db['default']['hostname'] = '127.0.0.1:3306';

$db['default']['username'] = 'root';

$db['default']['password'] = 'root';

$db['default']['database'] = 'wedding';                     

$db['default']['dbdriver'] = 'mysql';                   //数据库类型

$db['default']['dbprefix'] = '';                        //表前缀，如果数据表有前缀的话，就要加上，否则为空

$db['default']['pconnect'] = TRUE;

$db['default']['db_debug'] = TRUE;                      //改成 FALSE  就可以屏蔽掉报错

$db['default']['cache_on'] = FALSE;

$db['default']['cachedir'] = '';

$db['default']['char_set'] = 'utf8';

$db['default']['dbcollat'] = 'utf8_general_ci';

$db['default']['swap_pre'] = '';

$db['default']['autoinit'] = TRUE;

$db['default']['stricton'] = FALSE;





/* End of file database.php */

/* Location: ./application/config/database.php */

