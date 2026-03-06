<?php

namespace App\Filament\Resources\Aspirasis\Pages;

use App\Filament\Resources\Aspirasis\AspirasiResource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\HasWizard;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ProsesAspirasi extends EditRecord
{
    use HasWizard;

    protected static string $resource = AspirasiResource::class;

    protected static ?string $title = 'Proses Aspirasi';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Wizard::make($this->getSteps())
                ->startOnStep($this->getStartStep())
                ->cancelAction($this->getCancelFormAction())
                ->submitAction($this->getSubmitFormAction())
                ->skippable($this->hasSkippableSteps())
                ->contained(false)
                ->columnSpanFull(),
        ]);
    }

    protected function getSteps(): array
    {
        return [

            Step::make('Detail Aspirasi')
                ->description('Tinjau isi aspirasi yang masuk')
                ->icon('heroicon-o-document-text')
                ->schema([
                    Section::make('Detail Pengadu')
                        ->schema([
                            Placeholder::make('siswa.name')
                                ->label('Nama Siswa')
                                ->columnSpan(1)
                                ->content(fn () => $this->record->siswa?->name ?? '-'),

                            Placeholder::make('kategori_nama')
                                ->label('Kategori')
                                ->columnSpan(1)
                                ->content(fn () => $this->record->kategori?->nama_kategori ?? '-'),

                            Placeholder::make('judul_display')
                                ->label('Judul')
                                ->columnSpan(1)
                                ->content(fn () => $this->record->judul),

                            Placeholder::make('keterangan_display')
                                ->label('Keterangan')
                                ->columnSpan(1)
                                ->content(fn () => $this->record->keterangan),

                            Placeholder::make('tanggal')
                                ->columnSpan(1)
                                ->label('Tanggal Masuk')
                                ->content(fn () => $this->record->created_at->format('d M Y, H:i')),
                        ])

                ])
                ->columnSpanFull(),

            Step::make('Status & Feedback')
                ->description('Perbarui status dan berikan balasan')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    Section::make('Status dan Aspirasi')
                        ->schema([
                            Textarea::make('feedback')
                                ->label('Feedback / Balasan')
                                ->placeholder('Tulis balasan atau keterangan untuk siswa...')
                                ->rows(5)
                                ->maxLength(1000),
                            FileUpload::make('bukti_hasil')
                                ->label('Bukti Hasil Proses')
                                ->directory('bukti_hasil')
                                ->disk('public')
                                ]),

                ])
                ->columnSpanFull(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['keterangan'] = $this->record->keterangan;
        $data['status']     = $this->record->status;
        $data['feedback']   = $this->record->feedback;
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // only save status & feedback, ignore read-only display fields
        return [
            'status'   => 'selesai',
            'feedback' => $data['feedback'] ?? null,
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Aspirasi diperbarui')
            ->body('Status dan feedback berhasil disimpan.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
