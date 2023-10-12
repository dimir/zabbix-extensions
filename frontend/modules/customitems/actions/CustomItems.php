<?php

namespace Modules\CustomItems\Actions;

use API;
use CUrl;
use CArrayHelper;
use CPagerHelper;
use CControllerResponseData;

class CustomItems extends Base
{
	public function disableSIDvalidation()
	{
		if (version_compare(ZABBIX_VERSION, '6.4.0', '<'))
		{
			return parent::disableSIDvalidation();
		}

		return parent::disableCsrfValidation();
	}

    public function init() {
        $this->disableSIDvalidation();
    }

    protected function checkPermissions() {
        return true;
    }

    protected function checkInput() {
        $fields = [
            'hostids'    => 'array_id',
            'filter_rst' => 'in 0,1'
        ];

        $ret = $this->validateInput($fields);

        if (!$ret) {
            $this->setResponse(new CControllerResponseData(['errors_block' => getMessages()]));
        }

        return $ret;
    }

    public function doAction() {
        $data = [
            'columns'                    => ['itemid', 'name', 'type'],
            'hostids'                    => null,
            'hosts_for_multiselect'      => [],
            'errors_block'               => null
        ];
        $this->getInputs($data, array_keys($data));

        if ($this->hasInput('filter_rst')) {
            $data['hostids'] = null;
        }
        else if (is_array($data['hostids'])) {
			$params = [
                'output'        => ['name', 'hostid'],
                'hostids'       => array_unique($data['hostids']),
                'preservekeys'  => true,
			];

            $data['hosts_for_multiselect'] = CArrayHelper::renameObjectsKeys(API::Host()->get($params), ['hostid' => 'id']);
        }

		$params = [
			'output'  => $data['columns'],
			'hostids' => $data['hostids'],
			'limit'   => $this->searchLimit(),
		];

        $data['items'] = API::Item()->get($params);

        $response = new CControllerResponseData($data);

		$response->setTitle('HTML title: Custom Items');

        $this->setResponse($response);
    }
}
