<?php
namespace ItbTest;

use Itb\Model\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * date of jobs
     * @var string
     */

    private $timestamp;


    public function testGetId()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testText()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = null;

        // Act
        $result = $qm->getText();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testUser()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = null ;

        // Act
        $result = $qm->getUser();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testTimeStamp()
    {
        // Arrange
        $qm = new Message();

        $dateTimeObject = new \DateTime();
        $dateTimeObject->setTimestamp($this->timestamp);

        $expectedResult = $dateTimeObject;
        // Act
        $result = $qm->getTimestamp();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetUser()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = null;
        $user = $qm->getUser();

        // Act
        $result = $qm->setUser($user);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetText()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = null;
        $text = $qm->getText();
        // Act
        $result = $qm->setText($text);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetTimeStamp()
    {

        // Arrange
        $qm = new Message();
        $expectedResult = null;
        $expires = $qm->getTimestamp();

        // Act
        $result = $qm->setTimestamp($expires);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

/*
    public function testRole()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = null;


        // Act
        $result = $qm->getRole();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $qm = new Message();
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
        $qm = new Message();
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
        $qm = new Message();
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
        $qm = new Message();
        $expectedResult = null;
        $role = $qm->getRole();


        // Act
        $result = $qm->setRole($role);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCheckRole()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = 0 ;
        $username = $qm->getUsername();


        // Act
        $result = $qm->checkRole($username);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testRetrieveId()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = 0 ;
        $username = $qm->getUsername();

        // Act
        $result = $qm->retrieveID($username);
        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanmatchingUsernameOrPassword()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = 0 ;
        $username = $qm->getUsername();
        $password = $qm->getPassword();

        // Act
        $result = $qm->canFindMatchingUsernameAndPassword($username,$password);
        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGetOneById()
    {
        // Arrange
        $qm = new Message();
        $expectedResult = 0 ;
        $username = $qm->getUsername();


        // Act
        if($expectedResult != null )
        {
            $result = $qm->getOneByUsername($username);
        }
        $result = $qm->getOneByUsername($username);
        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /*
            public function testretrieveID()
            {
                // Arrange
                $qm = new Message();
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
                    $qm = new Message();
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
                    $qm = new Message();
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
                $qm = new Message();
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
                $qm = new Message();
                $expectedResult = 50;

                // Act
                $result = $qm->getPassPercentage();

                // Assert
                $this->assertEquals($expectedResult, $result);
            }

            public function testSetGetPassPercentageToSeventyFive()
            {
                // Arrange
                $qm = new Message();
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
                $qm = new Message();
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
                $qm = new Message();
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
                $qm = new Message();
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
                $qm = new Message();
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
                $qm = new Message();
                $expectedResult = false;

                // Act
                $result = $qm->hasPassed();

                // Assert
                $this->assertEquals($expectedResult, $result);
            }

            public function testPassedExamTwoCorrectAndOneWrongDefaultPassFifty()
            {
                // Arrange
                $qm = new Message();
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
                $qm = new Message();
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
                $qm = new Message();
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
