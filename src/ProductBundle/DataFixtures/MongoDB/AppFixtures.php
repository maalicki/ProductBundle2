<?php

namespace ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Sonata\UserBundle\Document\User;

Class AppFixtures extends AbstractFixture {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $this->manager = $manager;
        
        $this->loadAdminUser();
        $this->loadSampleUsers();
        
    }

    private function loadAdminUser() {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('email@example.com');
        $userAdmin->setEnabled(true);
        $userAdmin->addRole('ROLE_SONATA_ADMIN');
        $userAdmin->setPlainPassword('admin');
        
        $this->manager->persist($userAdmin);
        $this->manager->flush();
    }

    private function loadSampleUsers() {

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setUsername("user_$i");
            $user->setEmail("sample$i@example.com");
            $user->setEnabled(true);
            $user->addRole('ROLE_USER');
            $user->setPlainPassword("user_$i");
            
            $this->manager->persist($user);
            $this->manager->flush();
        }
    }
    


}
