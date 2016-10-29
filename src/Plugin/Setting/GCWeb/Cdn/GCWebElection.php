<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\GCWeb\Cdn;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_gcweb_election" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_gcweb_election",
 *   type = "checkbox",
 *   title = @Translation("Toggle Election mode for CDN"),
 *   defaultValue = 0,
 *   description = @Translation("If checked the GCWeb theme features section will be disabled."),
 *   groups = {
 *     "gcweb" = @Translation("GCWeb"),
 *     "cdn" = @Translation("CDN"),
 *   }
 * )
 */
class GCWebElection extends SettingBase {}
