<?php
namespace ItbTest;

use Itb\Model\User;
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assighnmentphp');

class UserTest extends \PHPUnit_Framework_TestCase
{


    public function testGetId()
    {
        // Arrange
        $qm = new User();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testUsername()
    {
        // Arrange
        $qm = new User();
        $expectedResult = null;

        // Act
        $result = $qm->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

        public function testPassword()
        {
            // Arrange
            $qm = new User();
            $expectedResult = null ;

            // Act
            $result = $qm->getPassword();

            // Assert
            $this->assertEquals($expectedResult, $result);
        }

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

       public function testCheckRole()
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

    public function testRetrieveId()
    {
        // Arrange
        $qm = new User();
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
        $qm = new User();
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
        $qm = new User();
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
