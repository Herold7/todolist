<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Project;
use App\Entity\Task;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Création d'utilisateurs
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setNickname($faker->userName);
            $user->setEmail($faker->email);
            $user->setPassword('$2y$13$hOu87aZiVilbIPAECI7jm.uKEPQzQPCy.mCi9il.GAxEejbd5HEwm');
            $manager->persist($user);

            // Création de projets pour chaque utilisateur
            for ($j = 0; $j < 3; $j++) {
                $project = new Project();
                $project->setTitle($faker->sentence);
                $project->setDeadline($faker->dateTimeBetween('now', '+1 year'));
                $project->setStatus($faker->boolean);
                $project->setUser($user);
                $manager->persist($project);

                // Création de tâches pour chaque projet
                for ($k = 0; $k < 5; $k++) {
                    $task = new Task();
                    $task->setTitle($faker->sentence);
                    $task->setDeadline($faker->dateTimeBetween('now', '+3 months'));
                    $task->setPriority($faker->numberBetween(1, 5));
                    $task->setProject($project);
                    $task->setUser($user);
                    $manager->persist($task);
                }
            }
        }

        $manager->flush();
    }
}
