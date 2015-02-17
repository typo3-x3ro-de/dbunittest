<?php
use Organization\Dbunittest\Important;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Demonstration of a database unit test in TYPO3
 */
class ImportantTest extends Tx_Phpunit_Database_TestCase {

	/**
	 * @var DatabaseConnection
	 */
	protected $db = NULL;

	protected function setUp() {
		// Create the test database to not pollute the main TYPO3 database
		// with unit test records.
		$this->createDatabase();

		// Make TYPO3 use the connection to the example database as its default
		$this->db = $this->useTestDatabase();

		// Import the database tables we need into the test database.
		// "core" imports tables like "pages" and the like.
		$this->importExtensions(array('core', 'dbunittest'));

		// Import our example data into the test tables.
		$this->importDataSet(ExtensionManagementUtility::extPath('dbunittest') . 'Tests/Fixtures/ExampleData.xml');
	}

	protected function tearDown() {
		// Delete the test database
		$this->dropDatabase();

		// Make TYPO3 switch back its default database connection
		$this->switchToTypo3Database();
	}

	/**
	 * Don't forget the annotation below, or the test will be recognized
	 * @test
	 */
	public function getPageWithData() {
		$result = Important::getPageWithData(1);
		$this->assertSame(array("title" => "foo", "data" => array("bar", "baz")), $result);

		$result = Important::getPageWithData(2);
		$this->assertSame(array("title" => "merp", "data" => array("derp")), $result);

		$result = Important::getPageWithData(3);
		$this->assertSame(array("title" => "aww no data", "data" => array()), $result);
	}
}
