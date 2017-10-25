<?php
use PHPUnit\Framework\TestCase;
use SnowIO\Magento2DataModel\CustomAttribute;

class CustomAttributeTest extends TestCase
{

    public function testInitialisation()
    {
        $customAttribute = CustomAttribute::of('product_weight', '80');
        self::assertEquals([
            'attribute_code' => 'product_weight',
            'value' => '80',
        ],$customAttribute->toJson());
    }

    public function testAccessors()
    {
        $customAttribute = CustomAttribute::of('product_weight', '80');
        self::assertEquals('product_weight', $customAttribute->getCode());
        self::assertEquals('80', $customAttribute->getValue());
    }

}