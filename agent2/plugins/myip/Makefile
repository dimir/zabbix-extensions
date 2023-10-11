main: clean
	go mod init myip
	GOPROXY=direct go get git.zabbix.com/ap/plugin-support@release/6.4
	go mod tidy
	go build

.PHONY: install
install: main
	install -d /usr/local/zabbix/go/plugins
	install myip /usr/local/zabbix/go/plugins
	install --mode=0644 myip.conf /etc/zabbix/zabbix_agent2.d/plugins.d

clean:
	rm -f myip *.mod *.sum
