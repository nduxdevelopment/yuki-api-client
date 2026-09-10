<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\Contact;

use MaartenDeBlock\YukiApiClient\SubClient\Contact\YukiApiContactClient;
use MaartenDeBlock\YukiApiClient\SubClient\Contact\YukiApiContactClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiContactClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\Contact\YukiApiContactClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiContactClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiContactClient($caller);
    }
}
