<?php
/**
 * Created in textpad
 * User:Andrew B00069517
 * Date: 26/01/2016
 * Time: 10:44
 *
 * controlls MessageActions
 *
 *
 *
 */
namespace Itb\Controller;


use Itb\Model\User;
use Itb\Model\CV;
use Itb\Model\Message;
use Itb\Model\JobApp;
use Itb\Model\PrivateMessage;
use Itb\Model\Student;
use Itb\Model\DatabaseTableRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * controlls mainly form submit actions
 * Class MessageController - contol actions
 *
 *
 *
 */


class MessageController
{
    /**
     * lecturer action
     * @param \Twig_Environment $twig
     */
    public function lecturerAction(\Twig_Environment $twig)
    {
        $jobrepo = new DatabaseTableRepository('Job', 'jobs');
        $jobs = $jobrepo->getAll();

        $argsArray = [
            'jobs' => $jobs,
        ];

        $template = 'lecturer';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }

    /**
     * comments Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function commentsAction(Request $request, Application $app)
    {
        $jobrepo = new DatabaseTableRepository('Job', 'jobs');
        $jobs = $jobrepo->getAll();

        $argsArray = [
            'jobs' => $jobs,
        ];

        $templateName = 'viewComments';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * messgaes
     * @param  $twig
     */

    public function messagesAction(\Twig_Environment $twig)
    {
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $messages = $messageRepository->getAll();

        $argsArray = [
            'messages' => $messages,
        ];

        $template = 'messages';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }



    /**
     * wfgerhet
     * @param \Twig_Environment $twig
     *
     *
     */
    public function messagesAsJSONAction(\Twig_Environment $twig)
    {
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $messages = $messageRepository->getAll();

        $argsArray = [
            'messages' => $messages,
        ];

        $template = 'messagesAsJSON';
        $htmlOutput = $twig->render($template . '.json.twig', $argsArray);
        print $htmlOutput;
    }

    /**
     * cv submit action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */


    public function cvsubmitAction(Request $request, Application $app)
    {
        $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $gender= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $experience= filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_STRING);
        $image= filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // get Unix timestamp for the current time
        $now = new \DateTime();
        $timestamp = $now->getTimestamp();

        // create message object
        $cv = new CV();
        $cv->setFirst($first);
        $cv->setSurname($surname);
        $cv->setAge($age);
        $cv->setAddress($address);
        $cv->setGender($gender);
        $cv->setExperience($experience);
        $cv->setImage($image);



        // use MessageRepository to store new Message object
        //        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('CV', 'cvs');

        $messageRepository->update($cv , $id);

        $templateName = 'cv';

        return $app['twig']->render($templateName . '.html.twig');

    }

    /**
     * Create student submit action
     *
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     *
     *
     */
    public function createStudentsubmitAction(Request $request, Application $app)
    {


        //cv


        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $gender= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $experience= filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_STRING);
        $image= filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        // student
        $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gpa = filter_input(INPUT_POST, 'gpa', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);


        //user
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);


        //cv object
        $cv = new CV();
        $cv->setFirst('Joe');
        $cv->setSurname('Bloggs');
        $cv->setAge($age);
        $cv->setAddress('N/A');
        $cv->setGender('N/A');
        $cv->setExperience('N/a');
        $cv->setImage($image);
        $cv->setId($id);


        //create new user
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setId($id);
        $user->setRole($role);




        // create message object
        $student = new Student();

        $student->setId($id);
        $student->setFirst($first);
        $student->setSurname($surname);
        $student->setAge($age);
        $student->setGpa($gpa);
        $student->setStatus($status);



        // use MessageRepository to store new Message object
        //        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Student', 'students');
        $messageRepository->create($student);


        $userRepository = new User();
        $userRepository = new DatabaseTableRepository('User', 'users');
        $userRepository->create($user);

        $cvRepository = new CV();
        $cvRepository = new DatabaseTableRepository('CV', 'cvs');
        $cvRepository->create($cv);



        $templateName = 'lecturer';

        return $app['twig']->render($templateName . '.html.twig');


    }

    /**
     * comments submit action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function commentsubmitAction(Request $request, Application $app)
    {
        // now sanitise with filter_var()
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

        // get Unix timestamp for the current time
        $now = new \DateTime();
        $timestamp = $now->getTimestamp();



        // create message object
        $comment = new Message();
        $comment->setText($text);
        $comment->setUser($user);
        $comment->setTimestamp($timestamp);


        // use MessageRepository to store new Message object
        //        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');
        if($messageRepository->create($comment)){
            $templateName = 'lecturer';

            return $app['twig']->render($templateName . '.html.twig');
        } else {
            $errorMessage = 'there was a problem adding your message to the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }

    /**
     * privae comments action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function privatecommentsubmitAction(Request $request, Application $app)
    {


        // now sanitise with filter_var()
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $reciver = filter_input(INPUT_POST, 'reciver', FILTER_SANITIZE_STRING);



        // get Unix timestamp for the current time
        $now = new \DateTime();
        $timestamp = $now->getTimestamp();



        // create message object
        $comment = new PrivateMessage();
        $comment->setText($text);
        $comment->setUser($user);
        $comment->setReciver($reciver);
        $comment->setTimestamp($timestamp);


        // use MessageRepository to store new Message object
        //        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('PrivateMessage', ' privatemessags');
        print_r($reciver);
        if($messageRepository->create($comment)){
            $templateName = 'lecturer';

            return $app['twig']->render($templateName . '.html.twig');
        } else {
            $errorMessage = 'there was a problem adding your message to the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }



    /**
     * deleye action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function deleteAction(Request $request, Application $app )
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Student', 'students');
        $userRepository = new DatabaseTableRepository('User', 'users');
        $cvRepository = new DatabaseTableRepository('CV', 'cvs');
        $messageRepository->delete($id);
        $userRepository->delete($id);
        $cvRepository->delete($id);
        if($messageRepository->delete($id)){
            $templateName = 'lecturer';
            return $app['twig']->render($templateName . '.html.twig');
        } else {
            $errorMessage = 'there was a problem delete message with id ' . $id . 'to the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }

    }

    /**
     * messageEditAction
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function messageEditAction(Request $request, Application $app)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $message = $messageRepository->getOneById($id);

        $argsArray = [
            'message' => $message,
        ];

        $templateName = 'messageEdit';

        return $app['twig']->render($templateName . '.html.twig');
    }

    /**
     * edit student Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function studentEditAction(Request $request, Application $app )
    {


        session_start();
        $username = $_SESSION['username'];
        // now sanitise with filter_var()
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);



        $messageRepository = new DatabaseTableRepository('Student', 'students');
        $student = $messageRepository->getOneById($id);


        print_r($id);


        $argsArray = [
            'student' => $student,
            'username' => $username,
        ];

        $templateName = 'studentEdit';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * crate student
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function createStudentAction(Request $request, Application $app)
    {
        session_start();
        $username = $_SESSION['username'];


        $messageRepository = new DatabaseTableRepository('Student', 'students');


        $student = $messageRepository->getAll();

        $argsArray = [
            'student' => $student,
            'username' => $username,
        ];

        $templateName = 'studentCreate';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     *
     * used when a student applies for a job
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     *
     */
    public function jobApplyAction(Request $request, Application $app,$id)
    {
        session_start();
        $username = $_SESSION['username'];
        //cv
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $gender= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $experience= filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_STRING);
        $position= filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
        $image= filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);



        $messageRepository = new DatabaseTableRepository('Student', 'students');
        $cvrepository = new DatabaseTableRepository('CV', 'cvs');

        $application = new JobApp();
        $application->setId($id);
        $application->setFirst($first);
        $application->setSurname($surname);
        $application->setAge($age);
        $application->setAddress($address);
        $application->setGender($gender);
        $application->setPosition($position);
        $application->setExperience($experience);
        $application->setImage($image);







        $applicationRepository = new Application();
        $applicationRepository = new DatabaseTableRepository('Application', ' applicants');
        $applicationRepository->create($application);



        $student = $messageRepository->getAll();

        $cvs = $cvrepository->getOneById($id);

        $argsArray = [
            'student' => $student,
            'cvs' => $cvs,
            'id' => $id,
            'username' => $username,


        ];

        $templateName = 'applicationSent';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * unuded
     * @param $twig
     */

    public function updateAction($twig)
    {


        // now sanitise with filter_var()
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

        // get Unix timestamp for the current time
        $now = new \DateTime();
        $timestamp = $now->getTimestamp();

        // create message object
        $message = new Message();
        $message->setText($text);
        $message->setUser($user);
        $message->setTimestamp($timestamp);

        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');
        if($messageRepository->update($message, $id)){
            $this->messagesAction($twig);
        } else {
            $errorMessage = 'there was a problem editing your message in the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }

    /**
     * update CV
     * @param Request $request
     * @param Application $app
     * @return mixed
     */


    public function updateCVAction(Request $request, Application $app)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gpa = filter_input(INPUT_POST, 'gpa', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);



        // create message object
        $student = new Student();
        $student->setFirst($first);
        $student->setSurname($surname);
        $student->setAge($age);
        $student->setGpa($gpa);
        $student->setStatus($status);



        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Student', 'students');
        if($messageRepository->update($student, $id)){
            $templateName = 'students';
            return $app['twig']->render($templateName . '.html.twig');
        } else {
            $errorMessage = 'there was a problem editing your message in the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }


}