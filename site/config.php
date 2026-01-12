<?php

/**
 * ProcessWire Configuration File
 *
 * Site-specific configuration for ProcessWire.
 * https://processwire.com/api/ref/config/
 *
 * Please see the file /wire/config.php which contains all configuration options you may
 * specify here. Simply copy any of the configuration options from that file and paste
 * them into this file in order to modify them.
 *
 * ProcessWire 3.x
 * Copyright (C) 2021 by Ryan Cramer
 *
 * https://processwire.com
 *
 */

if(!defined("PROCESSWIRE")) die();

/*** SITE CONFIG *************************************************************************/

$config->prependTemplateFile = '_init.php';
$config->appendTemplateFile = '_main.php';
$config->useMarkupRegions = true;
$config->useFunctionsAPI = true; 


/*** INSTALLER CONFIG ********************************************************************/



/**
 * Installer: Database Configuration
 * 
 */
$config->dbHost = 'localhost';
$config->dbName = 'ProcessWire';
$config->dbUser = 'ProcessWire';
$config->dbPass = 'admintesthooox';
$config->dbPort = '3306';
$config->dbCharset = 'utf8mb4';
$config->dbEngine = 'InnoDB';

/**
 * Installer: User Authentication Salt 
 * 
 * This value was randomly generated for your system on 2026/01/09.
 * This should be kept as private as a password and never stored in the database.
 * Must be retained if you migrate your site from one server to another.
 * Do not change this value, or user passwords will no longer work.
 * 
 */
$config->userAuthSalt = '56c6c4b55908383aaec4a59c89a3e6889a06b2bc'; 

/**
 * Installer: Table Salt (General Purpose) 
 * 
 * Use this rather than userAuthSalt when a hashing salt is needed for non user 
 * authentication purposes. Like with userAuthSalt, you should never change 
 * this value or it may break internal system comparisons that use it. 
 * 
 */
$config->tableSalt = '8e7fb8e0e653a9a1ba06622c50514bd9803c79dd'; 

/**
 * Installer: File Permission Configuration
 * 
 */
$config->chmodDir = '0755'; // permission for directories created by ProcessWire
$config->chmodFile = '0644'; // permission for files created by ProcessWire 

/**
 * Installer: Time zone setting
 * 
 */
$config->timezone = 'Europe/Brussels';

/**
 * Installer: Admin theme
 * 
 */
$config->defaultAdminTheme = 'AdminThemeUikit';

/**
 * Installer: Unix timestamp of date/time installed
 * 
 * This is used to detect which when certain behaviors must be backwards compatible.
 * Please leave this value as-is.
 * 
 */
$config->installed = 1767963115;


/**
 * Installer: Session name 
 * 
 * Default session name as used in session cookie. 
 * Note that changing this will automatically logout any current sessions. 
 * 
 */
$config->sessionName = 'pw20';


/**
 * Installer: HTTP Hosts Whitelist
 * 
 */
$config->httpHosts = array('localhost');


/**
 * Installer: Debug mode?
 * 
 * When debug mode is true, errors and exceptions are visible. 
 * When false, they are not visible except to superuser and in logs. 
 * Should be true for development sites and false for live/production sites. 
 * 
 */
$config->debug = true;

