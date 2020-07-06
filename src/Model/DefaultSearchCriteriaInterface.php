<?php

namespace Upstain\SabreApiClient\Model;

interface DefaultSearchCriteriaInterface
{
    /**
     * @return array
     */
    public function build(): array;

    /**
     * @param SearchInputInterface $searchInput
     * @return array
     */
    public function override(SearchInputInterface $searchInput): array;
}
