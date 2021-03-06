<?php
namespace SnowIO\Magento2DataModel\Transform;

use Joshdifabio\Transform\MapElements;
use Joshdifabio\Transform\Pipeline;
use Joshdifabio\Transform\Transform;
use SnowIO\Magento2DataModel\AttributeData;
use SnowIO\Magento2DataModel\Command\SaveAttributeCommand;

final class CreateSaveAttributeCommands
{
    public static function fromIterables(): Transform
    {
        return Pipeline::of(
            CreateDiffs::fromIterables(function (AttributeData $attributeData) {
                return $attributeData->getCode();
            }),
            self::fromDiffs()
        );
    }

    public static function fromDiffs(): Transform
    {
        return CreateSaveCommands::fromDiffs(self::fromAttributeData());
    }

    public static function fromAttributeData(): Transform
    {
        return MapElements::via(function (AttributeData $attributeData) {
            return SaveAttributeCommand::of($attributeData);
        });
    }
}
