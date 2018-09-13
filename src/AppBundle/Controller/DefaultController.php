<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations;

/**
 * @Route("/", name="homepage")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/create_user", methods={"POST"})
     * @param Request $request
     * @param UserManager $userManager
     * @return JsonResponse
     */
    public function createUser(Request $request, UserManager $userManager)
    {
        $form = $this->createForm(UserType::class, null, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        /** @var User $user */
        $user = $form->getData();

        $userManager->persist($user);
        $userManager->flush();

        // replace this example code with whatever you need
        return new JsonResponse(
            ['action' => 'Create user', 'message' => "Vytvoren uzivatel {$user->getUsername()}", 'type' => 'success'],
            JsonResponse::HTTP_OK
        );
    }

    /**
     * @Route("/users", methods={"GET"})
     * @Annotations\View(serializerGroups={
     *   "user_base"
     * })
     * @param UserManager $userManager
     * @return array|JsonResponse
     */
    public function requestUsers(UserManager $userManager)
    {
        return $userManager->userRepository->findAll();
    }

    /**
     * @Route("/user/{user}", methods={"GET"})
     * @Annotations\View(serializerGroups={
     *   "user_base"
     * })
     * @param User $user
     * @return User
     */
    public function requestUser(User $user){
        return $user;
    }






}
