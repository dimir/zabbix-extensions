<?php

namespace Modules\MyAddress\Actions;

use CControllerResponseData;
use CController;

class MyAddress extends CController
{
	public function init(): void
	{
		$this->disableSIDvalidation();
	}

	protected function checkInput(): bool
	{
		return true;
	}

	protected function checkPermissions(): bool
	{
		return true;
	}

	protected function doAction(): void
	{
		$data = ['my-ip' => file_get_contents("https://api.ipify.org")];

		$response = new CControllerResponseData($data);
		$this->setResponse($response);
	}
}
