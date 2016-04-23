<?php
require_once __DIR__ . '/../app/setup.php';

$app->get('/', 'Itb\Controller\MainController::indexAction');
$app->get('/login', 'Itb\Controller\MainController::loginAction');
$app->get('/logout', 'Itb\Controller\MainController::loginAction');

$app->post('/processLogin', 'Itb\Controller\LoginController::processLoginAction');
$app->post('/processCVForm', 'Itb\Controller\MessageController::cvsubmitAction');
$app->post('/processJobsForm', 'Itb\Controller\LecturerController::submitAction');
$app->post('/processMessageForm', 'Itb\Controller\MessageController::commentsubmitAction');
$app->post('/processPrivateMessageForm', 'Itb\Controller\MessageController::privatecommentsubmitAction');
$app->post('/createStudent', 'Itb\Controller\MessageController::createStudentAction');
$app->post('/processCreateStudentForm', 'Itb\Controller\MessageController::createStudentsubmitAction');
$app->post('/deleteStudent&{id}', 'Itb\Controller\MessageController::deleteAction');
$app->post('/editStudent&{id}', 'Itb\Controller\MessageController::studentEditAction');
$app->post('/privateMessage&{id}', 'Itb\Controller\LecturerController::privateCommentsAction');
$app->get('/Viewprivatemessages&{id}', 'Itb\Controller\StudentController::viewPrivateMessagesAction');
$app->post('/processCVUpdateForm', 'Itb\Controller\MessageController::updateCVAction');
$app->post('/apply&{id}', 'Itb\Controller\MessageController::jobApplyAction');
$app->post('/employ&{id}', 'Itb\Controller\LecturerController::employAction');



//redirect

$app->get('/Comments', 'Itb\Controller\LecturerController::commentsAction');
$app->get('/student', 'Itb\Controller\MainController::studentAction');
$app->get('/cv&{id}', 'Itb\Controller\StudentController::cvAction');
$app->get('/job', 'Itb\Controller\StudentController::jobAction');
$app->get('/viewComments', 'Itb\Controller\StudentController::ViewcommentsAction');


$app->get('/CreateJob', 'Itb\Controller\LecturerController::jobcreationAction');
$app->get('/downloadCV&{id}', 'Itb\Controller\MainController::cvdownloadAction');
$app->get('/viewCVs', 'Itb\Controller\LecturerController::viewCVAction');
$app->get('/students', 'Itb\Controller\LecturerController::studentsAction');
$app->get('/detail&{id}', 'Itb\Controller\LecturerController::detailAction');



$app->error(function (\Exception $e, $code) use ($app) {
    $errorController = new Itb\Controller\ErrorController();
    return $errorController->errorAction($app, $code);
});

$app->run();