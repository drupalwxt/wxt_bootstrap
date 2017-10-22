<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\Links as BootstrapLinks;

/**
 * Pre-processes variables for the "links" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("links")
 */
class Links extends BootstrapLinks {

  /**
   * {@inheritdoc}
   */
  public function preprocess(array &$variables, $hook, array $info) {
    // Language Handling.
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $language_prefix = \Drupal::config('language.negotiation')->get('url.prefixes');
    $variables['language'] = $language;
    $variables['language_prefix'] = $language_prefix[$language];

    if (isset($variables['links']['comment-add'])) {
      $variables['links']['comment-add']['link']['#options']['attributes']['class'][] = 'btn btn-default';
    }

    // Add 'lang' attribute on language switcher for screen readers.
    $languages = \Drupal::languageManager()->getLanguages();
    foreach ($languages as $key => $lang) {
      if (isset($variables['links'][$key])) {
        $variables['links'][$key]['link']['#options']['attributes']['lang'] = $key;
      }
    }

    parent::preprocess($variables, $hook, $info);
  }

}
