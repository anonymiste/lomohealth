<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\Http;
use App\Models\Child;

class SendVaccineReminder implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Child $child, protected string $vaccineName) {}

    public function handle()
    {
        $text = match($this->child->language) {
            'ewe' => "Afi, né yɔ vaccine {$this->vaccineName} na via. Éva clinique lá kaba o!",
            'kabiye' => "Koffi, n’labiya vaccine {$this->vaccineName} na ɖevi. Na va dispensaire ɖo!",
            default => "Madame, votre enfant doit recevoir le vaccin {$this->vaccineName}. Venez au centre de santé."
        };

        $mp3Url = Http::post('https://api.elevenlabs.io/v1/text-to-speech/EXAVITQu4vr4xnSDxMaL', [
            'text' => $text,
            'voice_settings' => ['stability' => 0.75, 'similarity_boost' => 0.9]
        ])->throw()->body(); // tu mets ton API key dans .env

        $sms = "LomoHealth : {$text}\nÉcouter : {$mp3Url}";
        // envoie avec AfricasTalking ici
    }
}