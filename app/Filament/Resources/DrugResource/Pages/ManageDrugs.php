<?php

namespace App\Filament\Resources\DrugResource\Pages;

use App\Filament\Resources\DrugResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDrugs extends ManageRecords
{
    protected static string $resource = DrugResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Novo Medicamento')
                ->modalHeading('Medicamento')
                ->createAnother(false)
                ->modalSubmitActionLabel('Criar')
                ->modalCancelActionLabel('Cancelar'),
        ];
    }
}
