<?php

namespace Source\Modules\Movement\Models;

class MovementModel
{
    protected $id;
    protected $idPerson;
    protected $description;
    protected $classification;
    protected $typeOfCost;
    protected $movementDate;
    protected $value;
    protected $status;
    protected $createdAt;
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }

    /**
     * @param mixed $idPerson
     */
    public function setIdPerson($idPerson)
    {
        $this->idPerson = $idPerson;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * @param mixed $classification
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;
    }

    /**
     * @return mixed
     */
    public function getTypeOfCost()
    {
        return $this->typeOfCost;
    }

    /**
     * @param mixed $typeOfCost
     */
    public function setTypeOfCost($typeOfCost)
    {
        $this->typeOfCost = $typeOfCost;
    }

    /**
     * @return mixed
     */
    public function getMovementDate()
    {
        return $this->movementDate;
    }

    /**
     * @param mixed $movementDate
     */
    public function setMovementDate($movementDate)
    {
        $this->movementDate = $movementDate;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}