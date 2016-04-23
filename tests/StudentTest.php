<?php
/**
 * Created by PhpStorm.
 * User: Andrew C
 * Date: 20/04/2016
 * Time: 23:47
 */
namespace ItbTest;

use Itb\Model\Student;

use JsonSchema\Constraints\Object;
use Zend\I18n\Validator\DateTime;


class StudentTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testFirst()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;

        // Act
        $result = $qm->getFirst();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSurname()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;

        // Act
        $result = $qm->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testAge()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;

        // Act
        $result = $qm->getAge();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGpa()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;

        // Act
        $result = $qm->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testStatus()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;

        // Act
        $result = $qm->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testSetId()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;
        $id = $qm->getId();

        // Act
        $result = $qm->setId($id);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetFirst()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;
        $first = $qm->getFirst();

        // Act
        $result = $qm->setFirst($first);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetSurname()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;
        $surname = $qm->getSurname();

        // Act
        $result = $qm->setSurname($surname);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetAge()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;
        $age = $qm->getAge();

        // Act
        $result = $qm->setAge($age);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetStatus()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;
        $status = $qm->getStatus();
        // Act
        $result = $qm->setStatus($status);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetGpa()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = null;
        $gpa = $qm->getGpa();

        // Act
        $result = $qm->setGpa($gpa);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
