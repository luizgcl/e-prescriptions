<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CustomChatWidget;
use Filament\Pages\Dashboard;
use Filament\Widgets\AccountWidget;

class HomePage extends Dashboard
{
    protected static ?string $title = 'Início';

    public function getHeaderWidgetsColumns(): int
    {
        return 1;
    }

    public function getHeaderWidgets(): array
    {
        return [
            AccountWidget::make(),
        ];
    }

    public function getWidgets(): array
    {
        return [
            CustomChatWidget::make(),
        ];
    }
}
