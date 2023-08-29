# Zabbix template for BlueNet BN2000 PDU

## Enable support for custom MIB files

Follow [these instructions](https://www.zabbix.com/documentation/current/en/manual/config/items/itemtypes/snmp/mibs).

## Install MIB files

    cp BlueNet_BN2000.mib SNMPv2-SMI.mib /usr/local/share/snmp/mibs
	systemctl restart zabbix-server

## Import template

Open Zabbix frontend, go to `Data collection -> Templates` and import template file `BlueNet-BN2000-PDU.yaml`.

## Link template

1. Open Zabbix frontend, got to `Data collection -> Hosts` and create the host for your PDU, add SNMP interface.
2. Click on the host, in the `Templates` section click `Select` and find template `BlueNet BN2000 PDU`. Click `Update`.

## Optionally review macros

Optionally review template macros `{$CHANNEL.UPDATE.INTERVAL}` and `{$CHANNEL.GROUP.UPDATE.INTERVAL}`.
