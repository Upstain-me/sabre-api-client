<?php

namespace Upstain\SabreApiClient\Model;

interface DefaultSearchCriteriaInterface
{
    /**
     * @return array<string, mixed>
     */
    public function build(): array;

    /**
     * @param SearchInputInterface $searchInput
     *
     * @return array<string, mixed>
     */
    public function override(SearchInputInterface $searchInput): array;
}
