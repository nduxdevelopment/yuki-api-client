<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\Archive;

use MaartenDeBlock\YukiApiClient\SubClient\Archive\YukiApiArchiveClient;
use MaartenDeBlock\YukiApiClient\SubClient\Archive\YukiApiArchiveClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiArchiveClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\Archive\YukiApiArchiveClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiArchiveClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiArchiveClient($caller);
    }
}
