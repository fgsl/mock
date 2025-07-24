<?php

use Fgsl\Mock\Db\Adapter\AdapterServiceFactory;
use Fgsl\Mock\Db\Adapter\Mock as MockAdapter;
use Fgsl\Mock\Db\Adapter\Driver\Connection\Mock as MockConnection;
use Fgsl\Mock\Db\Adapter\Driver\Statement\Mock as MockStatement;
use Fgsl\Mock\Db\Platform\Mock as MockPlatform;
use Fgsl\Mock\Db\Result\Mock as MockResult;
use Fgsl\Mock\Db\TableGateway\Mock as MockTableGateway;
use Laminas\Db\Adapter\Driver\DriverInterface;
use Laminas\Db\Adapter\Platform\PlatformInterface;
use Laminas\Db\Sql\Select;
use Laminas\ServiceManager\ServiceManager;
use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    /**
     * @covers MockAdapter
     */
    public function testAdapterCreation()
    {
        $adapter = new MockAdapter();

        $this->assertInstanceOf(DriverInterface::class,$adapter->getDriver());
        $this->assertInstanceOf(PlatformInterface::class,$adapter->getPlatform());
    }

    /**
     * @covers AdapterServiceFactory
     */
    public function testFactory()
    {
        $factory = new AdapterServiceFactory();
        $container = new ServiceManager();

        $this->assertInstanceOf(MockAdapter::class,$factory($container,'mock'));
    }

    /**
     * @covers MockResult
     */
    public function testResult()
    {
        $result = new MockResult([1,2,3]);
        $this->assertEquals(1,$result->current());
        $result->next();
        $this->assertEquals(2,$result->current());
        $result->rewind();
        $this->assertEquals(1,$result->current());
        $this->assertCount(3,$result);
    }

    /**
     * @covers MockTableGateway
     */
    public function testTableGateway()
    {
        $tableGateway = new MockTableGateway('stuff',new MockAdapter());
        $this->assertEquals('stuff',$tableGateway->getTable());
        $this->assertInstanceOf(MockResult::class,$tableGateway->select());
        $this->assertInstanceOf(Iterator::class,$tableGateway->selectWith(new Select()));
        $this->assertEquals(1,$tableGateway->insert([]));
        $this->assertEquals(1,$tableGateway->update([]));
        $this->assertEquals(1,$tableGateway->delete([]));
    }

    /**
     * @covers MockConnection
     */
    public function testConnection()
    {
        $connection = new MockConnection();
        $this->assertInstanceOf(MockConnection::class, $connection->connect());
        $this->assertTrue($connection->isConnected());
        $this->assertEquals(0,$connection->getLastGeneratedValue());
        $this->assertEquals('',$connection->getCurrentSchema());
    }

    /**
     * @covers MockStatement
     */
    public function testStatement()
    {
        $statement = new MockStatement();
        $this->assertTrue($statement->isPrepared());
        $this->assertNull($statement->getResource());
    }

    /**
     * @covers MockPlatform
     */
    public function testPlatform()
    {
        $platform = new MockPlatform();
        $this->assertEquals(MockPlatform::class,$platform->getName());
        $this->assertEquals("'",$platform->getQuoteIdentifierSymbol());
        $this->assertEquals("'",$platform->getQuoteValueSymbol());
        $this->assertEquals("'something'",$platform->quoteIdentifierChain('something'));
        $this->assertEquals("'anotherthing'",$platform->quoteValue('anotherthing'));
        $this->assertEquals(',',$platform->getIdentifierSeparator());
    }
}