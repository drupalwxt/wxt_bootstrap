<?php

namespace Drupal\wxt_bootstrap\Plugin\Process;

use Drupal\bootstrap\Plugin\Process\Search as BootstrapSearch;
use Drupal\bootstrap\Utility\Element;
use Drupal\Core\Form\FormStateInterface;

/**
 * Processes the "search" element.
 *
 * @ingroup plugins_process
 *
 * @BootstrapProcess("search")
 */
class Search extends BootstrapSearch {

  /**
   * {@inheritdoc}
   */
  public static function processElement(Element $element, FormStateInterface $form_state, array &$complete_form) {
    $element->setProperty('title_display', 'invisible');
    $element->setAttribute('placeholder', $element->getProperty('placeholder', $element->getProperty('title', t('Search'))));
    if ($complete_form['#form_id'] == 'wxt_search_api_block_form') {
      unset($complete_form['form_id']);
      unset($complete_form['form_build_id']);
    }
  }

}
