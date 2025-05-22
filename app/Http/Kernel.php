


protected $routeMiddleware =[
    
    'admin' => \App\Http\Middleware\AdminOnly::class,
    'can.admin-actions' => \App\Http\Middleware\CheckAdmin::class,
];
