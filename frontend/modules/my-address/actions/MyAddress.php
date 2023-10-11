<?php

namespace Modules\MyAddress\Actions;

if (version_compare(ZABBIX_VERSION, '6.4.0', '>'))
{
	class_alias('\Zabbix\Core\CModule', '\Core\CModule');
	class_alias('\CHtmlPage', '\CWidget');
}

use CControllerResponseData;
use CController;

class MyAddress extends CController
{
	public function disableSIDvalidation()
	{
		if (version_compare(ZABBIX_VERSION, '6.4.0', '<'))
		{
			return parent::disableSIDvalidation();
		}

		return parent::disableCsrfValidation();
	}

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

		$response->setTitle('My Address');

		$this->setResponse($response);
	}
}
