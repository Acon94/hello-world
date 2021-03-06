<?php
namespace Itb;

class MessageController
{
		 public function lecturerAction(\Twig_Environment $twig)
			     {
			         $jobrepo = new DatabaseTableRepository('Job', 'jobs');
			         $jobs = $jobrepo->getAll();

			         $argsArray = [
			             'jobs' => $jobs,
			         ];

			         $template = 'lecturer';
			         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
			         print $htmlOutput;
		     }
		     public function commentsAction(\Twig_Environment $twig)
			 			     {
			 			         $jobrepo = new DatabaseTableRepository('Job', 'jobs');
			 			         $jobs = $jobrepo->getAll();

			 			         $argsArray = [
			 			             'jobs' => $jobs,
			 			         ];

			 			         $template = 'lecturer';
			 			         $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
			 			         print $htmlOutput;
		     }
    public function messagesAction(\Twig_Environment $twig)
    {
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $messages = $messageRepository->getAll();

        $argsArray = [
            'messages' => $messages,
        ];

        $template = 'messages';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }
       public function ViewCommentsAction(\Twig_Environment $twig)
	    {
	//        $messageRepository = new MessageRepository();
	        $messageRepository = new DatabaseTableRepository('Message', 'messages');

	        $messages = $messageRepository->getAll();

	        $argsArray = [
	            'messages' => $messages,
	        ];

	        $template = 'viewcomments';
	        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
	        print $htmlOutput;
    }

    public function messagesAsJSONAction(\Twig_Environment $twig)
    {
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $messages = $messageRepository->getAll();

        $argsArray = [
            'messages' => $messages,
        ];

        $template = 'messagesAsJSON';
        $htmlOutput = $twig->render($template . '.json.twig', $argsArray);
        print $htmlOutput;
    }
        public function cvsubmitAction($twig)
			{
		   		   $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
		           $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
		           $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
		           $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
		           $gender= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
		           $experience= filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_STRING);
		           $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);






		           // get Unix timestamp for the current time
		           $now = new \DateTime();
		           $timestamp = $now->getTimestamp();

		           // create message object
		           $cv = new CV();
		           $cv->setFirst($first);
		           $cv->setSurname($surname);
		           $cv->setAge($age);
		           $cv->setAddress($address);
		           $cv->setGender($gender);
		           $cv->setExperience($experience);



		           // use MessageRepository to store new Message object
		   //        $messageRepository = new MessageRepository();
		           $messageRepository = new DatabaseTableRepository('CV', 'cvs');

		               $messageRepository->create($cv);

					               $this->commentsAction($twig);


	       }
     public function commentsubmitAction($twig)
		{
	    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
	           $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

	           // get Unix timestamp for the current time
	           $now = new \DateTime();
	           $timestamp = $now->getTimestamp();

	           // create message object
	           $message = new Message();
	           $message->setText($text);
	           $message->setUser($user);
	           $message->setTimestamp($timestamp);

	           // use MessageRepository to store new Message object
	   //        $messageRepository = new MessageRepository();
	           $messageRepository = new DatabaseTableRepository('Message', 'messages');

	               $messageRepository->create($message);

				               $this->commentsAction($twig);


	       }

    public function submitAction($twig)
    {
        // now sanitise with filter_var()
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $expires = filter_input(INPUT_POST, 'expires', FILTER_SANITIZE_STRING);

        // create message object
        $job = new JobCreation();
        $job->setPosition($position);
        $job->setLocation($location);
        $job->setExpires($expires);
        $job->setUser($user);

        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('JobCreation', 'jobs');
        if($messageRepository->create($job)){
            $this->lecturerAction($twig);
        } else {
            $errorMessage = 'there was a problem adding your message to the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }


    public function deleteAction($twig)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        if($messageRepository->delete($id)){
            $this->messagesAction($twig);
        } else {
            $errorMessage = 'there was a problem delete message with id ' . $id . 'to the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }

    }

    public function messageEditAction(\Twig_Environment $twig)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $messageRepository = new DatabaseTableRepository('Message', 'messages');

        $message = $messageRepository->getOneById($id);

        $argsArray = [
            'message' => $message,
        ];

        $template = 'messageEdit';
        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
        print $htmlOutput;
    }
      public function studentEditAction(\Twig_Environment $twig)
	    {
	        // now sanitise with filter_var()
	        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	        $messageRepository = new DatabaseTableRepository('Student', 'students');

	        $student = $messageRepository->getOneById($id);

	        $argsArray = [
	            'student' => $student,
	        ];

	        $template = 'studentEdit';
	        $htmlOutput = $twig->render($template . '.html.twig', $argsArray);
	        print $htmlOutput;
    }

    public function updateAction($twig)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

        // get Unix timestamp for the current time
        $now = new \DateTime();
        $timestamp = $now->getTimestamp();

        // create message object
        $message = new Message();
        $message->setText($text);
        $message->setUser($user);
        $message->setTimestamp($timestamp);

        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Message', 'messages');
        if($messageRepository->update($message, $id)){
            $this->messagesAction($twig);
        } else {
            $errorMessage = 'there was a problem editing your message in the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }



public function updateCVAction($twig)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gpa = filter_input(INPUT_POST, 'gpa', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);



        // create message object
        $student = new Student();
        $student->setFirst($first);
        $student->setSurname($surname);
        $student->setAge($age);
        $student->setGpa($gpa);
        $student->setStatus($status);



        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DatabaseTableRepository('Student', 'students');
        if($messageRepository->update($student, $id)){
            $this->studentEditAction($twig);
        } else {
            $errorMessage = 'there was a problem editing your message in the database ...';
            $errorController = new ErrorController();
            $errorController->messagesAction($twig, $errorMessage);
        }
    }


}