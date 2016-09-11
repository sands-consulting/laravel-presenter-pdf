# Sands\Presenter\PDF

[Sands Laravel Presenter](https://github.com/sands-consulting/laravel-presenter) plugin to respond with PDF files. PDFs are generated using the awesome [Laravel DOMPDF](https://github.com/barryvdh/laravel-dompdf) package.

## Installation

```bash
$ composer require sands/laravel-presenter-pdf
```
Make sure [Sands\Presenter](https://github.com/sands-consulting/laravel-presenter) has been properly installed.

In `config/app.php` add `Sands\Presenter\PDF\PDFPresenterServiceProvider` after the `Sands\Presenter\PresenterServiceProvider` inside the `providers` array:

```php
'providers' => [
     ...
     Sands\Presenter\PresenterServiceProvider::class,
     Sands\Presenter\PDF\PDFPresenterServiceProvider::class,
     ...
]
```

## Usage

This plugin allows you to easily create PDF exports.

Let's say you have a UsersController with the below method:

```php
public function index()
{
    return $this->present(['users' => User::all()])
        ->setOption('pdf.view', 'users.pdfs.index')
        ->setOption('pdf.download', false)
        ->setOption('pdf.fileName', 'User Reports')
        ->using('blade', 'pdf');
}
```

The `pdf.view` determines the blade view to be used for PDF generation.

When the user visits `/users?format=pdf`, the `User Reports.pdf` file will be streamed to their browser.

Alternatively if you want the pdf to be downloaded, you can use `setOption('pdf.download', true)`.

The `pdf.fileName` determines the generated download file name.


## MIT License

Copyright (c) 2016 Sands Consulting Sdn Bhd


Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.