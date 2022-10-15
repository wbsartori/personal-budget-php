<?php

namespace Source\Modules\Income\Models;

class IncomeModel
{
    protected int $id;
    protected int $idPerson;
    protected string $description;
    protected string $incomeDate;
    protected string $value;
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
     * @return string
     */
    public function getIdPerson(): string
    {
        return $this->idPerson;
    }

    /**
     * @param string $idPerson
     */
    public function setIdPerson(string $idPerson): void
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
    public function getIncomeDate(): string
    {
        return $this->incomeDate;
    }

    /**
     * @param string $incomeDate
     */
    public function setIncomeDate(string $incomeDate): void
    {
        $this->incomeDate = $incomeDate;
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