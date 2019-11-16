<?php

namespace App\Admin;

use App\Entity\Bank;
use App\Entity\Tariff;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TariffAdmin extends AbstractAdmin
{
    const LABEL_ADAPTER = 'Адаптер';
    const LABEL_NAME = 'Название';
    const LABEL_COST = 'Стоимость';
    const LABEL_FREE_SERVICE = 'Бесплатное обслуживание';
    const LABEL_YEAR_SERVICE = 'Бизнес-карты (годовое обслуживание)';
    const LABEL_EXTRADITION = 'Выдача с банковской карты';
    const LABEL_TRANSFERS = 'Перевод на физическое лицо';
    const LABEL_CHECK = 'Выдача по чеку';
    const LABEL_COMMENT = 'Коментарии';
    const LABEL_BANK = 'Банк';

    /** @var array */
    protected $adapters = [];

    /** @var array */
    protected $adapterNames = [];

    /** @var array */
    protected $adapterFields = [];

    public function __construct($code, $class, $baseControllerName, iterable $adapters)
    {
        parent::__construct($code, $class, $baseControllerName);

        foreach ($adapters as $adapter) {
            $className = get_class($adapter);
            $indexName = $className::getDefaultIndexName();

            $this->adapters[$indexName] = $className;
            $this->adapterNames[$className] = $indexName;
        }

        foreach ($this->adapters as $key => $adapter) {
            $this->adapterFields[$adapter] = [];
        }
    }

    /**
     * @inheritDoc
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('adapter', ChoiceFieldMaskType::class, [
                'label' => self::LABEL_ADAPTER,
                'choices' => $this->adapters,
                'map' => $this->adapterFields,
            ])
            ->add('bank', EntityType::class, [
                'label' => self::LABEL_BANK,
                'class' => Bank::class,
                'choice_label' => 'name',
            ])
            ->add('name', TextType::class, [
                'label' => self::LABEL_NAME,
            ])
            ->add('cost', TextareaType::class, [
                'label' => self::LABEL_COST,
            ])
            ->add('freeService', TextareaType::class, [
                'label' => self::LABEL_FREE_SERVICE,
            ])
            ->add('yearService', TextareaType::class, [
                'label' => self::LABEL_YEAR_SERVICE,
            ])
            ->add('extraditionRanges', CollectionType::class,
                [
                    'label' => self::LABEL_EXTRADITION,
                    'by_reference' => false,
                    'btn_add' => 'Добавить',
                    'type_options' => [
                        'delete' => true,
                    ],
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'table'
                ]
            )
            ->add('transferRanges', CollectionType::class,
                [
                    'label' => self::LABEL_TRANSFERS,
                    'by_reference' => false,
                    'btn_add' => 'Добавить',
                    'type_options' => [
                        'delete' => true,
                    ],
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'table'
                ]
            )
            ->add('checkRanges', CollectionType::class,
                [
                    'label' => self::LABEL_CHECK,
                    'by_reference' => false,
                    'btn_add' => 'Добавить',
                    'type_options' => [
                        'delete' => true,
                    ],
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'table'
                ]
            )
            ->add('comment', TextareaType::class, [
                'label' => self::LABEL_COMMENT,
            ])
        ;
    }

    /**
     * @inheritDoc
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name', null, [
                'label' => self::LABEL_NAME,
            ])
            ->add('bank', null, [
                'label' => self::LABEL_BANK,
            ])
        ;
    }

    /** @inheritDoc */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('name', null, [
                'label' => self::LABEL_NAME,
            ])
            ->add('bank', null, [
                'label' => self::LABEL_BANK,
            ])
            ->add('adapter', 'choice', [
                'label' => self::LABEL_ADAPTER,
                'choices' => $this->adapterNames,
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

    public function toString($object)
    {
        return $object instanceof Tariff
            ? $object->getName()
            : 'Тариф'
        ;
    }
}
