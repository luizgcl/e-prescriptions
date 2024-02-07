<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;

    protected static ?string $title = 'Novo Paciente';

    protected static ?string $breadcrumb = 'Novo';

    public function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Paciente cadastrado!');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Criar'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
