<?php

namespace Chrzanek98\PimcoreObjectEventListenersBundle\EventListeners\Providers;

use Pimcore\Event\Model\DataObjectEvent;

interface HandlerInterface
{
    public function preAdd(DataObjectEvent $element);

    public function postAdd(DataObjectEvent $element);

    public function preDelete(DataObjectEvent $element);

    public function postDelete(DataObjectEvent $element);

    public function preUpdate(DataObjectEvent $element);

    public function postUpdate(DataObjectEvent $element);

    public function canHandle(DataObjectEvent $element);
}