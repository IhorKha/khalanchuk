<?php 
require 'rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=id4904755_khalanchuk','id4904755_admin', '123456' );
if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}
session_start();