<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormState;
use Drupal\Core\Form\FormStateInterface;

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
    // Get configuration.
    $config = $this->getConfiguration();

    // If we have a name in our configuration, use that otherwise use a default.
    if (!empty($config['name'])) {
      $name = $config['name'];
    } else {
      $name = $this->t('to no one');
    }

    // Return the block content with the entered name.
    return array(
      '#markup' => $this->t('Hello @name!', array (
          '@name' => $name,
        )
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $default_config = \Drupal::config('hello_world.settings');
    $config = $this->getConfiguration();

    $form['hello_block_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['name'])? $config['name'] : $default_config->get('hello.name'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('name', $form_state->getValue('hello_block_name'));
  }

}