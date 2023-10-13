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
    return [
      [
        'to' => 'movements',
        'icon' => 'reader',
        'text' => __('messages.nav_link_movements')
      ],
      [
        'to' => 'categories',
        'icon' => 'pricetags',
        'text' => __('messages.nav_link_categories')
      ],
      [
        'to' => 'persons',
        'icon' => 'people',
        'text' => __('messages.nav_link_persons')
      ],
      [
        'to' => 'reports',
        'icon' => 'bar-chart',
        'text' => __('messages.nav_link_reports')
      ],
    ];
  }

  public function getQuickAccessItems()
  {
    return [
      [
        'to' => 'movements?action=open_new',
        'color' => 'bg-brand-400',
        'text' => __('messages.nav_link_new_movement')
      ],
      [
        'to' => 'categories?action=open_new',
        'color' => 'bg-teal-400',
        'text' => __('messages.nav_link_new_category')
      ],
      [
        'to' => 'user',
        'color' => 'bg-violet-400',
        'text' => __('messages.nav_link_config')
      ],
    ];
  }
}
