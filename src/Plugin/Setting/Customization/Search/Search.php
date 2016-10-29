<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Customization\Search;

use Drupal\bootstrap\Plugin\Setting\SettingBase;

/**
 * The "wxt_search_box" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_search_box",
 *   type = "textarea",
 *   title = @Translation("Search box visibility"),
 *   defaultValue = "",
 *   description = @Translation("Specify pages to exclude by using their paths. Enter one path per line. The ""*"" character is a wildcard. Example paths are <strong>blog</strong> for the blog page and <strong>blog/*</strong> for every personal blog. &lt;front&gt; is the front page."),
 *   groups = {
 *     "customization" = @Translation("Customization"),
 *     "search" = @Translation("Search"),
 *   }
 * )
 */
class Search extends SettingBase {}
