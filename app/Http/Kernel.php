<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
  /**
   * The application's global HTTP middleware stack.
   *
   * These middleware are run during every request to your application.
   *
   * @var array
   */
  protected $middleware = [
    \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
  ];

  /**
   * The application's route middleware groups.
   *
   * @var array
   */
  protected $middlewareGroups = [
    'web' => [
      \App\Http\Middleware\EncryptCookies::class,
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      \App\Http\Middleware\VerifyCsrfToken::class,
      \App\Http\Middleware\LogLastUserActivity::class,
    ],
    'relation.create' => [\App\Http\Middleware\Relation\CanRelationCreate::class],
    'relation.update' => [\App\Http\Middleware\Relation\CanRelationUpdate::class],
    'user.create' => [\App\Http\Middleware\User\CanUserCreate::class],
    'user.update' => [\App\Http\Middleware\User\CanUserUpdate::class],
    'ticket.create' => [\App\Http\Middleware\Ticket\CanTicketCreate::class],
    'ticket.update.status' => [\App\Http\Middleware\Ticket\CanTicketUpdateStatus::class],
    'ticket.assigned' => [\App\Http\Middleware\Ticket\IsTicketAssigned::class],
    'lead.create' => [\App\Http\Middleware\Lead\CanLeadCreate::class],
    'lead.assigned' => [\App\Http\Middleware\Lead\IsLeadAssigned::class],
    'lead.update.status' => [\App\Http\Middleware\Lead\CanLeadUpdateStatus::class],
    'user.is.admin' => [\App\Http\Middleware\RedirectIfNotAdmin::class],
    'api' => [
      'throttle:60,1',
    ],
  ];

  /**
   * The application's route middleware.
   *
   * These middleware may be assigned to groups or used individually.
   *
   * @var array
   */
  protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'allowsRegistration' => \App\Http\Middleware\AllowsRegistration::class,
    'rbac' => \PHPZen\LaravelRbac\Middleware\Rbac::class,
  ];
}
