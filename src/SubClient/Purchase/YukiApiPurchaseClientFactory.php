<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\Purchase;

use MaartenDeBlock\YukiApiClient\SubClient\Purchase\YukiApiPurchaseClient;
use MaartenDeBlock\YukiApiClient\SubClient\Purchase\YukiApiPurchaseClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiPurchaseClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\Purchase\YukiApiPurchaseClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiPurchaseClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiPurchaseClient($caller);
    }
}
