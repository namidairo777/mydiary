<?php echo $this->Form->create('User'); ?>
<?php
echo $this->Form->input(
    'email',
    array(
        'disabled',
        'type' => 'email',
        'class' => 'form-control edit-button-400',
        'label' => 'Email Address',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'password',
    array(
        'type' => 'password',
        'placeholder' => 'range between 8 and 20',
        'class' => 'form-control edit-button-400',
        'label' => 'Password',
        'div' => 'form-group',
        'value' => ''

    )
);
echo $this->Form->input(
    'name',
    array(
        'class' => 'form-control  edit-button-400',
        'placeholder' => 'your name or nickname',
        'label' => 'Nickname',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'nationality',
    array(
        'options' => $countryOptions,
        'class' => 'form-control edit-button-100',
        'label' => 'Nationality',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'sex',
    array(
        'options' => $sexOptions,
        'class' => 'form-control edit-button-100',
        'label' => 'Sex',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'occupation',
    array(
        'options' => $occupationOptions,
        'class' => 'form-control edit-button-150',
        'label' => 'Occupation',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'native_language',
    array(
        'options' => $languageOptions,
        'class' => 'form-control edit-button-150',
        'label' => 'Mother tongue',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'study_language1',
    array(
        'options' => $languageOptions,
        'class' => 'form-control edit-button-150',
        'label' => 'Language of studing',
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'study_language2' ,
    array(
        'options' => $languageOptions,
        'empty' => '(choose another)',
        'class' => 'form-control edit-button-150',
        'label' => false,
        'div' => 'form-group'
    )
);
echo $this->Form->input(
    'introduction',
    array(
        'class' => 'form-control edit-button-400',
        'label' => 'Intro',
        'div' => 'form-group'
    )
);

?>
<?php echo $this->Form->end(
    array('label' => 'confirm',
    'class' => 'btn btn-primary text-center'));
?>
