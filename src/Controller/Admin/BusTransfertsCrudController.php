<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use App\Entity\BusTransferts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BusTransfertsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BusTransferts::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Bus'),
            AssociationField::new('NewLine'),
            AssociationField::new('FirstStop'),
            AssociationField::new('LastStop'),
            TimeField::new('TravelTime')

        ];
    }
    
}
