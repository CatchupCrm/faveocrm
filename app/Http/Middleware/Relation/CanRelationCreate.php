<?php
namespace App\Http\Middleware\Relation;

use Closure;

class CanRelationCreate
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (!auth()->user()->canDo('relation.create')) {
      Session()->flash('flash_message_warning', 'Not allowed to create relation!');
      return redirect()->route('relations.index');
    }
    return $next($request);
  }
}
