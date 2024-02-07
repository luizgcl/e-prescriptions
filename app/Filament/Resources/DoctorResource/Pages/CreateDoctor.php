<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateDoctor extends CreateRecord
{
    protected static string $resource = DoctorResource::class;

    protected static ?string $title = 'Novo Médico';

    protected static ?string $breadcrumb = 'Novo';

    public function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Médico cadastrado!');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Criar'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
