<?php

declare(strict_types=1);

namespace Arcanedev\Html\Elements;

use Arcanedev\Html\Contracts\Selectable;
use Arcanedev\Html\Elements\Concerns\{HasDisabledAttribute, HasValueAttribute};

/**
 * Class     Option
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @method   \Arcanedev\Html\Elements\Option  selectedUnless(bool $condition)
 */
class Option extends HtmlElement implements Selectable
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use HasDisabledAttribute,
        HasValueAttribute;

    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected string $tag = 'option';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Add the selected if it fulfill the condition.
     *
     * @return $this
     */
    public function selectedIf(bool $condition): static
    {
        return $condition ? $this->selected() : $this->unselected();
    }

    /**
     * Add the selected attribute.
     */
    public function selected(bool $selected = true): static
    {
        return $selected
            ? $this->attribute('selected')
            : $this->forgetAttribute('selected');
    }

    /**
     * Remove the selected attribute.
     */
    public function unselected(): static
    {
        return $this->selected(false);
    }
}
