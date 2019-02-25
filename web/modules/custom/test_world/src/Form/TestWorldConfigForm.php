<?php

namespace Drupal\test_world\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class TestWorldConfigForm extends ConfigFormBase {

  public function getFormId() {
      return 'test_World';
    }

  protected function getEditableConfigNames() {
    return [
      'test_world.settings'
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('test_world.settings');
    // kint($config->get('name'));
    // kint($config->get('gender'));
    // kint($config->get('confirm'));


    $form['your_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your Name'),
      '#description' => $this->t('Please Enter your full name'),
      '#default_value' => $config->get('name'),
    ];

    $form['your_gender'] = [
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => [
        'Female' => t('Female'),
        'male' => t('Male'),
      ], 
      '#default_value' => $config->get('gender'),   
    ];

    $form['your_confirmation'] = [
      '#type' => 'radios',
      '#title' => ('Are you above 18 years old?'),
      '#options' => [
        'Yes' =>t('Yes'),
        'No' =>t('No')
      ],
      '#default_value' => $config->get('confirm'),
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save configuration'),
      '#button_type' => 'primary',
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    kint($values);

    // Save the settings.
    $this->config('test_world.settings')
      ->set('name', $form_state->getValue('your_name'))
      ->set('gender', $form_state->getValue('your_gender'))
      ->set('confirm', $form_state->getValue('your_confirmation'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
?>