<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="writtenComments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentAuthor;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="receivedComments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentRecipient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCommentAuthor(): ?User
    {
        return $this->commentAuthor;
    }

    public function setCommentAuthor(?User $commentAuthor): self
    {
        $this->commentAuthor = $commentAuthor;

        return $this;
    }

    public function getCommentRecipient(): ?User
    {
        return $this->commentRecipient;
    }

    public function setCommentRecipient(?User $commentRecipient): self
    {
        $this->commentRecipient = $commentRecipient;

        return $this;
    }
}
