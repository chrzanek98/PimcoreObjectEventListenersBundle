<?php

namespace Chrzanek98\PimcoreObjectEventListenersBundle\EventListeners;

use Chrzanek98\PimcoreObjectEventListenersBundle\Context\HandlerContext;
use Pimcore\Event\Model\ElementEventInterface;
use Pimcore\Event\Model\DataObjectEvent;

class ObjectEventListener
{
    private $handlerContext;

    public function __construct(HandlerContext $handlerContext)
    {
        $this->handlerContext = $handlerContext;
    }

    public function onPreDelete(ElementEventInterface $element)
    {
        if ($element instanceof DataObjectEvent) {
            $this->handlerContext->handlePreDelete($element);
        }
    }

    public function onPostDelete(ElementEventInterface $element)
    {
        if ($element instanceof DataObjectEvent) {
            $this->handlerContext->handlePostDelete($element);
        }
    }

    public function onPreAdd(ElementEventInterface $element)
    {
        if ($element instanceof DataObjectEvent) {
            $this->handlerContext->handlePreAdd($element);
        }
    }

    public function onPostAdd(ElementEventInterface $element)
    {
        if ($element instanceof DataObjectEvent) {
            $this->handlerContext->handlePostAdd($element);
        }
    }

    public function onPreUpdate(ElementEventInterface $element)
    {
        if ($element instanceof DataObjectEvent) {
            $this->handlerContext->handlePreUpdate($element);
        }
    }

    public function onPostUpdate(ElementEventInterface $element)
    {
        if ($element instanceof DataObjectEvent) {
            $this->handlerContext->handlePostUpdate($element);
        }
    }
}
