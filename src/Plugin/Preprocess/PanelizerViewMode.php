<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;
use Drupal\bootstrap\Utility\Variables;
use Drupal\Core\Render\Element;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @ingroup plugins_form
 *
 * @BootstrapPreprocess("panelizer_view_mode")
 */
class PanelizerViewMode extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocessVariables(Variables $variables) {
    // Language Handling.
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $language_prefix = \Drupal::config('language.negotiation')->get('url.prefixes');
    $variables['language'] = $language;
    $variables['language_prefix'] = $language_prefix[$language];

    // Menu Block visibility rules.
    if (!empty($variables['content']['top_left'])) {
      $children = Element::children($variables['content']['top_left']);
      foreach ($children as $value) {
        $block = $variables['content']['top_left'][$value];
        if (!empty($block['#base_plugin_id']) && $block['#base_plugin_id'] == 'menu_block') {
          if ($language == 'en' && strpos($block['#plugin_id'], '-fr') !== FALSE) {
            $variables['content']['top_left'][$value]['#access'] = FALSE;
          }
          if ($language == 'fr' && strpos($block['#plugin_id'], '-fr') === FALSE) {
            $variables['content']['top_left'][$value]['#access'] = FALSE;
          }
        }
      }
    }
  }

}
