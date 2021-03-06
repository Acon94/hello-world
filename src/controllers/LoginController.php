<?php
/**
 * controlls the login action
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
 * processes the logn of a system user
 * Class LoginController
 * @package Itb\Controller
 */
class LoginController
{

    /**
     * processlogin
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function processLoginAction(Request $request, Application $app)
    {
        //session_start();
        // default is bad login
        $isLoggedIn = false;


        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        session_start();
        $_SESSION['username'] = $username;

        $role = User::checkRole($username);

        // search for user with username in repository
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);
        $id = User::retrieveID($username);
        $b = "1";//student
        $c = "2";
        $a = "3";
        // action depending on login success
        if ($isLoggedIn) {
            if ($role[0] == $b) {

                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;

                if (isset($_SESSION['loggedIn'])) {
                    echo ' SESSION HYY';
                    $_SESSION['id'] = $id[0];
                }


                $argsArray = [
                    'id' => $id[0],
                    'username' => $username,
                ];

                $templateName = 'student';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);
            } else if ($role[0] == $a) {

                $dvdRepository = new DatabaseTableRepository('Stydent', 'applicants');
                $jobRepository = new DatabaseTableRepository('Job', 'jobs');

                $dvds = $dvdRepository->getAll();
                $jobs = $jobRepository->getAll();

                $argsArray = [
                    'dvds' => $dvds,
                    'jobs' => $jobs,
                    'username' => $username,
                ];


                $templateName = 'emloyer';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);
            } else if ($role[0] == $c) {


                $_SESSION['username'] = $username;


                $dvdRepository = new DatabaseTableRepository('Stydent', 'students');
                $dvds = $dvdRepository->getAll();

                $argsArray = [
                    'dvds' => $dvds,
                    'username' => $username,
                ];

                $templateName = 'lecturer';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);
            }


        }
        if (!$isLoggedIn) {
            $argsArray = [


            ];
            $templateName = 'loginNomatch';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);


        }

    }


}