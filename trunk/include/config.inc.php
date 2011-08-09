<?php

$db_host = 'localhost';
$db_port = '3306';
$db_user = 'cdrasterisk';
$db_pass = 'astcdr123';
$db_name = 'cdrasterisk';
$db_table_name = 'cdr';

/* Admin users. for multiple user access */
/* $admin_user_names = 'iokunev,admin2,admin3'; */
$admin_user_names = '*';

/* $db_result_limit is the 'LIMIT' appended to the query */
$db_result_limit = '100';

/* step */
$h_step = 30;

/* $system_monitor_dir is the directory where call recordings are stored */
$system_monitor_dir = '/var/spool/asterisk/monitor';

/* $system_fax_archive_dir is the directory where sent/received fax images are stored */
$system_fax_archive_dir = '/var/spool/asterisk/fax-gw/archive';

/* system tmp */
$system_tmp_dir = '/tmp';

/* audio file format */
$system_audio_format = 'wav';

/* Reverse lookup URL where "%n" is replace with the destination number */
/* $rev_lookup_url = 'http://www.whitepages.com/search/ReversePhone?full_phone=%n'; */
/* $rev_lookup_url = 'http://mrnumber.com/%n'; */
$rev_lookup_url = '';

/* User name */
$cdr_user_name = getenv('REMOTE_USER');

if ( strlen($cdr_user_name) > 0 ) {
	$is_admin = strpos(",$admin_user_names,", ",$cdr_user_name,");
	if ( $admin_user_names == '*' ) {
		$cdr_user_name = '';
	} elseif ( isset($_GET['action']) && $_GET['action'] == 'logout' ) {
		header('Status: 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Asterisk-CDR-Stat"');
		exit;
	} elseif ( $is_admin !== false ) {
		$cdr_user_name = '';
	}
}

?>
