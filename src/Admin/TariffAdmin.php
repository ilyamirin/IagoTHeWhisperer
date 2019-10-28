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
        $form
            ->add('name', TextType::class, [
                'label' => 'Название',
            ])
            ->add('cost', TextareaType::class, [
                'label' => 'Стоимость',
            ])
            ->add('freeService', TextareaType::class, [
                'label' => 'Бесплатное обслуживание',
            ])
            ->add('yearService', TextareaType::class, [
                'label' => 'Бизнес-карты (годовое обслуживание)',
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Коментарии',
            ])
            ->add('bank', EntityType::class, [
                'label' => 'Банк',
                'class' => Bank::class,
                'choice_label' => 'name',
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('name');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('name')
            ->add('bank');
    }

    public function toString($object)
    {
        return $object instanceof Tariff
            ? $object->getName()
            : 'Тариф'
        ;
    }
}
