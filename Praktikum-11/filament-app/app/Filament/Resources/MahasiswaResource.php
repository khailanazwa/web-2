<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Components\Concerns\CanBeSearchable;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama')->Searchable()->sortable(),
                TextColumn::make('nim'),
                TextColumn::make('jurusan'),
                TextColumn::make('jenis_kelamin'),
                TextColumn::make('agama'),
                TextColumn::make('status'),
            ])
            ->filters([
                //agama
                SelectFilter::make('agama')
                    ->options([
                        'Islam' => 'Isalam',
                        'Kristem' => 'Kristen',
                        'Hindu' => 'Hindu',
                    ]),
                // jenis kelamin
                SelectFilter::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
                // jurusan
                SelectFilter::make('jurusan')
                    ->options([
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Sistem Informasi' => 'Sistem Informasi',
                        'Teknik Elektro' => 'Teknik Elektro',
                    ]),
                 // status
                SelectFilter::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak Aktif' => 'Tidak Aktif',
                        ])


            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
