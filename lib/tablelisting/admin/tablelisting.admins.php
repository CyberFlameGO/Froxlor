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

use Froxlor\UI\Callbacks\Admin;
use Froxlor\UI\Callbacks\Customer;
use Froxlor\UI\Callbacks\Impersonate;
use Froxlor\UI\Callbacks\ProgressBar;
use Froxlor\UI\Callbacks\Style;
use Froxlor\UI\Callbacks\Text;
use Froxlor\UI\Listing;

return [
	'admin_list' => [
		'title' => lng('admin.admin'),
		'icon' => 'fa-solid fa-user',
		'self_overview' => ['section' => 'admins', 'page' => 'admins'],
		'default_sorting' => ['loginname' => 'asc'],
		'columns' => [
			'adminid' => [
				'label' => 'ID',
				'field' => 'adminid',
				'sortable' => true,
			],
			'loginname' => [
				'label' => lng('login.username'),
				'field' => 'loginname',
				'callback' => [Impersonate::class, 'admin'],
				'sortable' => true,
			],
			'name' => [
				'label' => lng('customer.name'),
				'field' => 'name',
			],
			'email' => [
				'label' => lng('login.email'),
				'field' => 'email',
			],
			'def_language' => [
				'label' => lng('login.profile_lng'),
				'field' => 'def_language',
			],
			'customers_used' => [
				'label' => lng('admin.customers'),
				'field' => 'customers_used',
				'class' => 'text-center',
			],
			'diskspace' => [
				'label' => lng('customer.diskspace'),
				'field' => 'diskspace',
				'callback' => [ProgressBar::class, 'diskspace'],
			],
			'traffic' => [
				'label' => lng('customer.traffic'),
				'field' => 'traffic',
				'callback' => [ProgressBar::class, 'traffic'],
			],
			'caneditphpsettings' => [
				'label' => lng('admin.caneditphpsettings'),
				'field' => 'caneditphpsettings',
				'class' => 'text-center',
				'callback' => [Text::class, 'boolean'],
			],
			'change_serversettings' => [
				'label' => lng('admin.change_serversettings'),
				'field' => 'change_serversettings',
				'class' => 'text-center',
				'callback' => [Text::class, 'boolean'],
			],
			'deactivated' => [
				'label' => lng('admin.deactivated'),
				'field' => 'deactivated',
				'class' => 'text-center',
				'callback' => [Text::class, 'boolean'],
			],
			'theme' => [
				'label' => lng('panel.theme'),
				'field' => 'theme',
			],
			'api_allowed' => [
				'label' => lng('usersettings.api_allowed.title'),
				'field' => 'api_allowed',
				'class' => 'text-center',
				'callback' => [Text::class, 'boolean'],
			],
		],
		'visible_columns' => Listing::getVisibleColumnsForListing('admin_list', [
			'loginname',
			'name',
			'customers_used',
			'diskspace',
			'traffic',
			'deactivated',
		]),
		'actions' => [
			'show' => [
				'icon' => 'fa-solid fa-eye',
				'title' => lng('usersettings.custom_notes.title'),
				'modal' => [Text::class, 'customerNoteDetailModal'],
				'visible' => [Customer::class, 'hasNote']
			],
			'edit' => [
				'icon' => 'fa-solid fa-edit',
				'title' => lng('panel.edit'),
				'href' => [
					'section' => 'admins',
					'page' => 'admins',
					'action' => 'edit',
					'id' => ':adminid'
				],
			],
			'delete' => [
				'icon' => 'fa-solid fa-trash',
				'title' => lng('panel.delete'),
				'class' => 'btn-danger',
				'href' => [
					'section' => 'admins',
					'page' => 'admins',
					'action' => 'delete',
					'id' => ':adminid'
				],
				'visible' => [Admin::class, 'isNotMe']
			],
		],
		'format_callback' => [
			[Style::class, 'deactivated'],
			[Style::class, 'diskspaceWarning'],
			[Style::class, 'trafficWarning']
		]
	]
];
