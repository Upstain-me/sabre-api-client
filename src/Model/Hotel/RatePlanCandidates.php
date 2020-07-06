<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class RatePlanCandidates
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'ExactMatchOnly' => false,
            'RatePlanCandidate' => [
                new \stdClass(),
            ],
        ];
    }
}
