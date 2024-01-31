<?php

namespace App\Controller\Admin;

use App\Entity\Task;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TaskCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Task::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('projects')(),
            TextField::new('title'),
            TextEditorField::new('description'),
            IntegerField::new('priority'),
            UrlField::new('link'),
            DateTimeField::new('deadline'),

        ];
    }
    
}
