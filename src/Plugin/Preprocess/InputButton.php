<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\InputButton as BootstrapInputButton;
use Drupal\bootstrap\Utility\Element;
use Drupal\bootstrap\Utility\Variables;

/**
 * Pre-processes variables for the "input__button" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("input__button")
 */
class InputButton extends BootstrapInputButton {

  /**
   * {@inheritdoc}
   */
  public function preprocessElement(Element $element, Variables $variables) {
    $wxt = \Drupal::service('wxt_library.service_wxt');
    $wxt_active = $wxt->getLibraryName();

    $element->colorize();
    $element->setButtonSize();
    $element->setIcon($element->getProperty('icon'));
    $variables['icon_only'] = $element->getProperty('icon_only');
    $variables['icon_position'] = $element->getProperty('icon_position');
    $variables['label'] = $element->getProperty('value');
    $variables['wxt_theme'] = $wxt_active;

    if ($element->getProperty('split')) {
      $variables->map([$variables::SPLIT_BUTTON]);
    }

    parent::preprocessElement($element, $variables);
  }

}
