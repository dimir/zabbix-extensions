# Zabbix template for BlueNet BN2000 PDU

## Enable MIB support

    follow these instructions: https://www.zabbix.com/documentation/current/en/manual/config/items/itemtypes/snmp/mibs

## Install MIBs

    copy BlueNet_BN2000.mib and SNMPv2-SMI.mib to /usr/local/share/snmp/mibs
    restart Zabbix server

## Add template

    open Zabbix frontend, go to "Data collection -> Templates" and import template BlueNet-BN2000-PDU.yaml

## Link template

    open Zabbix frontend, got to "Data collection -> Hosts" and add the host for your PDU, add SNMP interface
    open the host properties, "Templates" tab and link template "BlueNet BN2000 PDU" to it

## Optionally review macros

    optionally review template macros {$CHANNEL.UPDATE.INTERVAL} and {$CHANNEL.GROUP.UPDATE.INTERVAL}
