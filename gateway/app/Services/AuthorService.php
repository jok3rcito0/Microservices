<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
	use ConsumesExternalService;
	/**
	 * The base uri to use to consum the authors service
	 * @var string
	 */
	public $baseUri;

	function __construct()
	{
		$this->baseUri = config('services.authors.base_uri');
	}
}