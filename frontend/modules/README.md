# ["My Address"](./my-address/)

This module demonstrates how to add a new menu element that will display a custom web page.

# ["Custom Items"](./customitems/)

This module demonstrates how to fetch items of a specified host from Zabbix and display them on a custom web page.

# Zabbix PHP classes documentation

If you want to use Zabbix PHP classes in your module you can generate phpDoc documentation
and get at least some indexed view of those classes and their methods. Keep in mind that
this is work in progress and not everything is described. Here's a way to do that using
Docker container:

    cd /usr/share/zabbix/include/classes/html
    docker run --rm -v ${PWD}:/data phpdoc/phpdoc:3
    mv .phpdoc /var/www/html/phpdoc

and open your browser pointing it to that directory.
