<?php
/**
 * main controller calss
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
 * Created in textpad
 * User:Andrew B00069517
 * Date: 26/01/2016
 * Time: 10:44
 *
 * controlls the main actions
 */

class MainController
{
    /**
     * direst to login page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginAction(Request $request, Application $app)
    {
        $argsArray = [];
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * home page action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app)
    {


        $argsArray = [];

        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * list action
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function listAction(Request $request, Application $app)
    {

        session_start();
        $username = $_SESSION['username'];

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $cvrepository = new DatabaseTableRepository('CV', 'cvs');
        $cvs = $cvrepository->getCV($id);

        $argsArray = [
            'cvs' => $cvs,
            'username' => $username,
        ];


        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * employer action
     * @param \Twig_Environment $twig
     */
    public function employerAction(\Twig_Environment $twig)
    {
        $dvdRepository = new DatabaseTableRepository('Stydent', 'students');
        $dvds = $dvdRepository->getAll();

        $argsArray = [
            'dvds' => $dvds,
        ];

        $template = 'emloyer';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }

    /**
     * displays students
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function studentsAction(Request $request, Application $app)
    {
        session_start();
        $username = $_SESSION['username'];

        echo ('USER' . $username);

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
     * used when employerwants to download a cv
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function cvdownloadAction(Request $request, Application $app ,$id)
    {
        $applicationrepository = new DatabaseTableRepository('JobApp', ' applicants');
        $cvs = $applicationrepository->getOneById($id);





        $argsArray = [
            'cvs' => $cvs,
            'id' => $id,

        ];
        var_dump($cvs);

        $objtext = serialize($cvs);


        $first= $cvs->getFirst();
        $surname = $cvs->getSurname();
        $age = $cvs->getAge();
        $address = $cvs->getAddress();
        $gender = $cvs->getGender();
        $experience = $cvs->getExperience();
        $position = $cvs->getPosition();
        $image = $cvs->getImage();

        $fp = fopen("$first'sCV.txt", "a+");
        fwrite($fp, $first ."\t". $surname ."\t\n". $age. "\t".$gender . "\t". $address  . "\t". $experience . "\t" . $image . "\t" . $position . "\r\n");
        fclose($fp);



        require('fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,$first);
        $pdf->Cell(40,10,$surname);
        $pdf->Cell(40,10,$age);
        $pdf->Cell(40,10,$address);
        $pdf->Cell(40,10,$gender);
        $pdf->Cell(40,10,$experience);
        $pdf->Cell(40,10,$position);
        $pdf->Image('images/'. $image,30,30,-300);

        $filename="$first'sCV.pdf";
        $pdf->Output($filename,'F');



        $templateName = 'cvdownload';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }



}