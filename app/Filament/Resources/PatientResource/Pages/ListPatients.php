<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    protected static ?string $breadcrumb = 'Lista';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Novo Paciente'),
        ];
    }
}
