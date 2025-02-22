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
	'groups' => [
		'statistics' => [
			'title' => lng('admin.statisticsettings'),
			'icon' => 'fa-solid fa-chart-area',
			'fields' => [
				'system_webalizer_quiet' => [
					'label' => lng('serversettings.webalizer_quiet'),
					'settinggroup' => 'system',
					'varname' => 'webalizer_quiet',
					'type' => 'select',
					'default' => 2,
					'select_var' => [
						0 => lng('admin.webalizer.normal'),
						1 => lng('admin.webalizer.quiet'),
						2 => lng('admin.webalizer.veryquiet')
					],
					'save_method' => 'storeSettingField',
					'visible' => Settings::Get('system.awstats_enabled') == 0
				],
				'system_awstats_enabled' => [
					'label' => lng('serversettings.awstats_enabled'),
					'settinggroup' => 'system',
					'varname' => 'awstats_enabled',
					'type' => 'checkbox',
					'default' => false,
					'save_method' => 'storeSettingField'
				],
				'system_awstats_path' => [
					'label' => lng('serversettings.awstats_path'),
					'settinggroup' => 'system',
					'varname' => 'awstats_path',
					'type' => 'text',
					'string_type' => 'dir',
					'default' => '/usr/share/awstats/tools/',
					'save_method' => 'storeSettingField',
					'visible' => Settings::Get('system.awstats_enabled') == 1
				],
				'system_awstats_awstatspath' => [
					'label' => lng('serversettings.awstats_awstatspath'),
					'settinggroup' => 'system',
					'varname' => 'awstats_awstatspath',
					'type' => 'text',
					'string_type' => 'dir',
					'default' => '/usr/lib/cgi-bin/',
					'save_method' => 'storeSettingField',
					'visible' => Settings::Get('system.awstats_enabled') == 1
				],
				'system_awstats_conf' => [
					'label' => lng('serversettings.awstats_conf'),
					'settinggroup' => 'system',
					'varname' => 'awstats_conf',
					'type' => 'text',
					'string_type' => 'dir',
					'default' => '/etc/awstats/',
					'save_method' => 'storeSettingField',
					'visible' => Settings::Get('system.awstats_enabled') == 1
				],
				'system_awstats_icons' => [
					'label' => lng('serversettings.awstats_icons'),
					'settinggroup' => 'system',
					'varname' => 'awstats_icons',
					'type' => 'text',
					'string_type' => 'dir',
					'default' => '/usr/share/awstats/icon/',
					'save_method' => 'storeSettingField',
					'visible' => Settings::Get('system.awstats_enabled') == 1
				],
				'system_awstats_logformat' => [
					'label' => lng('serversettings.awstats.logformat'),
					'settinggroup' => 'system',
					'varname' => 'awstats_logformat',
					'type' => 'text',
					'default' => '1',
					'save_method' => 'storeSettingField',
					'visible' => Settings::Get('system.awstats_enabled') == 1,
					'advanced_mode' => true
				]
			]
		]
	]
];
