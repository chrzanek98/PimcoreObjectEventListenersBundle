<?php

namespace Chrzanek98\PimcoreObjectEventListenersBundle\Context;

use Chrzanek98\PimcoreObjectEventListenersBundle\EventListeners\Providers\HandlerInterface;
use Pimcore\Event\Model\DataObjectEvent;

class HandlerContext
{
    private $handlers = [];

    public function addHandler(HandlerInterface $handler)
    {
        $this->handlers[] = $handler;
    }

    public function handlePreDelete(DataObjectEvent $element)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($element)) {
                return $handler->preDelete($element);
            }
        }
    }

    public function handlePostDelete(DataObjectEvent $element)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($element)) {
                return $handler->postDelete($element);
            }
        }
    }

    public function handlePreAdd(DataObjectEvent $element)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($element)) {
                return $handler->preAdd($element);
            }
        }
    }

    public function handlePostAdd(DataObjectEvent $element)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($element)) {
                return $handler->postAdd($element);
            }
        }
    }

    public function handlePreUpdate(DataObjectEvent $element)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($element)) {
                return $handler->preUpdate($element);
            }
        }
    }

    public function handlePostUpdate(DataObjectEvent $element)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($element)) {
                return $handler->postUpdate($element);
            }
        }
    }
}
