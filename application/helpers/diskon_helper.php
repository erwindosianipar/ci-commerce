<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('diskon')){

    function diskon($harga, $diskon_persen){

    	$diskon_amount = $harga * $diskon_persen * .01;
    	$harga_diskon = $harga - $diskon_amount;

    	return $harga_diskon;
    
    }
}