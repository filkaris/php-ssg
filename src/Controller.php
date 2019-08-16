<?php 
declare(strict_types=1);

namespace App;

use Twig\Environment;

class Controller
{
    /**
     * @var PostFactory
     */
    private $factory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var Config
     */
    private $config;


    public function __construct(PostFactory $factory, Environment $twig, Config $config) {
        $this->factory = $factory;
        $this->twig = $twig;
        $this->config = $config;
    }
    public function index()
    {
        $posts = [];

        // Get All Posts
        $files = glob("posts/*");
        foreach( $files as $file ){
            $slug = pathinfo($file, PATHINFO_FILENAME); 
            $contents = file_get_contents($file);
            $posts[] = $this->factory->create($slug, $contents);
        }

        // Sort by date
        usort($posts, function($a, $b) {
            return $b->date() <=> $a->date();
        });

        return $this->twig->render('index.html.twig',[
            'posts' => $posts,
            'config' => $this->config
        ]);
    }

    public function post(string $slug)
    {
        $contents = file_get_contents("posts/$slug.md");
        if ( empty($contents) ) {
            throw new \Exception('Post Not Found');
        }
        $post = $this->factory->create($slug, $contents);

        return $this->twig->render('post.html.twig',[
            'post' => $post,
            'config' => $this->config
        ]);
    }
}
