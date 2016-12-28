<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;

/**
 * Pre-processes variables for the "page" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("maintenance_page")
 */
class MaintenancePage extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocess(array &$variables, $hook, array $info) {
    $config = \Drupal::config('wxt_library.settings');
    $variant = ($config->get('minimized.options')) ? 'minified' : 'source';
    $wxt_libraries = _wxt_library_options() + ['wet-boew' => t('Core')];
    $wxt_active = $config->get('wxt.theme');

    foreach ($wxt_libraries as $wxt_library => $name) {
      $min = ($variant == 'source') ? '-dev' : '';
      // WxT Core.
      if ($wxt_library == 'wet-boew') {
        $variables['#attached']['library'][] = 'wxt_library/wet-boew' . $min;
        $variables['#attached']['library'][] = 'wxt_library/wet-boew' . $min . '.splash';
      }
      // WxT Theme.
      elseif ($wxt_library == $wxt_active) {
        $variables['#attached']['library'][] = 'wxt_library/' . $wxt_active . $min;
        $variables['#attached']['library'][] = 'wxt_library/' . $wxt_active . $min . '.splash';
      }
    }
    parent::preprocess($variables, $hook, $info);
  }

}
