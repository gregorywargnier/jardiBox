<?php

namespace App\Controller\Admin;

use App\Entity\AllCategory;
use App\Entity\Contact;
use App\Entity\Newsletter;
use App\Entity\Product;
use App\Entity\Universe;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;


class DashboardController extends AbstractDashboardController
{


    public function index(): Response
    {
        return $this->render("admin/dashboard.html.twig");
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('JardiBox')
            ->renderContentMaximized()
            ->disableUrlSignatures()
        ;

    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('user', 'fa fa-user', User::class ),
            MenuItem::linkToCrud('Universe', 'fa fa-folder', Universe::class ),
            MenuItem::linkToCrud('AllCategory', 'fa fa-folder-open', AllCategory::class ),
            MenuItem::linkToCrud('Product', 'fab fa-product-hunt', Product::class ),
            MenuItem::linkToCrud('Contact', 'fa fa-envelope', Contact::class ),
            MenuItem::linkToCrud('Newsletter', 'fa fa-newspaper', Newsletter::class )
        ];
    }
}
