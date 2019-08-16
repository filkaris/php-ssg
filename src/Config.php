<?php 
declare(strict_types=1);

namespace App;

class Config
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $subtitle;

    public function __construct(string $title, string $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function subtitle(): string
    {
        return $this->subtitle;
    }
}
