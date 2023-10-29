<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public string $catalog = '',
    public string $label = '',
    public string $placeholder = '',
    public string $id = '',
    public $onSelect = null
  ) {
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.shared.dropdown');
  }
}
