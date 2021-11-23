<?php

namespace Ambab\EmiCalculator\Api\Data;

interface GridInterface
{
    
    const ENTITY_ID = 'entity_id';
    const Bank_Name = 'bank_name';
    const Month = 'month';
    const Rate_Of_Int = 'rate_of_int';
    const CREATED_AT = 'created_at';

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    public function setEntityId($entity_id);

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getBankName();
    public function setBankName($bank_name);

    /**
     * Get Content.
     *
     * @return varchar
     */
    public function getMonth();

    /**
     * Set Content.
     */
    public function setMonth($month);

    

    public function getRateOfInt();
    public function setRateOfInt($rate_of_int);


    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}