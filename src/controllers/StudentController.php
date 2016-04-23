<?php
/**
 * Student controller
 *
 *
 */
namespace Itb\Controller;


use Itb\Model\User;
use Itb\Model\Job;
use fpdf;
use Itb\Model\CV;
use Itb\Model\DatabaseTableRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * controlls the actions froma student
 * Class StudentController
 * @package Itb\Controller
 */
class StudentController
{


    /**
     * view comments action
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function ViewCommentsAction(Request $request, Application $app)
    {
        session_start();
        $id = $_SESSION['id'];
        $_SESSION['id'] = $id;
        $username = $_SESSION['username'];

        print_r($id);

        //        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $privatemessageRepository = new DatabaseTableRepository('PrivateMessage', 'privatemessags');

        $messages = $messageRepository->getAll();


        $argsArray = [
            'messages' => $messages,
            'username' => $username,

            'id' => $id,
        ];

        $templateName = 'viewComments';
        return $app['twig']->render($templateName . '.html.twig', $argsArray,$id);
    }

    /**
     * Job action function displays list of jobs
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function jobAction(Request $request, Application $app)
    {

        session_start();
        $id = $_SESSION['id'];
        $_SESSION['id'] = $id;
        $username = $_SESSION['username'];

        print_r($id);

        // get Unix timestamp for the current time
        //$now = new \DateTime();
        $created = date('U') + (60 * 60 * 1); // unix time for Date Now
        $expires = $created + (60 * 4);


        $jobrepo = new DatabaseTableRepository('Job', 'jobs');
        $cvrepository = new DatabaseTableRepository('CV', 'cvs');

        $jobs = $jobrepo->getAll();
        $cvs = $cvrepository->getOneById($id);

        // get Unix timestamp for the current time
        //$now = new \DateTime();
        $created = date('U') + (60 * 60 * 1); // unix time for Date Now


        $argsArray = [
            'jobs' => $jobs,
            'id' => $id,
            'cvs' => $cvs,
            'created' => $created,
            'username' => $username,


        ];

        $templateName = 'job';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     *
     * displays messages for the logged in user
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     *
     *
     */
    public function viewPrivateMessagesAction(Request $request, Application $app)
    {


        session_start();
        $id = $_SESSION['id'];
        $_SESSION['id'] = $id;
        $username = $_SESSION['username'];

        print_r($id);



        $privatemessageRepository = new DatabaseTableRepository('PrivateMessage', 'privatemessags');

        $privatemessages = $privatemessageRepository->getAllPrivate($id);

        $argsArray = [

            'privatemessages' => $privatemessages,
            'id' => $id,
            'username' => $username,
        ];

        $templateName = 'viewPrivateComments';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * user cv action
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */

    public function cvAction(Request $request, Application $app, $id)
    {
        session_start();
        $id = $_SESSION['id'];
        $_SESSION['id'] = $id;
        $username = $_SESSION['username'];

        print_r($id);


        $cvrepository = new DatabaseTableRepository('CV', 'cvs');
        $jobrepository = new DatabaseTableRepository('Job', 'jobs');

        $cvs = $cvrepository->getOneById($id);


        $argsArray = [
            'cvs' => $cvs,
            'id' => $id,
            'username' => $username,
        ];

        $templateName = 'cv';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}