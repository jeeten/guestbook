<?php

namespace App\Controller;

use App\Entity\Guest;
use App\Form\GuestType;
use App\Repository\GuestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/guest")
 */
class GuestController extends AbstractController
{

    /**
     * index
     *
     * @param  mixed $guestRepository
     *
     * @return Response
     */

    /**
     * @Route("/", name="guest_index", methods={"GET"})
     */
    public function index(GuestRepository $guestRepository): Response
    {
        $user = $this->getUser();
        $methodName = "findBy";
        $conditions = ['status'=>1];
        // Filtering all the guset for admin login
        if(isset($user) && $user->hasRole('ROLE_ADMIN')){
            $methodName = "findBy";
            $conditions = [];
        }
        // Filtering all the guset for user login
        if(isset($user) && !$user->hasRole('ROLE_ADMIN')){
            $methodName = "findBy";
            $conditions = ['createdBy'=>$user];
        }
    
        return $this->render('guest/index.html.twig', [
            'guests' => $guestRepository->{$methodName}($conditions),
        ]);
    }

    /**
     * new
     *
     * @param  mixed $request
     *
     * @return Response
     */

    /**
     * @Route("/new", name="guest_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $guest = new Guest();
        $form = $this->createForm(GuestType::class, $guest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $entityManager = $this->getDoctrine()->getManager();
            $guest->setCreatedBy($user);
            if(isset($user) && !$user->hasRole('ROLE_ADMIN')){
                $guest->setStatus(0);
            }
            
            $file = $form->get('defimage')->getData();
            if($file){
                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $file->move(
                        $this->getParameter('uploade_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $this->addFlash("error", "Oops, something went wrong!");
                    return $this->redirectToRoute('guest_index');
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
                $guest->setImage($fileName);
            }else{
                $guest->setImage($this->getParameter('default_img'));
            }
            
            $entityManager->persist($guest);
            $entityManager->flush();

            $this->addFlash('success', 'Guest Created, will list after admin approval from ');
            $this->addFlash("error", "Oops, something went wrong!");
            return $this->redirectToRoute('guest_index');
            return $this->redirectToRoute('guest_index');
        }

        return $this->render('guest/new.html.twig', [
            'guest' => $guest,
            'formGuest' => $form->createView(),
        ]);
    }


    /**
     * show
     *
     * @param  mixed $guest
     *
     * @return Response
     */

    /**
     * @Route("/{id}", name="guest_show", methods={"GET"})
     */
    public function show(Guest $guest): Response
    {
        
        return $this->render('guest/show.html.twig', [
            'guest' => $guest,
        ]);
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $guest
     *
     * @return Response
     */    

    /**
     * @Route("/{id}/edit", name="guest_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Guest $guest): Response
    {
        
        $image = $guest->getImage();
        // if($image){
            
        //     $guest->setDefimage(
        //         new File($this->getParameter('uploade_directory').'/'.$image)
        //     ); 

            
        // }

        $form = $this->createForm(GuestType::class, $guest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('defimage')->getData();
            if(isset($file) && $file){

                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                        $file->move(
                        $this->getParameter('uploade_directory'),
                        $fileName
                    );
                    $guest->setImage($fileName);    
                } catch (FileException $e) {
                    $this->addFlash("error", "Oops, something went wrong!");
                    return $this->redirectToRoute('guest_index');
                }
            }else{
                $guest->setImage($image);
            }          
            
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Guest Updated!');    
            return $this->redirectToRoute('guest_index', [
                'id' => $guest->getId(),
            ]);
        }
        
        return $this->render('guest/edit.html.twig', [
            'guest' => $guest,
            'formGuest' => $form->createView(),
        ]);
    }

    /**
     * delete
     *
     * @param  mixed $request
     * @param  mixed $guest
     *
     * @return Response
     */

    /**
     * @Route("/{id}", name="guest_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Guest $guest): Response
    {
        // Validating the CsrfToken
        if ($this->isCsrfTokenValid('delete'.$guest->getId(), $request->request->get('_token'))) {
            // Initializing of doctrine ORM
            $entityManager = $this->getDoctrine()->getManager();
            // Deleting the given object from table
            $entityManager->remove($guest);
            // Domping data
            $entityManager->flush();
            $this->addFlash('success', 'Guest Deleted!');    
        }

        return $this->redirectToRoute('guest_index');
    }

    /**
     * generateUniqueFileName
     *
     * @return void
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        $user = $this->getUser();
        return $user->getId().md5(uniqid());
    }
}
