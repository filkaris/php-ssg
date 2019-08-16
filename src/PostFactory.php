<?php 
declare(strict_types=1);

namespace App;

use Pagerange\Markdown\MetaParsedown;

class PostFactory
{
    /**
     * @var MetaParsedown
     */
    private $parser;

    public function __construct(MetaParsedown $parser)
    {
        $this->parser = $parser;
    }

    public function create(string $slug, string $fileContents): Post
    {
        $metadata = $this->parser->meta($fileContents);
        $markdown = $this->parser->text($fileContents);
        return new Post(
            $metadata['title'], 
            $slug,
            $metadata['summary'], 
            new \DateTime($metadata['date']),
            $markdown
        );
    }
}
