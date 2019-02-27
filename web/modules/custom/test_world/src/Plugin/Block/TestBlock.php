<?php

namespace Drupal\test_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Test' Block.
 *
 * @Block(
 *   id = "test_block",
 *   admin_label = @Translation("Test block"),
 *   category = @Translation("Test World"),
 * )
 */
class TestBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('Test, World!'),
    );
  }

}