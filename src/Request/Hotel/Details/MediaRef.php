<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

class MediaRef
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'MaxItems' => 'ALL',
            'MediaTypes' => [
                'Images' => [
                    'Image' => [
                        [
                            'Type' => 'ORIGINAL',
                        ],
                    ],
                ],
            ],
            'AdditionalInfo' => [
                'Info' => [
                    [
                        'Type' => 'CAPTION',
                        'value' => true,
                    ],
                ],
            ],
            'Languages' => [
                'Language' => [
                    [
                        'Code' => 'EN',
                    ],
                ],
            ],
        ];
    }
}
