<?php
namespace SnowIO\Magento2DataModel\Transform;

use Joshdifabio\Transform\MapElements;
use Joshdifabio\Transform\Transform;
use SnowIO\Magento2DataModel\AttributeSetData;
use SnowIO\Magento2DataModel\Command\SaveAttributeSetCommand;

final class CreateSaveAttributeSetCommands
{
    public static function fromAttributeSetDataDiffs(): Transform
    {
        return CreateSaveCommands::fromDiffs(self::fromAttributeSetData());
    }

    public static function fromAttributeSetData(): Transform
    {
        return MapElements::via(function (AttributeSetData $attributeSetData) {
            return SaveAttributeSetCommand::of($attributeSetData);
        });
    }
}
