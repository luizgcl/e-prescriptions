<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $label = 'Paciente';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('document')
                    ->label('Documento')
                    ->mask('999.999.999-99')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('observations')
                    ->label('Observações')
                    ->placeholder('Insira informações importantes do paciente...')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime(null, 'America/Sao_Paulo')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Data de Atualização')
                    ->dateTime(null, 'America/Sao_Paulo')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Deletar selecionados'),
                ])->label('Ações em massa'),
            ])
            ->emptyStateHeading('Nenhum Paciente')
            ->emptyStateDescription('Cadastre seu primeiro paciente');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getSlug(): string
    {
        return 'pacientes';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/novo'),
            'edit' => Pages\EditPatient::route('/{record}/editar'),
        ];
    }
}
