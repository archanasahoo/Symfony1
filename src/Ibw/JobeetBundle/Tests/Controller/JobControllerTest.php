<?php
namespace Ibw\JobeetBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobControllerTest extends WebTestCase
{
	public function testJobForm()
	{
		$client = static::createClient();
	 
		$crawler = $client->request('GET', '/job/new');
		$this->assertEquals('Ibw\JobeetBundle\Controller\JobController::newAction', $client->getRequest()->attributes->get('_controller'));
	 
		$form = $crawler->selectButton('Preview your job')->form(array(
			'job[company]'      => 'Sensio Labs',
			'job[url]'          => 'http://www.sensio.com/',
			'job[file]'         => __DIR__.'/../../../../../web/bundles/ibwjobeet/images/sensio-labs.gif',
			'job[position]'     => 'Developer',
			'job[location]'     => 'Atlanta, USA',
			'job[description]'  => 'You will work with symfony to develop websites for our customers.',
			'job[how_to_apply]' => 'Send me an email',
			'job[email]'        => 'for.a.job@example.com',
			'job[is_public]'    => false,
		));
		
		 
		$client->followRedirect();
    	$this->assertEquals('Ibw\JobeetBundle\Controller\JobController::previewAction', $client->getRequest()->attributes->get('_controller'));
		
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	 
		$query = $em->createQuery('SELECT count(j.id) from IbwJobeetBundle:Job j WHERE j.location = :location AND j.is_activated IS NULL AND j.is_public = 0');
		$query->setParameter('location', 'Atlanta, USA');
		$this->assertTrue(0 < $query->getSingleScalarResult());
		
		$crawler = $client->request('GET', '/job/new');
		$form = $crawler->selectButton('Preview your job')->form(array(
			'job[company]'      => 'Sensio Labs',
			'job[position]'     => 'Developer',
			'job[location]'     => 'Atlanta, USA',
			'job[email]'        => 'not.an.email',
		));
		$crawler = $client->submit($form);
	 
		// check if we have 3 errors
		$this->assertTrue($crawler->filter('.error_list')->count() == 3);
	 
		// check if we have error on job_description field
		$this->assertTrue($crawler->filter('#job_description')->siblings()->first()->filter('.error_list')->count() == 1);
	 
		// check if we have error on job_how_to_apply field
		$this->assertTrue($crawler->filter('#job_how_to_apply')->siblings()->first()->filter('.error_list')->count() == 1);
	 
		// check if we have error on job_email field
		$this->assertTrue($crawler->filter('#job_email')->siblings()->first()->filter('.error_list')->count() == 1);
		
	}
	
	public function createJob($values = array(), $publish = false)
	{
		$client = static::createClient();
		$crawler = $client->request('GET', '/job/new');
		$form = $crawler->selectButton('Preview your job')->form(array_merge(array(
			'job[company]'      => 'Sensio Labs',
			'job[url]'          => 'http://www.sensio.com/',
			'job[position]'     => 'Developer',
			'job[location]'     => 'Atlanta, USA',
			'job[description]'  => 'You will work with symfony to develop websites for our customers.',
			'job[how_to_apply]' => 'Send me an email',
			'job[email]'        => 'for.a.job@example.com',
			'job[is_public]'    => false,
	  ), $values));
	 
		$client->submit($form);
		$client->followRedirect();
	 
		if($publish) {
		  $crawler = $client->getCrawler();
		  $form = $crawler->selectButton('Publish')->form();
		  $client->submit($form);
		  $client->followRedirect();
		}
	 
	  return $client;
	}
	
	public function testPublishJob()
	{
		$client = $this->createJob(array('job[position]' => 'FOO1'));
		$crawler = $client->getCrawler();
		$form = $crawler->selectButton('Publish')->form();
		$client->submit($form);
	 
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	 
		$query = $em->createQuery('SELECT count(j.id) from IbwJobeetBundle:Job j WHERE j.position = :position AND j.is_activated = 1');
		$query->setParameter('position', 'FOO1');
		$this->assertTrue(0 < $query->getSingleScalarResult());
	}
	
	public function testDeleteJob()
	{
		$client = $this->createJob(array('job[position]' => 'FOO2'));
		$crawler = $client->getCrawler();
		$form = $crawler->selectButton('Delete')->form();
		$client->submit($form);
	 
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	 
		$query = $em->createQuery('SELECT count(j.id) from IbwJobeetBundle:Job j WHERE j.position = :position');
		$query->setParameter('position', 'FOO2');
		$this->assertTrue(0 == $query->getSingleScalarResult());
	}
	
	public function getJobByPosition($position)
	{
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	 
		$query = $em->createQuery('SELECT j from IbwJobeetBundle:Job j WHERE j.position = :position');
		$query->setParameter('position', $position);
		$query->setMaxResults(1);
		return $query->getSingleResult();
	}
	
	public function testEditJob()
	{
		$client = $this->createJob(array('job[position]' => 'FOO3'), true);
		$crawler = $client->getCrawler();
		$crawler = $client->request('GET', sprintf('/job/%s/edit', $this->getJobByPosition('FOO3')->getToken()));
		$this->assertTrue(404 === $client->getResponse()->getStatusCode());
	}
	
	public function testExtendJob()
	{
		// A job validity cannot be extended before the job expires soon
		$client = $this->createJob(array('job[position]' => 'FOO4'), true);
		$crawler = $client->getCrawler();
		$this->assertTrue($crawler->filter('input[type=submit]:contains("Extend")')->count() == 0);
	 
		// A job validity can be extended when the job expires soon
	 
		// Create a new FOO5 job
		$client = $this->createJob(array('job[position]' => 'FOO5'), true);
	 
		// Get the job and change the expire date to today
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
		$job = $em->getRepository('IbwJobeetBundle:Job')->findOneByPosition('FOO5');
		$job->setExpiresAt(new \DateTime());
		$em->flush();
	 
		// Go to the preview page and extend the job
		$crawler = $client->request('GET', sprintf('/job/%s/%s/%s/%s', $job->getCompanySlug(), $job->getLocationSlug(), $job->getToken(), $job->getPositionSlug()));
		$crawler = $client->getCrawler();
		$form = $crawler->selectButton('Extend')->form();
		$client->submit($form);
	 
		// Reload the job from db
		$job = $this->getJobByPosition('FOO5');
	 
		// Check the expiration date
		$this->assertTrue($job->getExpiresAt()->format('y/m/d') == date('y/m/d', time() + 86400 * 30));
	}
}

?>