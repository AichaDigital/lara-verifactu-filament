<?php

declare(strict_types=1);

namespace AichaDigital\LaraVerifactuFilament\Resources;

use AichaDigital\LaraVerifactu\Enums\RegistryStatusEnum;
use AichaDigital\LaraVerifactu\Models\Registry;
use AichaDigital\LaraVerifactuFilament\Resources\RegistryResource\Pages;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class RegistryResource extends Resource
{
    protected static ?string $model = Registry::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-check';

    protected static string|\UnitEnum|null $navigationGroup = 'Verifactu';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('lara-verifactu-filament::resources.registry.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('lara-verifactu-filament::resources.registry.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('lara-verifactu-filament::resources.registry.plural_model_label');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('lara-verifactu-filament::resources.registry.sections.basic_info'))
                    ->schema([
                        TextEntry::make('registry_number')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.registry_number')),

                        TextEntry::make('registry_date')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.registry_date'))
                            ->dateTime(),

                        TextEntry::make('status')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.status'))
                            ->badge()
                            ->color(fn (RegistryStatusEnum $state): string => match ($state) {
                                RegistryStatusEnum::PENDING => 'warning',
                                RegistryStatusEnum::SENT => 'info',
                                RegistryStatusEnum::ACCEPTED => 'success',
                                RegistryStatusEnum::REJECTED => 'danger',
                                RegistryStatusEnum::ERROR => 'danger',
                            })
                            ->formatStateUsing(fn (RegistryStatusEnum $state): string => $state->getDescription()),

                        TextEntry::make('invoice.invoice_number')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.invoice')),
                    ])
                    ->columns(2),

                Section::make(__('lara-verifactu-filament::resources.registry.sections.hash_info'))
                    ->schema([
                        TextEntry::make('hash')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.hash'))
                            ->copyable()
                            ->fontFamily('mono'),

                        TextEntry::make('previous_hash')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.previous_hash'))
                            ->copyable()
                            ->fontFamily('mono')
                            ->default('-'),
                    ])
                    ->columns(1),

                Section::make(__('lara-verifactu-filament::resources.registry.sections.aeat_info'))
                    ->schema([
                        TextEntry::make('submitted_at')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.submitted_at'))
                            ->dateTime()
                            ->default('-'),

                        TextEntry::make('aeat_csv')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.aeat_csv'))
                            ->copyable()
                            ->default('-'),

                        TextEntry::make('submission_attempts')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.submission_attempts')),

                        TextEntry::make('aeat_error')
                            ->label(__('lara-verifactu-filament::resources.registry.fields.aeat_error'))
                            ->default('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('registry_number')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.registry_number'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('registry_date')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.registry_date'))
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('invoice.invoice_number')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.invoice'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.status'))
                    ->badge()
                    ->color(fn (RegistryStatusEnum $state): string => match ($state) {
                        RegistryStatusEnum::PENDING => 'warning',
                        RegistryStatusEnum::SENT => 'info',
                        RegistryStatusEnum::ACCEPTED => 'success',
                        RegistryStatusEnum::REJECTED => 'danger',
                        RegistryStatusEnum::ERROR => 'danger',
                    })
                    ->formatStateUsing(fn (RegistryStatusEnum $state): string => $state->getDescription())
                    ->sortable(),

                TextColumn::make('aeat_csv')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.aeat_csv'))
                    ->toggleable()
                    ->copyable(),

                TextColumn::make('submitted_at')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.submitted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('submission_attempts')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.submission_attempts'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('registry_date', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label(__('lara-verifactu-filament::resources.registry.fields.status'))
                    ->options(collect(RegistryStatusEnum::cases())->mapWithKeys(
                        fn (RegistryStatusEnum $status) => [$status->value => $status->getDescription()]
                    )),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistries::route('/'),
            'view' => Pages\ViewRegistry::route('/{record}'),
        ];
    }
}
