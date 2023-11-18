<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    TextInput::make('title')
                        ->required()
                        ->reactive()
                        ->autocomplete(false)
                        ->afterStateUpdated(function ($state, Forms\Set $set) {
                            $slug = $set('slug', str($state)->slug()->toString());
                            while (Page::whereSlug($slug)->exists()) {
                                $slug = $set('slug', str($state)->slug()->toString());
                            }

                            return $slug;
                        }
                        ),
                    TextInput::make('slug')
                        ->disabled()
                        ->required(),
                    Select::make('author_id')
                        ->relationship(name: 'author', titleAttribute: 'name')
                        ->required(),
                    Forms\Components\Section::make('Content')->schema([
                        Forms\Components\Builder::make('blocks')
                            ->blocks([
                                Forms\Components\Builder\Block::make('heading')
                                    ->schema([
                                        TextInput::make('blocks')
                                            ->label('Heading')
                                            ->required(),
                                        Select::make('level')
                                            ->options([
                                                'h1' => 'Heading 1',
                                                'h2' => 'Heading 2',
                                                'h3' => 'Heading 3',
                                                'h4' => 'Heading 4',
                                                'h5' => 'Heading 5',
                                                'h6' => 'Heading 6',
                                            ])
                                            ->required(),
                                    ])
                                    ->columns(2),
                                Forms\Components\Builder\Block::make('intro')
                                    ->schema([
                                        MarkdownEditor::make('blocks')
                                            ->label('Intro')
                                            ->toolbarButtons([
                                                'attachFiles',
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'codeBlock',
                                                'heading',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'table',
                                                'undo',
                                            ])
                                            ->required(),

                                        FileUpload::make('url')
                                            ->label('Image')
                                            ->image()
                                            ->imageEditor()
                                            /** @phpstan-ignore-next-line */
                                            ->imageEditorViewportWidth('1920')
                                            /** @phpstan-ignore-next-line */
                                            ->imageEditorViewportHeight('1080')
                                            ->required(),
                                    ])
                                    ->columns(2),
                                Forms\Components\Builder\Block::make('paragraph')
                                    ->schema([
                                        RichEditor::make('blocks')
                                            ->label('Paragraph')
                                            ->toolbarButtons([
                                                'attachFiles',
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'codeBlock',
                                                'h2',
                                                'h3',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'underline',
                                                'undo',
                                            ])->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('blockquote')
                                    ->schema([
                                        Forms\Components\Textarea::make('blocks')
                                            ->label('Blockquote')
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('mark_down_paragraph')
                                    ->schema([
                                        MarkdownEditor::make('blocks')
                                            ->label('Markdown Editor')
                                            ->toolbarButtons([
                                                'attachFiles',
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'codeBlock',
                                                'heading',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'table',
                                                'undo',
                                            ])
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('image')
                                    ->schema([
                                        FileUpload::make('url')
                                            ->label('Image')
                                            ->image()
                                            ->imageEditor()
                                            /** @phpstan-ignore-next-line */
                                            ->imageEditorViewportWidth('1920')
                                            /** @phpstan-ignore-next-line */
                                            ->imageEditorViewportHeight('1080')
                                            ->required(),
                                        TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                        Forms\Components\Toggle::make('center')
                                            ->label('Center'),
                                    ]),
                            ]),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('author.name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\ToggleColumn::make('published'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
