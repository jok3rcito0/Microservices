<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
	/**
	 * Send a request to any service
	 * @return string
	 */
	public function perfomrRequest($method, $url, $params = [], $headers = [])
	{
		$client = new Client([
			'base_uri' => $this->base_uri,
		]);

		$response = $client->request($method, $url, ['params' => $params, 'headers' => $headers]);

		return $response->getBody()->getContents();
	}
}