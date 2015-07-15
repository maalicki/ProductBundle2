<?php namespace ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use Application\Sonata\UserBundle\Document\User;

Class AppFixtures implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->loadAdminUser();
        $this->loadSampleUsers();
    }

    private function loadAdminUser()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('root');
        $user->setEmail('email@domain.com');
        $user->setPlainPassword('polcode');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_SONATA_ADMIN'));
        $userManager->updateUser($user, true);
        
    }

    private function loadSampleUsers()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        
        for ($i = 1; $i <= 10; $i++) {
        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername("user_$i");
        $user->setEmail("sample$i@example.com");
        $user->setPlainPassword("user_$i");
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $userManager->updateUser($user, true);
        }
    }
}
