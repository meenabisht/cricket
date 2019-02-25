<?php

namespace Drupal\test_world\Controller;

use Drupal\Core\Controller\ControllerBase;

class TestWorldController extends ControllerBase {
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Test World! This is the welcome page'),
    ];
  }
  
}