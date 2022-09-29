<?php

# removes the "support" and "integration" menu elements
# return [];

# in addition rebrands 5 elements
$BASE_URL='https://github.com/dimir/zabbix-extensions/blob/main/frontend/rebranding/images';
return [
	'BRAND_LOGO'                 => $BASE_URL . '/lorem-ipsum.png?raw=true',
	'BRAND_LOGO_SIDEBAR'         => $BASE_URL . '/lorem.png?raw=true',
	'BRAND_LOGO_SIDEBAR_COMPACT' => $BASE_URL . '/l.png?raw=true',
	'BRAND_FOOTER'               => '(c) Lorem Ipsum',
	'BRAND_HELP_URL'             => 'https://www.example.com/help/'
];
