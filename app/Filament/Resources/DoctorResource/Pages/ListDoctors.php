<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoctors extends ListRecords
{
    protected static string $resource = DoctorResource::class;

    protected static ?string $breadcrumb = 'Lista';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Novo Médico'),
        ];
    }
}
