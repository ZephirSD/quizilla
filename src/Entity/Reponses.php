<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponsesRepository::class)]
class Reponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reponses = null;

    #[ORM\ManyToOne(inversedBy: 'reponses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $id_question = null;

    #[ORM\OneToMany(mappedBy: 'id_reponse', targetEntity: ResponsesClient::class, orphanRemoval: true)]
    private Collection $responsesClients;

    public function __construct()
    {
        $this->responsesClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponses(): ?string
    {
        return $this->reponses;
    }

    public function setReponses(?string $reponses): self
    {
        $this->reponses = $reponses;

        return $this;
    }

    public function getIdQuestion(): ?Questions
    {
        return $this->id_question;
    }

    public function setIdQuestion(?Questions $id_question): self
    {
        $this->id_question = $id_question;

        return $this;
    }

    /**
     * @return Collection<int, ResponsesClient>
     */
    public function getResponsesClients(): Collection
    {
        return $this->responsesClients;
    }

    public function addResponsesClient(ResponsesClient $responsesClient): self
    {
        if (!$this->responsesClients->contains($responsesClient)) {
            $this->responsesClients->add($responsesClient);
            $responsesClient->setIdReponse($this);
        }

        return $this;
    }

    public function removeResponsesClient(ResponsesClient $responsesClient): self
    {
        if ($this->responsesClients->removeElement($responsesClient)) {
            // set the owning side to null (unless already changed)
            if ($responsesClient->getIdReponse() === $this) {
                $responsesClient->setIdReponse(null);
            }
        }

        return $this;
    }
}
