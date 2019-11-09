<?php

namespace App\Admin;

use App\Entity\Tariff;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

abstract class AbstractRangeAdmin extends AbstractAdmin
{
    const LABEL_MIN = 'Минимальное значение';
    const LABEL_MAX = 'Максимальное значение';
    const LABEL_VALUE = 'Значение';
    const LABEL_TARIFF = 'Тариф';

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('min', null, [
                'label' => self::LABEL_MIN,
            ])
            ->add('max', null, [
                'label' => self::LABEL_MAX,
            ])
            ->add('value', null, [
                'label' => self::LABEL_VALUE
            ])
            ->add('tariff', EntityType::class, [
                'label' => self::LABEL_TARIFF,
                'class' => Tariff::class,
                'choice_label' => 'name',
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('tariff', null, [
                'label' => self::LABEL_TARIFF,
            ])
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('tariff', null, [
                'label' => self::LABEL_TARIFF,
            ])
            ->add('min', null, [
                'label' => self::LABEL_MIN,
            ])
            ->add('max', null, [
                'label' => self::LABEL_MAX,
            ])
            ->add('value', null, [
                'label' => self::LABEL_VALUE,
            ])
            ->add('_action', 'actions', [
                'label' => 'Действие',
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }
}
