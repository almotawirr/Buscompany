<?php

namespace App\Controller\Admin;

use App\Entity\BusLines;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BusLinesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BusLines::class;
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
