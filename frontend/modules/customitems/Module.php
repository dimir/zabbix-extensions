<?php

namespace Modules\CustomItems;

use Core\CModule;
use APP;
use CMenuItem;

class Module extends Cmodule
{
	public function init(): void
	{
		APP::Component()->get('menu.main')
			->add((new CMenuItem(_('Custom Items')))
			->setAction('customitems'));
	}
}
