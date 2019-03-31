<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;
use Drupal\bootstrap\Utility\Variables;

/**
 * Pre-processes variables for the "region" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("region")
 */
class Region extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocessVariables(Variables $variables) {

    /** @var \Drupal\wxt_library\LibraryService $wxt */
    $wxt = \Drupal::service('wxt_library.service_wxt');
    $wxt_active = $wxt->getLibraryName();

    $region = $variables['elements']['#region'];
    $variables['region'] = $region;
    $variables['content'] = $variables['elements']['#children'];

    if ($region === 'header' && !empty($variables['is_front'])) {
      $variables->addClass(['container']);
    }

    if ($wxt_active == 'gcweb') {
      if ($region === 'content_footer' && !empty($variables['content'])) {
        $variables->addClass(['pagedetails']);
        if (!empty($variables['is_front'])) {
          $variables->addClass(['container']);
        }
      }
    }
  }

}
