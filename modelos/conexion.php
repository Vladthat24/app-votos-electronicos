<?php

class Conexion
{

	static public function conectar()
	{

/* 		$link = new PDO(
			"mysql:host=localhost;dbname=dirislim_soporte",
			"dirislim_7rhm9W9W",
			"VEDADWddlTECaEXj"
		);
		$link->exec("set names utf8"); */

		$link = new PDO(
			"mysql:host=localhost;dbname=dirislim_votoonline",
			"root",
			"");
		$link->exec("set names utf8");

		return $link;
	}
}
