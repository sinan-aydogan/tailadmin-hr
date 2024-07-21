<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PositionResource\Pages;
use App\Filament\Resources\PositionResource\RelationManagers;
use App\Models\Department;
use App\Models\Position;
use App\Models\UserChildModels\EmployeeUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;

    protected static ?string $label = 'Pozisyon';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(6)
                                     ->schema([
                                         Forms\Components\TextInput::make('code')
                                                                   ->label('Pozisyon Kodu')
                                                                   ->columnSpan(3)
                                                                   ->required(),
                                         Forms\Components\Select::make('department_id')
                                                                ->label('Departman')
                                                                ->columnSpan(3)
                                                                ->relationship('department', 'name')
                                                                ->options(
                                                                    Department::all()->pluck('name', 'id')->toArray()
                                                                )
                                                                ->required(),
                                         Forms\Components\TextInput::make('name')
                                                                   ->label('Pozisyon Adı')
                                                                   ->columnSpanFull()
                                                                   ->required(),
                                         Forms\Components\Textarea::make('description')
                                                                  ->label('Açıklama')
                                                                  ->columnStart(1)
                                                                  ->columnSpan(6)
                                                                  ->required(),

                                         Forms\Components\Select::make('superior_id')
                                                                ->label('Raporlama Yaptığı Yöneticisi')
                                                                ->relationship('superior', 'name')
                                                                ->options(
                                                                    EmployeeUser::all()->pluck('name', 'id')->toArray()
                                                                )
                                                                ->columnSpan(3),
                                         Forms\Components\Select::make('proxy_id')
                                                                ->label('Vekili')
                                                                ->relationship('proxy', 'name')
                                                                ->options(
                                                                    EmployeeUser::all()->pluck('name', 'id')->toArray()
                                                                )
                                                                ->columnSpan(3),
                                         Forms\Components\Textarea::make('responsibilities')
                                                                  ->label('Sorumluluklar')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('qualifications')
                                                                  ->label('Nitellikler')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('skills')
                                                                  ->label('Yetenekler')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('education')
                                                                  ->label('Eğitim')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('experience')
                                                                  ->label('Deneyim')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('certificates')
                                                                  ->label('Sertifikalar')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('language')
                                                                  ->label('Dil')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('benefits')
                                                                  ->label('Yararlar')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('working_conditions')
                                                                  ->label('Çalışma Koşulları')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('working_equipments')
                                                                  ->label('Çalışma Ekipmanları')
                                                                  ->columnSpan(3),
                                         Forms\Components\Textarea::make('other')
                                                                  ->label('Diğer')
                                                                  ->columnSpan(3),
                                         Forms\Components\Toggle::make('is_active')
                                                                ->label('Aktif mi?')
                                                                ->default(true)
                                                                ->columnSpan(3),
                                     ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Pozisyon Kodu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Pozisyon Adı')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->label('Departman')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('superior.name')
                    ->label('Raporlama Yaptığı Yönetici')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proxy.name')
                    ->label('Vekili')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Aktif mi?')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit'   => Pages\EditPosition::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
                     ->withoutGlobalScopes([
                         SoftDeletingScope::class,
                     ]);
    }
}
