<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_cdn_goc_init" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_cdn_goc_init",
 *   type = "checkbox",
 *   title = @Translation("Toggle CDN for GoC Initiatives"),
 *   defaultValue = 0,
 *   description = @Translation("If checked the GCWeb theme will use the CDN for GoC Initiatives."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebCDNgoc extends SettingBase {}
