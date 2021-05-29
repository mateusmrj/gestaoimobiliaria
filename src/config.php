<?php

/** O nome do banco de dados*/
define('DB_NAME', 'vista');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'vista');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '123');

/** nome do host do MySQL */
define('DB_HOST', 'db-vista');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/');
	

/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'bd/database.php');

/** caminhos dos templates de header, footer, modal **/
define('HEADER_TEMPLATE', ABSPATH . 'layout/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'layout/footer.php');
define('MODAL_TEMPLATE', ABSPATH . 'layout/modal.php');
define('MODALPG_TEMPLATE', ABSPATH . 'layout/modalpg.php');