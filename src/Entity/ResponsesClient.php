<?php

namespace App\Entity;

use App\Repository\ResponsesClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsesClientRepository::class)]
class ResponsesClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'responsesClients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reponses $id_reponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReponse(): ?Reponses
    {
        return $this->id_reponse;
    }

    public function setIdReponse(?Reponses $id_reponse): self
    {
        $this->id_reponse = $id_reponse;

        return $this;
    }
}
