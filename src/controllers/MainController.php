<?php
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
 *
 *
 *
 */

class MainController
{




	    /**
	     * @param \Twig_Environment   $twig
	     */
	      public function processLoginAction(Request $request, Application $app)
		     {
		     	//session_start();
		         // default is bad login
		         $isLoggedIn = false;




		         $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		         $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);



		         $role = User::checkRole($username);

		         // search for user with username in repository
		         $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);
 				$id = User::retrieveID($username);


					$b= "1";//student
					$c= "2";
					$a= "3";
		         // action depending on login success
		         if($isLoggedIn){



				if($role[0] == $b)
					{
								 session_start();
								 $_SESSION['username'] = $username;
								if (isset($_SESSION['username'])) {
								  echo $_SESSION['username'];
								  $_SESSION['id'] = $id[0];

									//$twig->addGlobal("session", $_SESSION);


 									}

		            	  $argsArray = [
									'id'=> $id[0],
		            	  ];

						$templateName = 'student';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
		             }
		             else if($role[0] == $a)
		             {

		             	$_SESSION['username'] = $username;


				          $dvdRepository = new DatabaseTableRepository('Stydent', 'applicants');
				          $jobRepository = new DatabaseTableRepository('Job', 'jobs');

						  	        $dvds = $dvdRepository->getAll();
						  	        $jobs = $jobRepository->getAll();

						  	        $argsArray = [
						  	            'dvds' => $dvds,
						  	            'jobs' => $jobs,
						  	        ];


				            $templateName = 'emloyer';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
       					}

		               else if($role[0] == $c)
					 		             {

								 session_start();
					 		          $_SESSION['username'] = $username;
					 		           if (isset($_SESSION['username'])) {

									   echo $_SESSION['username'];


 										}

					 		             $dvdRepository = new DatabaseTableRepository('Stydent', 'students');
										         $dvds = $dvdRepository->getAll();

										         $argsArray = [
										             'dvds' => $dvds,
       															 ];
					 		             	$argsArray = [];
					 						 $templateName = 'lecturer';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
		             }



		         }

      }
	     public function studentAction(\Twig_Environment $twig)
		     {

		         $argsArray = ['id'=> $id[0],];
		         $template = 'student';
		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		         print $htmlOutput;
	     }
	     public function jobcreationAction(Request $request, Application $app)
		 		     {
		 		         $argsArray = [];
		 		           $templateName = 'jobcreation';
		          return $app['twig']->render($templateName . '.html.twig', $argsArray);
	     }

	     public function loginAction(Request $request, Application $app)
		  {
		 		         $argsArray = [];
		 		         $templateName = 'login';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
	     }
	     /**
		 * @param \Twig_Environment   $twig
		 */
		 public function jobAction(Request $request, Application $app)
		     {

		        session_start();
		        $id = $_SESSION['id'];
		        $_SESSION['id'] = $id;

		        print_r($id);


		         $jobrepo = new DatabaseTableRepository('Job', 'jobs');
		         $cvrepository = new DatabaseTableRepository('CV', 'cvs');

		         $jobs = $jobrepo->getAll();
		         $cvs = $cvrepository->getOneById($id);




		         $argsArray = [
		             'jobs' => $jobs,
		             'id' => $id,
		             'cvs' => $cvs,




		         ];

		         $templateName = 'job';
		          return $app['twig']->render($templateName . '.html.twig', $argsArray);
		     }
		       /**
			 		 * @param \Twig_Environment   $twig
			 		 */
			 		 public function commentAction(\Twig_Environment $twig)
			 		     {
			 		         $jobrepo = new DatabaseTableRepository('Job', 'jobs');
			 		         $jobs = $jobrepo->getAll();

			 		         $argsArray = [
			 		             'jobs' => $jobs,

			 		         ];

			 		         $template = 'comments';
			 		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
			 		         print $htmlOutput;
		     }
		      /**
			  * @param \Twig_Environment   $twig
			  */
			public function cvAction(Request $request, Application $app,$id)
			    {
						session_start();
												        $id = $_SESSION['id'];
												        $_SESSION['id'] = $id;

		        print_r($id);


			    $cvrepository = new DatabaseTableRepository('CV', 'cvs');
			    $jobrepository = new DatabaseTableRepository('Job', 'jobs');

					   	    $cvs = $cvrepository->getOneById($id);





					   		 		         $argsArray = [
					   			 		             'cvs' => $cvs,
					   			 		             'id' => $id,
					   			 		          ];

			       		 $templateName = 'cv';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
    		}
		     /**
			 			  * @param \Twig_Environment   $twig
			 			  */
			 			  public function viewCVAction(Request $request, Application $app)
			 			     {
			 			     	$dvdRepository = new DatabaseTableRepository('CV', 'cvs');
								        $cvs = $dvdRepository->getAll();

								        $argsArray = [
								            'cvs' => $cvs,
								        ];

								       $templateName = 'viewCV';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
		     }
		     /**
			 			  * @param \Twig_Environment   $twig
			 			  */
			 			  public function commentsAction(Request $request, Application $app)
			 			     {
			 			         $jobrepo = new DatabaseTableRepository('Job', 'jobs');
			 			         $jobs = $jobrepo->getAll();

			 	 		         $argsArray = [
			 		 		             'jobs' => $jobs,
			 			 		         ];


			 	 		        $templateName = 'comments';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);

			 	 		       }

			 	 		 /**
						  * @param \Twig_Environment   $twig
						  */
						 			 			  public function privateCommentsAction(Request $request, Application $app,$id)
						 			 			     {
						 			 			         $jobrepo = new DatabaseTableRepository('Student', 'students');
						 			 			         $students = $jobrepo->getAll();

						 			 	 		         $argsArray = [
						 			 		 		             'student' => $students,
						 			 		 		             'id' => $id,
						 			 			 		         ];


						 			 	 		        $templateName = 'Privatecomments';
						         				return $app['twig']->render($templateName . '.html.twig', $argsArray);

			 	 		       }


    /**
     * @param \Twig_Environment   $twig
     */
    public function aboutAction(\Twig_Environment $twig)
    {
        $argsArray = [];
        $template = 'about';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }



    /**
     * @param \Twig_Environment   $twig
     */
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];

        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function lecturerAction(\Twig_Environment $twig)
	    {
	        $argsArray = [];
	        $template = 'index';
	        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
	        print $htmlOutput;
    }

    /**
     * @param \Twig_Environment   $twig
     */
    public function listAction(Request $request, Application $app)
    {
    	 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		 $cvrepository = new DatabaseTableRepository('CV', 'cvs');
	     $cvs = $cvrepository->getCV($id);

		 		         $argsArray = [
			 		             'cvs' => $cvs,
				 		         ];


 						 $templateName = 'list';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    /**
	     * @param \Twig_Environment   $twig
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

        public function studentsAction(Request $request, Application $app)
		    {
		        $dvdRepository = new DatabaseTableRepository('Stydent', 'students');
		        $dvds = $dvdRepository->getAll();

		        $argsArray = [
		            'dvds' => $dvds,
		        ];

		       			 $templateName = 'students';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param \Twig_Environment   $twig
     */
    public function filterListAction(\Twig_Environment $twig)
    {
        $searchText = filter_input(INPUT_POST, 'searchText', FILTER_SANITIZE_STRING);

        $dvdRepository = new DatabaseTableRepository('Stydent', 'students');
        $dvds = $dvdRepository->searchByColumn('first', $searchText);

        $argsArray = [
            'dvds' => $dvds,
            'searchText' => $searchText
        ];

        $template = 'list';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }

    /**
     * @param \Twig_Environment   $twig
     */
    public function filterListTitleorCategoryAction(\Twig_Environment $twig)
    {
        $searchText = filter_input(INPUT_POST, 'searchText', FILTER_SANITIZE_STRING);

        $dvdRepository = new DvdRepository();
        $dvds = $dvdRepository->searchByTitleOrCategory($searchText);

        $argsArray = [
            'students' => $dvds,
            'searchText' => $searchText
        ];

        $template = 'list';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }



    /**
     * @param \Twig_Environment   $twig
     */
    public function detailAction(Request $request, Application $app ,$id)
    {
       $cvrepository = new DatabaseTableRepository('CV', 'cvs');
	   	     $cvs = $cvrepository->getOneById($id);

	   		 		         $argsArray = [
	   			 		             'cvs' => $cvs,
				 		         ];

       					$templateName = 'detail';
        				return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


	    /**
	     * @param \Twig_Environment   $twig
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