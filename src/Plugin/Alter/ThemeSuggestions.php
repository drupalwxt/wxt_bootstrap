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
          if (is_null($block)) {
            return;
          }
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

      case 'breadcrumb':
        $suggestions[] = 'breadcrumb__' . $wxt_active;
        break;

      case 'field':
        $element = $variables['element'];
        if (isset($element['#field_name'])) {
          if ($element['#field_name'] == 'slideshow_items') {
            $entity = $element['#object'];
            if ($entity->hasField('field_slideshow_style')) {
              $value = $entity->field_slideshow_style->value;
              if (!empty($value)) {
                $suggestions[] = 'field__media__slideshow_items__slideshow__' . $value;
              }
            }
          }
        }
        break;

      case 'form':
        if ($variables['element']['#form_id'] == 'wxt_search_block_form') {
          $suggestions[] = 'form__wxt_search_block_form';
          $suggestions[] = 'form__wxt_search_block_form__' . $wxt_active;
        }
        break;

      case 'media':
        $entity = $variables->element['#media'];
        if ($entity->bundle() == 'slideshow') {
          if ($entity->hasField('field_slideshow_style')) {
            $value = $entity->field_slideshow_style->value;
            if (!empty($value)) {
              $suggestions[] = 'media__slideshow__' . $value;
            }
          }
        }
        break;

      case 'menu':
        $suggestions[] = $variables['theme_hook_original'] . '__' . $wxt_active;
        break;

      case 'page':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'page__' . $node->getType();
        }
        $suggestions[] = 'page__' . $wxt_active;
        if (is_object($node)) {
          $suggestions[] = 'page__' . $node->getType() . '__' . $wxt_active;
          $suggestions[] = 'page__node__' . $node->id() . '__' . $wxt_active;
        }
        else {
          $suggestions = array_merge($suggestions, self::currentPageSuggestions('page', $wxt_active));
        }
        break;

      case 'page_title':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'page_title__' . $node->getType();
        }
        $suggestions[] = 'page_title__' . $wxt_active;
        if (is_object($node)) {
          $suggestions[] = 'page_title__' . $node->getType() . '__' . $wxt_active;
          $suggestions[] = 'page_title__node__' . $node->id() . '__' . $wxt_active;
        }
        else {
          $suggestions = array_merge($suggestions, self::currentPageSuggestions('page_title', $wxt_active));
        }
        break;

      case 'maintenance_page':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'maintenance_page__' . $node->getType();
        }
        $suggestions[] = 'maintenance_page__' . $wxt_active;
        if (is_object($node)) {
          $suggestions[] = 'maintenance_page__' . $node->getType() . '__' . $wxt_active;
        }
        break;

      case 'table':
        $node = \Drupal::routeMatch()->getParameter('node');
        if (is_object($node)) {
          $suggestions[] = 'table__' . $node->getType();
        }
        $suggestions[] = 'table__' . $wxt_active;
        if (is_object($node)) {
          $suggestions[] = 'table__' . $node->getType() . '__' . $wxt_active;
        }
        break;
    }

    parent::alter($suggestions, $context1, $hook);
  }

  /**
   * Append active wxt theme to all current page theme suggestions.
   *
   * @param string $base
   *   The base 'thing' from which more specific suggestions are derived.
   * @param string $wxt_active
   *   The active wxt theme.
   *
   * @return array
   *   The modified list of current page suggestions.
   *
   * @see system_theme_suggestions_page()
   * @see theme_get_suggestions()
   */
  private static function currentPageSuggestions($base, $wxt_active) {
    $path_args = explode('/', trim(\Drupal::service('path.current')->getPath(), '/'));
    return array_map(function ($suggestion) use ($wxt_active) {
      return $suggestion . '__' . $wxt_active;
    }, theme_get_suggestions($path_args, $base));
  }

}
