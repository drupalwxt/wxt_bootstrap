<?php

namespace Drupal\wxt_bootstrap\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\PreprocessBase;

/**
 * Pre-processes variables for the "menu" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("menu")
 */
class Menu extends PreprocessBase {

  /**
   * {@inheritdoc}
   */
  public function preprocess(array &$variables, $hook, array $info) {
    // Language Handling.
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $language_prefix = \Drupal::config('language.negotiation')->get('url.prefixes');
    $variables['language'] = $language;
    $variables['language_prefix'] = $language_prefix[$language];

    if ($hook == 'menu__main' || $hook == 'menu__main_fr') {
      /** @var \Drupal\wxt_library\LibraryService $wxt */
      $wxt = \Drupal::service('wxt_library.service_wxt');
      $wxt_active = $wxt->getLibraryName();

      if ($wxt_active == 'gcweb' || $wxt_active == 'gcweb_legacy') {
        // CDN handling.
        $gcweb_cdn = $this->theme->getSetting('wxt_gcweb_cdn');
        $gcweb_cdn_url = $this->theme->getSetting('wxt_gcweb_cdn_cmm');

        $variables['gcweb_cdn'] = (!empty($gcweb_cdn)) ? TRUE : FALSE;
        $variables['gcweb_cdn_url'] = (!empty($gcweb_cdn_url)) ? $gcweb_cdn_url : '//cdn.canada.ca/gcweb-cdn-live/sitemenu/sitemenu-';
      }

      // More link rendered in dropdown.
      if (!$this->theme->getSetting('wxt_megamenu_more_link')) {
        foreach ($variables['items'] as $key => &$item) {
          if (isset($item['below']) && $item['below']) {
            $mb_more = $item;
            $mb_more['title'] = $mb_more['title'] . ' ' . $this->t('– More');
            $mb_more['attributes']->addClass('slflnk');
            unset($mb_more['below']);
            $item['below'][$key] = $mb_more;
          }
        }
      }
    }
    elseif ($hook == 'menu__footer') {
      /** @var \Drupal\wxt_library\LibraryService $wxt */
      $wxt = \Drupal::service('wxt_library.service_wxt');
      $wxt_active = $wxt->getLibraryName();
      $library_path = $wxt->getLibraryPath();
      $variables['library_path'] = $library_path;

      // Footer Navigation (gcweb).
      if ($wxt_active == 'gcweb' || $wxt_active == 'gcweb_legacy') {
        $variables['gcweb'] = [
          'feedback' => [
            'en' => 'http://www.canada.ca/en/contact/feedback.html',
            'fr' => 'http://www.canada.ca/fr/contact/retroaction.html',
          ],
          'social' => [
            'en' => 'http://www.canada.ca/en/social/index.html',
            'fr' => 'http://www.canada.ca/fr/sociaux/index.html',
          ],
          'mobile' => [
            'en' => 'http://www.canada.ca/en/mobile/index.html',
            'fr' => 'http://www.canada.ca/fr/mobile/index.html',
          ],
        ];
        $variables['gcweb']['footer'] = $this->theme->getSetting('wxt_gcweb_footer');
        $variables['logo'] = $library_path . '/assets/sig-blk-' . $language . '.png';
        $variables['logo_svg'] = $library_path . '/assets/sig-blk-' . $language . '.svg';
        $variables['logo_bottom_svg'] = $library_path . '/assets/wmms-blk' . '.png';
        $variables['logo_bottom_svg'] = $library_path . '/assets/wmms-blk' . '.svg';
      }
    }

    parent::preprocess($variables, $hook, $info);
  }

}
