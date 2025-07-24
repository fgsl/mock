<?php
namespace Fgsl\Mock\Db\Result;
use Laminas\Db\Adapter\Driver\ResultInterface;
/**
 * @author    Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br> 
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright FGSL 2018-2025 (http://www.fgsl.eti.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements ResultInterface
{
    private $elements = [null];
    private $index = 0;
    
    public function __construct(array $resultRows = [null])
    {
        $this->elements = $resultRows;
    }

    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::buffer()
     */
    public function buffer()
    {
        return null;
    }
    
    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::isBuffered()
     */
    public function isBuffered()
    {
        return null;
    }
    
    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::isQueryResult()
    */
    public function isQueryResult(): bool
    {
        return true;
    }
    
    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::getAffectedRows()
     */
    public function getAffectedRows(): int
    {
        return 1;
    }
    
    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::getGeneratedValue()
     */
    public function getGeneratedValue(): mixed
    {
        return null;
    }
    
    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::getResource()
     */
    public function getResource(): mixed
    {
        return null;
    }
    
    /**
     * @see Laminas\Db\Adapter\Driver\ResultInterface::getFieldCount()
     */
    public function getFieldCount()
    {
        return 1;
    }
    
    public function count (): int
    {
        return count($this->elements);
    }

    public function current (): mixed
    {
        return $this->elements[$this->index];
    }

    /**
     * @see Iterator::next()
     */
    public function next ():void
    {
        $this->index++;
    }
    
    /**
     * @see Iterator::key()
     */
    public function key (): mixed
    {
        return $this->index;
    }

    /**
     * @see Iterator::valid()
     */
    public function valid (): bool
    {
        return isset($this->elements[$this->index]);
    }

    /**
     * @see Iterator::rewind()
     */
    public function rewind (): void
    {
        $this->index = 0;
    }
}