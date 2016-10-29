<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_footer" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_footer",
 *   type = "checkbox",
 *   title = @Translation("Toggle Alternate footer markup"),
 *   defaultValue = 0,
 *   description = @Translation("If checked the GCWeb footer markup will be
 *   altered to a single flat list."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebFooter extends SettingBase {}
