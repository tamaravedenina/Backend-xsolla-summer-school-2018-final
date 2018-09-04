<?php

namespace App\Model;

class Warehouse
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $address;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var ProductBatch[]
     */
    private $batches;

    /**
     * Warehouse constructor.
     *
     * @param $id
     * @param $address
     * @param array $batches
     */
    public function __construct($id, $address, $capacity, $batches = [])
    {
        $this->id = $id;
        $this->address = $address;
        $this->capacity = $capacity;
        $this->batches = $batches;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return ProductBatch[]|array
     */
    public function getProductBatches()
    {
        return $this->batches;
    }

    /**
     * @param ProductBatch[] $batches
     */
    public function setProductBatches($batches)
    {
        $this->batches = $batches;
    }

    /**
     * @return array
     */
    public function getProductBatchesArray()
    {
        $arrayBatches = [];

        foreach ($this->batches as $batch) {
            $arrayBatches[] = $batch->getProductBatchArray();
        }

        return $arrayBatches;
    }

    /**
     * @return array
     */
    public function getWarehouseArray()
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'capacity' => $this->capacity,
            'products'=>$this->getProductBatchesArray()
        ];
    }
}