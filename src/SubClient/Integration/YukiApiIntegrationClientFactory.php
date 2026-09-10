<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\Integration;

use MaartenDeBlock\YukiApiClient\SubClient\Integration\YukiApiIntegrationClient;
use MaartenDeBlock\YukiApiClient\SubClient\Integration\YukiApiIntegrationClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiIntegrationClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\Integration\YukiApiIntegrationClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiIntegrationClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiIntegrationClient($caller);
    }
}
