<?php

$widget = (new CWidget())
	->setTitle(_('Custom items'));

$table = (new CTable)->addClass(ZBX_STYLE_LIST_TABLE);

if (array_key_exists('columns', $data) && array_key_exists('items', $data)) {
    $table->setHeader($data['columns']);
    
    foreach ($data['items'] as $item) {
        $row = [];
    
        foreach ($data['columns'] as $column) {
            $row[] = $item[$column];
        }
    
        $table->addRow($row);
    }
}

$filter = (new CFilter())
    ->setResetUrl(new CUrl())
    ->setActiveTab(1)
    ->addFilterTab(_('Filter'), [
        (new CFormList())
            ->setId('customitems')
            ->addVar('action', 'customitems')
            ->addRow(
                (new CLabel(_('Hosts'))),
                (new CMultiSelect([
                    'name'        => 'hostids[]',
                    'object_name' => 'hosts',
                    'multiple'    => true,
                    'data'        => $data['hosts_for_multiselect']??[],
                    'popup'       => [
                        'parameters' => [
                            'srctbl'     => 'hosts',
                            'srcfld1'    => 'hostid',
                            'dstfrm'     => 'customitems',
                            'dstfld1'    => 'hostids_',
                            'real_hosts' => 1
                        ]
                    ]
                ]))->setWidth(ZBX_TEXTAREA_MEDIUM_WIDTH)
            )
    ]);

$widget
    ->addItem($filter)
    ->addItem($data['errors_block'])
    ->addItem($table)
    ->show();
