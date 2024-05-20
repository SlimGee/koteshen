<?php

namespace App\Enum;

enum EstimateStatus: string
{
    case DRAFT = 'draft';
    case SENT = 'sent';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case INVOICED = 'invoiced';
    case EXPIRED = 'expired';
    case ARCHIVED = 'archived';

    public function classes(): string
    {
        return match ($this) {
            self::ACCEPTED => 'bg-green-600 text-white',
            self::REJECTED => 'bg-red-700 text-white',
            self::ARCHIVED => 'bg-gray-800 text-white',
            self::SENT => 'bg-blue-800 text-white',
            self::INVOICED => 'bg-blue-800 text-white',
            self::DRAFT => 'bg-gray-700 text-gray-100',
            self::EXPIRED => 'bg-red-800 text-white',
        };
    }
}
