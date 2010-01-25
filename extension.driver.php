<?php

	Class extension_advanced_input extends Extension {

		/**
		 * Extension information
		 */

		public function about() {
			return array(
				'name' => 'Advanced Input',
				'type' => 'Field',
				'version' => '1.0',
				'release-date' => '2010-01-25',
				'author' => array(
					'name' => 'Nils Hörrmann',
					'website' => 'http://www.nilshoerrmann.de',
					'email' => 'post@nilshoerrmann.de'
				),
				'description' => 'An input field with advanced data source output for mail addresses and URIs.',
				'compatibility' => array(
					'2.0.6' => true,
					'2.0.7' => true
				)
			);
		}

		/**
		 * Function to be executed on uninstallation
		 */

		public function uninstall() {
			// drop database table
			Administration::instance()->Database->query("DROP TABLE `tbl_fields_advanced_input`");
		}

		/**
		 * Function to be executed if the extension has been updated
		 *
		 * @param string $previousVersion - version number of the currently installed extension build
		 * @return boolean - true on success, false otherwise
		 */

		public function update($previousVersion) {
			// Nothing yet
			return true;
		}

		/**
		 * Function to be executed on installation.
		 *
		 * @return boolean - true on success, false otherwise
		 */

		public function install() {
			// Create database table and fields.
			return Administration::instance()->Database->query(
				"CREATE TABLE `tbl_fields_advanced_input` (
					`id` int(11) unsigned NOT NULL auto_increment,
					`field_id` int(11) unsigned NOT NULL,
					`validator` varchar(100),
					PRIMARY KEY (`id`),
					KEY `field_id` (`field_id`)
				)"
			);
		}

	}