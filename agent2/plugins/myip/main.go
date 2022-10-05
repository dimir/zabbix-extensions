// This is the source code of loadable plugin Myip. It implements 1 metric
// called myip, which returns the external IP address of the host where
// the agent is running.

package main

// Packages we will use. The "plugin-support" ones is a must.
import (
	"fmt"
	"io/ioutil"
	"net/http"
	"git.zabbix.com/ap/plugin-support/plugin/container"
	"git.zabbix.com/ap/plugin-support/plugin"
)

// Plugin must define structure and embed plugin.Base structure.
type Plugin struct {
	plugin.Base
}

// Plugin must implement one or several plugin interfaces. Exporter
// is the simplest interface that performs a poll and returns a value.
// This is the implementation of our custom metric "myip".
func (p *Plugin) Export(key string, params []string, ctx plugin.ContextProvider) (result interface{}, err error) {
	// Use one of Critf, Errf, Infof, Warningf, Debugf, Tracef logging
	// functions available to plugins in case you need it. These log
	// messages will appear in the same place where the agent is logging.
	//p.Infof("received request to handle %s key with %d parameters", key, len(params))

	// Fetch response from the specified URL, the response body is just an IP address.
	resp, err := http.Get("https://api.ipify.org")

	if err != nil {
		panic(err)
	}

	defer resp.Body.Close()

	body, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		panic(err)
	}

	return string(body), nil
}

// Define a plugin object.
var impl Plugin

func init() {
	// Register our metric, specifying the plugin and metric details.
	// 1 - a pointer to plugin implementation
	// 2 - plugin name
	// 3 - metric name (item key)
	// 4 - metric description
	//
	// NB! The metric description must end with period, otherwise the agent won't start!
	plugin.RegisterMetrics(&impl, "Myip", "myip", "Return the external IP address of the host where agent is running.")
}

// This is the main function. The only important thing here is an impl variable that was defined above.
func main() {
	h, err := container.NewHandler(impl.Name())
	if err != nil {
		panic(fmt.Sprintf("failed to create plugin handler %s", err.Error()))
	}
	impl.Logger = &h

	err = h.Execute()
	if err != nil {
		panic(fmt.Sprintf("failed to execute plugin handler %s", err.Error()))
	}
}
