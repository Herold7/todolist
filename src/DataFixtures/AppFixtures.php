<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Project;
use App\Entity\Task;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'utilisateurs
        $user1 = new User();
        $user1->setNickname('john_doe');
        $user1->setEmail('john.doe@example.com');
        $user1->setPassword('password123');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setNickname('jane_smith');
        $user2->setEmail('jane.smith@example.com');
        $user2->setPassword('securepass');
        $manager->persist($user2);

        // Création de projets
        $project1 = new Project();
        $project1->setTitle('Project A');
        $project1->setDeadline(new \DateTime('2023-01-31'));
        $project1->setUser($user1);
        $project1->setStatus(true);
        $manager->persist($project1);

        $project2 = new Project();
        $project2->setTitle('Project B');
        $project2->setDeadline(new \DateTime('2023-01-31'));
        $project2->setStatus(true);
        $project2->setUser($user2); // Assurez-vous d'associer le projet à un utilisateur différent si nécessaire
        $manager->persist($project2);

        // Création de tâches
        $task1 = new Task();
        $task1->setTitle('Task 1');
        $task1->setDeadline(new \DateTime('2023-01-31'));
        $task1->setPriority(2);
        $task1->setProject($project1);
        $manager->persist($task1);

        $task2 = new Task();
        $task2->setTitle('Task 2');
        $task2->setDeadline(new \DateTime('2023-02-15'));
        $task2->setPriority(1);
        $task2->setProject($project1);
        $manager->persist($task2);

        $task3 = new Task();
        $task3->setTitle('Task 3');
        $task3->setDeadline(new \DateTime('2023-03-10'));
        $task3->setPriority(3);
        $task3->setProject($project2);
        $manager->persist($task3);

        $manager->flush();
    }
}
