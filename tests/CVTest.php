<?php
/**
 * Created by PhpStorm.
 * User: Andrew C
 * Date: 20/04/2016
 * Time: 23:47
 */
namespace ItbTest;

use Itb\Model\CV;
use Itb\Model\Job;
use JsonSchema\Constraints\Object;
use Zend\I18n\Validator\DateTime;


class CVTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testFirst()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getFirst();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSurname()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testAge()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getAge();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testAddress()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getAddress();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testExperience()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getExperience();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGender()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getGender();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testImage()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;

        // Act
        $result = $qm->getImage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $qm = new CV();
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
        $qm = new CV();
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
        $qm = new CV();
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
        $qm = new CV();
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
        $qm = new CV();
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
        $qm = new CV();
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
        $qm = new CV();
        $expectedResult = null;
        $experience = $qm->getExperience();

        // Act
        $result = $qm->setExperience($experience);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetImage()
    {
        // Arrange
        $qm = new CV();
        $expectedResult = null;
        $image = $qm->getImage();

        // Act
        $result = $qm->setImage($image);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
/*
    public function testPosition()
    {
        // Arrange
        $qm = new Job();
        $expectedResult = null ;

        // Act
        $result = $qm->getPosition();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testExpires()
    {
        // Arrange
        $qm = new Job();

        $dateTimeObject = new \DateTime();

        $expectedResult = $dateTimeObject;
        // Act
        $result = $qm->getexpires();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /*
        public function testRole()
        {
            // Arrange
            $qm = new User();
            $expectedResult = null;


            // Act
            $result = $qm->getRole();

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

        public function testSetId()
        {
            // Arrange
            $qm = new User();
            $expectedResult = null;
            $Id = $qm->getId();


            // Act
            $result = $qm->setId($Id);

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

        public function testSetUsername()
        {
            // Arrange
            $qm = new User();
            $expectedResult = null;
            $username = $qm->getUsername();


            // Act
            $result = $qm->setUsername($username);

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

        public function testSetPassword()
        {
            // Arrange
            $qm = new User();
            $expectedResult = null;
            $password = $qm->getPassword();


            // Act
            $result = $qm->setPassword($password);

            // Assert
            $this->assertEquals($expectedResult, $result);
        }
        public function testSetRole()
        {
            // Arrange
            $qm = new User();
            $expectedResult = null;
            $role = $qm->getRole();


            // Act
            $result = $qm->setRole($role);

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

        /*    public function testCheckRole()
            {
                // Arrange
                $qm = new User();
                $expectedResult = 0 ;
                $username = $qm->getUsername();


                // Act
                $result = $qm->checkRole($username);

                // Assert
                $this->assertEquals($expectedResult, $result);
            }

        public function testretrieveID()
        {
            // Arrange
            $qm = new User();
            $expectedResult = 0;
            $username = $qm->getUsername();

            // Act
            $result = $qm->retrieveID($username);

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

                public function testFiftyPercentageCorrectWhenOneCorrectOneWrong()
                {
                    // Arrange
                        $qm = new User();
                    $expectedResult = 50;
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToWrongTotal();

                    // Act
                    $result = $qm->getPercentageQuestionsCorrect();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testOneHundredPercentageCorrectWhenOneCorrectZeroWrong()
                {
                    // Arrange
                        $qm = new User();
                    $expectedResult = 100;
                    $qm->addOneToCorrectTotal();

                    // Act
                    $result = $qm->getPercentageQuestionsCorrect();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testTwentyFivePercentageCorrectWhenOneCorrectThreeWrong()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 25;
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToWrongTotal();
                    $qm->addOneToWrongTotal();
                    $qm->addOneToWrongTotal();

                    // Act
                    $result = $qm->getPercentageQuestionsCorrect();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassPercentageFiftyWhenCreated()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 50;

                    // Act
                    $result = $qm->getPassPercentage();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testSetGetPassPercentageToSeventyFive()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 75;
                    $qm->SetPassPercentage(75);

                    // Act
                    $result = $qm->getPassPercentage();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassPercentageLessThanOneNotRecordedZero()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 10;
                    $qm->SetPassPercentage(10);
                    $qm->SetPassPercentage(0);

                    // Act
                    $result = $qm->getPassPercentage();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassPercentageLessThanOneNotRecordedMinusOne()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 50;
                    $qm->SetPassPercentage(-1);

                    // Act
                    $result = $qm->getPassPercentage();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassPercentageMoreThanOneHundredNotRecordedOneHundredAndOne()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 50;
                    $qm->SetPassPercentage(101);

                    // Act
                    $result = $qm->getPassPercentage();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassPercentageMoreThanOneHundredeNotRecordedTwoHundred()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = 10;
                    $qm->SetPassPercentage(10);
                    $qm->SetPassPercentage(200);

                    // Act
                    $result = $qm->getPassPercentage();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testFailedExameWhenCreated()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = false;

                    // Act
                    $result = $qm->hasPassed();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassedExamTwoCorrectAndOneWrongDefaultPassFifty()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = true;
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToWrongTotal();

                    // Act
                    $result = $qm->hasPassed();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testFailedExamTwoWrongSetPassSeventy()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = false;
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToWrongTotal();

                    $qm->setPassPercentage(75);

                    // Act
                    $result = $qm->hasPassed();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }

                public function testPassedExamTwoCorrectAndTwoWrongDefaultPassFifty()
                {
                    // Arrange
                    $qm = new User();
                    $expectedResult = true;
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToCorrectTotal();
                    $qm->addOneToWrongTotal();

                    // Act
                    $result = $qm->hasPassed();

                    // Assert
                    $this->assertEquals($expectedResult, $result);
                }*/
}
