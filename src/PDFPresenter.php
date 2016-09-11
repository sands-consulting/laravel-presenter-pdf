<?php

namespace Sands\Presenter\PDF;

use Sands\Presenter\Presenter;
use Sands\Presenter\PresenterContract;

class PDFPresenter implements PresenterContract
{
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }

    public function render($data = [])
    {
        $dompdf = app('dompdf.wrapper');
        $dompdf->getDomPDF()->set_base_path(public_path());
        $dompdf->getDomPDF()->set_host(app('url')->to('/'));
        $generated = $dompdf->loadView($this->presenter->getOption('pdf.view'), $data);
        if ($this->presenter->getOption('pdf.download')) {
            return $generated->download($this->presenter->getOption('pdf.fileName') . '.pdf');
        }
        return $generated->stream();
    }
}
