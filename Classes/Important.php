<?php
namespace Organization\Dbunittest;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Example functionality that accesses the database
 */
class Important {

	/**
	 * @param $pageId
	 * @return mixed Title of the page alongside all tx_dbunittest values
	 * 				 attached to it. E.g.
	 *
	 * 					array("title" => "foo", "data" => array("bar"));
	 */
	public static function getPageWithData($pageId) {
		$pageId = intval($pageId);
		$sql = <<<SQL
			SELECT
				title,
				GROUP_CONCAT(data SEPARATOR '$$$') as data
			FROM pages as a
			LEFT JOIN tx_dbunittest as b ON (b.page_id = a.uid)
			WHERE a.uid = {$pageId}
			GROUP BY a.uid
SQL;

		$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($GLOBALS['TYPO3_DB']->sql_query($sql));
		// For the sake of this example let's assume that data will not contain the string '$$$' :)
		$row['data'] = GeneralUtility::trimExplode('$$$', $row['data'], true);
		return $row;
	}
}
