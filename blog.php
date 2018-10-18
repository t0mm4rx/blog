<?php

class Post
{
    private $title;
    private $text_preview; // Text shown in post listings
  private $link; // /article/:link/
  private $tags = [];
    private $date; // DD/MM/YYYY

    public function __construct($title, $text_preview, $link, $tags, $date)
    {
        $this->title = $title;
        $this->text_preview = $text_preview;
        $this->link = $link;
        $this->tags = $tags;
        $this->date = $date;
    }

    public function get_image()
    {
        return $GLOBALS['url'] . 'content/images/' . $this->link . '.jpg';
    }

    public function get_preview_image()
    {
        return $GLOBALS['url'] . 'content/images/' . $this->link . '_preview.jpg';
    }

    public function get_content()
    {
        return $GLOBALS['url'] . 'content/articles/' . $this->link . '.php';
    }

    public function get_url()
    {
        return $GLOBALS['url'] . 'article/' . $this->link . '/';
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_preview()
    {
        return $this->text_preview;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_tags()
    {
        return $this->tags;
    }

    public function get_timestamp()
    {
        return DateTime::createFromFormat('d/m/Y', $this->date)->getTimestamp();
    }

    public function is_tagged($tag)
    {
        return in_array($tag, $this->tags);
    }
}

class Blog
{
    private $posts = [];

    public function __construct()
    {
        $this->posts = [
        new Post('Intelligence artificielle partie 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ia-partie-1', ['IA'], '10/08/2018'),
        new Post('Intelligence artificielle partie 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ia-partie-2', ['IA'], '13/09/2018'),
        new Post('Mon expérience avec un Hackintosh', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'experience-hackintosh', ['Hackintosh'], '15/10/2018'),
        new Post('Ecole 42, qu\'est ce que c\'est ?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '42-presentation', ['42'], '18/10/2018')
      ];
    }

    public function get_posts_by_tag($tag)
    {
        $res = [];
        foreach ($this->posts as $key => $post) {
            if ($post->is_tagged($tag)) {
                $res[] = $post;
            }
        }
        return $res;
    }

    public function get_last_posts()
    {
        $res = [];
        usort($this->posts, function ($a, $b) {
            return strcmp($a->get_timestamp(), $b->get_timestamp());
        });
        for ($i = 0; $i < 3; $i++) {
            $res[] = $this->posts[$i];
        }
        return $res;
    }

    public function get_tags()
    {
        $res = [];
        foreach ($this->posts as $key => $post) {
            foreach ($post->get_tags() as $key => $tag) {
                if (!in_array($tag, $res)) {
                    $res[] = $tag;
                }
            }
        }
        return $res;
    }

    public function get_posts()
    {
        return $this->posts;
    }
}
