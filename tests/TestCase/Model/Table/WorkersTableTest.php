<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkersTable Test Case
 */
class WorkersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkersTable
     */
    public $Workers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Workers',
        'app.Jobs',
        'app.Payments',
        'app.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Workers') ? [] : ['className' => WorkersTable::class];
        $this->Workers = TableRegistry::getTableLocator()->get('Workers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Workers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
