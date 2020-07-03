# Laravel Package Template

## Configuration

This repository is template for building a new package. Some changes to the files are needed in order to represent a new package.


### composer.json

Edit `composer.json` to reflect the package information. At a minimum, the package name and autoload lines should be changed so that "vendor/package" reflects the name and namespace of the new package.

```json
{
    "name": "vendor/package",
    "autoload": {
        "psr-4": {
            "Paksuco\\Permission\\": "src/"
        }
    },
},
```


### config/permission-ui.php

The file `config/permission-ui.php`  should be renamed to to something more useful, like `config/my-package.php`. This is the configuration file that Laravel will publish into it's `config` directory.


### src/ServiceProvider.php

Open up `src/ServiceProvider.php` as well.  At a minimum the namespace has to be changed (it needs to match the PSR-4 namespace you set in `composer.json`).

In the `boot()` method, comment out or uncomment the components your package will need.  For example, if the package only has a configuration, then everything can be commented out except the `handleConfigs()` call:

```php
public function boot() {
    $this->handleConfigs();
    // $this->handleMigrations();
    // $this->handleViews();
    // $this->handleTranslations();
    // $this->handleRoutes();
}
```

In the `handleConfigs()` method, the "permission-ui" references should be changed to the name you chose up above (in the `config/permission-ui.php` instructions).


### Last Step

Update the `LICENSE` file as required (make sure it matches what you said your package's license is in `composer.json`).
