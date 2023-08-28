# Zabbix template for BlueNet BN2000 PDU

## Enable MIB support

Follow these instructions: https://www.zabbix.com/documentation/current/en/manual/config/items/itemtypes/snmp/mibs

## Install MIBs

Copy BlueNet_BN2000.mib and SNMPv2-SMI.mib to /usr/local/share/snmp/mibs .
Restart Zabbix server.

## Add template

Open Zabbix frontend, go to "Data collection -> Templates" and import template BlueNet-BN2000-PDU.yaml .

## Link template

Open Zabbix frontend, got to "Data collection -> Hosts" and add the host for your PDU, specify SNMP interface.
Open the host properties, "Templates" tab and link template "BlueNet BN2000 PDU" to it.
