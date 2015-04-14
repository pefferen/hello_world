<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Display's our Hello World block.
 *
 * @Block(
 *  id = "hello_block",
 *  admin_label = @Translation("Hello World"),
 * )
 */
class HelloBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('Hello World'),
    );
  }

}