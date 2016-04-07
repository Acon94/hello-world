<?php
require_once __DIR__ . '/../app/setup.php';

use Itb\MainController;
use Itb\MessageController;




// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

// get ID from request
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$mainController = new MainController();
$messageController = new MessageController();


switch ($action){

    case 'about':
        $mainController->aboutAction($twig);
        break;


		    case 'job':
		        $mainController->jobAction($twig);
		        break;
		    case 'cv':
			        $mainController->cvAction($twig,$id);
		        break;
	case 'processLogin':
     		$mainController->processLoginAction($twig);
     	break;
    case 'contact':
        $mainController->contactAction($twig);
        break;
    case 'list':
        $mainController->listAction($twig);
        break;
    case 'job':
	        $mainController->jobAction($twig);
        break;
    case 'cv':
		        $mainController->cvAction($twig);
        break;
     case 'comments':
	 		$mainController->commentsAction($twig);
        break;
     case 'viewComments':
	 	 		$messageController->ViewcommentsAction($twig);
        break;
    case 'detail':
        $mainController->detailAction($twig,$id);
        break;
    case 'sitemap':
        $mainController->sitemapAction($twig);
        break;
    case 'filterList':
        $mainController->filterListAction($twig);
        break;
    case 'filterListTitleOrCategory':
        $mainController->filterListTitleorCategoryAction($twig);
        break;
    case 'login':
        $mainController->loginAction($twig);
        break;
    case 'CreateJob':
	        $mainController->jobcreationAction($twig);
        break;
     case 'viewCVs':
	 	   $mainController->viewCVAction($twig);
        break;
     case 'processLogin':
		        $mainController->processLoginAction();
        break;
    case 'processMessageForm':
        $messageController->commentsubmitAction($twig);
        break;
        case 'processCVForm':
		        $messageController->cvsubmitAction($twig);
        break;
     case 'Comments':
	         $mainController->commentAction($twig);
        break;
     case 'processJobsForm':
	        $messageController->submitAction($twig);
        break;
     case 'students':
	 	        $mainController->studentsAction($twig);
        break;
    case 'processMessageUpdateForm':
        $messageController->updateAction($twig);
        break;
      case 'processCVUpdateForm':
	        $messageController->updateCVAction($twig);
        break;
    case 'editMessage':
        $messageController->studentEditAction($twig);
        break;
    case 'deleteMessage':
        $messageController->deleteAction($twig);
        break;
    case 'index':
    default:
        $mainController->indexAction($twig);

}
