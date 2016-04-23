<?php
/**
 * Created by PhpStorm.
 * User: Andrew C
 * Date: 20/04/2016
 * Time: 23:47
 */
namespace ItbTest;


use Itb\Model\JobApp;
use JsonSchema\Constraints\Object;
use Zend\I18n\Validator\DateTime;


class JobAppTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testFirst()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getFirst();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSurname()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testAge()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getAge();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testAddress()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getAddress();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testExperience()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getExperience();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGender()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getGender();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testPosition()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getPosition();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testImage()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;

        // Act
        $result = $qm->getImage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $qm = new JobApp();
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
        $qm = new JobApp();
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
        $qm = new JobApp();
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
        $qm = new JobApp();
        $expectedResult = null;
        $age = $qm->getAge();

        // Act
        $result = $qm->setAge($age);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetGender()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;
        $gender = $qm->getGender();

        // Act
        $result = $qm->setGender($gender);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetAddress()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;
        $address = $qm->getAddress();

        // Act
        $result = $qm->setAddress($address);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetExperience()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;
        $experience = $qm->getExperience();

        // Act
        $result = $qm->setExperience($experience);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetPosition()
    {
        // Arrange
        $qm = new JobApp();
        $expectedResult = null;
        $position = $qm->getPosition();

        // Act
        $result = $qm->setPosition($position);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetImage()
    {
        // Arrange
        $qm = new  JobApp();
        $expectedResult = null;
        $image = $qm->getImage();

        // Act
        $result = $qm->setImage($image);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
   
    
}
