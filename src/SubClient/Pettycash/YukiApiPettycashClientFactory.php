<?php

namespace MaartenDeBlock\YukiApiClient\SubClient\Pettycash;

use MaartenDeBlock\YukiApiClient\SubClient\Pettycash\YukiApiPettycashClient;
use MaartenDeBlock\YukiApiClient\SubClient\Pettycash\YukiApiPettycashClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Soap\ExtSoapEngine\ExtSoapEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class YukiApiPettycashClientFactory
{
    public static function factory(string $wsdl) : \MaartenDeBlock\YukiApiClient\SubClient\Pettycash\YukiApiPettycashClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(YukiApiPettycashClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new YukiApiPettycashClient($caller);
    }
}
