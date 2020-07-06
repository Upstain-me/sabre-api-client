<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

class Descriptions
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'Description' => [
                [
                    'Type' => 'ShortDescription',
                ],
                [
                    'Type' => 'Alerts',
                ],
                [
                    'Type' => 'Dining',
                ],
                [
                    'Type' => 'Facilities',
                ],
                [
                    'Type' => 'Recreation',
                ],
                [
                    'Type' => 'Services',
                ],
                [
                    'Type' => 'Attractions',
                ],
                [
                    'Type' => 'CancellationPolicy',
                ],
                [
                    'Type' => 'DepositPolicy',
                ],
                [
                    'Type' => 'Directions',
                ],
                [
                    'Type' => 'Policies',
                ],
                [
                    'Type' => 'SafetyInfo',
                ],
                [
                    'Type' => 'TransportationInfo',
                ],
            ]
        ];
    }
}
