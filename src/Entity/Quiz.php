<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quizzes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_professionel = null;

    #[ORM\OneToMany(mappedBy: 'id_quiz', targetEntity: ResponsesClient::class)]
    private Collection $responsesClients;

    #[ORM\OneToMany(mappedBy: 'id_quiz', targetEntity: Questions::class)]
    private Collection $questions;

    public function __construct()
    {
        $this->responsesClients = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProfessionel(): ?User
    {
        return $this->id_professionel;
    }

    public function setIdProfessionel(?User $id_professionel): self
    {
        $this->id_professionel = $id_professionel;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
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
            $responsesClient->setIdQuiz($this);
        }

        return $this;
    }

    public function removeResponsesClient(ResponsesClient $responsesClient): self
    {
        if ($this->responsesClients->removeElement($responsesClient)) {
            // set the owning side to null (unless already changed)
            if ($responsesClient->getIdQuiz() === $this) {
                $responsesClient->setIdQuiz(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Questions>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Questions $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setIdQuiz($this);
        }

        return $this;
    }

    public function removeQuestion(Questions $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getIdQuiz() === $this) {
                $question->setIdQuiz(null);
            }
        }

        return $this;
    }
}
