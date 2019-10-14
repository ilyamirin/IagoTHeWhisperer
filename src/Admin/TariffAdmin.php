<?php

namespace App\Admin;

use App\Entity\Bank;
use App\Entity\Tariff;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TariffAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('name', TextType::class);
        $form->add('cost', TextareaType::class);
        $form->add('bank', EntityType::class, [
            'class' => Bank::class,
            'choice_label' => 'name',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('name');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->add('name');
    }

    public function toString($object)
    {
        return $object instanceof Tariff
            ? $object->getName()
            : 'Тариф'
        ;
    }
}
