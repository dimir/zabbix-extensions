# Myip plugin for Zabbix agent 2

This is the source code of loadable Zabbix agent 2 plugin Myip. It implements 1 metric
called `myip`, which returns the external IP address of the host where the agent is
running. In order to build the plugin you need to be connected to the Internet.

1. Make sure `golang` and `make` packages are installed:

       apt install golang make

1. Build the plugin:

       sudo make install

1. Test it:

       zabbix_agent2 -t myip

If you face any errors first make sure user `zabbix` has permissions
to access `/usr/local/zabbix/go/plugins/myip` directory.
