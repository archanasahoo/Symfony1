<?php

namespace Ibw\JobeetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ibw\JobeetBundle\Entity\Job;
use Ibw\JobeetBundle\Form\JobType;

/**
 * Job controller.
 *
 */
class JobController extends Controller
{

    /**
     * Lists all Job entities.
     *
     */
    public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
	 
		$categories = $em->getRepository('IbwJobeetBundle:Category')->getWithJobs();
	 
		foreach($categories as $category)
		{
			$category->setActiveJobs($em->getRepository('IbwJobeetBundle:Job')->getActiveJobs($category->getId(), $this->container->getParameter('max_jobs_on_homepage')));
			$category->setMoreJobs($em->getRepository('IbwJobeetBundle:Job')->countActiveJobs($category->getId()) - $this->container->getParameter('max_jobs_on_homepage'));
		}
	 
		return $this->render('IbwJobeetBundle:Job:index.html.twig', array(
			'categories' => $categories
		));
	}
    /**
     * Creates a new Job entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Job();
        $form = $this->createForm(new JobType(), $entity);
        $form->bind($request);
 
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
 
            $em->persist($entity);
            $em->flush();
 
			return $this->redirect($this->generateUrl('ibw_job_preview', array(
            'company' => $entity->getCompanySlug(),
            'location' => $entity->getLocationSlug(),
            'token' => $entity->getToken(),
            'position' => $entity->getPositionSlug()
        )));
        }
 
        return $this->render('IbwJobeetBundle:Job:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Job entity.
     *
     * @param Job $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Job $entity)
    {
        $form = $this->createForm(new JobType(), $entity, array(
            'action' => $this->generateUrl('ibw_job_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Job entity.
     *
     */
    public function newAction()
    {
		$entity = new Job();
        $entity->setType('full-time');
        $form = $this->createForm(new JobType(), $entity);
 
        return $this->render('IbwJobeetBundle:Job:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Finds and displays a Job entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IbwJobeetBundle:Job')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IbwJobeetBundle:Job:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Job entity.
     *
     */
    public function editAction($token)
    {
        $em = $this->getDoctrine()->getManager();
 
        $entity = $em->getRepository('IbwJobeetBundle:Job')->findOneByToken($token);
 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }
		
		if ($entity->getIsActivated()) {
        	throw $this->createNotFoundException('Job is activated and cannot be edited.');
    	}
 
        $editForm = $this->createForm(new JobType(), $entity);
        $deleteForm = $this->createDeleteForm($token);
 
        return $this->render('IbwJobeetBundle:Job:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }  

    /**
    * Creates a form to edit a Job entity.
    *
    * @param Job $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Job $entity)
    {
        $form = $this->createForm(new JobType(), $entity, array(
            'action' => $this->generateUrl('ibw_job_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Job entity.
     *
     */
     public function updateAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
 
        $entity = $em->getRepository('IbwJobeetBundle:Job')->findOneByToken($token);
 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }
 
        $editForm   = $this->createForm(new JobType(), $entity);
        $deleteForm = $this->createDeleteForm($token);
 
        $editForm->bind($request);
 
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
 
            return $this->redirect($this->generateUrl('ibw_job_edit', array('token' => $token)));
        }
 
        return $this->redirect($this->generateUrl('ibw_job_preview', array(
            'company' => $entity->getCompanySlug(),
            'location' => $entity->getLocationSlug(),
            'token' => $entity->getToken(), 
            'position' => $entity->getPositionSlug()
        )));
    }
 
    public function deleteAction(Request $request, $token)
    {
        $form = $this->createDeleteForm($token);
        $form->bind($request);
 
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IbwJobeetBundle:Job')->findOneByToken($token);
 
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Job entity.');
            }
 
            $em->remove($entity);
            $em->flush();
        }
 
        return $this->redirect($this->generateUrl('ibw_job'));
    }
 
    /**
     * Creates a form to delete a Job entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($token)
    {
        return $this->createFormBuilder(array('token' => $token))
            ->add('token', 'hidden')
            ->getForm()
        ;
    }
	
	public function previewAction($token)
    {
        $em = $this->getDoctrine()->getManager();
 
        $entity = $em->getRepository('IbwJobeetBundle:Job')->findOneByToken($token);
 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }
 
		$deleteForm = $this->createDeleteForm($entity->getToken());
        $publishForm = $this->createPublishForm($entity->getToken());
		$extendForm = $this->createExtendForm($entity->getToken());
 
		return $this->render('IbwJobeetBundle:Job:show.html.twig', array(
			'entity'      => $entity,
			'delete_form' => $deleteForm->createView(),
			'publish_form' => $publishForm->createView(),
			'extend_form' => $extendForm->createView(),
		));
    }
	
	public function publishAction(Request $request, $token)
	{
		$form = $this->createPublishForm($token);
		$form->bind($request);
	 
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('IbwJobeetBundle:Job')->findOneByToken($token);
	 
			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Job entity.');
			}
	 
			$entity->publish();
			$em->persist($entity);
			$em->flush();
	 
			$this->get('session')->getFlashBag()->add('notice', 'Your job is now online for 30 days.');
		}
	 
		return $this->redirect($this->generateUrl('ibw_job_preview', array(
			'company' => $entity->getCompanySlug(),
			'location' => $entity->getLocationSlug(),
			'token' => $entity->getToken(),
			'position' => $entity->getPositionSlug()
		)));
	}
	 
	private function createPublishForm($token)
	{
		return $this->createFormBuilder(array('token' => $token))
			->add('token', 'hidden')
			->getForm()
		;
	}
 	
	public function extendAction(Request $request, $token)
	{
		$form = $this->createExtendForm($token);
		$request = $this->getRequest();
	 
		$form->bind($request);
	 
		if($form->isValid()) {
			$em=$this->getDoctrine()->getManager();
			$entity = $em->getRepository('IbwJobeetBundle:Job')->findOneByToken($token);
	 
			if(!$entity){
				throw $this->createNotFoundException('Unable to find Job entity.');
			}
	 
			if(!$entity->extend()){
				throw $this->createNodFoundException('Unable to extend the Job');
			}
	 
			$em->persist($entity);
			$em->flush();
	 
			$this->get('session')->getFlashBag()->add('notice', sprintf('Your job validity has been extended until %s', $entity->getExpiresAt()->format('m/d/Y')));
		}
	 
		return $this->redirect($this->generateUrl('ibw_job_preview', array(
			'company' => $entity->getCompanySlug(),
			'location' => $entity->getLocationSlug(),
			'token' => $entity->getToken(),
			'position' => $entity->getPositionSlug()
		)));
	}
 
	private function createExtendForm($token)
	{
		return $this->createFormBuilder(array('token' => $token))
			->add('token', 'hidden')
			->getForm();
	}

}
