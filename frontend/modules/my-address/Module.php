<?php

namespace Modules\MyAddress;

if (version_compare(ZABBIX_VERSION, '6.4.0', '>') && !class_exists('\Core\CModule'))
{
	class_alias('\Zabbix\Core\CModule', '\Core\CModule');
	class_alias('\CHtmlPage', '\CWidget');
}

use Core\CModule;
use APP;
use CMenuItem;

class Module extends Cmodule
{
	public function init(): void
	{
		APP::Component()->get('menu.main')
			->add((new CMenuItem(_('My Address')))
			->setAction('my.address'));
	}
}
