<?php

namespace Drupal\hello_world\Controller;

class HelloWorldController {
    /**
     * This function will be called from the routing subsystem, and displays our hello world page.
     */
    public function hello() {
        return array(
            '#markup' => t('Hello World'),
        );
    }
}
