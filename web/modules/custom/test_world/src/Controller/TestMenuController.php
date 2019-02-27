<?php

namespace Drupal\test_world\Controller;

use Drupal\Core\Controller\ControllerBase;

class TestMenuController extends ControllerBase {
  public function test() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Test Menu! This is the welcome page'),
    ];
  }
  
}