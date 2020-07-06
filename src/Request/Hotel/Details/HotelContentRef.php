<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

class HotelContentRef
{
    private DescriptiveInfoRef $descriptiveInfoRef;
    private MediaRef $mediaRef;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'DescriptiveInfoRef' => $this->descriptiveInfoRef->toArray(),
            'MediaRef' => $this->mediaRef->toArray(),
        ];
    }

    /**
     * @param DescriptiveInfoRef $descriptiveInfoRef
     */
    public function setDescriptiveInfoRef(DescriptiveInfoRef $descriptiveInfoRef): void
    {
        $this->descriptiveInfoRef = $descriptiveInfoRef;
    }

    /**
     * @param MediaRef $mediaRef
     */
    public function setMediaRef(MediaRef $mediaRef): void
    {
        $this->mediaRef = $mediaRef;
    }
}
