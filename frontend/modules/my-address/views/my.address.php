<?php

(new CWidget())
    ->setTitle(_('Zabbix page name: My Address'))
    ->addItem(new CDiv($data['my-ip-data']))
    ->show();
