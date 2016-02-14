<?php
/**
 * @see \ExternalContentImporter
 */
class StaticSiteImporter extends ExternalContentImporter {
	
	/**
	 * @return false
	 */
	public function __construct() {
		$this->contentTransforms['sitetree'] = new StaticSitePageTransformer();
		$this->contentTransforms['file'] = new StaticSiteFileTransformer();
	}

	/**
	 * 
	 * @param type $item
	 * @return string
	 */
	public function getExternalType($item) {
		return $item->getType();
	}

	/*
	 * Switch to Stage to ensure imported content is added as Draft
	 */
    public function runOnImportStart() {
		Versioned::reading_stage('Stage');
	}

	/*
	 * Switch back to Live stage after import
	 */
	public function runOnImportEnd() {
		Versioned::reading_stage('Live');
	}

}
