<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public $headings = [],
    public string $endpoint = '',
    public string $title = '',
    public string $description = '',
    public bool $showButtonFilters = true
  ) {
    //
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.shared.table');
  }
}
