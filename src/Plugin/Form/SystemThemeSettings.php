<?php

namespace Drupal\wxt_bootstrap\Plugin\Form;

use Drupal\bootstrap\Plugin\Form\SystemThemeSettings as BootstrapSystemThemeSettings;
use Drupal\bootstrap\Utility\Element;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @ingroup plugins_form
 * @ingroup plugins_setting
 *
 * @BootstrapForm("system_theme_settings")
 */
class SystemThemeSettings extends BootstrapSystemThemeSettings {

  /**
   * Sets up the vertical tab groupings.
   *
   * @param \Drupal\bootstrap\Utility\Element $form
   *   The Element object that comprises the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  protected function createGroups(Element $form, FormStateInterface $form_state) {

    // Provide the necessary default groups.
    $form['wxt_bootstrap'] = [
      '#type' => 'vertical_tabs',
      '#attached' => ['library' => ['bootstrap/theme-settings']],
      '#prefix' => '<h2><small>' . t('WxT Bootstrap Settings') . '</small></h2>',
      '#weight' => -10,
    ];
    $groups = [
      'accessibility' => t('Accessibility'),
      'customization' => t('Customization'),
      'gcweb' => t('GCWeb'),
    ];
    foreach ($groups as $group => $title) {
      $form[$group] = [
        '#type' => 'details',
        '#title' => $title,
        '#group' => 'wxt_bootstrap',
      ];
    }

    parent::createGroups($form, $form_state);
  }

}
