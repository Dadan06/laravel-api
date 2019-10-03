<?php

namespace App\Types;

class SearchCriteria
{
    /**
     * @var string
     */
    private $value;
    /**
     * @var array
     */
    private $fields;

    /**
     * SearchCriteria constructor.
     * @param string $value
     * @param array $fields
     */
    public function __construct(?string $value, array $fields)
    {
        $this->value = $value;
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }
}
