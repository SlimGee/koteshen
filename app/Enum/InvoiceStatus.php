<?php

namespace App\Enum;

enum InvoiceStatus: string
{
    case DRAFT = 'draft';
    case SENT = 'sent';
    case PAID = 'paid';
    case UNPAID = 'unpaid';
    case OVERDUE = 'overdue';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';
    case PARTIALLY_PAID = 'partially_paid';
    case PARTIALLY_REFUNDED = 'partially_refunded';
    case ARCHIVED = 'archived';

    public function classes()
    {
        return match ($this) {
            self::PAID => 'bg-green-600 text-white',
            self::UNPAID => 'bg-red-800 text-white',
            self::OVERDUE => 'bg-red-800 text-white',
            self::CANCELLED => 'bg-gray-800 text-white',
            self::REFUNDED => 'bg-gray-800 text-white',
            self::PARTIALLY_PAID => 'bg-yellow-800 text-white',
            self::PARTIALLY_REFUNDED => 'bg-gray-800 text-white',
            self::ARCHIVED => 'bg-gray-800 text-white',
            self::SENT => 'bg-blue-800 text-white',
            self::DRAFT => 'bg-gray-700 text-gray-100',
        };
    }
}
