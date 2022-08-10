<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('password')->password()
                                                        ->required()
                                                        ->hiddenOn('edit')
                                                        ->disabled(),
                Forms\Components\FileUpload::make('profile_path')
                                                ->directory('profilePhoto')
                                                ->visibility('public'),
                Forms\Components\Select::make('lang')
                                        ->required()
                                        ->label('languages')
                                        ->options([
                                            'en' => 'English',
                                            'es' => 'Spanish',
                                            'de' => 'German',
                                            'fr' => 'French', 
                                            'it' => 'Italian',
                                        ])
                                        ->searchable(),
                Forms\Components\Toggle::make('is_admin')
                                        ->required()
                                        ->label('is_admin')
                                        ->inline(false)
                                        ->onIcon('heroicon-s-lightning-bolt')
                                        ->offIcon('heroicon-s-user')
                                        ->helperText('Note that this actions allows you to grand Admin permissions'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                                            ->sortable()
                                            ->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('is_admin')->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
