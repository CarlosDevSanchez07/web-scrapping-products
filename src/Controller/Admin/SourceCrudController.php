<?php

namespace App\Controller\Admin;

use App\Entity\Source;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class SourceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Source::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field::new('name', 'Nombre');
        yield Field::new('url');
        yield Field::new('wrapperSelector', 'Envoltura');
        yield Field::new('titleSelector', 'Titulo');
        yield Field::new('descSelector', 'Descripcion');
        yield Field::new('linkSelector', 'Link');
        yield Field::new('priceSelector', 'Precio');
        yield Field::new('imageSelector', 'Imagen');
        yield Field::new('isInfinityScroll', 'Es scroll infinito?');
        yield Field::new('paginationNextSelector', 'Paginador');
        yield Field::new('paginateComplement', 'Complemento de paginacion');
        yield AssociationField::new('category', "Categoria")
            ->renderAsNativeWidget();
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
