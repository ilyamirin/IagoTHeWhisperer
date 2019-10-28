<?php

namespace App\Form;

use App\Object\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answer1', NumberType::class, $this->generateFieldOptions('Прием на баковская карта/касса'))
            ->add('answer2', NumberType::class, $this->generateFieldOptions('Выдача с банковской карты'))
            ->add('answer3', NumberType::class, $this->generateFieldOptions('Бесплатные платежные поручения'))
            ->add('answer4', NumberType::class, $this->generateFieldOptions('Перевод на физическое лицо'))
            ->add('answer5', NumberType::class, $this->generateFieldOptions('Выдача по чеку'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profile::class
        ]);
    }

    protected function generateFieldOptions(string $question)
    {
        return [
            'label' => $question,
            'html5' => true,
            'required' => true,
        ];
    }
}
