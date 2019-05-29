# A modern easy to develope cms for Laravel apps

[![Latest Stable Version](https://poser.pugx.org/faridsh69/cms/v/stable?format=flat-square)](https://packagist.org/packages/faridsh69/cms)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/faridsh69/cms/master.svg?style=flat-square)](https://travis-ci.org/faridsh69/cms)
[![Quality Score](https://img.shields.io/scrutinizer/g/faridsh69/cms.svg?style=flat-square)](https://scrutinizer-ci.com/g/faridsh69/cms)
[![StyleCI](https://styleci.io/repos/30915528/shield)](https://styleci.io/repos/30915528)
[![Total Downloads](https://img.shields.io/packagist/dt/faridsh69/cms.svg?style=flat-square)](https://packagist.org/packages/faridsh69/cms)

This Laravel package [creates a backup of your application](https://docs.faridsh69.be/cms/v6/taking-backups/overview). The backup is a zip file that contains all files in the directories you specify along with a dump of your database. The backup can be stored on [any of the filesystems you have configured in Laravel 5](http://laravel.com/docs/filesystem).

Feeling paranoid about backups? No problem! You can backup your application to multiple filesystems at once.

Once installed taking a backup of your files and databases is very easy. Just issue this artisan command:

``` bash
php artisan backup:run
```

But we didn't stop there. The package also provides [a backup monitor to check the health of your backups](https://docs.faridsh69.be/cms/v6/monitoring-the-health-of-all-backups/overview). You can be [notified via several channels](https://docs.faridsh69.be/cms/v6/sending-notifications/overview) when a problem with one of your backups is found.
To avoid using excessive disk space, the package can also [clean up old backups](https://docs.faridsh69.be/cms/v6/cleaning-up-old-backups/overview).

faridsh69 is a web design agency in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://faridsh69.be/opensource).

## Installation and usage

This package requires PHP 7.2 and Laravel 5.8 or higher.  
You'll find installation instructions and full documentation on https://docs.faridsh69.be/cms/v6.

## Using an older version of PHP / Laravel?

If you are on a PHP version below 7.2 or a Laravel version below 5.8 just use an older version of this package. 

Read the extensive [documentation on version 3](https://docs.faridsh69.be/cms/v3), [on version 4](https://docs.faridsh69.be/cms/v4) and [on version 5](https://docs.faridsh69.be/cms/v5). We won't introduce new features to v5 and below anymore but we will still fix bugs.

## Testing

Run the tests with:

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email freek@faridsh69.be instead of using the issue tracker.

## Postcardware

You're free to use this package, but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: faridsh69, Samberstraat 69D, 2060 Antwerp, Belgium.

We publish all received postcards [on our company website](https://faridsh69.be/en/opensource/postcards).

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## Support us

faridsh69 is a web design agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://faridsh69.be/opensource).

Does your business depend on our contributions? Reach out and support us on [Patreon](https://www.patreon.com/faridsh69). 
All pledges will be dedicated to allocating workforce on maintenance and new awesome stuff.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
