<?php
/**
 * lecturer controller class
 *
 *
 */
namespace Itb\Controller;


use Itb\Model\User;
use Itb\Model\Job;
use fpdf;
use Itb\Model\CV;
use Itb\Model\JobCreation;
use Itb\Model\DatabaseTableRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created in textpad
 * User:Andrew B00069517
 * Date: 26/01/2016
 * Time: 10:44
 *
 * controlls the lecturer actions
 *
 *
 *
 */
class LecturerController
{
    /**
     * displays list of students
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function studentsAction(Request $request, Application $app)
    {
        session_start();
        $username = $_SESSION['username'];

        echo('USER' . $username);


        $dvdRepository = new DatabaseTableRepository('Stydent', 'students');
        $dvds = $dvdRepository->getAll();

        $argsArray = [
            'dvds' => $dvds,
            'username' => $username,
        ];

        $templateName = 'students';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * make a new  comment
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function commentsAction(Request $request, Application $app)
    {
        session_start();
        $username = $_SESSION['username'];
        $_SESSION['loggedIn'] = true;

        if (isset($_SESSION['loggedIn'])) {
            echo ' SESSION HYY';
        }

        $jobrepo = new DatabaseTableRepository('Job', 'jobs');
        $jobs = $jobrepo->getAll();


        $argsArray = [
            'jobs' => $jobs,
            'username' => $username,

        ];


        $templateName = 'comments';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }


    /**
     * view cv action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function viewCVAction(Request $request, Application $app)
    {

        session_start();
        $username = $_SESSION['username'];

        $dvdRepository = new DatabaseTableRepository('CV', 'cvs');
        $cvs = $dvdRepository->getAll();

        $argsArray = [
            'cvs' => $cvs,
            'username' =>$username,
        ];

        $templateName = 'viewCV';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * job creation action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function jobcreationAction(Request $request, Application $app)
    {

        session_start();
        $username = $_SESSION['username'];

        $argsArray = [

            'username' => $username,
        ];
        $templateName = 'jobcreation';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * detail action used t viewa cv
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function detailAction(Request $request, Application $app ,$id)
    {

        session_start();
        $username = $_SESSION['username'];

        $cvrepository = new DatabaseTableRepository('CV', 'cvs');
        $cvs = $cvrepository->getOneById($id);

        $argsArray = [
            'message' => 'sorry, no result could be found with id given = ' . $id
        ];
        $templateName = 'error';


        if (null != $cvs){
            $argsArray = [
                'cvs' => $cvs,
                'username' => $username,
            ];



            $templateName = 'detail';
        }
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * private comments action
     * private comments form
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function privateCommentsAction(Request $request, Application $app,$id)
    {
        session_start();
        $username = $_SESSION['username'];

        $jobrepo = new DatabaseTableRepository('Student', 'students');
        $students = $jobrepo->getAll();

        $argsArray = [
            'student' => $students,
            'id' => $id,
            'username' =>$username,
        ];


        $templateName = 'Privatecomments';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }

    /**
     * employ action used to imploy a student
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
        public function employAction(Request $request, Application $app ,$id)
	    {

	        session_start();
	        $username = $_SESSION['username'];

	        $studentRepository = new DatabaseTableRepository('Student', 'students');
	        $students = $studentRepository->getOneById($id);

	        $argsArray = [
	            'students' => $students
	        ];

			$status = $students->setStatus('employed');

				 $studentRepository->update($students , $id);

	            $templateName = 'detail';

	        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * submit action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
     public function submitAction(Request $request, Application $app)
	    {
	        // now sanitise with filter_var()
	        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
	        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
	        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
	       $expires = filter_input(INPUT_POST, 'expires', FILTER_SANITIZE_STRING);


			   // get Unix timestamp for the current time
					   //$now = new \DateTime();
			           $created = date('U') + (60*60*1); // unix time for Date Now
			           $expires = strtotime($expires) - (60*60*7);//$created + (60*4);


	        // create message object
	        $job = new JobCreation();
	        $job->setPosition($position);
	        $job->setLocation($location);
	        $job->setCreated($created);
	        $job->setExpires($expires);
	        $job->setUser($user);

	        // use MessageRepository to store new Message object
	//        $messageRepository = new MessageRepository();
	        $messageRepository = new DatabaseTableRepository('JobCreation', 'jobs');
	        if($messageRepository->create($job)){
	            $templateName = 'lecturer';

	        				return $app['twig']->render($templateName . '.html.twig');
	        } else {
	            $errorMessage = 'there was a problem adding your message to the database ...';
	            $errorController = new ErrorController();
	            $errorController->messagesAction($twig, $errorMessage);
	        }
	    }





}