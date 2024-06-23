<?php

namespace PikseraPackages\Multilanguage;

use PikseraPackages\CustomField\Fields\Checkbox;
use PikseraPackages\FormBuilder\Elements\Color;
use PikseraPackages\FormBuilder\Elements\Date;
use PikseraPackages\FormBuilder\Elements\Email;
use PikseraPackages\FormBuilder\Elements\File;
use PikseraPackages\FormBuilder\Elements\Label;
use PikseraPackages\FormBuilder\Elements\Number;
use PikseraPackages\FormBuilder\Elements\RadioButton;
use PikseraPackages\FormBuilder\Elements\Range;
use PikseraPackages\FormBuilder\Elements\Select;
use PikseraPackages\FormBuilder\FormElementBuilder;
use PikseraPackages\Multilanguage\FormElements\FileOption;
use PikseraPackages\Multilanguage\FormElements\MwEditor;
use PikseraPackages\Multilanguage\FormElements\MwModuleSettings;
use PikseraPackages\Multilanguage\FormElements\Text;
use PikseraPackages\Multilanguage\FormElements\TextArea;
use PikseraPackages\Multilanguage\FormElements\TextAreaOption;
use PikseraPackages\Multilanguage\FormElements\TextOption;

class MultilanguageFormElementBuilder extends FormElementBuilder
{
    protected $formElementsClasses = [
        'Text' => Text::class,
        'MwEditor' => MwEditor::class,
        'MwModuleSettings' => MwModuleSettings::class,
        'TextOption' => TextOption::class,
        'TextArea' => TextArea::class,
        'TextAreaOption' => TextAreaOption::class,
        'FileOption'=>FileOption::class
    ];
//    protected $drivers = [
//        'text' => Text::class,
//        'textarea' => TextArea::class,
//        'mw-editor' => MwEditor::class,
//        'mw-module-settings' => MwModuleSettings::class,
//        'textarea-option' => TextAreaOption::class,
//        'text-option' => TextOption::class,
//    ];
//    protected $drivers = [
//        'text'=>Text::class,
//        'number'=>Number::class,
//        'textarea'=>TextArea::class,
//        'label'=>Label::class,
//        'select'=>Select::class,
//        'radio'=>RadioButton::class,
//        'range'=>Range::class,
//        'checkbox'=>Checkbox::class,
//        'color'=>Color::class,
//        'date'=>Date::class,
//        'email'=>Email::class,
//        'file'=>File::class,
//        'mw-editor'=>MwEditor::class,
//        'mw-module-settings'=>MwModuleSettings::class,
//        'textarea-option'=>TextAreaOption::class,
//        'text-option'=>TextOption::class,
//    ];
}
