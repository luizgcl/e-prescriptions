<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $label = 'Médico';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('board')
                    ->label('N° de Conselho')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('specialty')
                    ->label('Especialidade')
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('board')
                    ->label('N° de Conselho')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specialty')
                    ->label('Especialidade')
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
            ->emptyStateHeading('Nenhum Médico')
            ->emptyStateDescription('Cadastre seu primeiro médico');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getSlug(): string
    {
        return 'medicos';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/novo'),
            'edit' => Pages\EditDoctor::route('/{record}/editar'),
        ];
    }
}
