<?php

namespace App\Form;

use App\Objects\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answer1', NumberType::class, $this->generateFieldOptions('Сколько платежных поручений в месяц направляете своим контрагентам?'))
            ->add('answer2', NumberType::class, $this->generateFieldOptions('Сколько средств снимаете по счету в месяц с кассы банка/корпоративных карт?'))
            ->add('answer3', NumberType::class, $this->generateFieldOptions('Сколько средств вносите в кассу?'))
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
