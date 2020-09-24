<?php


class TwitterAdapter implements PublisherInterface
{
    private $twitter;

    public function __construct(Twitter $user)
    {
        $this->twitter = $user->getUserId();
    }

    public function publisher(string $content): void
    {
        $this->twitter->sendTwitterContent($content);
    }
}
