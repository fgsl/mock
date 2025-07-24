<?php
namespace Fgsl\Mock\Db\Adapter\Driver\Connection;
use Laminas\Db\Adapter\Driver\AbstractConnection;
use Fgsl\Mock\Db\Result\Mock as MockResult;
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br> 
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018-2025 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock extends AbstractConnection
{
    private $isConnected = false;
    
    public function getCurrentSchema()
    {
        return "";
    }

    public function connect()
    {
        $this->isConnected = true;
        return $this;
    }
    
    public function isConnected()
    {
        return $this->isConnected;
    }
    
    public function beginTransaction()
    {
        return $this;
    }
    
    public function commit()
    {
        return $this;
    }
    
    public function rollback()
    {
        return $this;
    }

    public function execute($sql)
    {
        return new MockResult();
    }

    public function getLastGeneratedValue($name = null)
    {
        return 0;
    }
}
