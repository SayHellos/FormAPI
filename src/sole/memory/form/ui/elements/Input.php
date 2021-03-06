<?php
/**
 * Created by PhpStorm.
 * User: SoleMemory
 * Date: 2019/1/13
 * Time: 16:59
 */

namespace sole\memory\form\ui\elements;


class Input extends CustomElement
{
    /** @var string */
    private $hint;
    /** @var string */
    private $default;
    /** @var string|null */
    private $value;
    /**
     * @param string $text
     * @param string $hintText
     * @param string $defaultText
     */
    public function __construct(string $text, string $hintText = "", string $defaultText = ""){
        parent::__construct($text);
        $this->hint = $hintText;
        $this->default = $defaultText;
    }
    public function getType() : string{
        return "input";
    }
    /**
     * @return string|null
     */
    public function getValue() : ?string{
        return $this->value;
    }
    /**
     * @param string $value
     *
     * @throws \TypeError
     */
    public function setValue($value) : void{
        if(!is_string($value)){
            throw new \TypeError("Expected string, got " . gettype($value));
        }
        $this->value = $value;
    }
    /**
     * Returns the text shown in the text-box when the box is not focused and there is no text in it.
     * @return string
     */
    public function getHintText() : string{
        return $this->hint;
    }
    /**
     * Returns the text which will be in the text-box by default.
     * @return string
     */
    public function getDefaultText() : string{
        return $this->default;
    }

    public function serializeElementData() : array{
        return [
            "placeholder" => $this->hint,
            "default" => $this->default
        ];
    }
}
