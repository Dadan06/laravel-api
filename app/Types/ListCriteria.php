<?php

namespace App\Types;

class ListCriteria
{
    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $pageSize;

    const DEFAULT_PAGE = 1;
    const DEFAULT_PAGE_SIZE = 15;

    /**
     * ListCriteria constructor.
     * @param int|null $page
     * @param int|null $pageSize
     */
    public function __construct(?int $page, ?int $pageSize)
    {
        $this->page = $page ?? self::DEFAULT_PAGE;
        $this->pageSize = $pageSize ?? self::DEFAULT_PAGE_SIZE;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page - 1;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }
}
