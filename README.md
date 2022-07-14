# SuitePressSSO
WordPress Member Suite integration

> **The project is no longer supported. If anyone would like ownership of this, or knows of an alternative, please let me.**

## Installing
1. Copy plugin source to 'SuitePress' directory inside the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter MS API config values via the Settings > Suitepress SOO menu.
4. (Optional) Enable WPUsers to allow users to login with their WP credentials and have protal accounts created at SSO.

## SSO
1. Set the "Portal Login Redirect URL" in the console under Setup > Portal Settings. The address should be your WP domain followed by ?mssso=login e.g. www.mywpsite.com?mssso=login

SuitePress SSO will honor the portal returnUrl value, this means you can deep link inside your portal and wordpress will handle authentication and redirect to the intended page.
