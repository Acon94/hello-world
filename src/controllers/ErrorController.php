<?php
/**
 * Created in textpad
 * User:Andrew B00069517
 * Date: 26/01/2016
 * Time: 10:44
 *
 * controlls error actions
 *
 *
 *
 */
namespace Itb\Controller;


use Silex\Application;
use Itb\Model\User;
use Itb\Model\DatabaseTableRepository;

/**
 * Class ErrorController - manage errors
 * @package Itb
 */

class ErrorController
{

	/**
	*  to retrun if there is a error
	*
	*	@param String $app
	*	@param $code
	*
	*    to retrun if there is a error
	*/
   public function errorAction(Application $app, $code)
       {
       		$applicationrepository = new DatabaseTableRepository('User', ' users');
		   	$users = $applicationrepository->getAll();

           // default - assume a 404 error
           $argsArray = [

           		'users' => $users,

           ];
           $templateName = 'error404';


           if (404 != $code){
               $argsArray = [
                   'message' => 'sorry - an unknow error occurred'
               ];
               $templateName = 'error';
           }

           return $app['twig']->render($templateName . '.html.twig', $argsArray);
       }

}