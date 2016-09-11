<?php

namespace Sands\Presenter\PDF;

use Illuminate\Support\ServiceProvider;

class PDFPresenterServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->bound('dompdf.wrapper')) {
            $this->app->register(\Barryvdh\DomPDF\ServiceProvider::class);
        }
        if (!$this->app->bound('sands.presenter')) {
            $this->app->register(\Sands\Presenter\PresenterServiceProvider::class);
        }
        $presenter = app('sands.presenter');
        $presenter->register('pdf', [
            'presenter' => PDFPresenter::class,
            'mimes' => [
                'application/pdf',
            ],
            'extensions' => [
                'pdf',
            ],
        ]);
        $presenter->setOption('pdf.fileName', 'Export');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
