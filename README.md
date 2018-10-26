[![SymfonyInsight](https://insight.symfony.com/projects/58c2814c-9e63-4380-acd0-82a834ef0701/big.svg)](https://insight.symfony.com/projects/58c2814c-9e63-4380-acd0-82a834ef0701)

Installation
============

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute:

```console
$ composer require chrzanek98/pimcore-object-event-listeners-bundle "@dev"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new \Chrzanek98\PimcoreObjectEventListenersBundle\Chrzanek98PimcoreObjectEventListenersBundle(),
        );

        // ...
    }

    // ...
}
```
How it works?
-------------------

### Step 1
Create handler class e.g. AcmeEventListener.php and extend it with AbstractHandler

```php
<?php

namespace AppBundle\EventListeners;

use Chrzanek98\PimcoreObjectEventListenersBundle\EventListeners\Providers\AbstractHandler;
use Pimcore\Event\Model\DataObjectEvent;

class AcmeEventListener extends AbstractHandler
{
    // ...
}
```
### Step 2

Implement canHandle method

```php
<?php

namespace AppBundle\EventListeners;

// ...

class AcmeEventListener extends AbstractHandler
{
    public function canHandle(DataObjectEvent $element)
    {
        return $element->getObject() instanceof Acme;
    }
}
```

### Step 3

Use desired hook, currently available are pre/post Add/Update/Delete

```php
<?php

namespace AppBundle\EventListeners;

// ...

class AcmeEventListener extends AbstractHandler
{
    public function preUpdate(DataObjectEvent $element)
    {
        throw new NotFoundHttpException('Lorem ipsum dolor sit amet');
    }

    public function canHandle(DataObjectEvent $element)
    {
        return $element->getObject() instanceof Acme;
    }
}
```

### Step 4

Register your event handler as a service with tag `object.handler`

```yaml
    object.handler.acme:
        class: AppBundle\EventListeners\AcmeEventListener
        tags:
            - { name: object.handler }
```
