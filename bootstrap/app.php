<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\View\Compilers\BladeCompiler;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withBindings([
        BladeCompiler::class => function ($app) {
            return new BladeCompiler(
                $app->make('files'),
                '/tmp'
            );
        },
    ])
    ->withMiddleware(function (Middleware $middleware): void {
        // Percayai header X-Forwarded-For dari proxy (ngrok saat dev,
        // CDN/load-balancer saat produksi) agar $request->ip()
        // mengembalikan IP publik pengunjung asli, bukan IP proxy lokal.
        // Produksi: ganti '*' dengan daftar IP/CIDR proxy resmi.
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'track.visit' => \App\Http\Middleware\TrackVisit::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (
            \Illuminate\Http\Exceptions\PostTooLargeException $e,
            Request $request
        ) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'pdf' => 'Ukuran berkas terlalu besar untuk diunggah. Batas maksimal server saat ini adalah '
                        . ini_get('post_max_size')
                        . '. Silakan unggah berkas yang lebih kecil atau hubungi admin untuk meningkatkan limit server.'
                ]);
        });
    })
    ->create();