<?php 

	/***********************************************
    Changing Characters in URL
  ************************************************/
	function urlchange($string)
	{
		$Search = [' ','&','='];											
		
		$Replace = ['--','X','~'];

		return str_replace($Search,$Replace,$string);
	}

	/***********************************************
    Changing Characters in URL
  ************************************************/
	function urlunchange($string)
	{
		$Search = ['--','X','~'];											
		
		$Replace = [' ','&','='];

		return str_replace($Search,$Replace,$string);
	}

?>