<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, you can also view it online at
 * https://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  the authors
 * @author     Froxlor team <team@froxlor.org>
 * @license    https://files.froxlor.org/misc/COPYING.txt GPLv2
 */

use Froxlor\Settings;

return [
	'customer' => [
		'email' => [
			'url' => 'customer_email.php',
			'label' => lng('menue.email.email'),
			'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'email')),
			'icon' => 'fa-solid fa-envelope',
			'elements' => [
				[
					'url' => 'customer_email.php?page=emails',
					'label' => lng('menue.email.emails'),
					'required_resources' => 'emails'
				],
				[
					'url' => 'customer_email.php?page=emails&action=add',
					'label' => lng('emails.emails_add'),
					'required_resources' => 'emails'
				],
				[
					'url' => Settings::Get('panel.webmail_url'),
					'new_window' => true,
					'label' => lng('menue.email.webmail'),
					'required_resources' => 'emails_used',
					'show_element' => (Settings::Get('panel.webmail_url') != '')
				]
			]
		],
		'mysql' => [
			'url' => 'customer_mysql.php',
			'label' => lng('menue.mysql.mysql'),
			'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'mysql')),
			'icon' => 'fa-solid fa-database',
			'elements' => [
				[
					'url' => 'customer_mysql.php?page=mysqls',
					'label' => lng('menue.mysql.databases'),
					'required_resources' => 'mysqls'
				],
				[
					'url' => Settings::Get('panel.phpmyadmin_url'),
					'new_window' => true,
					'label' => lng('menue.mysql.phpmyadmin'),
					'required_resources' => 'mysqls_used',
					'show_element' => (Settings::Get('panel.phpmyadmin_url') != '')
				]
			]
		],
		'domains' => [
			'url' => 'customer_domains.php',
			'label' => lng('menue.domains.domains'),
			'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'domains')),
			'icon' => 'fa-solid fa-globe',
			'elements' => [
				[
					'url' => 'customer_domains.php?page=domains',
					'label' => lng('menue.domains.settings')
				],
				[
					'url' => 'customer_domains.php?page=sslcertificates',
					'label' => lng('domains.ssl_certificates')
				]
			]
		],
		'ftp' => [
			'url' => 'customer_ftp.php',
			'label' => lng('menue.ftp.ftp'),
			'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'ftp')),
			'icon' => 'fa-solid fa-users',
			'elements' => [
				[
					'url' => 'customer_ftp.php?page=accounts',
					'label' => lng('menue.ftp.accounts')
				],
				[
					'url' => Settings::Get('panel.webftp_url'),
					'new_window' => true,
					'label' => lng('menue.ftp.webftp'),
					'show_element' => (Settings::Get('panel.webftp_url') != '')
				]
			]
		],
		'extras' => [
			'url' => 'customer_extras.php',
			'label' => lng('menue.extras.extras'),
			'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'extras')),
			'icon' => 'fa-solid fa-wrench',
			'elements' => [
				[
					'url' => 'customer_extras.php?page=htpasswds',
					'label' => lng('menue.extras.directoryprotection'),
					'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'extras.directoryprotection'))
				],
				[
					'url' => 'customer_extras.php?page=htaccess',
					'label' => lng('menue.extras.pathoptions'),
					'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'extras.pathoptions'))
				],
				[
					'url' => 'customer_logger.php?page=log',
					'label' => lng('menue.logger.logger'),
					'show_element' => (Settings::Get('logger.enabled') == true) && (!Settings::IsInList('panel.customer_hide_options', 'extras.logger'))
				],
				[
					'url' => 'customer_extras.php?page=backup',
					'label' => lng('menue.extras.backup'),
					'show_element' => (Settings::Get('system.backupenabled') == true) && (!Settings::IsInList('panel.customer_hide_options', 'extras.backup'))
				]
			]
		],
		'traffic' => [
			'url' => 'customer_traffic.php',
			'label' => lng('menue.traffic.traffic'),
			'show_element' => (!Settings::IsInList('panel.customer_hide_options', 'traffic')),
			'icon' => 'fa-solid fa-area-chart',
			'elements' => [
				[
					'url' => 'customer_traffic.php?page=current',
					'label' => lng('menue.traffic.current')
				],
				[
					'url' => 'customer_traffic.php',
					'label' => lng('menue.traffic.overview')
				]
			]
		]
	],
	'admin' => [
		'resources' => [
			'label' => lng('admin.resources'),
			'required_resources' => 'customers',
			'icon' => 'fa-solid fa-box',
			'elements' => [
				[
					'url' => 'admin_customers.php?page=customers',
					'label' => lng('admin.customers'),
					'required_resources' => 'customers'
				],
				[
					'url' => 'admin_admins.php?page=admins',
					'label' => lng('admin.admins'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_domains.php?page=domains',
					'label' => lng('admin.domains'),
					'required_resources' => 'domains'
				],
				[
					'url' => 'admin_domains.php?page=sslcertificates',
					'label' => lng('domains.ssl_certificates'),
					'required_resources' => 'domains'
				],
				[
					'url' => 'admin_ipsandports.php?page=ipsandports',
					'label' => lng('admin.ipsandports.ipsandports'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_mysqlserver.php?page=mysqlserver',
					'label' => lng('admin.mysqlserver.mysqlserver'),
				],
				[
					'url' => 'admin_plans.php?page=overview',
					'label' => lng('admin.plans.plans'),
					'required_resources' => 'customers'
				],
				[
					'url' => 'admin_settings.php?page=updatecounters',
					'label' => lng('admin.updatecounters'),
					'required_resources' => 'change_serversettings'
				]
			]
		],
		'traffic' => [
			'label' => lng('admin.traffic'),
			'required_resources' => 'customers',
			'icon' => 'fa-solid fa-area-chart',
			'elements' => [
				[
					'url' => 'admin_traffic.php?page=customers',
					'label' => lng('admin.customertraffic'),
					'required_resources' => 'customers'
				]
			]
		],
		'server' => [
			'label' => lng('admin.server'),
			'required_resources' => 'change_serversettings',
			'icon' => 'fa-solid fa-server',
			'elements' => [
				[
					'url' => 'admin_configfiles.php?page=configfiles',
					'label' => lng('admin.configfiles.serverconfiguration'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_settings.php?page=overview',
					'label' => lng('admin.serversettings'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_cronjobs.php?page=overview',
					'label' => lng('admin.cron.cronsettings'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_logger.php?page=log',
					'label' => lng('menue.logger.logger'),
					'required_resources' => 'change_serversettings',
					'show_element' => (Settings::Get('logger.enabled') == true)
				],
				[
					'url' => 'admin_settings.php?page=rebuildconfigs',
					'label' => lng('admin.rebuildconf'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_autoupdate.php?page=overview',
					'label' => lng('admin.autoupdate'),
					'required_resources' => 'change_serversettings',
					'show_element' => extension_loaded('zip') && Settings::Config('enable_webupdate')
				],
				[
					'url' => 'admin_settings.php?page=wipecleartextmailpws',
					'label' => lng('admin.wipecleartextmailpwd'),
					'required_resources' => 'change_serversettings',
					'show_element' => (Settings::Get('system.mailpwcleartext') == true)
				]
			]
		],
		'server_php' => [
			'label' => lng('admin.server_php'),
			'icon' => 'fab fa-php',
			'elements' => [
				[
					'url' => 'admin_phpsettings.php?page=overview',
					'label' => lng('menue.phpsettings.maintitle'),
					'show_element' => (Settings::Get('system.mod_fcgid') == true || Settings::Get('phpfpm.enabled') == true)
				],
				[
					'url' => 'admin_phpsettings.php?page=fpmdaemons',
					'label' => lng('menue.phpsettings.fpmdaemons'),
					'show_element' => Settings::Get('phpfpm.enabled') == true
				],
				[
					'url' => 'admin_settings.php?page=phpinfo',
					'label' => lng('admin.phpinfo'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_apcuinfo.php?page=showinfo',
					'label' => lng('admin.apcuinfo'),
					'required_resources' => 'change_serversettings',
					'show_element' => (function_exists('apcu_cache_info') === true)
				],
				[
					'url' => 'admin_opcacheinfo.php?page=showinfo',
					'label' => lng('admin.opcacheinfo'),
					'required_resources' => 'change_serversettings',
					'show_element' => (function_exists('opcache_get_configuration') === true)
				]
			]
		],
		'misc' => [
			'label' => lng('admin.misc'),
			'icon' => 'fa-solid fa-wrench',
			'elements' => [
				[
					'url' => 'admin_settings.php?page=integritycheck',
					'label' => lng('admin.integritycheck'),
					'required_resources' => 'change_serversettings'
				],
				[
					'url' => 'admin_templates.php?page=email',
					'label' => lng('admin.templates.email')
				],
				[
					'url' => 'admin_message.php?page=message',
					'label' => lng('admin.message')
				],
				[
					'url' => 'admin_settings.php?page=testmail',
					'label' => lng('admin.testmail')
				]
			]
		]
	]
];
