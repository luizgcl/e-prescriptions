<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditDoctor extends EditRecord
{
    protected static string $resource = DoctorResource::class;

    protected static ?string $title = 'Edição de Médico';

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
            ->title('Médico atualizado!');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()->label('Salvar alterações'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
