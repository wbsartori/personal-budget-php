<?php

namespace Source\Modules\Movement\Models;

use DateTime;

class MovementModel
{
    protected int $id;
    protected int $idPerson;
    protected string $description;
    protected string $classification;
    protected string $typeOfCost;
    protected string $movementDate;
    protected string $value;
    protected string $status;
    protected string $createdAt;
    protected string $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdPerson(): int
    {
        return $this->idPerson;
    }

    /**
     * @param int $idPerson
     */
    public function setIdPerson(int $idPerson): void
    {
        $this->idPerson = $idPerson;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getClassification(): string
    {
        return $this->classification;
    }

    /**
     * @param string $classification
     */
    public function setClassification(string $classification): void
    {
        $this->classification = $classification;
    }

    /**
     * @return string
     */
    public function getTypeOfCost(): string
    {
        return $this->typeOfCost;
    }

    /**
     * @param string $typeOfCost
     */
    public function setTypeOfCost(string $typeOfCost): void
    {
        $this->typeOfCost = $typeOfCost;
    }

    /**
     * @return string
     */
    public function getMovementDate(): string
    {
        return $this->movementDate;
    }

    /**
     * @param string $movementDate
     */
    public function setMovementDate(string $movementDate): void
    {
        $this->movementDate = $movementDate;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}