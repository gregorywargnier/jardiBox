<?php

namespace App\Controller\Admin;

use App\Entity\OurUniverse;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OurUniverseCrudController extends AbstractCrudController
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }
    public static function getEntityFqcn(): string
    {
        return OurUniverse::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            ImageField::new('fileName')
                ->onlyOnIndex()
                ->setBasePath('dataImage/products'),
            TextField::new('slug'),
            TextareaField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setFormTypeOption('allow_delete', false)
                ->hideOnIndex()

        ];
    }

}
