<?php

namespace Drupal\wxt_bootstrap\Plugin\Alter;

use Drupal\bootstrap\Plugin\Alter\ThemeSuggestions as BootstrapThemeSuggestions;
use Drupal\block\Entity\Block;
use Drupal\bootstrap\Utility\Variables;

/**
 * Implements hook_theme_suggestions_alter().
 *
 * @ingroup plugins_alter
 *
 * @BootstrapAlter("theme_suggestions")
 */
class ThemeSuggestions extends BootstrapThemeSuggestions {

  /**
   * {@inheritdoc}
   */
  public function alter(&$suggestions, &$context1 = NULL, &$hook = NULL) {
    $variables = Variables::create($context1);

    /** @var \Drupal\wxt_library\LibraryService $wxt */
    $wxt = \Drupal::service('wxt_library.service_wxt');
    $wxt_active = $wxt->getLibraryName();

    switch ($hook) {
      case 'block':
        if (!empty($variables['elements']['#id'])) {
          $block = Block::load($variables['elements']['#id']);
          $suggestions[] = 'block__' . $block->getRegion() . '__' . $variables['elements']['#id'];
          $suggestions[] = 'block__' . $block->getRegion() . '__' . $wxt_active . '__' . $variables['elements']['#id'];
        }
        if (isset($variables['elements']['#configuration']['region'])) {
          $plugin_id = explode(':', $variables['elements']['#plugin_id']);
          $suggestions[] = 'block__page_' . $variables['elements']['#configuration']['region'] . '__' . end($plugin_id);
          $suggestions[] = 'block__page_' . $variables['elements']['#configuration']['region'] . '__' . $wxt_active . '__' . end($plugin_id);
        }

        if (isset($variables['elements']['content']['#block_content'])) {
          $block_bundle = $variables['elements']['content']['#block_content']->bundle();
          $view_modes = '';
          if (!empty($variables['elements']['#configuration']['view_mode']) &&
              $variables['elements']['#configuration']['view_mode'] != 'full') {
            $view_modes = '__' . $variables['elements']['#configuration']['view_mode'];
          }
          $suggestions[] = 'block__block_content__' . $block_bundle . $view_modes;
          $suggestions[] = 'block__block_content__' . $block_bundle . $view_modes . '__' . $wxt_active;
          if (!empty($variables['elements']['#id'])) {
            $suggestions[] = 'block__block_content__' . $block_bundle . '__' . $variables['elements']['#id'] . $view_modes;
            $suggestions[] = 'block__block_content__' . $block_bundle . '__' . $variables['elements']['#id'] . $view_modes . '__' . $wxt_active;
          }
          if (isset($variables['elements']['#configuration']['region'])) {
            $suggestions[] = 'block__block_content__' . $block_bundle . '__' . $variables['elements']['#configuration']['region'] . $view_modes;
            $suggestions[] = 'block__block_content__' . $block_bundle . '__' . $variables['elements']['#configuration']['region'] . $view_modes . '__' . $wxt_active;
          }
        }
        break;

      case 'form':
        if ($variables['element']['#form_id'] == 'wxt_search_block_form') {
          $suggestions[] = 'form__wxt_search_block_form';
          $suggestions[] = 'form__wxt_search_block_form__' . $wxt_active;
        }
        break;

      case 'menu':
        $suggestions[] = $variables['theme_hook_original'] . '__' . $wxt_active;
        break;

      case 'page':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'page__' . $node->getType();
          $suggestions[] = 'page__' . $node->getType() . '__' . $wxt_active;
        }
        $suggestions[] = 'page__' . $wxt_active;
        break;

      case 'page_title':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'page_title__' . $node->getType();
          $suggestions[] = 'page_title__' . $node->getType() . '__' . $wxt_active;
        }
        $suggestions[] = 'page_title__' . $wxt_active;
        break;

      case 'maintenance_page':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'maintenance_page__' . $node->getType();
          $suggestions[] = 'maintenance_page__' . $node->getType() . '__' . $wxt_active;
        }
        $suggestions[] = 'maintenance_page__' . $wxt_active;
        break;

      case 'table':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'table__' . $node->getType();
          $suggestions[] = 'table__' . $node->getType() . '__' . $wxt_active;
        }
        $suggestions[] = 'table__' . $wxt_active;
        break;
    }

    parent::alter($suggestions, $context1, $hook);
  }

}
