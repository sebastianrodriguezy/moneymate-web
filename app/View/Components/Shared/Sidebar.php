<?php

namespace App\View\Components\Shared;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public User $user
  ) {
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.shared.sidebar');
  }

  public function getNavItems()
  {
    $path = request()->path();
    $splitedPath = explode('/', $path);
    $slug = $splitedPath[1];

    return [
      [
        'to' => 'home',
        'icon' => 'home',
        'text' => __('messages.home_title'),
        'active' => $slug === 'home'
      ],
      [
        'to' => 'movements',
        'icon' => 'reader',
        'text' => __('messages.nav_link_movements'),
        'active' => $slug === 'movements'
      ],
      [
        'to' => 'categories',
        'icon' => 'pricetags',
        'text' => __('messages.nav_link_categories'),
        'active' => $slug === 'categories'
      ],
      [
        'to' => 'persons',
        'icon' => 'people',
        'text' => __('messages.nav_link_persons'),
        'active' => $slug === 'persons'
      ],
      [
        'to' => 'reports',
        'icon' => 'bar-chart',
        'text' => __('messages.nav_link_reports'),
        'active' => $slug === 'reports'
      ],
    ];
  }

  public function getQuickAccessItems()
  {
    return [
      [
        'to' => 'movements?action=open_new',
        'color' => 'brand',
        'text' => __('messages.nav_link_new_movement')
      ],
      [
        'to' => 'categories?action=open_new',
        'color' => 'teal',
        'text' => __('messages.nav_link_new_category')
      ],
      [
        'to' => 'user',
        'color' => 'violet',
        'text' => __('messages.nav_link_config')
      ],
    ];
  }
}
