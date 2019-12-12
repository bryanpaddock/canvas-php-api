<?php

namespace Valenture\CanvasApi\Modules\SisImport\Objects;

use DateTime;

final class SisImport
{
    /**
     * The unique identifier for the SIS import.
     *
     * @var int
     */
    private $id;

    /**
     * The date the SIS import was created.
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * The date the SIS import finished. Returns null if not finished.
     *
     * @var DateTime
     */
    private $endedAt;

    /**
     * Choose the data format for reading SIS data. With a standard Canvas install, this option can only be 'instructure_csv', and if unprovided, will be assumed to be so. Can be part of the query string.
     *
     * @var string
     */
    private $importType = 'instructure_csv';

    /**
     * There are two ways to post SIS import data - either via a multipart/form-data form-field-style attachment, or via a non-multipart raw post request.
     *
     * 'attachment' is required for multipart/form-data style posts. Assumed to be SIS data from a file upload form field named 'attachment'.
     *
     * @var string
     */
    private $attachment;

    /**
     * If set, this SIS import will be run in batch mode, deleting any data previously imported via SIS that is not present in this latest import. See the SIS CSV Format page for details. Batch mode cannot be used with diffing.
     *
     * @var bool
     */
    private $batchMode = false;

    /**
     * When set the import will skip any deletes. This does not account for objects that are deleted during the batch mode cleanup process.
     *
     * @var bool
     */
    private $skipDeletes;

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
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime
     */
    public function getEndedAt(): DateTime
    {
        return $this->endedAt;
    }

    /**
     * @param DateTime $endedAt
     */
    public function setEndedAt(DateTime $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    /**
     * @return string
     */
    public function getImportType(): string
    {
        return $this->importType;
    }

    /**
     * @param string $importType
     */
    public function setImportType(string $importType): void
    {
        $this->importType = $importType;
    }

    /**
     * @return string
     */
    public function getAttachment(): string
    {
        return $this->attachment;
    }

    /**
     * @param string $attachment
     */
    public function setAttachment(string $attachment): void
    {
        $this->attachment = $attachment;
    }

    /**
     * @return bool
     */
    public function isBatchMode(): bool
    {
        return $this->batchMode;
    }

    /**
     * @param bool $batchMode
     */
    public function setBatchMode(bool $batchMode): void
    {
        $this->batchMode = $batchMode;
    }

    /**
     * @return bool
     */
    public function isSkipDeletes(): bool
    {
        return $this->skipDeletes;
    }

    /**
     * @param bool $skipDeletes
     */
    public function setSkipDeletes(bool $skipDeletes): void
    {
        $this->skipDeletes = $skipDeletes;
    }

    public function toArray(): array
    {
        return [
            'import_type' => $this->importType,
            'attachment' => $this->attachment,
            'batch_mode' => $this->batchMode,
            'skip_deletes' => $this->skipDeletes
        ];
    }

}