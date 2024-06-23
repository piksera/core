<?php

namespace AlexWestergaard\PhpGa4\Facade\Group;

interface SpendVirtualCurrencyFacade
{
    /**
     * The name of the virtual currency.
     *
     * @var virtual_currency_name
     * @param string $name eg. Gems
     */
    public function setVirtualCurrencyName(string $name);

    /**
     * The value of the virtual currency.
     *
     * @var value
     * @param integer $num eg. 5
     */
    public function setValue(int|float $num);

    /**
     * The name of the item the virtual currency is being used for.
     *
     * @var value
     * @param string $name eg. Starter Boost
     */
    public function setItemName(string $name);
}
