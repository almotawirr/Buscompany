<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

use App\Entity\Bus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('RegistrationNumber'),
            AssociationField::new('BusLine'),
            AssociationField::new('FirstStop'),
            AssociationField::new('LastStop'),
            TimeField::new('TravelTime')
        ];
    }
    
}
