# 💌 Laravel Mail Template Collection

This package is a easy to use mail template collection for Laravel 5.x.
* You can use it for every purpose.
* You can override to all templates and all blocks.

## 🎨 [Templates](./screenshots)

There is only 1 template available currently. But more templates is coming fastly.
I'm developing beautiful and responsive email templates inspired by [Really Good Emails Collection](https://codepen.io/reallygoodemails).

🏙 [Screenshots are here](./screenshots)

## Installation

Add the package is to `composer.json` file:

```shell
composer require muratbsts/mail-template
```

Add the service provider to `config/app.php` file:

```php
<?php
...
'providers' => [
    ...
    Muratbsts\MailTemplate\Providers\MailTemplateServiceProvider::class,
    ...
],
...
```

Create a config file like `config/mailtemplapte.php`

```php
<?php
return [
    'template'  => 'default',
    'footnote'  => null,

    'logo'      => [
        'path'  => null,
        'link'  => null,
    ],

    'from'      => 'sender@email.com',
    'cc'        => null,
    'bcc'       => null,
];
```

## Usage

Use package as like below in your method

```php
<?php

use Muratbsts\MailTemplate\MailTemplate as MailTemplate;

class XyzController extends Controller
{
    public function send()
    {
        $mailer = new MailTemplate;
    
        $mailer->send('emails.welcome', [
            'button' => [
                'text' => 'Sign up now!',
                'link' => 'https://google.com',
            ]
        ], function ($message) {
            $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
        });
    }
}
```

Extend your welcome email template from `mailtemplate::emails.default` as like below

```php
@extends('mailtemplate::emails.default')

@section('logo')
    <a href="https://www.seeklogo.net/wp-content/uploads/2015/09/google-mail-logo-vector-download.jpg" style="text-decoration: none;transition: opacity 0.1s ease-in;color: #c3ced9;" target="_blank">
        <img alt="" src="https://www.seeklogo.net/wp-content/uploads/2015/09/google-mail-logo-vector-download.jpg" style="display: block;height: auto;width: 100%;border: 0;max-width: 142px;max-height: 142px;" width="142">
    </a>
@endsection

@section('header')
    Lorem ipsum dolor sit amet
@endsection

@section('banner')
    <a href="http://placehold.it/900x300" target="_blank">
        <img alt="" src="http://placehold.it/900x300" style="border: 0;display: block;height: auto;width: 100%;max-width: 900px;" width="560">
    </a>
@endsection

@section('content')
    <p class="paragraph">Hi,</p>
    <p class="paragraph">Cultivar arabica, that, milk robust aroma redeye skinny arabica. Qui skinny, americano barista roast crema single shot filter. To go decaffeinated to go, mug iced sit plunger pot con panna decaffeinated barista sugar café au lait. Cup mazagran milk grinder, coffee steamed fair trade and whipped con panna aromatic.</p>
    <p class="paragraph">Take care,</p>
    <p class="paragraph">Murat</p>
@endsection

@section('footnote')
    Selam
@endsection
```

🎉 Cheers! That's it.

## License

[MIT](./LICENCE) &copy; [Murat Bastas](http://muratbt.me)
