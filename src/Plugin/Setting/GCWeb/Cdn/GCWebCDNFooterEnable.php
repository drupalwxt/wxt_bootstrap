<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_cdn_footer_enable" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_cdn_footer_enable",
 *   type = "checkbox",
 *   title = @Translation("Toggle CDN for Footer"),
 *   defaultValue = 0,
 *   description = @Translation("If checked the GCWeb theme will use the CDN for the footer."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebCDNFooterEnable extends SettingBase {}
