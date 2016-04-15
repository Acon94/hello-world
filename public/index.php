<?php
require_once __DIR__ . '/../app/setup.php';

$app->get('/', 'Itb\Controller\MainController::indexAction');
$app->get('/login', 'Itb\Controller\MainController::loginAction');

$app->post('/processLogin', 'Itb\Controller\MainController::processLoginAction');
$app->post('/processCVForm', 'Itb\Controller\MessageController::cvsubmitAction');
$app->post('/processJobsForm', 'Itb\Controller\MessageController::submitAction');
$app->post('/processMessageForm', 'Itb\Controller\MessageController::commentsubmitAction');
$app->post('/processPrivateMessageForm', 'Itb\Controller\MessageController::privatecommentsubmitAction');
$app->post('/createStudent', 'Itb\Controller\MessageController::createStudentAction');
$app->post('/processCreateStudentForm', 'Itb\Controller\MessageController::createStudentsubmitAction');
$app->post('/deleteStudent&{id}', 'Itb\Controller\MessageController::deleteAction');
$app->post('/editStudent&{id}', 'Itb\Controller\MessageController::studentEditAction');
$app->post('/privateMessage&{id}', 'Itb\Controller\MainController::privateCommentsAction');
$app->get('/Viewprivatemessages&{id}', 'Itb\Controller\MessageController::viewPrivateMessagesAction');
$app->post('/processCVUpdateForm', 'Itb\Controller\MessageController::updateCVAction');
$app->post('/apply&{id}', 'Itb\Controller\MessageController::jobApplyAction');


//redirect

$app->get('/Comments', 'Itb\Controller\MainController::commentsAction');
$app->get('/student', 'Itb\Controller\MainController::studentAction');
$app->get('/cv&{id}', 'Itb\Controller\MainController::cvAction');
$app->get('/job', 'Itb\Controller\MainController::jobAction');
$app->get('/viewComments', 'Itb\Controller\MessageController::ViewcommentsAction');


$app->get('/CreateJob', 'Itb\Controller\MainController::jobcreationAction');
$app->get('/downloadCV&{id}', 'Itb\Controller\MainController::cvdownloadAction');
$app->get('/viewCVs', 'Itb\Controller\MainController::viewCVAction');
$app->get('/Comments', 'Itb\Controller\MainController::commentAction');
$app->get('/students', 'Itb\Controller\MainController::studentsAction');
$app->get('/detail&{id}', 'Itb\Controller\MainController::detailAction');



$app->error(function (\Exception $e, $code) use ($app) {
    $errorController = new Itb\Controller\ErrorController();
    return $errorController->errorAction($app, $code);
});

$app->run();