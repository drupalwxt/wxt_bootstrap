<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Accessibility\SkipNav;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_skip_link_secondary_text" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_skip_link_secondary_text",
 *   type = "textfield",
 *   title = @Translation("Text for the secondary ""skip link"""),
 *   defaultValue = @Translation("Skip to ""About this site"""),
 *   description = @Translation("For example: <em>Jump to navigation</em>, <em>Skip to content</em>"),
 *   groups = {
 *     "accessibility" = @Translation("Accessibility"),
 *     "skip_nav" = @Translation("Skip Navigation"),
 *   }
 * )
 */
class SkipLinkSecondaryText extends SettingBase {}
