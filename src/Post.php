<?php 
declare(strict_types=1);

namespace App;

class Post
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $summary;
    /**
     * @var DateTime
     */
    private $date;
    /**
     * @var string
     */
    private $content;

    public function __construct(
        string $title,
        string $slug,
        string $summary,
        \DateTime $date,
        string $content
    )
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->summary = $summary;
        $this->date = $date;
        $this->content = $content;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function summary(): string
    {
        return $this->summary;
    }

    public function date(): \DateTime
    {
        return $this->date;
    }

    public function content(): string
    {
        return $this->content;
    }
}
