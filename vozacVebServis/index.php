<?php
require 'flight/Flight.php';
require 'jsonindent.php';
//registracija baze Database
Flight::register('db', 'Database', array('sluzba'));

Flight::route('/', function(){
	die("Izabereti neku od ruta...");
});

Flight::route('GET /kandidati', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiKandidate();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		array_push($niz,$red);
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /rokovi', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiRokove();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		array_push($niz,$red);
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /predmeti', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiPredmete();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		array_push($niz,$red);
	}

	echo indent(json_encode($niz));
});


Flight::route('POST /unesiPredmet', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci = file_get_contents('php://input');
	$niz = json_decode($podaci,true);
	$db->unesiNoviPredmet($niz);
	if($db->getResult())
	{
		$odgovorServera = "Uspesno";
	}
	else
	{
		$odgovorServera = "Greska";

	}

	echo indent(json_encode($odgovorServera));

});


Flight::start();
?>
