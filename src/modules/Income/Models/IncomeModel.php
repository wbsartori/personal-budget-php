<?php

namespace Source\Modules\Income\Models;

class IncomeModel
{
    protected int $id;
    protected int $idPerson;
    protected string $description;
    protected string $classification;
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
     * @return IncomeModel
     */
    public function setId(int $id): IncomeModel
    {
        $this->id = $id;
        return $this;
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
     * @return IncomeModel
     */
    public function setIdPerson(int $idPerson): IncomeModel
    {
        $this->idPerson = $idPerson;
        return $this;
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
     * @return IncomeModel
     */
    public function setDescription(string $description): IncomeModel
    {
        $this->description = $description;
        return $this;
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
     * @return IncomeModel
     */
    public function setClassification(string $classification): IncomeModel
    {
        $this->classification = $classification;
        return $this;
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
     * @return IncomeModel
     */
    public function setIncomeDate(string $incomeDate): IncomeModel
    {
        $this->incomeDate = $incomeDate;
        return $this;
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
     * @return IncomeModel
     */
    public function setValue(string $value): IncomeModel
    {
        $this->value = $value;
        return $this;
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
     * @return IncomeModel
     */
    public function setCreatedAt(string $createdAt): IncomeModel
    {
        $this->createdAt = $createdAt;
        return $this;
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
     * @return IncomeModel
     */
    public function setUpdatedAt(string $updatedAt): IncomeModel
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}