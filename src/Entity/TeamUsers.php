<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamUsersRepository")
 */
class TeamUsers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isManager;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\InfosPlayer", inversedBy="team", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsManager(): ?bool
    {
        return $this->isManager;
    }

    public function setIsManager(bool $isManager): self
    {
        $this->isManager = $isManager;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getUser(): ?InfosPlayer
    {
        return $this->user;
    }

    public function setUser(InfosPlayer $user): self
    {
        $this->user = $user;

        return $this;
    }

}
