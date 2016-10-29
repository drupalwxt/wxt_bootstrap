<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;
use Drupal\bootstrap\Utility\Element;
use Drupal\bootstrap\Utility\Variables;
use Drupal\Component\Utility\Html;
use Drupal\Core\Url;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @ingroup plugins_form
 *
 * @BootstrapPreprocess("views_exposed_form")
 */
class ViewsExposedForm extends PreprocessBase {
  /**
   * {@inheritdoc}
   */
  public function preprocessVariables(Variables $variables) {
    $q = Element::create($variables->offsetGet('q', []));
    $form = Element::create($variables['form']);
    // Generate an unique ID for the filters wrapper.
    $id = Html::getUniqueId('filters-wrapper');
    // Build the wrapper.
    $wrapper_build = ['#theme_wrappers' => ['container__filters_wrapper']];
    $filters_wrapper = Element::create($wrapper_build);
    $filters_wrapper->addClass(['filters-wrapper', 'collapse', 'well', 'form-inline']);
    $filters_wrapper->setAttribute('id', $id);
    // Move all the form children to the wrapper. This is ok
    // to do it here since this is about final rendering, not
    // actually altering the form.
    foreach ($form->children() as $key => $child) {
      $filters_wrapper->{$key} = $child;
      unset($form->{$key});
    }
    // Add the wrapper to the form.
    $form->filters_wrapper = $filters_wrapper;
    // Create a toggle for showing/hiding the filters.
    $build = [
      '#type' => 'link',
      '#title' => t('Filters'),
      '#url' => Url::fromUserInput('#' . $id),
    ];
    $q->toggle = Element::create($build)
      ->addClass(['filters-wrapper-toggle', 'btn'])
      ->colorize()
      ->setIcon()
      ->setAttribute('data-toggle', 'collapse');
  }

}
