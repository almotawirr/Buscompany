<?php

namespace App\Controller\Admin;

use App\Entity\Stops;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StopsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stops::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
