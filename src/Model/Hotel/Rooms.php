<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class Rooms
{
    private Room $room;

    public function toArray(): array
    {
        return [
            'Room' => $this->room->getData(),
        ];
    }

    /**
     * @param Room $room
     */
    public function setRoom(Room $room): void
    {
        $this->room = $room;
    }
}
