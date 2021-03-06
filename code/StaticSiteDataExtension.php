<?php

class StaticSiteDataExtension extends DataExtension {
	
	/**
	 * @var array
	 */
	static $has_one = array(
		"StaticSiteContentSource" => "StaticSiteContentSource",
	);
	
	/**
	 * @var array
	 */	
	static $db = array(
		"StaticSiteURL" => "Varchar(255)"
	);

	/**
	 * 
	 * @param FieldList $fields
	 * @return void
	 */
	public function updateCMSFields(FieldList $fields) {
		if($this->owner->StaticSiteContentSourceID && $this->owner->StaticSiteURL) {
			$fields->addFieldToTab('Root.Main', new ReadonlyField('StaticSiteURL', 'Imported URL'), 'MenuTitle');
		}
	}
}
