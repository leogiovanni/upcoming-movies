<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;

class MovieController extends Controller
{

	private $token    = '1f54bd990f1cdfb230adb312546d765d';
	private $lang     = 'en-US';
	private $main_url = 'https://api.themoviedb.org/3/';

    public function get_movies_api($page)
	{
		$params = [
			'api_key'  => $this->token,
			'language' => $this->lang,
			'page'     => $page
		];

		$url = 'movie/upcoming';
		
		return $this->request('get', $url, $params);		
	}

	private function request($type, $url, $params){

		try{
			$client = new Client();
			$res = $client->request($type, $this->main_url.$url, [
			    'query' => $params
			]);

			return $res;				
		}	    
		catch(GuzzleException $ex){
			throw new Exception($ex);
		}		
	}
}
