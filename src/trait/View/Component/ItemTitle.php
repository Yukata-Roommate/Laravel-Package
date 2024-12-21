<?php

namespace YukataRm\Laravel\Trait\View\Component;

/**
 * Item Title trait
 *
 * @package YukataRm\Laravel\Trait\View\Component
 *
 * @method string getSizeClassDefault(bool|null $emphasis)
 */
trait ItemTitle
{
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * title
     *
     * @var string
     */
    public string $title;

    /**
     * title class
     *
     * @var string
     */
    public string $titleClass;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * set title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * set title class
     *
     * @param string|null $titleClass
     * @param string|null $size
     * @param string|null $color
     * @param bool|null $emphasis
     * @return void
     */
    public function setTitleClass(string|null $titleClass, string|null $size, string|null $color, bool|null $emphasis): void
    {
        $sizeClass = $this->getSizeClass($size, $emphasis);

        $colorClass = $this->getColorClass($color, $emphasis);

        $this->titleClass = "{$titleClass} {$sizeClass} {$colorClass} mb-0";
    }

    /**
     * get size class
     *
     * @param string|null $size
     * @param bool|null $emphasis
     * @return string
     */
    protected function getSizeClass(string|null $size, bool|null $emphasis): string
    {
        $fontSizes = [
            "xxl" => "fs-1",
            "xl"  => "fs-2",
            "lg"  => "fs-3",
            "md"  => "fs-4",
            "sm"  => "fs-5",
            "xs"  => "fs-6",
        ];

        $headings = [
            "xxl" => "h1",
            "xl"  => "h2",
            "lg"  => "h3",
            "md"  => "h4",
            "sm"  => "h5",
            "xs"  => "h6",
        ];

        $sizeClasses = $emphasis ? $headings : $fontSizes;

        if (array_key_exists($size, $sizeClasses)) return $sizeClasses[$size];

        if (is_string($size)) return $size;

        if (method_exists($this, "getSizeClassDefault")) return $this->getSizeClassDefault($emphasis);

        return "";
    }

    /**
     * get color class
     *
     * @param string|null $color
     * @param bool|null $emphasis
     * @return string
     */
    protected function getColorClass(string|null $color, bool|null $emphasis): string
    {
        $colors = [
            "primary"        => "text-primary",
            "secondary"      => "text-secondary",
            "success"        => "text-success",
            "danger"         => "text-danger",
            "warning"        => "text-warning",
            "info"           => "text-info",
            "light"          => "text-light",
            "dark"           => "text-dark",
            "body"           => "text-body",
            "body-secondary" => "text-body-secondary",
            "body-tertiary"  => "text-body-tertiary",
            "black"          => "text-black",
            "white"          => "text-white",
            "black-50"       => "text-black-50",
            "white-50"       => "text-white-50",
        ];

        $emphasisColors = [
            "primary"   => "text-primary-emphasis",
            "secondary" => "text-secondary-emphasis",
            "success"   => "text-success-emphasis",
            "danger"    => "text-danger-emphasis",
            "warning"   => "text-warning-emphasis",
            "info"      => "text-info-emphasis",
            "light"     => "text-light-emphasis",
            "dark"      => "text-dark-emphasis",
            "body"      => "text-body-emphasis",
        ];

        $colorClasses = $emphasis ? $emphasisColors : $colors;

        if (array_key_exists($color, $colorClasses)) return $colorClasses[$color];

        if (is_string($color)) return $color;

        return $emphasis ? "text-body-emphasis" : "text-body";
    }
}
