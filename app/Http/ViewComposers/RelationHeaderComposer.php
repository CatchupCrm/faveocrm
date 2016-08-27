<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Relation\RelationRepositoryContract;

class RelationHeaderComposer
{
  /**
   * The relation repository implementation.
   *
   * @var RelationRepository
   */
  protected $relations;

  /**
   * Create a new profile composer.
   *
   * @param  RelationRepository $relations
   * @return void
   */
  public function __construct(RelationRepositoryContract $relations)
  {
    $this->relations = $relations;
  }

  /**
   * Bind data to the view.
   *
   * @param  View $view
   * @return void
   */
  public function compose(View $view)
  {
    $relations = $this->relations->find($view->getData()['relation']['id']);
    /**
     * [User assigned the relation]
     * @var contact
     */
    $contact = $relations->userAssignee;
    $view->with('contact', $contact);

  }
}