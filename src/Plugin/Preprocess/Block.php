<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;
use Drupal\node\NodeInterface;

/**
 * Pre-processes variables for the "block" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("block")
 */
class Block extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocess(array &$variables, $hook, array $info) {

    // Language Handling.
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $language_prefix = \Drupal::config('language.negotiation')->get('url.prefixes');
    $variables['language'] = $language;
    $variables['language_prefix'] = $language_prefix[$language];

    // Customize branding per WxT theme.
    if (isset($variables['plugin_id']) && $variables['plugin_id'] == 'system_branding_block') {
      /** @var \Drupal\wxt_library\LibraryService $wxt */
      $wxt = \Drupal::service('wxt_library.service_wxt');
      $wxt_active = $wxt->getLibraryName();
      $library_path = $wxt->getLibraryPath();

      if ($wxt_active == 'ogpl') {
        $variables['logo'] = $library_path . '/assets/logo.png';
      }
      elseif ($wxt_active == 'gc_intranet_legacy') {
        $variables['logo_sttl_svg'] = $library_path . '/assets/wmms-intra.svg';
      }
      elseif ($wxt_active == 'gcwu_fegc') {
        $variables['logo_sttl_svg'] = $library_path . '/assets/wmms.svg';
      }
      elseif ($wxt_active == 'gcweb' || $wxt_active == 'gcweb_legacy' || $wxt_active == 'gc_intranet') {
        $variables['logo'] = $library_path . '/assets/sig-blk-' . $language . '.png';
        $variables['logo_svg'] = $library_path . '/assets/sig-blk-' . $language . '.svg';
      }
      elseif ($wxt_active == 'gc_intranet_legacy') {
        $variables['logo_svg'] = $library_path . '/assets/sig-blk-' . $language . '.svg';
      }
    }

    if (isset($variables['plugin_id']) && $variables['plugin_id'] == 'wxt_language_block:language_interface') {
      /** @var \Drupal\wxt_library\LibraryService $wxt */
      $wxt = \Drupal::service('wxt_library.service_wxt');
      $wxt_active = $wxt->getLibraryName();
      $library_path = $wxt->getLibraryPath();

      if ($wxt_active == 'gcwu_fegc') {
        $variables['logo_sig_svg'] = $library_path . '/assets/sig-' . $language . '.svg';
      }
    }

    // Determine which webform to display in footer.
    $block_exists_1 = $this->checkBlockExistence('didyoufindwhatyouwerelookingfor');
    $block_exists_2 = $this->checkBlockExistence('reportproblemblock');

    if ($block_exists_1 && $block_exists_2) {
      $did_you_find_webform = $this->activateDidYouFindWebform();
      $variables['display'] = TRUE;

      if ($did_you_find_webform) {
        if ($variables['plugin_id'] == 'share_widget_block') {
          $variables['attributes']['class'] = [
            'col-sm-3',
            'col-sm-offset-2',
            'col-lg-offset-3',
          ];
        }

        if ($variables['plugin_id'] == 'report_problem_block') {
          $variables['display'] = FALSE;
          $variables['content'] = [];
        }
      }
      else {
        if ($variables['plugin_id'] == 'find_what_you_looking_for') {
          $variables['display'] = FALSE;
          $variables['content'] = [];
        }
      }
    }

    parent::preprocess($variables, $hook, $info);
  }

  /**
   * Check if a specific block exists in the block layout.
   *
   * @param string $block_plugin_id
   *   The plugin ID of the block to check.
   *
   * @return bool
   *   TRUE if the block exists, FALSE otherwise.
   */
  protected function checkBlockExistence($block_plugin_id) {
    $block_repository = \Drupal::service('block.repository');
    $region_data = $block_repository->getVisibleBlocksPerRegion();

    foreach ($region_data as $region) {
      foreach ($region as $block_name => $block) {
        if ($block_name == $block_plugin_id) {
          return TRUE;
        }
      }
    }

    return FALSE;
  }

  /**
   * Determines whether to display the "Did you find" webform block.
   *
   * @return bool
   *   TRUE if the webform block should be displayed, FALSE otherwise.
   */
  public function activateDidYouFindWebform() {
    $node = \Drupal::routeMatch()->getParameter('node');

    if ($node instanceof NodeInterface) {
      return TRUE;
    }

    return FALSE;
  }

}
