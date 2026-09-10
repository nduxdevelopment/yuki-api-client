<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\AccountingInfo;

use MaartenDeBlock\YukiApiClient\SubClient\AccountingInfo\YukiApiAccountingInfoClient;
use MaartenDeBlock\YukiApiClient\SubClient\AccountingInfo\YukiApiAccountingInfoClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiAccountingInfoClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\AccountingInfo\YukiApiAccountingInfoClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiAccountingInfoClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiAccountingInfoClient($caller);
    }
}
