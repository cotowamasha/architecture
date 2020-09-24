<?php
/**
 * task2
 */

class VkAdapter implements PublisherInterface
{
    private $vk;

    public function __construct(Vk $user)
    {
        $this->twitter = $user->getUserId();
    }

    public function publisher(string $content): void
    {
        $this->vk->sendVkPost($content);
    }
}
