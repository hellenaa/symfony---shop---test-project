<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('sku')
            ->add('price')
            ->add('quantity')
            ->add('new')
            ->add('sale')
            ->add('id')
            ->add('titleArm')
            ->add('titleRus')
            ->add('titleEng')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('sku')
            ->add('price')
            ->add('quantity')
            ->add('new')
            ->add('sale')
            ->add('id')
            ->add('titleArm')
            ->add('titleRus')
            ->add('titleEng')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titleArm')
            ->add('titleRus')
            ->add('titleEng')
            ->add('sku')
            ->add('price',IntegerType::class,[
                'label' => 'Գինը'
            ])
            ->add('quantity')
            ->add('new')
            ->add('sale')
            ->add('gallery',ModelListType::class,array(),array(
                'link_parameters' => array(
                    'context' => 'product'
                )
            ))

        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('sku')
            ->add('price')
            ->add('quantity')
            ->add('new')
            ->add('sale')
            ->add('id')
            ->add('titleArm')
            ->add('titleRus')
            ->add('titleEng')
        ;
    }
}
