<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum CompanyPlanEnum: string implements HasLabel
{
    case FREE = "free";
    case PRO = "pro";
    case ENTERPRISE = "ENTERPRISE";

    public function getLabel(): ?string
    {
        return match ($this) {
            self::FREE => "Free",
            self::PRO => "Pro",
            self::ENTERPRISE => "Enterprise"
        };
    }
}
