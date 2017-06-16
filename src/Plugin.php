<?php

namespace Detain\MyAdminWebhosting;

use Symfony\Component\EventDispatcher\GenericEvent;

class Plugin {

	public static $name = 'Webhosting Module';
	public static $description = 'Allows selling of Webhosting Module';
	public static $help = '';
	public static $module = 'webhosting';
	public static $type = 'module';


	public function __construct() {
	}

	public static function Hooks() {
		return [
			'webhosting.load_processing' => [__CLASS__, 'Load'],
			'webhosting.settings' => [__CLASS__, 'Settings'],
		];
	}

	public static function Load(GenericEvent $event) {

	}

	public static function Settings(GenericEvent $event) {
		$module = 'webhosting';
		$settings = $event->getSubject();
		$settings->add_select_master($module, 'Default Servers', $module, 'new_website_server', 'Default Setup Server', NEW_WEBSITE_SERVER);
		$settings->add_select_master($module, 'Default Servers', $module, 'new_website_cpanel_server', 'Default CPanel Setup Server', NEW_WEBSITE_CPANEL_SERVER, SERVICE_TYPES_WEB_CPANEL);
		$settings->add_select_master($module, 'Default Servers', $module, 'new_website_wordpress_server', 'Default WordPress Setup Server', NEW_WEBSITE_WORDPRESS_SERVER, SERVICE_TYPES_WEB_WORDPRESS);
		$settings->add_select_master($module, 'Default Servers', $module, 'new_website_plesk_server', 'Default Plesk Setup Server', NEW_WEBSITE_PLESK_SERVER, SERVICE_TYPES_WEB_PLESK);
		$settings->add_select_master($module, 'Default Servers', $module, 'new_website_ppa_server', 'Default Plesk Automation Setup Server', NEW_WEBSITE_PPA_SERVER, SERVICE_TYPES_WEB_PPA);
		$settings->add_select_master($module, 'Default Servers', $module, 'new_website_vesta_server', 'Default VestaCP Setup Server', NEW_WEBSITE_VESTA_SERVER, SERVICE_TYPES_WEB_VESTA);
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting', 'Out Of Stock All Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_cpanel', 'Out Of Stock CPanel Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_CPANEL'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_plesk', 'Out Of Stock Plesk Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_PLESK'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_ppa', 'Out Of Stock Plesk Automation Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_PPA'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_vestacp', 'Out Of Stock VestaCP Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_VESTACP'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_wordpress', 'Out Of Stock WordPress Managed Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_WORDPRESS'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_demo', 'Out Of Stock Demo/Trial Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_DEMO'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_ispconfig', 'Out Of Stock ISPconfig Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_ISPCONFIG'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_dropdown_setting($module, 'Out of Stock', 'outofstock_webhosting_ispmanager', 'Out Of Stock ISPmanager Webhosting', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_WEBHOSTING_ISPMANAGER'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_text_setting($module, 'Costs & Limits', 'website_ip_cost', 'Dedicated IP Cost:', 'This is the cost for purchasing an additional IP on top of a Website.', (defined(WEBSITE_IP_COST) ? WEBSITE_IP_COST : 3));
		$settings->add_dropdown_setting($module, 'Costs & Limits', 'website_limited_package_enable', 'Enable a Daily Limited Package', 'Enable/Disable Limiting of a website package', (defined('WEBSITE_LIMITED_PACKAGE_ENABLE') ? WEBSITE_LIMITED_PACKAGE_ENABLE : '0'), array('0', '1'), array('No', 'Yes', ));
		$settings->add_text_setting($module, 'Costs & Limits', 'website_limited_package', 'Daily Limited Package to Limit:', 'The Package ID to Limit per Day.', (defined('WEBSITE_LIMITED_PACKAGE') ? WEBSITE_LIMITED_PACKAGE : 1003));
		$settings->add_text_setting($module, 'Costs & Limits', 'website_limited_package_limit', 'Daily Limited Package Limit:', 'How many packages can be sold per day.', (defined('WEBSITE_LIMITED_PACKAGE_LIMIT') ? WEBSITE_LIMITED_PACKAGE_LIMIT : 100));
		$settings->add_text_setting($module, 'Costs & Limits', 'website_limited_package_multiplier', 'Daily Limited Sale Multiplier :', 'Each sale counts as this many towards this limit.', (defined('WEBSITE_LIMITED_PACKAGE_MULTIPLIER') ? WEBSITE_LIMITED_PACKAGE_MULTIPLIER : 1));
		$settings->add_text_setting($module, 'Webhosting Demo', 'website_demo_expire_days', 'Days before Demo Expires:', 'How many days a webhosting demo will be active before expiring.', (defined('WEBSITE_DEMO_EXPIRE_DAYS') ? WEBSITE_DEMO_EXPIRE_DAYS : 14));
		$settings->add_text_setting($module, 'Webhosting Demo', 'website_demo_warning_days', 'Days before Demo Sends Expiring Soon Mail:', 'How many days a webhosting demo will be active before sending out an expiring soon warning email.', (defined('WEBSITE_DEMO_WARNING_DAYS') ? WEBSITE_DEMO_WARNING_DAYS : 10));
		$settings->add_text_setting($module, 'Webhosting Demo', 'website_demo_extend_days', 'Days the demo is extended when extending the demo:', 'How many days a webhosting demo will be active before sending out an expiring soon warning email.', (defined('WEBSITE_DEMO_EXTEND_DAYS') ? WEBSITE_DEMO_EXTEND_DAYS : 10));
		$settings->add_dropdown_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_ip', 'CPanel Package Defaults - IP', 'Enable/Disable Dedicated IP for new Sites', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_IP'), array('n', 'y'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_cgi', 'CPanel Package Defaults - CGI', 'Enable/Disable CGI Access', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_CGI'), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_frontpage', 'CPanel Package Defaults - Frontpage', 'Enable/Disable Frontpage Extensions', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_FRONTPAGE'), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_hasshell', 'CPanel Package Defaults - Shell', 'Enable/Disable Shell', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_HASSHELL'), array('0', '1'), array('No', 'Yes'));
		$settings->add_text_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_cpmod', 'CPanel Package Defaults - CP Mod', '', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_CPMOD'));
		$settings->add_text_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_maxsql', 'CPanel Package Defaults - Max SQL', '', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_MAXSQL'));
		$settings->add_text_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_maxpop', 'CPanel Package Defaults - Max POP3', '', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_MAXPOP'));
		$settings->add_text_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_maxlst', 'CPanel Package Defaults - Max Mailing Lists', '', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_MAXLST'));
		$settings->add_text_setting($module, 'CPanel Defaults', 'cpanel_package_defaults_maxsub', 'CPanel Package Defaults - Max Subdomains', '', $settings->get_setting('CPANEL_PACKAGE_DEFAULTS_MAXSUB'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_add_pkg', 'Reseller ACL Add PKG', 'Allow the creation of packages.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ADD_PKG') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ADD_PKG : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_add_pkg_ip', 'Reseller ACL Add PKG IP', 'Allow the creation of packages with dedicated IPs.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ADD_PKG_IP') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ADD_PKG_IP : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_add_pkg_shell', 'Reseller ACL Add PKG Shell', 'Allow the creation of packages with Shell access.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ADD_PKG_SHELL') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ADD_PKG_SHELL : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_all', 'Reseller ACL All', 'All features.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALL') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALL : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_allow_addoncreate', 'Reseller ACL Allow Addoncreate', 'Allow the creation of packages with unlimited Addon domains.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_ADDONCREATE') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_ADDONCREATE : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_allow_parkedcreate', 'Reseller ACL Allow Parkedcreate', 'Allow the creation of packages with parked domains.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_PARKEDCREATE') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_PARKEDCREATE : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_allow_unlimited_disk_pkgs', 'Reseller ACL Allow Unlimited Disk PKGs', 'Allow the creation of packages with Unlimited Disk space.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_UNLIMITED_DISK_PKGS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_UNLIMITED_DISK_PKGS : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_allow_unlimited_pkgs', 'Reseller ACL Allow Unlimited PKGs', 'Allow the creation of packages with Unlimited bandwidth.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_UNLIMITED_PKGS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ALLOW_UNLIMITED_PKGS : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_clustering', 'Reseller ACL Clustering', 'Enable Clustering.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_CLUSTERING') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_CLUSTERING : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_create_acct', 'Reseller ACL Create Acct', 'Allow the reseller to Create a new Account.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_CREATE_ACCT') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_CREATE_ACCT : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_create_dns', 'Reseller ACL Create DNS', 'Allow the reseller to Add DNS zones.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_CREATE_DNS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_CREATE_DNS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_demo_setup', 'Reseller ACL Demo Setup', 'Allow the reseller to turn an Account into a Demo Account.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_DEMO_SETUP') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_DEMO_SETUP : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_disallow_shell', 'Reseller ACL Disallow Shell', 'Never Allow creation of Accounts with Shell access.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_DISALLOW_SHELL') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_DISALLOW_SHELL : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_edit_account', 'Reseller ACL Edit Account', 'Allow the reseller to modify an Account.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_ACCOUNT') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_ACCOUNT : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_edit_dns', 'Reseller ACL Edit DNS', 'Allow editing of DNS zones.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_DNS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_DNS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_edit_mx', 'Reseller ACL Edit MX', 'Allow editing of MX entries,', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_MX') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_MX : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_edit_pkg', 'Reseller ACL Edit PKG', 'Allow editing of packages.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_PKG') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_EDIT_PKG : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_frontpage', 'Reseller ACL FrontPage', 'Allow the reseller to install and uninstall FrontPage extensions.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_FRONTPAGE') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_FRONTPAGE : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_kill_acct', 'Reseller ACL Kill Acct', 'Allow termination of Accounts.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_KILL_ACCT') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_KILL_ACCT : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_kill_dns', 'Reseller ACL Kill DNS', 'Allow the reseller to remove DNS entries.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_KILL_DNS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_KILL_DNS : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_limit_bandwidth', 'Reseller ACL Limit bandwidth', 'Allow the reseller to modify bandiwdth Limits.   Warning: This will Allow the reseller to circumvent package bandwidth Limits, if you are not using resource Limits!', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_LIMIT_BANDWIDTH') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_LIMIT_BANDWIDTH : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_list_accts', 'Reseller ACL List Accts', 'Allow the reseller to list his or her Accounts.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_LIST_ACCTS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_LIST_ACCTS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_mailcheck', 'Reseller ACL Mailcheck', 'Allow the reseller to access the WHM Mail Troubleshooter.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_MAILCHECK') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_MAILCHECK : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_mod_subdomains', 'Reseller ACL Mod SubDomains', 'Allow the reseller to enable and disable SubDomains.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_MOD_SUBDOMAINS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_MOD_SUBDOMAINS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_news', 'Reseller ACL News', 'Allow the reseller to modify cPanel/WHM news.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_NEWS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_NEWS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_onlyselfandglobalpkgs', 'Reseller ACL Onlyselfandglobalpkgs', 'Prevent the creation of Accounts with packages that are neither global nor owned by this user.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ONLYSELFANDGLOBALPKGS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_ONLYSELFANDGLOBALPKGS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_park_dns', 'Reseller ACL Park DNS', 'Allow the reseller to park domains.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_PARK_DNS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_PARK_DNS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_passwd', 'Reseller ACL Passwd', 'Allow the reseller to modify Passwords.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_PASSWD') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_PASSWD : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_quota', 'Reseller ACL Quota', 'Allow the reseller to modify Disk Quotas.   Warning: This will Allow resellers to circumvent package Limits for Disk space, if you are not using resource Limits!', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_QUOTA') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_QUOTA : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_rearrange_accts', 'Reseller ACL Rearrange Accts', 'Allow the reseller to rearrange Accounts.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_REARRANGE_ACCTS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_REARRANGE_ACCTS : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_res_cart', 'Reseller ACL Res Cart', 'Allow the reseller to reset the shopping Cart.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_RES_CART') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_RES_CART : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_status', 'Reseller ACL Status', 'Allow the reseller to view the Service Status feature in WHM.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_STATUS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_STATUS : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_resftp', 'Reseller ACL Resftp', 'Allow the reseller to synchronize FTP Passwords.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_RESFTP') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_RESFTP : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_restart', 'Reseller ACL Restart', 'Allow the reseller to restart services.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_RESTART') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_RESTART : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_show_bandwidth', 'Reseller ACL Show bandwidth', 'Allow the reseller to view Accounts bandwidth usage.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SHOW_BANDWIDTH') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SHOW_BANDWIDTH : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_ssl', 'Reseller ACL SSL', 'Allow the reseller to access the SSL Manager.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SSL') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SSL : 0), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_ssl_gencrt', 'Reseller ACL SSL gencrt', 'Allow the reseller to access the SSL CSR/CRT generator.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SSL_GENCRT') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SSL_GENCRT : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_stats', 'Reseller ACL Stats', 'Allow the reseller to view Account Statistics.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_STATS') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_STATS : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_suspend_acct', 'Reseller ACL Suspend Acct', 'Allow the reseller to Suspend Accounts.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SUSPEND_ACCT') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_SUSPEND_ACCT : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_dropdown_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acl_upgrade_account', 'Reseller ACL Upgrade Account', 'Allow the reseller to upgrade and downgrade Accounts.', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_UPGRADE_ACCOUNT') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACL_UPGRADE_ACCOUNT : 1), array('0', '1'), array('No', 'Yes'));
		$settings->add_text_setting($module, 'Reseller ACLs', 'cpanel_package_defaults_reseller_acllist', 'CPanel Package Defaults Reseller - ACL List', '', (defined('CPANEL_PACKAGE_DEFAULTS_RESELLER_ACLLIST') ? CPANEL_PACKAGE_DEFAULTS_RESELLER_ACLLIST : 'reseller'));
		$settings->add_select_master_autosetup($module, 'Auto-Setup Servers', $module, 'setup_servers', 'Auto-Setup Servers:', '<p>Choose which servers are used for auto-server Setups.</p>');
	}
}
