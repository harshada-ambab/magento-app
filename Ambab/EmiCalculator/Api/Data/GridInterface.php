<?php

namespace Ambab\EmiCalculator\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const Bank_Name = 'bank_name';
    const Month = 'month';
    const Rate_Of_Int = 'rate_of_int';
    // const PUBLISH_DATE = 'publish_date';
    // const IS_ACTIVE = 'is_active';
    // const UPDATE_TIME = 'update_time';
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
    /**
     * Get Publish Date.
     *
     * @return varchar
     */
    // public function getPublishDate();

    // /**
    //  * Set PublishDate.
    //  */
    // public function setPublishDate($publishDate);

    // /**
    //  * Get IsActive.
    //  *
    //  * @return varchar
    //  */
    // public function getIsActive();

    // /**
    //  * Set StartingPrice.
    //  */
    // public function setIsActive($isActive);

    // /**
    //  * Get UpdateTime.
    //  *
    //  * @return varchar
    //  */
    // public function getUpdateTime();

    // /**
    //  * Set UpdateTime.
    //  */
    // public function setUpdateTime($updateTime);

    // /**
    //  * Get CreatedAt.
    //  *
    //  * @return varchar
    //  */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}