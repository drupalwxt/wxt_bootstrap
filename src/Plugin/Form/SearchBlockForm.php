<?php

namespace Drupal\wxt_bootstrap\Plugin\Form;

use Drupal\bootstrap\Bootstrap;
use Drupal\bootstrap\Plugin\Form\FormBase;
use Drupal\bootstrap\Utility\Element;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @BootstrapForm("wxt_search_block_form")
 */
class SearchBlockForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function alterForm(array &$form, FormStateInterface $form_state, $form_id = NULL) {
    /** @var \Drupal\wxt_library\LibraryService $wxt */
    $wxt = \Drupal::service('wxt_library.service_wxt');
    $wxt_active = $wxt->getLibraryName();

    $container = Element::create($form, $form_state);
    $container->keys->setProperty('input_group_button', FALSE);

    if ($wxt_active == 'gcweb') {
      $container->submit->addClass('btn-primary');
      $container->submit->setProperty('icon', Bootstrap::glyphiconFromString('search'));
      $container->actions->submit->setProperty('icon_only', FALSE);
      $container->keys->setProperty('input_group_button', FALSE);
    }
    else {
      $container->submit->addClass('btn-default');
      $container->submit->setProperty('icon', Bootstrap::glyphiconFromString(''));
      $container->submit->unsetProperty('icon_only');
    }
  }

}
