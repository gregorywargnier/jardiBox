<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ChoiceField :: new ( 'roles' , 'Roles' )
                -> allowMultipleChoices ()
                -> autocomplete ()
                -> setChoices ([
                    'User' => 'ROLE_USER' ,
                    'Admin' => 'ROLE_ADMIN' ,
                ]),
            BooleanField::new('Enabled'),
            TextField::new('lastName'),
            TextField::new('firstName'),
            TextField::new('phone'),
            DateField::new('birthday'),
            TextField::new('address'),
            TextField::new('additionalAddress'),
            TextField::new('city'),
            NumberField::new('postalCode'),
            EmailField::new('Email'),
        ];
    }

}
