<?php
session_start();

 echo "<p style='margin-top:3%;'>WELCOME".$_SESSION['username'].




 "</p>";
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

	 case 'processMessageForm':
	        $messageController->submitAction($twig);
	        break;
	     case 'processJobsForm':
		    $messageController->submitAction($twig);
        break;
	    case 'processMessageUpdateForm':
	        $messageController->updateAction($twig);
	        break;
	    case 'editMessage':
	        $messageController->messageEditAction($twig);
	        break;
	    case 'deleteMessage':
	        $messageController->deleteAction($twig);
        break;

    default:
       $messageController->lecturerAction($twig);

}
