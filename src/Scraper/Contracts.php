<?php

namespace App\Scraper;

use App\Entity\Category;

interface SourceInterface
{
    public function getUrl(): string;
    public function getName(): string;
    public function getWrapperSelector(): string;
    public function getTitleSelector(): string;
    public function getDescSelector(): string;
    public function getPriceSelector(): string;
    public function getLinkSelector(): string;
    public function getImageSelector(): string;
    public function getIsInfinityScroll(): bool;
    public function getPaginationNextSelector(): ?string;
    public function getPaginateComplement(): ?string;
    public function getCategory(): ?Category;
}
