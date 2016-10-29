<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Accessibility\SkipNav;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_skip_link_primary_text" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_skip_link_primary_text",
 *   type = "textfield",
 *   title = @Translation("Text for the primary ""skip link"""),
 *   defaultValue = @Translation("Skip to main content"),
 *   description = @Translation("For example: <em>Jump to navigation</em>, <em>Skip to content</em>"),
 *   groups = {
 *     "accessibility" = @Translation("Accessibility"),
 *     "skip_nav" = @Translation("Skip Navigation"),
 *   }
 * )
 */
class SkipLinkPrimaryText extends SettingBase {}
