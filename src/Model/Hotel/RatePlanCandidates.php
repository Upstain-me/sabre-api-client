<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class RatePlanCandidates
{
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
