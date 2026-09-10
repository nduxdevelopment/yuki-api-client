<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\FiscalTable;

use MaartenDeBlock\YukiApiClient\SubClient\FiscalTable\YukiApiFiscalTableClient;
use MaartenDeBlock\YukiApiClient\SubClient\FiscalTable\YukiApiFiscalTableClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiFiscalTableClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\FiscalTable\YukiApiFiscalTableClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiFiscalTableClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiFiscalTableClient($caller);
    }
}
