<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DrugResource\Pages;
use App\Models\Drug;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DrugResource extends Resource
{
    protected static ?string $model = Drug::class;

    protected static ?string $label = 'Medicamento';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->label('Descrição')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                Forms\Components\TextInput::make('dosage')
                    ->label('Dosagem')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('presentation')
                    ->label('Apresentação')
                    ->placeholder('Selecione uma apresentação')
                    ->options([
                        'Miligrama',
                        'Mililitro',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dosage')
                    ->label('Dosagem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('presentation')
                    ->label('Apresentação')
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
                Tables\Actions\EditAction::make()
                    ->label('Editar')
                    ->modalHeading('Editar Medicamento')
                    ->modalSubmitActionLabel('Salvar alterações')
                    ->modalCancelActionLabel('Cancelar'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Deletar selecionados'),
                ])->label('Ações em massa'),
            ])
            ->emptyStateHeading('Nenhum Medicamento')
            ->emptyStateDescription('Cadastre seu primeiro medicamento');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDrugs::route('/'),
        ];
    }
}
