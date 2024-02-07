<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPatient extends EditRecord
{
    protected static string $resource = PatientResource::class;

    protected static ?string $title = 'Edição de Paciente';

    protected static ?string $breadcrumb = 'Edição';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Deletar'),
        ];
    }

    public function getSavedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Paciente atualizado!');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->label('Salvar alterações'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
