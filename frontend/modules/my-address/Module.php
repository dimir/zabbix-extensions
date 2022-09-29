<?php

namespace Modules\MyAddress;

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
