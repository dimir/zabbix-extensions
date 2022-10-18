main: clean
	go mod init myip
	GOPROXY=direct go mod tidy
	go build

.PHONY: install
install: main
	install -d /usr/local/zabbix/go/plugins
	install myip /usr/local/zabbix/go/plugins
	install --mode=0644 myip.conf /etc/zabbix/zabbix_agent2.d/plugins.d

clean:
	rm -f myip *.mod *.sum
