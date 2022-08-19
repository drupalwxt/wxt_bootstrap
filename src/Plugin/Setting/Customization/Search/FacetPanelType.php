<?php

namespace Drupal\wxt_bootstrap\Plugin\Setting\Customization\Search;

use Drupal\bootstrap\Plugin\Setting\SettingBase;
use Drupal\bootstrap\Utility\Element;
use Drupal\Core\Form\FormStateInterface;

/**
 * The "wxt_facets_panel_type" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "wxt_facets_panel_type",
 *   type = "select",
 *   title = @Translation("Facet panel type"),
 *   defaultValue = "panel-default",
 *   options = {
 *     "panel-default" = @Translation("Default"),
 *     "panel-primary" = @Translation("Primary"),
 *   },
 *   description = @Translation("Select the panel type to use for facet display if not using collapsible facets."),
 *   groups = {
 *     "customization" = @Translation("Customization"),
 *     "search" = @Translation("Search"),
 *   }
 * )
 */
class FacetPanelType extends SettingBase {

  /**
   * {@inheritdoc}
   */
  public function alterFormElement(Element $form, FormStateInterface $form_state, $form_id = NULL) {
    $setting = $this->getSettingElement($form, $form_state);
    $setting->setProperty('states', [
      'visible' => [
        ':input[name="wxt_facets_collapsible"]' => ['checked' => FALSE],
      ],
    ]);
  }

}
