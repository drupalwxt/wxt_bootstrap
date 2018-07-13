<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;
use Drupal\bootstrap\Utility\Element;
use Drupal\Core\Form\FormStateInterface;

/**
 * The "wxt_gcweb_cdn_footer_url" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_cdn_footer_url",
 *   type = "textfield",
 *   title = @Translation("CDN for footer"),
 *   defaultValue = @Translation(""),
 *   description = @Translation("If checked the GCWeb theme will use the CDN for the footer."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebCDNFooterURL extends SettingBase {

  /**
   * {@inheritdoc}
   */
  public function alterFormElement(Element $form, FormStateInterface $form_state, $form_id = NULL) {
    $setting = $this->getSettingElement($form, $form_state);
    $setting->setProperty('disabled', 'disabled');
  }

}
