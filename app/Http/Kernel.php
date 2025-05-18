protected $routeMiddleware = [
    // andere middleware ...
    'admin' => \App\Http\Middleware\AdminOnly::class,
];
