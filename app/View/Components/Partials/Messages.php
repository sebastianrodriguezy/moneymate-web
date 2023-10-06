<?php

namespace App\View\Components\Partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Messages extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public string $type,
    public $messages
  ) {
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.partials.messages');
  }
}
