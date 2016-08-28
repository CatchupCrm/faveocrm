<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TimeLine;
use Illuminate\Http\Request;
use Datatables;
use Config;
use Dinero;
use App\Settings;
use App\Repositories\User\UserRepositoryContract;
use App\Repositories\TimeLine\TimeLineRepositoryContract;
use App\Repositories\Setting\SettingRepositoryContract;

class TimeLinesController extends Controller
{

  protected $users;
  protected $timelines;
  protected $settings;

  public function __construct(
    UserRepositoryContract $users,
    TimeLineRepositoryContract $timelines,
    SettingRepositoryContract $settings
  )
  {
    $this->timelines = $timelines;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('timelines.index');
  }

  public function anyData()
  {
    $timelines = TimeLine::select(['id', 'name', 'company_name', 'email', 'primary_number']);
    return Datatables::of($timelines)
      ->addColumn('namelink', function ($timelines) {
        return '<a href="timelines/' . $timelines->id . '" ">' . $timelines->name . '</a>';
      })
      ->add_column('edit', '
                <a href="{{ route(\'timelines.edit\', $id) }}" class="btn btn-success" >Edit</a>')
      ->add_column('delete', '
                <form action="{{ route(\'timelines.destroy\', $id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="submit" value="Delete" class="btn btn-danger" onClick="return confirm(\'Are you sure?\')"">

            {{csrf_field()}}
            </form>')
      ->make(true);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('timelines.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $this->timelines->create($request->all());
    Session()->flash('flash_message', 'TimeLine successfully added');
    return redirect()->route('timelines.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return Response
   */
  public function show($id)
  {
    return view('timelines.show');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return Response
   */
  public function edit($id)
  {
    return view('timelines.edit');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int $id
   * @return Response
   */
  public function update($id, Request $request)
  {
    $this->timelines->update($id, $request);
    Session()->flash('flash_message', 'TimeLine successfully updated');
    return redirect()->route('timelines.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return Response
   */
  public function destroy($id)
  {
    $this->timelines->destroy($id);
    return redirect()->route('timelines.index');
  }
}
