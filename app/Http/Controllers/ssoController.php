<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ssoController extends Controller {
	public function login(Request $req)
	{
		$client = new Client();
		$request = $client->createRequest('POST', 'http://dukcapil.pplbandung.biz.tm/oauth/access_token');
		$postBody = $request->getBody();
		// $postBody is an instance of GuzzleHttp\Post\PostBodyInterface
		$postBody->setField('grant_type', 'authorization_code');
		$postBody->setField('client_id', '5SLTJ3QStpkyeBcG');
		$postBody->setField('client_secret', 'xboB3LJRnLlrBNbU');
		$postBody->setField('redirect_uri', 'http://localhost/PerizinanTerpadu/public/loginsso');
		$postBody->setField('code', $req->get('code'));

		// {"foo": "bar"}

		// Send the POST request
		$response = $client->send($request);
		$body = json_decode($response->getBody());
		$accessToken = $body->access_token;

		$client = new Client();
		$response = $client->get('http://dukcapil.pplbandung.biz.tm/api/penduduk/',['headers'=>['Authorization'=>'Bearer '.$accessToken]]);
		$data = $response->getBody();
		$json = json_decode($data);
		return dd($json);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
