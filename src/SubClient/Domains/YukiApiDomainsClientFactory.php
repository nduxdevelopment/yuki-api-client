<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\Domains;

use MaartenDeBlock\YukiApiClient\SubClient\Domains\YukiApiDomainsClient;
use MaartenDeBlock\YukiApiClient\SubClient\Domains\YukiApiDomainsClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiDomainsClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\Domains\YukiApiDomainsClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiDomainsClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiDomainsClient($caller);
    }
}
