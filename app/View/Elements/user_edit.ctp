<?php echo $this->Form->create('User'); ?>
<?php
echo $this->Form->input(
    'email',
    array(
        'disabled',
        'placeholder' => 'email address',
        'type' => 'email',
        'class' => 'form-control',
        'label' => 'Email Address',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'password',
    array(
        'placeholder' => 'range between 8 and 20',
        'type' => '',
        'class' => 'col-sm-10 form-control',
        'label' => 'Password',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'name',
    array(
        'class' => 'form-control',
        'placeholder' => 'your name or nickname',
        'label' => 'Nickname',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'nationality',
    array(
        'options' => $countryOptions,
        'class' => 'form-control',
        'label' => 'Nationality',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'sex',
    array(
        'options' => $sexOptions,
        'class' => 'form-control',
        'label' => false,
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'occupation',
    array(
        'options' => $occupationOptions,
        'class' => 'form-control',
        'label' => 'Occupation',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'native_language',
    array(
        'options' => $languageOptions,
        'class' => 'form-control',
        'label' => 'Mother tongue',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'study_language1',
    array(
        'options' => $languageOptions,
        'class' => 'form-control',
        'label' => 'Language of studing',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'study_language2',
    array(
        'options' => $languageOptions,
        'empty' => '(choose another)',
        'class' => 'form-control',
        'label' => false,
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'introduction',
    array(
        'class' => 'form-control',
        'label' => 'Intro',
        'div' => 'form-group'
    )
);

?>
<?php echo $this->Form->end(__('Submit')); ?>
