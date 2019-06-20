<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
	/**
	 * Send a request to any service
	 * @return string
	 */
	public function performRequest($method, $url, $params = [], $headers = [])
	{
		$client = new Client([
			'base_uri' => $this->base_uri,
		]);

		if(isset($this->secret)){
			$headers['Authorization'] = $this->secret;
		}

		$response = $client->request($method, $url, ['form_params' => $params, 'headers' => $headers]);

		return $response->getBody()->getContents();
	}
}