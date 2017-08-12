# 💌 Laravel Mail Template Collection

This package is a easy to use mail template collection for Laravel 5.x.
* You can use it for every purpose.
* You can override to all templates and all blocks.

## 🎨 [Templates](https://github.com/muratbsts/mail-template/wiki/Choosing-templates)

There is only 3 templates available currently. But more templates is coming fastly.
I'm developing beautiful and responsive email templates inspired by [Really Good Emails Collection](https://codepen.io/reallygoodemails).

🏙 [Screenshots are here](https://github.com/muratbsts/mail-template/wiki/Choosing-templates)

## Installation

Add the package is to `composer.json` file:

```shell
composer require muratbsts/mail-template dev-master
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

Create a config file like `config/mailtemplate.php`

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
        $mailer = app()->make(MailTemplate::class);
    
        $mailer->send('emails.welcome', [
            'button' => [
                'text' => 'Sign up now!',
                'link' => 'https://google.com',
            ]
        ], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Welcome!');
        });
    }
}
```

Extend your welcome email template from `mailtemplate::emails.{$template}` as like below

```php
@extends('mailtemplate::emails.{$template}')

@section('content')
    <p class="paragraph">Hi,</p>
    <p class="paragraph">Cultivar arabica, that, milk robust aroma redeye skinny arabica. Qui skinny, americano barista roast crema single shot filter. To go decaffeinated to go, mug iced sit plunger pot con panna decaffeinated barista sugar café au lait. Cup mazagran milk grinder, coffee steamed fair trade and whipped con panna aromatic.</p>
    <p class="paragraph">Take care,</p>
    <p class="paragraph">Murat</p>
@endsection
```

🎉 Cheers! That's it.

[More details at the wiki page.](https://github.com/muratbsts/mail-template/wiki)

## License

[MIT](./LICENCE) &copy; [Murat Bastas](http://muratbt.me)
