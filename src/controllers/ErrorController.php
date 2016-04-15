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
           // default - assume a 404 error
           $argsArray = [];
           $templateName = '404';

           if (404 != $code){
               $argsArray = [
                   'message' => 'sorry - an unknow error occurred'
               ];
               $templateName = 'error';
           }

           return $app['twig']->render($templateName . '.html.twig', $argsArray);
       }

}