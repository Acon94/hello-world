<?php
namespace Itb;

class MainController
{




	    /**
	     * @param \Twig_Environment   $twig
	     */
	      public function processLoginAction(\Twig_Environment $twig)
		     {
		     	session_start();
		         // default is bad login
		         $isLoggedIn = false;




		         $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		         $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
		         $role = User::checkRole($username);

		         // search for user with username in repository
		         $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);


					$b= "1";
					$c= "2";
					$a= "3";
		         // action depending on login success
		         if($isLoggedIn){



				if($role[0] == $b)
					{

		         				$_SESSION['username'] = $username;
				 				$_SESSION['loggedIn'] = true;

		            	  $argsArray = [];
						  $template = 'student';
						  $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		         			print $htmlOutput;
		             }
		             else if($role[0] == $a)
		             {
		             $dvdRepository = new DatabaseTableRepository('Dvd', 'students');
				           $dvds = $dvdRepository->getAll();

				           $argsArray = [
				               'dvds' => $dvds,
				           ];

				           $template = 'list';
				           $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
       						 print $htmlOutput;
       					}

		               else if($role[0] == $c)
					 		             {
					 		             $dvdRepository = new DatabaseTableRepository('Dvd', 'students');
										         $dvds = $dvdRepository->getAll();

										         $argsArray = [
										             'dvds' => $dvds,
       															 ];
					 		             	$argsArray = [];
					 						 $template = 'lecturer';
					 						  $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
					 		         			print $htmlOutput;
		             }



		         }

      }
	     public function studentAction(\Twig_Environment $twig)
		     {
		         $argsArray = [];
		         $template = 'student';
		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		         print $htmlOutput;
	     }
	     public function jobcreationAction(\Twig_Environment $twig)
		 		     {
		 		         $argsArray = [];
		 		         $template = 'jobcreation';
		 		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		 		         print $htmlOutput;
	     }

	         public function loginAction(\Twig_Environment $twig)
		 		     {
		 		         $argsArray = [];
		 		         $template = 'login';
		 		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		 		         print $htmlOutput;
	     }
	     /**
		 * @param \Twig_Environment   $twig
		 */
		 public function jobAction(\Twig_Environment $twig)
		     {
		         $jobrepo = new DatabaseTableRepository('Job', 'jobs');
		         $jobs = $jobrepo->getAll();

		         $argsArray = [
		             'jobs' => $jobs,
		         ];

		         $template = 'job';
		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		         print $htmlOutput;
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
			public function cvAction(\Twig_Environment $twig, $id)
			    {
			    $cvrepository = new DatabaseTableRepository('CV', 'cvs');
					   	     $cvs = $cvrepository->getOneById($id);

					   		 		         $argsArray = [
					   			 		             'cvs' => $cvs,
				 		         ];

			        $template = 'cv';
			        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
			        print $htmlOutput;
    		}
		     /**
			 			  * @param \Twig_Environment   $twig
			 			  */
			 			  public function viewCVAction(\Twig_Environment $twig)
			 			     {
			 			     	$dvdRepository = new DatabaseTableRepository('CV', 'cvs');
								        $cvs = $dvdRepository->getAll();

								        $argsArray = [
								            'cvs' => $cvs,
								        ];

								        $template = 'viewCV';
								        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
								        print $htmlOutput;
		     }
		     /**
			 			  * @param \Twig_Environment   $twig
			 			  */
			 			  public function commentsAction(\Twig_Environment $twig)
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
    public function indexAction(\Twig_Environment $twig)
    {
        $argsArray = [];
        $template = 'index';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
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
    public function listAction(\Twig_Environment $twig)
    {
    	 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		 $cvrepository = new DatabaseTableRepository('CV', 'cvs');
	     $cvs = $cvrepository->getCV($id);

		 		         $argsArray = [
			 		             'cvs' => $cvs,
				 		         ];



        $template = 'list';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }
    /**
	     * @param \Twig_Environment   $twig
	     */
	    public function employerAction(\Twig_Environment $twig)
	    {
	        $dvdRepository = new DatabaseTableRepository('Dvd', 'students');
	        $dvds = $dvdRepository->getAll();

	        $argsArray = [
	            'dvds' => $dvds,
	        ];

	        $template = 'emloyer';
	        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
	        print $htmlOutput;
    }

        public function studentsAction(\Twig_Environment $twig)
		    {
		        $dvdRepository = new DatabaseTableRepository('Dvd', 'students');
		        $dvds = $dvdRepository->getAll();

		        $argsArray = [
		            'dvds' => $dvds,
		        ];

		        $template = 'students';
		        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		        print $htmlOutput;
    }

    /**
     * @param \Twig_Environment   $twig
     */
    public function filterListAction(\Twig_Environment $twig)
    {
        $searchText = filter_input(INPUT_POST, 'searchText', FILTER_SANITIZE_STRING);

        $dvdRepository = new DatabaseTableRepository('Dvd', 'students');
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
    public function detailAction(\Twig_Environment $twig, $id)
    {
       $cvrepository = new DatabaseTableRepository('CV', 'cvs');
	   	     $cvs = $cvrepository->getOneById($id);

	   		 		         $argsArray = [
	   			 		             'cvs' => $cvs,
				 		         ];

        $template = 'detail';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }



}