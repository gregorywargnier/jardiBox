<?php

namespace App\Controller\Admin;

use App\Entity\AllCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AllCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AllCategory::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
              IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            ImageField::new('imageName')
                ->onlyOnIndex()
                ->setBasePath('dataImage/products'),
            TextField::new('slug'),
            TextareaField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setFormTypeOption('allow_delete', false)
                ->hideOnIndex(),
            AssociationField::new('universe')
        ];
    }

}
