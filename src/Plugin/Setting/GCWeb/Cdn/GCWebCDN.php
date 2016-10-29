<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_cdn" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_cdn",
 *   type = "checkbox",
 *   title = @Translation("Toggle CDN for MegaMenu + GoC Initiatives"),
 *   defaultValue = 0,
 *   description = @Translation("If checked the GCWeb theme will use the CDN for MegaMenu + GoC Initiatives."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebCDN extends SettingBase {}
