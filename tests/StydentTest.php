<?php
/**
 * Created by PhpStorm.
 * User: Andrew C
 * Date: 20/04/2016
 * Time: 23:47
 */
namespace ItbTest;

use Itb\Model\Stydent;

use JsonSchema\Constraints\Object;
use Zend\I18n\Validator\DateTime;


class StydentTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $qm = new Stydent();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testFirst()
    {
        // Arrange
        $qm = new Stydent();
        $expectedResult = null;

        // Act
        $result = $qm->getFirst();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSurname()
    {
        // Arrange
        $qm = new Stydent();
        $expectedResult = null;

        // Act
        $result = $qm->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testStatus()
    {
        // Arrange
        $qm = new Stydent();
        $expectedResult = null;

        // Act
        $result = $qm->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }



}
