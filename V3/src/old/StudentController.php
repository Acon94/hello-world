<?php
namespace Itb;

class MainController
{


	    /**
	     * @param \Twig_Environment   $twig
	     */
	     public function studentAction(\Twig_Environment $twig)
		     {
		         $argsArray = [];
		         $template = 'student';
		         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
		         print $htmlOutput;
	     }
	     /**
		 	     * @param \Twig_Environment   $twig
		 	     */
		 	     public function jobAction(\Twig_Environment $twig)
		 		     {
		 		         $argsArray = [];
		 		         $template = 'jobs';
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

    /**
     * @param \Twig_Environment   $twig
     */
    public function listAction(\Twig_Environment $twig)
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
        $dvdRepository = new DatabaseTableRepository('Dvd', 'students');
        $dvd = $dvdRepository->getOneById($id);

        $argsArray = [
            'dvd' => $dvd,
        ];

        $template = 'detail';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }

    /**
     * @param \Twig_Environment   $twig
     */
    public function sitemapAction(\Twig_Environment $twig)
    {
        $argsArray = [];
        $template = 'sitemap';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }
}