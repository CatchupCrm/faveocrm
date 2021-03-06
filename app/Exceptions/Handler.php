<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
  /**
   * A list of the exception types that should not be reported.
   *
   * @var array
   */
  protected $dontReport = [
    AuthorizationException::class,
    HttpException::class,
    ModelNotFoundException::class,
    ValidationException::class,
  ];

  /**
   * Report or log an exception.
   *
   * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
   *
   * @param  \Exception $e
   * @return void
   */
  public function report(Exception $e)
  {
    return parent::report($e);
  }

  /**
   * Create a Symfony response for the given exception.
   *
   * @param  \Exception $e
   * @return mixed
   */
  protected function convertExceptionToResponse(Exception $e)
  {
    if (config('app.debug')) {
      $whoops = new \Whoops\Run;
      if (request()->wantsJson()) {
        $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler());
      } else {
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
      }
      return response()->make(
        $whoops->handleException($e),
        method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500,
        method_exists($e, 'getHeaders') ? $e->getHeaders() : []
      );
    }
    return parent::convertExceptionToResponse($e);
  }


  /**
   * Render an exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Exception $e
   * @return \Illuminate\Http\Response
   */
  public function render($request, Exception $e)
  {
    //check if exception is an instance of ModelNotFoundException.
    //NotFoundHttpException
    //or NotFoundHttpException
    if ($e instanceof ModelNotFoundException or $e instanceof NotFoundHttpException) {
      // ajax 404 json feedback
      if ($request->ajax()) {
        return response()->json(['error' => 'Not Found'], 404);
      }

      // normal 404 view page feedback
      return response()->view('errors.404', [], 404);
    }


    if ($e instanceof CustomException) {
      return response()->view('errors.503', [], 500);
    }

    return parent::render($request, $e);
  }
}
