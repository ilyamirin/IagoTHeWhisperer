<?php

namespace App\Admin;

use App\Entity\Bank;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BankAdmin extends AbstractAdmin
{
    const LABEL_NAME = 'Название';

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name', TextType::class, [
                'label' => self::LABEL_NAME,
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name', null, [
                'label' => self::LABEL_NAME
            ])
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('name', null, [
                'label' => self::LABEL_NAME,
            ])
        ;
    }

    public function toString($object)
    {
        return $object instanceof Bank
            ? $object->getName()
            : 'Банк'
        ;
    }
}
